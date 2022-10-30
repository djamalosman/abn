<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once  APPPATH.('PHPExcel/PHPExcelMRPK/Classes/PHPExcelLelang.php');
require_once  APPPATH.('PHPExcel/PHPExcelMRPK/Classes/PHPExcel/Writer/Excel2007.php');

class Lelang extends CI_Controller {



     public function __construct(){

        parent::__construct();

        $this->db = $this->load->database('default', true);
		$this->db2 = $this->load->database('second', true);

        $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));

        /*CONNECT 2 DATABASE*/

    //        if($_SERVER['SERVER_NAME'] == 'localhost'){
    //        $dsn1 = 'mysqli://root:@localhost/dbmgmtmenu';
    //        $this->db = $this->load->database($dsn1, true);     
    //
    //        $dsn2 = 'mysqli://root:@localhost/dbbsscollection';
    //        $this->db2= $this->load->database($dsn2, true);         
    //    }else{
    //        $dsn1 = 'mysqli://xplmjdmx_C24sys:4N4G4T49876@localhost/xplmjdmx_dbmgmtmenu';
    //        $this->db = $this->load->database($dsn1, true);     
    //
    //        $dsn2 = 'mysqli://xplmjdmx_C24sys:4N4G4T49876@localhost/xplmjdmx_dbbsscollection';
    //        $this->db2= $this->load->database($dsn2, true);
    //    }

        /*CONNECT 2 DATABASE*/

        

        $this->load->helper(array('url', 'form'));

        $this->load->library('session');

        $this->load->model('Menu_model', '', TRUE);

        $this->load->model('Content_model', '', TRUE);

         $this->load->model('ModelLelang', '', TRUE);

         $this->load->model('Model_log', '', TRUE);

    }

    public function index()

    {
        if ($this->session->has_userdata('username')) {
            $idmenu = 'H12';
            $idmenu2 = 'D028';
            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
            if ($result1 == '1') {
               // $this->Model_log->insertlogmenu($this->session->userdata('username'), "Main Menu : " . $idmenu . " Sub Menu : " . $idmenu2);
                $result['data'] = $this->Menu_model->loadMenu();
                $result['pagename'] = 'Lelang';
                $result['content'] = 'read_mt_lelang';
                $result['serachlelang'] = $this->ModelLelang->debsearchlelang();
                // $result['viewlelang']=$this->Content_model->viewlelang ();
                $userid = $this->session->userdata('username');
                $result['viewlelang'] = $this->ModelLelang->viewlelang($userid);
                $this->load->view('bss_home', $result); //$this->load->view('bss_home', $result); //$this->load->view('home', $result);  
            }
        } else {
            redirect('/');
        }


    }


      public function create_mntr_lelang() {
        if ($this->session->has_userdata('username')) {
            $cif = $this->input->GET('myCountry');
            // var_dump($cif);
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Tambah Data Lelang';
            $result['viewcreate_lelang'] = $this->ModelLelang->getaccountlist($cif);
            $result['parameter'] = $this->ModelLelang->parameter();
            $result['content'] = 'create_mntr_lelang';
            $this->load->view('bss_home', $result);
//            $this->load->view('bss_home', $result); //$this->load->view('home', $result);
        } else {
            redirect('/');
        }
    }
     public function delete_lelangudpate()
    {
        $selection = $this->input->post('idnya');
        // $cifid = $selection;
        // $cif = explode("-", $cifid);
        // $cif1 = $cif['0'];
        // $id1 = $cif['1'];
       //ar_dump($selection);
        if ($selection == '') {
            $this->notif_delete_data();
            redirect('Lelang/index');
        }
        $this->ModelLelang->deleteupdate_lelang($selection);

        $this->sucess_notif_delete();

        redirect('Lelang/index');
    }
     public function delete_multi_mntr_lelang() {
        $selection = $this->input->post('idnya');
        // $cifid = $selection;
        // $cif = explode("-", $cifid);
        // $cif1 = $cif['0'];
        // $id1 = $cif['1'];
       
        if ($selection == '') {
            $this->notif_delete_data();
            redirect('Lelang/index');
        }
        $this->ModelLelang->delete_multi_mntr_lelang($selection);

        $this->sucess_notif_delete();

        redirect('Lelang/index');
    }
    public function updatedatalelang()
    {
        $id_t_lelang=$this->input->post('id_t_lelang');		
        $no_ld=$this->input->post('no_ld');		      
        $cif=$this->input->post('cif');  			      
        $cabang=$this->input->post('cabang'); 			      
        $nama_debitur=$this->input->post('nama_debitur');   	      
        $fasilitas_pinjaman =$this->input->post('fasilitas_pinjaman');
        $flag_probis  =$this->input->post('flag_probis');
        $col=$this->input->post('col');   
        $dpd=$this->input->post('dpd'); 
        $plafond=$this->input->post('plafond'); 
        $outstanding=$this->input->post('outstanding'); 
        $ckpn=$this->input->post('ckpn'); 
        $jenis_jaminan=$this->input->post('jenis_jaminan'); 
        $keterangan_jaminan=$this->input->post('keterangan_jaminan'); 
        $lt=$this->input->post('lt'); 
        $lb=$this->input->post('lb'); 
        $alamat_jaminan=$this->input->post('alamat_jaminan'); 
        $periode_lelang_ke=$this->input->post('periode_lelang_ke'); 
        $tgl_collect_D  =$this->input->post('tgl_collect_D'); 
        $tgl_order_apraisal=$this->input->post('tgl_order_apraisal'); 
        $mv=$this->input->post('mv'); 
        $lv=$this->input->post('lv'); 
        $penilai_apraisal=$this->input->post('penilai_apraisal'); 
        $tgl_memo_limit=$this->input->post('tgl_memo_limit'); 
        $tgl_spk_bls=$this->input->post('tgl_spk_bls'); 
        $bls=$this->input->post('bls'); 
        $tgl_somasi_bls=$this->input->post('tgl_somasi_bls'); 
        $tgl_permohonan_lelang=$this->input->post('tgl_permohonan_lelang'); 
        $tgl_pedaftaran_lelang=$this->input->post('tgl_pedaftaran_lelang'); 
        $nilai_limit_lelang =$this->input->post('nilai_limit_lelang'); 
        $tgl_penepatan_lelang =$this->input->post('tgl_penepatan_lelang'); 
        $tgl_lelang =$this->input->post('tgl_lelang'); 
        $tgl_pengumuman_lelang1=$this->input->post('tgl_pengumuman_lelang1'); 
        $tgl_pengumuman_lelang2=$this->input->post('tgl_pengumuman_lelang2'); 
        $hasil_lelang=$this->input->post('hasil_lelang'); 
        $terjual_lelang =$this->input->post('terjual_lelang'); 
        $keterangan =$this->input->post('keterangan'); 
        $biaya_lelang =$this->input->post('biaya_lelang'); 
        $pajak_lelang =$this->input->post('pajak_lelang'); 
        $cutloos =$this->input->post('cutloos'); 
        $last_status =$this->input->post('last_status'); 
        $state_lelang =$this->input->post('state_lelang');  

       $update=$this->ModelLelang->datalelangupdate($no_ld,$cif,$cabang,$nama_debitur,$fasilitas_pinjaman,$flag_probis,$col,$dpd,$plafond,$outstanding,$ckpn,$jenis_jaminan,$keterangan_jaminan ,$lt,$lb,$alamat_jaminan,$periode_lelang_ke,$tgl_collect_D,$tgl_order_apraisal,$mv,$lv,$penilai_apraisal,$tgl_memo_limit,$tgl_spk_bls,$bls,$tgl_somasi_bls,$tgl_permohonan_lelang,$tgl_pedaftaran_lelang,$nilai_limit_lelang,$tgl_penepatan_lelang,$tgl_lelang,$tgl_pengumuman_lelang1,$tgl_pengumuman_lelang2,$hasil_lelang,$terjual_lelang,$keterangan,$biaya_lelang,$pajak_lelang,$cutloos,$last_status,$state_lelang,$id_t_lelang );
        if($update=1){
            $this->updatelelang();
          $this->Model_log->logactivity($this->session->userdata('username'), "Sucess Update Data Lelang ");
            redirect('lelang/index');
        }else {
            $this->Model_log->logactivity($this->session->userdata('username'), "Erorr Update Data Lelang ");
            $this->gagalupdate();
            redirect('lelang/index');
        }
    }
        public function update_lelang($id) {
    if ($this->session->has_userdata('username')) {
            $idmenu = 'H12';
            $idmenu2 = 'D028';
            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
    if ($result1 == '1') {
            $result['data'] = $this->Menu_model->loadMenu();
            $result['row'] = $this->ModelLelang->get_mntr_lelang_one($id);
            $result['viewlelang'] = $this->ModelLelang->vieweditlelang($id);
            $result['foto']=$this->ModelLelang->viewfoto($id);
            $result['dokumen']=$this->ModelLelang->dokumenfile($id);
            $result['pagename'] = 'Edit Data Lelang';
            $result['content'] = 'update_mntr_lelang';
            $this->Model_log->logactivity($this->session->userdata('username'), "View Data Lelang : ");
            $this->load->view('bss_home', $result);
//            $this->load->view('bss_home', $result); //$this->load->view('home', $result);
        } 
        else {
            redirect('/');
        }
    }
        }

    public function insert_data() {
           if ($this->session->has_userdata('username')) {
           $data=array();
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $imagecode = array(); 
    $alpha_length = strlen($alphabet) - 1; //fungsi untuk mencari dan menghitung jumlah string atau karakter
    for ($i = 0; $i < 8; $i++) 
    {
        $n = rand(0, $alpha_length);//fungsi untuk mengacak jumlah string atau karakter
        $imagecode[] = $alphabet[$n];
    }

    $alphabet1 = 'abcdefghijklmnopqrstuvwxyz1234567890';
    $code1 = array(); 
    $alpha_length1 = strlen($alphabet1) - 1; //fungsi untuk mencari dan menghitung jumlah string atau karakter
    for ($i = 0; $i < 8; $i++) 
    {
        $n = rand(0, $alpha_length1);//fungsi untuk mengacak jumlah string atau karakter
        $code1[] = $alphabet1[$n];
    }
                $codein=implode($code1);
                $codeimage=implode($imagecode);
                $no_ld=$this->input->post('no_ld');		      
                $cif=$this->input->post('cif');  			      
                $cabang=$this->input->post('cabang'); 			      
                $nama_debitur=$this->input->post('nama_debitur');   	      
                $fasilitas_pinjaman =$this->input->post('fasilitas_pinjaman');
                $flag_probis  =$this->input->post('flag_probis');
                $col=$this->input->post('col');   
                $dpd=$this->input->post('dpd'); 
                $plafond=$this->input->post('plafond'); 
                $outstanding=$this->input->post('outstanding'); 
                $ckpn=$this->input->post('ckpn'); 
                $jenis_jaminan=$this->input->post('jenis_jaminan'); 
                $keterangan_jaminan=$this->input->post('keterangan_jaminan'); 
                $lt=$this->input->post('lt'); 
                $lb=$this->input->post('lb'); 
                $alamat_jaminan=$this->input->post('alamat_jaminan'); 
                $periode_lelang_ke=$this->input->post('periode_lelang_ke'); 
                $tgl_collect_D  =$this->input->post('tgl_collect_D'); 
                $tgl_order_apraisal=$this->input->post('tgl_order_apraisal'); 
                $mv=$this->input->post('mv'); 
                $lv=$this->input->post('lv'); 
                $penilai_apraisal=$this->input->post('penilai_apraisal'); 
                $tgl_memo_limit=$this->input->post('tgl_memo_limit'); 
                $tgl_spk_bls=$this->input->post('tgl_spk_bls'); 
                $bls=$this->input->post('bls'); 
                $tgl_somasi_bls=$this->input->post('tgl_somasi_bls'); 
                $tgl_permohonan_lelang=$this->input->post('tgl_permohonan_lelang'); 
                $tgl_pedaftaran_lelang=$this->input->post('tgl_pedaftaran_lelang'); 
                $nilai_limit_lelang =$this->input->post('nilai_limit_lelang'); 
                $tgl_penepatan_lelang =$this->input->post('tgl_penepatan_lelang'); 
                $tgl_lelang =$this->input->post('tgl_lelang'); 
                $tgl_pengumuman_lelang1=$this->input->post('tgl_pengumuman_lelang1'); 
                $tgl_pengumuman_lelang2=$this->input->post('tgl_pengumuman_lelang2'); 
                $hasil_lelang=$this->input->post('hasil_lelang'); 
                $terjual_lelang =$this->input->post('terjual_lelang'); 
                $keterangan =$this->input->post('keterangan'); 
                $biaya_lelang =$this->input->post('biaya_lelang'); 
                $pajak_lelang =$this->input->post('pajak_lelang'); 
                $cutloos =$this->input->post('cutloos'); 
                $last_status =$this->input->post('last_status'); 
                $state_lelang =$this->input->post('state_lelang');   
               

            $filesCount = count($_FILES['myfile']['name']);
            for ($i=0; $i < $filesCount; $i++) { 
            $name=$_FILES['file']['name']= $_FILES['myfile']['name'][$i];
            $type=$_FILES['file']['type']= $_FILES['myfile']['type'][$i];
            $tmp_name=$_FILES['file']['tmp_name']=$_FILES['myfile']['tmp_name'][$i];
            $_FILES['file']['error'] = $_FILES['myfile']['error'][$i];
            $size=$_FILES['file']['size']= $_FILES['myfile']['size'][$i];
            
                $uploadPath = './uploads/';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'jpg|jpeg|pdf';
                
                // Load and initialize upload library
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
               
                // Upload file to server
                if(!$this->upload->do_upload('file')){
                    // Uploaded file data
                     $error = array('error' => $this->upload->display_errors());
                        $this->notif_formatfile();
                        redirect('lelang/index');
            }
            else{
               
                    $fileData = $this->upload->data();
                    $uploadData[$i]['code'] =$cif;
                    $uploadData[$i]['cif'] =$cif;
                    $uploadData[$i]['name_file']=$name;
                    $uploadData[$i]['type_file']=$type;
                    $uploadData[$i]['file_content'] = $fileData['file_name'];
                    $uploadData[$i]['file_size']=$size;
                    $uploadData[$i]['tanggal_insert'] =date('Y-m-d');
                    $uploadData[$i]['code_image']=$codeimage;
                    $uploadData[$i]['code_in']=$codein;
                   // $uploadData[$i]['f_id']=$codein;
                    
                    $Dataupload['code_in']=$codein;
                    $Dataupload['code']=$cif;

                    $Dataupload['no_ld'] =$no_ld ;	      
                    $Dataupload['cif']=$cif ;  			     
                    $Dataupload['cabang']=$cabang ; 			     
                    $Dataupload['nama_debitur']=$nama_debitur;   	     
                    $Dataupload['fasilitas_pinjaman']=$fasilitas_pinjaman;
                    $Dataupload['flag_probis']=$flag_probis ;
                    $Dataupload['col']=$col;   
                    $Dataupload['dpd']=$dpd; 
                    $Dataupload['plafond']=$plafond; 
                    $Dataupload['outstanding']=$outstanding; 
                    $Dataupload['ckpn']=$ckpn; 
                    $Dataupload['jenis_jaminan']=$jenis_jaminan; 
                    $Dataupload['keterangan_jaminan']=$keterangan_jaminan; 
                    $Dataupload['lt']=$lt; 
                    $Dataupload['lb']=$lb; 
                    $Dataupload['alamat_jaminan']=$alamat_jaminan; 
                    $Dataupload['periode_lelang_ke ']=$periode_lelang_ke ; 
                    $Dataupload['tgl_collect_D'] =$tgl_collect_D; 
                    $Dataupload['tgl_order_apraisal']=$tgl_order_apraisal; 
                    $Dataupload['mv']=$mv; 
                    $Dataupload['lv']=$lv; 
                    $Dataupload['penilai_apraisal']=$penilai_apraisal; 
                    $Dataupload['tgl_memo_limit']=$tgl_memo_limit; 
                    $Dataupload['tgl_spk_bls']=$tgl_spk_bls; 
                    $Dataupload['bls']=$bls; 
                    $Dataupload['tgl_somasi_bls']=$tgl_somasi_bls; 
                    $Dataupload['tgl_permohonan_lelang']=$tgl_permohonan_lelang; 
                    $Dataupload['tgl_pedaftaran_lelang']=$tgl_pedaftaran_lelang; 
                    $Dataupload['nilai_limit_lelang']=$nilai_limit_lelang; 
                    $Dataupload['tgl_penepatan_lelang ']=$tgl_penepatan_lelang ; 
                    $Dataupload['tgl_lelang']=$tgl_lelang; 
                    $Dataupload['tgl_pengumuman_lelang1 ']=$tgl_pengumuman_lelang1;
                    $Dataupload['tgl_pengumuman_lelang2 ']=$tgl_pengumuman_lelang2;
                    $Dataupload['hasil_lelang']=$hasil_lelang; 
                    $Dataupload['terjual_lelang']=$terjual_lelang; 
                    $Dataupload['keterangan']=$keterangan; 
                    $Dataupload['biaya_lelang']=$biaya_lelang; 
                    $Dataupload['pajak_lelang']=$pajak_lelang; 
                    $Dataupload['cutloos']=$cutloos; 
                    $Dataupload['last_status ']=$last_status; 
                    $Dataupload['state_lelang']=$state_lelang;   
                    
                    $ambilcodein[]=$codein;

                    $Dataupload['tgl_lelang']=date('Y-m-d');  
            }

        }
            if (!empty($Dataupload)) {
                $this->ModelLelang->data_insertlelang($uploadData,$Dataupload,$ambilcodein);
                $this->sucess_notif_lelang();
                redirect('lelang/index');
            }
        }
    }

    public function delete_image($value)
    {   
        $delimage=$this->input->POST('idnya');
        // $cifnama = $value;
        // $cif = explode("-", $cifnama);
        // $hasil = $cif['0'];
        // $cifimage = $cif['1'];
        // $imagecif = $cif['1'];
        
        $delname=$this->input->POST('name_dokumen');
        $delnamefile=$this->input->POST('myfile');
        $filesCount = count($_FILES['myfile']['name']);
       if ($delimage !='') {
           $this->ModelLelang->deleteimage($delimage);
           $this->deletefoto_lelang();
        redirect('lelang/index');
       }else{
        $this->insertdelete_image_lelang($value,$delname,$filesCount);
        
       }
        
    }
