<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_req_passphrase extends CI_Model{

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

    function list_data($instansi,$status,$like,$limit,$offset)
    {
        $this->db->select('a.id, a.request_id, a.nip, a.nama_lgkp, a.kd_unor, a.telp, a.berkas, a.referensi, a.`status`, a.created, a.created_by, a.modified, a.modified_by, b.NM_UNOR');
        $this->db->from('req_passphrase AS a');
        $this->db->join('unor AS b','a.kd_unor = b.KD_UNOR','INNER');
        if($instansi)
        {
            $this->db->where('a.kd_unor', $instansi);
        }
        if($status)
        {
            $this->db->where('a.status', $status);
        }
        if($like)
        {
            $this->db->like('nama_lgkp' ,$like);
            $this->db->or_like('request_id', $like);
        }
        $this->db->order_by('a.id','DESC');
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query->result();
    }

    function list_total($instansi,$status,$like)
    {
        $this->db->select('count(*) as count');
        $this->db->from('req_passphrase AS a');
        $this->db->join('unor AS b','a.kd_unor = b.KD_UNOR','INNER');
        if($instansi)
        {
            $this->db->where('a.kd_unor', $instansi);
        }
        if($status)
        {
            $this->db->where('a.status', $status);
        }
        if($like)
        {
            $this->db->like('nama_lgkp' ,$like);
            $this->db->or_like('request_id', $like);
        }
        $query = $this->db->get();
        return $query->num_rows();
    }

}