<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Create_document_image extends CI_Controller {

    public function __construct(){

        parent::__construct();

        $this->db = $this->load->database('default', true);     
        $this->db2 = $this->load->database('second', true);
        
        // $this->load->library(array('PHPExcel', 'PHPExcel/IOFactory'));
        // $this->load->library('Pdfgenerator');
        
        $this->load->helper(array('url', 'form'));

        $this->load->library('session');

        $this->load->model('Menu_model', '', TRUE);

        $this->load->model('Content_model', '', TRUE);

        $this->load->model('Model_create_document', '', TRUE);

        $this->load->helper('captcha');

        $this->load->helper('file');



    }
    public function index()
    {
        if ($this->session->has_userdata('username')) {
        $idmenu = 'H04';
        $idmenu2 = 'D109';
        $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
                if ($result1 == '1') {
                    $result['data'] = $this->Menu_model->loadMenu();
                    $result['pagename'] = 'Data Image';
                    $ambilcif = $this->input->get('myCountry');
                    $namacif = $ambilcif;
                    $cifambil = explode("-", $namacif);
                    $cif = $cifambil['0'];
                    $userid = $this->session->userdata('username');
                    $result['foto']=$this->Model_create_document->imagedeatil();
                    //$result['imageview']=$this->Model_create_document->imageview();
                    $result['imageviewTabel']=$this->Model_create_document->imageviewtabel();
                    $result['content'] = 'view_document_image';
                    $this->load->view('bss_home', $result);
                }
        } 
        else
        {
            redirect('/');
        }
    }

    public function v_all_doc_image(){
        $result['data'] = $this->Menu_model->loadMenu();
        $result['pagename'] = 'Data Image';
        $result['content'] = 'view_all_doc_news';
        $result['all_doc_image'] = $this->Model_create_document->doc_all_image();
        $this->load->view('v_all_doc_image', $result);
    }

    public function insert_Imagedelete() {
        $namafolder=$this->input->post('namafolder');
        $namafolder = str_replace(' ', '', $namafolder);
        if($namafolder !="")
        {
            $cekFolder=$this->Model_create_document->cekfolder($namafolder);    
        
                if($cekFolder == null)
                {
                
                    $namafolder = str_replace( ':', '', $namafolder);
                    if (!is_dir('uploads/'.$namafolder)) {
                        mkdir('./uploads/' . $namafolder, 0777, TRUE);
                    }
                    if(isset($_POST['update'])) {
                            $data=array();
                            $idnya= $this->input->post('idnya[]');
                            $user=$this->session->has_userdata('username');
                            $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
                            $imagecode = array(); 
                            $alpha_length = strlen($alphabet) - 1; //fungsi untuk mencari dan menghitung jumlah string atau karakter
                            for ($i = 0; $i < 8; $i++) 
                            {
                                $n = rand(0, $alpha_length);//fungsi untuk mengacak jumlah string atau karakter
                                $imagecode[] = $alphabet[$n];
                            }
                            $maxlength = 5;
                            $chary = array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z",
                            "0", "1", "2", "3", "4", "5", "6", "7", "8", "9",
                            "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");
                            $return_str = "";
                            for ( $x=0; $x<=$maxlength; $x++ ) {
                            $return_str .= $chary[rand(0, count($chary)-1)];
                            }
                            $codeimage=implode($imagecode);
                            $filesCount = count($_FILES['myfile']['name']);
                            for ($i=0; $i < $filesCount; $i++) { 
                                $name=$_FILES['file']['name']= $_FILES['myfile']['name'][$i];
                                $type=$_FILES['file']['type']= $_FILES['myfile']['type'][$i];
                                $tmp_name=$_FILES['file']['tmp_name']=$_FILES['myfile']['tmp_name'][$i];
                                $_FILES['file']['error'] = $_FILES['myfile']['error'][$i];
                                $size=$_FILES['file']['size']= $_FILES['myfile']['size'][$i];
                                
                                $namakgtn1=$this->input->post('namakgtn');
                                $uploadPath = './uploads/'. $namafolder;
                                $config['upload_path'] = $uploadPath;
                                $config['allowed_types'] = 'jpg|jpeg|png';
                                
                                // Load and initialize upload library
                                $this->load->library('upload', $config);
                                $this->upload->initialize($config);
                            
                                if(!$this->upload->do_upload('file'))
                                {
                                        $error = array('error' => $this->upload->display_errors());
                                            $this->gagalinsert();
                                            redirect('image_v');
                                }
                                
                                else 
                                {
                                        
                                        $fileData = $this->upload->data();
                                        $uploadData[$i]['code_image'] =$codeimage;
                                        $uploadData[$i]['f_usercreate'] =$user;
                                        $uploadData[$i]['name_file']=$name;
                                        $uploadData[$i]['nameFolder']=$namafolder;
                                        $uploadData[$i]['idfolder']=$return_str;
                                        $uploadData[$i]['nama_Kegiatan']=$namakgtn1;
                                        $uploadData[$i]['type_file']=$type;
                                        $uploadData[$i]['file_content'] = $fileData['file_name'];
                                        $uploadData[$i]['file_size']=$size;

                                        $uploadData[$i]['f_datetimecreate'] =date('Y-m-d');

                                        $uploadData2[$i]['nameFolder']=$namafolder;
                                        $uploadData2[$i]['idfolder']=$return_str;
                                        $uploadData2[$i]['nama_Kegiatan']=$namakgtn1;
                                }
                                
                            }
                            if(!empty($uploadData)){
                                $this->Model_create_document->insertimage($uploadData,$uploadData2);
                                $this->sucess_notif_insertimage();
                                redirect('image_v');
                            }
                    }   
                    elseif(isset($_POST['delete'])) {
                    
                            $idnya= $this->input->post('idnya[]');
                            if($idnya!='')
                            {
                                $this->Model_create_document->deleteimage($idnya);
                                $this->sucess_notif_deleteimage();
                                redirect('image_v');
                            }
                            else
                            {
                                $this->gagaldeletefile();
                                redirect('image_v');
                            }
                    }
                }
                else
                {
                    $this->namafolder();
                    redirect('image_v');
                }
        }else{
            $this->inputkosong();
            redirect('image_v');
        }
                
        
    }

    public function detailsImageTabel($idfolder)
	{
       

        if ($this->session->has_userdata('username')) {
            $idmenu = 'H04';
            $idmenu2 = 'D109';
            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
                    if ($result1 == '1') {
                        $result['data'] = $this->Menu_model->loadMenu();
                        $result['pagename'] = 'Update Image';
                        
                        $userid = $this->session->userdata('username');
                        $countIdfolder =$this->Model_create_document->countIdFolder($idfolder);
                        $jum = $countIdfolder - 1;
                        $delete =$this->Model_create_document->deleteIdFolder($idfolder,$jum);
                        $result['imageview']=$this->Model_create_document->imageview($idfolder);
                        $result['fotoResult']=$this->Model_create_document->imagedeatilResult($idfolder);
                        $result['fotoRow']=$this->Model_create_document->imagedeatilRow($idfolder);
                        $result['content'] = 'ProfileImageDetails';
                        $this->load->view('bss_home', $result);
                    }
            } 
            else
            {
                redirect('/');
            }
	}

    public function update_Imagedelete() {
           
            
                if(isset($_POST['update'])) {
                        $data=array();
                        $idnya= $this->input->post('idnya[]');
                        $user=$this->session->has_userdata('username');
                        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
                        $imagecode = array(); 
                        $alpha_length = strlen($alphabet) - 1; //fungsi untuk mencari dan menghitung jumlah string atau karakter
                        for ($i = 0; $i < 8; $i++) 
                        {
                            $n = rand(0, $alpha_length);//fungsi untuk mengacak jumlah string atau karakter
                            $imagecode[] = $alphabet[$n];
                        }
                       
                        $codeimage=implode($imagecode);
                        $filesCount = count($_FILES['myfile']['name']);
                        for ($i=0; $i < $filesCount; $i++) { 
                            $name=$_FILES['file']['name']= $_FILES['myfile']['name'][$i];
                            $type=$_FILES['file']['type']= $_FILES['myfile']['type'][$i];
                            $tmp_name=$_FILES['file']['tmp_name']=$_FILES['myfile']['tmp_name'][$i];
                            $_FILES['file']['error'] = $_FILES['myfile']['error'][$i];
                            $size=$_FILES['file']['size']= $_FILES['myfile']['size'][$i];
                            $namafolder=$this->input->post('namafolder');
                            $idfolder=$this->input->post('idfolder');
                            $namakgtn=$this->input->post('namakgtn');
                            $uploadPath = './uploads/'. $namafolder;
                            $config['upload_path'] = $uploadPath;
                            $config['allowed_types'] = 'jpg|jpeg|png';
                            
                            // Load and initialize upload library
                            $this->load->library('upload', $config);
                            $this->upload->initialize($config);
                        
                            if(!$this->upload->do_upload('file'))
                            {
                                    $error = array('error' => $this->upload->display_errors());
                                        $this->gagalinsert();
                                        redirect('image_v');
                            }
                            
                            else 
                            {
                                    
                                    $fileData = $this->upload->data();
                                    $uploadData[$i]['code_image'] =$codeimage;
                                    $uploadData[$i]['f_usercreate'] =$user;
                                    $uploadData[$i]['name_file']=$name;
                                    $uploadData[$i]['nameFolder']=$namafolder;
                                    $uploadData[$i]['idfolder']=$idfolder;
                                    $uploadData[$i]['nama_Kegiatan']=$namakgtn;
                                    $uploadData[$i]['type_file']=$type;
                                    $uploadData[$i]['file_content'] = $fileData['file_name'];
                                    $uploadData[$i]['file_size']=$size;
                                    $uploadData[$i]['f_datetimecreate'] =date('Y-m-d');
                            }
                            
                        }
                        if(!empty($uploadData)){
                            $this->Model_create_document->updateimage($uploadData);
                            $this->sucess_notif_insertimage();
                            redirect('image_v');
                        }
                }   
                elseif(isset($_POST['delete'])) {
                
                        $idnya= $this->input->post('idnya[]');
                        if($idnya!='')
                        {
                            $this->Model_create_document->deleteimage($idnya);
                            $this->sucess_notif_deleteimage();
                            redirect('image_v');
                        }
                        else
                        {
                            $this->gagaldeletefile();
                            redirect('image_v');
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

    function gagalinsert() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Gagal! ',
        text: 'gagal create image,file harus format jpg,jpeg,dan png!!!',
        type: 'error'
        })</script>"
        );
    }

    function namafolder() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Gagal! ',
        text: 'gagal nama folder sudah ada,silahkan di tambahkan lewat view update gambar',
        type: 'error'
        })</script>"
        );
    }


    function inputkosong() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Gagal! ',
        text: 'inputan tidak boleh kosong',
        type: 'error'
        })</script>"
        );
    }

    function sucess_notif_insertimage() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Berhasil!',
        text: 'Berhasil insert image!!!',
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
        text: 'Berhasil delete image!!!',
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
