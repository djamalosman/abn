<?php

defined('BASEPATH') OR exit('No direct script access allowed');

 

class Restru extends CI_Controller {



     public function __construct(){

        parent::__construct();

        
        $this->db = $this->load->database('default', true);
		$this->db2 = $this->load->database('second', true);

        //$this->load->library(array('PHPExcel','PHPExcel/IOFactory'));

        /*CONNECT 2 DATABASE*/

   //         if ($_SERVER['SERVER_NAME'] == 'localhost') {
   //         $dsn1 = 'mysqli://root:@localhost/dbmgmtmenu';
   //         $this->db = $this->load->database($dsn1, true);
   //
   //         $dsn2 = 'mysqli://root:@localhost/dbbsscollection';
   //         $this->db2 = $this->load->database($dsn2, true);
   //     } else {
   //         $dsn1 = 'mysqli://xplmjdmx_C24sys:4N4G4T49876@localhost/xplmjdmx_dbmgmtmenu';
   //         $this->db = $this->load->database($dsn1, true);
   //
   //         $dsn2 = 'mysqli://xplmjdmx_C24sys:4N4G4T49876@localhost/xplmjdmx_dbbsscollection';
   //         $this->db2 = $this->load->database($dsn2, true);
   //     }

        /*CONNECT 2 DATABASE*/

        

        $this->load->helper(array('url', 'form'));

        $this->load->library('session');
        $this->load->library('encrypt');
        //$this->load->library('Koneksi');

        $this->load->model('Menu_model', '', TRUE);

        $this->load->model('Content_model', '', TRUE);

         $this->load->model('ModelRestru', '', TRUE);

         $this->load->helper('captcha');
        


    }

    public function index()

