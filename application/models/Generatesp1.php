<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Generatesp1 extends CI_Model {

       function integerToRoman($integer) {
        // Convert the integer into an integer (just to make sure)
        $integer = intval($integer);
        $result = '';

        // Create a lookup array that contains all of the Roman numerals.
        $lookup = array('M' => 1000,
            'CM' => 900,
            'D' => 500,
            'CD' => 400,
            'C' => 100,
            'XC' => 90,
            'L' => 50,
            'XL' => 40,
            'X' => 10,
            'IX' => 9,
            'V' => 5,
            'IV' => 4,
            'I' => 1);

        foreach ($lookup as $roman => $value) {
            // Determine the number of matches
            $matches = intval($integer / $value);

            // Add the same number of characters to the string
            $result .= str_repeat($roman, $matches);

            // Set the integer to be the remainder of the integer and the value
            $integer = $integer % $value;
        }

//        
//        if ($bln == 1) {
//            $bln1 = "I";
//        } elseif ($bln == 2) {
//            $bln1 = "II";
//        } elseif ($bln == 3) {
//            $bln1 = "III";
//        } elseif ($bln == 4) {
//            $bln1 = "IV";
//        } elseif ($bln == 5) {
//            $bln1 = "V";
//        } elseif ($bln == 6) {
//            $bln1 = "VI";
//        } elseif ($bln == 7) {
//            $bln1 = "VII";
//        } elseif ($bln == 8) {
//            $bln1 = "VIII";
//        } elseif ($bln == 9) {
//            $bln1 = "IX";
//        } elseif ($bln == 10) {
//            $bln1 = "X";
//        } elseif ($bln == 11) {
//            $bln1 = "XI";
//        } elseif ($bln == 12) {
//            $bln1 = "XII";
//        }

        // The Roman numeral should be built, return it
        return $result;
    }

   
     
    function gensp() {


        $bln = date('n');
        $bln1 = $this->integerToRoman($bln);

        $no = 1;
        $selectdebitur = "SELECT MAX(JmlHariTunggakan) AS dpd,COUNT(*) AS jmlhcount,(select a.COMPANY_NAME from bss_company as a where a.ID = bss_cad.KodeCabang) as cabang, bss_cad.* FROM bss_cad GROUP BY bss_cad.NomorNasabah";
        $hasilselectdebitur = $this->db2->query($selectdebitur)->result();

        foreach ($hasilselectdebitur as $debitur) {
            $datenow = date('Y-m-d');
            $nosurat = "09/" . date('Ymd') . $no++ . "/BSS/SAM/SP/" . $bln1 . "/" . date('y');


            $selectsp = "select * from t_param_sp where f_produk_id = '" . $debitur->FacilityType . "' and f_min_dpd <= '" . $debitur->dpd . "'";
            $hasilselctsp = $this->db2->query($selectsp)->num_rows();

            if ($hasilselctsp > 0) {
                $hasilselctsp2 = $this->db2->query($selectsp)->result();


                foreach ($hasilselctsp2 as $sp) {

                    $summasa = (int) $sp->f_min_dpd + (int) $sp->f_masa;
                    if (((int) $sp->f_min_dpd <= (int) $debitur->dpd ) && ($summasa >= (int) $debitur->dpd)) {

                        $datainsertgeneratesp = array(
                            'f_sp_code' => $sp->f_sp_code,
                            'f_sp' => $sp->f_sp,
                            'f_id_produk' => $sp->f_produk_id,
                            'f_cif' => $debitur->NomorNasabah,
                            'f_nama_nasabah' => $debitur->NamaDebitur,
                            'f_cabang_id' => $debitur->KodeCabang,
                            'f_cabang' => $debitur->cabang,
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
                            'f_end_date_time' => date('Y-m-d', strtotime($datenow . '+' . $sp->f_masa . ' days'))
                        );

                        $selectgeneratesp = "select * from t_generate_sp where f_cif = '" . $debitur->NomorNasabah . "' and f_id_produk = '" . $debitur->FacilityType . "' and f_sp = '" . $sp->f_sp . "' and f_nomer = '".$nosurat."' order by f_sp desc limit 1";
                        $hasilselectgeneratesp = $this->db2->query($selectgeneratesp)->num_rows();

                        if ($hasilselectgeneratesp > 0) {
                            $hasilselectgeneratesp2 = $this->db2->query($selectgeneratesp)->row();
                            if ($hasilselectgeneratesp2->f_end_date_time < date('Y-m-d')) {
                                $insertgeneratesp = $this->db2->insert('t_generate_sp', $datainsertgeneratesp);
                                if ($insertgeneratesp == TRUE) {
									$selectsum = "SELECT substr(a.DATEAPPROVED,1,10) as date_aproved ,(SELECT d.DESCRIPTION from bss_ld_sub_product as d JOIN bss_cad as e ON d.ID = e.FacilityType WHERE e.ID = a.ID) as fasilitas, (select SUM(b.DUE_CH) from bss_coll_pd_balaces as b WHERE b.ID = a.id) as denda,(select SUM(b.DUE_PR) from bss_coll_pd_balaces as b WHERE b.ID = a.id) as pokok,(select SUM(b.DUE_IN) from bss_coll_pd_balaces as b WHERE b.ID = a.id) as bunga,a.Bakidebet as os ,((select SUM(b.DUE_CH) from bss_coll_pd_balaces as b WHERE b.ID = a.id) + (select SUM(b.DUE_PR) from bss_coll_pd_balaces as b WHERE b.ID = a.id) + (select SUM(b.DUE_IN) from bss_coll_pd_balaces as b WHERE b.ID = a.id)) as total_all ,a.* FROM bss_cad AS a WHERE a.NomorNasabah ='" . $debitur->NomorNasabah . "'";
									$data = $this->db2->query($selectsum)->result();
									if (sizeof($data) > 0) {
										foreach ($data as $z) {
											$datatgkan = array(
												'f_cif' => $z->NomorNasabah,
												'f_nomorsp' => $nosurat,
												'f_loanid' => $z->ID,
												'f_pd_id' => $z->FacilityType,
												'f_facility' => $z->fasilitas,
												'f_total' => $z->total_all,
												'f_bunga' => $z->bunga,
												'f_denda' => $z->denda,
												'f_pokok' => $z->pokok,
												'f_os' => $z->os
											);
											$insert = $this->db2->insert('t_tunggakan', $datatgkan);
											if ($insert == TRUE) {
												$hasil[] = "sucesss insert tgkan";
											} else {
												$hasil[] = "gagal insert tgkan";
											}
										}
									}

                                    $hasil[] = 'suksess';
                                } else {
                                    $hasil[] = 'gagal ';
                                }
                            } else {
                                $hasil[] = 'gagal ';
                            }
                        } else {
                            $insertgeneratesp = $this->db2->insert('t_generate_sp', $datainsertgeneratesp);
                            if ($insertgeneratesp == TRUE) {
								$insertgeneratesp = $this->db2->insert('t_generate_sp', $datainsertgeneratesp);
                                if ($insertgeneratesp == TRUE) {
									$selectsum = "SELECT substr(a.DATEAPPROVED,1,10) as date_aproved ,(SELECT d.DESCRIPTION from bss_ld_sub_product as d JOIN bss_cad as e ON d.ID = e.FacilityType WHERE e.ID = a.ID) as fasilitas, (select SUM(b.DUE_CH) from bss_coll_pd_balaces as b WHERE b.ID = a.id) as denda,(select SUM(b.DUE_PR) from bss_coll_pd_balaces as b WHERE b.ID = a.id) as pokok,(select SUM(b.DUE_IN) from bss_coll_pd_balaces as b WHERE b.ID = a.id) as bunga,a.Bakidebet as os ,((select SUM(b.DUE_CH) from bss_coll_pd_balaces as b WHERE b.ID = a.id) + (select SUM(b.DUE_PR) from bss_coll_pd_balaces as b WHERE b.ID = a.id) + (select SUM(b.DUE_IN) from bss_coll_pd_balaces as b WHERE b.ID = a.id)) as total_all ,a.* FROM bss_cad AS a WHERE a.NomorNasabah ='" . $debitur->NomorNasabah . "'";
									$data = $this->db2->query($selectsum)->result();
									if (sizeof($data) > 0) {
										foreach ($data as $z) {
											$datatgkan = array(
												'f_cif' => $z->NomorNasabah,
												'f_nomorsp' => $nosurat,
												'f_loanid' => $z->ID,
												'f_pd_id' => $z->FacilityType,
												'f_facility' => $z->fasilitas,
												'f_total' => $z->total_all,
												'f_bunga' => $z->bunga,
												'f_denda' => $z->denda,
												'f_pokok' => $z->pokok,
												'f_os' => $z->os
											);
											$insert = $this->db2->insert('t_tunggakan', $datatgkan);
											if ($insert == TRUE) {
												$hasil[] = "sucesss insert tgkan";
											} else {
												$hasil[] = "gagal insert tgkan";
											}
										}
								}
							}
                                $hasil[] = 'suksess';
                            } else {
                                $hasil[] = 'gagal ';
                            }
                        }
                    } else {
                        $hasil[] = 'null2 ';
                    }
                }
            } else {
                $hasil[] = 'null3 ';
            }
        }
        return $hasil;
    }

    public function diffInMonths(\DateTime $date1, \DateTime $date2) {
        $diff = $date1->diff($date2);

        $months = $diff->y * 12 + $diff->m + $diff->d / 30;

        return (int) round($months);
    }

    function genspe() {
        $bln = date('n');


//        $bln = date('n');
        $bln1 = $this->integerToRoman($bln);

        $no = 1;
        $selectdebitur = "SELECT JmlHariTunggakan AS dpd,(select a.COMPANY_NAME from bss_company as a where a.ID = bss_cad.KodeCabang) as cabang,STR_TO_DATE(NOW(), '%Y-%m-%d') AS 'tanggal_sekarang', TIMESTAMPDIFF(MONTH, NOW(), DATEEXPIRED) AS selisih_bulan,(SELECT substr(b.AVAIL_AMT,1,1) from bss_limit as b where b.ID = bss_cad.LimitID ) as avf, bss_cad.* FROM bss_cad";
        $hasilselectdebitur = $this->db2->query($selectdebitur)->result();

        foreach ($hasilselectdebitur as $debitur) {
            $datenow = date('Y-m-d');
            $nosurat = "09/" . date('Ymd') . $no++ . "/BSS/SAM/SPe/" . $bln1 . "/" . date('y');


            $selectsp = "select substr(f_produk,1,3) as jnisfs,t_param_spe.* from t_param_spe where f_produk_id = '" . $debitur->FacilityType . "' order by f_spe asc";
            $hasilselctsp = $this->db2->query($selectsp)->num_rows();

            if ($hasilselctsp > 0) {
                $hasilselctsp2 = $this->db2->query($selectsp)->result();

                foreach ($hasilselctsp2 as $sp) {

                    $today = new DateTime('now');

                    $expdate = new DateTime($debitur->DATEEXPIRED);
                    $datebts = $this->diffInMonths($expdate, $today);
//                    $summasa = (int) $sp->f_min_dpd + (int) $sp->f_masa;
                    if ($sp->jnisfs == 'PT ' && $debitur->selisih_bulan === $sp->f_parameter) {
                        $datainsertgeneratesp = array(
                            'f_sp_code' => $sp->f_spe_code,
                            'f_sp' => $sp->f_spe,
                            'f_id_produk' => $sp->f_produk_id,
                            'f_cif' => $debitur->NomorNasabah,
                            'f_nama_nasabah' => $debitur->NamaDebitur,
                            'f_cabang_id' => $debitur->KodeCabang,
                            'f_cabang' => $debitur->cabang,
                            'f_dpd' => $debitur->dpd,
                            'f_tgl_angsuran' => $debitur->DATEEXPIRED,
                            'f_tgl_cetak' => '-',
                            'f_tgl_kirim' => '-',
                            'f_tgl_terima' => '-',
                            'f_tgl_update' => '-',
                            'f_keterangan' => '',
                            'f_status' => 0,
                            'f_file' => '',
                            'f_nomer' => $nosurat,
                            'f_date_time' => $datenow,
                            'f_end_date_time' => date('Y-m-d', strtotime($datenow . '+' . $sp->f_masa . ' day'))
                        );

						
                        $selectgeneratesp = "select * from t_generate_spe where f_cif = '" . $debitur->NomorNasabah . "' and f_id_produk = '" . $debitur->FacilityType . "' and f_sp = '" . $sp->f_spe . "' order by f_sp desc limit 1";
                        $selectgeneratesp1 = "select * from t_generate_spe where f_nomer = '" . $nosurat . "' ";
                        $hasilselectgeneratesp11 = $this->db2->query($selectgeneratesp1)->num_rows();
						if($hasilselectgeneratesp11 > 0){
							$hasil[]="null";
						} else {
							$hasilselectgeneratesp = $this->db2->query($selectgeneratesp)->num_rows();
							if ($hasilselectgeneratesp > 0) {
								$hasilselectgeneratesp2 = $this->db2->query($selectgeneratesp)->row();
								if ($hasilselectgeneratesp2->f_end_date_time < date('Y-m-d')) {
									$insertgeneratesp = $this->db2->insert('t_generate_spe', $datainsertgeneratesp);
									if ($insertgeneratesp == TRUE) {

										$selectsum = "SELECT substr(a.DATEAPPROVED,1,10) as date_aproved ,(SELECT d.DESCRIPTION from bss_ld_sub_product as d JOIN bss_cad as e ON d.ID = e.FacilityType WHERE e.ID = a.ID) as fasilitas, (select SUM(b.DUE_CH) from bss_coll_pd_balaces as b WHERE b.ID = a.id) as denda,a.DuePokok as pokok,a.DueBunga as bunga,a.Bakidebet as os ,((select SUM(b.DUE_CH) from bss_coll_pd_balaces as b WHERE b.ID = a.id) + a.DuePokok + a.DueBunga) as total_all ,a.* FROM bss_cad AS a  WHERE a.NomorNasabah = '" . $debitur->NomorNasabah . "'";
										$data = $this->db2->query($selectsum)->result();
										if (sizeof($data) > 0) {
											foreach ($data as $z) {
												$datatgkan = array(
													'f_cif' => $z->NomorNasabah,
													'f_nomorsp' => $nosurat,
													'f_loanid' => $z->ID,
													'f_pd_id' => $z->FacilityType,
													'f_facility' => $z->fasilitas,
													'f_total' => $z->total_all,
													'f_bunga' => $z->bunga,
													'f_denda' => $z->denda,
													'f_pokok' => $z->pokok,
													'f_os' => $z->os
												);
												$insert = $this->db2->insert('t_tunggakan', $datatgkan);
												if ($insert == TRUE) {
													$hasil[] = "sucesss insert tgkan";
												} else {
													$hasil[] = "gagal insert tgkan";
												}
											}
										}

										$hasil[] = 'sucsess';
									} else {
										$hasil[] = 'gagal  ';
									}
								} else {
									$hasil[] = 'gagal ';
								}
							} else {
								$insertgeneratesp = $this->db2->insert('t_generate_spe', $datainsertgeneratesp);
								if ($insertgeneratesp == TRUE) {

								$selectsum = "SELECT substr(a.DATEAPPROVED,1,10) as date_aproved ,(SELECT d.DESCRIPTION from bss_ld_sub_product as d JOIN bss_cad as e ON d.ID = e.FacilityType WHERE e.ID = a.ID) as fasilitas, (select SUM(b.DUE_CH) from bss_coll_pd_balaces as b WHERE b.ID = a.id) as denda,a.DuePokok as pokok,a.DueBunga as bunga,a.Bakidebet as os ,((select SUM(b.DUE_CH) from bss_coll_pd_balaces as b WHERE b.ID = a.id) + a.DuePokok + a.DueBunga) as total_all ,a.* FROM bss_cad AS a  WHERE a.NomorNasabah = '" . $debitur->NomorNasabah . "'";
								$data = $this->db2->query($selectsum)->result();
								if (sizeof($data) > 0) {
									foreach ($data as $z) {
										$datatgkan = array(
											'f_cif' => $z->NomorNasabah,
											'f_nomorsp' => $nosurat,
											'f_loanid' => $z->ID,
											'f_pd_id' => $z->FacilityType,
											'f_facility' => $z->fasilitas,
											'f_total' => $z->total_all,
											'f_bunga' => $z->bunga,
											'f_denda' => $z->denda,
											'f_pokok' => $z->pokok,
											'f_os' => $z->os
										);
										$insert = $this->db2->insert('t_tunggakan', $datatgkan);
										if ($insert == TRUE) {
											$hasil[] = "sucesss insert tgkan";
										} else {
											$hasil[] = "gagal insert tgkan";
										}
									}
								}
									$hasil[] = 'sucsess';
								} else {
									$hasil[] = 'gagal ';
								}
							}
                   
						}
						
                    } elseif ($sp->jnisfs == 'PRK' && (int) $debitur->dpd == 0 && $debitur->avf == '-') {

                        $datainsertgeneratesp = array(
                            'f_sp_code' => $sp->f_spe_code,
                            'f_sp' => $sp->f_spe,
                            'f_id_produk' => $sp->f_produk_id,
                            'f_cif' => $debitur->NomorNasabah,
                            'f_nama_nasabah' => $debitur->NamaDebitur,
                            'f_cabang' => $debitur->KodeCabang,
                            'f_dpd' => $debitur->dpd,
                            'f_tgl_angsuran' => $debitur->DATEEXPIRED,
                            'f_tgl_cetak' => '-',
                            'f_tgl_kirim' => '-',
                            'f_tgl_terima' => '-',
                            'f_tgl_update' => '-',
                            'f_keterangan' => '',
                            'f_status' => 0,
                            'f_file' => '',
                            'f_nomer' => $nosurat,
                            'f_date_time' => $datenow,
                            'f_end_date_time' => date('Y-m-d', strtotime($datenow . '+' . $sp->f_masa . ' day'))
                        );

                        $selectgeneratesp = "select * from t_generate_spe where f_cif = '" . $debitur->NomorNasabah . "' and f_id_produk = '" . $debitur->FacilityType . "' and f_sp < '" . $sp->f_sp . "' order by f_sp desc limit 1";
                        $hasilselectgeneratesp = $this->db2->query($selectgeneratesp)->num_rows();

                        if ($hasilselectgeneratesp > 0) {
                            $hasilselectgeneratesp2 = $this->db2->query($selectgeneratesp)->row();
                            if ($hasilselectgeneratesp2->f_end_date_time < date('Y-m-d')) {
                                $insertgeneratesp = $this->db2->insert('t_generate_spe', $datainsertgeneratesp);
                                if ($insertgeneratesp == TRUE) {
										$selectsum = "SELECT substr(a.DATEAPPROVED,1,10) as date_aproved ,IFNULL((SELECT d.DESCRIPTION from bss_ld_sub_product as d JOIN bss_cad as e ON d.ID = e.FacilityType WHERE e.ID = a.ID),(SELECT w.DESCRIPTION FROM bss_category as w WHERE w.ID = a.FacilityType )) as fasilitas, (select IFNULL(SUM(b.DUE_CH),'0.00') from bss_coll_pd_balaces as b WHERE b.ID = a.id) as denda,(select IFNULL(SUM(x.DUE_PR),'0.00') from bss_coll_pd_balaces as x WHERE x.ID = a.id) as pokok,(select IFNULL(SUM(v.DUE_CH),'0.00') from bss_coll_pd_balaces as v WHERE v.ID = a.id) as bunga,a.Bakidebet as os ,((select IFNULL(SUM(b.DUE_CH),'0.00') from bss_coll_pd_balaces as b WHERE b.ID = a.id) +(select IFNULL(SUM(z.DUE_PR),'0.00') from bss_coll_pd_balaces as z WHERE z.ID = a.id)  + (select ifnull(SUM(y.DUE_IN),'0.00') from bss_coll_pd_balaces as y WHERE y.ID = a.id)) as total_all ,a.* FROM bss_cad AS a  WHERE a.NomorNasabah = '" . $debitur->NomorNasabah . "'";
										$data = $this->db2->query($selectsum)->result();
										if (sizeof($data) > 0) {
											foreach ($data as $z) {
												$datatgkan = array(
													'f_cif' => $z->NomorNasabah,
													'f_nomorsp' => $nosurat,
													'f_loanid' => $z->ID,
													'f_pd_id' => $z->FacilityType,
													'f_facility' => $z->fasilitas,
													'f_total' => $z->total_all,
													'f_bunga' => $z->bunga,
													'f_denda' => $z->denda,
													'f_pokok' => $z->pokok,
													'f_os' => $z->os
												);
												$insert = $this->db2->insert('t_tunggakan', $datatgkan);
												if ($insert == TRUE) {
													$hasil[] = "sucesss insert tgkan";
												} else {
													$hasil[] = "gagal insert tgkan";
												}
											}
										}
                                    $hasil[] = 'sucsess';
                                } else {
                                    $hasil[] = 'gagal ';
                                }
                            } else {
                                $hasil[] = 'gagal  ';
                            }
                        } else {
                            $insertgeneratesp = $this->db2->insert('t_generate_spe', $datainsertgeneratesp);
                            if ($insertgeneratesp == TRUE) {
								$selectsum = "SELECT substr(a.DATEAPPROVED,1,10) as date_aproved ,IFNULL((SELECT d.DESCRIPTION from bss_ld_sub_product as d JOIN bss_cad as e ON d.ID = e.FacilityType WHERE e.ID = a.ID),(SELECT w.DESCRIPTION FROM bss_category as w WHERE w.ID = a.FacilityType )) as fasilitas, (select IFNULL(SUM(b.DUE_CH),'0.00') from bss_coll_pd_balaces as b WHERE b.ID = a.id) as denda,(select IFNULL(SUM(x.DUE_PR),'0.00') from bss_coll_pd_balaces as x WHERE x.ID = a.id) as pokok,(select IFNULL(SUM(v.DUE_CH),'0.00') from bss_coll_pd_balaces as v WHERE v.ID = a.id) as bunga,a.Bakidebet as os ,((select IFNULL(SUM(b.DUE_CH),'0.00') from bss_coll_pd_balaces as b WHERE b.ID = a.id) +(select IFNULL(SUM(z.DUE_PR),'0.00') from bss_coll_pd_balaces as z WHERE z.ID = a.id)  + (select ifnull(SUM(y.DUE_IN),'0.00') from bss_coll_pd_balaces as y WHERE y.ID = a.id)) as total_all ,a.* FROM bss_cad AS a  WHERE a.NomorNasabah = '" . $debitur->NomorNasabah . "'";
										$data = $this->db2->query($selectsum)->result();
										if (sizeof($data) > 0) {
											foreach ($data as $z) {
												$datatgkan = array(
													'f_cif' => $z->NomorNasabah,
													'f_nomorsp' => $nosurat,
													'f_loanid' => $z->ID,
													'f_pd_id' => $z->FacilityType,
													'f_facility' => $z->fasilitas,
													'f_total' => $z->total_all,
													'f_bunga' => $z->bunga,
													'f_denda' => $z->denda,
													'f_pokok' => $z->pokok,
													'f_os' => $z->os
												);
												$insert = $this->db2->insert('t_tunggakan', $datatgkan);
												if ($insert == TRUE) {
													$hasil[] = "sucesss insert tgkan";
												} else {
													$hasil[] = "gagal insert tgkan";
												}
											}
										}
                                $hasil[] = 'sucsess';
                            } else {
                                $hasil[] = 'gagal  ';
                            }
                        }

                        $hasil[] = 'null2  ';
                    }
                }
            } else {
                $hasil[] = 'null3 ';
            }
        }
        return $hasil;
    }

	/* public function genspe1(){
	$selectdebit = "SELECT 
	JmlHariTunggakan AS dpd,
	(select a.COMPANY_NAME from bss_company as a where a.ID = bss_cad.KodeCabang) as cabang,
	STR_TO_DATE(NOW(), '%Y-%m-%d') AS 'tanggal_sekarang', 
	TIMESTAMPDIFF(MONTH, NOW(), DATEEXPIRED) AS selisih_bulan,
	(SELECT substr(b.AVAIL_AMT,1,1) from bss_limit as b where b.ID = bss_cad.LimitID) as avf, 
	bss_cad.* 
	FROM bss_cad";
	
	
	$selectspegenerate = "select * from t_generate_spe";	
	$selectspe12 = $this->db2->query($selectspegenerate)->num_rows();
	if($selectspe12 > 0){
		$selectspegenerate2 = "select * from t_generate_spe group by f_produk_id order by f_sp desc";	
		$selectspe22 = $this->db2->query($selectspegenerate2)->row();
		
	} else {
		
	}
	
	$selectspe = "select a.*,substr(a.f_produk,1,3) as prdk from t_param_spe as a group by a.f_produk_id order by a.f_spe";	
	$selectspe1 = $this->db2->query($selectspe)->num_rows();
	$selectspe2 = $this->db2->query($selectspe)->result();
		foreach($selectspe2 as $sp){
			if($a->prdk == 'PRK'){
				$selectdebit = "SELECT 
				JmlHariTunggakan AS dpd,
				(select a.COMPANY_NAME from bss_company as a where a.ID = bss_cad.KodeCabang) as cabang,
				STR_TO_DATE(NOW(), '%Y-%m-%d') AS 'tanggal_sekarang', 
				TIMESTAMPDIFF(MONTH, NOW(), DATEEXPIRED) AS selisih_bulan,
				(SELECT substr(b.AVAIL_AMT,1,1) from bss_limit as b where b.ID = bss_cad.LimitID) as avf, 
				bss_cad.* 
				FROM bss_cad where TIMESTAMPDIFF(MONTH, NOW(), DATEEXPIRED) = '".$sp->f_parameter."' and bss_cad.FacilityType = '".$sp->f_produk_id."' ";
				$selectdebit1 = $this->db2->query($selectdebit)->num_rows();
				if($selectdebit1 > 0){
					$selectdebit2 = $this->db2->query($selectdebit)->result();	
					foreach($selectdebit2 as $debitur){
						$datainsertgeneratesp = array(
								'f_sp_code' => $sp->f_spe_code,
								'f_sp' => $sp->f_spe,
								'f_id_produk' => $sp->f_produk_id,
								'f_cif' => $debitur->NomorNasabah,
								'f_nama_nasabah' => $debitur->NamaDebitur,
								'f_cabang_id' => $debitur->KodeCabang,
								'f_cabang' => $debitur->cabang,
								'f_dpd' => $debitur->dpd,
								'f_tgl_angsuran' => $debitur->DATEEXPIRED,
								'f_tgl_cetak' => '-',
								'f_tgl_kirim' => '-',
								'f_tgl_terima' => '-',
								'f_tgl_update' => '-',
								'f_keterangan' => '',
								'f_status' => 0,
								'f_file' => '',
								'f_nomer' => $nosurat,
								'f_date_time' => $datenow,
								'f_end_date_time' => date('Y-m-d', strtotime($datenow . '+' . $sp->f_masa . ' day'))
							);
							
							if($debitur->avf == '-'){
								$insertgeneratesp = $this->db2->insert('t_generate_spe', $datainsertgeneratesp);
                                if ($insertgeneratesp == TRUE) {
										$selectsum = "SELECT substr(a.DATEAPPROVED,1,10) as date_aproved ,IFNULL((SELECT d.DESCRIPTION from bss_ld_sub_product as d JOIN bss_cad as e ON d.ID = e.FacilityType WHERE e.ID = a.ID),(SELECT w.DESCRIPTION FROM bss_category as w WHERE w.ID = a.FacilityType )) as fasilitas, (select IFNULL(SUM(b.DUE_CH),'0.00') from bss_coll_pd_balaces as b WHERE b.ID = a.id) as denda,(select IFNULL(SUM(x.DUE_PR),'0.00') from bss_coll_pd_balaces as x WHERE x.ID = a.id) as pokok,(select IFNULL(SUM(v.DUE_CH),'0.00') from bss_coll_pd_balaces as v WHERE v.ID = a.id) as bunga,a.Bakidebet as os ,((select IFNULL(SUM(b.DUE_CH),'0.00') from bss_coll_pd_balaces as b WHERE b.ID = a.id) +(select IFNULL(SUM(z.DUE_PR),'0.00') from bss_coll_pd_balaces as z WHERE z.ID = a.id)  + (select ifnull(SUM(y.DUE_IN),'0.00') from bss_coll_pd_balaces as y WHERE y.ID = a.id)) as total_all ,a.* FROM bss_cad AS a  WHERE a.NomorNasabah = '" . $debitur->NomorNasabah . "'";
										$data = $this->db2->query($selectsum)->result();
										if (sizeof($data) > 0) {
											foreach ($data as $z) {
												$datatgkan = array(
													'f_cif' => $z->NomorNasabah,
													'f_nomorsp' => $nosurat,
													'f_loanid' => $z->ID,
													'f_pd_id' => $z->FacilityType,
													'f_facility' => $z->fasilitas,
													'f_total' => $z->total_all,
													'f_bunga' => $z->bunga,
													'f_denda' => $z->denda,
													'f_pokok' => $z->pokok,
													'f_os' => $z->os
												);
												$insert = $this->db2->insert('t_tunggakan', $datatgkan);
												if ($insert == TRUE) {
													$hasil[] = "sucesss insert tgkan";
												} else {
													$hasil[] = "gagal insert tgkan";
												}
											}
										}
                                    $hasil[] = 'sucsess';
                                } else {
                                    $hasil[] = 'gagal ';
                                }
							}
					}
				}
			}
			
		}
	} */
}