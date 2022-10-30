<head>
<style type="text/css">
table {
  border: 0px solid black;
}
.tablex{
     border: 0px ;
}
table {
  border-collapse: collapse;
  width: 100%;
}

th {
  text-align: left;
}

hr.style1{
	border-top: 5px solid #8c8b8b;
        width: 100%;
}
</style>
</head>
<body>
    <table style="width:95%;height: 10%;border: 0px!important;">
      
        <tr>
            
            <td style="text-align: left">Lampiran <p>Memorandum No.09/097/MI/CP/VIII/2015</p></td>
            <td><img src="gambar/logobss.png"style="float:right;width: 150px;height: auto;"></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align:center" >MEMORANDUM RESTRUKTURISASI KREDIT (MRK)<p><h4>No.023/678/BSS/SAM-COLL/XII/2018</h4></p></td>
        </tr>
        
    </table>
    
    <br>
    <hr class="style1">
     <table border=""  style="width:95%;height: 2%;border-color: rgba(111,111,111,0.2) transparent transparent;">
      
        <tr>
				
              <td style="text-align: left">Cabang :Malang </td>
              <td style="text-align: left">No telp cabang :0341.4374520 </td>
             
        </tr>
        <tr>
            <td style="text-align: left">Divisi : Bisnis</td>
           <td style="text-align: left">Tanggal : 2019/09/02</td>
        </tr>
        <tr>
            <td style="text-align: left">Jenis pengajuan :Permohonan Restruktur an <b><?php echo $getdata_restrukturisasi->nama_debitur ?></b> </td>
            
            <td style="text-align: left">Restruktur ke :1</td>
        </tr>
        
        
    </table>
    <br>
    <hr class="style1">
    
                   
                        <label for="inputFirstname"><b>Informasi Debitur</b></label>
                        <table  border="1">
                        <tbody>

                        <tr>
                            <td>Name</td>
                            <td>:</td>
                            <td><?php echo $getdata_restrukturisasi->nama_debitur ?></td>
                        </tr>
                            <tr>
                                <td>Nama Pasangan</td>
                                <td>:</td>
                                <td>
                                    <?php echo $getdata_restrukturisasi->nama_pasangan ?>
                                </td>
                                
                            </tr>
                             <tr>
                                <td>Tempat Tanggal Lahir</td>
                                <td>:</td>
                                <td>
                                    <?php echo $getdata_restrukturisasi->temp_tgl_lhir ?>
                                </td>
                                
                            </tr>
                            <tr>
                                <td>Tempat Tanggal Lahir Pasangan</td>
                                <td>:</td>
                                <td>
                                <?php echo date("Y-m-d", strtotime($getdata_restrukturisasi->temp_tgl_lhir_psngn));?>
                                </td>
                                
                            </tr>
                           
                            <tr>
                                <td>Nomor KTP Debitur</td>
                                <td>:</td>
                                <td>
                                    
                                    <?php
                                   
                                       echo $getdata_restrukturisasi->no_ktp_debitur; 
                                    
                                    ?>
                                    </td>

                            </tr>
                            <tr>
                                <td>Nomor KTP Pasangan</td>
                                <td>:</td>
                                <td><?php echo
                                $getdata_restrukturisasi->no_ktp_pasangan
                                ?></td>
                                
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td><?php 
                               echo $getdata_restrukturisasi->alamat_debitur;
                                ?></td>
                                
                            </tr>
                             <tr>
                                <td>Alamat pasangan</td>
                                <td>:</td>
                                <td><?php 
                               echo  $getdata_restrukturisasi->alamat_pasangan
                                ?></td>
                                
                            </tr>
                              <tr>
                                <td>Bidang Usaha</td>
                                <td>:</td>
                                <td><?php  echo   $getdata_restrukturisasi->bidang_usaha
                                ?></td>
                                
                            </tr>
                            <tr>
                                <td>Lokasi Usaha</td>
                                <td>:</td>
                                <td><?php echo $getdata_restrukturisasi->lokasi_usaha;
                                ?></td>
                            </tr>
                             <tr>
                                <td>Nama Group Usaha</td>
                                <td>:</td>
                                <td><?php echo $getdata_restrukturisasi->nama_grup_usaha 
                                ?></td>
                            </tr>
                            <tr>
                                <td>Debitur Sejak</td>
                                <td>:</td>
                                <td><?php echo $getdata_restrukturisasi->debitur_sejak ?></td>
                            </tr>
                                 <tr>
                                <td>Menunggak Sejak</td>
                                <td>:</td>
                                <td><?php echo $getdata_restrukturisasi->menunggak_sejak ?></td>
                            </tr>
                              <tr>
                                <td>Hari tungakan</td>
                                <td>:</td>
                                <td><?php echo $getdata_restrukturisasi->hari_tunggakan ?>
                                </td>
                            </tr>
                             <tr>
                                <td>Kolektibilitas</td>
                                <td>:</td>
                                <td><?php echo $getdata_restrukturisasi->kolektibilitas;?></td>
                            </tr>
                             <tr>
                                <td>Approval Saat Inisiasi Awal</td>
                                <td>:</td>
                                <td>
                                <?php  echo $getdata_restrukturisasi->approval_saat_inisiasi_awal ?>
                                </td> 
                            </tr>
                        </tr>
                        </tbody>
                        </table>
                        <br>
                    <div class="col-sm-11">
                        <label for="inputFirstname"><b>Seleuruh Fasilitias Pembiyaan/Pinjaman yang dimiliki oleh debitur di BSS</b></label>
                        <table  border="1" style="width:95%">
                             <tr>
                            <th style ="text-align:center">No</th>
                            <th style ="text-align:center">Jenis Fasilitas</th>
                            <th style ="text-align:center">DPD</th>
                            <th style ="text-align:center">Plafond</th>
                            <th style ="text-align:center">O/S per</th>
                            <th style ="text-align:center">Jangka Waktu/tenor</th>
                            <th style ="text-align:center">Tunggakan Bunga(Rp)</th>
                            <th style ="text-align:center">Tunggakan Denda</th>
                            <th style ="text-align:center">Total (A+B+C)</th>
                             </tr>
                        <tbody>
                         <?php $_idx_loop = 1; $_data_length = count($restrukturisasi_getdata); ?>   
                         <?php foreach ($restrukturisasi_getdata as $value) { ?>
                        <tr>
                            <td style ="text-align:center"><?php echo $_idx_loop ?></td>
                            <td><?php echo $value->jenis_fasilitas_pembayaran ?></td>
                            <td style ="text-align:center"><?php echo $value->dpd ?></td>
                     
							<td style ="text-align:right"><?php echo number_format ($value->plafond,2,',','.') ?></td>
                            <td style ="text-align:right"><?php echo number_format ($value->os_per,2,',','.') ?></td>
                            <td style ="text-align:center"><?php echo $value->jangka_waktu_tenor ?></td>
							<td style ="text-align:right"><?php echo number_format ($value->tunggakan_bunga,2,',','.') ?></td>
                            <td style ="text-align:right"><?php echo number_format ($value->tunggakan_denda,2,',','.') ?></td> 
							<td style ="text-align:right"><?php echo number_format ($value->total,2,',','.') ?></td>
                        </tr>
                        <?php $_idx_loop++; ?>
                         <?php } ?>
                         <tr>
                            <th colspan="2" align="center">Total</th>
                            <td></td>
                            <td style ="text-align:right"><?php echo number_format($value->totalplafond,2,',','.') ?></td>
                            <td style ="text-align:right"><?php echo number_format($value->totalBakiDebet,2,',','.') ?></td>
                            <td></td>
							<td style ="text-align:right"><?php echo number_format($value->totalDueBunga,2,',','.') ?></td>
							<td style ="text-align:right"><?php echo number_format($value->totalDUE_CH,2,',','.') ?></td>
							<td style ="text-align:right"><?php echo number_format($value->total_ABC,2,',','.') ?></td>
                  
                         </tr>
                        </tbody>
                        </table>
                    </div>
                        <div class="col-sm-11">
                            <label for="inputFirstname"><b>Agunan Yang di miliki oleh debitur</b></label>
                        <table  border="1" style="width:95%">
                             <tr>
								<th style ="text-align:center">No</th>
                                <th style ="text-align:center">Tipe <p>Jaminan</p></th>
                                <th style ="text-align:center">Deskripsi</th>
                                <th style ="text-align:center">Nilai <p> Pasar(Rp)</p></th>
                                <th style ="text-align:center">Nilai <p> Likuidasi(Rp)</p></th>
                                <th style ="text-align:center">Nilai Penjaminan<p> HT / Fidusia (Rp)</p></th>
                                <th style ="text-align:center">Keterangan<p> Aprasial</p></th>
                             </tr>
                         <tbody>
                             <?php $_idx_loop = 1; $_data_length = count($restrukturisasi_getdata); ?>
                            <?php foreach ($restrukturisasi_getdata as $key) { ?>
                        <tr>
                             <td style ="text-align:center"><?php echo $_idx_loop ?></td>
                             <td><?php echo $key->jenis_fasilitas_dimiliki ?></td>
                             <td><?php echo $key->deskripsi ?></td>
							 <td style ="text-align:right"><?php echo number_format($key->mv_lama,2,',','.') ?></td>
							 <td style ="text-align:right"><?php echo number_format($key->lv_lama,2,',','.') ?></td>
							 <td style ="text-align:right"><?php echo number_format($key->mv_baru,2,',','.') ?></td>
                             <td><?php echo $key->ket ?></td>    
                        </tr>
                        <?php $_idx_loop++; ?>
                      <?php   } ?>
                      <tr>
                            <th colspan="3" align="center">Total</th>
							 <td style ="text-align:right"><?php echo number_format($key->total_mv_lama,2,',','.') ?></td>
                            
							 <td style ="text-align:right"><?php echo number_format($key->total_lv_lama,2,',','.') ?></td>
                            
							<td style ="text-align:right"><?php echo number_format($key->total_mv_baru,2,',','.') ?></td>
                            
                           <td></td>
                         </tr>
                        </tbody> 
                        </table>
                    
                    </div>
                        <br>
                        <div class="col-sm-11">
