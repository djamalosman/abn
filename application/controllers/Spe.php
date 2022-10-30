<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Spe extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('PHPExcel', 'PHPExcel/IOFactory'));
        $this->load->library('Pdfgenerator');

        $this->load->helper('file');
		$this->db = $this->load->database('default', true);
		$this->db2 = $this->load->database('second', true);

        
        $this->load->helper(array('form', 'url'));
        $this->load->library('session');
        $this->load->model('Menu_model', '', TRUE);
        $this->load->model('Content_model', '', TRUE);
        $this->load->model('Model_spe', '', TRUE);
        $this->load->model('Generatesp', '', TRUE);
        $this->load->helper(array('form', 'url'));
    }

    // public function getSPaccount(){
    //     $sp=$this->Content_model->get_accountSP();
    //     return($sp);
    // }
//    public function index() {
//        $penunggak = $this->Generatesp->generatsp();
//        print_r($penunggak) ;
//    }

    public function view_spe_monitoring() {
        if ($this->session->has_userdata('username')) {
            $idmenu = 'H06';
            $idmenu2 = 'D0106';
            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
            if ($result1 == '1') {
                $result['data'] = $this->Menu_model->loadMenu();
//                $result['jsp'] = $this->Content_model->getparamsp();
//                $result['produk'] = $this->Content_model->getpproduk();
                $result['sp'] = $this->Model_spe->getgeneratespe();
                
                $result['jabatan'] = $this->Generatesp->getjabatan();
                $result['namaasignsp'] = $this->Generatesp->getnama();
                $result['contactperson'] = $this->Generatesp->contactperson();
//                $result['selectsp'] = $this->Generatesp->selectsp();
                $result['pagename'] = 'SP Monitoring';
                $result['content'] = 'read_spe_monitoring';

                $this->load->view('bss_home', $result);
//            $this->load->view('bss_home', $result); //$this->load->view('bss_home', $result); //$this->load->view('home', $result);                 
            }
        } else {
            redirect('/');
        }
    }
    public function update_cetak($cif) {
        if ($this->session->has_userdata('username') > 0) {
            $cetak = $this->Model_spe->cetak($cif);
            if ($cetak == 1) {
                $this->notif_sucess();
            } else {
                $this->notif_gagal();
            }
            redirect('spe/view_spe_monitoring');
        }
    }

    public function update_kirim($cif) {
        if ($this->session->has_userdata('username') > 0) {
            $id = $this->input->post('id');
            $ket = $this->input->post('ket');
            $cetak = $this->Model_spe->kirim($id, $ket);
            if ($cetak == 1) {
                $this->notif_sucess_kirim();
            } else {
                $this->notif_gagal_kirim();
            }
            redirect('spe/view_spe_monitoring');
        }
    }

    public function update_trima() {
        if ($this->session->has_userdata('username') > 0) {
            $id = $this->input->post('id');
            $ket = $this->input->post('ket');
            $cetak = $this->Model_spe->trima($id, $ket);
            if ($cetak == 1) {
                $this->notif_sucess_trima();
            } else {
                $this->notif_gagal_trima();
            }
            redirect('spe/view_spe_monitoring');
        }
    }

