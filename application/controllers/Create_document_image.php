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
                    //              
                    $result['imageview']=$this->Model_create_document->imageview();
                    // $result['stagespecial'] = $this->Content_model->get_special_stage();
                    //$result['datadamy'] = $this->Content_model->get_datadamy();
                    $result['content'] = 'view_document_image';
                    $this->load->view('bss_home', $result);
                }
            } else {
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
        //var_dump($nomor_nasabah,$restruktur_ke,$idnya);
            $codeimage=implode($imagecode);
            $filesCount = count($_FILES['myfile']['name']);
            for ($i=0; $i < $filesCount; $i++) { 
            $name=$_FILES['file']['name']= $_FILES['myfile']['name'][$i];
            $type=$_FILES['file']['type']= $_FILES['myfile']['type'][$i];
            $tmp_name=$_FILES['file']['tmp_name']=$_FILES['myfile']['tmp_name'][$i];
            $_FILES['file']['error'] = $_FILES['myfile']['error'][$i];
            $size=$_FILES['file']['size']= $_FILES['myfile']['size'][$i];
            
                $uploadPath = './uploads/';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'jpg|jpeg|png';
                
                // Load and initialize upload library
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
               
            if(!$this->upload->do_upload('file')){
                    // Uploaded file data
                     $error = array('error' => $this->upload->display_errors());
                        $this->gagalinsert();
                        redirect('image_v');
            } else {
                    $fileData = $this->upload->data();
                    $uploadData[$i]['code_image'] =$codeimage;
                    $uploadData[$i]['f_usercreate'] =$user;
                    $uploadData[$i]['name_file']=$name;
                    $uploadData[$i]['type_file']=$type;
                    $uploadData[$i]['file_content'] = $fileData['file_name'];
                    $uploadData[$i]['file_size']=$size;
                    //$uploadData[$i]['name_dokumen']=$name_dokumen;
                    $uploadData[$i]['f_datetimecreate'] =date('Y-m-d');
            }
            }
            if(!empty($uploadData)){
                $this->Model_create_document->insertimage($uploadData);
                $this->sucess_notif_insertimage();
                redirect('image_v');
            }
        } elseif(isset($_POST['delete'])) {
        
        $idnya= $this->input->post('idnya[]');
		if($idnya!=''){
        $this->Model_create_document->deleteimage($idnya);
		
        $this->sucess_notif_deleteimage();
        redirect('image_v');
			}else{
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
