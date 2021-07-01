<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_home extends CI_Model
{

    function list_kecamatan() {
        $this->db->select('a.nama_kecamatan, a.no_kec');
        $this->db->from('master_wilayah AS a');
        $this->db->group_by('a.no_kec');
        $query = $this->db->get()->result_array();
        $data[''] = 'Pilih Kecamatan';
        foreach ($query as $row):
            $data[$row['no_kec']] = $row['nama_kecamatan'];
        endforeach;
        $data['semua'] = 'Semua Kecamatan';

        return $data;
    }


    function list_sektor() {
        $query = array(['SEKTOR' => 'PERDAGANGAN'], ['SEKTOR' => 'JASA'], ['SEKTOR' => 'INDUSTRI']);
        $data[''] = 'Pilih Sektor';
        foreach ($query as $row):
            $data[$row['SEKTOR']] = $row['SEKTOR'];
        endforeach;
        $data['semua'] = 'Semua Sektor';
        return $data;
    }


    function list_kategori() {
        $this->db->select('a.id_kategori, a.nama_kategori, a.ikon, a.gambar, a.featured_img, a.slug_kat');
        $this->db->from('kategori_produk AS a');
        $this->db->order_by('a.id_kategori', 'ASC');
        $this->db->limit('11');
        $query = $this->db->get();

        return $query;
    }


    function produk_terpopuler() {
        $this->db->select('a.id_produk,
a.store_id,
a.nama_produk,
a.stock,
a.satuan,
a.harga,
a.is_hide,
a.kategori,
b.url_image,
a.slug_produk,
a.nik,
a.deskripsi');
        $this->db->from('produk AS a');
        $this->db->join('gambar_produk AS b', 'a.id_produk = b.produk_id', 'left');
        $this->db->where('a.nama_produk is not null and b.url_image is not null');
        $this->db->order_by('rand()');
        $this->db->limit('8');
        
        $query = $this->db->get();
        return $query;
    }

    function produk_terbaru() {
        $this->db->select('a.id_produk,
a.store_id,
a.nama_produk,
a.stock,
a.satuan,
a.harga,
a.is_hide,
a.kategori,
b.url_image,
a.slug_produk,
a.nik,
a.deskripsi');
        $this->db->from('produk AS a');
        $this->db->join('gambar_produk AS b', 'a.id_produk = b.produk_id', 'left');
        $this->db->where('a.nama_produk is not null AND harga is not null and b.url_image is not null');
        $this->db->order_by('a.id_produk', 'ASC');
        $this->db->limit('4');
        $query = $this->db->get();
        return $query;
    }

   

}