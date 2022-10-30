<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once   APPPATH.('PHPExcel/PHPExcelMRPK/Classes/PHPExcelAyda.php');
require_once   APPPATH. ('PHPExcel/PHPExcelMRPK/Classes/PHPExcel/Writer/Excel2007.php');

class Ayda extends CI_Controller {



     public function __construct(){

        parent::__construct();

        $this->db = $this->load->database('default', true);     
		$this->db2 = $this->load->database('second', true);

        //$this->load->library(array('PHPExcel','PHPExcel/IOFactory'));

        /*CONNECT 2 DATABASE*/

  //          if($_SERVER['SERVER_NAME'] == 'localhost'){
  //          $dsn1 = 'mysqli://root:@localhost/dbmgmtmenu';
  //          $this->db = $this->load->database($dsn1, true);     
  //
  //          $dsn2 = 'mysqli://root:@localhost/dbbsscollection';
  //          $this->db2= $this->load->database($dsn2, true);         
  //      }else{
  //          $dsn1 = 'mysqli://xplmjdmx_C24sys:4N4G4T49876@localhost/xplmjdmx_dbmgmtmenu';
  //          $this->db = $this->load->database($dsn1, true);     
  //
  //          $dsn2 = 'mysqli://xplmjdmx_C24sys:4N4G4T49876@localhost/xplmjdmx_dbbsscollection';
  //          $this->db2= $this->load->database($dsn2, true);
  //      }

        /*CONNECT 2 DATABASE*/

        

        $this->load->helper(array('url', 'form'));

        $this->load->library('session');

        $this->load->model('Menu_model', '', TRUE);

        $this->load->model('Content_model', '', TRUE);

         $this->load->model('ModelAyda', '', TRUE);

        $this->load->helper('captcha');



    }

    public function index()

    {
        if ($this->session->has_userdata('username')) {
            $idmenu = 'H12';
            $idmenu2 = 'D043';
            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
            if ($result1 == '1') {
                $result['data'] = $this->Menu_model->loadMenu();
                $result['pagename'] = 'AYDA';
                  $this->session->set_userdata('paramfile',null);
                  $this->session->set_userdata('paramayda',null);
                 $this->session->set_userdata('redirectvalueform',NULL);
                  $result['viewayda'] = $this->ModelAyda->get_ayda();
                  
                $result['content'] = 'view_ayda';
              
                $this->load->view('bss_home', $result);
            }
        } 
        else {
            redirect('/');
        }

    }
    
    public function viewimagesession_param($value) {
        $this->session->set_userdata('paramfile',$value);
        redirect('ayda/viewfile_ayda');
        
    }
    
