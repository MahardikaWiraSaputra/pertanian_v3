<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Umkm_terdaftar extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('model_umkm_terdaftar');
        $this->auth->cek_auth('data_umkm_terdaftar');
    }

    public function index()
    {
        $data = '';
        $this->load->view('umkm_terdaftar/index', $data);
    }

    public function list_data(){
        $page = '1';
        $offset = '0';
        $limit = 25;
        $like = array();
        $status = '';

        if (isset($_POST['search_field']) && $_POST['search_field'] != NULL)
        {
            $like = $_POST['search_field'];
        }

        if (isset($_POST['status']) && $_POST['status'] != NULL && $_POST['status'] != 'all')
        {
            $status = $_POST['status'];
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

        $data['total_items'] = $this->model_umkm_terdaftar->list_total($status,$like);
        $data['list_items'] = $this->model_umkm_terdaftar->list_data($status,$like,$limit,$offset);
        // print_r($this->db->last_query());die;
        $this->load->view('umkm_terdaftar/v_list', $data );
    }

    // tambah
    public function tambah(){
        $data = '';
        $this->load->view('umkm_terdaftar/v_tambah', $data);
    }

    public function simpan() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('user_id', 'USER ID', 'trim|required');
        $this->form_validation->set_rules('api_key', 'API_KEY', 'trim|required');
        $this->form_validation->set_rules('password', 'PASSWORD', 'trim|required');
        $this->form_validation->set_rules('url_domain', 'URL DOMAIN', 'trim|required');
        if($this->form_validation->run()) {
            $data['user_id'] = $this->input->post('user_id');
            $data['api_key'] = $this->input->post('api_key');
            $data['password'] = md5($this->input->post('password'));
            $data['url_domain'] = $this->input->post('url_domain');
            $data['api_key_activated'] = $this->input->post('status');
            $data['date_created'] = date('Y-m-d H:i:s');
            $query = $this->model_umkm_terdaftar->tambah($data);
            if ($query) {
                $output['success'] = true;
                $output['message'] = 'DATA BERHASIL DISIMPAN';
            }
            else {
                $output['success'] = false;
                $output['message'] = 'DATA GAGAL DISIMPAN';
            }
        } 
        else {
            $output['success'] = false;
            $output['message'] = 'DATA GAGAL DISIMPAN';
        }
        echo json_encode($output);
    }

    // public function detail($id){
    //     if ($id) {
    //         $data['detail'] = $this->model_umkm_terdaftar->detail($id);
    //         $this->load->view('umkm_terdaftar/v_detail', $data);
    //     }
    //     else {
    //         echo 'id tidak boleh kosong';
    //     }
    // }

    public function edit($id){
        if ($id) {
            $data['detail'] = $this->model_umkm_terdaftar->detail($id);
            $this->load->view('umkm_terdaftar/v_edit', $data);
        }
        else {
            echo 'id tidak boleh kosong';
        }
    }

    public function update() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('id', 'ID', 'trim|required');
        $this->form_validation->set_rules('user_id', 'USER ID', 'trim|required');
        $this->form_validation->set_rules('api_key', 'API_KEY', 'trim|required');
        $this->form_validation->set_rules('url_domain', 'URL DOMAIN', 'trim|required');
        if($this->form_validation->run()) {
            $data['id'] = $this->input->post('id');
            $data['user_id'] = $this->input->post('user_id');
            $data['api_key'] = $this->input->post('api_key');
            $data['url_domain'] = $this->input->post('url_domain');
            $data['api_key_activated'] = $this->input->post('status');
            if ($this->input->post('password')) {
                $data['password'] = md5($this->input->post('password'));
            }
            $query = $this->model_umkm_terdaftar->update($data);
            if ($query) {
                $output['success'] = true;
                $output['message'] = 'DATA BERHASIL DISIMPAN';
            }
            else {
                $output['success'] = false;
                $output['message'] = 'DATA GAGAL DISIMPAN';
            }
        } 
        else {
            $output['success'] = false;
            $output['message'] = 'DATA GAGAL DISIMPAN';
        }
        echo json_encode($output);
    }


    public function delete($id){
        if($id) {         
            $query = $this->model_umkm_terdaftar->delete($id);
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

    public function generate_api() {
        $userid = $this->input->post('userid');
        if ($userid !== null) {
            $result['api_key'] = sha1($userid);
            $result['messages'] = 'valid';
        }
        else {
            $result['messages'] = 'invalid';
        }

        echo json_encode($result);
    }    


}