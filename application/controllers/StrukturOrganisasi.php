<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StrukturOrganisasi extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database('default', true);     
        $this->db2 = $this->load->database('second', true);
		$this->load->helper(array('form', 'url','download'));
		$this->load->model('Model_create_document', '', TRUE);
		$this->load->library('zip');
	}
	public function index()
	{
		
		$result['Data'] = $this->Model_create_document->AllViewDataStrkOrgAdmin();
        //var_dump($result);
        //die();
        $this->load->view('strukturorgn',$result);
	}

	public function file($filename)
	{
        // load download helder
    $this->load->helper('download');
    // read file contents
    $data = file_get_contents(base_url('/uploads/file/'.$filename));
    // var_dump($data);
    // die();
    force_download($filename, $data);
	}
}