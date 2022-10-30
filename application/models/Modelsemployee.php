<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Modelsemployee extends CI_Model {

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

    private function _get_datatables_query() {

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

    function get_datatables() {

        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db2->limit($_POST['length'], $_POST['start']);
        $query = $this->db2->get();
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

    public function get_um_datakaryawan() {
        $queryemployee = "SELECT f_type,nik AS f_emp_id,'full_name' as f_fullname, birth_date as f_birth_date, 'company_desc' as f_company_desc, 'gender' as f_gender,'no_ktp' as f_no_ktp, 'no_tlp' as f_no_tlp, 'position_desc' as f_position_desc, 'join_date' as f_joint_date, 'email' as f_email_address, 'cost_center_desc' as f_cost_center ,'dept_desc' as f_dept_desc, 'directorate_desc'as f_directorate_desc, 'div_desc' as f_div_desc, 'emp_area_desc' as f_emp_area_desc, 'emp_office_desc' as f_emp_office_desc, 'emp_status_desc' as f_emp_status_desc, 'landscape' as f_landscape,'org_unit_desc' as f_org_unit_desc,  'termintate_date' as f_termintate_date, 'group_desc' as f_group_desc , 'group_grade_code' as f_group_grade_code, f_status FROM 'bss_employee'";
        $data = $this->db2->query($queryemployee);
        return $data;
    }

    public function paramselectcompany() {
        $querydetail = "select a.ID as f_code , a.COMPANY_NAME AS f_desc from bss_company as a ";
        $hasil = $this->db2->query($querydetail);
        return $hasil;
//         $this->db2->where('f_type', 'CMP');
//        $this->db2->where('f_untuk', 'W');
//        $this->db2->where('f_active', '0');
//        $cmp = $this->db2->get('t_parameter');
//        return $cmp;
    }

    public function paramselectdirect() {
        $this->db2->where('f_type', 'DIRC');
        $this->db2->where('f_untuk', 'W');
        $this->db2->where('f_active', '0');
        $direct = $this->db2->get('t_parameter');
        return $direct;
    }

    public function paramselectdept() {
        $this->db2->where('f_type', 'DEP');
        $this->db2->where('f_untuk', 'W');
        $this->db2->where('f_active', '0');
        $dept = $this->db2->get('t_parameter');
        return $dept;
    }

    public function paramselectdiv() {
        $this->db2->where('f_type', 'DIV');
        $this->db2->where('f_untuk', 'W');
        $this->db2->where('f_active', '0');
        $dept = $this->db2->get('t_parameter');
        return $dept;
    }

    public function paramselectposition() {
        $this->db2->where('f_type', 'PST');
        $this->db2->where('f_untuk', 'W');
        $this->db2->where('f_active', '0');
        $pst = $this->db2->get('t_parameter');
        return $pst;
    }

    public function paramselectgroup() {
        $this->db2->where('f_type', 'GR');
        $this->db2->where('f_untuk', 'W');
        $this->db2->where('f_active', '0');
        $group = $this->db2->get('t_parameter');
        return $group;
    }

    public function paramselectemparea() {
        $this->db2->where('f_type', 'EMPAREA');
        $this->db2->where('f_untuk', 'W');
        $this->db2->where('f_active', '0');
        $emparea = $this->db2->get('t_parameter');
        return $emparea;
    }

    public function paramselectempstatus() {
        $this->db2->where('f_type', 'EMPSTS');
        $this->db2->where('f_untuk', 'W');
        $this->db2->where('f_active', '0');
        $empsts = $this->db2->get('t_parameter');
        return $empsts;
    }

    public function paramselectempoffice() {
        $this->db2->where('f_type', 'EMPOF');
        $this->db2->where('f_untuk', 'W');
        $this->db2->where('f_active', '0');
        $empoffice = $this->db2->get('t_parameter');
        return $empoffice;
    }

    public function paramselectcostcenter() {
        $this->db2->where('f_type', 'ORGUNIT');
        $this->db2->where('f_untuk', 'W');
        $this->db2->where('f_active', '0');
        $orgunit = $this->db2->get('t_parameter');
        return $orgunit;
    }

    public function paramselectorgunit() {
        $this->db2->where('f_type', 'CC');
        $this->db2->where('f_untuk', 'W');
        $this->db2->where('f_active', '0');
        $cc = $this->db2->get('t_parameter');
        return $cc;
    }

    public function paramselectspv() {
        $queryemployee = "SELECT nik AS f_emp_id,full_name as f_fullname, birth_date as f_birth_date, company_desc as f_company_desc, gender as f_gender,no_ktp as f_no_ktp, no_tlp as f_no_tlp, position_desc as f_position_desc, join_date as f_joint_date, email as f_email_address, cost_center_desc as f_cost_center ,dept_desc as f_dept_desc, directorate_desc as f_directorate_desc, div_desc as f_div_desc, emp_area_desc as f_emp_area_desc, emp_office_desc as f_emp_office_desc, emp_status_desc as f_emp_status_desc, landscape as f_landscape,org_unit_desc as f_org_unit_desc,  termintate_date as f_termintate_date, group_desc as f_group_desc , group_grade_code as f_group_grade_code FROM bss_employee";
        $data = $this->db2->query($queryemployee);
        return $data;
    }

    public function create_datakaryawan_process($data, $emp_id) {
        $select = "select * from bss_employee where nik = '" . $emp_id . "' and f_status = 2";
        $select2 = "select * from bss_employee where nik = '" . $emp_id . "' ";
        $select1 = $this->db2->query($select)->num_rows();
        if ($select1 > 0) {
            $this->db2->where('nik', $emp_id);
            $updateinst = $this->db2->update('bss_employee', $data);
            if ($updateinst == TRUE) {
                return 1;
            } else {
                return 0;
            }
        } elseif ($this->db2->query($select2)->num_rows() > 0) {
            return 2;
        } else {
            $inst = $this->db2->insert('bss_employee', $data);
            if ($inst == TRUE) {
                return 1;
            } else {
                return 0;
            }
        }
    }

    public function update_datakaryawan_process($data, $emp_id) {
        $this->db2->where('nik', $emp_id);
        $inst = $this->db2->update('bss_employee', $data);
        if ($inst == TRUE) {
            return 1;
        } else {
            return 0;
        }
    }

    public function delete_multi_um_datakaryawan($selection) {
		$countselect = sizeof($selection);
		$a = 1;
        foreach ($selection as $item) {
            $this->db2->set('f_status', 2);
            $this->db2->where('nik', $item);
            $update = $this->db2->update('bss_employee');
            if ($update == TRUE) {
                $this->db2->where('f_agentid', $item);
                $delete = $this->db2->delete('t_agent');
                if ($delete == TRUE) {
                    $this->db2->where('f_agent', $item);
                    $delete2 = $this->db2->delete('t_assignment');
                    if ($delete2 == TRUE) {
                        $this->db->where('f_userid', $item);
                        $delete3 = $this->db->delete('t_user');
                        if ($delete3 == TRUE) {
                            $this->db2->where('f_nik', $item);
                            $delete4 = $this->db2->delete('t_dep_head');
                            if ($delete4 == TRUE) {
                                $this->db2->where('f_nik', $item);
                                $delete5 = $this->db2->delete('t_detail_cabang_dephead');
                                if ($delete5 == TRUE) {
                                   $a++ ;
                                }
                            } else {
                                $a = 0;
                            }
                        } else {
                            $a = 0;
                        }
                    } else {
                        $a =  0;
                    }
                } else {
                    $a = 0;
                }
            } else {
                $a = 0;
            }
        }
		
		if($a = $countselect ){
			return 1;
		} else {
			return 0;
		}
    }

    public function employee($emp_id) {
        $select = "select * from bss_employee where nik = '" . $emp_id . "'";
        $data = $this->db2->query($select)->row();
        return $data;
    }

}
