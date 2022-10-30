<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Model_log extends CI_Model {

    public function insertlogmenu($userid, $menu) {
        $datetime = date('Y-m-d H:i:s');
        $data1 = array(
            'f_userid' => $userid,
            'f_prangkat' => "WEB",
            'f_activity' => "acsess ".$menu,
            'f_date_time' => $datetime,
            'f_log' => 'log_menu'
        );
        $this->db2->insert('t_log_activity', $data1);
    }

	 public function insertlogloginuser($userid, $menu) {
        $datetime = date('Y-m-d H:i:s');
        $data1 = array(
            'f_userid' => $userid,
            'f_prangkat' => "WEB",
            'f_activity' => "acsess ".$menu,
            'f_date_time' => $datetime,
            'f_log' => 'log_menu'
        );
        $this->db2->insert('t_log_activity', $data1);
    }

    public function insertloglogoutinuser($userid, $menu) {
        $datetime = date('Y-m-d H:i:s');
        $data1 = array(
            'f_userid' => $userid,
            'f_prangkat' => "WEB",
            'f_activity' => "acsess ".$menu,
            'f_date_time' => $datetime,
            'f_log' => 'log_menu'
        );
       
    }
	
	
    public function logactivity($nik,$data ) {
        $datetime = date('Y-m-d H:i:s');
        $datainsert = array(
            'f_userid' => $nik,
            'f_activity' => $data,
            'f_date_time' => $datetime,
            'f_prangkat' => 'WEB',
            'f_log' => 'log_activity'
        );
        $this->db2->insert('t_log_activity', $datainsert);
    }

    public function getlogactivity($userid, $prangkat, $date1, $date2) {
        $b = explode("/", $date1, 3);
        $b1 = explode("/", $date2, 3);
        $c = $b[0];
        $c1 = $b[1];
        $c2 = $b[2];

        $c01 = $b1[0];
        $c11 = $b1[1];
        $c22 = $b1[2];
        $date11 = $c2 . "-" . $c . "-" . $c1;
        $date22 = $c22 . "-" . $c01 . "-" . $c11;
        $selectlog = "select * from t_log_activity where f_userid = '" . $userid . "' and f_prangkat like '%" . $prangkat . "%' and substr(f_date_time,1,10) between '" . $date11 . "' and '" . $date22 . "' order by f_id desc";
        $data = $this->db2->query($selectlog)->result();
        return $data;
    }

    public function getlogactivityall() {
        $selectlog = "select * from t_log_activity order by f_date_time desc";
        $data = $this->db2->query($selectlog)->result();
        return $data;
    }

    public function getlogprangkat() {
        $selectlog = "select f_prangkat from t_log_activity group by f_prangkat ";
        $data = $this->db2->query($selectlog)->result();
        return $data;
    }
    public function getloguser() {
        $selectlog = "select a.f_userid,b.full_name from t_log_activity as a join bss_employee as b on a.f_userid = b.nik GROUP BY a.f_userid";
        $data = $this->db2->query($selectlog)->result();
        return $data;
    }
}
