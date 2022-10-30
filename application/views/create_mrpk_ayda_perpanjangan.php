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
    font-size: 12px;
}
option{
    width: 50%;
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
                                 <textarea name="ambilkondisipenyelesaian" title="click untuk melakukan input data" style="border: 0px;background-color: transparent;" cols="60">
Silikan Isi Data biaya lain
</textarea>
                                <!-- <select name="ambilkondisipenyelesaian">
                                    <option value="">select</option>
                                    <option value="Biaya">Asuransi</option>
                                    <option value ="pajak">Notaris</option>
                                    <option value="Free">BDD Perbaikanjaminan</option>
                                     <option value="Free">BDD Penititpan dan Keamanan Jaminan (2 bln)</option>
                                </select> -->
                            </td>
                           <!--  <td><input  type="text"  name="dibayar" id="dibayar"></td>
                            <td><input  type="text"  name="dihapus" id="dihapus"></td> -->
                             <textarea name="dibayar" title="click untuk melakukan input data" style="border: 0px;background-color: transparent;" cols="40">
Silikan Isi Data dibayar
</textarea>
                           <textarea name="dihapus" title="click untuk melakukan input data" style="border: 0px;background-color: transparent;" cols="40">
Silikan Isi Data dihapus
</textarea>
                            
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
                            <td>
                            <div class="col-lg-10 col-md-9">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                <input id="basic-datepicker" value="" name="tglpenagihan" type="text" class="form-control">
                             </div>
                            </div> 
                            </td>
                         
                            <td>
                            <!-- <select name="upayapenagihan">
                        <option value="">select Deskripsi</option>
                                    <option value="Kunjungan ke gudang debitur (Gudang Kalianak)">Kunjungan ke gudang debitur (Gudang Kalianak)</option>
                                    <option value="Call debitur, untuk reminder kewajiban
                                    ">Call debitur, untuk reminder kewajiban
                                    </option>
                                    <option value="Call debitur terkait dng proses  penawaran AYDA.
                                    ">Call debitur terkait dng proses  penawaran AYDA.
                                    </option>
                                    <option value="Debitur datang ke kantor BSS dan bersedia dilakukan AYDA dan minta diproses bulan Juli 2018
                                    ">Debitur datang ke kantor BSS dan bersedia dilakukan AYDA dan minta diproses bulan Juli 2018
                                    </option>
                                </select> -->
                                 <textarea name="upayapenagihan" title="click untuk melakukan input data" style="border: 0px;background-color: transparent;" cols="60">
Silikan Isi Data upaya penagihan di sni
</textarea>
                            </td>
                            <td>
<textarea name="collectioncabang" title="click untuk melakukan input data" style="border: 0px;background-color: transparent;" cols="60">
Silikan Isi Data upaya penagihan di sni
</textarea>
                               <!--  <select name="collectioncabang">
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
                            <td>Surat Permohonan dari Debitur</td>
                            <td><input type="checkbox" name="chb1ada" class="chb1" value="Ada"><br></td>
                            <td><input type="checkbox" name="chb1tidak" class="chb1" value="tidak"></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Laporan Penilaian Jaminan yang lama dan baru khusus untuk debitur dengan hapus tagih pokok</td>
                            <td><input type="checkbox" name="chb2ada" class="chb2" value="ada"><br></td>
                            <td><input type="checkbox" name="chb2tidak" class="chb2" value="tidak"></td>
                            
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Lainya</td>
                            <td><input type="checkbox" name="chb3ada" class="chb3" value="ada"><br></td>
                            <td><input type="checkbox" name="chb3tidak" class="chb3" value="tidak"></td>
                            
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Lainya</td>
                            <td><input type="checkbox" name="chb4ada" class="chb4" value="ada"><br></td>
                            <td><input type="checkbox" name="chb4tidak" class="chb4" value="tidak"></td>
                            
                        </tr>
                        </tbody>
                        </table>
                 </div>
                <div class="col-sm-11">
                        <label for="inputState">Permasalahan Debitur</label>
                          <div class="col-lg-10 col-md-9"style="width: 96%; ">
                        <div style=" height: 50%;" id="" class="smnote1">WYSIWYG made easy ...</div>
                        </div>
                        <textarea style="display: none;" name="summernote6" class="summernote6" id="sm3" cols="5" rows="3"></textarea>
                  </div>
                    <div class="col-sm-11">
                        <label for="inputState">Kondisi Penyelesaian</label>
                        <div class="col-lg-10 col-md-9"style="width: 96%; ">
                        <div style=" height: 50%;" id="" class="smnote2">WYSIWYG made easy ...</div>
                        </div>
                        <textarea style="display: none;" name="summernote7" class="summernote7" id="sm3" cols="5" rows="3"></textarea>
                  </div>
                  <div class="col-sm-11">
                        <label for="inputState">Catatan</label>
                        <div class="col-lg-10 col-md-9"style="width: 96%; ">
                        <div style=" height: 50%;" id="" class="smnote3">WYSIWYG made easy ...</div>
                        </div>
                        <textarea style="display: none;" name="summernote8" class="summernote8" id="sm3" cols="5" rows="3"></textarea>
                  </div>
                   
                <div class="form-group">
                    <div class="col-sm-11">
                        <label for="inputState">Dasar Pertimbangan</label>
                        <div class="col-lg-10 col-md-9"style="width: 96%; ">
                        <div style=" height: 50%;" id="" class="smnote4">WYSIWYG made easy ...</div>
                        </div>
                        <textarea style="display: none;" name="summernote9" class="summernote9" id="sm3" cols="5" rows="3"></textarea>
                  </div>
                  <br>
                  <br>

               <div class="col-sm-11">
                        <label for="inputState">Rekomendasi penyelesaian Kredit</label>
                       <div class="col-lg-10 col-md-9"style="width: 96%; ">
                        <div style=" height: 50%;" id="" class="smnote5">WYSIWYG made easy ...</div>
                        </div>
                        <textarea style="display: none;" name="summernote11" class="summernote11" id="sm3" cols="5" rows="3"></textarea>
                </div>
                </div>
                </div>
                
                
            </div>
<button type="submit" class="btn btn-primary px-4 float-right" id="btn-submit" style="display: none">Save</button>
<button type="button" class="btn btn-primary px-4 float-right" onclick="test()">Save</button>
<a href="<?php echo base_url ('content/read_mrpk_ayda_perpanjangan')?>" button type="submit" class="btn btn-primary px-4 float-right">cancel</button></a>
               <<!-- input type="button"  value="Print 1st Div" onclick="javascript:printDiv('printablediv')" /> -->
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
 <script type="text/javascript">
    $(document).ready(function() {
  //var dasarpertimbangan = $('.summernote1').summernote();      
  //$('.summernote2').summernote();
  $('.smnote1').summernote();
  $('.smnote2').summernote();
  $('.smnote3').summernote();
  $('.smnote4').summernote();
  $('.smnote5').summernote();
});
    function test(){
        //var test = $('.summernote3').summernote('code');
        //alert(test.editable());
        //alert($('#sm3').summernote('code'));
        var text = document.getElementsByClassName('note-editable');
        //alert(text[0].innerText+" - "+text[1].innerText);
        $('.summernote6').val(text[0].innerHTML);
        $('.summernote7').val(text[1].innerHTML);
        $('.summernote8').val(text[2].innerHTML);
        $('.summernote9').val(text[3].innerHTML);
        $('.summernote11').val(text[4].innerHTML);


        $('#btn-submit').click();
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
</body