//    sp administrator//////////////////////////////////////////////////////////////////////////////////////////////

    public function diffInMonths(\DateTime $date1, \DateTime $date2) {
        $diff = $date1->diff($date2);

        $months = $diff->y * 12 + $diff->m + $diff->d / 30;

        return (int) round($months);
    }
    public function read_spe_administration() {
        if ($this->session->has_userdata('username')) {
            $idmenu = 'H06';
            $idmenu2 = 'D0105';
            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
            if ($result1 == '1') {
//                $today = new DateTime('now');
//                    $expdate =new DateTime('2016-12-15 00:00:00.000');
//                    $datebts = $this->diffInMonths($expdate, $today);
//                    print_r($datebts);
                $result['data'] = $this->Menu_model->loadMenu();
                $result['jsp'] = $this->Model_spe->getparamspe();
                $result['produk'] = $this->Content_model->getpproduk();
                $result['sp'] = $this->Model_spe->getspe();
                $result['pagename'] = 'SPe Administrasi';
                $result['content'] = 'read_spe_administration';

                $this->load->view('bss_home', $result);
//            $this->load->view('bss_home', $result); //$this->load->view('bss_home', $result); //$this->load->view('home', $result);                 
            }
        } else {
            redirect('/');
        }
    }

    public function spe_ad_proses() {
        if ($this->session->has_userdata('username')) {
            $jsp = $this->input->post('jenissp');
            $prd = $this->input->post('produk');
            $desc = $this->input->post('description');
            $param = $this->input->post('param');
            $masa = $this->input->post('masa');
            $input = $this->Model_spe->inputspe($jsp, $prd,$desc, $param, $masa);
            if ($input === 1) {
                $this->notif_success_add_sp();
                redirect('spe/read_spe_administration');
            } elseif ($input == 0) {
                $this->notif_gagal_add_sp();
                redirect('spe/read_spe_administration');
            } elseif ($input == 2) {
                $this->notif_double_add_sp();
                redirect('spe/read_spe_administration');
            }
        } else {
            redirect('/');
        }
    }

    public function spe_ad_proses_update() {
        if ($this->session->has_userdata('username')) {
            $jsp = $this->input->post('jenissp1');
            $prd = $this->input->post('prdk');
            $desc = $this->input->post('description');
            $param = $this->input->post('mindpd');
            $id = $this->input->post('idsp');
            $masa = $this->input->post('masa');
            $update = $this->Model_spe->updatetsp($param, $masa,$id,$desc);
            if ($update === 1) {
                $this->notif_sucess_update();
                redirect('spe/read_spe_administration');
            } else {
                $this->notif_gagal_update();
                redirect('spe/read_spe_administration');
            }
//            var_dump($id);
        } else {
            redirect('/');
        }
    }

    public function delete_multi_spe_administration() {
        $selection = $this->input->post('idnya');
        if ($selection == '') {
            $this->notif_null_sp_delete();
        } else {
            $delete = $this->Model_spe->delete_multi_spe_administration($selection);
            if ($delete == 1) {
                $this->notif_delete_sp();
            } else {
                $this->notif_gagal_delete_sp();
            }
        }

        redirect('spe/read_spe_administration');
    }

    
    public function asignspe() {
        if ($this->session->has_userdata('username')) {
            $id = $this->input->post('id');
            $nomor = $this->input->post('nomersp');
            $jabatan1 = $this->input->post('jabatan1');
            $nama1 = $this->input->post('namaasign1');
//            $jabatan2 = $this->input->post('jabatan2');
            $nama2 = $this->input->post('namaasign2');
            $update = $this->Model_spe->asignspe($id, $nomor,$jabatan1,$nama1,$nama2);
            if ($update == 1) {
                $this->notif_sucess_asignsp();
                redirect('spe/view_spe_monitoring');
            } else {
                $this->notif_gagal_asignsp();
                redirect('spe/view_spe_monitoring');
            }
//            var_dump($id);
        } else {
            redirect('/');
        }
    }
    
//    notif////////////////////////////////////////////////////////////////////////////////////////////////////////
    
     function notif_sucess_asignsp() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Berhasil, Simpan',
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
    
    function notif_gagal_asignsp() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Gagal!',
        type: 'error'
        })</script>"
        );
    }
    
    function notif_sucess() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Berhasil, Cetak Surat SP',
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
    function notif_sucess_update() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Berhasil, Update SP',
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

    function notif_sucess_kirim() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Berhasil, Kirim Surat SP',
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

    function notif_sucess_trima() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Berhasil',
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

    function notif_success_add_sp() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Berhasil Menambahkan SP',
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

    function notif_delete_sp() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Berhasil Delete SP',
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
        title: 'Gagal! Cetak Surat SP',
        type: 'error',
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
    function notif_gagal_update() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Gagal! Update SP',
        type: 'error',
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

    function notif_gagal_add_sp() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Gagal! Menambahkan SP',
        type: 'error',
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

    function notif_gagal_delete_sp() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Gagal Delete SP',
        type: 'error',
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

    function notif_gagal_kirim() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Gagal! Kirim Surat SP',
        type: 'error',
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

    function notif_gagal_trima() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Gagal!!!',
        type: 'error',
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

    function notif_double_add_sp() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Perhatian, Data Yang Anda Input Sudah Ada !!!',
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

    function notif_null_sp() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Perhatian, Data Yang Anda Input Sudah Ada !!!',
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
    function notif_null_sp_delete() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Perhatian, Tidak Ada Data Yang di Pilih!!!',
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

}

//tessssss
