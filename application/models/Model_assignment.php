<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Model_assignment extends CI_Model {

//assignment
    public function view_dataassigment($iduser) {
		
		$selectdepthead = "select * from t_detail_cabang_dephead where f_nik = '".$iduser."'";
		$hasil = $this->db2->query($selectdepthead)->num_rows();
		if($hasil > 0){
			$selectassignment = "select (SELECT c.COMPANY_NAME from bss_company as c WHERE c.ID = cad.KodeCabang)  as cabang, assig.*,cad.*,(select d.ket_facility from t_m_account as d where d.LD_Temenos = cad.ID) as ket_facility,DAY(cad.STARTDATEPLAFOND) as cycle ,agent.f_agentid,agent.f_agentname from t_assignment as assig JOIN bss_cad as cad on assig.f_cif = cad.NomorNasabah JOIN t_agent as agent on agent.f_agentid = assig.f_agent where cad.KodeCabang in (select f_kode_cabang from t_detail_cabang_dephead where f_nik = '".$iduser."') group by cad.NomorNasabah";
			$data = $this->db2->query($selectassignment);
			return $data->result();
		} else {
			 $query = "select (SELECT c.COMPANY_NAME from bss_company as c WHERE c.ID = cad.KodeCabang)  as cabang, assig.*,cad.*,(select d.ket_facility from t_m_account as d where d.LD_Temenos = cad.ID) as ket_facility,DAY(cad.STARTDATEPLAFOND) as cycle ,agent.f_agentid,agent.f_agentname from t_assignment as assig JOIN bss_cad as cad on assig.f_cif = cad.NomorNasabah JOIN t_agent as agent on agent.f_agentid = assig.f_agent group by cad.NomorNasabah";
			 $data = $this->db2->query($query);
			 return $data->result();
		}
//        $query = "select *,agent.f_agentid,agent.f_agentname from t_assignment as assig JOIN t_accountlist_baru as accbaru on assig.f_id_debitur = accbaru.f_id JOIN t_agent as agent on agent.f_agentid=assig.f_agent WHERE assig.f_status >='1'";
       
    }
	
    public function get_agent($userid) {
        $select = "select * from t_agent where f_branch_id in (select f_kode_cabang from t_detail_cabang_dephead where f_nik = '" . $userid . "') and f_active = 1 ";
        //$this->db2->where('f_active', 1);
        $agent = $this->db2->query($select)->result();
        return $agent;
    }

    public function assign_dibutur($id, $agent) {
        $jmlh = sizeof($id);
        $lenght = 0;
        foreach ($id as $item) {
            $query = "SELECT a.* FROM bss_cad as a WHERE a.NomorNasabah = '" . $item . "' GROUP BY a.NomorNasabah ORDER BY MAX(a.JmlHariTunggakan)";
            $b = $this->db2->query($query)->row();
            $cif = $b->NomorNasabah;
            $querycek = "SELECT * FROM t_assignment WHERE f_cif = '" . $cif . "'";
            $cek = $this->db2->query($querycek)->num_rows();
            if ($cek == 0) {
                $queryassign = "INSERT INTO `t_assignment`( `f_cif`, `f_agent`,"
                        . " f_tgl_tugas ,`f_user_create`, `f_date_cerate`) VALUES ('" . $cif . "','" . $agent . "','" . date('Y-m-d H:i:s') . "','" . $this->session->userdata('username') . "','" . date('Y-m-d H:i:s') . "')";
                $insert = $this->db2->query($queryassign);
                if ($insert == TRUE) {
                    $hasil = 1;

                    $lenght++;
                } else {
                    $hasil = 0;
                }
            } else {
                $hasil = 0;
            }
        }
        if ($jmlh == $lenght) {
            return $hasil = 1;
        } else {
            return $hasil = 0;
        }
    }

	public function get_list_debitur($userid) {

        // where a.JmlHariTunggakan >= 30 group by a.NomorNasabah order by Max(a.JmlHariTunggakan)
        //$data = $this->db2->query($select3)->result();

        $select = "select b.* from t_detail_cabang_dephead as b where b.f_nik = '" . $userid . "'";
        $b = $this->db2->query($select)->row();
        $a = $this->db2->query($select)->num_rows();
            $selectlevel = "select c.f_value from t_level as a left join t_user as b on a.t_levelid = b.f_userlevel left join dbbsscollection.t_parameter as c on a.f_value = c.f_id where b.f_userid = '" . $userid . "'";
        $level = $this->db->query($selectlevel)->row();
        if ($a > 0) {
            //$select3 = "SELECT a.NomorNasabah ,a.NomorRekening ,a.NamaDebitur,a.ID,MAX(a.JmlHariTunggakan) as DPD,a.FacilityType,a.PlafondAmount,f.ket_facility,a.STARTDATEPLAFOND,a.DATEEXPIRED,DAY(a.STARTDATEPLAFOND) as cycle,TIMESTAMPDIFF(MONTH,a.STARTDATEPLAFOND,a.DATEEXPIRED) as tenor,a.KodeCabang,f.DPD_EOM,a.col as bucked,format(d.ANNUITY_REPAY_AMT,2) as angsuran,a.BakiDebet,format(f.DuePokok,2) as tunggakan_pokok,format(a.DueBunga,2) as bunga,format(f.denda,2) as denda,format(sum(f.DueBunga + f.DuePokok + f.denda),2) as total_tagihan,b.OPEN_ACTUAL_BAL as saldo_tabungan ,c.L_TGL_RES as tgl_restru ,c.L_NO_RES as restru_ke,e.ADDRESS as alamat,e.POST_CODE as postcode,e.SMS_1 as notlp,e.EMAIL_1 as email FROM bss_cad as a left JOIN bss_account as b on b.ID = a.RepayPrincSettleAcc left JOIN bss_limit as c ON c.ID = a.LimitID left JOIN bss_ld as d on d.ID = a.ID LEFT JOIN bss_customer as e ON e.ID = a.NomorNasabah left JOIN t_m_account as f on f.NomorNasabah = a.NomorNasabah where a.`KodeCabang` in (SELECT g.f_kode_cabang FROM t_detail_cabang_dephead as g where g.f_nik = '".$userid."' ) and a.NomorNasabah not in (select h.f_cif from t_assignment as h ) and a.JmlHariTunggakan >= 30 group by a.NomorNasabah order by Max(a.JmlHariTunggakan)";
            $select3 = "select a.NomorNasabah,a.NomorRekening,a.NamaDebitur,a.ID,a.JmlHariTunggakan as DPD, a.FacilityType,a.PlafondAmount,(SELECT b.DESCRIPTION FROM bss_ld_sub_product as b WHERE b.ID = a.FacilityType) as ket_facility, a.STARTDATEPLAFOND,a.DATEEXPIRED,DAY(a.STARTDATEPLAFOND) as cycle, TIMESTAMPDIFF(MONTH,a.STARTDATEPLAFOND,a.DATEEXPIRED) as tenor,a.KodeCabang,(select q.nama_cabang from t_m_account as q where q.LD_Temenos = a.ID) as Cabang, a.JmlHariTunggakan as DPD_EOM,a.COL as bucked,format((SELECT d.ANNUITY_REPAY_AMT FROM bss_ld as d WHERE d.ID = a.ID) , 2) as angsuran ,format(a.BakiDebet,2) as BakiDebet,format((SELECT f.DuePokok FROM t_m_account as f WHERE f.LD_Temenos = a.ID),2) as tunggakan_pokok ,format(a.DueBunga,2) as bunga,format((SELECT g.denda from t_m_account as g WHERE g.LD_Temenos = a.ID),2) as denda,format((SELECT sum(h.denda + h.DueBunga + h.DuePokok) FROM t_m_account as h WHERE h.LD_Temenos = a.ID),2) as total_tagihan ,(SELECT i.OPEN_ACTUAL_BAL FROM bss_account as i WHERE i.ID = a.RepayPrincSettleAcc) as saldo_tabungan, (SELECT j.L_TGL_RES from bss_limit as j WHERE j.ID=a.LimitID) as tgl_restru ,(SELECT k.L_NO_RES from bss_limit as k WHERE k.ID=a.LimitID) as restru_ke, (SELECT l.ADDRESS from bss_customer as l WHERE l.ID = a.NomorNasabah) as alamat,(SELECT m.POST_CODE from bss_customer as m WHERE m.ID = a.NomorNasabah) as postcode,(SELECT n.SMS_1 from bss_customer as n WHERE n.ID = a.NomorNasabah) as notlp,(SELECT o.EMAIL_1 from bss_customer as o WHERE o.ID = a.NomorNasabah) as email from bss_cad as a where a.KodeCabang in (SELECT g.f_kode_cabang FROM t_detail_cabang_dephead as g where g.f_nik = '" . $userid . "' ) and a.NomorNasabah not in (select h.f_cif from t_assignment as h ) and a.JmlHariTunggakan " . $level->f_value . " group by a.NomorNasabah order by Max(a.JmlHariTunggakan)";
            $data = $this->db2->query($select3)->result();
        } else {
            $select3 = "select a.NomorNasabah,a.NomorRekening,a.NamaDebitur,a.ID,a.JmlHariTunggakan as DPD, a.FacilityType,a.PlafondAmount,(SELECT b.DESCRIPTION FROM bss_ld_sub_product as b WHERE b.ID = a.FacilityType) as ket_facility, a.STARTDATEPLAFOND,a.DATEEXPIRED,DAY(a.STARTDATEPLAFOND) as cycle, TIMESTAMPDIFF(MONTH,a.STARTDATEPLAFOND,a.DATEEXPIRED) as tenor,a.KodeCabang,(select q.nama_cabang from t_m_account as q  where q.LD_Temenos = a.ID) as Cabang,a.JmlHariTunggakan as DPD_EOM,a.COL as bucked,format((SELECT d.ANNUITY_REPAY_AMT FROM bss_ld as d WHERE d.ID = a.ID) , 2) as angsuran ,format(a.BakiDebet,2) as BakiDebet,format((SELECT f.DuePokok FROM t_m_account as f WHERE f.LD_Temenos = a.ID),2) as tunggakan_pokok ,format(a.DueBunga,2) as bunga,format((SELECT g.denda from t_m_account as g WHERE g.LD_Temenos = a.ID),2) as denda,format((SELECT sum(h.denda + h.DueBunga + h.DuePokok) FROM t_m_account as h WHERE h.LD_Temenos = a.ID),2) as total_tagihan ,(SELECT i.OPEN_ACTUAL_BAL FROM bss_account as i WHERE i.ID = a.RepayPrincSettleAcc) as saldo_tabungan, (SELECT j.L_TGL_RES from bss_limit as j WHERE j.ID=a.LimitID) as tgl_restru ,(SELECT k.L_NO_RES from bss_limit as k WHERE k.ID=a.LimitID) as restru_ke, (SELECT l.ADDRESS from bss_customer as l WHERE l.ID = a.NomorNasabah) as alamat,(SELECT m.POST_CODE from bss_customer as m WHERE m.ID = a.NomorNasabah) as postcode,(SELECT n.SMS_1 from bss_customer as n WHERE n.ID = a.NomorNasabah) as notlp,(SELECT o.EMAIL_1 from bss_customer as o WHERE o.ID = a.NomorNasabah) as email from bss_cad as a where a.NomorNasabah not in (SELECT z.f_cif from t_assignment as z) and a.JmlHariTunggakan " . $level->f_value . " GROUP BY a.NomorNasabah ORDER by MAX(a.JmlHariTunggakan)";
            $data = $this->db2->query($select3)->result();
        }
        return $data;
    }
     
	
    public function getassignment($iduser) {

        $date = date('Y-m-d');
//        $this->db->select('f_agentid , COUNT(f_cif)');
//        $this->db->group_by('f_agentid');
//        $this->db->order_by('total', 'desc');
//        $this->db->get('t_accountlist');
//        $this->db2->where('f_aproved', 1);
//        JOIN t_agent ON t_agent.f_agentid = t_accountlist.f_agentid  
//        $query = "SELECT *,t_agent.f_agentname, COUNT(bss_cad.ID) as jmlh FROM bss_cad JOIN t_assignment ON t_assignment.f_cif = bss_cad.NomorNasabah JOIN t_agent ON t_agent.f_agentid = t_assignment.f_agent WHERE t_assignment.f_aproved = '' GROUP BY t_assignment.f_agent ";
//        $query = "SELECT (SELECT COUNT(*) from t_assignment as f WHERE f.f_aproved = 1 and f.f_tanggal = '" . $date . "')as jmlh, a.*,c.*,d.* from t_agent as a JOIN t_assignment as b ON b.f_agent = a.f_agentid JOIN t_assignment as c ON c.f_agent = a.f_agentid JOIN bss_cad as d ON d.NomorNasabah = c.f_cif WHERE c.f_tanggal = '" . $date . "' GROUP BY a.f_agentid";
//        $query = "SELECT a.* FROM t_assignment as a WHERE a.f_agent in (SELECT b.f_agentid from t_agent as b WHERE b.f_branch_id in (SELECT d.f_kode_cabang FROM t_detail_cabang_dephead as d WHERE d.f_nik = (SELECT e.nik from bss_employee as e WHERE e.nik = '".$iduser."')) )";
//        $query = "SELECT f.*,a.*,(SELECT COUNT(g.f_cif) from t_assignment as g WHERE g.f_aproved = '1' AND g.f_tanggal = '".$date."' ) as jmlh FROM t_assignment as a JOIN t_agent as f ON f.f_agentid = a.f_agent WHERE a.f_agent in (SELECT b.f_agentid from t_agent as b WHERE b.f_branch_id in (SELECT d.f_kode_cabang FROM t_detail_cabang_dephead as d WHERE d.f_nik = (SELECT e.nik from bss_employee as e WHERE e.nik = '".$iduser."')) ) AND a.f_tanggal = '".$date."' and a.f_aproved = '1' GROUP by a.f_agent ";
        $query = "SELECT f.*,a.*,(SELECT COUNT(g.f_cif) from t_assignment as g WHERE g.f_aproved = '1' AND g.f_tanggal = '" . $date . "' AND g.f_agent = f.f_agentid) as jmlh FROM t_assignment as a JOIN t_agent as f ON f.f_agentid = a.f_agent WHERE a.f_agent in (SELECT b.f_agentid from t_agent as b WHERE b.f_branch_id in (SELECT d.f_kode_cabang FROM t_detail_cabang_dephead as d WHERE d.f_nik = (SELECT e.nik from bss_employee as e WHERE e.nik = '" . $iduser . "')) ) AND a.f_tanggal = '" . $date . "' and a.f_aproved = '1' GROUP by a.f_agent";
        $data = $this->db2->query($query)->result();

        return $data;
    }

    public function countlist($id) {
        $select3 = "SELECT (SELECT d.JmlHariTunggakan FROM bss_cad as d WHERE d.NomorNasabah = b.f_cif GROUP BY d.NomorNasabah ORDER BY MAX(d.JmlHariTunggakan)) as dpd,(SELECT e.ADDRESS FROM bss_customer as e WHERE e.ID = c.NomorNasabah) as almt,b.*,c.* FROM t_assignment as b join bss_cad as c on b.f_cif = c.NomorNasabah WHERE b.f_agent = '" . $id . "' and b.f_aproved = 0 GROUP BY c.NomorNasabah ORDER BY MAX(c.JmlHariTunggakan)";
        $data = $this->db2->query($select3)->result();
        return $data;
    }

    public function getassignmentdetail($agentid) {
        $query = 'SELECT a.NomorNasabah,a.NamaDebitur,MAX(a.JmlHariTunggakan) AS JmlHariTunggakan,a.ID,e.SHORT_NAME,f.STREET FROM bss_cad AS a LEFT JOIN t_assignment AS b ON b.f_cif = a.NomorNasabah LEFT JOIN t_agent AS c ON c.f_agentid=b.f_agent LEFT JOIN bss_ld_sub_product AS d ON d.ID=a.FacilityType LEFT JOIN bss_category AS e ON e.ID =d.LD_CATEG left JOIN bss_customer AS f ON f.ID=a.NomorNasabah 
         WHERE c.f_agentid="' . $agentid . '" AND b.f_aproved=1 GROUP BY a.NomorNasabah';
        $data = $this->db2->query($query)->result();

        return $data;
    }

    public function aproved_proses($id) {
        $updatedata = array(
            'f_aproved' => '2',
            'f_active' => '1',
            'f_reject' => ''
        );
        foreach ($id as $item) {
            $this->db2->where('f_cif', $item);
            $a = $this->db2->update('t_assignment', $updatedata);
        }

        if ($a == TRUE) {
            return 1;
        } else {
            return 0;
        }
    }

    public function reject_proses_plan_visit($id) {
        $updatedata = array(
            'f_aproved' => '0',
            'f_active' => '1',
            'f_reject' => '1',
            'f_tanggal' => ''
        );
        foreach ($id as $item) {
            $this->db2->where('f_cif', $item);
            $a = $this->db2->update('t_assignment', $updatedata);
        }
        if ($a == TRUE) {
            return 1;
        } else {
            return 0;
        }
    }

}
