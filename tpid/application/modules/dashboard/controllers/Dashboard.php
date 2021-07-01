<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		$data['layout'] = 'index';
		$this->load->view('layout',$data);
	}

	public function kategori($param)
	{
		$data['kategori'] = $param;
		$data['layout'] = 'v_kategori';
		$this->load->view('layout',$data);
	}
}