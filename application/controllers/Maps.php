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
    }
	
	public function index(){
		if ($this->session->has_userdata('username')) {
            $idmenu = 'H03';
            $idmenu2 = 'D0100';
            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
            if ($result1 == '1') {
                $result['data'] = $this->Menu_model->loadMenu();
                $result['agent'] = $this->Maps_model->get_agent();

                $result['pagename'] = 'Map';
                $result['content'] = 'bss_maps_test';
				$this->load->view('bss_home', $result); 
			}
        } else {
            redirect('/');
        }
	}

    public function getlocation() {
        $agent = $this->input->post('agentid');
        $datestart = $this->input->post('tglawal');
        $dateend = $this->input->post('tglakhir');
		$data = '';
        if ($agent != 'Non') {
            $data = $this->Maps_model->getlocationbyagent($agent, $datestart, $dateend);
            echo json_encode($data);
            
        } else {
            //$data = $this->Maps_model->getlocation();
            echo json_encode($data);
        }
    }
}