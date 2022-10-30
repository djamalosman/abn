<?php echo $this->session->flashdata('message'); ?>

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
            <form action="<?php echo base_url('content/update_mrpk_penjualan/')
             . $datadammy->f_cif ?>">
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
                                <td>Hari Tunggakan (DPD)</td>
                                <td>:</td>
                                <td><?php echo $datadammy->f_duedate ?></td>
                            </tr>
                            <tr>
                                <td>Kolektibilitas</td>
                                <td>:</td>
                                <td><?php echo $datadammy->f_kolektibilitas ?></td>
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
                            <th>O/S(per 21/10/2018 )A</th>
                            <th>Plafond</th>
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
                            <td><?php echo  $value->ttl_fasilitasdebitur ?></td>
                            
                        </tr>
                         <?php } ?>
                         <tr>
                            <th colspan="2" align="center">Total</th>
                              <td><?php echo $value->ttlplafond_pelunasan ?></td>
                            <td><?php echo $value->ttlos_pelunasan ?></td>
                            <td></td>
                            <td><?php echo $value->ttltb_pelunasan ?></td>
                            <td><?php echo  $value->ttltd_pelunasan ?></td>
                            <td>
                                <?php echo  $value->ttl_fasilitasdebitur ?>
                            </td>
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
                            <th>keterangan</th>
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
                            <td><?php echo $key->keterangan ;?></td>
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
                            <td><?php echo $key->ttllv_lpjbaru; ?></td>
                            <td><?php echo $key->ttlmv_lpjbaru ?></td>
                            <td><?php echo $key->ttllv_lpjlama ?></td>
                            <td></td>
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
                            <th>Kewajiban A</th>
                            <th>Pelunasan B</th>
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
                        <?php if ($datadammy->f_cif==$datadammy->f_cif){ ?>
                             <td>
                                <textarea name="ambilkondisipenyelesaian" title="click untuk melakukan edit data" style="border: 0px;background-color: transparent;" cols="60">
<?php echo $pelunasanprint->kondibiayalain ?>
</textarea>
                            </td>
                             
                          <td>
                                 <textarea name="dibayar" title="click untuk melakukan edit data" style="border: 0px;background-color: transparent;" cols="30">
<?php echo $pelunasanprint->kondibayar ?>
                                 </textarea>
                            </td>
                             <td>
                                 <textarea name="dihapus" title="click untuk melakukan edit data" style="border: 0px;background-color: transparent;"  cols="30">
<?php echo $pelunasanprint->kondihapus ?>
                                 </textarea>
                            </td>
                          <!--   <td>
                                <?php echo $pelunasanprint->kondibiayalain ?>
                            </td>
                            <td ><?php echo $pelunasanprint->kondibayar ?></td>
                            <td><?php echo $pelunasanprint->kondihapus ?></td>
                             -->
                        </tr>
                        </tbody>
                        </table>
                    </div>
                     
                </div>

                <div class="form-group row">
                    <div class="col-sm-11">
                        <label for="inputContactNumber"> Upaya Penjualan Yang Telah Dilakukan</label>
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
                            <td>
                            <div class="col-lg-10 col-md-9">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                <input id="basic-datepicker" value="<?php echo $pelunasanprint->tanggalpenagihan ?>" name="tglinput" type="text" class="form-control">
                             </div>
                            </div> 
                            </td>
                            <td>
                                 <textarea name="inputdesk" title="click untuk melakukan edit data" style="border: 0px;background-color: transparent;" cols="60">
<?php echo $pelunasanprint->upayadesk ?>
                                 </textarea>
                            <!--  <select  name="inputdesk">
                                    <option>select Colection cabang</option>
                                    <option value="FU calon pembeli">FU calon pembeli </option>
                                    <option value="FU calon pembeli">FU calon pembeli </option>
                                    <option value="FU calon pembeli">FU calon pembeli</option>
                                </select> -->
                            </td>
                            <td>
                                <textarea name="inputpihak" title="click untuk melakukan edit data" style="border: 0px;background-color: transparent;" cols="30">
<?php echo $pelunasanprint->upayapihak ?>
                                 </textarea>
                               <!--  <select  name="inputpihak">
                                    <option>select Colection cabang</option>
                                    <option value="Collection cabang 001">Collection cabang 001</option>
                                    <option value="Collection cabang 002">Collection cabang 002</option>
                                    <option value="Collection cabang 003">Collection cabang 003</option>
                                </select> -->
                            </td>
                            
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
                            <td>Surat Penawara</td>
                            <td>
                                <?php $_p_lelang_ada_checked = ''; ?>
                                <?php if(!empty($pelunasanprint->pengumuman_ada)) { $_p_lelang_ada_checked = 'checked'; } ?>
                                <input type="checkbox" name="chb1ada" class="chb1" value="Ada" <?php echo $_p_lelang_ada_checked; ?>><br></td>
                            <td>
                                <?php $_p_lelang_tdk_checked = ''; ?>
                                <?php if(!empty($pelunasanprint->pengumuman_tidak)) { $_p_lelang_tdk_checked = 'checked'; } ?>
                                <input type="checkbox" name="chb1tidak" class="chb1" value="tidak" <?php echo $_p_lelang_tdk_checked; ?>></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Laporan Jaminan Terbaru</td>
                            <td>
                                <?php $_p_risalah_ada_checked = ''; ?>
                                <?php if(!empty($pelunasanprint->risalah_ada)) { $_p_risalah_ada_checked = 'checked'; } ?>
                                <input type="checkbox" name="chb2ada" class="chb2" value="Ada" <?php echo $_p_risalah_ada_checked; ?>><br></td>
                            <td>
                                <?php $_p_risalah_tdk_checked = ''; ?>
                                <?php if(!empty($pelunasanprint->risalah_tidak)) { $_p_risalah_tdk_checked = 'checked'; } ?>
                                <input type="checkbox" name="chb2tidak" class="chb2" value="tidak" <?php echo $_p_risalah_tdk_checked; ?>>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>MRPK Penjualan AYDA</td>
                            <td>
                                <?php $_p_permo_ada_checked = ''; ?>
                                <?php if(!empty($pelunasanprint->permohonan_ada)) { $_p_permo_ada_checked = 'checked'; } ?>
                                <input type="checkbox" name="chb3ada" class="chb3" value="Ada" <?php echo $_p_permo_ada_checked; ?>><br>
                            </td>
                            <td>
                                <?php $_p_permo_tdk_checked = ''; ?>
                                <?php if(!empty($pelunasanprint->permohonan_tidak)) { $_p_permo_tdk_checked = 'checked'; } ?>
                                <input type="checkbox" name="chb3tidak" class="chb3" value="tidak" <?php echo $_p_permo_tdk_checked; ?>>
                            </td>
                            
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Foto Jaminan</td>
                             <td>
                                <?php $_p_lpj_ada_checked = ''; ?>
                                <?php if(!empty($pelunasanprint->lpj_ada)) { $_p_lpj_ada_checked = 'checked'; } ?>
                                <input type="checkbox" name="chb4ada" class="chb4" value="Ada" <?php echo $_p_lpj_ada_checked; ?>><br>
                            </td>
                            <td>
                                <?php $_p_lpj_tdk_checked = ''; ?>
                                <?php if(!empty($pelunasanprint->lpj_tidak)) { $_p_lpj_tdk_checked = 'checked'; } ?>
                                <input type="checkbox" name="chb4tidak" class="chb4" value="tidak" <?php echo $_p_lpj_tdk_checked; ?>>
                            </td>
                            
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Lainnya</td>
                           <td>
                                <?php $_p_lainya_ada_checked = ''; ?>
                                <?php if(!empty($pelunasanprint->lainya_ada)) { $_p_lainya_ada_checked = 'checked'; } ?>
                                <input type="checkbox" name="chb5ada" class="chb5" value="Ada" <?php echo $_p_lainya_ada_checked; ?>><br>
                            </td>
                            <td>
                                <?php $_p_lainya_tdk_checked = ''; ?>
                                <?php if(!empty($pelunasanprint->lainya_tidak)) { $_p_lainya_tdk_checked = 'checked'; } ?>
                                <input type="checkbox" name="chb5tidak" class="chb5" value="tidak" <?php echo $_p_lainya_tdk_checked; ?>>
                            </td>
                            
                        </tr>
                        </tbody>
                        </table>
                 </div>

                   
   <div class="col-sm-11">
                        <label for="inputState">Dasar Pertimbangan</label>
                        <div class="col-lg-10 col-md-9"style="width: 96%; ">
                        <div style=" height: 50%;" id="" class="smnote1"><?php echo $pelunasanprint->dasar_pertimbangan ?></div>
                        </div>
                        <textarea style="display: none;" name="summernote6" class="summernote6" id="sm3" cols="5" rows="3"></textarea>
                  </div>
                  <br>
                  <br>
                <!-- <div class="col-sm-11">
                        <label for="inputState">Rekomendasi penyelesaian Kredit</label>
                         <textarea   id="kondisipenyelesaian" name="kondisipenyelesaian" class="md-textarea form-control" rows="5"style="color: black; height: 250px; border: 0px; ">

                         </textarea>
                  </div> -->
                     <div class="col-sm-11">
                        <label for="inputState">Rekomendasi penyelesaian Kredit</label>
                       <div class="col-lg-10 col-md-9"style="width: 96%; ">
                        <div style=" height: 50%;" id="" class="smnote2"><?php echo $pelunasanprint->rekomen_kredit ?></div>
                        </div>
                        <textarea style="display: none;" name="summernote7" class="summernote7" id="sm3" cols="5" rows="3"></textarea>
                </div>
                </div>
                <?php } ?>
                </div>
                
            </div>
               <button type="submit" class="btn btn-primary px-4 float-right" id="btn-submit" style="display: none">Save</button>
<button type="button" class="btn btn-primary px-4 float-right" onclick="test()">Update</button>
<a href="<?php echo base_url ('crete_document/read_mrpk_penjualan')?>" button type="submit" class="btn btn-primary px-4 float-right">cancel</button></a>
               <!-- <input type="button" class="btn btn-primary px-4 float-right"  value="Print" onclick="javascript:printDiv('printablediv')" /> -->
            </form>
        </div>
        </div>
    </div>
</div>
 </div>
</div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
  //var dasarpertimbangan = $('.summernote1').summernote();      
  //$('.summernote2').summernote();
  $('.smnote1').summernote();
  $('.smnote2').summernote();

});
    function test(){
        //var test = $('.summernote3').summernote('code');
        //alert(test.editable());
        //alert($('#sm3').summernote('code'));
        var text = document.getElementsByClassName('note-editable');
        //alert(text[0].innerText+" - "+text[1].innerText);
        $('.summernote6').val(text[0].innerHTML);
        $('.summernote7').val(text[1].innerHTML);
       


        $('#btn-submit').click();
    }
</script>
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
 <!-- style="border: 0; text-overflow: '';text-indent: 1px;-moz-appearance:none;-webkit-appearance:none;" -->
</body


