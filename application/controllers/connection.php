<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Connection extends CI_Controller {



     public function __construct(){

        parent::__construct();

        

        $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));

        /*CONNECT 2 DATABASE*/
		
		$this->db = $this->load->database('default', true);
		$this->db2 = $this->load->database('second', true);


          /* if($_SERVER['SERVER_NAME'] == 'anagata.co.id'){
             $dsn1 = 'mysqli://xplmjdmx_C24sys:4N4G4T49876@localhost/xplmjdmx_dbmgmtmenu';
             $this->db = $this->load->database($dsn1, true);     
             $dsn2 = 'mysqli://xplmjdmx_C24sys:4N4G4T49876@localhost/xplmjdmx_dbbsscollection';
             $this->db2= $this->load->database($dsn2, true);
         } else {  
			 $dsn1 = 'mysqli://root:@localhost/dbmgmtmenu';
             $this->db = $this->load->database($dsn1, true);     
             $dsn2 = 'mysqli://root:@localhost/dbbsscollection';
             $this->db2= $this->load->database($dsn2, true);         
		 }
 */

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
          
                $result['content'] = 'detail_fileayda';

                $this->load->view('bss_home', $result);            

            }

        } 
    }


    public function paramsession($value) {
        $this->session->set_userdata('paramayda',$value);
        redirect('ayda/view_aydadetail');
    }
    
    public function view_aydadetail() {
        $result['data'] = $this->Menu_model->loadMenu();
        $result['pagename'] = 'Update Restrukturisasi';
         if (empty($this->session->userdata('paramayda'))){
            redirect('ayda/index');
        }
        $value = $this->session->userdata('paramayda');
        $result['table_ayda_a'] = $this->ModelAyda->aydaview_detail($value);
         $result['rowayda'] =$this->ModelAyda->rowDataNasabah($value);
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
    public function insert_ayda_activity() {
        if ($this->session->has_userdata('username')) {
          $data=array();
            $a = $this->input->post('nama');
            $b = $this->input->post('cif');
            $c = $this->input->post('plafondAwal');
            $d = $this->input->post('mv');
            $e = $this->input->post('ltcr');
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
                    

            $Dataupload['f_custname']=$a;
            $Dataupload['f_cif']=$b;
            $Dataupload['f_plafondawal']=$c;
            $Dataupload['f_mv_a']=$d;
            $Dataupload['f_ltcr']=$e;
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
 //           $Dataupload['alamat_jaminan']=$u;
//            $Dataupload['lt_lb']=$v;
//            $Dataupload['os_awal']=$w;
//            $Dataupload['hpustgih_ayda']=$x;
//            $Dataupload['nilai_awal_ayda']=$y;
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
                $insert = $this->ModelAyda->ayda_insert($uploadData,$Dataupload);
                $this->sucess_notif_create_Ayda();
                redirect('Ayda/index');
                
               
                }

  }
}
   
    public function updateImagedelete() {
        
        if(isset($_POST['update'])) {
            $data=array();
        $nomor_nasabah= $this->input->post('nomor_nasabah');
        
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
                     $uploadData[$i]['code'] =$nomor_nasabah;
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
        $nomor_nasabah= $this->input->post('nomor_nasabah');
        $idnya= $this->input->post('idnya[]');
        $this->ModelAyda->deleteimage($nomor_nasabah,$idnya);
        $this->sucess_notif_deleteimage();
        redirect('ayda/viewfile_ayda');
        }
        
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
        text: 'Format file salah silakan periksa kembali!!!',
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
