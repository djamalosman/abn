<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Content_model extends CI_Model {

    public function get_tgh_list() {
        $data = $this->db2->get('t_accountlist');
        return $data->result();
    }

    public function get_as_agentproduct() {
        $data = $this->db2->get('t_paramassign');
        return $data->result();
    }

    public function get_as_datamanual() {
        $data = $this->db2->get('t_assignheader');
        return $data->result();
    }

    public function get_as_datadetail($as_id) {
        $this->db2->where('f_assignid', $as_id);
        $data = $this->db2->get('t_assigndetail');
        return $data->result();
    }

    public function get_as_data() {
        $data = $this->db2->get('t_assignheader');
        return $data->result();
    }

    public function get_dt_visit() {
        $data = $this->db2->get('tbl_visit');
        return $data->result();
    }

    public function get_dk_harian() {
        $data = $this->db2->get('tb_dkh');
        return $data->result();
    }

    public function get_dt_survey() {
        $data = $this->db2->get('tbl_hasil_inventory');
        return $data->result();
    }

    public function get_ms_produk_one($id) {
        $this->db2->where('f_productid', $id);
        $data = $this->db2->get('t_product');
        return $data->row();
    }

    public function get_ms_kodepos_one($id) {
        $this->db2->where('f_postcode', $id);
        $data = $this->db2->get('t_postcode');
        return $data->row();
    }

// DATA TABLES    
    function make_query($table, $select_column, $order_column, $order_query, $like, $where) {
        $this->db2->select($select_column);
        $this->db2->from($table);
        
        $this->db2->group_start();
            $this->db2->or_like($like);
        $this->db2->group_end();
        
        if (isset($_POST["order"])) {
//            print_r($_POST['order']);
            for($i=0; $i<count($_POST["order"]); $i++){
                $this->db2->order_by($order_column[$_POST['order'][$i]['column']], $_POST['order'][$i]['dir']);
            }
            
        } else {
            $this->db2->order_by($order_query, 'DESC');
        }
    }

    function make_datatables($table, $select_column, $order_column, $order_query, $like, $where) {
        $this->make_query($table, $select_column, $order_column, $order_query, $like, $where);
        
        $this->db2->group_start();
        
        $this->db2->where($where);
        
        $this->db2->group_end();
        if ($_POST["length"] != -1) {
            $this->db2->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db2->get();
        return $query->result();
    }

    function get_filtered_data($table, $select_column, $order_column, $order_query, $like, $where) {
        $this->make_query($table, $select_column, $order_column, $order_query, $like, $where);
        $this->db2->where($where);
        $query = $this->db2->get();
        return $query->num_rows();
    }

    function get_all_data($table, $select_column, $order_column, $order_query, $like, $where) {
        $this->db2->select("*");
        $this->db2->from($table);
//        $this->make_datatables($table, $select_column, $order_column, $order_query, $like, $where);
        $this->db2->where($where);
        return $this->db2->count_all_results();
//        return $this->db2->num_rows();
    }    
    
//DATATABLES
//==============================================    

    public function get_ms_produk() {
        $data = $this->db2->get('t_product');
        return $data->result();
    }

    public function get_ms_kodepos() {
        $data = $this->db2->get('t_postcode');
        return $data->result();
    }

    public function get_um_datakaryawan() {
        $data = $this->db2->get('t_employee');
        return $data->result();
    }

    public function get_um_agent() {
        $data = $this->db2->get('t_agent');
        return $data->result();
    }

    public function get_tgh_list_one($id) {
        $this->db2->where('f_cif', $id);
        $data = $this->db2->get('t_accountlist');
        return $data->row();
    }

    public function get_as_data_one($id) {
        $this->db2->where('f_assignid', $id);
        $data = $this->db2->get('t_assignheader');
        return $data->row();
    }

    public function get_um_datakaryawan_one($id) {
        $this->db2->where('f_nik', $id);
        $data = $this->db2->get('t_employee');
        return $data->row();
    }
    
    public function get_sp_administration_one($id) {
        $this->db2->where('f_jenisSp', $id);
        $data = $this->db2->get('t_administrationsp');
        return $data->row();
    }
    
    public function get_mntr_lelang_one($id) {
        $this->db2->where('f_debtNum', $id);
        $data = $this->db2->get('t_lelang');
        return $data->row();
    }

    public function get_um_agent_one($id) {
        $this->db2->where('f_agencyid', $id);
        $data = $this->db2->get('t_agent');
        return $data->row();
    }

    public function get_param_branch() {
        $data = $this->db2->get('t_branch');
        return $data->result();
    }

    public function get_param_city() {
        $data = $this->db2->get('t_city');
        return $data->result();
    }

    public function get_param_area() {
        $data = $this->db2->get('t_area');
        return $data->result();
    }

    public function delete_multi_param_city($id) {
        foreach ($id as $item) {
            $this->db2->where('f_cityid', $item);
            $this->db2->delete('t_city');
        }
    }

    public function delete_multi_param_branch($id) {
        foreach ($id as $item) {
            $this->db2->where('f_branchid', $item);
            $this->db2->delete('t_branch');
        }
    }

    public function delete_multi_tgh_list($id) {
        foreach ($id as $item) {
            $this->db2->where('f_cif', $item);
            $this->db2->delete('t_accountlist');
        }
    }

    public function delete_multi_as_agentproduct($id) {
        foreach ($id as $item) {
            $this->db2->where('f_linkid', $item);
            $this->db2->delete('t_paramassign');
        }
    }

    public function delete_multi_as_datamanual($id) {
        foreach ($id as $item) {
            $this->db2->where('f_assignid', $item);
            $this->db2->delete('t_assignheader');
        }
    }

    public function delete_multi_as_data($id) {
        foreach ($id as $item) {
            $this->db2->where('f_assignid', $item);
            $this->db2->delete('t_assignheader');
        }
    }

    public function delete_multi_ms_produk($id) {
        foreach ($id as $item) {
            $this->db2->where('f_productid', $item);
            $this->db2->delete('t_product');
        }
    }

    public function delete_multi_sp_administration($id) {
        foreach ($id as $item) {
            $this->db2->where('f_jenisSp', $item);
            $this->db2->delete('t_administrationsp');
        }
    }

    public function delete_multi_mntr_lelang($id) {
        foreach ($id as $item) {
            $this->db2->where('f_debtNum', $item);
            $this->db2->delete('t_lelang');
        }
    }

    public function delete_multi_ms_kodepos($id) {
        foreach ($id as $item) {
            $this->db2->where('f_postcode', $item);
            $this->db2->delete('t_postcode');
        }
    }

    public function delete_multi_um_datakaryawan($id) {
        foreach ($id as $item) {
            $this->db2->where('f_nik', $item);
            $this->db2->delete('t_employee');
        }
    }

    public function delete_multi_um_agent($id) {
        foreach ($id as $item) {
            $this->db2->where('f_agencyid', $item);
            $this->db2->delete('t_agent');
        }
    }

    public function delete_multi_param_area($id) {
        foreach ($id as $item) {
            $this->db2->where('f_areaid', $item);
            $this->db2->delete('t_area');
        }
    }

    public function update_um_agent_process($id_agen, $nik, $agent_name, $id_branch, $username, $email, $no_hp, $imei, $phone_sn) {
        $data = array(
//            'f_agencyid' => $id_agen,
//            'f_agentid' => $nik,
            'f_agentname' => $agent_name,
            'f_branch_id' => $id_branch,
            'f_username' => $username,
            'f_userpswd' => $email,
            'f_email' => $email,
            'f_nohp' => $no_hp,
            'f_imeihp' => $imei,
            'f_snhp' => $phone_sn
        );

        $this->db2->where('f_agencyid', $id_agen);
        $this->db2->update('t_agent', $data);
        print_r($this->db2->error());
    }

    public function update_tgh_list_process($data) {
        $this->db2->where('f_cif', $data['f_cif']);
        $this->db2->update('t_accountlist', $data);
    }

    public function create_tgh_list_process($data) {
        $this->db2->insert('t_accountlist', $data);
    }

    public function create_as_data_process($f_assignid, $f_assigndate, $f_agentid, $f_status, $f_rectotal, $f_recdone, $f_trftoagentid, $f_originagent, $f_trfdate) {
        $data = array(
            'f_assignid' => $f_assignid,
            'f_assigndate' => $f_assigndate,
            'f_agentid' => $f_agentid,
            'f_status' => $f_status,
            'f_rectotal' => $f_rectotal,
            'f_recdone' => $f_recdone,
            'f_trftoagentid' => $f_trftoagentid,
            'f_originagent' => $f_originagent,
            'f_trfdate' => $f_trfdate,
            'f_usercreate' => $this->session->userdata('username'),
            'f_datecreate' => date('Y-m-d'),
            'f_userupdate' => $this->session->userdata('username'),
            'f_dateupdate' => date('Y-m-d')
        );

        $this->db2->insert('t_assignheader', $data);
    }

    public function update_as_data_process($f_assignid, $f_trftoagentid, $f_originagent, $f_trfdate) {
        $data = array(
//            'f_assignid' => $f_assignid,
//            'f_assigndate' => $f_assigndate,
//            'f_agentid' => $f_agentid,
//            'f_status' => $f_status,
//            'f_rectotal' => $f_rectotal,
//            'f_recdone' => $f_recdone,
            'f_trftoagentid' => $f_trftoagentid,
            'f_originagent' => $f_originagent,
            'f_trfdate' => $f_trfdate,
//            'f_usercreate' => $this->session->userdata('username'),
//            'f_datecreate' => date('Y-m-d'),
            'f_userupdate' => $this->session->userdata('username'),
            'f_dateupdate' => date('Y-m-d')
        );

        $this->db2->where('f_assignid', $f_assignid);
        $this->db2->update('t_assignheader', $data);

        return $this->db2->error();
    }

    public function update_um_datakaryawan_process($data) {
        $this->db2->where('f_nik', $data['f_nik']);
        $this->db2->update('t_employee', $data);
    }

    public function update_ms_kodepos_process($data) {
        $this->db2->where('f_postcode', $data['f_postcode']);
        $this->db2->update('t_postcode', $data);
    }

    public function update_ms_produk_process($data) {
        $this->db2->where('f_productid', $data['f_productid']);
        $this->db2->update('t_product', $data);
    }

    public function create_ms_produk_process($data) {
        $this->db2->insert('t_product', $data);
    }

    public function create_ms_kodepos_process($data) {
        $this->db2->insert('t_postcode', $data);
    }

    public function create_um_datakaryawan_process($data) {
        $this->db2->insert('t_employee', $data);
    }
    
    public function create_mntr_lelang_process($data) {
        $this->db2->insert('t_lelang', $data);
        $this->db2->error();
    }
    
    public function create_sp_administration_process($data) {
        $this->db2->insert('t_administrationsp', $data);
    }
    
    public function update_sp_administration_process($data) {
        $this->db2->where('f_jenisSp', $data['f_jenisSp']);
        $this->db2->update('t_administrationsp', $data);
    }

    public function update_mntr_lelang_process($data) {
        $this->db2->where('f_debtNum', $data['f_debtNum']);
        $this->db2->update('t_lelang', $data);
    }

    public function create_um_agent_process($id_agen, $nik, $agent_name, $id_branch, $username, $email, $no_hp, $imei, $phone_sn) {
        $data = array(
            'f_agencyid' => $id_agen,
            'f_agentid' => $nik,
            'f_agentname' => $agent_name,
            'f_branch_id' => $id_branch,
            'f_username' => $username,
            'f_userpswd' => $email,
            'f_email' => $email,
            'f_nohp' => $no_hp,
            'f_imeihp' => $imei,
            'f_snhp' => $phone_sn
        );
        

        $this->db2->insert('t_agent', $data);
//        print_r($this->db2->error());
    }

    public function create_param_city_process($id_kota, $city_name, $status) {
        $data = array(
            'f_cityid' => $id_kota,
            'f_cityname' => $city_name,
            'f_active' => $status,
            'f_usercreate' => 'System',
            'f_datecreate' => date('Y-m-d'),
            'f_userupdate' => 'System',
            'f_dateupdate' => date('Y-m-d')
        );

        $this->db2->insert('t_city', $data);
    }

    public function create_param_branch_process($id_branch, $branch_name, $id_area, $address, $id_kota, $postal_code) {
        $data = array(
            'f_branchid' => $id_branch,
            'f_branchname' => $branch_name,
            'f_areaid' => $id_area,
            'f_address' => $address,
            'f_cityid' => $id_kota,
            'f_postcode' => $postal_code,
            'f_usercreate' => $this->session->userdata('username'),
            'f_datecreate' => date('Y-m-d'),
            'f_userupdate' => $this->session->userdata('username'),
            'f_dateupdate' => date('Y-m-d')
        );

        $this->db2->insert('t_branch', $data);
    }

    public function update_param_branch_process($id_branch, $branch_name, $id_area, $address, $id_kota, $postal_code) {
        $data = array(
            'f_branchid' => $id_branch,
            'f_branchname' => $branch_name,
            'f_areaid' => $id_area,
            'f_address' => $address,
            'f_cityid' => $id_kota,
            'f_postcode' => $postal_code,
            'f_usercreate' => $this->session->userdata('username'),
            'f_datecreate' => date('Y-m-d'),
            'f_userupdate' => $this->session->userdata('username'),
            'f_dateupdate' => date('Y-m-d')
        );

        $this->db2->where('f_branchid', $id_branch);
        $this->db2->update('t_branch', $data);
    }

    public function create_param_area_process($id_area, $area_name, $notes) {
        $data = array(
            'f_areaid' => $id_area,
            'f_areaname' => $area_name,
            'f_notes' => $notes,
            'f_usercreate' => "System",
            'f_datecreate' => date('Y-m-d'),
            'f_userupdate' => "System",
            'f_dateupdate' => date('Y-m-d')
        );

        $this->db2->insert('t_area', $data);
    }

    public function update_param_area_process($id_area, $area_name, $notes) {
        $data = array(
            'f_areaid' => $id_area,
            'f_areaname' => $area_name,
            'f_notes' => $notes,
            'f_userupdate' => $this->session->userdata('username'),
            'f_dateupdate' => date('Y-m-d')
        );
        $this->db2->where('f_areaid', $id_area);
        $this->db2->update('t_area', $data);
    }

    public function update_param_city_process($id_kota, $city_name, $status) {
        $data = array(
            'f_cityid' => $id_kota,
            'f_cityname' => $city_name,
            'f_active' => $status,
            'f_userupdate' => $this->session->userdata('username'),
            'f_dateupdate' => date('Y-m-d')
        );

        $this->db2->where('f_cityid', $id_kota);
        $this->db2->update('t_city', $data);
    }

    public function get_city_one($id) {
        $data = $this->db2->get_where('t_city', array('f_cityid' => $id));
        return $data->row();
    }

    public function get_branch_one($id) {
        $data = $this->db2->get_where('t_branch', array('f_branchid' => $id));
        return $data->row();
    }

    public function get_area_one($id) {
        $data = $this->db2->get_where('t_area', array('f_areaid' => $id));
        return $data->row();
    }
    
    
    
//    DATA TABLES SERVER SIDE PROCESSING
    function make_datatables_compact($table, $select_column, $order_column, $order_query, $like, $where) {
        $this->db2->select($select_column);
        $this->db2->from($table);
        $this->db2->join('t_accountlist', 't_accountlist.f_cif = t_assigndetail.f_cif', 'left');
        
        $this->db2->group_start();
            $this->db2->or_like($like);
        $this->db2->group_end();
        
        if (isset($_POST["order"])) {
            for($i=0; $i<count($_POST["order"]); $i++){
                $this->db2->order_by($order_column[$_POST['order'][$i]['column']], $_POST['order'][$i]['dir']);
            }
            
        } else {
            $this->db2->order_by($order_query, 'DESC');
        }        
        
        $this->db2->group_start();
        $this->db2->where($where);
        $this->db2->group_end();
        

        
        if ($_POST["length"] != -1) {
            $this->db2->limit($_POST['length'], $_POST['start']);
        }
        
        
        $query = $this->db2->get(); 
        $query->result();
        
        
        $this->db2->group_start();
            $this->db2->or_like($like);
        $this->db2->group_end();    
        $this->db2->group_start();
            $this->db2->where($where);
        $this->db2->group_end();    
        
        $this->db2->where(array('f_status =' => '0'));
        $recordsTotal = $this->db2->count_all_results($table);
        
        
        $this->db2->group_start();
            $this->db2->or_like($like);
        $this->db2->group_end();      
        $this->db2->group_start();
            $this->db2->where($where);
        $this->db2->group_end();        
        
        $this->db2->where(array('f_status =' => '0'));
        $recordsFiltered = $this->db2->count_all_results($table);
        
        foreach($query->result() as $row)  
        {  
            $sub_array = array();  
//                $sub_array[] = "<p class='text-center'><input class='ceklis' type='checkbox' value='$row->f_assignid' name='idnya[]'/></p>";
            $sub_array[] = $row->f_assignid;
            $sub_array[] = $row->f_assigndate;
            $sub_array[] = $row->f_agentid;
            $sub_array[] = $row->f_cif;
            $sub_array[] = $row->f_acctno;
            $sub_array[] = $row->f_custname;
            $sub_array[] = $row->f_loanid;
            $sub_array[] = $row->f_productid;
            $sub_array[] = $row->f_status;
//                $sub_array[] = "<a title='Edit' href='". base_url('content/update_mntr_lelang/'.$row->f_assignid)."'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>";


            $data[] = $sub_array;
        }        
        
        
        $output = array(  
             "draw" => intval($_POST["draw"]),  
             "recordsTotal" => $recordsTotal,
             "recordsFiltered" => $recordsFiltered,
             "data" => $data  
        );
        
        return $output;
                
    }    
    
    
    
    
    
    function make_query_ins($table, $select_column, $order_column, $order_query, $like, $where) {
        $this->db2->select($select_column);
        $this->db2->from($table);
        $this->db2->join('t_accountlist', 't_accountlist.f_cif = t_assigndetail.f_cif', 'left');
        
        $this->db2->group_start();
            $this->db2->or_like($like);
        $this->db2->group_end();
        
        if (isset($_POST["order"])) {
            for($i=0; $i<count($_POST["order"]); $i++){
                $this->db2->order_by($order_column[$_POST['order'][$i]['column']], $_POST['order'][$i]['dir']);
            }
            
        } else {
            $this->db2->order_by($order_query, 'DESC');
        }
    }
    
    function make_datatables_ins($table, $select_column, $order_column, $order_query, $like, $where) {
        $this->make_query_ins($table, $select_column, $order_column, $order_query, $like, $where);
        
        $this->db2->group_start();
        
        $this->db2->where($where);
        
        $this->db2->group_end();
        if ($_POST["length"] != -1) {
            $this->db2->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db2->get(); 
        return $query->result();
    }

    function get_filtered_data_ins($table, $select_column, $order_column, $order_query, $like, $where) {
        $this->make_query_ins($table, $select_column, $order_column, $order_query, $like, $where);
        $this->db2->where($where);
        $query = $this->db2->get();
        return $query->num_rows();
    }

    function get_all_data_ins($table, $select_column, $order_column, $order_query, $like, $where) {
        $this->db2->select("*");
        $this->db2->from($table);
        $this->db2->where($where);
        return $this->db2->count_all_results();
    }
    
//DATATABLES
//==============================================        

}
