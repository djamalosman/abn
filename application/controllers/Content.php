<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once  APPPATH.('PHPExcel/PHPExcelMRPK/Classes/PHPExcelLelang.php');
require_once  APPPATH.('PHPExcel/PHPExcelMRPK/Classes/PHPExcel/Writer/Excel2007.php');
class Content extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('PHPExcel', 'PHPExcel/IOFactory'));
        $this->load->library('Pdfgenerator');
//         include_once APPPATH . '/third_party/fpdf/fpdf.php';
//        $this->load->library('pdf');
        $this->load->helper('file');
        $this->db = $this->load->database('default', true);	
        $this->db2 = $this->load->database('second', true);

        /* CONNECT 2 DATABASE */
        /* if($_SERVER['SERVER_NAME'] == '10.199.28.15'){
          $dsn1 = 'mysqli://root:@localhost/dbmgmtmenu';
          $this->db = $this->load->database($dsn1, true);
          $dsn2 = 'mysqli://root:@localhost/dbbsscollection';
          $this->db2= $this->load->database($dsn2, true);
          }else{
          $dsn1 = 'mysqli://xplmjdmx_C24sys:4N4G4T49876@localhost/xplmjdmx_dbmgmtmenu';
          $this->db = $this->load->database($dsn1, true);
          $dsn2 = 'mysqli://xplmjdmx_C24sys:4N4G4T49876@localhost/xplmjdmx_dbbsscollection';
          $this->db2= $this->load->database($dsn2, true);
          }
         */
        // if ($_SERVER['SERVER_NAME'] == 'localhost') {
        //     $dsn1 = 'mysqli://root:@localhost/xplmjdmx_dbmgmtmenu';
        //     $this->db = $this->load->database($dsn1, true);
        //
       //     $dsn2 = 'mysqli://root:@localhost/xplmjdmx_dbbsscollection';
        //     $this->db2 = $this->load->database($dsn2, true);
        // } else {
        //     $dsn1 = 'mysqli://xplmjdmx_C24sys:4N4G4T49876@localhost/xplmjdmx_dbmgmtmenu';
        //     $this->db = $this->load->database($dsn1, true);
        //
       //     $dsn2 = 'mysqli://xplmjdmx_C24sys:4N4G4T49876@localhost/xplmjdmx_dbbsscollection';
        //     $this->db2 = $this->load->database($dsn2, true);
        // }
//        $dsn3 = 'mysqli://root:@localhost/kspkss';
//        $this->db3= $this->load->database($dsn3, true);         
        /* CONNECT 2 DATABASE */
        $this->load->helper(array('form', 'url'));
        $this->load->library('session');
        $this->load->model('Menu_model', '', TRUE);
        $this->load->model('Content_model', '', TRUE);
        $this->load->model('Maps_model', '', TRUE);
        $this->load->model('Model_log', '', TRUE);
        $this->load->helper(array('form', 'url'));
    }

    // public function getSPaccount(){
    //     $sp=$this->Content_model->get_accountSP();
    //     return($sp);
    // }

    public function sendSPemail($value = '') {
        //var_dump($id,$status);  
        if ($this->session->has_userdata('username')) {
            $this->load->library('email');
            //$sp = $this->getSPaccount();

            $config = array(
                'charset' => 'utf-8',
                'useragent' => 'Codeigniter',
                'protocol' => "smtp",
                'mailtype' => "html",
                'smtp_host' => "mail.anagata.co.id",
                'smtp_port' => '587',
                'smtp_user' => "djamal@anagata.co.id",
                'smtp_pass' => 'Jamal123456789',
                'smtp_crypto' => 'tls',
                'crlf' => "\r\n",
                'newline' => "\r\n"
            );

            // if ($sp !=null) {

            $data = $this->db2->query("CALL accountlist");
            foreach ($data->result() as $key) {

                $a = array(
                    $key->f_email
                );



                //      foreach($data as $row =>$value) {
                // $toemail[]=$value['f_email'];  
                // print_r($toemail); 
                //$test = array('nama' => $id);
                //$mesg = $this->load->view('table_aproveAgent',$test,true);
                //foreach($penunggak as $row){ 
                $this->email->initialize($config);
                $this->email->clear(TRUE);
                $this->email->to($key->f_email);
                $this->email->from('djamal@anagata.co.id');
                $this->email->subject('Permintaan Approvel');
                $string = $this->email->message('hy pak david');

                if ($this->email->send) {

                    echo "ok";
                }



                // return TRUE;
            }
            //}
            //redirect('/');    
        }
    }

//    public function cobakirim($id, $emaildep, $status) {
    public function cobakirim() {
        //var_dump($id,$status);  
//        if ($this->session->has_userdata('username')) {
        $this->load->library('email');
//            $penunggak = $this->SP();

        $config = array(
            'charset' => 'utf-8',
            'useragent' => 'Codeigniter',
            'protocol' => "smtp",
            'mailtype' => "html",
//                'smtp_host' => "smtp.elasticemail.com",
            'smtp_host' => "ssl://smtp.gmail.com",
//                'smtp_port' => '2525',
            'smtp_port' => '465',
//                'smtp_user' => "anagata@mail.com",
            'smtp_user' => "m.dwiyan.hartono@gmail.com",
//                'smtp_pass' => '43d0f41f-044a-4188-a986-f13d2ce044b0',
            'smtp_pass' => 'dwi170897',
//                'smtp_crypto' => 'tls',
            'crlf' => "\r\n",
            'newline' => "\r\n"
        );
//            if ($status == 1 && $emaildep == $emaildep) {
//                echo "email sudah pernah di kirim";
//            } elseif ($status == 0 && $emaildep == $emaildep) {
        $this->email->initialize($config);

//                $test = array('nama' => $id);
        $test = array('nama' => 'dwiyan');

        $mesg = $this->load->view('table_aproveAgent', $test, true);
        //foreach($penunggak as $row){
        $this->email->clear(TRUE);

        $this->email->to('dahelyasinta11@gmail.com');
        $this->email->from('dwiyan@anagata.co.id');
        $this->email->subject('Permintaan Approvel');
        $string = $this->email->message($mesg);

        //$this->email->attach(FCPATH . 'pdfReports/'.$string.'.pdf');
        //$this->email->attach('views/table_aproveAgent.php');
        //$string = $this->email->message('hello');
        // kirim data berupa file $this->email->attach('files/form.pdf');
        // );
        // $filename = 'report-'.$row->f_acctno.'-'.time();
        // $this->pdf($filename, $row);
        // $this->email->attach(FCPATH . 'pdfReports/'.$filename.'.pdf');


        if ($this->email->send()) {
            echo "Email has been sent </br>";
        } else {

            echo $this->email->print_debugger();
        }
    }

    // } 
    // redirect('content/read_tgh_list');
//        } else {
//            redirect('read_param_actioncode');
//        }
//    }

    public function iseng() {
        echo $_SERVER['SERVER_NAME'];
    }

    public function SP() {
        $penunggak = $this->Content_model->get_SP();
        return ($penunggak);
    }

    public function send($value = '') {
        if ($this->session->has_userdata('username')) {
            $this->load->library('email');
            $penunggak = $this->SP();

            $config = array(
                'charset' => 'utf-8',
                'useragent' => 'Codeigniter',
                'protocol' => "smtp",
                'mailtype' => "html",
                'smtp_host' => "smtp.elasticemail.com",
                'smtp_port' => '2525',
                'smtp_user' => "anagata@mail.com",
                'smtp_pass' => '43d0f41f-044a-4188-a986-f13d2ce044b0',
                'smtp_crypto' => 'tls',
                'crlf' => "\r\n",
                'newline' => "\r\n"
            );



            $this->email->initialize($config);


            foreach ($penunggak as $row) {
                $this->email->clear(TRUE);

                $this->email->to('djamal@anagata.co.id');
                $this->email->from('anagata@mail.com', 'anagata@mail.com');
                $this->email->subject('Surat Peringatan');

                $string = $this->email->message(
                        $this->load->view('table_report', $row, true)
                );

                $filename = 'report-' . $row->f_acctno . '-' . time();
                $this->pdf($filename, $row);

                $this->email->attach(FCPATH . 'pdfReports/' . $filename . '.pdf');


                if ($this->email->send()) {
                    echo "Email has been sent </br>";
                } else {
                    // $counter = 0;
                    // while (!$this->email->send()){
                    //     $counter++;
                    //     $this->email->send();
                    //     if($counter == 10){
                    //         break;
                    //     }
                    // }
                    echo $this->email->print_debugger();
                    // echo "Email has been sent (resend method)</br>";
                }
            }
            // redirect('content/read_tgh_list');
        } else {
            redirect('read_param_actioncode');
        }
    }

//  PDF -------------
    public function pdf($filename, $row) {

//        $html = preg_replace('/>\s+</', '><', $this->load->view('table_report', $row, true));
        $html = $this->load->view('table_report', $row, true);
        $this->pdfgenerator->generate($html, $filename);
    }

    public function index() {
        if ($this->session->userdata('username')) {
            redirect('menu/home');
        } else {
            redirect('/');
        }
//        $this->load->view('table_report');
    }

