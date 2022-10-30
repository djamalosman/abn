<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Generateaccountmodel extends CI_Model {

    function generateaccount() {
        $query1 = "SELECT a.NomorNasabah, a.NomorRekening, a.ID as LD_Temenos, a.NamaDebitur,a.FacilityType,a.KodeCabang, 
a.PlafondAmount,a.BakiDebet,b.ANNUITY_REPAY_AMT AS Angsuran, a.DueBunga AS Bunga,a.DuePokok AS Tunggakan_bunga,
c.DUE_CH AS Denda,a.LonggarTarik AS Available_funds,a.IntRate,d.LOCKED_AMOUNT,a.COL,e.NAME AS Ao_Name,a.DATEAPPROVED,a.STARTDATEPLAFOND AS tanggal_awal_pinjaman,
a.DATEEXPIRED AS date_expried_PT,a.DATEEXPIRED AS Tanggal_Jatuh_Tempo,b.L_LD_RESTRU_FLG AS Flag_Resc
from bss_cad AS a
JOIN bss_ld AS b ON a.ID=b.ID
JOIN bss_coll_pd_balaces AS c ON b.ID=c.ID
JOIN bss_ac_locked_events AS d on d.ACCOUNT_NUMBER= a.RepayPrincSettleAcc
JOIN bss_dept_acc_officer AS e on e.ID=a.AO_Code";
        $data = $this->db2->query($query1)->num_rows();
        if ($data > 0) {
            $data1 = $this->db2->query($query1)->result();
            foreach ($data1 as $a) {
                $NomorNasabah = $a->NomorNasabah;
                $NomorRekening = $a->NomorRekening;
                $LD_Temenos = $a->LD_Temenos;
                $NamaDebitur = $a->NamaDebitur;
                $FacilityType = $a->FacilityType;
                //$ket_facility = $a->ket_facility;
                $KodeCabang = $a->KodeCabang;
                //$nama_cabang = $a->nama_cabang;
                //$cabang_mapping = $a->cabang_mapping;
                $PlafondAmount = $a->PlafondAmount;
                $BakiDebet = $a->BakiDebet;
                $angsuran = $a->Angsuran;
                $DueBunga = $a->Bunga;
                $DuePokok = $a->Tunggakan_bunga;
                $denda = $a->Denda;
                //$Available_Funds = $a->Available_funds;
                $lock_amt = $a->LOCKED_AMOUNT;
                $IntRate = $a->IntRate;
                $col = $a->COL;
                //$dpd_awal_bulan_perloan = $a->dpd_awal_bulan_perloan;
                //$dpd_saat_ini_perloan = $a->dpd_saat_ini_perloan;
                //$dpd_awal_bulan_obl = $a->dpd_awal_bulan_obl;
                //$bucket_last_obl = $a->bucket_last_obl;
                //$dpd_saat_ini_obl = $a->dpd_saat_ini_obl;
                //$bucket_now_obl = $a->bucket_now_obl;
                //$DPD_EOM = $a->DPD_EOM;
                //$Estimasi_Bucket_EOM = $a->Estimasi_Bucket_EOM;
                //$AO_Code = $a->AO_Code;
                $AOName = $a->Ao_Name;
                $Dateapproved = $a->DATEAPPROVED;
                $Startdateplafond = $a->tanggal_awal_pinjaman;
                $Date_Expired_PT = $a->date_expried_PT;
                $date_expired = $a->Tanggal_Jatuh_Tempo;
                $flag_resc = $a->Flag_Resc;
                //$flag_probiz = $a->flag_probiz;
$insert = "INSERT INTO `t_m_account`(`NomorNasabah`, `NomorRekening`, `LD_Temenos`, `NamaDebitur`, `FacilityType`, `ket_facility`, `KodeCabang`, `nama_cabang`,
 `cabang_mapping`, `PlafondAmount`, `BakiDebet`, `angsuran`, `DueBunga`, `DuePokok`, `denda`, `Available_Funds`, `lock_amt`, `IntRate`, `col`, `dpd_awal_bulan_perloan`,
 `dpd_saat_ini_perloan`, `dpd_awal_bulan_obl`, `bucket_last_obl`, `dpd_saat_ini_obl`, `bucket_now_obl`, `DPD_EOM`, `Estimasi_Bucket_EOM`, `AO_Code`, `AOName`, `Dateapproved`, `Startdateplafond`, `Date_Expired_PT`, `date_expired`, `flag_resc`, `flag_probiz`)
 VALUES ('".$NomorNasabah."','".$NomorRekening."','".$LD_Temenos."','".$NamaDebitur."','".$FacilityType."','','".$KodeCabang."','',
		 '','".$PlafondAmount."','".$BakiDebet."','".$angsuran."','".$DueBunga."','".$DuePokok."','".$denda."','','".$lock_amt."',
		 '".$IntRate."','".$col."','','','','','',
		 '','','','','".$AOName."','".$Dateapproved."','".$Startdateplafond."','".$Date_Expired_PT."',
		 '".$date_expired."','".$flag_resc."','')";
$insert2 = $this->db2->query($insert);
if($insert2 === TRUE){
$hasil[] = 'sucess';
} 
else {
$hasil[] = 'gagal';
}

            }
        }
        return $hasil;
    }

}
