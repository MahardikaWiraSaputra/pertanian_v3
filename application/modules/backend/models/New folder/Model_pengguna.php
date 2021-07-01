<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_pengguna extends CI_Model{


    function get_instansi()
    {
        $this->db->select('a.KODE_UNIT, a.UNIT');
        $this->db->from('v_unit AS a');
        $this->db->order_by('a.KODE_UNIT','ASC');
        $query = $this->db->get()->result_array();
        $data['all'] = 'Semua';
        foreach ($query as $row):
            $data[$row['UNIT']] = $row['UNIT'];
        endforeach;
        return $data;
    }

    function get_satker($id)
    {
        $this->db->select('a.KD_UNOR, a.NM_UNOR');
        $this->db->from('v_unit AS a');
        if ($id !== 'all') {
            $this->db->where('a.UNIT', $id);
        }
        $query = $this->db->get()->result_array();
        $data['all'] = 'Semua';
        foreach ($query as $row):
            $data[$row['KD_UNOR']] = $row['KD_UNOR'] .' - '. $row['NM_UNOR'];
        endforeach;
        return $data;
    }

    function list_data($instansi,$satker,$tipe,$status,$like,$limit,$offset)
    {
        $this->db->select('a.id, a.nama, a.nip, a.email, a.unit, a.kota, a.provinsi, a.negara, a.valid_start, a.valid_to, a.cert, a.p12, a.`key`, a.tipe, a.`status`, a.kd_unor, b.NM_UNOR');
        $this->db->from('pengguna AS a');
        $this->db->join('v_unit AS b','a.kd_unor = b.KD_UNOR','INNER');
        if($instansi)
        {
            $this->db->where('b.UNIT', $instansi);
        }
        if($satker)
        {
            $this->db->where('a.kd_unor', $satker);
        }
        if($tipe)
        {
            $this->db->where('a.tipe', $tipe);
        }
        if($status)
        {
            $this->db->where('a.status', $status);
        }
        if($like)
        {
            $this->db->like('nama' ,$like);
            $this->db->or_like('nip', $like);
        }
        $this->db->order_by('a.id','DESC');
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query->result_array();
    }

    function list_total($instansi,$satker,$tipe,$status,$like)
    {
        $this->db->select('count(*) as count');
        $this->db->from('pengguna AS a');
        $this->db->join('v_unit AS b','a.kd_unor = b.KD_UNOR','INNER');
        if($instansi)
        {
            $this->db->where('b.UNIT', $instansi);
        }
        if($satker)
        {
            $this->db->where('a.kd_unor', $satker);
        }
        if($tipe)
        {
            $this->db->where('a.tipe', $tipe);
        }
        if($status)
        {
            $this->db->where('a.status', $status);
        }
        if($like)
        {
            $this->db->like('nama' ,$like);
            $this->db->or_like('nip', $like);
        }
        $query = $this->db->get();
        return $query->row('count');
    }

    function tambah($data) {
        $query = $this->db->insert('pengguna', $data);
        if ($query) {
            return true;
        }
        else {
            return false;
        }
    }

    function detail($nip) {
        $this->db->select('a.id, a.nama, a.nip, a.email, a.telp, a.unit, a.satker, a.kota, a.provinsi, a.negara, a.cert, a.p12, a.`key`, a.tipe, a.`status`, a.valid_start, a.valid_to, a.kd_unor, b.NM_UNOR');
        $this->db->from('pengguna AS a');
        $this->db->join('unor AS b','a.kd_unor = b.KD_UNOR','INNER');
        $this->db->where('a.nip', $nip);
        $query = $this->db->get();
        return $query->row();
    }

    function update($data) {
        $this->db->where('nip', $data['nip']);
        $query = $this->db->update('pengguna', $data);
        if ($query) {
            return true;
        }
        else {
            return false;
        }
    } 

    function update_expired($data) {
        $this->db->where('id', $data['id']);
        $query = $this->db->update('pengguna', $data);
        if ($query) {
            return true;
        }
        else {
            return false;
        }
    }    

    function delete($nip) {  
        $this->db->where("nip", $nip);
        $query = $this->db->delete("pengguna");
        if ($query) {
            return true;
        }
        else {
            return false;
        }
    } 

    public function get_sertifikat($nip){
        $this->db->select('cert, key, p12');
        $this->db->from('pengguna');
        $this->db->where('nip',$nip);
        $query = $this->db->get();
        return $query->row();
    } 

    public function last_crt($id){
        $this->db->select('cert');
        $this->db->from('pengguna');
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row()->cert;
    } 

    function check_email_exist($email)
    {
        $this->db->where('email' , $email);
        $query = $this->db->get('pengguna');

        if ($query->num_rows()>0){
            return true;
        }
        else {
            return false;
        }
    }

    function check_nip_exist($nip)
    {
        $this->db->where('nip' , $nip);
        $this->db->where('status' , 'Aktif');
        $query = $this->db->get('pengguna');

        if ($query->num_rows()>0){
            return true;
        }
        else {
            return false;
        }
    }

}