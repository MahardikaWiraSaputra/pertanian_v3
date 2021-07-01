<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller { 

    function __construct(){
        parent::__construct();
        $this->load->model('model_home');
    }

    public function index(){

        $data['layout']  =  'main/index';
        $data['list_kategori']  = $this->model_home->list_kategori()->result();
        $data['produk_terpopuler']  = $this->model_home->produk_terpopuler()->result();
        $data['produk_terbaru']  = $this->model_home->produk_terbaru()->result();
	    $this->load->view('home/layout', $data);
    }

    public function get_maps(){
        $data_listing = $this->model_home->listing_produk_maps()->result_array();

        foreach($data_listing as $value){
        if ($value['produk_img'] !== null) {
            $produk_img = site_url('uploads/images/produk/'.$value['produk_img']);
        }
        else {
            $produk_img = site_url('uploads/images/produk/no-images.jpg');
        }
        $data[] = array(
            'type_point' => $value['NAMA_USAHA'],
            'name' => $value['nama_produk'],
            'location_latitude' => $value['LATITUDE'],
            'location_longitude' => $value['LONGITUDE'],
            'map_image_url' => $produk_img,
            'name_point' => $value['nama_produk'],
            'url_point' => base_url('produk/'.$value['slug_produk']),
            'view' => $value['view'].' kali dilihat');
        }
        echo json_encode($data);
    }


}
