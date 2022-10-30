<?php
//coment
class Modeldb extends CI_MODEl {

    public function empty_response() {
        $response['kode'] = 0;
        $response['error'] = true;
        $response['message'] = 'Field tidak boleh kosong';
        return $response;
    }

    public function addhasilkunjungan() {
        
    }

    public function viewassignment($agentid) {
//        $this->db->where('f_assign_id', $agentid);
//        $this->db->where('f_aproved', '0');

        $queryassignmentdwh = "SELECT bss_cad.NomorRekening AS f_acctno, t_agent.f_agentid , bss_cad.NamaDebitur AS f_custname , bss_cad.COL AS f_bucket , bss_cad.PlafondAmount AS f_bucketeom , bss_cad.NomorNasabah AS f_cif , bss_cad.BakiDebet AS f_outstanding , bss_cad.DuePokok AS f_total_tagihan ,bss_customer.ADDRESS AS f_alamat_tagih , t_assignment.f_aproved , bss_cad.JmlHariTunggakan AS f_dpd , bss_customer.OFF_STREET AS f_buzaddress , bss_customer.EMAIL_1 AS f_email , bss_cad.ID AS f_loanid FROM `bss_customer` JOIN bss_cad ON bss_customer.id = bss_cad.NomorNasabah  JOIN t_assignment ON t_assignment.f_loanid = bss_cad.ID  JOIN t_agent ON t_agent.f_agentid = t_assignment.f_agent t_assignment.f_agent = '" . $agentid . "'";

        $queryjoin = "SELECT * FROM `t_assignment` JOIN t_accountlist_baru ON(t_accountlist_baru.f_id = t_assignment.f_id_debitur) WHERE t_assignment.f_agent = '" . $agentid . "'";

        $data = $this->db->query($queryjoin)->result();
//        $data = $this->db->get('t_accountlist_baru')->result();

        $response['kode'] = 1;
        $response['result'] = $data;
        return $response;
    }

    public function viewassignmentnotvisit($agentid) {
//        $this->db->where('f_assign_id', $agentid);
//        $this->db->where('f_aproved', '0');

        $queryjoin = "SELECT * FROM `t_assignment` JOIN t_accountlist_baru ON(t_accountlist_baru.f_id = t_assignment.f_id_debitur) WHERE t_assignment.f_agent = '" . $agentid . "' AND t_assignment.f_active <> '2'";

        $data = $this->db->query($queryjoin)->result();
//        $data = $this->db->get('t_accountlist_baru')->result();

        $response['kode'] = 1;
        $response['result'] = $data;
        return $response;
    }

    public function login($username, $password) {
        $this->db->select('t_agent.f_agentid,t_agent.f_agentname,t_agent.f_branch_id, t_area.f_areaname');
        $this->db->from('t_agent');
        $this->db->join('t_branch', 't_agent.f_branch_id = t_branch.f_branchid');
        $this->db->join('t_area', 't_area.f_areaid = t_branch.f_areaid');
        $this->db->where('t_agent.f_username', $username);
        $loginquery = "SELECT ";
//        $this->db->where('t_agent.f_userpswd', $password);
        $query = $this->db->get();
        if ($query->num_rows() != '') {
            $this->db->select('t_agent.f_agentid,t_agent.f_agentname,t_agent.f_branch_id, t_area.f_areaname');
            $this->db->from('t_agent');
            $this->db->join('t_branch', 't_agent.f_branch_id = t_branch.f_branchid');
            $this->db->join('t_area', 't_area.f_areaid = t_branch.f_areaid');
            $this->db->where('t_agent.f_userpswd', $password);
            $query1 = $this->db->get();
            if ($query1->num_rows() != '') {
                foreach ($query1->result() as $row) {
                    $username1 = $row->f_agentid;
                    $data = array(
                        'id_user' => $row->f_agentid,
                        'nama' => $row->f_agentname,
                        'id_branch' => $row->f_branch_id,
                        'email' => $row->f_areaname);
                }
                if ($username1 === $username) {
                    return $user = array(
                        'kode' => '1',
                        'result' => $data,
                        'message' => 'Login Sukses'
                    );
                } else {
                    $data2 = array(
                        'id_user' => 'no',
                        'nama' => 'no',
                        'id_branch' => 'no',
                        'email' => 'no');
                    return $user = array(
                        'kode' => '0',
                        'result' => $data2,
                        'message' => 'User Name Tidak Di Temukan');
                }
            } else {
                $data3 = array(
                    'id_user' => 'no',
                    'nama' => 'no',
                    'id_branch' => 'no',
                    'email' => 'no');
                return $user = array(
                    'kode' => '0',
                    'result' => $data3,
                    'message' => 'Password Salah');
            }
        } else {
            $data1 = array(
                'id_user' => 'no',
                'nama' => 'no',
                'id_branch' => 'no',
                'email' => 'no');
            return $user = array(
                'kode' => '0',
                'result' => $data1,
                'message' => 'User Name Tidak Di Temukan');
        }
    }

    public function applyassignment($selected) {
        $date = date('Y-m-d');
        $data = array(
            'f_aproved' => 1,
            'f_tanggal' => $date
        );
//        print_r($selected);
        if (empty($selected)) {
            return $user = array(
                'kode' => '0');
        } else {
//            if (is_array($selected)) {
            foreach ($selected as $item) {
                $this->db->where('f_loanid', $item);
                $update = $this->db->update('t_assignment', $data);
            }
            if ($update === TRUE) {
                return $user = array(
                    'kode' => '1');
            }
//            } else {
//                echo 'salah';
//            }
        }
    }

