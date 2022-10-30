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
	}
	public function index()
	{
	    // $data['modul'] = "welcome";
		// $data['menu'] = "welcome";
	// $field=$this->db2->list_fields('document_news');
	// $id_news=$field[0];
	//  $result['v_news'] = $this->Model_create_document->views_news_welcome($id_news);

	//  $field=$this->db2->list_fields('document_opini');
	//  $id_opini=$field[0];
	//  $result['v_opini'] = $this->Model_create_document->views_opini_welcome($id_opini);

	//  $field=$this->db2->list_fields('document_agenda');
	//  $id_agenda=$field[0];
	//  $result['v_agenda'] = $this->Model_create_document->views_agenda_welcome($id_agenda);

	//  $field=$this->db2->list_fields('document_image');
	//  $id_image=$field[0];
	//  $result['v_image'] = $this->Model_create_document->views_image_welcome($id_image);

	//  $field=$this->db2->list_fields('document_video');
	//  $id_video=$field[0];
	//  $result['v_video'] = $this->Model_create_document->views_video_welcome($id_video);
	//  $result['v_about'] = $this->Model_create_document->views_about_welcome();

	 //$this->load->view('home',$result);
     $this->load->view('beranda');
	}
}