<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Generatespcontroller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('PHPExcel', 'PHPExcel/IOFactory'));
        $this->load->library('Pdfgenerator');

		$this->db = $this->load->database('default', true);
		$this->db2 = $this->load->database('second', true);

        $this->load->helper(array('form', 'url'));
        $this->load->library('session');
        $this->load->model('Menu_model', '', TRUE);
        $this->load->model('Content_model', '', TRUE);
        $this->load->model('Generatesp', '', TRUE);
        $this->load->model('Generatesp1', '', TRUE);
        $this->load->model('Generatesp2', '', TRUE);
        $this->load->helper(array('form', 'url'));
    }
    
    public function index() {
        $penunggak = $this->Generatesp2->gensp();
        $pemberitahuan = $this->Generatesp1->genspe();
//        print_r($penunggak) ;
//        print_r("\n") ;
        print_r($pemberitahuan) ;
    }
}