//  PDF -------------

    public function convertDatetoNumber($date) {
        return DateTime::createFromFormat('D, d M Y', $date)->format('Y-m-d');
    }

    public function convertNumbertoDate($date) {
        return DateTime::createFromFormat('Y-m-d', $date)->format('D, d M Y');
    }

    public function update_notif() {
        $this->session->set_flashdata(
                "message", "<script>swal(
              'Berhasil!',
              'Data berhasil disimpan!',
              'success'
            )</script>"
        );
    }

    public function pass($key) {
        return base64_decode($key);
    }

    public function delete_notif() {
        $this->session->set_flashdata(
                "message", "<script>swal(
              'Berhasil!',
              'Data yang ditandai sudah dihapus!',
              'success'
            )</script>"
        );
    }

    public function faileddelete_notif() {
        $this->session->set_flashdata(
                "message", "<script>swal(
              'Gagal!',
              'Gagal di hapus',
              'Gagal'
            )</script>"
        );
    }

    public function gagal_input() {
        $this->session->set_flashdata(
                "message", "<script>swal(
              'Gagal!',
              'Data Gagal di input',
              'gagal'
            )</script>"
        );
    }

    public function excel_agent() {
        if ($this->session->has_userdata('username')) {
            $result['data'] = $this->Menu_model->loadMenu();
            $result['content'] = 'excel';
            $this->load->view('bss_home', $result);
//            $this->load->view('bss_home', $result); //$this->load->view('home', $result);            
        } else {
            redirect('/');
        }
    }

    public function submit_as_data() {
//        echo "hai Al Bahri </br>";
        $id = $this->input->post('idnya');
//        echo 'submit: '.$this->input->post('kirim');
        if ($this->input->post('kirim') == "proses") {
//            $this->bg_upload('t_assignheader');
            echo 'proses';
        } else if ($this->input->post('kirim') == "delete") {
//            $this->delete_multi_as_data();
            echo 'delete';
        } else if ($this->input->post('kirim') == "update_assignment") {
//            $this->update_as_data($id[0]);
            echo 'update';
        }
    }

    public function submit_as_data_CADANGAN() {
        $id = $this->input->post('idnya');
//        echo 'submit: '.$this->input->post('kirim');
        if ($this->input->post('kirim') == " Proses") {
//            $this->bg_upload('t_assignheader');
            echo 'proses';
        } else if ($this->input->post('kirim') == "") {
//            $this->delete_multi_as_data();
            echo 'delete';
        } else if ($this->input->post('kirim') == " Transfer Assignment") {
//            $this->update_as_data($id[0]);
            echo 'update';
        }
    }

    public function bg_upload($table) {

        $inputFileName = './als_asset/excel/form_assign_header.xlsx';

        try {
            $inputFileType = IOFactory::identify($inputFileName);
            $objReader = IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
        } catch (Exception $e) {
            die(' Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . $e->getMessage());
        }

        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();

        $toArray = $sheet->rangeToArray('A1:AML1', NULL, TRUE, FALSE);
        $fieldname = array_filter($toArray[0], function($x) {
            return !empty($x);
        });


        for ($row = 2; $row <= $highestRow; $row++) {                  //  Read a row of data into an array                 
            $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
            //Sesuaikan sama nama kolom tabel di database                                                                
            $data = null;

            foreach ($fieldname as $key => $item) {
                $data[$item] = $rowData[0][$key];
            }

            $insert = $this->db2->insert($table, $data);
        }

//        unlink('./als_asset/excel/uploaded_excel/'.$fileName);


        $this->session->set_flashdata(
                "message", "<script>swal(
              'Berhasil!',
              'Data sudah ditambahkan',
              'success'
            )</script>"
        );

        $this->bg_upload_tbdetail('t_assigndetail');
//tetap//        $this->bg_upload_excel_tanpa_form('t_longlat');
        redirect('content/read_as_data');
    }

    public function bg_upload_tbdetail($table) {
        $inputFileName = './als_asset/excel/form_assign_detail.xlsx';

        try {
            $inputFileType = IOFactory::identify($inputFileName);
            $objReader = IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
        } catch (Exception $e) {
            die(' Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . $e->getMessage());
        }

        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();

        $toArray = $sheet->rangeToArray('A1:AML1', NULL, TRUE, FALSE);
        $fieldname2 = array_filter($toArray[0], function($x) {
            return !empty($x);
        });


        for ($row = 2; $row <= $highestRow; $row++) {                  //  Read a row of data into an array                 
            $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);



            //Sesuaikan sama nama kolom tabel di database                                                                

            $data = null;
            foreach ($fieldname2 as $key => $item) {
                $data[$item] = $rowData[0][$key];
            }

            $insert = $this->db2->insert($table, $data);
            $errornya[] = $this->db2->error();
        }
//            print_r($errornya);
    }

    public function bg_upload_excel_tanpa_form($table) {

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
        } catch (Exception $e) {
            die(' Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . $e->getMessage());
        }

        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();


        for ($row = 2; $row <= $highestRow; $row++) {                  //  Read a row of data into an array                 
            $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);



            //Sesuaikan sama nama kolom tabel di database                                                                

            $data = null;
            foreach ($fieldname3 as $key => $item) {
                $data[$item] = $rowData[0][$key];
            }

            //sesuaikan nama dengan nama tabel
//                $insert = $this->db2->insert($table,$data);

            $insert = $this->db2->insert($table, $data);
            $errornya[] = $this->db2->error();
        }
        print_r($errornya);
    }

    public function uploadfileNpwp() {
        if (isset($_POST['submit'])) {
            $filename = $_FILES['myfile']['name'];
            $filetype = $_FILES['myfile']['type'];
            $filesize = $_FILES['myfile']['size'];
            $filedata = file_get_contents($_FILES['myfile']['tmp_name']);
            $f_agentid = $_POST['f_agentid'];
            //     $data = array(
            //     'f_agencyid' => $vid,
            //     'f_file' => $filedata
            // );
            $this->Content_model->updatefileNpwp($filedata, $f_agentid);

            // print_r($_FILES['myfile']);
//            echo $this->db->last_query();
            redirect('content/read_um_agent');
        } else {
            redirect('content/read_um_agent');
//            echo $this->db->last_query();
        }
    }

    public function CADANGAN_______bg_upload($table) {

        $inputFileName = './als_asset/excel/form_assign_header.xlsx';


        try {
            $inputFileType = IOFactory::identify($inputFileName);
            $objReader = IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
        } catch (Exception $e) {
            die(' Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . $e->getMessage());
        }

        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();


        $fieldname = $this->session->userdata('fieldname');


        for ($row = 2; $row <= $highestRow; $row++) {                  //  Read a row of data into an array                 
            $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);



            //Sesuaikan sama nama kolom tabel di database                                                                

            $data = null;
            foreach ($fieldname as $key => $item) {
                $data[$item] = $rowData[0][$key];
            }

            //sesuaikan nama dengan nama tabel
            $insert = $this->db2->insert($table, $data);

            $errornya[] = $this->db2->error();
//                $insert = $this->db2->insert($table,$data);
        }
        $this->session->unset_userdata('fieldname');
//            print_r($recordnya);
//        unlink('./als_asset/excel/uploaded_excel/'.$fileName);

        print_r($errornya);

        $this->session->set_flashdata(
                "message", "<script>swal(
              'Berhasil!',
              'Data sudah ditambahkan',
              'success'
            )</script>"
        );
        redirect('content/read_as_data');
    }

    public function excel_upload($table, $controller, $link) {
        $fileName = time() . $_FILES['file']['name'];

        $config['upload_path'] = './als_asset/excel/uploaded_excel/'; //buat folder dengan nama assets di root folder
        $config['allowed_types'] = 'xls|xlsx|csv';
        $config['max_size'] = 20000;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;
        $config['overwrite'] = true;
        $config['file_name'] = $fileName;


        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file'))
            $this->upload->display_errors();

        $media = $this->upload->data('file');

        print_r($media);
        $inputFileName = './als_asset/excel/uploaded_excel/' . $fileName;

        try {
            $inputFileType = IOFactory::identify($inputFileName);
            $objReader = IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
        } catch (Exception $e) {
            die(' Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . $e->getMessage());
        }

        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();


        $toArray = $sheet->rangeToArray('A1:AML1', NULL, TRUE, FALSE);
        $fieldname = array_filter($toArray[0], function($x) {
            return !empty($x);
        });


        for ($row = 2; $row <= $highestRow; $row++) {                  //  Read a row of data into an array                 
            $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);

            //Sesuaikan sama nama kolom tabel di database                                                                
            $data = null;
            foreach ($fieldname as $key => $item) {
                $data[$item] = $rowData[0][$key];
            }

            //sesuaikan nama dengan nama tabel
            $insert = $this->db2->insert($table, $data);

            $errornya[] = $this->db2->error();
//                $insert = $this->db2->insert($table,$data);
        }

        unlink('./als_asset/excel/uploaded_excel/' . $fileName);

        //print_r($errornya);
        redirect($controller . '/' . $link);
    }

    public function excel_upload_agent_data() {
        $fileName = time() . $_FILES['file']['name'];

        $config['upload_path'] = './als_asset/excel/uploaded_excel/'; //buat folder dengan nama assets di root folder
        $config['allowed_types'] = 'xls|xlsx|csv';
        $config['max_size'] = 20000;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;
        $config['overwrite'] = true;
        $config['file_name'] = $fileName;


        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file'))
            $this->upload->display_errors();

        $media = $this->upload->data('file');

        print_r($media);
        $inputFileName = './als_asset/excel/uploaded_excel/' . $fileName;

        try {
            $inputFileType = IOFactory::identify($inputFileName);
            $objReader = IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
        } catch (Exception $e) {
            die(' Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . $e->getMessage());
        }

        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();

        for ($row = 2; $row <= $highestRow; $row++) {                  //  Read a row of data into an array                 
            $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);

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
            $insert = $this->db2->insert("t_agent", $data);
            //  delete_files('./als_asset/excel/uploaded_excel/'.$fileName);
        }
        unlink('./als_asset/excel/uploaded_excel/' . $fileName);
        redirect('content/read_um_agent');
    }

    public function excel_upload_branch_data() {
        $fileName = time() . $_FILES['file']['name'];

        $config['upload_path'] = './als_asset/excel/uploaded_excel/'; //buat folder dengan nama assets di root folder
        $config['allowed_types'] = 'xls|xlsx|csv';
        $config['max_size'] = 20000;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;
        $config['overwrite'] = true;
        $config['file_name'] = $fileName;


        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file'))
            $this->upload->display_errors();

        $media = $this->upload->data('file');

        $inputFileName = './als_asset/excel/uploaded_excel/' . $fileName;

        try {
            $inputFileType = IOFactory::identify($inputFileName);
            $objReader = IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
        } catch (Exception $e) {
            die(' Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . $e->getMessage());
        }

        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();

        for ($row = 2; $row <= $highestRow; $row++) {                  //  Read a row of data into an array                 
            $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);

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
            $insert = $this->db2->insert("t_branch", $data);
//                delete_files('./als_asset/excel/uploaded_excel/'.$fileName);
//                delete_files('./als_asset/excel/uploaded_excel/');
        }
        unlink('./als_asset/excel/uploaded_excel/' . $fileName);
        redirect('content/read_param_branch');
    }

    public function create_param_city() {
        if ($this->session->has_userdata('username')) {
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Tambah Kota';
            $result['content'] = 'create_param_city';
            $this->load->view('bss_home', $result);
//            $this->load->view('bss_home', $result); //$this->load->view('home', $result);
        } else {
            redirect('/');
        }
    }

    //Controller punya DJ

    public function view_ayda() {
        if ($this->session->has_userdata('username')) {
            $idmenu = 'H12';
            $idmenu2 = 'D043';
            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
            if ($result1 == '1') {
                $result['data'] = $this->Menu_model->loadMenu();
                $result['pagename'] = 'AYDA';
                $result['content'] = 'view_ayda';
                $result['viewayda'] = $this->Content_model->selectayda();
                $this->load->view('bss_home', $result);
            }
        } else {
            redirect('/');
        }
    }

    public function create_ayda() {
        if ($this->session->has_userdata('username')) {
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'AYDA';
            $result['content'] = 'create_ayda';
            $this->load->view('bss_home', $result);
        } else {
            redirect('/');
        }
    }

    public function chekdataAYDA() {
        
    }

    public function insert_ayda() {
        if ($this->session->has_userdata('username')) {
            $a = $this->input->post('nama');
            $b = $this->input->post('cif');
            $c = $this->input->post('plafondAwal');
            $d = $this->input->post('mv');
            $e = $this->input->post('ltcr');
            $f = $this->input->post('dibukukantglayda');
            $g = $this->input->post('thnayda');
            $h = $this->input->post('mobayda');
            $i = $this->input->post('rangemob');
            $j = $this->input->post('cabang');
            $k = $this->input->post('tgllpjawalayda');
            $l = $this->input->post('mv2');
            $m = $this->input->post('lv2');
            $n = $this->input->post('tgllpjaydalbhsetahun');
            $o = $this->input->post('mv3');
            $p = $this->input->post('lv3');
            $q = $this->input->post('tgllpjaydalbhduatahun');
            $r = $this->input->post('mv4');
            $s = $this->input->post('lv4');
            $t = $this->input->post('jenisasset');
            $u = $this->input->post('alamatjaminan');
            $v = $this->input->post('ltlb');
            $w = $this->input->post('osawal');
            $x = $this->input->post('hpstgihawalayda');
            $y = $this->input->post('nilaiawalayda');
            $yy = $this->input->post('biaya');
            $z = $this->input->post('penjualanayda');
            $bb = $this->input->post('nettpenjualan');
            $cc = $this->input->post('tgllpenjualanayda');
            $dd = $this->input->post('ckpn');

            $this->Content_model->ayda_insert($a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $l, $m, $n, $o, $p, $q, $r, $s, $t, $u, $v, $w, $x, $y, $yy, $z, $bb, $cc, $dd);
            redirect('content/view_ayda');
            // var_dump($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$o,$p,$q,$r,$s,$t,$u,$v,$w,$x,$y,$z,$bb,$cc,$dd);
        }
    }

    public function edit_ayda($a) {
        if ($this->session->has_userdata('username')) {

            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Edit AYDA';

            $result['aydaedit'] = $this->Content_model->aydaedit($a);
            $result['content'] = 'view_editayda';
            $this->load->view('bss_home', $result);
        } else {
            redirect('/');
        }
    }

    public function update_ayda($cif) {
        if ($this->session->has_userdata('username')) {
            $a = $this->input->post('nama');
            $b = $this->input->post('cif');
            $c = $this->input->post('plafondAwal');
            $d = $this->input->post('mv');
            $e = $this->input->post('ltcr');
            $f = $this->input->post('dibukukantglayda');
            $g = $this->input->post('thnayda');
            $h = $this->input->post('mobayda');
            $i = $this->input->post('rangemob');
            $j = $this->input->post('cabang');
            $k = $this->input->post('tgllpjawalayda');
            $l = $this->input->post('mv2');
            $m = $this->input->post('lv2');
            $n = $this->input->post('tgllpjaydalbhsetahun');
            $o = $this->input->post('mv3');
            $p = $this->input->post('lv3');
            $q = $this->input->post('tgllpjaydalbhduatahun');
            $r = $this->input->post('mv4');
            $s = $this->input->post('lv4');
            $t = $this->input->post('jenisasset');
            $u = $this->input->post('alamatjaminan');
            $v = $this->input->post('ltlb');
            $w = $this->input->post('osawal');
            $x = $this->input->post('hpstgihawalayda');
            $y = $this->input->post('nilaiawalayda');
            $z = $this->input->post('penjualanayda');
            $bb = $this->input->post('nettpenjualan');
            $cc = $this->input->post('tgllpenjualanayda');
            $dd = $this->input->post('ckpn');

            // var_dump($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$o,$p,$q,$r,$s,$t,$u,$v,$w,$x,$y,$z,$bb,$cc,$dd);
            $this->Content_model->ayda_update($a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $l, $m, $n, $o, $p, $q, $r, $s, $t, $u, $v, $w, $x, $y, $z, $bb, $cc, $dd, $cif);
            $this->sucess_notif();
            redirect('content/view_ayda');
        }
        // else{
        //     redirect('/')
        // }
    }

    function printPDFmrpkPelunasan($a) {
        // $pdf = new FPDF('l','mm','A4');
        // // membuat halaman baru
        // $pdf->AddPage();
        // // setting jenis font yang akan digunakan
        // $pdf->SetFont('Arial','B',16);
        // // mencetak string 
        // $pdf->Cell(190,7,'SEKOLAH MENENGAH KEJURUSAN NEEGRI 2 LANGSA',0,1,'C');
        // $pdf->SetFont('Arial','B',12);
        // $pdf->Cell(190,7,'DAFTAR SISWA KELAS IX JURUSAN REKAYASA PERANGKAT LUNAK',0,1,'C');
        // // Memberikan space kebawah agar tidak terlalu rapat
        // $pdf->Cell(10,7,'',0,1);
        // $pdf->SetFont('Arial','B',10);
        // $pdf->Cell(20,6,'NIM',1,0);
        // $pdf->Cell(85,6,'NAMA MAHASISWA',1,0);
        // $pdf->Cell(27,6,'NO HP',1,0);
        // $pdf->Cell(25,6,'TANGGAL LHR',1,1);
        // $pdf->SetFont('Arial','',10);
        // $mahasiswa = $this->db2->get('i_dammymrpkpelunasan')->result();
        // foreach ($mahasiswa as $row){
        //     $pdf->Cell(20,6,$row->f_cif,1,0);
        //     $pdf->Cell(85,6,$row->f_nama,1,0);
        //     $pdf->Cell(27,6,$row->f_cif,1,0);
        //     $pdf->Cell(25,6,$row->f_nama,1,1); 
        // }
        // $pdf->Output();
        var_dump($a);
        // $data['produk'] = $this->content->get_produk();
        //     $this->load->view('cetak_produk', $data);
    }

    public function read_mrpk_pelunasan_ptbam() {
        if ($this->session->has_userdata('username')) {
            $idmenu = 'H04';
            $idmenu2 = 'D032';
            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
            if ($result1 == '1') {
                $result['data'] = $this->Menu_model->loadMenu();
                $result['pagename'] = 'Memo Pelunasan PT BAM';
                $ambilcif = $this->input->get('myCountry');
                $namacif = $ambilcif;
                $cifambil = explode("-", $namacif);
                $cif = $cifambil['0'];
                $userid = $this->session->userdata('username');
                $result['searchmrpk_ptbam'] = $this->Content_model->get_searcmrpk_ptbam($userid);
                $result['read_mrpkView_pelunasan_ptbam'] = $this->Content_model->read_mrpk_pelunasan_ptbam();
                // $result['stagespecial'] = $this->Content_model->get_special_stage();
                $result['datadamy'] = $this->Content_model->get_datadamy();
                $result['content'] = 'read_mrpk_pelunasan_ptbam';
                $this->load->view('bss_home', $result);
            }
        } else {
            redirect('/');
        }
    }

    public function create_mrk_pelunasan_ptbam($cif) {

        $nama_debitur = $this->input->post('nama_debitur');
        $alamat_debitur = $this->input->post('alamat_debitur');
        $cif = $this->input->post('cif');
        $bidang_usaha = $this->input->post('bidang_usaha');
        $lokasi_usaha = $this->input->post('lokasi_usaha');
        $nama_group_usaha = $this->input->post('nama_group_usaha');
        $debitur_sejak = $this->input->post('debitur_sejak');
        $menunggak_sejak = $this->input->post('menunggak_sejak');
        $dpd = $this->input->post('dpd');
        $kolektibilitas = $this->input->post('kolektibilitas');
        $ckpn = $this->input->post('ckpn');

        $jenis_fasilitas = $this->input->post('jenis_fasilitas');
        $kewajiban = $this->input->post('tunggakan_poko');
        $DueBunga = $this->input->post('tunggakan_bunga');
        $DUE_CH = $this->input->post('tunggakan_denda');

        $tipe_jaminan_agunan = $this->input->post('tipe_jaminan_agunan');
        $desc_agunan = $this->input->post('desc_agunan');
        $mv_lama = $this->input->post('mv_lama');
        $lv_lama = $this->input->post('lv_lama');
        $mv_baru = $this->input->post('mv_baru');
        $lv_baru = $this->input->post('lv_baru');
        $ket_appraisal = $this->input->post('ket_appraisal');

        $kewajiban_a = $this->input->post('kewajiban_a');
        $pelunasan_a = $this->input->post('pelunasan_a');
        $sisa_kewajiban_a = $this->input->post('sisa_kewajiban_a');
        $hapustagih_a = $this->input->post('hapustagih_a');

        $kewajiban_b = $this->input->post('kewajiban_b');
        $pelunasan_b = $this->input->post('pelunasan_b');
        $sisa_kewajiban_b = $this->input->post('sisa_kewajiban_b');
        $hapustagih_b = $this->input->post('hapustagih_b');

        $kewajiban_c = $this->input->post('kewajiban_c');
        $pelunasan_c = $this->input->post('pelunasan_c');
        $sisa_kewajiban_c = $this->input->post('sisa_kewajiban_c');
        $hapustagih_c = $this->input->post('hapustagih_c');

        $asuransi_a = $this->input->post('asuransi_a');
        $asuransi_b = $this->input->post('asuransi_b');

        $asuransi_a = $this->input->post('notaris_a');
        $asuransi_b = $this->input->post('notaris_b');

        $bdd_perbaikan_jaminan_a = $this->input->post('bdd_perbaikan_jaminan_a');
        $bdd_perbaikan_jaminan_a = $this->input->post('bdd_perbaikan_jaminan_b');

        $bdd_penitipan_keamanan_a = $this->input->post('bdd_penitipan_keamanan_a');
        $bdd_penitipan_keamanan_a = $this->input->post('bdd_penitipan_keamanan_b');


        $tgl_penagihan = $this->input->post('tgl_penagihan');
        $desc_penagihan = $this->input->post('desc_penagihan');
        $pihak_hadir_penagihan = $this->input->post('pihak_hadir_penagihan');

        $jenis_pengajuan = $this->input->post('summernote3');
        $catatan_kondisi_penyelesaian = $this->input->post('summernote4');
        $catatan_analisa_permasalahandebitur = $this->input->post('summernote6');
        $dasar_pertimbangan = $this->input->post('summernote7');
        $rekomendasi_penyelesaiankredit = $this->input->post('summernote9');

        $chb1ada = $this->input->post('chb1');
        $chb2ada = $this->input->post('chb2');
        $chb3ada = $this->input->post('chb3');
        $chb4ada = $this->input->post('chb4');


        $data = array();
        foreach ($kewajiban as $key => $value) {
            $data [] = array(
                'nama_debitur' => $nama_debitur,
                'alamat_debitur' => $alamat_debitur,
                'cif' => $cif,
                'bidang_usaha' => $bidang_usaha,
                'lokasi_usaha' => $lokasi_usaha,
                'nama_group_usaha' => $nama_group_usaha,
                'debitur_sejak' => $debitur_sejak,
                'menunggak_sejak' => $menunggak_sejak,
                'dpd' => $dpd,
                'kolektibilitas' => $kolektibilitas,
                'ckpn ' => $ckpn,
                'jenis_fasilitas' => $jenis_fasilitas[$key],
                'tunggakan_poko' => $value,
                'tunggakan_bunga' => $DueBunga[$key],
                'tunggakan_denda' => $DUE_CH[$key],
                'tipe_jaminan' => $tipe_jaminan_agunan[$key],
                'desk_agunan' => $desc_agunan[$key],
                'mv_lama' => $mv_lama[$key],
                'lv_lama' => $lv_lama[$key],
                'mv_baru' => $mv_baru[$key],
                'lv_baru' => $lv_baru[$key],
                'ket_appraisal' => $ket_appraisal[$key],
                'kewajiban_a' => $kewajiban_a,
                'pelunasan_a' => $pelunasan_a,
                'sisa_kewajiban_a' => $sisa_kewajiban_a,
                'hapustagih_a' => $hapustagih_a,
                'kewajiban_b' => $kewajiban_b,
                'pelunasan_b' => $pelunasan_b,
                'sisa_kewajiban_b' => $sisa_kewajiban_b,
                'hapustagih_b' => $hapustagih_b,
                'kewajiban_c' => $kewajiban_c,
                'pelunasan_c' => $pelunasan_c,
                'sisa_kewajiban_c' => $sisa_kewajiban_c,
                'hapustagih_c' => $hapustagih_c,
                'asuransi_dibayar' => $asuransi_a,
                'asuransi_dihapus' => $asuransi_b,
                'notaris_dibayar' => $asuransi_a,
                'notaris_dihapus' => $asuransi_b,
// 
                'bdd_perbaikan_jaminan_dibayar' => $bdd_perbaikan_jaminan_a,
                'bdd_perbaikan_jaminan_dihapus' => $bdd_perbaikan_jaminan_a,
                'bdd_penitipan_keamanan_jaminan_2bln_dibayar' => $bdd_penitipan_keamanan_a,
                'bdd_penitipan_keamanan_jaminan_2bln_dihapus' => $bdd_penitipan_keamanan_a,
                'tgl_upaya_penagihan_hadir' => $tgl_penagihan,
                'desk_upaya_penagihan_hadir' => $desc_penagihan,
                'penagihan_pihak_hadir' => $pihak_hadir_penagihan,
// 
                'jenis_pengajuan' => $jenis_pengajuan,
                'catatan_kondisi_penyelesaian' => $catatan_kondisi_penyelesaian,
                'permasalahan_debitur' => $catatan_analisa_permasalahandebitur,
                'dasar_pertimbangan' => $dasar_pertimbangan,
                'rekomendasi_penyelesaian_kredit' => $rekomendasi_penyelesaiankredit,
                'surat_permohonan_dari_debitur' => $chb1ada,
                'laporan_penilaian_jaminan' => $chb2ada,
                'lainnya_a' => $chb3ada,
                'lainnya_b' => $chb4ada
            );
            $insert = $this->Content_model->insert_pelunasan_ptbam($data);
        }

        $this->sucess_notif_create_mrpk();
        redirect('content/read_mrpk_pelunasan_ptbam');
    }

    public function mrpk_pelunasan_ptbam_view_create() {
        if ($this->session->has_userdata('username')) {
            $ambilcif = $this->input->get('myCountry');
            $namacif = $ambilcif;
            $cifambil = explode("-", $namacif);
            $cif = $cifambil['0'];

            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Create Memo Pelunasan PT BAM';
            // $result['pelunasanmrpk'] = $this->Content_model->pelunasanmrpkfretext($cif);
            $userid = $this->session->userdata('username');
            $data1 = $this->Content_model->ceknomornasabah($cif, $userid);
            if ($data1 == '0') {
                $this->mrpk_cek_cif();
                redirect('content/read_mrpk_pelunasan_ptbam');
            } else {
                $result['data'] = $this->Menu_model->loadMenu();
                $result['pagename'] = 'Create MRPK Pelunasan';
                $result['pelunasan_ptbam'] = $this->Content_model->get_data_pelunasan_ptbam_row($cif);
                $result['ptbam_pelunasan'] = $this->Content_model->get_data_pelunasan_ptbam_result($cif);
                $result['content'] = 'create_mrpk_pelunasan_ptbam';
                $this->load->view('bss_home', $result);
            }
        } else {
            redirect('/');
        }
    }

    public function create_pelunasan_mrpk($cif) {

//$insert_data_pelunasan= 
        $name = $this->input->post('name');
        $alamat = $this->input->post('alamat');
        $cif = $this->input->post('cif');
        $bidang_usaha = $this->input->post('bidang_usaha');
        $lokasi_usaha = $this->input->post('lokasi_usaha');
        $nama_group_usaha = $this->input->post('nama_group_usaha');
        $debitur_sejak = $this->input->post('debitur_sejak');
        $dpd = $this->input->post('dpd');
        $col = $this->input->post('col');


        $os = $this->input->post('os');
        $plafond = $this->input->post('plafond');
        $DueBunga = $this->input->post('DueBunga');
        $DUE_CH = $this->input->post('DUE_CH');


        $ket_aprasial = $this->input->post('ket_aprasial');
        $ket_agunan = $this->input->post('ket_agunan');
        $total_os = $this->input->post('total_os');
        $total_plafond = $this->input->post('total_plafond');
        $total_tunggakan_bunga = $this->input->post('total_tunggakan_bunga');
        $total_tunggakan_denda = $this->input->post('total_tunggakan_denda');
        $total_abc = $this->input->post('total_abc');

        $mv_lama = $this->input->post('mv_lama');
        $lv_lama = $this->input->post('lv_lama');
        $mv_baru = $this->input->post('mv_baru');
        $lv_baru = $this->input->post('lv_baru');

        $total_mv_lama = $this->input->post('total_mv_lama');
        $total_lv_lama = $this->input->post('total_lv_lama');
        $total_mv_baru = $this->input->post('total_mv_baru');
        $total_lv_baru = $this->input->post('total_lv_baru');

        $jenispengajuan = $this->input->post('summernote3');
        //$plafond = $this->input->post('plafond');

        $kewajiban_pokok = $this->input->post('kewajiban_pokok');
        $pelunasan_pokok = $this->input->post('pelunasan_pokok');
        $sisa_kewajiban_pokok = $this->input->post('sisa_kewajiban_pokok');
        $hapus_tagih_pokok = $this->input->post('hapus_tagih_pokok');

        $kewajiban_bunga = $this->input->post('kewajiban_bunga');
        $pelunasan_bunga = $this->input->post('pelunasan_bunga');
        $sisa_kewajiban_bunga = $this->input->post('sisa_kewajiban_bunga');
        $hapus_tagih_bunga = $this->input->post('hapus_tagih_bunga');

        $kewajiban_denda = $this->input->post('kewajiban_denda');
        $pelunasan_denda = $this->input->post('pelunasan_denda');
        $sisa_kewajiban_denda = $this->input->post('sisa_kewajiban_denda');
        $hapus_tagih_denda = $this->input->post('hapus_tagih_denda');


        $biayalelang_a = $this->input->post('biayalelang_a');
        $biayalelang_b = $this->input->post('biayalelang_b');
        $pajak_a = $this->input->post('pajak_a');
        $pajak_b = $this->input->post('pajak_b');
        $freebls_a = $this->input->post('freebls_a');
        $freebls_b = $this->input->post('freebls_b');
        $catatan_analisa_permasalahan_debitur = $this->input->post('summernote4');
        $catatan_kondisi_penyelesaian = $this->input->post('summernote6');
        $desc_penagihan_a = $this->input->post('desckrip_penagihan_a');
        $desc_penagihan_b = $this->input->post('desckrip_penagihan_b');
        $desc_penagihan_c = $this->input->post('desckrip_penagihan_c');
        $desc_penagihan_d = $this->input->post('desckrip_penagihan_d');
        $desc_penagihan_e = $this->input->post('desckrip_penagihan_e');
        $desc_penagihan_f = $this->input->post('desckrip_penagihan_f');
        $desc_penagihan_g = $this->input->post('desckrip_penagihan_g');
        $desc_penagihan_h = $this->input->post('desckrip_penagihan_h');
        $desc_penagihan_i = $this->input->post('desckrip_penagihan_i');
        $desc_penagihan_j = $this->input->post('desckrip_penagihan_j');

        $pihak_hadir_a = $this->input->post('pihak_hadir_a');
        $pihak_hadir_b = $this->input->post('pihak_hadir_b');
        $pihak_hadir_c = $this->input->post('pihak_hadir_c');
        $pihak_hadir_d = $this->input->post('pihak_hadir_d');
        $pihak_hadir_e = $this->input->post('pihak_hadir_e');
        $pihak_hadir_f = $this->input->post('pihak_hadir_f');
        $pihak_hadir_g = $this->input->post('pihak_hadir_g');
        $pihak_hadir_h = $this->input->post('pihak_hadir_h');
        $pihak_hadir_i = $this->input->post('pihak_hadir_i');
        $pihak_hadir_j = $this->input->post('pihak_hadir_j');

        $lampiran_pengumuman_lelang = $this->input->post('chb1');
        $lampiran_risalah_lelang = $this->input->post('chb2');
        $lampiran_permohonan_pelunasan = $this->input->post('chb3');
        $lampiran_lpj_terakhir = $this->input->post('chb4');
        $lampiran_lainnya = $this->input->post('chb5');
        $flag = 1;
        $ceratedate = date('Y/M/D');
        $catatan_dasar_pertimbangan = $this->input->post('summernote7');
        $rekomendasi_penyelesaian_kredit = $this->input->post('summernote12');

        $a = 1;
        $data = array();
        foreach ($os as $key => $value) {
            $data [] = array(
                'nama_debitur' => $name,
                'alamat_debitur' => $alamat,
                'cif' => $cif,
                'bidang_usaha' => $bidang_usaha,
                'dpd' => $dpd,
                'kolektibilitas' => $col,
                'os' => $value,
                'plafond' => $plafond[$key],
                'tunggakan_bunga' => $DueBunga[$key],
                'tunggakan_denda' => $DUE_CH[$key],
                'total_os' => $total_os,
                'total_plafond' => $total_plafond,
                'total_tunggakan_bunga' => $total_tunggakan_bunga,
                'total_tunggakan_denda' => $total_tunggakan_denda,
                'total_keseluruhan_abc' => $total_abc,
                'mv_baru' => $mv_baru[$key],
                'lv_baru' => $lv_baru[$key],
                'mv_lama' => $mv_lama[$key],
                'lv_lama' => $lv_lama[$key],
                'pelunasan_pokok' => $pelunasan_pokok,
                'kewajiban_pokok' => $kewajiban_pokok,
                'sisa_kewajiban_pokok' => $sisa_kewajiban_pokok,
                'hapus_tagih_pokok' => $hapus_tagih_pokok,
                'pelunasan_bunga' => $pelunasan_bunga,
                'kewajiban_bunga' => $kewajiban_bunga,
                'sisa_kewajiban_bunga' => $sisa_kewajiban_bunga,
                'hapus_tagih_bunga' => $hapus_tagih_bunga,
                'pelunasan_denda' => $pelunasan_denda,
                'kewajiban_denda' => $kewajiban_denda,
                'sisa_kewajiban_denda' => $sisa_kewajiban_denda,
                'hapus_tagih_denda' => $hapus_tagih_denda,
                'ket_appraisal' => $ket_aprasial,
                'ket' => $ket_agunan,
                'jenis_pengajuan' => $jenispengajuan,
                'catatan_kondisi_penyelesaian' => $catatan_kondisi_penyelesaian,
                'permasalahan_debitur' => $catatan_analisa_permasalahan_debitur,
                'desckrip_penagihan_a' => $desc_penagihan_a,
                'desckrip_penagihan_b' => $desc_penagihan_b,
                'desckrip_penagihan_c' => $desc_penagihan_c,
                'desckrip_penagihan_d' => $desc_penagihan_d,
                'desckrip_penagihan_e' => $desc_penagihan_e,
                'desckrip_penagihan_f' => $desc_penagihan_f,
                'desckrip_penagihan_g' => $desc_penagihan_g,
                'desckrip_penagihan_h' => $desc_penagihan_h,
                'desckrip_penagihan_i' => $desc_penagihan_i,
                'desckrip_penagihan_j' => $desc_penagihan_j,
                'pihak_hadir_a' => $pihak_hadir_a,
                'pihak_hadir_b' => $pihak_hadir_b,
                'pihak_hadir_c' => $pihak_hadir_c,
                'pihak_hadir_d' => $pihak_hadir_d,
                'pihak_hadir_e' => $pihak_hadir_e,
                'pihak_hadir_f' => $pihak_hadir_f,
                'pihak_hadir_g' => $pihak_hadir_g,
                'pihak_hadir_h' => $pihak_hadir_h,
                'pihak_hadir_i' => $pihak_hadir_i,
                'pihak_hadir_j' => $pihak_hadir_j,
                'biaya_lelang_a' => $biayalelang_a,
                'biaya_lelang_b' => $biayalelang_b,
                'pajak_a' => $pajak_a,
                'pajak_b' => $pajak_b,
                'free_bls_a' => $freebls_a,
                'free_bls_b' => $freebls_b,
                'lampiran_pengumuman_lelang' => $lampiran_pengumuman_lelang,
                'lampiran_risalah_lelang' => $lampiran_risalah_lelang,
                'lampiran_permohonan_pelunasan' => $lampiran_permohonan_pelunasan,
                'lampiran_lpj_terakhir' => $lampiran_lpj_terakhir,
                'lampiran_lainnya' => $lampiran_lainnya
//
//              'dasar_pertimbangan' => $catatan_dasar_pertimbangan,
                    //              'rekomendasi_penyelesaian_kredit' => $rekomendasi_penyelesaian_kredit,
            );
            $this->Content_model->insert_pelunasan_result1($data);
        }



//   print_r($data);
//        redirect('guru/index');
        $this->sucess_notif_create_mrpk();
        redirect('content/read_mrpk_pelunasan');
    }

    public function mrpk_pelunasan_view_edit($a) {
        if ($this->session->has_userdata('username')) {

            $cifid = $a;
            $cifambil = explode("-", $cifid);
            $cif1 = $cifambil['0'];


            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'EDIT MRPK Pelunasan';

            $result['data'] = $this->Menu_model->loadMenu();


            $result['pelunasan_row'] = $this->Content_model->getdata_pelunasan_edit_row($cif1);
            $result['pelunasan_result'] = $this->Content_model->pelunasan_getdata_edit_result($cif1);
            //$ptbam_pelunasan1_edit = $this->Content_model->pelunasanptbam_getdata_edit1($cif1);
            //$result['kondisi_penjualan']= $this->Content_model->ambil_kondisipenualan($id);
            //$result['ambil_upayapenagihan']= $this->Content_model->ambil_upayapenagihan($id);
            //$result['ambil_lampiran']= $this->Content_model->ambil_lampiran($id);
            //$ptbampengajuan = $ptbam_pelunasan1_edit;
            //$result['pengajuanpelunasan'] = $ptbampengajuan;
            $result['content'] = 'edit_mrpk_pelunasan';
            $this->load->view('bss_home', $result);
        }
    }

    public function mrpk_pelunasan_view_create() {
        if ($this->session->has_userdata('username')) {
            $ambilcif = $this->input->get('myCountry');
            $namacif = $ambilcif;
            $cifambil = explode("-", $namacif);
            $cif = $cifambil['0'];

            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Create Memo Pelunasan PT BAM';
            // $result['pelunasanmrpk'] = $this->Content_model->pelunasanmrpkfretext($cif);
            $userid = $this->session->userdata('username');
            $data1 = $this->Content_model->ceknomornasabah($cif, $userid);
            if ($data1 == '0') {
                $this->mrpk_cek_cif();
                redirect('content/read_mrpk_pelunasan');
            } else {
                $result['data'] = $this->Menu_model->loadMenu();
                $result['pagename'] = 'Create MRPK Pelunasan';
                $result['pelunasan_row'] = $this->Content_model->get_data_pelunasan_row($cif);
                $result['pelunasan_result'] = $this->Content_model->get_data_pelunasan_result($cif);
                $result['content'] = 'create_mrpk_pelunasan';
                $this->load->view('bss_home', $result);
            }
        } else {
            redirect('/');
        }
    }

    public function read_mrpk_pelunasan() {
        if ($this->session->has_userdata('username')) {
            $idmenu = 'H04';
            $idmenu2 = 'D032';
            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
            if ($result1 == '1') {
                $result['data'] = $this->Menu_model->loadMenu();
                $result['pagename'] = 'Memo Pelunasan';
                $ambilcif = $this->input->get('myCountry');
                $namacif = $ambilcif;
                $cifambil = explode("-", $namacif);
                $cif = $cifambil['0'];
                $userid = $this->session->userdata('username');
                $result['searchmrpk_pelunasan'] = $this->Content_model->get_searcmrpk_pelunasan($userid);
                $result['read_mrpkViewpelunasan'] = $this->Content_model->read_mrpk_pelunasanview();
// $result['stagespecial'] = $this->Content_model->get_special_stage();
                $result['datadamy'] = $this->Content_model->get_datadamy();
                $result['content'] = 'read_mrpk_pelunasan';
                $this->load->view('bss_home', $result);
            }
        } else {
            redirect('/');
        }
    }

    public function read_mrpk_restrukturisasi() {
        if ($this->session->has_userdata('username')) {
            $idmenu = 'H04';
            $idmenu2 = 'D032';
            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
            if ($result1 == '1') {
                $result['data'] = $this->Menu_model->loadMenu();
                $result['pagename'] = 'Memo Restrukturisasi';
                $ambilcif = $this->input->get('myCountry');
                $namacif = $ambilcif;
                $cifambil = explode("-", $namacif);
                $cif = $cifambil['0'];
                $userid = $this->session->userdata('username');
                $result['searchmrk_restrukturisasi'] = $this->Content_model->get_searcmpk_restrukturisasi($userid);
                $result['read_mrkView_restrukturisasi'] = $this->Content_model->read_mrk_restrukturisasi();
                // $result['stagespecial'] = $this->Content_model->get_special_stage();
                $result['datadamy'] = $this->Content_model->get_datadamy();
                $result['content'] = 'read_mrpk_restrukturisasi';
                $this->load->view('bss_home', $result);
            }
        } else {
            redirect('/');
        }
    }

    public function create_mrk_restrukturisasi($cif) {
        $nama_debitur = $this->input->post('name');
        $nomor_nasabah = $this->input->post('cif');
        $nama_pasangan = $this->input->post('name_pasangan');
        $temp_tgl_lhir = $this->input->post('tmpt_tgllhr');
        $temp_tgl_lhir_psngn = $this->input->post('tmpt_tgllhr_pasangan');
        $no_ktp_debitur = $this->input->post('ktp');
        $no_ktp_pasangan = $this->input->post('ktp_pasangan');
        $alamat_debitur = $this->input->post('alamat');
        $alamat_pasangan = $this->input->post('alamat_pasangan');
        $bidang_usaha = $this->input->post('bidang_usaha');
        $lokasi_usaha = $this->input->post('lokasi_usaha');
        $nama_grup_usaha = $this->input->post('group_usaha');
        $debitur_sejak = $this->input->post('debitur_sejak');
        $menunggak_sejak = $this->input->post('menunggak_sejak');
        $hari_tunggakan = $this->input->post('hari_tunggakan');
        $kolektibilitas = $this->input->post('kolektibilitas');
        $approval_saat_inisiasi_awal = $this->input->post('approval_inisial_awal');

        $jenis_fasilitas_pembayaran = $this->input->post('jenis_fasilitas');
        $dpd = $this->input->post('dpd');
        $plafond = $this->input->post('plafond');
        $os_per = $this->input->post('os_per');
        $jangka_waktu_tenor = $this->input->post('jangka_waktu_tenor');
        $tunggakan_bunga = $this->input->post('tunggakan_bunga');
        $tunggakan_denda = $this->input->post('tunggakan_denda');
        $total = $this->input->post('total_Pinjaman_1');

        $jenis_fasilitas_dimiliki = $this->input->post('jenis_fasilitas_agunan');
        $deskripsi = $this->input->post('deskripsi');
        $mv_baru = $this->input->post('mv_lama');
        $lv_baru = $this->input->post('lv_lama');
        $mv_lama = $this->input->post('mv_baru');
        $lv_lama = $this->input->post('lv_baru');
        $ket = $this->input->post('keterangan_aprasisal');

        $bank_1a = $this->input->post('bank_1a');
        $fasilitas_1a = $this->input->post('fasilitas_1a');
        $bunga_persen_1a = $this->input->post('bunga_persen_1a');
        $jangka_waktu_1a = $this->input->post('jangka_waktu_1a');
        $plafond_rp_1a = $this->input->post('plafond_rp_1a');
        $os_pokok_rp_1a = $this->input->post('os_pokok_rp_1a');
        $angsuran_rp_1a = $this->input->post('angsuran_rp_1a');
        $kol_1a = $this->input->post('kol_1a');

        $bank_2a = $this->input->post('bank_2a');
        $fasilitas_2a = $this->input->post('fasilitas_2a');
        $bunga_persen_2a = $this->input->post('bunga_persen_2a');
        $jangka_waktu_2aa = $this->input->post('jangka_waktu_2aa');
        $plafond_rp_2a = $this->input->post('plafond_rp_2a');
        $os_pokok_rp_2a = $this->input->post('os_pokok_rp_2a');
        $angsuran_rp_2a = $this->input->post('angsuran_rp_2a');
        $kol_2a = $this->input->post('kol_2a');

        $bank_3a = $this->input->post('bank_3a');
        $fasilitas_3a = $this->input->post('fasilitas_3a');
        $bunga_persen_3a = $this->input->post('bunga_persen_3a');
        $jangka_waktu_3aa = $this->input->post('jangka_waktu_3aa');
        $plafond_rp_3a = $this->input->post('plafond_rp_3a');
        $os_pokok_rp_3a = $this->input->post('os_pokok_rp_3a');
        $angsuran_rp_3a = $this->input->post('angsuran_rp_3a');
        $kol_3a = $this->input->post('kol_3a');

        $bank_4a = $this->input->post('bank_4a');
        $fasilitas_4a = $this->input->post('fasilitas_4a');
        $bunga_persen_4a = $this->input->post('bunga_persen_4a');
        $jangka_waktu_4aa = $this->input->post('jangka_waktu_4aa');
        $plafond_rp_4a = $this->input->post('plafond_rp_4a');
        $os_pokok_rp_4a = $this->input->post('os_pokok_rp_4a');
        $angsuran_rp_4a = $this->input->post('angsuran_rp_4a');
        $kol_4a = $this->input->post('kol_4a');

        $jenisfasilitas_a = $this->input->post('jenisfasilitas_a');
        $fasilitas_awal_a = $this->input->post('fasilitas_awal_a');
        $restruktur1a = $this->input->post('restruktur1a');
        $jenisfasilitas_b = $this->input->post('jenisfasilitas_b');
        $fasilitas_awal_b = $this->input->post('fasilitas_awal_b');
        $restruktur1b = $this->input->post('restruktur1b');
        $jenisfasilitas_c = $this->input->post('jenisfasilitas_c');
        $fasilitas_awal_c = $this->input->post('fasilitas_awal_c');
        $restruktur1c = $this->input->post('restruktur1c');
        $jenisfasilitas_d = $this->input->post('jenisfasilitas_d');
        $fasilitas_awal_d = $this->input->post('fasilitas_awal_d');
        $restruktur1d = $this->input->post('restruktur1d');
        $jenisfasilitas_e = $this->input->post('jenisfasilitas_e');
        $fasilitas_awal_e = $this->input->post('fasilitas_awal_e');
        $restruktur1e = $this->input->post('restruktur1e');
        $jenisfasilitas_f = $this->input->post('jenisfasilitas_f');
        $fasilitas_awal_f = $this->input->post('fasilitas_awal_f');
        $restruktur1f = $this->input->post('restruktur1f');
        $jenisfasilitas_g = $this->input->post('jenisfasilitas_g');
        $fasilitas_awal_g = $this->input->post('fasilitas_awal_g');
        $restruktur1g = $this->input->post('restruktur1g');
        $jenisfasilitas_h = $this->input->post('jenisfasilitas_h');
        $fasilitas_awal_h = $this->input->post('fasilitas_awal_h');
        $restruktur1h = $this->input->post('restruktur1h');
        $jenisfasilitas_i = $this->input->post('jenisfasilitas_i');
        $fasilitas_awal_i = $this->input->post('fasilitas_awal_i');
        $restruktur1i = $this->input->post('restruktur1i');
        $jenisfasilitas_j = $this->input->post('jenisfasilitas_j');
        $fasilitas_awal_j = $this->input->post('fasilitas_awal_j');
        $restruktur1j = $this->input->post('restruktur1j');
        $jenisfasilitas_k = $this->input->post('jenisfasilitas_k');
        $fasilitas_awal_k = $this->input->post('fasilitas_awal_k');
        $restruktur1k = $this->input->post('restruktur1k');
        $jenisfasilitas_l = $this->input->post('jenisfasilitas_l');
        $fasilitas_awal_l = $this->input->post('fasilitas_awal_l');
        $restruktur1l = $this->input->post('restruktur1l');


        $deskripsi_a = $this->input->post('deskripsi_a');
        $pokok_a = $this->input->post('pokok_a');
        $persen_1a = $this->input->post('persen_1a');
        $bunga_a = $this->input->post('bunga_a');
        $persen_2a = $this->input->post('persen_2a');
        $denda_a = $this->input->post('denda_a');
        $persen_3a = $this->input->post('persen_3a');
        $pokok_b = $this->input->post('pokok_b');
        $persen_1b = $this->input->post('persen_1b');
        $bunga_b = $this->input->post('bunga_b');
        $persen_2b = $this->input->post('persen_2b');
        $denda_b = $this->input->post('denda_b');
        $persen_3b = $this->input->post('persen_3b');
        $pokok_c = $this->input->post('pokok_c');
        $persen_1c = $this->input->post('persen_1c');
        $bunga_c = $this->input->post('bunga_c');
        $persen_2c = $this->input->post('persen_2c');
        $denda_2c = $this->input->post('denda_2c');
        $persen_3c = $this->input->post('persen_3c');
        $periode_a = $this->input->post('periode_a');

        $pendapatan_a = $this->input->post('pendapatan_a');
        $hrga_pokok_penjualan_a = $this->input->post('hrga_pokok_penjualan_a');
        $depresisai_amortisasi_a = $this->input->post('depresisai_amortisasi_a');
        $laba_kotor_a = $this->input->post('laba_kotor_a');
        $biaya_variabel_a = $this->input->post('biaya_variabel_a');
        $biaya_tetap_a = $this->input->post('biaya_tetap_a');
        $laba_opersaional_a = $this->input->post('laba_opersaional_a');
        $biaya_hidup_a = $this->input->post('biaya_hidup_a');
        $angsuran_tempat_lain_a = $this->input->post('angsuran_tempat_lain_a');
        $angsuran_bss_a = $this->input->post('angsuran_bss_a');
        $biaya_lain_a = $this->input->post('biaya_lain_a');
        $pendapatan_lain_a = $this->input->post('pendapatan_lain_a');
        $laba_rugi_sebelum_pajak_a = $this->input->post('laba_rugi_sebelum_pajak_a');
        $pajak_a = $this->input->post('pajak_a');
        $laba_bersih_a = $this->input->post('laba_bersih_a');
        $periode_b = $this->input->post('periode_b');
        $pendapatan_b = $this->input->post('pendapatan_b');
        $hrga_pokok_penjualan_b = $this->input->post('hrga_pokok_penjualan_b');
        $depresisai_amortisasi_b = $this->input->post('depresisai_amortisasi_b');
        $laba_kotor_b = $this->input->post('laba_kotor_b');
        $biaya_variabel_b = $this->input->post('biaya_variabel_b');
        $biaya_tetap_b = $this->input->get('biaya_tetap_b');
        $laba_opersaional_b = $this->input->post('laba_opersaional_b');
        $biaya_hidup_b = $this->input->post('biaya_hidup_b');
        $angsuran_tempat_lain_b = $this->input->post('angsuran_tempat_lain_b');
        $angsuran_bss_b = $this->input->post('angsuran_bss_b');
        $biaya_lain_b = $this->input->post('biaya_lain_b');
        $pendapatan_lain_b = $this->input->post('pendapatan_lain_b');
        $laba_rugi_sebelum_pajak_b = $this->input->post('laba_rugi_sebelum_pajak_b');
        $pajak_b = $this->input->post('pajak_b');
        $laba_bersih_b = $this->input->post('laba_bersih_b');

        $surat_permohonan_restruktur_debitur = $this->input->post('surat_permohonan_restruktur_debitur');
        $copy_ktp_debitur_pasangannya = $this->input->post('copy_ktp_debitur_pasangannya');
        $hasil_bi_cheking = $this->input->post('hasil_bi_cheking');
        $dokumen_pendukung_keuangan = $this->input->post('dokumen_pendukung_keuangan');
        $laporan_penilaian_jaminan = $this->input->post('laporan_penilaian_jaminan');
        $analisa_keuangan_restruktur = $this->input->post('analisa_keuangan_restruktur');
        $lainya_lampiran = $this->input->post('lainya_lampiran');
        $maksimum_tambahan_tenor_restruktur = $this->input->post('maksimum_tambahan_tenor_restruktur');
        $maksimum_tenor_restruktur = $this->input->post('maksimum_tenor_restruktur');
        $minimum_mob_pertama = $this->input->post('minimum_mob_pertama');
        $minimum_mobun_restruktur_kedua_ketiga = $this->input->post('minimum_mobun_restruktur_kedua_ketiga');
        $maksimum_dilakukannya_restruktur_1_debitur = $this->input->post('maksimum_dilakukannya_restruktur_1_debitur');
        $maksimum_dpd_pengajuan_restruktur_pertama = $this->input->post('maksimum_dpd_pengajuan_restruktur_pertama');
        $minimum_dpd_pengajuan_restruktur_kedua_ketiga = $this->input->post('minimum_dpd_pengajuan_restruktur_kedua_ketiga');
        $pemberian_grace_period_tidak_sesuai_dengan_kondisi = $this->input->post('pemberian_grace_period_tidak_sesuai_dengan_kondisi');
        $maksimum_waktu_pemberian_grace_period = $this->input->post('maksimum_waktu_pemberian_grace_period');
        $lainya_deviasi_restruktur = $this->input->post('lainya_deviasi_restruktur');
        $chb1ada = $this->input->post('chb1');
        $chb2ada = $this->input->post('chb2');
        $chb3ada = $this->input->post('chb3');
        $chb4ada = $this->input->post('chb4');
        $chb5ada = $this->input->post('chb5');
        $chb6ada = $this->input->post('chb6');
        $chb7ada = $this->input->post('chb7');
        $chb8ada = $this->input->post('chb8');
        $chb9ada = $this->input->post('chb9');
        $chb10ada = $this->input->post('chb10');
        $chb11ada = $this->input->post('chb11');
        $chb12ada = $this->input->post('chb12');
        $chb13ada = $this->input->post('chb13');
        $chb14ada = $this->input->post('chb14');
        $chb15ada = $this->input->post('chb15');
        $chb16ada = $this->input->post('chb16');
        $chb17ada = $this->input->post('chb17');


        $catatan_agunandimiliki = $this->input->get('summernote3');
        $catatan_dasar_permasalahandebitur = $this->input->get('summernote4');
        $catatan_restrukturisasi_kredit = $this->input->get('summernote6');
        $catatan_dasar_pertimbangan = $this->input->get('summernote7');
        $catatan_analisakuantitatif = $this->input->get('summernote12');

        //var_dump($jenisfasilitas_a); 
        $data = array();
        foreach ($plafond as $key => $value) {
            $data [] = array(
                'plafond' => $value,
                'nama_debitur' => $nama_debitur,
                'nomor_nasabah' => $nomor_nasabah,
                'nama_pasangan' => $nama_pasangan,
                'temp_tgl_lhir' => $temp_tgl_lhir,
                'temp_tgl_lhir_psngn' => $temp_tgl_lhir_psngn,
                'no_ktp_debitur' => $no_ktp_debitur,
                'no_ktp_pasangan' => $no_ktp_pasangan,
                'alamat_debitur' => $alamat_debitur,
                'alamat_pasangan' => $alamat_pasangan,
                'bidang_usaha' => $bidang_usaha,
                'lokasi_usaha' => $lokasi_usaha,
                'nama_grup_usaha' => $nama_grup_usaha,
                'debitur_sejak' => $debitur_sejak,
                'menunggak_sejak' => $menunggak_sejak,
                'hari_tunggakan' => $hari_tunggakan,
                'kolektibilitas' => $kolektibilitas,
                'approval_saat_inisiasi_awal' => $approval_saat_inisiasi_awal,
                'jenis_fasilitas_pembayaran' => $jenis_fasilitas_pembayaran[$key],
                'dpd' => $dpd[$key],
                'os_per' => $os_per[$key],
                'jangka_waktu_tenor' => $jangka_waktu_tenor[$key],
                'tunggakan_bunga' => $tunggakan_bunga[$key],
                'tunggakan_denda' => $tunggakan_denda[$key],
                'total' => $total[$key],
                'jenis_fasilitas_dimiliki' => $jenis_fasilitas_dimiliki[$key],
                'deskripsi' => $deskripsi[$key],
                'mv_baru' => $mv_lama[$key],
                'lv_baru' => $lv_lama[$key],
                'mv_lama' => $mv_baru[$key],
                'lv_lama' => $lv_baru[$key],
                'ket' => $ket[$key],
                'bank_1a' => $bank_1a,
                'fasilitas_1a' => $fasilitas_1a,
                'bunga_persen_1a' => $bunga_persen_1a,
                'jangka_waktu_1aa' => $jangka_waktu_1a,
                'plafond_rp_1a' => $plafond_rp_1a,
                'os_pokok_rp_1a' => $os_pokok_rp_1a,
                'angsuran_rp_1a' => $angsuran_rp_1a,
                'kol_1a' => $kol_1a,
//    
                'bank_2a' => $bank_2a,
                'fasilitas_2a' => $fasilitas_2a,
                'bunga_persen_2a' => $bunga_persen_2a,
                'jangka_waktu_2aa' => $jangka_waktu_2aa,
                'plafond_rp_2a' => $plafond_rp_2a,
                'os_pokok_rp_2a' => $os_pokok_rp_2a,
                'angsuran_rp_2a' => $angsuran_rp_2a,
                'kol_2a' => $kol_2a,
                'bank_3a' => $bank_3a,
                'fasilitas_3a' => $fasilitas_3a,
                'bunga_persen_3a' => $bunga_persen_3a,
                'jangka_waktu_3aa' => $jangka_waktu_3aa,
                'plafond_rp_3a' => $plafond_rp_3a,
                'os_pokok_rp_3a' => $os_pokok_rp_3a,
                'angsuran_rp_3a' => $angsuran_rp_3a,
                'kol_3a' => $kol_3a,
                'bank_4a' => $bank_4a,
                'fasilitas_4a' => $fasilitas_4a,
                'bunga_persen_4a' => $bunga_persen_4a,
                'jangka_waktu_4aa' => $jangka_waktu_4aa,
                'plafond_rp_4a' => $plafond_rp_4a,
                'os_pokok_rp_4a' => $os_pokok_rp_4a,
                'angsuran_rp_4a' => $angsuran_rp_4a,
                'kol_4a' => $kol_4a,
//    
                'jenisfasilitas_aa' => $jenisfasilitas_a,
                'fasilitas_awal_a' => $fasilitas_awal_a,
                'restruktur1a' => $restruktur1a,
                'jenisfasilitas_b' => $jenisfasilitas_b,
                'fasilitas_awal_b' => $fasilitas_awal_b,
                'restruktur1b    ' => $restruktur1b,
                'jenisfasilitas_c' => $jenisfasilitas_c,
                'fasilitas_awal_c' => $fasilitas_awal_c,
                'restruktur1c    ' => $restruktur1c,
                'jenisfasilitas_d' => $jenisfasilitas_d,
                'fasilitas_awal_d' => $fasilitas_awal_d,
                'restruktur1d    ' => $restruktur1d,
                'jenisfasilitas_e' => $jenisfasilitas_e,
                'fasilitas_awal_e' => $fasilitas_awal_e,
                'restruktur1e    ' => $restruktur1e,
                'jenisfasilitas_f' => $jenisfasilitas_f,
                'fasilitas_awal_f' => $fasilitas_awal_f,
                'restruktur1f    ' => $restruktur1f,
                'jenisfasilitas_g' => $jenisfasilitas_g,
                'fasilitas_awal_g' => $fasilitas_awal_g,
                'restruktur1g    ' => $restruktur1g,
                'jenisfasilitas_h' => $jenisfasilitas_h,
                'fasilitas_awal_h' => $fasilitas_awal_h,
                'restruktur1h    ' => $restruktur1h,
                'jenisfasilitas_i' => $jenisfasilitas_i,
                'fasilitas_awal_i' => $fasilitas_awal_i,
                'restruktur1i    ' => $restruktur1i,
                'jenisfasilitas_j' => $jenisfasilitas_j,
                'fasilitas_awal_j' => $fasilitas_awal_j,
                'restruktur1j    ' => $restruktur1j,
                'jenisfasilitas_k' => $jenisfasilitas_k,
                'fasilitas_awal_k' => $fasilitas_awal_k,
                'restruktur1k    ' => $restruktur1k,
                'jenisfasilitas_l' => $jenisfasilitas_l,
                'fasilitas_awal_l' => $fasilitas_awal_l,
                'restruktur1l    ' => $restruktur1l,
                'deskripsi_a' => $deskripsi_a,
                'pokok_a' => $pokok_a,
                'persen_1a' => $persen_1a,
                'bunga_a' => $bunga_a,
                'persen_2a' => $persen_2a,
                'denda_a' => $denda_a,
                'persen_3a' => $persen_3a,
                'pokok_b' => $pokok_b,
                'persen_1b' => $persen_1b,
                'bunga_b' => $bunga_b,
                'persen_2b' => $persen_2b,
                'denda_b' => $denda_b,
                'persen_3b' => $persen_3b,
                'pokok_c' => $pokok_c,
                'persen_1c' => $persen_1c,
                'bunga_c' => $bunga_c,
                'persen_2c' => $persen_2c,
                'denda_2c' => $denda_2c,
                'persen_3c' => $persen_3c,
                'periode_a' => $periode_a,
                'pendapatan_a' => $pendapatan_a,
                'hrga_pokok_penjualan_a' => $hrga_pokok_penjualan_a,
                'depresisai_amortisasi_a' => $depresisai_amortisasi_a,
                'laba_kotor_a' => $laba_kotor_a,
                'biaya_variabel_a' => $biaya_variabel_a,
                'biaya_tetap_a' => $biaya_tetap_a,
                'laba_opersaional_a' => $laba_opersaional_a,
                'biaya_hidup_a' => $biaya_hidup_a,
                'angsuran_tempat_lain_a' => $angsuran_tempat_lain_a,
                'angsuran_bss_a' => $angsuran_bss_a,
                'biaya_lain_a' => $biaya_lain_a,
                'pendapatan_lain_a' => $pendapatan_lain_a,
                'laba_rugi_sebelum_pajak_a' => $laba_rugi_sebelum_pajak_a,
                'pajak_a' => $pajak_a,
                'laba_bersih_a' => $laba_bersih_a,
                'periode_b' => $periode_b,
                'pendapatan_b' => $pendapatan_b,
                'hrga_pokok_penjualan_b' => $hrga_pokok_penjualan_b,
                'depresisai_amortisasi_b' => $depresisai_amortisasi_b,
                'laba_kotor_b' => $laba_kotor_b,
                'biaya_variabel_b' => $biaya_variabel_b,
                'biaya_tetap_b' => $biaya_tetap_b,
                'laba_opersaional_b' => $laba_opersaional_b,
                'biaya_hidup_b' => $biaya_hidup_b,
                'angsuran_tempat_lain_b' => $angsuran_tempat_lain_b,
                'angsuran_bss_b' => $angsuran_bss_b,
                'biaya_lain_b' => $biaya_lain_b,
                'pendapatan_lain_b' => $pendapatan_lain_b,
                'laba_rugi_sebelum_pajak_b' => $laba_rugi_sebelum_pajak_b,
                'pajak_b' => $pajak_b,
                'laba_bersih_b' => $laba_bersih_b,
                'surat_permohonan_restruktur_debitur' => $surat_permohonan_restruktur_debitur,
                'copy_ktp_debitur_pasangannya' => $copy_ktp_debitur_pasangannya,
                'hasil_bi_cheking' => $hasil_bi_cheking,
                'dokumen_pendukung_keuangan' => $dokumen_pendukung_keuangan,
                'laporan_penilaian_jaminan' => $laporan_penilaian_jaminan,
                'analisa_keuangan_restruktur' => $analisa_keuangan_restruktur,
                'lainya_lampiran' => $lainya_lampiran,
                'maksimum_tambahan_tenor_restruktur' => $maksimum_tambahan_tenor_restruktur,
                'maksimum_tenor_restruktur' => $maksimum_tenor_restruktur,
                'minimum_mob_pertama' => $minimum_mob_pertama,
                'minimum_mobun_restruktur_kedua_ketiga' => $minimum_mobun_restruktur_kedua_ketiga,
                'maksimum_dilakukannya_restruktur_1_debitur' => $maksimum_dilakukannya_restruktur_1_debitur,
                'maksimum_dpd_pengajuan_restruktur_pertama' => $maksimum_dpd_pengajuan_restruktur_pertama,
                'minimum_dpd_pengajuan_restruktur_kedua_ketiga' => $minimum_dpd_pengajuan_restruktur_kedua_ketiga,
                'pemberian_grace_period_tidak_sesuai_dengan_kondisi' => $pemberian_grace_period_tidak_sesuai_dengan_kondisi,
                'maksimum_waktu_pemberian_grace_period' => $maksimum_waktu_pemberian_grace_period,
                'lainya_deviasi_restruktur' => $lainya_deviasi_restruktur,
                'chb1ada' => $chb1ada,
                'chb2ada' => $chb2ada,
                'chb3ada' => $chb3ada,
                'chb4ada' => $chb4ada,
                'chb5ada' => $chb5ada,
                'chb6ada' => $chb6ada,
                'chb7ada' => $chb7ada,
                'chb8ada' => $chb8ada,
                'chb9ada' => $chb9ada,
                'chb10ada' => $chb10ada,
                'chb11ada' => $chb11ada,
                'chb12ada' => $chb12ada,
                'chb13ada' => $chb13ada,
                'chb14ada' => $chb14ada,
                'chb15ada' => $chb15ada,
                'chb16ada' => $chb16ada,
                'chb17ada' => $chb17ada,
                'catatan_agunandimiliki' => $catatan_agunandimiliki,
                'catatan_dasar_permasalahandebitur' => $catatan_dasar_permasalahandebitur,
                'catatan_restrukturisasi_kredit' => $catatan_restrukturisasi_kredit,
                'catatan_dasar_pertimbangan' => $catatan_dasar_pertimbangan,
                'catatan_analisakuantitatif' => $catatan_analisakuantitatif
            );
            $insert = $this->Content_model->insert_restrukturisasi($data);
        }

//            $cekdata= $this->Content_model->cekdatarestruktur($cif);


        $this->sucess_notif_create_mrpk();
        redirect('content/read_mrpk_restrukturisasi');
    }

    public function delete_deb_mrk_restrukturisasi($cif) {
        $selection = $this->input->post('idnya');
        $this->Content_model->delete_data_restrukturisasi($cif);

        $this->delete_notif();

        redirect('content/read_mrpk_restrukturisasi');
    }

    public function delete_deb_mrpk_perpanjangan($cif) {
        $selection = $this->input->post('idnya');
        $this->Content_model->delete_data_perpanjangan($cif);

        $this->delete_notif();

        redirect('content/read_mrpk_restrukturisasi');
    }

    public function delete_deb_mrpk_pelunasanptbam($cif) {
        $selection = $this->input->post('idnya');
        $this->Content_model->delete_data_pelunasanptbam($cif);

        $this->delete_notif();

        redirect('content/read_mrpk_restrukturisasi');
    }

    public function delete_deb_mrpk_pelunasan($cif) {
        $selection = $this->input->post('idnya');
        $this->Content_model->delete_data_pelunasan($cif);

        $this->delete_notif();

        redirect('content/read_mrpk_restrukturisasi');
    }

    public function delete_deb_mrk_wo($cif) {
        $selection = $this->input->post('idnya');
        $this->Content_model->delete_data_wo($cif);

        $this->delete_notif();

        redirect('content/read_mrpk_restrukturisasi');
    }

    public function mrpk_restrukturisasi_view_edit($cif) {
        if ($this->session->has_userdata('username')) {


            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'EDIT MRK Restrukturisasi';

            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Create MRK Restrukturisasi';
//                $result['getdata_restrukturisasi'] = $this->Content_model->getdata_pdf_row($cif);
//                $result['getdata_restrukturisasi'] = $this->Content_model->getdata_pdf_result($cif);
            $result['getdata_restrukturisasi'] = $this->Content_model->getdata_restrukturisasi_edit($cif);
            $result['restrukturisasi_getdata'] = $this->Content_model->restrukturisasi_getdata_edit($cif);
            $result['content'] = 'edit_mrk_restrukturisasi';
            $this->load->view('bss_home', $result);
        }
    }

    public function update_mrk_restrukturisasi($cif) {
        $nama_debitur = $this->input->get('name');
        $nomor_nasabah = $this->input->get('cif');
        $nama_pasangan = $this->input->get('name_pasangan');
        $temp_tgl_lhir = $this->input->get('tmpt_tgllhr');
        $temp_tgl_lhir_psngn = $this->input->get('tmpt_tgllhr_pasangan');
        $no_ktp_debitur = $this->input->get('ktp');
        $no_ktp_pasangan = $this->input->get('ktp_pasangan');
        $alamat_debitur = $this->input->get('alamat');
        $alamat_pasangan = $this->input->get('alamat_pasangan');
        $bidang_usaha = $this->input->get('bidang_usaha');
        $lokasi_usaha = $this->input->get('lokasi_usaha');
        $nama_grup_usaha = $this->input->get('group_usaha');
        $debitur_sejak = $this->input->get('debitur_sejak');
        $menunggak_sejak = $this->input->get('menunggak_sejak');
        $hari_tunggakan = $this->input->get('hari_tunggakan');
        $kolektibilitas = $this->input->get('kolektibilitas');
        $approval_saat_inisiasi_awal = $this->input->get('approval_inisial_awal');

        $jenis_fasilitas_pembayaran = $this->input->get('jenis_fasilitas');
        $dpd = $this->input->get('dpd');
        $plafond = $this->input->get('plafond');
        $os_per = $this->input->get('os_per');
        $jangka_waktu_tenor = $this->input->get('jangka_waktu_tenor');
        $tunggakan_bunga = $this->input->get('tunggakan_bunga');
        $tunggakan_denda = $this->input->get('tunggakan_denda');
        $total = $this->input->get('total_Pinjaman_1');

        $jenis_fasilitas_dimiliki = $this->input->get('jenis_fasilitas_agunan');
        $deskripsi = $this->input->get('deskripsi');
        $mv_baru = $this->input->get('mv_lama');
        $lv_baru = $this->input->get('lv_lama');
        $mv_lama = $this->input->get('mv_baru');
        $lv_lama = $this->input->get('lv_baru');
        $ket = $this->input->get('keterangan_aprasisal');

        $bank_1a = $this->input->get('bank_1a');
        $fasilitas_1a = $this->input->get('fasilitas_1a');
        $bunga_persen_1a = $this->input->get('bunga_persen_1a');
        $jangka_waktu_1a = $this->input->get('jangka_waktu_1a');
        $plafond_rp_1a = $this->input->get('plafond_rp_1a');
        $os_pokok_rp_1a = $this->input->get('os_pokok_rp_1a');
        $angsuran_rp_1a = $this->input->get('angsuran_rp_1a');
        $kol_1a = $this->input->get('kol_1a');

        $bank_2a = $this->input->get('bank_2a');
        $fasilitas_2a = $this->input->get('fasilitas_2a');
        $bunga_persen_2a = $this->input->get('bunga_persen_2a');
        $jangka_waktu_2aa = $this->input->get('jangka_waktu_2aa');
        $plafond_rp_2a = $this->input->get('plafond_rp_2a');
        $os_pokok_rp_2a = $this->input->get('os_pokok_rp_2a');
        $angsuran_rp_2a = $this->input->get('angsuran_rp_2a');
        $kol_2a = $this->input->get('kol_2a');

        $bank_3a = $this->input->get('bank_3a');
        $fasilitas_3a = $this->input->get('fasilitas_3a');
        $bunga_persen_3a = $this->input->get('bunga_persen_3a');
        $jangka_waktu_3aa = $this->input->get('jangka_waktu_3aa');
        $plafond_rp_3a = $this->input->get('plafond_rp_3a');
        $os_pokok_rp_3a = $this->input->get('os_pokok_rp_3a');
        $angsuran_rp_3a = $this->input->get('angsuran_rp_3a');
        $kol_3a = $this->input->get('kol_3a');

        $bank_4a = $this->input->get('bank_4a');
        $fasilitas_4a = $this->input->get('fasilitas_4a');
        $bunga_persen_4a = $this->input->get('bunga_persen_4a');
        $jangka_waktu_4aa = $this->input->get('jangka_waktu_4aa');
        $plafond_rp_4a = $this->input->get('plafond_rp_4a');
        $os_pokok_rp_4a = $this->input->get('os_pokok_rp_4a');
        $angsuran_rp_4a = $this->input->get('angsuran_rp_4a');
        $kol_4a = $this->input->get('kol_4a');

        $jenisfasilitas_a = $this->input->get('jenisfasilitas_a');
        $fasilitas_awal_a = $this->input->get('fasilitas_awal_a');
        $restruktur1a = $this->input->get('restruktur1a');
        $jenisfasilitas_b = $this->input->get('jenisfasilitas_b');
        $fasilitas_awal_b = $this->input->get('fasilitas_awal_b');
        $restruktur1b = $this->input->get('restruktur1b');
        $jenisfasilitas_c = $this->input->get('jenisfasilitas_c');
        $fasilitas_awal_c = $this->input->get('fasilitas_awal_c');
        $restruktur1c = $this->input->get('restruktur1c');
        $jenisfasilitas_d = $this->input->get('jenisfasilitas_d');
        $fasilitas_awal_d = $this->input->get('fasilitas_awal_d');
        $restruktur1d = $this->input->get('restruktur1d');
        $jenisfasilitas_e = $this->input->get('jenisfasilitas_e');
        $fasilitas_awal_e = $this->input->get('fasilitas_awal_e');
        $restruktur1e = $this->input->get('restruktur1e');
        $jenisfasilitas_f = $this->input->get('jenisfasilitas_f');
        $fasilitas_awal_f = $this->input->get('fasilitas_awal_f');
        $restruktur1f = $this->input->get('restruktur1f');
        $jenisfasilitas_g = $this->input->get('jenisfasilitas_g');
        $fasilitas_awal_g = $this->input->get('fasilitas_awal_g');
        $restruktur1g = $this->input->get('restruktur1g');
        $jenisfasilitas_h = $this->input->get('jenisfasilitas_h');
        $fasilitas_awal_h = $this->input->get('fasilitas_awal_h');
        $restruktur1h = $this->input->get('restruktur1h');
        $jenisfasilitas_i = $this->input->get('jenisfasilitas_i');
        $fasilitas_awal_i = $this->input->get('fasilitas_awal_i');
        $restruktur1i = $this->input->get('restruktur1i');
        $jenisfasilitas_j = $this->input->get('jenisfasilitas_j');
        $fasilitas_awal_j = $this->input->get('fasilitas_awal_j');
        $restruktur1j = $this->input->get('restruktur1j');
        $jenisfasilitas_k = $this->input->get('jenisfasilitas_k');
        $fasilitas_awal_k = $this->input->get('fasilitas_awal_k');
        $restruktur1k = $this->input->get('restruktur1k');
        $jenisfasilitas_l = $this->input->get('jenisfasilitas_l');
        $fasilitas_awal_l = $this->input->get('fasilitas_awal_l');
        $restruktur1l = $this->input->get('restruktur1l');


        $deskripsi_a = $this->input->get('deskripsi_a');
        $pokok_a = $this->input->get('pokok_a');
        $persen_1a = $this->input->get('persen_1a');
        $bunga_a = $this->input->get('bunga_a');
        $persen_2a = $this->input->get('persen_2a');
        $denda_a = $this->input->get('denda_a');
        $persen_3a = $this->input->get('persen_3a');
        $pokok_b = $this->input->get('pokok_b');
        $persen_1b = $this->input->get('persen_1b');
        $bunga_b = $this->input->get('bunga_b');
        $persen_2b = $this->input->get('persen_2b');
        $denda_b = $this->input->get('denda_b');
        $persen_3b = $this->input->get('persen_3b');
        $pokok_c = $this->input->get('pokok_c');
        $persen_1c = $this->input->get('persen_1c');
        $bunga_c = $this->input->get('bunga_c');
        $persen_2c = $this->input->get('persen_2c');
        $denda_2c = $this->input->get('denda_2c');
        $persen_3c = $this->input->get('persen_3c');
        $periode_a = $this->input->get('periode_a');

        $pendapatan_a = $this->input->get('pendapatan_a');
        $hrga_pokok_penjualan_a = $this->input->get('hrga_pokok_penjualan_a');
        $depresisai_amortisasi_a = $this->input->get('depresisai_amortisasi_a');
        $laba_kotor_a = $this->input->get('laba_kotor_a');
        $biaya_variabel_a = $this->input->get('biaya_variabel_a');
        $biaya_tetap_a = $this->input->get('biaya_tetap_a');
        $laba_opersaional_a = $this->input->get('laba_opersaional_a');
        $biaya_hidup_a = $this->input->get('biaya_hidup_a');
        $angsuran_tempat_lain_a = $this->input->get('angsuran_tempat_lain_a');
        $angsuran_bss_a = $this->input->get('angsuran_bss_a');
        $biaya_lain_a = $this->input->get('biaya_lain_a');
        $pendapatan_lain_a = $this->input->get('pendapatan_lain_a');
        $laba_rugi_sebelum_pajak_a = $this->input->get('laba_rugi_sebelum_pajak_a');
        $pajak_a = $this->input->get('pajak_a');
        $laba_bersih_a = $this->input->get('laba_bersih_a');
        $periode_b = $this->input->get('periode_b');
        $pendapatan_b = $this->input->get('pendapatan_b');
        $hrga_pokok_penjualan_b = $this->input->get('hrga_pokok_penjualan_b');
        $depresisai_amortisasi_b = $this->input->get('depresisai_amortisasi_b');
        $laba_kotor_b = $this->input->get('laba_kotor_b');
        $biaya_variabel_b = $this->input->get('biaya_variabel_b');
        $biaya_tetap_b = $this->input->get('biaya_tetap_b');
        $laba_opersaional_b = $this->input->get('laba_opersaional_b');
        $biaya_hidup_b = $this->input->get('biaya_hidup_b');
        $angsuran_tempat_lain_b = $this->input->get('angsuran_tempat_lain_b');
        $angsuran_bss_b = $this->input->get('angsuran_bss_b');
        $biaya_lain_b = $this->input->get('biaya_lain_b');
        $pendapatan_lain_b = $this->input->get('pendapatan_lain_b');
        $laba_rugi_sebelum_pajak_b = $this->input->get('laba_rugi_sebelum_pajak_b');
        $pajak_b = $this->input->get('pajak_b');
        $laba_bersih_b = $this->input->get('laba_bersih_b');

        $surat_permohonan_restruktur_debitur = $this->input->get('surat_permohonan_restruktur_debitur');
        $copy_ktp_debitur_pasangannya = $this->input->get('copy_ktp_debitur_pasangannya');
        $hasil_bi_cheking = $this->input->get('hasil_bi_cheking');
        $dokumen_pendukung_keuangan = $this->input->get('dokumen_pendukung_keuangan');
        $laporan_penilaian_jaminan = $this->input->get('laporan_penilaian_jaminan');
        $analisa_keuangan_restruktur = $this->input->get('analisa_keuangan_restruktur');
        $lainya_lampiran = $this->input->get('lainya_lampiran');
        $maksimum_tambahan_tenor_restruktur = $this->input->get('maksimum_tambahan_tenor_restruktur');
        $maksimum_tenor_restruktur = $this->input->get('maksimum_tenor_restruktur');
        $minimum_mob_pertama = $this->input->get('minimum_mob_pertama');
        $minimum_mobun_restruktur_kedua_ketiga = $this->input->get('minimum_mobun_restruktur_kedua_ketiga');
        $maksimum_dilakukannya_restruktur_1_debitur = $this->input->get('maksimum_dilakukannya_restruktur_1_debitur');
        $maksimum_dpd_pengajuan_restruktur_pertama = $this->input->get('maksimum_dpd_pengajuan_restruktur_pertama');
        $minimum_dpd_pengajuan_restruktur_kedua_ketiga = $this->input->get('minimum_dpd_pengajuan_restruktur_kedua_ketiga');
        $pemberian_grace_period_tidak_sesuai_dengan_kondisi = $this->input->get('pemberian_grace_period_tidak_sesuai_dengan_kondisi');
        $maksimum_waktu_pemberian_grace_period = $this->input->get('maksimum_waktu_pemberian_grace_period');
        $lainya_deviasi_restruktur = $this->input->get('lainya_deviasi_restruktur');
        $chb1ada = $this->input->get('chb1ada');
        $chb2ada = $this->input->get('chb2ada');
        $chb3ada = $this->input->get('chb3ada');
        $chb4ada = $this->input->get('chb4ada');
        $chb5ada = $this->input->get('chb5ada');
        $chb6ada = $this->input->get('chb6ada');
        $chb7ada = $this->input->get('chb7ada');
        $chb8ada = $this->input->get('chb8ada');
        $chb9ada = $this->input->get('chb9ada');
        $chb10ada = $this->input->get('chb10ada');
        $chb11ada = $this->input->get('chb11ada');
        $chb12ada = $this->input->get('chb12ada');
        $chb13ada = $this->input->get('chb13ada');
        $chb14ada = $this->input->get('chb14ada');
        $chb15ada = $this->input->get('chb15ada');
        $chb16ada = $this->input->get('chb16ada');
        $chb17ada = $this->input->get('chb17ada');


        $catatan_agunandimiliki = $this->input->get('summernote3');
        $catatan_dasar_permasalahandebitur = $this->input->get('summernote4');
        $catatan_restrukturisasi_kredit = $this->input->get('summernote6');
        $catatan_dasar_pertimbangan = $this->input->get('summernote7');
        $catatan_analisakuantitatif = $this->input->get('summernote12');

        //var_dump($jenisfasilitas_a); 
        $data = array();
        foreach ($plafond as $key => $value) {
            $data = array(
                'plafond' => $value,
                'nama_debitur' => $nama_debitur,
                'nomor_nasabah' => $nomor_nasabah,
                'nama_pasangan' => $nama_pasangan,
                'temp_tgl_lhir' => $temp_tgl_lhir,
                'temp_tgl_lhir_psngn' => $temp_tgl_lhir_psngn,
                'no_ktp_debitur' => $no_ktp_debitur,
                'no_ktp_pasangan' => $no_ktp_pasangan,
                'alamat_debitur' => $alamat_debitur,
                'alamat_pasangan' => $alamat_pasangan,
                'bidang_usaha' => $bidang_usaha,
                'lokasi_usaha' => $lokasi_usaha,
                'nama_grup_usaha' => $nama_grup_usaha,
                'debitur_sejak' => $debitur_sejak,
                'menunggak_sejak' => $menunggak_sejak,
                'hari_tunggakan' => $hari_tunggakan,
                'kolektibilitas' => $kolektibilitas,
                'approval_saat_inisiasi_awal' => $approval_saat_inisiasi_awal,
                'jenis_fasilitas_pembayaran' => $jenis_fasilitas_pembayaran[$key],
                'dpd' => $dpd[$key],
                'os_per' => $os_per[$key],
                'jangka_waktu_tenor' => $jangka_waktu_tenor[$key],
                'tunggakan_bunga' => $tunggakan_bunga[$key],
                'tunggakan_denda' => $tunggakan_denda[$key],
                'total' => $total[$key],
                'jenis_fasilitas_dimiliki' => $jenis_fasilitas_dimiliki[$key],
                'deskripsi' => $deskripsi[$key],
                'mv_baru' => $mv_lama[$key],
                'lv_baru' => $lv_lama[$key],
                'mv_lama' => $mv_baru[$key],
                'lv_lama' => $lv_baru[$key],
                'ket' => $ket[$key],
                'bank_1a' => $bank_1a,
                'fasilitas_1a' => $fasilitas_1a,
                'bunga_persen_1a' => $bunga_persen_1a,
                'jangka_waktu_1aa' => $jangka_waktu_1a,
                'plafond_rp_1a' => $plafond_rp_1a,
                'os_pokok_rp_1a' => $os_pokok_rp_1a,
                'angsuran_rp_1a' => $angsuran_rp_1a,
                'kol_1a' => $kol_1a,
//    
                'bank_2a' => $bank_2a,
                'fasilitas_2a' => $fasilitas_2a,
                'bunga_persen_2a' => $bunga_persen_2a,
                'jangka_waktu_2aa' => $jangka_waktu_2aa,
                'plafond_rp_2a' => $plafond_rp_2a,
                'os_pokok_rp_2a' => $os_pokok_rp_2a,
                'angsuran_rp_2a' => $angsuran_rp_2a,
                'kol_2a' => $kol_2a,
                'bank_3a' => $bank_3a,
                'fasilitas_3a' => $fasilitas_3a,
                'bunga_persen_3a' => $bunga_persen_3a,
                'jangka_waktu_3aa' => $jangka_waktu_3aa,
                'plafond_rp_3a' => $plafond_rp_3a,
                'os_pokok_rp_3a' => $os_pokok_rp_3a,
                'angsuran_rp_3a' => $angsuran_rp_3a,
                'kol_3a' => $kol_3a,
                'bank_4a' => $bank_4a,
                'fasilitas_4a' => $fasilitas_4a,
                'bunga_persen_4a' => $bunga_persen_4a,
                'jangka_waktu_4aa' => $jangka_waktu_4aa,
                'plafond_rp_4a' => $plafond_rp_4a,
                'os_pokok_rp_4a' => $os_pokok_rp_4a,
                'angsuran_rp_4a' => $angsuran_rp_4a,
                'kol_4a' => $kol_4a,
//    
                'jenisfasilitas_aa' => $jenisfasilitas_a,
                'fasilitas_awal_a' => $fasilitas_awal_a,
                'restruktur1a' => $restruktur1a,
                'jenisfasilitas_b' => $jenisfasilitas_b,
                'fasilitas_awal_b' => $fasilitas_awal_b,
                'restruktur1b    ' => $restruktur1b,
                'jenisfasilitas_c' => $jenisfasilitas_c,
                'fasilitas_awal_c' => $fasilitas_awal_c,
                'restruktur1c    ' => $restruktur1c,
                'jenisfasilitas_d' => $jenisfasilitas_d,
                'fasilitas_awal_d' => $fasilitas_awal_d,
                'restruktur1d    ' => $restruktur1d,
                'jenisfasilitas_e' => $jenisfasilitas_e,
                'fasilitas_awal_e' => $fasilitas_awal_e,
                'restruktur1e    ' => $restruktur1e,
                'jenisfasilitas_f' => $jenisfasilitas_f,
                'fasilitas_awal_f' => $fasilitas_awal_f,
                'restruktur1f    ' => $restruktur1f,
                'jenisfasilitas_g' => $jenisfasilitas_g,
                'fasilitas_awal_g' => $fasilitas_awal_g,
                'restruktur1g    ' => $restruktur1g,
                'jenisfasilitas_h' => $jenisfasilitas_h,
                'fasilitas_awal_h' => $fasilitas_awal_h,
                'restruktur1h    ' => $restruktur1h,
                'jenisfasilitas_i' => $jenisfasilitas_i,
                'fasilitas_awal_i' => $fasilitas_awal_i,
                'restruktur1i    ' => $restruktur1i,
                'jenisfasilitas_j' => $jenisfasilitas_j,
                'fasilitas_awal_j' => $fasilitas_awal_j,
                'restruktur1j    ' => $restruktur1j,
                'jenisfasilitas_k' => $jenisfasilitas_k,
                'fasilitas_awal_k' => $fasilitas_awal_k,
                'restruktur1k    ' => $restruktur1k,
                'jenisfasilitas_l' => $jenisfasilitas_l,
                'fasilitas_awal_l' => $fasilitas_awal_l,
                'restruktur1l    ' => $restruktur1l,
                'deskripsi_a' => $deskripsi_a,
                'pokok_a' => $pokok_a,
                'persen_1a' => $persen_1a,
                'bunga_a' => $bunga_a,
                'persen_2a' => $persen_2a,
                'denda_a' => $denda_a,
                'persen_3a' => $persen_3a,
                'pokok_b' => $pokok_b,
                'persen_1b' => $persen_1b,
                'bunga_b' => $bunga_b,
                'persen_2b' => $persen_2b,
                'denda_b' => $denda_b,
                'persen_3b' => $persen_3b,
                'pokok_c' => $pokok_c,
                'persen_1c' => $persen_1c,
                'bunga_c' => $bunga_c,
                'persen_2c' => $persen_2c,
                'denda_2c' => $denda_2c,
                'persen_3c' => $persen_3c,
                'periode_a' => $periode_a,
                'pendapatan_a' => $pendapatan_a,
                'hrga_pokok_penjualan_a' => $hrga_pokok_penjualan_a,
                'depresisai_amortisasi_a' => $depresisai_amortisasi_a,
                'laba_kotor_a' => $laba_kotor_a,
                'biaya_variabel_a' => $biaya_variabel_a,
                'biaya_tetap_a' => $biaya_tetap_a,
                'laba_opersaional_a' => $laba_opersaional_a,
                'biaya_hidup_a' => $biaya_hidup_a,
                'angsuran_tempat_lain_a' => $angsuran_tempat_lain_a,
                'angsuran_bss_a' => $angsuran_bss_a,
                'biaya_lain_a' => $biaya_lain_a,
                'pendapatan_lain_a' => $pendapatan_lain_a,
                'laba_rugi_sebelum_pajak_a' => $laba_rugi_sebelum_pajak_a,
                'pajak_a' => $pajak_a,
                'laba_bersih_a' => $laba_bersih_a,
                'periode_b' => $periode_b,
                'pendapatan_b' => $pendapatan_b,
                'hrga_pokok_penjualan_b' => $hrga_pokok_penjualan_b,
                'depresisai_amortisasi_b' => $depresisai_amortisasi_b,
                'laba_kotor_b' => $laba_kotor_b,
                'biaya_variabel_b' => $biaya_variabel_b,
                'biaya_tetap_b' => $biaya_tetap_b,
                'laba_opersaional_b' => $laba_opersaional_b,
                'biaya_hidup_b' => $biaya_hidup_b,
                'angsuran_tempat_lain_b' => $angsuran_tempat_lain_b,
                'angsuran_bss_b' => $angsuran_bss_b,
                'biaya_lain_b' => $biaya_lain_b,
                'pendapatan_lain_b' => $pendapatan_lain_b,
                'laba_rugi_sebelum_pajak_b' => $laba_rugi_sebelum_pajak_b,
                'pajak_b' => $pajak_b,
                'laba_bersih_b' => $laba_bersih_b,
                'surat_permohonan_restruktur_debitur' => $surat_permohonan_restruktur_debitur,
                'copy_ktp_debitur_pasangannya' => $copy_ktp_debitur_pasangannya,
                'hasil_bi_cheking' => $hasil_bi_cheking,
                'dokumen_pendukung_keuangan' => $dokumen_pendukung_keuangan,
                'laporan_penilaian_jaminan' => $laporan_penilaian_jaminan,
                'analisa_keuangan_restruktur' => $analisa_keuangan_restruktur,
                'lainya_lampiran' => $lainya_lampiran,
                'maksimum_tambahan_tenor_restruktur' => $maksimum_tambahan_tenor_restruktur,
                'maksimum_tenor_restruktur' => $maksimum_tenor_restruktur,
                'minimum_mob_pertama' => $minimum_mob_pertama,
                'minimum_mobun_restruktur_kedua_ketiga' => $minimum_mobun_restruktur_kedua_ketiga,
                'maksimum_dilakukannya_restruktur_1_debitur' => $maksimum_dilakukannya_restruktur_1_debitur,
                'maksimum_dpd_pengajuan_restruktur_pertama' => $maksimum_dpd_pengajuan_restruktur_pertama,
                'minimum_dpd_pengajuan_restruktur_kedua_ketiga' => $minimum_dpd_pengajuan_restruktur_kedua_ketiga,
                'pemberian_grace_period_tidak_sesuai_dengan_kondisi' => $pemberian_grace_period_tidak_sesuai_dengan_kondisi,
                'maksimum_waktu_pemberian_grace_period' => $maksimum_waktu_pemberian_grace_period,
                'lainya_deviasi_restruktur' => $lainya_deviasi_restruktur,
                'chb1ada' => $chb1ada,
                'chb2ada' => $chb2ada,
                'chb3ada' => $chb3ada,
                'chb4ada' => $chb4ada,
                'chb5ada' => $chb5ada,
                'chb6ada' => $chb6ada,
                'chb7ada' => $chb7ada,
                'chb8ada' => $chb8ada,
                'chb9ada' => $chb9ada,
                'chb10ada' => $chb10ada,
                'chb11ada' => $chb11ada,
                'chb12ada' => $chb12ada,
                'chb13ada' => $chb13ada,
                'chb14ada' => $chb14ada,
                'chb15ada' => $chb15ada,
                'chb16ada' => $chb16ada,
                'chb17ada' => $chb17ada,
                'catatan_agunandimiliki' => $catatan_agunandimiliki,
                'catatan_dasar_permasalahandebitur' => $catatan_dasar_permasalahandebitur,
                'catatan_restrukturisasi_kredit' => $catatan_restrukturisasi_kredit,
                'catatan_dasar_pertimbangan' => $catatan_dasar_pertimbangan,
                'catatan_analisakuantitatif' => $catatan_analisakuantitatif
            );
            $insert = $this->Content_model->update_restrukturisasi($data, $cif);
        }

//            $cekdata= $this->Content_model->cekdatarestruktur($cif);


        $this->sucess_notif_create_mrpk();
        redirect('content/read_mrpk_restrukturisasi');
    }

    function sucess_notif_create_mrpk() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Berhasil!',
        text: 'Berhasil Create Data!!!',
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

    public function mrpk_restrukturisasi_view_create() {
        if ($this->session->has_userdata('username')) {
            $ambilcif = $this->input->get('myCountry');
            $namacif = $ambilcif;
            $cifambil = explode("-", $namacif);
            $cif = $cifambil['0'];

            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Create MRK Restrukturisasi';
            // $result['pelunasanmrpk'] = $this->Content_model->pelunasanmrpkfretext($cif);
            $userid = $this->session->userdata('username');
            $data1 = $this->Content_model->ceknomornasabah($cif, $userid);
            if ($data1 == '0') {
                $this->mrpk_cek_cif();
                redirect('content/read_mrpk_restrukturisasi');
            } else {
                $result['data'] = $this->Menu_model->loadMenu();
                $result['pagename'] = 'Create MRK Restrukturisasi';
//                $result['getdata_restrukturisasi'] = $this->Content_model->getdata_pdf_row($cif);
//                $result['getdata_restrukturisasi'] = $this->Content_model->getdata_pdf_result($cif);
                $result['getdata_restrukturisasi'] = $this->Content_model->getdata_restrukturisasi($cif);
                $result['restrukturisasi_getdata'] = $this->Content_model->restrukturisasi_getdata($cif);
                $result['content'] = 'create_mrk_restrukturisasi';
                $this->load->view('bss_home', $result);
            }
        }
    }

    public function read_mrpk() {
        if ($this->session->has_userdata('username')) {
            $idmenu = 'H04';
            $idmenu2 = 'D032';
            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
            if ($result1 == '1') {
                $result['data'] = $this->Menu_model->loadMenu();
                $result['pagename'] = 'MRPK Pelunasan';
                $ambilcif = $this->input->get('myCountry');
                $namacif = $ambilcif;
                $cifambil = explode("-", $namacif);
                $cif = $cifambil['0'];
                $result['searchmrpk'] = $this->Content_model->get_searcmrpk($cif);
                $result['read_mrpkView'] = $this->Content_model->read_mrpk();
                // $result['stagespecial'] = $this->Content_model->get_special_stage();
                $result['datadamy'] = $this->Content_model->get_datadamy();
                $result['content'] = 'read_mrpk';
                $this->load->view('bss_home', $result);
            }
        } else {
            redirect('/');
        }
    }

    public function mrpk_cek_cif() {
        $this->session->set_flashdata(
                "message", "<script>swal(
              'Gagal!',
              'CIF tidak di temukan',
              'gagal'
            )</script>"
        );
    }

    public function create_mrpkdammy($u, $v) {

        $a = $this->input->get('ambilkondisipenyelesaian');
        $b = $this->input->get('dibayar');
        $c = $this->input->get('dihapus');
        $d = $this->input->get('upayapenagihan');
        $e = $this->input->get('collectioncabang');
        $f = $this->input->get('chb1ada');
        $g = $this->input->get('chb1tidak');
        $h = $this->input->get('chb2ada');
        $i = $this->input->get('chb2tidak');
        $j = $this->input->get('chb3ada');
        $k = $this->input->get('chb3tidak');
        $l = $this->input->get('chb4ada');
        $m = $this->input->get('chb4tidak');
        $n = $this->input->get('chb5ada');
        $o = $this->input->get('chb5tidak');
        $p = $this->input->get('summernote6');
        $q = $this->input->get('summernote7');
        $r = $this->input->get('summernote8');
        $s = $this->input->get('summernote9');
        $t = $this->input->get('summernote11');


        // var_dump($data);
        $this->Content_model->insert_mrpk_pelunasan($a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $l, $m, $n, $o, $p, $q, $r, $s, $t, $u, $v);
        $this->sucess_notif();
        redirect('content/read_mrpk');
    }

    public function create_mrpkdammypenjualan($u, $v) {

        $a = $this->input->get('ambilkondisipenyelesaian');
        $b = $this->input->get('dibayar');
        $c = $this->input->get('dihapus');
        $d = $this->input->get('tglinput');
        $e = $this->input->get('inputdesk');
        $f = $this->input->get('inputpihak');
        $g = $this->input->get('chb1ada');
        $h = $this->input->get('chb1tidak');
        $i = $this->input->get('chb2ada');
        $j = $this->input->get('chb2tidak');
        $k = $this->input->get('chb3ada');
        $l = $this->input->get('chb3tidak');
        $m = $this->input->get('chb4ada');
        $n = $this->input->get('chb4tidak');
        $o = $this->input->get('chb5ada');
        $p = $this->input->get('chb5tidak');
        $q = $this->input->get('summernote3');
        $r = $this->input->get('summernote4');
        //$q=$this->input->get('rekomendasipenyelesaiankredit');
        // var_dump($a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $l, $m, $n, $o, $p, $q,$r, $u, $v);
        $this->Content_model->insert_mrpk_penjualan($a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $l, $m, $n, $o, $p, $q, $r, $u, $v);
        $this->sucess_notif_mrpkpenjualan();
        redirect('content/read_mrpk_ayda_penjualan');
    }

    public function sucess_notif_mrpkpenjualan() {
        $this->session->set_flashdata(
                "message", "<script>swal(
              'Berhasil!',
              'Data Berhasil di input',
              'success'
            )</script>"
        );
    }

    public function read_mrpk_ayda_penjualan() {
        if ($this->session->has_userdata('username')) {
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'MRPK AYDA Penjualan';
            $ambilcif = $this->input->get('myCountry');
            $namacif = $ambilcif;
            $cifambil = explode("-", $namacif);
            $cif = $cifambil['0'];
            $result['searchmrpkpenjualan'] = $this->Content_model->get_searchmrpkpenjualan();
            // $result['searchmrpk'] = $this->Content_model->get_searcmrpk($cif);
            $result['read_mrpkView_penjualan'] = $this->Content_model->read_mrpkView_penjualan();
            $result['content'] = 'read_mrpk_ayda_penjualan';
            $this->load->view('bss_home', $result);
        } else {
            redirect('/');
        }
    }

    public function priviewmrpkpenjualan($a) {
        if ($this->session->has_userdata('username')) {
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Priview MRPK ';
//$result['printmrpkp']=$this->Content_model->printmrpkpelunasan($a);
            $result['datadammy'] = $this->Content_model->mrpkdatadammy($a);
            $result['dammy'] = $this->Content_model->dammy($a);
            $result['pelunasanprint'] = $this->Content_model->vieweditpenjualan($a);
            $result['content'] = 'priviewmrpkpenjualan';
            $this->load->view('bss_home', $result);
        } else {
            redirect('/');
        }
    }

    public function edit_mrpk_penjualan($a) {
        if ($this->session->has_userdata('username')) {
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Edit MRPK Penjualan';
//$result['printmrpkp']=$this->Content_model->printmrpkpelunasan($a);
            $result['datadammy'] = $this->Content_model->mrpkdatadammy($a);
            $result['dammy'] = $this->Content_model->dammy($a);
            $result['pelunasanprint'] = $this->Content_model->vieweditpenjualan($a);
            $result['content'] = 'edit_mrpk_penjualan';
            $this->load->view('bss_home', $result);
        } else {
            redirect('/');
        }
    }

    public function update_mrpk_penjualan($a) {
        if ($this->session->has_userdata('username')) {

            $b = $this->input->get('ambilkondisipenyelesaian');
            $c = $this->input->get('dibayar');
            $d = $this->input->get('dihapus');
            $dd = $this->input->get('tglinput');
            $e = $this->input->get('inputdesk');
            $f = $this->input->get('inputpihak');
            $g = $this->input->get('chb1ada');
            $h = $this->input->get('chb1tidak');
            $i = $this->input->get('chb2ada');
            $j = $this->input->get('chb2tidak');
            $k = $this->input->get('chb3ada');
            $l = $this->input->get('chb3tidak');
            $m = $this->input->get('chb4ada');
            $n = $this->input->get('chb4tidak');
            $o = $this->input->get('chb5ada');
            $p = $this->input->get('chb5tidak');
            $t = $this->input->get('summernote6');
            $u = $this->input->get('summernote7');
            //var_dump($a,$b,$c,$d,$dd,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$o,$p,$t,$u);
            $this->Content_model->update_penjualan_mrpk($a, $b, $c, $d, $dd, $e, $f, $g, $h, $i, $j, $k, $l, $m, $n, $o, $p, $t, $u);
            $this->sucess_notif();
            redirect('content/read_mrpk_ayda_penjualan');
        }//else{
        //  redirect('/');
        //}
    }

    public function mrpk_penjualan_view_create() {
        if ($this->session->has_userdata('username')) {
            $ambilcif = $this->input->get('myCountry');
            $namacif = $ambilcif;
            $cifambil = explode("-", $namacif);
            $cif = $cifambil['0'];

            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Create MRPK Penjualan';
            // $result['pelunasanmrpk'] = $this->Content_model->pelunasanmrpkfretext($cif);
            $data1 = $this->Content_model->mrpkdatadammy($cif);
            if ($data1 == '0') {
                $this->mrpk_cek_cif();
                redirect('content/read_mrpk_ayda_penjualan');
            } else {
                $result['data'] = $this->Menu_model->loadMenu();
                $result['pagename'] = 'Create MRPK Pelunasan';
                $result['datadammy'] = $this->Content_model->mrpkdatadammy1($cif);
                $result['dammy'] = $this->Content_model->dammy($cif);
                $result['content'] = 'create_mrpk_wo';
                $this->load->view('bss_home', $result);
            }
        } else {
            redirect('/');
        }
    }

    public function create_mrpk_perpanjangan($cif) {
        $nama_debitur = $this->input->post('nama_debitur');
        $nma_grup_usaha = $this->input->post('nma_grup_usaha');
        $cif = $this->input->post('cif');
        $suku_bunga = $this->input->post('suku_bunga');
        $bidang_usaha = $this->input->post('bidang_usaha');
        $kolektibilitas = $this->input->post('kolektibilitas');
        $dpd = $this->input->post('dpd');
        $sektorindustri_bss = $this->input->post('sektorindustri_bss');

        $plafond_a = $this->input->post('plafond_a');
        $DueBunga_a = $this->input->post('DueBunga_a');
        $DUE_CH_a = $this->input->post('DUE_CH_a');
        $bakidebet_a = $this->input->post('bakidebet_a');
        $jatuhtempo_a = $this->input->post('jatuhtempo_a');
        $perpanjangan_a = $this->input->post('perpanjangan_a');

        $jenis_fasilitas_a = $this->input->post('jenis_fasilitas_a');

        $plafond_b = $this->input->post('plafond_b');
        $DueBunga_b = $this->input->post('DueBunga_b');
        $DUE_CH_b = $this->input->post('DUE_CH_b');
        $bakidebet_b = $this->input->post('bakidebet_b');
        $jatuhtempo_b = $this->input->post('jatuhtempo_b');
        $perpanjangan_b = $this->input->post('perpanjangan_b');
        $jenis_fasilitas_b = $this->input->post('jenis_fasilitas_b');
        $deskripsi = $this->input->post('deskripsi');
        $dokumen_jaminan = $this->input->post('dokumen_jaminan');
        $nilai_pasar = $this->input->post('nilai_pasar');
        $nilai_likuidasi = $this->input->post('nilai_likuidasi');
        $ht_feo = $this->input->post('ht_feo');
        $keterangan = $this->input->post('keterangan');
        $catatan_jamina = $this->input->post('summernote6');
        $bunga_persen = $this->input->post('bunga_persen');
        $provinsi = $this->input->post('provinsi');
        $administrasi = $this->input->post('administrasi');
        $catatan_analisausahadebitur = $this->input->post('summernote7');
        $penjualan_a = $this->input->post('penjualan_a');
        $hrga_pokok_penjualan_a = $this->input->post('hrga_pokok_penjualan_a');
        $depresisai_amortisasi_a = $this->input->post('depresisai_amortisasi_a');
        $laba_kotor_a = $this->input->post('laba_kotor_a');
        $biaya_variabel_a = $this->input->post('biaya_variabel_a');
        $biaya_tetap_a = $this->input->post('biaya_tetap_a');
        $laba_opersaional_a = $this->input->post('laba_opersaional_a');
        $biaya_bunga_a = $this->input->post('biaya_bunga_a');
        $biaya_lain_lain_a = $this->input->post('biaya_lain_lain_a');
        $pendapatan_lain_a = $this->input->post('pendapatan_lain_a');

        $laba_rugi_sebelum_pajak_a = $this->input->post('laba_rugi_sebelum_pajak_a');
        $pajak_a = $this->input->post('pajak_a');
        $laba_bersih_a = $this->input->post('laba_bersih_a');
        $dsr_a = $this->input->post('dsr_a');
        $periode_c = $this->input->post('periode_c');
        $penjualan_e = $this->input->post('penjualan_e');
        $hrga_pokok_penjualan_d = $this->input->post('hrga_pokok_penjualan_d');
        $depresisai_amortisasi_d = $this->input->post('depresisai_amortisasi_d');
        $laba_kotor_d = $this->input->post('laba_kotor_d');
        $biaya_variabel_d = $this->input->post('biaya_variabel_d');
        $laba_opersaional_d = $this->input->post('laba_opersaional_d');
        $biaya_bunga_d = $this->input->post('biaya_bunga_d');
        $biaya_lain_lain_d = $this->input->post('biaya_lain_lain_d');
        $pendapatan_lain_d = $this->input->post('pendapatan_lain_d');
        $laba_rugi_sebelum_pajak_d = $this->input->post('laba_rugi_sebelum_pajak_d');
        $pajak_d = $this->input->post('pajak_d');
        $laba_bersih_d = $this->input->post('laba_bersih_d');
        $dsr_d = $this->input->post('dsr_d');
        $catatan_financial_highlights = $this->input->post('summernote8');
        $januari = $this->input->post('januari');
        $februari = $this->input->post('februari');
        $maret = $this->input->post('maret');
        $april = $this->input->post('april');
        $mei = $this->input->post('mei');
        $total_b = $this->input->post('total_b');
        $biaya_bunga_e = $this->input->post('biaya_bunga_e');
        $biaya_lain_lain_e = $this->input->post('biaya_lain_lain_a');
        $bulan1 = $this->input->post('bulan1');
        $x1 = $this->input->post('x1');
        $kredit1 = $this->input->post('kredit1');
        $x2 = $this->input->post('x2');
        $bulan2 = $this->input->post('bulan2');
        $x3 = $this->input->post('x3');
        $kredit2 = $this->input->post('kredit2');
        $x4 = $this->input->post('x4');
        $bulan3 = $this->input->post('bulan3');
        $x5 = $this->input->post('x5');
        $kredit3 = $this->input->post('kredit3');
        $x6 = $this->input->post('x6');
        $bulan4 = $this->input->post('bulan4');
        $x7 = $this->input->post('x7');
        $kredit4 = $this->input->post('kredit4');
        $x8 = $this->input->post('x8');
        $bulan5 = $this->input->post('bulan5');
        $x9 = $this->input->post('x9');
        $kredit5 = $this->input->post('kredit5');
        $x10 = $this->input->post('x10');
        $catatan_rekaprekening = $this->input->post('summernote9');
        $bank_c = $this->input->post('bank_c');
        $jenis_fasilitas_c = $this->input->post('jenis_fasilitas_c');
        $bunga = $this->input->post('bunga');
        $b_plafond = $this->input->post('b_plafond');
        $b_os_per = $this->input->post('b_os_per');
        $jangka_waktu_tenor = $this->input->post('jangka_waktu_tenor');
        $angsuran = $this->input->post('angsuran');
        $b_col = $this->input->post('b_col');
        $catatan_hasilbi_checking = $this->input->post('summernote11');
        $data_debitur_blmlengkap = $this->input->post('data_debitur_blmlengkap');
        $covenant_belum_dipenuhi = $this->input->post('covenant_belum_dipenuhi');
        $proposal_dalam_proses = $this->input->post('proposal_dalam_proses');
        $lain_lain = $this->input->post('lain_lain');
        $catatan_rekomendasi = $this->input->post('summernote12');
        $id_mrpk_perpanjangan = $this->input->post('id_mrpk_perpanjangan ');

        $data = array();
        foreach ($jenis_fasilitas_a as $key => $value) {
            $data [] = array(
                'jenis_fasilitas_a' => $value,
                'nama_debitur' => $nama_debitur,
                'nma_grup_usaha' => $nma_grup_usaha,
                'cif' => $cif,
                'suku_bunga' => $suku_bunga,
                'bidang_usaha' => $bidang_usaha,
                'kolektibilitas' => $kolektibilitas,
                'dpd' => $dpd,
                'sektorindustri_bss' => $sektorindustri_bss,
                'plafond_a' => $plafond_a[$key],
                'DueBunga_a' => $DueBunga_a[$key],
                'DUE_CH_a' => $DUE_CH_a[$key],
                'bakidebet_a' => $bakidebet_a[$key],
                'jatuhtempo_a' => $jatuhtempo_a[$key],
                'perpanjangan_a' => $perpanjangan_a[$key],
                'plafond_b' => $plafond_b[$key],
                'DueBunga_b' => $DueBunga_b[$key],
                'DUE_CH_b' => $DUE_CH_b[$key],
                'bakidebet_b' => $bakidebet_b[$key],
                'jatuhtempo_b' => $jatuhtempo_b[$key],
                'perpanjangan_b' => $perpanjangan_b[$key],
                'jenis_fasilitas_b' => $jenis_fasilitas_b[$key],
                'deskripsi' => $deskripsi[$key],
                'dokumen_jaminan' => $dokumen_jaminan[$key],
                'nilai_pasar' => $nilai_pasar[$key],
                'nilai_likuidasi' => $nilai_likuidasi[$key],
                'ht_feo' => $ht_feo[$key],
                'keterangan' => $keterangan[$key],
                'catatan_jamina' => $catatan_jamina,
                'bunga_persen' => $bunga_persen,
                'provinsi' => $provinsi,
                'administrasi' => $administrasi,
                'catatan_analisausahadebitur' => $catatan_analisausahadebitur,
                'penjualan_a' => $penjualan_a,
                'hrga_pokok_penjualan_a' => $hrga_pokok_penjualan_a,
                'depresisai_amortisasi_a' => $depresisai_amortisasi_a,
                'laba_kotor_a' => $laba_kotor_a,
                'biaya_variabel_a' => $biaya_variabel_a,
                'biaya_tetap_a' => $biaya_tetap_a,
                'laba_opersaional_a' => $laba_opersaional_a,
                'biaya_bunga_a' => $biaya_bunga_a,
                'biaya_lain_lain_a' => $biaya_lain_lain_a,
                'pendapatan_lain_a' => $pendapatan_lain_a,
                'laba_rugi_sebelum_pajak_a' => $laba_rugi_sebelum_pajak_a,
                'pajak_a' => $pajak_a,
                'laba_bersih_a' => $laba_bersih_a,
                'dsr_a' => $dsr_a,
                'periode_c' => $periode_c,
                'penjualan_e' => $penjualan_e,
                'hrga_pokok_penjualan_d' => $hrga_pokok_penjualan_d,
                'depresisai_amortisasi_d' => $depresisai_amortisasi_d,
                'laba_kotor_d' => $laba_kotor_d,
                'biaya_variabel_d' => $biaya_variabel_d,
                'laba_opersaional_d' => $laba_opersaional_d,
                'biaya_bunga_d' => $biaya_bunga_d,
                'biaya_lain_lain_d' => $biaya_lain_lain_d,
                'pendapatan_lain_d' => $pendapatan_lain_d,
                'laba_rugi_sebelum_pajak_d' => $laba_rugi_sebelum_pajak_d,
                'pajak_d' => $pajak_d,
                'laba_bersih_d' => $laba_bersih_d,
                'dsr_d' => $dsr_d,
                'catatan_financial_highlights' => $catatan_financial_highlights,
                'januari' => $januari,
                'februari' => $februari,
                'maret' => $maret,
                'april' => $april,
                'mei' => $mei,
                'total_b' => $total_b,
                'biaya_bunga_e' => $biaya_bunga_e,
                'biaya_lain_lain_e' => $biaya_lain_lain_e,
                'bulan1' => $bulan1,
                'x1' => $x1,
                'kredit1' => $kredit1,
                'x2' => $x2,
                'bulan2' => $bulan2,
                'x3' => $x3,
                'kredit2' => $kredit2,
                'x4' => $x4,
                'bulan3' => $bulan3,
                'x5' => $x5,
                'kredit3' => $kredit3,
                'x6' => $x6,
                'bulan4' => $bulan4,
                'x7' => $x7,
                'kredit4' => $kredit4,
                'x8' => $x8,
                'bulan5' => $bulan5,
                'x9' => $x9,
                'kredit5' => $kredit5,
                'x10' => $x10,
                'catatan_rekaprekening' => $catatan_rekaprekening,
                'bank_c' => $bank_c,
                'jenis_fasilitas_c' => $jenis_fasilitas_c[$key],
                'bunga' => $bunga[$key],
                'b_plafond' => $b_plafond[$key],
                'b_os_per' => $b_os_per[$key],
                'jangka_waktu_tenor' => $jangka_waktu_tenor[$key],
                'angsuran' => $angsuran[$key],
                'b_col' => $b_col[$key],
                'catatan_hasilbi_checking' => $catatan_hasilbi_checking,
                'data_debitur_blmlengkap' => $data_debitur_blmlengkap,
                'covenant_belum_dipenuhi' => $covenant_belum_dipenuhi,
                'proposal_dalam_proses' => $proposal_dalam_proses,
                'lain_lain' => $lain_lain,
                'catatan_rekomendasi' => $catatan_rekomendasi,
            );
        }

        $this->Content_model->insert_mrpk_perpanjangan($data);
        $this->sucess_notif_mrpkperpanjangan();
        redirect('create_document/read_mrpk_perpanjangan');
    }

    public function read_mrpk_perpanjangan() {
        if ($this->session->has_userdata('username')) {
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Memo Perpanjangan';
            $ambilcif = $this->input->get('myCountry');
            $namacif = $ambilcif;
            $cifambil = explode("-", $namacif);
            $cif = $cifambil['0'];
            $userid = $this->session->userdata('username');
            $result['searchmrpkperpanjangan'] = $this->Content_model->get_searcmrpk_perpanjangan($userid);

            $result['read_mrpkView_perpanjangan'] = $this->Content_model->read_mrpkView_perpanjangan();
            $result['content'] = 'read_mrpk_perpanjangan';
            $this->load->view('bss_home', $result);
        } else {
            redirect('/');
        }
    }

    public function read_mrpk_ayda_wo() {
        if ($this->session->has_userdata('username')) {
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'MRPK AYDA Write Out';
            $ambilcif = $this->input->get('myCountry');
            $namacif = $ambilcif;
            $cifambil = explode("-", $namacif);
            $cif = $cifambil['0'];
            $result['searchmrpkwo'] = $this->Content_model->get_searcmrpk_wo($cif);

            $result['read_mrpkView_wo'] = $this->Content_model->read_mrpkView_wo();
            $result['content'] = 'read_mrpk_ayda_wo';
            $this->load->view('bss_home', $result);
        } else {
            redirect('/');
        }
    }

    public function edit_mrpk_wo($a) {
        if ($this->session->has_userdata('username')) {
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Edit MRPK Write Off ';
//$result['printmrpkp']=$this->Content_model->printmrpkpelunasan($a);
            $result['datadammy'] = $this->Content_model->mrpkdatadammy($a);
            $result['dammy'] = $this->Content_model->dammy($a);
            $result['pelunasanprint'] = $this->Content_model->read_mrpkedit_wo($a);
            $result['content'] = 'edit_mrpk_wo';
            $this->load->view('bss_home', $result);
        } else {
            redirect('/');
        }
    }

    public function edit_mrpk_perpanjangan($a) {
        if ($this->session->has_userdata('username')) {
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Edit MRPK Perpanjangan ';
//$result['printmrpkp']=$this->Content_model->printmrpkpelunasan($a);
            $result['datadammy'] = $this->Content_model->mrpkdatadammy($a);
            $result['dammy'] = $this->Content_model->dammy($a);
            $result['pelunasanprint'] = $this->Content_model->read_mrpkedit_perpanjangan($a);
            $result['content'] = 'edit_mrpk_perpanjangan';
            $this->load->view('bss_home', $result);
        } else {
            redirect('/');
        }
    }

    public function priview_mrpk_wo($a) {
        if ($this->session->has_userdata('username')) {
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Priview MRPK Write Off ';
//$result['printmrpkp']=$this->Content_model->printmrpkpelunasan($a);
            $result['datadammy'] = $this->Content_model->mrpkdatadammy($a);
            $result['dammy'] = $this->Content_model->dammy($a);
            $result['pelunasanprint'] = $this->Content_model->read_preView_wo($a);
            $result['content'] = 'priviewmrpkwo';
            $this->load->view('bss_home', $result);
        } else {
            redirect('/');
        }
    }

    public function priview_mrpk_perpanjangan($a) {
        if ($this->session->has_userdata('username')) {
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Priview MRPK Perpanjangan ';
//$result['printmrpkp']=$this->Content_model->printmrpkpelunasan($a);
            $result['datadammy'] = $this->Content_model->mrpkdatadammy($a);
            $result['dammy'] = $this->Content_model->dammy($a);
            $result['pelunasanprint'] = $this->Content_model->read_preView_mrpkperpanjangan($a);
            $result['content'] = 'priviewmrpkperpanjangan';
            $this->load->view('bss_home', $result);
        } else {
            redirect('/');
        }
    }

    public function update_pelunasan_mrpk($cif) {

//$insert_data_pelunasan= 
        $name = $this->input->post('name');
        $alamat = $this->input->post('alamat');
        $cif = $this->input->post('cif');
        $bidang_usaha = $this->input->post('bidang_usaha');
        $lokasi_usaha = $this->input->post('lokasi_usaha');
        $nama_group_usaha = $this->input->post('nama_group_usaha');
        $debitur_sejak = $this->input->post('debitur_sejak');
        $dpd = $this->input->post('dpd');
        $col = $this->input->post('col');


        $os = $this->input->post('os');
        $plafond = $this->input->post('plafond');
        $DueBunga = $this->input->post('DueBunga');
        $DUE_CH = $this->input->post('DUE_CH');


        $ket_aprasial = $this->input->post('ket_aprasial');
        $ket_agunan = $this->input->post('ket_agunan');
        $total_os = $this->input->post('total_os');
        $total_plafond = $this->input->post('total_plafond');
        $total_tunggakan_bunga = $this->input->post('total_tunggakan_bunga');
        $total_tunggakan_denda = $this->input->post('total_tunggakan_denda');
        $total_abc = $this->input->post('total_abc');

        $mv_lama = $this->input->post('mv_lama');
        $lv_lama = $this->input->post('lv_lama');
        $mv_baru = $this->input->post('mv_baru');
        $lv_baru = $this->input->post('lv_baru');

        $total_mv_lama = $this->input->post('total_mv_lama');
        $total_lv_lama = $this->input->post('total_lv_lama');
        $total_mv_baru = $this->input->post('total_mv_baru');
        $total_lv_baru = $this->input->post('total_lv_baru');

        $jenispengajuan = $this->input->post('summernote3');
        //$plafond = $this->input->post('plafond');

        $kewajiban_pokok = $this->input->post('kewajiban_pokok');
        $pelunasan_pokok = $this->input->post('pelunasan_pokok');
        $sisa_kewajiban_pokok = $this->input->post('sisa_kewajiban_pokok');
        $hapus_tagih_pokok = $this->input->post('hapus_tagih_pokok');

        $kewajiban_bunga = $this->input->post('kewajiban_bunga');
        $pelunasan_bunga = $this->input->post('pelunasan_bunga');
        $sisa_kewajiban_bunga = $this->input->post('sisa_kewajiban_bunga');
        $hapus_tagih_bunga = $this->input->post('hapus_tagih_bunga');

        $kewajiban_denda = $this->input->post('kewajiban_denda');
        $pelunasan_denda = $this->input->post('pelunasan_denda');
        $sisa_kewajiban_denda = $this->input->post('sisa_kewajiban_denda');
        $hapus_tagih_denda = $this->input->post('hapus_tagih_denda');


        $biayalelang_a = $this->input->post('biayalelang_a');
        $biayalelang_b = $this->input->post('biayalelang_b');
        $pajak_a = $this->input->post('pajak_a');
        $pajak_b = $this->input->post('pajak_b');
        $freebls_a = $this->input->post('freebls_a');
        $freebls_b = $this->input->post('freebls_b');
        $catatan_analisa_permasalahan_debitur = $this->input->post('summernote4');
        $catatan_kondisi_penyelesaian = $this->input->post('summernote6');
        $desc_penagihan_a = $this->input->post('desckrip_penagihan_a');
        $desc_penagihan_b = $this->input->post('desckrip_penagihan_b');
        $desc_penagihan_c = $this->input->post('desckrip_penagihan_c');
        $desc_penagihan_d = $this->input->post('desckrip_penagihan_d');
        $desc_penagihan_e = $this->input->post('desckrip_penagihan_e');
        $desc_penagihan_f = $this->input->post('desckrip_penagihan_f');
        $desc_penagihan_g = $this->input->post('desckrip_penagihan_g');
        $desc_penagihan_h = $this->input->post('desckrip_penagihan_h');
        $desc_penagihan_i = $this->input->post('desckrip_penagihan_i');
        $desc_penagihan_j = $this->input->post('desckrip_penagihan_j');

        $pihak_hadir_a = $this->input->post('pihak_hadir_a');
        $pihak_hadir_b = $this->input->post('pihak_hadir_b');
        $pihak_hadir_c = $this->input->post('pihak_hadir_c');
        $pihak_hadir_d = $this->input->post('pihak_hadir_d');
        $pihak_hadir_e = $this->input->post('pihak_hadir_e');
        $pihak_hadir_f = $this->input->post('pihak_hadir_f');
        $pihak_hadir_g = $this->input->post('pihak_hadir_g');
        $pihak_hadir_h = $this->input->post('pihak_hadir_h');
        $pihak_hadir_i = $this->input->post('pihak_hadir_i');
        $pihak_hadir_j = $this->input->post('pihak_hadir_j');

        $lampiran_pengumuman_lelang = $this->input->post('lampiran_pengumuman_lelang');
        $lampiran_risalah_lelang = $this->input->post('lampiran_risalah_lelang');
        $lampiran_permohonan_pelunasan = $this->input->post('lampiran_permohonan_pelunasan');
        $lampiran_lpj_terakhir = $this->input->post('lampiran_lpj_terakhir');
        $lampiran_lainnya = $this->input->post('lampiran_lainnya');
        $flag = 1;
        $ceratedate = date('Y/M/D');
        $catatan_dasar_pertimbangan = $this->input->post('summernote7');
        $rekomendasi_penyelesaian_kredit = $this->input->post('summernote12');

        $a = 1;
        $data = array();
        foreach ($os as $key => $value) {
            $data [] = array(
                'nama_debitur' => $name,
                'alamat_debitur' => $alamat,
                'cif' => $cif,
                'bidang_usaha' => $bidang_usaha,
                'dpd' => $dpd,
                'kolektibilitas' => $col,
                'os' => $value,
                'plafond' => $plafond[$key],
                'tunggakan_bunga' => $DueBunga[$key],
                'tunggakan_denda' => $DUE_CH[$key],
                'total_os' => $total_os,
                'total_plafond' => $total_plafond,
                'total_tunggakan_bunga' => $total_tunggakan_bunga,
                'total_tunggakan_denda' => $total_tunggakan_denda,
                'total_keseluruhan_abc' => $total_abc,
                'mv_baru' => $mv_baru[$key],
                'lv_baru' => $lv_baru[$key],
                'mv_lama' => $mv_lama[$key],
                'lv_lama' => $lv_lama[$key],
                'pelunasan_pokok' => $pelunasan_pokok,
                'kewajiban_pokok' => $kewajiban_pokok,
                'sisa_kewajiban_pokok' => $sisa_kewajiban_pokok,
                'hapus_tagih_pokok' => $hapus_tagih_pokok,
                'pelunasan_bunga' => $pelunasan_bunga,
                'kewajiban_bunga' => $kewajiban_bunga,
                'sisa_kewajiban_bunga' => $sisa_kewajiban_bunga,
                'hapus_tagih_bunga' => $hapus_tagih_bunga,
                'pelunasan_denda' => $pelunasan_denda,
                'kewajiban_denda' => $kewajiban_denda,
                'sisa_kewajiban_denda' => $sisa_kewajiban_denda,
                'hapus_tagih_denda' => $hapus_tagih_denda,
                'ket_appraisal' => $ket_aprasial,
                'ket' => $ket_agunan,
                'jenis_pengajuan' => $jenispengajuan,
                'catatan_kondisi_penyelesaian' => $catatan_kondisi_penyelesaian,
                'permasalahan_debitur' => $catatan_analisa_permasalahan_debitur,
                'desckrip_penagihan_a' => $desc_penagihan_a,
                'desckrip_penagihan_b' => $desc_penagihan_b,
                'desckrip_penagihan_c' => $desc_penagihan_c,
                'desckrip_penagihan_d' => $desc_penagihan_d,
                'desckrip_penagihan_e' => $desc_penagihan_e,
                'desckrip_penagihan_f' => $desc_penagihan_f,
                'desckrip_penagihan_g' => $desc_penagihan_g,
                'desckrip_penagihan_h' => $desc_penagihan_h,
                'desckrip_penagihan_i' => $desc_penagihan_i,
                'desckrip_penagihan_j' => $desc_penagihan_j,
                'pihak_hadir_a' => $pihak_hadir_a,
                'pihak_hadir_b' => $pihak_hadir_b,
                'pihak_hadir_c' => $pihak_hadir_c,
                'pihak_hadir_d' => $pihak_hadir_d,
                'pihak_hadir_e' => $pihak_hadir_e,
                'pihak_hadir_f' => $pihak_hadir_f,
                'pihak_hadir_g' => $pihak_hadir_g,
                'pihak_hadir_h' => $pihak_hadir_h,
                'pihak_hadir_i' => $pihak_hadir_i,
                'pihak_hadir_j' => $pihak_hadir_j,
                'biaya_lelang_a' => $biayalelang_a,
                'biaya_lelang_b' => $biayalelang_b,
                'pajak_a' => $pajak_a,
                'pajak_b' => $pajak_b,
                'free_bls_a' => $freebls_a,
                'free_bls_b' => $freebls_b,
                'lampiran_pengumuman_lelang' => $lampiran_pengumuman_lelang,
                'lampiran_risalah_lelang' => $lampiran_risalah_lelang,
                'lampiran_permohonan_pelunasan' => $lampiran_permohonan_pelunasan,
                'lampiran_lpj_terakhir' => $lampiran_lpj_terakhir,
                'lampiran_lainnya' => $lampiran_lainnya,
                'dasar_pertimbangan' => $catatan_dasar_pertimbangan,
                'rekomendasi_penyelesaian_kredit' => $rekomendasi_penyelesaian_kredit,
            );
        }

        $this->Content_model->update_pelunasan_result1($data);

//   print_r($data);
//        redirect('guru/index');
        $this->sucess_notif_create_mrpk();
        redirect('content/read_mrpk_pelunasan');
    }

    public function update_mrpk_perpanjangan($cif_a) {
        $nama_debitur = $this->input->post('nama_debitur');
        $nma_grup_usaha = $this->input->post('nma_grup_usaha');
        $cif = $this->input->post('cif');
        $suku_bunga = $this->input->post('suku_bunga');
        $bidang_usaha = $this->input->post('bidang_usaha');
        $kolektibilitas = $this->input->post('kolektibilitas');
        $dpd = $this->input->post('dpd');
        $sektorindustri_bss = $this->input->post('sektorindustri_bss');

        $plafond_a = $this->input->post('plafond_a');
        $DueBunga_a = $this->input->post('DueBunga_a');
        $DUE_CH_a = $this->input->post('DUE_CH_a');
        $bakidebet_a = $this->input->post('bakidebet_a');
        $jatuhtempo_a = $this->input->post('jatuhtempo_a');
        $perpanjangan_a = $this->input->post('perpanjangan_a');

        $jenis_fasilitas_a = $this->input->post('jenis_fasilitas_a');

        $plafond_b = $this->input->post('plafond_b');
        $DueBunga_b = $this->input->post('DueBunga_b');
        $DUE_CH_b = $this->input->post('DUE_CH_b');
        $bakidebet_b = $this->input->post('bakidebet_b');
        $jatuhtempo_b = $this->input->post('jatuhtempo_b');
        $perpanjangan_b = $this->input->post('perpanjangan_b');
        $jenis_fasilitas_b = $this->input->post('jenis_fasilitas_b');
        $deskripsi = $this->input->post('deskripsi');
        $dokumen_jaminan = $this->input->post('dokumen_jaminan');
        $nilai_pasar = $this->input->post('nilai_pasar');
        $nilai_likuidasi = $this->input->post('nilai_likuidasi');
        $ht_feo = $this->input->post('ht_feo');
        $keterangan = $this->input->post('keterangan');
        $catatan_jamina = $this->input->post('summernote6');
        $bunga_persen = $this->input->post('bunga_persen');
        $provinsi = $this->input->post('provinsi');
        $administrasi = $this->input->post('administrasi');
        $catatan_analisausahadebitur = $this->input->post('summernote7');
        $penjualan_a = $this->input->post('penjualan_a');
        $hrga_pokok_penjualan_a = $this->input->post('hrga_pokok_penjualan_a');
        $depresisai_amortisasi_a = $this->input->post('depresisai_amortisasi_a');
        $laba_kotor_a = $this->input->post('laba_kotor_a');
        $biaya_variabel_a = $this->input->post('biaya_variabel_a');
        $biaya_tetap_a = $this->input->post('biaya_tetap_a');
        $laba_opersaional_a = $this->input->post('laba_opersaional_a');
        $biaya_bunga_a = $this->input->post('biaya_bunga_a');
        $biaya_lain_lain_a = $this->input->post('biaya_lain_lain_a');
        $pendapatan_lain_a = $this->input->post('pendapatan_lain_a');

        $laba_rugi_sebelum_pajak_a = $this->input->post('laba_rugi_sebelum_pajak_a');
        $pajak_a = $this->input->post('pajak_a');
        $laba_bersih_a = $this->input->post('laba_bersih_a');
        $dsr_a = $this->input->post('dsr_a');
        $periode_c = $this->input->post('periode_c');
        $penjualan_e = $this->input->post('penjualan_e');
        $hrga_pokok_penjualan_d = $this->input->post('hrga_pokok_penjualan_d');
        $depresisai_amortisasi_d = $this->input->post('depresisai_amortisasi_d');
        $laba_kotor_d = $this->input->post('laba_kotor_d');
        $biaya_variabel_d = $this->input->post('biaya_variabel_d');
        $laba_opersaional_d = $this->input->post('laba_opersaional_d');
        $biaya_bunga_d = $this->input->post('biaya_bunga_d');
        $biaya_lain_lain_d = $this->input->post('biaya_lain_lain_d');
        $pendapatan_lain_d = $this->input->post('pendapatan_lain_d');
        $laba_rugi_sebelum_pajak_d = $this->input->post('laba_rugi_sebelum_pajak_d');
        $pajak_d = $this->input->post('pajak_d');
        $laba_bersih_d = $this->input->post('laba_bersih_d');
        $dsr_d = $this->input->post('dsr_d');
        $catatan_financial_highlights = $this->input->post('summernote8');
        $januari = $this->input->post('januari');
        $februari = $this->input->post('februari');
        $maret = $this->input->post('maret');
        $april = $this->input->post('april');
        $mei = $this->input->post('mei');
        $total_b = $this->input->post('total_b');
        $biaya_bunga_e = $this->input->post('biaya_bunga_e');
        $biaya_lain_lain_e = $this->input->post('biaya_lain_lain_a');
        $bulan1 = $this->input->post('bulan1');
        $x1 = $this->input->post('x1');
        $kredit1 = $this->input->post('kredit1');
        $x2 = $this->input->post('x2');
        $bulan2 = $this->input->post('bulan2');
        $x3 = $this->input->post('x3');
        $kredit2 = $this->input->post('kredit2');
        $x4 = $this->input->post('x4');
        $bulan3 = $this->input->post('bulan3');
        $x5 = $this->input->post('x5');
        $kredit3 = $this->input->post('kredit3');
        $x6 = $this->input->post('x6');
        $bulan4 = $this->input->post('bulan4');
        $x7 = $this->input->post('x7');
        $kredit4 = $this->input->post('kredit4');
        $x8 = $this->input->post('x8');
        $bulan5 = $this->input->post('bulan5');
        $x9 = $this->input->post('x9');
        $kredit5 = $this->input->post('kredit5');
        $x10 = $this->input->post('x10');
        $catatan_rekaprekening = $this->input->post('summernote9');
        $bank_c = $this->input->post('bank_c');
        $jenis_fasilitas_c = $this->input->post('jenis_fasilitas_c');
        $bunga = $this->input->post('bunga');
        $b_plafond = $this->input->post('b_plafond');
        $b_os_per = $this->input->post('b_os_per');
        $jangka_waktu_tenor = $this->input->post('jangka_waktu_tenor');
        $angsuran = $this->input->post('angsuran');
        $b_col = $this->input->post('b_col');
        $catatan_hasilbi_checking = $this->input->post('summernote11');
        $data_debitur_blmlengkap = $this->input->post('data_debitur_blmlengkap');
        $covenant_belum_dipenuhi = $this->input->post('covenant_belum_dipenuhi');
        $proposal_dalam_proses = $this->input->post('proposal_dalam_proses');
        $lain_lain = $this->input->post('lain_lain');
        $catatan_rekomendasi = $this->input->post('summernote12');
        $id_mrpk_perpanjangan = $this->input->post('id_mrpk_perpanjangan');

        $data = array();
        foreach ($jenis_fasilitas_a as $key => $value) {
            $data [] = array(
                'jenis_fasilitas_a' => $value,
                'nama_debitur' => $nama_debitur,
                'nma_grup_usaha' => $nma_grup_usaha,
                'cif' => $cif,
                'suku_bunga' => $suku_bunga,
                'bidang_usaha' => $bidang_usaha,
                'kolektibilitas' => $kolektibilitas,
                'dpd' => $dpd,
                'sektorindustri_bss' => $sektorindustri_bss,
                'plafond_a' => $plafond_a[$key],
                'DueBunga_a' => $DueBunga_a[$key],
                'DUE_CH_a' => $DUE_CH_a[$key],
                'bakidebet_a' => $bakidebet_a[$key],
                'jatuhtempo_a' => $jatuhtempo_a[$key],
                'perpanjangan_a' => $perpanjangan_a[$key],
                'plafond_b' => $plafond_b[$key],
                'DueBunga_b' => $DueBunga_b[$key],
                'DUE_CH_b' => $DUE_CH_b[$key],
                'bakidebet_b' => $bakidebet_b[$key],
                'jatuhtempo_b' => $jatuhtempo_b[$key],
                'perpanjangan_b' => $perpanjangan_b[$key],
                'jenis_fasilitas_b' => $jenis_fasilitas_b[$key],
                'deskripsi' => $deskripsi[$key],
                'dokumen_jaminan' => $dokumen_jaminan[$key],
                'nilai_pasar' => $nilai_pasar[$key],
                'nilai_likuidasi' => $nilai_likuidasi[$key],
                'ht_feo' => $ht_feo[$key],
                'keterangan' => $keterangan[$key],
                'catatan_jamina' => $catatan_jamina,
                'bunga_persen' => $bunga_persen,
                'provinsi' => $provinsi,
                'administrasi' => $administrasi,
                'catatan_analisausahadebitur' => $catatan_analisausahadebitur,
                'penjualan_a' => $penjualan_a,
                'hrga_pokok_penjualan_a' => $hrga_pokok_penjualan_a,
                'depresisai_amortisasi_a' => $depresisai_amortisasi_a,
                'laba_kotor_a' => $laba_kotor_a,
                'biaya_variabel_a' => $biaya_variabel_a,
                'biaya_tetap_a' => $biaya_tetap_a,
                'laba_opersaional_a' => $laba_opersaional_a,
                'biaya_bunga_a' => $biaya_bunga_a,
                'biaya_lain_lain_a' => $biaya_lain_lain_a,
                'pendapatan_lain_a' => $pendapatan_lain_a,
                'laba_rugi_sebelum_pajak_a' => $laba_rugi_sebelum_pajak_a,
                'pajak_a' => $pajak_a,
                'laba_bersih_a' => $laba_bersih_a,
                'dsr_a' => $dsr_a,
                'periode_c' => $periode_c,
                'penjualan_e' => $penjualan_e,
                'hrga_pokok_penjualan_d' => $hrga_pokok_penjualan_d,
                'depresisai_amortisasi_d' => $depresisai_amortisasi_d,
                'laba_kotor_d' => $laba_kotor_d,
                'biaya_variabel_d' => $biaya_variabel_d,
                'laba_opersaional_d' => $laba_opersaional_d,
                'biaya_bunga_d' => $biaya_bunga_d,
                'biaya_lain_lain_d' => $biaya_lain_lain_d,
                'pendapatan_lain_d' => $pendapatan_lain_d,
                'laba_rugi_sebelum_pajak_d' => $laba_rugi_sebelum_pajak_d,
                'pajak_d' => $pajak_d,
                'laba_bersih_d' => $laba_bersih_d,
                'dsr_d' => $dsr_d,
                'catatan_financial_highlights' => $catatan_financial_highlights,
                'januari' => $januari,
                'februari' => $februari,
                'maret' => $maret,
                'april' => $april,
                'mei' => $mei,
                'total_b' => $total_b,
                'biaya_bunga_e' => $biaya_bunga_e,
                'biaya_lain_lain_e' => $biaya_lain_lain_e,
                'bulan1' => $bulan1,
                'x1' => $x1,
                'kredit1' => $kredit1,
                'x2' => $x2,
                'bulan2' => $bulan2,
                'x3' => $x3,
                'kredit2' => $kredit2,
                'x4' => $x4,
                'bulan3' => $bulan3,
                'x5' => $x5,
                'kredit3' => $kredit3,
                'x6' => $x6,
                'bulan4' => $bulan4,
                'x7' => $x7,
                'kredit4' => $kredit4,
                'x8' => $x8,
                'bulan5' => $bulan5,
                'x9' => $x9,
                'kredit5' => $kredit5,
                'x10' => $x10,
                'catatan_rekaprekening' => $catatan_rekaprekening,
                'bank_c' => $bank_c,
                'jenis_fasilitas_c' => $jenis_fasilitas_c[$key],
                'bunga' => $bunga[$key],
                'b_plafond' => $b_plafond[$key],
                'b_os_per' => $b_os_per[$key],
                'jangka_waktu_tenor' => $jangka_waktu_tenor[$key],
                'angsuran' => $angsuran[$key],
                'b_col' => $b_col[$key],
                'catatan_hasilbi_checking' => $catatan_hasilbi_checking,
                'data_debitur_blmlengkap' => $data_debitur_blmlengkap,
                'covenant_belum_dipenuhi' => $covenant_belum_dipenuhi,
                'proposal_dalam_proses' => $proposal_dalam_proses,
                'lain_lain' => $lain_lain,
                'catatan_rekomendasi' => $catatan_rekomendasi
            );
            $this->Content_model->update_perpanjangan_mrpk($data, $cif_a);
        }


        $this->sucess_notif_mrpkperpanjangan();
        redirect('content/read_mrpk_perpanjangan');
    }

    public function update_mrpk_wo($a) {
        if ($this->session->has_userdata('username')) {

            $b = $this->input->get('ambilkondisipenyelesaian');
            $c = $this->input->get('dibayar');
            $d = $this->input->get('dihapus');
            $dd = $this->input->get('tglpenagihan');
            $e = $this->input->get('upayapenagihan');
            $f = $this->input->get('collectioncabang');
            $g = $this->input->get('chb1ada');
            $h = $this->input->get('chb1tidak');
            $i = $this->input->get('chb2ada');
            $j = $this->input->get('chb2tidak');
            $k = $this->input->get('chb3ada');
            $l = $this->input->get('chb3tidak');
            $m = $this->input->get('chb4ada');
            $n = $this->input->get('chb4tidak');
            $o = $this->input->get('chb5ada');
            $p = $this->input->get('chb5tidak');
            $q = $this->input->get('summernote6');
            $r = $this->input->get('summernote7');
            $s = $this->input->get('summernote8');
            $t = $this->input->get('summernote9');
            $u = $this->input->get('summernote11');
            // var_dump($a,$b,$c,$d,$e,$f,$g,
            //    $h,$i,$j,$k,$l,$m,$n,$o,$p,$q,$r,$s,$t,$u);
            $this->Content_model->update_perpanjangan_wo($a, $b, $c, $d, $dd, $e, $f, $g, $h, $i, $j, $k, $l, $m, $n, $o, $p, $q, $r, $s, $t, $u);
            $this->sucess_notif();
            redirect('content/read_mrpk_ayda_perpanjangan');
        } else {
            redirect('/');
        }
    }

    public function read_mrpk_wo() {
        if ($this->session->has_userdata('username')) {
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Memo Write Out';
            $ambilcif = $this->input->get('myCountry');
            $namacif = $ambilcif;
            $cifambil = explode("-", $namacif);
            $cif = $cifambil['0'];
            $userid = $this->session->userdata('username');
            $result['searchmrpkwo'] = $this->Content_model->get_searcmrpk_wo($userid);
            $result['read_mrpkView_wo'] = $this->Content_model->read_mrpkView_wo();
            $result['content'] = 'read_mrpk_wo';
            $this->load->view('bss_home', $result);
        } else {
            redirect('/');
        }
    }

    public function create_data_mrpkwo($cif) {

        $nama_debitur = $this->input->get('nama_debitur');
        $alamat_debitur = $this->input->get('alamat_debitur');
        $nomor_nasabah = $this->input->get('cif');
        $bidang_usaha = $this->input->get('bidang_usaha');
        $lokasi_usaha = $this->input->get('lokasi_usaha');
        $nama_grup_usaha = $this->input->get('nama_group_usaha');
        $debitur_sejak = $this->input->get('debitur_sejak');
        $menunggak_sejak = $this->input->get('menunggak_sejak');
        $dpd = $this->input->get('dpd');
        $kolektibilitas = $this->input->get('kolektibilitas');
        $ckpn = $this->input->get('ckpn');

        $jenis_fasilitas_pembayaran = $this->input->get('jenis_fasilitas');
        $plafond = $this->input->get('plafond');
        $os_per = $this->input->get('os_per');
        $jangka_waktu_tenor = $this->input->get('jangka_waktu');
        $tunggakan_bunga = $this->input->get('tunggakan_bunga');
        $tunggakan_denda = $this->input->get('tunggakan_denda');
        $total_fasilitas_abc = $this->input->get('total_abc');
        $tipe_jaminan = $this->input->get('tipe_jaminan');
        $desk_agunan = $this->input->get('deskripsi');
        $mv_baru = $this->input->get('mv_lama');
        $lv_baru = $this->input->get('lv_lama');
        $mv_lama = $this->input->get('mv_baru');
        $lv_lama = $this->input->get('lv_baru');
        $ket_appraisal = $this->input->get('keterangan_aprasisal');

        $kewajiban_a = $this->input->get('kewajiban_a');
        $pelunasan_a = $this->input->get('pelunasan_a');
        $sisa_kewajiban_a = $this->input->get('sisa_kewajiban_a');
        $hapustagih_a = $this->input->get('hapustagih_a');

        $kewajiban_b = $this->input->get('kewajiban_b');
        $pelunasan_b = $this->input->get('pelunasan_b');
        $sisa_kewajiban_b = $this->input->get('sisa_kewajiban_b');
        $hapustagih_b = $this->input->get('hapustagih_b');

        $kewajiban_c = $this->input->get('kewajiban_c');
        $pelunasan_c = $this->input->get('pelunasan_c');
        $sisa_kewajiban_c = $this->input->get('sisa_kewajiban_c');
        $hapustagih_c = $this->input->get('hapustagih_c');

        $biaya_lelang_dibayar = $this->input->get('biaya_lelang_a');
        $biaya_lelang_dihapus = $this->input->get('biaya_lelang_b');

        $pajak_dibayar = $this->input->get('pajak_a');
        $pajak_dihapus = $this->input->get('pajak_b');

        $freebls_dibayar = $this->input->get('freebls_a');
        $freebls_dihapus = $this->input->get('freebls_b');

        $tgl_upaya_penagihan_hadir_a = $this->input->get('tgl_upaya_penagihan_hadir_a');
        $desk_upaya_penagihan_hadir_a = $this->input->get('desk_upaya_penagihan_hadir_a');
        $penagihan_pihak_hadir_a = $this->input->get('penagihan_pihak_hadir_a');

        $tgl_upaya_penagihan_hadir_b = $this->input->get('tgl_upaya_penagihan_hadir_b');
        $desk_upaya_penagihan_hadir_b = $this->input->get('desk_upaya_penagihan_hadir_b');
        $penagihan_pihak_hadir_b = $this->input->get('penagihan_pihak_hadir_b');

        $tgl_upaya_penagihan_hadir_c = $this->input->get('tgl_upaya_penagihan_hadir_c');
        $desk_upaya_penagihan_hadir_c = $this->input->get('desk_upaya_penagihan_hadir_c');
        $penagihan_pihak_hadir_c = $this->input->get('penagihan_pihak_hadir_c');

        $tgl_upaya_penagihan_hadir_d = $this->input->get('tgl_upaya_penagihan_hadir_d');
        $desk_upaya_penagihan_hadir_d = $this->input->get('desk_upaya_penagihan_hadir_d');
        $penagihan_pihak_hadir_d = $this->input->get('penagihan_pihak_hadir_d');

        $tgl_upaya_penagihan_hadir_e = $this->input->get('tgl_upaya_penagihan_hadir_e');
        $desk_upaya_penagihan_hadir_e = $this->input->get('desk_upaya_penagihan_hadir_e');
        $penagihan_pihak_hadir_e = $this->input->get('penagihan_pihak_hadir_e');

        $tgl_upaya_penagihan_hadir_f = $this->input->get('tgl_upaya_penagihan_hadir_f');
        $desk_upaya_penagihan_hadir_f = $this->input->get('desk_upaya_penagihan_hadir_f');
        $penagihan_pihak_hadir_f = $this->input->get('penagihan_pihak_hadir_f');

        $tgl_upaya_penagihan_hadir_g = $this->input->get('tgl_upaya_penagihan_hadir_g');
        $desk_upaya_penagihan_hadir_g = $this->input->get('desk_upaya_penagihan_hadir_g');
        $penagihan_pihak_hadir_g = $this->input->get('penagihan_pihak_hadir_g');

        $tgl_upaya_penagihan_hadir_h = $this->input->get('tgl_upaya_penagihan_hadir_h');
        $desk_upaya_penagihan_hadir_h = $this->input->get('desk_upaya_penagihan_hadir_h');
        $penagihan_pihak_hadir_h = $this->input->get('penagihan_pihak_hadir_h');

        $tgl_upaya_penagihan_hadir_i = $this->input->get('tgl_upaya_penagihan_hadir_i');
        $desk_upaya_penagihan_hadir_i = $this->input->get('desk_upaya_penagihan_hadir_i');
        $penagihan_pihak_hadir_i = $this->input->get('penagihan_pihak_hadir_i');

        $tgl_upaya_penagihan_hadir_j = $this->input->get('tgl_upaya_penagihan_hadir_j');
        $desk_upaya_penagihan_hadir_j = $this->input->get('desk_upaya_penagihan_hadir_j');
        $penagihan_pihak_hadir_j = $this->input->get('penagihan_pihak_hadir_j');

        $tgl_upaya_penagihan_hadir_k = $this->input->get('tgl_upaya_penagihan_hadir_k');
        $desk_upaya_penagihan_hadir_k = $this->input->get('desk_upaya_penagihan_hadir_k');
        $penagihan_pihak_hadir_k = $this->input->get('penagihan_pihak_hadir_k');

        $tgl_upaya_penagihan_hadir_l = $this->input->get('tgl_upaya_penagihan_hadir_l');
        $desk_upaya_penagihan_hadir_l = $this->input->get('desk_upaya_penagihan_hadir_l');
        $penagihan_pihak_hadir_l = $this->input->get('penagihan_pihak_hadir_l');


        $chb1ada = $this->input->get('chb1');
        $chb2ada = $this->input->get('chb2');
        $chb3ada = $this->input->get('chb3');
        $chb4ada = $this->input->get('chb4');
        $chb5ada = $this->input->get('chb5');

        $jenis_pengajuan = $this->input->get('summernote3');
        $dasar_pertimbangan = $this->input->get('summernote7');
        $catatan_kondisi_penyelesaian = $this->input->get('summernote4');
        $catatananalisa_permasalahandebitur = $this->input->get('summernote6');

        $rekomendasi_penyelesaian_kredit = $this->input->get('summernote9');



        $data = array();
        foreach ($os_per as $key => $value) {
            $data [] = array(
//'jenis_pengajuan'=>$jenis_pengajuan,               
                'nama_debitur' => $nama_debitur,
                'alamat_debitur' => $alamat_debitur,
                'cif' => $cif,
                'bidang_usaha' => $bidang_usaha,
                'lokasi_usaha' => $lokasi_usaha,
                'nama_group_usaha' => $nama_grup_usaha,
                'debitur_sejak' => $debitur_sejak,
                'menunggak_sejak' => $menunggak_sejak,
                'dpd' => $dpd,
                'kolektibilitas' => $kolektibilitas,
                'ckpn' => $ckpn,
                'jenis_fasilitas' => $jenis_fasilitas_pembayaran[$key],
                'plafond' => $plafond[$key],
                'os_per' => $value,
                'jangka_waktu' => $jangka_waktu_tenor[$key],
                'tunggakan_bunga' => $tunggakan_bunga[$key],
                'tunggakan_denda' => $tunggakan_denda[$key],
//  'total_fasilitas_abc'=>$total_fasilitas_abc[$key],           
//  'total_tunggakan_pokok'=>$total_tunggakan_pokok[$key],         
//  'total_tunggakan_bunga'=>$total_tunggakan_bunga[$key],         
//  'total_tunggakan_denda'=>$total_tunggakan_denda[$key],
                'tipe_jaminan' => $tipe_jaminan[$key],
                'desk_agunan' => $desk_agunan[$key],
                'mv_lama' => $mv_lama[$key],
                'lv_lama' => $lv_lama[$key],
                'mv_baru' => $mv_baru[$key],
                'lv_baru' => $lv_baru[$key],
                'ket_appraisal' => $ket_appraisal[$key],
                'kewajiban_a' => $kewajiban_a,
                'pelunasan_a' => $pelunasan_a,
                'sisa_kewajiban_a' => $sisa_kewajiban_a,
                'hapustagih_a' => $hapustagih_a,
                'kewajiban_b' => $kewajiban_b,
                'pelunasan_b' => $pelunasan_b,
                'sisa_kewajiban_b' => $sisa_kewajiban_b,
                'hapustagih_b' => $hapustagih_b,
                'kewajiban_c' => $kewajiban_c,
                'pelunasan_c' => $pelunasan_c,
                'sisa_kewajiban_c' => $sisa_kewajiban_c,
                'hapustagih_c' => $hapustagih_c,
                'biaya_lelang_dibayar' => $biaya_lelang_dibayar,
                'biaya_lelang_dihapus' => $biaya_lelang_dihapus,
                'pajak_dibayar' => $pajak_dibayar,
                'pajak_dihapus' => $pajak_dihapus,
                'feebls_dibayar' => $freebls_dibayar,
                'feebls_dihapus' => $freebls_dihapus,
                'tgl_upaya_penagihan_hadir_a' => $tgl_upaya_penagihan_hadir_a,
                'desk_upaya_penagihan_hadir_a' => $desk_upaya_penagihan_hadir_a,
                'penagihan_pihak_hadir_a' => $penagihan_pihak_hadir_a,
                'tgl_upaya_penagihan_hadir_b' => $tgl_upaya_penagihan_hadir_b,
                'desk_upaya_penagihan_hadir_b' => $desk_upaya_penagihan_hadir_b,
                'penagihan_pihak_hadir_b' => $penagihan_pihak_hadir_b,
                'tgl_upaya_penagihan_hadir_c' => $tgl_upaya_penagihan_hadir_c,
                'desk_upaya_penagihan_hadir_c' => $desk_upaya_penagihan_hadir_c,
                'penagihan_pihak_hadir_c' => $penagihan_pihak_hadir_c,
                'tgl_upaya_penagihan_hadir_d' => $tgl_upaya_penagihan_hadir_d,
                'desk_upaya_penagihan_hadir_d' => $desk_upaya_penagihan_hadir_d,
                'penagihan_pihak_hadir_d' => $penagihan_pihak_hadir_d,
                'tgl_upaya_penagihan_hadir_e' => $tgl_upaya_penagihan_hadir_e,
                'desk_upaya_penagihan_hadir_e' => $desk_upaya_penagihan_hadir_e,
                'penagihan_pihak_hadir_e' => $penagihan_pihak_hadir_e,
                'tgl_upaya_penagihan_hadir_f' => $tgl_upaya_penagihan_hadir_f,
                'desk_upaya_penagihan_hadir_f' => $desk_upaya_penagihan_hadir_f,
                'penagihan_pihak_hadir_f' => $penagihan_pihak_hadir_f,
                'tgl_upaya_penagihan_hadir_g' => $tgl_upaya_penagihan_hadir_g,
                'desk_upaya_penagihan_hadir_g' => $desk_upaya_penagihan_hadir_g,
                'penagihan_pihak_hadir_g' => $penagihan_pihak_hadir_g,
                'tgl_upaya_penagihan_hadir_h' => $tgl_upaya_penagihan_hadir_h,
                'desk_upaya_penagihan_hadir_h' => $desk_upaya_penagihan_hadir_h,
                'penagihan_pihak_hadir_h' => $penagihan_pihak_hadir_h,
                'tgl_upaya_penagihan_hadir_i' => $tgl_upaya_penagihan_hadir_i,
                'desk_upaya_penagihan_hadir_i' => $desk_upaya_penagihan_hadir_i,
                'penagihan_pihak_hadir_i' => $penagihan_pihak_hadir_i,
                'tgl_upaya_penagihan_hadir_j' => $tgl_upaya_penagihan_hadir_j,
                'desk_upaya_penagihan_hadir_j' => $desk_upaya_penagihan_hadir_j,
                'penagihan_pihak_hadir_j' => $penagihan_pihak_hadir_j,
                'tgl_upaya_penagihan_hadir_k' => $tgl_upaya_penagihan_hadir_k,
                'desk_upaya_penagihan_hadir_k' => $desk_upaya_penagihan_hadir_k,
                'penagihan_pihak_hadir_k' => $penagihan_pihak_hadir_k,
                'tgl_upaya_penagihan_hadir_l' => $tgl_upaya_penagihan_hadir_l,
                'desk_upaya_penagihan_hadir_l' => $desk_upaya_penagihan_hadir_l,
                'penagihan_pihak_hadir_l' => $penagihan_pihak_hadir_l,
                'pengumuman_lelang' => $chb1ada,
                'risalah_lelang' => $chb2ada,
                'permohonan_pelunasan' => $chb3ada,
                'lainya_a' => $chb5ada,
                'lainya_b' => $chb4ada,
                'jenis_pengajuan' => $jenis_pengajuan,
                'dasar_pertimbangan' => $dasar_pertimbangan,
                'catatan_kondisi_penyelesaian' => $catatan_kondisi_penyelesaian,
                'permasalahan_debitur' => $catatananalisa_permasalahandebitur,
                'rekomendasi_penyelesaian_kredit' => $rekomendasi_penyelesaian_kredit
            );
            $insert = $this->Content_model->insert_mrpk_wo($data);
        }

//            $cekdata= $this->Content_model->cekdatarestruktur($cif);


        $this->sucess_notif_create_mrpk();
        redirect('content/read_mrpk_wo');
    }

    public function mrpk_wo_view_edit($cif) {
        if ($this->session->has_userdata('username')) {

            $cifid = $cif;
            $cifambil = explode("-", $cifid);
            $cif1 = $cifambil['0'];


            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'EDIT MRPK Pelunasan';

            $result['data'] = $this->Menu_model->loadMenu();


            $result['wo_row'] = $this->Content_model->get_data_edit_wo_row($cif1);
            $result['wo_result'] = $this->Content_model->get_data_edit_wo_result($cif1);
            //$ptbam_pelunasan1_edit = $this->Content_model->pelunasanptbam_getdata_edit1($cif1);
            //$result['kondisi_penjualan']= $this->Content_model->ambil_kondisipenualan($id);
            //$result['ambil_upayapenagihan']= $this->Content_model->ambil_upayapenagihan($id);
            //$result['ambil_lampiran']= $this->Content_model->ambil_lampiran($id);
            //$ptbampengajuan = $ptbam_pelunasan1_edit;
            //$result['pengajuanpelunasan'] = $ptbampengajuan;
            $result['content'] = 'edit_mrpk_wo';
            $this->load->view('bss_home', $result);
        }
    }

    public function update_data_mrpkwo($cif) {

        $nama_debitur = $this->input->post('nama_debitur');
        $alamat_debitur = $this->input->post('alamat_debitur');
        $nomor_nasabah = $this->input->post('cif');
        $bidang_usaha = $this->input->post('bidang_usaha');
        $lokasi_usaha = $this->input->post('lokasi_usaha');
        $nama_grup_usaha = $this->input->post('nama_group_usaha');
        $debitur_sejak = $this->input->post('debitur_sejak');
        $menunggak_sejak = $this->input->post('menunggak_sejak');
        $dpd = $this->input->post('dpd');
        $kolektibilitas = $this->input->post('kolektibilitas');
        $ckpn = $this->input->post('ckpn');

        $jenis_fasilitas_pembayaran = $this->input->post('jenis_fasilitas');
        $plafond = $this->input->post('plafond');
        $os_per = $this->input->post('os_per');
        $jangka_waktu_tenor = $this->input->post('jangka_waktu');
        $tunggakan_bunga = $this->input->post('tunggakan_bunga');
        $tunggakan_denda = $this->input->post('tunggakan_denda');
        $total_fasilitas_abc = $this->input->post('total_abc');
        $tipe_jaminan = $this->input->post('tipe_jaminan');
        $desk_agunan = $this->input->post('deskripsi');
        $mv_baru = $this->input->post('mv_lama');
        $lv_baru = $this->input->post('lv_lama');
        $mv_lama = $this->input->post('mv_baru');
        $lv_lama = $this->input->post('lv_baru');
        $ket_appraisal = $this->input->post('keterangan_aprasisal');

        $kewajiban_a = $this->input->post('kewajiban_a');
        $pelunasan_a = $this->input->post('pelunasan_a');
        $sisa_kewajiban_a = $this->input->post('sisa_kewajiban_a');
        $hapustagih_a = $this->input->post('hapustagih_a');

        $kewajiban_b = $this->input->post('kewajiban_b');
        $pelunasan_b = $this->input->post('pelunasan_b');
        $sisa_kewajiban_b = $this->input->post('sisa_kewajiban_b');
        $hapustagih_b = $this->input->post('hapustagih_b');

        $kewajiban_c = $this->input->post('kewajiban_c');
        $pelunasan_c = $this->input->post('pelunasan_c');
        $sisa_kewajiban_c = $this->input->post('sisa_kewajiban_c');
        $hapustagih_c = $this->input->post('hapustagih_c');

        $biaya_lelang_dibayar = $this->input->post('biaya_lelang_a');
        $biaya_lelang_dihapus = $this->input->post('biaya_lelang_b');

        $pajak_dibayar = $this->input->post('pajak_a');
        $pajak_dihapus = $this->input->post('pajak_b');

        $freebls_dibayar = $this->input->post('freebls_a');
        $freebls_dihapus = $this->input->post('freebls_b');

        $tgl_upaya_penagihan_hadir_a = $this->input->post('tgl_upaya_penagihan_hadir_a');
        $desk_upaya_penagihan_hadir_a = $this->input->post('desk_upaya_penagihan_hadir_a');
        $penagihan_pihak_hadir_a = $this->input->post('penagihan_pihak_hadir_a');

        $tgl_upaya_penagihan_hadir_b = $this->input->post('tgl_upaya_penagihan_hadir_b');
        $desk_upaya_penagihan_hadir_b = $this->input->post('desk_upaya_penagihan_hadir_b');
        $penagihan_pihak_hadir_b = $this->input->post('penagihan_pihak_hadir_b');

        $tgl_upaya_penagihan_hadir_c = $this->input->post('tgl_upaya_penagihan_hadir_c');
        $desk_upaya_penagihan_hadir_c = $this->input->post('desk_upaya_penagihan_hadir_c');
        $penagihan_pihak_hadir_c = $this->input->post('penagihan_pihak_hadir_c');

        $tgl_upaya_penagihan_hadir_d = $this->input->post('tgl_upaya_penagihan_hadir_d');
        $desk_upaya_penagihan_hadir_d = $this->input->post('desk_upaya_penagihan_hadir_d');
        $penagihan_pihak_hadir_d = $this->input->post('penagihan_pihak_hadir_d');

        $tgl_upaya_penagihan_hadir_e = $this->input->post('tgl_upaya_penagihan_hadir_e');
        $desk_upaya_penagihan_hadir_e = $this->input->post('desk_upaya_penagihan_hadir_e');
        $penagihan_pihak_hadir_e = $this->input->post('penagihan_pihak_hadir_e');

        $tgl_upaya_penagihan_hadir_f = $this->input->post('tgl_upaya_penagihan_hadir_f');
        $desk_upaya_penagihan_hadir_f = $this->input->post('desk_upaya_penagihan_hadir_f');
        $penagihan_pihak_hadir_f = $this->input->post('penagihan_pihak_hadir_f');

        $tgl_upaya_penagihan_hadir_g = $this->input->post('tgl_upaya_penagihan_hadir_g');
        $desk_upaya_penagihan_hadir_g = $this->input->post('desk_upaya_penagihan_hadir_g');
        $penagihan_pihak_hadir_g = $this->input->post('penagihan_pihak_hadir_g');

        $tgl_upaya_penagihan_hadir_h = $this->input->post('tgl_upaya_penagihan_hadir_h');
        $desk_upaya_penagihan_hadir_h = $this->input->post('desk_upaya_penagihan_hadir_h');
        $penagihan_pihak_hadir_h = $this->input->post('penagihan_pihak_hadir_h');

        $tgl_upaya_penagihan_hadir_i = $this->input->post('tgl_upaya_penagihan_hadir_i');
        $desk_upaya_penagihan_hadir_i = $this->input->post('desk_upaya_penagihan_hadir_i');
        $penagihan_pihak_hadir_i = $this->input->post('penagihan_pihak_hadir_i');

        $tgl_upaya_penagihan_hadir_j = $this->input->post('tgl_upaya_penagihan_hadir_j');
        $desk_upaya_penagihan_hadir_j = $this->input->post('desk_upaya_penagihan_hadir_j');
        $penagihan_pihak_hadir_j = $this->input->post('penagihan_pihak_hadir_j');

        $tgl_upaya_penagihan_hadir_k = $this->input->post('tgl_upaya_penagihan_hadir_k');
        $desk_upaya_penagihan_hadir_k = $this->input->post('desk_upaya_penagihan_hadir_k');
        $penagihan_pihak_hadir_k = $this->input->post('penagihan_pihak_hadir_k');

        $tgl_upaya_penagihan_hadir_l = $this->input->post('tgl_upaya_penagihan_hadir_l');
        $desk_upaya_penagihan_hadir_l = $this->input->post('desk_upaya_penagihan_hadir_l');
        $penagihan_pihak_hadir_l = $this->input->post('penagihan_pihak_hadir_l');


        $chb1ada = $this->input->post('chb1ada');
        $chb2ada = $this->input->post('chb2ada');
        $chb3ada = $this->input->post('chb3ada');
        $chb4ada = $this->input->post('chb4ada');
        $chb5ada = $this->input->post('chb5ada');

        $jenis_pengajuan = $this->input->post('summernote3');
        $dasar_pertimbangan = $this->input->post('summernote7');
        $catatan_kondisi_penyelesaian = $this->input->post('summernote4');
        $catatananalisa_permasalahandebitur = $this->input->post('summernote6');

        $rekomendasi_penyelesaian_kredit = $this->input->post('summernote9');



        $data = array();
        foreach ($os_per as $key => $value) {
            $data [] = array(
//'jenis_pengajuan'=>$jenis_pengajuan,               
                'nama_debitur' => $nama_debitur,
                'alamat_debitur' => $alamat_debitur,
                'cif' => $cif,
                'bidang_usaha' => $bidang_usaha,
                'lokasi_usaha' => $lokasi_usaha,
                'nama_group_usaha' => $nama_grup_usaha,
                'debitur_sejak' => $debitur_sejak,
                'menunggak_sejak' => $menunggak_sejak,
                'dpd' => $dpd,
                'kolektibilitas' => $kolektibilitas,
                'ckpn' => $ckpn,
                'jenis_fasilitas' => $jenis_fasilitas_pembayaran[$key],
                'plafond' => $plafond[$key],
                'os_per' => $value,
                'jangka_waktu' => $jangka_waktu_tenor[$key],
                'tunggakan_bunga' => $tunggakan_bunga[$key],
                'tunggakan_denda' => $tunggakan_denda[$key],
//  'total_fasilitas_abc'=>$total_fasilitas_abc[$key],           
//  'total_tunggakan_pokok'=>$total_tunggakan_pokok[$key],         
//  'total_tunggakan_bunga'=>$total_tunggakan_bunga[$key],         
//  'total_tunggakan_denda'=>$total_tunggakan_denda[$key],
                'tipe_jaminan' => $tipe_jaminan[$key],
                'desk_agunan' => $desk_agunan[$key],
                'mv_lama' => $mv_lama[$key],
                'lv_lama' => $lv_lama[$key],
                'mv_baru' => $mv_baru[$key],
                'lv_baru' => $lv_baru[$key],
                'ket_appraisal' => $ket_appraisal[$key],
                'kewajiban_a' => $kewajiban_a,
                'pelunasan_a' => $pelunasan_a,
                'sisa_kewajiban_a' => $sisa_kewajiban_a,
                'hapustagih_a' => $hapustagih_a,
                'kewajiban_b' => $kewajiban_b,
                'pelunasan_b' => $pelunasan_b,
                'sisa_kewajiban_b' => $sisa_kewajiban_b,
                'hapustagih_b' => $hapustagih_b,
                'kewajiban_c' => $kewajiban_c,
                'pelunasan_c' => $pelunasan_c,
                'sisa_kewajiban_c' => $sisa_kewajiban_c,
                'hapustagih_c' => $hapustagih_c,
                'biaya_lelang_dibayar' => $biaya_lelang_dibayar,
                'biaya_lelang_dihapus' => $biaya_lelang_dihapus,
                'pajak_dibayar' => $pajak_dibayar,
                'pajak_dihapus' => $pajak_dihapus,
                'feebls_dibayar' => $freebls_dibayar,
                'feebls_dihapus' => $freebls_dihapus,
                'tgl_upaya_penagihan_hadir_a' => $tgl_upaya_penagihan_hadir_a,
                'desk_upaya_penagihan_hadir_a' => $desk_upaya_penagihan_hadir_a,
                'penagihan_pihak_hadir_a' => $penagihan_pihak_hadir_a,
                'tgl_upaya_penagihan_hadir_b' => $tgl_upaya_penagihan_hadir_b,
                'desk_upaya_penagihan_hadir_b' => $desk_upaya_penagihan_hadir_b,
                'penagihan_pihak_hadir_b' => $penagihan_pihak_hadir_b,
                'tgl_upaya_penagihan_hadir_c' => $tgl_upaya_penagihan_hadir_c,
                'desk_upaya_penagihan_hadir_c' => $desk_upaya_penagihan_hadir_c,
                'penagihan_pihak_hadir_c' => $penagihan_pihak_hadir_c,
                'tgl_upaya_penagihan_hadir_d' => $tgl_upaya_penagihan_hadir_d,
                'desk_upaya_penagihan_hadir_d' => $desk_upaya_penagihan_hadir_d,
                'penagihan_pihak_hadir_d' => $penagihan_pihak_hadir_d,
                'tgl_upaya_penagihan_hadir_e' => $tgl_upaya_penagihan_hadir_e,
                'desk_upaya_penagihan_hadir_e' => $desk_upaya_penagihan_hadir_e,
                'penagihan_pihak_hadir_e' => $penagihan_pihak_hadir_e,
                'tgl_upaya_penagihan_hadir_f' => $tgl_upaya_penagihan_hadir_f,
                'desk_upaya_penagihan_hadir_f' => $desk_upaya_penagihan_hadir_f,
                'penagihan_pihak_hadir_f' => $penagihan_pihak_hadir_f,
                'tgl_upaya_penagihan_hadir_g' => $tgl_upaya_penagihan_hadir_g,
                'desk_upaya_penagihan_hadir_g' => $desk_upaya_penagihan_hadir_g,
                'penagihan_pihak_hadir_g' => $penagihan_pihak_hadir_g,
                'tgl_upaya_penagihan_hadir_h' => $tgl_upaya_penagihan_hadir_h,
                'desk_upaya_penagihan_hadir_h' => $desk_upaya_penagihan_hadir_h,
                'penagihan_pihak_hadir_h' => $penagihan_pihak_hadir_h,
                'tgl_upaya_penagihan_hadir_i' => $tgl_upaya_penagihan_hadir_i,
                'desk_upaya_penagihan_hadir_i' => $desk_upaya_penagihan_hadir_i,
                'penagihan_pihak_hadir_i' => $penagihan_pihak_hadir_i,
                'tgl_upaya_penagihan_hadir_j' => $tgl_upaya_penagihan_hadir_j,
                'desk_upaya_penagihan_hadir_j' => $desk_upaya_penagihan_hadir_j,
                'penagihan_pihak_hadir_j' => $penagihan_pihak_hadir_j,
                'tgl_upaya_penagihan_hadir_k' => $tgl_upaya_penagihan_hadir_k,
                'desk_upaya_penagihan_hadir_k' => $desk_upaya_penagihan_hadir_k,
                'penagihan_pihak_hadir_k' => $penagihan_pihak_hadir_k,
                'tgl_upaya_penagihan_hadir_l' => $tgl_upaya_penagihan_hadir_l,
                'desk_upaya_penagihan_hadir_l' => $desk_upaya_penagihan_hadir_l,
                'penagihan_pihak_hadir_l' => $penagihan_pihak_hadir_l,
                'pengumuman_lelang' => $chb1ada,
                'risalah_lelang' => $chb2ada,
                'permohonan_pelunasan' => $chb3ada,
                'lainya_a' => $chb4ada,
                'lainya_b' => $chb5ada,
                'jenis_pengajuan' => $jenis_pengajuan,
                'dasar_pertimbangan' => $dasar_pertimbangan,
                'catatan_kondisi_penyelesaian' => $catatan_kondisi_penyelesaian,
                'permasalahan_debitur' => $catatananalisa_permasalahandebitur,
                'rekomendasi_penyelesaian_kredit' => $rekomendasi_penyelesaian_kredit
            );
            $insert = $this->Content_model->mrpk_update_wo($data);
        }

//            $cekdata= $this->Content_model->cekdatarestruktur($cif);


        $this->sucess_notif_create_mrpk();
        redirect('content/read_mrpk_wo');
    }

    public function mrpk_wo_view_create() {
        if ($this->session->has_userdata('username')) {
            $ambilcif = $this->input->get('myCountry');
            $namacif = $ambilcif;
            $cifambil = explode("-", $namacif);
            $cif = $cifambil['0'];

            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Create MRPK Write Off';
            // $result['pelunasanmrpk'] = $this->Content_model->pelunasanmrpkfretext($cif);
            $userid = $this->session->userdata('username');
            $data1 = $this->Content_model->ceknomornasabah($cif, $userid);
            if ($data1 == '0') {
                $this->mrpk_cek_cif();
                redirect('content/read_mrpk_wo');
            } else {
                $result['data'] = $this->Menu_model->loadMenu();
                $result['pagename'] = 'Create MRPK ';
                $result['wo_row'] = $this->Content_model->get_data_wo_row($cif);
                $result['wo_result'] = $this->Content_model->get_data_wo_result($cif);
                $result['content'] = 'create_mrpk_wo';
                $this->load->view('bss_home', $result);
            }
        } else {
            redirect('/');
        }
    }

    public function mrpk_perpanjangan_view_edit($param) {
        if ($this->session->has_userdata('username')) {

            $cifid = $param;
            $cifambil = explode("-", $cifid);
            $cif1 = $cifambil['0'];


            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'EDIT MRPK Perpanjangan';

            $result['data'] = $this->Menu_model->loadMenu();


            $result['perpanjangan_row'] = $this->Content_model->getdata_perpanjangan_edit_row($cif1);
            $result['perpanjangan_result'] = $this->Content_model->perpanjangan_getdata_edit_result($cif1);
            //$ptbam_pelunasan1_edit = $this->Content_model->pelunasanptbam_getdata_edit1($cif1);
            //$result['kondisi_penjualan']= $this->Content_model->ambil_kondisipenualan($id);
            //$result['ambil_upayapenagihan']= $this->Content_model->ambil_upayapenagihan($id);
            //$result['ambil_lampiran']= $this->Content_model->ambil_lampiran($id);
            //$ptbampengajuan = $ptbam_pelunasan1_edit;
            //$result['pengajuanpelunasan'] = $ptbampengajuan;
            $result['content'] = 'edit_mrpk_perpanjangan';
            $this->load->view('bss_home', $result);
        }
    }

    public function mrpk_perpanjangan_view_create() {
        if ($this->session->has_userdata('username')) {
            $ambilcif = $this->input->get('myCountry');
            $namacif = $ambilcif;
            $cifambil = explode("-", $namacif);
            $cif = $cifambil['0'];

            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Create MRPK Write Off';
            // $result['pelunasanmrpk'] = $this->Content_model->pelunasanmrpkfretext($cif);
            $userid = $this->session->userdata('username');
            $data1 = $this->Content_model->ceknomornasabah($cif, $userid);
            if ($data1 == '0') {
                $this->mrpk_cek_cif();
                redirect('content/create_mrpk_perpanjangan');
            } else {
                $result['data'] = $this->Menu_model->loadMenu();
                $result['pagename'] = 'Create MRPK ';
                $result['perpanjangan_row'] = $this->Content_model->get_data_perpanjangan_row($cif);
                $result['perpanjangan_result'] = $this->Content_model->get_data_perpanjangan_result($cif);
                $result['content'] = 'create_mrpk_perpanjangan';
                $this->load->view('bss_home', $result);
            }
        } else {
            redirect('/');
        }
    }

    public function create_mrpkdammy_wo($u, $v) {

        $a = $this->input->get('ambilkondisipenyelesaian');
        $b = $this->input->get('dibayar');
        $c = $this->input->get('dihapus');
        $cc = $this->input->get('tglpenagihan');
        $d = $this->input->get('upayapenagihan');
        $e = $this->input->get('collectioncabang');
        $f = $this->input->get('chb1ada');
        $g = $this->input->get('chb1tidak');
        $h = $this->input->get('chb2ada');
        $i = $this->input->get('chb2tidak');
        $j = $this->input->get('chb3ada');
        $k = $this->input->get('chb3tidak');
        $l = $this->input->get('chb4ada');
        $m = $this->input->get('chb4tidak');
        $p = $this->input->get('summernote6');
        $q = $this->input->get('summernote7');
        $r = $this->input->get('summernote8');
        $s = $this->input->get('summernote9');
        $t = $this->input->get('summernote11');

//var_dump($a, $b, $c,$cc, $d, $e, $f, $g, $h, $i, $j, $k, $l, $m, $p, $q, $r, $s, $t, $u, $v);
        // var_dump($data);
        $this->Content_model->insert_mrpk_wo($a, $b, $c, $cc, $d, $e, $f, $g, $h, $i, $j, $k, $l, $m, $p, $q, $r, $s, $t, $u, $v);
        $this->sucess_notif_mrpkperpanjangan();
        redirect('content/read_mrpk_ayda_perpanjangan');
    }

    public function create_mrpkdammyperpanjangan($u, $v) {

        $a = $this->input->get('ambilkondisipenyelesaian');
        $b = $this->input->get('dibayar');
        $c = $this->input->get('dihapus');
        $cc = $this->input->get('tglpenagihan');
        $d = $this->input->get('upayapenagihan');
        $e = $this->input->get('collectioncabang');
        $f = $this->input->get('chb1ada');
        $g = $this->input->get('chb1tidak');
        $h = $this->input->get('chb2ada');
        $i = $this->input->get('chb2tidak');
        $j = $this->input->get('chb3ada');
        $k = $this->input->get('chb3tidak');
        $l = $this->input->get('chb4ada');
        $m = $this->input->get('chb4tidak');
        $p = $this->input->get('summernote6');
        $q = $this->input->get('summernote7');
        $r = $this->input->get('summernote8');
        $s = $this->input->get('summernote9');
        $t = $this->input->get('summernote11');

//var_dump($a, $b, $c,$cc, $d, $e, $f, $g, $h, $i, $j, $k, $l, $m, $p, $q, $r, $s, $t, $u, $v);
        // var_dump($data);
        $this->Content_model->insert_mrpk_perpanjangan($a, $b, $c, $cc, $d, $e, $f, $g, $h, $i, $j, $k, $l, $m, $p, $q, $r, $s, $t, $u, $v);
        $this->sucess_notif_mrpkperpanjangan();
        redirect('content/read_mrpk_ayda_perpanjangan');
    }

    public function sucess_notif_mrpkperpanjangan() {
        $this->session->set_flashdata(
                "message", "<script>swal(
              'Berhasil!',
              'Data Berhasil Di Update',
              'success'
            )</script>"
        );
    }

    public function priviewmrpkpelunasan($a) {
        if ($this->session->has_userdata('username')) {
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Preview MRPK ';
//$result['printmrpkp']=$this->Content_model->printmrpkpelunasan($a);
            $result['datadammy'] = $this->Content_model->mrpkdatadammy($a);
            $result['dammy'] = $this->Content_model->dammy($a);
            $result['pelunasanprint'] = $this->Content_model->pelunasanprintmrpk($a);
            $result['content'] = 'priviewmrpkpelunasan';
            $this->load->view('bss_home', $result);
        } else {
            redirect('/');
        }
    }

    //endcontroller punya DJ


    public function create_param_branch() {
        if ($this->session->has_userdata('username')) {
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Tambah Kota';
            $result['content'] = 'create_param_branch';
            $this->load->view('bss_home', $result);
//            $this->load->view('bss_home', $result); //$this->load->view('home', $result);
        } else {
            redirect('/');
        }
    }

    public function create_param_specialstage() {
        if ($this->session->has_userdata('username')) {
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Tambah special stage';
            $result['content'] = 'create_param_specialstage';
            $this->load->view('bss_home', $result);
//            $this->load->view('home',$result);
        } else {
            redirect('/');
        }
    }

    public function create_param_actioncode() {
        if ($this->session->has_userdata('username')) {
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Tambah Action Code';
            $result['content'] = 'create_param_actioncode';
            $this->load->view('bss_home', $result);
//            $this->load->view('home',$result);
        } else {
            redirect('/');
        }
    }

    public function create_param_area() {
        if ($this->session->has_userdata('username')) {
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Tambah Area';
            $result['content'] = 'create_param_area';
            $this->load->view('bss_home', $result);
//            $this->load->view('bss_home', $result); //$this->load->view('home', $result);
        } else {
            redirect('/');
        }
    }

    public function create_tgh_list($idagent) {
        if ($this->session->has_userdata('username')) {
            $result = array('agenid' => $idagent);
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Tambah Daftar Tagihan';
            $result['content'] = 'create_tgh_list';
            $this->load->view('bss_home', $result);
//            $this->load->view('bss_home', $result); //$this->load->view('home', $result);
        } else {
            redirect('/');
        }
    }

    public function delete_masterparameter() {
        if($this->input->post('delete2') == "delete3"){
			$selection = $this->input->post('idnya');
        if ($selection == '') {
            $this->faileddelete_notif();
            redirect('content/read_m_param');
        } elseif ($selection != '') {
            $this->delete_notif();
            $this->Content_model->delete_multimasterparameter($selection);
            redirect('content/read_m_param');
        } else {
			$this->faileddelete_notif();
            redirect('content/read_m_param');
		}
        // $this->Content_model->delete_multimasterparameter($selection);
        // $this->delete_notif();
        // redirect('content/read_m_param');
		}
		
    }

    public function update_allparameter() {
        $f_id = $this->input->post('f_id');
        $f_untuk = $this->input->post('f_untuk');
        $f_type = $this->input->post('f_type');
        $f_status = $this->input->post('f_status');
        $f_code = $this->input->post('f_code');
        $f_desc = $this->input->post('f_desc');
        $f_value = $this->input->post('f_value');

        //var_dump($f_id,$f_untuk,$f_type,$f_active,$f_code);
        $a = $this->Content_model->update_process_allparameter($f_id, $f_untuk, $f_type, $f_status, $f_code, $f_desc,$f_value);
        if ($a != null) {
            $this->update_notif();
            redirect('content/read_param');
        }

        $this->update_notif();
        redirect('content/read_param');
    }

    public function edit_allparameter($id) {
        if ($this->session->has_userdata('username')) {
            $result['data'] = $this->Menu_model->loadMenu();
            $result['agent'] = $this->Content_model->allparameter_edit($id);
            $result['pagename'] = 'Update All Parameter ';
            $result['content'] = 'edit_allparameter';
            $this->load->view('bss_home', $result);
//            $this->load->view('bss_home', $result); //$this->load->view('home', $result);
        } else {
            redirect('/');
        }
    }

    public function update_param($id) {
        if ($this->session->has_userdata('username')) {

            $aa = $this->input->post('f_type');
            $ab = $this->input->post('f_desc');
            var_dump($id, $aa, $ab);
        }
    }
	
	public function update_m_param(){
		$aa = $this->input->post('type1');
        $ab = $this->input->post('desc1');
        $code = $this->input->post('code1');
		$update = $this->Content_model->update_m_param($aa,$ab,$code);
		if($update == 1){
			$this->update_notif();
			redirect('content/read_m_param');
		} else {
			$this->gagal_notif();
			redirect('content/read_m_param');
		}
	}

    public function update_ms_kodepos($id) {
        if ($this->session->has_userdata('username')) {
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Tambah Data Karyawan';
            $result['records'] = $this->Content_model->get_ms_kodepos_one($id);
            $result['content'] = 'update_ms_kodepos';
            $this->load->view('bss_home', $result);
//            $this->load->view('bss_home', $result); //$this->load->view('home', $result);
        } else {
            redirect('/');
        }
    }

    public function update_ms_produk($id) {
        if ($this->session->has_userdata('username')) {
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Update Produk';
            $result['records'] = $this->Content_model->get_ms_produk_one($id);
            $result['content'] = 'update_ms_produk';
            $this->load->view('bss_home', $result);
//            $this->load->view('bss_home', $result); //$this->load->view('home', $result);
        } else {
            redirect('/');
        }
    }

    public function create_ms_produk() {
        if ($this->session->has_userdata('username')) {
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Tambah Produk';
            $result['content'] = 'create_ms_produk';
            $this->load->view('bss_home', $result);
            $this->load->view('bss_home', $result); //$this->load->view('home', $result);
        } else {
            redirect('/');
        }
    }

    public function create_ms_kodepos() {
        if ($this->session->has_userdata('username')) {
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Tambah Data Karyawan';
            $result['content'] = 'create_ms_kodepos';
            $this->load->view('bss_home', $result);
//            $this->load->view('bss_home', $result); //$this->load->view('home', $result);
        } else {
            redirect('/');
        }
    }

    function random_password() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $password = array();
        $alpha_length = strlen($alphabet) - 1;
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alpha_length);
            $password[] = $alphabet[$n];
        }
        return implode($password);
    }

    public function create_collector() {
        if ($this->session->has_userdata('username')) {
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Tambah Data Collector';
            $result['content'] = 'create_collector';
            $result['inputkaryawan'] = $this->Content_model->get_um_datakaryawan1()->result();
            $this->load->view('bss_home', $result);
            // $this->sucess_notif_create_collector();
            //redirect('content/create_collector');
        } else {
            redirect('/');
        }
    }

    public function create_userweb() {
        if ($this->session->has_userdata('username')) {
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Tambah Data Collector';
            $result['content'] = 'create_collector';
            $result['inputkaryawan'] = $this->Content_model->get_um_datakaryawanuserweb()->result();
            $this->load->view('bss_home', $result);
            // $this->sucess_notif_create_collector();
            //redirect('content/create_collector');
        } else {
            redirect('/');
        }
    }

    public function sucess_notif_create_collector() {
        $this->session->set_flashdata(
                "message", "<script>swal(
              'Berhasil!',
              'Data Berhasil Di Update',
              'success'
            )</script>"
        );
    }

    public function create_proses_collector() {
        if ($this->session->has_userdata('username')) {
            if (isset($_POST['save'])) {
                $code = "save";
                //$agenid = $this->input->post('agenid');
                // $nama = $this->input->post('nama');
                $selection = $this->input->post('check_list');
                //print_r($selection);
                $tes = $this->Content_model->create_agent_collector($selection);
                if ($tes == 1) {
                    $this->sucess_notif_create_collector();
                    redirect('content/view_agent');
                } elseif ($tes == '0') {
                    $this->gagal_notif();
                    redirect('content/create_collector');
                }
            }
        } else {
            redirect('/');
        }
    }

    public function create_um_datakaryawan() {
        if ($this->session->has_userdata('username')) {
            $result['data'] = $this->Menu_model->loadMenu();
            $result['cmp'] = $this->Content_model->paramselectcompany()->result();
            $result['direct'] = $this->Content_model->paramselectdirect()->result();
            $result['dept'] = $this->Content_model->paramselectdept()->result();
            $result['div'] = $this->Content_model->paramselectdiv()->result();
            $result['pst'] = $this->Content_model->paramselectposition()->result();
            $result['grp'] = $this->Content_model->paramselectgroup()->result();
            $result['area'] = $this->Content_model->paramselectemparea()->result();
            $result['status'] = $this->Content_model->paramselectempstatus()->result();
            $result['office'] = $this->Content_model->paramselectempoffice()->result();
            $result['cc'] = $this->Content_model->paramselectcostcenter()->result();
            $result['orgunit'] = $this->Content_model->paramselectorgunit()->result();
            $result['spv'] = $this->Content_model->paramselectspv()->result();
//            $result['data'] = $this->Menu_model->paramcompany();
            $result['pagename'] = 'Tambah Data Karyawan';
            $result['content'] = 'create_um_datakaryawan';
            $this->load->view('bss_home', $result);
//            $this->load->view('bss_home', $result); //$this->load->view('home', $result);
        } else {
            redirect('/');
        }
    }

    public function create_mntr_lelang() {
        if ($this->session->has_userdata('username')) {
            $cif = $this->input->GET('myCountry');
            // var_dump($cif);
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Tambah Data Lelang';
            $result['viewcreate_lelang'] = $this->Content_model->getaccountlist($cif);
            $result['content'] = 'create_mntr_lelang';
            $this->load->view('bss_home', $result);
//            $this->load->view('bss_home', $result); //$this->load->view('home', $result);
        } else {
            redirect('/');
        }
    }

    public function create_sp_administration() {
        if ($this->session->has_userdata('username')) {
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Tambah SP Administrasi';
            $result['content'] = 'create_sp_administration';

            $this->load->view('bss_home', $result);
//            $this->load->view('bss_home', $result); //$this->load->view('home', $result);
        } else {
            redirect('/');
        }
    }

    public function update_sp_administration($id) {
        if ($this->session->has_userdata('username')) {
            $result['data'] = $this->Menu_model->loadMenu();
            $result['row'] = $this->Content_model->get_sp_administration_one($id);
            $result['pagename'] = 'Edit SP Administrasi';
            $result['content'] = 'update_sp_administration';

            $this->load->view('bss_home', $result);
//            $this->load->view('bss_home', $result); //$this->load->view('home', $result);
        } else {
            redirect('/');
        }
    }

    public function edit_lelang($a) {

        $data = array(
            "f_cif" => $this->input->post('cif'),
            "f_custname" => $this->input->post('nama'),
            "f_eligible" => $this->input->post('eligible'),
            "f_register" => $this->input->post('register_a'),
            "f_periode_lelang" => $this->input->post('periodelelang'),
            "f_statuslelang" => $this->input->post('statuslelang'),
            "f_aginglelang" => $this->input->post('aginglelang'),
            "f_hasillelang" => $this->input->post('hasillelang')
        );
        // var_dump($data,$a);
        $this->Content_model->update_edit_lelang($data, $a);

        redirect('content/read_mt_lelang');
    }

    public function update_mntr_lelang($id) {
        if ($this->session->has_userdata('username')) {
            $result['data'] = $this->Menu_model->loadMenu();
            $result['row'] = $this->Content_model->get_mntr_lelang_one($id);
            $result['pagename'] = 'Edit Data Lelang';
            $result['content'] = 'update_mntr_lelang';
            $this->load->view('bss_home', $result);
//            $this->load->view('bss_home', $result); //$this->load->view('home', $result);
        } else {
            redirect('/');
        }
    }

    public function update_um_datakaryawan($id) {
        if ($this->session->has_userdata('username')) {
            $result['data'] = $this->Menu_model->loadMenu();
            $result['karyawan'] = $this->Content_model->get_um_datakaryawan_one($id);
            $result['pagename'] = 'Update Data Karyawan';
            $result['content'] = 'update_um_datakaryawan';
            $this->load->view('bss_home', $result);
//            $this->load->view('bss_home', $result); //$this->load->view('home', $result);
        } else {
            redirect('/');
        }
    }

    public function create_um_agent() {
        if ($this->session->has_userdata('username')) {
            $result['data'] = $this->Menu_model->loadMenu();
//            $result['userdep'] = $this->Content_model->depuser();
            $result['karyawan'] = $this->Content_model->get_um_datakaryawan()->result();
            $result['pagename'] = 'Tambah Agent';
            $result['content'] = 'create_um_agent';
            $this->load->view('bss_home', $result);
//            $this->load->view('bss_home', $result); //$this->load->view('home', $result);
        } else {
            redirect('/');
        }
    }

    public function update_tgh_list($id) {
        if ($this->session->has_userdata('username')) {
            $result['data'] = $this->Menu_model->loadMenu();
            $result['fields'] = $this->Content_model->get_tgh_list_one($id);
            $result['pagename'] = 'Update Daftar Tagihan';
            $result['content'] = 'update_tgh_list';
            $this->load->view('bss_home', $result);
//            $this->load->view('bss_home', $result); //$this->load->view('home', $result);
        } else {
            redirect('/');
        }
    }

    public function view_as_data($id) {
        if ($this->session->has_userdata('username')) {
            $result['data'] = $this->Menu_model->loadMenu();
            $result['assignment'] = $this->Content_model->get_as_data_one($id);
            $result['pagename'] = 'Update Assignment Data';
            $result['content'] = 'view_as_data';
            $this->load->view('bss_home', $result);
//            $this->load->view('bss_home', $result); //$this->load->view('home', $result);
        } else {
            redirect('/');
        }
    }

    public function update_as_data($id) {
        if ($this->session->has_userdata('username')) {
            $result['data'] = $this->Menu_model->loadMenu();
            $result['assignment'] = $this->Content_model->get_as_data_one($id);
            $result['pagename'] = 'Transfer Assignment';
            $result['content'] = 'update_as_data';
            $this->load->view('bss_home', $result);
//            $this->load->view('bss_home', $result); //$this->load->view('home', $result);
        } else {
            redirect('/');
        }
    }

    public function update_um_agent($id) {
        if ($this->session->has_userdata('username')) {
            $result['data'] = $this->Menu_model->loadMenu();
            $result['agent'] = $this->Content_model->get_um_agent_one($id);
            $result['pagename'] = 'Update Agent Data';
            $result['content'] = 'update_um_agent';
            $this->load->view('bss_home', $result);
//            $this->load->view('bss_home', $result); //$this->load->view('home', $result);
        } else {
            redirect('/');
        }
    }

    public function update_param_city_process() {
        if ($this->session->has_userdata('username')) {
            $id_kota = $this->input->post('id_kota');
            $city_name = $this->input->post('city_name');
            $status = $this->input->post('status');

            $this->update_notif();

            $this->Content_model->update_param_city_process($id_kota, $city_name, $status);
            redirect('content/read_param_city');
        } else {
            redirect('/');
        }
    }

    public function update_param_city($id) {
        if ($this->session->has_userdata('username')) {
            $result['data'] = $this->Menu_model->loadMenu();
            $result['city'] = $this->Content_model->get_city_one($id);
            $result['pagename'] = 'Update Data Kota';
            $result['content'] = 'update_param_city';



            $this->load->view('bss_home', $result);
//            $this->load->view('bss_home', $result); //$this->load->view('home', $result);
        } else {
            redirect('/');
        }
    }

    public function update_param_branch($id) {
        if ($this->session->has_userdata('username')) {
            $result['data'] = $this->Menu_model->loadMenu();
            $result['branch'] = $this->Content_model->get_branch_one($id);
            $result['pagename'] = 'Update Data Branch';
            $result['content'] = 'update_param_branch';
            $this->load->view('bss_home', $result);
//            $this->load->view('bss_home', $result); //$this->load->view('home', $result);
        } else {
            redirect('/');
        }
    }

    public function update_param_area($id) {
        if ($this->session->has_userdata('username')) {
            $result['data'] = $this->Menu_model->loadMenu();
            $result['area'] = $this->Content_model->get_area_one($id);
            $result['pagename'] = 'Update Data Area';
            $result['content'] = 'update_param_area';
            $this->load->view('bss_home', $result);
//            $this->load->view('bss_home', $result); //$this->load->view('home', $result);
        } else {
            redirect('/');
        }
    }

    public function view_recovery() {
		redirect('recovery/index');
        if ($this->session->has_userdata('username')) {
            $idmenu = 'H04';
            $idmenu2 = 'D044';
            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
            if ($result1 == '1') {
                $result['data'] = $this->Menu_model->loadMenu();
                $result['pagename'] = 'Menu recovery';
                $result['recovery'] = $this->Content_model->get_recovery();
                $result['content'] = 'view_recovery';
                $this->load->view('bss_home', $result);
            } else {
                redirect('Content/view_recovery');
            }
        }
    }

		    public function excel_countlist() {
        if ($this->session->has_userdata('username')) {
			$iduser = $this->session->userdata('username');
            $data = $this->Content_model->getdebitur();
           
            $phpexcel = new PHPExcel();
            $phpexcel->getProperties()->setCreator("BSS");
            $phpexcel->getProperties()->setLastModifiedBy("BSS");
            $phpexcel->getProperties()->setTitle("Data Not Accountlist");
            $phpexcel->getProperties()->setSubject("");
            $phpexcel->getProperties()->setDescription("");
            $phpexcel->setActiveSheetIndex(0);
			
            $phpexcel->getActiveSheet()->setCellValue('A1', 'Nomor Nasabah');
            $phpexcel->getActiveSheet()->setCellValue('B1', 'Nomor Rekening');
            $phpexcel->getActiveSheet()->setCellValue('C1', 'Nama Debitur');
            $phpexcel->getActiveSheet()->setCellValue('D1', 'LD Temenos');
            $phpexcel->getActiveSheet()->setCellValue('E1', 'Facility Type');
            $phpexcel->getActiveSheet()->setCellValue('F1', 'Ket_facility');
            $phpexcel->getActiveSheet()->setCellValue('G1', 'Kode cabang');
            $phpexcel->getActiveSheet()->setCellValue('H1', 'Nama cabang');
			$phpexcel->getActiveSheet()->setCellValue('I1', 'Cabang mapping');
            $phpexcel->getActiveSheet()->setCellValue('J1', 'Plafond Amount');
            $phpexcel->getActiveSheet()->setCellValue('K1', 'Baki Debet');
            $phpexcel->getActiveSheet()->setCellValue('L1', 'Angsuran');
            $phpexcel->getActiveSheet()->setCellValue('M1', 'Due Bunga');
            $phpexcel->getActiveSheet()->setCellValue('N1', 'Due Pokok');
            $phpexcel->getActiveSheet()->setCellValue('O1', 'Denda');
            $phpexcel->getActiveSheet()->setCellValue('P1', 'Available_Funds');
            $phpexcel->getActiveSheet()->setCellValue('Q1', 'lock_amt');
            $phpexcel->getActiveSheet()->setCellValue('R1', 'IntRate');
            $phpexcel->getActiveSheet()->setCellValue('S1', 'col');
            $phpexcel->getActiveSheet()->setCellValue('T1', 'DPD awal bulan per Loan');
            $phpexcel->getActiveSheet()->setCellValue('U1', 'DPD Saat ini perloan');
            $phpexcel->getActiveSheet()->setCellValue('V1', 'DPD awal bulan obl');
            $phpexcel->getActiveSheet()->setCellValue('W1', 'Bucket last obl');
            $phpexcel->getActiveSheet()->setCellValue('X1', 'DPD saat ini obl');
            $phpexcel->getActiveSheet()->setCellValue('Y1', 'Bucket now obl');
            $phpexcel->getActiveSheet()->setCellValue('Z1', 'DPD EOM');
            $phpexcel->getActiveSheet()->setCellValue('AA1', 'Estimasi Bucket EOM');
            $phpexcel->getActiveSheet()->setCellValue('AB1', 'AO Code');
            $phpexcel->getActiveSheet()->setCellValue('AC1', 'AO Name');
            $phpexcel->getActiveSheet()->setCellValue('AD1', 'Dateapproved');
			$phpexcel->getActiveSheet()->setCellValue('AE1', 'Startdate plafond');
            $phpexcel->getActiveSheet()->setCellValue('AF1', 'Date Expired PT');
            $phpexcel->getActiveSheet()->setCellValue('AG1', 'Date expired');
            $phpexcel->getActiveSheet()->setCellValue('AH1', 'Flag_resc');
            $phpexcel->getActiveSheet()->setCellValue('AI1', 'Flag probiz');
			
			$baris = 2;
            foreach ($data as $file) {
                $phpexcel->getActiveSheet()->setCellValue('A' . $baris, $file->NomorNasabah);
                $phpexcel->getActiveSheet()->setCellValue('B' . $baris, $file->NomorRekening);
                $phpexcel->getActiveSheet()->setCellValue('C' . $baris, $file->NamaDebitur);
                $phpexcel->getActiveSheet()->setCellValue('D' . $baris, $file->LD_Temenos);
                
                $phpexcel->getActiveSheet()->setCellValue('E' . $baris, $file->FacilityType);
                $phpexcel->getActiveSheet()->setCellValue('F' . $baris, $file->ket_facility);
                $phpexcel->getActiveSheet()->setCellValue('G' . $baris, $file->KodeCabang);
                $phpexcel->getActiveSheet()->setCellValue('H' . $baris, $file->nama_cabang);
                $phpexcel->getActiveSheet()->setCellValue('I' . $baris, $file->cabang_mapping);
                $phpexcel->getActiveSheet()->setCellValue('J' . $baris, $file->PlafondAmount);
                $phpexcel->getActiveSheet()->setCellValue('K' . $baris, $file->BakiDebet);
                $phpexcel->getActiveSheet()->setCellValue('L' . $baris, $file->angsuran);
                $phpexcel->getActiveSheet()->setCellValue('M' . $baris, $file->DueBunga);
                $phpexcel->getActiveSheet()->setCellValue('N' . $baris, $file->DuePokok);
                $phpexcel->getActiveSheet()->setCellValue('O' . $baris, $file->denda);
                $phpexcel->getActiveSheet()->setCellValue('P' . $baris, $file->Available_Funds);
                $phpexcel->getActiveSheet()->setCellValue('Q' . $baris, $file->lock_amt);
                $phpexcel->getActiveSheet()->setCellValue('R' . $baris, $file->IntRate);
                $phpexcel->getActiveSheet()->setCellValue('S' . $baris, $file->col);
                $phpexcel->getActiveSheet()->setCellValue('T' . $baris, $file->dpd_awal_bulan_perloan);
                $phpexcel->getActiveSheet()->setCellValue('U' . $baris, $file->dpd_saat_ini_perloan);
                $phpexcel->getActiveSheet()->setCellValue('V' . $baris, $file->dpd_awal_bulan_obl);
                $phpexcel->getActiveSheet()->setCellValue('W' . $baris, $file->bucket_last_obl);
                $phpexcel->getActiveSheet()->setCellValue('X' . $baris, $file->dpd_saat_ini_obl);
                $phpexcel->getActiveSheet()->setCellValue('Y' . $baris, $file->bucket_now_obl);
                $phpexcel->getActiveSheet()->setCellValue('Z' . $baris, $file->DPD_EOM);
                $phpexcel->getActiveSheet()->setCellValue('AA' . $baris, $file->Estimasi_Bucket_EOM);
                $phpexcel->getActiveSheet()->setCellValue('AB' . $baris, $file->AO_Code);
                $phpexcel->getActiveSheet()->setCellValue('AC' . $baris, $file->AOName);
				
				
				$phpexcel->getActiveSheet()->setCellValue('AD' . $baris, $file->Dateapproved);
                $phpexcel->getActiveSheet()->setCellValue('AE' . $baris, $file->Startdateplafond);
                $phpexcel->getActiveSheet()->setCellValue('AF' . $baris, $file->Date_Expired_PT);
                $phpexcel->getActiveSheet()->setCellValue('AG' . $baris, $file->date_expired);
                $phpexcel->getActiveSheet()->setCellValue('AH' . $baris, $file->flag_resc);
				$phpexcel->getActiveSheet()->setCellValue('AI' . $baris, $file->flag_probiz);
               
                $baris++;
            }
           $filename = "Data Accountlist-" . date("d-m-Y") .'.xlsx';
            $phpexcel->getActiveSheet()->setTitle("Data Accountlist");
            header('Content-Type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition:attachment;filename="' . $filename . '"');
            header('Cache-control:max-age=0');
			
            $writer = PHPExcel_IOFactory::createWriter($phpexcel, 'Excel2007');
            //print_r($file);
			ob_end_clean();
            $writer->save('php://output');
            if ($writer == TRUE) {
                $this->Model_log->logactivity($this->session->userdata('username'), "Sucess Download : " . $filename);
            } else {
                $this->Model_log->logactivity($this->session->userdata('username'), "Gagal Download : " . $filename);
            }
            exit;
        } else {
            exit;
        }
    }
	
	
    public function read_tgh_list() {
        if ($this->session->has_userdata('username')) {
            $idmenu = 'H04';
            $idmenu2 = 'D011';
            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
            if ($result1 == '1') {
                $result['data'] = $this->Menu_model->loadMenu();
                $result['pagename'] = 'Data Tagihan';
                // $result['assignment'] = $this->Content_model->get_debitur();
                $result['content'] = 'read_bss_accountlist';
                $this->load->view('bss_home', $result);
            }
        } else {
            redirect('/');
        }
    }

    public function ajax_list() {
        $list = $this->Content_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            // $row[] ='<input type="checkbox">';
            $row[] = $no;
            $row[] = $field->NomorNasabah;
            $row[] = $field->NomorRekening;
            $row[] = $field->LD_Temenos;
            $row[] = $field->NamaDebitur;
            $row[] = $field->FacilityType;
            $row[] = $field->ket_facility;
            $row[] = $field->KodeCabang;
            $row[] = $field->nama_cabang;
            $row[] = $field->cabang_mapping;
            $row[] = $field->PlafondAmount;
            $row[] = $field->BakiDebet;
            $row[] = $field->angsuran;
            $row[] = $field->DueBunga;
            $row[] = $field->DuePokok;
            $row[] = $field->denda;
            $row[] = $field->Available_Funds;
            $row[] = $field->lock_amt;
            $row[] = $field->IntRate;
            $row[] = $field->col;
            $row[] = $field->dpd_awal_bulan_perloan;
            $row[] = $field->dpd_saat_ini_perloan;
            $row[] = $field->dpd_awal_bulan_obl;
            $row[] = $field->bucket_last_obl;
            $row[] = $field->dpd_saat_ini_obl;
            $row[] = $field->bucket_now_obl;
            $row[] = $field->DPD_EOM;
            $row[] = $field->Estimasi_Bucket_EOM;
            $row[] = $field->AO_Code;
            $row[] = $field->AOName;
            $row[] = date("Y-m-d", strtotime($field->Dateapproved));
            $row[] = date("Y-m-d", strtotime($field->Startdateplafond));
            $row[] = date("Y-m-d", strtotime($field->Date_Expired_PT));
            $row[] = date("Y-m-d", strtotime($field->date_expired));
            $row[] = $field->flag_resc;
            $row[] = $field->flag_probiz;
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Content_model->count_all(),
            "recordsFiltered" => $this->Content_model->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function detail_data_debitruperagent($agent) {
        if ($this->session->has_userdata('username')) {
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Detail Collector';
            $result['detailcollector'] = $this->Content_model->get_detaildebitur($agent);
            $result['content'] = 'viewagent_debitur';
            $this->load->view('bss_home', $result);
        } else {
            redirect('content/view_agent');
        }
    }

    public function read_as_agentproduct() {
        if ($this->session->has_userdata('username')) {
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Agent Product';
            $result['assignment'] = $this->Content_model->get_as_agentproduct();
            $result['content'] = 'read_as_agentproduct';
            $this->load->view('bss_home', $result);
//            $this->load->view('bss_home', $result); //$this->load->view('home', $result);                 
        } else {
            redirect('/');
        }
    }

    public function read_as_datamanual() {
        if ($this->session->has_userdata('username')) {
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Manual Assignment';
            $result['assignment'] = $this->Content_model->get_as_datamanual();
            $result['content'] = 'read_as_datamanual';
            $this->load->view('bss_home', $result);
//            $this->load->view('bss_home', $result); //$this->load->view('home', $result);                 
        } else {
            redirect('/');
        }
    }

    public function read_as_datadetail($as_id) {
        if ($this->session->has_userdata('username')) {
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Data Assignment';
            $result['assignment'] = $this->Content_model->get_as_datadetail($as_id);
            $result['content'] = 'read_as_datadetails';
            $this->load->view('bss_home', $result);
//            $this->load->view('bss_home', $result); //$this->load->view('home', $result);                 
        } else {
            redirect('/');
        }
    }

    public function read_as_datadetail_by_branch($as_id) {
        if ($this->session->has_userdata('username')) {
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Data Assignment / Branch ' . $as_id;
            $result['assignment'] = $this->Content_model->get_as_datadetail_by_branch($as_id);
            $result['content'] = 'read_as_datadetails_by_branch';
//            $result['querynya'] = $this->db2->last_query();
            $this->load->view('bss_home', $result);
//            $this->load->view('bss_home', $result); //$this->load->view('home', $result);                 
        } else {
            redirect('/');
        }
    }

    public function viewDetail($value) {
        if ($this->session->has_userdata('username')) {
            $idmenu = 'H10';
            $idmenu2 = 'D025';
            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
            if ($result1 == '1') {
                $result['data'] = $this->Menu_model->loadMenu();
                $result['pagename'] = 'Data Visit';
                $result['debitur'] = $this->Content_model->get_detail_visit($value);
                $result['foto'] = $this->Content_model->get_foto_visit($value);
                $result['content'] = 'view_dt_visit';
                $this->load->view('bss_home', $result);
//            $this->load->view('bss_home', $result); //$this->load->view('home', $result);                 
            }
        } else {
            redirect('/');
        }
    }

//   public function read_dt_visit() {
//         if ($this->session->has_userdata('username')) {
//             $idmenu = 'H10';
//             $idmenu2 = 'D025';
//             $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
//             if ($result1 == '1') {
//                 $result['data'] = $this->Menu_model->loadMenu();
//                 $result['pagename'] = 'Data Visit';
//                 $result['assignment'] = $this->Content_model->get_dt_visit();
//                 $result['content'] = 'read_dt_visit';
//                 $this->load->view('bss_home', $result);
// //            $this->load->view('bss_home', $result); //$this->load->view('home', $result);                 
//             }
//         } else {
//             redirect('/');
//         }
//     }
    public function read_dk_harian() {
        if ($this->session->has_userdata('username')) {
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Data Kunjungan Harian';
            $result['assignment'] = $this->Content_model->get_dk_harian();
            $result['content'] = 'read_dk_harian';
            $this->load->view('bss_home', $result);
//            $this->load->view('bss_home', $result); //$this->load->view('home', $result);                 
        } else {
            redirect('/');
        }
    }

    public function read_dt_survey() {
        if ($this->session->has_userdata('username')) {
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Data Kunjungan Harian';
            $result['assignment'] = $this->Content_model->get_dt_survey();
            $result['content'] = 'read_dt_survey';
            $this->load->view('bss_home', $result);
//            $this->load->view('bss_home', $result); //$this->load->view('home', $result);                 
            $this->load->view('bss_home', $result); //$this->load->view('home', $result);                 
        } else {
            redirect('/');
        }
    }

    public function read_as_data() {
        if ($this->session->has_userdata('username')) {
            $idmenu = 'H05';
            $idmenu2 = 'D012';
            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
            if ($result1 == '1') {
                $result['data'] = $this->Menu_model->loadMenu();
                $result['pagename'] = 'Data Assignment';
                $result['assignment'] = $this->Content_model->get_as_data();
                $result['content'] = 'read_as_data';
                $this->load->view('bss_home', $result);
            }
//            $this->load->view('bss_home', $result); //$this->load->view('home', $result);                 
        } else {
            redirect('/');
        }
    }

    public function read_as_debitur() {
        if ($this->session->has_userdata('username')) {
            $idmenu = 'H05';
            $idmenu2 = 'D041';
            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
            if ($result1 == '1') {
                $userid = $this->session->userdata('username');
                $result['data'] = $this->Menu_model->loadMenu();
                $result['pagename'] = 'Data Assignment';
                $result['assignment'] = $this->Content_model->get_list_debitur($userid);
                $result['agent'] = $this->Content_model->get_agent();
                $result['content'] = 'read_as_debitur';
                $this->load->view('bss_home', $result);
//                $this->load->view('bss_home', $result); //$this->load->view('home', $result);
//                print_r($result);
            }
        } else {
            redirect('/');
        }
    }

    public function view_assigment() {
        if ($this->session->has_userdata('username')) {
            $idmenu = 'H05';
            $idmenu2 = 'D041';
            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
            if ($result1 == '1') {
                $result['data'] = $this->Menu_model->loadMenu();
                $result['pagename'] = 'Data Assignment';
                $result['assignment'] = $this->Content_model->view_dataassigment();
                $result['agent'] = $this->Content_model->get_agent();
                $result['content'] = 'view_assigment';
                $this->load->view('bss_home', $result);
//            $this->load->view('bss_home', $result); //$this->load->view('home', $result); 
            }
        } else {
            redirect('/');
        }
    }

    public function read_as_data_by_branch() {
        if ($this->session->has_userdata('username')) {
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Data by Branch';
            $result['assignment'] = $this->Content_model->get_as_data_by_branch();
//            echo "<script>alert('".$this->db2->last_query()."')</script>";
            $result['content'] = 'read_as_data_by_branch';
            $result['querynya'] = $this->db2->last_query();
//            $this->load->view('bss_home', $result);
//            $this->load->view('bss_home', $result); //$this->load->view('home', $result);
            $this->load->view('bss_home', $result); //$this->load->view('home', $result);
        } else {
            redirect('/');
        }
    }

    public function read_sp_administration() {
        if ($this->session->has_userdata('username')) {
            $idmenu = 'H06';
            $idmenu2 = 'D014';
            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
            if ($result1 == '1') {
                $result['data'] = $this->Menu_model->loadMenu();
                $result['jsp'] = $this->Content_model->getparamsp();
                $result['produk'] = $this->Content_model->getpproduk();
                $result['sp'] = $this->Content_model->getsp();
                $result['pagename'] = 'SP Administrasi';
                $result['content'] = 'read_sp_administration';

                $this->load->view('bss_home', $result);
//            $this->load->view('bss_home', $result); //$this->load->view('bss_home', $result); //$this->load->view('home', $result);                 
            }
        } else {
            redirect('/');
        }
    }

    public function sp_ad_proses() {
        if ($this->session->has_userdata('username')) {
            $jsp = $this->input->post('jenissp');
            $prd = $this->input->post('produk');
            $mindpd = $this->input->post('mindpd');
            $masa = $this->input->post('masa');
            $input = $this->Content_model->inputsp($jsp, $prd, $mindpd, $masa);
            if ($input === 1) {
                $this->sucess_notif();
                redirect('content/read_sp_administration');
            } else {
                $this->gagal_notif();
                redirect('content/read_sp_administration');
            }
        } else {
            redirect('/');
        }
    }

    public function sp_ad_proses_update() {
        if ($this->session->has_userdata('username')) {
            $jsp = $this->input->post('jenissp');
            $prd = $this->input->post('produk');
            $mindpd = $this->input->post('mindpd');
            $masa = $this->input->post('masa');
            $update = $this->Content_model->updatetsp($jsp, $prd, $mindpd, $masa);
            if ($update === 1) {
                $this->sucess_notif();
                redirect('content/read_sp_administration');
            } else {
                $this->gagal_notif();
                redirect('content/read_sp_administration');
            }
        } else {
            redirect('/');
        }
    }

    function get_sp_administration() {
        if ($this->session->has_userdata('username')) {
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
            foreach ($fetch_data as $row) {
                $sub_array = array();
                $sub_array[] = "<p class='text-center'><input class='ceklis' type='checkbox' value='$row->f_jenisSp' name='idnya[]'/></p>";
                $sub_array[] = "<a title='Edit' href='" . base_url('content/update_sp_administration/' . $row->f_jenisSp) . "'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>";
                $sub_array[] = $row->f_jenisSp;
                $sub_array[] = $row->f_produk;
                $sub_array[] = $row->f_DPDmin;
                $sub_array[] = $row->f_masaBerlaku;


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

    public function viewlelang() {
        $data = $this->db2->where('flaglelang', 1);
        $data = $this->db2->get('t_lelang');
        return $data->result();
    }

    public function read_mt_lelang() {
        if ($this->session->has_userdata('username')) {
            $idmenu = 'H12';
            $idmenu2 = 'D028';
            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
            if ($result1 == '1') {
                $result['data'] = $this->Menu_model->loadMenu();
                $result['pagename'] = 'Lelang';
                $result['content'] = 'read_mt_lelang';
                $result['serachlelang'] = $this->Content_model->debsearchlelang();
                // $result['viewlelang']=$this->Content_model->viewlelang ();
                $result['viewlelang'] = $this->Content_model->viewlelang();
                $this->load->view('bss_home', $result); //$this->load->view('bss_home', $result); //$this->load->view('home', $result);  
            }
        } else {
            redirect('/');
        }
    }

    public function read_va_instalment() {
        if ($this->session->has_userdata('username')) {
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Pending Instalment';

            $result['content'] = 'read_va_instalment';

            $this->load->view('bss_home', $result); //$this->load->view('bss_home', $result); //$this->load->view('home', $result);                 
        } else {
            redirect('/');
        }
    }

    function get_va_instalment() {
        if ($this->session->has_userdata('username')) {
            $table = "t_assigndetail";
            $select_column = 't_accountlist.f_custname, t_assigndetail.*';
            $order_column = array("f_assignid", "f_assigndate", "f_agentid", "f_cif", "f_acctno", "f_custname", "f_loanid", "f_productid", null);
            $order_query = 'f_assignid';
            $like = array(
                "t_assigndetail.f_assignid" => $_POST["search"]["value"],
                "t_assigndetail.f_agentid" => $_POST["search"]["value"]
            );

            if ($_POST['mtanggal'] != '' && $_POST['ntanggal'] != '') {
                $mtanggal = DateTime::createFromFormat('D, d M Y', $_POST['mtanggal'])->format('Y-m-d');
                $ntanggal = DateTime::createFromFormat('D, d M Y', $_POST['ntanggal'])->format('Y-m-d');
                $where = array(
                    't_assigndetail.f_status' => '0',
                    't_assigndetail.f_assigndate >=' => $mtanggal,
                    't_assigndetail.f_assigndate <=' => $ntanggal
                );
            } else {
                $where = array(
                    't_assigndetail.f_status' => '0'
                );
            }

            $fetch_data = $this->Content_model->make_datatables_compact($table, $select_column, $order_column, $order_query, $like, $where, $where);

            echo json_encode($fetch_data);
        }
    }

    function get_mntr_lelang() {
        if ($this->session->has_userdata('username')) {
            $table = "t_lelang";
            $select_column = '*';
            $order_column = array(null, "f_debtNum", "f_bankAccount", "f_CIFnum", "f_custName", "f_productName", "f_debtStartingDate", "f_debtDueDate", "f_tenor", "f_instDate", "f_maintenance_branch", "f_billingzipcode", "f_DPD_EOM", "f_bucket", "f_angsuran", "f_bakiDebet", "f_tunggakanPokok", "f_bunga", "f_denda", "f_totTagihan", "f_tglAkhirPembayaran", "f_nominalTerakhirPembayaran", "f_tglRestruktur", "f_restrukturKe", "f_tglUpdateT24");
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
            foreach ($fetch_data as $row) {
                $sub_array = array();
                $sub_array[] = "<p class='text-center'><input class='ceklis' type='checkbox' value='$row->f_debtNum' name='idnya[]'/></p>";
                $sub_array[] = "<a title='Edit' href='" . base_url('content/update_mntr_lelang/' . $row->f_debtNum) . "'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>";
                $sub_array[] = $row->f_debtNum;
                $sub_array[] = $row->f_bankAccount;
                $sub_array[] = $row->f_CIFnum;
                $sub_array[] = $row->f_custName;
                $sub_array[] = $row->f_productName;
                $sub_array[] = "<p style='white-space: nowrap; color: black;'>" . $this->convertNumbertoDate(substr($row->f_debtStartingDate, 0, 10)) . "</p>";
                $sub_array[] = "<p style='white-space: nowrap; color: black;'>" . $this->convertNumbertoDate($row->f_debtDueDate) . "<p>";
                $sub_array[] = $row->f_tenor;
                $sub_array[] = "<p style='white-space: nowrap; color: black;'>" . $this->convertNumbertoDate($row->f_instDate) . "</p>";
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
                $sub_array[] = "<p style='white-space: nowrap; color: black;'>" . $this->convertNumbertoDate($row->f_tglAkhirPembayaran) . "</p>";
                $sub_array[] = $row->f_nominalTerakhirPembayaran;
                $sub_array[] = "<p style='white-space: nowrap; color: black;'>" . $this->convertNumbertoDate($row->f_tglRestruktur) . "</p>";
                $sub_array[] = $row->f_restrukturKe;
                $sub_array[] = "<p style='white-space: nowrap; color: black;'>" . $this->convertNumbertoDate($row->f_tglUpdateT24) . "</p>";


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
    public function read_um_map() {
        if ($this->session->has_userdata('username')) {
            $idmenu = 'H03';
            $idmenu2 = 'D0100';
            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
            if ($result1 == '1') {
                $result['data'] = $this->Menu_model->loadMenu();
                $result['data1'] = $this->Content_model->location();
                $result['agent'] = $this->Maps_model->get_agent();
//            print_r($result);

                $result['pagename'] = 'Map';
//            $result['content'] = 'bss_maps';
                $result['content'] = 'bss_maps_test';
//            $result['content'] = 'maps-gmap';
                $this->load->view('bss_home', $result); //$this->load->view('bss_home', $result); //$this->load->view('home', $result);  
            }
        } else {
            redirect('/');
        }
    }

    public function read_um_map2() {
        $result['data'] = $this->Menu_model->loadMenu();
        $a = $this->input->post('agent');
        $b = explode("/", $this->input->post('tglvisit'), 3);
        $c = $b[0];
        $c1 = $b[1];
        $c2 = $b[2];
        $date = $c2 . "-" . $c . "-" . $c1;
        $result['data1'] = $this->Content_model->location2($a, $date);
        $result['agent'] = $this->Content_model->get_agent();
//        print_r($date);
        $result['pagename'] = 'Map';
//            $result['content'] = 'bss_maps';
        $result['content'] = 'bss_maps_test';
//            $result['content'] = 'maps-gmap';
        $this->load->view('bss_home', $result);
    }

    public function create_sysproses() {
        if ($this->session->has_userdata('username')) {
            $sysname = $this->input->post('sysname');
            $string = $this->input->post('string');
            $string1 = $this->input->post('string1');

            if (isset($_POST['edit'])) {
                $id = $this->input->post('id');
                $update = $this->Content_model->updatesysprocess($id, $sysname, $string, $string1);
//                print_r($update);
                if ($update === 1) {
                    $this->sucess_notif();
                    redirect('content/sys_process');
                } else {
                    $this->gagal_notif();
                    redirect('content/sys_process');
                }
            } elseif (isset($_POST['simpan'])) {
                $insert = $this->Content_model->insertsysproces($sysname, $string, $string1);
                if ($insert === 1) {
                    $this->sucess_notif();
                    redirect('content/sys_process');
                } elseif ($insert === 2) {
                    $this->gagal_notif();
                    redirect('content/sys_process');
                } else {
                    $this->gagal_notif();
                    redirect('content/sys_process');
                }
            } elseif (isset($_POST['delete'])) {
                $selected = $this->input->post('idnya');
                $delete = $this->Content_model->deletesysprocess($selected);
                if ($delete === 1) {
                    $this->sucess_notif();
                    redirect('content/sys_process');
                } elseif ($delete === 2) {
                    $this->gagaldelete_notif();
                    redirect('content/sys_process');
                } else {
                    $this->gagal_notif();
                    redirect('content/sys_process');
                }
            }
        } else {
            redirect('/');
        }
    }

    public function sys_process() {
        if ($this->session->has_userdata('username')) {
            $idmenu = 'H14';
            $idmenu2 = 'D037';
            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
            if ($result1 == '1') {
                $result['data'] = $this->Menu_model->loadMenu();
                $result['param'] = $this->Content_model->sysprocess();
                $result['pagename'] = 'Sys Process';
                $result['content'] = 'read_sysprocess';
                $this->load->view('bss_home', $result);
            }
        } else {
            redirect('/');
        }
    }

    public function sys_process_edit($id) {
        if ($this->session->has_userdata('username')) {
            $idmenu = 'H14';
            $idmenu2 = 'D037';
            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
            if ($result1 == '1') {
                $result['data'] = $this->Menu_model->loadMenu();
                $result['param'] = $this->Content_model->sysprocessedit($id);
                $result['pagename'] = 'Sys Process';
                $result['content'] = 'read_sysprocess_edit';
                $this->load->view('bss_home', $result);
            }
        } else {
            redirect('/');
        }
    }

    // public function sch_process() {
    //     if ($this->session->has_userdata('username')) {
    //         $idmenu = 'H14';
    //         $idmenu2 = 'D038';
    //         $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
    //         if ($result1 == '1') {
    //             $result['data'] = $this->Menu_model->loadMenu();
    //             $result['param'] = $this->Content_model->schprocess();
    //             $result['pagename'] = 'Scheduler Process';
    //             $result['content'] = 'read_schprocess';
    //             $this->load->view('bss_home', $result);
    //         }
    //     } else {
    //         redirect('/');
    //     }
    // }

    public function read_ms_produk() {
        if ($this->session->has_userdata('username')) {
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Produk';
            $result['records'] = $this->Content_model->get_ms_produk();
            $result['content'] = 'read_ms_produk';
            $this->load->view('bss_home', $result); //$this->load->view('home', $result);                 
        } else {
            redirect('/');
        }
    }

    public function read_ms_kodepos() {
        if ($this->session->has_userdata('username')) {
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Kode Pos';
            $result['records'] = $this->Content_model->get_ms_kodepos();
            $result['content'] = 'read_ms_kodepos';
            $this->load->view('bss_home', $result); //$this->load->view('home', $result);                 
        } else {
            redirect('/');
        }
    }

    public function read_um_datakaryawan() {
        if ($this->session->has_userdata('username')) {
            $idmenu = 'H03';
            $idmenu2 = 'D007';
            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
            if ($result1 == '1') {
                $result['data'] = $this->Menu_model->loadMenu();
                $result['pagename'] = 'Data Karyawan';
                $result['karyawan'] = $this->Content_model->get_um_datakaryawan()->result();
                $result['content'] = 'read_um_datakaryawan';
                $this->load->view('bss_home', $result); //$this->load->view('home', $result); 
            }
        } else {
            redirect('/');
        }
    }

    public function uploadNPWP($id) {
        if ($this->session->has_userdata('username')) {
            $result['data'] = $this->Menu_model->loadMenu();
            $result['agent'] = $this->Content_model->get_um_agent_one($id);
            $result['pagename'] = 'Upload NPWP';
            $result['content'] = 'uploadNPWP';
            $this->load->view('bss_home', $result); //$this->load->view('home', $result);
        } else {
            redirect('/');
        }
    }

    public function rejectApprove_um_agent($id) {
        //$result['data'] = $this->Menu_model->loadMenu();
        $rjtflag = $this->session->userdata('rjtflag');
        $result['agent'] = $this->Content_model->rejectApprove_um_agent($rjtflag, $id);
        redirect('content/read_um_agent');
    }

    public function Approve_um_agent($id) {
        if ($this->session->has_userdata('username')) {
            // $result['data'] = $this->Menu_model->loadMenu();
            $appflag = $this->session->userdata('appflag');
            $result['agent'] = $this->Content_model->Approve_um_agent($appflag, $id);
            $this->sucess_approve_collec();
            redirect('content/read_um_agent');
            //     $result['content'] = 'read_um_agent';
            //     $this->load->view('bss_home', $result); //$this->load->view('home', $result); 
        } else {
            $this->gagal_approve_collec();
            redirect('/');
        }
    }

    public function view_agent() {
        if ($this->session->has_userdata('username')) {
            $idmenu = 'H03';
            $idmenu2 = 'D008';
            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
            if ($result1 == '1') {
                $reqflag = $this->session->userdata('reqflag');
                $result['data'] = $this->Menu_model->loadMenu();
                $result['pagename'] = 'Agent';
                $result['allowedit'] = $this->session->userdata('allowedit');
                $result['agent'] = $this->Content_model->get_um_agent($reqflag);
                $result['content'] = 'view_agent';
                $this->load->view('bss_home', $result);
            }
        } else {
            redirect('/');
        }
    }

    public function read_param_branch() {
        if ($this->session->has_userdata('username')) {
            $idmenu = 'H08';
            $idmenu2 = 'D021c';
            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
            if ($result1 == '1') {
                $result['data'] = $this->Menu_model->loadMenu();
                $result['pagename'] = 'Branch';
                $result['branch'] = $this->Content_model->get_param_branch();
                $result['content'] = 'read_param_branch';
                $this->load->view('bss_home', $result); //$this->load->view('home', $result);              
            }
        } else {
            redirect('/');
        }
    }

    public function read_param_city() {
        if ($this->session->has_userdata('username')) {
            $result['data'] = $this->Menu_model->loadMenu();
            $result['city'] = $this->Content_model->get_param_city();
            $result['pagename'] = 'Kota';
            $result['content'] = 'read_param_city';
            $this->load->view('bss_home', $result); //$this->load->view('home', $result);                 
        } else {
            redirect('/');
        }
    }

    public function create_mrpk_pelunasan() {
        if ($this->session->has_userdata('username')) {
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Create MRPK Pelunasan ';
            //$result['SpecialStage']=$this->Content_model->read_mrpk();
            $result['content'] = 'create_mrpk_pelunasan';
            $this->load->view('home', $result);
        } else {
            redirect('/');
        }
    }

    public function mrpk_ayda() {
        if ($this->session->has_userdata('username')) {
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'MRPK AYDA';
            //$result['SpecialStage']=$this->Content_model->read_mrpk();
            $result['content'] = 'read_view_mrpk_ayda';
            $this->load->view('home', $result);
        } else {
            redirect('/');
        }
    }

    public function read_specialstage() {
        //redirect('spesial_stage/index');
        
        if ($this->session->has_userdata('username')) {
            $idmenu = 'H04';
            $idmenu2 = 'D033';
            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
            if ($result1 == '1') {
                $result['data'] = $this->Menu_model->loadMenu();
                $result['pagename'] = ' Special Stage';
                $result['stagespecial'] = $this->Content_model->get_special_stage();
                $result['viewstagespecial'] = $this->Content_model->special_stage_view();
                $result['content'] = 'read_specialstage';
                $this->load->view('bss_home', $result);
            }
        }
    }

    public function sucess_input_specialstage() {
        $this->session->set_flashdata(
                "message", "<script>swal(
              'Berhasil!',
              'Data Berhasil Di simpan',
              'success'
            )</script>"
        );
    }

    public function update_insert_specialstage() {

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png|pdf|doc';


        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
            $error = array('error' => $this->upload->display_errors());
            $this->gagal_input_special();
            redirect('content/read_specialstage');
        } else {
            $upload_data = array('upload_data' => $this->upload->data());
            //$data= $upload_data['upload_data'];
            $a = $this->input->post('cif');
            $bb = $this->input->post('loanid');
            $b = $this->input->post('f_flagspecialstage');

            $pisah = $b;
            $desc = explode("-", $pisah);
            $hasil1 = $desc['0'];
            $hasil2 = $desc['1'];


            foreach ($upload_data as $value) {
                # code...
                $_result[] = array(
                    'f_filemanager' => $value['file_name'],
                    'f_cif' => $a,
                    'f_loanid' => $bb,
                    'f_flagspecialstage' => $hasil2,
                    'f_code' => $hasil1
                );
            }

            //var_dump($_result);
            //print_r($upload_data);
            $a = $this->Content_model->updateInsertspecialstage($_result);
            $this->sucess_input_specialstage();
            redirect('content/read_specialstage');
        }
    }

    public function gagal_input_special() {
        $this->session->set_flashdata(
                "message", "<script>swal(
              'Gagal!',
              'File tidak sesuai',
              'gagal'
            )</script>"
        );
    }

    public function duplikat_specialstage() {
        $this->session->set_flashdata(
                "message", "<script>swal(
              'Gagal!',
              'Cif Dupikat',
              'gagal'
            )</script>"
        );
    }

    public function ambilcontorlerspecialstage($a) {
        if ($this->session->has_userdata('username')) {

            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'cretae Special Stage';
            $result['inputsepcialstage'] = $this->Content_model->getspecialstage($a);
            $result['paramstage'] = $this->Content_model->getparamspecialstage();
            // $result['stage'] = $this->Content_model->paramspecialstageget();
            $result['content'] = 'read_actionsp_page';
            $this->load->view('bss_home', $result); //$this->load->view('home', $result);             
        } else {
            redirect('/');
        }
    }

    public function gagal_search() {
        $this->session->set_flashdata(
                "message", "<script>swal(
              'Failed!',
              'Data Tidak di temukan',
              'Failed'
            )</script>"
        );
    }

    public function read_actionsp_page() {
        redirect('spesial_stage/read_actionsp_page');
//        $a = $this->input->get('myCountry');
//        $cifnama = $a;
//        $cif = explode("-", $cifnama);
//        $hasil = $cif['0'];
//        if ($hasil == null) {
//            $this->gagal_search();
//            redirect('content/read_specialstage');
//        } else {
//            $b [] = $this->ambilcontorlerspecialstage($hasil);
//        }
    }

    public function read_param_specialstage() {
        if ($this->session->has_userdata('username')) {
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Parameter Special Stage';
            $result['paramstage'] = $this->Content_model->getparamspecialstage();
            $result['content'] = 'read_param_specialstage';
            $this->load->view('bss_home', $result); //$this->load->view('home', $result);    
            $b = $this->ambilcontorlerspecialstage($hasil);
        } else {
            redirect('/');
        }
    }

    public function read_param_actioncode() {
        if ($this->session->has_userdata('username')) {
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Action Code';
            $result['actioncode'] = $this->Content_model->read_param_actioncode();
            $result['content'] = 'read_param_actioncode';
            $this->load->view('bss_home', $result); //$this->load->view('home', $result);                 
        } else {
            redirect('/');
        }
    }

    public function read_param_area() {
        if ($this->session->has_userdata('username')) {
            $result['data'] = $this->Menu_model->loadMenu();
            $result['area'] = $this->Content_model->get_param_area();
            $result['pagename'] = 'Area';
            $result['content'] = 'read_param_area';
            $this->load->view('bss_home', $result); //$this->load->view('home', $result);                 
        } else {
            redirect('/');
        }
    }

    public function create_param_city_process() {
        $id_kota = $this->input->post('id_kota');
        $city_name = $this->input->post('city_name');
        $status = $this->input->post('status');
        $this->Content_model->create_param_city_process($id_kota, $city_name, $status);
        redirect('content/read_param_city');
    }

    public function create_param_branch_process() {
        $id_branch = $this->input->post('id_branch');
        $branch_name = $this->input->post('branch_name');

        $address = $this->input->post('address');


        $a = $this->Content_model->create_param_branch_process($id_branch, $branch_name, $address);

        $this->sucess_notif();
        redirect('content/read_param_branch');
    }

    public function update_param_branch_process() {
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

    public function update_um_agent_process() {
        $id_agen = $this->input->post('nik');
        $f_nohp = $this->input->post('f_nohp');
        $email = $this->input->post('f_email');
        $active = $this->input->post('f_active');

        //var_dump($id_agen,$f_nohp,$email,$active);
        $this->Content_model->update_um_agent_process($id_agen, $f_nohp, $email, $active);
        echo $this->db2->last_query();
        $this->notif_sucess_update_agent();
        redirect('content/view_agent');
    }

    function notif_sucess_update_agent() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Berhasil!',
        text: 'Data Berhasil Di Update',
        type: 'success',
        showConfirmButton: false,
        timer: 1500,
        onOpen: function () {
        // AJAX request simulated with setTimeout
        setTimeout(function () {
        swal.close()
        }, 2000)
        }
        })</script>"
        );
    }

    public function sucess_notif_agent() {
        $this->session->set_flashdata(
                "message", "<script>swal(
              'Berhasil!',
              'Data Berhasil Di Update',
              'success'
            )</script>"
        );
    }

