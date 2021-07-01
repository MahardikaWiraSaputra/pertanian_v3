<?php
use Restserver\Libraries\REST_Controller;
require(APPPATH.'/libraries/REST_Controller.php');

defined('BASEPATH') OR exit('No direct script access allowed');

class Api_services extends REST_Controller {    

    function __construct(){
        parent::__construct();
        $this->load->model('model_api_services');
    }

    public function index_post(){
        
        $this->response($response, $response['status_code']);
    }

    public function insert_passphrase_post(){
        $data['request_id'] = htmlentities($this->input->post('REQID'));
        $data['nip'] = htmlentities($this->input->post('NIP'));
        $data['nama_lgkp'] = htmlentities($this->input->post('NAMA_LGKP'));
        $data['kd_unor'] = htmlentities($this->input->post('KD_UNOR'));
        $data['telp'] = htmlentities($this->input->post('TELP'));
        $data['referensi'] = htmlentities($this->input->post('KODEREF'));
        $data['status'] = htmlentities($this->input->post('status'));
        $data['created'] = date('y-m-d h:i:s');
        if($this->input->post('berkas')) {
            $data['berkas'] = $this->berkas_passphrase();
        }
        $query = $this->model_api_services->insert_passphrase($data);
        if ($query) {
            $response['status_code'] = 200;
            $response['status_message'] = 'DATA BERHASIL DISIMPAN';
        }
        else {
            $response['status_code'] = 500;
            $response['status_message'] = 'DATA GAGAL DISIMPAN';
        }
        $this->response($response, $response['status_code']);
    }

    public function status_passphrase_post(){
        $data['request_id'] = htmlentities($this->input->post('REQID'));
        $data['nip'] = htmlentities($this->input->post('NIP'));
        $data['nama_lgkp'] = htmlentities($this->input->post('NAMA_LGKP'));
        $data['kd_unor'] = htmlentities($this->input->post('KD_UNOR'));
        $data['telp'] = htmlentities($this->input->post('TELP'));
        $data['referensi'] = htmlentities($this->input->post('KODEREF'));
        $data['modified'] = date('y-m-d h:i:s');
        if($this->input->post('berkas')) {
            $data['berkas'] = $this->berkas_passphrase();
        }
        $data['tahap_status'] = $this->input->post('TAHAP_STATUS');

        if (!empty($this->input->post('is_verified'))) {
            $data['is_verified'] = $this->input->post('is_verified');
        }

        if (!empty($this->input->post('alasan'))) {
            $data['alasan'] = $this->input->post('alasan');
        }

        $query = $this->model_api_services->update_passphrase($data);
        if ($query) {

            $data2['id_request'] = $this->input->post('reqid');
            $data2['req'] = '2';
            $data2['tahap'] = $this->input->post('tahap');
            $data2['tanggal'] =  date('Y-m-d H:i:s');
            $cek_tahap = $this->model_passphrase_req->cek_pass_tahap($data2['id_request'], $data2['req'], $data2['tahap']);

            if ($cek_tahap < 1) {
                $insert_tahap = $this->model_passphrase_req->insert_pass_tahap($data2);
            }

            $response['status_code'] = 200;
            $response['status_message'] = 'DATA BERHASIL DISIMPAN';
        }
        else {
            $response['status_code'] = 500;
            $response['status_message'] = 'DATA GAGAL DISIMPAN';
        }
        $this->response($response, $response['status_code']);
    }

    public function remove_passphrase_post(){
        $data['request_id'] = htmlentities($this->input->post('REQID'));
        $query = $this->model_api_services->remove_passphrase($data);
        if ($query) {
            $response['status_code'] = 200;
            $response['status_message'] = 'DATA BERHASIL DISIMPAN';
        }
        else {
            $response['status_code'] = 500;
            $response['status_message'] = 'DATA GAGAL DISIMPAN';
        }
        $this->response($response, $response['status_code']);
    }


