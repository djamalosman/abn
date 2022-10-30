<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Create_document_video extends CI_Controller {

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
        $idmenu = 'H04';
        $idmenu2 = 'D1010';
        $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
                if ($result1 == '1') {
                    $result['data'] = $this->Menu_model->loadMenu();
                    $result['pagename'] = 'Data Image';
                    $ambilcif = $this->input->get('myCountry');
                    $namacif = $ambilcif;
                    $cifambil = explode("-", $namacif);
                    $cif = $cifambil['0'];
                    $userid = $this->session->userdata('username');
                    $result['video']=$this->Model_create_document->videodeatil();
                    //              
                    $result['imageview']=$this->Model_create_document->videoview();
                    // $result['stagespecial'] = $this->Content_model->get_special_stage();
                    //$result['datadamy'] = $this->Content_model->get_datadamy();
                    $result['content'] = 'view_document_video';
                    $this->load->view('bss_home', $result);
                }
            } else {
            redirect('/');
            }
    }
    public function update_video(){
        $idnya= $this->input->post('id_video');
        $judul= $this->input->post('judul');
        $link_video= $this->input->post('link_video');

       $update= $this->Model_create_document->update_video($idnya,$judul,$link_video);
       $this->sucess_updtaeimage();
       redirect('video_v');
    }
    public function v_all_doc_video(){
        $result['data'] = $this->Menu_model->loadMenu();
        $result['pagename'] = 'Data Video';
        $result['content'] = 'view_all_doc_news';
        $result['all_doc_video'] = $this->Model_create_document->doc_all_video();
        $this->load->view('v_all_doc_video', $result);
    }
    public function insert_videodelete() {
        
        if(isset($_POST['update'])) {
            $data=array();
        $idnya= $this->input->post('idnya[]');
        $judul= $this->input->post('judul');
        $link_video= $this->input->post('link_video');
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
            $codeivideo=implode($imagecode);
           
                $this->Model_create_document->insertvideo($judul,$link_video,$user,$codeivideo,$codeivideo);
                $this->sucess_notif_insertimage();
                redirect('video_v');
            
        } elseif(isset($_POST['delete'])) {
        
        $idnya= $this->input->post('idnya[]');
		if($idnya!=''){
        $this->Model_create_document->deleteivideo($idnya);
		
        $this->sucess_notif_deleteimage();
        redirect('video_v');
			}else{
				$this->gagaldeletefile();
				redirect('video_v');
			}
        }
        
    }

    function sucess_updtaeimage() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Berhasil!',
        text: 'Berhasil update image!!!',
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
