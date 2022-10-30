<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Maps extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->db = $this->load->database('default', true);
        $this->db2 = $this->load->database('second', true);

        $this->load->helper(array('url', 'form'));
        $this->load->library('session');
        $this->load->model('Maps_model', '', TRUE);
        $this->load->model('Menu_model', '', TRUE);
        $this->load->model('Content_model', '', TRUE);
        $this->load->model('Param_model', '', TRUE);
    }
	
	public function index(){
	    if ($this->session->has_userdata('username')) {
            $idmenu = 'H08';
            $idmenu2 = 'D035';
            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
            if ($result1 == '1') {
                $result['data'] = $this->Menu_model->loadMenu();
                $result['paramM'] = $this->Param_model->loadMparam()->result();
                $result['param'] = $this->Param_model->loadparam()->result();
                $result['pagename'] = 'All Parameter';
                $result['content'] = 'creat_param';
                $this->load->view('bss_home', $result);
            }
//            $this->load->view('bss_home', $result); //$this->load->view('home', $result);
        } else {
            redirect('/');
        }
//        $result = $this->Content_model->loadMparam()->num_rows();
//        echo $result;
    }
	
}