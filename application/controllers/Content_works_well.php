<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Content extends CI_Controller {
    public function __construct(){
        parent::__construct();
        
        $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
        $this->load->library('Pdfgenerator');
        $this->db = $this->load->database('default', true);
		$this->db2 = $this->load->database('second', true);

        
//        $this->load->library('pdf');
        $this->load->helper('file'); 
        /*CONNECT 2 DATABASE*/
        /* $dsn1 = 'mysqli://xplmjdmx_4nagata:4N4G4T49876@localhost/xplmjdmx_mgmtmenu';
        $this->db = $this->load->database($dsn1, true);     
        
        $dsn2 = 'mysqli://xplmjdmx_4nagata:4N4G4T49876@localhost/xplmjdmx_dbcollection';
        $this->db2= $this->load->database($dsn2, true);          
         */
        // $dsn3 = 'mysqli://xplmjdmx_4nagata:4N4G4T49876/kspkss';
        // $this->db3= $this->load->database($dsn3, true);         
        /*CONNECT 2 DATABASE*/
        
        $this->load->helper(array('url', 'form'));
        $this->load->library('session');
        $this->load->model('Menu_model', '', TRUE);
        $this->load->model('Content_model', '', TRUE);
    }
    
    public function iseng(){
        echo $this->db2->get_where('t_assigndetail', array('f_agentid' => 'RBS777'))->count_all_results();
        echo $this->db2->get_where('t_assigndetail', array('f_agentid !=' => 'RBS777'))->num_rows();
    }
    
    
    
    
//  PDF -------------
    public function pdf() {
        $data['users'] = array(
            array('firstname' => 'Agung', 'lastname' => 'Setiawan', 'email' => 'ag@setiawan.com'),
            array('firstname' => 'Hauril', 'lastname' => 'Maulida Nisfar', 'email' => 'hm@setiawan.com'),
            array('firstname' => 'Akhtar', 'lastname' => 'Setiawan', 'email' => 'akh@setiawan.com'),
            array('firstname' => 'Gitarja', 'lastname' => 'Setiawan', 'email' => 'git@setiawan.com')
        );

        $html = $html = preg_replace('/>\s+</', '><', $this->load->view('table_report', $data, true));
//        $html = $html = $this->load->view('table_report', $data, true);
        $this->Pdfgenerator->generate($html, 'contoh'.time());
    }

    public function index() {
        $data['users'] = array(
            array('firstname' => 'Agung', 'lastname' => 'Setiawan', 'email' => 'ag@setiawan.com'),
            array('firstname' => 'Hauril', 'lastname' => 'Maulida Nisfar', 'email' => 'hm@setiawan.com'),
            array('firstname' => 'Akhtar', 'lastname' => 'Setiawan', 'email' => 'akh@setiawan.com'),
            array('firstname' => 'Gitarja', 'lastname' => 'Setiawan', 'email' => 'git@setiawan.com')
        );
        $this->load->view('table_report', $data);
    }

//  PDF -------------
    
    public function convertDatetoNumber($date){
        return DateTime::createFromFormat('D, d M Y', $date)->format('Y-m-d');
    }    
    
    public function convertNumbertoDate($date){
        return DateTime::createFromFormat('Y-m-d', $date)->format('D, d M Y');
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
    
    
    public function delete_notif(){
        $this->session->set_flashdata(
            "message",
            "<script>swal(
              'Berhasil!',
              'Data yang ditandai sudah dihapus!',
              'success'
            )</script>"               
        );    
    }


    public function excel_agent(){
        if($this->session->has_userdata('username')){
            $result['data'] = $this->Menu_model->loadMenu();
            $result['content'] = 'excel';
            $this->load->view('home', $result);            
        }else{
            redirect('/');
        }
    }
    
    public function submit_as_data(){
//        echo "hai Al Bahri </br>";
        $id = $this->input->post('idnya');
//        echo 'submit: '.$this->input->post('kirim');
        if($this->input->post('kirim')=="proses"){
//            $this->bg_upload('t_assignheader');
            echo 'proses';
        }else if($this->input->post('kirim')=="delete"){
//            $this->delete_multi_as_data();
            echo 'delete';
        }else if($this->input->post('kirim')=="update_assignment"){
//            $this->update_as_data($id[0]);
            echo 'update';
        }
    }
    
    public function submit_as_data_CADANGAN(){
        $id = $this->input->post('idnya');
//        echo 'submit: '.$this->input->post('kirim');
        if($this->input->post('kirim')==" Proses"){
//            $this->bg_upload('t_assignheader');
            echo 'proses';
        }else if($this->input->post('kirim')==""){
//            $this->delete_multi_as_data();
            echo 'delete';
        }else if($this->input->post('kirim')==" Transfer Assignment"){
//            $this->update_as_data($id[0]);
            echo 'update';
        }
    }
    
    public function bg_upload($table){
       
        $inputFileName = './als_asset/excel/form_assign_header.xlsx';
         
        try {
                $inputFileType = IOFactory::identify($inputFileName);
                $objReader = IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
            } catch(Exception $e) {
                die(' Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
            }
 
            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();
             
            $toArray = $sheet->rangeToArray('A1:AML1', NULL, TRUE, FALSE);
            $fieldname = array_filter($toArray[0], function($x) { return !empty($x); });
            
            
            for ($row = 2; $row <= $highestRow; $row++){                  //  Read a row of data into an array                 
                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                                                NULL,
                                                TRUE,
                                                FALSE);
                //Sesuaikan sama nama kolom tabel di database                                                                
                $data = null;
                
                foreach ($fieldname as $key => $item){
                        $data[$item] = $rowData[0][$key];         
                }
                
                $insert = $this->db2->insert($table,$data);
            }

//        unlink('./als_asset/excel/uploaded_excel/'.$fileName);
        
        
        $this->session->set_flashdata(
            "message",
            "<script>swal(
              'Berhasil!',
              'Data sudah ditambahkan',
              'success'
            )</script>"               
        );  
        
        $this->bg_upload_tbdetail('t_assigndetail');
//tetap//        $this->bg_upload_excel_tanpa_form('t_longlat');
        redirect('content/read_as_data');
    }
    
    
    public function bg_upload_tbdetail($table){       
        $inputFileName = './als_asset/excel/form_assign_detail.xlsx';
         
        try {
                $inputFileType = IOFactory::identify($inputFileName);
                $objReader = IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
            } catch(Exception $e) {
                die(' Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
            }
 
            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();
            
            $toArray = $sheet->rangeToArray('A1:AML1', NULL, TRUE, FALSE);
            $fieldname2 = array_filter($toArray[0], function($x) { return !empty($x); });            
            
            
            for ($row = 2; $row <= $highestRow; $row++){                  //  Read a row of data into an array                 
                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                                                NULL,
                                                TRUE,
                                                FALSE);

                
                
                //Sesuaikan sama nama kolom tabel di database                                                                
                
                $data = null;
                foreach ($fieldname2 as $key => $item){
                        $data[$item] = $rowData[0][$key];         
                }
                
                $insert = $this->db2->insert($table,$data);
                $errornya[] = $this->db2->error();
            }
//            print_r($errornya);
    }    
    
    
