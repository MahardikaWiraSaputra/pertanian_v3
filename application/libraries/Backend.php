<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Backend 
{

    function __construct(){
        $this->CI = & get_instance();
        $this->CI->load->config('ion_auth', TRUE);

        // initialize hash method options (Bcrypt)
        $this->hash_method = $this->CI->config->item('hash_method', 'ion_auth');
        $this->default_rounds = $this->CI->config->item('default_rounds', 'ion_auth');
        $this->random_rounds = $this->CI->config->item('random_rounds', 'ion_auth');
        $this->min_rounds = $this->CI->config->item('min_rounds', 'ion_auth');
        $this->max_rounds = $this->CI->config->item('max_rounds', 'ion_auth');
        $this->store_salt      = $this->CI->config->item('store_salt', 'ion_auth');
    }



    public function hash_password($password, $salt=false, $use_sha1_override=FALSE)
    {
        if (empty($password))
        {
            return FALSE;
        }

        //bcrypt
        if ($use_sha1_override === FALSE && $this->hash_method == 'bcrypt')
        {
            return $this->CI->bcrypt->hash($password);
           echo "oke";
        }

        if ($this->store_salt && $salt)
        {
            return  sha1($password . $salt);
        }
        else
        {
            $salt = $this->salt();
            return  $salt . substr(sha1($salt . $password), 0, -$this->salt_length);
        }
    }

    public function salt()
    {

        $raw_salt_len = 16;

        $buffer = '';
        $buffer_valid = false;

        if (function_exists('mcrypt_create_iv') && !defined('PHALANGER')) {
            $buffer = mcrypt_create_iv($raw_salt_len, MCRYPT_DEV_URANDOM);
            if ($buffer) {
                $buffer_valid = true;
            }
        }

        if (!$buffer_valid && function_exists('openssl_random_pseudo_bytes')) {
            $buffer = openssl_random_pseudo_bytes($raw_salt_len);
            if ($buffer) {
                $buffer_valid = true;
            }
        }

        if (!$buffer_valid && @is_readable('/dev/urandom')) {
            $f = fopen('/dev/urandom', 'r');
            $read = strlen($buffer);
            while ($read < $raw_salt_len) {
                $buffer .= fread($f, $raw_salt_len - $read);
                $read = strlen($buffer);
            }
            fclose($f);
            if ($read >= $raw_salt_len) {
                $buffer_valid = true;
            }
        }

        if (!$buffer_valid || strlen($buffer) < $raw_salt_len) {
            $bl = strlen($buffer);
            for ($i = 0; $i < $raw_salt_len; $i++) {
                if ($i < $bl) {
                    $buffer[$i] = $buffer[$i] ^ chr(mt_rand(0, 255));
                } else {
                    $buffer .= chr(mt_rand(0, 255));
                }
            }
        }

        $salt = $buffer;

        // encode string with the Base64 variant used by crypt
        $base64_digits   = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/';
        $bcrypt64_digits = './ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $base64_string   = base64_encode($salt);
        $salt = strtr(rtrim($base64_string, '='), $base64_digits, $bcrypt64_digits);

        $salt = substr($salt, 0, $this->salt_length);


        return $salt;

    }

}