    public function downloadplanvisit($agentid) {
        $query1 = "SELECT t_accountlist_baru.*, t_assignment.* FROM `t_assignment` JOIN t_accountlist_baru ON (t_assignment.f_id_debitur = t_accountlist_baru.f_id) WHERE t_assignment.f_aproved = '2' AND t_assignment.f_agent = '" . $agentid . "' AND t_assignment.f_active = ''";
//        $this->db->select('t_accountlist.*');
//        $this->db->from('t_accountlist');
//        $this->db->join('t_assigndetail', 't_assigndetail.f_acctno = t_accountlist.f_acctno');
//        $this->db->where('t_assigndetail.f_agentid', $agentid);
//        $this->db->where('t_accountlist.f_aproved', 2);
//        $this->db->where('t_accountlist.f_status', 0);
//        $query = $this->db->get();
//        $numrow = $query->num_rows();

        $getdata = $this->db->query($query1);
//        $user['kode'] = '1';
//        $user['result'] = $query->result()->row()->f_cif;
//        $user['kode'] = '1';
//        $user['result'] = $numrow;
        if ($getdata->num_rows() != 0) {
            $data2 = $getdata->result();

            foreach ($data2 as $cif) {
                $f_cif = $cif->f_cif;
                $this->db->where('f_cif', $f_cif);
                $data = array('f_active' => 1);
                $this->db->update('t_assignment', $data);
            }
            $user['kode'] = '1';
            $user['result'] = $getdata->result();
        } else {
            $user['kode'] = '1';
            $user['result'] = $getdata->result();
        }


        return $user;
    }

    public function viewplanvisit($agentid) {
        $query1 = "SELECT t_accountlist_baru.*, t_assignment.* FROM `t_assignment` JOIN t_accountlist_baru ON (t_assignment.f_id_debitur = t_accountlist_baru.f_id) WHERE t_assignment.f_aproved = '2' AND t_assignment.f_agent = '" . $agentid . "' AND t_assignment.f_active = '1'";
//        $this->db->select('t_accountlist.*');
//        $this->db->from('t_accountlist');
//        $this->db->join('t_assigndetail', 't_assigndetail.f_acctno = t_accountlist.f_acctno');
//        $this->db->where('t_assigndetail.f_agentid', $agentid);
//        $this->db->where('t_accountlist.f_aproved', 2);
//        $query = $this->db->get()->result();
        $data = $this->db->query($query1)->result();
        $user['kode'] = '1';
        $user['result'] = $data;
//        if ($query->num_rows() > 0) {
//            
//            foreach ($query['f_cif'] as $cif) {
//                $this->db->where('f_cif', $cif);
//                $data = array('f_aproved' => 3);
//                $this->db->update('t_accountlist', $data);
//            }
//

        return $user;
    }

    public function viewptp($agentid) {
        $date1 = date('Y-m');
        $query1 = "SELECT f_nama_nasabah,f_cif,f_loanid,f_hasilkunjungan,f_bertemu,f_lokasibertemu,f_actionplan, f_date_actionplan,f_nominal_pelunasan FROM t_kunjungan WHERE f_agentid = '" . $agentid . "' AND f_actionplan_status = '1' AND SUBSTR(`f_tgl_visit`,1,7) = '" . $date1 . "'";
        $data1 = $this->db->query($query1)->result();
        $response['kode'] = '1';
        $response['result'] = $data1;
        return $response;
    }

    public function viewptptoday($agentid) {
        $date1 = date('Y-m');
        $date2 = date('Y-m-d');
        $query1 = "SELECT f_nama_nasabah,f_cif,f_loanid,f_hasilkunjungan,f_bertemu,f_lokasibertemu,f_actionplan, f_date_actionplan,f_nominal_pelunasan FROM t_kunjungan WHERE f_agentid = '" . $agentid . "' AND f_actionplan_status = '1' AND SUBSTR(`f_tgl_visit`,1,7) = '" . $date1 . "' AND f_date_actionplan = '" . $date2 . "'";
        $data1 = $this->db->query($query1)->result();
        $response['kode'] = '1';
        $response['result'] = $data1;
        return $response;
    }

