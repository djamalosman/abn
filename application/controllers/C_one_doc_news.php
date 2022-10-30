<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_one_doc_news extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database('default', true);     
        $this->db2 = $this->load->database('second', true);
		$this->load->helper(array('form', 'url'));
		$this->load->model('Model_create_document', '', TRUE);
	}
	public function v_one_news($newsdata)
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
        $result['v_one_news_result'] = $this->Model_create_document->v_one_doc_news_result($codeimage,$id_news);
		$this->load->view('view_one_news',$result);
	}
}