<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

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
	 			$result['berita'] = $this->Model_create_document->get_berita($id_news);
                 $field=$this->db2->list_fields('document_video');
                 $id_video=$field[0];
                 $result['video'] = $this->Model_create_document->viewsvideo($id_video);
                 $field=$this->db2->list_fields('document_image');
                 $id_image=$field[0];
                 $result['v_image'] = $this->Model_create_document->views_image_bankfoto($id_image);
                 $result['map'] = $this->Model_create_document->getmapdata();
		$result['foto'] = $this->Model_create_document->views_beranda();
     	$this->load->view('news',$result);
    
	}
	public function DetailNews($newsdata)
	{
        $nama = $newsdata;
        $ambil = explode("-", $nama);
        $codeimage = $ambil['0'];
        $id_news = $ambil['1'];
        //print_r($codeimage);
        //print_r($id_news);
		// $data['modul'] = "welcome";
		// $data['menu'] = "welcome";
        $result['v_one_news'] = $this->Model_create_document->v_one_doc_news_row($codeimage,$id_news);
        $result['v_news'] = $this->Model_create_document->v_one_doc_news_result($codeimage,$id_news);
		$this->load->view('DetailBerita',$result);
	}
}