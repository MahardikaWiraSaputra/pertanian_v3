<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    function get_file_pdf($urls){
        $CI =& get_instance();
        $context = stream_context_create(
            array(
                "http" => 
                    array( 
                        "header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36"
                    )
            )
        );

        $get_file = file_get_contents($urls, false, $context);
        $fetch_url = basename($urls);
        $temp_path = FCPATH . "uploads" .DIRECTORY_SEPARATOR. "temp" .DIRECTORY_SEPARATOR;
        $write_file = fopen($temp_path . $fetch_url, "wb");
        $test = fwrite($write_file, $get_file);
        fclose($write_file);
        return FCPATH . "uploads" .DIRECTORY_SEPARATOR. "temp" .DIRECTORY_SEPARATOR. $fetch_url;
    }

    function get_certificate($nip){

        $CI =& get_instance();
        $CI->load->model('model_api');
        $query = $CI->model_api->get_pengguna($nip);

        if ($query['status_code'] =='200') {
            $cert = $query['result'][0];
        }
        return FCPATH . "uploads" .DIRECTORY_SEPARATOR. "p12" .DIRECTORY_SEPARATOR. $cert->p12;
        // print_r();
    }
