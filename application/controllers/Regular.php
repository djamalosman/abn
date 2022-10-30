<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once  APPPATH.('PHPExcel/PHPExcelMRPK/Classes/PHPExcelLelang.php');
require_once  APPPATH.('PHPExcel/PHPExcelMRPK/Classes/PHPExcel/Writer/Excel2007.php');
class Regular extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('PHPExcel', 'PHPExcel/IOFactory'));        
		/* CONNECT 2 DATABASE */
		$this->db = $this->load->database('default', true);
		$this->db2 = $this->load->database('second', true);

		/* if ($_SERVER['SERVER_NAME'] == 'localhost') {
            $dsn1 = 'mysqli://root:@localhost/xplmjdmx_dbmgmtmenu';
            $this->db = $this->load->database($dsn1, true);
            $dsn2 = 'mysqli://root:@localhost/xplmjdmx_dbbsscollection';
            $this->db2 = $this->load->database($dsn2, true);
        } else {
            $dsn1 = 'mysqli://xplmjdmx_C24sys:4N4G4T49876@localhost/xplmjdmx_dbmgmtmenu';
            $this->db = $this->load->database($dsn1, true);
            $dsn2 = 'mysqli://xplmjdmx_C24sys:4N4G4T49876@localhost/xplmjdmx_dbbsscollection';
            $this->db2 = $this->load->database($dsn2, true);
        } */ /* CONNECT 2 DATABASE */
        $this->load->helper(array('url', 'form'));
        $this->load->library('session');
        $this->load->model('Menu_model', '', TRUE);
        $this->load->model('Content_model', '', TRUE);
        $this->load->model('Modelreguler', '', TRUE);
        $this->load->model('Modelinhouse', '', TRUE);
        $this->load->helper('captcha');
    }

    public function index() {
        if ($this->session->has_userdata('username')) {
            $idmenu = 'H12';
            $idmenu2 = 'D101';
            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
            if ($result1 == '1') {
                $result['data'] = $this->Menu_model->loadMenu();
                $this->session->set_userdata('cif', '');
                $this->session->set_userdata('idkj', '');
                $result['pagename'] = 'Data Reguler';
                $result['debitur'] = $this->Modelreguler->get_reguler();
                $result['content'] = 'view_reguler';
                $this->load->view('bss_home', $result);
            }
        }
    }

    public function viewdetail() {
        if ($this->session->has_userdata('username')) {
            $cif1 = $this->input->post('cif');
            $idkj1 = $this->input->post('idkj');
            if ($this->session->userdata('cif') == '') {
                $this->session->set_userdata('cif', $cif1);
                $this->session->set_userdata('idkj', $idkj1);
                $cif = $this->session->userdata('cif');
                $idkj = $this->session->userdata('idkj');
            } else {
                $cif = $this->session->userdata('cif');
                $idkj = $this->session->userdata('idkj');
            }

            $result['data'] = $this->Menu_model->loadMenu();
            $result['debitur'] = $this->Modelinhouse->get_cad2($cif);
            $result['tagihan'] = $this->Modelinhouse->get_tunggakan($cif);
            $result['fasilitas'] = $this->Modelinhouse->get_fasilitas($cif);
            $result['jaminan'] = $this->Modelinhouse->get_jaminan($cif);
            $result['totaltunggakan'] = $this->Modelinhouse->get_total_tunggakan($cif);
            $result['hasil_inhouse'] = $this->Modelinhouse->get_hasil_inhouse($cif);
            $result['hasil_visit'] = $this->Modelreguler->get_hasil_visit($cif, $idkj);
            $result['hasil_pp'] = $this->Modelreguler->get_hasil_pp($cif, $idkj);
            $result['imagepp'] = $this->Modelreguler->get_pp($cif, $idkj);

            $result['imagevisit'] = $this->Modelreguler->get_imagevisit($cif, $idkj);
            $result['content'] = 'view_detail_reguler';
            $this->load->view('bss_home', $result);
        } else {
            redirect('/');
        }
    }

    public function insertdata() {
        if ($this->session->has_userdata('username')) {
            $date = date('ymdHis');
            $tanggal = date('Y-m-d');
            $status = $this->input->post('status');
            $idkj = $this->input->post('idkj');
            $cif = $this->input->post('cif');
            $code = $cif . $date;
            $type = "file_doc_pp";
            $sumberdana = $this->input->post('sumberdana');
            $namapmbdana = $this->input->post('namapmbdana');
            $notlp = $this->input->post('notlp');
            $nominal = $this->input->post('nominal');
            $nominalplan = $this->input->post('nominalplan');
            $ketfile = $this->input->post('ketfile');

            $inputdata = $this->Modelreguler->inputdata($cif, $status, $code, $sumberdana, $namapmbdana, $nominal, $notlp, $tanggal, $nominalplan, $idkj);
            if ($inputdata == 1) {
                if (count($_FILES['myfile']['name']) > 0) {
                    for ($i = 0; $i < count($_FILES['myfile']['name']); $i++) {
                        $f_image = $_FILES['myfile']['tmp_name'][$i];
                        $file_size = $_FILES['myfile']['size'][$i];
                        $file_name = $_FILES['myfile']['name'][$i];
                        $file_type = $_FILES['myfile']['type'][$i];
                        $file = file_get_contents($f_image);
                        //$image = mysqli_real_escape_string($conn, $file);
                        $mime_type = mime_content_type($f_image);
                        $data[] = array(
                            'f_code' => $code,
                            'f_cif' => $cif,
                            'f_type' => $type,
                            'f_keterangan' => $ketfile,
                            'f_name_file' => $file_name,
                            'f_type_file' => $mime_type,
                            'f_file_content' => $file,
                            'f_size_file' => $file_size,
                            'f_tanggal' => $tanggal
                        );
                        //$image2 = mysqli_real_escape_string($conn, $file2);
                    }
                    $respons = $this->Modelreguler->sendimage($data);

                    if ($respons == 1) {
                        $this->notif_sucess_image();
                        redirect('regular/viewdetail');
                    } else {
                        $this->notif_gagal_image();
                        redirect('regular/viewdetail');
                    }
                }
            } else {
                $this->notif_gagal();
                redirect('regular/viewdetail');
            }
        } else {
            redirect('/');
        }
    }

    public function inserfile() {
        if ($this->session->has_userdata('username')) {
            $date = date('ymdHis');
            $tanggal = date('Y-m-d');
            $type = "file_doc_pp";
            $code = $this->input->post('codeimage');
            $cif = $this->input->post('cif');
            $ketfile = $this->input->post('ketfile2');
			
            $f_image = $_FILES['myfile']['tmp_name'];
            $file_size = $_FILES['myfile']['size'];
            $file_name = $_FILES['myfile']['name'];
            $file_type = $_FILES['myfile']['type'];
            $file = file_get_contents($f_image);
			
            //$image = mysqli_real_escape_string($conn, $file);
            $mime_type = mime_content_type($f_image);
            $data = array(
                'f_code' => $code,
                'f_cif' => $cif,
                'f_type' => $type,
                'f_keterangan' => $ketfile,
                'f_name_file' => $file_name,
                'f_type_file' => $mime_type,
                'f_file_content' => $file,
                'f_size_file' => $file_size,
                'f_tanggal' => $tanggal
            );
			
            $respons = $this->Modelreguler->sendimage2($data);

            if ($respons == 1) {
                $this->notif_sucess_image();
                redirect('regular/viewdetail');
            } else {
                $this->notif_gagal_image();
                redirect('regular/viewdetail');
            }
        } else {
            redirect('/');
        }
    }

    public function update() {
        if ($this->session->has_userdata('username')) {
            $tanggal = date('Y-m-d');
            $status = $this->input->post('status1');
            $cif = $this->input->post('cif1');
            $idkj = $this->input->post('idkj1');
            $sumberdana = $this->input->post('sumberdana1');
            $namapmbdana = $this->input->post('namapmbdana1');
            $notlp = $this->input->post('notlp1');
            $nominal = $this->input->post('nominal1');

            $inputdata = $this->Modelreguler->update($cif, $idkj, $status, $sumberdana, $namapmbdana, $nominal, $notlp, $tanggal);
            if ($inputdata == 1) {
                $this->notif_sucess_update();
                redirect('regular/viewdetail');
            } else {
                $this->notif_gagal_update();
                redirect('regular/viewdetail');
            }
        } else {
            redirect('/');
        }
    }

    public function deleteimage() {
        if ($this->session->has_userdata('username')) {
            $selection = $this->input->post('idnya');
//            echo var_dump($selection);
            if ($selection != '') {
                $delet = $this->Modelreguler->deleteimage($selection);
                if ($delet == 1) {
                    $this->notif_sucess_delete_file();
                    redirect('regular/viewdetail');
                } else {
                    $this->notif_gagal_delete_file();
                    redirect('regular/viewdetail');
                }
            } else {
                $this->notif_null_data_delete_file();
                redirect('regular/viewdetail');
            }
        } else {
            redirect('/');
        }
    }

	
	    public function createdataplanpelunasan_excel(){
        $data= $this->Modelreguler->get_reguler();
         
         $objphpexcel=new PHPExcel();
         
        $objphpexcel->getProperties()->setCreator("BSS");
        $objphpexcel->getProperties()->setLastModifiedBy("BSS");
        $objphpexcel->getProperties()->setTitle("Data Plan Pelunasan");
        $objphpexcel->getProperties()->setSubject("");
        $objphpexcel->getProperties()->setDescription("");
        
        $objphpexcel->setActiveSheetIndex(0);
        
        $objphpexcel->getActiveSheet()->setCellValue('A1','Tanggal Visit Terakhir');
        $objphpexcel->getActiveSheet()->setCellValue('B1','Recod Visit');
        $objphpexcel->getActiveSheet()->setCellValue('C1','Nama');
        $objphpexcel->getActiveSheet()->setCellValue('D1','Cabang');
        $objphpexcel->getActiveSheet()->setCellValue('E1','Cif');
        $objphpexcel->getActiveSheet()->setCellValue('F1','DPD');
        $objphpexcel->getActiveSheet()->setCellValue('G1','Action Plan');
        $objphpexcel->getActiveSheet()->setCellValue('H1','Status');
        $objphpexcel->getActiveSheet()->setCellValue('I1','Hasil');
        
        
       $baris=2;
        
        foreach ($data as $file){
            $objphpexcel->getActiveSheet()->setCellValue('A'.$baris,$file->tgl_terakhirkunjungan);
            $objphpexcel->getActiveSheet()->setCellValue('B'.$baris,$file->jmlh_recod);
            $objphpexcel->getActiveSheet()->setCellValue('C'.$baris,$file->f_nama_nasabah);
            
            $objphpexcel->getActiveSheet()->setCellValue('E'.$baris,$file->f_cif);
           
            $objphpexcel->getActiveSheet()->setCellValue('G'.$baris,$file->f_actionplan);
           
            
            
           
            $baris++;
        }
        $filename="Data Plan Pelunasan-".date("d-m-Y").'.xlsx';
        $objphpexcel->getActiveSheet()->setTitle("Data Plan Pelunasan");
        header('Content-Type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition:attachment;filename="'.$filename.'"');
        header('Cache-control:max-age=0');
       
        $writer= PHPExcel_IOFactory::createWriter($objphpexcel,'Excel2007');
        //print_r($file);
        ob_end_clean();
         $writer->save('php://output');
               exit;
    }
	
	
	
	
//    notif////////////////////////////////////////////////////////////////////////////////////////////////////////
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
        title: 'Berhasil!',
        text : 'Berhasil Simpan Update',
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

    function notif_sucess_delete_file() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Berhasil!',
        text : 'Berhasil Delete File',
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

    function notif_sucess_image() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Berhasil!',
        text : 'Berhasil Simpan Data & file',
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
        text: 'Gagal Simpan Data !!!',
        type: 'error'
        })</script>"
        );
    }
    function notif_null_data_delete_file() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Perhatian! ',
        text: 'Tidak Data Yang Di Pilih!!!',
        type: 'warning'
        })</script>"
        );
    }
    function notif_gagal_delete_file() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Gagal! ',
        text: 'Gagal Delete Data !!!',
        type: 'error'
        })</script>"
        );
    }

    function notif_gagal_update() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Gagal! ',
        text: 'Gagal Simpan Data Update !!!',
        type: 'error'
        })</script>"
        );
    }

    function notif_gagal_image() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Gagal! ',
        text: 'Gagal Simpan data dan file!!!',
        type: 'error'
        })</script>"
        );
    }

}
