<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database('default', true);     
        $this->db2 = $this->load->database('second', true);
		$this->load->helper(array('form', 'url'));
		$this->load->model('Model_create_document', '', TRUE);
		$this->load->library('zip');
	}
	public function index()
	{
		$folderId = $this->Model_create_document->getidFolderimg();
		
		$result['foto_one'] = $this->Model_create_document->views_image_bankfoto_one($folderId->idfolder);
		$result['nmkegiatan'] = $this->Model_create_document->getidFolderimg($folderId->idfolder);
		$urlDOwnloadOne= $this->Model_create_document->getidFolderimgZip($folderId->idfolder);
		
		$result['foto_two'] = $this->Model_create_document->views_image_bankfoto_two($folderId->idfolder);
		$result['nmkegiatanTwo'] = $this->Model_create_document->getidFolderimgTwo($folderId->idfolder);
        $this->load->view('gallery',$result);
	}



	public function DownloadImageTozip()
	{
				//$result= $this->Model_create_document->getConvertTozipImg();
				$nameFolder=$this->input->post('imagezipTwo');
				
        		 // File name
				 $filename =$nameFolder;

				 // Directory path (uploads directory stored in project root)
				 $path = 'uploads'.'/'.$nameFolder;
	 
				 // Add directory to zip
				 $this->zip->read_dir($path);
	 
				 // Save the zip file to archivefiles directory
				 $this->zip->archive(FCPATH.'/archivefiles/'.$filename);
	 
				 // Download
				 $this->zip->download($filename);
	}
}