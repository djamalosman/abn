<?php

//require('pdfcreate/fpdf.php');
defined('BASEPATH') OR exit('No direct script access allowed');

require_once  APPPATH.('PHPExcel/PHPExcelMRPK/Classes/PHPExcelLelang.php');
require_once  APPPATH.('PHPExcel/PHPExcelMRPK/Classes/PHPExcel/Writer/Excel2007.php');
Class Inhouse extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
        $this->load->helper(array('form', 'url'));
        $this->db = $this->load->database('default', true);
        $this->db2 = $this->load->database('second', true);
        $this->load->model('Generatesp', '', TRUE);
        $this->load->helper(array('form', 'url'));
        $this->load->library('session');
        $this->load->model('Menu_model', '', TRUE);
        $this->load->model('Content_model', '', TRUE);
        $this->load->model('Modelsdept', '', TRUE);
        $this->load->model('Modelsemployee', '', TRUE);
        $this->load->model('Modelinhouse', '', TRUE);
        $this->load->model('Model_datavisit', '', TRUE);
        $this->load->helper(array('form', 'url'));
    }

//// Page header
    public function index() {
        if ($this->session->has_userdata('username')) {
            $idmenu = 'H10';
            $idmenu2 = 'D049';
            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
            if ($result1 == '1') {
                $result['data'] = $this->Menu_model->loadMenu();
                $result['pagename'] = 'Data In House';
                $result['cad'] = $this->Modelinhouse->get_cad();
                $result['content'] = 'view_inhouse';
                $this->load->view('bss_home', $result); //$this->load->view('home', $result); 
            }
        } else {
            redirect('/');
        }
    }

    public function inputinhouse($cif) {
        if ($this->session->has_userdata('username')) {
            if (empty($cif)) {
               redirect('inhouse/index');
            }
            $result['data'] = $this->Menu_model->loadMenu();
            $result['debitur'] = $this->Modelinhouse->get_cad2($cif);
            $result['tagihan'] = $this->Modelinhouse->get_tunggakan($cif);
            $result['fasilitas'] = $this->Modelinhouse->get_fasilitas($cif);
            $result['jaminan'] = $this->Modelinhouse->get_jaminan($cif);
            $result['totaltunggakan'] = $this->Modelinhouse->get_total_tunggakan($cif);
            $result['hasil_inhouse'] = $this->Modelinhouse->get_hasil_inhouse($cif);
			$result['datavisit'] = $this->Model_datavisit->get_dt_visit2($cif);
            $result['content'] = 'in_house';
            $this->load->view('bss_home', $result); //$this->load->view('home', $result);
        } else {
            redirect('/');
        }
    }

    public function insert() {
        $data = array(
            'f_cif' => $this->input->post('cif'),
            'f_tujuan' => $this->input->post('tujuanCall'),
            'f_hasil' => $this->input->post('hasilkunjungan'),
            'f_keterangan_hasil' => $this->input->post('kethasilkunjungan'),
            'f_berbicara_dengan' => $this->input->post('berbicaradengan'),
            'f_karakter' => $this->input->post('karakter'),
            'f_keterangan_karakter' => $this->input->post('keterangan_karakter'),
            'f_negatif_isue' => $this->input->post('negatif_issue'),
            'f_action_plan' => $this->input->post('actionplan'),
            'f_resume_nasabah' => $this->input->post('resum_nasabah'),
            'f_tanggal_activity' => date('Y-m-d')
        );
        
        $insert = $this->Modelinhouse->insert($data);
        if($insert == 1){
            $this->notif_sucess();
            redirect('inhouse/inputinhouse/'.$this->input->post('cif'));
        } else {
            $this->notif_sucess();
            redirect('inhouse/inputinhouse/'.$this->input->post('cif'));
        }
    }

        public function createdatainhouse_excel(){
        $data= $this-> Modelinhouse->get_cad();
         
         $objphpexcel=new PHPExcel();
         
        $objphpexcel->getProperties()->setCreator("BSS");
        $objphpexcel->getProperties()->setLastModifiedBy("BSS");
        $objphpexcel->getProperties()->setTitle("Data In House");
        $objphpexcel->getProperties()->setSubject("");
        $objphpexcel->getProperties()->setDescription("");
        
        $objphpexcel->setActiveSheetIndex(0);
        
        $objphpexcel->getActiveSheet()->setCellValue('A1','Tanggal terakhir di hubungi');
        $objphpexcel->getActiveSheet()->setCellValue('B1','Jumlah Di Hubungi');
        $objphpexcel->getActiveSheet()->setCellValue('C1','Nama Debitur');
        $objphpexcel->getActiveSheet()->setCellValue('D1','Cabang');
        $objphpexcel->getActiveSheet()->setCellValue('E1','Cif');
        $objphpexcel->getActiveSheet()->setCellValue('F1','DPD');
        
       
        
        
        
        
       $baris=2;
        
        foreach ($data as $file){
            $objphpexcel->getActiveSheet()->setCellValue('A'.$baris,$file->tglcall);
            $objphpexcel->getActiveSheet()->setCellValue('B'.$baris,$file->jumlahcall);
            $objphpexcel->getActiveSheet()->setCellValue('C'.$baris,$file->NamaDebitur);
            $objphpexcel->getActiveSheet()->setCellValue('D'.$baris,$file->cabang);
            $objphpexcel->getActiveSheet()->setCellValue('E'.$baris,$file->NomorNasabah);
            $objphpexcel->getActiveSheet()->setCellValue('F'.$baris,$file->dpd);
            
            
           
            $baris++;
        }
        $filename="Data In House-".date("d-m-Y").'.xlsx';
        $objphpexcel->getActiveSheet()->setTitle("Data In House");
        header('Content-Type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition:attachment;filename="'.$filename.'"');
        header('Cache-control:max-age=0');
       
        $writer= PHPExcel_IOFactory::createWriter($objphpexcel,'Excel2007');
        //print_r($file);
        ob_end_clean();
         $writer->save('php://output');
               exit;
    }
  
//    notif

    function notif_sucess() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Berhasil!',
        text : 'Berhasil Simpan',
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

    function notif_sucess_update() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Berhasil!, Update Data Employee',
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
        title: 'Gagal! ',
        text: 'Gagal Simpan Hasil Call!!!',
        type: 'error'
        })</script>"
        );
    }

    function notif_gagal_update() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Gagal!, Update Data Employee ',
        type: 'error'
        })</script>"
        );
    }

    function notif_double() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Perhatian!, NIK Yang Anda Input Sudah Terdaftar Di Data Employee ',
        type: 'warning'
        })</script>"
        );
    }

    function notif_null() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Perhatian! ',
        text: 'Tidak Ada Data Yang Di Pilih !!!',
        type: 'warning'
        })</script>"
        );
    }

    function notif_nullnik() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Perhatian ! ',
        text: 'Tidak Data Nik !!!',
        type: 'warning'
        })</script>"
        );
    }

    function notif_gagaldata() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Gagal! ',
        text: 'Anda Gagal Menambahkan Depthead !!! Mungkin Ada Kesalahan Data !!!',
        type: 'error'
        })</script>"
        );
    }

}
