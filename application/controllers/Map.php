<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Map extends CI_Controller {

    public function __construct() {
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

    public function index() {
        if ($this->session->has_userdata('username')) {
            $idmenu = 'H04';
            $idmenu2 = 'D1014';
            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
            if ($result1 == '1') {
                $result['data'] = $this->Menu_model->loadMenu();
                $result['pagename'] = 'Data Map';
                $userid = $this->session->userdata('username');
                $result['map'] = $this->Model_create_document->getmapdata();
                $result['content'] = 'vmap';
                $this->load->view('abn_home', $result);
            }
        } else {
			redirect('/');
        }
    }


    public function vcrtmap() {
        if ($this->session->has_userdata('username')) {
                    $result['kodemap']=$this->Model_create_document->getmapdcode();
                    $result['data'] = $this->Menu_model->loadMenu();
                    $result['pagename'] = 'Create Data Welcome';
                    $result['content'] = 'viewcrtmap';
                    $this->load->view('abn_home', $result);
        }
    }


    public function create_map() {
	
		if ($this->session->has_userdata('username')) {
            $kodemap =$this->input->post('kodemap'); 
            $wlyh = $this->input->post('wlyh'); 
            $kecmtn = $this->input->post('kecmtn'); 
            $lokasi = $this->input->post('lokasi');
            $latitude = $this->input->post('latitude');
            $longitude = $this->input->post('longitude');
            $tanggal=Date('Y-m-d');
           $data = array(
			    'kodemap'=>$kodemap,
                'wilayah'=>$wlyh,
                'kecamatan'=>$kecmtn,
                'lokasi'=>$lokasi,
                'latitude'=>$latitude,
                'longitude'=>$longitude,
                'tanggal'=>$tanggal
			);
            
            $this->Model_create_document->insert_data_map('document_map',$data);
            $this->sucess_notif_data();
            redirect('mapadmin');
		}
 	}

    public function editmap($id){
        if ($this->session->has_userdata('username')) {
      
            
            $result['vmap'] = $this->Model_create_document->getvieweditmap($id);
            //echo '<pre>',print_r($result),'</pre>';
            $result['data'] = $this->Menu_model->loadMenu();
            $result['content'] = 'vieweditmap';
            $this->load->view('abn_home', $result); 
        }else{
            redirect('mapadmin');
        }    
    }

    public function update_map() {
	
		if ($this->session->has_userdata('username')) {
            $idmap =$this->input->post('idmap'); 
            $kodemap =$this->input->post('kodemap'); 
            $wlyh = $this->input->post('wlyh'); 
            $kecmtn = $this->input->post('kecmtn'); 
            $lokasi = $this->input->post('lokasi');
            $latitude = $this->input->post('latitude');
            $longitude = $this->input->post('longitude');
            $tanggal=Date('Y-m-d');
           $data = array(
			    'kodemap'=>$kodemap,
                'wilayah'=>$wlyh,
                'kecamatan'=>$kecmtn,
                'lokasi'=>$lokasi,
                'latitude'=>$latitude,
                'longitude'=>$longitude,
                'tanggal'=>$tanggal
			);
            
            $this->Model_create_document->update_data_map('document_map',$data,$idmap);
            $this->sucess_notif_data();
            redirect('mapadmin');
		}
 	}

     function sucess_notif_data() {
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

}
