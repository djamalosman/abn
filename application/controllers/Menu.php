<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

    public function __construct() {
        parent::__construct();

        //$this->load->library(array('PHPExcel', 'PHPExcel/IOFactory'));
		$this->db = $this->load->database('default', true);
		$this->db2 = $this->load->database('second', true);

        $this->load->helper(array('url', 'form'));
        $this->load->library('session');
        $this->load->model('Menu_model', '', TRUE);
        $this->load->model('Model_log', '', TRUE);
        $this->load->model('Modeldashboard', '', TRUE);
        $this->load->model('Content_model', '', TRUE);
        $this->load->helper('captcha');
        $this->load->model('Modelsdept', '', TRUE);
    }
	
    public function index() {
        if ($this->session->userdata('username')) {
            redirect('menu/home');
        } else {
            $config = array(
                //'word'=> 'Random word',
                'img_path' => 'captcha_images/',
                'img_url' => base_url() . '/captcha_images/',
                'img_width' => 290,
                'img_height' => 50,
                'word_length' => 6,
                'font_size'  => 27,
                'expiration' => 60,
                'font_path' => FCPATH. 'system/fonts/texb.ttf',
                //'font_path' =>'../system/fonts/texb.ttf',
                'pool' => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
                'colors' => array(
                    'background' => array(255, 255, 255),
                    'border' => array(255, 255, 255),
                    'text' => array(0, 0, 0),
                    'grid' => array(255, 40, 40)
                )
            );
            $captcha = create_captcha($config);
            // Unset previous captcha and store new captcha word
            $this->session->unset_userdata('captchaCode');
            $this->session->set_userdata('captchaCode', $captcha['word']);
            // Send captcha image to view
            $data['captchaImg'] = $captcha['image'];
            //
            //var_dump($data);
            //$tes=$this->_get_chaptca();
            //$a=array('captcha'=>$this->_get_chaptca());
            //print_r($captcha);
            // redirect("menu/index");
            $this->load->view('login', $data);
        }
    }
	    public function privasi_policy() {
            $this->load->view('privasy_policy');
    }

    function notif_sucess_email() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title:'Berhasil!',
        text: 'Berhasil Reset Password,Silakan Cek Email ',
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

    function notif_gagal_resetpassword() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title:'Gagal!',
        text: 'Gagal Coba Periksa Kembali Inputan Username dan Email!!!',
        type: 'Error',
        showConfirmButton: false,
        timer: 3500,
        onOpen: function () {
        setTimeout(function () {
        swal.close()
        }, 2000)
        }
        })</script>"
        );
    }

    public function captcharefresh() {
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'albahrimaraxsa@gmail.com',
            'smtp_pass' => $this->pass("QXNzYWxhTWFs"),
            'mailtype' => 'html',
            'charset' => 'iso-8859-1'
        );
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");

        $this->email->from('albahrimaraxsa@gmail.com', 'albahrimaraxsa@gmail.com');
        $this->email->to('albahri_maraxsa@yahoo.co.id');
        $this->email->subject('This is an email test');
        $this->email->message('It is working. Great!');
        $result = $this->email->send();
        echo $this->email->print_debugger();
        // Captcha configuration
        $config = array(
            'word' => '',
            'word_length' => 6,
            'img_path' => 'captcha_images/',
            'img_url' => base_url() . 'captcha_images/',
            'img_width' => 290,
            'img_height' => 145,
            'word_length' => 6,
            'font_size' => 16,
            'font_path' => FCPATH. 'system/fonts/texb.ttf'
            //'font_path' => SYSDIR . 'system/fonts/texb.ttf'
            //'font_path' =>'../system/fonts/texb.ttf',
        );

        $captcha = create_captcha($config);

        // Unset previous captcha and store new captcha word
        $this->session->unset_userdata('captchaCode');
        $this->session->set_userdata('captchaCode', $captcha['word']);

        // Display captcha image
        echo $captcha['image'];
    }

    public function excel_upload($table, $controller, $link) {
        $fileName = time() . $_FILES['file']['name'];

        $config['upload_path'] = './als_asset/excel/uploaded_excel/'; //buat folder dengan nama assets di root folder
        $config['allowed_types'] = 'xls|xlsx|csv|pdf';
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


        $fieldname = $this->session->userdata('fieldname');


        for ($row = 2; $row <= $highestRow; $row++) {                  //  Read a row of data into an array                 
            $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);



            //Sesuaikan sama nama kolom tabel di database                                                                

            $data = null;
            foreach ($fieldname as $key => $item) {
                $data[$item] = $rowData[0][$key];
            }

            //sesuaikan nama dengan nama tabel
            $insert = $this->db->insert($table, $data);
        }
        $this->session->unset_userdata('fieldname');
        //print_r($recordnya);
        unlink('./als_asset/excel/uploaded_excel/' . $fileName);
        redirect($controller . '/' . $link);
    }

    public function update_notif() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Berhasil!',
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

    public function home() {
        if ($this->session->userdata('username')) {
			$level = $this->session->userdata('level');
            $nik = $this->session->userdata('username');
            $idmenu = 'H01';
            $idmenu2 = 'D001';
            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
            if ($result1 == '1') {
                //$this->Model_log->insertlogmenu($this->session->userdata('username'), "Main Menu : ".$idmenu. " Sub Menu : ".$idmenu2);
                $codeimage = $this->session->userdata('codeimage');
                $nik = $this->session->userdata('username');
                $image = $this->Menu_model->getimage($codeimage, $nik);
                if ($image != '') {
                    $this->session->set_userdata("image", $image[0]['f_file_content']);
                } else {
                    $this->session->set_userdata("image", '');
                }

                $result['data'] = $this->Menu_model->loadMenu();
				//$result['assignmentMenu'] = $this->Menu_model->assignmentHome();
                
// 			$result['unmaping'] = $this->Modeldashboard->unmaping($nik,$level);
// 			$result['pendingvisit'] = $this->Modeldashboard->pendingvisit($nik,$level);
// 			$result['countallvisit'] = $this->Modeldashboard->countallvisit($nik,$level);
// 			$result['collector'] = $this->Modeldashboard->collector($nik,$level);
// 			$result['collectorall'] = $this->Modeldashboard->collectorall($nik,$level);
// 			$result['assignment'] = $this->Modeldashboard->assignment($nik,$level);
// 			$result['assignmentall'] = $this->Modeldashboard->assignmentall($nik,$level);
// 			$result['countall'] = $this->Modeldashboard->countall($nik,$level);
// 			$result['current'] = $this->Modeldashboard->current($nik,$level);
// 			$result['current1'] = $this->Modeldashboard->current1($nik,$level);
// 			$result['x_days'] = $this->Modeldashboard->x_days($nik,$level);
// 			$result['x_days1'] = $this->Modeldashboard->x_days1($nik,$level);
// 			$result['dpd30_90'] = $this->Modeldashboard->dpd30_90($nik,$level);
// 			$result['dpd30_90_1'] = $this->Modeldashboard->dpd30_90_1($nik,$level);
// 			$result['dpd91_180'] = $this->Modeldashboard->dpd91_180($nik,$level);
// 			$result['dpd91_180_1'] = $this->Modeldashboard->dpd91_180_1($nik,$level);
//             $result['dpd181_360'] = $this->Modeldashboard->dpd181_360($nik,$level);
//             $result['dpd181_360_1'] = $this->Modeldashboard->dpd181_360_1($nik,$level);
//             $result['dpd361'] = $this->Modeldashboard->dpd361($nik,$level);
//             $result['dpd361_1'] = $this->Modeldashboard->dpd361_1($nik,$level);
//             $result['amc'] = $this->Modeldashboard->amc($nik,$level);
//             $result['amc_1'] = $this->Modeldashboard->amc_1($nik,$level);
//             $result['wo'] = $this->Modeldashboard->wo($nik,$level);
//             $result['wo_1'] = $this->Modeldashboard->wo_1($nik,$level);
//             $result['visit'] = $this->Modeldashboard->visit($nik,$level);
//             $result['hk'] = $this->Modeldashboard->hk($nik,$level);
//             $result['lelang'] = $this->Modeldashboard->lelang($nik,$level);
//             $result['ayda'] = $this->Modeldashboard->ayda($nik,$level);
				// $login="login";
    //             $login2="berhasil login";
    //              $this->Model_log->insertlogloginuser($this->session->userdata('username'), "".$login. " : ".$login2);
        //echo var_dump($result['unmaping']);
                        $ok = $this->Menu_model->showheader();
                        $this->session->set_userdata("text_header", $ok->text_header);
                        $result['pagename'] = 'Dashboard';
        //$result['content'] = 'home_content';
                        $result['content'] = 'bss_home_content';
        //$result['content'] = 'creat_m_param';
                        $this->load->view('bss_home', $result);
        //$this->load->view('home', $result);
            }
        } else {
            redirect("v_loginadmin");
        }
        //$this->load->helper('string');
        //echo random_string('alnum', 5);
        //echo mt_rand(0, 10);
    }
   
    public function logout($username) {
		//var_dump($username);
		$logout1="berhasil";
        $logout2="logout";
        //$this->Model_log->insertloglogoutinuser($username,"".$logout1. " : ".$logout2);
		$updatestatuslogin=$this->Menu_model->updatestatuslogin($username);
        if($updatestatuslogin ==1){
        $this->session->sess_destroy();
        redirect("v_loginadmin");
        }
    }

    public function date_expyre(){
        if(!isset($_POST['submit'])){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $email = $this->input->post('email');
        $pass= password_hash($password, PASSWORD_BCRYPT);
        $datetime = date('Y-m-d_H:i:s');
        $date= date('Y-m-d');
        $htmlContent = 'Silakan login dengan password ini --> (' . '<p>' . $password . '</p>' . ') dan jangan lupa untuk update password nya setelah berhasil login ';
        system('java -jar C:\xampp\htdocs\javaemail\JavaToExchangeServer.jar '.$email.' "Bank Data" "'.$htmlContent.'" '.$username.' '.$datetime);
        
        $a=$this->Menu_model->date_expyre_change($username,$pass,$date);
            if($a==1){
            $this->sucsess_change_pass();
            redirect('v_loginadmin');
            }
        }else {
        $this->failed_change();
        redirect('v_loginadmin');
        }
    }

    //public function passwordchange_create(){
    //    if(!isset($_POST['submit'])){
    //    $username = $this->input->post('username');
    //    $password = $this->input->post('password');
    //    $email = $this->input->post('email');
    //    $pass= password_hash($password, PASSWORD_BCRYPT);
    //    $datetime = date('Y-m-d_H:i:s');
    //    $date= date('Y-m-d');
    //    $htmlContent = 'Silakan login dengan password ini --> (' . '<p>' . $password . '</p>' . ') dan jangan lupa untuk update password nya setelah berhasil login ';
    //    system('java -jar C:\xampp\htdocs\javaemail\JavaToExchangeServer.jar '.$email.' "Bank Data" "'.$htmlContent.'" '.$username.' '.$datetime);
    //    $a=$this->Menu_model->password_change_create($username,$pass,$date);
    //    if($a==1){
    //        $this->sucsess_change_pass();
    //        redirect('/');
    //    }
    //    }else {
    //        $this->failed_change();
    //        redirect('/');
    //        }
    //}
	
	 public function passwordchange_create(){
        if(!isset($_POST['submit'])){
        $username = $this->input->post('username');
        $oldpassword = $this->input->post('oldpassword');
        $newpassword = $this->input->post('newpassword');
        $confrmpasswordnew = $this->input->post('confrmpasswordnew');
        $email = $this->input->post('email');
        $pass= password_hash($confrmpasswordnew, PASSWORD_BCRYPT);
        $datetime = date('Y-m-d_H:i:s');
        $date= date('Y-m-d');
        $cekuserpasswordchange_lupa=$this->Menu_model->cekuserpasswordchange_lupa($username,$oldpassword);
            if($cekuserpasswordchange_lupa===1){
                    $cekpassword=$this->Menu_model->cekpassword($username,$oldpassword,$newpassword,$confrmpasswordnew);
                    if($cekpassword===1){          
                        $this->newpasswordduplikate();
                        redirect('v_loginadmin');
                    }else{
                            $ceklagiusersamapassword=$this->Menu_model->ceklagiusersamapassword($username,$oldpassword,$newpassword,$confrmpasswordnew);
                                    if($ceklagiusersamapassword===1){
                                        $this->userdanpasswordsama();
                                        redirect('/');
                                    }else{
                                        $htmlContent = 'Silakan login dengan password ini --> (' . '<p>' . $newpassword . '</p>' . ') dan jangan lupa untuk update password nya setelah berhasil login ';
                                        system('java -jar C:\xampp\htdocs\javaemail\JavaToExchangeServer.jar '.$email.' "Tes lupapassword" "'.$htmlContent.'" '.$username.' '.$datetime);
                                        $a=$this->Menu_model->password_change_create($username,$pass,$date);
                                            if($a==1){
                                            $this->sucsess_change_pass();
                                            redirect('/');
                                            }else {
                                            $this->failed_change();
                                            redirect('/');
                                            }
                                    }

                        }
            }else{
                $this->userpassword();
                redirect('v_loginadmin');
                
            }  
        }
    }
    
     public function passwordchange_lupa(){
        if(!isset($_POST['submit'])){
        $username = $this->input->post('username');
        $oldpassword = $this->input->post('oldpassword');
        $newpassword = $this->input->post('newpassword');
        $confrmpasswordnew = $this->input->post('confrmpasswordnew');
        $email = $this->input->post('email');
        $pass= password_hash($confrmpasswordnew, PASSWORD_BCRYPT);
        $datetime = date('Y-m-d_H:i:s');
        $date= date('Y-m-d');
        $cekuserpasswordchange_lupa=$this->Menu_model->cekuserpasswordchange_lupa($username,$oldpassword);
            if($cekuserpasswordchange_lupa===1){
                    $cekpassword=$this->Menu_model->cekpassword($username,$oldpassword,$newpassword,$confrmpasswordnew);
                    if($cekpassword===1){          
                        $this->newpasswordduplikate();
                        redirect('v_loginadmin');
                    }else{
                            $ceklagiusersamapassword=$this->Menu_model->ceklagiusersamapassword($username,$oldpassword,$newpassword,$confrmpasswordnew);
                                    if($ceklagiusersamapassword===1){
                                        $this->userdanpasswordsama();
                                        redirect('/');
                                    }else{
                                        $htmlContent = 'Silakan login dengan password ini --> (' . '<p>' . $newpassword . '</p>' . ') dan jangan lupa untuk update password nya setelah berhasil login ';
                                        system('java -jar C:\xampp\htdocs\javaemail\JavaToExchangeServer.jar '.$email.' "Tes lupapassword" "'.$htmlContent.'" '.$username.' '.$datetime);
                                        $a=$this->Menu_model->password_change_lupa_email($username,$pass,$date);
                                            if($a==1){
                                            $this->sucsess_change_pass();
                                            redirect('/');
                                            }else {
                                            $this->failed_change();
                                            redirect('/');
                                            }
                                    }

                        }
            }else{
                $this->userpassword();
                redirect('/');
                
            }  
        }
    }
    function userdanpasswordsama() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title:'Gagal!',
        text: 'Password anda tidak boleh sama dengan username!',
        type: 'error'
        })</script>"
        );
    }
	 function newpasswordduplikate() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title:'Gagal!',
        text: 'Password baru anda tidak boleh sama dengan password lama!',
        type: 'error'
        })</script>"
        );
    }
	function userpassword() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title:'Gagal!',
        text: 'Username dan password salah',
        type: 'error'
        })</script>"
        );
    }
    public function lupapassword() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $password = array();
        $alpha_length = strlen($alphabet) - 1; //fungsi untuk mencari dan menghitung jumlah string atau karakter
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alpha_length); //fungsi untuk mengacak jumlah string atau karakter
            $password[] = $alphabet[$n];
        }
        $user = $this->input->post('username');
        $pass = implode($password); //fungsi untuk memecahkan atau memisah suatu string
        $email = $this->input->post('email');

        //var_dump($pass);

        $a = $this->Menu_model->cekuser($user, $email);
        if ($a == 1) {
            
            $datetime = date('Y-m-d_H:i:s');
                       $htmlContent = "Dear Bpk/Ibu <br>"." Password Berhasil di reset, Silahkan Login kembali <br>"." dengan menggunakan Password(<b>$pass</b>)"."<p><br>Best Regards<br>iColl System";
            system('java -jar C:\xampp\htdocs\javaemail\JavaToExchangeServer.jar '.$email.' "Bank Data" "'.$htmlContent.'" '.$user.' '.$datetime);
            $cekemail = $this->Menu_model->ceksendemail($user,$datetime);
                if($cekemail == 1)
                {
                   $ubahpass=$this->Menu_model->updatepassword_email($user,$datetime,$pass);
                    if($ubahpass ==1){
                        $this->notif_sucess_email();
                        redirect('/'); 
                    }else{
                        $this->notif_gagal_resetpassword();
                        redirect('v_loginadmin'); 
                    }
                }else{
               redirect('/'); 
                }
        } else {
            $this->notif_gagal_resetpassword();
            redirect('v_loginadmin');
        }
    }

    public function process_login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $inputCaptcha = $this->input->post('captcha');
        $sessCaptcha = $this->session->userdata('captchaCode');
    
		
		  	$run=FALSE;
		  if($inputCaptcha===$sessCaptcha){
		  	$run=TRUE;
		  }else{
			  $updatecountlogin=$this->Menu_model->f_countlogingagal($username);
		  		$this->salahchaptcha();
		  		redirect("v_loginadmin");
		  }
	      
		 //if($run == TRUE){
		 //		$select_expyredate = $this->Menu_model->expyredate($username, $password);
		 //		if($select_expyredate == 4){
		 //			$this->notif_expyredate();
		 //			////$ambiluser['expyredate']=$this->Menu_model->ambil_user($username);
		 //			////$this->load->view('expyre_date',$ambiluser);
		 //		redirect("/");
		 //			////$run=FALSE;
		 //		}
		 //	}
			
		//	 if($run == TRUE){
        //        $select_expyredate=$this->Menu_model->expyredatePassword53($username, $password);
        //        if($select_expyredate==4){
        //            $ambiluser['expyredate']=$this->Menu_model->ambil_password_email($username);
        //            $email=$ambiluser->f_email;
        //            $datetime = date('Y-m-d_H:i:s');
        //            $htmlContent = 'Silakan login dengan password ini dan jangan lupa untuk update password nya setelah berhasil login ';
        //            system('java -jar C:\xampp\htdocs\javaemail\JavaToExchangeServer.jar '.$email.' "Tes lupapassword" "'.$htmlContent.'" '.$user.' '.$datetime);
        //            $cekemail = $this->Menu_model->ceksendemail($username,$datetime);
        //        }
        //    }
            if($run == TRUE){
                $select_expyredate=$this->Menu_model->expyredatePassword60($username, $password);
                if($select_expyredate==4){
                  
                    $this->notif_password();
                    
                    //$this->load->view('expyre_date',$ambiluser);
                    redirect("v_loginadmin");
                    //$run=FALSE;
                }
            }
		  	//create user baru
		  	if($run == TRUE){
		  		$create_user_pass=$this->Menu_model->create_user_pass($username, $password);
		  		if($create_user_pass==7){
		  			$this->change_create_password();
		  			$ambiluser['create_user_pass']=$this->Menu_model->ambil_user($username);
		  			$this->load->view('change_create_password',$ambiluser);
		  			$run=FALSE;
		  		}
		  	}
			//cek forgout password
		  	if($run == TRUE){
		  		$select_lupa_pss=$this->Menu_model->ceklupassword($username, $password);
		  		if($select_lupa_pss==6){
		  			$this->email_password();
		  			$ambiluser['ceklupassword']=$this->Menu_model->ambil_user($username);
		  			$this->load->view('change_lupa_password',$ambiluser);
		  			$run=FALSE;
		  		}
		  	}
	      
		  	if($run == TRUE){
		  		$data = $this->Menu_model->login($username, $password);
		  		if($data==0){
					$updatecountlogin=$this->Menu_model->f_countlogingagal($username);
		  			$this->login_failed_datanull();
		  			redirect('v_loginadmin');
		  		}  
		  	}
			
			 if($run == TRUE){
                $data31 = $this->Menu_model->f_logincount3($username);
                if($data31===1){
                    //echo 'masuk';
                    $updatecountlogin=$this->Menu_model->f_logincount($username);
                    if($updatecountlogin === 0){
                    $this->login_5minutes();
                    redirect('v_loginadmin');
                   // $run=FALSE;
                    }
                }  
            }
			
			if($run == TRUE){
		  		$data1 = $this->Menu_model->cekuseractive($username, $password);
		  		if($data1==0){
		  			$this->useractive();
		  			redirect('v_loginadmin');
		  		}  
		  	}
				
			
			if($run == TRUE){
				$data1 = $this->Menu_model->duplicatelogin($username, $password);
				if($data1==66){
						$this->duplicatelogin();
						redirect('v_loginadmin');
						
				}
			}
	      
		if($run==TRUE){
		  	
		  	if(password_verify($password, $data->f_userpswd)){
				//$update_statuslogin=$this->Menu_model->update_statuslogin($username);
		  		$this->session->set_userdata("username", $data->f_userid);
		  		$this->session->set_userdata("codeimage", $data->f_code_image);
		  		$this->session->set_userdata("name", $data->f_username);
		  		$this->session->set_userdata("password", $data->f_userpswd);
		  		$this->session->set_userdata("level", $data->f_userlevel);
				$this->session->set_userdata("levelname", $data->f_levelname);
		  		$this->session->set_userdata("reqflag", $data->reqflag);
		  		$this->session->set_userdata("appflag", $data->appflag);
		  		$this->session->set_userdata("rjtflag", $data->rjtflag);
		  	
		  		$this->session->set_userdata("allowedit", $data->allowedit);
		  		$this->session->set_userdata("allowapprove", $data->allowapprove);
		  		if ($this->session->userdata('username') == $username and $this->session->userdata('password') == $password) {
				    $this->login_sucsess();
					redirect("menu/home");
				}else {$this->login_failed();redirect("v_loginadmin");}
		  	
			
			
			
			}else{
				 $updatecountlogin=$this->Menu_model->f_countlogingagal($username);
				$this->salahpassword();
				redirect("v_loginadmin");
			}
		  }
	
}

