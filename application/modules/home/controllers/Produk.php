<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller { 

    function __construct(){
        parent::__construct();
        $this->load->model('model_produk');
    }

    public function index(){
        $data['layout']  =  'produk/index';
        $data['list_sementara'] = $this->model_produk->list_sementara()->result();
        $this->load->view('home/layout', $data);
    }


    public function get_produk() {

        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }
        else {
            $page = '1';
            $offset = '0';
            $limit = 4;
            $keyword = '';
            $kecamatan = '';
            $sektor = '';

            if (isset($_POST['keyword']) && $_POST['keyword'] != NULL) {
                $keyword = $_POST['keyword'];
            }

            if (isset($_POST['kecamatan']) && $_POST['kecamatan'] != NULL) {
                $kecamatan = $_POST['kecamatan'];
            }

            if (isset($_POST['sektor']) && $_POST['sektor'] != NULL) {
                $sektor = $_POST['sektor'];
            }

            if (isset($_POST['page']) && $_POST['page'] != NULL) {
                $page = $_POST['page'];
                $pageof = $_POST['page']-1;
                $offset = $pageof * $limit;
            }

            $data['page'] = $page;
            $data['limit'] = $limit;

            $data['total_produk'] = $this->model_produk->list_total($keyword, $kecamatan, $sektor)->num_rows();
            $data['total_produk_filter'] =  $page * $limit;
            $data['list_produk'] = $this->model_produk->list_data($keyword, $kecamatan, $sektor, $limit, $offset)->result();
        }

        $this->load->view('produk/list', $data);
    }


    public function detail($slug = null){
        if (!$slug) {
           redirect('/');
        }
        else {
            $data['layout']  =  'produk/detail';
            $detail  =  $this->model_produk->detail_produk($slug);
            $data['list_img'] = $this->model_produk->list_image_produk($slug);

            $data['detail_toko'] = $this->model_produk->detail_toko($detail->row('store_id'))->row();
            $data['related_produk'] = $this->model_produk->related_produk($detail->row('kategori'))->result();
            if ($detail->num_rows() > 0) {
                $data['detail'] = $detail->row();
            }
            else {
                redirect('/');
            }
            $this->load->view('home/layout', $data);
        }
        
    }
}
?>