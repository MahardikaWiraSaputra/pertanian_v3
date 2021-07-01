<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cert_convert extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->auth->cek_auth('convert_cert');
    }

    public function index(){
        $data = '';
        $this->load->view('tools/convert', $data);
    }

    public function convert() {

        if(!empty($_FILES['files']['name']) && !empty($this->input->post('passphrase')))
        {
            $config['upload_path'] = "./uploads/temp/";
            $config['allowed_types'] = 'p12';
            $config['file_name'] = $_FILES['files']['name'];
            $this->upload->initialize($config);
            if($this->upload->do_upload('files')){
                $uploads = $this->upload->data();
                $convert_path = './uploads/temp/';
                $convert_name = $_FILES['files']['name'];
                $passphrase = $this->input->post('passphrase');
                $file_cert = file_get_contents($config['upload_path'].$uploads['file_name']);
                $results = array();
                $read_cert = openssl_pkcs12_read($file_cert, $results, $passphrase);
                if(!$read_cert) {
                    $response = openssl_error_string();
                }
                else {
                    $export_key = openssl_pkey_export_to_file($results['pkey'], "".$convert_path.$convert_name.".key", $passphrase);
                    if($export_key) {
                        $export_cert  = openssl_x509_export_to_file($results['cert'], "".$convert_path.$convert_name.".crt");
                    }
                    $response ='sukses';
                }

                $data['success'] = true;
                $data['message'] = $uploads['file_name'].' Berhasil diupload';
                unlink(realpath($config['upload_path'].$uploads['file_name']));
            }  
            else {  
                $data['success'] = false;
                $data['message'] = $_FILES['files']['name'].' Gagal diupload';
            }  
        }  
        echo json_encode($data);
    }

}