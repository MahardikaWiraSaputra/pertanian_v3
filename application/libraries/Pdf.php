<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

// require_once APPPATH.'third_party/vendor/tecnickcom/tcpdf/tcpdf.php';
// require_once APPPATH.'third_party/vendor/setasign/fpdi/src/autoload.php';

// use setasign\Fpdi;

// class Pdf extends Fpdi\TcpdfFpdi 
// { 
//     function __construct() 
//     { 
//         parent ::__construct(); 
        
//     } 
// } 

	require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';
	class Pdf extends TCPDF
	{
	    function __construct()
	    {
	        parent::__construct();
	    }
	}

