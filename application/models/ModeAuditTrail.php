<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ModeAuditTrail extends CI_Model {


    //tabel bss_employee
    public function getActionParam_I_bss_employe($tabel,$start,$end,$action) {
        $this->db2->select('*');
        $this->db2->from($tabel);
        $this->db2->where('action', $action);
        $this->db2->where('timestam >=', $start);
        $this->db2->where('timestam <=', $end);
        $data1 = $this->db2->get()->result();
        return $data1;
    }
    public function getActionParam_U_bss_employe($tabel,$start,$end,$action) {
        $this->db2->select('*');
        $this->db2->from($tabel);
        $this->db2->where('action', $action);
        $this->db2->where('timestam >=', $start);
        $this->db2->where('timestam <=', $end);
        $data1 = $this->db2->get()->result();
        return $data1;
    }
    //end bss_employee

    //tabel t_agent
    public function getActionParam_I_t_agent($tabel,$start,$end,$action) {
        $this->db2->select('*');
        $this->db2->from($tabel);
        $this->db2->where('action', $action);
        $this->db2->where('timestam >=', $start);
        $this->db2->where('timestam <=', $end);
        $data1 = $this->db2->get()->result();
        return $data1;
    }
    public function getActionParam_U_t_agent($tabel,$start,$end,$action) {
      $this->db2->select('*');
      $this->db2->from($tabel);
      $this->db2->where('action', $action);
      $this->db2->where('timestam >=', $start);
      $this->db2->where('timestam <=', $end);
      $data1 = $this->db2->get()->result();
      return $data1;
		echo'masuk';
		
    }
    //end t_agent
	
	  //tabel t_user
        public function getActionParam_I_t_user($tabel,$start,$end,$action) {
            $this->db->select('*');
            $this->db->from($tabel);
            $this->db->where('action', $action);
            $this->db->where('timestam >=', $start);
            $this->db->where('timestam <=', $end);
            $data1 = $this->db->get()->result();
            return $data1;
        }
        public function getActionParam_U_t_user($tabel,$start,$end,$action) {
          $this->db->select('*');
          $this->db->from($tabel);
          $this->db->where('action', $action);
          $this->db->where('timestam >=', $start);
          $this->db->where('timestam <=', $end);
          $data1 = $this->db->get()->result();
          return $data1;
         //var_dump($data1);
            
        }
        public function getActionParam_D_t_user($tabel,$start,$end,$action) {
            $this->db->select('*');
            $this->db->from('audit_t_user');
            $this->db->where('action', $action);
            $this->db->where('timestam >=', $start);
            $this->db->where('timestam <=', $end);
            $data1 = $this->db->get()->result();
            return $data1;
             // echo'masuk';
              
          }
        //end t_agent

    public function getTabelParam() {
        $aud='AUD';
        $this->db2->where('f_type',$aud);
        $data1 = $this->db2->get('t_parameter');
        return $data1;
    }

    public function getActionParam() {
        $action='AUT';
        $this->db2->where('f_type',$action);
        $data1 = $this->db2->get('t_parameter');
        return $data1;
    }

    public function getActionParam_I($tabel,$start,$end,$action) {
        $this->db->select('*');
        $this->db->from($tabel);
        $this->db->where('action', $action);
        $this->db->where('timestam >=', $start);
        $this->db->where('timestam <=', $end);
        $data1 = $this->db->get()->result();
        return $data1;
    }


    public function getActionParam_D($tabel,$start,$end,$action) {
        $this->db->select('*');
        $this->db->from('audit_t_user');
        $this->db->where('action', $action);
        $this->db->where('timestam >=', $start);
        $this->db->where('timestam <=', $end);
        $data1 = $this->db->get()->result();
        //print_r($data1);
        return $data1;

    }

}