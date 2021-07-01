<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_umkm extends CI_Model{

    function list_data($status,$like,$limit,$offset)
    {
        $this->db->select('a.ID,
a.NIK,
CASE WHEN a.NIK IS NULL THEN null ELSE CONCAT(LEFT(a.NIK, 11),"xxxxx") END AS NEW_NIK,
a.NO_KK,
a.NAMA_LGKP,
a.TTL,
a.JENIS_KELAMIN,
a.STS_NIKAH,
a.ALAMAT_PENGUSAHA,
a.JL_LINK_DSN,
a.NPWP,
a.NAMA_USAHA,
a.JENIS_USAHA,
a.ALAMAT,
a.RT,
a.RW,
a.TELP,
a.PENDIDIKAN_TRKHR,
a.TAHUN_MULAI,
a.PELATIHAN,
a.IZIN_USAHA,
a.SERTIFIKAT,
a.ASOSIASI,
a.MEDSOS,
a.EMAIL,
a.BADAN_USAHA,
a.BANTUAN,
a.NO_AKRAB,
a.SEKTOR,
a.KELOMPOK_SEKTOR,
a.HASIL_PRODUKSI,
a.TENAGA_KERJA,
a.MODAL,
a.OMSET,
a.ASET,
a.JAM_BUKA,
a.KUANTITAS_PRODUKSI,
a.KUR,
a.BANK,
a.STATUS_TEMPAT_USAHA,
a.KET_USAHA,
a.PEMASARAN,
a.KEMASAN,
a.sources,
a.softdel,
a.alasan,
a.status_aktif,
a.status_dispenduk,
a.validasi_data,
a.create_at,
a.update_at,
a.create_id,
a.update_id,
a.status_diskop,
a.KODE_PROV,
a.NAMA_PROV,
a.KODE_KAB,
a.NAMA_KAB,
a.KODE_KEC,
a.NAMA_KEC,
a.KODE_DESA,
a.NAMA_DESA,
b.umkm_id');
        $this->db->from('umkm_master_data AS a');
        $this->db->join('umkm_list AS b', 'a.ID = b.umkm_id', 'LEFT');
        if($status) {
            $this->db->where('a.status_aktif', $status);
        }
        if($like) {
            $this->db->like('NAMA_LGKP' ,$like);
            $this->db->or_like('NAMA_USAHA' ,$like);
        }
        $this->db->order_by('a.id','DESC');
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query->result_array();
    }

    function list_total($status,$like)
    {
        $this->db->select('count(*) as count');
        $this->db->from('umkm_master_data AS a');
        $this->db->join('umkm_list AS b', 'a.ID = b.umkm_id', 'LEFT');
        if($status) {
            $this->db->where('a.status_aktif', $status);
        }
        if($like) {
            $this->db->like('NAMA_LGKP', $like);
            $this->db->or_like('NAMA_USAHA', $like);
        }
        $query = $this->db->get();
        return $query->row('count');
    }

    function tambah($data) {
        $query = $this->db->insert('umkm_master_data', $data);
        if ($query) {
            return true;
        }
        else {
            return false;
        }
    }

    function detail($id) {
        $this->db->select('a.id, a.user_id, a.api_key, a.`password`, a.url_domain, a.`level`, a.ignore_limits, a.is_private_key, a.ip_addresses, a.date_created, a.api_key_activated');
        $this->db->from('keys AS a');
        $this->db->where('a.id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    function update($data) {
        $this->db->where('ID', $data['id']);
        $query = $this->db->update('umkm_master_data', $data);
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