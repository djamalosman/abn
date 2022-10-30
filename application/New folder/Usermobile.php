<?php

//require('pdfcreate/fpdf.php');

Class Usermobile extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
        $this->load->helper(array('form', 'url'));
        if ($_SERVER['SERVER_NAME'] == 'localhost') {
            $dsn1 = 'mysqli://root:@localhost/xplmjdmx_dbmgmtmenu';
            $this->db = $this->load->database($dsn1, true);

            $dsn2 = 'mysqli://root:@localhost/xplmjdmx_dbbsscollection';
            $this->db2 = $this->load->database($dsn2, true);
        } else {
            $dsn1 = 'mysqli://xplmjdmx_C24sys:4N4G4T49876@localhost/xplmjdmx_dbmgmtmenu';
            $this->db = $this->load->database($dsn1, true);

            $dsn2 = 'mysqli://xplmjdmx_C24sys:4N4G4T49876@localhost/xplmjdmx_dbbsscollection';
            $this->db2 = $this->load->database($dsn2, true);
        }
        $this->load->model('Generatesp', '', TRUE);
        $this->load->helper(array('form', 'url'));
        $this->load->library('session');
        $this->load->model('Menu_model', '', TRUE);
        $this->load->model('Content_model', '', TRUE);
        $this->load->model('Modelsdept', '', TRUE);
        $this->load->model('Modelusermobile', '', TRUE);
        $this->load->model('Modelsemployee', '', TRUE);
        $this->load->helper(array('form', 'url'));
    }

