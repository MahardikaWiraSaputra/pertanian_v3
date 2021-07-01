<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_kategori extends CI_Model {

    function list_pasar() {
        $this->db->select('a.id, a.nama_pasar');
        $this->db->from('pasar AS a');
        $query = $this->db->get()->result();
        return $query;
    }

    function list_kategori() {
        $this->db->select('a.id_kategori, a.nama_kategori, a.slug_kat');
        $this->db->from('kategori_produk AS a');
        $query = $this->db->get()->result();
        return $query;
    }


    function detail_produk($slug) {
        $this->db->select('a.id_kategori, a.nama_kategori, a.ikon, a.gambar, a.featured_img, a.slug_kat');
        $this->db->from('kategori_produk AS a');
        $this->db->where('a.slug_kat', $slug);
        $query = $this->db->get();

        return $query;
    }

    function list_image_produk($slug) {
        $this->db->select('a.url_image, a.produk_id');
        $this->db->from('gambar_produk AS a');
        $this->db->join('produk AS b', 'a.produk_id = b.id_produk', 'left');
        $this->db->where('b.slug_produk', $slug);
        $query = $this->db->get();
        return $query;
    }

    function detail_toko($id_toko) {
        $this->db->select('a.store_id, b.nama_lengkap, b. nama_usaha, b.pasar, count(a.store_id) as jml_produk');
        $this->db->from('produk AS a');
        $this->db->join('store AS b', 'a.store_id = b.id', 'inner');
        $this->db->where('a.store_id', $id_toko);
        $query = $this->db->get();
        return $query;
    }

    function related_produk($kategori) {
        $this->db->select('a.id_produk, a.store_id, a.nama_produk, a.stock, a.satuan, a.harga, a.is_hide, a.kategori, b.url_image, a.slug_produk, a.nik, a.deskripsi');
        $this->db->from('produk AS a');
        $this->db->join('gambar_produk AS b', 'a.id_produk = b.produk_id', 'left');
        $this->db->where('a.kategori', $kategori);
        $this->db->where('a.nama_produk is not null AND harga is not null and b.url_image is not null');
        $this->db->group_by('a.id_produk');
        $this->db->order_by('rand()');
        $this->db->limit('4');
        $query = $this->db->get();
        return $query;
    }


    function list_sementara() {
        $this->db->select('a.id_produk, a.store_id, a.nama_produk, a.stock, a.satuan, a.harga, a.is_hide, a.kategori, b.url_image, a.slug_produk, a.nik, a.deskripsi');
        $this->db->from('produk AS a');
        $this->db->join('gambar_produk AS b', 'a.id_produk = b.produk_id', 'left');
        $this->db->where('a.nama_produk is not null and b.url_image is not null');
        $this->db->limit('9');
        $this->db->order_by('rand()');
        $query = $this->db->get();
        return $query;
    }


    function get_slug($kat) {
        $this->db->select('a.slug_kat');
        $this->db->from('kategori_produk AS a');
        $this->db->where('a.id_kategori', $kat);
        $query = $this->db->get();

        return $query;
    }



    function list_data($kat,$keyword,$pasar,$limit,$offset) {
        $this->db->select('a.id_produk,
a.store_id,
a.nama_prod,
a.nama_produk,
a.deskripsi,
a.stock,
a.satuan,
a.harga,
a.is_hide,
a.slug_produk,
a.nik,
b.nama_kategori,
c.pasar_id,
d.nama_pasar,
e.url_image');
        $this->db->from('produk AS a');
        $this->db->join('produk_kategori AS ab', 'a.id_produk = ab.produk_id', 'left');
        $this->db->join('kategori_produk AS b', 'ab.kategori_id = b.id_kategori', 'left');
        $this->db->join('store AS c', 'a.store_id = c.id', 'left');
        $this->db->join('pasar AS d', 'c.pasar_id = d.id', 'left');
        $this->db->join('gambar_produk AS e', 'a.id_produk = e.produk_id', 'left');
        
        if($keyword) {
            $this->db->like('a.nama_produk', $keyword);
        }
        if($pasar) {
            if(strpos($pasar, ",") !== false){
                $pecah = explode("," , $pasar);
                 $this->db->where_in('c.pasar_id', $pecah);
            }
            else {
                $this->db->where('c.pasar_id', $pasar);
            }
        }
        if($kat) {
            $this->db->where('ab.kategori_id', $kat);
        }
        
        $this->db->group_by('a.id_produk');

        $this->db->order_by('a.id_produk','DESC');
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query;
    }

    function list_total($kat,$keyword,$pasar) {
        $this->db->select('count(*) as count');
        $this->db->from('produk AS a');
        $this->db->join('produk_kategori AS ab', 'a.id_produk = ab.produk_id', 'left');
        $this->db->join('kategori_produk AS b', 'ab.kategori_id = b.id_kategori', 'left');
        $this->db->join('store AS c', 'a.store_id = c.id', 'left');
        $this->db->join('pasar AS d', 'c.pasar_id = d.id', 'left');
        $this->db->join('gambar_produk AS e', 'a.id_produk = e.produk_id', 'left');
        
        if($keyword) {
            $this->db->like('a.nama_produk', $keyword);
        }
        if($pasar) {
            if(strpos($pasar, ",") !== false){
                $pecah = explode("," , $pasar);
                 $this->db->where_in('c.pasar_id', $pecah);
            }
            else {
                $this->db->where('c.pasar_id', $pasar);
            }
        }
        if($kat) {
            $this->db->where('ab.kategori_id', $kat);
        }
        $this->db->group_by('a.id_produk');
        $query = $this->db->get();
        return $query;
        
    }
}