    public function inputkunjungan($f_code_image, $f_lat, $f_lng, $f_agentid, $f_tujuan, $f_namanasbah, $f_cif, $f_loanid, $f_hasilkunjungan, $f_keteranganhasilkunjungan, $f_tanggalptp, $f_bertemu, $f_ketbertemu, $f_lokasibertemu, $f_ketlokasi, $f_karakter, $f_ketkarakter, $f_negatifissue, $f_actionplan, $f_nominalpelunasan, $f_dateactionplan, $f_resumenasabah, $f_totaltunggakan, $f_perkiraanperbaikanbucked, $f_tglvisit, $f_totalbayar) {
//        $user['kode'] = '1';
//        return $user;

        $query1 = "SELECT * FROM `t_parameter` WHERE `f_desc` = '" . $f_actionplan . "'";
        $codeap = $this->db->query($query1)->row();
        if ($codeap != '') {
            $a = array('A1', 'A2', 'A3');
            if (in_array($codeap->f_code, $a)) {
                $b = "1";
            } else {
                $b = "0";
            }
            $cekphoto = "SELECT * FROM t_image WHERE f_code = '" . $f_code_image . "' AND f_type = 'photo_doc'";
            $hasilcek = $this->db->query($cekphoto)->num_rows();
//            $user['kode'] = $hasilcek;
//            $user['message'] = 'Photo Jaminan Belum Di Ambil';
//            return $user;
            if ($hasilcek === 0) {
                $user['kode'] = '0';
                $user['message'] = 'Photo Jaminan Belum Di Ambil';
                return $user;
            } else {
                $cekphotodoc = "SELECT * FROM t_image WHERE f_code = '" . $f_code_image . "' AND f_type = 'photo_jaminan'";
                $hasilcek2 = $this->db->query($cekphotodoc)->num_rows();
                if ($hasilcek2 === 0) {
                    $user['kode'] = '0';
                    $user['message'] = 'Photo Dockument Belum Di Ambil';
                    return $user;
                } else {
//                    $user['kode'] = '1';
//                    $user['message'] = 'Photo Jaminan Belum Di Ambil';
//                    return $user;
                    $data = array(
                        'f_tujuan' => $f_tujuan,
                        'f_nama_nasabah' => $f_namanasbah,
                        'f_cif' => $f_cif,
                        'f_actionplan_status' => $b,
                        'f_hasilkunjungan' => $f_hasilkunjungan,
                        'f_keterangan_hasilkunjungan' => $f_keteranganhasilkunjungan,
                        'f_tanggal_ptp' => $f_tanggalptp,
                        'f_bertemu' => $f_bertemu,
                        'f_keterangan_bertemu' => $f_ketbertemu,
                        'f_lokasibertemu' => $f_lokasibertemu,
                        'f_keterangan_lokasi' => $f_ketlokasi,
                        'f_karakter' => $f_karakter,
                        'f_keterangan_karakter' => $f_ketkarakter,
                        'f_negatif_issue' => $f_negatifissue,
                        'f_actionplan' => $f_actionplan,
                        'f_resumenasabah' => $f_resumenasabah,
                        'f_total_tunggakan' => $f_totaltunggakan,
                        'f_total_bayar' => $f_totalbayar,
                        'f_perkiraan' => $f_perkiraanperbaikanbucked,
                        'f_tgl_visit' => $f_tglvisit,
                        'f_date_actionplan' => $f_dateactionplan,
                        'f_nominal_pelunasan' => $f_nominalpelunasan,
                        'f_agentid' => $f_agentid,
                        'f_lat' => $f_lat,
                        'f_lng' => $f_lng,
                        'f_code_image' => $f_code_image,
                        'f_loanid' => $f_loanid
                    );
                    $input = $this->db->insert('t_kunjungan', $data);
                    if ($input === TRUE) {
                        $update = "UPDATE `t_assignment` SET `f_active` = '2' WHERE f_agent = '" . $f_agentid . "' AND f_loanid = '" . $f_loanid . "'";
                        if ($this->db->query($update) === true) {
                            $user['kode'] = '1';
                            $user['message'] = "succes";
                            return $user;
                        } else {
                            $user['kode'] = '0';
                            $user['message'] = "gagal";
                            return $user;
                        }
//                        $user['kode'] = '1';
//                        $user['message'] = "succes";
//                        return $user;
                    } else {
                        $user['kode'] = '0';
                        $user['message'] = "gagal";
                        return $user;
                    }
//                    $user['kode'] = '1';
//                    $user['message'] = "succes";
//                    return $user;
                }
            }
        } else {
            $user['kode'] = '0';
            $user['message'] = "succes";
            return $user;
        }
//        return $user;
//        $user['kode'] = $f_code_image;
//        return $f_code_image . "/" . $f_lat . "/" . $f_lng . "/" . $f_agentid . "/" . $f_tujuan . "/" . $f_namanasbah . "/" . $f_cif . "/" . $f_loanid . "/" . $f_hasilkunjungan . "/" . $f_keteranganhasilkunjungan . "/" . $f_tanggalptp . "/" . $f_bertemu . "/" . $f_ketbertemu . "/" . $f_lokasibertemu . "/" . $f_ketlokasi . "/" . $f_karakter . "/" . $f_ketkarakter . "/" . $f_negatifissue . "/" . $f_actionplan . "/" . $f_nominalpelunasan . "/" . $f_dateactionplan . "/" . $f_resumenasabah . "/" . $f_totaltunggakan . "/" . $f_perkiraanperbaikanbucked . "/" . $f_tglvisit . "/" . $f_totalbayar;
    }

    public function inputhasilkunjungan($f_code_image, $f_lat, $f_lng, $f_agentid, $f_tujuan, $f_namanasbah, $f_cif, $f_loanid, $f_hasilkunjungan, $f_keteranganhasilkunjungan, $f_tanggalptp, $f_bertemu, $f_ketbertemu, $f_lokasibertemu, $f_ketlokasi, $f_karakter, $f_ketkarakter, $f_negatifissue, $f_actionplan, $f_nominalpelunasan, $f_dateactionplan, $f_resumenasabah, $f_totaltunggakan, $f_perkiraanperbaikanbucked, $f_tglvisit, $f_totalbayar) {

        $query1 = "SELECT * FROM `t_parameter` WHERE `f_desc` = '" . $f_actionplan . "'";
        $codeap = $this->db->query($query1)->result();
        $data = array(
            $f_code_image, $f_lat, $f_lng, $f_agentid, $f_tujuan, $f_namanasbah, $f_cif, $f_loanid, $f_hasilkunjungan,
            $f_keteranganhasilkunjungan, $f_tanggalptp, $f_bertemu, $f_ketbertemu, $f_lokasibertemu,
            $f_ketlokasi, $f_karakter, $f_ketkarakter, $f_negatifissue, $f_actionplan,
            $f_nominalpelunasan, $f_dateactionplan, $f_resumenasabah, $f_totaltunggakan, $f_perkiraanperbaikanbucked,
            $f_tglvisit, $f_totalbayar
        );
//            return $codeap->f_code;
        $a = array('A1', 'A2', 'A3');
        $user['kode'] = $f_code_image;
//        in_array($level, $a)
//        if (in_array($codeap->f_code, $a)) {
//            $b = "1";
//        } else {
//            $b = "0";
//        }
//        $data = array(
//        'f_tujuan' => $f_tujuan,
//        'f_nama_nasabah' => $f_namanasbah,
//        'f_cif' => $f_cif,
//        'f_actionplan_status' => $b,
//        'f_hasilkunjungan' => $f_hasilkunjungan,
//        'f_keterangan_hasilkunjungan' => $f_keteranganhasilkunjungan,
//        'f_tanggal_ptp' => $f_tanggalptp,
//        'f_bertemu' => $f_bertemu,
//        'f_keterangan_bertemu' => $f_ketbertemu,
//        'f_lokasibertemu' => $f_lokasibertemu,
//        'f_keterangan_lokasi' => $f_ketlokasi,
//        'f_karakter' => $f_karakter,
//        'f_keterangan_karakter' => $f_ketkarakter,
//        'f_negatif_issue' => $f_negatifissue,
//        'f_actionplan' => $f_actionplan,
//        'f_resumenasabah' => $f_resumenasabah,
//        'f_total_tunggakan' => $f_totaltunggakan,
//        'f_total_bayar' => $f_totalbayar,
//        'f_perkiraan' => $f_perkiraanperbaikanbucked,
//        'f_tgl_visit' => $f_tglvisit,
//        'f_date_actionplan' => $f_dateactionplan,
//        'f_nominal_pelunasan' => $f_nominalpelunasan,
//        'f_agentid' => $f_agentid,
//        'f_lat' => $f_lat,
//        'f_lng' => $f_lng,
//        'f_code_image' => $f_code_image,
//        'f_loanid' => $f_loanid
//        );
//        $input = $this->db->insert('t_kunjungan', $data);
//        if ($input === TRUE) {
//            $update = "UPDATE `t_assignment` SET `f_active` = '2' WHERE f_agent = '" . $p30 . "' AND f_loanid = '" . $p3 . "'";
//            if ($this->db->query($update) === true) {
//                $user['kode'] = 1;
//                return $user;
//            } else {
//                $user['kode'] = 0;
//                return $user;
//            }
////            $user['kode'] = '1';
////            return $user;
//        } else {
//            $user['kode'] = 0;
//            return $user;
//        }
        return $user;


//        $user['result'] = array($p1, $p2, $p3, $p4, $p5, $p6, $p7, $p8, $p9, $p10, $p11, $p12, $p13, $p14, $p15, $p16, $p17, $p18, $p19, $p20, $p21, $p22, $p23, $p24, $p25, $p26, $p27);
    }