public function bg_upload_excel_tanpa_form($table){
        
        $fieldname3 = array(
            'branch_id',
            'f_cif',
            'f_acctno',
            'f_long',
            'f_lat'
        );
        
       
        $inputFileName = './als_asset/excel/form_longlat.xlsx';
         
        try {
                $inputFileType = IOFactory::identify($inputFileName);
                $objReader = IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
            } catch(Exception $e) {
                die(' Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
            }
 
            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();
            
            
            for ($row = 2; $row <= $highestRow; $row++){                  //  Read a row of data into an array                 
                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                                                NULL,
                                                TRUE,
                                                FALSE);

                
                
                //Sesuaikan sama nama kolom tabel di database                                                                
                
                $data = null;
                foreach ($fieldname3 as $key => $item){
                        $data[$item] = $rowData[0][$key];         
                }
                 
                //sesuaikan nama dengan nama tabel
//                $insert = $this->db2->insert($table,$data);
                
                $insert = $this->db2->insert($table,$data);
                $errornya[] = $this->db2->error();
            }
            print_r($errornya);
    }       
    
    
    
    
    
    
    
    
    
    
    
    
    
    public function CADANGAN_______bg_upload($table){
       
        $inputFileName = './als_asset/excel/form_assign_header.xlsx';
//        $inputFileName = base_url('als_asset/excel/form_assign_header.xlsx');
         
        try {
                $inputFileType = IOFactory::identify($inputFileName);
                $objReader = IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
            } catch(Exception $e) {
                die(' Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
            }
 
            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();
             
            
            $fieldname = $this->session->userdata('fieldname');
            
            
            for ($row = 2; $row <= $highestRow; $row++){                  //  Read a row of data into an array                 
                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                                                NULL,
                                                TRUE,
                                                FALSE);

                
                
                //Sesuaikan sama nama kolom tabel di database                                                                
                
                $data = null;
                foreach ($fieldname as $key => $item){
                        $data[$item] = $rowData[0][$key];         
                }
                 
                //sesuaikan nama dengan nama tabel
                $insert = $this->db2->insert($table,$data);
                
                $errornya[] = $this->db2->error();
//                $insert = $this->db2->insert($table,$data);
            }
            $this->session->unset_userdata('fieldname');
//            print_r($recordnya);
//        unlink('./als_asset/excel/uploaded_excel/'.$fileName);
        
        print_r($errornya);
        
        $this->session->set_flashdata(
            "message",
            "<script>swal(
              'Berhasil!',
              'Data sudah ditambahkan',
              'success'
            )</script>"               
        );  
        redirect('content/read_as_data');
    }
    
    public function excel_upload($table, $controller, $link){
        $fileName = time().$_FILES['file']['name'];

        $config['upload_path'] = './als_asset/excel/uploaded_excel/'; //buat folder dengan nama assets di root folder
        $config['allowed_types'] = 'xls|xlsx|csv';
        $config['max_size'] = 20000;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;
        $config['overwrite'] = true;
        $config['file_name'] = $fileName;


        $this->load->library('upload', $config);            
        
        if(! $this->upload->do_upload('file') )
        $this->upload->display_errors();
             
        $media = $this->upload->data('file');
        
        print_r($media);
        $inputFileName = './als_asset/excel/uploaded_excel/'.$fileName;
         
        try {
                $inputFileType = IOFactory::identify($inputFileName);
                $objReader = IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
            } catch(Exception $e) {
                die(' Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
            }
 
            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();
             
            
            $toArray = $sheet->rangeToArray('A1:AML1', NULL, TRUE, FALSE);
            $fieldname = array_filter($toArray[0], function($x) { return !empty($x); });
            
            
            for ($row = 2; $row <= $highestRow; $row++){                  //  Read a row of data into an array                 
                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                                                NULL,
                                                TRUE,
                                                FALSE);
                
                //Sesuaikan sama nama kolom tabel di database                                                                
                $data = null;
                foreach ($fieldname as $key => $item){
                        $data[$item] = $rowData[0][$key];         
                }
                 
                //sesuaikan nama dengan nama tabel
                $insert = $this->db2->insert($table,$data);
                
                $errornya[] = $this->db2->error();
//                $insert = $this->db2->insert($table,$data);
            }
            
        unlink('./als_asset/excel/uploaded_excel/'.$fileName);
        
        print_r($errornya);
        redirect($controller.'/'.$link);
    }
    
    public function excel_upload_agent_data(){
        $fileName = time().$_FILES['file']['name'];

        $config['upload_path'] = './als_asset/excel/uploaded_excel/'; //buat folder dengan nama assets di root folder
        $config['allowed_types'] = 'xls|xlsx|csv';
        $config['max_size'] = 20000;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;
        $config['overwrite'] = true;
        $config['file_name'] = $fileName;


        $this->load->library('upload', $config);            
        
        if(! $this->upload->do_upload('file') )
        $this->upload->display_errors();
             
        $media = $this->upload->data('file');
        
        print_r($media);
        $inputFileName = './als_asset/excel/uploaded_excel/'.$fileName;
         
        try {
                $inputFileType = IOFactory::identify($inputFileName);
                $objReader = IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
            } catch(Exception $e) {
                die(' Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
            }
 
            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();
             
            for ($row = 2; $row <= $highestRow; $row++){                  //  Read a row of data into an array                 
                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                                                NULL,
                                                TRUE,
                                                FALSE);
                                                 
                //Sesuaikan sama nama kolom tabel di database                                                                
                 $data = array(
                    'f_agencyid' => $rowData[0][0],
                    'f_nik' => $rowData[0][1],
                    'f_agentname' => $rowData[0][2],
                    'f_branch_id' => $rowData[0][3],
                    'f_username' => $rowData[0][4],
                    'f_userpswd' => $rowData[0][5],
                    'f_email' => $rowData[0][6],
                    'f_nohp' => $rowData[0][7],
                    'f_imeihp' => $rowData[0][8],
                    'f_snhp' => $rowData[0][9]
                );
                 
                //sesuaikan nama dengan nama tabel
                $insert = $this->db2->insert("t_agent",$data);
                //  delete_files('./als_asset/excel/uploaded_excel/'.$fileName);
                     
            }
        unlink('./als_asset/excel/uploaded_excel/'.$fileName);
        redirect('content/read_um_agent');
    }
    
    public function excel_upload_branch_data(){
        $fileName = time().$_FILES['file']['name'];

        $config['upload_path'] = './als_asset/excel/uploaded_excel/'; //buat folder dengan nama assets di root folder
        $config['allowed_types'] = 'xls|xlsx|csv';
        $config['max_size'] = 20000;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;
        $config['overwrite'] = true;
        $config['file_name'] = $fileName;


        $this->load->library('upload', $config);            
        
        if(! $this->upload->do_upload('file') )
        $this->upload->display_errors();
             
        $media = $this->upload->data('file');
        
        $inputFileName = './als_asset/excel/uploaded_excel/'.$fileName;
         
        try {
                $inputFileType = IOFactory::identify($inputFileName);
                $objReader = IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
            } catch(Exception $e) {
                die(' Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
            }
 
            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();
             
            for ($row = 2; $row <= $highestRow; $row++){                  //  Read a row of data into an array                 
                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                                                NULL,
                                                TRUE,
                                                FALSE);
                                                 
                //Sesuaikan sama nama kolom tabel di database          
                 $data = array(
                    'f_branchid' => $rowData[0][0],
                    'f_branchname' => $rowData[0][1],
                    'f_areaid' => $rowData[0][2],
                    'f_address' => $rowData[0][3],
                    'f_cityid' => $rowData[0][4],
                    'f_postcode' => $rowData[0][5],
                    'f_usercreate' => $rowData[0][6],
                    'f_datecreate' => $rowData[0][7],
                    'f_userupdate' => $rowData[0][8],
                    'f_dateupdate' => $rowData[0][9]
                );
                 
                //sesuaikan nama dengan nama tabel
                $insert = $this->db2->insert("t_branch",$data);
//                delete_files('./als_asset/excel/uploaded_excel/'.$fileName);
//                delete_files('./als_asset/excel/uploaded_excel/');
                     
            }
            unlink('./als_asset/excel/uploaded_excel/'.$fileName);
        redirect('content/read_param_branch');
    }
    
    public function create_param_city(){
        if($this->session->has_userdata('username')){
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Tambah Kota';
            $result['content'] = 'create_param_city';
            $this->load->view('home', $result);
        }else{
            redirect('/');
        }
    }
    
    public function create_param_branch(){
        if($this->session->has_userdata('username')){
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Tambah Kota';
            $result['content'] = 'create_param_branch';
            $this->load->view('home', $result);
        }else{
            redirect('/');
        }
    }
    
    public function create_param_area(){
        if($this->session->has_userdata('username')){
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Tambah Area';
            $result['content'] = 'create_param_area';
            $this->load->view('home', $result);
        }else{
            redirect('/');
        }
    }
    
    public function create_as_data(){
        if($this->session->has_userdata('username')){
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Tambah Assignment Data';
            $result['content'] = 'create_as_data';
            $this->load->view('home', $result);
        }else{
            redirect('/');
        }
    } 
    
    public function create_tgh_list(){
        if($this->session->has_userdata('username')){
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Tambah Daftar Tagihan';
            $result['content'] = 'create_tgh_list';
            $this->load->view('home', $result);
        }else{
            redirect('/');
        }
    } 
    
    public function update_ms_kodepos($id){
        if($this->session->has_userdata('username')){
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Tambah Data Karyawan';
            $result['records'] = $this->Content_model->get_ms_kodepos_one($id);
            $result['content'] = 'update_ms_kodepos';
            $this->load->view('home', $result);
        }else{
            redirect('/');
        }
    } 
    
    public function update_ms_produk($id){
        if($this->session->has_userdata('username')){
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Update Produk';
            $result['records'] = $this->Content_model->get_ms_produk_one($id);
            $result['content'] = 'update_ms_produk';
            $this->load->view('home', $result);
        }else{
            redirect('/');
        }
    } 
    
    public function create_ms_produk(){
        if($this->session->has_userdata('username')){
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Tambah Produk';
            $result['content'] = 'create_ms_produk';
            $this->load->view('home', $result);
        }else{
            redirect('/');
        }
    } 
    
    public function create_ms_kodepos(){
        if($this->session->has_userdata('username')){
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Tambah Data Karyawan';
            $result['content'] = 'create_ms_kodepos';
            $this->load->view('home', $result);
        }else{
            redirect('/');
        }
    } 
    
    public function create_um_datakaryawan(){
        if($this->session->has_userdata('username')){
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Tambah Data Karyawan';
            $result['content'] = 'create_um_datakaryawan';
            $this->load->view('home', $result);
        }else{
            redirect('/');
        }
    } 
    
    public function create_mntr_lelang(){
        if($this->session->has_userdata('username')){
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Tambah Data Lelang';
            $result['content'] = 'create_mntr_lelang';
            $this->load->view('home', $result);
        }else{
            redirect('/');
        }
    } 
    
    public function create_sp_administration(){
        if($this->session->has_userdata('username')){
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Tambah SP Administrasi';
            $result['content'] = 'create_sp_administration';
            
            $this->load->view('home', $result);
        }else{
            redirect('/');
        }
    } 
    
    public function update_sp_administration($id){
        if($this->session->has_userdata('username')){
            $result['data'] = $this->Menu_model->loadMenu();
            $result['row'] = $this->Content_model->get_sp_administration_one($id);
            $result['pagename'] = 'Edit SP Administrasi';
            $result['content'] = 'update_sp_administration';
            
            $this->load->view('home', $result);
        }else{
            redirect('/');
        }
    } 
    
    public function update_mntr_lelang($id){
        if($this->session->has_userdata('username')){
            $result['data'] = $this->Menu_model->loadMenu();
            $result['row'] = $this->Content_model->get_mntr_lelang_one($id);
            $result['pagename'] = 'Edit Data Lelang';
            $result['content'] = 'update_mntr_lelang';
            $this->load->view('home', $result);
        }else{
            redirect('/');
        }
    } 
    
    public function update_um_datakaryawan($id){
        if($this->session->has_userdata('username')){
            $result['data'] = $this->Menu_model->loadMenu();
            $result['karyawan'] = $this->Content_model->get_um_datakaryawan_one($id);
            $result['pagename'] = 'Update Data Karyawan';
            $result['content'] = 'update_um_datakaryawan';
            $this->load->view('home', $result);
        }else{
            redirect('/');
        }
    } 
    
    public function create_um_agent(){
        if($this->session->has_userdata('username')){
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Tambah Agent';
            $result['content'] = 'create_um_agent';
            $this->load->view('home', $result);
        }else{
            redirect('/');
        }
    }    
    
    public function update_tgh_list($id){
        if($this->session->has_userdata('username')){
            $result['data'] = $this->Menu_model->loadMenu();
            $result['fields'] = $this->Content_model->get_tgh_list_one($id);
            $result['pagename'] = 'Update Daftar Tagihan';
            $result['content'] = 'update_tgh_list';
            $this->load->view('home', $result);
        }else{
            redirect('/');
        }
    } 
    
    public function view_as_data($id){
        if($this->session->has_userdata('username')){
            $result['data'] = $this->Menu_model->loadMenu();
            $result['assignment'] = $this->Content_model->get_as_data_one($id);
            $result['pagename'] = 'Update Assignment Data';
            $result['content'] = 'view_as_data';
            $this->load->view('home', $result);
        }else{
            redirect('/');
        }
    } 
    
    public function update_as_data($id){
        if($this->session->has_userdata('username')){
            $result['data'] = $this->Menu_model->loadMenu();
            $result['assignment'] = $this->Content_model->get_as_data_one($id);
            $result['pagename'] = 'Transfer Assignment';
            $result['content'] = 'update_as_data';
            $this->load->view('home', $result);
        }else{
            redirect('/');
        }
    } 
    
    public function update_um_agent($id){
        if($this->session->has_userdata('username')){
            $result['data'] = $this->Menu_model->loadMenu();
            $result['agent'] = $this->Content_model->get_um_agent_one($id);
            $result['pagename'] = 'Update Agent Data';
            $result['content'] = 'update_um_agent';
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

            $this->update_notif();
            
            $this->Content_model->update_param_city_process($id_kota, $city_name, $status);            
            redirect('content/read_param_city');
        }else{
            redirect('/');
        }
    }
    
    

    
    public function update_param_city($id){
        if($this->session->has_userdata('username')){
            $result['data'] = $this->Menu_model->loadMenu();
            $result['city'] = $this->Content_model->get_city_one($id);
            $result['pagename'] = 'Update Data Kota';
            $result['content'] = 'update_param_city';
            
            

            $this->load->view('home', $result);
        }else{
            redirect('/');
        }
    }
    
    public function update_param_branch($id){
        if($this->session->has_userdata('username')){
            $result['data'] = $this->Menu_model->loadMenu();
            $result['branch'] = $this->Content_model->get_branch_one($id);
            $result['pagename'] = 'Update Data Branch';
            $result['content'] = 'update_param_branch';
            $this->load->view('home', $result);
        }else{
            redirect('/');
        }
    }
    
    public function update_param_area($id){
        if($this->session->has_userdata('username')){
            $result['data'] = $this->Menu_model->loadMenu();
            $result['area'] = $this->Content_model->get_area_one($id);
            $result['pagename'] = 'Update Data Area';
            $result['content'] = 'update_param_area';
            $this->load->view('home', $result);
        }else{
            redirect('/');
        }
    }
    
    public function read_tgh_list(){
        if($this->session->has_userdata('username')){
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Data Tagihan';
            $result['assignment'] = $this->Content_model->get_tgh_list();
            $result['content'] = 'read_tgh_list';
            $this->load->view('home', $result);                 
        }else{
            redirect('/');
        }
    }
    
    public function read_as_agentproduct(){
        if($this->session->has_userdata('username')){
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Agent Product';
            $result['assignment'] = $this->Content_model->get_as_agentproduct();
            $result['content'] = 'read_as_agentproduct';
            $this->load->view('home', $result);                 
        }else{
            redirect('/');
        }
    }
    
    public function read_as_datamanual(){
        if($this->session->has_userdata('username')){
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Manual Assignment';
            $result['assignment'] = $this->Content_model->get_as_datamanual();
            $result['content'] = 'read_as_datamanual';
            $this->load->view('home', $result);                 
        }else{
            redirect('/');
        }
    }
    
    public function read_as_datadetail($as_id){
        if($this->session->has_userdata('username')){
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Data Assignment';
            $result['assignment'] = $this->Content_model->get_as_datadetail($as_id);
            $result['content'] = 'read_as_datadetails';
            $this->load->view('home', $result);                 
        }else{
            redirect('/');
        }
    }
    
    public function read_dt_visit(){
        if($this->session->has_userdata('username')){
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Data Visit';
            $result['assignment'] = $this->Content_model->get_dt_visit();
            $result['content'] = 'read_dt_visit';
            $this->load->view('home', $result);                 
        }else{
            redirect('/');
        }
    }
    
    public function read_dk_harian(){
        if($this->session->has_userdata('username')){
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Data Kunjungan Harian';
            $result['assignment'] = $this->Content_model->get_dk_harian();
            $result['content'] = 'read_dk_harian';
            $this->load->view('home', $result);                 
        }else{
            redirect('/');
        }
    }
   
    
    public function read_dt_survey(){
        if($this->session->has_userdata('username')){
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Data Kunjungan Harian';
            $result['assignment'] = $this->Content_model->get_dt_survey();
            $result['content'] = 'read_dt_survey';
            $this->load->view('home', $result);                 
        }else{
            redirect('/');
        }
    }
    
    public function read_as_data(){
        if($this->session->has_userdata('username')){
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Data Assignment';
            $result['assignment'] = $this->Content_model->get_as_data();
            $result['content'] = 'read_as_data';
            $this->load->view('home', $result);                 
        }else{
            redirect('/');
        }
    }
    
    public function read_sp_administration(){
        if($this->session->has_userdata('username')){
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'SP Administrasi';
            $result['content'] = 'read_sp_administration';
            
            $this->load->view('home', $result);                 
        }else{
            redirect('/');
        }
    }
    
    function get_sp_administration(){  
        if($this->session->has_userdata('username')){
            $table = "t_administrationsp";
            $select_column = '*';
            $order_column = array(null, "f_jenisSp", "f_produk", "f_DPDmin", "f_masaBerlaku", null);
            $order_query = 'f_jenisSp';
            $like = array(            
                        "f_jenisSp" => $_POST["search"]["value"],
                        "f_produk" => $_POST["search"]["value"]
                    );
            
            $where = array(
                        'f_jenisSp !=' => '0'
                    );
            
            
            $fetch_data = $this->Content_model->make_datatables($table, $select_column, $order_column, $order_query, $like, $where);  
//            echo $this->db2->last_query();
            $data = array();  
            foreach($fetch_data as $row)  
            {  
                $sub_array = array();  
                $sub_array[] = "<p class='text-center'><input class='ceklis' type='checkbox' value='$row->f_jenisSp' name='idnya[]'/></p>";
                $sub_array[] = $row->f_jenisSp;
                $sub_array[] = $row->f_produk;
                $sub_array[] = $row->f_DPDmin;
                $sub_array[] = $row->f_masaBerlaku;
                $sub_array[] = "<a title='Edit' href='". base_url('content/update_sp_administration/'.$row->f_jenisSp)."'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>";
               
                
                $data[] = $sub_array;
            }  
            $output = array(  
                 "draw" => intval($_POST["draw"]),  
                 "recordsTotal" => $this->Content_model->get_all_data($table, $select_column, $order_column, $order_query, $like, $where),  
                 "recordsFiltered" => $this->Content_model->get_filtered_data($table, $select_column, $order_column, $order_query, $like, $where),  
                 "data" => $data  
            );  
            echo json_encode($output);  
          }   
    }    
    
  
    
    
    public function read_mt_lelang(){
        if($this->session->has_userdata('username')){
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Lelang';
            $result['content'] = 'read_mt_lelang';
            
            $this->load->view('home', $result);                 
        }else{
            redirect('/');
        }
    }
    
    public function read_va_instalment(){
        if($this->session->has_userdata('username')){
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Pending Instalment';
            
            $result['content'] = 'read_va_instalment';
            
            $this->load->view('home', $result);                 
        }else{
            redirect('/');
        }
    }
    
    function get_va_instalment(){  
        if($this->session->has_userdata('username')){
            $table = "t_assigndetail";
            $select_column = 't_accountlist.f_custname, t_assigndetail.*';
            $order_column = array("f_assignid", "f_assigndate", "f_agentid", "f_cif", "f_acctno", "f_custname", "f_loanid", "f_productid", null);
            $order_query = 'f_assignid';
            $like = array(            
                        "t_assigndetail.f_assignid" => $_POST["search"]["value"],
                        "t_assigndetail.f_agentid" => $_POST["search"]["value"]
                    );     
            
            if($_POST['mtanggal'] != '' && $_POST['ntanggal'] !=''){
                $mtanggal = DateTime::createFromFormat('D, d M Y', $_POST['mtanggal'])->format('Y-m-d');
                $ntanggal = DateTime::createFromFormat('D, d M Y', $_POST['ntanggal'])->format('Y-m-d');
                $where = array(
                            't_assigndetail.f_status' => '0',
                            't_assigndetail.f_assigndate >=' => $mtanggal,
                            't_assigndetail.f_assigndate <=' => $ntanggal
                        );
            }else{
                $where = array(
                            't_assigndetail.f_status' => '0'
                        );                
            }
            
            $fetch_data = $this->Content_model->make_datatables_compact($table, $select_column, $order_column, $order_query, $like, $where, $where);
                
            echo json_encode($fetch_data);  
          }   
    }
    
    function get_mntr_lelang(){  
        if($this->session->has_userdata('username')){
            $table = "t_lelang";
            $select_column = '*';
            $order_column = array(null, "f_debtNum",  "f_bankAccount",  "f_CIFnum",  "f_custName",  "f_productName",  "f_debtStartingDate",  "f_debtDueDate",  "f_tenor",  "f_instDate",  "f_maintenance_branch",  "f_billingzipcode",  "f_DPD_EOM",  "f_bucket",  "f_angsuran",  "f_bakiDebet",  "f_tunggakanPokok",  "f_bunga",  "f_denda",  "f_totTagihan",  "f_tglAkhirPembayaran",  "f_nominalTerakhirPembayaran",  "f_tglRestruktur",  "f_restrukturKe",  "f_tglUpdateT24");
            $order_query = 'f_bankAccount';
            $like = array(            
                        "f_bankAccount" => $_POST["search"]["value"],
                        "f_CIFnum" => $_POST["search"]["value"]
                    );
            
            $where = array(
                        'f_bankAccount !=' => '0'
                    );
            
            
            $fetch_data = $this->Content_model->make_datatables($table, $select_column, $order_column, $order_query, $like, $where);  
//            echo $this->db2->last_query();
            $data = array();  
            foreach($fetch_data as $row)  
            {  
                $sub_array = array();  
                $sub_array[] = "<p class='text-center'><input class='ceklis' type='checkbox' value='$row->f_debtNum' name='idnya[]'/></p>";
                $sub_array[] = $row->f_debtNum;
                $sub_array[] = $row->f_bankAccount;
                $sub_array[] = $row->f_CIFnum;
                $sub_array[] = $row->f_custName;
                $sub_array[] = $row->f_productName;
                $sub_array[] = "<p style='white-space: nowrap; color: black;'>".$this->convertNumbertoDate(substr($row->f_debtStartingDate, 0, 10))."</p>";
                $sub_array[] = "<p style='white-space: nowrap; color: black;'>".$this->convertNumbertoDate($row->f_debtDueDate)."<p>";
                $sub_array[] = $row->f_tenor;
                $sub_array[] = "<p style='white-space: nowrap; color: black;'>".$this->convertNumbertoDate($row->f_instDate)."</p>";
                $sub_array[] = $row->f_maintenance_branch;
                $sub_array[] = $row->f_billingzipcode;
                $sub_array[] = $row->f_DPD_EOM;
                $sub_array[] = $row->f_bucket;
                $sub_array[] = $row->f_angsuran;
                $sub_array[] = $row->f_bakiDebet;
                $sub_array[] = $row->f_tunggakanPokok;
                $sub_array[] = $row->f_bunga;
                $sub_array[] = $row->f_denda;
                $sub_array[] = $row->f_totTagihan;
                $sub_array[] = "<p style='white-space: nowrap; color: black;'>".$this->convertNumbertoDate($row->f_tglAkhirPembayaran)."</p>";
                $sub_array[] = $row->f_nominalTerakhirPembayaran;
                $sub_array[] = "<p style='white-space: nowrap; color: black;'>".$this->convertNumbertoDate($row->f_tglRestruktur)."</p>";
                $sub_array[] = $row->f_restrukturKe;
                $sub_array[] = "<p style='white-space: nowrap; color: black;'>".$this->convertNumbertoDate($row->f_tglUpdateT24)."</p>";
                $sub_array[] = "<a title='Edit' href='". base_url('content/update_mntr_lelang/'.$row->f_debtNum)."'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>";
               
                 
                $data[] = $sub_array;
            }  
            $output = array(  
                 "draw" => intval($_POST["draw"]),  
                 "recordsTotal" => $this->Content_model->get_all_data($table, $select_column, $order_column, $order_query, $like, $where),  
                 "recordsFiltered" => $this->Content_model->get_filtered_data($table, $select_column, $order_column, $order_query, $like, $where),  
                 "data" => $data  
            );  
            echo json_encode($output);  
          }   
    }
    
    
