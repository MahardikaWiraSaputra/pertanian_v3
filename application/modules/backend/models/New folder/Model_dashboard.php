<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_dashboard extends CI_Model{
    
    function total_sertifikat(){
        $this->db->select('count(*) as count');
        $this->db->from('pengguna AS a');
        $this->db->where('a.status', 'Aktif');
        $query = $this->db->get();
        return $query->row('count');
    }

    function total_dokumen(){
        $this->db->select('count(*) as count');
        $this->db->from('documents AS a');
        $query = $this->db->get();
        return $query->row('count');
    }

    function total_request(){
        $this->db->select('count(*) as count');
        $this->db->from('log_tte AS a');
        $this->db->where('a.activity', 'TTE');
        $query = $this->db->get();
        return $query->row('count');
    }

    function total_aduan(){
        $this->db->select('count(*) as count');
        $this->db->from('aduan AS a');
        $query = $this->db->get();
        return $query->row('count');
    }

    function aduan_status(){
        $this->db->select('a.id, a.no_ticket, a.nama, a.instansi, a.telp, a.email, a.aduan, a.submit_date, a.`status`, a.jabatan, a.berkas, a.`read`, count(b.id) AS respons');
        $this->db->from('aduan AS a');
        $this->db->join('aduan_response AS b', 'a.id = b.aduan_id', 'LEFT');
        $this->db->where('a.status', 'open');
        $this->db->group_by('id');
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    function request_status(){
        $this->db->select('a.request_id, a.nip, a.nama_lgkp, a.kd_unor, a.telp, a.`status`, a.created, b.NM_UNOR, "Passphrase" AS jenis_request');
        $this->db->from('req_passphrase AS a');
        $this->db->join('unor AS b', 'a.kd_unor = b.KD_UNOR', 'INNER');
        $this->db->where('a.status', '0');
        $query1 = $this->db->get_compiled_select();

        $this->db->select('a.request_id, a.nip, a.nama_lgkp, a.kd_unor, a.telp, a.`status`, a.created, b.NM_UNOR, "Ganti Nomer" AS jenis_request');
        $this->db->from('req_nomer AS a');
        $this->db->join('unor AS b', 'a.kd_unor = b.KD_UNOR', 'INNER');
        $this->db->where('a.status', '0');
        $query2 = $this->db->get_compiled_select(); 

        $query = $this->db->query($query1." UNION ".$query2);

        return $query->result();
    }


}