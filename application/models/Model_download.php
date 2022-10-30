<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Model_download extends CI_Model {

    public function get_excelemployee(){
        $select = "select * from bss_employee";
        $data = $this->db2->query($select)->result();
        return $data;
    }
	public function get_usermobile(){
        $select = "select a.*,(select COMPANY_NAME from bss_company as b where b.ID = a.f_branch_id) as cabang from t_agent as a";
        $data = $this->db2->query($select)->result();
        return $data;
    }
	
	public function get_userweb(){
		$select = "select a.*,(select b.f_levelname from t_level as b where b.t_levelid = a.f_userlevel) as description from t_user as a";
        $data = $this->db->query($select)->result();
        return $data;
	}
	
	 public function loadMparam() {
        $data1 = $this->db2->get('t_m_param')->result();
        return $data1;
    }
	
	public function LoadParamall() {
        $data1 = $this->db2->get('t_parameter')->result();
        return $data1;
    }
	
	public function logactivity() {
		$select = "select (select b.f_username from dbmgmtmenu.t_user as b where b.f_userid = a.f_userid) as nama,a.* from t_log_activity as a";
        //$data1 = $this->db2->get('t_log_activity')->result();
        $data1 = $this->db2->query($select)->result();
        return $data1;
    }
	
	public function get_branch(){
		$select = "select * from bss_company";
        $data = $this->db2->query($select)->result();
        return $data;
	}
	
	
	public function get_list_debitur($userid) {
        $select = "select b.* from t_dep_head as b where b.f_nik = '" . $userid . "'";
        $a = $this->db2->query($select)->num_rows();
        if ($a > 0) {
            $select3 = "select a.NomorNasabah,a.NomorRekening,a.NamaDebitur,a.ID,a.JmlHariTunggakan as DPD, a.FacilityType,a.PlafondAmount,(SELECT b.DESCRIPTION FROM bss_ld_sub_product as b WHERE b.ID = a.FacilityType) as ket_facility, a.STARTDATEPLAFOND,a.DATEEXPIRED,DAY(a.STARTDATEPLAFOND) as cycle, TIMESTAMPDIFF(MONTH,a.STARTDATEPLAFOND,a.DATEEXPIRED) as tenor,a.KodeCabang,(select q.nama_cabang from t_m_account as q where q.LD_Temenos = a.ID) as Cabang, a.JmlHariTunggakan as DPD_EOM,a.COL as bucked,format((SELECT d.ANNUITY_REPAY_AMT FROM bss_ld as d WHERE d.ID = a.ID) , 2) as angsuran ,format(a.BakiDebet,2) as BakiDebet,format((SELECT f.DuePokok FROM t_m_account as f WHERE f.LD_Temenos = a.ID),2) as tunggakan_pokok ,format(a.DueBunga,2) as bunga,format((SELECT g.denda from t_m_account as g WHERE g.LD_Temenos = a.ID),2) as denda,format((SELECT sum(h.denda + h.DueBunga + h.DuePokok) FROM t_m_account as h WHERE h.LD_Temenos = a.ID),2) as total_tagihan ,(SELECT i.OPEN_ACTUAL_BAL FROM bss_account as i WHERE i.ID = a.RepayPrincSettleAcc) as saldo_tabungan, (SELECT j.L_TGL_RES from bss_limit as j WHERE j.ID=a.LimitID) as tgl_restru ,(SELECT k.L_NO_RES from bss_limit as k WHERE k.ID=a.LimitID) as restru_ke, (SELECT l.ADDRESS from bss_customer as l WHERE l.ID = a.NomorNasabah) as alamat,(SELECT m.POST_CODE from bss_customer as m WHERE m.ID = a.NomorNasabah) as postcode,(SELECT n.SMS_1 from bss_customer as n WHERE n.ID = a.NomorNasabah) as notlp,(SELECT o.EMAIL_1 from bss_customer as o WHERE o.ID = a.NomorNasabah) as email from bss_cad as a where a.KodeCabang in (SELECT g.f_kode_cabang FROM t_detail_cabang_dephead as g where g.f_nik = '".$userid."' ) and a.NomorNasabah not in (select h.f_cif from t_assignment as h ) and a.JmlHariTunggakan >= 30 group by a.NomorNasabah order by Max(a.JmlHariTunggakan)";
            $data = $this->db2->query($select3)->result();
        } else {
            $select3 = "select a.NomorNasabah,a.NomorRekening,a.NamaDebitur,a.ID,a.JmlHariTunggakan as DPD, a.FacilityType,a.PlafondAmount,(SELECT b.DESCRIPTION FROM bss_ld_sub_product as b WHERE b.ID = a.FacilityType) as ket_facility, a.STARTDATEPLAFOND,a.DATEEXPIRED,DAY(a.STARTDATEPLAFOND) as cycle, TIMESTAMPDIFF(MONTH,a.STARTDATEPLAFOND,a.DATEEXPIRED) as tenor,a.KodeCabang,(select q.nama_cabang from t_m_account as q  where q.LD_Temenos = a.ID) as Cabang,a.JmlHariTunggakan as DPD_EOM,a.COL as bucked,format((SELECT d.ANNUITY_REPAY_AMT FROM bss_ld as d WHERE d.ID = a.ID) , 2) as angsuran ,format(a.BakiDebet,2) as BakiDebet,format((SELECT f.DuePokok FROM t_m_account as f WHERE f.LD_Temenos = a.ID),2) as tunggakan_pokok ,format(a.DueBunga,2) as bunga,format((SELECT g.denda from t_m_account as g WHERE g.LD_Temenos = a.ID),2) as denda,format((SELECT sum(h.denda + h.DueBunga + h.DuePokok) FROM t_m_account as h WHERE h.LD_Temenos = a.ID),2) as total_tagihan ,(SELECT i.OPEN_ACTUAL_BAL FROM bss_account as i WHERE i.ID = a.RepayPrincSettleAcc) as saldo_tabungan, (SELECT j.L_TGL_RES from bss_limit as j WHERE j.ID=a.LimitID) as tgl_restru ,(SELECT k.L_NO_RES from bss_limit as k WHERE k.ID=a.LimitID) as restru_ke, (SELECT l.ADDRESS from bss_customer as l WHERE l.ID = a.NomorNasabah) as alamat,(SELECT m.POST_CODE from bss_customer as m WHERE m.ID = a.NomorNasabah) as postcode,(SELECT n.SMS_1 from bss_customer as n WHERE n.ID = a.NomorNasabah) as notlp,(SELECT o.EMAIL_1 from bss_customer as o WHERE o.ID = a.NomorNasabah) as email from bss_cad as a where a.NomorNasabah not in (SELECT z.f_cif from t_assignment as z) GROUP BY a.NomorNasabah ORDER by MAX(a.JmlHariTunggakan)";
			$data = $this->db2->query($select3)->result();
        }
        return $data;
    }
	
	
	public function dataassigment($iduser) {
		$selectdepthead = "select * from t_dep_head where f_nik = '".$iduser."'";
		$hasil = $this->db2->query($selectdepthead)->num_rows();
		if($hasil > 0){
			$selectassignment = "select 
(SELECT c.COMPANY_NAME from bss_company as c WHERE c.ID = cad.KodeCabang)  as cabang, assig.*,cad.*,
(select d.ket_facility from t_m_account as d where d.LD_Temenos = cad.ID) as ket_facility,DAY(cad.STARTDATEPLAFOND)as cycle ,agent.f_agentid,agent.f_agentname,
(SELECT e.PlafondAmount from t_m_account as e WHERE e.NomorNasabah = assig.f_cif GROUP BY e.NomorNasabah ) AS PlafondAmount,
(SELECT f.BakiDebet from t_m_account as f WHERE f.NomorNasabah = assig.f_cif GROUP BY f.NomorNasabah) AS BakiDebet,
(SELECT g.angsuran from t_m_account as g WHERE g.NomorNasabah = assig.f_cif GROUP BY g.NomorNasabah) AS Angsuran,
(SELECT h.DueBunga from t_m_account as h WHERE h.NomorNasabah = assig.f_cif GROUP BY h.NomorNasabah) AS DueBunga,
(SELECT i.DuePokok from t_m_account as i WHERE i.NomorNasabah = assig.f_cif GROUP BY i.NomorNasabah) AS DuePokok,
(SELECT j.denda from t_m_account as j WHERE j.NomorNasabah = assig.f_cif GROUP BY j.NomorNasabah) AS denda,
(SELECT k.Available_Funds from t_m_account as k WHERE k.NomorNasabah = assig.f_cif GROUP BY k.NomorNasabah) AS Available_Funds,
(SELECT l.lock_amt from t_m_account as l WHERE l.NomorNasabah = assig.f_cif GROUP BY l.NomorNasabah) AS lock_amt,
(SELECT m.IntRate from t_m_account as m WHERE m.NomorNasabah = assig.f_cif GROUP BY m.NomorNasabah) AS IntRate,
(SELECT N.DPD_EOM from t_m_account as N WHERE N.NomorNasabah = assig.f_cif GROUP BY N.NomorNasabah) AS DPD_EOM
from 
t_assignment as assig
JOIN t_m_account as e on e.NomorNasabah=assig.f_cif
JOIN bss_cad as cad on assig.f_cif = cad.NomorNasabah 
JOIN t_agent as agent on agent.f_agentid = assig.f_agent 
where cad.KodeCabang in 
(select f_kode_cabang from t_detail_cabang_dephead where f_nik = '".$iduser."')  group by cad.NomorNasabah";
			$data = $this->db2->query($selectassignment);
			return $data->result();
		} else {
			 $query = "select 
(SELECT c.COMPANY_NAME from bss_company as c WHERE c.ID = cad.KodeCabang)  as cabang, assig.*,cad.*,
(select d.ket_facility from t_m_account as d where d.LD_Temenos = cad.ID) as ket_facility,DAY(cad.STARTDATEPLAFOND)as cycle ,agent.f_agentid,agent.f_agentname,
(SELECT e.PlafondAmount from t_m_account as e WHERE e.NomorNasabah = assig.f_cif GROUP BY e.NomorNasabah ) AS PlafondAmount,
(SELECT f.BakiDebet from t_m_account as f WHERE f.NomorNasabah = assig.f_cif GROUP BY f.NomorNasabah) AS BakiDebet,
(SELECT g.angsuran from t_m_account as g WHERE g.NomorNasabah = assig.f_cif GROUP BY g.NomorNasabah) AS Angsuran,
(SELECT h.DueBunga from t_m_account as h WHERE h.NomorNasabah = assig.f_cif GROUP BY h.NomorNasabah) AS DueBunga,
(SELECT i.DuePokok from t_m_account as i WHERE i.NomorNasabah = assig.f_cif GROUP BY i.NomorNasabah) AS DuePokok,
(SELECT j.denda from t_m_account as j WHERE j.NomorNasabah = assig.f_cif GROUP BY j.NomorNasabah) AS denda,
(SELECT k.Available_Funds from t_m_account as k WHERE k.NomorNasabah = assig.f_cif GROUP BY k.NomorNasabah) AS Available_Funds,
(SELECT l.lock_amt from t_m_account as l WHERE l.NomorNasabah = assig.f_cif GROUP BY l.NomorNasabah) AS lock_amt,
(SELECT m.IntRate from t_m_account as m WHERE m.NomorNasabah = assig.f_cif GROUP BY m.NomorNasabah) AS IntRate,
(SELECT N.DPD_EOM from t_m_account as N WHERE N.NomorNasabah = assig.f_cif GROUP BY N.NomorNasabah) AS DPD_EOM
from 
t_assignment as assig
JOIN t_m_account as e on e.NomorNasabah=assig.f_cif
JOIN bss_cad as cad on assig.f_cif = cad.NomorNasabah 
JOIN t_agent as agent on agent.f_agentid = assig.f_agent group by cad.NomorNasabah";
			 $data = $this->db2->query($query);
			 return $data->result();
		}
    
       
    }


	
	 public function datadepthead() {
        $selectdepthead = "SELECT b.*,(select c.f_username from dbmgmtmenu.t_user as c where c.f_userid = b.f_nik) as f_nama FROM t_detail_cabang_dephead as b ";
        $hasil = $this->db2->query($selectdepthead)->result();
        return $hasil;
        
    }
    public function getsmonitoringsp() {
        $selectsp = "SELECT * from t_generate_sp";
        $hasil = $this->db2->query($selectsp)->result();
        return $hasil;
        
    }
    public function getsmonitoringspe() {
        $selectsp = "SELECT * from t_generate_spe";
        $hasil = $this->db2->query($selectsp)->result();
        return $hasil;
        
    }
    public function getspe() {
        $selectsp = "SELECT * from t_param_spe";
        $hasil = $this->db2->query($selectsp)->result();
        return $hasil;
        
    }
	public function get_kunjungan() {
        $selectkj = "SELECT * from t_kunjungan AS a LEFT JOIN t_agent AS b on a.f_agentid=b.f_agentid  ";
        $hasil = $this->db2->query($selectkj)->result();
        return $hasil;
        
    }
	
	 public function get_cad() {
        
//        select (SELECT MAX(g.f_tanggal_activity) from t_inhouse as g WHERE g.f_cif = a.NomorNasabah) as tglcall,(SELECT COUNT(f_cif) from t_inhouse as i WHERE i.f_cif = a.NomorNasabah) as jumlahcall,MAX(a.JmlHariTunggakan) as dpd,(SELECT b.COMPANY_NAME from bss_company as b WHERE b.ID = a.KodeCabang ) as cabang ,a.* FROM bss_cad as a LEFT JOIN t_inhouse as b on a.NomorNasabah = b.f_cif group by NomorNasabah 
        $query1 = "select (SELECT MAX(g.f_tanggal_activity) from t_inhouse as g WHERE g.f_cif = a.NomorNasabah) as tglcall,(SELECT COUNT(f_cif) from t_inhouse as i WHERE i.f_cif = a.NomorNasabah) as jumlahcall,MAX(a.JmlHariTunggakan) as dpd,(SELECT b.COMPANY_NAME from bss_company as b WHERE b.ID = a.KodeCabang ) as cabang ,a.* FROM bss_cad as a group by NomorNasabah";
        $data = $this->db2->query($query1)->result();
        return $data;
    }
    public function get_inhouse() {
        
//        select (SELECT MAX(g.f_tanggal_activity) from t_inhouse as g WHERE g.f_cif = a.NomorNasabah) as tglcall,(SELECT COUNT(f_cif) from t_inhouse as i WHERE i.f_cif = a.NomorNasabah) as jumlahcall,MAX(a.JmlHariTunggakan) as dpd,(SELECT b.COMPANY_NAME from bss_company as b WHERE b.ID = a.KodeCabang ) as cabang ,a.* FROM bss_cad as a LEFT JOIN t_inhouse as b on a.NomorNasabah = b.f_cif group by NomorNasabah 
        $query1 = "SELECT (select b.NamaDebitur from bss_cad as b where b.NomorNasabah = a.f_cif GROUP by b.NomorNasabah) as namadebitur,a.* FROM t_inhouse as a";
        $data = $this->db2->query($query1)->result();
        return $data;
    }
}

