<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_umkm extends CI_Model
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

    function list_data($keyword, $kecamatan,$sektor, $limit, $offset) {
        $this->db->select('a.id,
a.umkm_id,
a.deskripsi,
a.slug,
a.`view`,
a.`status`,
a.featured_images,
b.KODE_KEC,
b.NAMA_KEC,
b.KODE_DESA,
b.NAMA_DESA,
b.NAMA_USAHA,
b.NAMA_LGKP,
b.ALAMAT,
b.LONGITUDE,
b.LATITUDE,
b.TELP,
c.sm_facebook,
c.sm_instagram,
c.sm_whastapp,
c.mp_tokopedia,
c.mp_shopee,
c.mp_bukalapak,
c.mp_lazada,
c.mp_blibli');
        $this->db->from('umkm_list AS a');
        $this->db->join('umkm_master_data AS b', 'a.umkm_id = b.ID', 'inner');
        $this->db->join('umkm_media_akun AS c', 'a.umkm_id = c.umkm_id', 'left');
        
        if($keyword) {
            $this->db->like('b.NAMA_USAHA', $keyword);
        }
        if($kecamatan) {
            $this->db->where('b.KODE_KEC', $kecamatan);
        }
        if($sektor) {
            $this->db->where('b.SEKTOR', $sektor);
        }

        $this->db->order_by('a.umkm_id','DESC');
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query;
    }

    function list_total($keyword, $kecamatan,$sektor) {
        $this->db->select('a.umkm_id');
        $this->db->from('umkm_list AS a');
        $this->db->join('umkm_master_data AS b', 'a.umkm_id = b.ID', 'inner');
        $this->db->join('umkm_media_akun AS c', 'a.umkm_id = c.umkm_id', 'left');
        
        if($keyword) {
            $this->db->like('b.NAMA_USAHA', $keyword);
        }
        if($kecamatan) {
            $this->db->where('b.KODE_KEC', $kecamatan);
        }
        if($sektor) {
            $this->db->where('b.SEKTOR', $sektor);
        }
        
        $query = $this->db->get();
        return $query;
        
    }

    function detail_umkm($slug) {
        $this->db->select('a.id,
a.umkm_id,
a.deskripsi,
a.slug,
a.`view`,
a.`status`,
a.featured_images,
b.KODE_KEC,
b.NAMA_KEC,
b.KODE_DESA,
b.NAMA_DESA,
b.NAMA_USAHA,
b.NAMA_LGKP,
b.ALAMAT,
b.LONGITUDE,
b.LATITUDE,
b.TELP,
c.sm_facebook,
c.sm_instagram,
c.sm_whastapp,
c.mp_tokopedia,
c.mp_shopee,
c.mp_bukalapak,
c.mp_lazada,
c.mp_blibli');
        $this->db->from('umkm_list AS a');
        $this->db->join('umkm_master_data AS b', 'a.umkm_id = b.ID', 'inner');
        $this->db->join('umkm_media_akun AS c', 'a.umkm_id = c.umkm_id', 'left');
        $this->db->where('a.slug', $slug);
        $query = $this->db->get();

        return $query;
    }

    function list_image_produk($slug) {
        $this->db->select('b.produk_img');
        $this->db->from('produk AS a');
        $this->db->join('produk_images AS b', 'a.id_produk = b.produk_id', 'inner');
        $this->db->where('a.slug', $slug);
        $query = $this->db->get();
        return $query;
       
        
    }

}