    public function viewcontact($cif) {
        $this->db->where('f_cif', $cif);
        $data = $this->db->get('t_contact')->result();

        $response['kode'] = 1;
        $response['result'] = $data;
        return $response;
    }

    public function upcontact($cif, $c1, $c2, $c3, $c4, $c5, $c6, $c7) {
        $this->db->where('f_cif', $cif);
        $data = $this->db->get('t_contact')->num_rows();

        $update = array('f_contact_1' => $c1,
            'f_contact_2' => $c2,
            'f_contact_3' => $c3,
            'f_contact_4' => $c4,
            'f_contact_5' => $c5,
            'f_contact_6' => $c6,
            'f_contact_7' => $c7);
        $update2 = array('f_cif' => $cif, 'f_contact_1' => $c1,
            'f_contact_2' => $c2,
            'f_contact_3' => $c3,
            'f_contact_4' => $c4,
            'f_contact_5' => $c5,
            'f_contact_6' => $c6,
            'f_contact_7' => $c7);
        if ($data > 0) {

            $this->db->where('f_cif', $cif);
            $update1 = $this->db->update('t_contact', $update);

            if ($update1 === TRUE) {
                $response['kode'] = 1;
//                return $response;
            } else {
                $response['kode'] = 0;
//                return $response;
            }
        } else {
            $input = $this->db->insert('t_contact', $update2);

            if ($input === TRUE) {
                $response['kode'] = 1;
//                return $response;
            } else {
                $response['kode'] = 0;
//                return $response;
            }
        }
        return $response;
//        $response['kode'] = $data;
//            //$response['result'] = $data;
//            return $response;
    }

    public function viewjaminan($cif) {
        $this->db->where('f_cif', $cif);
        $data = $this->db->get('t_jaminan')->result();

        $response['kode'] = 1;
        $response['result'] = $data;
        return $response;
    }

    public function viewkunjungan($cif, $loanid) {
//        $query1 = "SELECT t_kunjungan.f_cif, t_kunjungan.f_agentid, t_agent.f_agentname, t_kunjungan.f_loanid,t_kunjungan.f_code_image,t_kunjungan.f_hasilkunjungan, t_kunjungan.f_total_bayar, t_kunjungan.f_bertemu ,t_kunjungan.f_lokasibertemu , t_kunjungan.f_karakter , t_kunjungan.f_resumenasabah , t_kunjungan.f_actionplan , t_kunjungan.f_tgl_visit , t_kunjungan.f_date_actionplan FROM t_kunjungan JOIN t_agent ON t_agent.f_agentid = t_kunjungan.f_agentid WHERE f_cif = '" . $cif . "' AND f_loanid = '" . $loanid . "' ORDER BY f_tgl_visit ASC";
        $this->db->select('t_kunjungan.f_cif, t_kunjungan.f_agentid, t_agent.f_agentname, t_kunjungan.f_loanid,t_kunjungan.f_code_image,t_kunjungan.f_hasilkunjungan, t_kunjungan.f_total_bayar, t_kunjungan.f_bertemu ,t_kunjungan.f_lokasibertemu , t_kunjungan.f_karakter , t_kunjungan.f_resumenasabah , t_kunjungan.f_actionplan , t_kunjungan.f_tgl_visit , t_kunjungan.f_date_actionplan');
        $this->db->from('t_kunjungan');
        $this->db->join('t_agent', 't_agent.f_agentid = t_kunjungan.f_agentid');
        $this->db->where('f_cif', $cif);
        $this->db->where('f_loanid', $loanid);
        $this->db->order_by('f_tgl_visit', 'asc');
        $data = $this->db->get();
//        $data1 = $this->db->query($query1)->result();
        if ($data->num_rows() > 0) {
            $data2 = $data->result();
            $response['kode'] = 1;
            $response['result'] = $data2;
            return $response;
        } else {
            $data3 = $data->result();
            $response['kode'] = 0;
            $response['result'] = $data3;
            return $response;
        }
    }

    public function viewfasilitas($cif) {
        $this->db->where('f_cif', $cif);
        $data = $this->db->get('t_fasilitas')->result();

        $response['kode'] = 1;
        $response['result'] = $data;
        return $response;
    }

    public function location($id, $lat, $lng, $date) {
        $data = array('user' => $id,
            'lat' => $lat,
            'lng' => $lng,
            'datetime' => $date);
        $input = $this->db->insert('location', $data);
        if ($input === TRUE) {
            $response['kode'] = 1;
            return $response;
        } else {
            $response['kode'] = 0;
            return $response;
        }
    }

    public function viewdetail($cif) {
        $query1 = "SELECT t_accountlist_baru.*, t_assignment.* FROM `t_assignment` JOIN t_accountlist_baru ON (t_assignment.f_id = t_accountlist_baru.f_assign_id) WHERE t_assignment.f_loanid = '" . $cif . "'";
//        $this->db->where('f_cif', $cif);
//        $data = $this->db->get('t_accountlist')->result();
        $dta = $this->db->query($query1);
        $response['kode'] = 1;
        $response['result'] = $dta->result();
        return $response;
    }

