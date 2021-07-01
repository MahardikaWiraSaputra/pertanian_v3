<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Umkm extends CI_Controller { 

    function __construct(){
        parent::__construct();
        $this->load->model('model_umkm');
    }

    public function index(){
        $data['layout']  =  'umkm/index';
        $data['kecamatan']  = $this->model_umkm->list_kecamatan();
        $data['sektor_umkm']  = $this->model_umkm->list_sektor();
        $this->load->view('home/layout', $data);
    }


    public function get_umkm() {

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

            $data['total_umkm'] = $this->model_umkm->list_total($keyword, $kecamatan, $sektor)->num_rows();
            $data['total_umkm_filter'] =  $page * $limit;
            $data['list_produk'] = $this->model_umkm->list_data($keyword, $kecamatan, $sektor, $limit, $offset)->result();
        }

        $this->load->view('umkm/list', $data);
    }


    public function detail($slug = null){
        if (!$slug) {
           redirect('/');
        }
        else {
            $data['layout']  =  'umkm/detail';
            $detail  =  $this->model_umkm->detail_umkm($slug);

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