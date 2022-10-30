<?php

defined('BASEPATH') OR exit('No direct script access allowed');


require_once  APPPATH.('PHPExcel/PHPExcelMRPK/Classes/PHPExcelLelang.php');
require_once  APPPATH.('PHPExcel/PHPExcelMRPK/Classes/PHPExcel/Writer/Excel2007.php');
class Datavisit extends CI_Controller {



	 public function __construct(){

        parent::__construct();

        

        $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));

		
		$this->db = $this->load->database('default', true);
		$this->db2 = $this->load->database('second', true);

        

        $this->load->helper(array('url', 'form'));

        $this->load->library('session');

        $this->load->model('Menu_model', '', TRUE);

        $this->load->model('Content_model', '', TRUE);

         $this->load->model('Model_datavisit', '', TRUE);

        $this->load->helper('captcha');



    }

	public function index()

	{
		if ($this->session->has_userdata('username')) {

            $idmenu = 'H10';

            $idmenu2 = 'D025';

            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);

            if ($result1 == '1') {

                $result['data'] = $this->Menu_model->loadMenu();

                $result['pagename'] = 'Data Visit';

                $result['assignment'] = $this->Model_datavisit->get_dt_visit();

                $result['content'] = 'read_dt_visit';

                $this->load->view('bss_home', $result);            

            }

        } else {

            redirect('/');

        }

	}

    public function viewDetail($value,$codeimage) {
        if ($this->session->has_userdata('username')) {
            
            $idmenu = 'H10';
            $idmenu2 = 'D025';
            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
            if ($result1 == '1') {
                $result['data'] = $this->Menu_model->loadMenu();
                $result['pagename'] = 'Data Visit';
                $result['debitur'] = $this->Model_datavisit->get_detail_visit($value);
                $result['foto'] = $this->Model_datavisit->get_foto_visit($codeimage);
                $result['content'] = 'view_dt_visit';
                $this->load->view('bss_home', $result);               
            }
        } else {
            redirect('/');
        }
    }
	
	
	public function createdatavisit_excel(){
        $data= $this->Model_datavisit->get_dt_visit();
         
         $objphpexcel=new PHPExcel();
         
        $objphpexcel->getProperties()->setCreator("BSS");
        $objphpexcel->getProperties()->setLastModifiedBy("BSS");
        $objphpexcel->getProperties()->setTitle("Data Visit");
        $objphpexcel->getProperties()->setSubject("");
        $objphpexcel->getProperties()->setDescription("");
        
        $objphpexcel->setActiveSheetIndex(0);
        
        $objphpexcel->getActiveSheet()->setCellValue('A1','Tujuan');
        $objphpexcel->getActiveSheet()->setCellValue('B1','Nama Nasabah');
        $objphpexcel->getActiveSheet()->setCellValue('C1','CIF');
        $objphpexcel->getActiveSheet()->setCellValue('D1','Hasil Kunjungan');
        $objphpexcel->getActiveSheet()->setCellValue('E1','Action Plan');
        $objphpexcel->getActiveSheet()->setCellValue('F1','Date Action Plane');
        $objphpexcel->getActiveSheet()->setCellValue('G1','Keterangan Hasil Kunjungan');
        $objphpexcel->getActiveSheet()->setCellValue('H1','Tanggal Visit');
        $objphpexcel->getActiveSheet()->setCellValue('I1','Nama Kollector');
       
        
        
        
        
       $baris=2;
        
        foreach ($data as $file){
            $objphpexcel->getActiveSheet()->setCellValue('A'.$baris,$file->f_tujuan);
            $objphpexcel->getActiveSheet()->setCellValue('B'.$baris,$file->f_nama_nasabah);
            $objphpexcel->getActiveSheet()->setCellValue('C'.$baris,$file->f_cif);
            $objphpexcel->getActiveSheet()->setCellValue('D'.$baris,$file->f_hasilkunjungan);
            $objphpexcel->getActiveSheet()->setCellValue('E'.$baris,$file->f_actionplan_status);
            $objphpexcel->getActiveSheet()->setCellValue('F'.$baris,$file->f_date_actionplan);
            $objphpexcel->getActiveSheet()->setCellValue('G'.$baris,$file->f_keterangan_hasilkunjungan);
            $objphpexcel->getActiveSheet()->setCellValue('H'.$baris,$file->f_tgl_visit);
            $objphpexcel->getActiveSheet()->setCellValue('I'.$baris,$file->agent);
            
            
           
            $baris++;
        }
        $filename="Data Visit-".date("d-m-Y").'.xlsx';
        $objphpexcel->getActiveSheet()->setTitle("Data Visit");
        header('Content-Type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition:attachment;filename="'.$filename.'"');
        header('Cache-control:max-age=0');
       
        $writer= PHPExcel_IOFactory::createWriter($objphpexcel,'Excel2007');
        //print_r($file);
        ob_end_clean();
         $writer->save('php://output');
               exit;
    }
	
	
}

