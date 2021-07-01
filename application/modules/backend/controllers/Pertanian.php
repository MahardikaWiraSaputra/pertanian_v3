<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pertanian extends CI_Controller {
    function __construct(){
        parent::__construct();
        $last_id = '';
        $this->load->model('model_pertanian');
        $this->auth->cek_auth('data_produk');
    }

    public function index()
    {
        $data['filter_kecamatan'] = $this->model_pertanian->kecamatan($this->ion_auth->user()->row()->kecamatan);
        $data['filter_komoditas'] = $this->model_pertanian->komoditas();
        $data['filter_tahun'] = $this->model_pertanian->tahun();
        $data['filter_bulan'] = $this->model_pertanian->bulan();
        $this->load->view('pertanian/index', $data);
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

        $data['total_items'] = $this->model_pertanian->list_total($kecamatan,$komoditas,$tahun,$bulan)->num_rows();
        $data['list_items'] = $this->model_pertanian->list_data($kecamatan,$komoditas,$tahun,$bulan,$limit,$offset)->result();
        
        $this->load->view('pertanian/v_list', $data );
    }

    public function laporan(){
        $data['filter_kecamatan'] = $this->model_pertanian->kecamatan($this->ion_auth->user()->row()->kecamatan);
        $data['filter_komoditas'] = $this->model_pertanian->komoditas();
        $data['filter_tahun'] = $this->model_pertanian->tahun();
        $data['filter_bulan'] = $this->model_pertanian->bulan();
        $this->load->view('pertanian/index_laporan', $data);
    }

    public function list_data_laporan(){
        $this->load->view('pertanian/v_list_laporan' );
    }

    // tambah
    public function tambah(){
        $data['filter_toko'] = $this->model_pertanian->filter_toko();
        $data['filter_kecamatan'] = $this->model_pertanian->filter_kecamatan();
        $data['filter_desa'] = $this->model_pertanian->filter_desa();
        $data['filter_komoditas'] = $this->model_pertanian->filter_komoditas();
        $data['filter_tahun'] = $this->model_pertanian->filter_tahun();
        $data['filter_bulan'] = $this->model_pertanian->filter_bulan();
        $this->load->view('pertanian/v_tambah', $data);
    }

    public function excel(){
        $data['filter_toko'] = $this->model_pertanian->filter_toko();
        $data['filter_kecamatan'] = $this->model_pertanian->filter_kecamatan();
        $data['filter_desa'] = $this->model_pertanian->filter_desa();
        $data['filter_komoditas'] = $this->model_pertanian->filter_komoditas();
        $data['filter_tahun'] = $this->model_pertanian->filter_tahun();
        $data['filter_bulan'] = $this->model_pertanian->filter_bulan();
        $this->load->view('pertanian/upload', $data);
    }

    public function get_sub($id){
        if($id == 'sub_round_1'){
            $this->load->view('pertanian/v_sub/sub_1');
        } elseif($id == 'sub_round_2'){
            $this->load->view('pertanian/v_sub/sub_2');
        } else {
            $this->load->view('pertanian/v_sub/sub_3');
        }
    }

    public function edit_sub($sub_round,$tahun,$komoditas){
        $data['detail'] = $this->model_pertanian->detail_sub($sub_round,$tahun,$komoditas);
        if($sub_round == 'sub_round_1'){
            $this->load->view('pertanian/v_sub_edit/sub_1',$data);
        } elseif($sub_round == 'sub_round_2'){
            $this->load->view('pertanian/v_sub_edit/sub_2',$data);
        } else {
            $this->load->view('pertanian/v_sub_edit/sub_3',$data);
        }
    }

    public function get_desa($id){
        if ($id) {
            $data['detail'] = $this->model_pertanian->get_desa($id);
            $this->load->view('toko/v_list_desa', $data);
        }
        else {
            echo 'id tidak boleh kosong';
        }
    }

    public function simpan() {
        $kecamatan = $this->input->post('kecamatan');
        $desa = $this->input->post('desa');
        $komoditas = $this->input->post('komoditas');
        $tahun = $this->input->post('tahun');
        $sub_round = $this->input->post('sub_round');
        $is_kecamatan = $this->input->post('is_kecamatan');

        $provitas = $this->input->post('provitas');
        $luas_tanam = $this->input->post('lt');
        $luas_panen = $this->input->post('lp');
        $produksi = $this->input->post('produksi');

        $array_bulan = '';
        if($sub_round == 'sub_round_1'){
            $array_bulan = array('JANUARI','FEBRUARI','MARET','APRIL');
        } elseif($sub_round == 'sub_round_2'){
            $array_bulan = array('MEI','JUNI','JULI','AGUSTUS');
        } else {
            $array_bulan = array('SEPTEMBER','OKTOBER','NOVEMBER','DESEMBER');
        }

        $data = array();
        
        $index = 0; // Set index array awal dengan 0
        foreach($array_bulan as $res){ // Kita buat perulangan berdasarkan nis sampai data terakhir
        array_push($data, array(
            'desa'=>$desa,
            'kecamatan'=>$kecamatan,
            'bulan'=>$res,
            'tahun'=>$tahun,
            'provitas'=>$provitas[$index],
            'luas_tanam'=>$luas_tanam[$index],
            'luas_panen'=>$luas_panen[$index],
            'produksi'=>$produksi[$index],
            'komoditas'=>$komoditas,
            'kategori'=>$sub_round,
            'tipe'=>$is_kecamatan
        ));
            $index++;
        }

        $query = $this->db->insert_batch('tanaman_pangan',$data);

        // $this->load->library('form_validation');
        // $this->form_validation->set_rules('toko', 'TOKO', 'trim|required');
        // $this->form_validation->set_rules('nama_produk', 'nama_produk', 'trim|required');
        // $this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');
        // $this->form_validation->set_rules('stok', 'stok', 'trim|required');
        // $this->form_validation->set_rules('satuan', 'satuan', 'trim|required');
        // $this->form_validation->set_rules('harga', 'harga', 'trim|required');
        // if($this->form_validation->run()) {
        //     $data['store_id'] = $this->input->post('toko');
        //     $data['nama_produk'] = $this->input->post('nama_produk').' '.'1'.' '.$this->input->post('satuan');
        //     $data['deskripsi'] = $this->input->post('deskripsi');
        //     $data['stock'] = $this->input->post('stok');
        //     $data['satuan'] = $this->input->post('satuan');
        //     $data['harga'] = $this->input->post('harga');
        //     $data['slug_produk'] = url_title($data['nama_produk']);
        //     // $query = $this->model_pertanian->tambah($data);
        //     $query = $this->db->insert('produk',$data);
        //     $last_id = $this->db->insert_id();
        if ($query) {
                $output['success'] = true;
                $output['message'] = 'DATA BERHASIL DISIMPAN';
        } else {
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
           $insert['url_image'] = base_url('uploads/images/pertanian/').$data['file_name'];
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
    //         $data['detail'] = $this->model_pertanian->detail($id);
    //         $this->load->view('umkm_terdaftar/v_detail', $data);
    //     }
    //     else {
    //         echo 'id tidak boleh kosong';
    //     }
    // }

    public function edit($id,$tahun){
        $data['filter_toko'] = $this->model_pertanian->filter_toko();
        $data['filter_toko'] = $this->model_pertanian->filter_toko();
        $data['filter_kecamatan'] = $this->model_pertanian->filter_kecamatan();
        $data['filter_desa'] = $this->model_pertanian->filter_desa_all();
        $data['filter_komoditas'] = $this->model_pertanian->filter_komoditas();
        $data['filter_tahun'] = $this->model_pertanian->filter_tahun();
        $data['filter_bulan'] = $this->model_pertanian->filter_bulan();
        if ($id) {
            $data['detail'] = $this->model_pertanian->detail($id,$tahun);
            $this->load->view('pertanian/v_edit', $data);
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
        $hapus_foto = $this->model_pertanian->hapus_foto($data_foto);
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
        $kecamatan = $this->input->post('kecamatan');
        $desa = $this->input->post('desa');
        $komoditas = $this->input->post('komoditas');
        $tahun = $this->input->post('tahun');
        $sub_round = $this->input->post('sub_round');
        $is_kecamatan = $this->input->post('is_kecamatan');

        $provitas = $this->input->post('provitas');
        $luas_tanam = $this->input->post('lt');
        $luas_panen = $this->input->post('lp');
        $produksi = $this->input->post('produksi');

        $array_bulan = '';
        if($sub_round == 'sub_round_1'){
            $array_bulan = array('JANUARI','FEBRUARI','MARET','APRIL');
        } elseif($sub_round == 'sub_round_2'){
            $array_bulan = array('MEI','JUNI','JULI','AGUSTUS');
        } else {
            $array_bulan = array('SEPTEMBER','OKTOBER','NOVEMBER','DESEMBER');
        }

        $data = array();
        
        $index = 0; // Set index array awal dengan 0
        foreach($array_bulan as $res){ // Kita buat perulangan berdasarkan nis sampai data terakhir
        array_push($data, array(
            'desa'=>$desa,
            'kecamatan'=>$kecamatan,
            'bulan'=>$res,
            'tahun'=>$tahun,
            'provitas'=>$provitas[$index],
            'luas_tanam'=>$luas_tanam[$index],
            'luas_panen'=>$luas_panen[$index],
            'produksi'=>$produksi[$index],
            'komoditas'=>$komoditas,
            'kategori'=>$sub_round,
            'tipe'=>$is_kecamatan
        ));
            $index++;
        }

        $this->db->where('kategori',$sub_round);
        $this->db->where('tahun',$tahun);
        $this->db->delete('tanaman_pangan');

        $query = $this->db->insert_batch('tanaman_pangan',$data);

        // $this->load->library('form_validation');
        // $this->form_validation->set_rules('toko', 'TOKO', 'trim|required');
        // $this->form_validation->set_rules('nama_produk', 'nama_produk', 'trim|required');
        // $this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');
        // $this->form_validation->set_rules('stok', 'stok', 'trim|required');
        // $this->form_validation->set_rules('satuan', 'satuan', 'trim|required');
        // $this->form_validation->set_rules('harga', 'harga', 'trim|required');
        // if($this->form_validation->run()) {
        //     $data['store_id'] = $this->input->post('toko');
        //     $data['nama_produk'] = $this->input->post('nama_produk').' '.'1'.' '.$this->input->post('satuan');
        //     $data['deskripsi'] = $this->input->post('deskripsi');
        //     $data['stock'] = $this->input->post('stok');
        //     $data['satuan'] = $this->input->post('satuan');
        //     $data['harga'] = $this->input->post('harga');
        //     $data['slug_produk'] = url_title($data['nama_produk']);
        //     // $query = $this->model_pertanian->tambah($data);
        //     $query = $this->db->insert('produk',$data);
        //     $last_id = $this->db->insert_id();
        if ($query) {
                $output['success'] = true;
                $output['message'] = 'DATA BERHASIL DISIMPAN';
        } else {
                $output['success'] = false;
                $output['message'] = 'DATA GAGAL DISIMPAN';
        }
        echo json_encode($output);
    }

    public function updatex() {
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
            $query = $this->model_pertanian->update($data);
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

    public function delete($kategori,$tahun){
        if($kategori) {         
            $query = $this->model_pertanian->delete($kategori,$tahun);
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