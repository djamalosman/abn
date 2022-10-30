<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once  APPPATH.('PHPExcel/PHPExcelMRPK/Classes/PHPExcelLelang.php');
require_once  APPPATH.('PHPExcel/PHPExcelMRPK/Classes/PHPExcel/Writer/Excel2007.php');


class Sp extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('PHPExcel', 'PHPExcel/IOFactory'));
        $this->load->library('Pdfgenerator');

        $this->load->helper('file');
		$this->db = $this->load->database('default', true);
		$this->db2 = $this->load->database('second', true);

        
        $this->load->helper(array('form', 'url'));
        $this->load->library('session');
        $this->load->model('Menu_model', '', TRUE);
        $this->load->model('Content_model', '', TRUE);
        $this->load->model('Generatesp', '', TRUE);
        $this->load->helper(array('form', 'url'));
    }

    // public function getSPaccount(){
    //     $sp=$this->Content_model->get_accountSP();
    //     return($sp);
    // }
//    public function index() {
//        $penunggak = $this->Generatesp->generatsp();
//        print_r($penunggak) ;
//    }

    public function view_sp_monitoring() {
        if ($this->session->has_userdata('username')) {
            $idmenu = 'H06';
            $idmenu2 = 'D047';
            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
            if ($result1 == '1') {
                $result['data'] = $this->Menu_model->loadMenu();
//                $result['jsp'] = $this->Content_model->getparamsp();
//                $result['produk'] = $this->Content_model->getpproduk();
                $result['sp'] = $this->Generatesp->getgeneratesp();
                $result['jabatan'] = $this->Generatesp->getjabatan();
                $result['namaasignsp'] = $this->Generatesp->getnama();
//                $result['selectsp'] = $this->Generatesp->selectsp();
                $result['pagename'] = 'SP Monitoring';
                $result['content'] = 'read_sp_monitoring';

                $this->load->view('bss_home', $result);
//            $this->load->view('bss_home', $result); //$this->load->view('bss_home', $result); //$this->load->view('home', $result);                 
            }
        } else {
            redirect('/');
        }
    }
    public function update_cetak($cif) {
        if ($this->session->has_userdata('username') > 0) {
            $cetak = $this->Generatesp->cetak($cif);
            if ($cetak == 1) {
                $this->notif_sucess();
            } else {
                $this->notif_gagal();
            }
            redirect('sp/view_sp_monitoring');
        }
    }

    public function update_kirim() {
        if ($this->session->has_userdata('username') > 0) {
            $id = $this->input->post('id');
            $ket = $this->input->post('ket');
            $cetak = $this->Generatesp->kirim($id, $ket);
            if ($cetak == 1) {
                $this->notif_sucess_kirim();
            } else {
                $this->notif_gagal_kirim();
            }
            redirect('sp/view_sp_monitoring');
        }
    }

    public function update_trima() {
        if ($this->session->has_userdata('username') > 0) {
            $id = $this->input->post('id');
            $ket = $this->input->post('ket');
            $cetak = $this->Generatesp->trima($id, $ket);
            if ($cetak == 1) {
                $this->notif_sucess_trima();
            } else {
                $this->notif_gagal_trima();
            }
            redirect('sp/view_sp_monitoring');
        }
    }

