<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('model_dashboard');
        $this->auth->cek_auth('dashboard');
        // if (!$this->ion_auth->logged_in()) {
        //     redirect('/backend/login');
        // }
    }

    public function index(){
        $data['page'] = 'main/index';
        $this->load->view('backend/layout', $data);
    }

    public function dashboard(){
        $data['total_sertifikat'] = $this->model_dashboard->total_sertifikat();
        $data['total_dokumen'] = $this->model_dashboard->total_dokumen();
        $data['total_request'] = $this->model_dashboard->total_request();
        $data['total_aduan'] = $this->model_dashboard->total_aduan();
        $data['aduan_status'] = $this->model_dashboard->aduan_status();
        $data['request_status'] = $this->model_dashboard->request_status();
        // $data['jumlah_per_unit'] = $this->model_dashboard->total_per_unit();
        // $data['chart'] = json_encode($data['jumlah_per_unit']);
        $this->load->view('main/dashboard', $data);
    }


}