    public function viewfile_ayda(){ 
        
         if ($this->session->has_userdata('username')) {

            $idmenu = 'H12';

            $idmenu2 = 'D043';

            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);

            if ($result1 == '1') {
                
                if (empty($this->session->userdata('paramfile'))){
            redirect('restru/index');
                    }
                $value = $this->session->userdata('paramfile');
                
                $result['data'] = $this->Menu_model->loadMenu();
                $result['pagename'] = 'Detail file';

                $result['foto']=$this->ModelAyda->imageview_ayda($value); 
					
				  $result['dataimage']=$this->ModelAyda->viewfile_aydaimage($value); 
          
                $result['content'] = 'detail_fileayda';

                $this->load->view('bss_home', $result);            

            }

        } 
    }

    public function delete_aydaudpate()
    {
        $selection = $this->input->post('idnya');
        // $cifid = $selection;
        // $cif = explode("-", $cifid);
        // $cif1 = $cif['0'];
        // $id1 = $cif['1'];
       //ar_dump($selection);
        if ($selection == '') {
            $this->notif_delete_data();
            redirect('ayda/index');
        }
        $this->ModelAyda->deleteupdate_ayda($selection);

       $this->sucess_notif_delete();

        redirect('ayda/index');
    }

    
    public function paramsession($value) {
        $this->session->set_userdata('paramayda',$value);
        redirect('ayda/view_aydadetail');
    }
    public function updatemodal_ayda() {
       
        $codein=$this->input->post('codein');
        
        $data=array(
            'f_ltcr'   =>$LTCR1=$this->input->post('LTCR1'),
            'f_tglayda'=>$DibukukanTglAYDA=$this->input->post('DibukukanTglAYDA'),
            'f_thnayda'=>$TahunAYDA=$this->input->post('TahunAYDA'),
            'f_mobayda'=>$MOBAYDA=$this->input->post('MOBAYDA'),
            'f_rangemob'=>$RangeMOB=$this->input->post('RangeMOB'),
            'f_tgllpjawalayda'   =>$TglLPJAwalAYDA=$this->input->post('TglLPJAwalAYDA'),
            'f_mv_b'=>$MV=$this->input->post('MV'),
            'f_lv'=>$LV=$this->input->post('LV'),
            'f_mvtwo'=>$MV2=$this->input->post('MV2'),
            'f_lvtwo'=>$LV2=$this->input->post('LV2'),
            'tlgllpjlbh_satuthn'=>$TglLPJAYDA1=$this->input->post('TglLPJAYDA1'),
            'f_mvthree'=>$MV3=$this->input->post('MV3'),
            'f_lvthree'=>$LV3=$this->input->post('LV3'),
            'f_jenisasset'=>$JenisAsset=$this->input->post('JenisAsset'),
            'alamat_jaminan '=>$AlamatJaminan=$this->input->post('AlamatJaminan'),
            'lt_lb'=>$LT_LB=$this->input->post('LT_LB'),
            'os_awal'=>$OSAwal=$this->input->post('OSAwal'),
            'hpustgih_ayda'=>$HapusTagihAwalAYDA=$this->input->post('HapusTagihAwalAYDA'),
            'nilai_awal_ayda'=>$NilaiAwalAYDA=$this->input->post('NilaiAwalAYDA'),
            'penjualan_ayda'=>$PenjualanAYDA=$this->input->post('PenjualanAYDA'),
            'neet_penjualan'=>$NettPenjualan=$this->input->post('NettPenjualan'),
            'tglpenjualan_ayda'=>$TanggalPenjualanAYDA=$this->input->post('TanggalPenjualanAYDA'),
            'ckpn' =>$CKPN=$this->input->post('CKPN'), 
        );
        $this->ModelAyda->ayda_updatemodal($codein,$data);
        $this->sucess_notif_update_modalayda();
        redirect('ayda/index');
        
        
    
}
    public function view_aydadetail() {
        $result['data'] = $this->Menu_model->loadMenu();
        $result['pagename'] = 'Update AYDA';
         if (empty($this->session->userdata('paramayda'))){
            redirect('ayda/index');
        }
        $value = $this->session->userdata('paramayda');
        $result['table_ayda_a'] = $this->ModelAyda->aydaview_detail($value);
        $result['rowayda'] =$this->ModelAyda->rowDataNasabah($value);
        $result['viewaydaimage'] =$this->ModelAyda->resultviewimage($value);
        $result['content'] = 'view_detailayda';
        $this->load->view('bss_home', $result);
    }
    public function create_ayda() {
        if ($this->session->has_userdata('username')) {
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'AYDA';
            $result['content'] = 'create_ayda';
            $this->load->view('bss_home', $result);
        } else {
            redirect('/');
        }
    }
    public function insert_ayda() {
        if ($this->session->has_userdata('username')) {
            $a = $this->input->post('nama');
            $b = $this->input->post('cif');
            $c = $this->input->post('plafondAwal');
            $d = $this->input->post('mv');
            $e = $this->input->post('ltcr');
            $f = $this->input->post('dibukukantglayda');
            $g = $this->input->post('thnayda');
            $h = $this->input->post('mobayda');
            $i = $this->input->post('rangemob');
            $j = $this->input->post('cabang');
            $k = $this->input->post('tgllpjawalayda');
            $l = $this->input->post('mv2');
            $m = $this->input->post('lv2');
            $n = $this->input->post('tgllpjaydalbhsetahun');
            $o = $this->input->post('mv3');
            $p = $this->input->post('lv3');
            $q = $this->input->post('tgllpjaydalbhduatahun');
            $r = $this->input->post('mv4');
            $s = $this->input->post('lv4');
            $t = $this->input->post('jenisasset');
            $u = $this->input->post('alamatjaminan');
            $v = $this->input->post('ltlb');
            $w = $this->input->post('osawal');
            $x = $this->input->post('hpstgihawalayda');
            $y = $this->input->post('nilaiawalayda');
            $yy = $this->input->post('biaya');
            $z = $this->input->post('penjualanayda');
            $bb = $this->input->post('nettpenjualan');
            $cc = $this->input->post('tgllpenjualanayda');
            $dd = $this->input->post('ckpn');

            $this->ModelAyda->ayda_insert($a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $l, $m, $n, $o, $p, $q, $r, $s, $t, $u, $v, $w, $x, $y, $yy, $z, $bb, $cc, $dd);
            redirect('ayda/index');
            // var_dump($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$o,$p,$q,$r,$s,$t,$u,$v,$w,$x,$y,$z,$bb,$cc,$dd);
        }
    }
    public function insert_ayda_activity() {
        if ($this->session->has_userdata('username')) {
          $data=array();
      
          $alphabet1 = 'abcdefghijklmnopqrstuvwxyz1234567890';
          $code1 = array(); 
          $alpha_length1 = strlen($alphabet1) - 1; //fungsi untuk mencari dan menghitung jumlah string atau karakter
          for ($i = 0; $i < 8; $i++) 
          {
              $n = rand(0, $alpha_length1);//fungsi untuk mengacak jumlah string atau karakter
              $code1[] = $alphabet1[$n];
          }
            $codein=implode($code1);
            
            $a = $this->input->post('nama');
            $b = $this->input->post('cif');
            $c = $this->input->post('plafondAwal');
           
            
            $f = $this->input->post('dibukukantglayda');
            $g = $this->input->post('thnayda');
            $h = $this->input->post('mobayda');
            $ii = $this->input->post('rangemob');
            $j = $this->input->post('cabang');
            $k = $this->input->post('tgllpjawalayda');
            $l = $this->input->post('mv2');
            $m = $this->input->post('lv2');
            $n = $this->input->post('tgllpjaydalbhsetahun');
            $o = $this->input->post('mv3');
            $p = $this->input->post('lv3');
            $q = $this->input->post('tgllpjaydalbhduatahun');
            $r = $this->input->post('mv4');
            $s = $this->input->post('lv4');
            $t = $this->input->post('jenisasset');
            $u = $this->input->post('alamatjaminan');
            $v = $this->input->post('ltlb');
            $w = $this->input->post('osawal');
            $x = $this->input->post('hpstgihawalayda');
            $y = $this->input->post('nilaiawalayda');
           // $yy = $this->input->post('biaya');
            $z = $this->input->post('penjualanayda');
            $bb = $this->input->post('nettpenjualan');
            $cc = $this->input->post('tgllpenjualanayda');
            $dd = $this->input->post('ckpn');
            $keterangan=$this->input->post('keterangan');
            $ltcr = $this->input->post('ltcr');
            
            $redirectform=array(
            'ltcr' => $this->input->post('ltcr'),
            'dibukukantglayda' => $this->input->post('dibukukantglayda'),
            'thnayda' => $this->input->post('thnayda'),
            'mobayda' => $this->input->post('mobayda'),
            'rangemob' =>$this->input->post('rangemob'),
            'cabang' => $this->input->post('cabang'),
            'tgllpjawalayda' => $this->input->post('tgllpjawalayda'),
            'mv2' => $this->input->post('mv2'),
            'lv2' => $this->input->post('lv2'),
            'tgllpjaydalbhsetahun' => $this->input->post('tgllpjaydalbhsetahun'),
            'mv3' => $this->input->post('mv3'),
            'lv3' => $this->input->post('lv3'),
            'tgllpjaydalbhduatahun' => $this->input->post('tgllpjaydalbhduatahun'),
            'mv4' => $this->input->post('mv4'),
            'lv4' => $this->input->post('lv4'),
            'jenisasset' => $this->input->post('jenisasset'),
            'alamatjaminan' => $this->input->post('alamatjaminan'),
            'ltlb' => $this->input->post('ltlb'),
            'osawal' => $this->input->post('osawal'),
            'hpstgihawalayda' => $this->input->post('hpstgihawalayda'),
            'nilaiawalayda' => $this->input->post('nilaiawalayda'),
//            'biaya' => $this->input->post('biaya'),
            'penjualanayda' => $this->input->post('penjualanayda'),
            'nettpenjualan' => $this->input->post('nettpenjualan'),
            'tgllpenjualanayda' => $this->input->post('tgllpenjualanayda'),
            'ckpn' => $this->input->post('ckpn'),
            'keterangan' => $this->input->post('keterangan')    
            );
            $this->session->set_userdata('redirectvalueform',$redirectform);
            
            
            
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
                        $this->notif_formatfile();
                       redirect($_SERVER['HTTP_REFERER']);
            }
            else
            {
                $fileData = $this->upload->data();
                    $uploadData[$i]['code'] =$b;
                    $uploadData[$i]['cif'] =$b;
                    $uploadData[$i]['name_file']=$name;
                    $uploadData[$i]['type_file']=$type;
                    $uploadData[$i]['file_content'] = $fileData['file_name'];
                    $uploadData[$i]['file_size']=$size;
                    $uploadData[$i]['tanggal_insert'] =date('Y-m-d');
                    $uploadData[$i]['code_in']=$codein;
                    
            $Dataupload['code_in']=$codein;
            $Dataupload['f_custname']=$a;
            $Dataupload['f_cif']=$b;
            $Dataupload['f_plafondawal']=$c;
           
            $Dataupload['f_ltcr']=$ltcr;
            $Dataupload['f_tglayda']=$f;
            $Dataupload['f_thnayda']=$g;
            $Dataupload['f_mobayda']=$h;
            $Dataupload['f_rangemob']=$ii;
            $Dataupload['f_branch']=$j;
            $Dataupload['f_tgllpjawalayda']=$k;
            $Dataupload['f_mv_b']=$l;
            $Dataupload['f_lv']=$m;
            $Dataupload['tlgllpjlbh_satuthn']=$n;
            $Dataupload['f_mvtwo']=$o;
            $Dataupload['f_lvtwo']=$p;
            $Dataupload['tlgllpjlbh_duathn']=$q;
            $Dataupload['f_mvthree']=$r;
            $Dataupload['f_lvthree']=$s;
            
            $Dataupload['f_jenisasset']=$t;
           $Dataupload['alamat_jaminan']=$u;
           $Dataupload['lt_lb']=$v;
           $Dataupload['os_awal']=$w;
           $Dataupload['hpustgih_ayda']=$x;
           $Dataupload['nilai_awal_ayda']=$y;
//            $Dataupload['biaya']=$yy;

            $Dataupload['penjualan_ayda']=$z;
            $Dataupload['neet_penjualan']=$bb;
            $Dataupload['tglpenjualan_ayda']=$cc;
            $Dataupload['ckpn']=$dd;
            $Dataupload['tgl_create_ayda']=date("Y-m-d");
//                       
           
        
            }
        
    }
     if(!empty($uploadData)){
                // Insert files data into the database
                $insert = $this->ModelAyda->ayda_insert_edit($uploadData,$Dataupload);
                $this->sucess_notif_create_Ayda();
                redirect('Ayda/index');
                
               
                }

  }
}

