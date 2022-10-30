<?php

Class Dephead extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
        $this->load->helper(array('form', 'url'));

        $this->db = $this->load->database('default', true);
        $this->db2 = $this->load->database('second', true);

        /* if ($_SERVER['SERVER_NAME'] == 'localhost') {
          $dsn1 = 'mysqli://root:@localhost/xplmjdmx_dbmgmtmenu';
          $this->db = $this->load->database($dsn1, true);

          $dsn2 = 'mysqli://root:@localhost/xplmjdmx_dbbsscollection';
          $this->db2 = $this->load->database($dsn2, true);
          } else {
          $dsn1 = 'mysqli://xplmjdmx_C24sys:4N4G4T49876@localhost/xplmjdmx_dbmgmtmenu';
          $this->db = $this->load->database($dsn1, true);

          $dsn2 = 'mysqli://xplmjdmx_C24sys:4N4G4T49876@localhost/xplmjdmx_dbbsscollection';
          $this->db2 = $this->load->database($dsn2, true);
          } */
        $this->load->model('Generatesp', '', TRUE);
        $this->load->helper(array('form', 'url'));
        $this->load->library('session');
        $this->load->model('Menu_model', '', TRUE);
        $this->load->model('Content_model', '', TRUE);
        $this->load->model('Modelsdept', '', TRUE);
        $this->load->helper(array('form', 'url'));
    }

//// Page header
    public function index() {
        if ($this->session->has_userdata('username')) {
            $idmenu = 'H03';
            $idmenu2 = 'D048';
            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
            if ($result1 == '1') {
                $this->session->set_userdata('nik', '');
                $result['data'] = $this->Menu_model->loadMenu();
                $result['pagename'] = 'Data Karyawan';
                //$result['karyawan'] = $this->Modelsdept->get_um_datadepthead()->result();
                $result['karyawan'] = $this->Modelsdept->datauserweb()->result();
                $result['content'] = 'read_um_datadepthead';
                $this->load->view('bss_home', $result); //$this->load->view('home', $result);                 
            }
        } else {
            redirect('/');
        }
    }

    public function create_um_datadepthead() {
        if ($this->session->has_userdata('username')) {
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Tambah Dephead';
            $result['content'] = 'create_depthead';
            $result['inputkaryawan'] = $this->Modelsdept->dataemployee()->result();
            $this->load->view('bss_home', $result);
            // $this->sucess_notif_create_collector();
            //redirect('content/create_collector');
        } else {
            redirect('/');
        }
    }

    public function create_um_bm() {
        if ($this->session->has_userdata('username')) {
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Tambah Dephead';
            $result['content'] = 'create_bm';
            $result['inputkaryawan'] = $this->Modelsdept->dataemployee()->result();
            $this->load->view('bss_home', $result);
        } else {
            redirect('/');
        }
    }

