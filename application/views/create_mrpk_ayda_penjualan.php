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
    font-size: 12px;
}
td,tr,tbody,th,thead{
    border:1px solid black!important;
}
th,td{
    font-family: "Quattrocento Sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
    font-size: 11px;

}


#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 3px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #e3e3e3;
  color: black;
}
#customers td{
    background-color: white;
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
            <form action="<?php echo base_url('content/create_mrpkdammypenjualan/')
             . $createmrpkpenjualan->f_cif.'/'.$createmrpkpenjualan->f_nama ?>">
            <div id="printablediv">
                <div class="form-group row">

                    <div class="col-sm-11">
                        <label for="inputFirstname">Informasi Debitur</label>
                        <table id="printTable" class="table table-bordered table-striped table-hover dt-responsive non-responsive" style="width:95%;height: 10%;">
                        <tbody>

                        <tr>
                            <td>Name</td>
                            <td>:</td>
                            <td><?php echo $createmrpkpenjualan->f_nama ?></td>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td>
                                    <?php echo $createmrpkpenjualan->f_alamat ?>
                                    </td>

                            </tr>
                             <tr>
                                <td>Cif</td>
                                <td>:</td>
                                <td><?php echo $createmrpkpenjualan->f_cif ?></td>
                                
                            </tr>
                            <tr>
                                <td>Bidang Usaha</td>
                                <td>:</td>
                                <td><?php echo $createmrpkpenjualan->f_bidangusaha ?></td>

                            </tr>
                            <tr>
                                <td>Nama Group Usaha</td>
                                <td>:</td>
                                <td><?php echo $createmrpkpenjualan->f_namagroupusaha ?></td>
                            </tr>
                            <tr>
                                <td>Lokasi Usaha</td>
                                <td>:</td>
                                <td><?php echo $createmrpkpenjualan->f_lokasi ?></td>
                            </tr>

                            <tr>
                                <td>Debitur Sejak</td>
                                <td>:</td>
                                <td><?php echo $createmrpkpenjualan->f_startdate ?></td>
                            </tr>
                            <tr>
                                <td>Hari Tunggakan (DPD)</td>
                                <td>:</td>
                                <td><?php echo $createmrpkpenjualan->f_dudate ?></td>
                            </tr>
                            <tr>
                                <td>Kolektibilitas</td>
                                <td>:</td>
                                <td><?php echo $createmrpkpenjualan->f_kolektibilitas ?></td>
                            </tr>
                            <tr>
                                <td>Aging AYDA</td>
                                <td>:</td>
                                <td><?php echo $createmrpkpenjualan->f_agingayda ?></td>
                            </tr>
                             <tr>
                                <td>Tanggal AYDA</td>
                                <td>:</td>
                                <td><?php echo $createmrpkpenjualan->f_tanggalayda ?></td>
                            </tr>
                        </tr>
                        </tbody>
                        </table>
                    </div>
                    <div class="col-sm-10">
                        <label for="inputFirstname">Jenis Jaminan</label>
                        <table id="customers" style="width:100% ;" class="table table-bordered table-striped table-hover dt-responsive non-responsive">
                         
                             <tr>
                            <th>No</th>
                            <th>Tipe Jaminan</th>
                            <th>Deskripsi</th>
                            <th>MVl pj lama</th>
                            <th>LV lpj baru</th>
                            <th>Ket</th>
                            <th>MV lpj baru</th>
                            <th>LVl pj baru</th>
                            <th>Ket</th>
                            <th>Nilai Buku AYDA</th>
                            <th>Terjual Nilai</th>
                            <th>Terjual Nilai %</th>
                            <th>Cutloss Nilai</th>
                            <th>Cutloss Nilai %</th>
                            <th>Curent Ayda  Nilai MV</th>
                            <th>Nilai AYDA Setelah Cutloss</th>
                            <th>ket</th>
                             </tr>
                        <tbody>
                        <?php $nilailpjmlvlama = $createmrpkpenjualan->f_mv_lpjlama; ?>
                        <?php $nilailpjlvlpjlama = $createmrpkpenjualan->f_lv_lpjlama; ?>
                        <?php $nilailpjmvlpjbaru = $createmrpkpenjualan->f_mv_lpjbaru; ?>
                        <?php $nilailpjlvlpjbaru= $createmrpkpenjualan->f_lv_lpjbaru; ?>
                        <?php $nilaibuku_ayda= $createmrpkpenjualan->f_nilai_buku_ayda; ?> 
                        <?php $terjual_nilai= $createmrpkpenjualan->f_terjual_nilai; ?>
                         <?php $terjual_persen_nilai = $createmrpkpenjualan->f_terjual_persen_nilai; ?> 
                        <?php $cutloss_nilai = $createmrpkpenjualan->f_cutloss_nilai; ?>  <?php $cutloss_persen_nilai = $createmrpkpenjualan->f_cutloss_persen_nilai; ?>
                        <?php $current_nilaimv = $createmrpkpenjualan->f_current_nilaimv; ?>
                         <?php $current_nilai_stlhcutloss = $createmrpkpenjualan->f_current_nilai_stlhcutloss; ?>
                         <?php foreach ($create_mrpkpenjualan as $value) { ?>
                        <tr>
                      

        <?php $totalmvlama=$nilailpjmlvlama + $value->f_mv_lpjlama; ?>
        <?php $totallvlama=$nilailpjlvlpjlama + $value->f_lv_lpjlama; ?>
        <?php $totalmvbaru=$nilailpjmvlpjbaru + $value->f_mv_lpjbaru; ?>
        <?php $totallvbaru=$nilailpjlvlpjbaru + $value->f_lv_lpjbaru; ?>
        <?php $ttlnlbukuayda_penjualan=$nilaibuku_ayda + $value->f_nilai_buku_ayda; ?>
        <?php $ttlterjualnilai_penjualan=$terjual_nilai + $value->f_terjual_nilai; ?>
        <?php $ttlterjualnilai_presnpenjualan=$terjual_persen_nilai + $value->f_terjual_persen_nilai; ?>
        <?php $ttlnilaicutlos_penjualan=$cutloss_nilai + $value->f_cutloss_nilai; ?>
        <?php $ttlnilaicutlospresntase_penjualan=$cutloss_persen_nilai + $value->f_terjual_persen_nilai; ?>
        <?php $tltcurentmv_penjualan=$current_nilaimv + $value->f_current_nilaimv; ?>

         <?php $ttlcurentcutlos_penjualan=$current_nilai_stlhcutloss + $value->f_current_nilai_stlhcutloss; ?>



                            <td>1</td>
                            <td>
                            <?php echo $value->f_tipejaminan ?>    
                            </td>
                            <td><?php echo $value->f_deskripsi ?></td>
                             <td><?php echo $value->f_mv_lpjlama ?></td>
                             <td><?php echo $value->f_lv_lpjlama ?></td>
                            <td><?php echo $value->f_ket_b ;?></td>
                            <td><?php echo $value->f_mv_lpjbaru ?></td>
                            <td><?php echo $value->f_lv_lpjbaru ?></td>
                            <td><?php echo $value->f_ket_a ;?></td>
                            <td><?php echo $value->f_nilai_buku_ayda ;?></td> 
                            <td><?php echo $value->f_terjual_nilai;?></td>
                            <td><?php echo $value->f_terjual_persen_nilai ;?></td>
                            <td><?php echo $value->f_cutloss_nilai ;?></td>
                            <td><?php echo $value->f_cutloss_persen_nilai ;?></td>
                            <td><?php echo $value->f_current_nilaimv ;?></td>
                              <td><?php echo $value->f_current_nilai_stlhcutloss;?></td>
                            <td><?php echo $value->f_ket_c; ?></td>
                           
                          
                            
                        </tr>
                         <?php } ?>
                         <tr>

                            <th colspan="2" align="center">Total</th>
                            <td></td>
                            <td><?php echo $totalmvlama ?></td>
                            <td><?php echo $totallvlama ?></td>
                            <td></td>
                            <td><?php echo $totalmvbaru ?></td>
                            <td><?php echo $totallvbaru ?></td>
                            <td></td>
                            <td><?php echo $ttlnlbukuayda_penjualan ?></td>
                            <td><?php echo $ttlterjualnilai_penjualan ?></td>
                            <td><?php echo $ttlterjualnilai_presnpenjualan ?></td>
                            <td><?php echo $ttlnilaicutlos_penjualan ?></td>
                            <td><?php echo $ttlnilaicutlospresntase_penjualan ?></td>
                            <td><?php echo $tltcurentmv_penjualan ?></td>
                            <td><?php echo $ttlcurentcutlos_penjualan ?></td>
                            <td></td> 
                         </tr>
                        
                        </tbody>
                        </table>
                    
                    </div>
                    <div class="col-sm-11">
                        <label for="inputFirstname">Tujuan Pengajuan Penjualan AYDA</label>
                    <table  class="table table-bordered table-striped table-hover dt-responsive non-responsive" id="tab" style="width:95%;">
                         <thead>
                             <tr>
                            <th>No</th>
                            <th>Nilai Buku AYDA</th>
                            <th>Terjual Nilai</th>
                            <th>Terjual Nilai %</th>
                            <th>Nilai AYDA Setelah Penjualan</th>
                             <th>Kerugian penjualan Nilai</th>
                            <th>Kerugian Penjualan Nilai %</th>
                            <th>ket</th>
                           
    
                             </tr>
                         </thead>   
                        <tbody>
                             
                             <?php $_idx_loop = 0; $_data_length = count($create_mrpkpenjualan); ?>
                            <?php foreach ($create_mrpkpenjualan as $key) { ?>
                        <tr>
                                
                            <td>1</td>
                     


                              <td><?php echo $value->f_nilai_buku_ayda ;?></td> 
                             
                            <td><?php echo $value->f_terjual_nilai ;?></td>
                            <td><?php echo $value->f_terjual_persen_nilai ;?></td>
                             <td><?php echo $value->f_cutloss_nilai ?></td>
                            <td><?php echo $value->f_cutloss_persen_nilai ?></td>
                            <td><?php echo $value->f_current_nilaimv ?></td>
                            <td><?php echo $key->f_ket_c ;?></td>
                             
                        </tr>
                        <?php $_idx_loop++; ?>
                      <?php   } ?>
                      <tr>
                            <th colspan="2" align="center">Total</th>
                            <td></td>
                             
                            <td><?php echo $value->f_terjual_nilai ;?></td>
                            <td><?php echo $value->f_terjual_persen_nilai ;?></td>
                             <td><?php echo $value->f_cutloss_nilai ?></td>
                            <td><?php echo $value->f_cutloss_persen_nilai ?></td>
                            <td><?php echo $value->f_current_nilaimv ?></td>
                         
                           
                            
                            
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
                               <!--  <select name="ambilkondisipenyelesaian">
                                    <option value="">select</option>
                                    <option value="Asusransi">Asusransi</option>
                                    <option value ="pajak">Notaris</option>
                                    <option value="BDD Perbaikan Jaminan">BDD Perbaikan Jaminan</option>
                                    <option value="BDD Penitipan dan Keamanan Jaminan (2 bulan)">BDD Penitipan dan Keamanan Jaminan (2 bulan)</option>
                                </select> -->
                            </td>
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
                                <input id="basic-datepicker" value="" name="tglinput" type="text" class="form-control">
                             </div>
                            </div> 
                            </td>
                            <td>
                                    <textarea name="inputdesk" title="click untuk melakukan input data" style="border: 0px;background-color: transparent;" cols="60">
