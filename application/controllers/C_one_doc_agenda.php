<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_one_doc_agenda extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database('default', true);     
        $this->db2 = $this->load->database('second', true);
		$this->load->helper(array('form', 'url'));
		$this->load->model('Model_create_document', '', TRUE);
	}
	public function v_one_agenda($newsdata)
	{
        $nama = $newsdata;
        $ambil = explode("-", $nama);
        $codeimage_agenda = $ambil['0'];
        $id_agenda = $ambil['1'];
        // print_r($codeimage_agenda);
        // print_r($id_agenda);
		
        $result['one_agenda'] = $this->Model_create_document->v_one_doc_agenda_row($codeimage_agenda,$id_agenda);
        $result['v_one_agenda_result'] = $this->Model_create_document->v_one_doc_agenda_result($codeimage_agenda,$id_agenda);
		$this->load->view('view_on_agenda',$result);
	}
}