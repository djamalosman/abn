<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {
    public function __construct(){
        parent::__construct();
        
        /*CONNECT 2 DATABASE*/
		
		$this->db = $this->load->database('default', true);
		$this->db2 = $this->load->database('second', true);

       /*  $dsn1 = 'mysqli://root:@localhost/mgmtmenu';
        $this->db = $this->load->database($dsn1, true);     
        
        $dsn2 = 'mysqli://root:@localhost/dbcollection';
        $this->db2= $this->load->database($dsn2, true);      */    
        /*CONNECT 2 DATABASE*/
        
        $this->load->helper(array('url', 'form'));
        $this->load->library('session');
        $this->load->model('Menu_model', '', TRUE);
    }

    
    public function index(){
        if($this->session->userdata('username')){
            redirect('menu/home');
        }else{
            $this->load->view('login');
        }
    }

    public function home()
    {
        if($this->session->userdata('username')){
            $result['data'] = $this->Menu_model->loadMenu();
            $result['content'] = 'home_content';
            $this->load->view('home', $result);
        }else{
            redirect("/");
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect("/");
    }


    public function process_login(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $data = $this->Menu_model->login($username, $password);
        $this->session->set_userdata("levelname", $data->f_levelname);
        
        if($data){
            $this->session->set_userdata("username", $data->f_userid);
            $this->session->set_userdata("name", $data->f_username);
            $this->session->set_userdata("level", $data->f_userlevel);

            if($this->session->has_userdata('username')){
                redirect("menu/home");
            }else{
                redirect("/");
            }
        }else{
            redirect("/");
        }
    }
    
    
    public function create_user(){
        if($this->session->has_userdata('username')){
            $result['data'] = $this->Menu_model->loadMenu();
            $result['tipe_user'] = $this->Menu_model->loadTipeUser();
            $result['content'] = 'create_user';
            $this->load->view('home', $result);
        }else{
            redirect('/');
        }
    }
    
    public function create_param_city(){
        if($this->session->has_userdata('username')){
            $result['data'] = $this->Menu_model->loadMenu();
            $result['content'] = 'create_param_city';
            $this->load->view('home', $result);
        }else{
            redirect('/');
        }
    }
    
    public function create_param_area(){
        if($this->session->has_userdata('username')){
            $result['data'] = $this->Menu_model->loadMenu();
            $result['content'] = 'create_param_city';
            $this->load->view('home', $result);
        }else{
            redirect('/');
        }
    }
    
    public function update_param_city_process(){
        if($this->session->has_userdata('username')){
            $id_kota = $this->input->post('id_kota');
            $city_name = $this->input->post('city_name');
            $status = $this->input->post('status');

            $this->Menu_model->update_param_city_process($id_kota, $city_name, $status);
            redirect('menu/read_param_city');
        }else{
            redirect('/');
        }
    }
    
    public function update_param_city($id){
        if($this->session->has_userdata('username')){
            $result['data'] = $this->Menu_model->loadMenu();
            $result['city'] = $this->Menu_model->get_city_one();
            $result['content'] = 'update_param_city';
            $this->load->view('home', $result);
        }else{
            redirect('/');
        }
    }
    
    public function create_level(){
        if($this->session->has_userdata('username')){
            $result['data'] = $this->Menu_model->loadMenu();
            $result['content'] = 'create_level';
            $this->load->view('home', $result);
        }else{
            redirect('/');
        }
    }
    
    public function create_headermenu(){
        if($this->session->has_userdata('username')){
            $result['data'] = $this->Menu_model->loadMenu();
            $result['content'] = 'create_headermenu';
            $this->load->view('home', $result);
        }else{
            redirect('/');
        }
    }
    
    public function read_user(){
        if($this->session->has_userdata('username')){
            $result['data'] = $this->Menu_model->loadMenu();
            $result['user_data'] = $this->Menu_model->get_userdata();
            $result['content'] = 'read_user';
            $this->load->view('home', $result);                     
        }else{
            redirect('/');
        }
    }
    
    public function read_level(){
        if($this->session->has_userdata('username')){
            $result['data'] = $this->Menu_model->loadMenu();
            $result['user_data'] = $this->Menu_model->get_level();
            $result['content'] = 'read_level';
            $this->load->view('home', $result);                     
        }else{
            redirect('/');
        }
    }
    
    public function read_headermenu(){
        if($this->session->has_userdata('username')){
            $result['data'] = $this->Menu_model->loadMenu();
            $result['headermenu'] = $this->Menu_model->get_headermenu();
            $result['content'] = 'read_headermenu';
            $this->load->view('home', $result);                     
        }else{
            redirect('/');
        }
    }
    
    public function read_menu_access($id){
        if($this->session->has_userdata('username')){
            $result['data'] = $this->Menu_model->loadMenu();
            $result['levels'] = $this->Menu_model->get_level();
            $result['menu_list'] = $this->Menu_model->menuAccess($id);
            $result['content'] = 'read_menu_access';
            $result['id_level'] = $id;
            $this->load->view('home', $result);                     
        }else{
            redirect('/');
        }
    }
    
    public function read_param_city(){
        if($this->session->has_userdata('username')){
            $result['data'] = $this->Menu_model->loadMenu();
            $result['city'] = $this->Menu_model->get_param_city();
            $result['content'] = 'read_param_city';
            $this->load->view('home', $result);                 
        }else{
            redirect('/');
        }
    }
    
    public function update_user($id){
        if($this->session->has_userdata('username')){
            $result['data'] = $this->Menu_model->loadMenu();
            $result['user_data'] = $this->Menu_model->get_userdata_one($id);
            $result['content'] = 'update_user';
            $this->load->view('home', $result);
        }else{
            redirect('/');
        }
    }    
    
    public function update_level($id){
        if($this->session->has_userdata('username')){
            $result['data'] = $this->Menu_model->loadMenu();
            $result['user_data'] = $this->Menu_model->get_one_level($id);
            $result['content'] = 'update_level';
            $this->load->view('home', $result);
        }else{
            redirect('/');
        }
    }    
    
    public function update_headermenu($id){
        if($this->session->has_userdata('username')){
            $result['data'] = $this->Menu_model->loadMenu();
            $result['headermenu'] = $this->Menu_model->get_one_headermenu($id);
            $result['content'] = 'update_headermenu';
            $this->load->view('home', $result);
        }else{
            redirect('/');
        }
    }    
    
    public function delete_user($id){
        $this->Menu_model->delete_user($id);
        redirect('menu/read_user');
    }    
    
    public function delete_multiuser(){
        $selection = $this->input->post('idnya');
        $this->Menu_model->delete_multiuser($selection);
        redirect('menu/read_user');
    }    
    
    public function delete_multilevel(){
        $selection = $this->input->post('idnya');
        $this->Menu_model->delete_multilevel($selection);
        redirect('menu/read_level');
    }    
    
    public function delete_multiheader(){
        $selection = $this->input->post('idnya');
        $this->Menu_model->delete_multiheader($selection);
        redirect('menu/read_headermenu');
    }    
    
    public function delete_multi_param_city(){
        $selection = $this->input->post('idnya');
        $this->Menu_model->delete_multi_param_city($selection);
        redirect('menu/read_param_city');
    }    
    
    
    public function create_process(){
        $name = $this->input->post('name');
        $id_user = $this->input->post('id_user');
        $password = $this->input->post('password');
        $level = $this->input->post('level');
        $status = $this->input->post('status');
        
        $this->Menu_model->create_user($name, $id_user, $password, $level, $status);
        redirect('menu/read_user');
    }
    
    public function create_param_city_process(){
        $id_kota = $this->input->post('id_kota');
        $city_name = $this->input->post('city_name');
        $status = $this->input->post('status');
        
        $this->Menu_model->create_param_city_process($id_kota, $city_name, $status);
        redirect('menu/read_param_city');
    }
    
    public function create_level_process(){
        $level_id = $this->input->post('level_id');
        $level_name = $this->input->post('level_name');
        $status = $this->input->post('status');
        
        $this->Menu_model->create_level($level_id, $level_name, $status);
        redirect('menu/read_level');
    }
    
    public function create_headermenu_process(){
        $header_id = $this->input->post('header_id');
        $headerName = $this->input->post('headerName');
        $status = $this->input->post('status');
        
        $this->Menu_model->create_headermenu($header_id, $headerName, $status);
        redirect('menu/read_headermenu');
    }
    
    public function update_headermenu_process(){
        $header_id = $this->input->post('header_id');
        $headerName = $this->input->post('headerName');
        $status = $this->input->post('status');
        
        $this->Menu_model->update_headermenu($header_id, $headerName, $status);
        redirect('menu/read_headermenu');
    }
    
    
    
    public function update_level_process(){
        $level_id = $this->input->post('level_id');
        $level_name = $this->input->post('level_name');
        $status = $this->input->post('status');
        
        $this->Menu_model->update_level($level_id, $level_name, $status);
        redirect('menu/read_level');
    }
    
    
    public function update_process(){
        $name = $this->input->post('name');
        $id_user = $this->input->post('id_user');
        $password = $this->input->post('password');
        $level = $this->input->post('level');
        $status = $this->input->post('status');
        
        $this->Menu_model->update_user($name, $id_user, $password, $level, $status);
        redirect('menu/read_user');
    }
    
    public function api_read_menu_access(){
        $result = $this->Menu_model->menuAccess();
        echo json_encode($result);
    }
    
    public function access_permission_process($id_level){
        if($this->session->userdata('username')){
            $id_header = $this->input->post('idheader');
            $id_item = $this->input->post('iditem');
            
            $data = $this->Menu_model->access_permission_process($id_level, $id_header, $id_item);
            redirect('menu/read_level');
        }else{
            redirect('/');
        }
    }
}

