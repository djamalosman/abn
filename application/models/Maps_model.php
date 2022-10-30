<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Maps_model extends CI_Model {

    public function get_location(){
        $query0 = "SELECT `id`, `user`, `lat`, `lng`, `datetime` FROM `location` WHERE LEFT(`datetime`, 8) = '20190209'";
    }
    
    public function getlocation(){
        $select = "select * from location where user <> '' and lat <> '' and lng <> '' group by user order by datetime desc ";
        $data = $this->db2->query($select)->result();
        return $data;
    }
    public function getlocationbyagent($agent,$datestart,$dateend){
        $b = explode("/", $datestart, 3);
        $b1 = explode("/", $dateend, 3);
        $c = $b[0];
        $c1 = $b[1];
        $c2 = $b[2];
        
        $c01 = $b1[0];
        $c11 = $b1[1];
        $c22 = $b1[2];
        $date11 = $c2 . $c .  $c1;
        $date22 = $c22 . $c01 .  $c11;
        $select = "select * from location where user = '".$agent."' and substr(datetime,1,9) between ".$date11." and ".$date22;
        $data = $this->db2->query($select)->result();
        return $data;
    }
	
	 public function get_agent() {
        $this->db2->where('f_active', 1);
        $agent = $this->db2->get('t_agent');
        return $agent->result();
    }
}
