<head>
<style type="text/css">
    textarea {
    border: none;
    overflow: auto;
    outline: none;

    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;

    resize: none; /*remove the resize handle on the bottom right*/
}
label{
    font-size: 15px;
}
td,tr,tbody,th,thead{
    border:1px solid black!important;
}
th,td{
    font-family: "Quattrocento Sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
    font-size: 13px;
}
</style>
</head>
<body>
               
    <div id="wrapper">
<div class="pagetabel-content.sidebar-pageTabel right-sidebar-page clearfix">
                <!-- .page-content-wrapper -->
 <div class="page-content-wrapper">
    <div class="container py-5">
    <div class="row">
        <div class="col-md-12 mx-auto">
            <form action="<?php echo base_url('content/create_mrpkdammyperpanjangan/')
             . $datadammy->f_cif.'/'.$datadammy->f_custname ?>">
            <div id="printablediv">
                <div class="form-group row">

                    <div class="col-sm-11">
                        <label for="inputFirstname">Informasi Debitur</label>
                        <table id="printTable" class="table table-bordered table-striped table-hover dt-responsive non-responsive" style="width:95%;height: 10%;">
                        <tbody>

                        <tr>
                            <td>Name</td>
                            <td>:</td>
                            <td><?php echo $datadammy->f_custname ?></td>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td>
                                    <?php echo $datadammy->f_homeaddreass ?>
                                    </td>

                            </tr>
                             <tr>
                                <td>Cif</td>
                                <td>:</td>
                                <td><?php echo $datadammy->f_cif ?></td>
                                
                            </tr>
                            <tr>
                                <td>Bidang Usaha</td>
                                <td>:</td>
                                <td><?php echo $datadammy->f_didangusaha ?></td>

                            </tr>
                            <tr>
                                <td>Nama Group Usaha</td>
                                <td>:</td>
                                <td><?php echo $datadammy->f_namagroupusaha ?></td>
                            </tr>
                            <tr>
                                <td>Lokasi Usaha</td>
                                <td>:</td>
                                <td><?php echo $datadammy->f_lokasiusaha ?></td>
                            </tr>

                            <tr>
                                <td>Debitur Sejak</td>
                                <td>:</td>
                                <td><?php echo $datadammy->f_startdate ?></td>
                            </tr>
                            <tr>
                                <td>Menunggak Sejak</td>
                                <td>:</td>
                                <td><?php echo $datadammy->f_startdate ?></td>
                            </tr>
                            <tr>
                                <td>Hari Tunggakan (DPD)</td>
                                <td>:</td>
                                <td>91 Hari</td>
                            </tr>
                            <tr>
                                <td>Kolektibilitas</td>
                                <td>:</td>
                                <td><?php echo $datadammy->f_kolektibilitas ?></td>
                            </tr>
                            <tr>
                                <td>CKPN</td>
                                <td>:</td>
                                <td>3789(LBU September 2018)</td>
                            </tr>
                        </tr>
                        </tbody>
                        </table>
                    </div>
                    <div class="col-sm-11">
                        <label for="inputFirstname">Fasilitias Yang Di Miliki Oleh Debitur</label>
                        <table  class="table table-bordered table-striped table-hover dt-responsive non-responsive" style="width:95%">
                         
                             <tr>
                            <th>No</th>
                            <th>Jenis Fasilitas</th>
                             <th>Plafond</th>
                            <th>O/S(per 21/10/2018 )A</th>
                            <th>Jangka Waktu/tenor</th>
                            <th>Tunggakan Bunga(Rp)</th>
                            <th>Tunggakan Denda</th>
                            <th>Total (A+B+C)</th>
                             </tr>
                        <tbody>
                        
                       

                         <?php foreach ($dammy as $value) { ?>
                        <tr>
                            
                          

                            <td></td>
                            <td>
                            <?php echo $value->f_jenisfasilitas ?>    
                            </td>
                            <td><?php echo $value->f_os ?></td>
                            <td><?php echo $value->f_plafond ?></td>
                            <td>60 bln</td>
                            <td><?php echo $value->f_tagihanbunga ?></td>
                            <td><?php echo $value->f_tagihandenda ?></td>
                            <td><?php echo $value->ttl_fasilitasdebitur ?></td>
                          
                            
                        </tr>
                         <?php } ?>
                         <tr>
                            <th colspan="2" align="center">Total</th>
                            <td><?php echo $value->ttlos_pelunasan ?></td>
                            <td><?php echo $value->ttlplafond_pelunasan; ?></td>
                            <td></td>
                            <td><?php echo $value->ttltb_pelunasan ?></td>
                            <td><?php echo $value->ttltd_pelunasan ?></td>
                            <td><?php echo $value->ttl_fasilitasdebitur ?></td>
                         </tr>
                        
                        </tbody>
                        </table>
                    
                    </div>
                    <div class="col-sm-11">
                        <label for="inputFirstname">Agunan Yang di miliki oleh debitur</label>
                    <table  class="table table-bordered table-striped table-hover dt-responsive non-responsive" id="tab" style="width:95%;">
                         <thead>
                             <tr>
                            <th>No</th>
                            <th>Tipe penjamin</th>
                            <th>Diskripsi</th>
                            <th>MV (LPJ Baru)</th>
                            <th>LV(LPJ Baru)</th>
                             <th>MV (LPJ Lama)</th>
                            <th>LV(LPJ Lama)</th>
                            <th>Keterangan Aprasial</th>
                           
    
                             </tr>
                         </thead>   
                        <tbody>
                             
                             <?php $_idx_loop = 0; $_data_length = count($dammy); ?>
                            <?php foreach ($dammy as $key) { ?>
                        <tr>
                                
                            <td>1</td>
                            <td>
                               <?php echo $key->f_tipejaminan; ?>
                             </td>
                            <td>
                            
                                <?php echo $key->f_deskripsi; ?>

                            </td>
                            <td><?php echo $key->f_mvlpjlama ?></td>
                            <td><?php echo $key->f_mvlpjbaru ?></td>
                            <td><?php echo $key->f_lvlpjbaru ?></td>
                            <td><?php echo $key->f_lvlpjlama ?></td> 
                            
                             <?php if($_idx_loop == 0) { ?>
                                    <td rowspan="<?php echo $_data_length; ?>">
                                        <?php echo $key->keteranganapprasial ?>
                                    </td>
                                <?php } ?>
                                
                        </tr>
                        <?php $_idx_loop++; ?>
                      <?php   } ?>
                      <tr>
                            <th colspan="2" align="center">Total</th>
                            <td></td>
                            <td><?php echo $key->ttlmv_lpjlama ?></td>
                            <td><?php echo $key->ttllv_lpjbaru ?></td>
                            <td><?php echo $key->ttlmv_lpjbaru ?></td>
                            <td><?php echo $key->ttllv_lpjlama ?></td>
                            <td></td>
                           
                            
                            
                         </tr>
                        </tbody>
                        </table>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-11">
                        <label for="inputFirstname">Pengajuan Pelunasan</label>
                    <table  class="table table-bordered table-striped table-hover dt-responsive non-responsive" id="tab" style="width:95%;">
                         <thead>
                             <tr>
                            <th>Deskripsi</th>
                            <th>Kewajiban Debitur A</th>
                            <th>AYDA B</th>
                            <th>Sisa Kewajiban (A-B)=C</th>
                            <th>Hapus Tagihan C</th>
                             </tr>
                            <tr>
                                <td colspan="5">fasilitas PA</td>
                                 <td hidden=""></td>
                                  <td hidden=""></td>
                                   <td hidden=""></td>
                                    
                            </tr>

                         </thead>   
                        <tbody>
                           

                            <?php foreach ($dammy as $key) { ?>
                        <tr>
                       
                            <td><?php echo $key->deskripsi ?></td>
                            <td><?php echo $key->kewajibandebitur ?></td>
                            <td><?php echo $key->pelunasan ?></td>
                            <td><?php echo $key->sisakewajiban ?></td>
                            <td>-</td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <th>Total</th>
                            <td><?php echo $key->ttlkwd_pelunasan ?></td>
                            <td><?php echo $key->ttl_pelunasan; ?></td>
                            <td><?php echo $key->ttl_sisakwjbpls ?></td>
                            <td></td>
                         </tr>
                        </tbody>
                        </table>
                    </div>
                    
                </div>
                <div class="form-group row">
                    <div class="col-sm-11">
                        <label for="inputPostalCode">KondisiPenyelesaian</label>
                          <table  class="table table-bordered table-striped table-hover dt-responsive non-responsive" id="tab" style="width:95%; height: 15%;">
                         <thead>
                             <tr>
                            <th>Biaya Lain</th>
                            <th>Di bayar</th>
                            <th>Di Hapus</th>
                             </tr>
                         </thead>   
                        <tbody>
                        <tr>
                            <td>
                               
                                   
                                    <input type="text" readonly="" style="border: 0px; background-color: transparent;" value="<?php echo $pelunasanprint->kondibiayalain ?>" name="">
                                   
                                
                            </td>
                            <td><input type="text" readonly="" style="border: 0px; background-color: transparent;" value="<?php echo $pelunasanprint->kondibayar ?>" name=""></td>
                            <td><input type="text" readonly="" style="border: 0px; background-color: transparent;" value="<?php echo $pelunasanprint->kondihapus ?>" name=""></td>
                            
                        </tr>
                        </tbody>
                        </table>
                    </div>
                     
                </div>

                <div class="form-group row">
                    <div class="col-sm-11">
                        <label for="inputContactNumber"> Upaya Penagihan Yang Telah Dilakukan</label>
                         <table  class="table table-bordered table-striped table-hover dt-responsive non-responsive" id="tab" style="width:95%;">
                         <thead>
                             <tr>
                            <th>Tanggal</th>
                            <th>Deskripsi</th>
                            <th>Pihak Yang Hadir</th>
                            
                             </tr>
                         </thead>   
                        <tbody>
                        <tr>
                            <td><input type="text" readonly="" style="border: 0px; background-color: transparent;" value="<?php echo $pelunasanprint->tanggalpenagihan ?>" name=""></td>
                         
                            <td><input type="text" readonly="" style="border: 0px; background-color: transparent;" value="<?php echo $pelunasanprint->upayadesk ?>" name=""></td>
                           <td><input type="text" readonly="" style="border: 0px; background-color: transparent;" value="<?php echo $pelunasanprint->upayapihak ?>" name=""></td>
                            
                            
                        </tr>
                        </tbody>
                        </table>
                    </div>
                    
                     
                </div>
               <div class="form-group row">
                    <div class="col-sm-11">
                        <label for="inputPostalCode">Lampiran </label>
                          <table  class="table table-bordered table-striped table-hover dt-responsive non-responsive" id="tab" style="width:95%;">
                         <thead>
                             <tr>
                            <th>No</th>
                            <th>Dokumen</th>
                            <th>Ada</th>
                            <th>Tidak</th>
                             </tr>
                         </thead>   
                        <tbody>
   <tr>
                            <td>1</td>
                            <td>Surat Permohonan dari Debitur</td>
                            <td>
                                <?php {
                                if (!empty($pelunasanprint->pengumuman_ada ='ada')) {
                                    echo "<i class='fa fa-check ' aria-hidden='true' title='Approve'></i>";
                                }
                                }?>
                            </td>
                            <td>
                                <?php {
                                if (!empty($pelunasanprint->pengumuman_tidak=='tidak')) {
                                     echo "<i class='fa fa-check ' aria-hidden='true' title='Approve'></i>";
                                }
                                } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Laporan Penilaian Jaminan yang lama dan baru khusus untuk debitur dengan hapus tagih pokok</td>
                             <td>
                                <?php {
                                if (!empty($pelunasanprint->risalah_ada = 'ada')) {
                                    echo "<i class='fa fa-check ' aria-hidden='true' title='Approve'></i>";
                                }
                                }?>
                            </td>
                            <td>
                                <?php {
                                if (!empty($pelunasanprint->risalah_tidak =='tidak')) {
                                     echo "<i class='fa fa-check ' aria-hidden='true' title='Approve'></i>";
                                }
                                } ?>
                            </td>
                            
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Lainya</td>
                            <td>
                                <?php {
                                if (!empty($pelunasanprint->permohonan_ada == 'ada')) {
                                    echo "<i class='fa fa-check ' aria-hidden='true' title='Approve'></i>";
                                }
                                }?>
                            </td>
                            <td>
                                <?php {
                                if (!empty($pelunasanprint->permohonan_tidak =='tidak')) {
                                     echo "<i class='fa fa-check ' aria-hidden='true' title='Approve'></i>";
                                }
                                } ?>
                            </td>
                            
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Lainya</td>
                            <td>
                                <?php {
                                if (!empty($pelunasanprint->lpj_ada = 'ada')) {
                                    echo "<i class='fa fa-check ' aria-hidden='true' title='Approve'></i>";
                                }
                                }?>
                            </td>
                            <td>
                                <?php {
                                if (!empty($pelunasanprint->lpj_tidak =='tidak')) {
                                     echo "<i class='fa fa-check ' aria-hidden='true' title='Approve'></i>";
                                }
                                } ?>
                            </td>
                            
                        </tr>
                       
                        </tbody>
                        </table>
                 </div>
     <div class="col-sm-11">
                        <label for="inputState">Permasalahan Debitur</label>
                         <textarea   id="permasalahandebitur" readonly="" name="permasalahandebitur" class="md-textarea form-control" rows="5"style="color: black; height: 250px;border: 0px; ">
<?php echo $pelunasanprint->permasalahan_dep ?>
                         </textarea>
                  </div>
                  <div class="col-sm-11">
                        <label for="inputState">Kondisi Penyelesaian</label>
                         <textarea   id="kondisipenyelesaian" readonly="" name="kondisipenyelesaian" class="md-textarea form-control" rows="5"style="color: black; height: 250px;border: 0px; ">
<?php echo $pelunasanprint->kondisi_penjelasan ?>
                         </textarea>
                  </div>
                  <div class="col-sm-11">
                        <label for="inputState">Catatan</label>
                         <textarea   id="kondisipenyelesaian" readonly="" name="kondisipenyelesaian" class="md-textarea form-control" rows="5"style="color: black; height: 250px;border: 0px; ">
<?php echo $pelunasanprint->catatan ?>
                         </textarea>
                  </div>
                   
                <div class="form-group">
                <div class="col-sm-11">
                        <label for="inputState">Dasar Pertimbangan</label>
                         <textarea   id="kondisipenyelesaian" readonly="" name="kondisipenyelesaian" class="md-textarea form-control" rows="5"style="color: black; height: 250px;border: 0px; ">
<?php echo $pelunasanprint->dasar_pertimbangan ?>
                         </textarea>
                  </div>
                <div class="col-sm-11">
                        <label for="inputState">Rekomendasi penyelesaian Kredit</label>
                         <textarea   id="kondisipenyelesaian" readonly="" name="kondisipenyelesaian" class="md-textarea form-control" rows="5"style="color: black; height: 250px; border: 0px; ">
<?php echo $pelunasanprint->rekomen_kredit ?>
                         </textarea>
                  </div>
                </div>
                </div>
                
            </div>
 <a href="<?php echo base_url ('content/read_mrpk_ayda_perpanjangan')?>" button type="submit" class="btn btn-primary px-4 float-right">cancel</button></a>
               <input type="button" class="btn btn-primary px-4 float-right"  value="Print" onclick="javascript:printDiv('printablediv')" />
            </form>
        </div>
        </div>
    </div>
</div>
 </div>
</div>
</div>
 <script src="<?php echo base_url('bst/Bootstrap/admin-html/js/pages/forms-advanced.js') ?>"></script>
 <!-- style="border: 0; text-overflow: '';text-indent: 1px;-moz-appearance:none;-webkit-appearance:none;" -->
 <script language="javascript" type="text/javascript">
        function printDiv(divID) {
            //Get the HTML of div
            var divElements = document.getElementById(divID).innerHTML;
            //Get the HTML of whole page
            var oldPage = document.body.innerHTML;

            //Reset the page's HTML with div's HTML only
            document.body.innerHTML = 
              // "" + 
              // divElements + "</table>";
               "<html><head><title></title></head><body><table><th><tr><td></td></tr></th>" + 
              divElements + "</body>";

            //Print Page
            window.print();

            //Restore orignal HTML
            document.body.innerHTML = oldPage;

          
        }
    </script>
 <!-- style="border: 0; text-overflow: '';text-indent: 1px;-moz-appearance:none;-webkit-appearance:none;" -->
 <script type="text/javascript">
    $(".chb1").change(function()
    {
    $(".chb1").prop('checked',false);
    $(this).prop('checked',true);

    });

    $(".chb2").change(function()
    {
    $(".chb2").prop('checked',false);
    $(this).prop('checked',true);
    });
     $(".chb3").change(function()
    {
    $(".chb3").prop('checked',false);
    $(this).prop('checked',true);
    });
      $(".chb4").change(function()
    {
    $(".chb4").prop('checked',false);
    $(this).prop('checked',true);
    });
     $(".chb5").change(function()
    {
    $(".chb5").prop('checked',false);
    $(this).prop('checked',true);
    });
</script>
</body


