<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_pertanian extends CI_Model{

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

    function filter_desa_all(){
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
        $this->db->select('a.id,a.komoditas');
        $this->db->from('komoditas as a');
        $query = $this->db->get();
        foreach ($query->result_array() as $row):
            $data[$row['id']] = $row['komoditas'];
        endforeach;
        return $data;
    }
    
    function filter_bulan(){
        $this->db->select('a.id,a.bulan');
        $this->db->from('bulan as a');
        $query = $this->db->get();
        foreach ($query->result_array() as $row):
            $data[$row['id']] = $row['bulan'];
        endforeach;
        return $data;
    }

    function filter_tahun(){
        $this->db->select('a.id,a.tahun');
        $this->db->from('tahun as a');
        $this->db->order_by('tahun','DESC');
        $query = $this->db->get();
        foreach ($query->result_array() as $row):
            $data[$row['tahun']] = $row['tahun'];
        endforeach;
        return $data;
    }

    function get_desa($id) {
        $this->db->select('a.kode_desa,a.nama_desa');
        $this->db->from('master_wilayah AS a');
        $this->db->where('a.no_kec', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    function kecamatan($kecamatan){
        $this->db->select('a.no_kec,a.nama_kecamatan');
        $this->db->from('master_wilayah as a');
        $this->db->group_by('a.nama_kecamatan');
        if($kecamatan != 'all'){
            $this->db->where('a.nama_kecamatan',$kecamatan);
        }
        $data['all'] = 'Semua Data';
        $query = $this->db->get();
        foreach ($query->result_array() as $row):
            $data[$row['nama_kecamatan']] = $row['nama_kecamatan'];
        endforeach;
        return $data;
    }

    function komoditas(){
        $this->db->select('a.id,a.komoditas');
        $this->db->from('komoditas as a');
        // $this->db->where('tipe','TANAMAN PANGAN');
        $query = $this->db->get();
        $data['all'] = 'Semua Data';
        foreach ($query->result_array() as $row):
            $data[$row['id']] = $row['komoditas'];
        endforeach;
        return $data;
    }

    function bulan(){
        $this->db->select('a.kategori');
        $this->db->from('tanaman_pangan as a');
        $this->db->group_by('a.kategori');
        $query = $this->db->get();
        $data['all'] = 'Semua Data';
        foreach ($query->result_array() as $row):
            $data[$row['kategori']] = $row['kategori'];
        endforeach;
        return $data;
    }

    function tahun(){
        $this->db->select('a.id,a.tahun');
        $this->db->from('tahun as a');
        $this->db->order_by('tahun','DESC');
        $query = $this->db->get();
        $data['all'] = 'Semua Tahun';
        foreach ($query->result_array() as $row):
            $data[$row['tahun']] = $row['tahun'];
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

    function list_data($kecamatan,$komoditas,$bulan,$tahun,$limit,$offset)
    {
        $this->db->select('
        a.*,
        b.komoditas');
        $this->db->from('v_data_tanaman_pangan3 AS a');
        // $this->db->join('master_wilayah as b', 'a.desa = b.kode_desa AND a.kecamatan = b.no_kec', 'INNER');
        $this->db->join('komoditas AS b','a.komoditas = b.id','INNER');
        // $this->db->group_by(array('a.kategori','a.tahun'));
        if($kecamatan) {
            $this->db->where('a.kecamatan', $kecamatan);
        }
        if($komoditas) {
            $this->db->where('a.komoditas', $komoditas);
        }
        if($tahun) {
            $this->db->where('a.tahun', $tahun);
        }
        if($bulan) {
            $this->db->where('a.kategori', $bulan);
        }
        // if($like) {
        //     $this->db->or_like('a.nama_produk' ,$like);
        // }
        // $this->db->group_by('a.umkm_id');
        $this->db->order_by('a.kategori','ASC');
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query;
    }

    function list_total($kecamatan,$komoditas,$tahun,$bulan)
    {
        $this->db->select('*');
        $this->db->from('tanaman_pangan AS a');
        $this->db->join('master_wilayah as b', 'a.desa = b.kode_desa','a.kecamatan = b.no_kec', 'INNER');
        $this->db->join('komoditas AS c','a.komoditas = c.id','INNER');
        $this->db->group_by(array('a.kategori','a.tahun'));
        // $this->db->join('store AS b', 'a.store_id = b.id', 'INNER');
        // $this->db->join('umkm_master_data AS c', 'a.umkm_id = c.ID', 'INNER');
        // $this->db->join('produk_images AS d', 'a.id_produk = d.produk_id', 'LEFT');
        if($kecamatan) {
            $this->db->where('a.kecamatan', $kecamatan);
        }
        if($komoditas) {
            $this->db->where('a.komoditas', $komoditas);
        }
        if($bulan) {
            $this->db->where('a.kategori', $bulan);
        }
        if($tahun) {
            $this->db->where('a.tahun', $tahun);
        }
        // if($like) {
        //     $this->db->or_like('b.nama_usaha' ,$like);
        // }
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

    function detail($id,$tahun) {
        $this->db->select('a.*');
        $this->db->from('v_data_tanaman_pangan3 AS a');
        $this->db->where('a.kategori', $id);
        $this->db->where('a.tahun', $tahun);
        $query = $this->db->get();
        return $query->row();
    }

    function detail_sub($sub_round,$tahun,$komoditas) {
        $this->db->select('a.*');
        $this->db->from('v_data_tanaman_pangan3 AS a');
        $this->db->where('a.kategori', $sub_round);
        $this->db->where('a.tahun', $tahun);
        $this->db->where('a.komoditas', $komoditas);
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

    function delete($kategori,$tahun) {  
        $this->db->where("kategori", $kategori);
        $this->db->where("tahun", $tahun);
        $query = $this->db->delete("tanaman_pangan");
        if ($query) {
            return true;
        }
        else {
            return false;
        }
    } 

}