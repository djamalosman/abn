<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Create_document_tokoh extends CI_Controller {

    public function __construct(){

        parent::__construct();

        $this->db = $this->load->database('default', true);     
        $this->db2 = $this->load->database('second', true);
        
        //$this->load->library(array('PHPExcel', 'PHPExcel/IOFactory'));
        $this->load->library('Pdfgenerator');
        
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
        $idmenu = 'H05';
        $idmenu2 = 'D1011';
        $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
                if ($result1 == '1') {
                    $result['data'] = $this->Menu_model->loadMenu();
                    $result['pagename'] = 'Create Data Tokoh ABN';
                    $ambilcif = $this->input->get('myCountry');
                    $namacif = $ambilcif;
                    $cifambil = explode("-", $namacif);
                    $cif = $cifambil['0'];
                    $userid = $this->session->userdata('username');
                    $result['doc_tokoh'] = $this->Model_create_document->views_tokoh();
                    // $result['stagespecial'] = $this->Content_model->get_special_stage();
                    //$result['datadamy'] = $this->Content_model->get_datadamy();
                    $result['content'] = 'view_document_tokoh';
                    $this->load->view('bss_home', $result);
                }
            } else {
            redirect('/');
            }
    }
    public function v_all_doc_tokoh(){
        $result['data'] = $this->Menu_model->loadMenu();
        $result['pagename'] = 'Data Tokoh ABN';
        $result['content'] = 'view_all_doc_tokoh';
        $result['all_doc_tokoh'] = $this->Model_create_document->doc_all_tokoh();
        $this->load->view('v_all_doc_tokoh', $result);
    }
    public function view_create_doctokoh() {
        if ($this->session->has_userdata('username')) {
             
                    $result['data'] = $this->Menu_model->loadMenu();
                    $result['pagename'] = 'Create Data Tokoh ABN';
                    $result['content'] = 'v_create_doctokoh';
                    $this->load->view('bss_home', $result);
        }
    }
    public function create_doc_tokoh() {
        $newsdata = $this->input->post('summernote3');
        $jabatan = $this->input->post('jabatan');
        $nama_asli = $this->input->post('nama_asli');
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
                             $this->notif_formatfile_datanews();
                             redirect('create_document/index');
                 }
                 else{
                    
                         $fileData = $this->upload->data();
                         $uploadData[$i]['name_file']=$name;
                         $uploadData[$i]['type_file']=$type;
                         $uploadData[$i]['file_content'] = $fileData['file_name'];
                         $uploadData[$i]['file_size']=$size;
                         $uploadData[$i]['tanggal_insert'] =date('Y-m-d');
                         $uploadData[$i]['code_image']=$codeimage;
                         $uploadData[$i]['description']=$newsdata;
                         $uploadData[$i]['description_modif']=$newsdata;
                         $uploadData[$i]['jabatan']=$jabatan;
                         $uploadData[$i]['nama_asli']=$nama_asli;
                 }
     
             }
                 if (!empty($uploadData)) {
                    $this->Model_create_document->insert_data_tokoh($uploadData);
                     $this->sucess_notif_data_news();
                     redirect('tokoh');
                    print_r($uploadData);
                 }
             }
         }

         public function view_edit_tokoh($id){
            if ($this->session->has_userdata('username')) {
          
                $nama = $id;
                $ambil = explode("-", $nama);
                $codeimage = $ambil['0'];
                $id_agenda = $ambil['1'];
                $result['pagename'] = 'Edit Tokoh ABN';
                $result['v_datatokoh'] = $this->Model_create_document->ambildata_edit_tokoh($codeimage,$id_agenda);
                $result['data'] = $this->Menu_model->loadMenu();
                $result['content'] = 'v_edit_tokoh';
                $this->load->view('bss_home', $result); 
            }else{
                redirect('tokoh');
            }    
         }

         public function update_doctokoh() {
            $newsdata = $this->input->post('summernote3');
            $jabatan = $this->input->post('jabatan');
            $nama_asli = $this->input->post('nama_asli');
            $id_docagenda = $this->input->post('id_docagenda');
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
                                 $this->notif_formatfile_datanews();
                                 redirect('create_document/index');
                     }
                     else{
                        
                             $fileData = $this->upload->data();
                             $uploadData[$i]['name_file']=$name;
                             $uploadData[$i]['type_file']=$type;
                             $uploadData[$i]['file_content'] = $fileData['file_name'];
                             $uploadData[$i]['file_size']=$size;
                             $uploadData[$i]['tanggal_insert'] =date('Y-m-d');
                             $uploadData[$i]['code_image']=$codeimage;
                             $uploadData[$i]['description']=$newsdata;
                             $uploadData[$i]['description_modif']=$newsdata;
                             $uploadData[$i]['jabatan']=$jabatan;
                             $uploadData[$i]['nama_asli']=$nama_asli;
                             $uploadData[$i]['id_doctokoh']=$id_docagenda;
                     }
         
                 }
                     if (!empty($uploadData)) {
                        $this->Model_create_document->update_data_tokoh($uploadData,$id_docagenda);
                         $this->sucess_notif_data_news();
                         redirect('tokoh');
                        print_r($uploadData);
                     }
                 }
             }
             public function delete_tokoh($cif) {
                $selection = $this->input->post('idnya');
                            $namacif = $cif;
                            $cifambil = explode("-", $namacif);
                            $ambilcodeimage_agenda = $cifambil['0'];
                            $ambilid = $cifambil['1'];
               $true= $this->Model_create_document->delete_data_tokoh($ambilcodeimage_agenda,$ambilid);
                if($true ==1){
                $this->delete_notif();
            
                redirect('tokoh');
                }
            }
         function sucess_notif_data_news() {
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
         function notif_formatfile_datanews() {
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
        function delete_notif() {
            $this->session->set_flashdata("message", "<script>swal({
            position: 'top',
            title: 'Berhasil!',
            text: 'Di hapus!!!',
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
