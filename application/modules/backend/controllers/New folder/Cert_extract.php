<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cert_extract extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->auth->cek_auth('extract_cert');
    }

    public function index(){
        $data = '';
        $this->load->view('tools/extract', $data);
    }

    public function extract() {

        if(!empty($_FILES['files']['name']))
        {
            $config['upload_path'] = "./uploads/temp/";
            $config['allowed_types'] = 'crt|pem';
            $config['file_name'] = $_FILES['files']['name'];
            $this->upload->initialize($config);
            
            if($this->upload->do_upload('files')){
                $uploads = $this->upload->data();

                $certFile = file_get_contents($config['upload_path'].$uploads['file_name']);
                $certinfo = openssl_x509_parse($certFile);
                if ($certinfo) {
                	if (isset($certinfo['subject']['description'])) {
	                    $deskripsi = $certinfo['subject']['description'];
	                } else {
	                    $deskripsi = '-';
	                }
	                
	                $data['result'] ='
	                	<div class="box">
						    <div class="box-body">
						        <div class="col-md-12">
						            <table class="table">
						                <tr>
						                    <td width="20%"><strong>DESCRIPTION</strong></td>
						                    <td width="3%"> : </td>
						                    <td>'.$deskripsi.'</td>
						                </tr>
						                <tr>
						                    <td><strong>FULL NAME</strong></td>
						                    <td> : </td>
						                    <td>'.$certinfo['subject']['CN'].'</td>
						                </tr>
						                <tr>
						                    <td><strong>EMAIL ADDRESS</strong></td>
						                    <td> : </td>
						                    <td><span id="info_email">'.$certinfo['subject']['emailAddress'].'</span> <i class="fa fa-clipboard float-right btn" data-clipboard-action="copy" data-clipboard-target="#info_email"></i></td>
						                </tr>
						                <tr>
						                    <td><strong>ORGANIZATION NAME</strong></td>
						                    <td> : </td>
						                    <td>'.$certinfo['subject']['O'].'</td>
						                </tr>
						                <tr>
						                    <td><strong>ORGANIZATION UNIT NAME</strong></td>
						                    <td> : </td>
						                    <td>'.$certinfo['subject']['OU'].'</td>
						                </tr>
						                <tr>
						                    <td><strong>LOCALITY NAME</strong></td>
						                    <td> : </td>
						                    <td>'.$certinfo['subject']['L'].'</td>
						                </tr>
						                <tr>
						                    <td><strong>STATE NAME</strong></td>
						                    <td> : </td>
						                    <td>'.$certinfo['subject']['ST'].'</td>
						                </tr>
						                <tr>
						                    <td><strong>COUNTRY NAME</strong></td>
						                    <td> : </td>
						                    <td>'.$certinfo['subject']['C'].'</td>
						                </tr>
						                <tr>
						                    <td><strong>VALID FROM</strong></td>
						                    <td> : </td>
						                    <td>'.date("Y-m-d", $certinfo['validFrom_time_t']).'</td>
						                </tr>
						                <tr>
						                    <td><strong>VALID TO</strong></td>
						                    <td> : </td>
						                    <td>'.date("Y-m-d", $certinfo['validTo_time_t']).'</td>
						                </tr>
						            </table>
						        </div>
						    </div>
						</div>
	                ';
                }
                else {
                	$data['result'] ='
	                	<div class="box">
						    <div class="box-body">
						        <div class="col-md-12">
						        	<div class="text-center"><h3>Sertifikat tidak dapat diverifikasi.</h3></div>
						        </div>
						    </div>
						</div>
                	';
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