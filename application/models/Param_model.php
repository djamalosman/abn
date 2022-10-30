<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Param_model extends CI_Model {

	 public function loadMparam() {
        $data1 = $this->db2->get('t_m_param');
        return $data1;
    }
	
	public function loadparam() {
        $this->db2->where('f_active', '0');
        $data1 = $this->db2->get('t_parameter');
        return $data1;
        // $data1="SELECT *,view_param.f_untuk FROM t_m_param as get_param JOIN t_parameter AS view_param ON view_param.f_id=get_param.f_id where view_param.f_active=0";
        //    $data = $this->db2->query($data1)->result();
        //    return $data;
    }

}
