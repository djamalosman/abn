<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Modelinhouse extends CI_Model {

    public function get_cad() {
        $query1 = "select (SELECT MAX(g.f_tanggal_activity) from t_inhouse as g WHERE g.f_cif = a.NomorNasabah) as tglcall,(SELECT COUNT(f_cif) from t_inhouse as i WHERE i.f_cif = a.NomorNasabah) as jumlahcall,MAX(a.JmlHariTunggakan) as dpd,(SELECT b.COMPANY_NAME from bss_company as b WHERE b.ID = a.KodeCabang ) as cabang ,a.* FROM bss_cad as a group by NomorNasabah";
        $data = $this->db2->query($query1)->result();
        return $data;
    }
	
	
    
    public function get_cad2($cif){
        $query1 = "select MAX(a.JmlHariTunggakan) as dpd,(SELECT b.COMPANY_NAME from bss_company as b WHERE b.ID = a.KodeCabang ) as cabang, (SELECT d.SMS_1 from bss_customer as d WHERE d.ID = a.NomorNasabah) as no_tlp ,( SELECT e.NAME from bss_dept_acc_officer as e WHERE e.ID = a.AO_Code) as ao_name, a.* FROM bss_cad as a WHERE a.NomorNasabah = '".$cif."' group by a.NomorNasabah";
        $data = $this->db2->query($query1)->row();
        return $data;
    }
    public function get_tunggakan($cif){
//        $query1 = "select a.* from bss_coll_pd_balaces as a JOIN bss_cad as b ON a.ID = b.ID where b.NomorNasabah = '".$cif."'";
        $query1 = "SELECT a.* from bss_coll_pd_balaces as a WHERE a.ID in (SELECT b.ID FROM bss_cad as b WHERE b.NomorNasabah = '".$cif."' ) ";
        $data = $this->db2->query($query1)->result();
        return $data;
    }
    public function get_fasilitas($cif){
//        $query1 = "select a.* from bss_coll_pd_balaces as a JOIN bss_cad as b ON a.ID = b.ID where b.NomorNasabah = '".$cif."'";
        $query1 = "SELECT (SELECT c.DESCRIPTION from bss_category as c WHERE c.ID = a.LD_CATEG ) as name ,a.* FROM bss_ld_sub_product as a WHERE a.ID in (SELECT b.FacilityType FROM bss_cad as b WHERE NomorNasabah = '".$cif."'  )";
        $data = $this->db2->query($query1)->result();
        return $data;
    }
    
    public function get_jaminan($cif){
        $select = "SELECT A.id , A.LimitID, NomorNasabah as f_cif, D.typeid, D.type_description as f_jaminan,
                    C.COLLATERAL_TYPE, C.DESCRIPTION Deskripsi,C.ADDRESS as f_location,   
                    format(C.NOMINAL_VALUE,2) as f_value, C.EXECUTION_VALUE  FROM bss_cad A
                    INNER JOIN bss_collateral_right_det B ON A.LimitID = B.limit_reference
                    INNER JOIN bss_collateral C on C.ID like (CONCAT(B.id,'%'))
                    INNER JOIN bss_collateral_code D ON D.id = C.COLLATERAL_TYPE
                    where NomorNasabah='" . $cif . "'";
        $data = $this->db2->query($select)->result();
        return $data;
    }
    
    public function get_total_tunggakan($cif){
        $select = " SELECT format(SUM(a.TOTAL_DUE),2) as total_tunggakan, a.* from bss_coll_pd_balaces as a WHERE a.ID in (SELECT b.ID FROM bss_cad as b WHERE b.NomorNasabah = '".$cif."')";
        $data = $this->db2->query($select)->row();
        return $data;
    }
    
    public function insert($data){
        $insert = $this->db2->insert('t_inhouse',$data);
        if($insert == TRUE){
            return 1;
        } else {
            return 0;
        }
        
    }
    
    public function get_hasil_inhouse($cif){
        $select = "select * from t_inhouse where f_cif = '".$cif."'";
        $data = $this->db2->query($select)->result();
        return $data;
    }

    
}
