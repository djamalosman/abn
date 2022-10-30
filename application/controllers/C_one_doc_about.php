<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_one_doc_about extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database('default', true);     
        $this->db2 = $this->load->database('second', true);
		$this->load->helper(array('form', 'url'));
		$this->load->model('Model_create_document', '', TRUE);
	}
	public function v_one_about($newsdata)
	{
        $nama = $newsdata;
        $ambil = explode("-", $nama);
        $codeimage = $ambil['0'];
        $id_news = $ambil['1'];
        //print_r($codeimage);
        //print_r($id_news);
		// $data['modul'] = "welcome";
		// $data['menu'] = "welcome";
        $result['v_one_about_row'] = $this->Model_create_document->v_one_doc_about_row($codeimage,$id_news);
        $result['v_one_about_result'] = $this->Model_create_document->v_one_doc_about_result($codeimage,$id_news);
		$this->load->view('view_one_about',$result);
	}
}