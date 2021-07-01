<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aduan extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('model_aduan');
        $this->auth->cek_auth('data_aduan');
    }

    public function index()
    {
        $data['get_instansi'] = $this->model_aduan->get_instansi();
        $this->load->view('aduan/index', $data);
    }

    public function get_satker($id){
        $data['get_satker'] = $this->model_aduan->get_satker($id);
        $this->load->view('aduan/v_filter_satker', $data);
    } 

    public function list(){
        $page = '1';
        $offset = '0';
        $limit = 25;
        $like = array();
        $instansi = '';
        $tanggal = '';
        $status = '';

        if (isset($_POST['search_field']) && $_POST['search_field'] != NULL)
        {
            $like = $_POST['search_field'];
        }

        if (isset($_POST['instansi']) && $_POST['instansi'] != NULL && $_POST['instansi'] != 'all')
        {
            $instansi = $_POST['instansi'];
        }

        if (isset($_POST['tanggal']) && $_POST['tanggal'] != NULL && $_POST['tanggal'] != 'all')
        {
            $tanggal = $_POST['tanggal'];
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

        $data['total_items'] = $this->model_aduan->list_total($instansi,$tanggal,$status,$like);
        $data['list_items'] = $this->model_aduan->list_data($instansi,$tanggal,$status,$like,$limit,$offset);
        // print_r($this->db->last_query());die;
        $this->load->view('aduan/v_list', $data );
    }

    public function reply() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('aduan_id', 'ADUAN ID', 'trim|required');
        $this->form_validation->set_rules('response', 'RESPONSE', 'trim|required');
        if($this->form_validation->run()) {
            $data['aduan_id'] = $this->input->post('aduan_id');
            $data['response'] = $this->input->post('response');
            $data['response_by'] = $this->session->userdata('full_name');
            $data['response_date'] = date('y-m-d h:i:s');
            $query = $this->model_aduan->reply($data);
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

    public function tambah(){
        $data = '';
        $this->load->view('aduan/v_tambah', $data);
    }


    public function detail($no_ticket){
        if ($no_ticket) {
            $data['detail'] = $this->model_aduan->detail($no_ticket);
            $this->load->view('aduan/v_detail', $data);
        }
        else {
            echo 'id tidak boleh kosong';
        }
    }

    public function edit($id){
        if ($id) {
            $data['detail'] = $this->m_master_kategori->detail_kategori($id);
            $this->load->view('master/kategori/v_edit', $data);
        }
        else {
            echo 'id tidka boleh kosong';
        }
    }


    public function update() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('f_kategori_id', 'ID Kategori', 'trim|required|numeric');
        $this->form_validation->set_rules('f_kategori', 'Kategori', 'trim|required');
        if($this->form_validation->run()) {
            $data['ID'] = htmlspecialchars($this->input->post('f_kategori_id'));
            $data['KATEGORI'] = htmlspecialchars($this->input->post('f_kategori'));
            $data['MODIFIED'] = date('y-m-d h:i:s');
            $data['MODIFIED_BY'] = $this->ion_auth->user()->row()->id;
            
            $query = $this->m_master_kategori->update_kategori($data);
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


    public function solved($id){
        if($id) {
            $data['id'] = $id;
            $data['status'] = 'closed'; 
            $query = $this->model_aduan->update($data);
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

    public function open($id){
        if($id) {         
            $data['id'] = $id;
            $data['status'] = 'open'; 
            $query = $this->model_aduan->update($data);

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

    public function delete($id){
        if($id) {         
            $query = $this->model_aduan->delete($id);
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

    public function response(){
        $id = $this->input->post('id');
        $data['list_items'] = $this->model_aduan->list_response($id);
        $this->load->view('aduan/v_response', $data);
    }


}