<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_dokumen extends CI_Model{


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

    function get_pengguna($id)
    {
        $this->db->select('a.nip, a.nama');
        $this->db->from('pengguna AS a');
        if ($id !== 'all') {
            $this->db->where('a.kd_unor', $id);
        }
        $query = $this->db->get()->result_array();
        $data['all'] = 'Semua';
        foreach ($query as $row):
            $data[$row['nip']] = $row['nama'].' - '.$row['nip'];
        endforeach;
        return $data;
    }

    function list_data($instansi,$satker,$pengguna,$waktu,$like,$limit,$offset)
    {
        $this->db->select('a.id_documents, a.id_doc, a.pengguna, a.api_key, a.files_url, a.tgl_created, b.nama, b.kd_unor, c.UNIT, c.KODE_UNIT, c.NM_UNOR');
        $this->db->from('documents AS a');
        $this->db->join('pengguna AS b','a.pengguna = b.nip','INNER');
        $this->db->join('v_unit AS c','b.kd_unor = c.KD_UNOR','INNER');
        if($instansi)
        {
            $this->db->where('c.UNIT', $instansi);
        }
        if($satker)
        {
            $this->db->where('b.kd_unor', $satker);
        }
        if($pengguna)
        {
            $this->db->where('a.pengguna', $pengguna);
        }
        if($waktu)
        {
            if($waktu == 'today')
            {
                $this->db->where('DATE(a.tgl_created)', date('Y-m-d'));
            }
            elseif ($waktu == 'last_day')
            {
                $this->db->where("DATE(a.tgl_created) = "."SUBDATE('".date('Y-m-d')."',1)");
            }
            elseif ($waktu == 'last_week')
            {
                $this->db->where("YEARWEEK(a.tgl_created) = "."YEARWEEK('".date('Y-m-d')."')");
            }
            elseif ($waktu == 'last_month')
            {
                $this->db->where('month(a.tgl_created)', date('m'));
            }
            elseif ($waktu == 'last_year')
            {
                $this->db->where('YEAR(a.tgl_created)', date('Y'));
            }
            
        }
        if($like)
        {
            $this->db->like('files_url' ,$like);
        }
        $this->db->order_by('a.id_documents','DESC');
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query->result_array();
    }

    function list_total($instansi,$satker,$pengguna,$waktu,$like)
    {
        $this->db->select('count(*) as count');
        $this->db->from('documents AS a');
        $this->db->join('pengguna AS b','a.pengguna = b.nip','INNER');
        $this->db->join('v_unit AS c','b.kd_unor = c.KD_UNOR','INNER');
        if($instansi)
        {
            $this->db->where('c.UNIT', $instansi);
        }
        if($satker)
        {
            $this->db->where('b.kd_unor', $satker);
        }
        if($pengguna)
        {
            $this->db->where('a.pengguna', $pengguna);
        }
        if($waktu)
        {
            if($waktu == 'today')
            {
                $this->db->where('DATE(a.tgl_created)', date('Y-m-d'));
            }
            elseif ($waktu == 'last_day')
            {
                $this->db->where("DATE(a.tgl_created) = "."SUBDATE('".date('Y-m-d')."',1)");
            }
            elseif ($waktu == 'last_week')
            {
                $this->db->where("YEARWEEK(a.tgl_created) = "."YEARWEEK('".date('Y-m-d')."')");
            }
            elseif ($waktu == 'last_month')
            {
                $this->db->where('month(a.tgl_created)', date('m'));
            }
            elseif ($waktu == 'last_year')
            {
                $this->db->where('YEAR(a.tgl_created)', date('Y'));
            }
            
        }
        if($like)
        {
            $this->db->like('files_url' ,$like);
        }
        $query = $this->db->get();
        return $query->row('count');
    }


    function tambah_registrasi($data) {
        $query = $this->db->insert('register', $data);
        if ($query) {
            return true;
        }
        else {
            return false;
        }
    }


    function get_detail($nip) {
        $this->db->select('a.ID, a.REGISTERID, a.NIP, a.NIK, a.NAMA_LGKP, a.PANGKAT, a.GOL, a.JABATAN, a.UNIT_KERJA, a.KD_UNOR, a.SATKER, a.KOTA, a.PROVINSI, a.NEGARA, a.EMAIL, a.TELP, a.KODEREF, b.NM_UNOR, a.PASSKODE, a.FILE_KTP, a.FILE_REKOM');
        $this->db->from('register AS a');
        $this->db->join('unor AS b','a.KD_UNOR = b.KD_UNOR','INNER');
        $this->db->where('a.NIP', $nip);
        return $this->db->get();
    }


    function update_pass($data) {
        $this->db->where('NIP', $data['NIP']);
        $query = $this->db->update('register', $data);
        if ($query) {
            return true;
        }
        else {
            return false;
        }
    }  

    function update_data($data) {
        $this->db->where('NIP', $data['NIP']);
        $query = $this->db->update('register', $data);
        if ($query) {
            return true;
        }
        else {
            return false;
        }
    }    


    function get_all(){ // DUMMY
        $this->db->select('*');
        $this->db->from('register');
        $this->db->where('PASSKODE IS NOT NULL');
        $query = $this->db->get()->result_array();
        return $query;
    }

}