<label for="inputState"><b>Catatan Agunan Yang Dimiliki</b></label><p>
 <?php  echo $getdata_restrukturisasi->catatan_agunandimiliki ?></div>
                        <br> 
                    <div class="col-sm-11">
                        <label for="inputFirstname"></label>
                        
                        <table border="1" style="width:95%">

                             <tr>
                            <th style ="text-align:center">No</th>
                            <th style ="text-align:center">Bank</th>
                            <th style ="text-align:center">Fasilitas</th>
                            <th style ="text-align:center">Bunga (%)</th>
                            <th style ="text-align:center">Jangka Waktu</th>
                            <th style ="text-align:center">Plafond (Rp)</th>
                            <th style ="text-align:center">O/S Pokok (Rp)</th>
                            <th style ="text-align:center">Angsuran (Rp)</th>
                            <th style ="text-align:center">Kol</th>
                             </tr>
                        <tbody>

                        <tr>
                            <td style ="text-align:center">1</td>
                            <td><?php echo $getdata_restrukturisasi->bank_1a ?></td>
                            <td><?php echo $getdata_restrukturisasi->fasilitas_1a ?></td>
                            <td style ="text-align:right"><?php echo $getdata_restrukturisasi->bunga_persen_1a,'%' ?></td>
                            <td><?php echo $getdata_restrukturisasi->jangka_waktu_1aa ?></td>
                            <td style ="text-align:right"><?php echo number_format($getdata_restrukturisasi->plafond_rp_1a,2,',','.') ?></td>
                            <td style ="text-align:right"><?php echo number_format($getdata_restrukturisasi->os_pokok_rp_1a,2,',','.') ?></td>           
                            <td style ="text-align:right"><?php echo number_format($getdata_restrukturisasi->angsuran_rp_1a,2,',','.') ?></td>
                            <td><?php echo $getdata_restrukturisasi->kol_1a ?></td>
 
                        </tr>
                        <tr>
                            <td style ="text-align:center">2</td>
                            <td><?php echo $getdata_restrukturisasi->bank_2a ?></td>
                            <td><?php echo $getdata_restrukturisasi->fasilitas_2a ?></td>
                            <td style ="text-align:right"><?php echo $getdata_restrukturisasi->bunga_persen_2a,'%'?></td>
                            <td><?php echo $getdata_restrukturisasi->jangka_waktu_2aa ?></td>
                            <td style ="text-align:right"><?php echo number_format($getdata_restrukturisasi->plafond_rp_2a,2,',','.')?></td>
                            <td style ="text-align:right"><?php echo number_format($getdata_restrukturisasi->os_pokok_rp_2a,2,',','.')?></td>           
                            <td style ="text-align:right"><?php echo number_format($getdata_restrukturisasi->angsuran_rp_2a,2,',','.')?></td>
                            <td><?php echo $getdata_restrukturisasi->kol_2a ?></td>

                        </tr>
                        <tr>
                            
                            <td style ="text-align:center">3</td>
                            <td><?php echo $getdata_restrukturisasi->bank_3a ?></td>
                            <td><?php echo $getdata_restrukturisasi->fasilitas_3a ?></td>
                            <td style ="text-align:right"><?php echo $getdata_restrukturisasi->bunga_persen_3a,'%' ?></td>
                            <td><?php echo $getdata_restrukturisasi->jangka_waktu_3aa ?></td>
                            <td style ="text-align:right"><?php echo number_format($getdata_restrukturisasi->plafond_rp_3a,2,',','.')?></td>
                            <td style ="text-align:right"><?php echo number_format($getdata_restrukturisasi->os_pokok_rp_3a,2,',','.')?></td>           
                            <td style ="text-align:right"><?php echo number_format($getdata_restrukturisasi->angsuran_rp_3a,2,',','.')?></td>
                            <td><?php echo $getdata_restrukturisasi->kol_3a ?></td>
                        </tr>
                        <tr>
                            <td style ="text-align:center">4</td>
                            <td><?php echo $getdata_restrukturisasi->bank_4a ?></td>
                            <td><?php echo $getdata_restrukturisasi->fasilitas_4a ?></td>
                            <td style ="text-align:right"><?php echo $getdata_restrukturisasi->bunga_persen_4a,'%'?></td>
                            <td><?php echo $getdata_restrukturisasi->jangka_waktu_4aa ?></td>
                            <td style ="text-align:right"><?php echo number_format($getdata_restrukturisasi->plafond_rp_4a,2,',','.')?></td>
                            <td style ="text-align:right"><?php echo number_format($getdata_restrukturisasi->os_pokok_rp_4a,2,',','.')?></td>           
                            <td style ="text-align:right"><?php echo number_format($getdata_restrukturisasi->angsuran_rp_4a,2,',','.')?></td>
                            <td><?php echo $getdata_restrukturisasi->kol_4a ?></td>
                        </tr>
                        
                         <tr>
                             <th colspan="5">Total</th>
                            <td style ="text-align:right"><?php echo number_format($getdata_restrukturisasi->totalplafond_bank,2,',','.')?></td>
                             <td style ="text-align:right"><?php echo number_format($getdata_restrukturisasi->totalos_pokok_bank,2,',','.')?></td>
                             <td style ="text-align:right"><?php echo number_format($getdata_restrukturisasi->total_angsuran_bank,2,',','.')?></td>
                            <td></td>
                         </tr>
                        
                        </tbody>
                        </table>
                    
                    </div>
                        <br>
                        
                        <div class="col-sm-11">
                            <label for="inputState"><b>Permasalahan Debitur</b></label><p>
                            <?php echo $getdata_restrukturisasi->catatan_dasar_permasalahandebitur ?>
                    </div>
                        
                                        <label for="inputFirstname"><b>Usulan Restrukturisasi Kredit</b></label>
                                        <?php foreach ($search_norek AS $norek) { ?>
                                        <?php if(!empty($norek)){ ?>
                                        <?php //echo var_dump($norek); ?>
                                        <table border="1" style="width:95%">
                                            <tr>
                                                <th style ="text-align:center">Jenis Fasilitas</th>
                                                <th style ="text-align:center">Fasilitas Awal Sebelum Restrukturisasi</th>
                                                <th style ="text-align:center">Restruktur 1</th>
                                                
                                            </tr>
                                            <?php foreach ($usulan_kredit_pdf  as $value) { ?>
                                            <?php if($value->key == $norek->key) { ?>
                                            <tbody>

                                                <tr>

                                                    <td>
                                                       <?php echo $value->Jenis_fasilitas ?>
                                                    </td>
                                                    <td style ="text-align:right">
                                                        <?php echo $value->fasilitas_sblm_restrukturisasi ?>
                                                    </td>
                                                    <td style ="text-align:right">
                                                        <?php echo $value->fasilitas_stlh_restrukturisasi ?>
                                                    </td>
                                                   
                                                </tr>
                                            </tbody>
                                            <?php } ?>
                                            <?php } ?>

                                        </table>

                                        <?php } ?>
                                        <?php } ?>
                         <br>           
                <div class="col-sm-11">
                <br>                                   
