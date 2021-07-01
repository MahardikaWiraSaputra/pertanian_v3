<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_kuesioner extends CI_Model{


    function list_data($pelayanan,$keramahan,$ketanggapan,$kepuasan,$limit,$offset)
    {
        $this->db->select('a.id, a.nama, a.instansi, a.jabatan, a.pelayanan, a.kesopanan, a.ketanggapan, a.kepuasan, a.submit_date, a.saran');
        $this->db->from('kuisioner AS a');
        if($pelayanan)
        {
            $this->db->where('a.pelayanan', $pelayanan);
        }
        if($keramahan)
        {
            $this->db->like('a.kesopanan', $keramahan);
        }
        if($ketanggapan)
        {
            $this->db->where('a.ketanggapan', $ketanggapan);
        }
        if($kepuasan)
        {
            $this->db->where('a.kepuasan', $kepuasan);
        }
        $this->db->order_by('a.submit_date','DESC');
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query->result_array();
    }

    function list_total($pelayanan,$keramahan,$ketanggapan,$kepuasan)
    {
        $this->db->select('count(*) as count');
        $this->db->from('kuisioner AS a');
        if($pelayanan)
        {
            $this->db->where('a.pelayanan', $pelayanan);
        }
        if($keramahan)
        {
            $this->db->like('a.kesopanan', $keramahan);
        }
        if($ketanggapan)
        {
            $this->db->where('a.ketanggapan', $ketanggapan);
        }
        if($kepuasan)
        {
            $this->db->where('a.kepuasan', $kepuasan);
        }
        $query = $this->db->get();
        return $query->row('count');
    }

    function detail($id) {
        $this->db->select('a.id, a.nama, a.instansi, a.jabatan, a.pelayanan, a.kesopanan, a.ketanggapan, a.kepuasan, a.submit_date, a.saran');
        $this->db->from('kuisioner AS a');
        $this->db->where('a.id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    function delete($id) {  
        $this->db->where("id", $id);
        $query = $this->db->delete("kuisioner");
        if ($query) {
            return true;
        }
        else {
            return false;
        }
    } 
}