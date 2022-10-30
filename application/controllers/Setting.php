<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {
    public function __construct(){
        parent::__construct();
        
        /*CONNECT 2 DATABASE*/
        $dsn1 = 'mysqli://root:@localhost:8080/bdmgmtmenu';
        $this->db = $this->load->database($dsn1, true);     
        
        $dsn2 = 'mysqli://root:@localhost:8080/dbbsscollection';
        $this->db2= $this->load->database($dsn2, true);        
        /*CONNECT 2 DATABASE*/
        
		$this->db = $this->load->database('default', true);
		$this->db2 = $this->load->database('second', true);

        /* $this->load->helper(array('url', 'form'));
        $this->load->library('session');
        $this->load->model('Menu_model', '', TRUE);
        $this->load->model('Setting_model', '', TRUE); */
    }
    
    
    public function create_schedulers(){
        if($this->session->has_userdata('username')){
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Tambah Scheduler';
            $result['content'] = 'create_setting_scheduler';
            $this->load->view('bss_home', $result); //$this->load->view('bss_home', $result); //$this->load->view('bss_home', $result); //$this->load->view('home', $result);
        }else{
            redirect('/');
        }
    }
    
    public function update_notif(){
        $this->session->set_flashdata(
            "message",
            "<script>swal(
              'Berhasil!',
              'Data berhasil disimpan!',
              'success'
            )</script>"               
        );   
    }    
    
    public function create_setting_schedulers_process(){
        $f_id = $this->input->post('f_id');
        $f_progId = $this->input->post('f_progId');
        
        $format_date = DateTime::createFromFormat('D, d M Y', $this->input->post('f_startingdate'))->format('Y-m-d');
        $f_startingdate = $format_date;
        $f_startingtime = $this->input->post('f_startingtime');
        $f_refreshcounter = $this->input->post('f_refreshcounter');
        $f_finishtime = $this->input->post('f_finishtime');
        $f_status = $this->input->post('f_status');
        $f_note = $this->input->post('f_note');
        
        $test = array(
            'f_id' => $this->input->post('f_id'),
            'f_progId' => $this->input->post('f_progId'),
            'f_startingdate' => $format_date,
            'f_startingtime' => $this->input->post('f_startingtime'),
            'f_refreshcounter' => $this->input->post('f_refreshcounter'),
            'f_finishtime' => $this->input->post('f_finishtime'),
            'f_status' => $this->input->post('f_status'),
            'f_note' => $this->input->post('f_note')
        );
        
        $this->Setting_model->create_setting_scheduler_process($f_id, $f_progId, $f_startingdate, $f_startingtime, $f_refreshcounter, $f_finishtime, $f_status, $f_note);
        
        redirect('setting/read_schedulers');
    }    
    
    public function read_schedulers(){
        if($this->session->has_userdata('username')){
            $result['data'] = $this->Menu_model->loadMenu();
            $result['schedulers'] = $this->Setting_model->get_setting_schedulers();
            $result['pagename'] = 'Schedulers';
            $result['content'] = 'read_setting_schedulers';
            $this->load->view('bss_home', $result); //$this->load->view('bss_home', $result);
        }else{
            redirect('/');
        }
    }     
    
    public function update_setting_schedulers($id){
        if($this->session->has_userdata('username')){
            $result['data'] = $this->Menu_model->loadMenu();
            $result['schedule'] = $this->Setting_model->get_setting_scheduler_one($id);
            $result['pagename'] = 'Update Schedulers';
            $result['content'] = 'update_setting_scheduler';
            $this->load->view('bss_home', $result); //$this->load->view('bss_home', $result); 
        }else{
            redirect('/');
        }
    }
    /*
    public function update_param_city_process(){
        if($this->session->has_userdata('username')){
            $id_kota = $this->input->post('id_kota');
            $city_name = $this->input->post('city_name');
            $status = $this->input->post('status');

            $this->Setting_model->update_param_city_process($id_kota, $city_name, $status);
            redirect('content/read_param_city');
        }else{
            redirect('/');
        }
    }*/
    
    public function update_setting_schedulers_process(){
        if($this->session->has_userdata('username')){
            $f_id = $this->input->post('f_id');
            $f_progId = $this->input->post('f_progId');
            $format_date = DateTime::createFromFormat('D, d M Y', $this->input->post('f_startingdate'))->format('Y-m-d');
            $f_startingdate = $format_date;
            $f_startingtime = $this->input->post('f_startingtime');
            $f_refreshcounter = $this->input->post('f_refreshcounter');
            $f_finishtime = $this->input->post('f_finishtime');
            $f_status = $this->input->post('f_status');
            $f_note = $this->input->post('f_note');

            $this->Setting_model->update_setting_scheduler_process($f_id, $f_progId, $f_startingdate, $f_startingtime, $f_refreshcounter, $f_finishtime, $f_status, $f_note);
            $this->update_notif();
            
            redirect('setting/read_schedulers');
        }else{
            redirect('/');
        }
    }     
    
    public function delete_multi_setting_scheduler(){
        $selection = $this->input->post('idnya');
        echo $this->Setting_model->delete_multi_setting_scheduler($selection);
        redirect('setting/read_schedulers');
    }      
}