    public function viewRS($cif) {
        $this->db->where('f_cif', $cif);
        $data = $this->db->get('t_restrukturisasi')->result();

        $response['kode'] = 1;
        $response['result'] = $data;
        return $response;
    }

    public function viewSP($cif) {
        $this->db->where('f_cif', $cif);
        $data = $this->db->get('t_sp')->result();

        $response['kode'] = 1;
        $response['result'] = $data;
        return $response;
    }

    public function viewFS($cif) {
        $this->db->where('f_cif', $cif);
        $data = $this->db->get('t_fs')->result();

        $response['kode'] = 1;
        $response['result'] = $data;
        return $response;
    }

    public function viewlocation($cif) {
        $this->db->where('f_cif', $cif);
        $data = $this->db->get('t_longlat');

        foreach ($data->result() as $row) {
            $data1 = array(
                'f_lat' => $row->f_lat,
                'f_long' => $row->f_long);
        }

        $response['kode'] = 1;
        $response['result'] = $data1;
        return $response;
    }

    public function viewkunjungan1($cif, $tgl) {
        $this->db->where('f_cif', $cif);
        $this->db->where('f_tgl_visit', $tgl);
        $data = $this->db->get('t_kunjungan')->result_array();
        $a = array();

        foreach ($data as $row) {
            array_push($a, array(
                'f_id' => $row['f_id'],
                'f_file_doc' => base64_encode($row['f_file_doc']),
                'f_file_foto' => base64_encode($row['f_file_foto'])
            ));
        }
        //header("Content-type: image/jpeg");
        $response['kode'] = 1;
        $response['result'] = $a;

        return $response;
    }

    public function viewactionplan($type) {
        $this->db->where('f_type', $type);
        $data = $this->db->get('t_parameter')->result();

        $response['kode'] = 1;
        $response['result'] = $data;
        return $response;
    }

    public function getparameter($untuk) {
        $this->db->where('f_untuk', $untuk);
        $data = $this->db->get('t_parameter')->result();

        $response['kode'] = 1;
        $response['result'] = $data;
        return $response;
    }

    public function promise() {
        $querypromise = "SELECT t_accountlist_baru.f_dpd,t_accountlist_baru.f_loanid, t_assignment.f_active FROM t_assignment JOIN t_accountlist_baru ON t_assignment.f_id_debitur = t_accountlist_baru.f_id ";
        $prom = $this->db->query($querypromise)->result();
        $response['kode'] = $prom;
        return $response;
    }

    public function countassignment($agentid) {

        $date = date('Y-m');
        $date1 = date('Y-m-d');
        /*$querypromise = "SELECT t_accountlist_baru.f_dpd,t_accountlist_baru.f_loanid, t_assignment.f_active, t_kunjungan.f_date_actionplan FROM t_assignment JOIN t_accountlist_baru ON t_assignment.f_id_debitur = t_accountlist_baru.f_id JOIN t_kunjungan ON t_kunjungan.f_loanid = t_assignment.f_loanid ";
        $prom = $this->db->query($querypromise)->result();
        foreach ($prom as $item) {
//            if($item->f_dpd == 0 && $item->f_active <> 2){
//                $loan = $item->f_loanid ;
//                $updateprom = "UPDATE t_assignment SET f_promise = '3' WHERE f_loanid = '".$loan."'";
//                if($this->db->query($updateprom) == TRUE){
//                    $response['updateassignment'] = 1;
//                } else {
//                    $response['updateassignment'] = 0;
//                }
//            } 
            if ($item->f_dpd <> 0 && $item->f_date_actionplan > $date1) {
                $loan = $item->f_loanid;
                $updateprom = "UPDATE t_assignment SET f_promise = '1' WHERE f_loanid = '" . $loan . "'";
                if ($this->db->query($updateprom) == TRUE) {
                    // $response['updateassignment'] = 1;
                } else {
                    // $response['updateassignment'] = 0;
                }
            } else {}
            if ($item->f_dpd == 0 && $item->f_date_actionplan <= $date1) {
                $updateprom = "UPDATE t_assignment SET f_promise = '2' WHERE f_loanid = '" . $loan . "'";
                if ($this->db->query($updateprom) == TRUE) {
                    // $response['updateassignment2'] = 1;
                } else {
                    // $response['updateassignment2'] = 0;
                }
            } else {}
        }
*/
        $queryselft = "SELECT t_accountlist_baru.f_dpd,t_accountlist_baru.f_loanid, t_assignment.f_active FROM t_assignment JOIN t_accountlist_baru ON t_assignment.f_id_debitur = t_accountlist_baru.f_id ";
        $prom1 = $this->db->query($queryselft)->result();
        foreach ($prom1 as $item) {
              if($item->f_dpd == 0 && $item->f_active <> 2){
                $loan = $item->f_loanid ;
                $updateprom = "UPDATE t_assignment SET f_promise = '3' WHERE f_loanid = '".$loan."'";
                if($this->db->query($updateprom) == TRUE){
                    // $response['updateassignment3'] = 1;
                } else {
                    // $response['updateassignment3'] = 0;
                }
            }      
        }

        $query = "SELECT t_assignment.* FROM t_accountlist_baru JOIN t_assignment ON (t_accountlist_baru.f_id = t_assignment.f_id_debitur) WHERE t_assignment.f_agent = '" . $agentid . "' AND SUBSTR(t_assignment.f_date_cerate,1,7) = '" . $date . "'";
        $query1 = "SELECT * FROM t_kunjungan WHERE SUBSTR(f_tgl_visit,1,7)  = '" . $date . "' AND f_agentid = '" . $agentid . "'";
        $query2 = "SELECT t_assignment.*  FROM `t_assignment` JOIN t_accountlist_baru ON t_assignment.f_id_debitur = t_accountlist_baru.f_id WHERE t_assignment.`f_active` <> '2' AND t_assignment.f_agent = '" . $agentid . "' AND SUBSTR(t_assignment.f_date_cerate,1,7) = '" . $date . "'";
        $query3 = "SELECT t_kunjungan.*  FROM t_kunjungan  JOIN t_assignment ON t_assignment.f_loanid = t_kunjungan.f_loanid WHERE  t_assignment.f_agent = '" . $agentid . "' AND SUBSTR(t_kunjungan.f_tgl_visit,1,7) = '" . $date . "' AND f_hasilkunjungan = '1'";
        $query4 = "SELECT t_kunjungan.*  FROM t_kunjungan  JOIN t_assignment ON t_assignment.f_loanid = t_kunjungan.f_loanid WHERE  t_assignment.f_agent = '" . $agentid . "' AND SUBSTR(t_kunjungan.f_tgl_visit,1,7) = '" . $date . "' AND f_hasilkunjungan = 'No Contacted'";
        $query5 = "SELECT t_kunjungan.*  FROM t_kunjungan  JOIN t_assignment ON t_assignment.f_loanid = t_kunjungan.f_loanid WHERE  t_assignment.f_agent = '" . $agentid . "' AND SUBSTR(t_kunjungan.f_tgl_visit,1,7) = '" . $date . "' AND f_actionplan_status = '1' AND f_date_actionplan = '" . $date1 . "'";
        $bp = "SELECT t_kunjungan.*  FROM t_kunjungan  JOIN t_assignment ON t_assignment.f_loanid = t_kunjungan.f_loanid WHERE  t_assignment.f_agent = '" . $agentid . "' AND SUBSTR(t_kunjungan.f_tgl_visit,1,7) = '" . $date . "' AND t_assignment.f_promise = '1'";
        $kp = "SELECT t_kunjungan.*  FROM t_kunjungan  JOIN t_assignment ON t_assignment.f_loanid = t_kunjungan.f_loanid WHERE  t_assignment.f_agent = '" . $agentid . "' AND SUBSTR(t_kunjungan.f_tgl_visit,1,7) = '" . $date . "' AND t_assignment.f_promise = '2'";
        $sc = "SELECT * FROM  t_assignment WHERE  f_agent = '" . $agentid . "' AND f_promise = '3'";
        $data = $this->db->query($query)->num_rows();

        $data1 = $this->db->query($query1)->num_rows();
        $data2 = $this->db->query($query2)->num_rows();
        $data3 = $this->db->query($query3)->num_rows();
        $data4 = $this->db->query($query4)->num_rows();
        $data5 = $this->db->query($query5)->num_rows();
        $data6 = $this->db->query($bp)->num_rows();
        $data7 = $this->db->query($kp)->num_rows();
        $data8 = $this->db->query($sc)->num_rows();
//        $this->db->where('f_agentid', $agentid);
//        $data = $this->db->get('t_accountlist')->num_rows();

        $response['kode'] = 1;
        $response['count'] = $data;
        $response['count1'] = $data1;
        $response['count2'] = $data2;
        $response['count3'] = $data3;
        $response['count4'] = $data4;
        $response['count5'] = $data5;
        $response['count6'] = $data6;
        $response['count7'] = $data7;
        $response['count8'] = $data8;
        // $response['array'] = $prom;
        return $response;
    }

