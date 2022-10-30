<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Modelspesial_stage extends CI_Model {

//assignment
public function get_special_stage() {
    //$data = $this->db2->where('f_status', 1);
    //$data="SELECT a.NomorNasabah,a.NamaDebitur,a.LD_Temenos from t_m_account AS a where a.f_flagspecialstage =''";
   $select = "SELECT a.NomorNasabah,a.NamaDebitur,a.LD_Temenos from t_m_account AS a where a.LD_Temenos not in (select b.f_loanid from t_specialstage as b )";
     $data = $this->db2->query($select);
    return $data->result();
    //return $this->db2->query($data)->result();
}

public function special_stage_view() {
    $query = "SELECT * from t_specialstage ";

    $data = $this->db2->query($query);
    return $data->result();
}
public function delete_idspecialstage($id) {
    foreach ($id as $item) {
        $this->db2->where('f_loanid', $item);
        $this->db2->delete('t_specialstage');
    }
}
public function cekcifspecialstage($a) {
    //$data = $this->db2->where('f_status', 1);
     $query = "SELECT LD_Temenos FROM t_m_account where LD_Temenos='$a'";
    // return $data->result();
    $data = $this->db2->query($query);

    if ($data->num_rows() > 0) {
        return 1;
    } else {
        return 0;
    }
}


public function specialstage_update($_result,$loanid) {
    //var_dump($a,$bb,$hasil1,$hasil2,$c);
           
            $data1=$this->db2->where('f_loanid',$loanid);
            $data1=$this->db2->delete('t_specialstage');

            $this->db2->insert_batch('t_specialstage', $_result);
           

            //$a="UPDATE t_m_account SET f_flagspecialstage ='".$b."' where LD_Temenos='".$bb."' ";
        
            // $this->sucess_input_specialstage();
            //redirect('content/read_actionsp_page');
        }

public function updateInsertspecialstage($_result,$hasil2,$bb) {
    //var_dump($a,$bb,$hasil1,$hasil2,$c);
           
            $data2=$this->db2->insert_batch('t_specialstage', $_result);
           

            //$a="UPDATE t_m_account SET f_flagspecialstage ='".$b."' where LD_Temenos='".$bb."' ";
        
            // $this->sucess_input_specialstage();
            //redirect('content/read_actionsp_page');
        }
        public function view_edit_specialstage($a) {
            //print_r($a);
            $data = $this->db2->where('f_loanid', $a);
            $data = $this->db2->get('t_specialstage');
            return $data->row();
        }

public function getspecialstage($a) {
    //print_r($a);
    $data = $this->db2->where('LD_Temenos', $a);
    $data = $this->db2->get('t_m_account');
    return $data->row();
}

public function getparamspecialstage() {
    $query1 ="SELECT a.f_desc,b.f_type FROM t_parameter AS  a LEFT JOIN t_m_param AS b on a.f_type=b.f_type  WHERE a.f_type LIKE 'SPS%'";
    $data = $this->db2->query($query1);
   return $data->result();
}

   
	

    
}
