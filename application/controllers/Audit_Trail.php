<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Audit_Trail extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    public function __construct(){

        parent::__construct();

        $this->db = $this->load->database('default', true);     
		$this->db2 = $this->load->database('second', true);

        $this->load->helper(array('url', 'form'));

        $this->load->library('session');
        
        $this->load->model('ModeAuditTrail', '', TRUE);

        $this->load->helper('captcha');

        $this->load->model('Menu_model', '', TRUE);

    }
	public function index(){
    if ($this->session->has_userdata('username')) {
        $idmenu = 'H99';
        $idmenu2 = 'D107';
        $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
            if ($result1 == '1') {
                $result['data'] = $this->Menu_model->loadMenu();
                $result['pagename'] = 'Audit Trail';
                $result['tabel'] = $this->ModeAuditTrail->getTabelParam()->result();
                $result['action'] = $this->ModeAuditTrail->getActionParam()->result();
                $result['content'] = 'read_audit_trail_bss_employe';
                $this->load->view('bss_home',$result);
	        }else {
                redirect('/');
            }
        }
    }

    public function prosess(){
		
        if ($this->session->has_userdata('username')) {
			
            $idmenu = 'H99';
            $idmenu2 = 'D107';
            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
                if ($result1 == '1') {
					
                            $result['data'] = $this->Menu_model->loadMenu();
                            $result['pagename'] = 'Audit Trail';
                            $result['tabel'] = $this->ModeAuditTrail->getTabelParam()->result();
                            $result['action'] = $this->ModeAuditTrail->getActionParam()->result();
                                $tabel=$this->input->post('tabel');
                                $start=$this->input->post('start');
                                $end=$this->input->post('end');
                                $action=$this->input->post('action');
                                $i="I";
                                $U="U";
                                $D="D";
                                $tables1 = $this->db2->list_tables();
                                $tables2 = $this->db->list_tables();
                               $bss_employee =  $tables1[0];
                               $t_agent =  $tables1[1];
                               $t_user=$tables2[0];
                                //$bss_employee='audit_bss_employee';
                                //$t_agent='audit_t_agent';
                                //print_r($tables2);
                            if($tabel===$bss_employee){
                                if($action===$i){
                                        $start_dt =  DateTime::createFromFormat('m/d/Y', $start);
                                        $end_dt =  DateTime::createFromFormat('m/d/Y', $end);
                                        $start = $start_dt->format('Y-m-d');
                                        $end = $end_dt->format('Y-m-d');
                                        $result['action_i'] = $this->ModeAuditTrail->getActionParam_I_bss_employe($tabel,$start,$end,$action);
                                        $result['content'] = 'read_audit_trail_bss_employe';
                                        $this->load->view('bss_home',$result);
                                }elseif($action===$U){
                                        $start_dt =  DateTime::createFromFormat('m/d/Y', $start);
                                        $end_dt =  DateTime::createFromFormat('m/d/Y', $end);
                                        $start = $start_dt->format('Y-m-d');
                                        $end = $end_dt->format('Y-m-d');
                                        $result['action_i'] = $this->ModeAuditTrail->getActionParam_U_bss_employe($tabel,$start,$end,$action);
                                        $result['content'] = 'read_audit_trail_bss_employe';
                                        $this->load->view('bss_home',$result);
                                }elseif($action===$D){
                                    $start_dt =  DateTime::createFromFormat('m/d/Y', $start);
                                    $end_dt =  DateTime::createFromFormat('m/d/Y', $end);
                                    $start = $start_dt->format('Y-m-d');
                                    $end = $end_dt->format('Y-m-d');
                                    $result['action_i'] = $this->ModeAuditTrail->getActionParam_D_bss_employe($tabel,$start,$end,$action);
                                    $result['content'] = 'read_audit_trail_bss_employe';
                                    $this->load->view('bss_home',$result);
                                }
                            }elseif($tabel===$t_agent){
                                    if($action===$i){
                                        $start_dt =  DateTime::createFromFormat('m/d/Y', $start);
                                        $end_dt =  DateTime::createFromFormat('m/d/Y', $end);
                                        $start = $start_dt->format('Y-m-d');
                                        $end = $end_dt->format('Y-m-d');
                                        $result['action_i'] = $this->ModeAuditTrail->getActionParam_I_t_agent($tabel,$start,$end,$action);
                                        $result['content'] = 'read_audit_trail_t_agent';
                                        $this->load->view('bss_home',$result);
                                    }elseif($action===$U){
                                        $start_dt =  DateTime::createFromFormat('m/d/Y', $start);
                                        $end_dt =  DateTime::createFromFormat('m/d/Y', $end);
                                        $start = $start_dt->format('Y-m-d');
                                        $end = $end_dt->format('Y-m-d');
                                        $result['action_i'] = $this->ModeAuditTrail->getActionParam_U_t_agent($tabel,$start,$end,$action);
                                        $result['content'] = 'read_audit_trail_t_agent';
                                        $this->load->view('bss_home',$result);
                                    }elseif($action===$D){
                                        $start_dt =  DateTime::createFromFormat('m/d/Y', $start);
                                        $end_dt =  DateTime::createFromFormat('m/d/Y', $end);
                                        $start = $start_dt->format('Y-m-d');
                                        $end = $end_dt->format('Y-m-d');
                                        $result['action_i'] = $this->ModeAuditTrail->getActionParam_D_t_agent($tabel,$start,$end,$action);
                                        $result['content'] = 'read_audit_trail_t_agent';
                                        $this->load->view('bss_home',$result);
                                    }   
                                             
                            }elseif($tabel===$t_user){
                                //echo "masuk";
                                if($action===$i){
                                   $start_dt =  DateTime::createFromFormat('m/d/Y', $start);
                                   $end_dt =  DateTime::createFromFormat('m/d/Y', $end);
                                   $start = $start_dt->format('Y-m-d');
                                   $end = $end_dt->format('Y-m-d');
                                   $result['action_i'] = $this->ModeAuditTrail->getActionParam_I_t_user($tabel,$start,$end,$action);
                                   $result['content'] = 'read_audit_trail_t_user';
                                   $this->load->view('bss_home',$result);
                                }elseif($action===$U){
                                   $start_dt =  DateTime::createFromFormat('m/d/Y', $start);
                                   $end_dt =  DateTime::createFromFormat('m/d/Y', $end);
                                   $start = $start_dt->format('Y-m-d');
                                   $end = $end_dt->format('Y-m-d');
                                   //echo "masuk";
                                   $result['action_i'] = $this->ModeAuditTrail->getActionParam_U_t_user($tabel,$start,$end,$action);
                                   $result['content'] = 'read_audit_trail_t_user';
                                   $this->load->view('bss_home',$result);
                                }elseif($action===$D){
                                   $start_dt =  DateTime::createFromFormat('m/d/Y', $start);
                                   $end_dt =  DateTime::createFromFormat('m/d/Y', $end);
                                   $start = $start_dt->format('Y-m-d');
                                   $end = $end_dt->format('Y-m-d');
                                   $result['action_i'] = $this->ModeAuditTrail->getActionParam_D_t_user($tabel,$start,$end,$action);
                                   $result['content'] = 'read_audit_trail_t_user';
                                   $this->load->view('bss_home',$result);
                                }   
                                         
                        }
                }else {
                    redirect('/');
                }
            }
    }
}