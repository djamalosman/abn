<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Modelsdept extends CI_Model {

    public function dataemployee() {
        $query1 = "select (select dbmgmtmenu.t_level.f_levelname from dbmgmtmenu.t_level where dbmgmtmenu.t_level.t_levelid = (select dbmgmtmenu.t_user.f_userlevel from dbmgmtmenu.t_user where dbmgmtmenu.t_user.f_userid = bss_employee.nik)) as level ,bss_employee.* FROM `bss_employee`  WHERE  `nik` NOT IN (SELECT a.f_nik FROM t_dep_head as a) and nik in (select dbmgmtmenu.t_user.f_userid from dbmgmtmenu.t_user where dbmgmtmenu.t_user.f_active = '1')";
//        $this->db2->where('f_status', 1);
//        $data = $this->db2->get('t_employee_bss');
        $data = $this->db2->query($query1);
        return $data;
    }
	
	public function datauserweb() {
        $query1 = "select a.*,(select COUNT(*) from dbbsscollection.t_detail_cabang_dephead as c where c.f_nik = a.f_userid ) as cabang ,(select b.f_levelname from t_level as b where b.t_levelid = a.f_userlevel ) as jabatan from t_user as a where a.f_userid in (select d.nik from dbbsscollection.bss_employee as d where d.nik = a.f_userid ) and a.f_active = '1'";
//        $this->db2->where('f_status', 1);
//        $data = $this->db2->get('t_employee_bss');
        $data = $this->db->query($query1);
        return $data;
    }
	public function getparamater(){
        $select = "select * from t_parameter where f_type = 'DPD'";
        $data = $this->db2->query($select)->result();
        return $data;
    }

    public function getdatacollector($nik) {
        $select1 = "SELECT * FROM t_detail_cabang_dephead WHERE f_nik = '" . $nik . "'";
        if ($this->db2->query($select1)->num_rows() > 0) {
            $select = "select (select b.COMPANY_NAME from bss_company as b where b.ID = a.f_branch_id) as cabang, a.* from t_agent as a where a.f_branch_id in (select f_kode_cabang from t_detail_cabang_dephead where f_nik = '" . $nik . "') and a.f_active = 1 ";
            //$select2 = "SELECT  a.* FROM t_agent as a JOIN bss_employee as b ON b.nik = a.f_agentid WHERE b.company_id IN (SELECT c.f_kode_cabang from t_detail_cabang_dephead as c WHERE c.f_nik = '" . $nik . "' ) ";
            $data = $this->db2->query($select)->result();
        } else {
            $select = "select (select b.COMPANY_NAME from bss_company as b where b.ID = a.f_branch_id) as cabang, a.* from t_agent as a ";
            $data = $this->db2->query($select)->result();
        }
        return $data;
    }

    public function create_depthead($selection) {
        if ($selection == '') {
            $hasil = 2;
        } else {
            foreach ($selection AS $item) {
                $select = "select * from bss_employee where nik = '" . $item . "'";
                $data = $this->db2->query($select)->row();
                $insert = array(
                    'f_nik' => $data->nik,
                    'f_nama' => $data->full_name,
                    'f_area' => $data->emp_area,
                    'f_jabatan' => '1',
                    'f_usercreate' => $this->session->userdata('username'),
                    'f_datetimecreate' => date('Y-m-d H:i:s')
                );
                $inst = $this->db2->insert('t_dep_head', $insert);
                if ($inst === TRUE) {
                   $update = "UPDATE t_user set f_userlevel = (select a.t_levelid from t_level as a where a.f_levelname like '%Dept Head%') where f_userid = '".$item."'";
                    $updateprocess = $this->db->query($update);
					if($updateprocess === True){
						$hasil = 1;
					} else {
						$this->db2->where('f_nik' , $item);
						$this->db2->delete('t_dep_head');
						$hasil = 0;
					}
                } else {
                    $hasil = 0;
                }
            }
        }
        return $hasil;
    }
	
	 public function create_bm($selection) {
        if ($selection == '') {
            $hasil = 2;
        } else {
            foreach ($selection AS $item) {
                $select = "select * from bss_employee where nik = '" . $item . "'";
                $data = $this->db2->query($select)->row();
                $insert = array(
                    'f_nik' => $data->nik,
                    'f_nama' => $data->full_name,
                    'f_area' => $data->emp_area,
                    'f_jabatan' => '2',
					'f_usercreate' => $this->session->userdata('username'),
                    'f_datetimecreate' => date('Y-m-d H:i:s')
                );
                $inst = $this->db2->insert('t_dep_head', $insert);
                if ($inst === TRUE) {
					
					$update = "UPDATE t_user set f_userlevel = (select a.t_levelid from t_level as a where a.f_levelname like '%Branch Manager%') where f_userid = '".$item."'";
                    $updateprocess = $this->db->query($update);
					if($updateprocess === True){
						$hasil = 1;
					} else {
						$this->db2->where('f_nik' , $item);
						$this->db2->delete('t_dep_head');
						$hasil = 0;
					}
					
                } else {
                    $hasil = 0;
                }
            }
        }
        return $hasil;
    }


     public function get_um_datadepthead() {
		 
        $query1 = "select (SELECT COUNT(*) from t_detail_cabang_dephead as c WHERE c.f_nik = a.nik ) as cabang,(select z.f_jabatan from t_dep_head as z where z.f_nik = a.nik) as jabatan, a.* FROM `bss_employee` as a  WHERE  `nik` IN (SELECT a.f_nik FROM t_dep_head as a)";
        $data = $this->db2->query($query1);
        return $data;
    }

    public function delete_multi_um_dephead($selection) {
        foreach ($selection as $item) {
            $this->db2->where('f_nik', $item);
            $delete = $this->db2->delete('t_dep_head');
            if ($delete === TRUE) {
                $this->db2->where('f_nik', $item);
                $delete2 = $this->db2->delete('t_detail_cabang_dephead');
                if ($delete2 == TRUE) {
                    $hasil = 1;
                } else {
                    $hasil = 0;
                }
            } else {
                $hasil = 0;
            }
            return $hasil;
        }
    }

    public function getdatadepthead($id) {
		$query2 = "select a.* from bss_employee as a where a.nik = '".$id."'";
        $query1 = "SELECT a.*,b.* FROM `t_dep_head` as a JOIN bss_employee as b ON b.nik = a.f_nik WHERE a.f_nik = '" . $id . "'";
        $select = $this->db2->query($query2)->row();
        return $select;
    }

    public function branch($nik) {
//        $querycabang = "select * from bss_company order by COMPANY_NAME asc";
        $querydetail = "select a.*,b.* from t_detail_cabang_dephead as a join bss_company as b on b.id = a.f_kode_cabang where a.f_nik  = '" . $nik . "' ";
        $hasil = $this->db2->query($querydetail)->result();
        return $hasil;
    }

    public function branchdata() {
//        $querycabang = "select * from bss_company order by COMPANY_NAME asc";
        $querydetail = "select a.* from bss_company as a where id not in (select b.f_kode_cabang from t_detail_cabang_dephead as b)";
        $hasil = $this->db2->query($querydetail)->result();
        return $hasil;
    }	

	public function branchdata_bm($nik) {
		$selectjabatan = "select * from dbmgmtmenu.t_user as b where b.f_userlevel in (select a.f_value from dbbsscollection.t_parameter as a where a.f_type = 'DPH') and b.f_userid ='".$nik."'";
		$selectjabatan2 = "select * from dbmgmtmenu.t_user as b where b.f_userlevel in (select a.f_value from dbbsscollection.t_parameter as a where a.f_type = 'BM') and b.f_userid ='".$nik."'";
//        $querycabang = "select * from bss_company order by COMPANY_NAME asc";
		$hasiljabatan = $this->db2->query($selectjabatan)->num_rows();
		$hasiljabatan2 = $this->db2->query($selectjabatan2)->num_rows();
		if($hasiljabatan > 0){
			$querydetail = "select a.* from dbbsscollection.bss_company as a where a.id not in (select b.f_kode_cabang from dbbsscollection.t_detail_cabang_dephead as b where b.f_nik in (select c.f_userid FROM dbmgmtmenu.t_user as c where c.f_userlevel in (SELECT d.f_value FROM dbbsscollection.t_parameter as d where d.f_type = 'DPH'))) and a.id <> ''";
			$hasil = $this->db2->query($querydetail)->result();
			return $hasil;
		} else if($hasiljabatan2 > 0){
			$querydetail = "select a.* from dbbsscollection.bss_company as a where id not in (select b.f_kode_cabang from dbbsscollection.t_detail_cabang_dephead as b where b.f_nik in (select c.f_userid FROM dbmgmtmenu.t_user as c where c.f_userlevel in (SELECT d.f_value FROM dbbsscollection.t_parameter as d where d.f_type = 'BM'))) and a.id <> ''";
			$hasil = $this->db2->query($querydetail)->result();
			return $hasil;
		} else {		
			$querydetail = "select a.* from dbbsscollection.bss_company as a where a.id <> ''";
			$hasil = $this->db2->query($querydetail)->result();
			return $hasil;	
		}
    }
    public function input($selection, $nik) {
        if ($selection == '') {
            $hasil = 0;
        } else {
            foreach ($selection as $a) {
                $selec = "select * from bss_company where id = '" . $a . "'";
                if ($this->db2->query($selec)->num_rows() > 0) {
                    $data = $this->db2->query($selec)->row();
                    $input = array(
                        'f_nik' => $nik,
                        'f_kode_cabang' => $data->ID,
                        'f_cabang' => $data->COMPANY_NAME,
						'f_usercreate' => $this->session->userdata('username'),
						'f_datetimecreate' => date('Y-m-d H:i:s')
                    );
                    $input1 = $this->db2->insert('t_detail_cabang_dephead', $input);
                    if ($input1 === TRUE) {
                        $hasil = 1;
                    } else {
                        $hasil = 2;
                    }
                } else {
                    $hasil = 3;
                }
            }
            return $hasil;
        }
    }

    public function delete($selection, $nik) {
        if ($selection == '') {
            $hasil = 0;
        } else {
            foreach ($selection as $a) {
                $this->db2->where('f_id', $a);
                $delete = $this->db2->delete('t_detail_cabang_dephead');
                if ($delete === TRUE) {
                    $hasil = 1;
                } else {
                    $hasil = 2;
                }
            }
            return $hasil;
        }
    }

	public function setdpd($value,$nik){
        $data = array(
            'f_value'=>$value
        );
        $this->db2->where('f_nik',$nik);
        $update = $this->db2->update('t_dep_head',$data);
        if($update == true){
            return 1;
        } else {
            return 0;
        }
        
    }
}