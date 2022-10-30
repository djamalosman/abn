<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BssBaru extends CI_Controller {

	 public function __construct(){
        parent::__construct();
        
        $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
		$this->db = $this->load->database('default', true);
		$this->db2 = $this->load->database('second', true);

        /*CONNECT 2 DATABASE*/
          /*   if($_SERVER['SERVER_NAME'] !='anagata.co.id'){
            $dsn1 = 'mysqli://root:@localhost/mgmtmenu';
            $this->db = $this->load->database($dsn1, true);     

            $dsn2 = 'mysqli://root:@localhost/dbcollection';
            $this->db2= $this->load->database($dsn2, true);         
        }else{
            $dsn1 = 'mysqli://xplmjdmx_4nagata:4N4G4T49876@localhost/xplmjdmx_mgmtmenu';
            $this->db = $this->load->database($dsn1, true);     

            $dsn2 = 'mysqli://xplmjdmx_4nagata:4N4G4T49876@localhost/xplmjdmx_dbcollection';
            $this->db2= $this->load->database($dsn2, true);
        }       */
        /*CONNECT 2 DATABASE*/
        
        $this->load->helper(array('url', 'form'));
        $this->load->library('session');
        $this->load->model('Menu_model', '', TRUE);
        $this->load->helper('captcha');

    }
	public function index()
	{
		$this->load->helper(array('url', 'form'));
		$this->load->view('bssbaru');
	}
}
