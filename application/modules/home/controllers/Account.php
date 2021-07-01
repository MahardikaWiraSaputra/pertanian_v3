<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller { 

    function __construct(){
        parent::__construct();
        $this->load->model('model_login');
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), 
        $this->config->item('error_end_delimiter', 'ion_auth'));

    }

    public function index(){
        if (!$this->ion_auth->logged_in()) {
            redirect('account/login', 'refresh');
        }
        else {
            redirect('account/account', 'refresh');
        }
    }

    public function login(){
        $data['layout']  =  'account/login';
        $this->form_validation->set_rules('username', 'Identity', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == true){
            if ($this->ion_auth->login($this->input->post('username'), $this->input->post('password'))) {
                $output['success'] = true;
                $output['message'] = $this->ion_auth->messages();
                $output['url'] = base_url().'backend/main/';
            }
            else
            {
                $output['success'] = false;
                $output['message'] = $this->ion_auth->errors();
                // redirect('auth/login', 'refresh');
            }

            echo json_encode($output); 
        }
        else
        {
            $data['title'] = 'Administrator Login';
            $this->load->view('home/layout', $data);
        }
    }

    public function logout(){
        $data['title'] = 'Logout Administrator';
        if( $this->ion_auth->logout() ){
            $this->session->set_flashdata('message', $this->ion_auth->messages());
            $this->session->unset_userdata('periode');
            redirect('backend/login', 'refresh');
        }else{
            die(lang('logout_failed'));
        }
    }

    public function account(){
        $data['layout']  =  'account/account';
        $this->load->view('home/layout', $data);
    } 


}
