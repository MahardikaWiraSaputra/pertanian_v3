<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_produk extends CI_Model{

    function filter_pasar(){
        $this->db->select('a.id,a.nama_pasar');
        $this->db->from('pasar as a');
        $query = $this->db->get();
        $data['all'] = 'Semua Pasar';
        foreach ($query->result_array() as $row):
            $data[$row['id']] = $row['nama_pasar'];
        endforeach;
        return $data;
    }

    function filter_toko(){
        $this->db->select('a.id,a.nama_usaha,a.nama_lengkap');
        $this->db->from('store as a');
        $query = $this->db->get();
        foreach ($query->result_array() as $row):
            $data[$row['id']] = $row['nama_usaha'].'-'.$row['nama_lengkap'];
        endforeach;
        return $data;
    }

    function filter_kecamatan(){
        $this->db->select('a.no_kec,a.nama_kecamatan');
        $this->db->from('master_wilayah as a');
        $this->db->group_by('a.nama_kecamatan');
        $query = $this->db->get();
        foreach ($query->result_array() as $row):
            $data[$row['no_kec']] = $row['nama_kecamatan'];
        endforeach;
        return $data;
    }

    function filter_desa(){
        $this->db->select('a.nama_desa,a.kode_desa');
        $this->db->from('master_wilayah as a');
        $this->db->group_by('a.nama_desa');
        $query = $this->db->get();
        foreach ($query->result_array() as $row):
            $data[$row['kode_desa']] = $row['nama_desa'];
        endforeach;
        return $data;
    }

    function filter_komoditas(){
        $this->db->select('a.komoditi');
        $this->db->from('store as a');
        $this->db->group_by('a.komoditi');
        $query = $this->db->get();
        foreach ($query->result_array() as $row):
            $data[$row['komoditi']] = $row['komoditi'];
        endforeach;
        return $data;
    }

    function list_data($pasar,$like,$limit,$offset)
    {
        $this->db->select('a.*,b.nama_usaha');
        $this->db->from('produk AS a');
        $this->db->join('store AS b', 'a.store_id = b.id', 'INNER');
        if($pasar) {
            $this->db->where('b.pasar_id', $pasar);
        }
        if($like) {
            $this->db->or_like('a.nama_produk' ,$like);
        }
        // $this->db->group_by('a.umkm_id');
        $this->db->order_by('a.nama_produk','DESC');
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query;
    }

    function list_total($pasar,$like)
    {
        $this->db->select('*');
        $this->db->from('produk AS a');
        $this->db->join('store AS b', 'a.store_id = b.id', 'INNER');
        // $this->db->join('umkm_master_data AS c', 'a.umkm_id = c.ID', 'INNER');
        // $this->db->join('produk_images AS d', 'a.id_produk = d.produk_id', 'LEFT');
        if($pasar) {
            $this->db->where('a.id_produk', $pasar);
        }
        if($like) {
            $this->db->or_like('b.nama_usaha' ,$like);
        }
        // $this->db->group_by('a.umkm_id');
        $query = $this->db->get();
        return $query;
    }

    function tambah($data) {
        $query = $this->db->insert('produk', $data);
        $insert_id = $this->db->insert_id();
        // return $insert_id;
        if ($query) {
            return $insert_id;
        }
        else {
            return $insert_id;
        }
    }

    function detail($id) {
        $this->db->select('a.*');
        $this->db->from('produk AS a');
        $this->db->where('a.id_produk', $id);
        $query = $this->db->get();
        return $query->row();
    }

    function foto($id) {
        $this->db->select('a.*');
        $this->db->from('gambar_produk AS a');
        $this->db->where('a.produk_id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    function hapus_foto($data){
        $this->db->where('url_image',$data['url_image']);
        $this->db->delete('gambar_produk');
    }

    function get_desa($id) {
        $this->db->select('a.kode_desa,a.nama_desa');
        $this->db->from('master_wilayah AS a');
        $this->db->where('a.no_kec', $id);
        $query = $this->db->get();
        return $query->result();
    }

    function update($data) {
        $this->db->where('id_produk', $data['id_produk']);
        $query = $this->db->update('produk', $data);
        if ($query) {
            return true;
        }
        else {
            return false;
        }
    }    

    function delete($id) {  
        $this->db->where("id", $id);
        $query = $this->db->delete("keys");
        if ($query) {
            return true;
        }
        else {
            return false;
        }
    } 

}