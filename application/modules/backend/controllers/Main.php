<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('model_main');
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
        $data = '';
        // $data['jumlah_per_unit'] = $this->model_main->total_per_unit();
        // $data['chart'] = json_encode($data['jumlah_per_unit']);
        $this->load->view('main/dashboard', $data);
    }


}