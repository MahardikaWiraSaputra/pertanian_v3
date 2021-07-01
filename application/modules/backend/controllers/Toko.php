<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Toko extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('model_toko');
        $this->auth->cek_auth('data_produk');
    }

    public function index()
    {
        $data['filter_pasar'] = $this->model_toko->filter_pasar();
        $data['filter_kecamatan'] = $this->model_toko->filter_kecamatan();
        $data['filter_desa'] = $this->model_toko->filter_desa();
        $this->load->view('toko/index', $data);
    }

    public function list_data(){
        $page = '1';
        $offset = '0';
        $limit = 25;
        $like = array();
        $pasar = '';

        if (isset($_POST['search_field']) && $_POST['search_field'] != NULL)
        {
            $like = $_POST['search_field'];
        }

        if (isset($_POST['pasar']) && $_POST['pasar'] != NULL && $_POST['pasar'] != 'all')
        {
            $pasar = $_POST['pasar'];
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

        $data['total_items'] = $this->model_toko->list_total($pasar,$like)->num_rows();
        $data['list_items'] = $this->model_toko->list_data($pasar,$like,$limit,$offset)->result();
        
        $this->load->view('toko/v_list', $data );
    }

    // tambah
    public function tambah(){
        $data['filter_kategori'] = array(
            array('kategori'=>1,'label'=>'Pasar'),
            array('kategori'=>2,'label'=>'UMKM'));
        $data['filter_pasar'] = $this->model_toko->filter_pasar();
        $data['filter_kecamatan'] = $this->model_toko->filter_kecamatan();
        $data['filter_desa'] = $this->model_toko->filter_desa();
        $data['filter_komoditas'] = $this->model_toko->filter_komoditas();
        $this->load->view('toko/v_tambah', $data);
    }

    public function simpan() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nik', 'NIK', 'trim|required');
        $this->form_validation->set_rules('kategori_store', 'kategori store', 'trim|required');
        $this->form_validation->set_rules('nama_lengkap', 'NAMA LENGKAP', 'trim|required');
        $this->form_validation->set_rules('alamat', 'ALAMAT', 'trim|required');
        $this->form_validation->set_rules('rt', 'RT', 'trim|required');
        $this->form_validation->set_rules('rw', 'rw', 'trim|required');
        $this->form_validation->set_rules('desa', 'desa', 'trim|required');
        $this->form_validation->set_rules('kecamatan', 'kecamatan', 'trim|required');
        $this->form_validation->set_rules('nama_usaha', 'nama_usaha', 'trim|required');
        $this->form_validation->set_rules('telp', 'telp', 'trim|required');
        $this->form_validation->set_rules('komoditas', 'komoditas', 'trim|required');
        $this->form_validation->set_rules('pasar', 'pasar', 'trim|required');
        if($this->form_validation->run()) {
            $data['nik'] = $this->input->post('nik');
            $data['kategori_store'] = $this->input->post('kategori_store');
            $data['nama_lengkap'] = $this->input->post('nama_lengkap');
            $data['alamat'] = $this->input->post('alamat');
            $data['rt'] = $this->input->post('rt');
            $data['rw'] = $this->input->post('rw');
            $data['desa'] = $this->input->post('desa');
            $data['kecamatan'] = $this->input->post('kecamatan');
            $data['nama_usaha'] = $this->input->post('nama_usaha');
            $data['telp'] = $this->input->post('telp');
            if($this->input->post('komoditas') == 'lainnya'){
                $data['komoditi'] = $this->input->post('komoditas_lainnya');
            } else {
                $data['komoditi'] = $this->input->post('komoditas');
            }
            $data['pasar_id'] = $this->input->post('pasar');
            $data['date_created'] = date('Y-m-d H:i:s');
            $query = $this->model_toko->tambah($data);
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

    public function cek_nik() {
        $nik = $this->input->post('nik');
        $query = $this->model_toko->cek_nik($this->input->post('nik'));
        if ($query) {
            $output['success'] = true;
            $output['message'] = 'NIK SUDAH DIGUNAKAN';
        }
        else {
            $output['success'] = false;
            $output['message'] = 'NIK BELUM DIGUNAKAN';
        }
        echo json_encode($output);
    }

    public function simpan_user() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nik', 'nik', 'trim|required');
        $this->form_validation->set_rules('username', 'username', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'trim|required');
        $this->form_validation->set_rules('email', 'email', 'trim|required');
        if($this->form_validation->run()) {
            $data['nik'] = $this->input->post('nik');
            $data['username'] = $this->input->post('username');
            $data['unique_us'] = $this->input->post('username');
            $data['password'] = password_hash($this->input->post('password'),PASSWORD_DEFAULT);
            $data['email'] = $this->input->post('email');
            $data['user_type'] = 03;
            $cek_nik = $this->model_toko->cek_nik($this->input->post('nik'));
            if($cek_nik){
                $data['full_name'] = $cek_nik->nama_lengkap;   
            }else {
                $data['full_name'] = 'user';
            }
            $query = $this->model_toko->tambah_user($data);
            if ($query) {
                $output['success'] = true;
                $output['message'] = 'USER BERHASIL DIDAFTAR';
            }
            else {
                $output['success'] = false;
                $output['message'] = 'USER GAGAL DIDAFTARKAN';
            }
        } 
        else {
            $output['success'] = false;
            $output['message'] = 'DATA GAGAL DISIMPAN';
        }
        echo json_encode($output);
    }

    public function detail($id){
        if ($id) {
            $data['detail'] = $this->model_toko->detail($id);
            $this->load->view('toko/v_edit', $data);
        }
        else {
            echo 'id tidak boleh kosong';
        }
    }

    public function edit($id){
        $data['filter_pasar'] = $this->model_toko->filter_pasar();
        $data['filter_kecamatan'] = $this->model_toko->filter_kecamatan();
        $data['filter_desa'] = $this->model_toko->filter_desa();
        $data['filter_komoditas'] = $this->model_toko->filter_komoditas();
        if ($id) {
            $data['detail'] = $this->model_toko->detail($id);
            $this->load->view('toko/v_edit', $data);
        }
        else {
            echo 'id tidak boleh kosong';
        }
    }

    public function get_desa($id){
        if ($id) {
            $data['detail'] = $this->model_toko->get_desa($id);
            $this->load->view('toko/v_list_desa', $data);
        }
        else {
            echo 'id tidak boleh kosong';
        }
    }

    public function update() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nik', 'NIK', 'trim|required');
        $this->form_validation->set_rules('nama_lengkap', 'NAMA LENGKAP', 'trim|required');
        $this->form_validation->set_rules('alamat', 'ALAMAT', 'trim|required');
        $this->form_validation->set_rules('rt', 'RT', 'trim|required');
        $this->form_validation->set_rules('rw', 'rw', 'trim|required');
        $this->form_validation->set_rules('desa', 'desa', 'trim|required');
        $this->form_validation->set_rules('kecamatan', 'kecamatan', 'trim|required');
        $this->form_validation->set_rules('nama_usaha', 'nama_usaha', 'trim|required');
        $this->form_validation->set_rules('telp', 'telp', 'trim|required');
        $this->form_validation->set_rules('komoditas', 'komoditas', 'trim|required');
        $this->form_validation->set_rules('pasar', 'pasar', 'trim|required');
        if($this->form_validation->run()) {
            $data['nik'] = $this->input->post('nik');
            $data['id'] = $this->input->post('id');
            $data['nama_lengkap'] = $this->input->post('nama_lengkap');
            $data['alamat'] = $this->input->post('alamat');
            $data['rt'] = $this->input->post('rt');
            $data['rw'] = $this->input->post('rw');
            $data['desa'] = $this->input->post('desa');
            $data['kecamatan'] = $this->input->post('kecamatan');
            $data['nama_usaha'] = $this->input->post('nama_usaha');
            $data['telp'] = $this->input->post('telp');
            $data['komoditi'] = $this->input->post('komoditas');
            $data['pasar_id'] = $this->input->post('pasar');
            $data['date_created'] = date('Y-m-d H:i:s');
            $query = $this->model_toko->update($data);
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
            $query = $this->model_toko->delete($id);
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