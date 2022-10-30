<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Menu_model extends CI_Model {

    public function showheader() {
        $this->db->select('*');
        $data = $this->db->get('t_headermarque');
        return $data->row();
    }

    function getimage($codeimage, $nik) {
        $select = "select * from t_image where f_cif = '" . $nik . "' and f_code = '" . $codeimage . "'";
//        $select1[] = $this->db2->query($select)->num_rows();
        $a = $this->db2->query($select)->num_rows();
        if ($a > 0) {
            $select1 = $this->db2->query($select)->result_array();
            return $select1;
        } else {
            return 0;
        }
    }
    public function headerdata($a) {

        $data = array('text_header' => $a);
        $update = $this->db->update('t_headermarque', $data);
        if ($update === TRUE) {
            $this->session->set_userdata('text_header', $a);
            return 1;
        } else {

            return 0;
        }
    }

    public function cekuser($user,$email) {
        $query = "select count(*) as jmlh from t_user where f_userid='".$user."' AND f_email='".$email."'" ;
        $a = $this->db->query($query)->row();
        if($a->jmlh > 0){
            return 1;
        }else{
            return 0;
        }
       
    }
     public function updatepassword_email($user,$datetime,$pass)
    {
            $updatedata = array(
                'f_userpswd'=> $pass,
                'f_status_pswd'=> $pass
            );
            $update=$this->db->where('f_userid', $user);
            $update=$this->db->update('t_user', $updatedata);
            return 1;
    }
    public function ceksendemail($user,$date)
    {
        $status=1;
        $ceklog_email="select count(*) as jmlh from  t_log_email where f_usercreate='".$user."' AND f_datetime ='".$date."'AND f_status='".$status."'";
        $a = $this->db2->query($ceklog_email)->row();
        if($a->jmlh > 0){
            return 1;
        }else{
            return 0;
        }
    
    }
	
	public function expyredate($username, $password){
        $this->db->select('f_userid,DATEDIFF(f_dateupdate,NOW()) AS selisih');
        $this->db->from('t_user');
        $this->db->where('f_userid',$username);
        $query1=$this->db->get();
        
        $row1 = $query1->row();
        $a=$row1->selisih;
        //var_dump($a);
        if($a >=60)
        {
		$active='0';
		 $data1 = array(
           'f_active'=>$active
          );
      $ab=$this->db->where('f_userid',$use);
      $ab=$this->db->update('t_user',$data1);
            return 4;
        }else {
            return 0;
        }
    }
	
	
		public function expyredatePassword53($username){
        $this->db->select('f_userid,DATEDIFF(f_passwordaktif,current_date()) AS selisih');
        $this->db->from('t_user');
        $this->db->where('f_userid',$username);
        $query1=$this->db->get();
        
        $row1 = $query1->row();
        $a=$row1->selisih;
        //var_dump($a);
        if($a >=54)
        {
            return 4;
        }elseif($a >=54) {
            return 4;
        }elseif($a>=55){
            return 4;
        }elseif($a>=56){
            return 4;
        }elseif($a>=57){
            return 4;
        }elseif($a>=58){
            return 4;
        }elseif($a>=59){
            return 4;
        }else{
            return 0;
        }
    }
	public function ambil_password_email($user)
    {
        // $this->db->select('f_email');
        // $this->db->from('t_user');
        // $this->db->where('f_userid',$user);
        $select="select f_email,f_userid from t_user where f_userid ='".$user."'";
        $data = $this->db->query($select)->row();
        return $data;
    }
	
	    public function f_logincount3($username){
        $this->db->select('f_countlogingagal');
        $this->db->from('t_user');
        $this->db->where('f_userid',$username);
        $query1=$this->db->get();
        
        $row1 = $query1->row();
        $a=$row1->f_countlogingagal;
        //var_dump($a);
        if($a >= 3)
        {
            return 1;
        }else {
            return 0;
        }
    }

	public function f_logincount($username){
        $this->db->select('minute(timediff(now(),f_tglcountlogingagal)) AS selisih');
        $this->db->from('t_user');
        $this->db->where('f_userid',$username);
        $query1=$this->db->get();
        
        $row1 = $query1->row();
        $a=$row1->selisih;
        //var_dump($a);
        if($a > 5)
        {
            $f_tglcountlogingagal='';
            $f_countlogingagal=0;
            $data = array(
                'f_tglcountlogingagal'=> $f_tglcountlogingagal,
                'f_countlogingagal'=>$f_countlogingagal,
               );
           $this->db->where('f_userid', $username);
           $this->db->update('t_user',$data); 
            return 4;
        }else {
            
            return 0;
        }
    }
	
		public function f_countlogingagal($username){
        $datetime = date('Y-m-d H:i:s');
       $querygagal3 = "UPDATE `t_user` SET f_countlogingagal = f_countlogingagal + 1,f_tglcountlogingagal='".$datetime."' WHERE f_userid = '" . $username . "'";
        $a = $this->db->query($querygagal3);
    //     $data = array(
    //         'f_countlogingagal'=>+ 1,
    //         'f_tglcountlogingagal'=>$datetime
    //        );
    //    $this->db->where('f_userid', $username);
    //    $this->db->update('t_user',$data);
    }
    public function expyredatePassword60($username, $password){
        $this->db->select('DATEDIFF(f_passwordaktif,current_date()) AS selisih');
        $this->db->from('t_user');
        $this->db->where('f_userid',$username);
        $query1=$this->db->get();
        
        $row1 = $query1->row();
        $a=$row1->selisih;
        //var_dump($a);
        if($a >=60)
        {
            $active='0';
            $updatedata = array(
                'f_active'=> $active
            );
            $update=$this->db->where('f_userid', $username);
            $update=$this->db->update('t_user', $updatedata);
            return 4;
        }else {
            return 0;
        }
    }
	
	
	public function ambil_user($user)
    {
        // $this->db->select('f_email');
        // $this->db->from('t_user');
        // $this->db->where('f_userid',$user);
        $select="select f_email,f_userid from t_user where f_userid ='".$user."'";
        $data = $this->db->query($select)->row();
        return $data;
    }

	public function create_user_pass($username, $password) {
        $query = "select count(*) as jmlh from t_user where f_userid='".$username."' AND f_userpswd='".$username."' AND f_active ='1'" ;
        $a = $this->db->query($query)->row();
        if($a->jmlh > 0){
            return 7;
        }else{
            return 0;
        }
       
    }
	
	
	public function cekuseractive($username) {
		$a=1;
        $query = "select count(*) as jmlh from t_user where f_userid='".$username."' AND f_active ='".$a."'";
        $a = $this->db->query($query)->row();
        if($a->jmlh > 0){
            return 71;
        }else{
            return 0;
        }
       
    }
	
	 public function ceklagiusersamapassword($use,$oldpassword,$newpassword,$confrmpasswordnew)
  {
     $this->db->select('*');
     $this->db->from('t_user');
     $this->db->where('f_userid',$use);
     $this->db->where('f_userid',$confrmpasswordnew);
     $query1=$this->db->get();
     if ($query1->num_rows() > 0) {
       return 1;
     }else{
         return 0;
     }
 }
	
	
	 public function cekuserpasswordchange_lupa($use,$oldpassword)
   {
      $this->db->select('*');
      $this->db->from('t_user');
      $this->db->where('f_userid',$use);
      $this->db->where('f_userpswd',$oldpassword);
      $query1=$this->db->get();
      if ($query1->num_rows() > 0) {
        return 1;
      }else{
          return 0;
      }
  }
  public function cekpassword($use,$oldpassword,$newpassword,$confrmpasswordnew)
   {
      $this->db->select('*');
      $this->db->from('t_user');
      $this->db->where('f_userid',$use);
      $this->db->where('f_userpswd',$confrmpasswordnew);
      $this->db->where('f_userpswd',$newpassword);
      $query1=$this->db->get();
      if ($query1->num_rows() > 0) {
        return 1;
      }else{
          return 0;
      }
  }

  public function loginstatus($user)
	{
		 $null=0;
        $cek_user_new="select count(*) as jmlh from  t_user where 	f_userid='".$user."' AND f_status_login='".$null."'";
        $a = $this->db->query($cek_user_new)->row();
        if($a->jmlh > 0){
            return 1;
        }else{
            return 0;
        }
	}
  
	public function duplicatelogin($user,$password)
	{
		 $null=1;
        $cek_user_new="select count(*) as jmlh from  t_user where 	f_userid='".$user."' AND f_status_login='".$null."'";
        $a = $this->db->query($cek_user_new)->row();
        if($a->jmlh > 0){
            return 66;
        }else{
            return 0;
        }
	}
	
	public function ceklupassword($user,$password)
	{
		 
        $cek_user_new="select count(*) as jmlh from  t_user where 	f_userid='".$user."' AND f_status_pswd='".$password."'";
        $a = $this->db->query($cek_user_new)->row();
        if($a->jmlh > 0){
            return 6;
        }else{
            return 0;
        }
	}
	
	
	public function update_statuslogin($use){
	
	$active=1;
		$data = array(
           'f_status_login'=>$active
          );
      $ab=$this->db->where('f_userid',$use);
      $ab=$this->db->update('t_user',$data);
	  
	  if($ab=TRUE){
		  $date= date("Y-m-d");
		 
		 $data1 = array(
           'f_dateupdate'=>$date
          );
      $ab=$this->db->where('f_userid',$use);
      $ab=$this->db->update('t_user',$data1);
	  }
	//var_dump($use);
		//$active='1';
		//	$data = array(
		//		
		//		'f_status_login'=>$active
		//
		//	);
		//$this->db->where('f_userid',$use);
		//$this->db->update('t_user',$data); 
	//   return 33;
	//$a="UPDATE t_user SET f_status_login='1' where f_userid='".$use."' ";
	
}
	
	public function updatestatuslogin($use){
		$active='0';
		$data = array(
            'f_status_login'=>$active
           );
       $this->db->where('f_userid', $use);
       $this->db->update('t_user',$data); 
           return 1;
	}
	
	
    public function login($username, $password) {
        $query = '
            SELECT *
            FROM `t_user` 
            left join t_level   
            on t_level.t_levelid=t_user.f_userlevel
            where t_user.f_userid="' . $username . '"
            order by t_user.f_userid
            limit 0,1';

        $output = $this->db->query($query);

		if($output->num_rows() > 0){
        return $output->row();	
		} else {
			return 0 ;
        }
    }
	
	 public function date_expyre_change($use,$pass,$date)
    {
       $this->db->select('*');
       $this->db->from('t_user');
       $this->db->where('f_userid',$use);
       $query1=$this->db->get();
       $active=1;
       if ($query1->num_rows() > 0) {
           $data = array(
            'f_userpswd'=> $pass,
            'f_dateupdate'=>$date,
            'f_active'=>$active,

           );
       $this->db->where('f_userid', $use);
       $this->db->update('t_user',$data); 
     return 1;
       }else{
           return 0;
       }
   }
   public function password_change_create($use,$pass,$date)
    {
       $this->db->select('*');
       $this->db->from('t_user');
       $this->db->where('f_userid',$use);
       $query1=$this->db->get();
       if ($query1->num_rows() > 0) {
           $a=null;
           $data = array( 
               'f_userpswd'	=> $pass,
               'f_status_pswd'=>$a,
			   
           );
       $this->db->where('f_userid', $use);
       $this->db->update('t_user',$data); 
     return 1;
       }else{
           return 0;
       }
   }
   
    public function password_change_lupa_email($use,$pass)
    {
       $this->db->select('*');
       $this->db->from('t_user');
       $this->db->where('f_userid',$use);
       $query1=$this->db->get();
       if ($query1->num_rows() > 0) {
           $a=null;
           $data = array( 
               'f_userpswd'	=> $pass,
               'f_status_pswd'=>$a,
           );
       $this->db->where('f_userid', $use);
       $this->db->update('t_user',$data); 
     return 1;
       }else{
           return 0;
       }
   }

    public function assignmentHome() {
        $this->db2->select('f_assigndate');
        $this->db2->where('f_assigndate');
        $this->db2->order_by('f_assigndate', 'DESC LIMIT 1');
        $data = $this->db2->get('t_assignheader');
    }

    public function loadMenu() {

        $query = '
            select t_menuheader.icon, t_levelmdetail.f_levelid, t_menudetail.f_parentid, t_menuheader.f_menuname,t_levelmdetail.f_menuid, t_menudetail.f_itemname, t_menudetail.f_itemurl, t_levelmdetail.f_active,
                t_menudetail.clasz,t_menuheader.clasy
            from t_levelmdetail

            join t_menudetail
            on t_levelmdetail.f_menuid=t_menudetail.f_itemid and t_levelmdetail.f_levelid="' . $this->session->userdata('level') . '"

            left join t_menuheader
            on t_menuheader.f_menuid=t_menudetail.f_parentid

            right join t_levelmheader
            on t_levelmheader.f_menuid=t_menudetail.f_parentid and t_levelmheader.f_levelid="' . $this->session->userdata('level') . '"

            where t_menudetail.f_parentid is not null

            order by t_menudetail.f_parentid,t_levelmdetail.f_menuid';

        $output = $this->db->query($query);

        return $output->result();
    }

    public function updatestatus($idmenu, $idmenu2) {
        $data = array('clasz' => '');
        $data3 = array('clasy' => '');
        $data1 = array('clasz' => 'active');
        $data2 = array('clasy' => 'active');
        $this->db->update('t_menuheader', $data3);
        $this->db->where('f_menuid', $idmenu);
        $update2 = $this->db->update('t_menuheader', $data2);
        $this->db->update('t_menudetail', $data);
        $this->db->where('f_itemid', $idmenu2);
        $this->db->where('f_parentid', $idmenu);
        $update3 = $this->db->update('t_menudetail', $data1);
        if ($update3 === TRUE) {
            $respon = '1';
            return $respon;
        }
    }

    public function menuAccess($id_level_user) {

        /* $query = '
          SELECT t_menuheader.f_menuid, t_menuheader.f_menuname, t_menudetail.f_itemid, t_menudetail.f_itemname
          from t_menuheader
          join t_menudetail
          on t_menuheader.f_menuid=t_menudetail.f_parentid
          order by t_menuheader.f_menuid, t_menudetail.f_itemid
          '; */


        $query = '
            SELECT t_menuheader.f_menuid, t_levelmheader.f_menuid as Header_Check,
                t_menuheader.f_menuname, t_menudetail.f_itemid, t_levelmdetail.f_menuid as Item_Check, 
                t_menudetail.f_itemname, t_levelmheader.f_levelid,t_menudetail.clasz

            from t_menuheader 
            left join t_menudetail 
            on t_menudetail.f_parentid=t_menuheader.f_menuid

            left outer join t_levelmheader
            on t_menuheader.f_menuid=t_levelmheader.f_menuid and t_levelmheader.f_levelid = "' . $id_level_user . '"

            left outer join t_levelmdetail
            on t_levelmdetail.f_menuid=t_menudetail.f_itemid and t_levelmdetail.f_levelid="' . $id_level_user . '"


            UNION

            SELECT t_menuheader.f_menuid, t_levelmheader.f_menuid as Header_Check,
                t_menuheader.f_menuname, t_menudetail.f_itemid, t_levelmdetail.f_menuid as Item_Check, 
                t_menudetail.f_itemname, t_levelmheader.f_levelid,t_menudetail.clasz

            from t_menuheader 
            left join t_menudetail 
            on t_menudetail.f_parentid=t_menuheader.f_menuid

            right outer join t_levelmheader
            on t_menuheader.f_menuid=t_levelmheader.f_menuid and t_levelmheader.f_levelid = "' . $id_level_user . '"

            left outer join t_levelmdetail
            on t_levelmdetail.f_menuid=t_menudetail.f_itemid and t_levelmdetail.f_levelid="' . $id_level_user . '"

            where t_menuheader.f_menuid is not null

            order by f_menuid, f_itemid';


        $output = $this->db->query($query);

        return $output->result();
    }

    public function loadTipeUser() {
        $this->db->select(array('t_levelid', 'f_levelname'));
        $data = $this->db->get('t_level');
        return $data->result();
    }

    public function create_user($name, $id_user, $password, $email, $level, $status) {
        $data = array(
            'f_userid' => $id_user,
            'f_username' => $name,
            'f_userpswd' => $password,
            'f_email' => $email,
            'f_userlevel' => $level,
            'f_active' => $status,
            'f_usercreate' => "System",
            'f_datecreate' => date("Y-m-d"),
            'f_userupdate' => "System",
            'f_dateupdate' => date("Y-m-d")
        );

        if ($this->db->insert('t_user', $data)) {
            return 1;
        } else {
            return 0;
        }
    }

    public function create_level($level_name, $status,$value) {
        $data = array(
            'f_levelname' => $level_name,
            'f_active' => $status,
            'f_value' => $value,
            'f_usercreate' => "System",
            'f_datecreate' => date("Y-m-d"),
            'f_userupdate' => "System",
            'f_dateupdate' => date("Y-m-d")
        );

        $this->db->insert('t_level', $data);
    }

    public function create_headermenu($header_id, $headerName, $status) {
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

    public function update_headermenu($header_id, $headerName, $status) {
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
        $this->db->where('f_menuid', $header_id);
        $this->db->update('t_menuheader', $data);
    }

    public function update_user($name, $id_user, $level, $status) {
        $data = array(
            'f_userlevel' => $level,
            'f_active' => $status,
            'f_usercreate' => "System",
            'f_userupdate' => "System",
            'f_dateupdate' => date("Y-m-d")
        );
        $this->db->where('f_userid', $id_user);
        $this->db->update('t_user', $data);
    }

    public function get_userdata() {
        $data = $this->db->get('t_user');
        return $data->result();
    }

    public function get_level() {
        $data = $this->db->get('t_level');
        return $data->result();
    }

    public function get_headermenu() {
        $data = $this->db->get('t_menuheader');
        return $data->result();
    }

    public function get_userdata_one($id) {
        $data = $this->db->get_where('t_user', array('f_userid' => $id));
        return $data->row();
    }

    public function get_one_level($id) {
        $data = $this->db->get_where('t_level', array('t_levelid' => $id));
        return $data->row();
    }

   public function update_level_process($a,$b,$c,$d)
    {
        //var_dump($a,$b,$c);
        $data=array(
            'f_levelname'=>$b,
            'f_active'=>$c,
            'f_value'=>$d
        );
        $this->db->where ('t_levelid',$a);
        $this->db->update('t_level',$data);  
    }

    public function get_one_headermenu($id) {
        $data = $this->db->get_where('t_menuheader', array('f_menuid' => $id));
        return $data->row();
    }

    public function delete_user($id) {
        $this->db->where('f_userid', $id);
        $this->db->delete('t_user');
    }

    public function delete_multiuser($id) {
        foreach ($id as $item) {
            $this->db->where('f_userid', $item);
            $this->db->delete('t_user');
        }
    }

    public function delete_multilevel($id) {
        foreach ($id as $item) {
            $this->db->where('t_levelid', $item);
            $this->db->delete('t_level');
        }
		return 1;
    }

    public function delete_multiheader($id) {
        foreach ($id as $item) {
            $this->db->where('f_menuid', $item);
            $this->db->delete('t_menuheader');
        }
    }

    public function access_permission_process($id_level, $id_header, $id_item) {
        $this->db->where('f_levelid', $id_level);
        $this->db->delete('t_levelmheader');

        $this->db->where('f_levelid', $id_level);
        $this->db->delete('t_levelmdetail');

        foreach ($id_header as $item) {
            $data = array(
                "f_levelid" => $id_level,
                "f_menuid" => $item,
                "f_active" => "1",
                "f_usercreate" => "System",
                "f_datecreate" => date("Y-m-d"),
                "f_userupdate" => "System",
                "f_dateupdate" => date("Y-m-d"),
            );
            $this->db->insert('t_levelmheader', $data);
        }

        foreach ($id_item as $item) {
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

    public function get_employee() {
        $select = "select a.* from dbbsscollection.`bss_employee` as a  WHERE a.`nik` NOT IN (SELECT b.f_agentid FROM dbbsscollection.t_agent as b) AND a.nik NOT IN (SELECT c.f_userid FROM dbmgmtmenu.t_user as c )";
        $data = $this->db2->query($select)->result();
        return $data;
    }

    public function employee($nik) {
        $select = "select bss_employee.* from bss_employee where nik = '" . $nik . "'";
        $data = $this->db2->query($select)->row();
        return $data;
    }

}
