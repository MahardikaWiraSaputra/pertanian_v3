<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_api_key extends CI_Model{

    function list_data($status,$like,$limit,$offset)
    {
        $this->db->select('a.id, a.user_id, a.api_key, a.url_domain, a.date_created, a.api_key_activated');
        $this->db->from('`keys` AS a');
        if($status)
        {
            $this->db->where('a.api_key_activated', $status);
        }
        if($like)
        {
            $this->db->like('user_id' ,$like);
        }
        $this->db->order_by('a.id','DESC');
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query->result_array();
    }

    function list_total($status,$like)
    {
        $this->db->select('count(*) as count');
        $this->db->from('`keys` AS a');
        if($status)
        {
            $this->db->where('a.api_key_activated', $status);
        }
        if($like)
        {
            $this->db->like('user_id' ,$like);
        }
        $query = $this->db->get();
        return $query->row('count');
    }

    function tambah($data) {
        $query = $this->db->insert('keys', $data);
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
        $this->db->where('id', $data['id']);
        $query = $this->db->update('keys', $data);
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