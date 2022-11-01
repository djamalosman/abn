<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database('default', true);     
        $this->db2 = $this->load->database('second', true);
		$this->load->helper(array('form', 'url'));
		$this->load->model('Model_create_document', '', TRUE);
		$this->load->model('Menu_model', '', TRUE);
        $this->load->model('Content_model', '', TRUE);
        $this->load->helper('captcha');
        $this->load->helper('file');
	}
	public function index()
	{
		$field=$this->db2->list_fields('document_news');
				$id_news=$field[0];
	 			$result['v_news'] = $this->Model_create_document->get_berita($id_news);
                 $field=$this->db2->list_fields('document_video');
                 $id_video=$field[0];
                 $result['video'] = $this->Model_create_document->viewsvideo($id_video);
                 $field=$this->db2->list_fields('document_image');
                 $id_image=$field[0];
                 $result['v_image'] = $this->Model_create_document->views_image_bankfoto($id_image);
                 $result['map'] = $this->Model_create_document->getmapdata();
		$result['foto'] = $this->Model_create_document->views_beranda();
     $this->load->view('beranda',$result);
	}

	//Admin
	public function homevdata(){
		if ($this->session->has_userdata('username')) {
            $idmenu = 'H04';
            $idmenu2 = 'D1013';
            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
            if ($result1 == '1') {
                $result['data'] = $this->Menu_model->loadMenu();
                $result['pagename'] = 'Data Beranda';
                $userid = $this->session->userdata('username');
				
                $result['foto'] = $this->Model_create_document->views_beranda();
				$result['imageview']=$this->Model_create_document->imageviewberanda();
                $result['content'] = 'vberanda';
                $this->load->view('abn_home', $result);
            }
        } else {
			redirect('/');
        }
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
                        redirect('homeadmin');
            } else {
                    $fileData = $this->upload->data();
                    $uploadData[$i]['code_image'] =$codeimage;
                    $uploadData[$i]['name_file']=$name;
                    $uploadData[$i]['type_file']=$type;
                    $uploadData[$i]['file_content'] = $fileData['file_name'];
                    $uploadData[$i]['file_size']=$size;
                    $uploadData[$i]['tanggal_insert'] =date('Y-m-d');
            }
            }
            if(!empty($uploadData)){
                $this->Model_create_document->insertimageberanda($uploadData);
                $this->sucess_notif_insertimage();
                redirect('homeadmin');
            }
        } elseif(isset($_POST['delete'])) {
        
        $idnya= $this->input->post('idnya[]');
		if($idnya!=''){
        $this->Model_create_document->deleteimageberanda($idnya);
		
        $this->sucess_notif_deleteimage();
        redirect('homeadmin');
			}else{
				$this->gagaldeletefile();
				redirect('homeadmin');
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