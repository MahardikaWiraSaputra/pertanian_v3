<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_api_services extends CI_Model{

    private $response;

    public function insert_passphrase($data) {
        $query = $this->db->insert('req_passphrase', $data);
        if($query){
           return true;
        } 
        else {
            return false;
        }
    }

    public function update_passphrase($data) {
        if (!empty($data['request_id'])) {
            $this->db->where('request_id', $data['request_id']);
            $query = $this->db->update('req_passphrase', $data);
            if($query){
               return true;
            } 
            else {
                return false;
            }
        }
        else {
            return false;
        }
    }

    public function remove_passphrase($data) {
        if (!empty($data['request_id'])) {
            $this->db->where('request_id', $data['request_id']);
            $query = $this->db->delete('req_passphrase');
            if($query){
               return true;
            } 
            else {
                return false;
            }
        }
        else {
            return false;
        }
    }

    public function insert_nomer($data) {
        $query = $this->db->insert('req_nomer', $data);
        if($query){
           return true;
        } 
        else {
            return false;
        }
    }

    public function update_nomer($data) {
        if (!empty($data['request_id'])) {
            $this->db->where('request_id', $data['request_id']);
            $query = $this->db->update('req_nomer', $data);
            if($query){
               return true;
            } 
            else {
                return false;
            }
        }
        else {
            return false;
        }
    }

    public function remove_nomer($data) {
        if (!empty($data['request_id'])) {
            $this->db->where('request_id', $data['request_id']);
            $query = $this->db->delete('req_nomer');
            if($query){
               return true;
            } 
            else {
                return false;
            }
        }
        else {
            return false;
        }
    }

}