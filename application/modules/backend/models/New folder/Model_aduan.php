<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_aduan extends CI_Model{


    function get_instansi()
    {
        $this->db->select('a.KD_UNOR, a.NM_UNOR');
        $this->db->from('unor AS a');
        $this->db->order_by('a.KD_UNOR','ASC');
        $query = $this->db->get()->result_array();
        $data['all'] = 'Semua';
        foreach ($query as $row):
            $data[$row['NM_UNOR']] = $row['KD_UNOR'].' - '.$row['NM_UNOR'];
        endforeach;
        return $data;
    }

    function list_data($instansi,$tanggal,$status,$like,$limit,$offset)
    {
        $this->db->select('a.id, a.no_ticket, a.nama, a.instansi, a.telp, a.email, a.aduan, a.submit_date, a.`status`, a.berkas, a.`read`, b.response, count(b.id) as jml_response');
        $this->db->from('aduan AS a');
        $this->db->join('aduan_response AS b','a.id = b.aduan_id','LEFT');
        if($instansi)
        {
            $this->db->where('a.instansi', $instansi);
        }
        if($tanggal)
        {
            $this->db->like('a.submit_date', $tanggal);
        }
        if($status)
        {
            $this->db->where('a.status', $status);
        }
        if($like)
        {
            $this->db->like('nama' ,$like);
            $this->db->or_like('no_ticket', $like);
        }
        $this->db->group_by('a.id');
        $this->db->order_by('a.read','DESC');
        $this->db->order_by('a.id','DESC');
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query->result_array();
    }

    function list_total($instansi,$tanggal,$status,$like)
    {
        $this->db->select('count(*) as count');
        $this->db->from('aduan AS a');
        $this->db->join('aduan_response AS b','a.id = b.aduan_id','LEFT');
        if($instansi)
        {
            $this->db->where('a.instansi', $instansi);
        }
        if($tanggal)
        {
            $this->db->like('a.submit_date', $tanggal);
        }
        if($status)
        {
            $this->db->where('a.status', $status);
        }
        if($like)
        {
            $this->db->like('nama' ,$like);
            $this->db->or_like('no_ticket', $like);
        }
        $this->db->group_by('a.id');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function detail($no_ticket) {
        $this->db->select('a.id, a.no_ticket, a.nama, a.instansi, a.telp, a.email, a.aduan, a.submit_date, a.`status`, a.jabatan, a.berkas, a.`read`, count(b.aduan_id) as jml');
        $this->db->from('aduan AS a');
        $this->db->join('aduan_response AS b', 'a.id = b.aduan_id', 'LEFT');
        $this->db->where('a.no_ticket', $no_ticket);
        $query = $this->db->get();
        return $query->row();
    }    

    function reply($data) {
        $query = $this->db->insert('aduan_response', $data);
        if ($query) {
            return true;
        }
        else {
            return false;
        }
    }

    function update($data) {
        $this->db->where('id', $data['id']);
        $query = $this->db->update('aduan', $data);
        if ($query) {
            return true;
        }
        else {
            return false;
        }
    }    

    function delete($id) {  
        $this->db->where("id", $id);
        $query = $this->db->delete("aduan");
        if ($query) {
            return true;
        }
        else {
            return false;
        }
    } 

    function list_response($id) {
        $this->db->select('b.no_ticket, a.id, a.aduan_id, a.response, a.response_by, a.response_date');
        $this->db->from('aduan_response AS a');
        $this->db->join('aduan AS b','a.aduan_id = b.id','INNER');
        $this->db->where('a.aduan_id', $id);
        $this->db->order_by('a.response_date','ASC');
        $query = $this->db->get();
        return $query->result();
    }

}