function login_5minutes() {
    $this->session->set_flashdata("message", "<script>swal({
    position: 'top',
    title:'Gagal!',
    text: 'Tunggu  5 menit baru bisa login kembali',
    type: 'error'
    })</script>"
    );
}
	
	function duplicatelogin() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title:'Gagal!',
        text: 'User Anda Sedang Login',
        type: 'error'
        })</script>"
        );
    }

	 function useractive() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title:'Gagal!',
        text: 'maaf  user anda belum aktif ',
        type: 'error'
        })</script>"
        );
    }
	
    function sucsess_change_pass() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title:'Berhasil!',
        text: 'Password berhasil di update',
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
    function email_password() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title:'Berhasil!',
        text: 'silakan di update kembali Password Anda!',
        type: 'success'
        })</script>"
        );
    }


    function notif_expyredate() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title:'Gagal!',
        text: 'Username Anda di Nonaktifkan dikarenakan tidak aktif selama 60 hari!',
        type: 'error'
        })</script>"
        );
    }
	
	function notif_password() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title:'Gagal!',
       text: 'Password anda telah kadaluarsa,silakan di update kembali!',
        type: 'error'
        })</script>"
        );
    }

    function change_create_password() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Ganti password',
        text: 'silakan ganti password anda!',
        type: '',
        showConfirmButton: false,
        timer: 26000,
        onOpen: function () {
        // AJAX request simulated with setTimeout
        setTimeout(function () {
        swal.close()
        }, 2000)
        }
        })</script>"
        );
    }
    function login_sucsess() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title:'Berhasil!',
        text: 'Selamat Datang di Collection System Bank Sahabat Sampoerna',
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
	function login_failed_account_delete() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title:'Gagal!',
        text: 'Acount Anda Tidak Di Aktifkan',
        type: 'error'
        })</script>"
        );
    }
	function login_failed_datanull() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title:'Gagal!',
        text: 'Username Anda Salah,',
        type: 'error'
        })</script>"
        );
    }
	

    function login_failed() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Gagal ! ',
        text: 'Gagal Login,Sialakan periksa kembali inputan Anda!!!',
        type: 'error'
        })</script>"
        );
    }

    function salahpassword() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Gagal ! ',
        text: 'Password Anda Salah',
        type: 'error'
        })</script>"
        );
    }

    function salahchaptcha() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Gagal ! ',
        text: ' inputan Captcha  Salah',
        type: 'error'
        })</script>"
        );
    }

    public function create_user($nik) {
        if ($this->session->has_userdata('username')) {
            $result['data'] = $this->Menu_model->loadMenu();
            $result['tipe_user'] = $this->Menu_model->loadTipeUser();
            $result['employee'] = $this->Menu_model->employee($nik);
            $result['pagename'] = 'Tambah User';
            $result['content'] = 'create_user';
            $this->load->view('bss_home', $result);
    //$this->load->view('home', $result);
        } else {
            redirect('v_loginadmin');
        }
    }

    

    public function create_headermenu() {
        if ($this->session->has_userdata('username')) {
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Tambah Header Menu';
            $result['content'] = 'create_headermenu';
            $this->load->view('bss_home', $result);
        } else {
            redirect('v_loginadmin');
        }
    }

    public function read_user() {
        if ($this->session->has_userdata('username')) {
            $idmenu = 'H03';
            $idmenu2 = 'D009';
            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
            if ($result1 == '1') {
                $result['data'] = $this->Menu_model->loadMenu();
                $result['user_data'] = $this->Menu_model->get_userdata();
                $result['employee'] = $this->Menu_model->get_employee();
                $result['pagename'] = 'Pengguna';
                $result['content'] = 'read_user';
                $this->load->view('bss_home', $result);
//    $this->load->view('home', $result); 
            }
        } else {
            redirect('v_loginadmin');
        }
    }

    public function read_level() {
        if ($this->session->has_userdata('username')) {
            $idmenu = 'H99';
            $idmenu2 = 'D097';
            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
            if ($result1 == '1') {
                $result['data'] = $this->Menu_model->loadMenu();
                $result['user_data'] = $this->Menu_model->get_level();
                $result['pagename'] = 'User Level';
                $result['content'] = 'read_level';
                $this->load->view('bss_home', $result);
//            $this->load->view('home', $result);    
            }
        } else {
            redirect('v_loginadmin');
        }
    }

    public function read_headermenu() {
        if ($this->session->has_userdata('username')) {
            $result['data'] = $this->Menu_model->loadMenu();
            $result['headermenu'] = $this->Menu_model->get_headermenu();
            $result['pagename'] = 'Header Menu';
            $result['content'] = 'read_headermenu';
            $this->load->view('bss_home', $result);
//            $this->load->view('home', $result);                     
        } else {
            redirect('v_loginadmin');
        }
    }

    public function read_menu_access($id) {
        if ($this->session->has_userdata('username')) {
            $result['data'] = $this->Menu_model->loadMenu();
            $result['levels'] = $this->Menu_model->get_level();
            $result['menu_list'] = $this->Menu_model->menuAccess($id);
            $result['pagename'] = 'Permission';
            $result['content'] = 'read_menu_access';
            $result['id_level'] = $id;
            $this->load->view('bss_home', $result);
//            $this->load->view('home', $result);                     
        } else {
            redirect('v_loginadmin');
        }
    }

    public function update_user($id) {
        if ($this->session->has_userdata('username')) {
            if (empty($id)) {
                redirect('menu/read_user');
            }
            $result['data'] = $this->Menu_model->loadMenu();
            $result['user_data'] = $this->Menu_model->get_userdata_one($id);
            $result['pagename'] = 'Update User';
            $result['content'] = 'update_user';
            $this->load->view('bss_home', $result);
//            $this->load->view('home', $result);
        } else {
            redirect('v_loginadmin');
        }
    }

    public function update_headermenu($id) {
        if ($this->session->has_userdata('username')) {
            $result['data'] = $this->Menu_model->loadMenu();
            $result['headermenu'] = $this->Menu_model->get_one_headermenu($id);
            $result['pagename'] = 'Update Header Menu';
            $result['content'] = 'update_headermenu';
            $this->load->view('bss_home', $result);
//            $this->load->view('home', $result);
        } else {
            redirect('v_loginadmin');
        }
    }

    public function faileddelete_notif() {
        $this->session->set_flashdata(
                "message", "<script>swal(
              'Gagal!',
              'Data Gagal dihapus!,pilih dulu datanya',
              'Gagal'
            )</script>"
        );
    }

    public function delete_notif23() {
        $this->session->set_flashdata(
                "message", "<script>swal(
              'Berhasil!',
              'Data yang ditandai sudah dihapus!',
              'success'
            )</script>"
        );
    }
	
	
	function delete_notif() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Berhasil!',
        text: 'Data Berhasil Di Hapus!',
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
	
	

    public function delete_user($id) {
        $this->Menu_model->delete_user($id);
        redirect('menu/read_user');
    }

    public function delete_multiuser() {
        $selection = $this->input->post('idnya');
        if ($selection == '') {
            $this->notif_null();
            redirect('menu/read_user');
        } elseif ($selection != '' or $selection != null) {
            $this->Menu_model->delete_multiuser($selection);
            $this->notif_sucess();


            redirect('menu/read_user');
        }
        // $selection = $this->input->post('idnya');
        // $this->Menu_model->delete_multiuser($selection);
        // redirect('menu/read_user');
    }

    public function delete_multilevel() {
        $selection = $this->input->post('idnya');
        if ($selection == '') {
            $this->faileddelete_notif();
            redirect('menu/read_level');
        } elseif ($selection != '' or $selection != null) {
            $this->delete_notif();
            $deletlevel = $this->Menu_model->delete_multilevel($selection);
			if($deletlevel = 1){
				$this->delete_notif();
			}
            redirect('menu/read_level');
        }
    }

    public function delete_multiheader() {
        $selection = $this->input->post('idnya');
        $this->Menu_model->delete_multiheader($selection);
        redirect('menu/read_headermenu');
    }

    public function delete_multi_param_city() {
        $selection = $this->input->post('idnya');
        $this->Content_model->delete_multi_param_city($selection);
        redirect('content/read_param_city');
    }

    public function create_process() {
        $name = $this->input->post('name');
        $id_user = $this->input->post('id_user');
        $password = $this->input->post('password');
        $email = $this->input->post('email');
        $level = $this->input->post('level');
//        print_r($id_user);
        if ($level == '') {
            $this->notif_levelnull();
            redirect('menu/create_user/' . $id_user);
        } else {
            $input = $this->Menu_model->create_user($name, $id_user, $password, $email, $level, '1');
            if ($input == 1) {
                $this->notif_sucess();
                redirect('menu/read_user');
            } else {
                $this->notif_gagal();
                redirect('menu/read_user');
            }
            redirect('menu/read_user');
        }
    }

    public function create_param_city_process() {
        $id_kota = $this->input->post('id_kota');
        $city_name = $this->input->post('city_name');
        $status = $this->input->post('status');

        $this->Content_model->create_param_city_process($id_kota, $city_name, $status);
        redirect('content/read_param_city');
    }

    
	/////////////// create level ////////////////////////////////
	public function sucess_notif() {
        $this->session->set_flashdata(
                "message", "<script>swal(
              'Berhasil!',
              'Data Berhasil Di tambah',
              'success'
            )</script>"
        );
    }
    public function nullactive_notif() {
        $this->session->set_flashdata(
                "message", "<script>swal(
              'Warning!',
              'Status Belum Di Isi !!!',
              'warning'
            )</script>"
        );
    }
	public function dpdhandle_notif() {
        $this->session->set_flashdata(
                "message", "<script>swal(
              'Warning!',
              'DPD Handle Belum Di Isi !!!',
              'warning'
            )</script>"
        );
    }
	
	public function create_level() {
        if ($this->session->has_userdata('username')) {
            $result['data'] = $this->Menu_model->loadMenu();
            $result['parameter'] = $this->Modelsdept->getparamater();
            $result['pagename'] = 'Tambah Level';
            $result['content'] = 'create_level';
            $this->load->view('bss_home', $result);
        } else {
            redirect('/');
        }
    }

    public function create_level_process() {
        //$level_id = $this->input->post('level_id');
        $level_name = $this->input->post('level_name');
        $status = $this->input->post('status');
		$value = $this->input->post('value');
		
		if(empty($status)){
			$this->nullactive_notif();
			redirect('menu/create_level');
		} 
		if(empty($value)){
			$this->dpdhandle_notif();
			redirect('menu/create_level');
		}
        
        $this->Menu_model->create_level( $level_name, $status,$value);
        $this->sucess_notif();
        redirect('menu/read_level');
    }
	
	///////////// end create level //////////////////////////////////////////////////////

    function notif_sucess_create_header() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Berhasil!',
        text: 'Data Berhasil Di inputkan!',
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

    public function create_header() {
        if ($this->session->has_userdata('username')) {
            $idmenu = 'H99';
            $idmenu2 = 'D100';
            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
            if ($result1 == '1') {
                $result['data'] = $this->Menu_model->loadMenu();
                $result['pagename'] = 'Create Header';
                $result['content'] = 'view_header';
                $this->load->view('bss_home', $result);
            }
        } else {
            redirect('/');
        }
    }

    public function inputheader() {
        if ($this->session->has_userdata('username')) {
            $a = $this->input->post('header');
            $update = $this->Menu_model->headerdata($a);
            if ($update = 1) {
                $this->notif_sucess_create_header();
            }
            //$this->sucess_notif();
            redirect('menu/create_header');
        }
    }

    public function create_headermenu_process() {
        $header_id = $this->input->post('header_id');
        $headerName = $this->input->post('headerName');
        $status = $this->input->post('status');

        $this->Menu_model->create_headermenu($header_id, $headerName, $status);
        redirect('menu/read_headermenu');
    }

    public function update_headermenu_process() {
        $header_id = $this->input->post('header_id');
        $headerName = $this->input->post('headerName');
        $status = $this->input->post('status');

        $this->Menu_model->update_headermenu($header_id, $headerName, $status);
        update_notif();
        redirect('menu/read_headermenu');
    }

    public function notif_update() {
        $this->session->set_flashdata(
                "message", "<script>swal(
              'Berhasil!',
              'Data Berhasil Di update',
              'Berhasil'
            )</script>"
        );
    }

    function sucess_notif_user_level() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Berhasil!',
        text: 'Berhasil update user level!!!',
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

    function notif_gagal_user_level() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Gagal! ',
        text: 'Gagal Update User level!!!',
        type: 'error'
        })</script>"
        );
    }

     public function update_level_process() {
        $a = $this->input->post('level_id');
        $b = $this->input->post('level_name');
        $c = $this->input->post('status');
        $d = $this->input->post('value');
        if ($b == '' or $c == '') {
            $this->notif_gagal_user_level();
            redirect('menu/read_level');
        } else {
            $this->Menu_model->update_level_process($a, $b, $c,$d);

            $this->sucess_notif_user_level();
            redirect('menu/read_level');
        }
    }

    public function update_level() {
        if ($this->session->has_userdata('username')) {
			
            $id = $this->input->post('idlevel');
            if (empty($id)) {
                redirect('menu/read_level');
            }
            $result['data'] = $this->Menu_model->loadMenu();
            $result['user_data'] = $this->Menu_model->get_one_level($id);
            $result['parameter'] = $this->Modelsdept->getparamater();
            $result['pagename'] = 'Update Level';
            $result['content'] = 'update_level';
            $this->load->view('bss_home', $result);
//            $this->load->view('home', $result);
        } else {
            redirect('/');
        }
    }

    public function update_process() {
        $name = $this->input->post('name');
        $id_user = $this->input->post('id_user');
        $level = $this->input->post('level');
        $status = $this->input->post('status');
        //var_dump($name,$id_user,$level,$status);
        $this->Menu_model->update_user($name, $id_user, $level, $status);
        $this->update_notif();
        redirect('userweb/index');
    }

    public function api_read_menu_access() {
        $result = $this->Menu_model->menuAccess();
        echo json_encode($result);
    }

    public function access_permission_process($id_level) {
        if ($this->session->userdata('username')) {
            $id_header = $this->input->post('idheader');
            $id_item = $this->input->post('iditem');

            $data = $this->Menu_model->access_permission_process($id_level, $id_header, $id_item);
            redirect('menu/read_level');
        } else {
            redirect('/');
        }
    }

    function notif_sucess() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Berhasil!',
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

    function notif_gagal() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Gagal! '
        })</script>"
        );
    }

    function notif_null() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Perhatian! ',
        text: 'Tidak Ada Data Yang Di Pilih !!!',
        type: 'warning'
        })</script>"
        );
    }

    function notif_levelnull() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Perhatian! ',
        text: 'Silahkan Pilih Level User!!!',
        type: 'warning'
        })</script>"
        );
    }

}