//    public function notif_sucess() {
//        $this->session->set_flashdata( "message1",
//                "<div class='alert alert-success fade in'>
//			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
//			Pesan Alert Sukses
//		</div>");
//    }
//        swal.showLoading()
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
        title: 'Gagal! ',
        text: 'Karna Tidak Ada Data Yang Di Pilih !!!',
        type: 'error'
        })</script>"
        );
    }

    function notif_null() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Perhatian! ',
        text: 'Karna Tidak Ada Data Yang Di Pilih !!!',
        type: 'warning'
        })</script>"
        );
    }

    function notif_nullnik() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Perhatian ! ',
        text: 'Karna Tidak Data Nik !!!',
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
        type: 'error'
        })</script>"
        );
    }

    public function create_proses_dephead() {
        if ($this->session->has_userdata('username')) {
            if (isset($_POST['save'])) {
                $code = "save";
                $selection = $this->input->post('idnya');
                $tes = $this->Modelsdept->create_depthead($selection);
                if ($tes == 1) {
                    $this->notif_sucess();
                    redirect('dephead/index');
                } elseif ($tes == '0') {
                    $this->notif_gagal();
                    redirect('dephead/create_um_datadepthead');
                } elseif ($tes == '2') {
                    $this->notif_gagal();
                    redirect('dephead/create_um_datadepthead');
                }
            }
        } else {
            redirect('/');
        }
    }

    public function create_proses_bm() {
        if ($this->session->has_userdata('username')) {
            if (isset($_POST['save'])) {
                $code = "save";
                $selection = $this->input->post('idnya');
                $tes = $this->Modelsdept->create_bm($selection);
                if ($tes == 1) {
                    $this->notif_sucess();
                    redirect('dephead/index');
                } elseif ($tes == '0') {
                    $this->notif_gagal();
                    redirect('dephead/create_um_datadepthead');
                } elseif ($tes == '2') {
                    $this->notif_gagal();
                    redirect('dephead/create_um_datadepthead');
                }
            }
        } else {
            redirect('/');
        }
    }

    public function delete_multi_um_depthead() {
        $selection = $this->input->post('idnya');
        if ($selection == '') {
            $this->notif_gagal();
            redirect('dephead/index');
        } elseif ($selection != '' or $selection != null) {
//            $this->delete_notif();
            $delete = $this->Modelsdept->delete_multi_um_dephead($selection);
            if ($delete == 1) {
                $this->notif_sucess();
                redirect('dephead/index');
            }
            redirect('dephead/index');
        }
    }

    public function detaildepthead() {
        if ($this->session->has_userdata('username')) {
			$idmenu = 'H03';
            $idmenu2 = 'D048';
            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);

            $nik = $this->input->post('nik');
            $jabatan = $this->input->post('jbtn');

            if ($this->session->userdata('nik') == '') {
                $this->session->set_userdata('nik', $nik);
                $nik = $this->session->userdata('nik');
            } else {
                $nik = $this->session->userdata('nik');
            }

            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Tambah Dephead';
            $result['content'] = 'detaildepthead';
            $result['depthead'] = $this->Modelsdept->getdatadepthead($nik);
            $result['agent'] = $this->Modelsdept->getdatacollector($nik);
            /* if ($jabatan == '1') {
                $result['cabang'] = $this->Modelsdept->branchdata();
            } else {
                $result['cabang'] = $this->Modelsdept->branchdata_bm();
            } */
			
			$result['cabang'] = $this->Modelsdept->branchdata_bm($nik);
            $result['parameter'] = $this->Modelsdept->getparamater();
            $result['branch'] = $this->Modelsdept->branch($nik);
            
            //var_dump($result['cabang']);
            $this->load->view('bss_home', $result);
            // $this->sucess_notif_create_collector();
            //redirect('content/create_collector');
        } else {
            redirect('/');
        }
    }

    public function tambahcabang() {
        if ($this->session->has_userdata('username')) {
            $selection = $this->input->post('idnya');
            $nik = $this->input->post('nik');
//            print_r('dephead/detaildepthead/' . $nik);
            if ($selection == '') {
                $this->notif_null();
                redirect('dephead/detaildepthead/');
            } else {
                $insert = $this->Modelsdept->input($selection, $nik);
                if ($insert === 1) {
                    $this->notif_sucess();
                    redirect('dephead/detaildepthead/');
                } elseif ($insert === 0) {
                    $this->notif_null();
                    redirect('dephead/detaildepthead/');
                } elseif ($insert === 2) {
                    $this->notif_gagal();
                    redirect('dephead/detaildepthead/');
                } elseif ($insert === 3) {
                    $this->notif_nullnik();
                    redirect('dephead/detaildepthead/');
                }
            }
        } else {
            redirect('/');
        }
    }

    public function deletmcabang() {
        if ($this->session->has_userdata('username')) {
            $nik = $this->input->post('nik');
            $selection = $this->input->post('idnya');
//            echo var_dump($selection);
            if ($selection == '') {
                $this->notif_null();
                redirect('dephead/detaildepthead/');
            } else {
                $delete = $this->Modelsdept->delete($selection, $nik);
                if ($delete == 1) {
                    $this->notif_sucess();
                    redirect('dephead/detaildepthead/');
                } elseif ($delete == 2) {
                    $this->notif_gagal();
                    redirect('dephead/detaildepthead/');
                } else {
                    $this->notif_null();
                    redirect('dephead/detaildepthead/');
                }
            }
        } else {
            redirect('/');
        }
    }

    public function setdpd() {
        if ($this->session->has_userdata('username')) {
            $value = $this->input->post('f_dpd');
            if ($value == 'Non') {
                $this->notif_nulldpd();
                redirect('dephead/detaildepthead/');
            } else {
                $setdpd = $this->Modelsdept->setdpd($value, $this->session->userdata('nik'));
                if ($setdpd == 1) {
                    $this->notif_sucess();
                    redirect('dephead/detaildepthead/');
                } else {
                    $this->notif_gagalsetdpd();
                    redirect('dephead/detaildepthead/');
                }
            }
        } else {
            redirect('/');
        }
    }

    function notif_nulldpd() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Perhatian! ',
        text: 'Karna Tidak Ada DPD Yang Di Pilih !!!',
        type: 'warning'
        })</script>"
        );
    }

    function notif_gagalsetdpd() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Gagal! ',
        text: 'Karna Tidak Ada Data Yang Di Pilih !!!',
        type: 'error'
        })</script>"
        );
    }

}