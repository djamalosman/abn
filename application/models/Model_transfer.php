<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Model_transfer extends CI_Model {

    public function get_agent($nik) {
        $select1 = "select f_nik from t_dep_head where f_nik = '" . $nik . "'";
        $data1 = $this->db2->query($select1)->num_rows();
        if ($data1 > 0) {
            $select2 = "SELECT a.* FROM t_agent as a where a.f_branch_id in (select f_kode_cabang from t_detail_cabang_dephead where f_nik = '" . $nik . "') and a.f_active = 1";
            $data = $this->db2->query($select2)->result();
        } else {
            $select = "SELECT  a.* FROM t_agent as a where a.f_active = '1' ";
            $data = $this->db2->query($select)->result();
        }
        return $data;
    }

    public function get_transfer_list_account($nik) {
        $select1 = "select f_nik from t_dep_head where f_nik = '" . $nik . "'";
        $data1 = $this->db2->query($select1)->num_rows();
        if ($data1 > 0) {
            $select2 = "SELECT t_transfer_account.*,t_agent.f_agentname,t_assignment.f_cif,t_assignment.f_agent, a.NomorNasabah as f_acctno ,a.NamaDebitur as f_custname ,a.ID , t_transfer_account.f_create_date as tgl,(SELECT z.full_name from bss_employee as z where z.nik = t_transfer_account.f_user_create) as user FROM t_transfer_account JOIN t_assignment ON t_transfer_account.f_id = t_assignment.f_id_tf JOIN bss_cad as a ON a.NomorNasabah = t_assignment.f_cif JOIN t_agent ON t_transfer_account.f_transfer_to =t_agent.f_agentid WHERE t_transfer_account.f_aproved = 0 and a.KodeCabang IN (select f_kode_cabang from t_detail_cabang_dephead where f_nik = '" . $nik . "')";
            $data = $this->db2->query($select2)->result();
        } else {
            //$select = "SELECT t_transfer_account.*,t_agent.f_agentname,t_assignment.f_cif,t_assignment.f_agent, a.NomorNasabah as f_acctno ,a.NamaDebitur as f_custname FROM t_transfer_account JOIN t_assignment ON t_transfer_account.f_id = t_assignment.f_id_tf JOIN bss_cad as a ON a.NomorNasabah = t_assignment.f_cif JOIN t_agent ON t_transfer_account.f_transfer_to =t_agent.f_agentid WHERE t_transfer_account.f_aproved = 0 AND t_transfer_account.f_reject!=1";
            $select = "SELECT t_transfer_account.*,t_agent.f_agentname,t_assignment.f_cif,t_assignment.f_agent, a.NomorNasabah as f_acctno ,a.NamaDebitur as f_custname ,a.ID , t_transfer_account.f_create_date as tgl,(SELECT z.full_name from bss_employee as z where z.nik = t_transfer_account.f_user_create) as user FROM t_transfer_account JOIN t_assignment ON t_transfer_account.f_id = t_assignment.f_id_tf JOIN bss_cad as a ON a.NomorNasabah = t_assignment.f_cif JOIN t_agent ON t_transfer_account.f_transfer_to =t_agent.f_agentid WHERE t_transfer_account.f_aproved = 0 ";
            //$select = "select y.*,(SELECT a.f_agentname from t_agent as a WHERE a.f_agentid = y.f_transfer_to) as f_agentname,z.f_cif,z.f_agent,(SELECT b.NomorNasabah FROM bss_cad as b  WHERE b.NomorNasabah = z.f_cif GROUP BY b.NomorNasabah) as f_acctno ,(SELECT c.NamaDebitur FROM bss_cad as c  WHERE c.NomorNasabah = z.f_cif GROUP BY c.NomorNasabah) as f_custname from t_assignment as z LEFT JOIN t_transfer_account as y on y.f_id = z.f_id_tf WHERE z.f_id_tf in (SELECT x.f_id FROM t_transfer_account as x WHERE x.f_cif = z.f_cif and x.f_aproved = 0)";
            $data = $this->db2->query($select)->result();
        }


        return $data;
    }

    public function get_tgh_listtransfer($nik) {
        $select1 = "select f_nik from t_dep_head where f_nik = '" . $nik . "'";
        $data1 = $this->db2->query($select1)->num_rows();
        if ($data1 > 0) {
            $select2 = "SELECT MAX(a.JmlHariTunggakan) as DPD,(select com.COMPANY_NAME from bss_company as com where com.ID = a.KodeCabang) as cabang,c.*, a.*,b.* FROM bss_cad as a  JOIN t_assignment as b ON a.NomorNasabah = b.f_cif left JOIN t_agent as c ON b.f_agent = c.f_agentid where a.KodeCabang in (select f_kode_cabang from t_detail_cabang_dephead where f_nik = '" . $nik . "') and b.f_id_tf not in (select v.f_id from t_transfer_account as v where v.f_aproved = 0)GROUP BY b.f_cif ";
            $data = $this->db2->query($select2)->result();
        } else {
            $select = "SELECT MAX(a.JmlHariTunggakan) as DPD,(select com.COMPANY_NAME from bss_company as com where com.ID = a.KodeCabang) as cabang,c.*, a.*,b.* FROM bss_cad as a  JOIN t_assignment as b ON a.NomorNasabah = b.f_cif JOIN t_agent as c ON b.f_agent = c.f_agentid where b.f_id_tf not in (select v.f_id from t_transfer_account as v where v.f_aproved = 0) GROUP BY b.f_cif ";
            $data = $this->db2->query($select)->result();
        }

        return $data;
    }

    
    public function transfer_debitur_proses($id, $data, $desc) {

		$countid = sizeof($id); 
		$i = 0;
		if($countid > 0){
			foreach ($id as $item) {
				
            $select = "select (select c.f_agentname from t_agent as c where f_agentid = a.f_agent) as agent_name,a.* from t_assignment as a where a.f_cif = '" . $item . "'";

            $slct = $this->db2->query($select)->num_rows();
            if ($slct > 0) {
                $a = $this->db2->query($select)->row();
                $d = array(
                    'f_cif' => $a->f_cif,
                    'f_agentidawal' => $a->f_agent,
                    'f_agent_awal' => $a->agent_name,
                    'f_transfer_to' => $data,
                    'f_desc' => $desc,
                    'f_user_create' => $this->session->userdata('username'),
                    'f_create_date' => date('Y-m-d h:i:s')
                );
                $createtf = $this->db2->insert('t_transfer_account', $d);
                if ($createtf == TRUE) {
                    $query = "SELECT f_id FROM t_transfer_account WHERE f_aproved = '0' AND f_cif = '" . $item . "'";
                    $a = $this->db2->query($query)->row();
//                echo $a->f_id;
                    $nilai = 2;
                    $updatedata = array(
                        'f_status' => 2,
                        'f_id_tf' => $a->f_id
                    );
                    //print_r($updatedata);
                    $this->db2->where('f_cif', $item);
                    $update = $this->db2->update('t_assignment', $updatedata);
                    if ($update == TRUE) {
						$i++;
                        $hasil = 1;
                    } else {
                        $hasil = 0;
                    }
                } else {
                    $hasil = 0;
                }
				} else {
					$hasil = 2;
				}
			}
			if($countid = $i){
				return 1;
			} else {
				return 0;
			}
		}
       
        
    }
    
    public function gagal_notif_input() {
        $this->session->set_flashdata(
                "message", "<script>swal(
              'Gagal!',
              'Data Gagal Di update,Silahkan pilih data yang akan di update',
              'error'
            )</script>"
        );
    }
	
    public function transfer_debitur_proses2($id, $agentid, $desc, $code) {
        if ($code === 'edit') {
            if ($id == null) {
                $this->gagal_notif_input();
                redirect('transfer_account/index');
            } else {
                foreach ($id as $item) {
                    $d = array(
//                'f_id' => $item,
                        'f_transfer_to' => $agentid,
                        'f_desc' => $desc,
                        'f_user_update' => $this->session->userdata('username'),
                        'f_update_date' => date('Y-m-d h:i:s'),
						'f_reject'=> ''
                    );
                    $this->db2->where('f_id', $item);
                    $update = $this->db2->update('t_transfer_account', $d);
                }
            }
            if ($update === TRUE) {
                return 1;
            } else {
                return 0;
            }
        } elseif ($code === 'delete') {
            
            foreach ($id as $item) {
                $d = array(
                    'f_aproved' => '5');
					$update = "update t_assignment set f_id_tf = '',f_status = '' where f_id_tf = '".$item."'";
					if($this->db2->query($update) == true){
						$this->db2->where('f_id', $item);
						$delete = $this->db2->delete('t_transfer_account');
					}
            }
            if ($delete === TRUE) {
                return 1;
            } else {
                return 0;
            }
        }
    }
    
    public function get_transfer_list_aprove($nik) {
        //$query =  "SELECT *,t_transfer_account.f_transfer_to,t_transfer_account.f_cif,t_transfer_account.f_desc FROM t_accountlist JOIN t_transfer_account ON t_transfer_account.f_id = t_accountlist.f_id_tf";
//       $query =  "SELECT *,t_accountlist.f_agentid,t_accountlist.f_cif FROM t_transfer_account JOIN t_accountlist ON t_transfer_account.f_id = t_accountlist.f_id_tf WHERE t_transfer_account.f_aproved = 0";

		
		
        $select1 = "select f_nik from t_dep_head where f_nik = '" . $nik . "'";
        $data1 = $this->db2->query($select1)->num_rows();
        if ($data1 > 0) {
            //$select2 = "SELECT MAX(a.JmlHariTunggakan) as DPD,c.*, a.*,b.* FROM bss_cad as a JOIN t_assignment as b ON a.NomorNasabah = b.f_cif JOIN t_agent as c ON b.f_agent = c.f_agentid where a.KodeCabang in (select f_kode_cabang from t_detail_cabang_dephead where f_nik = '" . $nik . "') GROUP BY b.f_cif ";
//            $select2 = "SELECT MAX(a.JmlHariTunggakan) as DPD, t_transfer_account.*,t_agent.f_agentname,t_assignment.f_cif,t_assignment.f_agent, a.NomorNasabah as f_acctno ,a.NamaDebitur as f_custname FROM t_transfer_account LEFT JOIN t_assignment ON t_transfer_account.f_id = t_assignment.f_id_tf LEFT JOIN bss_cad as a ON a.NomorNasabah = t_assignment.f_cif LEFT JOIN t_agent ON t_transfer_account.f_transfer_to = t_agent.f_agentid WHERE t_transfer_account.f_aproved = 0 AND t_transfer_account.f_reject!=1 and t_agent.f_branch_id in (select b.f_kode_cabang from t_detail_cabang_dephead as b where b.f_nik = '" . $nik . "') ";
            $selecttf = "SELECT Max(c.JmlHariTunggakan) as DPD ,b.f_id_tf as idtransfer,(SELECT i.f_agentname from t_agent as i where i.f_agentid = a.f_transfer_to) as f_agentname,b.f_cif,b.f_agent,c.NomorRekening as f_acctno,c.NamaDebitur as f_custname,a.*,b.*,a.f_create_date as tgl,(SELECT z.full_name from bss_employee as z where z.nik = a.f_user_create) as user from t_transfer_account as a JOIN t_assignment as b on a.f_id = b.f_id_tf LEFT JOIN bss_cad as c on a.f_cif = c.NomorNasabah where a.f_aproved = 0 and a.f_reject <> 1 and c.KodeCabang in (SELECT d.f_kode_cabang FROM t_detail_cabang_dephead as d WHERE d.f_nik = '".$nik."') GROUP BY c.NomorNasabah";
            $data = $this->db2->query($selecttf)->result();
        } else {
            $select = "SELECT Max(c.JmlHariTunggakan) as DPD ,b.f_id_tf as idtransfer,(SELECT i.f_agentname from t_agent as i where i.f_agentid = a.f_transfer_to) as f_agentname,b.f_cif,b.f_agent,c.NomorRekening as f_acctno,c.NamaDebitur as f_custname,a.*,b.*,a.f_create_date as tgl,(SELECT z.full_name from bss_employee as z where z.nik = a.f_user_create) as user from t_transfer_account as a JOIN t_assignment as b on a.f_id = b.f_id_tf LEFT JOIN bss_cad as c on a.f_cif = c.NomorNasabah WHERE a.f_aproved = 0 and a.f_reject <> 1 GROUP BY c.NomorNasabah";
            $data = $this->db2->query($select)->result();
        }
//        $query = "SELECT t_transfer_account.*,t_agent.f_agentname,t_assignment.f_cif,t_assignment.f_agent, a.NomorNasabah as f_acctno ,a.NamaDebitur as f_custname FROM t_transfer_account JOIN t_assignment ON t_transfer_account.f_id = t_assignment.f_id_tf JOIN bss_cad as a ON a.NomorNasabah = t_assignment.f_cif JOIN t_agent ON t_transfer_account.f_transfer_to =t_agent.f_agentid WHERE t_transfer_account.f_aproved = 0 AND t_transfer_account.f_reject!=1 ";
//        $data = $this->db2->get('t_transfer_account')->result();
        // $this->db2->select('*, t_accountlist.f_agentid ,t_accountlist.f_cif,t_accountlist.f_acctno,t_accountlist.f_cusname');
        // $this->db2->from('t_transfer_account');
        // $this->db2->join('t_accountlist', 't_transfer_account.f_id = t_accountlist.f_id_tf ');
//        $this->db2->where('t_transfer_account.f_aproved', 0 );
//        $data = $this->db2->query($query);
//        $data = $this->db2->get();

        return $data;
    }
    
    public function transfer_debitur_prosesfinal($id) {
        // $agenawalid=$id;
        //  $aid=explode("-",$agenawalid);
        //           $idnya=$aid['0'];
        //$arrayName = array('f_id' =>$idnya  );
		
		$countid = sizeof($id); 
		$i = 0;
		if($id > 0){
			foreach ($id as $item) {
				
					$update = "UPDATE `t_transfer_account` SET f_aproved = '1', f_update_date = '" . date('Y-m-d h:is') . "', f_user_update = '" . $this->session->userdata('username') . "',f_reject = '' WHERE f_id = '" . $item . "' ";
					if ($this->db2->query($update) == TRUE) {
						$agent2 = "SELECT `f_transfer_to` FROM t_transfer_account WHERE f_id = '" . $item . "'";
						$agentto = $this->db2->query($agent2)->row();
						$update2 = "UPDATE `t_assignment` SET `f_agent` = '" . $agentto->f_transfer_to . "' ,`f_status` = '1',f_tgl_tugas = '".date('Y-m-d h:is')."' WHERE f_id_tf = '" . $item . "'";
						$updateassignment = $this->db2->query($update2);
						if($updateassignment == TRUE){
							$i++;
						}
				}
			}
			if ($countid = $i) {
				return 1;
			} else {
				return 0;
			}
		}
    }
	
	public function process_reject_account($id) {
        //$f_status=2;
        $rejek = 1;
        // $updateassignment=$this->db2->where('f_transfer_to',$id);
        // $updateassignment=$this->db2->delete('t_transfer_account');
		$countid = sizeof($id); 
		$i = 0;
		if($id > 0){
			foreach ($id as $item) {
				$update3 = "UPDATE `t_transfer_account` SET `f_reject` = '" . $rejek . "' WHERE f_id = '" . $item . "'";
				$updatetf = $this->db2->query($update3);
				if($updatetf == TRUE){
					$update4 = "UPDATE `t_assignment` SET `f_status` = '1' WHERE f_id_tf = '" . $item . "'";
					$updatetf2 = $this->db2->query($update4);
					if($updatetf2 == TRUE){
						$i++;
					}
				}
			}
			if($countid = $i){
				return 1;
			} else {
				return 0;
			}
			
		}
        
    }

}
