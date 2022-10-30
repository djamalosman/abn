<?php

//require('pdfcreate/fpdf.php');

Class Usermobile extends CI_Controller {

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
        $this->load->model('Model_log', '', TRUE);
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
                $this->Model_log->insertlogmenu($this->session->userdata('username'), "Main Menu : " . $idmenu . " Sub Menu : " . $idmenu2);
                $this->session->set_userdata('nik', '');
//                $reqflag = $this->session->userdata('reqflag');
                $result['data'] = $this->Menu_model->loadMenu();
                $result['pagename'] = 'Agent';
                //$result['acsess'] = $this->Menu_model->loadlevelmenu($idmenu2, $this->session->userdata('level'));
                $result['allowedit'] = $this->session->userdata('allowedit');
                $result['agent'] = $this->Modelusermobile->get_um_agent($this->session->userdata('username'), $this->session->userdata('level'));
                $result['content'] = 'view_agent';
                $this->load->view('bss_home', $result);
                //echo $this->session->userdata('username');
            }
        } else {
            redirect('/');
        }
    }

    public function excel_usermobile() {
        
    }

    public function ajax_listemployee() {
        $list = $this->Modelusermobile->get_datatables($this->session->userdata('username'), $this->session->userdata('level'));
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
            $datenowemp = date('d-m-Y');
            if ($field->birth_date != '' || $field->join_date != '' || $field->join_date != '') {
                $birthdate = date("d-m-Y", strtotime($field->birth_date));
                $joindate = date("d-m-Y", strtotime($field->join_date));
                $termintate_date = date("d-m-Y", strtotime($field->termintate_date));
            } else {
                $birthdate = '00-00-0000';
                $joindate = '00-00-0000';
                $termintate_date = '00-00-0000';
            }
            if ($termintate_date <= $datenowemp) {
                $label = "<span class='badge badge-warning mr10 mb10' style='background-color: yellow;'>Resign</span>";
            } elseif ($field->termintate_date == '') {
                if ($field->f_status == 2) {
                    $label = "<ul class = 'fa-ul'>
                                                <li>Delete</i></li>
                                                </ul>";
                } else {
                    $label = "<ul class='fa-ul'>
                                                    <li>Active</i></li>
                                                    </ul>";
                }
            } elseif ($termintate_date >= $datenowemp) {
                if ($field->f_status == 2) {
                    $label = "<span class='badge badge-warning mr10 mb10' style='background-color: red;'>Delete</span>";
                } else {

                    $label = "<span class='badge badge-warning mr10 mb10' style='background-color: greenyellow;'>Active</span>";
                }
            } else {
                $label = "<ul class = 'fa-ul'>
                                                <li>Active</i></li>
                                                </ul>";
            }

            if ($field->f_type == 0) {
                $style = 'style = "display:none"';
            } else {
                $style = '';
            }
            if ($field->f_type == 0) {
                $style1 = 'style = "display:none"';
            } else {
                $style1 = '';
            }

            // $row[] ='<input type="checkbox">';
            $row[] = '<center><input ' . $type . '  type="checkbox"  id="checkbox1' . $field->nik . '" value="' . $field->nik . '" name="idnya[]" ></center>';
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
            $row[] = $termintate_date;
            $row[] = $field->group_desc;
            $row[] = $field->group_grade_code;

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Modelusermobile->count_all(),
            "recordsFiltered" => $this->Modelusermobile->count_filtered(),
            "data" => $data,
        );
//output to json format
        echo json_encode($output);
    }

    public function create_collector() {
        if ($this->session->has_userdata('username')) {
            $result['data'] = $this->Menu_model->loadMenu();
            $result['pagename'] = 'Tambah Data Collector';
            $result['content'] = 'create_collector';
            //$result['inputkaryawan'] = $this->Modelusermobile->get_um_datakaryawan1()->result();
            $this->load->view('bss_home', $result);
            // $this->sucess_notif_create_collector();
            //redirect('content/create_collector');
        } else {
            redirect('/');
        }
    }

    public function getemployee() {
        $nik = $this->session->userdata('username');
        $result = $this->Modelusermobile->get_um_datakaryawan1($nik)->result();
        echo json_encode($result);
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
                        $this->Model_log->logactivity($this->session->userdata('username'), "Sucess Insert UserMobile : " . json_encode($selection));
                        $this->sucess_notif_create_collector();
                        redirect('usermobile/index');
                    } elseif ($tes == 0) {
                        $this->Model_log->logactivity($this->session->userdata('username'), "Gagal Insert UserMobile : " . json_encode($selection));
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
                $result['cmp'] = $this->Modelsemployee->paramselectcompany()->result();
                $result['sts'] = $this->Modelusermobile->getstatus();
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
        $cmp = $this->input->post('selectcompany');
        $active = $this->input->post('f_active');
        $data = array(
            'Nik :' . $id_agen,
            'No_hp :' . $f_nohp,
            'Email :' . $email,
            'Cabang :' . $cmp,
            'Status :' . $active
        );

        //var_dump($id_agen,$f_nohp,$email,$active);
        $update = $this->Modelusermobile->update_um_agent_process($id_agen, $f_nohp, $email, $active, $cmp);

        if ($update == 1) {
            $this->Model_log->logactivity($this->session->userdata('username'), "Sucess Update : " . json_encode($data));
        } else {
            $this->Model_log->logactivity($this->session->userdata('username'), "Gagal Update : " . json_encode($data));
        }

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
        if (isset($_POST['Submit'])) {
            $id = $this->input->post('id');
            $ket = $this->input->post('ket');
            $hasil = $this->Modelusermobile->updatestatus_reject($id, $ket);
            if ($hasil == 1) {
                $this->notif_sucess();
            } else {
                $this->notif_gagal_reject();
            }
        }
        redirect('usermobile/approved_collector');
    }

    public function updateonline() {
        if ($this->session->has_userdata('username')) {
            $selection = $this->input->post('idagent');
            if ($selection == null) {
                $this->cancelreset();
                redirect('usermobile/index');
            } elseif ($selection != null) {
                $action = $this->Modelusermobile->updatestatus($selection);
                if ($action == '1') {
                    $this->notif_sucess();
                } else {
                    $this->notif_gagal_aprove();
                }


                redirect('usermobile/index');
            }
        }
    }

    //////////////////////////////////////////////////////////////////////////////////////////////
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
        type: 'error'
        })</script>"
        );
    }

    function notif_gagal_reject() {
        $this->session->set_flashdata("message", "<script>swal({
        position: 'top',
        title: 'Gagal! ',
        text: 'Gagal !!!',
        type: 'error'
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