    {
        if ($this->session->has_userdata('username')) {

            $idmenu = 'H12';

            $idmenu2 = 'D102';
            
            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);

            if ($result1 == '1') {

                $result['data'] = $this->Menu_model->loadMenu();
                
                $this->session->set_userdata('cif',null);
                $this->session->set_userdata('redirectvalue',null);
                
                $result['pagename'] = 'Data Restrukturisasi';

                $result['debitur'] = $this->ModelRestru->get_restru();
                 $result['parameter'] = $this->ModelRestru->parameter();

                $result['content'] = 'view_restru';

                $this->load->view('bss_home', $result);            

            }

        } 

    }
    
    public function testing($value) {
        
        $this->session->set_userdata('cif',$value);
        redirect('restru/input_update');
        
    }
    
    public function updatemodal_restru() {
            $cif_nsb=$this->input->post('nomornasabh');
            $f_id_nsb=$this->input->post('modalf_id');
            
            $data=array(
            'fasilitas_baru'=>$fasilitas_baru=$this->input->post('fasilitas_baru'), 
            'plafound_baru'=>$plafound_baru=$this->input->post('plafound_baru'),           
            'sruktur_fasilitas_baru'=>$sruktur_fasilitas_baru=$this->input->post('sruktur_fasilitas_baru'),
            'lbu_sifat_kredit'=>$lbu_sifat_kredit=$this->input->post('lbu_sifat_kredit'),
            'cara_restruktur'=>$cara_restruktur=$this->input->post('cara_restruktur'),
            'kol_baru'=>$kol_baru=$this->input->post('kol_baru'),         
            'jkwaktu_expireddate	'=>$jkwaktu_expireddate=$this->input->post('jkwaktu_expireddate'),            
            'alasan_restruktur'=>$alasan_restruktur=$this->input->post('alasan_restruktur'),
            'kondisi_usaha'=>$kondisi_usaha=$this->input->post('kondisi_usaha'),           
            'tgleksekusirestruktur'=>$tgleksekusirestruktur=$this->input->post('tgleksekusirestruktur'),
            'gp'=>$gp=$this->input->post('gp'),
            'jk_waktu_gp'=>$jk_waktu_gp=$this->input->post('jk_waktu_gp'),
            'tgl_berakhir_gp'=>$tgl_berakhir_gp=$this->input->post('tgl_berakhir_gp'),
            'keterangan'=>$keterangan=$this->input->post('keterangan'),
            'bunga_gp'=>$bunga_gp=$this->input->post('bunga_gp'),
            'restruktur_ke'=>$restruktur_ke=$this->input->post('restruktur_ke')
            );
            $this->ModelRestru->restru_updatemodal($cif_nsb,$f_id_nsb,$data);
            $this->sucess_notif_update_modalrestru();
            redirect('restru/index');
            
            
        
    }
    public function viewimagesession_param($value) {
        $this->session->set_userdata('paramCif',$value);
        redirect('restru/view_image');
    }
    public function view_image()
    {
        if ($this->session->has_userdata('username')) {

            $idmenu = 'H12';

            $idmenu2 = 'D102';

            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);

            if ($result1 == '1') {
                
                if (empty($this->session->userdata('paramCif'))){
            redirect('restru/index');
                    }
                $value = $this->session->userdata('paramCif');
                
                $cifrestruktur = $value;
                $cifambil = explode("-", $cifrestruktur);
                $cif = $cifambil['0'];
                $get_restru = $cifambil['1'];
                $result['data'] = $this->Menu_model->loadMenu();

                $result['pagename'] = 'Detail file';
                // =$this->encrypt->encode();
                // =$this->encrypt->decode();    
                $result['foto']=$this->ModelRestru->imagedeatil($cif,$get_restru);
//              
                $result['imageview']=$this->ModelRestru->imageview($cif,$get_restru);
                
                $result['content'] = 'detail_filerestru';

                $this->load->view('bss_home', $result);            

            }

        } 
        //$cifrestruktur = $value;
        //$cifambil = explode("-", $cifrestruktur);
        //$cif = $cifambil['0'];
        //$get_restru = $cifambil['1'];
        //print_r($cif);
        //print_r($get_restru);

    }

    public function input_update()
    {
        $result['data'] = $this->Menu_model->loadMenu();
        $result['pagename'] = 'Update Restrukturisasi';
        if (empty($this->session->userdata('cif'))){
            redirect('restru/index');
        }
        $value = $this->session->userdata('cif');
        $this->session->set_userdata('paramCif',null);
        $result['vtables1'] =$this->ModelRestru->vtables1($value);
        $result['vtables2'] =$this->ModelRestru->vtables2($value);
        $result['row'] =$this->ModelRestru->rowActivity($value);
        $result['content']='v_indate';
         $this->load->view('bss_home', $result); 
    }

    public function insert_indate() {
        if ($this->session->has_userdata('username')) {
            $data=array();
            $no_nasabah=$this->input->post('no_nasabah');
            $id_loan=$this->input->post('id_loan'); 
            $sub_product=$this->input->post('sub_product');
            $nama_debitur=$this->input->post('nama_debitur'); 
            $fasilitas_awal=$this->input->post('fasilitas_awal');
            $fasilitas_baru=$this->input->post('fasilitas_baru'); 
            $plafound_awal=$this->input->post('plafound_awal');
            $bunga_awal=$this->input->post('bunga_awal');
            $plafound_baru=$this->input->post('plafound_baru');
            $cabang=$this->input->post('cabang');
            $ao=$this->input->post('ao');
            $jaminan=$this->input->post('jaminan');
            $sruktur_fasilitas_baru=$this->input->post('sruktur_fasilitas_baru');
            $lbu_sifat_kredit=$this->input->post('lbu_sifat_kredit');
            $cara_restruktur=$this->input->post('cara_restruktur');
            $kol_sebelumnya=$this->input->post('kol_sebelumnya');
            $kol_baru=$this->input->post('kol_baru');
            $jmlhr_tunggkn=$this->input->post('jmlhr_tunggkn');
            $jk_waktu_awal=$this->input->post('jk_waktu_awal');
            $jkwaktu_expireddate=$this->input->post('jkwaktu_expireddate');
            $jenis_usaha=$this->input->post('jenis_usaha');
            $alasan_restruktur=$this->input->post('alasan_restruktur');
            $kondisi_usaha=$this->input->post('kondisi_usaha');
            $name_dokumen=$this->input->post('name_dokumen');
            $tgleksekusirestruktur=$this->input->post('tgleksekusirestruktur');
            $gp=$this->input->post('gp');
            $jk_waktu_gp=$this->input->post('jk_waktu_gp');
            $tgl_berakhir_gp=$this->input->post('tgl_berakhir_gp');
            $pic=$this->input->post('pic');
            $keterangan=$this->input->post('keterangan');
            $bunga_gp=$this->input->post('bunga_gp');
            $restruktur_ke=$this->input->post('restruktur_ke');
            //memasukan inputan form dengan method post ke dalam array untuk di masukan ke dalam session di codeigneter
            $redirect=array(
                'fasilitas_baru' => $this->input->post('fasilitas_baru'),
                'plafound_baru' => $this->input->post('plafound_baru'),
                'sruktur_fasilitas_baru' => $this->input->post('sruktur_fasilitas_baru'),
                'lbu_sifat_kredit' => $this->input->post('lbu_sifat_kredit'),
                'cara_restruktur' => $this->input->post('cara_restruktur'),
                'kol_baru'=>$this->input->post('kol_baru'),
                'jkwaktu_expireddate'=>$this->input->post('jkwaktu_expireddate'),
                'alasan_restruktur'=>$this->input->post('alasan_restruktur'),
                'kondisi_usaha'=>$this->input->post('kondisi_usaha'),
                'restruktur_ke'=>$this->input->post('restruktur_ke'),
                'tgleksekusirestruktur'=>$this->input->post('tgleksekusirestruktur'),
                'gp'=>$this->input->post('gp'),
                'jk_waktu_gp'=>$this->input->post('jk_waktu_gp'),
                'tgl_berakhir_gp'=>$this->input->post('tgl_berakhir_gp'),
                'bunga_gp'=>$this->input->post('bunga_gp'),
                'keterangan'=>$this->input->post('keterangan') 
            );
            //script untuk memasukan array dalam session untu inputan form dengan method post
            $this->session->set_userdata('redirectvalue',$redirect);
            
            
            $filesCount = count($_FILES['myfile']['name']);
            for ($i=0; $i < $filesCount; $i++) { 
            $name=$_FILES['file']['name']= $_FILES['myfile']['name'][$i];
            $type=$_FILES['file']['type']= $_FILES['myfile']['type'][$i];
            $tmp_name=$_FILES['file']['tmp_name']=$_FILES['myfile']['tmp_name'][$i];
            $_FILES['file']['error'] = $_FILES['myfile']['error'][$i];
            $size=$_FILES['file']['size']= $_FILES['myfile']['size'][$i];
            
                $uploadPath = './uploads/';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'pdf|jpg|jpeg|pdf|png|';
            
                // Load and initialize upload library
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
               
            if(!$this->upload->do_upload('file')){
                    // Uploaded file data
                     $error = array('error' => $this->upload->display_errors());
                        $this->notif_formatfile_restruk();
                        redirect($_SERVER['HTTP_REFERER']);
            }
            else{
                    $b=$this->input->post('status_restru');
                    $fileData = $this->upload->data();
                    $uploadData[$i]['code'] =$restruktur_ke;
                    $uploadData[$i]['cif'] =$no_nasabah;
                    $uploadData[$i]['name_file']=$name;
                    $uploadData[$i]['type_file']=$type;
                    $uploadData[$i]['file_content'] = $fileData['file_name'];
                    $uploadData[$i]['file_size']=$size;
                    $uploadData[$i]['name_dokumen']=$name_dokumen;
                    $uploadData[$i]['tanggal_insert'] =date('Y-m-d');
             
                     $dataupload['no_nasabah']=$no_nasabah;
                     $dataupload['id_loan']=$id_loan;
                     $dataupload['sub_product']=$sub_product;
                     $dataupload['nama_debitur']=$nama_debitur;
                     $dataupload['fasilitas_awal']=$fasilitas_awal;
                     $dataupload['fasilitas_baru']=$fasilitas_baru;
                     $dataupload['plafound_awal']=$plafound_awal;
                     $dataupload['bunga_awal']=$bunga_awal;
                     $dataupload['plafound_baru']=$plafound_baru;
                     $dataupload['cabang']=$cabang;
                     
                     $dataupload['ao']=$ao;
                     $dataupload['jaminan']=$jaminan;
                     $dataupload['sruktur_fasilitas_baru']=$sruktur_fasilitas_baru;
                     $dataupload['lbu_sifat_kredit']=$lbu_sifat_kredit;
                     $dataupload['cara_restruktur']=$cara_restruktur;
                     $dataupload['kol_sebelumnya']=$kol_sebelumnya;
                     $dataupload['kol_baru']=$kol_baru;
                     $dataupload['jmlhr_tunggkn']=$jmlhr_tunggkn;
                     $dataupload['jk_waktu_awal']=$jk_waktu_awal;
                     $dataupload['jkwaktu_expireddate']=$jkwaktu_expireddate;
                     $dataupload['jenis_usaha']=$jenis_usaha;
                     $dataupload['alasan_restruktur']=$alasan_restruktur;
                     $dataupload['kondisi_usaha']=$kondisi_usaha;
                     $dataupload['gp']=$gp;
                     $dataupload['jk_waktu_gp']=$jk_waktu_gp;
                     $dataupload['tgl_berakhir_gp']=$tgl_berakhir_gp;
                     $dataupload['pic']=$pic;
                     $dataupload['keterangan']=$keterangan;
                     $dataupload['bunga_gp']=$bunga_gp;
                     $dataupload['restruktur_ke']=$restruktur_ke;
         
            }

        }
        // sini
                    if(!empty($uploadData)){
                //var_dump($dataupload);
                //print_r($uploadData);
                // Insert files data into the database
                $insert = $this->ModelRestru->insertrestru($uploadData,$dataupload);
               
                    $this->sucess_notif_create_restru();
                    redirect('restru/index');
//               
                    
              
                
                // Upload status message
               
                }
    }
}
    
    public function updateImagedelete() {
        
        if(isset($_POST['update'])) {
            $data=array();
        $nomor_nasabah= $this->input->post('nomor_nasabah');
        $restruktur_ke= $this->input->post('restruktur_ke');
        $idnya= $this->input->post('idnya[]');
        //var_dump($nomor_nasabah,$restruktur_ke,$idnya);
  
            $filesCount = count($_FILES['myfile']['name']);
            for ($i=0; $i < $filesCount; $i++) { 
            $name=$_FILES['file']['name']= $_FILES['myfile']['name'][$i];
            $type=$_FILES['file']['type']= $_FILES['myfile']['type'][$i];
            $tmp_name=$_FILES['file']['tmp_name']=$_FILES['myfile']['tmp_name'][$i];
            $_FILES['file']['error'] = $_FILES['myfile']['error'][$i];
            $size=$_FILES['file']['size']= $_FILES['myfile']['size'][$i];
            
                $uploadPath = './uploads/';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'jpg|png|jpeg|gif|pdf';
                
                // Load and initialize upload library
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
               
            if(!$this->upload->do_upload('file')){
                    // Uploaded file data
                     $error = array('error' => $this->upload->display_errors());
                        $this->notif_formatfile_restruk();
                        redirect('restru/index');
            } else {
                    $fileData = $this->upload->data();
                    $uploadData[$i]['code'] =$restruktur_ke;
                    $uploadData[$i]['cif'] =$nomor_nasabah;
                    $uploadData[$i]['name_file']=$name;
                    $uploadData[$i]['type_file']=$type;
                    $uploadData[$i]['file_content'] = $fileData['file_name'];
                    $uploadData[$i]['file_size']=$size;
                    //$uploadData[$i]['name_dokumen']=$name_dokumen;
                    $uploadData[$i]['tanggal_insert'] =date('Y-m-d');
            }
            }
            if(!empty($uploadData)){
                $this->ModelRestru->updateimage($uploadData);
                $this->sucess_notif_updateimage();
                redirect('restru/index');
            }
        } elseif(isset($_POST['delete'])) {
        $nomor_nasabah= $this->input->post('nomor_nasabah');
        $restruktur_ke= $this->input->post('restruktur_ke');
        $idnya= $this->input->post('idnya[]');
        $this->ModelRestru->deleteimage($nomor_nasabah,$restruktur_ke,$idnya);
        $this->sucess_notif_deleteimage();
        redirect('Restru/view_image');
        }
        
    }
    public function viewDetail($value)
    {
        if ($this->session->has_userdata('username')) {
          $idmenu = 'H12';
            $idmenu2 = 'D102';
            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
            if ($result1 == '1') {
                $result['data'] = $this->Menu_model->loadMenu();
                $result['pagename'] = 'Data Restrukturisasi';
                $result['debitur'] = $this->ModelRestru->detailrestru($value);
                $result['foto'] = $this->ModelRestru->image_restru($value);
                $result['content'] = 'detail_restru';
                $this->load->view('bss_home', $result);            
            }
        }
    }
    
    
     public function createXLS() {
        $data= $this->ModelRestru->excelrestru();
         require  APPPATH.('PHPExcel/PHPExcelMRPK/Classes/PHPExcel.php');
         require APPPATH. ('PHPExcel/PHPExcelMRPK/Classes/PHPExcel/Writer/Excel2007.php');
         $objphpexcel=new PHPExcel();
         
        $objphpexcel->getProperties()->setCreator("BSS");
        $objphpexcel->getProperties()->setLastModifiedBy("BSS");
        $objphpexcel->getProperties()->setTitle("Data Restrukturisasi");
        $objphpexcel->getProperties()->setSubject("");
        $objphpexcel->getProperties()->setDescription("");
        
        $objphpexcel->setActiveSheetIndex(0);
        
        $objphpexcel->getActiveSheet()->setCellValue('A1','No Nasabah');
        $objphpexcel->getActiveSheet()->setCellValue('B1','ID Temenos');
        $objphpexcel->getActiveSheet()->setCellValue('C1','Sub Product');
        $objphpexcel->getActiveSheet()->setCellValue('E1','Nama Debitur');
        $objphpexcel->getActiveSheet()->setCellValue('F1','Fasilitas Awal');
        $objphpexcel->getActiveSheet()->setCellValue('G1','Fasilitas Baru');
        $objphpexcel->getActiveSheet()->setCellValue('H1','Plafond Sebelumnya (IDR)');
        $objphpexcel->getActiveSheet()->setCellValue('I1','Bunga Awal(%)');
        $objphpexcel->getActiveSheet()->setCellValue('J1','Plafond Baru(IDR)');
        $objphpexcel->getActiveSheet()->setCellValue('K1','Cabang');
        $objphpexcel->getActiveSheet()->setCellValue('L1','AO');
        $objphpexcel->getActiveSheet()->setCellValue('M1','Jaminan');
        $objphpexcel->getActiveSheet()->setCellValue('N1','Struktur Fasilitas Baru');
        $objphpexcel->getActiveSheet()->setCellValue('O1','LBU Sifat Kredit');
        $objphpexcel->getActiveSheet()->setCellValue('P1','Cara Restruktur');
        $objphpexcel->getActiveSheet()->setCellValue('Q1','Restruktur ke');
        $objphpexcel->getActiveSheet()->setCellValue('R1','Kolektibilitas Sebelumnya');
        $objphpexcel->getActiveSheet()->setCellValue('S1','Kolektibilitas Baru');
        $objphpexcel->getActiveSheet()->setCellValue('T1','DPD');
        $objphpexcel->getActiveSheet()->setCellValue('U1','Jangka Waktu Awal');
        $objphpexcel->getActiveSheet()->setCellValue('V1','Jangka Waktu Expired date');
        $objphpexcel->getActiveSheet()->setCellValue('W1','Jenis Usaha');
        
        
        $objphpexcel->getActiveSheet()->setCellValue('X1','Alsan Restruktur');
        $objphpexcel->getActiveSheet()->setCellValue('Y1','Kondisi Usaha');
        $objphpexcel->getActiveSheet()->setCellValue('Z1',' Tgl Eksekusi Restruktur (By system)');
        $objphpexcel->getActiveSheet()->setCellValue('AA1','GP');
        $objphpexcel->getActiveSheet()->setCellValue('AB1','Jangka Waktu GP');
        $objphpexcel->getActiveSheet()->setCellValue('AC1','Tgl Berakhir GP');
        $objphpexcel->getActiveSheet()->setCellValue('AD1','Bunga GP');
       
        
        
        
        
       $baris=2;
        
        foreach ($data as $file){
            $objphpexcel->getActiveSheet()->setCellValue('A'.$baris,$file->no_nasabah);
            $objphpexcel->getActiveSheet()->setCellValue('B'.$baris,$file->id_loan);
            $objphpexcel->getActiveSheet()->setCellValue('C'.$baris,$file->sub_product);
            $objphpexcel->getActiveSheet()->setCellValue('D'.$baris,$file->f_id);
            $objphpexcel->getActiveSheet()->setCellValue('E'.$baris,$file->nama_debitur);
            $objphpexcel->getActiveSheet()->setCellValue('F'.$baris,$file->fasilitas_awal);
            $objphpexcel->getActiveSheet()->setCellValue('G'.$baris,$file->fasilitas_baru);
            $objphpexcel->getActiveSheet()->setCellValue('H'.$baris,$file->plafound_awal);
            $objphpexcel->getActiveSheet()->setCellValue('I'.$baris,$file->bunga_awal);
            $objphpexcel->getActiveSheet()->setCellValue('J'.$baris,$file->plafound_baru);
            $objphpexcel->getActiveSheet()->setCellValue('K'.$baris,$file->cabang);
            $objphpexcel->getActiveSheet()->setCellValue('L'.$baris,$file->ao);
            $objphpexcel->getActiveSheet()->setCellValue('M'.$baris,$file->jaminan);
            $objphpexcel->getActiveSheet()->setCellValue('N'.$baris,$file->sruktur_fasilitas_baru);
            $objphpexcel->getActiveSheet()->setCellValue('O'.$baris,$file->lbu_sifat_kredit);
            $objphpexcel->getActiveSheet()->setCellValue('P'.$baris,$file->cara_restruktur);
            $objphpexcel->getActiveSheet()->setCellValue('Q'.$baris,$file->restruktur_ke);
            $objphpexcel->getActiveSheet()->setCellValue('R'.$baris,$file->kol_sebelumnya);
            $objphpexcel->getActiveSheet()->setCellValue('S'.$baris,$file->kol_baru);
            $objphpexcel->getActiveSheet()->setCellValue('T'.$baris,$file->jmlhr_tunggkn);
            $objphpexcel->getActiveSheet()->setCellValue('U'.$baris,$file->jk_waktu_awal);
            $objphpexcel->getActiveSheet()->setCellValue('V'.$baris,$file->jkwaktu_expireddate);
            $objphpexcel->getActiveSheet()->setCellValue('W'.$baris,$file->jenis_usaha);
            $objphpexcel->getActiveSheet()->setCellValue('X'.$baris,$file->alasan_restruktur);
            $objphpexcel->getActiveSheet()->setCellValue('Y'.$baris,$file->kondisi_usaha);
            $objphpexcel->getActiveSheet()->setCellValue('Z'.$baris,$file->tgleksekusirestruktur);
            $objphpexcel->getActiveSheet()->setCellValue('AA'.$baris,$file->gp);
            $objphpexcel->getActiveSheet()->setCellValue('AB'.$baris,$file->jk_waktu_gp);
            $objphpexcel->getActiveSheet()->setCellValue('AC'.$baris,$file->tgl_berakhir_gp);
            $objphpexcel->getActiveSheet()->setCellValue('AD'.$baris,$file->bunga_gp);
            $baris++;
        }
        $filename="Data Restrukturisasi-".date("d-m-Y").'.xlsx';
        $objphpexcel->getActiveSheet()->setTitle("Data Restrukturisasi");
        header('Content-Type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition:attachment;filename="'.$filename.'"');
        header('Cache-control:max-age=0');
        
        $writer= PHPExcel_IOFactory::createWriter($objphpexcel,'Excel2007');
        //print_r($file);
         $writer->save('php://output');
               exit;
        
    }
    
    
    
    
    
    function sucess_notif_create_restru() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Berhasil!',
        text: 'Berhasil Create Data Restrukturisasi!!!',
        type: 'success',
        showConfirmButton: false,
        timer: 6500,
        onOpen: function () {
        // AJAX request simulated with setTimeout
        setTimeout(function () {
        swal.close()
        }, 2000)
        }
        })</script>"
        );
    }
    function sucess_notif_update_modalrestru() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Berhasil!',
        text: 'Berhasil di Update Data Restrukturisasi !!!',
        type: 'success',
        showConfirmButton: false,
        timer: 6500,
        onOpen: function () {
        // AJAX request simulated with setTimeout
        setTimeout(function () {
        swal.close()
        }, 2000)
        }
        })</script>"
        );
    }
function sucess_notif_deleteimage() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Berhasil!',
        text: 'Berhasil Delete File Restrukturisasi!!!',
        type: 'success',
        showConfirmButton: false,
        timer: 6500,
        onOpen: function () {
        // AJAX request simulated with setTimeout
        setTimeout(function () {
        swal.close()
        }, 2000)
        }
        })</script>"
        );
    }
function sucess_notif_updateimage() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Berhasil!',
        text: 'Berhasil  Data file Restrukturisasi!!!',
        type: 'success',
        showConfirmButton: false,
        timer: 6500,
        onOpen: function () {
        // AJAX request simulated with setTimeout
        setTimeout(function () {
        swal.close()
        }, 2000)
        }
        })</script>"
        );
    }
  function notif_formatfile_restruk() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Gagal! ',
        text: 'silakan periksa kembali inputan data!!!',
        type: 'error',
        showConfirmButton: false,
        timer: 6500,
        onOpen: function () {
        setTimeout(function () {
        swal.close()
        }, 2000)
        }
        })</script>"
        );
    }

}