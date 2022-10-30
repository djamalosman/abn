<?php

//require('pdfcreate/fpdf.php');

Class Employee extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
        $this->load->helper('file');
        $this->load->helper(array('form', 'url'));
        $this->db = $this->load->database('default', true);
        $this->db2 = $this->load->database('second', true);

        /*  if ($_SERVER['SERVER_NAME'] == 'localhost') {
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
        $this->load->model('Modelsemployee', '', TRUE);
        $this->load->model('Model_log', '', TRUE);
        $this->load->helper(array('form', 'url'));
    }

    public function ajax_listemployee() {
        $list = $this->Modelsemployee->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            if ($field->f_type == '1') {
                $type = 'External';
            } else {
                $type = 'Internal';
            }
            $datenowemp = date('Y-m-d');
            //$birthdate = "00-00-0000";
            //  $joindate = "00-00-0000";
            // $termintate_date = "00-00-0000";
            //} else {
            //if ($field->birth_date == '' || $field->termintate_date === '' || $field->join_date == '') {

            $birthdate = date("d-m-Y", strtotime($field->birth_date));
            $joindate = date("d-m-Y", strtotime($field->join_date));
            if (strlen($field->termintate_date) == 0) {
                $termintate_date = "00-00-0000";
            } else {
                $termintate_date = date("d-m-Y", strtotime($field->termintate_date));
                $termintate_date1 = date("Y-m-d", strtotime($field->termintate_date));
            }
            //}
            if ($termintate_date == '') {
                if ($field->f_status == 2) {
                    $label = "<span class='badge badge-warning mr10 mb10' style='background-color: red;'>Delete</span>";
                } else {
                    $label = "<span class='badge badge-warning mr10 mb10' style='background-color: greenyellow;'>Active</span>";
                }
                //$label = "<span class='badge badge-warning mr10 mb10' style='background-color: greenyellow;'>Active</span>";
            } elseif ($field->termintate_date != '' && $termintate_date1 <= $datenowemp) {
                if ($field->f_status == 2) {
                    $label = "<span class='badge badge-warning mr10 mb10' style='background-color: red;'>Delete</span>";
                } else {
                    $label = "<span class='badge badge-warning mr10 mb10' style='background-color: yellow;'>Resign</span>";
                }
            } elseif ($field->termintate_date == '') {
                if ($field->f_status == 2) {
                    $label = "<span class='badge badge-danger mr10 mb10' style='background-color: red;'>Delete</span>";
                } else {
                    $label = "<span class='badge badge-warning mr10 mb10' style='background-color: greenyellow;'>Active</span>";
                }
            } elseif ($termintate_date1 >= $datenowemp) {
                if ($field->f_status == 2) {
                    $label = "<span class='badge badge-warning mr10 mb10' style='background-color: red;'>Delete</span>";
                } else {
                    $label = "<span class='badge badge-warning mr10 mb10' style='background-color: greenyellow;'>Active</span>";
                }
            } else {
                if ($field->f_status == 2) {
                    $label = "<span class='badge badge-warning mr10 mb10' style='background-color: red;'>Delete</span>";
                } else {
                    $label = "<span class='badge badge-warning mr10 mb10' style='background-color: greenyellow;'>Active</span>";
                }
                //$label = "<span class='badge badge-warning mr10 mb10' style='background-color: greenyellow;'>Active</span>";
            }

            if ($field->f_type == 0 || $field->f_status == 2) {
                $style = 'style = "display:none"';
            } else {
                $style = '';
            }
            if ($field->f_type == 0 || $field->f_status == 2) {
                $style1 = 'style = "display:none"';
            } else {
                $style1 = '';
            }


            // $row[] ='<input type="checkbox">';
            $row[] = '<center><input ' . $style . '  type="checkbox"  id="checkbox1' . $field->nik . '" value="' . $field->nik . '" name="idnya[]" ></center>';
            $row[] = '<center><a  ' . $style1 . ' href="javascript: formsubmit(' . "'" . $field->nik . "'" . ')" title="Edit Employee" ><i class="fa fa-pencil"></i></a></center>';
            $row[] = '<center>' . $label . '</center>';
            $row[] = '<center>' . $type . '</center>';
            $row[] = $field->nik;
            $row[] = $field->full_name;
            $row[] = $field->gender;
            $row[] = $field->no_ktp;
            $row[] = $field->no_tlp;
            $row[] = $field->position_desc;
            $row[] = $joindate;
            $row[] = $birthdate;
            $row[] = $field->email;
            $row[] = $field->company_desc;
            $row[] = $field->cost_center_desc;
            $row[] = $field->dept_desc;
            $row[] = $field->sub_directorate_desc;
            $row[] = $field->div_desc;
            $row[] = $field->emp_area_desc;
            $row[] = $field->emp_office_desc;
            $row[] = $field->emp_status_desc;
            $row[] = $field->landscape;
            $row[] = $field->org_unit_desc;
            $row[] = $termintate_date;//    $field->termintate_date;
            $row[] = $field->group_desc;
            $row[] = $field->group_grade_code;

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Modelsemployee->count_all(),
            "recordsFiltered" => $this->Modelsemployee->count_filtered(),
            "data" => $data,
        );
//output to json format
        echo json_encode($output);
    }

//// Page header
    public function index() {
        if ($this->session->has_userdata('username')) {
            $idmenu = 'H03';
            $idmenu2 = 'D007';
            $result1 = $this->Menu_model->updatestatus($idmenu, $idmenu2);
            if ($result1 == '1') {
                $this->Model_log->insertlogmenu($this->session->userdata('username'), "Main Menu : " . $idmenu . " Sub Menu : " . $idmenu2);

                $this->session->set_userdata('nik', '');
                $result['data'] = $this->Menu_model->loadMenu();
//$result['acsess'] = $this->Menu_model->loadlevelmenu($idmenu2, $this->session->userdata('level'));
//echo print_r($result);
                $result['pagename'] = 'Data Karyawan';
//                $result['karyawan'] = $this->Modelsemployee->get_um_datakaryawan()->result();
                $result['content'] = 'read_um_datakaryawan';
                $this->load->view('bss_home', $result); //$this->load->view('home', $result); 
            }
        } else {
            redirect('/');
        }
    }

    public function create_um_datakaryawan() {
        if (isset($_POST['Submit'])) {
            
        }
        if ($this->session->has_userdata('username')) {
            $result['data'] = $this->Menu_model->loadMenu();
            $result['cmp'] = $this->Modelsemployee->paramselectcompany()->result();
            $result['direct'] = $this->Modelsemployee->paramselectdirect()->result();
            $result['dept'] = $this->Modelsemployee->paramselectdept()->result();
            $result['div'] = $this->Modelsemployee->paramselectdiv()->result();
            $result['pst'] = $this->Modelsemployee->paramselectposition()->result();
            $result['grp'] = $this->Modelsemployee->paramselectgroup()->result();
            $result['area'] = $this->Modelsemployee->paramselectemparea()->result();
            $result['status'] = $this->Modelsemployee->paramselectempstatus()->result();
            $result['office'] = $this->Modelsemployee->paramselectempoffice()->result();
            $result['cc'] = $this->Modelsemployee->paramselectcostcenter()->result();
            $result['orgunit'] = $this->Modelsemployee->paramselectorgunit()->result();
            $result['spv'] = $this->Modelsemployee->paramselectspv()->result();
//            $result['data'] = $this->Menu_model->paramcompany();
            $result['pagename'] = 'Tambah Data Karyawan';
            $result['content'] = 'create_um_datakaryawan';
            $this->load->view('bss_home', $result);
//            $this->load->view('bss_home', $result); //$this->load->view('home', $result);
        } else {
            redirect('/');
        }
    }

    public function editemployee() {
        if ($this->session->has_userdata('username')) {
            $nik = $this->input->post('nik');
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
            $result['cmp'] = $this->Modelsemployee->paramselectcompany()->result();
            $result['direct'] = $this->Modelsemployee->paramselectdirect()->result();
            $result['dept'] = $this->Modelsemployee->paramselectdept()->result();
            $result['div'] = $this->Modelsemployee->paramselectdiv()->result();
            $result['pst'] = $this->Modelsemployee->paramselectposition()->result();
            $result['grp'] = $this->Modelsemployee->paramselectgroup()->result();
            $result['area'] = $this->Modelsemployee->paramselectemparea()->result();
            $result['status'] = $this->Modelsemployee->paramselectempstatus()->result();
            $result['office'] = $this->Modelsemployee->paramselectempoffice()->result();
            $result['cc'] = $this->Modelsemployee->paramselectcostcenter()->result();
            $result['orgunit'] = $this->Modelsemployee->paramselectorgunit()->result();
            $result['spv'] = $this->Modelsemployee->paramselectspv()->result();
            $result['employee'] = $this->Modelsemployee->employee($nik);
//            $result['data'] = $this->Menu_model->paramcompany();
            $result['pagename'] = 'Tambah Data Karyawan';
            $result['content'] = 'update_employee';
//            echo var_dump($result['employee']);
            $this->load->view('bss_home', $result);
//            $this->load->view('bss_home', $result); //$this->load->view('home', $result);
        } else {
            redirect('/');
        }
    }

    public function create_um_datakaryawan_process() {
        $cmp = explode("|", $this->input->post('selectcompany'), 2);
        $cc = explode("|", $this->input->post('selectcostcenter'), 2);
        $dept = explode("|", $this->input->post('selectdept'), 2);
        $dirct = explode("|", $this->input->post('selectdirectorate'), 2);
        $div = explode("|", $this->input->post('selectcompany'), 2);
        $area = explode("|", $this->input->post('slelctarea'), 2);
        //$office = explode("|", $this->input->post('selectoffice'), 2);
        $status = explode("|", $this->input->post('selectstatus'), 2);
        $group = explode("|", $this->input->post('selectgroup'), 2);
        $unit = explode("|", $this->input->post('selectgroup'), 2);
        $pst = explode("|", $this->input->post('selectposition'), 2);
        $spv = explode("|", $this->input->post('selectspv'), 2);

        $data = array(
            'nik' => $this->input->post('nik'),
            'birth_date' => $this->input->post('multiple-datepicker'),
            'company_desc' => $cmp[1],
            'company_id' => $cmp[0],
            'cost_center' => $cc[0],
            'cost_center_desc' => $cc[1],
            'dept_desc' => $dept[1],
            'dept_id' => $dept[0],
            'directorate' => $dirct[0],
            'directorate_desc' => $dirct[0],
            'div_desc' => $div[1],
            'email' => $this->input->post('email'),
            'emp_area' => $area[0],
            'emp_area_desc' => $area[1],
            'emp_office' => $cmp[0],
            'emp_office_desc' => $cmp[1],
            'emp_status_code' => $status[0],
            'emp_status_desc' => $status[1],
            'full_name' => $this->input->post('nama'),
            'gender' => $this->input->post('gender'),
            'group_desc' => $group[1],
            'group_id' => $group[0],
            'join_date' => $this->input->post('joindate'),
            'landscape' => $this->input->post('landscape'),
            'no_ktp' => $this->input->post('ktp'),
            'no_tlp' => $this->input->post('notlp'),
            'org_unit_desc' => $unit[1],
            'org_unit_id' => $unit[0],
            'position_desc' => $pst[1],
            'position_id' => $pst[0],
            'termintate_date' => $this->input->post('termintate'),
            'div_id' => $div[0],
            'group_grade_code' => $this->input->post('groupgrade'),
            'f_status' => 0,
            'f_type' => 1
        );

        
//var_dump($data);
        $nik = $this->input->post('nik');
        $insert = $this->Modelsemployee->create_datakaryawan_process($data, $nik);
//        $this->Model_log->logactivity('Insert Employee : '.$nik, $this->session->userdata('username'));

        if ($insert == 1) {
            $this->Model_log->logactivity($this->session->userdata('username'), "Sucess Insert : " . json_encode($data));
            $this->notif_sucess();
            redirect('employee/index');
        } elseif ($insert == 0) {
            $this->Model_log->logactivity($this->session->userdata('username'), "Gagal Insert : " . json_encode($data));
            $this->notif_gagal();
            redirect('employee/create_um_datakaryawan');
        } elseif ($insert == 2) {
            $this->Model_log->logactivity($this->session->userdata('username'), "Nik Double (Gagal): " . json_encode($data));
            $this->notif_double();
            redirect('employee/create_um_datakaryawan');
        }
    }

    public function update_um_datakaryawan_process() {
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


        $data = array(
//            'nik' => $this->input->post('nik'),
            'birth_date' => $this->input->post('multiple-datepicker'),
            'company_desc' => $cmp[1],
            'company_id' => $cmp[0],
            'cost_center' => $cc[0],
            'cost_center_desc' => $cc[1],
            'dept_desc' => $dept[1],
            'dept_id' => $dept[0],
            'directorate' => $dirct[0],
            'directorate_desc' => $dirct[0],
            'div_desc' => $div[1],
            'email' => $this->input->post('email'),
            'emp_area' => $area[0],
            'emp_area_desc' => $area[1],
            'emp_office' => $office[0],
            'emp_office_desc' => $office[1],
            'emp_status_code' => $status[0],
            'emp_status_desc' => $status[1],
            'full_name' => $this->input->post('nama'),
            'gender' => $this->input->post('gender'),
            'group_desc' => $group[1],
            'group_id' => $group[0],
            'join_date' => $this->input->post('joindate'),
            'landscape' => $this->input->post('landscape'),
            'no_ktp' => $this->input->post('ktp'),
            'no_tlp' => $this->input->post('notlp'),
            'org_unit_desc' => $unit[1],
            'org_unit_id' => $unit[0],
            'position_desc' => $pst[1],
            'position_id' => $pst[0],
            'termintate_date' => $this->input->post('termintate'),
            'div_id' => $div[0],
            'group_grade_code' => $this->input->post('groupgrade'),
            'f_status' => 0,
            'f_type' => 1
        );

//var_dump($data);
        $nik = $this->input->post('nik');
        $update = $this->Modelsemployee->update_datakaryawan_process($data, $nik);

        if ($update == 1) {
            $this->Model_log->logactivity($this->session->userdata('username'), "Sucess Update : " . json_encode($data));
            $this->notif_sucess_update();
            redirect('employee/index');
        } elseif ($update == 0) {
            $this->Model_log->logactivity($this->session->userdata('username'), "Gagal Update : " . json_encode($data));
            $this->notif_gagal_update();
            redirect('employee/editemployee/' . $nik);
        }
    }

    public function delete_multi_um_datakaryawan() {
        $selection = $this->input->post('idnya');
        if ($selection == '') {
            $this->notif_null();
            redirect('employee/index');
        } else {
            $delete = $this->Modelsemployee->delete_multi_um_datakaryawan($selection);
            if ($delete == 1) {
                $this->notif_sucess();
                $this->Model_log->logactivity($this->session->userdata('username'), "Sucess Delete : " . json_encode($selection));
            } else {
                $this->Model_log->logactivity($this->session->userdata('username'), "Gagal Delete : " . json_encode($selection));
                $this->notif_gagal_delete();
            }
            redirect('employee/index');
        }
    }

//    notif

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

    function notif_sucess_update() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Berhasil!, Update Data Employee',
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

    public function sucess_notif() {
        $this->session->set_flashdata(
                "message", "<script>swal(
            'Berhasil!',
            'Data Berhasil Di Input',
            'success'
            )</script>"
        );
    }

    function notif_gagal() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Gagal! ',
        text: 'Gagal Menginput Employee!!!',
        type: 'error'
    })</script>"
        );
    }

    function notif_gagal_delete() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Gagal! ',
        text: 'Gagal !!!',
        type: 'error'
    })</script>"
        );
    }

    function notif_gagal_update() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Gagal!, Update Data Employee ',
        type: 'error'
    })</script>"
        );
    }

    function notif_double() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Perhatian!, NIK Yang Anda Input Sudah Terdaftar Di Data Employee ',
        type: 'warning'
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
