<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_admin extends CI_Model{

    function signing($username, $password){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get();
        return $query->row_array();
    }

    function get_list_pengguna() {
        $this->db->select('*');
        $this->db->from('pengguna');
        $this->db->order_by('id','DESC');
        $query = $this->db->get();

        if ($query->num_rows()>0){
            $data =  $query->result();
            foreach ($data as $value) {
                $pengguna['id'] = $value->id;
                $pengguna['nip'] = $value->nip;
                $pengguna['nama'] = $value->nama;
                $pengguna['email'] = $value->email;
                $pengguna['telp'] = $value->telp;
                $pengguna['satker'] = $value->satker;
                $pengguna['kota'] = $value->kota;
                $pengguna['provinsi'] = $value->provinsi;
                $pengguna['negara'] = $value->negara;
                $pengguna['cert'] = $value->cert;
                $pengguna['key'] = $value->key;
                $pengguna['p12'] = $value->p12;
                $pengguna['tipe'] = $value->tipe;
                $pengguna['status'] = $value->status;

                if ($pengguna['cert'] !== null) {
                    $filename = FCPATH.'/uploads/certs/'.$pengguna['cert'];
                    if (file_exists($filename)) {
                        $pengguna['cert_pem'] = 'ada';
                    } else {
                        $pengguna['cert_pem'] = 'tidak';
                    } 
                }
                else {
                    $pengguna['cert_pem'] = 'tidak';
                }

                if ($pengguna['p12'] !== null) {
                    $filename = FCPATH.'/uploads/p12/'.$pengguna['p12'];
                    if (file_exists($filename)) {
                        $pengguna['cert_p12'] = 'ada';
                    } else {
                        $pengguna['cert_p12'] = 'tidak';
                    } 
                }
                else {
                    $pengguna['cert_p12'] = 'tidak';
                }
                $list_pengguna[] = $pengguna;
            }
            return $list_pengguna;
        }
        else {
            return false;
        }
    }

    public function pengguna_filter($search, $limit, $start, $order_field, $order_ascdesc){
        $this->db->like('nip', $search);
        $this->db->or_like('nama', $search);
        $this->db->or_like('email', $search);
        $this->db->or_like('satker', $search);
        $this->db->or_like('status', $search);
        $this->db->order_by($order_field, $order_ascdesc);
        $this->db->limit($limit, $start);
        $query = $this->db->get('pengguna');
        // return ->result_array();
        if ($query->num_rows()>0){
        $data =  $query->result_array();
        // return $data;
        foreach ($data as $value) {
            $pengguna['id'] = $value['id'];
            $pengguna['nip'] = $value['nip'];
            $pengguna['nama'] = $value['nama'];
            $pengguna['email'] = $value['email'];
            $pengguna['telp'] = $value['telp'];
            $pengguna['satker'] = $value['satker'];
            $pengguna['kota'] = $value['kota'];
            $pengguna['provinsi'] = $value['provinsi'];
            $pengguna['negara'] = $value['negara'];
            $pengguna['cert'] = $value['cert'];
            $pengguna['key'] = $value['key'];
            $pengguna['p12'] = $value['p12'];
            $pengguna['tipe'] = $value['tipe'];
            $pengguna['status'] = $value['status'];

            if ($pengguna['cert'] !== null) {
                $filename = FCPATH.'/uploads/certs/'.$pengguna['cert'];
                if (file_exists($filename)) {
                    $pengguna['cert_pem'] = 'ada';
                } else {
                    $pengguna['cert_pem'] = 'tidak';
                } 
            }
            else {
                $pengguna['cert_pem'] = 'tidak';
            }

            if ($pengguna['p12'] !== null) {
                $filename = FCPATH.'/uploads/p12/'.$pengguna['p12'];
                if (file_exists($filename)) {
                    $pengguna['cert_p12'] = 'ada';
                } else {
                    $pengguna['cert_p12'] = 'tidak';
                } 
            }
            else {
                $pengguna['cert_p12'] = 'tidak';
            }
            $list_pengguna[] = $pengguna;
        }
        return $list_pengguna;
        }
        else {
            return false;
        }

    }

    public function jml_pengguna_all(){
        return $this->db->count_all('pengguna');
    }

    public function jml_pengguna_filter($search){
        $this->db->like('nip', $search);
        $this->db->or_like('nama', $search);
        $this->db->or_like('email', $search);
        $this->db->or_like('satker', $search);
        $this->db->or_like('status', $search);
        
        return $this->db->get('pengguna')->num_rows(); 
    }
    
    public function get_pengguna_nip($nip){
        $this->db->from('pengguna');
        $this->db->where('nip',$nip);
        $query = $this->db->get();
        return $query->row();
    }

    public function get_crt_pengguna($nip){
        $this->db->select('cert, key, p12');
        $this->db->from('pengguna');
        $this->db->where('nip',$nip);
        $query = $this->db->get();
        return $query->row();
    }    
    
    public function delete_pengguna($nip){  
        $this->db->where("nip", $nip);
        $this->db->delete("pengguna");
    }

    public function update_pengguna($data) {
        $this->db->where('nip',$data['nip']);
        $query = $this->db->update('pengguna',$data);
    }

    public function tambah_pengguna($data) {
        $query = $this->db->insert('pengguna',$data);
    }

    function check_email_exist($email) {
        $this->db->where('email' , $email);
        $query = $this->db->get('pengguna');

        if ($query->num_rows()>0){
            return true;
        }
        else {
            return false;
        }
    }

    function check_nip_exist($nip) {
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

    function get_list_api() {
        $this->db->select('*');
        $this->db->from('keys');
        $this->db->order_by('id','DESC');
        $query = $this->db->get();

        if ($query->num_rows()>0){
            return $query->result();
        }
        else {
            return false;
        }
    }

    public function api_filter($search, $limit, $start, $order_field, $order_ascdesc){
        $this->db->like('api_key', $search);
        $this->db->or_like('user_id', $search);
        $this->db->or_like('api_key_activated', $search);
        $this->db->order_by($order_field, $order_ascdesc);
        $this->db->limit($limit, $start);
        return $this->db->get('keys')->result_array();
    }

    public function jml_api_all(){
        return $this->db->count_all('keys');
    }

    public function jml_api_filter($search){
        $this->db->like('api_key', $search);
        $this->db->or_like('user_id', $search);
        $this->db->or_like('api_key_activated', $search);
        return $this->db->get('keys')->num_rows(); 
    }

    public function tambah_api($data) {
        $query = $this->db->insert('keys',$data);
    }

    public function update_api($data) {
        $this->db->where('id',$data['id']);
        $query = $this->db->update('keys',$data);
    }    

    public function delete_api($id){  
        $this->db->where("id", $id);
        $this->db->delete("keys");
    }


    function get_list_document() {
        $this->db->select('documents.*, pengguna.nama, pengguna.satker');
        $this->db->from('documents');
        $this->db->join('pengguna','documents.pengguna = pengguna.nip', 'LEFT');
        $this->db->join('keys','documents.api_key = keys.api_key', 'LEFT');
        $query = $this->db->get();

        if ($query->num_rows()>0){
            return $query->result();
        }
        else {
            return false;
        }
    }


//NEW
    public function filter_documents($filters, $keywords, $limit, $offset){
        $this->db->select('documents.*, pengguna.nama, pengguna.satker, keys.user_id, keys.url_domain');
        $this->db->from('documents');
        $this->db->join('pengguna','documents.pengguna = pengguna.nip', 'LEFT');
        $this->db->join('keys','documents.api_key = keys.api_key', 'LEFT');
        if ($filters !='') {
           $this->db->having('pengguna.satker', $filters);
        }
        $this->db->like('pengguna', $keywords);
        $this->db->or_like('nama', $keywords);
        $this->db->order_by('documents.id_documents', 'ASC');
        $this->db->limit($limit, $offset);
        // var_dump($this->db);die;
        return $this->db->get()->result_array();
    }


    public function count_documents($filters, $keywords){
        $this->db->select('documents.*, pengguna.nama, pengguna.satker, keys.user_id, keys.url_domain');
        $this->db->from('documents');
        $this->db->join('pengguna','documents.pengguna = pengguna.nip', 'LEFT');
        $this->db->join('keys','documents.api_key = keys.api_key', 'LEFT');
        if ($filters !='') {
           $this->db->having('pengguna.satker', $filters);
        }
        $this->db->like('pengguna', $keywords);
        $this->db->or_like('nama', $keywords);
        return $this->db->get()->num_rows(); 
    }




//END NEW
    public function document_filter($instansi, $keyword, $limit, $start, $order_field, $order_ascdesc){
        $this->db->select('documents.*, pengguna.nama, pengguna.satker, keys.user_id, keys.url_domain');
        $this->db->from('documents');
        $this->db->join('pengguna','documents.pengguna = pengguna.nip', 'LEFT');
        $this->db->join('keys','documents.api_key = keys.api_key', 'LEFT');
        if ($instansi !='') {
           $this->db->having('pengguna.satker', $instansi);
        }
        $this->db->like('pengguna', $keyword);
        $this->db->or_like('nama', $keyword);
        $this->db->order_by($order_field, $order_ascdesc);
        $this->db->limit($limit, $start);
        return $this->db->get()->result_array();
    }

    public function jml_document_all(){
        return $this->db->count_all('documents');
    }

    public function jml_document_filter($instansi, $keyword){
        $this->db->select('documents.*, pengguna.nama, pengguna.satker, keys.user_id, keys.url_domain');
        $this->db->from('documents');
        $this->db->join('pengguna','documents.pengguna = pengguna.nip', 'LEFT');
        $this->db->join('keys','documents.api_key = keys.api_key', 'LEFT');
        if ($instansi !='') {
           $this->db->having('register.satker', $instansi);
        }
        $this->db->like('pengguna', $keyword);
        $this->db->or_like('nama', $keyword);
        return $this->db->get()->num_rows(); 
    }

    public function jml_request_all(){
        return $this->db->count_all('api_logs');
    }

    public function dash_pengguna($tipe){
        // return $this->db->count_all('pengguna');
        $this->db->where('tipe', $tipe);
        return $this->db->get('pengguna')->num_rows(); 
    }

    public function dash_last_docs($datenow){
        $this->db->select('*');
        $this->db->from('documents');
        $this->db->join('pengguna','documents.pengguna = pengguna.nip', 'LEFT');
        $this->db->join('keys','documents.api_key = keys.api_key', 'LEFT');
        $this->db->where("DATE(tgl_created) = "."'$datenow'");
        $this->db->order_by('id_documents','DESC');
        $query = $this->db->get();
        if ($query->num_rows()>0){
            return $query->result();
        }
        else {
            return false;
        }
    }

    public function dash_last_logs(){
        $this->db->select('*');
        $this->db->from('api_logs');
        $this->db->join('keys','api_logs.api_key = keys.api_key', 'LEFT');
        $this->db->limit(10); 
        $this->db->order_by('api_logs.id','DESC');
        $query = $this->db->get();

        if ($query->num_rows()>0){
            return $query->result();
        }
        else {
            return false;
        }
    }

    public function dash_top_tte() {
        // SELECT satker,COUNT(*) FROM documents LEFT JOIN pengguna ON documents.pengguna = pengguna.nip GROUP BY satker
        // SELECT satker, COUNT(*) AS total_satker, (select COUNT(*) from documents) as total_all FROM documents LEFT JOIN pengguna ON documents.pengguna = pengguna.nip GROUP BY satker
        $this->db->select('satker, COUNT(*) AS total_satker, (select COUNT(*) from documents) as total_all');
        $this->db->from('documents');
        $this->db->join('pengguna','documents.pengguna = pengguna.nip', 'LEFT');
        $this->db->group_by('satker');
        $this->db->limit(5); 
        $this->db->order_by('total_satker', 'DESC'); 
        $query = $this->db->get();
        return $query->result();
    }

    public function get_top_api() {
        $this->db->select('user_id, COUNT(user_id) as total');
        $this->db->from('documents');
        $this->db->join('keys','documents.api_key = keys.api_key', 'LEFT');
        $this->db->group_by('user_id');
        $this->db->limit(5); 
        $query = $this->db->get();
        return $query->result();
    }

    public function statistik_dashboard() {
        $this->db->select('satker, COUNT(*) AS total_satker, (select COUNT(*) from documents) as total_all');
        $this->db->from('documents');
        $this->db->join('pengguna','documents.pengguna = pengguna.nip', 'LEFT');
        $this->db->group_by('satker');
        $this->db->order_by('total_satker', 'DESC'); 
        $query = $this->db->get();
        return $query->result();
    }

    public function statistik_dashboard_daily($filter) {
        $this->db->select('satker, COUNT(*) AS total_satker, (select COUNT(*) from documents) as total_all');
        $this->db->from('documents');
        $this->db->join('pengguna','documents.pengguna = pengguna.nip', 'LEFT');
        $this->db->where("DATE(tgl_created) = "."'$filter'");
        $this->db->group_by('satker');
        $this->db->order_by('total_satker', 'DESC'); 
        $query = $this->db->get();
        return $query->result();
    }

    public function statistik_dashboard_weekly($filter) {
        $this->db->select('satker, COUNT(*) AS total_satker, (select COUNT(*) from documents) as total_all');
        $this->db->from('documents');
        $this->db->join('pengguna','documents.pengguna = pengguna.nip', 'LEFT');
        $this->db->where("YEARWEEK(tgl_created) = "."YEARWEEK('$filter')");
        $this->db->group_by('satker');
        $this->db->order_by('total_satker', 'DESC'); 
        $query = $this->db->get();
        return $query->result();
    }

}