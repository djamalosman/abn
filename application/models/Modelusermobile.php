<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Modelusermobile extends CI_Model {

    var $table = 'bss_employee'; //nama tabel dari database
    var $column_order = array(
        'landscape',
        'nik',
        'full_name',
        'company_desc',
        'cost_center_desc',
        'position_desc',
        'org_unit_desc',
        'section_desc',
        'dept_desc',
        'group_desc',
        'div_desc',
        'directorate_desc',
        'group_grade_code',
        'emp_area_desc',
        'emp_office_desc',
        'join_date',
        'birth_date',
        'email',
        'no_tlp',
        'no_ktp',
        'gender',
        'termintate_date',
        'emp_status_desc',
        'f_status',
        'f_type');
    var $column_search = array(
        'landscape',
        'nik',
        'full_name',
        'company_desc',
        'cost_center_desc',
        'position_desc',
        'org_unit_desc',
        'section_desc',
        'dept_desc',
        'group_desc',
        'div_desc',
        'directorate_desc',
        'group_grade_code',
        'emp_area_desc',
        'emp_office_desc',
        'join_date',
        'birth_date',
        'email',
        'no_tlp',
        'no_ktp',
        'gender',
        'termintate_date',
        'emp_status_desc',
        'f_status',
        'f_type');
    var $order = array('f_id' => 'desc');

    private function _get_datatables_query($nik, $level) {

//        $this->db2->select('landscape,
//                nik ,
//                full_name,
//                company_desc,
//                cost_center_desc,
//                position_desc,
//                org_unit_desc,
//                section_desc,
//                dept_desc,
//                group_desc,
//                div_desc,
//                directorate_desc,
//                group_grade_code,
//                emp_area_desc,
//                emp_office_desc,
//                join_date,
//                birth_date,
//                email,
//                no_tlp,
//                no_ktp,
//                gender,
//                termintate_date,
//                emp_status_desc,
//                f_status,
//                f_type');


        $this->db2->select('f_kode_cabang');
        $this->db2->from('t_detail_cabang_dephead');
        $this->db2->where('f_nik', $nik);
        $subQuery = $this->db2->get_compile_select();

        $this->db->_reset_select();



        $this->db2->where_in($subQuery);
        $this->db2->where('f_active', '1');
        $this->db2->from($this->table);

        $i = 0;

        foreach ($this->column_search as $item) { // loop column 
            if ($_POST['search']['value']) { // if datatable send POST for search
                if ($i === 0) { // first loop
                    $this->db2->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db2->like($item, $_POST['search']['value']);
                } else {
                    $this->db2->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db2->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) { // here order processing
            $this->db2->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db2->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_um_agent($nik, $level) {
        $select1 = "SELECT * FROM t_dep_head WHERE f_nik = '" . $nik . "'";
        $datadepthead = $this->db2->query($select1)->row();
        if ($this->db2->query($select1)->num_rows() > 0) {
            $select = "select 
			(select y.full_name 
			from bss_employee AS y 
			where y.nik in 
			(select z.f_nik 
			from t_dep_head AS z 
			where z.f_nik IN 
			(SELECT g.f_nik 
			FROM t_detail_cabang_dephead as g 
			WHERE g.f_kode_cabang = a.f_branch_id ) 
			AND z.f_jabatan = '" . $datadepthead->f_jabatan . "')) 
			AS depthead,
			(select b.COMPANY_NAME from bss_company AS b where b.ID = a.f_branch_id) AS cabang, 
			a.*, 
			a.f_active AS f_active1 
			from t_agent AS a 
			where a.f_branch_id in 
			(select r.f_kode_cabang 
			from t_detail_cabang_dephead AS r 
			where r.f_nik = '" . $nik . "')";
            //$select2 = "SELECT  a.* FROM t_agent as a JOIN bss_employee as b ON b.nik = a.f_agentid WHERE b.company_id IN (SELECT c.f_kode_cabang from t_detail_cabang_dephead as c WHERE c.f_nik = '" . $nik . "' ) ";
            $data = $this->db2->query($select)->result();
        } else {

            $select = "select (select y.full_name from bss_employee AS y where y.nik in (select z.f_nik from t_dep_head AS z where z.f_nik IN (SELECT g.f_nik FROM t_detail_cabang_dephead as g WHERE g.f_kode_cabang = a.f_branch_id ))  limit 1) AS depthead,(select b.COMPANY_NAME from bss_company as b where b.ID = a.f_branch_id) as cabang, a.*,a.f_active AS f_active1 from t_agent as a where a.f_agentid in (select nik from bss_employee as b where b.nik = a.f_agentid and b.f_status = '0' )";
            $data = $this->db2->query($select)->result();
        }
        return $data;
    }

    function get_datatables($nik, $level) {
        $select1 = "SELECT * FROM t_dep_head WHERE f_nik = '" . $nik . "'";
        if ($this->db2->query($select1)->num_rows() > 0) {
            $this->_get_datatables_query($nik, $level);
            if ($_POST['length'] != -1)
                $this->db2->where('');
            $this->db2->limit($_POST['length'], $_POST['start']);
            $query = $this->db2->get();
        }

        return $query->result();
    }

    function count_filtered() {
        $this->_get_datatables_query();
        $query = $this->db2->get();
        return $query->num_rows();
    }

    public function count_all() {
        $this->db2->from($this->table);
        return $this->db2->count_all_results();
    }

    public function get_um_datakaryawan1($nik) {
        $selectdepthead = "select * from t_dep_head where f_nik = '" . $nik . "'";
        if ($this->db2->query($selectdepthead)->num_rows() > 0) {
            $selectemployee = "select a.nik AS f_nik,a.`full_name` as f_full_name, a.birth_date as f_birth_date, a.`company_desc` as f_company_desc, a.`gender` as f_gender,a.`no_ktp` as f_no_ktp, a.`no_tlp` as f_no_tlp, a.`position_desc` as f_position_desc, a.`join_date` as f_join_date, a.`email` as f_email, a.`cost_center_desc` as f_cost_center ,a.`dept_desc` as f_dept_desc, a.`directorate_desc`as f_directorate_desc, a.`div_desc` as f_div_desc, a.`emp_area_desc` as f_emp_area_desc, a.`emp_office_desc` as f_emp_office_desc, a.`emp_status_desc` as f_emp_status_desc, a.`landscape` as f_landscape,a.`org_unit_desc` as f_org_unit_desc, a.`termintate_date` as f_termintate_date, a.`group_desc` as f_group_desc , a.`group_grade_code` as f_group_grade_code from bss_employee as a where nik not in (select b.f_agentid from t_agent as b where b.f_active = '1')  and a.f_status = '0' and a.emp_office in (select c.f_kode_cabang from t_detail_cabang_dephead as c where c.f_nik = '" . $nik . "')";
        } else {
            $selectemployee = "SELECT a.nik AS f_nik,a.`full_name` as f_full_name, a.birth_date as f_birth_date, a.`company_desc` as f_company_desc, a.`gender` as f_gender,a.`no_ktp` as f_no_ktp, a.`no_tlp` as f_no_tlp, a.`position_desc` as f_position_desc, a.`join_date` as f_join_date, a.`email` as f_email, a.`cost_center_desc` as f_cost_center ,a.`dept_desc` as f_dept_desc, a.`directorate_desc`as f_directorate_desc, a.`div_desc` as f_div_desc, a.`emp_area_desc` as f_emp_area_desc, a.`emp_office_desc` as f_emp_office_desc, a.`emp_status_desc` as f_emp_status_desc, a.`landscape` as f_landscape,a.`org_unit_desc` as f_org_unit_desc, a.`termintate_date` as f_termintate_date, a.`group_desc` as f_group_desc , a.`group_grade_code` as f_group_grade_code FROM `bss_employee` as a  WHERE a.`nik` NOT IN (SELECT b.f_agentid FROM t_agent as b where b.f_active = '1' )and f_status = '0'";
        }
        //        $this->db2->where('f_status', 1);
//        $data = $this->db2->get('t_employee_bss');
        $data = $this->db2->query($selectemployee);
        return $data;
    }

    public function create_agent_collector($selection) {
        if (!empty($selection)) {
//            $status = '0';
            foreach ($selection as $value) {
                $selectagent = "select * from t_agent where f_agentid = '" . $value . "'";
                if ($this->db2->query($selectagent)->num_rows() > 0) {
                    $select = "select * from bss_employee where nik = '" . $value . "' and f_status = '0'";
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
                            'f_branch_id' => $data->emp_office,
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
                            'f_usercreate' => $this->session->userdata('username'),
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

                        $this->db2->where('f_agentid', $value);
                        $input1 = $this->db2->update('t_agent', $input);
                        if ($input1 === TRUE) {
                            $hasil = 1;
                        } else {
                            $hasil = 0;
                        }
                    } else {
                        $hasil = 2;
                    }
                } else {
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
                            'f_branch_id' => $data->emp_office,
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
                            'f_usercreate' => $this->session->userdata('username'),
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
            }
        } else {
            $hasil = 3;
        }
        return $hasil;
    }

    public function update_um_agent_process($id_agen, $f_nohp, $email, $active, $cmp) {
        $data = array(
            'f_agentid' => $id_agen,
            'f_nohp' => $f_nohp,
            'f_email' => $email,
            'f_branch_id' => $cmp,
            'f_active' => $active
        );
//var_dump($data);
        $insertupdate = $this->db2->insert('t_agent_update', $data);
        if ($insertupdate === TRUE) {
            $data1 = array(
                'f_aprove' => '0',
                'f_status_activity' => '2'
            );
            $this->db2->where('f_agentid', $id_agen);
            $update = $this->db2->update('t_agent', $data1);
            if ($update == TRUE) {
                return 1;
            } else {
                return 0;
            }
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
        $query = "select a.* from t_agent as a where a.f_agentid in (select nik from bss_employee as b where b.nik = a.f_agentid and b.f_status = '0' ) and a.f_aprove = '0' ";
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
                if ($data1->f_active == '0') {
                    $updatedata1 = array(
                        'f_email' => $data1->f_email,
                        'f_nohp' => $data1->f_nohp,
                        'f_active' => $data1->f_active,
                        'f_status' => 0,
                        'f_branch_id' => $data1->f_branch_id,
                        'f_aprove' => '1',
                        'f_userupdate' => $this->session->userdata('username'),
                        'f_dateupdate' => date('Y-m-d H:i:s')
                    );
                } else {
                    $updatedata1 = array(
                        'f_email' => $data1->f_email,
                        'f_nohp' => $data1->f_nohp,
                        'f_active' => $data1->f_active,
                        'f_branch_id' => $data1->f_branch_id,
                        'f_aprove' => '1'
                    );
                }
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

    public function updatestatus_reject($id, $ket) {
        $updatedata = array(
            'f_aprove' => '2',
            'f_desc' => $ket
        );
        $updatedata1 = array(
            'f_aprove' => '2',
            'f_desc' => $ket
        );
        $updatedata2 = array(
            'f_aprove' => '2',
            'f_desc' => $ket
        );
        $selec1 = "select * from t_agent where f_agentid = '" . $id . "' ";
        $data1 = $this->db2->query($selec1)->row();
        if ($data1->f_status_activity == '1') {
            $this->db2->where('f_agentid', $id);
            $update0 = $this->db2->update('t_agent', $updatedata);
            if ($update0 == TRUE) {
                $hasil = 1;
            } else {
                $hasil = 0;
            }
        } elseif ($data1->f_status_activity == '2') {
            $this->db2->where('f_agentid', $id);
            $update1 = $this->db2->update('t_agent', $updatedata1);
            if ($update1 == TRUE) {
                $this->db2->where('f_agentid', $id);
                $delete1 = $this->db2->delete('t_agent_update');
                if ($update1 == TRUE) {
                    $hasil = 1;
                } else {
                    $hasil = 0;
                }
            }
        } elseif ($data1->f_status_activity == '3') {
            $this->db2->where('f_agentid', $id);
            $update2 = $this->db2->update('t_agent', $updatedata2);
            if ($update2) {
                $hasil = 1;
            } else {
                $hasil = 0;
            }
        }
        return $hasil;
    }

    public function get_um_agent_one($id) {
        $this->db2->where('f_agentid', $id);
        //$this->db2->where('', $id);
        $select = "select * from ";
        $data = $this->db2->get('t_agent');
        return $data->row();
    }

    public function get_detaildebitur($agentid) {
        $select = "SELECT (SELECT d.COMPANY_NAME FROM bss_company as d WHERE d.ID = a.KodeCabang) as cabang ,f.f_agentname,e.f_date_cerate,c.HOME_STREET,c.HOME_RT,c.HOME_RW,c.HOME_KELURAHAN,c.HOME_KECAMATAN,c.HM_TOWN_COUNTRY,c.SMS_1,c.EMAIL_1,a.KodeCabang,a.NomorNasabah,a.NamaDebitur,a.cust_dpd,MAX(a.JmlHariTunggakan) as JmlHariTunggakan,a.COL,a.BakiDebet  FROM bss_cad as a LEFT JOIN bss_customer as c ON c.ID = a.NomorNasabah LEFT JOIN t_assignment as e ON e.f_cif = a.NomorNasabah LEFT JOIN t_agent as f ON f.f_agentid = e.f_agent WHERE a.NomorNasabah IN (SELECT b.f_cif FROM t_assignment as b WHERE b.f_agent = '" . $agentid . "') GROUP BY a.NomorNasabah ";

//$query = "SELECT *,agent.f_agentname,agent.f_agentid from t_accountlist_baru as accbaru JOIN t_agent as agent on accbaru.f_assign_id=agent.f_agentid where agent.f_agentid='$agentid'";
//$data=$this->db2->query($query)->result();
        $data = $this->db2->query($select);
        return $data->result();
    }

    public function getstatus() {
        $select = "select * from t_parameter where f_type = 'STSM'";
        $data = $this->db2->query($select)->result();
        return $data;
    }

    public function updatestatus($id) {
        $data = array(
            'f_status' => '0'
        );
        $this->db2->where('f_agentid', $id);
        $update = $this->db2->update('t_agent', $data);
        if ($update == true) {
            $hasil = 1;
        } else {
            $hasil = 0;
        }
        return $hasil;
    }

}
