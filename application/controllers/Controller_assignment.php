<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once  APPPATH.('PHPExcel/PHPExcelMRPK/Classes/PHPExcelLelang.php');
require_once  APPPATH.('PHPExcel/PHPExcelMRPK/Classes/PHPExcel/Writer/Excel2007.php');

class Controller_assignment extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('PHPExcel', 'PHPExcel/IOFactory'));
        $this->load->library('Pdfgenerator');
//         include_once APPPATH . '/third_party/fpdf/fpdf.php';
//        $this->load->library('pdf');
        $this->load->helper('file');
		
		$this->db = $this->load->database('default', true);
		$this->db2 = $this->load->database('second', true);

        $this->load->helper(array('form', 'url'));
        $this->load->library('session');
        $this->load->model('Menu_model', '', TRUE);
        $this->load->model('Content_model', '', TRUE);
        $this->load->model('Model_assignment', '', TRUE);
        $this->load->model('Model_log', '', TRUE);
        $this->load->helper(array('form', 'url'));
    }

    public function view_assigment() {
        if ($this->session->has_userdata('username')) {
            $idmenu = 'H05';
            $idmenu2 = 'D041';
            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
            if ($result1 == '1') {
                $this->Model_log->insertlogmenu($this->session->userdata('username'), "Main Menu : " . $idmenu . " Sub Menu : " . $idmenu2);
                
                $iduser = $this->session->userdata('username');
                $result['data'] = $this->Menu_model->loadMenu();
                $result['pagename'] = 'Data Assignment';
                $result['assignment'] = $this->Model_assignment->view_dataassigment($iduser);
//                $result['agent'] = $this->Model_assignment->get_agent($id);
                $result['content'] = 'view_assigment';
                $this->load->view('bss_home', $result);
//            $this->load->view('bss_home', $result); //$this->load->view('home', $result); 
            }
        } else {
            redirect('/');
        }
    }

    public function assign_debitur() {
        $selection = $this->input->post('idnya');
        $data = $this->input->post('agent');
        if ($data == 'Non' or $selection == null) {
            $this->notif_null();
            redirect('controller_assignment/read_as_debitur');
        }
        $assign = $this->Model_assignment->assign_dibutur($selection, $data);
//        print_r($assign);
        if ($assign === 1) {
            $this->notif_sucess();
            redirect('controller_assignment/read_as_debitur');
        } else if ($assign === 0) {
            $this->notif_gagal();
            redirect('controller_assignment/read_as_debitur');
        } else {
            $this->notif_null();
            redirect('controller_assignment/read_as_debitur');
        }
    }

    public function read_as_debitur() {
        if ($this->session->has_userdata('username')) {
            $idmenu = 'H05';
            $idmenu2 = 'D041';
            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
            if ($result1 == '1') {
                
                $userid = $this->session->userdata('username');
                $result['data'] = $this->Menu_model->loadMenu();
                $result['pagename'] = 'Data Assignment';
                $result['assignment'] = $this->Model_assignment->get_list_debitur($userid);
                $result['agent'] = $this->Model_assignment->get_agent($userid);
                $result['content'] = 'read_as_debitur';
                $this->load->view('bss_home', $result);
//                $this->load->view('bss_home', $result); //$this->load->view('home', $result);
//                print_r($result);
            }
        } else {
            redirect('/');
        }
    }

    public function aproved_assignment() {
        if ($this->session->has_userdata('username')) {
            $idmenu = 'H09';
            $idmenu2 = 'D036';
            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
            if ($result1 == '1') {
				//$user = $this->input->post('nik');
				$this->session->set_userdata('agenid','');
                $user = $this->session->userdata('username');
                $result['data'] = $this->Menu_model->loadMenu();
                $result['param'] = $this->Model_assignment->getassignment($user);
                $result['pagename'] = 'Aproved Assignment';
                $result['content'] = 'read_ap_assignment';
                $this->load->view('bss_home', $result);
//               echo print_r($result);
            }
//            $this->load->view('bss_home', $result); //$this->load->view('home', $result);
        } else {
            redirect('/');
        }

//        $result = $this->Content_model->loadMparam()->num_rows();
//        echo $result;
    }

    public function aproved_detail() {
        if ($this->session->has_userdata('username')) {
			$agentid = $this->input->post('nik');
			if(empty($this->session->userdata('agenid'))){
				$agenid2 = $this->session->set_userdata('agenid',$agentid);	
			}
			$agenid = $this->session->userdata('agenid');
            $result['data'] = $this->Menu_model->loadMenu();
            $result['param'] = $this->Model_assignment->getassignmentdetail($agenid);
            $result['pagename'] = 'Aproved Assignment';
            $result['agent'] = $this->Content_model->getagent($agenid);
            $result['content'] = 'read_detail_assignment';
            $this->load->view('bss_home', $result);
//               echo print_r($result);
//            $this->load->view('bss_home', $result); //$this->load->view('home', $result);
        } else {
            redirect('/');
        }

//        $result = $this->Content_model->loadMparam()->num_rows();
//        echo $result;
    }
	
	public function tambah_debitur() {
        if ($this->session->has_userdata('username')) {
			$agentid = $this->input->post('nik');
			if(empty($this->session->userdata('agenid'))){
				$agenid2 = $this->session->set_userdata('agenid',$agentid);	
			}
			$agenid = $this->session->userdata('agenid');
			$result['data'] = $this->Menu_model->loadMenu();
            $result['param'] = $this->Model_assignment->countlist($agenid);
            $result['pagename'] = 'Tambah Debitur';
            $result['agent'] = $this->Content_model->getagent($agenid);
            $result['content'] = 'tambah_debitur';
            $this->load->view('bss_home', $result);
        } else {
            redirect('/');
        }
    }
	
	public function tambah_debitur_proses() {
        if ($this->session->has_userdata('username')) {
			$agentid = $this->input->post('nik');
            $selection = $this->input->post('idnya');
            if ($selection == null) {
                $this->gagal_input();
                redirect('controller_assignment/tambah_debitur');
            }
            $this->Content_model->tambah_debitur_proses($selection);
            $this->sucess_notif();
            redirect('controller_assignment/aproved_detail');
        }
    }

    public function aproved_proses($agentid) {
        if ($this->session->has_userdata('username')) {
            if (isset($_POST['aproved'])) {
                $selection = $this->input->post('idnya');
                //$agent=$this->input->post('agent');

                if ($selection == NULL) {
                    $this->notif_null_approve();
                    redirect('controller_assignment/aproved_detail');
                }

                $action = $this->Model_assignment->aproved_proses($selection);
                if ($action == 1) {
                    $this->notif_sucess_approve();
                    redirect('controller_assignment/aproved_detail');
                } else {
                    $this->notif_gagal_aprove();
                    redirect('controller_assignment/aproved_detail');
                }
            } elseif (isset($_POST['reject'])) {
                $id = $this->input->post('idnya');
                if ($id == NULL) {
                    $this->notif_gagal_reject();
                    redirect('controller_assignment/aproved_detail');
                }
                $reject = $this->Model_assignment->reject_proses_plan_visit($id);
                if ($reject == 1) {
                    $this->notif_sucess_reject();
                    redirect('controller_assignment/aproved_detail');
                } else {
                    $this->notif_gagal_reject();
                    redirect('controller_assignment/aproved_detail');
                }
            }
        }
    }
	
	
	
		  public function excel_assignmentcollector() {
        if ($this->session->has_userdata('username')) {
			$iduser = $this->session->userdata('username');
            $data = $this->Model_assignment->view_dataassigment($iduser);
            $phpexcel = new PHPExcel();
            $phpexcel->getProperties()->setCreator("BSS");
            $phpexcel->getProperties()->setLastModifiedBy("BSS");
            $phpexcel->getProperties()->setTitle("Data Assignment Collector");
            $phpexcel->getProperties()->setSubject("");
            $phpexcel->getProperties()->setDescription("");
            $phpexcel->setActiveSheetIndex(0);
			
            $phpexcel->getActiveSheet()->setCellValue('A1', 'Cabang');
            $phpexcel->getActiveSheet()->setCellValue('B1', 'Kode Cabang');
            $phpexcel->getActiveSheet()->setCellValue('C1', 'Agent ID');
            $phpexcel->getActiveSheet()->setCellValue('D1', 'Agent');
            $phpexcel->getActiveSheet()->setCellValue('E1', 'Tanggal Penugasan');
            $phpexcel->getActiveSheet()->setCellValue('F1', 'Cycle');
            $phpexcel->getActiveSheet()->setCellValue('G1', 'CIF');
            $phpexcel->getActiveSheet()->setCellValue('H1', 'Account Number');
            $phpexcel->getActiveSheet()->setCellValue('I1', 'Nama Customer');
            $phpexcel->getActiveSheet()->setCellValue('J1', 'Kode Pinjaman');
            $phpexcel->getActiveSheet()->setCellValue('K1', 'Profduk Id');
            $phpexcel->getActiveSheet()->setCellValue('L1', 'Nama Produk');
            $phpexcel->getActiveSheet()->setCellValue('M1', 'DPD');
			
            
            $baris = 2;
            foreach ($data as $file) {
                $phpexcel->getActiveSheet()->setCellValue('A' . $baris, $file->cabang);
                $phpexcel->getActiveSheet()->setCellValue('B' . $baris, $file->KodeCabang);
                $phpexcel->getActiveSheet()->setCellValue('C' . $baris, $file->f_agentid);
                $phpexcel->getActiveSheet()->setCellValue('D' . $baris, $file->f_agentname);
                $phpexcel->getActiveSheet()->setCellValue('E' . $baris, $file->f_date_cerate);
                $phpexcel->getActiveSheet()->setCellValue('F' . $baris, $file->cycle);
                $phpexcel->getActiveSheet()->setCellValue('G' . $baris, $file->NomorNasabah);
                $phpexcel->getActiveSheet()->setCellValue('H' . $baris, $file->NomorRekening);
                $phpexcel->getActiveSheet()->setCellValue('I' . $baris, $file->NamaDebitur);
                $phpexcel->getActiveSheet()->setCellValue('J' . $baris, $file->ID);
                $phpexcel->getActiveSheet()->setCellValue('K' . $baris, $file->FacilityType);
                $phpexcel->getActiveSheet()->setCellValue('L' . $baris, $file->ket_facility);
                $phpexcel->getActiveSheet()->setCellValue('M' . $baris, $file->JmlHariTunggakan);
                
                $baris++;
            }
            $filename = "Data Assignment Collector-" . date("d-m-Y") .'.xlsx';
            $phpexcel->getActiveSheet()->setTitle("Data Assignment Collector");
            header('Content-Type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition:attachment;filename="' . $filename . '"');
            header('Cache-control:max-age=0');

            $writer = PHPExcel_IOFactory::createWriter($phpexcel, 'Excel2007');
            //print_r($file);
			ob_end_clean();
            $writer->save('php://output');
            if ($writer == TRUE) {
                $this->Model_log->logactivity($this->session->userdata('username'), "Sucess Download : " . $filename);
            } else {
                $this->Model_log->logactivity($this->session->userdata('username'), "Gagal Download : " . $filename);
            }
            exit;
        } else {
            exit;
        }
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    function notif_sucess() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Berhasil , Assignement',
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
function notif_sucess_reject() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Berhasil , Reject',
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

    function notif_sucess_approve() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Berhasil , Aprove ',
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
	
	function sucess_notif() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Berhasil',
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

    function notif_gagal() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Gagal, Assignement',
        type: 'warning'
        })</script>"
        );
    }
    function notif_gagal_aprove() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Gagal, Aprove ',
        type: 'error'
        })</script>"
        );
    }
	function gagal_input() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Gagal, Menambahkan Silahkan Pilih data Terlebi Dahulu ',
        type: 'warning'
        })</script>"
        );
    }
	
	function notif_gagal_reject() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Gagal, Pilih data Terlebi Dahulu ',
        type: 'warning'
        })</script>"
        );
    }

    function notif_null() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Perhatian, Tidak Ada Yang Di Pilih',
        type: 'warning'
        })</script>"
        );
    }

    function notif_null_approve() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Perhatian, Tidak Ada Yang Di Pilih',
        type: 'warning'
        })</script>"
        );
    }

}