//    sp administrator//////////////////////////////////////////////////////////////////////////////////////////////

    public function read_sp_administration() {
        if ($this->session->has_userdata('username')) {
            $idmenu = 'H06';
            $idmenu2 = 'D014';
            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
            if ($result1 == '1') {
                $result['data'] = $this->Menu_model->loadMenu();
                $result['jsp'] = $this->Content_model->getparamsp();
                $result['produk'] = $this->Content_model->getpproduk();
                $result['sp'] = $this->Content_model->getsp();
                $result['pagename'] = 'SP Administrasi';
                $result['content'] = 'read_sp_administration';

                $this->load->view('bss_home', $result);
//            $this->load->view('bss_home', $result); //$this->load->view('bss_home', $result); //$this->load->view('home', $result);                 
            }
        } else {
            redirect('/');
        }
    }

    public function sp_ad_proses() {
        if ($this->session->has_userdata('username')) {
            $jsp = $this->input->post('jenissp');
            $prd = $this->input->post('produk');
            $mindpd = $this->input->post('mindpd');
            $masa = $this->input->post('masa');
            $input = $this->Generatesp->inputsp($jsp, $prd, $mindpd, $masa);
            if ($input === 1) {
                $this->notif_success_add_sp();
                redirect('sp/read_sp_administration');
            } elseif ($input == 0) {
                $this->notif_gagal_add_sp();
                redirect('sp/read_sp_administration');
            } elseif ($input == 2) {
                $this->notif_double_add_sp();
                redirect('sp/read_sp_administration');
            }
        } else {
            redirect('/');
        }
    }

    public function sp_ad_proses_update() {
        if ($this->session->has_userdata('username')) {
            $jsp = $this->input->post('jenissp1');
            $prd = $this->input->post('prdk');
            $mindpd = $this->input->post('mindpd');
            $id = $this->input->post('idsp');
            $masa = $this->input->post('masa');
            $update = $this->Generatesp->updatetsp($mindpd, $masa,$id);
            if ($update === 1) {
                $this->notif_sucess_update();
                redirect('sp/read_sp_administration');
            } else {
                $this->notif_gagal_update();
                redirect('sp/read_sp_administration');
            }
//            var_dump($id);
        } else {
            redirect('/');
        }
    }

    public function delete_multi_sp_administration() {
        $selection = $this->input->post('idnya');
        if ($selection == '') {
            $this->notif_null_sp_delete();
        } else {
            $delete = $this->Generatesp->delete_multi_sp_administration($selection);
            if ($delete == 1) {
                $this->notif_delete_sp();
            } else {
                $this->notif_gagal_delete_sp();
            }
        }

        redirect('sp/read_sp_administration');
    }
    
    public function asignsp() {
        if ($this->session->has_userdata('username')) {
            $id = $this->input->post('id');
            $nomor = $this->input->post('nomersp');
            $jabatan1 = $this->input->post('jabatan1');
            $nama1 = $this->input->post('namaasign1');
            $jabatan2 = $this->input->post('jabatan2');
            $nama2 = $this->input->post('namaasign2');
            $upjabatan = $this->input->post('upjabatan');
            $upnama = $this->input->post('upnama');
            $update = $this->Generatesp->asignsp($id, $nomor,$jabatan1,$nama1,$jabatan2,$nama2,$upjabatan,$upnama);
            if ($update == 1) {
                $this->notif_sucess_asignsp();
                redirect('sp/view_sp_monitoring');
            } else {
                $this->notif_gagal_asignsp();
                redirect('sp/view_sp_monitoring');
            }
//            var_dump($id);
        } else {
            redirect('/');
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
            $objphpexcel->getActiveSheet()->setCellValue('A'.$baris,$file->f_sp);
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
               exit;
    }

//    notif////////////////////////////////////////////////////////////////////////////////////////////////////////
    function notif_sucess() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Berhasil, Cetak Surat SP',
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
    function notif_sucess_asignsp() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Berhasil, Simpan',
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
        title: 'Berhasil, Update SP',
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

    function notif_sucess_kirim() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Berhasil, Kirim Surat SP',
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

    function notif_sucess_trima() {
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

    function notif_success_add_sp() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Berhasil Menambahkan SP',
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

    function notif_delete_sp() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Berhasil Delete SP',
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
        title: 'Gagal! Cetak Surat SP',
        type: 'error'
        })</script>"
        );
    }
    function notif_gagal_asignsp() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Gagal!',
        type: 'error'
        })</script>"
        );
    }
    function notif_gagal_update() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Gagal! Update SP',
        type: 'error'
        })</script>"
        );
    }

    function notif_gagal_add_sp() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Gagal! Menambahkan SP',
        type: 'error'
        })</script>"
        );
    }

    function notif_gagal_delete_sp() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Gagal Delete SP',
        type: 'error'
        })</script>"
        );
    }

    function notif_gagal_kirim() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Gagal! Kirim Surat SP',
        type: 'error'
        })</script>"
        );
    }

    function notif_gagal_trima() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Gagal!!!',
        type: 'error'
        })</script>"
        );
    }

    function notif_double_add_sp() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Perhatian, Data Yang Anda Input Sudah Ada !!!',
        type: 'warning'
        })</script>"
        );
    }

    function notif_null_sp() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Perhatian, Data Yang Anda Input Sudah Ada !!!',
        type: 'warning'
        })</script>"
        );
    }
    function notif_null_sp_delete() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Perhatian, Tidak Ada Data Yang di Pilih!!!',
        type: 'warning'
        })</script>"
        );
    }

}

//tessssss
