<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_one_doc_opini extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database('default', true);     
        $this->db2 = $this->load->database('second', true);
		$this->load->helper(array('form', 'url'));
		$this->load->model('Model_create_document', '', TRUE);
	}
	public function v_one_opini($newsdata)
	{
        $nama = $newsdata;
        $ambil = explode("-", $nama);
        $codeimage_opini = $ambil['0'];
        $id_opini = $ambil['1'];
        //print_r($codeimage_opini);
        //print_r($id_opini);
		
        $result['one_opini'] = $this->Model_create_document->v_one_doc_opini_row($codeimage_opini,$id_opini);
        $result['v_one_opini_result'] = $this->Model_create_document->v_one_doc_opini_result($codeimage_opini,$id_opini);
		$this->load->view('view_one_opini',$result);
	}
}