//    ========================================================================
    public function read_um_map(){
        if($this->session->has_userdata('username')){
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Map';
            $result['content'] = 'maps-gmap';
            $this->load->view('home', $result);                 
        }else{
            redirect('/');
        }
    }
    
    public function read_ms_produk(){
        if($this->session->has_userdata('username')){
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Produk';
            $result['records'] = $this->Content_model->get_ms_produk();
            $result['content'] = 'read_ms_produk';
            $this->load->view('home', $result);                 
        }else{
            redirect('/');
        }
    }
    
    public function read_ms_kodepos(){
        if($this->session->has_userdata('username')){
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Kode Pos';
            $result['records'] = $this->Content_model->get_ms_kodepos();
            $result['content'] = 'read_ms_kodepos';
            $this->load->view('home', $result);                 
        }else{
            redirect('/');
        }
    }
    
    public function read_um_datakaryawan(){
        if($this->session->has_userdata('username')){
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Data Karyawan';
            $result['karyawan'] = $this->Content_model->get_um_datakaryawan();
            $result['content'] = 'read_um_datakaryawan';
            $this->load->view('home', $result);                 
        }else{
            redirect('/');
        }
    }
    
    public function read_um_agent(){
        if($this->session->has_userdata('username')){
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Agent';
            $result['agent'] = $this->Content_model->get_um_agent();
            $result['content'] = 'read_um_agent';
            $this->load->view('home', $result);                 
        }else{
            redirect('/');
        }
    }
    
    public function read_param_branch(){
        if($this->session->has_userdata('username')){
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Branch';
            $result['branch'] = $this->Content_model->get_param_branch();
            $result['content'] = 'read_param_branch';
            $this->load->view('home', $result);                 
        }else{
            redirect('/');
        }
    }
    
    public function read_param_city(){
        if($this->session->has_userdata('username')){
            $result['data'] = $this->Menu_model->loadMenu();
            $result['city'] = $this->Content_model->get_param_city();
            $result['pagename'] = 'Kota';
            $result['content'] = 'read_param_city';
            $this->load->view('home', $result);                 
        }else{
            redirect('/');
        }
    }
    
    public function read_param_area(){
        if($this->session->has_userdata('username')){
            $result['data'] = $this->Menu_model->loadMenu();
            $result['area'] = $this->Content_model->get_param_area();
            $result['pagename'] = 'Area';
            $result['content'] = 'read_param_area';
            $this->load->view('home', $result);                 
        }else{
            redirect('/');
        }
    }
    
    public function create_param_city_process(){
        $id_kota = $this->input->post('id_kota');
        $city_name = $this->input->post('city_name');
        $status = $this->input->post('status');
        
        $this->Content_model->create_param_city_process($id_kota, $city_name, $status);
        redirect('content/read_param_city');
    }
    
    public function create_param_branch_process(){
        $id_branch = $this->input->post('id_branch');
        $branch_name = $this->input->post('branch_name');
        $id_area = $this->input->post('id_area');
        $address = $this->input->post('address');
        $id_kota = $this->input->post('id_kota');
        $postal_code = $this->input->post('postal_code');
         
        $this->Content_model->create_param_branch_process($id_branch, $branch_name, $id_area, $address, $id_kota, $postal_code);
        redirect('content/read_param_branch');
    }
    
    public function update_param_branch_process(){
        $id_branch = $this->input->post('id_branch');
        $branch_name = $this->input->post('branch_name');
        $id_area = $this->input->post('id_area');
        $address = $this->input->post('address');
        $id_kota = $this->input->post('id_kota');
        $postal_code = $this->input->post('postal_code');
         
        $this->Content_model->update_param_branch_process($id_branch, $branch_name, $id_area, $address, $id_kota, $postal_code);
        $this->update_notif();
        redirect('content/read_param_branch');
    }
    
    public function update_um_agent_process(){
        $id_agen = $this->input->post('id_agen');
        $nik = $this->input->post('f_agentid');
        $agent_name = $this->input->post('agent_name');
        $id_branch = $this->input->post('id_branch');
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $no_hp = $this->input->post('no_hp');
        $imei = $this->input->post('imei');
        $phone_sn = $this->input->post('phone_sn');
        
        $this->Content_model->update_um_agent_process($id_agen, $nik, $agent_name, $id_branch, $username, $email, $no_hp, $imei, $phone_sn);
        echo $this->db2->last_query();
        $this->update_notif();
        redirect('content/read_um_agent');
    }

    public function update_tgh_list_process(){
        $data = array(
            'f_cif' => $this->input->post('f_cif'),
            'f_acctno' => $this->input->post('f_acctno'),
            'f_loanid' => $this->input->post('f_loanid'),
            'f_productid' => $this->input->post('f_productid'),
            'f_tenor' => $this->input->post('f_tenor'),
            'f_tenorunit' => $this->input->post('f_tenorunit'),
            'f_startdate' => $this->convertDatetoNumber($this->input->post('f_startdate')),
            'f_duedate' => $this->convertDatetoNumber($this->input->post('f_duedate')),
            'f_installmentdate' => $this->convertDatetoNumber($this->input->post('f_installmentdate')),
            'f_tagihanpokok' => $this->input->post('f_tagihanpokok'),
            'f_tagihanbunga' => $this->input->post('f_tagihanbunga'),
            'f_tagihandenda' => $this->input->post('f_tagihandenda'),
            'f_homeaddreass' => $this->input->post('f_homeaddreass'),
            'f_homecity' => $this->input->post('f_homecity'),
            'f_homepostcode' => $this->input->post('f_homepostcode'),
            'f_officeaddreaa' => $this->input->post('f_officeaddreaa'),
            'f_officecity' => $this->input->post('f_officecity'),
            'f_officepostcode' => $this->input->post('f_officepostcode'),
            'f_buzaddress' => $this->input->post('f_buzaddress'),
            'f_buzcity' => $this->input->post('f_buzcity'),
            'f_buzpostcode' => $this->input->post('f_buzpostcode'),
            'f_assigndate' => $this->convertDatetoNumber($this->input->post('f_assigndate')),
            'f_assignid' => $this->input->post('f_assignid'),
            'f_agentid' => $this->input->post('f_agentid'),
            'f_status' => $this->input->post('f_status'),
            'f_usercreate' => $this->session->userdata('username'),
            'f_datecreate' => date('Y-m-d'),
            'f_userupdate' => $this->session->userdata('username'),
            'f_dateupdate' => date('Y-m-d')
        );
        
        $this->Content_model->update_tgh_list_process($data);
        redirect('content/read_tgh_list');
    }
    
    public function create_tgh_list_process(){
    $a = array(
            'f_branch_id',
            'f_cif',
            'f_acctno',
            'f_custname',
            'f_loanid',
            'f_productid',
            'f_tenor',
            'f_tenorunit',
            'f_dpd',
            'f_cycle',
            'f_pokok',
            'f_bunga',
            'f_outstanding',
            'f_startdate',
            'f_duedate',
            'f_installmentdate',
            'f_tagihanpokok',
            'f_tagihanbunga',
            'f_tagihandenda',
            'f_homeaddreass',
            'f_homecity',
            'f_homepostcode',
            'f_officeaddreaa',
            'f_officecity',
            'f_officepostcode',
            'f_buzaddress',
            'f_buzcity',
            'f_buzpostcode',
            'f_assigndate',
            'f_assignid',
            'f_agentid',
            'f_recordown',            
            'f_status',
            'f_usercreate',
            'f_datecreate',
            'f_userupdate',
            'f_dateupdate'
        );        
        
        $data = array(
            'f_branch_id' => $this->input->post('f_branch_id'),
            
            'f_cif' => $this->input->post('f_cif'),
            'f_acctno' => $this->input->post('f_acctno'),
            'f_custname' => $this->input->post('f_custname'),
            'f_loanid' => $this->input->post('f_loanid'),
            'f_productid' => $this->input->post('f_productid'),
            'f_tenor' => $this->input->post('f_tenor'),
            'f_tenorunit' => $this->input->post('f_tenorunit'),
            
            'f_dpd' => $this->input->post('f_dpd'),
            'f_cycle' => $this->input->post('f_cycle'),
            'f_pokok' => $this->input->post('f_pokok'),
            'f_bunga' => $this->input->post('f_bunga'),
            'f_outstanding' => $this->input->post('f_outstanding'),
            
            'f_startdate' => $this->convertDatetoNumber($this->input->post('f_startdate')),
            'f_duedate' => $this->convertDatetoNumber($this->input->post('f_duedate')),
            'f_installmentdate' => $this->convertDatetoNumber($this->input->post('f_installmentdate')),
            'f_tagihanpokok' => $this->input->post('f_tagihanpokok'),
            'f_tagihanbunga' => $this->input->post('f_tagihanbunga'),
            'f_tagihandenda' => $this->input->post('f_tagihandenda'),
            'f_homeaddreass' => $this->input->post('f_homeaddreass'),
            'f_homecity' => $this->input->post('f_homecity'),
            'f_homepostcode' => $this->input->post('f_homepostcode'),
            'f_officeaddreaa' => $this->input->post('f_officeaddreaa'),
            'f_officecity' => $this->input->post('f_officecity'),
            'f_officepostcode' => $this->input->post('f_officepostcode'),
            'f_buzaddress' => $this->input->post('f_buzaddress'),
            'f_buzcity' => $this->input->post('f_buzcity'),
            'f_buzpostcode' => $this->input->post('f_buzpostcode'),
            'f_assigndate' => $this->convertDatetoNumber($this->input->post('f_assigndate')),
            'f_assignid' => $this->input->post('f_assignid'),
            'f_agentid' => $this->input->post('f_agentid'),
            
            'f_recordown' => 'External',   
            
            'f_status' => $this->input->post('f_status'),
            'f_usercreate' => $this->session->userdata('username'),
            'f_datecreate' => date('Y-m-d'),
            'f_userupdate' => $this->session->userdata('username'),
            'f_dateupdate' => date('Y-m-d')
        );
        
        $this->Content_model->create_tgh_list_process($data);
        redirect('content/read_tgh_list');
    }
    
    
    public function create_as_data_process(){
        $f_assignid = $this->input->post('f_assignid');
        $f_assigndate = DateTime::createFromFormat('D, d M Y', $this->input->post('f_assigndate'))->format('Y-m-d');
        $f_agentid = $this->input->post('f_agentid');
        $f_status = $this->input->post('f_status');
        $f_rectotal = $this->input->post('f_rectotal');
        $f_recdone = $this->input->post('f_recdone');
        $f_trftoagentid = $this->input->post('f_trftoagentid');
        $f_originagent = $this->input->post('f_originagent');
        $f_trfdate = DateTime::createFromFormat('D, d M Y', $this->input->post('f_trfdate'))->format('Y-m-d');
        
        $this->Content_model->create_as_data_process($f_assignid, $f_assigndate, $f_agentid, $f_status, $f_rectotal, $f_recdone, $f_trftoagentid, $f_originagent,$f_trfdate);
        redirect('content/read_as_datamanual');
    }
    
    public function update_as_data_process(){
        $f_assignid = $this->input->post('f_assignid');
        $f_agentid = $this->input->post('f_trftoagentid');
        $f_trftoagentid = $this->input->post('f_trftoagentid');
        $f_originagent = $this->input->post('f_agentid');
        $f_trfdate = date('Y-m-d');
        
        $this->Content_model->update_as_data_process($f_assignid, $f_agentid, $f_trftoagentid, $f_originagent, $f_trfdate);
//        $this->update_notif();
        redirect('content/read_as_data');
    }
    
    public function update_ms_kodepos_process(){
        $data = array(
            'f_postcode' => $this->input->post('f_postcode'),
            'f_description' => $this->input->post('f_description'),
            'f_notes' => $this->input->post('f_notes'),
            'f_userupdate' => $this->session->userdata('username'),
            'f_dateupdate' => date('Y-m-d')
        );
        
        $this->Content_model->update_ms_kodepos_process($data);
        
        $this->update_notif();        
        
        redirect('content/read_ms_kodepos');
    }
    
    public function update_ms_produk_process(){
        $data = array(
            'f_productid' => $this->input->post('f_productid'),
            'f_productname' => $this->input->post('f_productname'),
            'f_active' => $this->input->post('f_active'),
            'f_usercreate' => $this->session->userdata('username'),
            'f_datecreate' => date('Y-m-d'),
            'f_userupdate' => $this->session->userdata('username'),
            'f_dateupdate' => date('Y-m-d')
        );
        
        $this->Content_model->update_ms_produk_process($data);
        
        $this->update_notif();
        
        redirect('content/read_ms_produk');
    }
    
    public function create_ms_produk_process(){
        $data = array(
            'f_productid' => $this->input->post('f_productid'),
            'f_productname' => $this->input->post('f_productname'),
            'f_active' => $this->input->post('f_active'),
            'f_usercreate' => $this->session->userdata('username'),
            'f_datecreate' => date('Y-m-d'),
            'f_userupdate' => $this->session->userdata('username'),
            'f_dateupdate' => date('Y-m-d')
        );
        
        $this->Content_model->create_ms_produk_process($data);
        
        redirect('content/read_ms_produk');
    }
    
    public function create_ms_kodepos_process(){
        $data = array(
            'f_postcode' => $this->input->post('f_postcode'),
            'f_description' => $this->input->post('f_description'),
            'f_notes' => $this->input->post('f_notes'),
            'f_usercreate' => $this->session->userdata('username'),
            'f_datecreate' => date('Y-m-d'),
            'f_userupdate' => $this->session->userdata('username'),
            'f_dateupdate' => date('Y-m-d')
        );
        
        $this->Content_model->create_ms_kodepos_process($data);
        
        redirect('content/read_ms_kodepos');
    }
    
    public function create_um_datakaryawan_process(){
        $data = array(
            'f_nik' => $this->input->post('f_nik'),
            'f_empname' => $this->input->post('f_empname'),
            'f_compid' => $this->input->post('f_compid'),
            'f_deptid' => $this->input->post('f_deptid'),
            'f_groupid' => $this->input->post('f_groupid'),
            'f_divid' => $this->input->post('f_divid'),
            'f_unitid' => $this->input->post('f_unitid'),
            'f_branch_id' => $this->input->post('f_branch_id'),
            'f_positionid' => $this->input->post('f_positionid'),
            'f_nohp' => $this->input->post('f_nohp'),
            'f_email' => $this->input->post('f_email'),
            'f_active' => $this->input->post('f_active'),
            'f_usercreate' => $this->session->userdata('username'),
            'f_datecreate' => date('Y-m-d'),
            'f_userupdate' => $this->session->userdata('username'),
            'f_dateupdate' => date('Y-m-d')
        );
        
        $this->Content_model->create_um_datakaryawan_process($data);
        
        redirect('content/read_um_datakaryawan');
    }
    
    public function create_mntr_lelang_process(){
        $data = array(
            "f_debtNum"  => $this->input->post('f_debtNum'),
            "f_bankAccount" => $this->input->post('f_bankAccount'),
            "f_CIFnum" => $this->input->post('f_CIFnum'),
            "f_custName" => $this->input->post('f_custName'),
            "f_productName" => $this->input->post('f_productName'),
//            "f_debtStartingDate" => DateTime::createFromFormat('D, d M Y', $this->input->post('f_debtStartingDate'))->format('Y-m-d H:i:s'),
            "f_debtDueDate" => DateTime::createFromFormat('D, d M Y', $this->input->post('f_debtDueDate'))->format('Y-m-d'),
            "f_tenor" => $this->input->post('f_tenor'),
            "f_instDate" => DateTime::createFromFormat('D, d M Y', $this->input->post('f_instDate'))->format('Y-m-d'),
            "f_maintenance_branch" => $this->input->post('f_maintenance_branch'),
            "f_billingzipcode" => $this->input->post('f_billingzipcode'),
            "f_DPD_EOM" => $this->input->post('f_DPD_EOM'),
            "f_bucket" => $this->input->post('f_bucket'),
            "f_angsuran" => $this->input->post('f_angsuran'),
            "f_bakiDebet" => $this->input->post('f_bakiDebet'),
            "f_tunggakanPokok" => $this->input->post('f_tunggakanPokok'),
            "f_bunga" => $this->input->post('f_bunga'),
            "f_denda" => $this->input->post('f_denda'),
            "f_totTagihan" => $this->input->post('f_totTagihan'),
            "f_tglAkhirPembayaran" => DateTime::createFromFormat('D, d M Y', $this->input->post('f_tglAkhirPembayaran'))->format('Y-m-d'),
            "f_nominalTerakhirPembayaran" => $this->input->post('f_nominalTerakhirPembayaran'),
            "f_tglRestruktur" => DateTime::createFromFormat('D, d M Y', $this->input->post('f_tglRestruktur'))->format('Y-m-d'),
            "f_restrukturKe" => $this->input->post('f_restrukturKe'),
            "f_tglUpdateT24"  => DateTime::createFromFormat('D, d M Y', $this->input->post('f_tglUpdateT24'))->format('Y-m-d')

        );
        
//        print_r($data);
        $this->Content_model->create_mntr_lelang_process($data);
        
        redirect('content/read_mt_lelang');
    }
    
    public function create_sp_administration_process(){
        $data = array(
            "f_jenisSp" => $this->input->post('f_jenisSp'),
            "f_produk" => $this->input->post('f_produk'),
            "f_DPDmin" => $this->input->post('f_DPDmin'),
            "f_masaBerlaku" => $this->input->post('f_masaBerlaku'),
        );
        
        $this->Content_model->create_sp_administration_process($data);
        
        redirect('content/read_sp_administration');
    }
    
    public function update_sp_administration_process(){
        $data = array(
            "f_jenisSp" => $this->input->post('f_jenisSp'),
            "f_produk" => $this->input->post('f_produk'),
            "f_DPDmin" => $this->input->post('f_DPDmin'),
            "f_masaBerlaku" => $this->input->post('f_masaBerlaku'),
        );
        
        $this->Content_model->update_sp_administration_process($data);
        
        redirect('content/read_sp_administration');
    }
    
    public function update_mntr_lelang_process(){
        $data = array(
            "f_debtNum"  => $this->input->post('f_debtNum'),
            "f_bankAccount" => $this->input->post('f_bankAccount'),
            "f_CIFnum" => $this->input->post('f_CIFnum'),
            "f_custName" => $this->input->post('f_custName'),
            "f_productName" => $this->input->post('f_productName'),
            "f_debtStartingDate" => DateTime::createFromFormat('D, d M Y H:i:s', $this->input->post('f_debtStartingDate'))->format('Y-m-d'),
            "f_debtDueDate" => DateTime::createFromFormat('D, d M Y', $this->input->post('f_debtDueDate'))->format('Y-m-d'),
            "f_tenor" => $this->input->post('f_tenor'),
            "f_instDate" => DateTime::createFromFormat('D, d M Y', $this->input->post('f_instDate'))->format('Y-m-d'),
            "f_maintenance_branch" => $this->input->post('f_maintenance_branch'),
            "f_billingzipcode" => $this->input->post('f_billingzipcode'),
            "f_DPD_EOM" => $this->input->post('f_DPD_EOM'),
            "f_bucket" => $this->input->post('f_bucket'),
            "f_angsuran" => $this->input->post('f_angsuran'),
            "f_bakiDebet" => $this->input->post('f_bakiDebet'),
            "f_tunggakanPokok" => $this->input->post('f_tunggakanPokok'),
            "f_bunga" => $this->input->post('f_bunga'),
            "f_denda" => $this->input->post('f_denda'),
            "f_totTagihan" => $this->input->post('f_totTagihan'),
            "f_tglAkhirPembayaran" => DateTime::createFromFormat('D, d M Y', $this->input->post('f_tglAkhirPembayaran'))->format('Y-m-d'),
            "f_nominalTerakhirPembayaran" => $this->input->post('f_nominalTerakhirPembayaran'),
            "f_tglRestruktur" => DateTime::createFromFormat('D, d M Y', $this->input->post('f_tglRestruktur'))->format('Y-m-d'),
            "f_restrukturKe" => $this->input->post('f_restrukturKe'),
            "f_tglUpdateT24"  => DateTime::createFromFormat('D, d M Y', $this->input->post('f_tglUpdateT24'))->format('Y-m-d')

        );
        
        $this->Content_model->update_mntr_lelang_process($data);
        
        redirect('content/read_mt_lelang');
    }
    
    public function update_um_datakaryawan_process(){
        $data = array(
            'f_nik' => $this->input->post('f_nik'),
            'f_empname' => $this->input->post('f_empname'),
            'f_compid' => $this->input->post('f_compid'),
            'f_deptid' => $this->input->post('f_deptid'),
            'f_groupid' => $this->input->post('f_groupid'),
            'f_divid' => $this->input->post('f_divid'),
            'f_unitid' => $this->input->post('f_unitid'),
            'f_branch_id' => $this->input->post('f_branch_id'),
            'f_positionid' => $this->input->post('f_positionid'),
            'f_nohp' => $this->input->post('f_nohp'),
            'f_email' => $this->input->post('f_email'),
            'f_active' => $this->input->post('f_active'),
            'f_userupdate' => $this->session->userdata('username'),
            'f_dateupdate' => date('Y-m-d')
        );
        
        
        $this->update_notif();
        print_r($this->Content_model->update_um_datakaryawan_process($data));
        redirect('content/read_um_datakaryawan');
    }
    
    public function create_um_agent_process(){
        $id_agen = $this->input->post('id_agen');
        $nik = $this->input->post('nik');
        $agent_name = $this->input->post('agent_name');
        $id_branch = $this->input->post('id_branch');
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $no_hp = $this->input->post('no_hp');
        $imei = $this->input->post('imei');
        $phone_sn = $this->input->post('phone_sn');
        
        $this->Content_model->create_um_agent_process($id_agen, $nik, $agent_name, $id_branch, $username, $email, $no_hp, $imei, $phone_sn);
        redirect('content/read_um_agent');
    }
    
    public function create_param_area_process(){
        $id_area = $this->input->post('id_area');
        $area_name = $this->input->post('area_name');
        $notes = $this->input->post('notes');
        
        $this->Content_model->create_param_area_process($id_area, $area_name, $notes);
        redirect('content/read_param_area');
    }
    
    public function update_param_area_process(){
        $id_area = $this->input->post('id_area');
        $area_name = $this->input->post('area_name');
        $notes = $this->input->post('notes');
        
        $this->Content_model->update_param_area_process($id_area, $area_name, $notes);
        redirect('content/read_param_area');
    }
    
    public function delete_multi_param_city(){
        $selection = $this->input->post('idnya');
        $this->Content_model->delete_multi_param_city($selection);

        $this->delete_notif();                  
        
        redirect('content/read_param_city');
    }        
    
    public function delete_multi_param_branch(){
        $selection = $this->input->post('idnya');
        $this->Content_model->delete_multi_param_branch($selection);
        
        $this->delete_notif();                 
        
        redirect('content/read_param_branch');
    }        
    
    public function delete_multi_param_area(){
        $selection = $this->input->post('idnya');
        $this->Content_model->delete_multi_param_area($selection);
        
        $this->delete_notif();
        
        redirect('content/read_param_area');
    }        
    
    public function delete_multi_ms_produk(){
        $selection = $this->input->post('idnya');
        $this->Content_model->delete_multi_ms_produk($selection);
        
        $this->delete_notif();                  
        
        redirect('content/read_ms_produk');
    }
    
    public function delete_multi_sp_administration(){
        $selection = $this->input->post('idnya');
        //print_r($selection);
        $this->Content_model->delete_multi_sp_administration($selection);
        
        $this->delete_notif();                  
        
        redirect('content/read_sp_administration');
    }
    
    public function delete_multi_mntr_lelang(){
        $selection = $this->input->post('idnya');
        // print_r($selection);
        $this->Content_model->delete_multi_mntr_lelang($selection);
        
        $this->delete_notif();                  
        
        redirect('content/read_mt_lelang');
    }
    
    public function delete_multi_ms_kodepos(){
        $selection = $this->input->post('idnya');
        $this->Content_model->delete_multi_ms_kodepos($selection);
        
        $this->delete_notif();                   
        
        redirect('content/read_ms_kodepos');
    }
    
    public function delete_multi_um_datakaryawan(){
        $selection = $this->input->post('idnya');
        $this->Content_model->delete_multi_um_datakaryawan($selection);
        
        $this->delete_notif();                  
        
        redirect('content/read_um_datakaryawan');
    }
    
    public function delete_multi_um_agent(){
        $selection = $this->input->post('idnya');
        $this->Content_model->delete_multi_um_agent($selection);
        
        $this->delete_notif();                   
        
        redirect('content/read_um_agent');
    }
    
    public function delete_multi_as_agentproduct(){
        $selection = $this->input->post('idnya');
        $this->Content_model->delete_multi_as_agentproduct($selection);
        
        $this->delete_notif();                    
        
        redirect('content/read_as_agentproduct');
    }
    
    public function delete_multi_as_datamanual(){
        $selection = $this->input->post('idnya');
        $this->Content_model->delete_multi_as_datamanual($selection);
        
        $this->delete_notif();                     
        
        redirect('content/read_as_data');
    }
    
    public function delete_multi_as_data(){
        $selection = $this->input->post('idnya');
        
        $this->Content_model->delete_multi_as_data($selection);
        
        $this->delete_notif();
        
        redirect('content/read_as_data');
    }
    
    public function delete_multi_tgh_list(){
        $selection = $this->input->post('idnya');
        $this->Content_model->delete_multi_tgh_list($selection);
        
        $this->delete_notif();
        
        redirect('content/read_tgh_list');
    }
}