public function insertdelete_image_lelang($cifimage,$delname,$filesCount)
{
    // $filesCount = count($_FILES['myfile']['name']);
    // $delname=$this->input->POST('name_dokumen');
    //var_dump($value,$delname,$filesCount);
    $data=array();
            //$delimage=$this->input->get('idnya');
            //$filesCount = count($_FILES['myfile']['name']);
            for ($i=0; $i < $filesCount; $i++) { 
            $name=$_FILES['file']['name']= $_FILES['myfile']['name'][$i];
            $type=$_FILES['file']['type']= $_FILES['myfile']['type'][$i];
            $tmp_name=$_FILES['file']['tmp_name']=$_FILES['myfile']['tmp_name'][$i];
            $_FILES['file']['error'] = $_FILES['myfile']['error'][$i];
            $size=$_FILES['file']['size']= $_FILES['myfile']['size'][$i];

            $uploadPath = './uploads/';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'jpg|jpeg|pdf';
                
                // Load and initialize upload library
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
               
                // Upload file to server
                if(!$this->upload->do_upload('file')){
                    // Uploaded file data
                     $error = array('error' => $this->upload->display_errors());
                        $this->notif_formatfile();
                        redirect('lelang/index');
            }else
            {
                    $fileData = $this->upload->data();
                    $uploadData[$i]['code'] =$cifimage;
                    $uploadData[$i]['cif'] =$cifimage;
                    $uploadData[$i]['name_file']=$name;
                    $uploadData[$i]['type_file']=$type;
                    $uploadData[$i]['file_content'] = $fileData['file_name'];
                    $uploadData[$i]['file_size']=$size;
                    $uploadData[$i]['tanggal_insert'] =date('Y-m-d');
                    $uploadData[$i]['nama_image']=$delname;
            }


        }
        if (!empty($uploadData)) {
                $this->ModelLelang->foto_lelang_insert($uploadData);
                $this->sucess_notif_updatefoto();
                redirect('lelang/index');
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
   public function create_mntr_lelang_process() {
$data = array(
            "cif" => $this->input->post('cif'),
            "code" => $this->input->post('cif'),
            "nomor_rekening" => $this->input->post('norek'),
            "no_ld" => $this->input->post('no_ld'),
            "nama_debitur" => $this->input->post('nama'),
            "tipe_fasilitas" => $this->input->post('tipe_fasilitas'),
            "keterangan_fasilitas" => $this->input->post('keterangan_fasilitas'),
            "nama_cabang" => $this->input->post('branch'),
             "plafond" => $this->input->post('plafondAmount'),
            "baki_debet" => $this->input->post('BakiDebet'),
             "angsuran" => $this->input->post('angsuran'),
            "dude_pokok" => $this->input->post('DuePokok'),
            "dude_bunga" => $this->input->post('DueBunga'),
            "eligible" => $this->input->post('eligible'),
            "nilai_penjualan_awal" => $this->input->post('nilai_penjualan_awal'),
            "register" => $this->input->post('register'),
            "periode_lelang" => $this->input->post('periodelelang'),
            "aging_lelang" => $this->input->post('aginglelang'),
            "hasil_lelang" => $this->input->post('hasillelang'),
            "biaya_lelang" => $this->input->post('biaya_lelang'),
            "pajak_lelang" => $this->input->post('pajak_lelang'),
            "nilai_penjualan_akhir" => $this->input->post('nilai_penjualan_akhir'),
            "cut_loss" => $this->input->post('cut_loss'),
            "tgl_lelang" =>date('Y-m-d')
        );
    
    $nama=$this->input->post('nama');
    $diloan=$this->input->post('idloan');
    $cif=$this->input->post('cif');
    $status_lelang = $this->input->post('status_lelang');
    //var_dump($nama,$diloan,$cif,$namestatus);
        // print_r($data);
        $this->ModelLelang->createlelang_process($data,$nama,$diloan,$cif,$status_lelang);
        // $this->sucess_notif();
        //redirect('Lelang/index');
    }
    
    public function createlelang_excel(){
        $data= $this->ModelLelang->excel_lelang();
         
         $objphpexcel=new PHPExcel();
         
        $objphpexcel->getProperties()->setCreator("BSS");
        $objphpexcel->getProperties()->setLastModifiedBy("BSS");
        $objphpexcel->getProperties()->setTitle("Data Lelang");
        $objphpexcel->getProperties()->setSubject("");
        $objphpexcel->getProperties()->setDescription("");
        
        $objphpexcel->setActiveSheetIndex(0);
        
        $objphpexcel->getActiveSheet()->setCellValue('A1','no_ld');			    
        $objphpexcel->getActiveSheet()->setCellValue('B1','cif');
        $objphpexcel->getActiveSheet()->setCellValue('C1','cabang');
        $objphpexcel->getActiveSheet()->setCellValue('D1','nama_debitur');
        $objphpexcel->getActiveSheet()->setCellValue('E1','fasilitas_pinjaman');
        $objphpexcel->getActiveSheet()->setCellValue('F1','flag_probis ');
        $objphpexcel->getActiveSheet()->setCellValue('G1','col');
        $objphpexcel->getActiveSheet()->setCellValue('H1','dpd');
        $objphpexcel->getActiveSheet()->setCellValue('I1','plafond');
        $objphpexcel->getActiveSheet()->setCellValue('J1','outstanding');
        $objphpexcel->getActiveSheet()->setCellValue('K1','ckpn');
        $objphpexcel->getActiveSheet()->setCellValue('L1','jenis_jaminan');
        $objphpexcel->getActiveSheet()->setCellValue('M1','keterangan_jaminan');
        $objphpexcel->getActiveSheet()->setCellValue('N1','lt');
        $objphpexcel->getActiveSheet()->setCellValue('O1','lb');
        $objphpexcel->getActiveSheet()->setCellValue('P1','alamat_jaminan');
        $objphpexcel->getActiveSheet()->setCellValue('Q1','periode_lelang_ke ');
        $objphpexcel->getActiveSheet()->setCellValue('R1','tgl_collect_D');
        $objphpexcel->getActiveSheet()->setCellValue('S1','tgl_order_apraisal');
        $objphpexcel->getActiveSheet()->setCellValue('T1','mv');
        $objphpexcel->getActiveSheet()->setCellValue('U1','lv');
        $objphpexcel->getActiveSheet()->setCellValue('V1','penilai_apraisal');
        $objphpexcel->getActiveSheet()->setCellValue('W1','tgl_memo_limit');
        $objphpexcel->getActiveSheet()->setCellValue('X1','tgl_spk_bls');
        $objphpexcel->getActiveSheet()->setCellValue('Y1','bls');
        $objphpexcel->getActiveSheet()->setCellValue('Z1','tgl_somasi_bls');
        $objphpexcel->getActiveSheet()->setCellValue('AA1','tgl_permohonan_lelang');
        $objphpexcel->getActiveSheet()->setCellValue('AB1','tgl_pedaftaran_lelang');
        $objphpexcel->getActiveSheet()->setCellValue('AC1','nilai_limit_lelang');
        $objphpexcel->getActiveSheet()->setCellValue('AD1','tgl_penepatan_lelang');
        $objphpexcel->getActiveSheet()->setCellValue('AE1','tgl_lelang');
        $objphpexcel->getActiveSheet()->setCellValue('AF1','tgl_pengumuman_lelang1');
        $objphpexcel->getActiveSheet()->setCellValue('AG1','tgl_pengumuman_lelang2');
        $objphpexcel->getActiveSheet()->setCellValue('AH1','hasil_lelang');
        $objphpexcel->getActiveSheet()->setCellValue('AI1','terjual_lelang');
        $objphpexcel->getActiveSheet()->setCellValue('AJ1','keterangan');
        $objphpexcel->getActiveSheet()->setCellValue('AK1','biaya_lelang');
        $objphpexcel->getActiveSheet()->setCellValue('AL1','pajak_lelang');
        $objphpexcel->getActiveSheet()->setCellValue('AM1','cutloos');
        $objphpexcel->getActiveSheet()->setCellValue('AN1','last_status');
        $objphpexcel->getActiveSheet()->setCellValue('AO1','state_lelang');
       
        
        
        
        
       $baris=2;
        
        foreach ($data as $file){
            $objphpexcel->getActiveSheet()->setCellValue('A'.$baris,$file->no_ld);
            $objphpexcel->getActiveSheet()->setCellValue('B'.$baris,$file->cif);
            $objphpexcel->getActiveSheet()->setCellValue('C'.$baris,$file->cabang);
            $objphpexcel->getActiveSheet()->setCellValue('D'.$baris,$file->nama_debitur);
            $objphpexcel->getActiveSheet()->setCellValue('E'.$baris,$file->fasilitas_pinjaman);
            $objphpexcel->getActiveSheet()->setCellValue('F'.$baris,$file->flag_probis);
            $objphpexcel->getActiveSheet()->setCellValue('G'.$baris,$file->col);
            $objphpexcel->getActiveSheet()->setCellValue('H'.$baris,$file->dpd);
            $objphpexcel->getActiveSheet()->setCellValue('I'.$baris,$file->plafond);
            $objphpexcel->getActiveSheet()->setCellValue('J'.$baris,$file->outstanding);
            $objphpexcel->getActiveSheet()->setCellValue('K'.$baris,$file->ckpn);
            $objphpexcel->getActiveSheet()->setCellValue('L'.$baris,$file->jenis_jaminan);
            $objphpexcel->getActiveSheet()->setCellValue('M'.$baris,$file->keterangan_jaminan);
            $objphpexcel->getActiveSheet()->setCellValue('N'.$baris,$file->lt);
            $objphpexcel->getActiveSheet()->setCellValue('O'.$baris,$file->lb);
            $objphpexcel->getActiveSheet()->setCellValue('P'.$baris,$file->alamat_jaminan);
            $objphpexcel->getActiveSheet()->setCellValue('Q'.$baris,$file->periode_lelang_ke);
            
            $objphpexcel->getActiveSheet()->setCellValue('R'.$baris,$file->tgl_collect_D);
            $objphpexcel->getActiveSheet()->setCellValue('S'.$baris,$file->tgl_order_apraisal);
            $objphpexcel->getActiveSheet()->setCellValue('T'.$baris,$file->mv);
            $objphpexcel->getActiveSheet()->setCellValue('U'.$baris,$file->lv);
            $objphpexcel->getActiveSheet()->setCellValue('V'.$baris,$file->penilai_apraisal);
            $objphpexcel->getActiveSheet()->setCellValue('W'.$baris,$file->tgl_memo_limit);
            $objphpexcel->getActiveSheet()->setCellValue('X'.$baris,$file->tgl_spk_bls);
            $objphpexcel->getActiveSheet()->setCellValue('Y'.$baris,$file->bls);
			
			$objphpexcel->getActiveSheet()->setCellValue('Z'.$baris,$file->tgl_somasi_bls);
            $objphpexcel->getActiveSheet()->setCellValue('AA'.$baris,$file->tgl_permohonan_lelang);
            $objphpexcel->getActiveSheet()->setCellValue('AB'.$baris,$file->tgl_pedaftaran_lelang);
            $objphpexcel->getActiveSheet()->setCellValue('AC'.$baris,$file->nilai_limit_lelang);
            $objphpexcel->getActiveSheet()->setCellValue('AD'.$baris,$file->tgl_penepatan_lelang);
            $objphpexcel->getActiveSheet()->setCellValue('AE'.$baris,$file->tgl_lelang);
            $objphpexcel->getActiveSheet()->setCellValue('AF'.$baris,$file->tgl_pengumuman_lelang1);
            $objphpexcel->getActiveSheet()->setCellValue('AG'.$baris,$file->tgl_pengumuman_lelang2);
           
			$objphpexcel->getActiveSheet()->setCellValue('AH'.$baris,$file->hasil_lelang);
            $objphpexcel->getActiveSheet()->setCellValue('AI'.$baris,$file->terjual_lelang);
            $objphpexcel->getActiveSheet()->setCellValue('AJ'.$baris,$file->keterangan);
            $objphpexcel->getActiveSheet()->setCellValue('AK'.$baris,$file->biaya_lelang);
            $objphpexcel->getActiveSheet()->setCellValue('AL'.$baris,$file->pajak_lelang);
            $objphpexcel->getActiveSheet()->setCellValue('AM'.$baris,$file->cutloos);
            $objphpexcel->getActiveSheet()->setCellValue('AN'.$baris,$file->last_status);
            $objphpexcel->getActiveSheet()->setCellValue('AO'.$baris,$file->state_lelang);
           
            $baris++;
        }
        $filename="Data Lelang-".date("d-m-Y").'.xlsx';
        $objphpexcel->getActiveSheet()->setTitle("Data Lelang");
        header('Content-Type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition:attachment;filename="'.$filename.'"');
        header('Cache-control:max-age=0');
        
        $writer= PHPExcel_IOFactory::createWriter($objphpexcel,'Excel2007');
        //print_r($file);
         $writer->save('php://output');
               exit;
    }
    

    public function viewimagesession_param($value) {
        $this->session->set_userdata('paramCif',$value);
        redirect('Lelang/view_image');
    }
    
    public function view_image()
    {
        if ($this->session->has_userdata('username')) {

            $idmenu = 'H12';
            $idmenu2 = 'D028';

            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);

            if ($result1 == '1') {
                
                if (empty($this->session->userdata('paramCif'))){
            redirect('Lelang/index');
                    }
                $value = $this->session->userdata('paramCif');
                
                $ciflelang = $value;
                $cifambil = explode("-", $ciflelang);
                $id = $cifambil['0'];
                $cif = $cifambil['1'];
                $result['data'] = $this->Menu_model->loadMenu();

                $result['pagename'] = 'Detail file';
                // =$this->encrypt->encode();
                // =$this->encrypt->decode();    
                $result['foto']=$this->ModelLelang->imagedeatil($id,$cif);
//              
                $result['imageview']=$this->ModelLelang->imageview($id,$cif);
                
                $result['content'] = 'detail_filelelang';

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

    public function updateImagedelete() {
        
        if(isset($_POST['update'])) {
            $data=array();
        $id= $this->input->post('id');
        $cif= $this->input->post('cif');
        $code= $this->input->post('code');
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
                $config['allowed_types'] = 'jpg|jpeg|pdf';
                
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
                    $uploadData[$i]['code'] =$id;
                    $uploadData[$i]['cif'] =$cif;
                    $uploadData[$i]['f_id'] =$id;
                    $uploadData[$i]['name_file']=$name;
                    $uploadData[$i]['type_file']=$type;
                    $uploadData[$i]['file_content'] = $fileData['file_name'];
                    $uploadData[$i]['file_size']=$size;
                    //$uploadData[$i]['name_dokumen']=$name_dokumen;
                    $uploadData[$i]['tanggal_insert'] =date('Y-m-d');
            }
            }
            if(!empty($uploadData)){
                $this->ModelLelang->updateimage($uploadData);
                $this->sucess_notif_updateimage();
                redirect('lelang/view_image');
            }
        } elseif(isset($_POST['delete'])) {
        $id= $this->input->post('id');
        $idnya= $this->input->post('idnya[]');
		if($idnya!=''){
        $this->ModelLelang->deleteimagelelang($id,$idnya);
		
        $this->sucess_notif_deleteimage();
        redirect('lelang/view_image');
			}else{
				$this->gagaldeletefile();
				redirect('lelang/view_image');
			}
        }
        
    }

 function gagaldeletefile() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Gagal! ',
        text: 'gagal hapus file!!!',
        type: 'error'
        })</script>"
        );
    }
    function updatelelang() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Berhasil!',
        text: 'Berhasil update Data lelang!!!',
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

    function deletefoto_lelang() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Berhasil!',
        text: 'Berhasil Menhapus File!!!',
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
    function sucess_notif_updatefoto() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Berhasil!',
        text: 'Berhasil Create Data lelang!!!',
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
    function sucess_notif_delete() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Berhasil!',
        text: 'Berhasil Delete Data lelang!!!',
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
    function sucess_notif_lelang() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Berhasil!',
        text: 'Berhasil Create Data lelang!!!',
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
  

    function gagalupdate() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Gagal! ',
        text: 'silakan periksa kembali inputan anda!!!',
        type: 'error'
        })</script>"
        );
    }

  function notif_delete_data() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Gagal! ',
        text: 'silakan periksa kembali inputan anda!!!',
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


  function notif_formatfile() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Gagal! ',
        text: 'Silakan periksa kembali format dokumen Anda ,hanya Bisa format JPG,PNG dan PDF !!', 
       
        type: 'error',
        showConfirmButton: false,
        timer: 6500,
        onOpen: function () {
        setTimeout(function () {
        swal.close()
        }, 52000)
        }
        })</script>"
        );
    }
    function sucess_notif_updateimage() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Berhasil!',
        text: 'Berhasil  Data file Lelang!!!',
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
        text: 'Berhasil Delete File Lelang!!!',
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
}