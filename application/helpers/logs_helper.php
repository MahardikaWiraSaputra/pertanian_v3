<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    function save_log($uri = "", $act = "", $nip = "", $params = "", $response_code = "", $response_msg = "", $unique_id = "", $file_results = ""){

        $CI =& get_instance();
 
        if (strtolower($act) == "login") {
            $activity   = 'LOGIN';
        }

        elseif(strtolower($act) == "logout") {
            $activity   = 'LOGOUT';
        } 

        elseif(strtolower($act) == "pair") {
            $activity   = 'PAIRING';
        } 

        else {
            $activity  = 'TTE';
        }
 
        $log['uri'] = $uri;
        $log['activity'] = $activity;
        $log['nip'] = $nip;
        $log['params'] = $params;
        $log['response_code'] = $response_code;
        $log['response_msg'] = $response_msg;
        $log['unique_id'] = $unique_id;
        $log['file_results'] = $file_results;
        $CI->load->model('model_apps');
        $CI->model_apps->save_log($log);
 
    }