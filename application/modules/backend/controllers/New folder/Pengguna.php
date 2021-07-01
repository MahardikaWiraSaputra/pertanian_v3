<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {

    function __construct(){
        parent::__construct();
        include(APPPATH . '/third_party/vendor/autoload.php');
        $this->load->model('model_pengguna');
        $this->auth->cek_auth('data_pengguna');
    }

    public function index()
    {
        $data['get_instansi'] = $this->model_pengguna->get_instansi();
        $this->load->view('pengguna/index', $data);
    }

    public function get_satker($id){
        $data['get_satker'] = $this->model_pengguna->get_satker($id);
        $this->load->view('pengguna/v_filter_satker', $data);
    } 

    public function list(){
        $page = '1';
        $offset = '0';
        $limit = 25;
        $like = array();
        $instansi = '';
        $satker = '';
        $tipe = '';
        $status = '';

        if (isset($_POST['search_field']) && $_POST['search_field'] != NULL)
        {
            $like = $_POST['search_field'];
        }
        if (isset($_POST['instansi']) && $_POST['instansi'] != NULL && $_POST['instansi'] != 'all')
        {
            $instansi = $_POST['instansi'];
        }
        if (isset($_POST['satker']) && $_POST['satker'] != NULL && $_POST['satker'] != 'all')
        {
            $satker = $_POST['satker'];
        }
        if (isset($_POST['tipe']) && $_POST['tipe'] != NULL && $_POST['tipe'] != 'all')
        {
            $tipe = $_POST['tipe'];
        }
        if (isset($_POST['status']) && $_POST['status'] != NULL && $_POST['status'] != 'all')
        {
            $status = $_POST['status'];
        }
        if (isset($_POST['page']) && $_POST['page'] != NULL) {
            $page = $_POST['page'];
            $pageof = $_POST['page']-1;
            $offset = $pageof * $limit;
        }
        if (isset($_POST['limit']) && $_POST['limit'] != NULL) {
            $limit = $_POST['limit'];
        }
        $data['page'] = $page;
        $data['limit'] = $limit;
        $data['total_items'] = $this->model_pengguna->list_total($instansi, $satker, $tipe, $status,$like);
        $data['list_items'] = $this->model_pengguna->list_data($instansi, $satker, $tipe, $status,$like, $limit, $offset);
        $this->load->view('pengguna/v_list', $data );
    }

    public function tambah(){
        $data = '';
        $this->load->view('pengguna/v_tambah', $data);
    }

    public function simpan() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nip', 'NIP', 'trim|required|numeric|callback_validity_nip');  
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_validity_email');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        if($this->form_validation->run()) {
            $data['tipe'] = $this->input->post('tipe');
            $data['nip'] = $this->input->post('nip');
            $data['nama'] = $this->input->post('nama');
            $data['email'] = $this->input->post('email');
            $data['telp'] = $this->input->post('telp');
            $data['unit'] = $this->input->post('unit');
            $data['satker'] = $this->input->post('satker');
            $data['kd_unor'] = $this->input->post('unor');
            $data['kota'] = 'Banyuwangi';
            $data['provinsi'] = 'Jawa Timur';
            $data['negara'] = 'ID';
 
            if($this->input->post('tipe') == '1') {
                $data['cert'] = $this->cert_upload();
                $data['key'] = $this->key_upload();
                $data['p12'] = $this->p12_upload();
            }
            else {
                $generate = $this->generate_cert();
                $data['cert'] = $generate['cert'];
                $data['key'] = $generate['key'];
                $data['p12'] = $generate['p12'];
            }

            //insert
            $insert = $this->model_pengguna->tambah($data);

            if ($insert) {
                $data['id'] = $this->db->insert_id();
                $crt = file_get_contents(base_url().'uploads/certs/'.$this->model_pengguna->last_crt($data['id']));
                $crt_info = openssl_x509_parse($crt);
                $data['valid_start'] = date("Y-m-d", $crt_info['validFrom_time_t']);
                $data['valid_to'] = date("Y-m-d", $crt_info['validTo_time_t']);
                
                $query = $this->model_pengguna->update_expired($data);
                if ($query) {
                    $output['success'] = true;
                    $output['message'] = 'DATA BERHASIL DISIMPAN';
                }
                else {
                    $output['success'] = false;
                    $output['message'] = 'DATA GAGAL DISIMPAN';
                }

            }
            else {
                $output['success'] = false;
                $output['message'] = 'DATA GAGAL DISIMPAN';
            }
        } 
        else {
            $output['success'] = false;
            $output['message'] = 'DATA GAGAL DISIMPAN';
        }
        echo json_encode($output);
    }

    public function detail($nip){
        if ($nip) {
            $data['detail'] = $this->model_pengguna->detail($nip);
            $this->load->view('pengguna/v_detail', $data);
        }
        else {
            echo 'id tidak boleh kosong';
        }
    }

    public function edit($id){
        if ($id) {
            $data['detail'] = $this->model_pengguna->detail($id);
            $this->load->view('pengguna/v_edit', $data);
        }
        else {
            echo 'id tidak boleh kosong';
        }
    }

    public function update() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nip', 'NIP', 'trim|required|numeric');  
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        if($this->form_validation->run()) {
            $data['nip'] = $this->input->post('nip');
            $data['nama'] = $this->input->post('nama');
            $data['email'] = $this->input->post('email');
            $data['telp'] = $this->input->post('telp');
            $data['unit'] = $this->input->post('unit');
            $data['satker'] = $this->input->post('satker');
            $data['kd_unor'] = $this->input->post('unor');
            $data['status'] = $this->input->post('status');
            if(!empty($_FILES['cert']['name'])) {
                $data['cert'] = $this->cert_upload();
            }
            if(!empty($_FILES['key']['name'])) {
                $data['key'] = $this->key_upload();
            }
           if(!empty($_FILES['p12']['name'])) {
                $data['p12'] = $this->p12_upload();
            }
            
            $query = $this->model_pengguna->update($data);
            if ($query) {
                $output['success'] = true;
                $output['message'] = 'DATA BERHASIL DISIMPAN';
            }
            else {
                $output['success'] = false;
                $output['message'] = 'DATA GAGAL DISIMPAN';
            }
        } 
        else {
            $output['success'] = false;
            $output['message'] = 'DATA GAGAL DISIMPAN 2';
        }
        echo json_encode($output);
    }

    public function delete($nip){
        if($nip) {         
            $query = $this->model_pengguna->delete($nip);
            if ($query) {
                $output['success'] = true;
                $output['message'] = 'DATA BERHASIL DIHAPUS';
            }
            else {
                $output['success'] = false;
                $output['message'] = 'DATA GAGAL DIHAPUS';
            }
        } else {
            $output['success'] = false;
            $output['message'] = 'DATA GAGAL DIHAPUS';
        }
        echo json_encode($output);
    }

    public function verify($tipe, $nip){
        if ($nip)
        {
            $data['detail'] = $this->model_pengguna->detail($nip);
            $data['tipe'] = $tipe;
            $data['nip'] = $nip;
            $this->load->view('pengguna/v_verify', $data);
        }
        else {
            echo 'id tidak boleh kosong';
        }
    }

    public function proses_verify(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nip', 'NIP', 'trim|required|numeric');
        $this->form_validation->set_rules('tipe', 'Tipe', 'trim|required');
        $this->form_validation->set_rules('passphrase', 'passphrase', 'trim|required');
        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
        if($this->form_validation->run()) 
        {         
            $nip = $this->input->post('nip');
            $tipe = $this->input->post('tipe');
            $passphrase = $this->input->post('passphrase');
            $sertifikat = $this->get_sertifikat($nip);
            
            if ($tipe == 'pem') 
            {
                $cert_file = file_get_contents($sertifikat['crt']);
                $key_file = file_get_contents($sertifikat['key']);
                if (!empty($passphrase))
                {
                    $check_key = array(
                        0 => $key_file, 
                        1 => $passphrase
                    );
                    $verify_crt = openssl_x509_check_private_key($cert_file, $check_key);
                    if ($verify_crt == true)
                    {
                        $result['success'] = true;
                        $result['status_msg'] = 'Sertifikat berhasil diverifikasi';
                    }
                    else 
                    {
                        $result['success'] = false;
                        $result['status_msg'] = 'Sertifikat dan password tidak cocok';
                    }
                }

            }
            elseif ($tipe == 'p12') 
            {
                $certs = array();
                $p12_file = file_get_contents($sertifikat['p12']);
                if (!empty($passphrase))
                {
                    $verify_crt =  openssl_pkcs12_read($p12_file, $certs, $passphrase);
                    if ($verify_crt == '1')
                    {
                        $result['success'] = true;
                        $result['status_msg'] = 'Sertifikat berhasil diverifikasi';
                    }
                    else 
                    {
                        $result['success'] = false;
                        $result['status_msg'] = 'Sertifikat dan password tidak cocok';
                    }
                }
            }
            else 
            {
                $result['success'] = false;
                $result['status_msg'] = 'Sertifikat tidak dapat diverifikasi';  
            }
        } 
        else 
        {
            $result['success'] = false;
            $result['status_msg'] = 'Sertifikat tidak dapat diverifikasi';  
        }

        echo json_encode($result);
    }


    public function upload($tipe, $nip){
        if ($nip)
        {
            $data['detail'] = $this->model_pengguna->detail($nip);
            $data['tipe'] = $tipe;
            $data['nip'] = $nip;
            $this->load->view('pengguna/v_upload', $data);
        }
        else {
            echo 'id tidak boleh kosong';
        }
    }

    public function proses_upload() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nip', 'NIP', 'trim|required|numeric');  
        $this->form_validation->set_rules('tipe', 'Tipe', 'trim|required');
        $this->form_validation->set_rules('metode', 'metode', 'trim|required');
        if($this->form_validation->run()) {
            $data['nip'] = $this->input->post('nip');
            if($this->input->post('tipe') == 'p12') 
            {
                if($this->input->post('metode') == 'upload')
                {
                    $data['p12'] = $this->p12_upload();
                }
                else 
                {
                    $data['p12'] = $this->p12_convert();
                }
            }
            else {
                if($this->input->post('metode') == 'upload')
                {
                    $data['cert'] = $this->cert_upload();
                }
                else 
                {
                    $data['cert'] = $this->cert_convert();
                }
            }

            $query = $this->model_pengguna->update($data);
            if ($query) {
                $output['success'] = true;
                $output['message'] = 'DATA BERHASIL DISIMPAN';
            }
            else {
                $output['success'] = false;
                $output['message'] = 'DATA GAGAL DISIMPAN';
            }
        } 
        else {
            $output['success'] = false;
            $output['message'] = 'DATA GAGAL DISIMPAN 2';
        }
        echo json_encode($output);
    }


    private function get_sertifikat($nip)
    {
        $query = $this->model_pengguna->get_sertifikat($nip);
        $data['crt'] = base_url().'uploads/certs/'.$query->cert;
        $data['key'] = base_url().'uploads/keys/'.$query->key;
        $data['p12'] = base_url().'uploads/p12/'.$query->p12;
        $cert_result = json_decode(json_encode($data), true);
        return $cert_result;
    }

    //cek nip
    public function find_nip()
    {
        $nip = htmlentities($this->input->post('nip'), ENT_QUOTES);

        $this->load->library('form_validation');
        $this->form_validation->set_rules('nip', 'NIP', 'trim|required|numeric');

        if($this->form_validation->run()) {
            $url = 'https://sikawan.banyuwangikab.go.id/api/pns/'.$nip;
            $content = file_get_contents($url);            
            $json = json_decode($content, true);

            if ($json['status'] == 'success') {
                $hasil['nip'] = $json['datas']['PNS_PNSNIP'];
                if ($json['datas']['PNS_GLRDPN'] == null && $json['datas']['PNS_GLRBLK']== null) {
                    $hasil['nama'] = $json['datas']['PNS_PNSNAM'];
                }
                elseif ($json['datas']['PNS_GLRDPN'] !== null && $json['datas']['PNS_GLRBLK'] == null) {
                    $hasil['nama'] = $json['datas']['PNS_GLRDPN'].'. '.$json['datas']['PNS_PNSNAM'];
                }
                elseif ($json['datas']['PNS_GLRDPN'] == null && $json['datas']['PNS_GLRBLK'] !== null) {
                    $hasil['nama'] = $json['datas']['PNS_PNSNAM'].', '.$json['datas']['PNS_GLRBLK'];
                }
                else {
                    $hasil['nama'] = $json['datas']['PNS_GLRDPN'].'. '.$json['datas']['PNS_PNSNAM'].', '.$json['datas']['PNS_GLRBLK'];
                }
                $hasil['satker'] = $json['datas']['NM_UNOR'];
                $hasil['kd_unor'] = $json['datas']['KD_UNOR'];
                echo json_encode($hasil);
            }
            else{
                echo 'NIP tidak ditemukan di server!!';
            }
        }
        else {
            echo 'NIP yang diinputkan tidak sesuai!!';
        }        
    }

    //upload
    private function p12_upload()
    {
        $config['upload_path'] = "uploads/p12";
        $config['allowed_types'] = 'p12';
        $config['max_size'] = 1000;
        $config['file_name'] = $this->input->post('nip');
        
        $this->load->library('upload', $config);
        $this->upload->initialize($config); 

        if(!$this->upload->do_upload('p12')) {
            $data['inputerror'][] = 'p12';
            $data['error_string'][] = 'Upload error: '.$this->upload->display_errors('','');
            $data['status'] = FALSE;
            echo json_encode($data);
            exit();
        }
        return $this->upload->data('file_name');
    }

    private function cert_upload()
    {
        $config['upload_path'] = "uploads/certs";
        $config['allowed_types'] = 'crt|pem';
        $config['max_size'] = 1000;
        $config['file_name'] = $this->input->post('nip');
        
        $this->load->library('upload', $config);
        $this->upload->initialize($config); 

        if(!$this->upload->do_upload('cert')) {
            $data['inputerror'][] = 'cert';
            $data['error_string'][] = 'Upload error: '.$this->upload->display_errors('','');
            $data['status'] = FALSE;
            echo json_encode($data);
            exit();
        }
        return $this->upload->data('file_name');
    }
    
    private function key_upload()
    {
        $config['upload_path'] = "uploads/keys";
        $config['allowed_types'] = 'key|pem';
        $config['max_size'] = 1000;
        $config['file_name'] = $this->input->post('nip');

        $this->load->library('upload', $config);
        $this->upload->initialize($config); 

        if(!$this->upload->do_upload('key'))
        {
            $data['inputerror'][] = 'key';
            $data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
            $data['status'] = FALSE;
            echo json_encode($data);
            exit();
        }
        return $this->upload->data('file_name');
    }


    //convert
    private function p12_convert()
    {
        $nip = $this->input->post('nip');
        $passphrase = $this->input->post('passphrase');
        $sertifikat = $this->get_sertifikat($nip);

        $cert_file = openssl_x509_read(file_get_contents($sertifikat['crt']));
        $key_file = openssl_pkey_get_private(file_get_contents($sertifikat['key']), $passphrase);
        
        if ($key_file) {
            $create_p12 = fopen('uploads/p12/'.$nip.'.p12', 'w');
            $filep12 = realpath('uploads/p12/'.$nip.'.p12');
            $p12 = openssl_pkcs12_export_to_file($cert_file, $filep12, $key_file, $passphrase);
            if ($p12) {
               return $nip.'.p12';
            }
            else {
                $data['status'] = 'gagal';
                $data['msg'] = 'gagal convert sertifikat p12';
                echo json_encode($data);
                exit();
            }
        }
        else {
            $data['status'] = 'gagal';
            $data['msg'] = 'gagal generate private key';
            echo json_encode($data);
            exit();
        }
    }

    //generate ca

 public function createKeys()
 {
     $Rsa = new \phpseclib\Crypt\RSA();
     $keys = $Rsa->createKey(1024);
     $priv = file_put_contents($this->getPrivateKeyFile(), $keys['privatekey']);
     $pub = file_put_contents($this->getPublicKeyFile(), $keys['publickey']);
     return $priv && $pub;

    }

    //generate certificate
    private function generate_cert() {
        // $data = array();
        $data['tipe'] = $this->input->post('tipe');
        $data['nip'] = $this->input->post('nip');
        $data['nama'] = $this->input->post('nama');
        $data['email'] = $this->input->post('email');
        $data['telp'] = $this->input->post('telp');
        $data['unit'] = $this->input->post('unit');
        $data['satker'] = $this->input->post('satker');
        $data['kota'] = 'Banyuwangi';
        $data['provinsi'] = 'Jawa Timur';
        $data['negara'] = 'ID';
        $data['passphrase'] = $this->input->post('passphrase');

        // Load Master CA
        $masterkey = new \phpseclib\Crypt\RSA();
        $masterkeypath = file_get_contents('uploads/rootca/rootCA.key');
        $paswd = 'kominfo2020';
        // $paswd = md5('kominfo2020');
        $masterkey->setPassword($paswd);
        $masterkey->loadKey($masterkeypath);

        $mastercert = new \phpseclib\File\X509();
        $mastercertpath = file_get_contents('uploads/rootca/rootCA.crt');
        $mastercert->loadX509($mastercertpath);
        $mastercert->setPrivateKey($masterkey);

        $pubkey = new \phpseclib\Crypt\RSA();
        $pubkeypath = file_get_contents('uploads/rootca/rootCApub.key');
        $pubkey->loadKey($pubkeypath);
        $pubkey->setPublicKey();

        // Generate client cert baru
        $clientkey = new \phpseclib\Crypt\RSA();
        $clientpassword = $data['passphrase'];
        $clientkey->setPassword($clientpassword);
        $clientkey->setHash('sha512');
        $clientkey->setMGFHash('sha512');
        $generatedKeyPair = extract($clientkey->createKey(2048));
        $clientkey->loadKey($privatekey);

        $clientpubkey = new \phpseclib\Crypt\RSA();
        $clientpubkey->loadKey($publickey);
        $clientpubkey->setPublicKey();

        $clientcert = new \phpseclib\File\X509();
        $clientcert->loadCA($mastercertpath);
        $clientcert->setPublicKey($clientpubkey);
        $clientcert->setDNProp('commonName', $data['nama']);
        $clientcert->setDNProp('organizationName', $data['unit']);
        $clientcert->setDNProp('organizationalUnitName', $data['satker']);
        $clientcert->setDNProp('emailAddress', $data['email']);
        $clientcert->setDNProp('localityName', $data['kota']);
        $clientcert->setDNProp('stateOrProvinceName', $data['provinsi']);
        $clientcert->setDNProp('countryName', $data['negara']);
        $clientcert->setStartDate('-1 month');
        $clientcert->setEndDate('+2 year');
        $clientcert->setSerialNumber($data['nip'], 16);
        $signcert = $clientcert->sign($mastercert, $clientcert, 'sha512WithRSAEncryption');
        // Add Extension
        $clientcert->loadX509($signcert);
        $clientcert->setExtension('id-ce-keyUsage', array('digitalSignature', 'nonRepudiation', 'keyEncipherment', 'keyCertSign'));
        $resigncert = $clientcert->sign($mastercert, $clientcert, 'sha512WithRSAEncryption');
        $signingcert = $clientcert->saveX509($resigncert);

        $filecert = fopen('uploads/certs/'.$data['nip'].'.crt', 'w');
        fwrite($filecert, $signingcert);
        fclose($filecert);

        $filekey = fopen('uploads/keys/'.$data['nip'].'.key', 'w');
        fwrite($filekey, $clientkey->getPrivateKey());
        fclose($filekey);

        //generate p12
        $cert = $data['nip'].'.crt';
        $key = $data['nip'].'.key';

        $cert_file = openssl_x509_read(file_get_contents('uploads/certs/'.$cert));
        $key_file = openssl_pkey_get_private(file_get_contents('uploads/keys/'.$key), $clientpassword);
        $create_p12 = fopen('uploads/p12/'.$data['nip'].'.p12', 'w');
        $filep12 = realpath('uploads/p12/'.$data['nip'].'.p12');

        $p12 = openssl_pkcs12_export_to_file($cert_file, $filep12, $key_file, $clientpassword);
        $data['cert'] = $cert;
        $data['key'] = $key;

        if ($p12 == true) {
            $data['p12'] = $data['nip'].'.p12';
        }
        else {
            $data['p12'] = null;
        }
        return $data;

    }


    public function test_p12(){
        $nip = '804000000201710045';
        $clientpassword = 'ipod69';

        $cert_file = openssl_x509_read(file_get_contents('uploads/certs/'.$nip.'.crt'));
        $key_file = openssl_pkey_get_private(file_get_contents('uploads/keys/'.$nip.'.key'), $clientpassword);

        $crt_filep12 = fopen('uploads/p12s/'.$nip.'.p12', 'w');
        $filep12 = realpath('uploads/p12s/'.$nip.'.p12');
        $p12 = openssl_pkcs12_export_to_file($cert_file, $filep12, $key_file, $clientpassword);

        if ($p12 == true) {
            echo 'sukses';
        }
        else {
            echo 'gagal';
        }
    }

    //callback 
    public function validity_email()
    {
        $email = $this->input->post('email');
        $data['email'] = $this->model_pengguna->check_email_exist($email);

        if ($data['email']==true)
        {
            $this->form_validation->set_message('validity_email', 'email sudah terdaftar');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

    public function validity_nip()
    {
        $nip = $this->input->post('nip');
        $data['nip'] = $this->model_pengguna->check_nip_exist($nip);

        if ($data['nip']==true)
        {
            $this->form_validation->set_message('validity_nip', 'nip sudah terdaftar');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

}