<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Menu_model extends CI_Model{
    public function login($username, $password){
        $query = '
            SELECT t_user.f_userlevel, t_user.f_userid,  t_user.f_username, t_level.f_levelname 
            FROM `t_user` 
            left join t_level   
            on t_level.t_levelid=t_user.f_userlevel
            where t_user.f_userid="'.$username.'"
            order by t_user.f_userid
            limit 0,1';
        
        $output = $this->db->query($query);
        
        return $output->row();
    }
    
    public function loadMenu(){
//        $query = '
//            SELECT t_levelmheader.f_levelid, f_parentid, t_menuheader.f_menuname, f_itemname, f_itemurl, t_levelmheader.f_active
//            from t_menudetail join t_menuheader on f_parentid=t_menuheader.f_menuid 
//            right join t_levelmheader on t_levelmheader.f_menuid=f_parentid
//            where t_levelmheader.f_levelid="'.$this->session->userdata('level').' "AND t_levelmheader.f_active="1"
//            order by f_parentid, f_itemid';
        
        $query = '
            select t_menuheader.icon, t_levelmdetail.f_levelid, t_menudetail.f_parentid, t_menuheader.f_menuname, t_levelmdetail.f_menuid, t_menudetail.f_itemname, t_menudetail.f_itemurl, t_levelmdetail.f_active
            from t_levelmdetail

            join t_menudetail
            on t_levelmdetail.f_menuid=t_menudetail.f_itemid and t_levelmdetail.f_levelid="'.$this->session->userdata('level').'"

            left join t_menuheader
            on t_menuheader.f_menuid=t_menudetail.f_parentid

            right join t_levelmheader
            on t_levelmheader.f_menuid=t_menudetail.f_parentid and t_levelmheader.f_levelid="'.$this->session->userdata('level').'"

            where t_menudetail.f_parentid is not null

            order by t_menudetail.f_parentid,t_levelmdetail.f_menuid';
        
        $output = $this->db->query($query);
        
        return $output->result();
    }
    
    public function menuAccess($id_level_user){
        
        /*$query = '
            SELECT t_menuheader.f_menuid, t_menuheader.f_menuname, t_menudetail.f_itemid, t_menudetail.f_itemname 
            from t_menuheader 
            join t_menudetail 
            on t_menuheader.f_menuid=t_menudetail.f_parentid 
            order by t_menuheader.f_menuid, t_menudetail.f_itemid            
        ';*/
        
        
        $query ='
            SELECT t_menuheader.f_menuid, t_levelmheader.f_menuid as Header_Check,
                t_menuheader.f_menuname, t_menudetail.f_itemid, t_levelmdetail.f_menuid as Item_Check, 
                t_menudetail.f_itemname, t_levelmheader.f_levelid

            from t_menuheader 
            left join t_menudetail 
            on t_menudetail.f_parentid=t_menuheader.f_menuid

            left outer join t_levelmheader
            on t_menuheader.f_menuid=t_levelmheader.f_menuid and t_levelmheader.f_levelid = "'.$id_level_user.'"

            left outer join t_levelmdetail
            on t_levelmdetail.f_menuid=t_menudetail.f_itemid and t_levelmdetail.f_levelid="'.$id_level_user.'"


            UNION

            SELECT t_menuheader.f_menuid, t_levelmheader.f_menuid as Header_Check,
                t_menuheader.f_menuname, t_menudetail.f_itemid, t_levelmdetail.f_menuid as Item_Check, 
                t_menudetail.f_itemname, t_levelmheader.f_levelid

            from t_menuheader 
            left join t_menudetail 
            on t_menudetail.f_parentid=t_menuheader.f_menuid

            right outer join t_levelmheader
            on t_menuheader.f_menuid=t_levelmheader.f_menuid and t_levelmheader.f_levelid = "'.$id_level_user.'"

            left outer join t_levelmdetail
            on t_levelmdetail.f_menuid=t_menudetail.f_itemid and t_levelmdetail.f_levelid="'.$id_level_user.'"

            where t_menuheader.f_menuid is not null

            order by f_menuid, f_itemid';             
        
        
        $output = $this->db->query($query);
        
        return $output->result();
    }
    
    public function loadTipeUser(){
        $this->db->select(array('t_levelid', 'f_levelname'));
        $data = $this->db->get('t_level');
        return $data->result();
    }
    
    public function create_user($name, $id_user, $password, $level, $status){
        $data = array(
            'f_userid' => $id_user,
            'f_username'=> $name,
            'f_userpswd'=> $password,
            'f_userlevel'=> $level,
            'f_active' => $status,
            'f_usercreate' => "System",
            'f_datecreate' => date("Y-m-d"),
            'f_userupdate' => "System",
            'f_dateupdate' => date("Y-m-d")                    
        );
        
        $this->db->insert('t_user', $data);
    }
    
    public function create_level($level_id, $level_name, $status){
        $data = array(
            't_levelid' => $level_id,
            'f_levelname' => $level_name,
            'f_active' => $status,
            'f_usercreate' => "System",
            'f_datecreate' => date("Y-m-d"),
            'f_userupdate' => "System",
            'f_dateupdate' => date("Y-m-d")
        );
        
        $this->db->insert('t_level', $data);
    }
    
    public function create_headermenu($header_id, $headerName, $status){
        $data = array(
            'f_menuid' => $header_id,
            'f_menuname' => $headerName,
            'f_menunotes' => "System",
            'f_status' => $status,
            'f_usercreate' => "System",
            'f_datecreate' => date("Y-m-d"),
            'f_userupdate' => "System",
            'f_dateupdate' => date("Y-m-d")
        );
        
        $this->db->insert('t_menuheader', $data);
    }
    
    public function update_headermenu($header_id, $headerName, $status){
        $data = array(
            'f_menuid' => $header_id,
            'f_menuname' => $headerName,
            'f_menunotes' => "System",
            'f_status' => $status,
            'f_usercreate' => "System",
//            'f_datecreate' => date("Y-m-d"),
            'f_userupdate' => "System",
            'f_dateupdate' => date("Y-m-d")
        );
        $this->db->where('f_menuid',$header_id);
        $this->db->update('t_menuheader', $data);
    }
    
    public function update_level($level_id, $level_name, $status){
        $data = array(
            't_levelid' => $level_id,
            'f_levelname' => $level_name,
            'f_active' => $status,
            'f_usercreate' => "System",
//            'f_datecreate' => date("Y-m-d"),
            'f_userupdate' => "System",
            'f_dateupdate' => date("Y-m-d")
        );
        
        $this->db->where('t_levelid', $level_id);
        $this->db->update('t_level', $data);
    }
    
    public function update_user($name, $id_user, $password, $level, $status){
        $data = array(
            'f_userid' => $id_user,
            'f_username'=> $name,
            'f_userpswd'=> $password,
            'f_userlevel'=> $level,
            'f_active' => $status,
            'f_usercreate' => "System",
            'f_userupdate' => "System",
            'f_dateupdate' => date("Y-m-d")                    
        );
        $this->db->where('f_userid', $id_user);
        $this->db->update('t_user', $data);
    }    
    public function get_userdata(){
        $data = $this->db->get('t_user');
        return $data->result();
    }
    
    public function get_city_one(){
        $data = $this->db2->get('t_city');
        return $data->row();
    }
    
    public function get_level(){
        $data = $this->db->get('t_level');
        return $data->result();
    }
    
    public function get_param_city(){
        $data = $this->db2->get('t_city');
        return $data->result();
    }
    
    public function get_headermenu(){
        $data = $this->db->get('t_menuheader');
        return $data->result();
    }
    
    public function get_userdata_one($id){
        $data = $this->db->get_where('t_user', array('f_userid'=>$id));
        return $data->row();
    }    
    
    public function get_one_level($id){
        $data = $this->db->get_where('t_level', array('t_levelid'=>$id));
        return $data->row();
    }   
    
    public function get_one_headermenu($id){
        $data = $this->db->get_where('t_menuheader', array('f_menuid'=>$id));
        return $data->row();
    }    
    
    public function delete_user($id){
        $this->db->where('f_userid', $id);
        $this->db->delete('t_user');
    }
    
    public function delete_multiuser($id){
        foreach ($id as $item){
            $this->db->where('f_userid', $item);
            $this->db->delete('t_user');
        }
    }
    
    public function delete_multilevel($id){
        foreach ($id as $item){
            $this->db->where('t_levelid', $item);
            $this->db->delete('t_level');
        }
    }
    
    public function delete_multiheader($id){
        foreach ($id as $item){
            $this->db->where('f_menuid', $item);
            $this->db->delete('t_menuheader');
        }
    }
    
    public function delete_multi_param_city($id){
        foreach ($id as $item){
            $this->db2->where('f_cityid', $item);
            $this->db2->delete('t_city');
        }
    }
    
    
    
    public function access_permission_process($id_level, $id_header, $id_item){
        $this->db->where('f_levelid', $id_level);
        $this->db->delete('t_levelmheader');
        
        $this->db->where('f_levelid', $id_level);
        $this->db->delete('t_levelmdetail');
        
        foreach ($id_header as $item){
            $data = array(
                    "f_levelid" => $id_level,
                    "f_menuid" => $item,
                    "f_active" => "1", 
                    "f_usercreate" => "System",
                    "f_datecreate" => date("Y-m-d"),
                    "f_userupdate" => "System",
                    "f_dateupdate" => date("Y-m-d")
                );
            $this->db->insert('t_levelmheader', $data);
        }
        
        foreach ($id_item as $item){
            $data = array(
                    "f_levelid" => $id_level,
                    "f_menuid" => $item,
                    "f_active" => "1", 
                    "f_usercreate" => "System",
                    "f_datecreate" => date("Y-m-d"),
                    "f_userupdate" => "System",
                    "f_dateupdate" => date("Y-m-d")
                );
            $this->db->insert('t_levelmdetail', $data);
        }
    }
    
    public function create_param_city_process($id_kota, $city_name, $status){
        $data = array(
            'f_cityid' => $id_kota,
            'f_cityname' => $city_name,
            'f_active' => $status,
            'f_usercreate' => 'System',
            'f_datecreate' => date('Y-m-d'),
            'f_userupdate' =>'System',
            'f_dateupdate' => date('Y-m-d')
        );
        
        $this->db2->insert('t_city', $data);
    }
    
    public function update_param_city_process($id_kota, $city_name, $status){
        $data = array(
            'f_cityid' => $id_kota,
            'f_cityname' => $city_name,
            'f_active' => $status,
            'f_usercreate' => 'System',
            'f_datecreate' => date('Y-m-d'),
            'f_userupdate' =>'System',
            'f_dateupdate' => date('Y-m-d')
        );
        
        $this->db2->where('f_cityid', $id_kota);
        $this->db2->update('t_city', $data);
    }
}