    public function sendimage($p1, $p2, $p3, $p4, $p5, $p6, $p7, $p8) {
//        $this->db->where('f_code', $p2);
        $this->db->where('f_cif', $p1);
        $this->db->where('f_type', $p3);
        $data1 = $this->db->get('t_image')->num_rows();
        if ($data1 == 0) {
            $data = array(
                'f_code' => $p2,
                'f_cif' => $p1,
                'f_type' => $p3,
                'f_name_file' => $p4,
                'f_type_file' => $p6,
                'f_file_content' => $p7,
                'f_size_file' => $p5,
                'f_tanggal' => $p8);
            $input = $this->db->insert('t_image', $data);
            if ($input === TRUE) {
                $update = array('f_code_image' => $p2, 'f_type_image' => $p3);
                $this->db->where('f_agentid', $p1);
                $update1 = $this->db->update('t_agent', $update);
                if ($update1 === TRUE) {
                    $user['kode'] = '1';
                    return $user;
                } else {
                    $user['kode'] = '0';
                    return $user;
                }
            } else {
                $user['kode'] = '0';
                return $user;
            }
        } else {
            $data11 = array(
                'f_cif' => $p1,
                'f_type' => $p3,
                'f_name_file' => $p4,
                'f_type_file' => $p6,
                'f_file_content' => $p7,
                'f_size_file' => $p5,
                'f_tanggal' => $p8);
            $this->db->where('f_cif', $p1);
            $update2 = $this->db->update('t_image', $data11);
            if ($update2 === TRUE) {
                $user['kode'] = '1';
                return $user;
            } else {
                $user['kode'] = '0';
                return $user;
            }
            $user['kode'] = '0';
            return $user;
        }
    }

    public function getimage($cif, $code, $type) {
        $this->db->select('f_code_image,f_type_image');
        $this->db->where('f_agentid', $cif);
        $data = $this->db->get('t_agent');

        if ($data->num_rows() > 0) {
            foreach ($data->result() as $row) {
                $code1 = $row->f_code_image;
                $type1 = $row->f_type_image;
                //$type1 = $row['f_type_image'];
            }
            $this->db->where('f_code', $code1);
            $this->db->where('f_type', $type1);
            $data = $this->db->get('t_image')->result_array();
            $a = array();

            foreach ($data as $row) {
                array_push($a, array(
                    'f_id' => $row['f_id'],
                    'f_file_doc' => base64_encode($row['f_file_content'])
                ));
            }
            $response['kode'] = 1;
            $response['result'] = $a;
        } else {
            $response['kode'] = 0;
            $response['result'] = $a;
        }
        return $response;
    }

