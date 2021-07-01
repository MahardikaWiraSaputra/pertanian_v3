<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_toko extends CI_Model{

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
        // foreach ($query->result_array() as $row):
        //     $data[$row['kode_desa']] = $row['nama_desa'];
        // endforeach;
        return $query->result_array();
    }

    function filter_komoditas(){
        $this->db->select('a.komoditi');
        $this->db->from('store as a');
        $this->db->group_by('a.komoditi');
        $query = $this->db->get();
        foreach ($query->result_array() as $row):
            $data[$row['komoditi']] = $row['komoditi'];
        endforeach;
        $data['lainnya'] = 'Lainnya';
        return $data;
    }

    function list_data($pasar,$like,$limit,$offset)
    {
        $this->db->select('a.*,b.nama_pasar');
        $this->db->from('store AS a');
        $this->db->join('pasar AS b', 'a.pasar_id = b.id', 'INNER');
        if($pasar) {
            $this->db->where('a.pasar_id', $pasar);
        }
        if($like) {
            $this->db->or_like('a.nama_usaha' ,$like);
        }
        // $this->db->group_by('a.umkm_id');
        $this->db->order_by('a.nama_usaha','DESC');
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query;
    }

    function list_total($pasar,$like)
    {
        $this->db->select('*');
        $this->db->from('store AS a');
        $this->db->join('pasar AS b', 'a.pasar_id = b.id', 'INNER');
        // $this->db->join('umkm_master_data AS c', 'a.umkm_id = c.ID', 'INNER');
        // $this->db->join('produk_images AS d', 'a.id_produk = d.produk_id', 'LEFT');
        if($pasar) {
            $this->db->where('a.pasar_id', $pasar);
        }
        if($like) {
            $this->db->or_like('a.nama_usaha' ,$like);
        }
        // $this->db->group_by('a.umkm_id');
        $query = $this->db->get();
        return $query;
    }

    function tambah($data) {
        $query = $this->db->insert('store', $data);
        if ($query) {
            return true;
        }
        else {
            return false;
        }
    }

    function tambah_user($data) {
        $query = $this->db->insert('users', $data);
        if ($query) {
            return true;
        }
        else {
            return false;
        }
    }

    function detail($id) {
        $this->db->select('*');
        $this->db->from('store AS a');
        $this->db->where('a.id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    function cek_nik($id) {
        $this->db->select('*');
        $this->db->from('store AS a');
        $this->db->where('a.nik', $id);
        $query = $this->db->get();
        return $query->row();
    }

    function get_desa($id) {
        $this->db->select('a.kode_desa,a.nama_desa');
        $this->db->from('master_wilayah AS a');
        $this->db->where('a.no_kec', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    function update($data) {
        $this->db->where('ID', $data['id']);
        $query = $this->db->update('store', $data);
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