public function delete_ayda() {
    $selection = $this->input->post('idnya');
    if ($selection != '' or $selection != null) {
        //$this->delete_notif();
        $this->ModelAyda->deletemodel_ayda($selection);
        redirect('ayda/index');
        //$this->Model_log->logactivity($this->session->userdata('username'), "Sucess Delete : " . json_encode($selection));
    } else {
       // $this->Model_log->logactivity($this->session->userdata('username'), "Gagal Delete : " . json_encode($selection));
        $this->faileddelete_notif();
    }
    redirect('ayda/index');
}
   
    public function updateImagedelete() {
        
        if(isset($_POST['update'])) {
            $data=array();
        $nomor_nasabah= $this->input->post('nomor_nasabah');
        $codein= $this->input->post('codein');
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
                        $this->notif_formatfile();
                        redirect('ayda/viewfile_ayda');
            } else {
                    $fileData = $this->upload->data();
                    $uploadData[$i]['code_in'] =$codein;
                    
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
                $this->ModelAyda->updateimage($uploadData);
                $this->sucess_notif_updateimage();
                redirect('ayda/index');
            }
        } elseif(isset($_POST['delete'])) {
        $codein= $this->input->post('codein');
        $nomor_nasabah= $this->input->post('nomor_nasabah');
        $idnya1= $this->input->post('idnya[]');
		//var_dump($idnya1);
		$null=NULL;
			if($idnya1==$null){
				 $this->gagaldeletefile();
				  redirect('ayda/viewfile_ayda');
			}else{
		
        $this->ModelAyda->deleteimage($codein,$idnya1);
	    $this->sucess_notif_deleteimage();
        redirect('ayda/viewfile_ayda');
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

    public function detail_ayda($a)
    {
        if ($this->session->has_userdata('username')) {
            $idmenu = 'H12';
            $idmenu2 = 'D043';
            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
            if ($result1 == '1') {
                $result['data'] = $this->Menu_model->loadMenu();
                $result['pagename'] = 'AYDA';
                $result['content'] = 'detail_ayda';
                $result['detailayda'] = $this->ModelAyda->aydadetail($a);
                $result['foto'] = $this->ModelAyda->fotoaydadetail($a);
                $this->load->view('bss_home', $result);
            }
        } else {
            redirect('/');
        }
    }
    
   public function  excel_ayda(){
         $data= $this->ModelAyda->get_excelAyda();
         
         $phpexcel=new PHPExcel();
         
        $phpexcel->getProperties()->setCreator("BSS");
        $phpexcel->getProperties()->setLastModifiedBy("BSS");
        $phpexcel->getProperties()->setTitle("Data AYDA");
        $phpexcel->getProperties()->setSubject("");
        $phpexcel->getProperties()->setDescription("");
        
        $phpexcel->setActiveSheetIndex(0);
        
        $phpexcel->getActiveSheet()->setCellValue('A1','Nama Debitur');
        $phpexcel->getActiveSheet()->setCellValue('B1','CIF');
        $phpexcel->getActiveSheet()->setCellValue('C1','Plafond Awal');
        $phpexcel->getActiveSheet()->setCellValue('D1','Dibukukan AYDA TGL');
        $phpexcel->getActiveSheet()->setCellValue('E1','Tahun AYDA');
        $phpexcel->getActiveSheet()->setCellValue('F1','MOB AYDA');
        $phpexcel->getActiveSheet()->setCellValue('G1','Range MOB');
        $phpexcel->getActiveSheet()->setCellValue('H1','Cabang');
        $phpexcel->getActiveSheet()->setCellValue('I1','Tgl LPJ Awal AYDA');
        
        $phpexcel->getActiveSheet()->setCellValue('J1','MV');
        $phpexcel->getActiveSheet()->setCellValue('K1','LV');
        $phpexcel->getActiveSheet()->setCellValue('L1','Tgl LPJ AYDA 1≥ Th');
        $phpexcel->getActiveSheet()->setCellValue('M1','MV2');
        $phpexcel->getActiveSheet()->setCellValue('N1','LV2');
        $phpexcel->getActiveSheet()->setCellValue('O1','Tgl LPJ AYDA 2≥ Th');
        $phpexcel->getActiveSheet()->setCellValue('P1','MV3');
        $phpexcel->getActiveSheet()->setCellValue('Q1','LV3');
        $phpexcel->getActiveSheet()->setCellValue('R1','Jenis Asset');
        $phpexcel->getActiveSheet()->setCellValue('S1','Alamat Jaminan');
        $phpexcel->getActiveSheet()->setCellValue('T1','LT/LB');
        
        $phpexcel->getActiveSheet()->setCellValue('U1','OS Awal');
        $phpexcel->getActiveSheet()->setCellValue('V1','Hapus Tagih Awal AYDA');
        $phpexcel->getActiveSheet()->setCellValue('W1','Nilai Awal AYDA');
        $phpexcel->getActiveSheet()->setCellValue('X1','Penjualan AYDA');
        $phpexcel->getActiveSheet()->setCellValue('Y1','Nett Penjualan');
        
        $phpexcel->getActiveSheet()->setCellValue('Z1','Tanggal Penjualan AYDA');
        $phpexcel->getActiveSheet()->setCellValue('AA1','Tanggal Create AYDA');
       
       
        
        
        
        
       $baris=2;
        
        foreach ($data as $file){
            $phpexcel->getActiveSheet()->setCellValue('A'.$baris,$file->f_custname);
            $phpexcel->getActiveSheet()->setCellValue('B'.$baris,$file->f_cif);
            $phpexcel->getActiveSheet()->setCellValue('C'.$baris,$file->f_plafondawal);
            $phpexcel->getActiveSheet()->setCellValue('D'.$baris,$file->f_tglayda);
            $phpexcel->getActiveSheet()->setCellValue('E'.$baris,$file->f_thnayda);
            $phpexcel->getActiveSheet()->setCellValue('F'.$baris,$file->f_mobayda);
            $phpexcel->getActiveSheet()->setCellValue('G'.$baris,$file->f_rangemob);
            $phpexcel->getActiveSheet()->setCellValue('H'.$baris,$file->f_branch);
            $phpexcel->getActiveSheet()->setCellValue('I'.$baris,$file->f_tgllpjawalayda);
            
            $phpexcel->getActiveSheet()->setCellValue('J'.$baris,$file->f_mv_b);
            $phpexcel->getActiveSheet()->setCellValue('K'.$baris,$file->f_lv);
            $phpexcel->getActiveSheet()->setCellValue('L'.$baris,$file->tlgllpjlbh_satuthn);
            $phpexcel->getActiveSheet()->setCellValue('M'.$baris,$file->f_mvtwo);
            $phpexcel->getActiveSheet()->setCellValue('N'.$baris,$file->f_lvtwo);
            $phpexcel->getActiveSheet()->setCellValue('O'.$baris,$file->tlgllpjlbh_duathn);
            $phpexcel->getActiveSheet()->setCellValue('P'.$baris,$file->f_mvthree);
            $phpexcel->getActiveSheet()->setCellValue('Q'.$baris,$file->f_lvthree);
            $phpexcel->getActiveSheet()->setCellValue('R'.$baris,$file->f_jenisasset);
            $phpexcel->getActiveSheet()->setCellValue('S'.$baris,$file->alamat_jaminan);
            $phpexcel->getActiveSheet()->setCellValue('T'.$baris,$file->lt_lb);
            
            $phpexcel->getActiveSheet()->setCellValue('U'.$baris,$file->os_awal);
            $phpexcel->getActiveSheet()->setCellValue('V'.$baris,$file->hpustgih_ayda);
            $phpexcel->getActiveSheet()->setCellValue('W'.$baris,$file->nilai_awal_ayda);
            $phpexcel->getActiveSheet()->setCellValue('X'.$baris,$file->penjualan_ayda);
            $phpexcel->getActiveSheet()->setCellValue('Y'.$baris,$file->neet_penjualan);
            $phpexcel->getActiveSheet()->setCellValue('Z'.$baris,$file->tglpenjualan_ayda);
            $phpexcel->getActiveSheet()->setCellValue('AA'.$baris,$file->tgl_create_ayda);
           
           
            $baris++;
        }
        $filename="Data AYDA-".date("d-m-Y").'.xlsx';
        $phpexcel->getActiveSheet()->setTitle("Data AYDA");
        header('Content-Type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition:attachment;filename="'.$filename.'"');
        header('Cache-control:max-age=0');
        
        $writer= PHPExcel_IOFactory::createWriter($phpexcel,'Excel2007');
        //print_r($file);
         $writer->save('php://output');
               exit;
    }
            
    
function sucess_notif_deleteimage() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Berhasil!',
        text: 'Berhasil Delete File AYDA!!!',
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
        text: 'Berhasil  Data file AYDA!!!',
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
    function success_update_ayda() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Berhasil!',
        text: 'Berhasil Update Data AYDA!!!',
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
    function sucess_notif_create_ayda() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Berhasil!',
        text: 'Berhasil Create Data AYDA!!!',
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
  function notif_formatfile() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Gagal! ',
        text: 'coba periksa kembali inputan  file anda!!!',
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
    function sucess_notif_update_modalayda() {
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
    function sucess_notif_delete() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Berhasil!',
        text: 'Berhasil Delete Data Ayda!!!',
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

}
