<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Req_ganti_nomer extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('model_req_nomer');
        $this->auth->cek_auth('req_ganti_nomer');
    }

    public function index()
    {
        $data['get_instansi'] = $this->model_req_nomer->get_instansi();
        $this->load->view('req_nomer/index', $data);
    }

    public function get_satker($id){
        $data['get_satker'] = $this->model_req_nomer->get_satker($id);
        $this->load->view('req_nomer/v_filter_satker', $data);
    } 

    public function list(){
        $page = '1';
        $offset = '0';
        $limit = 25;
        $like = array();
        $instansi = '';
        $status = '';

        if (isset($_POST['search_field']) && $_POST['search_field'] != NULL)
        {
            $like = $_POST['search_field'];
        }

        if (isset($_POST['instansi']) && $_POST['instansi'] != NULL && $_POST['instansi'] != 'all')
        {
            $instansi = $_POST['instansi'];
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

        $data['total_items'] = $this->model_req_nomer->list_total($instansi,$status,$like);
        $data['list_items'] = $this->model_req_nomer->list_data($instansi,$status,$like,$limit,$offset);
        $this->load->view('req_nomer/v_list', $data );
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
            $query = $this->model_req_nomer->reply($data);
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

    public function detail($no_ticket){
        if ($no_ticket) {
            $data['detail'] = $this->model_req_nomer->detail($no_ticket);
            $this->load->view('req_nomer/v_detail', $data);
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
            $query = $this->model_req_nomer->update($data);
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
            $query = $this->model_req_nomer->update($data);

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
            $query = $this->model_req_nomer->delete($id);
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
        $data['list_items'] = $this->model_req_nomer->list_response($id);
        $this->load->view('req_nomer/v_response', $data);
    }


}