    private function berkas_passphrase() {
        $data_berkas = htmlentities($this->input->post('berkas'));
        $temp_path = FCPATH.'uploads/request/pass/';
        $file_name = basename($data_berkas);
        $context = stream_context_create(
                        array("http" => array("header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36")));
        $get_url = file_get_contents($data_berkas, false, $context);

        $write_file = fopen($temp_path . $file_name, "wb");
        fwrite($write_file, $get_url);
        fclose($write_file);
        
        $urlfiles = base_url().'uploads/request/pass/'.$file_name;

        if ($write_file) {
            return json_decode(json_encode($urlfiles), TRUE);
        }
    }

    public function insert_nomer_post(){
        $data['request_id'] = htmlentities($this->input->post('REQID'));
        $data['nip'] = htmlentities($this->input->post('NIP'));
        $data['nama_lgkp'] = htmlentities($this->input->post('NAMA_LGKP'));
        $data['kd_unor'] = htmlentities($this->input->post('KD_UNOR'));
        $data['telp'] = htmlentities($this->input->post('TELP'));
        $data['no_lama'] = htmlentities($this->input->post('NO_LAMA'));
        $data['no_baru'] = htmlentities($this->input->post('NO_BARU'));
        $data['referensi'] = htmlentities($this->input->post('KODEREF'));
        $data['status'] = htmlentities($this->input->post('status'));
        $data['created'] = date('y-m-d h:i:s');
        if($this->input->post('berkas')) {
            $data['berkas'] = $this->berkas_nomer();
        }
        $query = $this->model_api_services->insert_nomer($data);
        if ($query) {
            $response['status_code'] = 200;
            $response['status_message'] = 'DATA BERHASIL DISIMPAN';
        }
        else {
            $response['status_code'] = 500;
            $response['status_message'] = 'DATA GAGAL DISIMPAN';
        }
        $this->response($response, $response['status_code']);
    }

    public function update_nomer_post(){
        $data['request_id'] = htmlentities($this->input->post('REQID'));
        $data['nip'] = htmlentities($this->input->post('NIP'));
        $data['nama_lgkp'] = htmlentities($this->input->post('NAMA_LGKP'));
        $data['kd_unor'] = htmlentities($this->input->post('KD_UNOR'));
        $data['telp'] = htmlentities($this->input->post('TELP'));
        $data['no_lama'] = htmlentities($this->input->post('NO_LAMA'));
        $data['no_baru'] = htmlentities($this->input->post('NO_BARU'));
        $data['referensi'] = htmlentities($this->input->post('KODEREF'));
        $data['status'] = htmlentities($this->input->post('status'));
        $data['modified'] = date('y-m-d h:i:s');
        if($this->input->post('berkas')) {
            $data['berkas'] = $this->berkas_nomer();
        }
        $query = $this->model_api_services->update_nomer($data);
        if ($query) {
            $response['status_code'] = 200;
            $response['status_message'] = 'DATA BERHASIL DISIMPAN';
        }
        else {
            $response['status_code'] = 500;
            $response['status_message'] = 'DATA GAGAL DISIMPAN';
        }
        $this->response($response, $response['status_code']);
    }

    public function remove_nomer_post(){
        $data['request_id'] = htmlentities($this->input->post('REQID'));
        $query = $this->model_api_services->remove_nomer($data);
        if ($query) {
            $response['status_code'] = 200;
            $response['status_message'] = 'DATA BERHASIL DISIMPAN';
        }
        else {
            $response['status_code'] = 500;
            $response['status_message'] = 'DATA GAGAL DISIMPAN';
        }
        $this->response($response, $response['status_code']);
    }

    private function berkas_nomer() {
        $data_berkas = htmlentities($this->input->post('berkas'));
        $temp_path = FCPATH.'uploads/request/nomer/';
        $file_name = basename($data_berkas);
        $context = stream_context_create(
                        array("http" => array("header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36")));
        $get_url = file_get_contents($data_berkas, false, $context);

        $write_file = fopen($temp_path . $file_name, "wb");
        fwrite($write_file, $get_url);
        fclose($write_file);
        
        $urlfiles = base_url().'uploads/request/nomer/'.$file_name;

        if ($write_file) {
            return json_decode(json_encode($urlfiles), TRUE);
        }
    }
 
}
