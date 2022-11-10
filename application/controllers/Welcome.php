<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	// view content
	public function index()
	{
		$result['data'] = $this->Model_create_document->views_welcome();
     	$this->load->view('welcome',$result);
	}

	//Admin
	public function vdata(){
		if ($this->session->has_userdata('username')) {
            $idmenu = 'H04';
            $idmenu2 = 'D1012';
            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
            if ($result1 == '1') {
                $result['data'] = $this->Menu_model->loadMenu();
                $result['pagename'] = 'Data Welcome';
                $userid = $this->session->userdata('username');
                $result['welcome'] = $this->Model_create_document->views_welcome();
                $result['content'] = 'vwelcome';
                $this->load->view('abn_home', $result);
            }
        } else {
			redirect('/');
        }
	}

	public function vcrtwelcome() {
        if ($this->session->has_userdata('username')) {
             
                    $result['data'] = $this->Menu_model->loadMenu();
                    $result['pagename'] = 'Create Data Welcome';
                    $result['content'] = 'viewcrtwelcome';
                    $this->load->view('abn_home', $result);
        }
    }

	public function create_welcome() {
		$newsdata = $this->input->post('summernote3');
		$newsdata2 = $this->input->post('summernote33');
		//$judul = $this->input->post('judul');
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
				$newsdata = $this->input->post('summernote3');
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
						redirect('welcomeadmin');
			}
			else{
				
					$fileData = $this->upload->data();
					$uploadData[$i]['name_file']=$name;
					$uploadData[$i]['textslidesatu']=$newsdata;
					$uploadData[$i]['type_file']=$type;
					$uploadData[$i]['file_content'] = $fileData['file_name'];
					$uploadData[$i]['file_size']=$size;
					$uploadData[$i]['tanggal_insert'] =date('Y-m-d');
					$uploadData[$i]['code_image']=$codeimage;
					$uploadData[$i]['textslidedua']=$newsdata2;
			}

		}
			if (!empty($uploadData)) {
				$this->Model_create_document->insert_data_welcome($uploadData);
				$this->sucess_notif_data();
				redirect('welcomeadmin');
				print_r($uploadData);
			}
		}
 	}

	public function veditwelcome($id){
		if ($this->session->has_userdata('username')) {
	  
			$nama = $id;
			$ambil = explode("-", $nama);
			$codeimage = $ambil['0'];
			$id = $ambil['1'];
			$result['v_datawelcome'] = $this->Model_create_document->getdata_welcome($codeimage,$id);
			$result['data'] = $this->Menu_model->loadMenu();
			$result['content'] = 'veditwelcome';
			$this->load->view('abn_home', $result); 
		}else{
			redirect('news');
		}    
	}

	public function update_welcome() {
			$newsdata = $this->input->post('summernote3');
			$newsdata2 = $this->input->post('summernote33');
			//$judul = $this->input->post('judul');
			$id = $this->input->post('id_welcome');
			$code_image = $this->input->post('code_image');
			// var_dump($newsdata);
			// print_r($myfile);
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
					 $newsdata = $this->input->post('summernote3');
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
							 redirect('welcomeadmin');
				 }
				 else{
					
					$fileData = $this->upload->data();
					$uploadData[$i]['name_file']=$name;
					$uploadData[$i]['textslidesatu']=$newsdata;
					$uploadData[$i]['type_file']=$type;
					$uploadData[$i]['file_content'] = $fileData['file_name'];
					$uploadData[$i]['file_size']=$size;
					$uploadData[$i]['tanggal_insert'] =date('Y-m-d');
					$uploadData[$i]['code_image']=$codeimage;
					$uploadData[$i]['textslidedua']=$newsdata2;
					$uploadData[$i]['id_welcome']=$id;
				 }
	 
			 }
				 if (!empty($uploadData)) {
					$this->Model_create_document->update_datawelcome($uploadData,$id);
					 $this->sucess_notif_data();
					 redirect('welcomeadmin');
					print_r($uploadData);
				 }
			 }
	}

	function sucess_notif_data() {
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