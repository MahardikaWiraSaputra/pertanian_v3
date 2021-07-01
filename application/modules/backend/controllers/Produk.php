<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {
    function __construct(){
        parent::__construct();
        $last_id = '';
        $this->load->model('model_produk');
        $this->auth->cek_auth('data_produk');
    }

    public function index()
    {
        $data['filter_pasar'] = $this->model_produk->filter_pasar();
        $this->load->view('produk/index', $data);
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

        $data['total_items'] = $this->model_produk->list_total($pasar,$like)->num_rows();
        $data['list_items'] = $this->model_produk->list_data($pasar,$like,$limit,$offset)->result();
        
        $this->load->view('produk/v_list', $data );
    }

    // tambah
    public function tambah(){
        $data['filter_toko'] = $this->model_produk->filter_toko();
        $this->load->view('produk/v_tambah', $data);
    }

    public function simpan() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('toko', 'TOKO', 'trim|required');
        $this->form_validation->set_rules('nama_produk', 'nama_produk', 'trim|required');
        $this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');
        $this->form_validation->set_rules('stok', 'stok', 'trim|required');
        $this->form_validation->set_rules('satuan', 'satuan', 'trim|required');
        $this->form_validation->set_rules('harga', 'harga', 'trim|required');
        if($this->form_validation->run()) {
            $data['store_id'] = $this->input->post('toko');
            $data['nama_produk'] = $this->input->post('nama_produk').' '.'1'.' '.$this->input->post('satuan');
            $data['deskripsi'] = $this->input->post('deskripsi');
            $data['stock'] = $this->input->post('stok');
            $data['satuan'] = $this->input->post('satuan');
            $data['harga'] = $this->input->post('harga');
            $data['slug_produk'] = url_title($data['nama_produk']);
            // $query = $this->model_produk->tambah($data);
            $query = $this->db->insert('produk',$data);
            $last_id = $this->db->insert_id();
            if ($query) {
                $output['success'] = true;
                $output['message'] = 'DATA BERHASIL DISIMPAN';
                $output['last_id'] = $last_id;
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

    public function multi_image()
    {
      $countfiles = count($_FILES['files']['name']);
  
      for($i=0;$i<$countfiles;$i++){
        if(!empty($_FILES['files']['name'][$i])){
            
  
          // Define new $_FILES array - $_FILES['file']
          $_FILES['file']['name'] = $_FILES['files']['name'][$i];
          $_FILES['file']['type'] = $_FILES['files']['type'][$i];
          $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
          $_FILES['file']['error'] = $_FILES['files']['error'][$i];
          $_FILES['file']['size'] = $_FILES['files']['size'][$i];
 
          // Set preference
          $config['upload_path'] = './uploads/images/produk'; 
          $config['allowed_types'] = 'jpg|jpeg|png|gif|PNG|JPEG|JPG';
          $config['max_size'] = '50000'; // max_size in kb
          $config['file_name'] = $_FILES['files']['name'][$i];
  
          //Load upload library
          
          $this->load->library('upload',$config); 
          $this->upload->initialize($config);
          $arr = array('msg' => 'something went wrong', 'success' => false);
          // File upload
          if($this->upload->do_upload('file')){
           
           $data = $this->upload->data();
           $insert['produk_id'] = $this->input->post('produk_id');
           $insert['url_image'] = base_url('uploads/images/produk/').$data['file_name'];
           $this->db->insert('gambar_produk',$insert);
        //    $get = $this->db->insert_id();
           $arr = array('msg' => 'Image has been uploaded successfully', 'success' => true);
 
          }
        }
  
      }
      echo json_encode($arr);
  
    }

    // public function detail($id){
    //     if ($id) {
    //         $data['detail'] = $this->model_produk->detail($id);
    //         $this->load->view('umkm_terdaftar/v_detail', $data);
    //     }
    //     else {
    //         echo 'id tidak boleh kosong';
    //     }
    // }

    public function edit($id){
        $data['filter_toko'] = $this->model_produk->filter_toko();
        if ($id) {
            $data['detail'] = $this->model_produk->detail($id);
            $data['foto'] = $this->model_produk->foto($id);
            $this->load->view('produk/v_edit', $data);
        }
        else {
            echo 'id tidak boleh kosong';
        }
    }

    public function hapus_foto(){
        $foto = $this->input->post('foto');
        $local = "https://localhost/".base_url();
        $parse = str_replace("https://localhost/bobawangi_fix/","",$foto);
        $data_foto = array('url_image'=>$foto);
        $hapus_foto = $this->model_produk->hapus_foto($data_foto);
        // var_dump($parse); die;
        if(unlink($parse))  
        {  
            $output['success'] = true;
            $output['message'] = 'DATA BERHASIL DISIMPAN';  
        } else {
            $output['success'] = false;
            $output['message'] = 'DATA GAGAL DISIMPAN';
        }
        echo json_encode($output);
    }

    public function update() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('toko', 'TOKO', 'trim|required');
        $this->form_validation->set_rules('nama_produk', 'nama_produk', 'trim|required');
        $this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');
        $this->form_validation->set_rules('stok', 'stok', 'trim|required');
        $this->form_validation->set_rules('satuan', 'satuan', 'trim|required');
        $this->form_validation->set_rules('harga', 'harga', 'trim|required');
        if($this->form_validation->run()) {
            $data['id_produk'] = $this->input->post('produk_id');
            $data['store_id'] = $this->input->post('toko');
            $data['nama_produk'] = $this->input->post('nama_produk').' '.'1'.' '.$this->input->post('satuan');
            $data['deskripsi'] = $this->input->post('deskripsi');
            $data['stock'] = $this->input->post('stok');
            $data['satuan'] = $this->input->post('satuan');
            $data['harga'] = $this->input->post('harga');
            $data['slug_produk'] = url_title($data['nama_produk']);
            $query = $this->model_produk->update($data);
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
            $query = $this->model_produk->delete($id);
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