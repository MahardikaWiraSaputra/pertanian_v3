<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->library('session');
    }

    public function index(){
        if (!$this->ion_auth->logged_in()) {
            redirect('backend/login/sign', 'refresh');
        }
        else {
            redirect('backend/main/', 'refresh');
        }
    }

}