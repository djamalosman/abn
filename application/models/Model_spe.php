<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Model_spe extends CI_Model {

    public function getgeneratespe() {
		$select = "select a.f_id as spid,a.*,b.* from t_generate_spe as a left join t_asign_sp as b on b.f_nomersp = a.f_nomer";
        //$data = $this->db2->get('t_generate_spe')->result();
        $data = $this->db2->query($select)->result();
        return $data;
    }

    public function selectsp() {
//        $select = "select * from ";
        $data = $this->db2->get('t_generate_spe')->result();
        return $data;
    }

    public function getdatasp1($id) {
        $querysp = "SELECT substr(t_generate_spe.f_id_produk,1,2) as prd, format(bss_cad.PlafondAmount,2) as PlafondAmount1,TIMESTAMPDIFF(MONTH,bss_cad.STARTDATEPLAFOND,bss_cad.DATEEXPIRED ) AS selisih_bulan,(select b.f_jabatan_1 from t_asign_sp as b where b.f_id_sp = t_generate_spe.f_id and b.f_nomersp = t_generate_spe.f_nomer) as f_jabatan_1,(select c.f_nama_asign_1 from t_asign_sp as c where c.f_id_sp = t_generate_spe.f_id and c.f_nomersp = t_generate_spe.f_nomer) as f_nama_asign_1,(select c.f_nama_asign_2 from t_asign_sp as c where c.f_id_sp = t_generate_spe.f_id and c.f_nomersp = t_generate_spe.f_nomer) as f_nama_asign_2, (select ADDRESS from bss_customer where id = bss_cad.NomorNasabah) as ADDRESS , bss_cad.*,t_generate_spe.*,t_param_spe.* FROM `t_generate_spe` JOIN bss_cad ON t_generate_spe.f_cif= bss_cad.NomorNasabah JOIN t_param_spe ON t_param_spe.f_produk_id = t_generate_spe.f_id_produk  WHERE t_generate_spe.f_id = '" . $id . "' AND t_param_spe.f_spe = t_generate_spe.f_sp and bss_cad.FacilityType = t_generate_spe.f_id_produk";
        $data = $this->db2->query($querysp)->row();
        //        $this->db2->where('f_id', $ld);
        //        $data = $this->db2->get('t_generate_sp')->row();
        return $data;
    }

    public function getdatageneratesp($sp, $cif) {
        $querysp = "select * from t_generate_spe where f_sp < '" . $sp . "' AND f_cif = '" . $cif . "' ";
        $data = $this->db2->query($querysp)->num_rows();
        if ($data > 0) {
            $data1 = $this->db2->query($querysp)->row();
            return $data1;
        } else {
            $data1 = 'data null';
            return $data1;
        }
    }

    public function getparamspe() {
        $queryselect = "SELECT * FROM `t_parameter` WHERE f_type = 'SPe'";
        return $this->db2->query($queryselect)->result();
    }

    public function getspe() {
        $getsp = "SELECT * FROM `t_param_spe` ORDER by id_sp desc";
        return $this->db2->query($getsp)->result();
    }

    public function getsp1($id) {
        $query1 = "select * from bss_cad where f";
    }
    

    public function getdatatunggakan($cif) {
        $selectsum = "SELECT substr(a.DATEAPPROVED,1,10) as date_aproved ,(SELECT d.DESCRIPTION from bss_ld_sub_product as d JOIN bss_cad as e ON d.ID = e.FacilityType WHERE e.ID = a.ID) as fasilitas, FORMAT((select SUM(b.DUE_CH) from bss_coll_pd_balaces as b WHERE b.ID = a.id),2) as denda,FORMAT(a.DuePokok,2) as pokok,FORMAT(a.DueBunga,2) as bunga,FORMAT(a.Bakidebet,2) as os ,FORMAT(((select SUM(b.DUE_CH) from bss_coll_pd_balaces as b WHERE b.ID = a.id) + a.DuePokok + a.DueBunga),2) as total_all ,a.* FROM bss_cad AS a  WHERE a.NomorNasabah = '" . $cif . "'";
        $data = $this->db2->query($selectsum)->result();
        return $data;
//        $select = "SELECT SUM(b.DUE_CH) as denda, (SUM(b.DUE_CH) + a.`DueBunga` + a.`DuePokok`) as jmlh, a.* FROM `bss_cad` as a JOIN bss_coll_pd_balaces as b ON a.ID = b.ID GROUP by a.Id LIMIT 10";
    }

    function getcustomer($cif) {
//        $select = "SELECT MAX(JmlHariTunggakan) AS dpd, b.NomorNasabah,a.id, a.* FROM `bss_customer` a JOIN bss_cad b on a.id = b.NomorNasabah where a.ID = '" . $cif . "' Group By b.NomorNasabah ";
        $select = "SELECT (select ADDRESS from bss_customer where id = a.NomorNasabah) as ADDRESS , a.* from bss_cad as a where a.NomorNasabah = '" . $cif . "'";
        $data = $this->db2->query($select)->row();
        return $data;
    }

    function sptest() {
        $bln = date('n');
        if ($bln == 1) {
            $bln1 = "I";
        } elseif ($bln == 2) {
            $bln1 = "II";
        } elseif ($bln == 3) {
            $bln1 = "III";
        } elseif ($bln == 4) {
            $bln1 = "IV";
        } elseif ($bln == 5) {
            $bln1 = "V";
        } elseif ($bln == 6) {
            $bln1 = "VI";
        } elseif ($bln == 7) {
            $bln1 = "VII";
        } elseif ($bln == 8) {
            $bln1 = "VIII";
        } elseif ($bln == 9) {
            $bln1 = "IX";
        } elseif ($bln == 10) {
            $bln1 = "X";
        } elseif ($bln == 11) {
            $bln1 = "XI";
        } elseif ($bln == 12) {
            $bln1 = "XII";
        }

        $a = "SELECT MAX(JmlHariTunggakan) AS dpd,COUNT(*) AS jmlhcount, bss_cad.* FROM bss_cad GROUP BY NomorNasabah";
        foreach ($this->db2->query($a)->result() AS $b) {
            $n = "SELECT MAX(f_nomer) AS no FROM t_no_surat order by f_nomer desc limit 1";
            $no = $this->db2->query($n)->row();
            if ($this->db2->query($n)->num_rows() > 0) {
                $n1 = $no->no + 1;
            } else {
                $n1 = 1;
            }
//            AND (f_masa + f_min_dpd) >= " . $b->JmlHariTunggakan . "
            $select = "select * from t_param_sp where f_produk_id = '" . $b->FacilityType . "' and f_min_dpd <= " . $b->JmlHariTunggakan . " order by f_sp asc ";
            $c = $this->db2->query($select)->num_rows();

            if ($c > 0) {
                $d = $this->db2->query($select)->result();
                foreach ($d as $ac) {
                    $gsp = "SELECT * from t_generate_sp where f_cif = '" . $b->NomorNasabah . "' AND f_sp = '" . $d->f_sp . "'";
                    if ($this->db2->query($gsp)->num_rows() > 0) {
//                    $gs = $this->db2->query($gsp)->row();
                        $hasil[] = 'null';
                    } else {
                        //MAX(f_sp) as f_sp , 
                        $datenow = date('Y-m-d');
                        $gsp2 = "SELECT t_generate_sp.* from t_generate_sp where f_cif = '" . $b->NomorNasabah . "' AND f_sp < '" . $d->f_sp . "' AND f_end_date_time <= '" . $datenow . "'";
                        if ($this->db2->query($gsp2)->num_rows() > 0) {
                            $nosurat = "09/" . $n1 . "/BSS/SAM/" . $bln1 . "/" . date('y');
                            $sp = $this->db2->query($select)->row();
                            $ins = "INSERT INTO `t_generate_sp`(`f_sp_code`, `f_sp`, `f_id_produk`, `f_cif`, `f_nama_nasabah`, `f_cabang`, `f_dpd`, `f_tgl_angsuran`, `f_tgl_cetak`, `f_tgl_kirim`, `f_tgl_terima`, `f_tgl_update`, `f_keterangan`, `f_status`, `f_file`, `f_nomer`, `f_date_time`, `f_end_date_time`) VALUES ("
                                    . "'" . $sp->f_sp_code . "','" . $sp->f_sp . "','" . $sp->f_produk_id . "','" . $b->NomorNasabah . "','" . $b->NamaDebitur . "','" . $b->KodeCabang . "','" . $b->dpd . "','" . $b->value_date . "','-','-','-','','','0','','" . $nosurat . "','" . $datenow . "','" . date('Y-m-d', strtotime($datenow . '+' . $sp->f_masa . 'days')) . "')";
                            $insert = $this->db2->query($ins);
                            if ($insert === TRUE) {
                                $noo = array('f_nomer' => $no->no + 1);
                                $this->db2->insert('t_no_surat', $noo);
                                $hasil[] = 'sucess';
                            } else {
                                $hasil[] = 'gagal';
                            }
                        } else {
                            $nosurat = "09/" . $n1 . "/BSS/SAM/" . $bln1 . "/" . date('y');
                            $sp = $this->db2->query($select)->row();
                            $ins = "INSERT INTO `t_generate_sp`(`f_sp_code`, `f_sp`, `f_id_produk`, `f_cif`, `f_nama_nasabah`, `f_cabang`, `f_dpd`, `f_tgl_angsuran`, `f_tgl_cetak`, `f_tgl_kirim`, `f_tgl_terima`, `f_tgl_update`, `f_keterangan`, `f_status`, `f_file`, `f_nomer`, `f_date_time`, `f_end_date_time`) VALUES ("
                                    . "'" . $sp->f_sp_code . "','" . $sp->f_sp . "','" . $sp->f_produk_id . "','" . $b->NomorNasabah . "','" . $b->NamaDebitur . "','" . $b->KodeCabang . "','" . $b->dpd . "','" . $b->value_date . "','-','-','-','','','0','','" . $nosurat . "','" . $datenow . "','" . date('Y-m-d', strtotime($datenow . '+' . $sp->f_masa . 'days')) . "')";
                            $insert = $this->db2->query($ins);
                            if ($insert === TRUE) {
                                $noo = array('f_nomer' => $no->no + 1);
                                $this->db2->insert('t_no_surat', $noo);
                                $hasil[] = 'sucess';
                            } else {
                                $hasil[] = 'gagal';
                            }
                        }
                    }
                }
            }
        }
        return $hasil;
    }

    public function cetak($cif) {
        $date = date('Y-m-d');
        $date1 = date('w');
        if ($date1 == 6) {
            $date2 = date('Y-m-d', strtotime($date, '+ 2 days'));
        } elseif ($date1 == 0) {
            $date2 = date('Y-m-d', strtotime($date, '+ 1 days'));
        }

        $update = "UPDATE `t_generate_spe` set f_status = '1', f_tgl_cetak = '" . $date . "' where f_id = '" . $cif . "'";
        $update1 = $this->db2->query($update);
        if ($update1 == TRUE) {
            return 1;
        } else {
            return 0;
        }
    }

    public function kirim($id, $ket) {
        $date = date('Y-m-d');
        $date1 = date('w');
        if ($date1 == 6) {
            $date2 = date('Y-m-d', strtotime($date, '+ 2 days'));
        } elseif ($date1 == 0) {
            $date2 = date('Y-m-d', strtotime($date, '+ 1 days'));
        }

        $update = "UPDATE t_generate_spe set f_status = '2', f_tgl_kirim = '" . $date . "', f_keterangan = '" . $ket . "' where f_id = '" . $id . "'";
        $update1 = $this->db2->query($update);
        if ($update1 == TRUE) {
            return 1;
        } else {
            return 0;
        }
    }

    public function trima($id, $ket) {
        $date = date('Y-m-d');
        $date1 = date('w');
        if ($date1 == 6) {
            $date2 = date('Y-m-d', strtotime($date, '+ 2 days'));
        } elseif ($date1 == 0) {
            $date2 = date('Y-m-d', strtotime($date, '+ 1 days'));
        }

        $update = "UPDATE t_generate_spe set f_status = '3', f_tgl_terima = '" . $date . "', f_keterangan = '" . $ket . "' where f_id = '" . $id . "'";
        $update1 = $this->db2->query($update);
        if ($update1 == TRUE) {
            return 1;
        } else {
            return 0;
        }
    }

    public function inputspe($jsp, $prd,$desc, $mindpd, $masa) {
        if ($mindpd == null) {
            return 3;
        } else {

            $jsp1 = explode("|", $jsp, 2);
            $prd1 = explode("|", $prd, 2);
            $select = "select * from t_param_spe where f_spe_code = '" . $jsp1[0] . "' and f_produk_id = '" . $prd1[0] . "'";
            $slc = $this->db2->query($select)->num_rows();
            if ($slc == 0) {
                $insert = "INSERT INTO `t_param_spe`(`f_spe_code`, `f_spe`, `f_produk_id`, `f_produk`,`f_desc`, `f_parameter`, `f_masa`, f_status) VALUES ('" . $jsp1[0] . "','" . $jsp1[1] . "','" . $prd1[0] . "','" . $prd1[1] . "','" . $desc . "','" . $mindpd . "','" . $masa . "','1')";
                if ($this->db2->query($insert) === TRUE) {
                    return 1;
                } else {
                    return 0;
                }
            } else {
                return 2;
            }
        }
    }

    public function delete_multi_spe_administration($id) {
        foreach ($id as $item) {
            $this->db2->where('id_sp', $item);
            $delete = $this->db2->delete('t_param_spe');
        }
        if ($delete == true) {
            return 1;
        } else {
            return 0;
        }
    }

    public function updatetsp($mindpd, $masa, $id,$desc) {
//        $jsp1 = explode("|", $jsp, 2);
//        $prd1 = explode("|", $prd, 2);
        $insert = "UPDATE `t_param_spe` SET `f_parameter`='" . $mindpd . "',`f_masa`='" . $masa . "',`f_desc`='" . $desc . "' WHERE id_sp = '" . $id . "' ";
//`f_sp_code`='" . $jsp1[0] . "' AND `f_produk_id`='" . $prd1[0] . "'
        if ($this->db2->query($insert) == TRUE) {
            return 1;
        } else {
            return 0;
        }
    }

    public function getkunjungan($cif, $code) {
        $select = "select  (SELECT MAX(g.COL) FROM bss_cad as g WHERE g.NomorNasabah = a.f_cif GROUP BY g.NomorNasabah) as coll,(SELECT MAX(f.JmlHariTunggakan) FROM bss_cad as f WHERE f.NomorNasabah = a.f_cif GROUP BY f.NomorNasabah )as dpd,(SELECT d.COMPANY_NAME FROM bss_company as d WHERE d.ID = (SELECT e.KodeCabang FROM bss_cad as e WHERE e.NomorNasabah = a.f_cif LIMIT 1)) as cabang,(SELECT c.EMPLOYERS_ADD FROM bss_customer as c WHERE c.ID = a.f_cif )as alamat_usaha,(SELECT c.EMPLOYERS_BUSS FROM bss_customer as c WHERE c.ID = a.f_cif )as jenis_usaha, (select b.f_agentname from t_agent as b where b.f_agentid = a.f_agentid) as namacoll, a.* from t_kunjungan as a where a.f_cif = '" . $cif . "' AND  a.f_code_image = '" . $code . "'";
        $select1 = $this->db2->query($select)->row();
        return $select1;
    }

    public function get_jaminan($cif) {
        $select = "SELECT A.id , A.LimitID, NomorNasabah as f_cif, D.typeid, D.type_description as f_jaminan,
                    C.COLLATERAL_TYPE, C.DESCRIPTION Deskripsi,C.ADDRESS as f_location,   
                    format(C.NOMINAL_VALUE,2) as f_value, C.EXECUTION_VALUE as excv ,C.* FROM bss_cad A
                    INNER JOIN bss_collateral_right_det B ON A.LimitID = B.limit_reference
                    INNER JOIN bss_collateral C on C.ID like (CONCAT(B.id,'%'))
                    INNER JOIN bss_collateral_code D ON D.id = C.COLLATERAL_TYPE
                    where NomorNasabah='" . $cif . "'";
        $data = $this->db2->query($select)->result();
        return $data;
    }
    
    public function asignspe($id, $nomor, $jabatan1, $nama1,$nama2) {
        $data = array(
            'f_nomersp' => $nomor,
            'f_id_sp' => $id,
            'f_jabatan_1' => $jabatan1,
            'f_nama_asign_1' => $nama1,
            'f_jabatan_2' => '',
            'f_nama_asign_2' => $nama2
        );

        $selectasignsp = "select * from t_asign_sp where f_nomersp = '" . $nomor . "' and f_id_sp = '" . $id . "'";
        $hasilselect = $this->db2->query($selectasignsp)->num_rows();
        if ($hasilselect > 0) {
            $this->db2->where('f_id_sp', $id);
            $this->db2->where('f_nomersp', $nomor);
            $updateasignsp = $this->db2->update('t_asign_sp', $data);
            if ($updateasignsp == TRUE) {
                $hasil = 1;
            } else {
                $hasil = 0;
            }
        } else {
            $insertasignsp = $this->db2->insert('t_asign_sp', $data);
            if ($insertasignsp == TRUE) {
                $hasil = 1;
            } else {
                $hasil = 0;
            }
        } 
        return $hasil;
    }

}
