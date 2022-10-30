<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Modelusermobile extends CI_Model {

    public function get_um_agent($nik, $level) {
        $select1 = "SELECT * FROM t_dep_head WHERE f_nik = '" . $nik . "'";
        if ($this->db2->query($select1)->num_rows() > 0) {
            $select2 = "SELECT a.* FROM t_agent as a JOIN bss_employee as b ON b.nik = a.f_agentid WHERE b.company_id IN (SELECT c.f_kode_cabang from t_detail_cabang_dephead as c WHERE c.f_nik = '" . $nik . "' ) ";
            $data = $this->db2->query($select2)->result();
        } else {
            $data = $this->db2->get('t_agent')->result();
        }
        return $data;
    }

    public function get_um_datakaryawan1() {
        $query1 = "SELECT a.nik AS f_nik,a.`full_name` as f_full_name, a.birth_date as f_birth_date, a.`company_desc` as f_company_desc, a.`gender` as f_gender,a.`no_ktp` as f_no_ktp, a.`no_tlp` as f_no_tlp, a.`position_desc` as f_position_desc, a.`join_date` as f_join_date, a.`email` as f_email, a.`cost_center_desc` as f_cost_center ,a.`dept_desc` as f_dept_desc, a.`directorate_desc`as f_directorate_desc, a.`div_desc` as f_div_desc, a.`emp_area_desc` as f_emp_area_desc, a.`emp_office_desc` as f_emp_office_desc, a.`emp_status_desc` as f_emp_status_desc, a.`landscape` as f_landscape,a.`org_unit_desc` as f_org_unit_desc, a.`status_date` as f_status_date, a.`termintate_date` as f_termintate_date, a.`group_desc` as f_group_desc , a.`group_grade_code` as f_group_grade_code, a.`spv_name` as f_spv_name FROM xplmjdmx_anagata_dbbsscollection.`bss_employee` as a  WHERE a.`nik` NOT IN (SELECT b.f_agentid FROM xplmjdmx_anagata_dbbsscollection.t_agent as b)";
//        $this->db2->where('f_status', 1);
//        $data = $this->db2->get('t_employee_bss');
        $data = $this->db2->query($query1);
        return $data;
    }

    public function create_agent_collector($selection) {
        if (!empty($selection)) {
//            $status = '0';
            foreach ($selection as $value) {
                $select = "select * from bss_employee where nik = '" . $value . "'";
                $data = $this->db2->query($select)->row();
                if ($this->db2->query($select)->num_rows() > 0) {
                    $data = $this->db2->query($select)->row();
                    $options = [
                        'cost' => 15
                    ];
                    $password = password_hash($data->nik, PASSWORD_BCRYPT, $options);
                    $input = array(
                        'f_agencyid' => $password,
                        'f_agentid' => $data->nik,
                        'f_code_image' => '',
                        'f_type_image' => '',
                        'f_agentname' => $data->full_name,
                        'f_branch_id' => $data->company_id,
                        'f_email' => $data->email,
                        'f_username' => $data->nik,
                        'f_userpswd' => $password,
                        'f_nohp' => $data->no_tlp,
                        'f_dept_head' => '',
                        'f_imeihp' => '',
                        'f_snhp' => '',
                        'f_max_rec' => '',
                        'f_linkid' => '',
                        'f_tipeproduct' => '',
                        'f_usercreate' => $this->session->has_userdata('username'),
                        'f_datecreate' => date('Y-m-d H:i:s'),
                        'f_userupdate' => '',
                        'f_dateupdate' => '',
                        'f_active' => '0',
                        'f_status_activity' => '1',
                        'f_aprove' => '0',
                        'f_status' => '0',
                        'f_count_gagal' => '0',
                        'f_time_to_login' => '',
                        'f_emailuserdep' => '',
                        'f_file' => '',
                        'f_jabatan' => $data->position_id,
                        'f_kode_post' => ''
                    );

                    $input1 = $this->db2->insert('t_agent', $input);
                    if ($input1 === TRUE) {
                        $hasil = 1;
                    } else {
                        $hasil = 0;
                    }
                } else {
                    $hasil = 2;
                }
            }
        } else {
            $hasil = 3;
        }
        return $hasil;
    }

    public function update_um_agent_process($id_agen, $f_nohp, $email, $active) {
        $data = array(
            'f_agentid' => $id_agen,
            'f_nohp' => $f_nohp,
            'f_email' => $email,
            'f_active' => $active
        );
        //var_dump($data);
        $insertupdate = $this->db2->insert('t_agent_update', $data);
        if ($insertupdate == TRUE) {
            $data1 = array(
                'f_aprove' => '0',
                'f_status_activity' => '2'
            );
            $this->db2->where('f_agentid', $id_agen);
            $this->db2->update('t_agent', $data1);
        }
    }

    public function delete_multi_um_agent($selection) {
        foreach ($selection as $item) {
            $data = array(
                'f_status_activity' => '3',
                'f_aprove' => '0'
            );
            $this->db2->where('f_agentid', $item);
            $hasil1 = $this->db2->update('t_agent', $data);
            if ($hasil1 == true) {
                $hasil = 1;
            } else {
                $hasil = 0;
            }
        }
        return $hasil;
    }

    public function get_collector_aprove() {
        $query = "select a.* from t_agent as a where a.f_agentid in (select nik from bss_employee as b where b.nik = a.f_agentid and b.f_status = '1' ) and a.f_aprove = '0' ";
        $data = $this->db2->query($query);
        return $data->result();
    }

    public function updatestatus_approve($a) {

        $updatedata = array(
            'f_active' => '1',
            'f_aprove' => '1'
        );
        foreach ($a as $item) {
            $select = "select * from t_agent where f_agentid = '" . $item . "'";
            $data = $this->db2->query($select)->row();
            if ($data->f_status_activity == '1') {
                $this->db2->where('f_agentid', $item);
                $aprove = $this->db2->update('t_agent', $updatedata);
                if ($aprove == TRUE) {
                    $hasil = 1;
                } else {
                    $hasil = 0;
                }
            } elseif ($data->f_status_activity == '2') {
                $selectupdate = "select * from t_agent_update where f_agentid = '" . $item . "'";
                $data1 = $this->db2->query($selectupdate)->row();
                $updatedata1 = array(
                    'f_email' => $data1->f_email,
                    'f_nohp' => $data1->f_nohp,
                    'f_active' => $data1->f_active,
                    'f_aprove' => '1'
                );
                $this->db2->where('f_agentid', $data1->f_agentid);
                $update2 = $this->db2->update('t_agent', $updatedata1);
                if ($update2 == TRUE) {
                    $this->db2->where('f_agentid', $data1->f_agentid);
                    $update3 = $this->db2->delete('t_agent_update');
                    if ($update3 == TRUE) {
                        if ($data1->f_active == '0') {
                            $this->db2->where('f_agent', $data1->f_agentid);
                            $update4 = $this->db2->delete('t_assignment');
                            if ($update4 == true) {
                                $hasil = 1;
                            } else {
                                $hasil = 0;
                            }
                        } else {
                            $hasil = 1;
                        }
                    } else {
                        $hasil = 0;
                    }
                } else {
                    $hasil = 0;
                }
            } elseif ($data->f_status_activity == '3') {
                $delete2 = array(
                    'f_active' => '2',
                    'f_aprove' => '1'
                );
                $this->db2->where('f_agentid', $item);
                $delete1 = $this->db2->update('t_agent', $delete2);
                if ($delete1 == TRUE) {
                    $this->db2->where('f_agent', $item);
                    $delete3 = $this->db2->delete('t_assignment');
                    if ($delete3 == TRUE) {
                        $hasil = 1;
                    } else {
                        $hasil = 0;
                    }
                }
            }
        }
        return $hasil;
    }

    public function updatestatus_reject($selection) {
        $updatedata = array(
            'f_active' => '2'
        );
        foreach ($selection as $item) {
            $this->db2->where('f_agentid', $item);
            $this->db2->update('t_agent', $updatedata);
        }
    }

    public function get_um_agent_one($id) {
        $this->db2->where('f_agentid', $id);
        $data = $this->db2->get('t_agent');
        return $data->row();
    }

    public function get_detaildebitur($agentid) {
        $select = "SELECT (SELECT d.COMPANY_NAME FROM bss_company as d WHERE d.ID = a.KodeCabang) as cabang ,f.f_agentname,e.f_date_cerate,c.HOME_STREET,c.HOME_RT,c.HOME_RW,c.HOME_KELURAHAN,c.HOME_KECAMATAN,c.HM_TOWN_COUNTRY,c.SMS_1,c.EMAIL_1,a.KodeCabang,a.NomorNasabah,a.NamaDebitur,a.cust_dpd,MAX(a.JmlHariTunggakan) as JmlHariTunggakan,a.COL,a.BakiDebet  FROM bss_cad as a JOIN bss_customer as c ON c.ID = a.NomorNasabah JOIN t_assignment as e ON e.f_cif = a.NomorNasabah JOIN t_agent as f ON f.f_agentid = e.f_agent WHERE a.NomorNasabah IN (SELECT b.f_cif FROM t_assignment as b WHERE b.f_agent = '" . $agentid . "') GROUP BY a.NomorNasabah ";

        //$query = "SELECT *,agent.f_agentname,agent.f_agentid from t_accountlist_baru as accbaru JOIN t_agent as agent on accbaru.f_assign_id=agent.f_agentid where agent.f_agentid='$agentid'";
        //$data=$this->db2->query($query)->result();
        $data = $this->db2->query($select);
        return $data->result();
    }

}