// public function sucess_notif_agent() {
//         $this->session->set_flashdata(
//                 "message", "<script>swal(
//               'Berhasil!',
//               'Data Berhasil Di Update',
//               'success'
//             )</script>"
//         );
//     }
    public function update_tgh_list_process() {
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

    public function create_tgh_list_process() {
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

    public function create_as_data_process() {
        $f_assignid = $this->input->post('f_assignid');
        $f_assigndate = DateTime::createFromFormat('D, d M Y', $this->input->post('f_assigndate'))->format('Y-m-d');
        $f_agentid = $this->input->post('f_agentid');
        $f_status = $this->input->post('f_status');
        $f_rectotal = $this->input->post('f_rectotal');
        $f_recdone = $this->input->post('f_recdone');
        $f_trftoagentid = $this->input->post('f_trftoagentid');
        $f_originagent = $this->input->post('f_originagent');
        $f_trfdate = DateTime::createFromFormat('D, d M Y', $this->input->post('f_trfdate'))->format('Y-m-d');

        $this->Content_model->create_as_data_process($f_assignid, $f_assigndate, $f_agentid, $f_status, $f_rectotal, $f_recdone, $f_trftoagentid, $f_originagent, $f_trfdate);
        redirect('content/read_as_datamanual');
    }

    public function update_as_data_process() {
        $f_assignid = $this->input->post('f_assignid');
        $f_agentid = $this->input->post('f_trftoagentid');
        $f_trftoagentid = $this->input->post('f_trftoagentid');
        $f_originagent = $this->input->post('f_agentid');
        $f_alasan = $this->input->post('f_alasan');
        $f_keterangan = $this->input->post('f_keterangan');
        $f_trfdate = date('Y-m-d');

        $this->Content_model->update_as_data_process($f_assignid, $f_agentid, $f_trftoagentid, $f_originagent, $f_alasan, $f_keterangan, $f_trfdate);
//        $this->update_notif();
        redirect('content/read_as_data');
    }

    public function update_ms_kodepos_process() {
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

    public function update_ms_produk_process() {
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

    public function create_ms_produk_process() {
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

    public function create_ms_kodepos_process() {
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

    public function create_um_datakaryawan_process() {
        $cmp = explode("|", $this->input->post('selectcompany'), 2);
        $cc = explode("|", $this->input->post('selectcostcenter'), 2);
        $dept = explode("|", $this->input->post('selectdept'), 2);
        $dirct = explode("|", $this->input->post('selectdirectorate'), 2);
        $div = explode("|", $this->input->post('selectcompany'), 2);
        $area = explode("|", $this->input->post('slelctarea'), 2);
        $office = explode("|", $this->input->post('selectoffice'), 2);
        $status = explode("|", $this->input->post('selectstatus'), 2);
        $group = explode("|", $this->input->post('selectgroup'), 2);
        $unit = explode("|", $this->input->post('selectgroup'), 2);
        $pst = explode("|", $this->input->post('selectposition'), 2);
        $spv = explode("|", $this->input->post('selectspv'), 2);

        // var_dump($cmp,$cc,$dept,$dirct,$div,$area,$office,$status,$group,$unit,$pst,$spv);


        $data = array(
            'f_nik' => $this->input->post('nik'),
            'f_birth_date' => $this->input->post('multiple-datepicker'),
            'f_company_desc' => $cmp[1],
            'f_company_id' => $cmp[0],
            'f_cost_center' => $cc[1],
            'f_cost_center_id' => $cc[0],
            'f_dept_desc' => $dept[1],
            'f_dept_id' => $dept[0],
            'f_directorate' => $dirct[0],
            'f_directorate_desc' => $dirct[1],
            'f_div_desc' => $div[1],
            'f_email' => $this->input->post('email'),
            'f_emp_area' => $area[0],
            'f_emp_area_desc' => $area[1],
            'f_emp_office' => $office[0],
            'f_emp_office_desc' => $office[1],
            'f_emp_status_code' => $status[0],
            'f_emp_status_desc' => $status[1],
            'f_full_name' => $this->input->post('nama'),
            'f_gender' => $this->input->post('gender'),
            'f_group_desc' => $group[1],
            'f_group_id' => $group[0],
            'f_join_date' => $this->input->post('joindate'),
            'f_landscape' => $this->input->post('landscape'),
            'f_no_ktp' => $this->input->post('ktp'),
            'f_no_tlp' => $this->input->post('notlp'),
            'f_org_unit_desc' => $unit[1],
            'f_org_unit_id' => $unit[0],
            'f_position_desc' => $pst[1],
            'f_position_id' => $pst[0],
            'f_status_date' => $this->input->post('statusdate'),
            'f_termintate_date' => $this->input->post('termintate'),
            'f_div_id' => $div[0],
            'f_group_grade_code' => $this->input->post('groupgrade'),
            'f_spv_id' => $spv[0],
            'f_spv_name' => $spv[1],
            'f_status' => 1,
            'f_user_create' => $this->session->userdata('username'),
            'f_create_date' => date('Y-m-d')
        );
        //var_dump($data);
        $insert = $this->Content_model->create_datakaryawan_process($data);

        if ($insert != null) {
            $this->sucess_notif();
            redirect('content/read_um_datakaryawan');
        } else {
            $this->gagal_notif();
            redirect('content/create_um_datakaryawan');
        }
    }

    public function gagaldelete_notif() {
        $this->session->set_flashdata(
                "message", "<script>swal(
              'Gagal!',
              'Tidak Ada Data Yang Di Pilih',
              'error'
            )</script>"
        );
    }

    public function create_mntr_lelang_process() {
        $data = array(
            "f_cif" => $this->input->post('cif'),
            "f_custname" => $this->input->post('nama'),
            "f_loanid" => $this->input->post('loan'),
            "f_jenisfasilitas" => $this->input->post('jenisfasilitas'),
            "f_plafound" => $this->input->post('plafond'),
            "f_nama_produk" => $this->input->post('namaproduk'),
            "f_startdate" => $this->input->post('startdate'),
            "f_duedate" => $this->input->post('dudate'),
            "f_tenor" => $this->input->post('tenor'),
            "f_branch_id" => $this->input->post('cabang'),
            "f_dpd" => $this->input->post('dpd'),
            "f_bucket" => $this->input->post('bucket'),
            "f_flag" => $this->input->post('flag'),
            "f_angsuran" => $this->input->post('angsuran'),
            "f_buki_debit" => $this->input->post('buki_debit'),
            "f_tunggakan_pokok" => $this->input->post('tunggakan_pokok'),
            "f_bunga" => $this->input->post('bunga'),
            "f_denda" => $this->input->post('denda'),
            "f_total_tagihan" => $this->input->post('total_tagihan'),
            "f_saldo_tabungan" => $this->input->post('saldo_tabungan'),
            "f_tanggal_restruktur" => $this->input->post('tanggal_restruktur'),
            "f_restruktur_ke" => $this->input->post('restruktur_ke'),
            "f_eligible" => $this->input->post('eligible'),
            "f_register" => $this->input->post('register_a'),
            "f_periode_lelang" => $this->input->post('periodelelang'),
            "f_statuslelang" => $this->input->post('statuslelang'),
            "f_aginglelang" => $this->input->post('aginglelang'),
            "f_hasillelang" => $this->input->post('hasillelang'),
            "flaglelang" => '1'
        );

        // print_r($data);
        $this->Content_model->create_mntr_lelang_process($data);
        $this->sucess_notif();
        redirect('content/read_mt_lelang');
    }

    public function create_sp_administration_process() {
        $data = array(
            "f_jenisSp" => $this->input->post('f_jenisSp'),
            "f_produk" => $this->input->post('f_produk'),
            "f_DPDmin" => $this->input->post('f_DPDmin'),
            "f_masaBerlaku" => $this->input->post('f_masaBerlaku'),
        );

        $this->Content_model->create_sp_administration_process($data);

        redirect('content/read_sp_administration');
    }

    public function update_sp_administration_process() {
        $data = array(
            "f_jenisSp" => $this->input->post('f_jenisSp'),
            "f_produk" => $this->input->post('f_produk'),
            "f_DPDmin" => $this->input->post('f_DPDmin'),
            "f_masaBerlaku" => $this->input->post('f_masaBerlaku'),
        );

        $this->Content_model->update_sp_administration_process($data);

        redirect('content/read_sp_administration');
    }

    public function update_mntr_lelang_process() {
        $data = array(
            "f_debtNum" => $this->input->post('f_debtNum'),
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
            "f_tglUpdateT24" => DateTime::createFromFormat('D, d M Y', $this->input->post('f_tglUpdateT24'))->format('Y-m-d')
        );

        $this->Content_model->update_mntr_lelang_process($data);

        redirect('content/read_mt_lelang');
    }

    public function update_um_datakaryawan_process() {
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

    public function create_um_agent_process() {
        //$id_agen = $this->input->post('id_agen');
        $nik = $this->input->post('nik');
        $agent_name = $this->input->post('agent_name');
        $id_branch = $this->input->post('id_branch');
        $username = $this->input->post('username');
        $pass = $this->input->post('password');
        $email = $this->input->post('email');
        $no_hp = $this->input->post('no_hp');
        $imei = $this->input->post('imei');
        $phone_sn = $this->input->post('phone_sn');
        $userdep = $this->input->post('userdep');
        // var_dump($nik);
        //  var_dump($agent_name);
        //   var_dump($id_branch);
        //    var_dump($username);
        //     var_dump($email);
        //      var_dump($no_hp);
        //      var_dump($imei);
        //     var_dump($phone_sn);
        //      var_dump($userdep);
        //$id_agen, ini cman percobaan
        $this->Content_model->create_um_agent_process($nik, $agent_name, $id_branch, $username, $pass, $email, $no_hp, $imei, $phone_sn, $userdep);
        redirect('content/read_um_agent');
    }

    public function create_param_specialstage_process() {
        $categoryspecialstage = $this->input->post('categoryspecialstage');
        $specialstagecode = $this->input->post('specialstagecode');
        //var_dump($categoryspecialstage,$specialstagecode);
        $this->Content_model->create_param_specialstage_process($categoryspecialstage, $specialstagecode);
    }

    public function create_param_actioncode_process() {
        $category = $this->input->post('Category');
        $actioncode = $this->input->post('Action_Code');
        $Description = $this->input->post('Description');

        $this->Content_model->create_param_actioncode_process($category, $actioncode, $Description);
        redirect('content/read_param_actioncode');
    }

    public function create_param_area_process() {
        $id_area = $this->input->post('id_area');
        $area_name = $this->input->post('area_name');
        $notes = $this->input->post('notes');

        $this->Content_model->create_param_area_process($id_area, $area_name, $notes);
        redirect('content/read_param_area');
    }

    public function update_param_area_process() {
        $id_area = $this->input->post('id_area');
        $area_name = $this->input->post('area_name');
        $notes = $this->input->post('notes');

        $this->Content_model->update_param_area_process($id_area, $area_name, $notes);
        redirect('content/read_param_area');
    }

    public function delete_multi_param_city() {
        $selection = $this->input->post('idnya');
        $this->Content_model->delete_multi_param_city($selection);

        $this->delete_notif();

        redirect('content/read_param_city');
    }

    public function delete_multi_param_branch() {
        $selection = $this->input->post('idnya');
        if ($selection == '') {
            $this->faileddelete_notif();
            redirect('content/read_param_branch');
        } elseif ($selection != '' or $selection != null) {
            $this->delete_notif();
            $this->Content_model->delete_multi_um_agent($selection);


            redirect('content/read_param_branch');
        }
    }

    public function delete_param($a) {
        //$selection = $this->input->post('idnya');
        //var_dump($selection);
        $this->Content_model->delete_Allparam($a);

        $this->delete_notif();

        redirect('content/read_param');
    }

    public function delete_multi_param_area() {
        $selection = $this->input->post('idnya');
        $this->Content_model->delete_multi_param_area($selection);

        $this->delete_notif();

        redirect('content/read_param_area');
    }

    public function delete_multi_ms_produk() {
        $selection = $this->input->post('idnya');
        $this->Content_model->delete_multi_ms_produk($selection);

        $this->delete_notif();

        redirect('content/read_ms_produk');
    }

    public function delete_multi_sp_administration() {
        $selection = $this->input->post('idnya');
        $this->Content_model->delete_multi_sp_administration($selection);

        $this->delete_notif();

        redirect('content/read_sp_administration');
    }

    public function delete_multi_Ayda() {
        $selection = $this->input->post('idnya');
        if ($selection == '') {
            $this->faileddelete_notif();
            redirect('content/view_ayda');
        } elseif ($selection != '') {
            $this->Content_model->delete_ayda($selection);

            $this->delete_notif();

            redirect('content/view_ayda');
        }
    }

    public function delete_multi_mntr_lelang() {
        $selection = $this->input->post('idnya');

        if ($selection == '') {
            $this->faileddelete_notif();
            redirect('content/read_mt_lelang');
        }
        $this->Content_model->delete_multi_mntr_lelang($selection);

        $this->delete_notif();

        redirect('content/read_mt_lelang');
    }

    public function delete_sysproses_multi() {
        $selection = $this->input->post('idnya');
        $this->Content_model->delete_multi_sysprosess($selection);

        $this->delete_notif();

        redirect('content/sys_process');
    }

    public function delete_multi_sysprocess() {
        $selection = $this->input->post('idnya');
        $this->Content_model->delete_multi_mntr_lelang($selection);

        $this->delete_notif();

        redirect('content/read_mt_lelang');
    }

    public function delete_multi_ms_kodepos() {
        $selection = $this->input->post('idnya');
        $this->Content_model->delete_multi_ms_kodepos($selection);

        $this->delete_notif();

        redirect('content/read_ms_kodepos');
    }

    public function delete_multi_um_datakaryawan() {
        $selection = $this->input->post('idnya');

        if ($selection == '') {
            $this->faileddelete_notif();
            redirect('content/read_um_datakaryawan');
        } elseif ($selection != '' or $selection != null) {
            $this->delete_notif();
            $this->Content_model->delete_multi_um_datakaryawan($selection);


            redirect('content/read_um_datakaryawan');
        }
    }

    public function delete_multi_um_agent() {
        $selection = $this->input->post('idnya');
        if ($selection == '') {
            $this->faileddelete_notif();
            redirect('content/view_agent');
        } elseif ($selection != '' or $selection != null) {
            $this->delete_notif();
            $this->Content_model->delete_multi_um_agent($selection);


            redirect('content/view_agent');
        }
        // $this->Content_model->delete_multi_um_agent($selection);
        // $this->delete_notif();
        // redirect('content/view_agent');
    }

    public function delete_specialstage() {
        
        redirect('spesial_stage/delete_specialstage');
//        $selection = $this->input->post('idnya');
//        if ($selection == '') {
//            $this->faileddelete_notif();
//            redirect('spesial_stage/index');
//        } elseif ($selection != '' or $selection != null) {
//            $this->delete_notif();
//            $this->Content_model->delete_idspecialstage($selection);
//
//
//            redirect('spesial_stage/index');
//            // $selection = $this->input->post('idnya');
//            // $this->Content_model->delete_idspecialstage($selection);
//            // $this->delete_notif();
//            // redirect('content/read_specialstage');
//        }
    }

    public function delete_multi_as_agentproduct() {
        $selection = $this->input->post('idnya');
        $this->Content_model->delete_multi_as_agentproduct($selection);

        $this->delete_notif();

        redirect('content/read_as_agentproduct');
    }

    public function delete_multi_as_datamanual() {
        $selection = $this->input->post('idnya');
        $this->Content_model->delete_multi_as_datamanual($selection);

        $this->delete_notif();

        redirect('content/read_as_data');
    }

    public function delete_multi_as_data() {
        $selection = $this->input->post('idnya');

        $this->Content_model->delete_multi_as_data($selection);

        $this->delete_notif();

        redirect('content/read_as_data');
    }

    public function delete_multi_tgh_list() {
        $selection = $this->input->post('idnya');
        $this->Content_model->delete_multi_tgh_list($selection);

        $this->delete_notif();

        redirect('content/read_tgh_list');
    }

//    bss baru

    public function read_m_param() {
        if ($this->session->has_userdata('username')) {
            $idmenu = 'H08';
            $idmenu2 = 'D034';
            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
            if ($result1 == '1') {
                $result['data'] = $this->Menu_model->loadMenu();
                $result['param'] = $this->Content_model->loadMparam()->result();
                $result['pagename'] = 'Create Master Parameter';
                $result['content'] = 'creat_m_param';
                $this->load->view('bss_home', $result);
            }
//            $this->load->view('bss_home', $result); //$this->load->view('home', $result);
        } else {
            redirect('/');
        }
//        $result = $this->Content_model->loadMparam()->num_rows();
//        echo $result;
    }

    public function read_param() {
        if ($this->session->has_userdata('username')) {
            $idmenu = 'H08';
            $idmenu2 = 'D035';
            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
            if ($result1 == '1') {
                $result['data'] = $this->Menu_model->loadMenu();
                $result['paramM'] = $this->Content_model->loadMparam()->result();
                $result['param'] = $this->Content_model->loadparam()->result();
                $result['pagename'] = 'All Parameter';
                $result['content'] = 'creat_param';
                $this->load->view('bss_home', $result);
            }
//            $this->load->view('bss_home', $result); //$this->load->view('home', $result);
        } else {
            redirect('/');
        }
//        $result = $this->Content_model->loadMparam()->num_rows();
//        echo $result;
    }

    public function create_param_proses() {
        if ($this->session->has_userdata('username')) {
            if (isset($_POST['simpan'])) {
                $numrow = $this->Content_model->loadparam()->num_rows();
//            echo $numrow;
                if ($numrow === '') {
                    $numrow = '0';
                }
                $string = $this->input->post('f_type');
                $untuk = $this->input->post('f_untuk');
                $desc = $this->input->post('f_desc');
//                $value = $this->input->post('f_value');

                if ($string == 'Non' or $untuk == 'Non' or $desc == null) {
                    $this->gagal_notif();
                    redirect('content/read_param');
                }
                $data = array(
                    'f_untuk' => $this->input->post('f_untuk'),
                    'f_type' => $this->input->post('f_type'),
                    'f_code' => $string . '0' . $numrow,
                    'f_desc' => $this->input->post('f_desc'),
                    'f_value' => $this->input->post('f_value'),
                    'f_status' => '1',
                    'f_active' => 0,
                    'f_usercreate' => $this->session->userdata('username'),
                    'f_datecreate' => date('Y-m-d H:i:s')
                );

                $code = array(
                    'f_code' => $string . '0' . $numrow
                );

//            print_r($data);
                $return = $this->Content_model->create_param_process($data, $code);

                if ($return === 1) {
                    $this->sucess_notif();
                    redirect('content/read_param');
                } else {
                    $this->gagal_notif();
                    redirect('content/read_param');
                }
            } elseif ($this->input->post('delete2') == "delete3") {
                $id = $this->input->post('idnya');
                $delete = $this->Content_model->delete_param_process($id);
                if ($delete === 1) {
                    $this->delete_notif();
                    redirect('content/read_param');
                } else {
                    $this->gagaldelete_notif();
                    redirect('content/read_param');
                }
            } else {
                $this->gagaldelete_notif();
                redirect('content/read_param');
            }
        } else {
            redirect('/');
        }

//        echo $string.'0'.$numrow;
    }

    public function create_m_param_proses() {
        if ($this->session->has_userdata('username')) {
            $numrow = $this->Content_model->loadMparam()->num_rows();
            if ($numrow === '') {
                $numrow = '0';
            }
            $string = $this->input->post('f_type');
            $data = array(
//                'f_untuk' => $this->input->post('f_untuk'),
                'f_type' => $this->input->post('f_type'),
                'f_code' => $string . '0' . $numrow,
                'f_desc' => $this->input->post('f_desc'),
                'f_active' => '1',
                'f_usercreate' => $this->session->userdata('username'),
                'f_datecreate' => date('Y-m-d'),
                'f_userupdate' => $this->session->userdata('username'),
                'f_dateupdate' => date('Y-m-d')
            );

//            print_r($data);
            $return = $this->Content_model->create_m_param_process($data);
            if ($return === 1) {
                $this->sucess_notif();
                redirect('content/read_m_param');
            } else {
                echo 'gagal';
            }
        } else {
            redirect('/');
        }

//        echo $string.'0'.$numrow;
    }

    public function aproved_assignment() {
        if ($this->session->has_userdata('username')) {
            $idmenu = 'H09';
            $idmenu2 = 'D036';
            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
            if ($result1 == '1') {
                $result['data'] = $this->Menu_model->loadMenu();
                $result['param'] = $this->Content_model->getassignment();
                $result['pagename'] = 'Aproved Assignment';
                $result['content'] = 'read_ap_assignment';
                $this->load->view('bss_home', $result);
//               echo print_r($result);
            }
//            $this->load->view('bss_home', $result); //$this->load->view('home', $result);
        } else {
            redirect('/');
        }

//        $result = $this->Content_model->loadMparam()->num_rows();
//        echo $result;
    }

    public function aproved_detail($agentid) {
        if ($this->session->has_userdata('username')) {

            $result['data'] = $this->Menu_model->loadMenu();
            $result['param'] = $this->Content_model->getassignmentdetail($agentid);
            $result['pagename'] = 'Aproved Assignment';
            $result['agent'] = $this->Content_model->getagent($agentid);
            $result['content'] = 'read_detail_assignment';
            $this->load->view('bss_home', $result);
//               echo print_r($result);
//            $this->load->view('bss_home', $result); //$this->load->view('home', $result);
        } else {
            redirect('/');
        }

//        $result = $this->Content_model->loadMparam()->num_rows();
//        echo $result;
    }

    public function aproved_proses($agentid) {
        if ($this->session->has_userdata('username')) {
            if (isset($_POST['aproved'])) {
                $selection = $this->input->post('idnya');
                //$agent=$this->input->post('agent');

                if ($selection == NULL) {
                    $this->gagal_notif();
                    redirect('content/aproved_assignment');
                }

                $action = $this->Content_model->aproved_proses($selection);
                //print_r($agenid);
                //print_r($namaagen);
                //$cif = array('f_cif' =>$action);
                $this->sucess_notif();
                redirect('content/aproved_assignment');
            } elseif (isset($_POST['reject'])) {
                $id = $this->input->post('idnya');


                //$a=str_split($idnya,2);
                // var_dump($idnya);
                $reject = $this->Content_model->reject_proses_plan_visit($id);

                $this->session->set_flashdata(
                        "message", "<script>swal(
              'Berhasil!',
              'Data $namaagen Berhasil Di Reject',
              'success'
            )</script>"
                );
                redirect('content/aproved_assignment');
            }
        }
    }

    public function tambah_debitur($agentid) {
        if ($this->session->has_userdata('username')) {
            $result['data'] = $this->Menu_model->loadMenu();
            $result['param'] = $this->Content_model->countlist($agentid);
            $result['pagename'] = 'Tambah Debitur';
            $result['agent'] = $this->Content_model->getagent($agentid);
            $result['content'] = 'tambah_debitur';
            $this->load->view('bss_home', $result);
        } else {
            redirect('/');
        }
    }

    public function tambah_debitur_proses($agentid) {
        if ($this->session->has_userdata('username')) {
            $selection = $this->input->post('idnya');
            if ($selection == null) {
                $this->gagal_input();
                redirect('content/tambah_debitur/' . $agentid);
            }
            $this->Content_model->tambah_debitur_proses($selection);
            $this->sucess_notif();
            redirect('content/aproved_detail/' . $agentid);
        }
    }

    // public function sys_process() {
    //     if ($this->session->has_userdata('username')) {
    //         $idmenu = 'H14';
    //         $idmenu2 = 'D037';
    //         $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
    //         if ($result1 == '1') {
    //             $result['data'] = $this->Menu_model->loadMenu();
    //             $result['param'] = $this->Content_model->sysprocess();
    //             $result['pagename'] = 'System Process';
    //             $result['content'] = 'read_sysprocess';
    //             $this->load->view('bss_home', $result);
    //         }
    //     } else {
    //         redirect('/');
    //     }
    // }

    public function view_reject_aprove_acctransfer() {
        if ($this->session->has_userdata('username')) {
            $idmenu = 'H04';
            $idmenu2 = 'D039';
            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
            if ($result1 == '1') {
                $nik = $this->session->userdata('username');
                $result['data'] = $this->Menu_model->loadMenu();
                $result['agent'] = $this->Content_model->get_agent($nik);
                $result['assignment'] = $this->Content_model->get_reject_aprove_transfer_account($nik);
                $result['pagename'] = 'System Process';
                $result['content'] = 'view_reject_aprove_transferAcc';
                $this->load->view('bss_home', $result);
            }
        } else {
            redirect('/');
        }
    }

    public function transfer_account() {
//        if ($this->session->has_userdata('username')) {
//            $idmenu = 'H04';
//            $idmenu2 = 'D039';
//            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
//            if ($result1 == '1') {
                redirect('transfer_account/index');
//                $nik = $this->session->userdata('username');
//                $result['data'] = $this->Menu_model->loadMenu();
//                $result['agent'] = $this->Content_model->get_agent($this->session->userdata('username'));
//                $result['assignment'] = $this->Content_model->get_transfer_list_account($nik);
//                $result['pagename'] = 'System Process';
//                $result['content'] = 'read_transfer_account';
//                $this->load->view('bss_home', $result);
//            }
//        } else {
//            redirect('/');
//        }
    }

    public function read_transfer_account() {
        if ($this->session->has_userdata('username')) {
            $idmenu = 'H04';
            $idmenu2 = 'D039';
            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
            if ($result1 == '1') {
                $nik = $this->session->userdata('username');
                $result['data'] = $this->Menu_model->loadMenu();
                $result['assignment'] = $this->Content_model->get_tgh_listtransfer($nik);
                $result['agent'] = $this->Content_model->get_agent($nik);
                $result['pagename'] = 'System Process';
                $result['content'] = 'transfer_account';
                $this->load->view('bss_home', $result);
            }
        } else {
            redirect('/');
        }
    }

    public function transfer_account_proses() {
        if ($this->session->has_userdata('username')) {
            $data = $this->input->post('agent');
            $namaagen = $this->input->post('agentname');
            $desc = $this->input->post('desc');
            $selection = $this->input->post('idnya');
//            $idagenawal = $this->input->post('idagentawal');
            //var_dump($data,$namaagen,$desc,$selection,$idagenawal);
            if ($data == null) {
                $this->gagal_notif();
                redirect('content/read_transfer_account');
            }
//            echo $data."/".$desc;
//            print_r($selection);
            $action = $this->Content_model->transfer_debitur_proses($selection, $data, $desc);
            if ($action === 1) {
                $this->sucess_notif();
                redirect('content/read_transfer_account');
            } else {
                $this->gagal_notif();
                redirect('content/read_transfer_account');
            }
        } else {
            
        }
    }

    public function transfer_account_proses2() {
        if ($this->session->has_userdata('username')) {
            if (isset($_POST['edit'])) {
                $code = "edit";
                $data = $this->input->post('agent');
                $desc = $this->input->post('desc');
                $selection = $this->input->post('idnya');
                if ($data == 'Non') {
                    $this->gagal_notif();
                    redirect('content/transfer_account');
                }
                $action = $this->Content_model->transfer_debitur_proses2($selection, $data, $desc, $code);
                if ($action === 1) {
                    $this->sucess_notif();
                    redirect('content/transfer_account');
                }
                $this->gagal_notif();
            } elseif (isset($_POST['delete'])) {
                $code = 'delete';
                $data = "delete";
                $desc = "delete";
                $selection = $this->input->post('idnya');
                $action = $this->Content_model->transfer_debitur_proses2($selection, $data, $desc, $code);
                if ($action === 1) {
                    $this->sucess_notif();
                    redirect('content/transfer_account');
                } else {
                    $this->gagal_delete();
                    redirect('content/transfer_account');
                }
            }
        } else {
            redirect('/');
        }
    }

    public function approved_collector() {
        if ($this->session->has_userdata('username')) {
            $idmenu = 'H03';
            $idmenu2 = 'D046';
            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
            if ($result1 == '1') {
                $result['data'] = $this->Menu_model->loadMenu();
                $result['approvecolec'] = $this->Content_model->get_collector_aprove();
//                $result['agent'] = $this->Content_model->get_agent();
                $result['pagename'] = 'aproved collector';
                $result['content'] = 'approve_collector';
                $this->load->view('bss_home', $result);
            }
        } else {
            redirect('/');
        }
    }

    public function aproved_transfer() {
        if ($this->session->has_userdata('username')) {
            $idmenu = 'H04';
            $idmenu2 = 'D040';
            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
            if ($result1 == '1') {
                redirect('transfer_account/aproved_transfer');
                $nik = $this->session->userdata('username');
                $result['data'] = $this->Menu_model->loadMenu();
                $result['assignment'] = $this->Content_model->get_transfer_list_aprove($nik);
//                $result['agent'] = $this->Content_model->get_agent();
                $result['pagename'] = 'System Process';
                $result['content'] = 'read_aproved_transfer_account';
                $this->load->view('bss_home', $result);
            }
        } else {
            redirect('/');
        }
    }

    public function approvedcollector() {
        if ($this->session->has_userdata('username')) {
            $selection = $this->input->post('idnya');
            if ($selection == null) {
                $this->chek_approve();
                redirect('content/approved_collector');
            } elseif ($selection != null) {
                $action = $this->Content_model->updatestatus_approve($selection);
                $this->sucess_aprove();
                redirect('content/approved_collector');
            }
        }
    }

    public function transfer_account_prosesfinal() {
        if ($this->session->has_userdata('username')) {
            if (isset($_POST['aproved'])) {
                $selection = $this->input->post('idnya');
                $agent = $this->input->post('agent');

                if ($selection == NULL) {
                    $this->gagal_notif();
                    redirect('content/aproved_transfer');
                }

                foreach ($selection as $key) {
                    $idagenawal = $key;

                    $agenawalid = explode("-", $idagenawal);
                    $idnya[] = $agenawalid['0'];
//                    $namaagen = $agenawalid['1'];
//                    $agenid = $agenawalid['2'];
                }
                $a = str_split($idnya, 2);

                $action = $this->Content_model->transfer_debitur_prosesfinal($selection);
//                print_r($a);
                //print_r($namaagen);
                $cif = array('f_cif' => $action);
                if ($action == 1) {
                    $this->notif_sucess_approve_transfer();
                    redirect('content/aproved_transfer');
                } else {
                    $this->gagal_notif();
                    redirect('content/aproved_transfer');
                }
            } elseif (isset($_POST['reject'])) {
                $id = $this->input->post('idnya');

                $selection = $this->input->post('idnya');
                $agent = $this->input->post('agent');
                foreach ($selection as $value) {
                    $idagenawal = $value;
                    $agenawalid = explode("-", $idagenawal);
                    $idnya = $agenawalid['0'];
                }
                //$a=str_split($idnya,2);
                // var_dump($idnya);
                $reject = $this->Content_model->process_reject_account($idnya);
                if ($reject === 1) {
                    $this->notif_sucess_approve_transfer();
                    redirect('content/aproved_transfer');
                } else {
                    $this->gagal_notif();
                    redirect('content/aproved_transfer');
                }
            }
        }
    }

    public function assign_debitur() {
        $selection = $this->input->post('idnya');
        $data = $this->input->post('agent');
        if ($data == 'Non' or $selection == null) {
            $this->gagal_notif();
            redirect('content/read_as_debitur');
        }
        //elseif ($selection !=NULL or $data ='Non') {
        //     $this->gagal_notif();
        //     redirect('content/read_as_debitur');
        // }
        //var_dump($data,$selection);
        $assign = $this->Content_model->assign_dibutur($selection, $data);
//        print_r($assign);
        if ($assign === 1) {
            $this->sucess_notif();
            redirect('content/read_as_debitur');
        } else if ($assign === 0) {
            $this->gagal_notif();
            redirect('content/read_as_debitur');
        } else {
            $this->warning_notif();
            redirect('content/read_as_debitur');
        }
    }

    public function edit_mrpk_pelunasan($a) {
        if ($this->session->has_userdata('username')) {
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Edit MRPK Pelunasan';
//$result['printmrpkp']=$this->Content_model->printmrpkpelunasan($a);
            $result['datadammy'] = $this->Content_model->mrpkdatadammy($a);
            $result['dammy'] = $this->Content_model->dammy($a);
            $result['pelunasanprint'] = $this->Content_model->pelunasanprintmrpk($a);
            $result['content'] = 'edit_mrpk_pelunasan';
            $this->load->view('bss_home', $result);
        } else {
            redirect('/');
        }
    }

    public function read_pelunasan() {
        if ($this->session->has_userdata('username')) {
            $idmenu = 'H04';
            $idmenu2 = 'D042';
            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
            if ($result1 == '1') {
                $result['data'] = $this->Menu_model->loadMenu();
                $result['assignment'] = $this->Content_model->get_tgh_list2();
//                $result['agent'] = $this->Content_model->get_agent();
                $result['pagename'] = 'System Process';
                $result['content'] = 'plan_pelunasan';
                $this->load->view('bss_home', $result);
            }
        } else {
            redirect('/');
        }
    }

    public function updateplunasan() {
        if (isset($_POST['simpan1'])) {
            $param0 = $this->input->post('cif');
            $param1 = $this->input->post('radio1');
            $param2 = $this->input->post('radio2');
            $param3 = $this->input->post('radio3');
            $param4 = $this->input->post('radio4');
            $update1 = $this->Content_model->update_plunasan1($param0, $param1, $param2, $param3, $param4);
            if ($update1 === 1) {
                $this->sucess_notif();
                redirect('content/read_pelunasan');
            } else {
                redirect('content/read_pelunasan');
            }
        }
    }

    public function sch_process() {
        if ($this->session->has_userdata('username')) {
            $idmenu = 'H14';
            $idmenu2 = 'D038';
            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
            if ($result1 == '1') {
                $result['data'] = $this->Menu_model->loadMenu();
                $result['param'] = $this->Content_model->schprocess();
                $result['pagename'] = 'Scheduler Process';
                $result['content'] = 'read_schprocess';
                $this->load->view('bss_home', $result);
            }
        } else {
            redirect('/');
        }
    }

    public function sch_process_edit($idprocess) {
        if ($this->session->has_userdata('username')) {
            $idmenu = 'H14';
            $idmenu2 = 'D038';
            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
            if ($result1 == '1') {
                $result['data'] = $this->Menu_model->loadMenu();
                $result['param'] = $this->Content_model->schprocess_edit($idprocess);
                $result['pagename'] = 'Scheduler Process';
                $result['content'] = 'read_schprocess_edit';
                $this->load->view('bss_home', $result);
            }
        } else {
            redirect('/');
        }
    }

    public function create_schproses() {
        if ($this->session->has_userdata('username')) {
            $processname = $this->input->post('processname');
            $programtype = $this->input->post('programtype');
            $timestart = $this->input->post('timestart');
            $maxrun = $this->input->post('maxrun');
            $counterrun = $this->input->post('counterrun');
            $timestop = $this->input->post('timestop');
            $statusdone = $this->input->post('statusdone');
            $active = $this->input->post('active');

            if (isset($_POST['edit'])) {
                $id = $this->input->post('processid');
                $update = $this->Content_model->updateschprocess($id, $processname, $programtype, $timestart, $maxrun, $counterrun, $timestop, $statusdone, $active);
//                print_r($update);
                if ($update === 1) {
                    $this->sucess_notif();
                    redirect('content/sch_process');
                } else {
                    $this->gagal_notif();
                    redirect('content/sch_process');
                }
            } elseif (isset($_POST['simpan'])) {
                $insert = $this->Content_model->insertschproces($processname, $programtype, $timestart, $maxrun, $counterrun, $timestop, $statusdone, $active);
                if ($insert === 1) {
                    $this->sucess_notif();
                    redirect('content/sch_process');
                } elseif ($insert === 2) {
                    $this->gagal_notif();
                    redirect('content/sch_process');
                } else {
                    $this->gagal_notif();
                    redirect('content/sch_process');
                }
            } elseif (isset($_POST['delete'])) {
                $selected = $this->input->post('idnya');
                $delete = $this->Content_model->deleteschprocess($selected);
                if ($delete === 1) {
                    $this->sucessdelete_notif();
                    redirect('content/sch_process');
                } elseif ($delete === 2) {
                    $this->gagaldelete_notif();
                    redirect('content/sch_process');
                } else {
                    $this->gagal_notif();
                    redirect('content/sch_process');
                }
            }
        } else {
            redirect('/');
        }
    }

    //////////////////////////////////////////////////////////////////////////////


    function notif_sucess_approve_collec() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Berhasil!',
        text: 'Data Berhasil Di Approve',
        type: 'success',
        showConfirmButton: false,
        timer: 1500,
        onOpen: function () {
        // AJAX request simulated with setTimeout
        setTimeout(function () {
        swal.close()
        }, 2000)
        }
        })</script>"
        );
    }

    function notif_sucess_approve_transfer() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Berhasil!',
        text: 'Data Berhasil Di Approve',
        type: 'success',
        showConfirmButton: false,
        timer: 1500,
        onOpen: function () {
        // AJAX request simulated with setTimeout
        setTimeout(function () {
        swal.close()
        }, 2000)
        }
        })</script>"
        );
    }

    function notif_secess() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Berhasil!',
        text: 'Data Berhasil Di Approve',
        type: 'success',
        showConfirmButton: false,
        timer: 1500,
        onOpen: function () {
        // AJAX request simulated with setTimeout
        setTimeout(function () {
        swal.close()
        }, 2000)
        }
        })</script>"
        );
    }

    public function gagal_approve_collec() {
        $this->session->set_flashdata(
                "message", "<script>swal(
              'Berhasil!',
              'Data Gagal Di Approve',
              'success'
            )</script>"
        );
    }

    public function gagal_notif() {
        $this->session->set_flashdata(
                "message", "<script>swal(
              'Gagal!',
              'Data Gagal Di simpan',
              'error'
            )</script>"
        );
    }

    public function gagal_delete() {
        $this->session->set_flashdata(
                "message", "<script>swal(
              'Gagal!',
              'Data Gagal Di Hapus',
              'error'
            )</script>"
        );
    }

    public function warning_notif() {
        $this->session->set_flashdata(
                "message", "<script>swal(
              'Gagal!',
              'Data Sudah Ada',
              'error'
            )</script>"
        );
    }

    public function chek_approve() {
        $this->session->set_flashdata(
                "message", "<script>swal(
              'Gagal!',
              'silahkan di pilih dulu,data yang ingin di approve',
              'Gagal'
            )</script>"
        );
    }

    public function approve_notif() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Berhasil!',
        text: 'Data Berhasil Di Approve',
        type: 'success',
        showConfirmButton: false,
        timer: 1500,
        onOpen: function () {
        // AJAX request simulated with setTimeout
        setTimeout(function () {
        swal.close()
        }, 2000)
        }
        })</script>"
        );
    }

    public function sucess_aprove() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Berhasil!',
        text: 'Data Berhasil Di Approve',
        type: 'success',
        showConfirmButton: false,
        timer: 1500,
        onOpen: function () {
        // AJAX request simulated with setTimeout
        setTimeout(function () {
        swal.close()
        }, 2000)
        }
        })</script>"
        );
    }

    public function failed_notif() {
        $this->session->set_flashdata(
                "message", "<script>swal(
              'Failed!',
              'Data Gagal Di Input',
              'Failed'
            )</script>"
        );
    }

    public function sucess_notif() {
        $this->session->set_flashdata(
                "message", "<script>swal(
              'Berhasil!',
              'Data Berhasil Di Input',
              'success'
            )</script>"
        );
    }

    public function sucessdelete_notif() {
        $this->session->set_flashdata(
                "message", "<script>swal(
              'Berhasil!',
              'Data Berhasil Di Delete',
              'success'
            )</script>"
        );
    }

}

//tessssss