<label for="inputState"><b>PENGHAPUSAN/KERINGANAN (apabila ada)</b></label>

<table border="1" style="width:95%" >
<tr>
<th style ="text-align:center">Deskripsi</th>
<th style ="text-align:center">Pokok</th>
<th style ="text-align:center">%</th>
<th style ="text-align:center">Bunga</th>
<th style ="text-align:center">%</th>
<th style ="text-align:center">Denda</th>
<th style ="text-align:center">%</th>
</tr>
<?php foreach ($restrukturisasi_pengapusan as $value11) { ?>
        <tr>
       <td><?php echo $value11->deskripsi_a   ?></td>
	   <td style ="text-align:right"><?php echo $value11->pokok_a ?></td>
       <td style ="text-align:right"><?php echo $value11->persen_1a,'%' ?></td>
	   <td style ="text-align:right"><?php echo $value11->bunga_a ?></td>
       <td style ="text-align:right"><?php echo $value11->persen_2a,'%' ?></td>
	   <td style ="text-align:right"><?php echo $value11->denda_a ?></td>
       <td style ="text-align:right"><?php echo $value11->persen_3a,'%' ?></td>
    </tr>
    <?php } ?>
   
</table>
 </div>
                <br>
                  <div class="col-sm-11">
                        <label for="inputState"><b>Dasar Pertimbangan</b></label><p>
                        <?php echo $getdata_restrukturisasi->catatan_dasar_pertimbangan ?>

                  </div>
                        <br>
                    <div class="col-sm-11">
                        <label for="inputFirstname"><b>Analisa Kuantitatif :</b></label><p>
                        <table border="1" style="width:95%">
                        <tr>
                            <td colspan="2"><b>Laporan Rugi Laba proforma</b></td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>Periode : <?php echo $getdata_restrukturisasi->periode_a ?></td>
                        </tr>
                        <tbody>
                            <tr>
                                <td>Pendapatan</td>
                                 <td style ="text-align:right">
                                     <?php echo number_format ($getdata_restrukturisasi->pendapatan_a,2,',','.') ?>
                                 </td>
                            </tr>
                             <tr>
                                 <td>Harga Pokok Penjualan</td>
								 <td style ="text-align:right"><?php echo number_format($getdata_restrukturisasi->hrga_pokok_penjualan_a,2,',','.') ?></td>
                                  
                             </tr>
                             <tr>
                                 <td>Depresisai dan Amortisasi</td>
                                  <td style ="text-align:right">
                                     <?php echo number_format($getdata_restrukturisasi->depresisai_amortisasi_a,2,',','.') ?>
                                 </td>
                             </tr>
                             <tr>
                                 <td>Laba Kotor</td>
								<td style ="text-align:right"><?php echo number_format($getdata_restrukturisasi->laba_kotor_a,2,',','.') ?></td>
                             </tr>
                             <tr>
                                 <td>Biaya Usaha - Variabel (spt.By Penjualan)</td>
								 <td style ="text-align:right"><?php echo number_format($getdata_restrukturisasi->biaya_variabel_a,2,',','.') ?></td>
                                   
                             </tr>
                             <tr>
                                 <td>Biaya Usaha - Tetap (spt.listrik,tlp,air,gaji)</td>
								 <td style ="text-align:right"><?php echo number_format( $getdata_restrukturisasi->biaya_tetap_a,2,',','.') ?></td>
                             </tr>
                             <tr>
                                 <td>Laba Operasional</td>
								  <td style ="text-align:right"><?php echo number_format($getdata_restrukturisasi->laba_opersaional_a,2,',','.') ?></td>
                             </tr>
                              <tr>
                                 <td>Biaya Hidup</td>
								 <td style ="text-align:right"><?php echo number_format($getdata_restrukturisasi->biaya_hidup_a,2,',','.') ?></td>
                             </tr>
                             <tr>
                                 <td>Angsuran di Tempat lain</td>
								  <td style ="text-align:right"><?php echo number_format($getdata_restrukturisasi->angsuran_tempat_lain_a,2,',','.') ?></td>
                             </tr>
                             <tr>
                                 <td>Angsuran di BSS</td>
								 <td style ="text-align:right"><?php echo number_format($getdata_restrukturisasi->angsuran_bss_a,2,',','.') ?></td>
                             </tr>
                             <tr>
                                 <td>biaya lain</td>
								  <td style ="text-align:right"><?php echo number_format($getdata_restrukturisasi->biaya_lain_a,2,',','.') ?></td>
                             </tr>
                              <tr>
                                 <td>Pendapatan Lain</td>
								 <td style ="text-align:right"><?php echo number_format($getdata_restrukturisasi->pendapatan_lain_a,2,',','.') ?></td>
                             </tr>
                             <tr>
                                 <td>Laba (Rugi)Sebelum Pajak</td>
								 <td style ="text-align:right"><?php echo number_format($getdata_restrukturisasi->laba_rugi_sebelum_pajak_a,2,',','.') ?></td>
                             </tr>
                             <tr>
                                 <td>Pajak</td>
								 <td style ="text-align:right"><?php echo number_format( $getdata_restrukturisasi->pajak_a,2,',','.') ?></td>
                             </tr>
                             <tr>
                                 <td>Laba Bersih</td>
								  <td style ="text-align:right"><?php echo number_format($getdata_restrukturisasi->laba_bersih_a,2,',','.') ?></td>
                             </tr>
                        </tbody>
                        </table>
                    
                    </div>    
                        <br>
                      <div class="col-sm-11">
                        <label for="inputFirstname"><b>Analisa Kuantitatif :</b></label><p>
                        
                        
                        <table border="1" style="width:95%">
                        <tr>
                            <td colspan="2"><b>Laporan Rugi Laba proforma</b></td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>Periode : <?php echo $getdata_restrukturisasi->periode_b ?></td>
                        </tr>
                        <tbody>
                            <tr>
                                <td>Pendapatan</td>
                                 <td style ="text-align:right">
                                     <?php echo number_format ($getdata_restrukturisasi->pendapatan_b,2,',','.') ?>
                                 </td>
                            </tr>
                             <tr>
                                 <td>Harga Pokok Penjualan</td>
                                 <td style ="text-align:right">
									 <?php echo number_format ($getdata_restrukturisasi->hrga_pokok_penjualan_b,2,',','.') ?>
                                    
                                 </td>
                             </tr>
                             <tr>
                                 <td>Depresisai dan Amortisasi</td>
                                  <td style ="text-align:right">
								   <?php echo number_format ($getdata_restrukturisasi->depresisai_amortisasi_b,2,',','.') ?>
                                 </td>
                             </tr>
                             <tr>
                                 <td>Laba Kotor</td>
                                <td style ="text-align:right">
									  <?php echo number_format ($getdata_restrukturisasi->laba_kotor_b,2,',','.') ?>
                                 </td>
                             </tr>
                             <tr>
                                 <td>Biaya Usaha - Variabel (spt.By Penjualan)</td>
                                 <td style ="text-align:right">
									 <?php echo number_format ($getdata_restrukturisasi->biaya_variabel_b,2,',','.') ?>
                                  
                                 </td>
                             </tr>
                             <tr>
                                 <td>Biaya Usaha - Tetap (spt.listrik,tlp,air,gaji)</td>
                                  <td style ="text-align:right">
								   <?php echo number_format ($getdata_restrukturisasi->biaya_tetap_b,2,',','.') ?>
                                   
                                 </td>
                             </tr>
                             <tr>
                                 <td>Laba Operasional</td>
                                 <td style ="text-align:right">
									  <?php echo number_format ($getdata_restrukturisasi->laba_opersaional_b,2,',','.') ?>
                                 </td>
                             </tr>
                              <tr>
                                 <td>Biaya Hidup</td>
                                 <td style ="text-align:right">
								  <?php echo number_format ($getdata_restrukturisasi->biaya_hidup_b,2,',','.') ?>
                                 </td>
                             </tr>
                             <tr>
                                 <td>Angsuran di Tempat lain</td>
                                 <td style ="text-align:right">
									 <?php echo number_format ($getdata_restrukturisasi->angsuran_tempat_lain_b ,2,',','.') ?>
                                 </td>
                             </tr>
                             <tr>
                                 <td>Angsuran di BSS</td>
                                 <td style ="text-align:right">
									<?php echo number_format ( $getdata_restrukturisasi->angsuran_bss_b,2,',','.') ?>
                                 </td>
                             </tr>
                             <tr>
                                 <td>biaya lain</td>
                                 <td style ="text-align:right">
									 <?php echo number_format ($getdata_restrukturisasi->biaya_lain_b,2,',','.') ?>
                                 </td>
                             </tr>
                              <tr>
                                 <td>Pendapatan Lain</td>
                                 <td style ="text-align:right">
									 <?php echo number_format ($getdata_restrukturisasi->pendapatan_lain_b,2,',','.') ?>
                                 </td>
                             </tr>
                             <tr>
                                 <td>Laba (Rugi)Sebelum Pajak</td>
                                 <td style ="text-align:right">
									<?php echo number_format ($getdata_restrukturisasi->laba_rugi_sebelum_pajak_b,2,',','.') ?>
                                 </td>
                             </tr>
                             <tr>
                                 <td>Pajak</td>
                                 <td style ="text-align:right">
									<?php echo number_format ($getdata_restrukturisasi->pajak_b,2,',','.') ?>
                                     
                                 </td>
                             </tr>
                             <tr>
                                 <td>Laba Bersih</td>
                                 <td style ="text-align:right">
								 <?php echo number_format ( $getdata_restrukturisasi->laba_bersih_b,2,',','.') ?>
                                    
                                 </td>
                             </tr>
                        </tbody>
                        </table>
                    
                    </div>
                  <br>
               <div class="col-sm-11">
                        <label for="inputState"><b>Catatan Analisa Kuantitatif </b></label>
                        <p>
                        <?php echo  $getdata_restrukturisasi->catatan_analisakuantitatif ?>
              </div>
                  <br>
               
                        <label for="inputFirstname"><b>Lampiran</b></label>
                        
                        <table border="1" style="width:95%">
                             <tr>
                            <th style ="text-align:center">No</th>
                            <th style ="text-align:center">Dokumen</th>
                            <th style ="text-align:center">Ada</th>
                            
                             </tr>
                             <tbody>
							 <?php echo $indx=1; ?>
                             <?php foreach ($restrukturisasi_lampiran as $value4){ ?>
                         <tr>
							 <td style ="text-align:center"><?php echo $indx ?></td>
                            <td><?php echo $value4->datadokumen; ?></td>
                         <td>
                    <?php
                    if(!empty($value4->adadokumen))
                    {
                       echo "<img src='gambar/chek.png' style='height:20px'";
                    } else {
                        echo "<img src='gambar/remove.png' style='height:20px'";
                    }
                    ?>
                   
                    </td>     
                             
                               
                        </tr>
						<?php $indx++; ?>
                             <?php } ?>
                        </tbody>
                        </table>
                   
                   
                  <br>
                  <br>
                  <br>
                 
                        <label for="inputFirstname"><b>Deviasi restruktur</b></label>
                        
                        <table border="1" style="width:95%">
                       
                             <tr>
							<th style ="text-align:center">No</th>
                            <th style ="text-align:center">Jenis Deviasi</th>
                            <th style ="text-align:center">Ada</th>
                            
                             </tr>
                             
                        <tbody>
						<?php $indx=1; ?>
                        <?php foreach ($restrukturisasi_deversiasi as $value5){ ?>
                        <tr>
                         <td style ="text-align:center"><?php echo $indx ?></td>
                            <td>
                            <?php echo $value5->jenis_devisiasi; ?>
                            </td>  
                     <td>
                    <?php
                    if(!empty($value5->adadevisiasi))
                    {
                       echo "<img src='gambar/chek.png' style='height:20px'";
                    } else {
                        echo "<img src='gambar/remove.png' style='height:20px'";
                    }
                    ?>
                   
                    </td>     
                        </tr>
						<?php $indx++; ?>
                        <?php } ?>
                        </tbody>
                        </table>
                   
                    
           
</body>