//// Page header
    public function index() {
        if ($this->session->has_userdata('username')) {
            $idmenu = 'H03';
            $idmenu2 = 'D008';
            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
            if ($result1 == '1') {
                $this->session->set_userdata('nik', '');
//                $reqflag = $this->session->userdata('reqflag');
                $result['data'] = $this->Menu_model->loadMenu();
                $result['pagename'] = 'Agent';
                $result['acsess'] = $this->Menu_model->loadlevelmenu($idmenu2, $this->session->userdata('level'));
                $result['allowedit'] = $this->session->userdata('allowedit');
                $result['agent'] = $this->Modelusermobile->get_um_agent($this->session->userdata('username'), $this->session->userdata('level'));
                $result['content'] = 'view_agent';
                $this->load->view('bss_home', $result);
            }
        } else {
            redirect('/');
        }
    }

    public function create_collector() {
        if ($this->session->has_userdata('username')) {
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Tambah Data Collector';
            $result['content'] = 'create_collector';
            $result['inputkaryawan'] = $this->Modelusermobile->get_um_datakaryawan1()->result();
            $this->load->view('bss_home', $result);
            // $this->sucess_notif_create_collector();
            //redirect('content/create_collector');
        } else {
            redirect('/');
        }
    }

    public function create_proses_collector() {
        if ($this->session->has_userdata('username')) {
            if (isset($_POST['save'])) {
                $code = "save";
                //$agenid = $this->input->post('agenid');
                // $nama = $this->input->post('nama');
                $selection = $this->input->post('idnya');
                echo var_dump($selection);
                if ($selection == '') {
                    $this->notif_null();
                    redirect('usermobile/create_collector');
                } else {
                    //print_r($selection);
                    $tes = $this->Modelusermobile->create_agent_collector($selection);
//                    echo var_dump($tes);
                    if ($tes == 1) {
                        $this->sucess_notif_create_collector();
                        redirect('usermobile/index');
                    } elseif ($tes == 0) {
                        $this->notif_gagal();
                        redirect('usermobile/create_collector');
                    } elseif ($tes == 2) {
                        $this->notif_nulldata();
                        redirect('usermobile/create_collector');
                    } elseif ($tes == 3) {
                        $this->notif_null();
                        redirect('usermobile/create_collector');
                    }
                }
            } else {
                redirect('/');
            }
        }
    }

    public function update_um_agent() {
        if ($this->session->has_userdata('username')) {
            $nik = $this->input->post('nik');
            if ($nik == '') {
                redirect('usermobile/index');
            } else {
                if ($this->session->userdata('nik') == '') {
                    $this->session->set_userdata('nik', $nik);
                    $nik = $this->session->userdata('nik');
                } else {
                    $nik = $this->session->userdata('nik');
                }
                $result['data'] = $this->Menu_model->loadMenu();
                $result['agent'] = $this->Modelusermobile->get_um_agent_one($nik);
                $result['pagename'] = 'Update Agent Data';
                $result['content'] = 'update_um_agent';
                $this->load->view('bss_home', $result);
//            $this->load->view('bss_home', $result); //$this->load->view('home', $result);
            }
        } else {
            redirect('/');
        }
    }

    public function update_um_agent_process() {
        $id_agen = $this->input->post('nik');
        $f_nohp = $this->input->post('f_nohp');
        $email = $this->input->post('f_email');
        $active = $this->input->post('f_active');

        //var_dump($id_agen,$f_nohp,$email,$active);
        $this->Modelusermobile->update_um_agent_process($id_agen, $f_nohp, $email, $active);
        //echo $this->db2->last_query();
        $this->sucess_notif_update_agent();
        redirect('usermobile/index');
    }

    public function detail_data_debitruperagent() {
        if ($this->session->has_userdata('username')) {
            $nik = $this->input->post('nik');
            if ($this->session->userdata('nik') == '') {
                $this->session->set_userdata('nik', $nik);
                $nik = $this->session->userdata('nik');
            } else {
                $nik = $this->session->userdata('nik');
            }
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Detail Collector';
            $result['detailcollector'] = $this->Modelusermobile->get_detaildebitur($nik);
            $result['content'] = 'viewagent_debitur';
            $this->load->view('bss_home', $result);
        } else {
            redirect('content/view_agent');
        }
    }

    public function delete_multi_um_agent() {
        $selection = $this->input->post('idnya');
        if ($selection == '') {
            $this->notif_null();
            redirect('usermobile/index');
        } elseif ($selection != '' or $selection != null) {
            $this->Modelusermobile->delete_multi_um_agent($selection);
            $this->notif_sucess();
            redirect('usermobile/index');
        }
    }

    public function approved_collector() {
        if ($this->session->has_userdata('username')) {
            $idmenu = 'H03';
            $idmenu2 = 'D046';
            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
            if ($result1 == '1') {
                $result['data'] = $this->Menu_model->loadMenu();
                $result['approvecolec'] = $this->Modelusermobile->get_collector_aprove();
//                $result['agent'] = $this->Content_model->get_agent();
                $result['pagename'] = 'aprovall collector';
                $result['content'] = 'approve_collector';
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
                $this->notif_null();
                redirect('usermobile/approved_collector');
            } elseif ($selection != null) {
                $action = $this->Modelusermobile->updatestatus_approve($selection);
                if ($action == '1') {
                    $this->notif_sucess();
                } else {
                    $this->notif_gagal_aprove();
                }


                redirect('usermobile/approved_collector');
            }
        }
    }

    public function reject_aprove() {
        $selection = $this->input->post('idnya');
        if ($selection == '') {
            $this->notif_null();
            redirect('usermobile/approved_collector');
        } elseif ($selection != '' or $selection != null) {
            $this->Modelusermobile->updatestatus_reject($selection);
            $this->notif_sucess();
            redirect('usermobile/approved_collector');
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

    function sucess_notif_aprove_collector() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Berhasil!',
        text: 'Berhasil Aprove!!!',
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
    function sucess_notif_update_agent() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Berhasil!',
        text: 'Berhasil Update!!!',
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
        text: 'Gagal Create User Mobile!!!',
        type: 'error',
        showConfirmButton: false,
        timer: 1500,
        onOpen: function () {
        setTimeout(function () {
        swal.close()
        }, 2000)
        }
        })</script>"
        );
    }
    function notif_gagal_aprove() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Gagal! ',
        text: 'Gagal Aprove!!!',
        type: 'error',
        showConfirmButton: false,
        timer: 1500,
        onOpen: function () {
        setTimeout(function () {
        swal.close()
        }, 2000)
        }
        })</script>"
        );
    }

    function notif_null() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Perhatian! ',
        text: 'Tidak Ada Data Yang Di Pilih !!!',
        type: 'warning',
        showConfirmButton: false,
        timer: 1500,
        onOpen: function () {
        setTimeout(function () {
        swal.close()
        }, 2000)
        }
        })</script>"
        );
    }

    function notif_nulldata() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Perhatian! ',
        text: 'Data Tidak!Di Temukan !!',
        type: 'warning',
        showConfirmButton: false,
        timer: 1500,
        onOpen: function () {
        setTimeout(function () {
        swal.close()
        }, 2000)
        }
        })</script>"
        );
    }

    function notif_nullnik() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Perhatian ! ',
        text: 'Tidak Data Nik !!!',
        type: 'warning',
        showConfirmButton: false,
        timer: 1500,
        onOpen: function () {
        setTimeout(function () {
        swal.close()
        }, 2000)
        }
        })</script>"
        );
    }

    function notif_gagaldata() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Gagal! ',
        text: 'Anda Gagal Menambahkan Depthead !!! Mungkin Ada Kesalahan Data !!!',
        type: 'error',
        showConfirmButton: false,
        timer: 1500,
        onOpen: function () {
        setTimeout(function () {
        swal.close()
        }, 2000)
        }
        })</script>"
        );
    }

}
