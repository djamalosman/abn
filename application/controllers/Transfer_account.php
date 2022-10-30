<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . ('PHPExcel/PHPExcelMRPK/Classes/PHPExcelAyda.php');
require_once APPPATH . ('PHPExcel/PHPExcelMRPK/Classes/PHPExcel/Writer/Excel2007.php');

class Transfer_account extends CI_Controller {

    public function __construct() {

        parent::__construct();

        $this->db = $this->load->database('default', true);
        $this->db2 = $this->load->database('second', true);

        $this->load->helper(array('form', 'url'));
        $this->load->library('session');
        $this->load->model('Menu_model', '', TRUE);
        $this->load->model('Content_model', '', TRUE);
        $this->load->model('Maps_model', '', TRUE);
        $this->load->model('Model_log', '', TRUE);
        $this->load->model('Model_transfer', '', TRUE);
        $this->load->helper(array('form', 'url'));
    }

    public function index() {
        if ($this->session->has_userdata('username')) {
            $idmenu = 'H04';
            $idmenu2 = 'D039';
            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
            if ($result1 == '1') {
                $nik = $this->session->userdata('username');
                $result['data'] = $this->Menu_model->loadMenu();
                $this->Model_log->insertlogmenu($this->session->userdata('username'), "Main Menu : " . $idmenu . " Sub Menu : " . $idmenu2);
                $result['agent'] = $this->Content_model->get_agent($this->session->userdata('username'));
                $result['assignment'] = $this->Model_transfer->get_transfer_list_account($nik);
                $result['pagename'] = 'System Process';
                $result['content'] = 'read_transfer_account';
                $this->load->view('bss_home', $result);
            }
        } else {
            redirect('/');
        }
    }

    public function view_reject_aprove_acctransfer() {
        if ($this->session->has_userdata('username')) {
            $idmenu = 'H04';
            $idmenu2 = 'D039';
            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
            if ($result1 == '1') {
                $nik = $this->session->userdata('username');
                $result['data'] = $this->Menu_model->loadMenu();
                $result['agent'] = $this->Model_transfer->get_agent($nik);
                $result['assignment'] = $this->Model_transfer->get_reject_aprove_transfer_account($nik);
                $result['pagename'] = 'System Process';
                $result['content'] = 'view_reject_aprove_transferAcc';
                $this->load->view('bss_home', $result);
            }
        } else {
            redirect('/');
        }
    }

    public function read_transfer_account() {
        if ($this->session->has_userdata('username')) {
            $idmenu = 'H04';
            $idmenu2 = 'D039';
            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
            if ($result1 == '1') {
                $nik = $this->session->userdata('username');
                $result['data'] = $this->Menu_model->loadMenu();
                $result['assignment'] = $this->Model_transfer->get_tgh_listtransfer($nik);
                $result['agent'] = $this->Model_transfer->get_agent($nik);
                $result['pagename'] = 'System Process';
                $result['content'] = 'transfer_account';
                $this->load->view('bss_home', $result);
            }
        } else {
            redirect('/');
        }
    }

    public function transfer_account_proses() {
        if ($this->session->has_userdata('username')) {
            $data = $this->input->post('agent');
            //$namaagen = $this->input->post('agentname');
            $desc = $this->input->post('desc');
            $selection = $this->input->post('idnya');
            $data2 = array(
                'transfer account : ' . json_encode($selection),
                'agentid : ' . $data,
                'desc : ' . $desc
            );
//            $idagenawal = $this->input->post('idagentawal');
            //var_dump($data,$namaagen,$desc,$selection,$idagenawal);
            if ($data == null || $selection == null) {
                $this->Model_log->logactivity($this->session->userdata('username'), "Gagal : " . json_encode($data2));

                $this->nulldata_notif();
                redirect('transfer_account/read_transfer_account');
            }

//            echo $data."/".$desc;
//            print_r($selection);
            $action = $this->Model_transfer->transfer_debitur_proses($selection, $data, $desc);
            if ($action === 1) {
                $this->Model_log->logactivity($this->session->userdata('username'), "Sucess : " . json_encode($data2));

                $this->sucess_notif();
                redirect('transfer_account/read_transfer_account');
            } else {
                $this->gagal_notif();
                $this->Model_log->logactivity($this->session->userdata('username'), "Gagal : " . json_encode($data2));

                redirect('transfer_account/read_transfer_account');
            }
        } else {
            
        }
    }

