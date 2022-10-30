<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Generateaccount extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('PHPExcel', 'PHPExcel/IOFactory'));
        $this->load->library('Pdfgenerator');
//        include_once APPPATH . '/third_party/fpdf/fpdf.php';
//        $this->load->library('pdf');
        $this->load->helper('file');
        /* CONNECT 2 DATABASE */
        // if($_SERVER['SERVER_NAME'] == 'localhost'){
        //     $dsn1 = 'mysqli://root:@localhost/dbmgmtmenu';
        //     $this->db = $this->load->database($dsn1, true);     
        //     $dsn2 = 'mysqli://root:@localhost/dbbsscollection';
        //     $this->db2= $this->load->database($dsn2, true);         
        // }else{
        //     $dsn1 = 'mysqli://xplmjdmx_C24sys:4N4G4T49876@localhost/xplmjdmx_dbmgmtmenu';
        //     $this->db = $this->load->database($dsn1, true);     
        //     $dsn2 = 'mysqli://xplmjdmx_C24sys:4N4G4T49876@localhost/xplmjdmx_dbbsscollection';
        //     $this->db2= $this->load->database($dsn2, true);
        // }
		$this->db = $this->load->database('default', true);
		$this->db2 = $this->load->database('second', true);

       /*  if ($_SERVER['SERVER_NAME'] == 'localhost') {
            $dsn1 = 'mysqli://root:@localhost/xplmjdmx_dbmgmtmenu';
            $this->db = $this->load->database($dsn1, true);

            $dsn2 = 'mysqli://root:@localhost/xplmjdmx_dbbsscollection';
            $this->db2 = $this->load->database($dsn2, true);
        } else {
            $dsn1 = 'mysqli://xplmjdmx_C24sys:4N4G4T49876@localhost/xplmjdmx_dbmgmtmenu';
            $this->db = $this->load->database($dsn1, true);

            $dsn2 = 'mysqli://xplmjdmx_C24sys:4N4G4T49876@localhost/xplmjdmx_dbbsscollection';
            $this->db2 = $this->load->database($dsn2, true);
        } */
        $this->load->model('Generateaccountmodel', '', TRUE);
    }
    
    public function index(){
        $item = $this->Generateaccountmodel->generateaccount();
        print_r($item);
    }

}

//tessssss
