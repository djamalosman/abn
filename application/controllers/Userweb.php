<?php

//require('pdfcreate/fpdf.php');

Class Userweb extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
        $this->load->helper(array('form', 'url'));
         $this->db = $this->load->database('default', true);
        $this->db2 = $this->load->database('second', true);
        $this->load->model('Generatesp', '', TRUE);
        $this->load->helper(array('form', 'url'));
        $this->load->library('session');
        $this->load->model('Menu_model', '', TRUE);
        $this->load->model('Content_model', '', TRUE);
        $this->load->model('Modelsdept', '', TRUE);
        $this->load->model('Modelusermobile', '', TRUE);
        $this->load->model('Modeluserweb', '', TRUE);
        $this->load->model('Modelsemployee', '', TRUE);
        $this->load->helper(array('form', 'url'));
    }

//// Page header
    public function index() {
        if ($this->session->has_userdata('username')) {
            $idmenu = 'H03';
            $idmenu2 = 'D009';
            $this->session->set_userdata('nik', '');
            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
            if ($result1 == '1') {
                $this->session->set_userdata('nik', '');
                $result['data'] = $this->Menu_model->loadMenu();
                //$result['acsess'] = $this->Menu_model->loadlevelmenu($idmenu2, $this->session->userdata('level'));
                $result['user_data'] = $this->Modeluserweb->get_userdata();
                $result['employee'] = $this->Modeluserweb->get_employee();
                $result['pagename'] = 'Pengguna';
                $result['content'] = 'read_user';
                $this->load->view('bss_home', $result);
//            $this->load->view('home', $result); 
            }
        } else {
            redirect('/');
        }
    }
	
	  public function updateonline_userweb() {
        if ($this->session->has_userdata('username')) {
            $selection = $this->input->post('iduserweb');
			//var_dump($selection);
            if ($selection == null) {
                $this->cancelreset();
                redirect('userweb/index');
            } elseif ($selection != null) {
                $action = $this->Modeluserweb->updatestatus_userweb($selection);
                if ($action == '1') {
                    $this->notif_sucess();
                } else {
                    $this->notif_gagal_aprove();
                }
            
            
                redirect('userweb/index');
            }
        }
    }


    public function update_user() {
        if ($this->session->has_userdata('username')) {
            $nik = $this->input->post('uid');
            if ($this->session->userdata('nik') == '') {
                $this->session->set_userdata('nik', $nik);
                $nik = $this->session->userdata('nik');
            } else {
                $nik = $this->session->userdata('nik');
            }
            if (empty($nik)) {
                redirect('employee/index');
            }
            $result['data'] = $this->Menu_model->loadMenu();
            $result['tipe_user'] = $this->Modeluserweb->loadTipeUser();
            $result['user_data'] = $this->Modeluserweb->get_userdata_one($nik);
            $result['pagename'] = 'Update User';
            $result['content'] = 'update_user';
            $this->load->view('bss_home', $result);
//            $this->load->view('home', $result);
        } else {
            redirect('/');
        }
    }
    
    
    public function delete_multiuser() {
        $selection = $this->input->post('idnya');
        if ($selection == '') {
            $this->notif_null();
            redirect('userweb/index');
        } elseif ($selection != '' or $selection != null) {
            $delete = $this->Modeluserweb->delete_multiuser($selection);
            if($delete == 1){
            $this->notif_sucess();
            } elseif($delete == 0) {
                $this->notif_gagal_delete();
            } else {
                $this->notif_not_delete();   
            }
            redirect('userweb/index');
        }
        // $selection = $this->input->post('idnya');
        // $this->Menu_model->delete_multiuser($selection);
        // redirect('menu/read_user');
    }

    

    public function update_process() {
        $name = $this->input->post('name');
        $id_user = $this->input->post('id_user');
        $level = $this->input->post('level');
        $status = $this->input->post('status');
        //var_dump($name,$id_user,$level,$status);
        $udpate = $this->Modeluserweb->update_user($name, $id_user, $level, $status);
        if ($udpate == 1) {
            $this->notif_sucess();
        } else {
            $this->notif_gagal_update();
        }
        redirect('userweb/index');
    }

    public function create_user() {
        if ($this->session->has_userdata('username')) {
            $result['data'] = $this->Menu_model->loadMenu();
             $nik = $this->input->post('uid1');
            if ($this->session->userdata('nik') == '') {
                $this->session->set_userdata('nik', $nik);
                $nik = $this->session->userdata('nik');
            } else {
                $nik = $this->session->userdata('nik');
            }
            $result['tipe_user'] = $this->Modeluserweb->loadTipeUser();
            $result['employee'] = $this->Modeluserweb->employee($nik);
            $result['branch'] = $this->Modelsdept->branch($nik);
            $result['cabang'] = $this->Modelsdept->branchdata_bm();
            $result['pagename'] = 'Tambah User';
            $result['content'] = 'create_user';
            $this->load->view('bss_home', $result);
//            $this->load->view('home', $result);
        } else {
            redirect('/');
        }
    }

    public function create_process() {
        $name = $this->input->post('name');
        $id_user = $this->input->post('id_user');
        $password = $this->input->post('password');
        $email = $this->input->post('email');
        $level = $this->input->post('level');
//        print_r($id_user);
        if ($level == '') {
            $this->notif_null_level();
            redirect('userweb/create_user');
        } else {
            $input = $this->Modeluserweb->create_user($name, $id_user, $password, $email, $level, '1');
            if ($input == 1) {
                $this->notif_sucess();
                redirect('userweb/index');
            } else {
                $this->notif_gagal();
                redirect('userweb/index');
            }
            redirect('userweb/index');
        }
    }

    public function inserfile() {
        $date = date('ymdHis');
        $tanggal = date('Y-m-d');
        $type = "photo_web";
        $nik = $this->input->post('nik');
        $code = $nik . $date;
//        $ketfile = $this->input->post('ketfile2');

        $f_image = $_FILES['myfile']['tmp_name'];
        $file_size = $_FILES['myfile']['size'];
        $file_name = $_FILES['myfile']['name'];
        $file_type = $_FILES['myfile']['type'];
        $file = file_get_contents($f_image);
        //$image = mysqli_real_escape_string($conn, $file);
        $mime_type = mime_content_type($f_image);
        $data = array(
            'f_code' => $code,
            'f_cif' => $nik,
            'f_type' => $type,
            'f_keterangan' => $nik,
            'f_name_file' => $file_name,
            'f_type_file' => $mime_type,
            'f_file_content' => $file,
            'f_size_file' => $file_size,
            'f_tanggal' => $tanggal
        );
        $respons = $this->Modeluserweb->sendimage2($data, $nik, $code, $type, $file_name, $file_size, $file, $mime_type);

        if ($respons == 1) {
            $this->session->set_userdata("codeimage", $code);
            $this->notif_sucess_image();
            redirect('menu/home');
        } else {
            $this->notif_gagal_image();
            redirect('menu/home');
        }
    }

    public function aprove_user_web() {
        if ($this->session->has_userdata('username')) {
            $idmenu = 'H03';
            $idmenu2 = 'D103';
            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
            if ($result1 == '1') {
                $result['data'] = $this->Menu_model->loadMenu();
                $result['approveuserweb'] = $this->Modeluserweb->get_userweb_aprove();
//                $result['agent'] = $this->Content_model->get_agent();
                $result['pagename'] = 'aprovall collector';
                $result['content'] = 'approve_user_web';
                $this->load->view('bss_home', $result);
            }
        } else {
            redirect('/');
        }
    }

    public function reject_aprove() {
        if (isset($_POST['Submit'])) {
            $id = $this->input->post('id');
            $ket = $this->input->post('ket');
            $hasil = $this->Modeluserweb->updatestatus_reject($id, $ket);
            if ($hasil == 1) {
                $this->notif_sucess();
            } else {
                $this->notif_gagal_reject();
            }
        }
        redirect('userweb/aprove_user_web');
    }

    public function approveduserweb() {
        if ($this->session->has_userdata('username')) {
            $selection = $this->input->post('idnya');
            if ($selection == null) {
                $this->notif_null();
                redirect('userweb/aprove_user_web');
            } elseif ($selection != null) {
                $action = $this->Modeluserweb->updatestatus_approve($selection);
                if ($action == '1') {
                    $this->notif_sucess();
                } else {
                    $this->notif_gagal_aprove();
                }
                redirect('userweb/aprove_user_web');
            }
        }
    }

