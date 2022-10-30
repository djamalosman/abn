<?php

//if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//require_once(BASE_PATH . 'PHPExcel/PHPExcelMRPK/Classes/PHPExcel.php');
require_once APPPATH . ('PHPExcel/PHPExcelMRPK/Classes/PHPExcelAyda.php');
require_once APPPATH . ('PHPExcel/PHPExcelMRPK/Classes/PHPExcel/Writer/Excel2007.php');

class Downloadexcel extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->db = $this->load->database('default', true);
        $this->db2 = $this->load->database('second', true);
        $this->load->helper('file');
        $this->load->helper(array('url', 'form'));
//        $this->load->library('PHPExcel1/PHPExcelMRPK/Classes/PHPExcel');
//        $this->load->library('PHPExcel1/PHPExcelMRPK/Classes/PHPExcel/Writer/Excel2007');
        $this->load->library('');
        $this->load->model('Menu_model', '', TRUE);
        $this->load->model('Model_download', '', TRUE);
        $this->load->model('Model_log', '', TRUE);
        $this->load->model('Content_model', '', TRUE);
        $this->load->model('ModelAyda', '', TRUE);
		 $this->load->model('Model_recovery', '', TRUE);
        $this->load->helper('captcha');
    }

    public function excel_employee() {
        if ($this->session->has_userdata('username')) {
            $data = $this->Model_download->get_excelemployee();

            $filename = "Data employee-" . date("d-m-Y") . '.xlsx';

//            $this->Model_log->logactivity($this->session->userdata('username'), "Sucess Download : " . $filename);

            $phpexcel = new PHPExcel();
            $phpexcel->getProperties()->setCreator("BSS");
            $phpexcel->getProperties()->setLastModifiedBy("BSS");
            $phpexcel->getProperties()->setTitle("Data Employee");
            $phpexcel->getProperties()->setSubject("");
            $phpexcel->getProperties()->setDescription("");
            $phpexcel->setActiveSheetIndex(0);
            $phpexcel->getActiveSheet()->setCellValue('A1', 'Landscape');
            $phpexcel->getActiveSheet()->setCellValue('B1', 'Employee Id');
            $phpexcel->getActiveSheet()->setCellValue('C1', 'Full Nama');
            $phpexcel->getActiveSheet()->setCellValue('D1', 'Company Id');
            $phpexcel->getActiveSheet()->setCellValue('E1', 'Company Desc');
            $phpexcel->getActiveSheet()->setCellValue('F1', 'Cost Center');
            $phpexcel->getActiveSheet()->setCellValue('G1', 'Cost Center Desc');
            $phpexcel->getActiveSheet()->setCellValue('H1', 'Position Id');
            $phpexcel->getActiveSheet()->setCellValue('I1', 'Position Desc');
            $phpexcel->getActiveSheet()->setCellValue('J1', 'Org Unit Id');
            $phpexcel->getActiveSheet()->setCellValue('K1', 'Org Unit Id Desc');
            $phpexcel->getActiveSheet()->setCellValue('L1', 'Section Id');
            $phpexcel->getActiveSheet()->setCellValue('M1', 'Section Desc');
            $phpexcel->getActiveSheet()->setCellValue('N1', 'Dept Id');
            $phpexcel->getActiveSheet()->setCellValue('O1', 'Dept Desc');
            $phpexcel->getActiveSheet()->setCellValue('P1', 'Group Id');
            $phpexcel->getActiveSheet()->setCellValue('Q1', 'Group Desc');
            $phpexcel->getActiveSheet()->setCellValue('R1', 'Div Id');
            $phpexcel->getActiveSheet()->setCellValue('S1', 'Div Desc');
            $phpexcel->getActiveSheet()->setCellValue('T1', 'Sub Directorat Id');
            $phpexcel->getActiveSheet()->setCellValue('U1', 'Sub Directorat Desc');
            $phpexcel->getActiveSheet()->setCellValue('V1', 'Directorat');
            $phpexcel->getActiveSheet()->setCellValue('W1', 'Directorat Desc');
            $phpexcel->getActiveSheet()->setCellValue('X1', 'Group Grade Code');
            $phpexcel->getActiveSheet()->setCellValue('Y1', 'Emp Area');
            $phpexcel->getActiveSheet()->setCellValue('Z1', 'Emp Area Desc');
            $phpexcel->getActiveSheet()->setCellValue('AA1', 'Emp Office');
            $phpexcel->getActiveSheet()->setCellValue('AB1', 'Emp Office Desc');
            $phpexcel->getActiveSheet()->setCellValue('AC1', 'Emp Status Code');
            $phpexcel->getActiveSheet()->setCellValue('AD1', 'Ds1 Id');
            $phpexcel->getActiveSheet()->setCellValue('AE1', 'Ds1 Position');
            $phpexcel->getActiveSheet()->setCellValue('AF1', 'Ds2 Id');
            $phpexcel->getActiveSheet()->setCellValue('AG1', 'Ds2 Position');
            $phpexcel->getActiveSheet()->setCellValue('AH1', 'Ds3 Id');
            $phpexcel->getActiveSheet()->setCellValue('AI1', 'Ds3 Desc');
            $phpexcel->getActiveSheet()->setCellValue('AJ1', 'Joint Date');
            $phpexcel->getActiveSheet()->setCellValue('AK1', 'Birth Date');
            $phpexcel->getActiveSheet()->setCellValue('AL1', 'Email');
            $phpexcel->getActiveSheet()->setCellValue('AM1', 'No Telpon');
            $phpexcel->getActiveSheet()->setCellValue('AN1', 'No KTP');
            $phpexcel->getActiveSheet()->setCellValue('AO1', 'Gender');
            $phpexcel->getActiveSheet()->setCellValue('AP1', 'Termintate Date');
            $phpexcel->getActiveSheet()->setCellValue('AQ1', 'Emp Status Desc');
            $baris = 2;
            foreach ($data as $file) {
                $phpexcel->getActiveSheet()->setCellValue('A' . $baris, $file->landscape);
                $phpexcel->getActiveSheet()->setCellValue('B' . $baris, $file->nik);
                $phpexcel->getActiveSheet()->setCellValue('C' . $baris, $file->full_name);
                $phpexcel->getActiveSheet()->setCellValue('D' . $baris, $file->company_id);
                $phpexcel->getActiveSheet()->setCellValue('E' . $baris, $file->company_desc);
                $phpexcel->getActiveSheet()->setCellValue('F' . $baris, $file->cost_center);
                $phpexcel->getActiveSheet()->setCellValue('G' . $baris, $file->cost_center_desc);
                $phpexcel->getActiveSheet()->setCellValue('H' . $baris, $file->position_id);
                $phpexcel->getActiveSheet()->setCellValue('I' . $baris, $file->position_desc);
                $phpexcel->getActiveSheet()->setCellValue('J' . $baris, $file->org_unit_id);
                $phpexcel->getActiveSheet()->setCellValue('K' . $baris, $file->org_unit_desc);
                $phpexcel->getActiveSheet()->setCellValue('L' . $baris, $file->section_id);
                $phpexcel->getActiveSheet()->setCellValue('M' . $baris, $file->section_desc);
                $phpexcel->getActiveSheet()->setCellValue('N' . $baris, $file->dept_id);
                $phpexcel->getActiveSheet()->setCellValue('O' . $baris, $file->dept_desc);
                $phpexcel->getActiveSheet()->setCellValue('P' . $baris, $file->group_id);
                $phpexcel->getActiveSheet()->setCellValue('Q' . $baris, $file->group_desc);
                $phpexcel->getActiveSheet()->setCellValue('R' . $baris, $file->div_id);
                $phpexcel->getActiveSheet()->setCellValue('S' . $baris, $file->div_desc);
                $phpexcel->getActiveSheet()->setCellValue('T' . $baris, $file->sub_directorate_id);
                $phpexcel->getActiveSheet()->setCellValue('U' . $baris, $file->sub_directorate_desc);
                $phpexcel->getActiveSheet()->setCellValue('V' . $baris, $file->directorate);
                $phpexcel->getActiveSheet()->setCellValue('W' . $baris, $file->directorate_desc);
                $phpexcel->getActiveSheet()->setCellValue('X' . $baris, $file->group_grade_code);
                $phpexcel->getActiveSheet()->setCellValue('Y' . $baris, $file->emp_area);
                $phpexcel->getActiveSheet()->setCellValue('Z' . $baris, $file->emp_area_desc);
                $phpexcel->getActiveSheet()->setCellValue('AA' . $baris, $file->emp_office);
                $phpexcel->getActiveSheet()->setCellValue('AB' . $baris, $file->emp_office_desc);
                $phpexcel->getActiveSheet()->setCellValue('AC' . $baris, $file->emp_status_code);
                $phpexcel->getActiveSheet()->setCellValue('AD' . $baris, $file->ds1_id);
                $phpexcel->getActiveSheet()->setCellValue('AE' . $baris, $file->ds1_position);
                $phpexcel->getActiveSheet()->setCellValue('AF' . $baris, $file->ds2_id);
                $phpexcel->getActiveSheet()->setCellValue('AG' . $baris, $file->ds2_position);
                $phpexcel->getActiveSheet()->setCellValue('AH' . $baris, $file->ds3_id);
                $phpexcel->getActiveSheet()->setCellValue('AI' . $baris, $file->ds3_position);
                $phpexcel->getActiveSheet()->setCellValue('AJ' . $baris, $file->join_date);
                $phpexcel->getActiveSheet()->setCellValue('AK' . $baris, $file->birth_date);
                $phpexcel->getActiveSheet()->setCellValue('AL' . $baris, $file->email);
                $phpexcel->getActiveSheet()->setCellValue('AM' . $baris, $file->no_tlp);
                $phpexcel->getActiveSheet()->setCellValue('AN' . $baris, $file->no_ktp);
                $phpexcel->getActiveSheet()->setCellValue('AO' . $baris, $file->gender);
                $phpexcel->getActiveSheet()->setCellValue('AP' . $baris, $file->termintate_date);
                $phpexcel->getActiveSheet()->setCellValue('AQ' . $baris, $file->emp_status_desc);
                $baris++;
            }

            $phpexcel->getActiveSheet()->setTitle("Data Employee");
            header('Content-Type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition:attachment;filename="' . $filename . '"');
            header('Cache-control:max-age=0');

            $writer = PHPExcel_IOFactory::createWriter($phpexcel, 'Excel2007');

            //print_r($file);
            $writer->save('php://output');
            if ($writer == TRUE) {
                $this->Model_log->logactivity($this->session->userdata('username'), "Sucess Download : " . $filename);
            } else {
                $this->Model_log->logactivity($this->session->userdata('username'), "Gagal Download : " . $filename);
            }
//            $this->Model_log->logactivity($this->session->userdata('username'), "Sucess Download : " . $filename );

            exit;
        } else {
            exit;
        }
    }

    public function excel_usermobile() {
        if ($this->session->has_userdata('username')) {
            $data = $this->Model_download->get_usermobile();
            $phpexcel = new PHPExcel();
            $phpexcel->getProperties()->setCreator("BSS");
            $phpexcel->getProperties()->setLastModifiedBy("BSS");
            $phpexcel->getProperties()->setTitle("Data Usermobile");
            $phpexcel->getProperties()->setSubject("");
            $phpexcel->getProperties()->setDescription("");
            $phpexcel->setActiveSheetIndex(0);
            $phpexcel->getActiveSheet()->setCellValue('A1', 'Agent Id');
            $phpexcel->getActiveSheet()->setCellValue('B1', 'Agent Name');
            $phpexcel->getActiveSheet()->setCellValue('C1', 'Id Cabang');
            $phpexcel->getActiveSheet()->setCellValue('D1', 'Cabang');
            $phpexcel->getActiveSheet()->setCellValue('E1', 'Email');
            $phpexcel->getActiveSheet()->setCellValue('F1', 'Username');
            $phpexcel->getActiveSheet()->setCellValue('G1', 'Nomor HP');
            $phpexcel->getActiveSheet()->setCellValue('H1', 'Status');
            $baris = 2;
            foreach ($data as $file) {
				if($file->f_active == 1){
					$active = 'Active';
				} else {
					$active = 'Not Active';
				}
                $phpexcel->getActiveSheet()->setCellValue('A' . $baris, $file->f_agentid);
                $phpexcel->getActiveSheet()->setCellValue('B' . $baris, $file->f_agentname);
                $phpexcel->getActiveSheet()->setCellValue('C' . $baris, $file->f_branch_id);
                $phpexcel->getActiveSheet()->setCellValue('D' . $baris, $file->cabang);
                $phpexcel->getActiveSheet()->setCellValue('E' . $baris, $file->f_email);
                $phpexcel->getActiveSheet()->setCellValue('F' . $baris, $file->f_username);
                $phpexcel->getActiveSheet()->setCellValue('G' . $baris, $file->f_nohp);
                $phpexcel->getActiveSheet()->setCellValue('H' . $baris, $active);
                $baris++;
            }
            $filename = "Data Usermobile-" . date("d-m-Y") . '.xlsx';
            $phpexcel->getActiveSheet()->setTitle("Data Usermobile");
            header('Content-Type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition:attachment;filename="' . $filename . '"');
            header('Cache-control:max-age=0');

            $writer = PHPExcel_IOFactory::createWriter($phpexcel, 'Excel2007');
            //print_r($file);
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
		
	public function excel_userweb() {
        if ($this->session->has_userdata('username')) {
            $data = $this->Model_download->get_userweb();
            $phpexcel = new PHPExcel();
            $phpexcel->getProperties()->setCreator("BSS");
            $phpexcel->getProperties()->setLastModifiedBy("BSS");
            $phpexcel->getProperties()->setTitle("Data Userweb");
            $phpexcel->getProperties()->setSubject("");
            $phpexcel->getProperties()->setDescription("");
            $phpexcel->setActiveSheetIndex(0);
            $phpexcel->getActiveSheet()->setCellValue('A1', 'Username');
            $phpexcel->getActiveSheet()->setCellValue('B1', 'Nama');
            $phpexcel->getActiveSheet()->setCellValue('C1', 'Level');
            $phpexcel->getActiveSheet()->setCellValue('D1', 'Level Desc ');
            $phpexcel->getActiveSheet()->setCellValue('E1', 'Email');
			$phpexcel->getActiveSheet()->setCellValue('F1', 'Status');
            
            $baris = 2;
            foreach ($data as $file) {
				if($file->f_active == 1){
					$active = 'Active';
				} else {
					$active = 'Not Active';
				}
                $phpexcel->getActiveSheet()->setCellValue('A' . $baris, $file->f_userid);
                $phpexcel->getActiveSheet()->setCellValue('B' . $baris, $file->f_username);
                $phpexcel->getActiveSheet()->setCellValue('C' . $baris, $file->f_userlevel);
                $phpexcel->getActiveSheet()->setCellValue('D' . $baris, $file->description);
                $phpexcel->getActiveSheet()->setCellValue('E' . $baris, $file->f_email);
				$phpexcel->getActiveSheet()->setCellValue('F' . $baris, $active);
				
                
                $baris++;
            }
            $filename = "Data Userweb-" . date("d-m-Y") . '.xlsx';
            $phpexcel->getActiveSheet()->setTitle("Data Userweb");
            header('Content-Type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition:attachment;filename="' . $filename . '"');
            header('Cache-control:max-age=0');

            $writer = PHPExcel_IOFactory::createWriter($phpexcel, 'Excel2007');
            //print_r($file);
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

	public function excel_depthead() {
        if ($this->session->has_userdata('username')) {
            $iduser = $this->session->userdata('username');
            $data = $this->Model_download->get_userweb();
            $data1 = $this->Model_download->datadepthead();
            $phpexcel = new PHPExcel();
            $phpexcel->getProperties()->setCreator("BSS");
            $phpexcel->getProperties()->setLastModifiedBy("BSS");
            $phpexcel->getProperties()->setTitle("Data Setting Cabang Handle");
            $phpexcel->getProperties()->setSubject("");
            $phpexcel->getProperties()->setDescription("");
			
	
			$phpexcel->getSheet(0)->setTitle('Data User Web');
			$phpexcel->getSheet(0)->setCellValue('A1', 'Username');
			$phpexcel->getSheet(0)->setCellValue('B1', 'NIK');
			$phpexcel->getSheet(0)->setCellValue('C1', 'Nama');
			$phpexcel->getSheet(0)->setCellValue('D1', 'Level');
			$phpexcel->getSheet(0)->setCellValue('E1', 'Level Desc ');
			$phpexcel->getSheet(0)->setCellValue('F1', 'Email');
			$phpexcel->getSheet(0)->setCellValue('G1', 'Status');
 
		
        $baris = 2;
            foreach ($data as $file) {
				if($file->f_active == 1){
					$active = 'Active';
				} else {
					$active = 'Not Active';
				}
                $phpexcel->getSheet(0)->setCellValue('A' . $baris, $file->f_userid);
                $phpexcel->getSheet(0)->setCellValue('B' . $baris, $file->f_userid);
                $phpexcel->getSheet(0)->setCellValue('C' . $baris, $file->f_username);
                $phpexcel->getSheet(0)->setCellValue('D' . $baris, $file->f_userlevel);
                $phpexcel->getSheet(0)->setCellValue('E' . $baris, $file->description);
                $phpexcel->getSheet(0)->setCellValue('F' . $baris, $file->f_email);
				$phpexcel->getSheet(0)->setCellValue('G' . $baris, $active);
				
                
                $baris++;
            }
        
        $newworksheet = new PHPExcel_Worksheet($phpexcel,'Detail Cabang');
        $phpexcel->addSheet($newworksheet,1);

        $phpexcel->getSheet(1)->setCellValue('A1', 'NIK');
            $phpexcel->getSheet(1)->setCellValue('B1', 'Nama');
            $phpexcel->getSheet(1)->setCellValue('C1', 'Kode Cabang');
            $phpexcel->getSheet(1)->setCellValue('D1', 'Nama Cabang');

        $baris2 = 2;
        
        foreach ($data1 as $file){
                 $phpexcel->getSheet(1)->setCellValue('A' . $baris2, $file->f_nik);
                $phpexcel->getSheet(1)->setCellValue('B' . $baris2, $file->f_nama);
                $phpexcel->getSheet(1)->setCellValue('C' . $baris2, $file->f_kode_cabang);
                $phpexcel->getSheet(1)->setCellValue('D' . $baris2, $file->f_cabang);           
            $baris2++;
        }

           
            $filename = "Setting Cabang Handle-" . date("d-m-Y") . '.xlsx';
           // $phpexcel->getActiveSheet()->setTitle("Data Assignment Collector");
            header('Content-Type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition:attachment;filename="' . $filename . '"');
            header('Cache-control:max-age=0');

            $writer = PHPExcel_IOFactory::createWriter($phpexcel, 'Excel2007');
            //print_r($file);
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
	
	public function excel_branch() {
        if ($this->session->has_userdata('username')) {
            $data = $this->Model_download->get_branch();
            $phpexcel = new PHPExcel();
            $phpexcel->getProperties()->setCreator("BSS");
            $phpexcel->getProperties()->setLastModifiedBy("BSS");
            $phpexcel->getProperties()->setTitle("Data Branch");
            $phpexcel->getProperties()->setSubject("");
            $phpexcel->getProperties()->setDescription("");
            $phpexcel->setActiveSheetIndex(0);
            $phpexcel->getActiveSheet()->setCellValue('A1', 'Kode Cabang');
            $phpexcel->getActiveSheet()->setCellValue('B1', 'Nama Cabang');
            $phpexcel->getActiveSheet()->setCellValue('C1', 'Alamat Cabang');
            
            $baris = 2;
            foreach ($data as $file) {
                $phpexcel->getActiveSheet()->setCellValue('A' . $baris, $file->ID);
                $phpexcel->getActiveSheet()->setCellValue('B' . $baris, $file->COMPANY_NAME);
                $phpexcel->getActiveSheet()->setCellValue('C' . $baris, $file->NAME_ADDRESS);
                
                $baris++;
            }
            $filename = "Data Branch-" . date("d-m-Y") . '.xlsx';
            $phpexcel->getActiveSheet()->setTitle("Data Branch");
            header('Content-Type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition:attachment;filename="' . $filename . '"');
            header('Cache-control:max-age=0');

            $writer = PHPExcel_IOFactory::createWriter($phpexcel, 'Excel2007');
            //print_r($file);
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
	
	public function excel_assignment() {
        if ($this->session->has_userdata('username')) {
			$iduser = $this->session->userdata('username');
            $data = $this->Model_download->get_list_debitur($iduser);
            $phpexcel = new PHPExcel();
            $phpexcel->getProperties()->setCreator("BSS");
            $phpexcel->getProperties()->setLastModifiedBy("BSS");
            $phpexcel->getProperties()->setTitle("Data Not Assignment");
            $phpexcel->getProperties()->setSubject("");
            $phpexcel->getProperties()->setDescription("");
            $phpexcel->setActiveSheetIndex(0);
			
            $phpexcel->getActiveSheet()->setCellValue('A1', 'Nomor Nasabah');
            $phpexcel->getActiveSheet()->setCellValue('B1', 'Nomor Rekening');
            $phpexcel->getActiveSheet()->setCellValue('C1', 'Nama Debitur');
            $phpexcel->getActiveSheet()->setCellValue('D1', 'ID');
            $phpexcel->getActiveSheet()->setCellValue('E1', 'DPD');
            $phpexcel->getActiveSheet()->setCellValue('F1', 'Facility Type');
            $phpexcel->getActiveSheet()->setCellValue('G1', 'Nama Produk');
            $phpexcel->getActiveSheet()->setCellValue('H1', 'Plafond Amount');
            $phpexcel->getActiveSheet()->setCellValue('I1', 'Statart Date Plafond');
            $phpexcel->getActiveSheet()->setCellValue('J1', 'Date Expired');
            $phpexcel->getActiveSheet()->setCellValue('K1', 'Cycle');
            $phpexcel->getActiveSheet()->setCellValue('L1', 'Tenor');
            $phpexcel->getActiveSheet()->setCellValue('M1', 'Code Cabang');
            $phpexcel->getActiveSheet()->setCellValue('N1', 'Cabang');
            $phpexcel->getActiveSheet()->setCellValue('O1', 'DPD EOM');
            $phpexcel->getActiveSheet()->setCellValue('P1', 'Bucket');
            $phpexcel->getActiveSheet()->setCellValue('Q1', 'Flag');
            $phpexcel->getActiveSheet()->setCellValue('R1', 'Angsuran');
            $phpexcel->getActiveSheet()->setCellValue('S1', 'Baki Debet');
            $phpexcel->getActiveSheet()->setCellValue('T1', 'Tunggakan Pokok');
            $phpexcel->getActiveSheet()->setCellValue('U1', 'Bunga');
            $phpexcel->getActiveSheet()->setCellValue('V1', 'Denda');
            $phpexcel->getActiveSheet()->setCellValue('W1', 'Total Tagihan');
            $phpexcel->getActiveSheet()->setCellValue('X1', 'Saldo Tabungan');
            $phpexcel->getActiveSheet()->setCellValue('Y1', 'Tanggal Restruktur');
            $phpexcel->getActiveSheet()->setCellValue('Z1', 'Struktur Ke');
            $phpexcel->getActiveSheet()->setCellValue('AA1', 'Alamat Tagih');
            $phpexcel->getActiveSheet()->setCellValue('AB1', 'Post Code');
            $phpexcel->getActiveSheet()->setCellValue('AC1', 'No Telp');
            $phpexcel->getActiveSheet()->setCellValue('AD1', 'Email');
			
            
            $baris = 2;
            foreach ($data as $file) {
                $phpexcel->getActiveSheet()->setCellValue('A' . $baris, $file->NomorNasabah);
                $phpexcel->getActiveSheet()->setCellValue('B' . $baris, $file->NomorRekening);
                $phpexcel->getActiveSheet()->setCellValue('C' . $baris, $file->NamaDebitur);
                $phpexcel->getActiveSheet()->setCellValue('D' . $baris, $file->ID);
                $phpexcel->getActiveSheet()->setCellValue('E' . $baris, $file->DPD);
                $phpexcel->getActiveSheet()->setCellValue('F' . $baris, $file->FacilityType);
                $phpexcel->getActiveSheet()->setCellValue('G' . $baris, $file->PlafondAmount);
                $phpexcel->getActiveSheet()->setCellValue('H' . $baris, $file->ket_facility);
                $phpexcel->getActiveSheet()->setCellValue('I' . $baris, $file->STARTDATEPLAFOND);
                $phpexcel->getActiveSheet()->setCellValue('J' . $baris, $file->DATEEXPIRED);
                $phpexcel->getActiveSheet()->setCellValue('K' . $baris, $file->cycle);
                $phpexcel->getActiveSheet()->setCellValue('L' . $baris, $file->tenor);
                $phpexcel->getActiveSheet()->setCellValue('M' . $baris, $file->KodeCabang);
                $phpexcel->getActiveSheet()->setCellValue('N' . $baris, $file->Cabang);
                $phpexcel->getActiveSheet()->setCellValue('O' . $baris, $file->DPD_EOM);
                $phpexcel->getActiveSheet()->setCellValue('P' . $baris, $file->bucked);
                $phpexcel->getActiveSheet()->setCellValue('Q' . $baris, '');
                $phpexcel->getActiveSheet()->setCellValue('R' . $baris, $file->angsuran);
                $phpexcel->getActiveSheet()->setCellValue('S' . $baris, $file->BakiDebet);
                $phpexcel->getActiveSheet()->setCellValue('T' . $baris, $file->tunggakan_pokok);
                $phpexcel->getActiveSheet()->setCellValue('U' . $baris, $file->bunga);
                $phpexcel->getActiveSheet()->setCellValue('V' . $baris, $file->denda);
                $phpexcel->getActiveSheet()->setCellValue('W' . $baris, $file->total_tagihan);
                $phpexcel->getActiveSheet()->setCellValue('X' . $baris, $file->saldo_tabungan);
                $phpexcel->getActiveSheet()->setCellValue('Y' . $baris, $file->tgl_restru);
                $phpexcel->getActiveSheet()->setCellValue('Z' . $baris, $file->restru_ke);
                $phpexcel->getActiveSheet()->setCellValue('AA' . $baris, $file->alamat);
                $phpexcel->getActiveSheet()->setCellValue('AB' . $baris, $file->postcode);
                $phpexcel->getActiveSheet()->setCellValue('AC' . $baris, $file->notlp);
                $phpexcel->getActiveSheet()->setCellValue('AD' . $baris, $file->email);
                
                $baris++;
            }
            $filename = "Data Not Assignment-" . date("d-m-Y") . '.xlsx';
            $phpexcel->getActiveSheet()->setTitle("Data Not Assignment");
            header('Content-Type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition:attachment;filename="' . $filename . '"');
            header('Cache-control:max-age=0');

            $writer = PHPExcel_IOFactory::createWriter($phpexcel, 'Excel2007');
            //print_r($file);
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
		
	public function excel_assignmentcollector() {
        if ($this->session->has_userdata('username')) {
			$iduser = $this->session->userdata('username');
            $data = $this->Model_download->dataassigment($iduser);
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
           
			$phpexcel->getActiveSheet()->setCellValue('M1', 'Plafond Amount');
			$phpexcel->getActiveSheet()->setCellValue('N1', 'Baki Debet');
			$phpexcel->getActiveSheet()->setCellValue('O1', 'Angsuran');
			$phpexcel->getActiveSheet()->setCellValue('P1', 'Due Bunga');
			$phpexcel->getActiveSheet()->setCellValue('Q1', 'Due Pokok');
			$phpexcel->getActiveSheet()->setCellValue('R1', 'Denda');
			$phpexcel->getActiveSheet()->setCellValue('S1', 'Available_funds');
			$phpexcel->getActiveSheet()->setCellValue('T1', 'lock_amt');
			$phpexcel->getActiveSheet()->setCellValue('U1', 'inRate');
			$phpexcel->getActiveSheet()->setCellValue('V1', 'DPD');
			$phpexcel->getActiveSheet()->setCellValue('W1', 'DPD EOM');
			
            
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
$phpexcel->getActiveSheet()->setCellValue('M' . $baris, $file->PlafondAmount);
$phpexcel->getActiveSheet()->setCellValue('N'. $baris, $file->BakiDebet);
$phpexcel->getActiveSheet()->setCellValue('O' . $baris, $file->Angsuran);
$phpexcel->getActiveSheet()->setCellValue('P' . $baris, $file->DueBunga);
$phpexcel->getActiveSheet()->setCellValue('Q' . $baris, $file->DuePokok);
$phpexcel->getActiveSheet()->setCellValue('R' . $baris, $file->denda);
$phpexcel->getActiveSheet()->setCellValue('S' . $baris, $file->Available_Funds);
$phpexcel->getActiveSheet()->setCellValue('T' . $baris, $file->lock_amt);
$phpexcel->getActiveSheet()->setCellValue('U' . $baris, $file->IntRate);
                $phpexcel->getActiveSheet()->setCellValue('V' . $baris, $file->JmlHariTunggakan);
				$phpexcel->getActiveSheet()->setCellValue('W' . $baris, $file->DPD_EOM);
                
                $baris++;
            }
            $filename = "Data Assignment Collector-" . date("d-m-Y") . '.xlsx';
            $phpexcel->getActiveSheet()->setTitle("Data Assignment Collector");
            header('Content-Type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition:attachment;filename="' . $filename . '"');
            header('Cache-control:max-age=0');

            $writer = PHPExcel_IOFactory::createWriter($phpexcel, 'Excel2007');
            //print_r($file);
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
	
	public function excel_countlist() {
        if ($this->session->has_userdata('username')) {
			$iduser = $this->session->userdata('username');
            $data = $this->Model_download->get_list_debitur($iduser);
            $phpexcel = new PHPExcel();
            $phpexcel->getProperties()->setCreator("BSS");
            $phpexcel->getProperties()->setLastModifiedBy("BSS");
            $phpexcel->getProperties()->setTitle("Data Not Assignment");
            $phpexcel->getProperties()->setSubject("");
            $phpexcel->getProperties()->setDescription("");
            $phpexcel->setActiveSheetIndex(0);
			
            $phpexcel->getActiveSheet()->setCellValue('A1', 'Nomor Nasabah');
            $phpexcel->getActiveSheet()->setCellValue('B1', 'Nomor Rekening');
            $phpexcel->getActiveSheet()->setCellValue('C1', 'Nama Debitur');
            $phpexcel->getActiveSheet()->setCellValue('D1', 'ID');
            $phpexcel->getActiveSheet()->setCellValue('E1', 'DPD');
            $phpexcel->getActiveSheet()->setCellValue('F1', 'Facility Type');
            $phpexcel->getActiveSheet()->setCellValue('G1', 'Nama Produk');
            $phpexcel->getActiveSheet()->setCellValue('H1', 'Plafond Amount');
            $phpexcel->getActiveSheet()->setCellValue('I1', 'Statart Date Plafond');
            $phpexcel->getActiveSheet()->setCellValue('J1', 'Date Expired');
            $phpexcel->getActiveSheet()->setCellValue('K1', 'Cycle');
            $phpexcel->getActiveSheet()->setCellValue('L1', 'Tenor');
            $phpexcel->getActiveSheet()->setCellValue('M1', 'Code Cabang');
            $phpexcel->getActiveSheet()->setCellValue('N1', 'Cabang');
            $phpexcel->getActiveSheet()->setCellValue('O1', 'DPD EOM');
            $phpexcel->getActiveSheet()->setCellValue('P1', 'Bucket');
            $phpexcel->getActiveSheet()->setCellValue('Q1', 'Flag');
            $phpexcel->getActiveSheet()->setCellValue('R1', 'Angsuran');
            $phpexcel->getActiveSheet()->setCellValue('S1', 'Baki Debet');
            $phpexcel->getActiveSheet()->setCellValue('T1', 'Tunggakan Pokok');
            $phpexcel->getActiveSheet()->setCellValue('U1', 'Bunga');
            $phpexcel->getActiveSheet()->setCellValue('V1', 'Denda');
            $phpexcel->getActiveSheet()->setCellValue('W1', 'Total Tagihan');
            $phpexcel->getActiveSheet()->setCellValue('X1', 'Saldo Tabungan');
            $phpexcel->getActiveSheet()->setCellValue('Y1', 'Tanggal Restruktur');
            $phpexcel->getActiveSheet()->setCellValue('Z1', 'Struktur Ke');
            $phpexcel->getActiveSheet()->setCellValue('AA1', 'Alamat Tagih');
            $phpexcel->getActiveSheet()->setCellValue('AB1', 'Post Code');
            $phpexcel->getActiveSheet()->setCellValue('AC1', 'No Telp');
            $phpexcel->getActiveSheet()->setCellValue('AD1', 'Email');
			
			
            
            $baris = 2;
            foreach ($data as $file) {
                $phpexcel->getActiveSheet()->setCellValue('A' . $baris, $file->NomorNasabah);
                $phpexcel->getActiveSheet()->setCellValue('B' . $baris, $file->NomorRekening);
                $phpexcel->getActiveSheet()->setCellValue('C' . $baris, $file->NamaDebitur);
                $phpexcel->getActiveSheet()->setCellValue('D' . $baris, $file->ID);
                $phpexcel->getActiveSheet()->setCellValue('E' . $baris, $file->DPD);
                $phpexcel->getActiveSheet()->setCellValue('F' . $baris, $file->FacilityType);
                $phpexcel->getActiveSheet()->setCellValue('G' . $baris, $file->PlafondAmount);
                $phpexcel->getActiveSheet()->setCellValue('H' . $baris, $file->ket_facility);
                $phpexcel->getActiveSheet()->setCellValue('I' . $baris, $file->STARTDATEPLAFOND);
                $phpexcel->getActiveSheet()->setCellValue('J' . $baris, $file->DATEEXPIRED);
                $phpexcel->getActiveSheet()->setCellValue('K' . $baris, $file->cycle);
                $phpexcel->getActiveSheet()->setCellValue('L' . $baris, $file->tenor);
                $phpexcel->getActiveSheet()->setCellValue('M' . $baris, $file->KodeCabang);
                $phpexcel->getActiveSheet()->setCellValue('N' . $baris, $file->Cabang);
                $phpexcel->getActiveSheet()->setCellValue('O' . $baris, $file->DPD_EOM);
                $phpexcel->getActiveSheet()->setCellValue('P' . $baris, $file->bucked);
                $phpexcel->getActiveSheet()->setCellValue('Q' . $baris, '');
                $phpexcel->getActiveSheet()->setCellValue('R' . $baris, $file->angsuran);
                $phpexcel->getActiveSheet()->setCellValue('S' . $baris, $file->BakiDebet);
                $phpexcel->getActiveSheet()->setCellValue('T' . $baris, $file->tunggakan_pokok);
                $phpexcel->getActiveSheet()->setCellValue('U' . $baris, $file->bunga);
                $phpexcel->getActiveSheet()->setCellValue('V' . $baris, $file->denda);
                $phpexcel->getActiveSheet()->setCellValue('W' . $baris, $file->total_tagihan);
                $phpexcel->getActiveSheet()->setCellValue('X' . $baris, $file->saldo_tabungan);
                $phpexcel->getActiveSheet()->setCellValue('Y' . $baris, $file->tgl_restru);
                $phpexcel->getActiveSheet()->setCellValue('Z' . $baris, $file->restru_ke);
                $phpexcel->getActiveSheet()->setCellValue('AA' . $baris, $file->alamat);
                $phpexcel->getActiveSheet()->setCellValue('AB' . $baris, $file->postcode);
                $phpexcel->getActiveSheet()->setCellValue('AC' . $baris, $file->notlp);
                $phpexcel->getActiveSheet()->setCellValue('AD' . $baris, $file->email);
                
                $baris++;
            }
            $filename = "Data Not Assignment-" . date("d-m-Y") . '.xlsx';
            $phpexcel->getActiveSheet()->setTitle("Data Not Assignment");
            header('Content-Type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition:attachment;filename="' . $filename . '"');
            header('Cache-control:max-age=0');

            $writer = PHPExcel_IOFactory::createWriter($phpexcel, 'Excel2007');
            //print_r($file);
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

	public function create_sp_excel(){
        $data= $this->Generatesp->excel_SP();
         
         $objphpexcel=new PHPExcel();
         
        $objphpexcel->getProperties()->setCreator("BSS");
        $objphpexcel->getProperties()->setLastModifiedBy("BSS");
        $objphpexcel->getProperties()->setTitle("Data SP Administrator");
        $objphpexcel->getProperties()->setSubject("");
        $objphpexcel->getProperties()->setDescription("");
        
        $objphpexcel->setActiveSheetIndex(0);
        
        $objphpexcel->getActiveSheet()->setCellValue('A1','Jenis SP');
		
        $objphpexcel->getActiveSheet()->setCellValue('B1','Produk ID');
		$objphpexcel->getActiveSheet()->setCellValue('C1','Produk');
        $objphpexcel->getActiveSheet()->setCellValue('D1','DPD Min');
        $objphpexcel->getActiveSheet()->setCellValue('E1','Masa Berlaku');
 
       $baris=2;
        
        foreach ($data as $file){
            $objphpexcel->getActiveSheet()->setCellValue('A'.$baris,$file->f_spe);
			$objphpexcel->getActiveSheet()->setCellValue('B'.$baris,$file->f_produk_id);
			$objphpexcel->getActiveSheet()->setCellValue('C'.$baris,$file->f_produk);
            $objphpexcel->getActiveSheet()->setCellValue('D'.$baris,$file->f_min_dpd);
            $objphpexcel->getActiveSheet()->setCellValue('E'.$baris,$file->f_masa);
           
           
            $baris++;
        }
        $filename="Data SP Administrator-".date("d-m-Y").'.xlsx';
        $objphpexcel->getActiveSheet()->setTitle("Data SP Administrator");
        header('Content-Type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition:attachment;filename="'.$filename.'"');
        header('Cache-control:max-age=0');
        
        $writer= PHPExcel_IOFactory::createWriter($objphpexcel,'Excel2007');
        //print_r($file);
         $writer->save('php://output');
		 if ($writer == TRUE) {
                $this->Model_log->logactivity($this->session->userdata('username'), "Sucess Download : " . $filename);
            } else {
                $this->Model_log->logactivity($this->session->userdata('username'), "Gagal Download : " . $filename);
            }
               exit;
    }	
	
	

    public function excel_monitoringsp() {
        if ($this->session->has_userdata('username')) {
            $iduser = $this->session->userdata('username');
            $data = $this->Model_download->getsmonitoringsp();
            $phpexcel = new PHPExcel();
            $phpexcel->getProperties()->setCreator("BSS");
            $phpexcel->getProperties()->setLastModifiedBy("BSS");
            $phpexcel->getProperties()->setTitle("Data Monitoring SP");
            $phpexcel->getProperties()->setSubject("");
            $phpexcel->getProperties()->setDescription("");
            $phpexcel->setActiveSheetIndex(0);

            $phpexcel->getActiveSheet()->setCellValue('A1', 'No Surat');
            $phpexcel->getActiveSheet()->setCellValue('B1', 'Jenis SP');
            $phpexcel->getActiveSheet()->setCellValue('C1', 'CIF');
            $phpexcel->getActiveSheet()->setCellValue('D1', 'Nama Nasabah');
            $phpexcel->getActiveSheet()->setCellValue('E1', 'Kode Cabang');
            $phpexcel->getActiveSheet()->setCellValue('F1', 'Nama Cabang');
            $phpexcel->getActiveSheet()->setCellValue('G1', 'DPD');
            $phpexcel->getActiveSheet()->setCellValue('H1', 'Tanggal Angsuran');
            $phpexcel->getActiveSheet()->setCellValue('I1', 'Status');
            $phpexcel->getActiveSheet()->setCellValue('J1', 'Tanggal Terbit');
            $phpexcel->getActiveSheet()->setCellValue('K1', 'Tanggal Cetak');
            $phpexcel->getActiveSheet()->setCellValue('L1', 'Tanggal Kirim');
            $phpexcel->getActiveSheet()->setCellValue('M1', 'Tanggal Tanggal Trima');
            $phpexcel->getActiveSheet()->setCellValue('N1', 'Keterangan');
            $phpexcel->getActiveSheet()->setCellValue('O1', 'Produk Id');


            $baris = 2;
            foreach ($data as $file) {

                if ($file->f_status == '0') {
                    $status = "Belum Tercetak";
                } elseif ($file->f_status == '1') {
                    $status = "Sudah Tercetak";
                } elseif ($file->f_status == '2') {
                    $status = "Kirim";
                } elseif ($file->f_status == '3') {
                    $status = "Di Terima";
                } 
                $phpexcel->getActiveSheet()->setCellValue('A' . $baris, $file->f_nomer);
                $phpexcel->getActiveSheet()->setCellValue('B' . $baris, $file->f_sp);
                $phpexcel->getActiveSheet()->setCellValue('C' . $baris, $file->f_cif);
                $phpexcel->getActiveSheet()->setCellValue('D' . $baris, $file->f_nama_nasabah);
                $phpexcel->getActiveSheet()->setCellValue('E' . $baris, $file->f_cabang_id);
                $phpexcel->getActiveSheet()->setCellValue('F' . $baris, $file->f_cabang);
                $phpexcel->getActiveSheet()->setCellValue('G' . $baris, $file->f_dpd);
                $phpexcel->getActiveSheet()->setCellValue('H' . $baris, $file->f_tgl_angsuran);
                $phpexcel->getActiveSheet()->setCellValue('I' . $baris, $status);
                $phpexcel->getActiveSheet()->setCellValue('J' . $baris, $file->f_date_time);
                $phpexcel->getActiveSheet()->setCellValue('K' . $baris, $file->f_tgl_cetak);
                $phpexcel->getActiveSheet()->setCellValue('L' . $baris, $file->f_tgl_kirim);
                $phpexcel->getActiveSheet()->setCellValue('M' . $baris, $file->f_tgl_terima);
                $phpexcel->getActiveSheet()->setCellValue('N' . $baris, $file->f_keterangan);
                $phpexcel->getActiveSheet()->setCellValue('O' . $baris, $file->f_id_produk);
                $baris++;
            }
            $filename = "Data Monitorng SP-" . date("d-m-Y") . '.xlsx';
            $phpexcel->getActiveSheet()->setTitle("Data Assignment Collector");
            header('Content-Type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition:attachment;filename="' . $filename . '"');
            header('Cache-control:max-age=0');

            $writer = PHPExcel_IOFactory::createWriter($phpexcel, 'Excel2007');
            //print_r($file);
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
    
	public function excel_monitoringspe() {
        if ($this->session->has_userdata('username')) {
            $iduser = $this->session->userdata('username');
            $data = $this->Model_download->getsmonitoringspe();
            $phpexcel = new PHPExcel();
            $phpexcel->getProperties()->setCreator("BSS");
            $phpexcel->getProperties()->setLastModifiedBy("BSS");
            $phpexcel->getProperties()->setTitle("Data Monitoring SPe");
            $phpexcel->getProperties()->setSubject("");
            $phpexcel->getProperties()->setDescription("");
            $phpexcel->setActiveSheetIndex(0);

            $phpexcel->getActiveSheet()->setCellValue('A1', 'No Surat');
            $phpexcel->getActiveSheet()->setCellValue('B1', 'Jenis SPe');
            $phpexcel->getActiveSheet()->setCellValue('C1', 'CIF');
            $phpexcel->getActiveSheet()->setCellValue('D1', 'Nama Nasabah');
            $phpexcel->getActiveSheet()->setCellValue('E1', 'Kode Cabang');
            $phpexcel->getActiveSheet()->setCellValue('F1', 'Nama Cabang');
            $phpexcel->getActiveSheet()->setCellValue('G1', 'DPD');
            $phpexcel->getActiveSheet()->setCellValue('H1', 'Tanggal Angsuran');
            $phpexcel->getActiveSheet()->setCellValue('I1', 'Status');
            $phpexcel->getActiveSheet()->setCellValue('J1', 'Tanggal Terbit');
            $phpexcel->getActiveSheet()->setCellValue('K1', 'Tanggal Cetak');
            $phpexcel->getActiveSheet()->setCellValue('L1', 'Tanggal Kirim');
            $phpexcel->getActiveSheet()->setCellValue('M1', 'Tanggal Tanggal Trima');
            $phpexcel->getActiveSheet()->setCellValue('N1', 'Keterangan');


            $baris = 2;
            foreach ($data as $file) {

                if ($file->f_status == '0') {
                    $status = "Belum Tercetak";
                } elseif ($file->f_status == '1') {
                    $status = "Sudah Tercetak";
                } elseif ($file->f_status == '2') {
                    $status = "Kirim";
                } elseif ($file->f_status == '3') {
                    $status = "Di Terima";
                } 
                $phpexcel->getActiveSheet()->setCellValue('A' . $baris, $file->f_nomer);
                $phpexcel->getActiveSheet()->setCellValue('B' . $baris, $file->f_sp);
                $phpexcel->getActiveSheet()->setCellValue('C' . $baris, $file->f_cif);
                $phpexcel->getActiveSheet()->setCellValue('D' . $baris, $file->f_nama_nasabah);
                $phpexcel->getActiveSheet()->setCellValue('E' . $baris, $file->f_cabang_id);
                $phpexcel->getActiveSheet()->setCellValue('F' . $baris, $file->f_cabang);
                $phpexcel->getActiveSheet()->setCellValue('G' . $baris, $file->f_dpd);
                $phpexcel->getActiveSheet()->setCellValue('H' . $baris, $file->f_tgl_angsuran);
                $phpexcel->getActiveSheet()->setCellValue('I' . $baris, $status);
                $phpexcel->getActiveSheet()->setCellValue('J' . $baris, $file->f_date_time);
                $phpexcel->getActiveSheet()->setCellValue('K' . $baris, $file->f_tgl_cetak);
                $phpexcel->getActiveSheet()->setCellValue('L' . $baris, $file->f_tgl_kirim);
                $phpexcel->getActiveSheet()->setCellValue('M' . $baris, $file->f_tgl_terima);
                $phpexcel->getActiveSheet()->setCellValue('N' . $baris, $file->f_keterangan);
                $baris++;
            }
            $filename = "Data Monitorng SPe-" . date("d-m-Y") . '.xlsx';
            $phpexcel->getActiveSheet()->setTitle("Data Assignment Collector");
            header('Content-Type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition:attachment;filename="' . $filename . '"');
            header('Cache-control:max-age=0');

            $writer = PHPExcel_IOFactory::createWriter($phpexcel, 'Excel2007');
            //print_r($file);
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
    
	public function excel_administrationspe() {
        if ($this->session->has_userdata('username')) {
            $iduser = $this->session->userdata('username');
            $data = $this->Model_download->getspe();
            $phpexcel = new PHPExcel();
            $phpexcel->getProperties()->setCreator("BSS");
            $phpexcel->getProperties()->setLastModifiedBy("BSS");
            $phpexcel->getProperties()->setTitle("Data Parameter SPe");
            $phpexcel->getProperties()->setSubject("");
            $phpexcel->getProperties()->setDescription("");
            $phpexcel->setActiveSheetIndex(0);

            $phpexcel->getActiveSheet()->setCellValue('A1', 'Jenis SP');
            $phpexcel->getActiveSheet()->setCellValue('B1', 'Produk ID');
            $phpexcel->getActiveSheet()->setCellValue('C1', 'Produk');
            $phpexcel->getActiveSheet()->setCellValue('D1', 'Description');
            $phpexcel->getActiveSheet()->setCellValue('E1', 'Value Parameter');
            $phpexcel->getActiveSheet()->setCellValue('F1', 'Masa Berlaku');

            $baris = 2;
            foreach ($data as $file) {
            $phpexcel->getActiveSheet()->setCellValue('A'.$baris, $file->f_spe);
            $phpexcel->getActiveSheet()->setCellValue('B'.$baris, $file->f_produk_id);
            $phpexcel->getActiveSheet()->setCellValue('C'.$baris, $file->f_produk);
            $phpexcel->getActiveSheet()->setCellValue('D'.$baris, $file->f_desc);
            $phpexcel->getActiveSheet()->setCellValue('E'.$baris, $file->f_parameter);
            $phpexcel->getActiveSheet()->setCellValue('F'.$baris, $file->f_masa);
            
           
                $baris++;
            }
            $filename = "Data Parameter SPe-" . date("d-m-Y") . '.xlsx';
            $phpexcel->getActiveSheet()->setTitle("Data Assignment Collector");
            header('Content-Type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition:attachment;filename="' . $filename . '"');
            header('Cache-control:max-age=0');

            $writer = PHPExcel_IOFactory::createWriter($phpexcel, 'Excel2007');
            //print_r($file);
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
	
	public function excel_masterparameter() {
        if ($this->session->has_userdata('username')) {
            $data = $this->Model_download->get_branch();
            $phpexcel = new PHPExcel();
            $phpexcel->getProperties()->setCreator("BSS");
            $phpexcel->getProperties()->setLastModifiedBy("BSS");
            $phpexcel->getProperties()->setTitle("Data Master Parameter");
            $phpexcel->getProperties()->setSubject("");
            $phpexcel->getProperties()->setDescription("");
            $phpexcel->setActiveSheetIndex(0);
            $phpexcel->getActiveSheet()->setCellValue('A1', 'Kode Cabang');
            $phpexcel->getActiveSheet()->setCellValue('B1', 'Nama Cabang');
            $phpexcel->getActiveSheet()->setCellValue('C1', 'Alamat Cabang');
            
            $baris = 2;
            foreach ($data as $file) {
                $phpexcel->getActiveSheet()->setCellValue('A' . $baris, $file->ID);
                $phpexcel->getActiveSheet()->setCellValue('B' . $baris, $file->COMPANY_NAME);
                $phpexcel->getActiveSheet()->setCellValue('C' . $baris, $file->NAME_ADDRESS);
                
                $baris++;
            }
            $filename = "Data Master Parameter-" . date("d-m-Y H:i:s") . '.xlsx';
            $phpexcel->getActiveSheet()->setTitle("Data Master Parameter");
            header('Content-Type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition:attachment;filename="' . $filename . '"');
            header('Cache-control:max-age=0');

            $writer = PHPExcel_IOFactory::createWriter($phpexcel, 'Excel2007');
            //print_r($file);
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

	public function excel_datavisit(){
		 if ($this->session->has_userdata('username')) {
            $data = $this->Model_download->get_kunjungan();
            $phpexcel = new PHPExcel();
            $phpexcel->getProperties()->setCreator("BSS");
            $phpexcel->getProperties()->setLastModifiedBy("BSS");
            $phpexcel->getProperties()->setTitle("Data Hasil Visit");
            $phpexcel->getProperties()->setSubject("");
            $phpexcel->getProperties()->setDescription("");
            $phpexcel->setActiveSheetIndex(0);
            $phpexcel->getActiveSheet()->setCellValue('A1', 'ID Collector');
            $phpexcel->getActiveSheet()->setCellValue('B1', 'Nama Collector');
            $phpexcel->getActiveSheet()->setCellValue('C1', 'Tujuan');
            $phpexcel->getActiveSheet()->setCellValue('D1', 'Nomor Nasabah');
            $phpexcel->getActiveSheet()->setCellValue('E1', 'Nama Nasabah');
            $phpexcel->getActiveSheet()->setCellValue('F1', 'Tanggal Visit');
            $phpexcel->getActiveSheet()->setCellValue('G1', 'Hasil Kunjungan');
            $phpexcel->getActiveSheet()->setCellValue('H1', 'Keterangan Hasil Kunjungan');
            $phpexcel->getActiveSheet()->setCellValue('I1', 'Bertemu Dengan');
            $phpexcel->getActiveSheet()->setCellValue('J1', 'Keterangan Bertemu');
            $phpexcel->getActiveSheet()->setCellValue('K1', 'Lokasi Bertemu');
            $phpexcel->getActiveSheet()->setCellValue('L1', 'Keterangan Lokasi Bertemu');
            $phpexcel->getActiveSheet()->setCellValue('M1', 'Karakter Nasabah');
            $phpexcel->getActiveSheet()->setCellValue('N1', 'Keterangan Karakter Nasabah');
            $phpexcel->getActiveSheet()->setCellValue('O1', 'Negatif Issue');
            $phpexcel->getActiveSheet()->setCellValue('P1', 'Action Plan');
            $phpexcel->getActiveSheet()->setCellValue('Q1', 'Tanggal Action Plan');
            $phpexcel->getActiveSheet()->setCellValue('R1', 'Resume Nasabah');
            $phpexcel->getActiveSheet()->setCellValue('S1', 'Total Tunggakan');
            $phpexcel->getActiveSheet()->setCellValue('T1', 'Total Bayar');
            $phpexcel->getActiveSheet()->setCellValue('U1', 'Perkiraan Perbaikan Bucket');
            $phpexcel->getActiveSheet()->setCellValue('V1', 'Perubahan Alamat');
            $phpexcel->getActiveSheet()->setCellValue('W1', 'Perubahan Alamata Usaha');
            $phpexcel->getActiveSheet()->setCellValue('X1', 'Perubahan Email');
            $phpexcel->getActiveSheet()->setCellValue('Y1', 'Contact 1');
            $phpexcel->getActiveSheet()->setCellValue('Z1', 'Contact 2');
            $phpexcel->getActiveSheet()->setCellValue('AA1', 'Contact 3');
            $phpexcel->getActiveSheet()->setCellValue('AB1', 'Contact 4');
            $phpexcel->getActiveSheet()->setCellValue('AC1', 'Contact 5');
            $phpexcel->getActiveSheet()->setCellValue('AD1', 'Contact 6');
            $phpexcel->getActiveSheet()->setCellValue('AF1', 'Contact 7');
            
			//`f_id`, `f_code_image`, `f_lat`, `f_lng`, `f_agentid`, `f_actionplan_status`, `f_tujuan`,
//			`f_nama_nasabah`, `f_cif`, 
			//`f_loanid`, `f_hasilkunjungan`, `f_keterangan_hasilkunjungan`, `f_tanggal_ptp`, `f_bertemu`, 
			//`f_keterangan_bertemu`, `f_lokasibertemu`, `f_keterangan_lokasi`, `f_karakter`, `f_keterangan_karakter`, 
			//`f_negatif_issue`, `f_actionplan`, `f_nominal_pelunasan`, `f_date_actionplan`, `f_resumenasabah`, 
			//`f_total_tunggakan`, `f_total_bayar`, `f_perkiraan`, `f_name_doc`, `f_size_doc`, `f_file_doc`, `f_type_doc`, `f_name_foto`, `f_size_foto`, `f_file_foto`, `f_type_foto`, `f_tgl_visit`
            $baris = 2;
            foreach ($data as $file) {
                $phpexcel->getActiveSheet()->setCellValue('A' . $baris, $file->f_agentid);
                $phpexcel->getActiveSheet()->setCellValue('B' . $baris, $file->f_agentname); //nama collector
                $phpexcel->getActiveSheet()->setCellValue('C' . $baris, $file->f_tujuan);
                $phpexcel->getActiveSheet()->setCellValue('D' . $baris, $file->f_cif);
                $phpexcel->getActiveSheet()->setCellValue('E' . $baris, $file->f_nama_nasabah);
                $phpexcel->getActiveSheet()->setCellValue('F' . $baris, $file->f_tgl_visit);//alamat
                $phpexcel->getActiveSheet()->setCellValue('G' . $baris, $file->f_hasilkunjungan);
                $phpexcel->getActiveSheet()->setCellValue('H' . $baris, $file->f_keterangan_hasilkunjungan);
                $phpexcel->getActiveSheet()->setCellValue('I' . $baris, $file->f_bertemu);
                $phpexcel->getActiveSheet()->setCellValue('J' . $baris, $file->f_keterangan_bertemu);
                $phpexcel->getActiveSheet()->setCellValue('K' . $baris, $file->f_lokasibertemu);
                $phpexcel->getActiveSheet()->setCellValue('L' . $baris, $file->f_keterangan_lokasi);
                $phpexcel->getActiveSheet()->setCellValue('M' . $baris, $file->f_karakter);
                $phpexcel->getActiveSheet()->setCellValue('N' . $baris, $file->f_keterangan_karakter);
                $phpexcel->getActiveSheet()->setCellValue('O' . $baris, $file->f_negatif_issue);
                $phpexcel->getActiveSheet()->setCellValue('P' . $baris, $file->f_actionplan);
                $phpexcel->getActiveSheet()->setCellValue('Q' . $baris, $file->f_date_actionplan);
                $phpexcel->getActiveSheet()->setCellValue('R' . $baris, $file->f_resumenasabah);
                $phpexcel->getActiveSheet()->setCellValue('S' . $baris, $file->f_total_tunggakan);
                $phpexcel->getActiveSheet()->setCellValue('T' . $baris, $file->f_total_bayar);
                $phpexcel->getActiveSheet()->setCellValue('U' . $baris, $file->f_perkiraan);
                $phpexcel->getActiveSheet()->setCellValue('V' . $baris, $file->f_perkiraan); //perubahan alamat
                $phpexcel->getActiveSheet()->setCellValue('W' . $baris, $file->f_perkiraan); //perubahan alamat usaha
                $phpexcel->getActiveSheet()->setCellValue('X' . $baris, $file->f_perkiraan); //perubahan email
                $phpexcel->getActiveSheet()->setCellValue('Y' . $baris, $file->f_perkiraan); //cntact 1
                $phpexcel->getActiveSheet()->setCellValue('Z' . $baris, $file->f_perkiraan); //contact 2
                $phpexcel->getActiveSheet()->setCellValue('AA' . $baris, $file->f_perkiraan); //3
                $phpexcel->getActiveSheet()->setCellValue('AB' . $baris, $file->f_perkiraan); //4
                $phpexcel->getActiveSheet()->setCellValue('AC' . $baris, $file->f_perkiraan); //5
                $phpexcel->getActiveSheet()->setCellValue('AD' . $baris, $file->f_perkiraan); //6
                $phpexcel->getActiveSheet()->setCellValue('AF' . $baris, $file->f_perkiraan); //7
                
                $baris++;
            }
            $filename = "Data Hasil Visit-" . date("d-m-Y H:i:s") . '.xlsx';
            $phpexcel->getActiveSheet()->setTitle("Data Hasil Visit");
            header('Content-Type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition:attachment;filename="' . $filename . '"');
            header('Cache-control:max-age=0');

            $writer = PHPExcel_IOFactory::createWriter($phpexcel, 'Excel2007');
            //print_r($file);
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
	
	
	
	
	
	public function excel_recovery(){
		 if ($this->session->has_userdata('username')) {
            $data = $this->Model_recovery->get_recovery();
            $phpexcel = new PHPExcel();
            $phpexcel->getProperties()->setCreator("BSS");
            $phpexcel->getProperties()->setLastModifiedBy("BSS");
            $phpexcel->getProperties()->setTitle("Data Recovery");
            $phpexcel->getProperties()->setSubject("");
            $phpexcel->getProperties()->setDescription("");
            $phpexcel->setActiveSheetIndex(0);
			$phpexcel->getActiveSheet()->setCellValue	('A1','Nomor Nasabah'); 	
            $phpexcel->getActiveSheet()->setCellValue	('B1','Nomor Rekening');	
            $phpexcel->getActiveSheet()->setCellValue	('C1','Nama Debitur');  	
            $phpexcel->getActiveSheet()->setCellValue	('D1','ID');            	
            $phpexcel->getActiveSheet()->setCellValue	('E1','DPD');           	
            $phpexcel->getActiveSheet()->setCellValue	('F1','Facility Type'); 	
            $phpexcel->getActiveSheet()->setCellValue	('G1','Plafond Amount');	
            $phpexcel->getActiveSheet()->setCellValue	('H1','Nama Produk');   	
            $phpexcel->getActiveSheet()->setCellValue	('I1','STARTDATE PLAFOND');	
            $phpexcel->getActiveSheet()->setCellValue	('J1','DATE EXPIRED');		
            $phpexcel->getActiveSheet()->setCellValue	('K1','Cycle');				
            $phpexcel->getActiveSheet()->setCellValue	('L1','Tenor');				
            $phpexcel->getActiveSheet()->setCellValue	('M1','Code Cabang');      	
            $phpexcel->getActiveSheet()->setCellValue	('N1','Cabang');  			
            $phpexcel->getActiveSheet()->setCellValue	('O1','DPD EOM'); 			
            $phpexcel->getActiveSheet()->setCellValue	('P1','Bucket');  			
            $phpexcel->getActiveSheet()->setCellValue	('Q1','Flag');    			
            $phpexcel->getActiveSheet()->setCellValue	('R1','Angsuran');			
            $phpexcel->getActiveSheet()->setCellValue	('S1','Baki Debit');		
            $phpexcel->getActiveSheet()->setCellValue	('T1','Tunggakan Pokok');	
            $phpexcel->getActiveSheet()->setCellValue	('U1','Bunga');				
            $phpexcel->getActiveSheet()->setCellValue	('V1','Denda');				
            $phpexcel->getActiveSheet()->setCellValue	('W1','Total Tagihan'); 	
            $phpexcel->getActiveSheet()->setCellValue	('X1','Saldo Tabungan');	
            $phpexcel->getActiveSheet()->setCellValue	('Y1','Tanggal Restruktur');
            $phpexcel->getActiveSheet()->setCellValue	('Z1','Struktur Ke');       
            $phpexcel->getActiveSheet()->setCellValue	('AA1','Alamat Tagih'); 		
            $phpexcel->getActiveSheet()->setCellValue	('AB1','Post Code');    		
            $phpexcel->getActiveSheet()->setCellValue	('AC1','No Telpon');			
            $phpexcel->getActiveSheet()->setCellValue	('AD1','Email');				
            $phpexcel->getActiveSheet()->setCellValue	('AE1','Tanggal');			
            $phpexcel->getActiveSheet()->setCellValue   ('AF1','Total Pembaayaran');	
            
		
			$baris = 2;
            foreach ($data as $file) {
				$phpexcel->getActiveSheet()->setCellValue('A'.$baris, $file->NomorNasabah); 		
                $phpexcel->getActiveSheet()->setCellValue('B'.$baris, $file->NomorRekening); 	
                $phpexcel->getActiveSheet()->setCellValue('C'.$baris, $file->NamaDebitur);     	
                $phpexcel->getActiveSheet()->setCellValue('D'.$baris, $file->ID); 				
                $phpexcel->getActiveSheet()->setCellValue('E'.$baris, $file->DPD);				
                $phpexcel->getActiveSheet()->setCellValue('F'.$baris, $file->FacilityType); 		
                $phpexcel->getActiveSheet()->setCellValue('G'.$baris, $file->PlafondAmount); 	
                $phpexcel->getActiveSheet()->setCellValue('H'.$baris, $file->ket_facility); 		
                $phpexcel->getActiveSheet()->setCellValue('I'.$baris, $file->STARTDATEPLAFOND); 	
                $phpexcel->getActiveSheet()->setCellValue('J'.$baris, $file->DATEEXPIRED); 		
                $phpexcel->getActiveSheet()->setCellValue('K'.$baris, $file->cycle); 	 		
                $phpexcel->getActiveSheet()->setCellValue('L'.$baris, $file->tenor); 	 		
                $phpexcel->getActiveSheet()->setCellValue('M'.$baris, $file->KodeCabang); 		
                $phpexcel->getActiveSheet()->setCellValue('N'.$baris, $file->Cabang);  			
                $phpexcel->getActiveSheet()->setCellValue('O'.$baris, $file->DPD_EOM); 			
                $phpexcel->getActiveSheet()->setCellValue('P'.$baris, $file->bucked);
                $phpexcel->getActiveSheet()->setCellValue('R'.$baris, $file->angsuran);  		
                $phpexcel->getActiveSheet()->setCellValue('S'.$baris, $file->BakiDebet); 		
                $phpexcel->getActiveSheet()->setCellValue('T'.$baris, $file->tunggakan_pokok); 
                $phpexcel->getActiveSheet()->setCellValue('U'.$baris, $file->bunga); 			
                $phpexcel->getActiveSheet()->setCellValue('V'.$baris, $file->denda); 			
                $phpexcel->getActiveSheet()->setCellValue('W'.$baris, $file->total_tagihan);   
                $phpexcel->getActiveSheet()->setCellValue('X'.$baris, $file->saldo_tabungan);  
                $phpexcel->getActiveSheet()->setCellValue('Y'.$baris, $file->tgl_restru);      
                $phpexcel->getActiveSheet()->setCellValue('Z'.$baris, $file->restru_ke); 	  
                $phpexcel->getActiveSheet()->setCellValue('AA'. $baris,$file->alamat); 		  
                $phpexcel->getActiveSheet()->setCellValue('AB'. $baris,$file->postcode); 		  
                $phpexcel->getActiveSheet()->setCellValue('AC'. $baris,$file->notlp); 		  
                $phpexcel->getActiveSheet()->setCellValue('AD'. $baris,$file->email); 		  
                $phpexcel->getActiveSheet()->setCellValue('AE'. $baris,$file->tanggal);   	  
                $phpexcel->getActiveSheet()->setCellValue('AF'. $baris,$file->repayment); 	  
                
                $baris++;
            }
            $filename = "Data Recovery-" . date("d-m-Y H:i:s") . '.xlsx';
            $phpexcel->getActiveSheet()->setTitle("Data Recovery");
            header('Content-Type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition:attachment;filename="' . $filename . '"');
            header('Cache-control:max-age=0');

            $writer = PHPExcel_IOFactory::createWriter($phpexcel, 'Excel2007');
            //print_r($file);
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
	
	
	
	public function datainhouse_excel(){
        $data= $this->Model_download->get_cad();
        $data1= $this->Model_download->get_inhouse();
         
         $objphpexcel=new PHPExcel();
         
        $objphpexcel->getSheet(0)->setTitle('Data In House');
        $objphpexcel->getSheet(0)->setCellValue('A1','Tanggal terakhir di hubungi');
        $objphpexcel->getSheet(0)->setCellValue('B1','Jumlah Di Hubungi');
        $objphpexcel->getSheet(0)->setCellValue('C1','Nama Debitur');
        $objphpexcel->getSheet(0)->setCellValue('D1','Cabang');
        $objphpexcel->getSheet(0)->setCellValue('E1','Cif');
        $objphpexcel->getSheet(0)->setCellValue('F1','DPD');
        
        
       $baris=2;
        
        foreach ($data as $file){
            $objphpexcel->getSheet(0)->setCellValue('A'.$baris,$file->tglcall);
            $objphpexcel->getSheet(0)->setCellValue('B'.$baris,$file->jumlahcall);
            $objphpexcel->getSheet(0)->setCellValue('C'.$baris,$file->NamaDebitur);
            $objphpexcel->getSheet(0)->setCellValue('D'.$baris,$file->cabang);
            $objphpexcel->getSheet(0)->setCellValue('E'.$baris,$file->NomorNasabah);
            $objphpexcel->getSheet(0)->setCellValue('F'.$baris,$file->dpd);
           
            $baris++;
        }
        
        $newworksheet = new PHPExcel_Worksheet($objphpexcel,'Detail In House');
        $objphpexcel->addSheet($newworksheet,1);

        $objphpexcel->getSheet(1)->setCellValue('A1','CIF');
        $objphpexcel->getSheet(1)->setCellValue('B1','Nama Debitur');
        $objphpexcel->getSheet(1)->setCellValue('C1','Tujuan');
        $objphpexcel->getSheet(1)->setCellValue('D1','Hasil');
        $objphpexcel->getSheet(1)->setCellValue('E1','Keterangan Hasil');
        $objphpexcel->getSheet(1)->setCellValue('F1','Berbicara Dengan');
        $objphpexcel->getSheet(1)->setCellValue('G1','Karakter');
        $objphpexcel->getSheet(1)->setCellValue('H1','Keterangan Karakter');
        $objphpexcel->getSheet(1)->setCellValue('I1','Negatif Isue');
        $objphpexcel->getSheet(1)->setCellValue('J1','Action Plan');
        $objphpexcel->getSheet(1)->setCellValue('K1','Resume Nasabah');
        $objphpexcel->getSheet(1)->setCellValue('L1','Tanggal Activity');
        
        $baris2 = 2;
        
        foreach ($data1 as $file){
            $objphpexcel->getSheet(1)->setCellValue('A'.$baris2,$file->f_cif);
            $objphpexcel->getSheet(1)->setCellValue('B'.$baris2,$file->namadebitur);
            $objphpexcel->getSheet(1)->setCellValue('C'.$baris2,$file->f_tujuan);
            $objphpexcel->getSheet(1)->setCellValue('D'.$baris2,$file->f_hasil);
            $objphpexcel->getSheet(1)->setCellValue('E'.$baris2,$file->f_keterangan_hasil);
            $objphpexcel->getSheet(1)->setCellValue('F'.$baris2,$file->f_berbicara_dengan);
            $objphpexcel->getSheet(1)->setCellValue('G'.$baris2,$file->f_karakter);
            $objphpexcel->getSheet(1)->setCellValue('H'.$baris2,$file->f_keterangan_karakter);
            $objphpexcel->getSheet(1)->setCellValue('I'.$baris2,$file->f_negatif_isue);
            $objphpexcel->getSheet(1)->setCellValue('J'.$baris2,$file->f_action_plan);
            $objphpexcel->getSheet(1)->setCellValue('K'.$baris2,$file->f_resume_nasabah);
            $objphpexcel->getSheet(1)->setCellValue('L'.$baris2,$file->f_tanggal_activity);
            
            
           
            $baris2++;
        }
    //Start adding next sheets
    
        $filename="Data In House-".date("d-m-Y").'.xlsx';
//        $objphpexcel->getActiveSheet()->setTitle("Data In House");
        header('Content-Type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition:attachment;filename="'.$filename.'"');
        header('Cache-control:max-age=0');
       
        $writer= PHPExcel_IOFactory::createWriter($objphpexcel,'Excel2007');
        //print_r($file);
        ob_end_clean();
         $writer->save('php://output');
		 
		 if ($writer == TRUE) {
                $this->Model_log->logactivity($this->session->userdata('username'), "Sucess Download : " . $filename);
            } else {
                $this->Model_log->logactivity($this->session->userdata('username'), "Gagal Download : " . $filename);
            }
               exit;
    }
	
	
	public function m_param(){
		$data= $this->Model_download->loadMparam();
         
         $objphpexcel=new PHPExcel();
         
        $objphpexcel->getSheet(0)->setTitle('Data Master Parameter');
        $objphpexcel->getSheet(0)->setCellValue('A1','TYPE');
        $objphpexcel->getSheet(0)->setCellValue('B1','Desc');
        
        
       $baris=2;
        
        foreach ($data as $file){
            $objphpexcel->getSheet(0)->setCellValue('A'.$baris,$file->f_type);
            $objphpexcel->getSheet(0)->setCellValue('B'.$baris,$file->f_desc);
           
            $baris++;
        }
		
		$filename="Data Master Parameter-".date("d-m-Y").'.xlsx';
//        $objphpexcel->getActiveSheet()->setTitle("Data In House");
        header('Content-Type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition:attachment;filename="'.$filename.'"');
        header('Cache-control:max-age=0');
       
        $writer= PHPExcel_IOFactory::createWriter($objphpexcel,'Excel2007');
        //print_r($file);
        ob_end_clean();
         $writer->save('php://output');
		 
		 if ($writer == TRUE) {
                $this->Model_log->logactivity($this->session->userdata('username'), "Sucess Download : " . $filename);
            } else {
                $this->Model_log->logactivity($this->session->userdata('username'), "Gagal Download : " . $filename);
            }
               exit;
	}
	
	public function paramter(){
		$data= $this->Model_download->LoadParamall();
         
         $objphpexcel=new PHPExcel();
         
        $objphpexcel->getSheet(0)->setTitle('Data Parameter All');
        $objphpexcel->getSheet(0)->setCellValue('A1','Web/Mobile');
        $objphpexcel->getSheet(0)->setCellValue('B1','Type');
        $objphpexcel->getSheet(0)->setCellValue('C1','Code');
        $objphpexcel->getSheet(0)->setCellValue('D1','Desc');
        $objphpexcel->getSheet(0)->setCellValue('E1','Value');
        
        
       $baris=2;
        
        foreach ($data as $file){
			
			if($file->f_untuk == 'W'){
				$untuk = "Web";
			} else {
				$untuk = "Mobile";
			}
            $objphpexcel->getSheet(0)->setCellValue('A'.$baris,$untuk);
            $objphpexcel->getSheet(0)->setCellValue('B'.$baris,$file->f_type);
            $objphpexcel->getSheet(0)->setCellValue('C'.$baris,$file->f_code);
            $objphpexcel->getSheet(0)->setCellValue('D'.$baris,$file->f_desc);
            $objphpexcel->getSheet(0)->setCellValue('E'.$baris,$file->f_value);
           
            $baris++;
        }
		
		$filename="Data Parameter All-".date("d-m-Y").'.xlsx';
//        $objphpexcel->getActiveSheet()->setTitle("Data In House");
        header('Content-Type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition:attachment;filename="'.$filename.'"');
        header('Cache-control:max-age=0');
       
        $writer= PHPExcel_IOFactory::createWriter($objphpexcel,'Excel2007');
        //print_r($file);
        ob_end_clean();
         $writer->save('php://output');
		 if ($writer == TRUE) {
                $this->Model_log->logactivity($this->session->userdata('username'), "Sucess Download : " . $filename);
            } else {
                $this->Model_log->logactivity($this->session->userdata('username'), "Gagal Download : " . $filename);
            }
               exit;
	}
	
	public function logactivity(){
		$data= $this->Model_download->logactivity();
         
         $objphpexcel=new PHPExcel();
         
        $objphpexcel->getSheet(0)->setTitle('Data Log Activity');
        $objphpexcel->getSheet(0)->setCellValue('A1','User Id');
        $objphpexcel->getSheet(0)->setCellValue('B1','Nama');
        $objphpexcel->getSheet(0)->setCellValue('C1','Device');
        $objphpexcel->getSheet(0)->setCellValue('D1','Activity');
        $objphpexcel->getSheet(0)->setCellValue('E1','Date Time');
        
        
       $baris=2;
        
        foreach ($data as $file){
			
            $objphpexcel->getSheet(0)->setCellValue('A'.$baris,$file->f_userid);
            $objphpexcel->getSheet(0)->setCellValue('B'.$baris,$file->nama);
            $objphpexcel->getSheet(0)->setCellValue('C'.$baris,$file->f_activity);
            $objphpexcel->getSheet(0)->setCellValue('D'.$baris,$file->f_prangkat);
            $objphpexcel->getSheet(0)->setCellValue('E'.$baris,$file->f_date_time);
           
            $baris++;
        }
		
		$filename="Data Log Activity-".date("d-m-Y").'.xlsx';
//        $objphpexcel->getActiveSheet()->setTitle("Data In House");
        header('Content-Type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition:attachment;filename="'.$filename.'"');
        header('Cache-control:max-age=0');
       
        $writer= PHPExcel_IOFactory::createWriter($objphpexcel,'Excel2007');
        //print_r($file);
        ob_end_clean();
         $writer->save('php://output');
		 if ($writer == TRUE) {
                $this->Model_log->logactivity($this->session->userdata('username'), "Sucess Download : " . $filename);
            } else {
                $this->Model_log->logactivity($this->session->userdata('username'), "Gagal Download : " . $filename);
            }
               exit;
		
	}
}