    public function changepassword($password, $passwordnew, $idagent) {
        $query = "SELECT * FROM `t_agent` WHERE f_agentid = '" . $idagent . "' AND f_userpswd = '" . $password . "'";
        $count = $this->db->query($query)->num_rows();
        if ($count > "0") {
            $update = "UPDATE `t_agent` SET `f_userpswd` = '" . $passwordnew . "' WHERE `f_agentid` = '" . $idagent . "' AND `f_userpswd` = '" . $password . "'";
            if ($this->db->query($update) === TRUE) {
                $response['kode'] = 1;
                $response['message'] = "Ganti Password Berhasil Silahkan Masuk Kembali";
            } else {
                $response['kode'] = 0;
                $response['message'] = "Ganti Password Gagal Silahkan Masukan Dengan Benar Password Lama Anda";
            }
//            $response['kode'] = 1;
        } else {
            $response['kode'] = 0;
            $response['message'] = "Ganti Password Gagal Silahkan Masukan Dengan Benar Password Lama Anda";
        }
        return $response;
    }

    public function viewtunggakan($cif, $loanid) {
        $this->db->where('f_cif', $cif);
        $this->db->where('f_loanid', $loanid);
        $data = $this->db->get('t_tunggakan')->result();

        $response['kode'] = 1;
        $response['result'] = $data;
        return $response;
    }

    public function sendimagekunjungan($p1, $p2, $p3, $p4, $p5, $p6, $p7, $p8, $p9, $p10) {
        $data = array(
            'f_code' => $p2,
            'f_cif' => $p1,
            'f_loanid' => $p9,
            'f_keterangan' => $p10,
            'f_type' => $p3,
            'f_name_file' => $p4,
            'f_type_file' => $p6,
            'f_file_content' => $p7,
            'f_size_file' => $p5,
            'f_tanggal' => $p8);
        $input = $this->db->insert('t_image', $data);
        if ($input === TRUE) {
            $user['kode'] = '1';
            return $user;
        } else {
            $user['kode'] = '0';
            return $user;
        }
    }

    public function viewimagehk($cif, $code, $loan) {
//        $t = explode("-", $tgl, 3);
//        $ta = $t[0].$t[1].$t[2];
//        $query1 = "SELECT * FROM `t_image` WHERE f_code  = '" . $code . "' AND f_loanid = '" . $loan . "' AND f_cif = '" . $cif . "'";
//        $data = $this->db->query($query1)->num_rows();
        $this->db->where('f_code', $code);
        $this->db->where('f_cif', $cif);
        $this->db->where('f_loanid', $loan);
        $data1 = $this->db->get('t_image')->num_rows();
        if ($data1 > 0) {
            $this->db->where('f_code', $code);
            $this->db->where('f_cif', $cif);
            $this->db->where('f_loanid', $loan);
            $data = $this->db->get('t_image')->result_array();
            $a = array();

            foreach ($data as $row) {
                array_push($a, array(
                    'f_id' => $row['f_id'],
                    'f_keterangan' => $row['f_keterangan'],
                    'f_type' => $row['f_type'],
                    'f_file_doc' => base64_encode($row['f_file_content'])
                ));
            }

            $response['kode'] = 1;
            $response['result'] = $a;
            return $response;
        } else {
            $response['kode'] = 0;
            $response['result'] = array(array('f_id' => '0', 'f_file_doc' => '0'));
            return $response;
        }

//        $response['kode'] = 1;
//        $response['result'] = array(array('f_id' => '0', 'f_file_doc' => '0'));
//        return $response;
//        $data = $this->db->get('t_kunjungan')->result_array();
//        return $data;
    }

    public function viewimagehklist($cif, $code, $loan, $type) {
//        $t = explode("-", $tgl, 3);
//        $ta = $t[0].$t[1].$t[2];
//        $query1 = "SELECT * FROM `t_image` WHERE f_code  = '" . $code . "' AND f_loanid = '" . $loan . "' AND f_cif = '" . $cif . "'";
//        $data = $this->db->query($query1)->num_rows();
        $this->db->where('f_code', $code);
        $this->db->where('f_cif', $cif);
        $this->db->where('f_loanid', $loan);
        $this->db->where('f_type', $type);
        $data1 = $this->db->get('t_image')->num_rows();
        if ($data1 > 0) {
            $this->db->where('f_code', $code);
            $this->db->where('f_cif', $cif);
            $this->db->where('f_loanid', $loan);
            $this->db->where('f_type', $type);
            $data = $this->db->get('t_image')->result_array();
            $a = array();

            foreach ($data as $row) {
                array_push($a, array(
                    'f_id' => $row['f_id'],
                    'f_keterangan' => $row['f_keterangan'],
                    'f_type' => $row['f_type'],
                    'f_file_doc' => base64_encode($row['f_file_content'])
                ));
            }

            $response['kode'] = 1;
            $response['result'] = $a;
            return $response;
        } else {
            $response['kode'] = 0;
            $response['result'] = array(array('f_id' => '0', 'f_file_doc' => '0'));
            return $response;
        }

//        $response['kode'] = 1;
//        $response['result'] = array(array('f_id' => '0', 'f_file_doc' => '0'));
//        return $response;
//        $data = $this->db->get('t_kunjungan')->result_array();
//        return $data;
    }

    public function editimage($id, $text) {
        $query1 = "UPDATE `t_image` SET `f_keterangan` = '" . $text . "' WHERE `f_id` = '" . $id . "'";
        $update = $this->db->query($query1);
        if ($update === TRUE) {
            $response['kode'] = 1;
            return $response;
        } else {
            $response['kode'] = 0;
            return $response;
        }
    }

    public function viewsub1($agentid) {
        $date = date('Y-m');
        $query1 = "SELECT f_nama_nasabah,f_cif,f_loanid,f_hasilkunjungan,f_bertemu,f_lokasibertemu,f_actionplan FROM t_kunjungan WHERE  SUBSTR(f_tgl_visit,1,7)= '" . $date . "' AND f_agentid = '" . $agentid . "'";
//        $this->db->select('*');
//        $this->db->where('f_agentid', $agentid);
//        $this->db->where('substr(f_tgl_visit,7)', '2019-04');
//        $this->db->order_by('f_tgl_visit', 'asc');
//        $data = $this->db->get('t_kunjungan')->result();
        $data1 = $this->db->query($query1)->result();


        $response['kode'] = 1;
        $response['result'] = $data1;
        return $response;


//        $query1 = "SELECT * FROM t_kunjungan WHERE f_agentid = '".$agentid."' AND f_hasilkunjungan = 'PTP'";
//        $this->db->select('t_accountlist.*');
//        $this->db->from('t_accountlist');
//        $this->db->join('t_assigndetail', 't_assigndetail.f_acctno = t_accountlist.f_acctno');
//        $this->db->where('t_assigndetail.f_agentid', $agentid);
//        $this->db->where('t_accountlist.f_aproved', 2);
//        $query = $this->db->get()->result();
//        $data = $this->db->query($query1);
//        $user['kode'] = '1';
//        $user['result'] = $data->result();
////        if ($query->num_rows() > 0) {
////            
////            foreach ($query['f_cif'] as $cif) {
////                $this->db->where('f_cif', $cif);
////                $data = array('f_aproved' => 3);
////                $this->db->update('t_accountlist', $data);
////            }
////
//
//        return $user;
    }

