<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Filter extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('model_filter');
        if( ! $this->ion_auth->logged_in() )
            redirect('/login');       
    }

    public function get_instansi(){
        $data['get_instansi'] = $this->model_filter->instansi();
        $this->load->view('v_filter_urusan', $data);
    } 

    public function filter_tipe(){
        $tipe = $this->m_dropdown->dropdown_filter();
        return $tipe;
    } 



}