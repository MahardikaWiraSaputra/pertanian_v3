<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Auth {

    function __construct() {
        $this->ci = & get_instance();
    }

    public function cek_auth($hak_akses) {

		if (!$this->ci->ion_auth->logged_in()) {
            echo "<script>top.window.location = '/backend/login'</script>";
            exit();
        }

        if (!$this->ci->ion_auth_acl->has_permission($hak_akses)) {
            echo "<script>top.window.location = '/errors/denied'</script>";
            exit();
        }

	}
}