    public function viewsub3($agentid) {
        $date = date('Y-m');
        $query1 = "SELECT f_nama_nasabah,f_cif,f_loanid,f_hasilkunjungan,f_bertemu,f_lokasibertemu,f_actionplan FROM t_kunjungan WHERE  SUBSTR(f_tgl_visit,1,7)= '" . $date . "' AND f_agentid = '" . $agentid . "' AND f_hasilkunjungan = 'Contacted'";

        $data1 = $this->db->query($query1)->result();

        $response['kode'] = 1;
        $response['result'] = $data1;
        return $response;
    }

    public function viewsub4($agentid) {
        $date = date('Y-m');
        $query1 = "SELECT f_nama_nasabah,f_cif,f_loanid,f_hasilkunjungan,f_bertemu,f_lokasibertemu,f_actionplan FROM t_kunjungan WHERE SUBSTR(f_tgl_visit,1,7)= '" . $date . "' AND f_agentid = '" . $agentid . "' AND f_hasilkunjungan = 'No Contacted'";

        $data1 = $this->db->query($query1)->result();

        $response['kode'] = 1;
        $response['result'] = $data1;
        return $response;
    }
    public function viewsub6($agentid) {
        $date = date('Y-m');
        //$query1 = "SELECT t_kunjungan.f_nama_nasabah,t_kunjungan.f_cif,t_kunjungan.f_loanid,t_kunjungan.f_hasilkunjungan,t_kunjungan.f_bertemu,t_kunjungan.f_lokasibertemu,t_kunjungan.f_actionplan FROM t_kunjungan JOIN t_assignment ON t_assignment.f_loanid = t_kunjungan.f_loanid WHERE SUBSTR(t_kunjungan.f_tgl_visit,1,7)= '" . $date . "' AND t_kunjungan.f_agentid = '" . $agentid . "' AND t_assignment.f_promise = '1' ";

	$query2 = "SELECT t_kunjungan.f_nama_nasabah,t_kunjungan.f_cif,t_kunjungan.f_loanid,t_kunjungan.f_hasilkunjungan,t_kunjungan.f_bertemu,t_kunjungan.f_lokasibertemu,t_kunjungan.f_actionplan, t_kunjungan.f_date_actionplan,t_kunjungan.f_nominal_pelunasan FROM t_kunjungan JOIN t_assignment ON t_assignment.f_loanid = t_kunjungan.f_loanid WHERE SUBSTR(t_kunjungan.f_tgl_visit,1,7)= '" . $date . "' AND t_kunjungan.f_agentid = '" . $agentid . "' AND t_assignment.f_promise = '1' ";

        $data1 = $this->db->query($query2)->result();

        $response['kode'] = 1;
        $response['result'] = $data1;
        return $response;
    }
    public function viewsub7($agentid) {
        $date = date('Y-m');
        //$query1 = "SELECT t_kunjungan.f_nama_nasabah,t_kunjungan.f_cif,t_kunjungan.f_loanid,t_kunjungan.f_hasilkunjungan,t_kunjungan.f_bertemu,t_kunjungan.f_lokasibertemu,t_kunjungan.f_actionplan FROM t_kunjungan JOIN t_assignment ON t_assignment.f_loanid = t_kunjungan.f_loanid WHERE SUBSTR(t_kunjungan.f_tgl_visit,1,7)= '" . $date . "' AND t_kunjungan.f_agentid = '" . $agentid . "' AND t_assignment.f_promise = '2' ";

	$query2 = "SELECT t_kunjungan.f_nama_nasabah,t_kunjungan.f_cif,t_kunjungan.f_loanid,t_kunjungan.f_hasilkunjungan,t_kunjungan.f_bertemu,t_kunjungan.f_lokasibertemu,t_kunjungan.f_actionplan, t_kunjungan.f_date_actionplan,t_kunjungan.f_nominal_pelunasan FROM t_kunjungan JOIN t_assignment ON t_assignment.f_loanid = t_kunjungan.f_loanid WHERE SUBSTR(t_kunjungan.f_tgl_visit,1,7)= '" . $date . "' AND t_kunjungan.f_agentid = '" . $agentid . "' AND t_assignment.f_promise = '2' ";

        $data1 = $this->db->query($query2)->result();

        $response['kode'] = 1;
        $response['result'] = $data1;
        return $response;
    }
    public function viewsub8($agentid) {
        $date = date('Y-m');
        $query1 = "SELECT * FROM `t_accountlist_baru` JOIN t_assignment ON t_assignment.f_id_debitur = t_accountlist_baru.f_id  WHERE t_assignment.f_agent = '".$agentid."' AND t_assignment.f_promise = '3' ";

        $data1 = $this->db->query($query1)->result();

        $response['kode'] = 1;
        $response['result'] = $data1;
        return $response;
    }
	
    public function cekdata($username,$tgllahir,$email){
        $query1 = "SELECT t_agent.*, bss_employee.birth_date FROM `t_agent` JOIN bss_employee ON t_agent.f_agentid = bss_employee.nik WHERE t_agent.`f_username` = '".$username."' AND t_agent.`f_email` = '".$email."' AND bss_employee.birth_date = '".$tgllahir."'";
        if($this->db->query($query1)->num_rows() > 0){
            return 1;
            
        } else {
            $data['kode'] = 0;
            $data['message'] = 'Data Tidak Mathcing' ;
            return $data;
        }
    }
}
