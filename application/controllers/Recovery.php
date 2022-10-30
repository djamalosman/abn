<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Recovery extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('PHPExcel', 'PHPExcel/IOFactory'));
        $this->load->library('Pdfgenerator');
        $this->load->helper('file');
        $this->db = $this->load->database('default', true);	
        $this->db2 = $this->load->database('second', true);

        $this->load->helper(array('form', 'url'));
        $this->load->library('session');
        $this->load->model('Menu_model', '', TRUE);
        $this->load->model('Content_model', '', TRUE);
        $this->load->model('Maps_model', '', TRUE);
        $this->load->model('Model_log', '', TRUE);
        $this->load->model('Model_recovery', '', TRUE);
        $this->load->helper(array('form', 'url'));
    }
	
	public function index() {
        if ($this->session->has_userdata('username')) {
            $idmenu = 'H04';
            $idmenu2 = 'D044';
            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
            if ($result1 == '1') {
                $result['data'] = $this->Menu_model->loadMenu();
                $result['pagename'] = 'Menu recovery';
                $result['recovery'] = $this->Model_recovery->get_recovery();
                $result['content'] = 'view_recovery';
                $this->load->view('bss_home', $result);
            } else {
                redirect('Recovery/view_recovery');
            }
        }
    }
}