<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Modeldashboard extends CI_Model {

    public function unmaping($nik, $level) {
        $select1 = "select f_nik from t_detail_cabang_dephead where f_nik = '" . $nik . "'";
        $select0 = "select f_value from t_parameter where f_id = (select (SELECT c.f_value from dbmgmtmenu.t_level as c where c.t_levelid = b.f_userlevel)from dbmgmtmenu.t_user as b where b.f_userid = '".$nik."')";
		$param = $this->db2->query($select0)->row();
        $data1 = $this->db2->query($select1)->num_rows();
        if ($data1 > 0) {
            $select2 = "select Count(*) as unmap from bss_cad where JmlHariTunggakan ".$param->f_value." and KodeCabang in (select f_kode_cabang from t_detail_cabang_dephead where f_nik = '" . $nik . "') and NomorNasabah NOT IN (select f_cif from t_assignment)";
            $data = $this->db2->query($select2)->row();
        } else {
            $select = "select COUNT(*) as unmap from bss_cad where NomorNasabah NOT IN (select f_cif from t_assignment)";
            $data = $this->db2->query($select)->row();
        }
        return $data;
    }

    public function countall($nik, $level) {
//        $select1 = "select f_nik from t_dep_head where f_nik = '" . $nik . "'";
//        $data1 = $this->db2->query($select1)->num_rows();
//        if ($data1 > 0) {
//            $select2 = "SELECT COUNT(*) as countall FROM bss_cad where KodeCabang in (select f_kode_cabang from t_detail_cabang_dephead where f_nik = '" . $nik . "')";
//            $data = $this->db2->query($select2)->row();
//        } else {
        $select = "SELECT COUNT(*) as countall FROM bss_cad";
        $data = $this->db2->query($select)->row();
//        }
        return $data;
    }

    public function assignmentall($nik, $level) {
		$select1 = "select f_nik from t_detail_cabang_dephead where f_nik = '" . $nik . "'";
        $select0 = "select f_value from t_parameter where f_id = (select (SELECT c.f_value from dbmgmtmenu.t_level as c where c.t_levelid = b.f_userlevel)from dbmgmtmenu.t_user as b where b.f_userid = '".$nik."')";
		$param = $this->db2->query($select0)->row();
        
       // $select1 = "select f_nik from t_detail_cabang_dephead where f_nik = '" . $nik . "'";
        $data1 = $this->db2->query($select1)->num_rows();
        if ($data1 > 0) {
            $select2 = "SELECT COUNT(*) as countall FROM bss_cad where JmlHariTunggakan ".$param->f_value." and KodeCabang in (select f_kode_cabang from t_detail_cabang_dephead where f_nik = '" . $nik . "')";
            $data = $this->db2->query($select2)->row();
        } else {
            $select = "SELECT COUNT(*) as countall FROM bss_cad";
            $data = $this->db2->query($select)->row();
        }
        return $data;
    }

    public function pendingvisit($nik, $level) {
        $date = date('Y-m-d');
        $select0 = "select f_value from t_parameter where f_id = (select (SELECT c.f_value from dbmgmtmenu.t_level as c where c.t_levelid = b.f_userlevel)from dbmgmtmenu.t_user as b where b.f_userid = '".$nik."')";
		$param = $this->db2->query($select0)->row();
        $select1 = "select f_nik from t_detail_cabang_dephead where f_nik = '" . $nik . "'";
        $data1 = $this->db2->query($select1)->num_rows();
        if ($data1 > 0) {
            $select2 = "SELECT COUNT(*) as countall FROM t_assignment as a join t_agent as b on a.f_agent = b.f_agentid  where a.f_aproved = '1' and a.f_tanggal = '" . $date . "' and b.f_branch_id in(select f_kode_cabang from t_detail_cabang_dephead where f_nik = '" . $nik . "') and a.f_cif in (select d.NomorNasabah from bss_cad as d where d.JmlHariTunggakan ".$param->f_value." )";
            $data = $this->db2->query($select2)->row();
        } else {
            $select = "SELECT COUNT(*) as countall FROM t_assignment where f_aproved = '1' and f_tanggal = '" . $date . "'";
            $data = $this->db2->query($select)->row();
        }
        return $data;
    }

    public function countallvisit($nik, $level) {
        $date = date('Y-m-d');
        $select0 = "select f_value from t_parameter where f_id = (select (SELECT c.f_value from dbmgmtmenu.t_level as c where c.t_levelid = b.f_userlevel)from dbmgmtmenu.t_user as b where b.f_userid = '".$nik."') ";
		$param = $this->db2->query($select0)->row();
        $select1 = "select f_nik from t_detail_cabang_dephead where f_nik = '" . $nik . "'";
        $data1 = $this->db2->query($select1)->num_rows();
        if ($data1 > 0) {
            $select2 = "SELECT COUNT(*) as countallvisit FROM t_assignment as a join t_agent as b on a.f_agent = b.f_agentid where a.f_tanggal = '" . $date . "' and b.f_branch_id in (select f_kode_cabang from t_detail_cabang_dephead where f_nik = '" . $nik . "') and a.f_cif in (select d.NomorNasabah from bss_cad as d where d.JmlHariTunggakan ".$param->f_value." )";
            $data = $this->db2->query($select2)->row();
        } else {
            $select = "SELECT COUNT(*) as countallvisit FROM t_assignment where  f_tanggal = '" . $date . "'";
            $data = $this->db2->query($select)->row();
        }
        return $data;
    }

    public function collector($nik, $level) {
        $select1 = "select f_nik from t_detail_cabang_dephead where f_nik = '" . $nik . "'";
        $select0 = "select f_value from t_parameter where f_id = (select (SELECT c.f_value from dbmgmtmenu.t_level as c where c.t_levelid = b.f_userlevel)from dbmgmtmenu.t_user as b where b.f_userid = '".$nik."')";
		$param = $this->db2->query($select0)->row();
        $data1 = $this->db2->query($select1)->num_rows();
        if ($data1 > 0) {
            $select2 = "SELECT COUNT(*) as collector FROM t_agent where f_branch_id in (select f_kode_cabang from t_detail_cabang_dephead where f_nik = '" . $nik . "') and f_active = 1";
            $data = $this->db2->query($select2)->row();
        } else {
            $select = "SELECT COUNT(*) as collector FROM t_agent where f_active = '1'";
            $data = $this->db2->query($select)->row();
        }
        return $data;
    }

    public function collectorall() {
        $select = "SELECT COUNT(*) as collectorall FROM t_agent where f_active = 1";
        return $this->db2->query($select)->row();
    }

    public function assignment($nik, $level) {
		$select1 = "select f_nik from t_detail_cabang_dephead where f_nik = '" . $nik . "'";
        $select0 = "select f_value from t_parameter where f_id = (select (SELECT c.f_value from dbmgmtmenu.t_level as c where c.t_levelid = b.f_userlevel)from dbmgmtmenu.t_user as b where b.f_userid = '".$nik."')";
		$param = $this->db2->query($select0)->row();
        $data1 = $this->db2->query($select1)->num_rows();
        
        //$select1 = "select f_nik from t_detail_cabang_dephead where f_nik = '" . $nik . "'";
        $data1 = $this->db2->query($select1)->num_rows();
        if ($data1 > 0) {
            $select2 = "select Count(*) as ass from bss_cad where KodeCabang in (select f_kode_cabang from t_detail_cabang_dephead where f_nik = '" . $nik . "') and JmlHariTunggakan ".$param->f_value."" ;
            $data = $this->db2->query($select2)->row();
        } else {
            $select = "select COUNT(*) as ass from bss_cad where JmlHariTunggakan ".$param->f_value."";
            $data = $this->db2->query($select)->row();
        }
        return $data;

//        $select = "SELECT COUNT(*) as ass FROM bss_cad";
//        return $this->db2->query($select)->row();
    }

//    table\
    public function current($nik, $level) {
        $select1 = "select f_nik from t_detail_cabang_dephead where f_nik = '" . $nik . "'";
        $data1 = $this->db2->query($select1)->num_rows();
        if ($data1 > 0) {
            $select2 = "SELECT COUNT(*) as current , IFNULL(format(sum(a.BakiDebet) ,2),0.00) as os from bss_cad as a where a.NomorNasabah in (SELECT b.f_cif from t_assignment as b) and a.KodeCabang in (select f_kode_cabang from t_detail_cabang_dephead where f_nik = '" . $nik . "') and a.JmlHariTunggakan = 0";
            $data = $this->db2->query($select2)->row();
        } else {
            $select = "SELECT COUNT(*) as current , IFNULL(format(sum(a.BakiDebet),2),0.00) as os from bss_cad as a where a.NomorNasabah in (SELECT b.f_cif from t_assignment as b ) and a.JmlHariTunggakan = 0";
            $data = $this->db2->query($select)->row();
        }
        return $data;
//        $select = "SELECT COUNT(*) as current , format((SELECT sum(BakiDebet) from bss_cad WHERE NomorNasabah in (SELECT e.f_cif from t_assignment as e JOIN bss_cad as f on e.f_cif = f.NomorNasabah  WHERE f.JmlHariTunggakan = '0') AND JmlHariTunggakan = 0 ),2)as os from bss_cad as a where a.NomorNasabah in (SELECT b.f_cif from t_assignment as b JOIN bss_cad as g ON g.NomorNasabah = b.f_cif WHERE g.JmlHariTunggakan = '0' )";
//        return $this->db2->query($select)->row();
    }

    public function current1($nik, $level) {
        $select1 = "select f_nik from t_detail_cabang_dephead where f_nik = '" . $nik . "'";
        $data1 = $this->db2->query($select1)->num_rows();
        if ($data1 > 0) {
            $select2 = "SELECT COUNT(*) as current1 , IFNULL(format(sum(a.BakiDebet) ,2),0.00) as os from bss_cad as a where a.NomorNasabah not in (SELECT b.f_cif from t_assignment as b ) and a.KodeCabang in (select f_kode_cabang from t_detail_cabang_dephead where f_nik = '" . $nik . "') and a.JmlHariTunggakan = 0";
            $data = $this->db2->query($select2)->row();
        } else {
            $select = "SELECT COUNT(*) as current1 , IFNULL(format(sum(a.BakiDebet),2),0.00) as os from bss_cad as a where a.NomorNasabah NOT in (SELECT b.f_cif from t_assignment as b ) and a.JmlHariTunggakan = 0";
            $data = $this->db2->query($select)->row();
        }
        return $data;
//        $select = "SELECT COUNT(*)as current1 ,format((SELECT SUM(BakiDebet) from bss_cad WHERE  NomorNasabah NOT In (SELECT c.f_cif from t_assignment as c) AND JmlHariTunggakan = '0'),2) as os from bss_cad WHERE NomorNasabah NOT In (SELECT b.f_cif from t_assignment as b) AND JmlHariTunggakan = '0'";
//        return $this->db2->query($select)->row();
    }

    public function x_days($nik, $level) {
        $select1 = "select f_nik from t_detail_cabang_dephead where f_nik = '" . $nik . "'";
        $data1 = $this->db2->query($select1)->num_rows();
        if ($data1 > 0) {
            $select2 = "SELECT COUNT(*) as x_days , IFNULL(format(sum(a.BakiDebet),2),0.00) as os from bss_cad as a where a.NomorNasabah in (SELECT b.f_cif from t_assignment as b ) and a.KodeCabang in (select f_kode_cabang from t_detail_cabang_dephead where f_nik = '" . $nik . "') and a.JmlHariTunggakan BETWEEN 1 AND 30";
            $data = $this->db2->query($select2)->row();
        } else {
            $select = "SELECT COUNT(*)as x_days ,IFNULL(format(SUM(BakiDebet) ,2),0.00) as os from bss_cad WHERE NomorNasabah In (SELECT b.f_cif from t_assignment as b ) AND JmlHariTunggakan BETWEEN 1 AND 30";
            $data = $this->db2->query($select)->row();
        }
        return $data;

//        $select = "SELECT COUNT(*) as x_days , format((SELECT sum(BakiDebet) from bss_cad WHERE NomorNasabah in (SELECT e.f_cif from t_assignment as e JOIN bss_cad as f on e.f_cif = f.NomorNasabah  WHERE f.JmlHariTunggakan BETWEEN 1 AND 30) AND JmlHariTunggakan BETWEEN 1 AND 30 ),2) as os from bss_cad as a where a.NomorNasabah in (SELECT b.f_cif from t_assignment as b JOIN bss_cad as g ON b.f_cif = g.NomorNasabah WHERE g.JmlHariTunggakan BETWEEN 1 AND 30)";
//        return $this->db2->query($select)->row();
    }

    public function x_days1($nik, $level) {
        $select1 = "select f_nik from t_detail_cabang_dephead where f_nik = '" . $nik . "'";
        $data1 = $this->db2->query($select1)->num_rows();
        if ($data1 > 0) {
            $select2 = "SELECT COUNT(*) as x_days1 , IFNULL(format(sum(a.BakiDebet),2),0.00) as os from bss_cad as a where a.NomorNasabah not in (SELECT b.f_cif from t_assignment as b ) and a.KodeCabang in (select f_kode_cabang from t_detail_cabang_dephead where f_nik = '" . $nik . "') and a.JmlHariTunggakan BETWEEN 1 AND 30";
            $data = $this->db2->query($select2)->row();
        } else {
            $select = "SELECT COUNT(*)as x_days1 ,IFNULL(format(SUM(BakiDebet),2),0.00) as os from bss_cad WHERE NomorNasabah not in (SELECT b.f_cif from t_assignment as b ) AND JmlHariTunggakan BETWEEN 1 AND 30";
            $data = $this->db2->query($select)->row();
        }
        return $data;
//        $select = "SELECT COUNT(*) as x_days1 ,format((SELECT SUM(BakiDebet) from bss_cad WHERE  NomorNasabah NOT In (SELECT c.f_cif from t_assignment as c) AND JmlHariTunggakan BETWEEN 1 and 30),2) as os from bss_cad WHERE NomorNasabah NOT In (SELECT b.f_cif from t_assignment as b) AND JmlHariTunggakan BETWEEN 1 and 30";
//        return $this->db2->query($select)->row();
    }

    public function dpd30_90($nik, $level) {
        $select1 = "select f_nik from t_detail_cabang_dephead where f_nik = '" . $nik . "'";
        $data1 = $this->db2->query($select1)->num_rows();
        if ($data1 > 0) {
            $select2 = "SELECT COUNT(*) as dpd30_90 ,IFNULL(format(sum(a.BakiDebet) ,2),0.00) as os from bss_cad as a where a.NomorNasabah in (SELECT b.f_cif from t_assignment as b ) and a.KodeCabang in (select f_kode_cabang from t_detail_cabang_dephead where f_nik = '" . $nik . "') and a.JmlHariTunggakan BETWEEN 31 AND 90";
            $data = $this->db2->query($select2)->row();
        } else {
            $select = "SELECT COUNT(*)as dpd30_90 ,IFNULL(format(SUM(BakiDebet) ,2),0.00) as os from bss_cad WHERE NomorNasabah In (SELECT b.f_cif from t_assignment as b ) AND JmlHariTunggakan BETWEEN 31 AND 90";
            $data = $this->db2->query($select)->row();
        }
        return $data;
//        $select = "SELECT COUNT(*) as dpd30_90 , format((SELECT sum(BakiDebet) from bss_cad WHERE NomorNasabah in (SELECT e.f_cif from t_assignment as e JOIN bss_cad as f on e.f_cif = f.NomorNasabah  WHERE f.JmlHariTunggakan BETWEEN 31 AND 90) AND JmlHariTunggakan BETWEEN 31 AND 90 ),2) as os from bss_cad as a where a.NomorNasabah in (SELECT b.f_cif from t_assignment as b JOIN bss_cad as g ON b.f_cif = g.NomorNasabah WHERE g.JmlHariTunggakan BETWEEN 31 AND 90)";
//        return $this->db2->query($select)->row();
    }

    public function dpd30_90_1($nik, $level) {
        $select1 = "select f_nik from t_detail_cabang_dephead where f_nik = '" . $nik . "'";
        $data1 = $this->db2->query($select1)->num_rows();
        if ($data1 > 0) {
            $select2 = "SELECT COUNT(*) as dpd30_90_1 , IFNULL(format(sum(a.BakiDebet) ,2),0.00) as os from bss_cad as a where a.NomorNasabah not in (SELECT b.f_cif from t_assignment as b ) and a.KodeCabang in (select f_kode_cabang from t_detail_cabang_dephead where f_nik = '" . $nik . "') and a.JmlHariTunggakan BETWEEN  31 and 90";
            $data = $this->db2->query($select2)->row();
        } else {
            $select = "SELECT COUNT(*)as dpd30_90_1 ,IFNULL(format(SUM(BakiDebet) ,2),0.00) as os from bss_cad WHERE NomorNasabah not in (SELECT b.f_cif from t_assignment as b) AND JmlHariTunggakan BETWEEN  31 and 90";
            $data = $this->db2->query($select)->row();
        }
        return $data;
//        $select = "SELECT COUNT(*) as dpd30_90_1 ,format((SELECT SUM(BakiDebet) from bss_cad WHERE  NomorNasabah NOT In (SELECT c.f_cif from t_assignment as c) AND JmlHariTunggakan BETWEEN 31 and 90),2) as os from bss_cad WHERE NomorNasabah NOT In (SELECT b.f_cif from t_assignment as b) AND JmlHariTunggakan BETWEEN 31 and 90";
//        return $this->db2->query($select)->row();
    }

    public function dpd91_180($nik, $level) {
        $select1 = "select f_nik from t_detail_cabang_dephead where f_nik = '" . $nik . "'";
        $data1 = $this->db2->query($select1)->num_rows();
        if ($data1 > 0) {
            $select2 = "SELECT COUNT(*) as dpd91_180,IFNULL(format(sum(a.BakiDebet),2),0.00) as os from bss_cad as a where a.NomorNasabah in (SELECT b.f_cif from t_assignment as b JOIN bss_cad as g ON g.NomorNasabah = b.f_cif WHERE g.JmlHariTunggakan BETWEEN 91 AND 180  and g.KodeCabang in (select f_kode_cabang from t_detail_cabang_dephead where f_nik = '" . $nik . "')) and a.KodeCabang in (select f_kode_cabang from t_detail_cabang_dephead where f_nik = '" . $nik . "') and a.JmlHariTunggakan BETWEEN 91 AND 180 ";
            $data = $this->db2->query($select2)->row();
        } else {
            $select = "SELECT COUNT(*)as dpd91_180 ,IFNULL(format(SUM(BakiDebet),2),0.00) as os from bss_cad WHERE NomorNasabah In (SELECT b.f_cif from t_assignment as b ) AND JmlHariTunggakan BETWEEN 91 AND 180 ";
            $data = $this->db2->query($select)->row();
        }
        return $data;
    }

    public function dpd91_180_1($nik, $level) {
        $select1 = "select f_nik from t_detail_cabang_dephead where f_nik = '" . $nik . "'";
        $data1 = $this->db2->query($select1)->num_rows();
        if ($data1 > 0) {
            $select2 = "SELECT COUNT(*) as dpd91_180_1 , IFNULL(format(sum(a.BakiDebet),2),0.00) as os from bss_cad as a where a.NomorNasabah not in (SELECT b.f_cif from t_assignment as b ) and a.KodeCabang in (select f_kode_cabang from t_detail_cabang_dephead where f_nik = '" . $nik . "') and a.JmlHariTunggakan BETWEEN  91 and 180";
            $data = $this->db2->query($select2)->row();
        } else {
            $select = "SELECT COUNT(*)as dpd91_180_1 ,IFNULL(format(SUM(BakiDebet),2),0.00) as os from bss_cad WHERE NomorNasabah not in (SELECT b.f_cif from t_assignment as b ) AND JmlHariTunggakan BETWEEN  91 and 180";
            $data = $this->db2->query($select)->row();
        }
        return $data;
//        $select = "SELECT COUNT(*) as dpd91_180_1 ,format((SELECT SUM(BakiDebet) from bss_cad WHERE  NomorNasabah NOT In (SELECT c.f_cif from t_assignment as c) AND JmlHariTunggakan BETWEEN 91 and 180),2) as os from bss_cad WHERE NomorNasabah NOT In (SELECT b.f_cif from t_assignment as b) AND JmlHariTunggakan BETWEEN 91 and 180";
//        return $this->db2->query($select)->row();
    }

    public function dpd181_360($nik, $level) {
        $select1 = "select f_nik from t_detail_cabang_dephead where f_nik = '" . $nik . "'";
        $data1 = $this->db2->query($select1)->num_rows();
        if ($data1 > 0) {
            $select2 = "SELECT COUNT(*) as dpd181_360 ,IFNULL(format(sum(a.BakiDebet),2),0.00) as os from bss_cad as a where a.NomorNasabah in (SELECT b.f_cif from t_assignment as b JOIN bss_cad as g ON g.NomorNasabah = b.f_cif WHERE g.JmlHariTunggakan BETWEEN 181 AND 360 and g.KodeCabang in (select f_kode_cabang from t_detail_cabang_dephead where f_nik = '" . $nik . "')) and a.KodeCabang in (select f_kode_cabang from t_detail_cabang_dephead where f_nik = '" . $nik . "') and a.JmlHariTunggakan BETWEEN 181 AND 360";
            $data = $this->db2->query($select2)->row();
        } else {
            $select = "SELECT COUNT(*)as dpd181_360 ,IFNULL(format(SUM(BakiDebet),2),0.00) as os from bss_cad WHERE NomorNasabah In (SELECT b.f_cif from t_assignment as b ) AND JmlHariTunggakan BETWEEN 181 AND 360";
            $data = $this->db2->query($select)->row();
        }
        return $data;
//        $select = "SELECT COUNT(*) as dpd181_360 , format((SELECT sum(BakiDebet) from bss_cad WHERE NomorNasabah in (SELECT e.f_cif from t_assignment as e JOIN bss_cad as f on e.f_cif = f.NomorNasabah  WHERE f.JmlHariTunggakan BETWEEN 181 AND 360) AND JmlHariTunggakan BETWEEN 181 AND 360 ),2) as os from bss_cad as a where a.NomorNasabah in (SELECT b.f_cif from t_assignment as b JOIN bss_cad as g ON b.f_cif = g.NomorNasabah WHERE g.JmlHariTunggakan BETWEEN 181 AND 360)";
//        return $this->db2->query($select)->row();
    }

    public function dpd181_360_1($nik, $level) {
        $select1 = "select f_nik from t_detail_cabang_dephead where f_nik = '" . $nik . "'";
        $data1 = $this->db2->query($select1)->num_rows();
        if ($data1 > 0) {
            $select2 = "SELECT COUNT(*) as dpd181_360_1 , IFNULL(format(sum(a.BakiDebet) ,2),0.00) as os from bss_cad as a where a.NomorNasabah not in (SELECT b.f_cif from t_assignment as b ) and a.KodeCabang in (select f_kode_cabang from t_detail_cabang_dephead where f_nik = '" . $nik . "') and a.JmlHariTunggakan BETWEEN 181 AND 360";
            $data = $this->db2->query($select2)->row();
        } else {
            $select = "SELECT COUNT(*)as dpd181_360_1 ,IFNULL(format(SUM(BakiDebet),2),0.00) as os from bss_cad WHERE NomorNasabah not In (SELECT b.f_cif from t_assignment as b ) AND JmlHariTunggakan BETWEEN 181 AND 360";
            $data = $this->db2->query($select)->row();
        }
        return $data;
//        $select = "SELECT COUNT(*) as dpd181_360_1 ,format((SELECT SUM(BakiDebet) from bss_cad WHERE  NomorNasabah NOT In (SELECT c.f_cif from t_assignment as c) AND JmlHariTunggakan BETWEEN 181 and 360),2) as os from bss_cad WHERE NomorNasabah NOT In (SELECT b.f_cif from t_assignment as b) AND JmlHariTunggakan BETWEEN 181 and 360";
//        return $this->db2->query($select)->row();
    }

    public function dpd361($nik, $level) {
        $select1 = "select f_nik from t_detail_cabang_dephead where f_nik = '" . $nik . "'";
        $data1 = $this->db2->query($select1)->num_rows();
        if ($data1 > 0) {
			$select3 = "SELECT COUNT(*)as dpd361 ,IFNULL(format(sum(a.BakiDebet) ,2),0.00) as os from bss_cad as a where a.NomorNasabah not in (SELECT b.f_cif from t_assignment as b ) and a.KodeCabang in (select f_kode_cabang from t_detail_cabang_dephead where f_nik = '" . $nik . "') and a.JmlHariTunggakan > 360";
			$data = $this->db2->query($select3)->row();
        } else {
            $select3 = "SELECT COUNT(*)as dpd361 ,IFNULL(format(SUM(BakiDebet),2),0.00) as os from bss_cad WHERE NomorNasabah In (SELECT b.f_cif from t_assignment as b) AND JmlHariTunggakan > 360";
            $data = $this->db2->query($select3)->row();
        }
        return $data;
//        $select = "SELECT COUNT(*) as dpd361 , format((SELECT sum(BakiDebet) from bss_cad WHERE NomorNasabah in (SELECT e.f_cif from t_assignment as e JOIN bss_cad as f on e.f_cif = f.NomorNasabah  WHERE f.JmlHariTunggakan > 360) AND JmlHariTunggakan > 360 ),2) as os from bss_cad as a where a.NomorNasabah in (SELECT b.f_cif from t_assignment as b JOIN bss_cad as g ON b.f_cif = g.NomorNasabah WHERE g.JmlHariTunggakan > 360)";
//        return $this->db2->query($select)->row();
    }

    public function dpd361_1($nik, $level) {
        $select1 = "select f_nik from t_detail_cabang_dephead where f_nik = '" . $nik . "'";
        $data1 = $this->db2->query($select1)->num_rows();
        if ($data1 > 0) {
            $select2 = "SELECT COUNT(*) as dpd361_1 , IFNULL(format(sum(a.BakiDebet),2),0.00) as os from bss_cad as a where a.NomorNasabah not in (SELECT b.f_cif from t_assignment as b ) and a.KodeCabang in (select f_kode_cabang from t_detail_cabang_dephead where f_nik = '" . $nik . "')  and a.JmlHariTunggakan > 360";
            $data = $this->db2->query($select2)->row();
        } else {
            $select = "SELECT COUNT(*)as dpd361_1 ,IFNULL(format(SUM(BakiDebet) ,2),0.00) as os from bss_cad WHERE NomorNasabah not In (SELECT b.f_cif from t_assignment as b ) AND JmlHariTunggakan > 360";
            $data = $this->db2->query($select)->row();
        }
        return $data;
//        $select = "SELECT COUNT(*) as dpd361_1 ,format((SELECT SUM(BakiDebet) from bss_cad WHERE  NomorNasabah NOT In (SELECT c.f_cif from t_assignment as c) AND JmlHariTunggakan > 360),2) as os from bss_cad WHERE NomorNasabah NOT In (SELECT b.f_cif from t_assignment as b) AND JmlHariTunggakan > 360";
//        return $this->db2->query($select)->row();
    }

    public function amc($nik, $level) {
        $select1 = "select f_nik from t_dep_head where f_nik = '" . $nik . "'";
        $data1 = $this->db2->query($select1)->num_rows();
        if ($data1 > 0) {
            $select1 = "select f_kode_cabang from t_detail_cabang_dephead where f_nik = '" . $nik . "'";
            if ($this->db2->query($select1)->num_rows() > 0) {
                $select2 = "SELECT COUNT(*) as amc , IFNULL(format(sum(BakiDebet),2),0.00) as os from bss_cad as a where a.NomorNasabah in (SELECT b.f_cif from t_assignment as b ) and a.KodeCabang = 'ID0014001'";
                $data = $this->db2->query($select2)->row();
            } else {
                $select = "SELECT COUNT(*)as amc ,IFNULL(format(SUM(BakiDebet),2),0.00) as os from bss_cad WHERE NomorNasabah In (SELECT b.f_cif from t_assignment as b JOIN bss_cad as g ON g.NomorNasabah = b.f_cif WHERE g.KodeCabang = 'ID0014001')";
            $data = $this->db2->query($select)->row();
            }
        } else {
            $select = "SELECT COUNT(*)as amc ,IFNULL(format((SELECT SUM(BakiDebet) from bss_cad WHERE  NomorNasabah In (SELECT e.f_cif from t_assignment as e JOIN bss_cad as f on e.f_cif = f.NomorNasabah  WHERE f.KodeCabang = 'ID0014001') and KodeCabang = 'ID0014001'),2),0.00) as os from bss_cad WHERE NomorNasabah In (SELECT b.f_cif from t_assignment as b JOIN bss_cad as g ON g.NomorNasabah = b.f_cif WHERE g.KodeCabang = 'ID0014001')";
            $data = $this->db2->query($select)->row();
        }
        return $data;
//        $select = "SELECT COUNT(*) as amc , format((SELECT sum(BakiDebet) from bss_cad WHERE NomorNasabah in (SELECT e.f_cif from t_assignment as e JOIN bss_cad as f on e.f_cif = f.NomorNasabah  WHERE f.KodeCabang = 'ID0014001') AND KodeCabang = 'ID0014001'),2) as os from t_assignment as a where a.f_cif in (SELECT b.NomorNasabah from bss_cad as b WHERE b.KodeCabang = 'ID0014001')";
//        return $this->db2->query($select)->row();
    }

    public function amc_1($nik, $level) {
            $select1 = "select f_kode_cabang from t_detail_cabang_dephead where f_nik = '" . $nik . "' and f_kode_cabang = 'ID0014001'";
            if ($this->db2->query($select1)->num_rows() > 0) {
                $select2 = "SELECT COUNT(*) as amc_1 , IFNULL(format(sum(BakiDebet),2),0.00) as os from bss_cad as a where a.NomorNasabah not in (SELECT b.f_cif from t_assignment as b ) and a.KodeCabang = 'ID0014001'";
                $data = $this->db2->query($select2)->row();
            } else {
                $select2 = "SELECT COUNT(*) as amc_1 , IFNULL(format(sum(BakiDebet) ,2),0.00) as os from bss_cad as a where a.NomorNasabah not in (SELECT b.f_cif from t_assignment as b ) and a.KodeCabang = '0'";
                $data = $this->db2->query($select2)->row();
//                $data1 = "a";
//                $data['amc_1'] = "a";
//                $data['os'] = "a";
            }
        
        return $data;
//        $select = "SELECT COUNT(*) as amc_1 ,format((SELECT SUM(BakiDebet) from bss_cad WHERE  NomorNasabah NOT In (SELECT c.f_cif from t_assignment as c) AND KodeCabang = 'ID0014001' ),2) as os from bss_cad WHERE NomorNasabah NOT In (SELECT b.f_cif from t_assignment as b) AND KodeCabang = 'ID0014001'";
//        return $this->db2->query($select)->row();
    }

    public function wo($nik, $level) {
            $select1 = "select f_kode_cabang from t_detail_cabang_dephead where f_nik = '" . $nik . "' and f_kode_cabang = 'ID0014002'";
            if ($this->db2->query($select1)->num_rows() > 0) {
                 $select2 = "SELECT COUNT(*) as wo ,IFNULL(format(SUM(BakiDebet) ,2),0.00) as os from bss_cad WHERE NomorNasabah not In (SELECT b.f_cif from t_assignment as b ) and KodeCabang = 'ID0014002' ";
                
				//select asli masih error $select2 = "SELECT COUNT(*) as wo , format((SELECT sum(BakiDebet) from bss_cad WHERE NomorNasabah in (SELECT e.f_cif from t_assignment as e JOIN bss_cad as f on e.f_cif = f.NomorNasabah  WHERE f.KodeCabang in (select f_kode_cabang from t_detail_cabang_dephead where f_nik = '" . $nik . "')) and KodeCabang = 'ID0014002'),2)as os from bss_cad as a where a.NomorNasabah in (SELECT b.f_cif from t_assignment as b JOIN bss_cad as g ON g.NomorNasabah = b.f_cif WHERE g.KodeCabang = (select f_kode_cabang from t_detail_cabang_dephead where f_nik = '" . $nik . "')) and a.KodeCabang = 'ID0014002'";
                $data = $this->db2->query($select2)->row();
            } else {
                $select = "SELECT COUNT(*) as wo ,IFNULL(format(SUM(BakiDebet),2),0.00) as os from bss_cad WHERE NomorNasabah not In (SELECT b.f_cif from t_assignment as b) and KodeCabang = 'ID0014002' ";
                $data = $this->db2->query($select)->row();
            }
        
        return $data;
//        $select = "SELECT COUNT(*) as wo , format((SELECT sum(BakiDebet) from bss_cad WHERE NomorNasabah in (SELECT e.f_cif from t_assignment as e JOIN bss_cad as f on e.f_cif = f.NomorNasabah  WHERE f.KodeCabang = 'ID0014002') AND KodeCabang = 'ID0014002'),2) as os from t_assignment as a where a.f_cif in (SELECT b.NomorNasabah from bss_cad as b WHERE b.KodeCabang = 'ID0014002')";
//        return $this->db2->query($select)->row();
    }

    public function wo_1($nik, $level) {
            $select1 = "select f_kode_cabang from t_detail_cabang_dephead where f_nik = '" . $nik . "' and f_kode_cabang = 'ID0014002'";
            if ($this->db2->query($select1)->num_rows() > 0) {
                $select2 = "SELECT COUNT(*) as wo_1 , IFNULL(format(sum(a.BakiDebet) ,2),0.00) as os from bss_cad as a where a.NomorNasabah not in (SELECT b.f_cif from t_assignment as b ) and a.KodeCabang = 'ID0014002'";
                $data = $this->db2->query($select2)->row();
            } else {
                $select = "SELECT COUNT(*)as wo_1 ,IFNULL(format(SUM(BakiDebet) ,2),0.00) as os from bss_cad WHERE NomorNasabah In (SELECT b.f_cif from t_assignment as b ) and KodeCabang = 'ID0014002'";
                $data = $this->db2->query($select)->row();
            }
        return $data;
//        $select = "SELECT COUNT(*) as wo_1 ,format((SELECT SUM(BakiDebet) from bss_cad WHERE  NomorNasabah NOT In (SELECT c.f_cif from t_assignment as c) AND KodeCabang = 'ID0014002' ),2) as os from bss_cad WHERE NomorNasabah NOT In (SELECT b.f_cif from t_assignment as b) AND KodeCabang = 'ID0014002'";
//        return $this->db2->query($select)->row();
    }
//    chart pei////////////////////////////////////////////////////////////////////////////////////////////////
    public function visit() {
        $select = "SELECT COUNT(*) as notvisit , (SELECT count(*) FROM t_assignment) as countall , (SELECT COUNT(f_cif) from t_assignment WHERE f_cif in (SELECT f_cif FROM t_kunjungan)) as visit from t_assignment as a WHERE a.f_cif NOT IN (SELECT b.f_cif from t_kunjungan as b )";
        return $this->db2->query($select)->row();
    }

    public function hk() {
        $select = "SELECT COUNT(*) as countall, (SELECT COUNT(*) FROM t_kunjungan as b WHERE b.f_hasilkunjungan = 'contacted') as contacted , (SELECT COUNT(*) FROM t_kunjungan as b WHERE b.f_hasilkunjungan = 'No Contacted') as notcontacted , (SELECT count(*) from t_kunjungan as c WHERE c.f_hasilkunjungan = 'PTP') as ptp from t_kunjungan ";
        return $this->db2->query($select)->row();
    }

    public function lelang($nik, $level) {
        $select1 = "select f_nik from t_dep_head where f_nik = '" . $nik . "'";
        $data1 = $this->db2->query($select1)->num_rows();
        if ($data1 > 0) {
            $select = "SELECT COUNT(*) as countall,(select count(*) from bss_cad as a where a.KodeCabang in (select f_kode_cabang from t_detail_cabang_dephead where f_nik = '" . $nik . "') and a.JmlHariTunggakan > 90 and a.NomorNasabah not in  (select cif from t_lelang) ) as lelang ,(select count(*) from t_lelang) as process_lelang from bss_cad where KodeCabang in (select f_kode_cabang from t_detail_cabang_dephead where f_nik = '" . $nik . "') and JmlhariTunggakan > 90";
            $data = $this->db2->query($select)->row();
        } else {
            $select = "SELECT  COUNT(*) as countall,(select count(*) from bss_cad where JmlHariTunggakan > 90 and NomorNasabah not in (select cif from t_lelang)) as lelang ,(select count(*) from t_lelang) as process_lelang from bss_cad ";
            $data = $this->db2->query($select)->row();
        }
        return $data;
    }
    public function ayda($nik, $level) {
        $select1 = "select f_nik from t_dep_head where f_nik = '" . $nik . "'";
        $data1 = $this->db2->query($select1)->num_rows();
        if ($data1 > 0) {
			
			//SELECT (SELECT COUNT(*) FROM t_ayda as b WHERE b.f_thnayda = a.f_thnayda) as count,a.* FROM t_ayda as a GROUP by a.f_thnayda ORDER BY a.f_thnayda DESC LIMIT 3 
            $select = "SELECT COUNT(*) as cntall,(SELECT COUNT(*) FROM t_ayda as b WHERE b.f_thnayda = ".date('Y').") as count1,(SELECT COUNT(*) FROM t_ayda as b WHERE b.f_thnayda = ".date('Y',strtotime('-1 year'))." ) as count2,(SELECT COUNT(*) FROM t_ayda as b WHERE b.f_thnayda = ".date('Y',strtotime('-2 year'))." ) as count3, ((SELECT COUNT(*) FROM t_ayda as b WHERE b.f_thnayda = ".date('Y')." ) + (SELECT COUNT(*) FROM t_ayda as b WHERE b.f_thnayda = ".date('Y',strtotime('-1 year'))." ) + (SELECT COUNT(*) FROM t_ayda as b WHERE b.f_thnayda = ".date('Y',strtotime('-2 year'))." )) as countall FROM t_ayda as a ";
            $data = $this->db2->query($select)->row();
        } else {
            $select = "SELECT COUNT(*) as cntall,(SELECT COUNT(*) FROM t_ayda as b WHERE b.f_thnayda = ".date('Y').") as count1,(SELECT COUNT(*) FROM t_ayda as b WHERE b.f_thnayda = ".date('Y',strtotime('-1 year'))." ) as count2,(SELECT COUNT(*) FROM t_ayda as b WHERE b.f_thnayda = ".date('Y',strtotime('-2 year'))." ) as count3, ((SELECT COUNT(*) FROM t_ayda as b WHERE b.f_thnayda = ".date('Y')." ) + (SELECT COUNT(*) FROM t_ayda as b WHERE b.f_thnayda = ".date('Y',strtotime('-2 year'))." ) + (SELECT COUNT(*) FROM t_ayda as b WHERE b.f_thnayda = ".date('Y',strtotime('-2 year'))." )) as countall FROM t_ayda as a ";
            //$select = "SELECT  COUNT(*) as countall,(select count(*) from bss_cad where JmlHariTunggakan > 90 and NomorNasabah not in (select cif from t_lelang)) as lelang ,(select count(*) from t_lelang) as process_lelang from bss_cad ";
            $data = $this->db2->query($select)->row();
        }
        return $data;
    }

}
