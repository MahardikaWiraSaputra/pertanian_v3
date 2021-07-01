<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_produk extends CI_Model
{


    function list_data($keyword, $kecamatan,$sektor, $limit, $offset) {
        $this->db->select('a.umkm_id, a.nama_produk, a.deskripsi_produk, a.harga_produk, a.status_stok, a.slug as slug_produk, a.`view`, b.slug, c.NAMA_USAHA, c.ALAMAT, c.TELP, c.KODE_KEC, c.NAMA_KEC, c.KODE_DESA, c.NAMA_DESA, c.LONGITUDE, c.LATITUDE, d.sm_facebook, d.sm_instagram, d.sm_whastapp, d.mp_tokopedia, d.mp_shopee, d.mp_bukalapak, d.mp_lazada, d.mp_blibli, e.produk_img');
        $this->db->from('produk AS a');
        $this->db->join('umkm_list AS b', 'a.umkm_id = b.umkm_id', 'inner');
        $this->db->join('umkm_master_data AS c', 'b.umkm_id = c.ID', 'inner');
        $this->db->join('umkm_media_akun AS d', 'c.ID = d.umkm_id', 'left');
        $this->db->join('produk_images AS e', 'a.id_produk = e.produk_id', 'left');
        
        if($keyword) {
            $this->db->like('a.nama_produk', $keyword);
        }
        if($kecamatan) {
            $this->db->where('a.KODE_KEC', $kecamatan);
        }
        if($sektor) {
            $this->db->where('a.SEKTOR', $sektor);
        }
        
        $this->db->group_by('a.umkm_id');

        $this->db->order_by('a.umkm_id','DESC');
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query;
    }

    function list_total($keyword, $kecamatan,$sektor) {
        $this->db->select('count(*) as count');
        $this->db->from('produk AS a');
        $this->db->join('umkm_list AS b', 'a.umkm_id = b.umkm_id', 'inner');
        $this->db->join('umkm_master_data AS c', 'b.umkm_id = c.ID', 'inner');
        $this->db->join('umkm_media_akun AS d', 'c.ID = d.umkm_id', 'left');
        $this->db->join('produk_images AS e', 'a.id_produk = e.produk_id', 'left');
        
        if($keyword) {
            $this->db->like('a.nama_produk', $keyword);
        }
        if($kecamatan) {
            $this->db->where('a.KODE_KEC', $kecamatan);
        }
        if($sektor) {
            $this->db->where('a.SEKTOR', $sektor);
        }
        
        $this->db->group_by('a.umkm_id');
        $query = $this->db->get();
        return $query;
        
    }

    function detail_produk($slug) {
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
a.deskripsi,
c.nama_lengkap,
c. nama_usaha,
c.pasar
');
        $this->db->from('produk AS a');
        $this->db->join('gambar_produk AS b', 'a.id_produk = b.produk_id', 'left');
        $this->db->join('store AS c', 'a.store_id = c.id', 'inner');
        $this->db->where('a.slug_produk', $slug);
        $query = $this->db->get();

        // if ($query->num_rows() > 0) {
        //     return $query->row();
        // }
        // return false;

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
        $this->db->select('a.store_id, b.nama_lengkap,
b. nama_usaha,
b.pasar, count(a.store_id) as jml_produk');
        $this->db->from('produk AS a');
        $this->db->join('store AS b', 'a.store_id = b.id', 'inner');
        $this->db->where('a.store_id', $id_toko);
        $query = $this->db->get();
        return $query;
    }

    function related_produk($kategori) {
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
        $this->db->where('a.kategori', $kategori);
        $this->db->where('a.nama_produk is not null AND harga is not null and b.url_image is not null');
        $this->db->group_by('a.id_produk');
        $this->db->order_by('rand()');
        $this->db->limit('4');
        $query = $this->db->get();
        return $query;
    }


    function list_sementara() {
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
        $this->db->limit('9');
        $this->db->order_by('rand()');
        $query = $this->db->get();
        return $query;
    }


}