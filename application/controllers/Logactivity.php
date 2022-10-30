<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . ('PHPExcel/PHPExcelMRPK/Classes/PHPExcelAyda.php');
require_once APPPATH . ('PHPExcel/PHPExcelMRPK/Classes/PHPExcel/Writer/Excel2007.php');

class Logactivity extends CI_Controller {

    public function __construct() {

        parent::__construct();

        $this->db = $this->load->database('default', true);
        $this->db2 = $this->load->database('second', true);


        $this->load->helper(array('url', 'form'));

        $this->load->library('session');

        $this->load->model('Menu_model', '', TRUE);

        $this->load->model('Content_model', '', TRUE);

        $this->load->model('ModelAyda', '', TRUE);

        $this->load->model('Model_log', '', TRUE);
        $this->load->helper('captcha');
    }

    public function index() {
        if ($this->session->has_userdata('username')) {
            $idmenu = 'H99';
            $idmenu2 = 'D038';
            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
            if ($result1 == '1') {
                $result['data'] = $this->Menu_model->loadMenu();
                $result['prangkat'] = $this->Model_log->getlogprangkat();
                $result['user'] = $this->Model_log->getloguser();
                $result['pagename'] = 'Scheduler Process';
                $result['content'] = 'read_logactivity';
                $this->load->view('bss_home', $result);
            }
        } else {
            redirect('/');
        }
    }

    public function getlogactivity() {
        $user = $this->input->post('user');
        $prangkat = $this->input->post('prangkat');
        $datetimestart = $this->input->post('datetimestart');
        $datetimeend= $this->input->post('datetimeend');

        if ($user == 'Non') {
            $result = $this->Model_log->getlogactivityall();
        } else {
            $result = $this->Model_log->getlogactivity($user,$prangkat,$datetimestart,$datetimeend);
        }

        echo json_encode($result);
    }

}
