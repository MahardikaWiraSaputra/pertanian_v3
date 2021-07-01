<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_umkm_terdaftar extends CI_Model{

    function list_data($status,$like,$limit,$offset)
    {
        $this->db->select('
CASE WHEN b.NIK IS NULL THEN null ELSE CONCAT(LEFT(b.NIK, 11),"xxxxx") END AS NEW_NIK,
a.id,
a.umkm_id,
a.`status`,
a.created,
a.created_date,
a.modified,
a.modified_date,
b.ID,
b.KODE_PROV,
b.NAMA_PROV,
b.KODE_KAB,
b.NAMA_KAB,
b.KODE_KEC,
b.NAMA_KEC,
b.KODE_DESA,
b.NAMA_DESA,
b.NIK,
b.NO_KK,
b.NAMA_LGKP,
b.TTL,
b.JENIS_KELAMIN,
b.STS_NIKAH,
b.ALAMAT_PENGUSAHA,
b.JL_LINK_DSN,
b.NPWP,
b.NAMA_USAHA,
b.JENIS_USAHA,
b.ALAMAT,
b.RT,
b.RW,
b.TELP,
b.PENDIDIKAN_TRKHR,
b.TAHUN_MULAI,
b.PELATIHAN,
b.IZIN_USAHA,
b.SERTIFIKAT,
b.ASOSIASI,
b.MEDSOS,
b.EMAIL,
b.BADAN_USAHA,
b.BANTUAN,
b.NO_AKRAB,
b.SEKTOR,
b.KELOMPOK_SEKTOR,
b.HASIL_PRODUKSI,
b.TENAGA_KERJA,
b.MODAL,
b.OMSET,
b.ASET,
b.JAM_BUKA,
b.KUANTITAS_PRODUKSI,
b.KUR,
b.BANK,
b.STATUS_TEMPAT_USAHA,
b.KET_USAHA,
b.PEMASARAN,
b.KEMASAN,
b.sources,
b.softdel,
b.alasan,
b.status_dasawisma,
b.status_aktif,
b.status_dispenduk,
b.validasi_data,
b.create_at,
b.update_at,
b.create_id,
b.update_id,
b.status_diskop,
c.sm_facebook,
c.sm_instagram,
c.sm_whastapp,
c.mp_tokopedia,
c.mp_shopee,
c.mp_bukalapak,
c.mp_lazada,
c.mp_blibli,
count(d.umkm_id) as jml_produk');
        $this->db->from('umkm_list AS a');
        $this->db->join('umkm_master_data AS b', 'a.umkm_id = b.ID', 'INNER');
        $this->db->join('umkm_media_akun AS c', 'a.umkm_id = c.umkm_id', 'LEFT');
        $this->db->join('produk AS d', 'a.umkm_id = d.umkm_id', 'LEFT');
        if($status) {
            $this->db->where('b.status_aktif', $status);
        }
        if($like) {
            $this->db->like('b.NAMA_LGKP' ,$like);
            $this->db->or_like('b.NAMA_USAHA' ,$like);
        }
        $this->db->group_by('a.umkm_id');
        $this->db->order_by('a.id','DESC');
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query->result_array();
    }

    function list_total($status,$like)
    {
        $this->db->select('count(*) as count');
        $this->db->from('umkm_list AS a');
        $this->db->join('umkm_master_data AS b', 'a.umkm_id = b.ID', 'INNER');
        $this->db->join('umkm_media_akun AS c', 'a.umkm_id = c.umkm_id', 'LEFT');
        if($status) {
            $this->db->where('b.status_aktif', $status);
        }
        if($like) {
            $this->db->like('b.NAMA_LGKP' ,$like);
            $this->db->or_like('b.NAMA_USAHA' ,$like);
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