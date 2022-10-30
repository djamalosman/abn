<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Modeluserweb extends CI_Model {

    public function get_userdata() {
        $select = "select (select d.f_levelname from t_level as d where d.t_levelid = a.f_userlevel ) as levelname, a.* from t_user as a order by a.f_datecreate desc";
        $data = $this->db->query($select);
        return $data->result();
    }
	
	public function updatestatus_userweb($selection){
		 $upadtetuser = array(
            'f_status_login' => '0'
        );
		$this->db->update('t_user',$upadtetuser);
		$this->db->where('f_userid',$selection);
		return 1;
	}
	
	
    public function get_employee() {
        $select = "select a.* from dbbsscollection.`bss_employee` as a  WHERE a.`nik` NOT IN (SELECT b.f_agentid FROM dbbsscollection.t_agent as b where b.f_active = '1') AND a.nik NOT IN (SELECT c.f_userid FROM dbmgmtmenu.t_user as c where c.f_active NOT IN (2,3))";
        $data = $this->db2->query($select)->result();
        return $data;
    }

    public function get_userdata_one($id) {
        $data = $this->db->get_where('t_user', array('f_userid' => $id));
        return $data->row();
    }

    public function sendimage2($data, $nik, $code, $type, $file_name, $file_size, $file, $mime_type) {
        $select = "select a.* from dbbsscollection.t_image as a JOIN dbmgmtmenu.t_user as b ON a.f_code = b.f_code_image where a.f_cif = '" . $nik . "' AND a.f_type = '" . $type . "' AND a.f_keterangan = '" . $nik . "'";
        if ($this->db2->query($select)->num_rows() > 0) {
            $data1 = array(
                'f_name_file' => $file_name,
                'f_type_file' => $mime_type,
                'f_file_content' => $file,
                'f_size_file' => $file_size
            );
            $this->db2->where('f_cif', $nik);
            $this->db2->where('f_keterangan', $nik);
            $this->db2->where('f_type', $type);
            $update = $this->db2->update('t_image', $data1);
            if ($update == TRUE) {
                return 1;
            } else {
                return 0;
            }
        } else {
            $input = $this->db2->insert('t_image', $data);
            if ($input == TRUE) {
                $data2 = array(
                    'f_code_image' => $code
                );
                $this->db->where('f_userid', $nik);
                $upadtetuser = $this->db->update('t_user', $data2);
                if ($upadtetuser == TRUE) {
                    return 1;
                } else {
                    return 0;
                }
                return 1;
            } else {
                return 0;
            }
        }
//        echo var_dump($data);
    }

    public function loadTipeUser() {
        $this->db->select(array('t_levelid', 'f_levelname'));
        $data = $this->db->get('t_level');
        return $data->result();
    }

    public function employee($nik) {
        $select = "select bss_employee.* from bss_employee where nik = '" . $nik . "'";
        $data = $this->db2->query($select)->row();
        return $data;
    }

    public function create_user($name, $id_user, $password, $email, $level, $status) {
        $data = array(
            'f_userid' => $id_user,
            'f_username' => $name,
            'f_userpswd' => $password,
            'f_email' => $email,
            'f_userlevel' => $level,
            'f_active' => '0',
            'f_status_activity' => '1',
            'f_aprove' => '0',
            'f_usercreate' => $this->session->userdata('username'),
            'f_datecreate' => date("Y-m-d"),
            'f_useruaktif' => date("Y-m-d"),
            'f_passwordaktif' => date("Y-m-d"),
            'f_userupdate' => "System",
            'f_dateupdate' => date("Y-m-d")
        );
        $selectall = "select * from t_user where f_userid = '" . $id_user . "'";
        if ($this->db->query($selectall)->num_rows() > 0) {
            $this->db->where('f_userid', $id_user);
            $update = $this->db->update('t_user', $data);
            if ($update == true) {
                return 1;
            } else {
                return 0;
            }
        } else {
            if ($this->db->insert('t_user', $data)) {
				$selectlevel = "select * from t_level where t_levelid = '".$level."'";
                $selectlevelprocess = $this->db->query($selectlevel)->row();
				if($selectlevelprocess->f_levelname == "Dept Head" ){
					$select = "select * from bss_employee where nik = '" . $id_user . "'";
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
					} else if($selectlevelprocess->f_levelname == "Breanch Manager"){
						
					}
				return 1;
            } else {
                return 0;
            }
        }
    }

    public function get_userweb_aprove() {
        $selectall = "select (select b.f_levelname from t_level as b where b.t_levelid = a.f_userlevel )as levelname,a.* from t_user as a where a.f_aprove = '0'";
        $data = $this->db->query($selectall)->result();
        return $data;
    }

    public function updatestatus_reject($id, $ket) {
        $updatedata = array(
            'f_active' => '3',
            'f_aprove' => '2',
            'f_desc' => $ket
        );
        $updatedata1 = array(
            'f_active' => '2',
            'f_aprove' => '2',
            'f_desc' => $ket
        );
        $updatedata2 = array(
            'f_aprove' => '2',
            'f_desc' => $ket
        );
        $selec1 = "select * from t_user where f_userid = '" . $id . "' ";
        $data1 = $this->db->query($selec1)->row();
        if ($data1->f_status_activity == '1') {
            $this->db->where('f_userid', $id);
            $update0 = $this->db->update('t_user', $updatedata);
            if ($update0 == TRUE) {
                $hasil = 1;
            } else {
                $hasil = 0;
            }
        } elseif ($data1->f_status_activity == '2') {
            $this->db->where('f_userid', $id);
            $update1 = $this->db->update('t_user', $updatedata2);
            if ($update1 == TRUE) {
                $this->db->where('f_userid', $id);
                $delete1 = $this->db->delete('t_user_update');
                if ($update1 == TRUE) {
                    $hasil = 1;
                } else {
                    $hasil = 0;
                }
            }
        } elseif ($data1->f_status_activity == '3') {
            $this->db->where('f_userid', $id);
            $update2 = $this->db->update('t_user', $updatedata2);
            if ($update2) {
                $hasil = 1;
            } else {
                $hasil = 0;
            }
        }
        return $hasil;
    }

    public function updatestatus_approve($a) {
        $updatedata = array(
            'f_active' => '1',
            'f_aprove' => '1'
        );
        foreach ($a as $item) {
            $select = "select * from t_user where f_userid = '" . $item . "'";
            $data = $this->db->query($select)->row();
            if ($data->f_status_activity == '1') {
                $this->db->where('f_userid', $item);
                $aprove = $this->db->update('t_user', $updatedata);
                if ($aprove == TRUE) {
                    $hasil = 1;
                } else {
                    $hasil = 0;
                }
            } elseif ($data->f_status_activity == '2') {
                $selectupdate = "select * from t_user_update where f_userid = '" . $item . "'";
                $data1 = $this->db->query($selectupdate)->row();
                $updatedata1 = array(
                    'f_active' => $data1->f_active,
                    'f_userlevel' => $data1->f_userlevel,
                    'f_aprove' => '1'
                );
                $this->db->where('f_userid', $data1->f_userid);
                $update2 = $this->db->update('t_user', $updatedata1);
                if ($update2 == TRUE) {
					if($data1->f_active != 1){
						$deletecabang = "delete from t_detail_cabang_dephead where f_nik = '".$data1->f_userid."'";
						$deleteaction = $this->db2->query($deletecabang);
					}
                    $this->db->where('f_userid', $data1->f_userid);
                    $update3 = $this->db->delete('t_user_update');
                    if ($update3 == TRUE) {
                        $hasil = 1;
                    } else {
                        $hasil = 0;
                    }
                } else {
                    $hasil = 0;
                }
            } elseif ($data->f_status_activity == '3') {
                $delete2 = array(
                    'f_active' => '2',
                    'f_aprove' => '1'
                );
                $this->db->where('f_userid', $item);
                $delete1 = $this->db->update('t_user', $delete2);
                if ($delete1 == TRUE) {
                    $hasil = 1;
                }
            }
        }
        return $hasil;
    }
	
	

    public function update_user($name, $id_user, $level, $status) {
        $data = array(
            'f_userid' => $id_user,
            'f_userlevel' => $level,
            'f_active' => $status,
			  'f_useruaktif' => date("Y-m-d"),
            'f_passwordaktif' => date("Y-m-d")
        );
        $data1 = array(
            'f_status_activity' => 2,
            'f_aprove' => '0'
        );
        $insert = $this->db->insert('t_user_update', $data);
        if ($insert == TRUE) {
            $this->db->where('f_userid', $id_user);
            $update2 = $this->db->update('t_user', $data1);
            if ($update2 == TRUE) {
                return 1;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

    public function delete_multiuser($id) {
        foreach ($id as $item) {
            $data = array(
                'f_status_activity' => '3',
                'f_aprove' => '0'
            );

            $select = "select * from t_user where f_userid = '" . $item . "' and f_active = '1' and f_aprove = '1' or f_aprove = '2'";
            $data1 = $this->db->query($select)->num_rows();
            if ($data1 > 0) {
                $this->db->where('f_userid', $item);
                $hasil1 = $this->db->update('t_user', $data);
                if ($hasil1 == true) {
                    $hasil = 1;
                } else {
                    $hasil = 0;
                }
            } else {
                $hasil = 2;
            }
        }
        return $hasil;

//        foreach ($id as $item) {
//            $this->db->where('f_userid', $item);
//            $this->db->delete('t_user');
//        }
    }

}