    public function transfer_account_proses2() {
        if ($this->session->has_userdata('username')) {
            if (isset($_POST['edit'])) {
                $code = "edit";
                $data = $this->input->post('agent');
                $desc = $this->input->post('desc');
                $selection = $this->input->post('idnya');
                $data2 = array(
                    'update transfer account : ' . json_encode($selection),
                    'agentid : ' . $data,
                    'desc : ' . $desc
                );
                if ($data == 'Non') {
                    $this->Model_log->logactivity($this->session->userdata('username'), "Gagal : " . json_encode($data2));

                    $this->nulldata_notif();
                    redirect('transfer_account/index');
                }
                $action = $this->Model_transfer->transfer_debitur_proses2($selection, $data, $desc, $code);
                if ($action === 1) {
                    $this->Model_log->logactivity($this->session->userdata('username'), "Sucess : " . json_encode($data2));

                    $this->sucess_notif();
                    redirect('transfer_account/index');
                } else {
                    $this->gagal_notif();
                    $this->Model_log->logactivity($this->session->userdata('username'), "Gagal : " . json_encode($data2));
                }
            } elseif (isset($_POST['deletetxt'])) {
                $code = 'delete';
                $data = "delete";
                $desc = "delete";
                $selection = $this->input->post('idnya');
                $data2 = array(
                    'delete transfer account : ' . json_encode($selection)
                );

                if (empty($selection)) {
                    $this->nulldelete_notif();
                } else {
                    $action = $this->Model_transfer->transfer_debitur_proses2($selection, $data, $desc, $code);
                }
                if ($action == 1) {
                    $this->Model_log->logactivity($this->session->userdata('username'), "Gagal : " . json_encode($data2));
                    $this->sucess_notif();
                    redirect('transfer_account/index');
                } else {
                    $this->nulldelete_notif();
                    redirect('transfer_account/index');
                }
            } else {
                redirect('transfer_account/index');
            }
        } else {
            redirect('/');
        }
    }

    public function approved_collector() {
        if ($this->session->has_userdata('username')) {
            $idmenu = 'H03';
            $idmenu2 = 'D046';
            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
            if ($result1 == '1') {
                $result['data'] = $this->Menu_model->loadMenu();
                $result['approvecolec'] = $this->Model_transfer->get_collector_aprove();
//                $result['agent'] = $this->Content_model->get_agent();
                $result['pagename'] = 'aproved collector';
                $result['content'] = 'approve_collector';
                $this->load->view('bss_home', $result);
            }
        } else {
            redirect('/');
        }
    }

    public function aproved_transfer() {
        if ($this->session->has_userdata('username')) {
            $idmenu = 'H04';
            $idmenu2 = 'D040';
            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
            if ($result1 == '1') {
                $nik = $this->session->userdata('username');
                $result['data'] = $this->Menu_model->loadMenu();
                $result['assignment'] = $this->Model_transfer->get_transfer_list_aprove($nik);
//                $result['agent'] = $this->Content_model->get_agent();
                $result['pagename'] = 'System Process';
                $result['content'] = 'read_aproved_transfer_account';
                $this->load->view('bss_home', $result);
            }
        } else {
            redirect('/');
        }
    }

