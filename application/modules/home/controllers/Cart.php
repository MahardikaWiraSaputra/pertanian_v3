<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller { 

    function __construct(){
        parent::__construct();
    }

    public function index(){

        $data['layout']  =  'cart/index';
	    $this->load->view('home/layout', $data);
    }


    public function checkout(){

        $data['layout']  =  'cart/checkout';
	    $this->load->view('home/layout', $data);
    }



}
