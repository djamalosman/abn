function generatesp() {
        $selectparamasp = "select * from t_param_sp order by f_sp asc";
        $hasilselectparamsp = $this->db2->query($selectparamasp)->result();
        foreach ($hasilselectparamsp as $sp1) {
            $selectdebitur = "SELECT MAX(JmlHariTunggakan) AS dpd,COUNT(*) AS jmlhcount, bss_cad.* FROM bss_cad GROUP BY NomorNasabah";
            $resultdebitur = $this->db2->query($selectdebitur)->result();
            $datenow = date('Y-m-d');
            foreach ($resultdebitur as $debitur) {
                if ($debitur->FacilityType = $sp1->f_produk_id && $debitur->dpd >= $sp1->f_min_dpd && $debitur->dpd <= ($sp1->f_min_dpd + $sp1->f_masa)) {
                    $cekSP = "select * from t_generate_sp where f_sp = '" . $sp1->f_sp . "' and f_cif = '" . $debitur->NomorNasabah . "' and f_id_produk = '" . $debitur->FacilityType . "'";
                    $hasilceksp = $this->db2->query($cekSP)->num_rows();
                    if ($hasilceksp > 0) {
                        $selectlagigeneratesp = "select * from t_param_sp where f_produk_id = '" . $debitur->FacilityType . "' and f_min_dpd <= " . $debitur->dpd . " order by f_sp desc limit 1 ";
                        $cek2SP = $this->db2->query($selectlagigeneratesp)->row();
                        $selectspgenerate1 = "select * from t_generate_sp where f_cif = '" . $debitur->NomorNasabah . "' and f_produk_id = '" . $debitur->FacilityType . "' and f_sp = '" . $cek2SP->f_sp . "' limit 1";
                        $hasilselectspgenerate1 = $this->db2->query($selectspgenerate1)->num_rows();
                        if ($hasilselectspgenerate1 > 0) {
                            $hasilselectspgenerate2 = $this->db2->query($selectspgenerate1)->row();
                            if ($hasilselectspgenerate2->f_end_date_time < date('Y-m-d')) {
                                $datainsertgeneratesp = array(
                                    'f_sp_code' => $sp->f_sp_code,
                                    'f_sp' => $sp->f_sp,
                                    'f_id_produk' => $sp->f_produk_id,
                                    'f_cif' => $debitur->NomorNasabah,
                                    'f_nama_nasabah' => $debitur->NamaDebitur,
                                    'f_cabang' => $debitur->KodeCabang,
                                    'f_dpd' => $debitur->dpd,
                                    'f_tgl_angsuran' => $debitur->value_date,
                                    'f_tgl_cetak' => '-',
                                    'f_tgl_kirim' => '-',
                                    'f_tgl_terima' => '-',
                                    'f_tgl_update' => '-',
                                    'f_keterangan' => '',
                                    'f_status' => 0,
                                    'f_file' => '',
                                    'f_nomer' => $nosurat,
                                    'f_date_time' => $datenow,
                                    'f_end_date_time' => date('Y-m-d', strtotime($datenow . '+' . $sp->f_masa . 'days'))
                                );
                                $insertgeneratesp = $this->db2->insert('t_generate_sp', $datainsertgeneratesp);
                                if ($insertgeneratesp == TRUE) {
                                    $hasil = 'suksess /n ';
                                } else {
                                    $hasil = 'gagal /n ';
                                }
                            } else {
                                $hasil = 'null';
                            }
                        } else {
                            $hasil = 'null';
                        }
                    } else {
                        $datainsertgeneratesp = array(
                            'f_sp_code' => $sp->f_sp_code,
                            'f_sp' => $sp->f_sp,
                            'f_id_produk' => $sp->f_produk_id,
                            'f_cif' => $debitur->NomorNasabah,
                            'f_nama_nasabah' => $debitur->NamaDebitur,
                            'f_cabang' => $debitur->KodeCabang,
                            'f_dpd' => $debitur->dpd,
                            'f_tgl_angsuran' => $debitur->value_date,
                            'f_tgl_cetak' => '-',
                            'f_tgl_kirim' => '-',
                            'f_tgl_terima' => '-',
                            'f_tgl_update' => '-',
                            'f_keterangan' => '',
                            'f_status' => 0,
                            'f_file' => '',
                            'f_nomer' => $nosurat,
                            'f_date_time' => $datenow,
                            'f_end_date_time' => date('Y-m-d', strtotime($datenow . '+' . $sp->f_masa . 'days'))
                        );
                        $insertgeneratesp = $this->db2->insert('t_generate_sp', $datainsertgeneratesp);
                        if ($insertgeneratesp == TRUE) {
                            $hasil = 'suksess /n ';
                        } else {
                            $hasil = 'gagal /n ';
                        }
                    }
                }
            }
            $selectparamSP = "select * from t_param_sp where f_produk_id = '" . $debitur->FacilityType . "' and f_min_dpd <= " . $debitur->dpd . " order by f_sp asc";
            $countSP = $this->db2->query($selectparamSP)->num_rows();
            if ($countSP > 0) {
                $resultparamSP = $this->db2->query($selectparamSP)->result();
                foreach ($resultparamSP as $sp) {
                    $cekSP = "select * from t_generate_sp where f_sp = '" . $sp->f_sp . "' and f_cif = '" . $debitur->NomorNasabah . "' and f_id_produk = '" . $debitur->FacilityType . "'";
                    $hasilceksp = $this->db2->query($cekSP)->num_rows();
                }
            } else {
                $hasil = 'null';
            }
        }


        return $hasil;
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

        $o = 1;
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
                    $gsp = "SELECT * from t_generate_sp where f_cif = '" . $b->NomorNasabah . "' AND f_sp = '" . $ac->f_sp . "'";
                    if ($this->db2->query($gsp)->num_rows() > 0) {
//                    $gs = $this->db2->query($gsp)->row();
                        $hasil[] = 'null';
                    } else {
                        //MAX(f_sp) as f_sp , 
                        $datenow = date('Y-m-d');
                        $gsp2 = "SELECT t_generate_sp.* from t_generate_sp where f_cif = '" . $b->NomorNasabah . "' AND f_sp < '" . $ac->f_sp . "' AND f_end_date_time <= '" . $datenow . "'";
                        if ($this->db2->query($gsp2)->num_rows() > 0) {
                            $nosurat = "09/" . date('ymd') . $o++ . "/BSS/SAM/" . $bln1 . "/" . date('y');
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
                            $nosurat = "09/" . date('ymd') . $o++ . "/BSS/SAM/" . $bln1 . "/" . date('y');
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