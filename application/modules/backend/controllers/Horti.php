<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Horti extends CI_Controller {
    function __construct(){
        parent::__construct();
        $last_id = '';
        $this->load->model('model_horti');
        $this->auth->cek_auth('data_produk');
    }

    public function index()
    {
        $data['filter_kecamatan'] = $this->model_horti->kecamatan($this->ion_auth->user()->row()->kecamatan);
        $data['filter_komoditas'] = $this->model_horti->komoditas();
        $data['filter_tahun'] = $this->model_horti->tahun();
        $data['filter_bulan'] = $this->model_horti->bulan();
        $this->load->view('horti/index', $data);
    }

    public function list_data(){
        $page = '1';
        $offset = '0';
        $limit = 25;
        $like = array();
        $kecamatan = '';
        $komoditas = '';
        $bulan = '';
        $tahun = '';

        if (isset($_POST['search_field']) && $_POST['search_field'] != NULL)
        {
            $like = $_POST['search_field'];
        }

        if (isset($_POST['kecamatan']) && $_POST['kecamatan'] != NULL && $_POST['kecamatan'] != 'all')
        {
            $kecamatan = $_POST['kecamatan'];
        }

        if (isset($_POST['komoditas']) && $_POST['komoditas'] != NULL && $_POST['komoditas'] != 'all')
        {
            $komoditas = $_POST['komoditas'];
        }

        if (isset($_POST['tahun']) && $_POST['tahun'] != NULL && $_POST['tahun'] != 'all')
        {
            $tahun = $_POST['tahun'];
        }

        if (isset($_POST['bulan']) && $_POST['bulan'] != NULL && $_POST['bulan'] != 'all')
        {
            $bulan = $_POST['bulan'];
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

        $data['total_items'] = $this->model_horti->list_total($kecamatan,$komoditas,$tahun,$bulan)->num_rows();
        $data['list_items'] = $this->model_horti->list_data($kecamatan,$komoditas,$tahun,$bulan,$limit,$offset)->result();
        
        $this->load->view('horti/v_list', $data );
    }

    public function laporan()
    {
        $data['filter_kecamatan'] = $this->model_horti->kecamatan($this->ion_auth->user()->row()->kecamatan);
        $data['filter_komoditas'] = $this->model_horti->komoditas();
        $data['filter_tahun'] = $this->model_horti->tahun();
        $data['filter_bulan'] = $this->model_horti->bulan();
        $this->load->view('horti/index_laporan', $data);
    }

    public function list_data_laporan(){
        $this->load->view('horti/v_list_laporan' );
    }

    // tambah
    public function tambah(){
        $data['filter_toko'] = $this->model_horti->filter_toko();
        $data['filter_kecamatan'] = $this->model_horti->filter_kecamatan();
        $data['filter_desa'] = $this->model_horti->filter_desa();
        $data['filter_komoditas'] = $this->model_horti->filter_komoditas();
        $data['filter_tahun'] = $this->model_horti->filter_tahun();
        $data['filter_bulan'] = $this->model_horti->filter_bulan();
        $this->load->view('horti/v_tambah', $data);
    }

    public function simpan() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama_tanaman', 'nama_tanaman', 'trim|required');
        if($this->form_validation->run()) {
            $data['nama_tanaman'] = $this->input->post('nama_tanaman');
            $data['hasil_produksi'] = $this->input->post('hasil_produksi');
            $data['luas_tanaman_bulan_lalu'] = $this->input->post('luas_tanaman_akhir_bulan_lalu');
            $data['luas_panen_habis_dibongkar'] = $this->input->post('luas_panen_habis_dibongkar');
            $data['luas_panen_belum_habis'] = $this->input->post('luas_panen_belum_habis');
            $data['luas_rusak_tidak_berhasil'] = $this->input->post('luas_rusak_tidak_berhasil');
            $data['luas_penambahan_baru'] = $this->input->post('luas_penambahan_baru');
            $data['produksi_panen'] = $this->input->post('produksi_panen');
            $data['luas_tanaman_akhir_bulan'] = $this->input->post('luas_tanaman_akhir_bulan');
            $data['produksi_belum_habis'] = $this->input->post('produksi_belum_habis');
            $data['harga_jual'] = $this->input->post('harga_jual');
            $data['bulan'] = $this->input->post('bulan');
            $data['tahun'] = $this->input->post('tahun');
            $data['kecamatan'] = $this->input->post('kecamatan');
            // $query = $this->model_horti->tambah($data);
            $query = $this->db->insert('hortikultura',$data);
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
           $insert['url_image'] = base_url('uploads/images/horti/').$data['file_name'];
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
    //         $data['detail'] = $this->model_horti->detail($id);
    //         $this->load->view('umkm_terdaftar/v_detail', $data);
    //     }
    //     else {
    //         echo 'id tidak boleh kosong';
    //     }
    // }

    public function edit($id){
        $data['filter_kecamatan'] = $this->model_horti->filter_kecamatan();
        $data['filter_desa'] = $this->model_horti->filter_desa();
        $data['filter_komoditas'] = $this->model_horti->filter_komoditas();
        $data['filter_tahun'] = $this->model_horti->filter_tahun();
        $data['filter_bulan'] = $this->model_horti->filter_bulan();
        if ($id) {
            $data['detail'] = $this->model_horti->detail($id);
            $this->load->view('horti/v_edit', $data);
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
        $hapus_foto = $this->model_horti->hapus_foto($data_foto);
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
        $this->form_validation->set_rules('nama_tanaman', 'nama_tanaman', 'trim|required');
        if($this->form_validation->run()) {
            $data['nama_tanaman'] = $this->input->post('nama_tanaman');
            $data['hasil_produksi'] = $this->input->post('hasil_produksi');
            $data['luas_tanaman_bulan_lalu'] = $this->input->post('luas_tanaman_akhir_bulan_lalu');
            $data['luas_panen_habis_dibongkar'] = $this->input->post('luas_panen_habis_dibongkar');
            $data['luas_panen_belum_habis'] = $this->input->post('luas_panen_belum_habis');
            $data['luas_rusak_tidak_berhasil'] = $this->input->post('luas_rusak_tidak_berhasil');
            $data['luas_penambahan_baru'] = $this->input->post('luas_penambahan_baru');
            $data['produksi_panen'] = $this->input->post('produksi_panen');
            $data['luas_tanaman_akhir_bulan'] = $this->input->post('luas_tanaman_akhir_bulan');
            $data['produksi_belum_habis'] = $this->input->post('produksi_belum_habis');
            $data['harga_jual'] = $this->input->post('harga_jual');
            $data['bulan'] = $this->input->post('bulan');
            $data['tahun'] = $this->input->post('tahun');
            $data['id'] = $this->input->post('param');
            $data['kecamatan'] = $this->input->post('kecamatan');
            // $query = $this->model_horti->tambah($data);
            $query = $this->model_horti->update($data);
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
            $query = $this->model_horti->delete($id);
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