<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once  APPPATH.('PHPExcel/PHPExcelMRPK/Classes/PHPExcelLelang.php');
require_once  APPPATH.('PHPExcel/PHPExcelMRPK/Classes/PHPExcel/Writer/Excel2007.php');
class Spesial_stage extends CI_Controller {

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
        $this->load->model('Maps_model', '', TRUE);
        $this->load->model('Model_log', '', TRUE);
        $this->load->model('Modelspesial_stage', '', TRUE);
        $this->load->helper(array('form', 'url'));
    }

    public function index() {
        if ($this->session->has_userdata('username')) {
            $idmenu = 'H04';
            $idmenu2 = 'D033';
            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
            if ($result1 == '1') {
                $result['data'] = $this->Menu_model->loadMenu();
                $this->Model_log->insertlogmenu($this->session->userdata('username'), "Main Menu : " . $idmenu . " Sub Menu : " . $idmenu2);
                $result['pagename'] = ' Special Stage';
                $result['stagespecial'] = $this->Modelspesial_stage->get_special_stage();
                $result['viewstagespecial'] = $this->Modelspesial_stage->special_stage_view();
                $result['content'] = 'read_specialstage';
                $this->load->view('bss_home', $result);
            }
        }
    }

    public function delete_specialstage() {
        $selection = $this->input->post('idnya');
        if ($selection != '' or $selection != null) {
            $this->delete_notif();
            $this->Modelspesial_stage->delete_idspecialstage($selection);
            $this->Model_log->logactivity($this->session->userdata('username'), "Sucess Delete : " . json_encode($selection));
        } else {
            $this->Model_log->logactivity($this->session->userdata('username'), "Gagal Delete : " . json_encode($selection));
            $this->faileddelete_notif();
        }
        redirect('spesial_stage/index');
    }
    
    public function read_actionsp_page() {
        $a = $this->input->get('myCountry');
        $cifnama = $a;
        $cif = explode("-", $cifnama);
        $hasil = $cif['0'];
        $hasil1 = $cif['1'];
        $hasil2 = $cif['2'];
     

    //    var_dump($hasil);
    //    var_dump($hasil1);
    //    var_dump($hasil2);
        if ($hasil == null) {
            $this->gagal_search();
            redirect('Spesial_stage/index');
        } else {
            $cekdata=$this->Modelspesial_stage->cekcifspecialstage($hasil2);
        if ($cekdata == '1') {
            $b [] = $this->ambilcontorlerspecialstage($hasil2);
           
        } else {
            $this->gagal_search();
            redirect('Spesial_stage/index');
        }
        }
    }
    
   

    public function view_specialstage_update($a) {
        if ($this->session->has_userdata('username')) {
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = '';
            $result['inputsepcialstage'] = $this->Modelspesial_stage->view_edit_specialstage($a);
            $result['paramstage'] = $this->Modelspesial_stage->getparamspecialstage();
            // $result['stage'] = $this->Content_model->paramspecialstageget();
            $result['content'] = 'viewupdate_specialstage';
            $this->load->view('bss_home', $result);              
        } else {
            redirect('/');
        }
    }


    public function specialstage_update ($LDTemenos){
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|jpeg|pdf';


        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
            $error = array('error' => $this->upload->display_errors());
            $this->gagal_input_special();
            redirect('Spesial_stage/index');
        } else {
            $upload_data = array('upload_data' => $this->upload->data());
            //$data= $upload_data['upload_data'];
            $a = $this->input->post('cif');
            $bb = $this->input->post('loanid');
            $b = $this->input->post('f_flagspecialstage');

            $pisah = $b;
            $desc = explode("-", $pisah);
            $hasil1 = $desc['0'];
            $hasil2 = $desc['1'];


            foreach ($upload_data as $value) {
                # code...
                $_result[] = array(
                    'f_filemanager' => $value['file_name'],
                    'f_cif' => $a,
                    'f_loanid' => $bb,
                    'f_flagspecialstage' => $hasil2,
                    'f_code' => $hasil1
                );
            }
            $a = $this->Modelspesial_stage->specialstage_update($_result,$hasil2,$bb);
            $this->sucess_input_specialstage();
            redirect('Spesial_stage/index');
        }
    }


    public function update_insert_specialstage() {

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|jpeg|pdf';


        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
            $error = array('error' => $this->upload->display_errors());
            $this->gagal_input_special();
            redirect('Spesial_stage/index');
        } else {
            $upload_data = array('upload_data' => $this->upload->data());
            //$data= $upload_data['upload_data'];
            $cif = $this->input->post('cif');
            $LD_Temenos = $this->input->post('LD_Temenos');
            $b = $this->input->post('f_flagspecialstage');
            $NomorRekening = $this->input->post('NomorRekening');
            $NamaDebitur = $this->input->post('NamaDebitur');
            $LD_Temenos = $this->input->post('LD_Temenos');
            $nama_cabang = $this->input->post('nama_cabang');
            $KodeCabang = $this->input->post('KodeCabang');
             
            $pisah = $b;
            $desc = explode("-", $pisah);
            $hasil1 = $desc['0'];
            $hasil2 = $desc['1'];


            foreach ($upload_data as $value) {
                # code...
                $_result[] = array(
                    'f_filemanager' => $value['file_name'],
                    'f_cif'=> $cif,
                    'f_acctno'=> $NomorRekening,
                    'f_custname'=> $NamaDebitur,
                    'f_loanid'=> $LD_Temenos,
                    'f_branch_id'=> $KodeCabang,
                    'nama_branch'=> $nama_cabang,
                    
                    
                    'f_flagspecialstage' => $hasil2,
                    'f_code'=> $hasil1
                );
            }
            $a = $this->Modelspesial_stage->updateInsertspecialstage($_result,$hasil2,$bb);
            $this->sucess_input_specialstage();
            redirect('Spesial_stage/index');
        }
    }

    public function update_specialstage($loanid) {

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|jpeg|pdf';


        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
            $error = array('error' => $this->upload->display_errors());
            $this->gagal_input_special();
            redirect('Spesial_stage/index');
        } else {
            $upload_data = array('upload_data' => $this->upload->data());
            //$data= $upload_data['upload_data'];
            $cif = $this->input->post('cif');
            $LD_Temenos = $this->input->post('LD_Temenos');
            $b = $this->input->post('f_flagspecialstage');
            $NomorRekening = $this->input->post('NomorRekening');
            $NamaDebitur = $this->input->post('NamaDebitur');
            $LD_Temenos = $this->input->post('LD_Temenos');
            $nama_cabang = $this->input->post('nama_cabang');
            $KodeCabang = $this->input->post('KodeCabang');

            $pisah = $b;
            $desc = explode("-", $pisah);
            $hasil1 = $desc['0'];
            $hasil2 = $desc['1'];


            foreach ($upload_data as $value) {
                # code...
                $_result[] = array(
                    'f_filemanager' => $value['file_name'],
                    'f_cif'=> $cif,
                    'f_acctno'=> $NomorRekening,
                    'f_custname'=> $NamaDebitur,
                    'f_loanid'=> $LD_Temenos,
                    'f_branch_id'=> $KodeCabang,
                    'nama_branch'=> $nama_cabang,
                    'f_flagspecialstage' => $hasil2,
                    'f_code' => $hasil1,
                    'f_datecreate' => date("Ymd"),

                );
            }
            $a = $this->Modelspesial_stage->specialstage_update($_result,$LD_Temenos);
            $this->sucess_input_specialstage();
            redirect('Spesial_stage/index');
        }
    }
    public function read_specialstage() {
        if ($this->session->has_userdata('username')) {
            $idmenu = 'H04';
            $idmenu2 = 'D033';
            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
            if ($result1 == '1') {
                $result['data'] = $this->Menu_model->loadMenu();
                $result['pagename'] = ' Special Stage';
                $result['stagespecial'] = $this->Content_model->get_special_stage();
                $result['viewstagespecial'] = $this->Content_model->special_stage_view();
                $result['content'] = 'read_specialstage';
                $this->load->view('bss_home', $result);
            }
        }
    }
    public function sucess_input_specialstage() {
        $this->session->set_flashdata("message", "<script>swal({
            position: 'top',
            title: 'Berhasil!, Create Data Special Stage',
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
    public function gagal_input_special() {
        $this->session->set_flashdata(
                "message", "<script>swal(
              'Gagal!',
              'Format file tidak sesuai,hanya bisa format JPG,PDF,JPEG',
              'gagal'
            )</script>"
        );
    }

    public function duplikat_specialstage() {
        $this->session->set_flashdata(
                "message", "<script>swal(
              'Gagal!',
              'Cif Dupikat',
              'gagal'
            )</script>"
        );
    }


    public function ambilcontorlerspecialstage($a) {
        if ($this->session->has_userdata('username')) {
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'cretae Special Stage';
            $result['inputsepcialstage'] = $this->Modelspesial_stage->getspecialstage($a);
            $result['paramstage'] = $this->Modelspesial_stage->getparamspecialstage();
            // $result['stage'] = $this->Content_model->paramspecialstageget();
            $result['content'] = 'read_actionsp_page';
            $this->load->view('bss_home', $result); //$this->load->view('home', $result);             
        } else {
            redirect('/');
        }
    }

	
	public function createdataspecialstage_excel(){
        $data= $this->Modelspesial_stage->special_stage_view();
         
         $objphpexcel=new PHPExcel();
         
        $objphpexcel->getProperties()->setCreator("BSS");
        $objphpexcel->getProperties()->setLastModifiedBy("BSS");
        $objphpexcel->getProperties()->setTitle("Data Special Stage");
        $objphpexcel->getProperties()->setSubject("");
        $objphpexcel->getProperties()->setDescription("");
        
        $objphpexcel->setActiveSheetIndex(0);
        
        $objphpexcel->getActiveSheet()->setCellValue('A1','CIF');
        $objphpexcel->getActiveSheet()->setCellValue('B1','Account Number');
        $objphpexcel->getActiveSheet()->setCellValue('C1','Nama Customer');
        $objphpexcel->getActiveSheet()->setCellValue('D1','Loan ID');
        $objphpexcel->getActiveSheet()->setCellValue('E1','Status Special Stage');
       
        
        
        
        
       $baris=2;
        
        foreach ($data as $file){
            $objphpexcel->getActiveSheet()->setCellValue('A'.$baris,$file->f_cif);
            $objphpexcel->getActiveSheet()->setCellValue('B'.$baris,$file->f_acctno);
            $objphpexcel->getActiveSheet()->setCellValue('C'.$baris,$file->f_custname);
            $objphpexcel->getActiveSheet()->setCellValue('D'.$baris,$file->f_loanid);
            $objphpexcel->getActiveSheet()->setCellValue('E'.$baris,$file->f_flagspecialstage);
           
            
           
            $baris++;
        }
        $filename="Data Special Stage-".date("d-m-Y").'.xlsx';
        $objphpexcel->getActiveSheet()->setTitle("Data Special Stage");
        header('Content-Type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition:attachment;filename="'.$filename.'"');
        header('Cache-control:max-age=0');
       
        $writer= PHPExcel_IOFactory::createWriter($objphpexcel,'Excel2007');
        //print_r($file);
        ob_end_clean();
         $writer->save('php://output');
               exit;
    }
	
	
	
//    Notif

    public function delete_notif() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Berhasil!',
        text: 'Data Yang Di Checklist Berhasil Di Delete',
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

    public function faileddelete_notif() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Perhatian! . <br> Tidak Ada Data Yang Di Checklist Untuk Di Delete !!!',
        text: 'Silahkan Cek Kembali !!!',
        type: 'warning',
        showConfirmButton: true
        })</script>"
        );
    }
    
     public function gagal_search() {
        $this->session->set_flashdata(
                "message", "<script>swal(
              'Failed!',
              'Data Tidak di temukan',
              'Failed'
            )</script>"
        );
    }

}

//tessssss
