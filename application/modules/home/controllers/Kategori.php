<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller { 

    function __construct(){
        parent::__construct();
        $this->load->model('model_kategori');
    }

    public function index(){
        $data['layout']  =  'produk/index';
        $data['list_sementara'] = $this->model_kategori->list_sementara()->result();
        $this->load->view('home/layout', $data);
    }


    public function detail($slug = null){
        if (!$slug) {
           redirect('/');
        }
        else {
            $data['layout']  =  'kategori/detail';
            $detail  =  $this->model_kategori->detail_produk($slug);
            $data['list_pasar']  = $this->model_kategori->list_pasar();
            $data['list_kategori']  = $this->model_kategori->list_kategori();

            if ($detail->num_rows() > 0) {
                $data['detail'] = $detail->row();
            }
            else {
                redirect('/');
            }
            $this->load->view('home/layout', $data);
        }
        
    }


    public function get_produk() {

        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }
        else {
            $page = '1';
            $offset = '0';
            $limit = 12;
            $keyword = '';
            $pasar = '';
            $kat = '';

            if (isset($_POST['kat']) && $_POST['kat'] != NULL) {
                $kat = $_POST['kat'];
            }

            if (isset($_POST['keyword']) && $_POST['keyword'] != NULL) {
                $keyword = $_POST['keyword'];
            }

            if (isset($_POST['pasar']) && $_POST['pasar'] != NULL) {
                $pasar = $_POST['pasar'];
            }

            if (isset($_POST['page']) && $_POST['page'] != NULL) {
                $page = $_POST['page'];
                $pageof = $_POST['page']-1;
                $offset = $pageof * $limit;
            }

            $data['page'] = $page;
            $data['limit'] = $limit;

            $data['total_produk'] = $this->model_kategori->list_total($kat, $keyword, $pasar)->num_rows();
            $data['total_produk_filter'] =  $page * $limit;
            $data['list_produk'] = $this->model_kategori->list_data($kat, $keyword, $pasar, $limit, $offset)->result();
        }

        $this->load->view('kategori/prod_list', $data);
    }

}
?>