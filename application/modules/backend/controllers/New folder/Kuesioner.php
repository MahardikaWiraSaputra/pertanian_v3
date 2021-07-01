<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kuesioner extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('model_kuesioner');
        $this->auth->cek_auth('data_kuesioner');
    }

    public function index()
    {
        $data = '';
        $this->load->view('kuesioner/index', $data);
    }


    public function list(){
        $page = '1';
        $offset = '0';
        $limit = 25;
        $pelayanan = '';
        $keramahan = '';
        $ketanggapan = '';
        $kepuasan = '';


        if (isset($_POST['pelayanan']) && $_POST['pelayanan'] != NULL && $_POST['pelayanan'] != 'all')
        {
            $pelayanan = $_POST['pelayanan'];
        }

        if (isset($_POST['keramahan']) && $_POST['keramahan'] != NULL && $_POST['keramahan'] != 'all')
        {
            $keramahan = $_POST['keramahan'];
        }

        if (isset($_POST['ketanggapan']) && $_POST['ketanggapan'] != NULL && $_POST['ketanggapan'] != 'all')
        {
            $ketanggapan = $_POST['ketanggapan'];
        }

        if (isset($_POST['kepuasan']) && $_POST['kepuasan'] != NULL && $_POST['kepuasan'] != 'all')
        {
            $kepuasan = $_POST['kepuasan'];
        }

        if (isset($_POST['page']) && $_POST['page'] != NULL) {
            $page = $_POST['page'];
            $pageof = $_POST['page']-1;
            $offset = $pageof * $limit;
        }

        if (isset($_POST['limit']) && $_POST['limit'] != NULL) {
            $limit = $_POST['limit'];
        }

        $data['page'] = $page;
        $data['limit'] = $limit;

        $data['total_items'] = $this->model_kuesioner->list_total($pelayanan,$keramahan,$ketanggapan,$kepuasan);
        $data['list_items'] = $this->model_kuesioner->list_data($pelayanan,$keramahan,$ketanggapan,$kepuasan,$limit,$offset);
        $this->load->view('kuesioner/v_list', $data );
    }

    public function detail($id){
        if ($id) {
            $data['detail'] = $this->model_kuesioner->detail($id);
            $this->load->view('kuesioner/v_detail', $data);
        }
        else {
            echo 'id tidka boleh kosong';
        }
    }

    public function delete($id){
        if($id) {         
            $query = $this->model_kuesioner->delete($id);
            if ($query) {
                $output['success'] = true;
                $output['message'] = 'DATA BERHASIL DIUPDATE';
            }
            else {
                $output['success'] = false;
                $output['message'] = 'DATA GAGAL DIHAPUS';
            }
        } else {
            $output['success'] = false;
            $output['message'] = 'DATA GAGAL DIHAPUS';
        }
        echo json_encode($output);
    }


}