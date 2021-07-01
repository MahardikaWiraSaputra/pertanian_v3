<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokumen extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('model_dokumen');
        $this->auth->cek_auth('data_dokumen');
    }

    public function index()
    {
        $data['get_instansi'] = $this->model_dokumen->get_instansi();
        $this->load->view('dokumen/index', $data);
    }

    public function get_satker($id){
        $data['get_satker'] = $this->model_dokumen->get_satker($id);
        $this->load->view('dokumen/v_filter_satker', $data);
    } 

    public function get_pengguna($id){
        $data['get_pengguna'] = $this->model_dokumen->get_pengguna($id);
        $this->load->view('dokumen/v_filter_pengguna', $data);
    } 

    public function list(){
        $page = '1';
        $offset = '0';
        $limit = 100;
        $like = array();
        $instansi = '';
        $satker = '';
        $pengguna = '';
        $waktu = '';

        if (isset($_POST['search_field']) && $_POST['search_field'] != NULL)
        {
            $like = $_POST['search_field'];
        }

        if (isset($_POST['instansi']) && $_POST['instansi'] != NULL && $_POST['instansi'] != 'all')
        {
            $instansi = $_POST['instansi'];
        }

        if (isset($_POST['satker']) && $_POST['satker'] != NULL && $_POST['satker'] != 'all')
        {
            $satker = $_POST['satker'];
        }

        if (isset($_POST['pengguna']) && $_POST['pengguna'] != NULL && $_POST['pengguna'] != 'all')
        {
            $pengguna = $_POST['pengguna'];
        }

        if (isset($_POST['waktu']) && $_POST['waktu'] != NULL && $_POST['waktu'] != 'all')
        {
            $waktu = $_POST['waktu'];
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

        $data['total_items'] = $this->model_dokumen->list_total($instansi,$satker,$pengguna,$waktu,$like);
        $data['list_items'] = $this->model_dokumen->list_data($instansi,$satker,$pengguna,$waktu,$like,$limit,$offset);
        $this->load->view('dokumen/v_list', $data );
    }

    // tambah
    public function tambah(){
        $data = '';
        $this->load->view('master/kategori/v_tambah', $data);
    }

    public function simpan() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('f_kategori', 'Kategori', 'trim|required');
        if($this->form_validation->run()) {
            $data['KATEGORI'] = htmlspecialchars($this->input->post('f_kategori'));
            $data['CREATED'] = date('y-m-d h:i:s');
            $data['CREATED_BY'] = $this->ion_auth->user()->row()->id;
            $query = $this->m_master_kategori->tambah_kategori($data);
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
    // detail edit
    public function detail($id){
        if ($id) {
            $data['detail'] = $this->m_master_kategori->detail_kategori($id);
            $this->load->view('master/kategori/v_detail', $data);
        }
        else {
            echo 'id tidka boleh kosong';
        }
    }

    // detail edit
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


    public function delete($id){
        if($id) {         
            $query = $this->m_master_kategori->delete_kategori($id);
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