    public function approvedcollector() {
        if ($this->session->has_userdata('username')) {
            $selection = $this->input->post('idnya');
            if ($selection == null) {
                $this->chek_approve();
                redirect('transfer_account/approved_collector');
            } elseif ($selection != null) {
                $action = $this->Model_transfer->updatestatus_approve($selection);
                $this->sucess_aprove();
                redirect('transfer_account/approved_collector');
            }
        }
    }

    public function transfer_account_prosesfinal() {
        if ($this->session->has_userdata('username')) {
            if (isset($_POST['aproved'])) {
                $selection = $this->input->post('idnya');
                $agent = $this->input->post('agent');

                if ($selection == NULL) {
                    $this->gagal_notif();
                    redirect('transfer_account/aproved_transfer');
                }

                foreach ($selection as $key) {
                    $idagenawal = $key;

                    $agenawalid = explode("-", $idagenawal);
                    $idnya[] = $agenawalid['0'];
//                    $namaagen = $agenawalid['1'];
//                    $agenid = $agenawalid['2'];
                }
                //$a = str_split($idnya, 2);

                $action = $this->Model_transfer->transfer_debitur_prosesfinal($selection);
//                print_r($a);
                //print_r($namaagen);
                $cif = array('f_cif' => $action);
                if ($action == 1) {
                    $this->notif_sucess_approve_transfer();
                    redirect('transfer_account/aproved_transfer');
                } else {
                    $this->gagal_notif1();
                    redirect('transfer_account/aproved_transfer');
                }
            } elseif (isset($_POST['reject'])) {
                $id = $this->input->post('idnya');
                $selection = $this->input->post('idnya');
				
				if(!empty($selection)){
					$reject = $this->Model_transfer->process_reject_account($selection);
					if ($reject === 1) {
						$this->notif_sucess_reject_transfer();
						redirect('transfer_account/aproved_transfer');
					} else {
						$this->gagal_notif();
						redirect('transfer_account/aproved_transfer');
					}
				} else {
					$this->gagal_notif();
					redirect('transfer_account/aproved_transfer');
				}
                
            }
        }
    }

    //////////////////////////////////////////////////////////////////////////////



    function sucess_notif() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Berhasil!',
        type: 'success',
        showConfirmButton: false,
        timer: 1500,
        onOpen: function () {
// AJAX request simulated with setTimeout
            setTimeout(function () {
                swal.close()
            }, 2000)
        }
    })</script>"
        );
    }

    function gagal_notif() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Gagal ! <br> Gagal Mentransfer !!!',
        text: 'Silahkan Pilih Terlebih Dahulu Collector',
        type: 'error'
        })</script>"
        );
    }function gagal_notif1() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Gagal ! <br> Gagal Mentransfer !!!',
        text: 'Silahkan Pilih Terlebih Dahulu Collector',
        type: 'error'
        })</script>"
        );
    }

    function nulldata_notif() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Perhatian ! <br> Tidak Ada Collector / Account Yg Di Pilih !!!',
        text: 'Silahkan Pilih Terlebih Dahulu Collector',
        type: 'warning'
        })</script>"
        );
    }
    function nulldelete_notif() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Perhatian ! <br> Tidak Ada Data Yg Di Pilih !!!',
        text: 'Silahkan Pilih Terlebih Dahulu Data',
        type: 'warning'
        })</script>"
        );
    }

    function notif_sucess_approve_transfer() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Berhasil!',
        text: 'Data Berhasil Di Approve',
        type: 'success',
        showConfirmButton: false,
        timer: 1500,
        onOpen: function () {
        // AJAX request simulated with setTimeout
        setTimeout(function () {
        swal.close()
        }, 2000)
        }
        })</script>"
        );
    }
	
	
	function notif_sucess_reject_transfer() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Berhasil!',
        text: 'Data Berhasil Di Reject',
        type: 'success',
        showConfirmButton: false,
        timer: 1500,
        onOpen: function () {
        // AJAX request simulated with setTimeout
        setTimeout(function () {
        swal.close()
        }, 2000)
        }
        })</script>"
        );
    }

}