//notif//////////////////////////////////////////////////////////////////////////////////////////////////////
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
    function cancelreset() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Cancel Reset!',
        type: 'warning',
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
    function notif_sucess_image() {
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

    function sucess_notif_create_collector() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Berhasil!',
        text: 'Berhasil Create User Mobile!!!',
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
        title: 'Gagal! ',
        text: 'Gagal Create User Web!!!',
        type: 'error'
        })</script>"
        );
    }
    function notif_gagal_delete() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Gagal! ',
        text: 'Gagal Delete User Web!!!',
        type: 'error'
        })</script>"
        );
    }
    function notif_not_delete() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Gagal! '
        })</script>"
        );
    }

    function notif_gagal_aprove() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Gagal! ',
        text: 'Gagal Aprove!!!',
        type: 'error'
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
	
	function notif_null_level() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Perhatian! ',
        text: 'Tidak Ada Level User Yang Di Pilih !!!',
        type: 'warning'
        })</script>"
        );
    }
    function notif_gagal_update() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Gagal! ',
        text: 'Gagal Update Data !!!',
        type: 'error'
        })</script>"
        );
    }

    function notif_nulldata() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Perhatian! ',
        text: 'Data Tidak!Di Temukan !!',
        type: 'warning'
        })</script>"
        );
    }

    function notif_nullnik() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Perhatian ! ',
        text: 'Tidak Data Nik !!!',
        type: 'warning'
        })</script>"
        );
    }

    function notif_gagaldata() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Gagal! ',
        text: 'Anda Gagal Menambahkan Depthead !!! Mungkin Ada Kesalahan Data !!!',
        type: 'error'
        })</script>"
        );
    }

}
