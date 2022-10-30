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

       



    }

    public function index()

    {
        if ($this->session->has_userdata('username')) {
            $idmenu = 'H12';
            $idmenu2 = 'D028';
            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
            if ($result1 == '1') {
                $result['data'] = $this->Menu_model->loadMenu();
                $result['pagename'] = 'Lelang';
                $result['content'] = 'read_mt_lelang';
                $result['serachlelang'] = $this->ModelLelang->debsearchlelang();
                // $result['viewlelang']=$this->Content_model->viewlelang ();
                $result['viewlelang'] = $this->ModelLelang->viewlelang();
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
     public function delete_multi_mntr_lelang() {
        $selection = $this->input->post('idnya');
       
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
        $cif=$this->input->post('nsnmr');
        $flag_eligible=$this->input->post('flag_eligible');
        $flag_register=$this->input->post('flag_register');
        $periode_lelang=$this->input->post('periode_lelang');
        $aging_lelang=$this->input->post('aging_lelang');
        $hasil_lelang=$this->input->post('hasil_lelang');
        $biaya_lelang=$this->input->post('biaya_lelang');
        $pajak_lelang=$this->input->post('pajak_lelang');
        $nilai_penjualan_akhir=$this->input->post('nilai_penjualan_akhir');
        $nilai_penjualan_awal=$this->input->post('nilai_penjualan_awal');
        $cut_loss=$this->input->post('cut_loss');

        $this->ModelLelang->datalelangupdate($cif,$flag_eligible,$flag_register,$periode_lelang,$aging_lelang,$hasil_lelang,$biaya_lelang,$pajak_lelang,$nilai_penjualan_akhir,$nilai_penjualan_awal,$cut_loss);

    }
        public function update_lelang($id) {
        if ($this->session->has_userdata('username')) {
            $result['data'] = $this->Menu_model->loadMenu();
            $result['row'] = $this->ModelLelang->get_mntr_lelang_one($id);
            $result['viewlelang'] = $this->ModelLelang->vieweditlelang($id);
            $result['foto']=$this->ModelLelang->viewfoto($id);
            $result['pagename'] = 'Edit Data Lelang';
            $result['content'] = 'update_mntr_lelang';
            $this->load->view('bss_home', $result);
//            $this->load->view('bss_home', $result); //$this->load->view('home', $result);
        } else {
            redirect('/');
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
                $codeimage=implode($imagecode);
                $norek=$this->input->post('norek');
                $namaDebitur=$this->input->post('NamaDebitur');
                $tipefasilitas=$this->input->post('tipe_fasilitas');
                $plafondAmount=$this->input->post('plafondAmount');
                $idloan=$this->input->post('idloan');
                $nomorNasabah=$this->input->post('NomorNasabah');
                $kodeCabang=$this->input->post('KodeCabang');
                $dueBunga=$this->input->post('DueBunga');
                $duePokok=$this->input->post('DuePokok');
                $bakiDebet=$this->input->post('BakiDebet');
                $jmlHariTunggakan=$this->input->post('JmlHariTunggakan');
                $branch=$this->input->post('branch');
                $description=$this->input->post('description');
                $poduk_name=$this->input->post('poduk_name');
                $angsuran=$this->input->post('angsuran');
                
                $eligible=$this->input->post('eligible');
                $register=$this->input->post('register');
                $periodelelang=$this->input->post('periodelelang');
                $aginglelang=$this->input->post('aginglelang');
                $hasillelang=$this->input->post('hasillelang');
                $biaya_lelang=$this->input->post('biaya_lelang');
                $pajak_lelang=$this->input->post('pajak_lelang');
                $nilai_penjualan_akhir=$this->input->post('nilai_penjualan_akhir');
                $nilai_penjualan_awal=$this->input->post('nilai_penjualan_awal');
                $cut_loss=$this->input->post('cut_loss');
                $name_dokumen=$this->input->post('name_dokumen');
               

            $filesCount = count($_FILES['myfile']['name']);
            for ($i=0; $i < $filesCount; $i++) { 
            $name=$_FILES['file']['name']= $_FILES['myfile']['name'][$i];
            $type=$_FILES['file']['type']= $_FILES['myfile']['type'][$i];
            $tmp_name=$_FILES['file']['tmp_name']=$_FILES['myfile']['tmp_name'][$i];
            $_FILES['file']['error'] = $_FILES['myfile']['error'][$i];
            $size=$_FILES['file']['size']= $_FILES['myfile']['size'][$i];
            
                $uploadPath = './uploads/';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'jpg|png|jpeg|gif';
                
                // Load and initialize upload library
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
               
                // Upload file to server
                if(!$this->upload->do_upload('file')){
                    // Uploaded file data
                     $error = array('error' => $this->upload->display_errors());
                        $this->notif_formatfile();
                        redirect('restru/index');
            }
            else{
               
                    $fileData = $this->upload->data();
                    $uploadData[$i]['code'] =$nomorNasabah;
                    $uploadData[$i]['cif'] =$nomorNasabah;
                    $uploadData[$i]['name_file']=$name;
                    $uploadData[$i]['type_file']=$type;
                    $uploadData[$i]['file_content'] = $fileData['file_name'];
                    $uploadData[$i]['file_size']=$size;
                    $uploadData[$i]['tanggal_insert'] =date('Y-m-d');
                    $uploadData[$i]['nama_image']=$name_dokumen;
                    $uploadData[$i]['code_image']=$codeimage;

                    $Dataupload['code']=$nomorNasabah;
                    $Dataupload['cif']=$nomorNasabah; 
                    $Dataupload['nomor_rekening']=$norek;   
                    $Dataupload['no_ld']=$idloan;           
                    $Dataupload['nama_debitur'] =$namaDebitur;        
                    $Dataupload['tipe_fasilitas']=$tipefasilitas;
                    $Dataupload['keterangan_fasilitas']=$description;
                    $Dataupload['nama_cabang']=$branch;
                    $Dataupload['plafond']=$plafondAmount;    
                    $Dataupload['baki_debet']=$bakiDebet;  
                    $Dataupload['angsuran']=$angsuran;   
                    $Dataupload['dude_pokok']=$duePokok; 
                    $Dataupload['dude_bunga']=$dueBunga; 
                    $Dataupload['eligible']=$eligible;   
                    $Dataupload['register']=$register;   
                    $Dataupload['periode_lelang']=$periodelelang; 
                    $Dataupload['aging_lelang']=$aginglelang;   
                    $Dataupload['hasil_lelang']=$hasillelang;

            $Dataupload['biaya_lelang']=$biaya_lelang;
            $Dataupload['pajak_lelang']=$pajak_lelang;
            $Dataupload['nilai_penjualan_akhir']=$nilai_penjualan_akhir;
            $Dataupload['nilai_penjualan_awal']=$nilai_penjualan_awal;
            $Dataupload['cut_loss']=$cut_loss;
            

                    $Dataupload['tgl_lelang']=date('Y-m-d');  
            }

        }
            if (!empty($Dataupload)) {
                $this->ModelLelang->data_insertlelang($uploadData,$Dataupload);
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
                $config['allowed_types'] = 'jpg|png|jpeg|gif';
                
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
            "no_ld" => $this->input->post('idloan'),
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
        
        $objphpexcel->getActiveSheet()->setCellValue('A1','CIF');
        $objphpexcel->getActiveSheet()->setCellValue('B1','Nomor Rekening');
        $objphpexcel->getActiveSheet()->setCellValue('C1','ID Temenos');
        $objphpexcel->getActiveSheet()->setCellValue('D1','Nama Nasabah');
        $objphpexcel->getActiveSheet()->setCellValue('E1','Tipe Fasilitas');
        $objphpexcel->getActiveSheet()->setCellValue('F1','Keterangan Fasilitas');
        $objphpexcel->getActiveSheet()->setCellValue('G1','Nama Cabang');
        $objphpexcel->getActiveSheet()->setCellValue('H1','plafond');
        $objphpexcel->getActiveSheet()->setCellValue('I1','Baki Debet');
        $objphpexcel->getActiveSheet()->setCellValue('J1','Angsuran');
        $objphpexcel->getActiveSheet()->setCellValue('K1','Tunggakan Pokok');
        $objphpexcel->getActiveSheet()->setCellValue('L1','Tunggakan Bunga');
        
        $objphpexcel->getActiveSheet()->setCellValue('M1','Denda');
        $objphpexcel->getActiveSheet()->setCellValue('N1',' Dpd Obligor');
        $objphpexcel->getActiveSheet()->setCellValue('O1','Flag Eligible');
        $objphpexcel->getActiveSheet()->setCellValue('P1','Nilai Penjualan Awal');
        $objphpexcel->getActiveSheet()->setCellValue('Q1','Flag Register');
        $objphpexcel->getActiveSheet()->setCellValue('R1','Periode Lelang');
        $objphpexcel->getActiveSheet()->setCellValue('S1','Aging Lelang');
        $objphpexcel->getActiveSheet()->setCellValue('T1','Hasil Lelang');
        $objphpexcel->getActiveSheet()->setCellValue('U1','Biaya Lelang');
        $objphpexcel->getActiveSheet()->setCellValue('V1','Pajak Lelang');
        $objphpexcel->getActiveSheet()->setCellValue('W1','Nilai Penjualan Akhir');
        $objphpexcel->getActiveSheet()->setCellValue('X1','Cut loss');
        $objphpexcel->getActiveSheet()->setCellValue('Y1','Tanggal Input Data Lelang');
       
        
        
        
        
       $baris=2;
        
        foreach ($data as $file){
            $objphpexcel->getActiveSheet()->setCellValue('A'.$baris,$file->cif);
            $objphpexcel->getActiveSheet()->setCellValue('B'.$baris,$file->nomor_rekening);
            $objphpexcel->getActiveSheet()->setCellValue('C'.$baris,$file->no_ld);
            $objphpexcel->getActiveSheet()->setCellValue('D'.$baris,$file->nama_debitur);
            $objphpexcel->getActiveSheet()->setCellValue('E'.$baris,$file->tipe_fasilitas);
            $objphpexcel->getActiveSheet()->setCellValue('F'.$baris,$file->keterangan_fasilitas);
            $objphpexcel->getActiveSheet()->setCellValue('G'.$baris,$file->nama_cabang);
            $objphpexcel->getActiveSheet()->setCellValue('H'.$baris,$file->plafond);
            $objphpexcel->getActiveSheet()->setCellValue('I'.$baris,$file->baki_debet);
            
            $objphpexcel->getActiveSheet()->setCellValue('J'.$baris,$file->angsuran);
            $objphpexcel->getActiveSheet()->setCellValue('K'.$baris,$file->dude_pokok);
            
            $objphpexcel->getActiveSheet()->setCellValue('L'.$baris,$file->dude_bunga);
            $objphpexcel->getActiveSheet()->setCellValue('M'.$baris,$file->denda);
            $objphpexcel->getActiveSheet()->setCellValue('N'.$baris,$file->dpd_obligor);
            $objphpexcel->getActiveSheet()->setCellValue('O'.$baris,$file->eligible);
            $objphpexcel->getActiveSheet()->setCellValue('P'.$baris,$file->nilai_penjualan_awal);
            $objphpexcel->getActiveSheet()->setCellValue('Q'.$baris,$file->register);
            
            $objphpexcel->getActiveSheet()->setCellValue('R'.$baris,$file->periode_lelang);
            $objphpexcel->getActiveSheet()->setCellValue('S'.$baris,$file->aging_lelang);
            $objphpexcel->getActiveSheet()->setCellValue('T'.$baris,$file->hasil_lelang);
            $objphpexcel->getActiveSheet()->setCellValue('U'.$baris,$file->biaya_lelang);
            $objphpexcel->getActiveSheet()->setCellValue('V'.$baris,$file->pajak_lelang);
            $objphpexcel->getActiveSheet()->setCellValue('W'.$baris,$file->nilai_penjualan_akhir);
            $objphpexcel->getActiveSheet()->setCellValue('X'.$baris,$file->cut_loss);
            $objphpexcel->getActiveSheet()->setCellValue('Y'.$baris,$file->tgl_lelang);
           
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
        text: 'silakan periksa kembali File Anda!!!',
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