Silikan Isi Data upaya penagihan di sni
</textarea>
                             <!-- <select  name="inputdesk">
                                    <option>select Colection cabang</option>
                                    <option value="FU calon pembeli">FU calon pembeli </option>
                                    <option value="FU calon pembeli">FU calon pembeli </option>
                                    <option value="FU calon pembeli">FU calon pembeli</option>
                                </select> -->
                            </td>
                            <td>
<textarea name="inputpihak" title="click untuk melakukan input data" style="border: 0px;background-color: transparent;" cols="60">
Silikan Isi Data upaya penagihan di sni
</textarea>
                                <!-- <select  name="inputpihak">
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
                            <td>Surat Penawaran</td>
                            <td><input type="checkbox" name="chb1ada" class="chb1" value="Ada"><br></td>
                            <td><input type="checkbox" name="chb1tidak" class="chb1" value="tidak"></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Laporan Jaminan Terbaru</td>
                            <td><input type="checkbox" name="chb2ada" class="chb2" value="ada"><br></td>
                            <td><input type="checkbox" name="chb2tidak" class="chb2" value="tidak"></td>
                            
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>MRPK Pengajuan AYDA</td>
                            <td><input type="checkbox" name="chb3ada" class="chb3" value="ada"><br></td>
                            <td><input type="checkbox" name="chb3tidak" class="chb3" value="tidak"></td>
                            
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Foto Jaminan</td>
                            <td><input type="checkbox" name="chb4ada" class="chb4" value="ada"><br></td>
                            <td><input type="checkbox" name="chb4tidak" class="chb4" value="tidak"></td>
                            
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Lainnya</td>
                            <td><input type="checkbox" name="chb5ada" class="chb5" value="ada"><br></td>
                            <td><input type="checkbox" name="chb5tidak" class="chb5" value="tidak"></td>
                            
                        </tr>
                        </tbody>
                        </table>
                 </div>
                   
                <div class="form-group">
                    <div class="col-sm-11">
                        <label for="inputState">Dasar Pertimbangan</label>
                         <!-- <textarea   id="kondisipenyelesaian"  name="kondisipenyelesaian" class="md-textarea form-control"rows="5"style="color: black; height: 50%;width: 95%; ">
                         </textarea> -->
                        <div class="col-lg-10 col-md-9"style="width: 96%; ">
                        <div style=" height: 50%;" id="" class="summernote1">WYSIWYG made easy ...</div>
                        </div>
                        <textarea style="display: none;" name="summernote3" class="summernote3" id="sm3" cols="5" rows="3"></textarea>

                        
                  </div>
                  <br>
                  <br>

               <div class="col-sm-11">
                        <label for="inputState">Rekomendasi Penjualan AYDA</label>
                        <div class="col-lg-10 col-md-9"style=" height: 50%;width: 96%; ">
                        <div style=" height: 50%;" class="summernote2">WYSIWYG made easy ...</div>
                        </div>
                       <textarea style="display: none;" name="summernote4" class="summernote4" id="sm3" cols="5" rows="3"></textarea>
                </div>
                </div>
                </div>
                
            </div>
<button type="submit" class="btn btn-primary px-4 float-right" id="btn-submit" style="display: none">Save</button>
<button type="button" class="btn btn-primary px-4 float-right" onclick="test()">Save</button>
<a href="<?php echo base_url ('content/read_mrpk_ayda_penjualan')?>" button type="submit" class="btn btn-primary px-4 float-right">cancel</button></a>
              <!--  <input type="button"  value="Print 1st Div" onclick="javascript:printDiv('printablediv')" /> -->
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
  $('.summernote1').summernote();
  $('.summernote2').summernote();
});
    function test(){
        //var test = $('.summernote3').summernote('code');
        //alert(test.editable());
        //alert($('#sm3').summernote('code'));
        var text = document.getElementsByClassName('note-editable');
        //alert(text[0].innerText+" - "+text[1].innerText);
        $('.summernote3').val(text[0].innerHTML);
        $('.summernote4').val(text[1].innerHTML);

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
    <script src="<?php echo base_url('bst/Bootstrap/admin-html/js/pages/forms-advanced.js') ?>"></script>
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


