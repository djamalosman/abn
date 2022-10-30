<?php echo $this->session->flashdata('message'); ?>
<style type="text/css">
    #myImg {
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s;
        padding: 20px;
    }
    #image{
        box-sizing:border-box;
        border-style:solid;
        border-color:red;
        background-color:lightblue;
        float:left;
        width: 10px;
        -moz-column-break-before: always;
        -webkit-column-break-before: always;
        column-break-before: always;
    }
    #myImg:hover {opacity: 0.7;}
    .label{
        text-align: left; 
    }
   
</style>

<div class="row">
    <div class="col-lg-12 col-md-4 col-sm-12">
        <div  class="panel panel-danger toggle panelMove panelClose panelRefresh">
            <!-- Start .panel -->
            <div class="panel-heading" style="background-color: red;">
                <h4 class="panel-title"><i class="glyphicon glyphicon-list-alt"></i>Hasil AYDA</h4>
            </div>
            <div class="panel-body">
                <div class="row profile">

                    <div class="panel-body">
                        <div class="row clearfix">
                            <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <a style="background-color :orange;" href="<?php echo base_url('ayda/index'); ?>" class="btn btn-warning btn-sm mr5 mb10"><i class="fa  fa-arrow-left "></i>  Back</a>   
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">

                        </div>
                        <?php echo form_open("Ayda/delete_aydaudpate", "id='swa-confirm'") ?>
               <table id="example" class="table table-striped table-bordered data-server-side dataTable no-footer">
                 <thead>
                                <tr>
                                    <th class="text-center" style="min-width: 80px; "><button title="hapus" type="submit" style="margin-top: 10px;" class="btn btn-danger btn-xs mr5 mb10"><i class="fa fa-trash-o"></i></button>
                                    </th>
                     <th style=" min-width: 190px;">Nama debitur Lengkap</th>
                     <th style=" min-width: 120px;">Cif</th>
                     <th style=" min-width: 120px;">LTCR</th>
                     <th style=" min-width: 120px;">Plafond Awal</th>
                    
                     
                     <th style=" min-width: 150px;">Dibukukan AYDA TGL</th>
                     <th style=" min-width: 120px;">Tahun AYDA</th>
                     <th style=" min-width: 120px;">MOB AYDA</th>
                     <th style=" min-width: 120px;">Range MOB</th>
                     <th style=" min-width: 120px;">Cabang</th>
                     <th style=" min-width: 180px;">Tgl LPJ Awal AYDA</th>
                     <th style=" min-width: 120px;">MV</th>
                     <th style=" min-width: 120px;">LV</th>
                     <th style=" min-width: 180px;">Tgl LPJ AYDA 1≥ Th</th>
                     <th style=" min-width: 120px;">MV2</th>
                     <th style=" min-width: 120px;">LV2</th>
                     <th style=" min-width: 150px;">Tgl LPJ AYDA 2≥ Th</th>
                     <th style=" min-width: 120px;">MV3</th>
                     <th style=" min-width: 120px;">LV3</th>
                     <th style=" min-width: 120px;">Jenis Asset</th>
                     <th style=" min-width: 120px;">Alamat Jaminan</th>
                     <th style=" min-width: 120px;">LT/LB</th>
                     <th style=" min-width: 120px;">OS Awal</th>
                     <th style=" min-width: 180px;">Hapus Tagih Awal AYDA</th>
                     <th style=" min-width: 120px;">Nilai Awal AYDA</th>
                     <th style=" min-width: 120px;">Penjualan AYDA</th>
                     <th style=" min-width: 120px;">Biaya </th>
                     <th style=" min-width: 120px;">Nett Penjualan</th>
                    <th style=" min-width: 180px;">Tanggal Penjualan AYDA </th>
                     <th style=" min-width: 120px;">CKPN</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($table_ayda_a as $key) { ?>


                                    <tr>
                                        <td>
                                <center>

                                    <input type="checkbox" title="delete" value="<?php echo $key->code_in ?>" name="idnya[]"/>
                                    <a data-toggle="modal" data-target="#myModal2"
                    data-code_in= "<?php echo $key->code_in ?>"
                    data-f_ltcr= "<?php echo $key->f_ltcr ?>"
                    data-f_tglayda= "<?php echo $key->f_tglayda ?>"
                    data-f_thnayda= "<?php echo $key->f_thnayda ?>"
                    data-f_mobayda= "<?php echo $key->f_mobayda ?>"
                    data-f_rangemob= "<?php echo $key->f_rangemob ?>"
                    data-f_tgllpjawalayda= "<?php echo $key->f_tgllpjawalayda ?>"
                    data-f_mv_b= "<?php echo $key->f_mv_b ?> "
                    data-f_lv= "<?php echo $key->f_lv ?>"
                    data-f_mvtwo= "<?php echo $key->f_mvtwo ?>"
                    data-f_lvtwo= "<?php echo $key->f_lvtwo ?>"
                    data-tlgllpjlbh_satuthn= "<?php echo $key->tlgllpjlbh_satuthn ?>"
                    data-tlgllpjlbh_duathn= "<?php echo $key->tlgllpjlbh_duathn ?>"
                    data-f_mvthree= "<?php echo $key->f_mvthree ?>"
                     data-f_lvthree= "<?php echo $key->f_lvthree ?>"
                    data-f_jenisasset = "<?php echo $key->f_jenisasset ?>"
                    data-alamat_jaminan1 = "<?php echo $key->alamat_jaminan ?>"
                    data-lt_lb1 = "<?php echo $key->lt_lb ?>"
                    data-os_awal1 = "<?php echo $key->os_awal ?>"
                    data-hpustgih_ayda1 = "<?php echo $key->hpustgih_ayda ?> "
                    data-nilai_awal_ayda1 = "<?php echo $key->nilai_awal_ayda ?>"
                    data-penjualan_ayda1 = "<?php echo $key->penjualan_ayda ?>"
                    data-neet_penjualan1 = "<?php echo $key->neet_penjualan ?>"
                    data-tglpenjualan_ayda1 = "<?php echo $key->tglpenjualan_ayda ?>"
                    data-ckpn1 = "<?php echo $key->ckpn ?>"
                                       
                                        <i class="fa fa-pencil-square-o"></i>
                                    </a>
                                </center>
                                </td>
                                
                  <td><?php echo $key->f_custname ?>        </td>
                  <td><?php echo $key->f_cif ?>             </td>
                  <td><?php echo $key->f_ltcr ?>             </td>
                  <td><?php echo $key->f_plafondawal ?>     </td>
                  
                  
                  <td><?php echo $key->f_tglayda ?>         </td>
                  <td>    <?php echo $key->f_thnayda ?>      </td>
                  <td><?php echo $key->f_mobayda ?>         </td>
                  <td><?php echo $key->f_rangemob ?>        </td>
                  <td><?php echo $key->f_branch ?>          </td>
                  <td><?php echo $key->f_tgllpjawalayda ?>  </td>
                  <td><?php echo $key->f_mv_b ?>            </td>
                  <td><?php echo $key->f_lv ?>              </td>
                  <td><?php echo $key->tlgllpjlbh_satuthn ?></td>
                  <td><?php echo $key->f_mvtwo ?>           </td>
                  <td><?php echo $key->f_lvtwo ?>           </td>
                  <td><?php echo $key->tlgllpjlbh_duathn ?> </td>
                  <td><?php echo $key->f_mvthree ?>         </td>
                  <td><?php echo $key->f_lvthree ?>         </td>
                  <td><?php echo $key->f_jenisasset ?>      </td>
                  <td><?php echo $key->alamat_jaminan ?>    </td>
                  <td><?php echo $key->lt_lb ?>             </td>
                  <td><?php echo $key->os_awal ?>           </td>
                  <td><?php echo $key->hpustgih_ayda ?>     </td>
                  <td><?php echo $key->nilai_awal_ayda ?>   </td>
                  <td><?php echo $key->penjualan_ayda ?>    </td>
                  <td><?php echo $key->biaya ?>             </td>
                  <td><?php echo $key->neet_penjualan ?>    </td>
                  <td><?php echo $key->tglpenjualan_ayda ?> </td>
                  <td><?php echo $key->ckpn ?>              </td>

            </tr>
            <?php } ?>
            </tbody>
    </table>
    <?php echo form_close() ?>

                    </div>
                    <!-- Start .row -->
                </div>
                <!-- End .row -->

                <div class="col-lg-8 col-md-10 col-sm-10 col-xs-10">
                    <div class="form-group">

                    </div>
                </div>
            </div>


        </div>

       </div>

      </div>

     <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-hidden="true">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal">
                         <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel2">Edit Data Ayda</h4>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('ayda/updatemodal_ayda'); ?>" method="post" > 
                    <div class="row clearfix">
                        <div class="col-lg-12" hidden="">
                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label"hidden="">
                                <label for="id">codein</label>
                            </div>
                            <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7"hidden="">
                                <div class="form-group">
                                    <div class="form-line"hidden="">
                                        <input type="text" name="codein" id="codein" class="form-control"  placeholder="f_id">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="No Nasabah">LTCR</label>
                            </div>
                            <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="LTCR1" id="LTCR1" class="form-control"  placeholder="LTCR">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="No Nasabah">Dibukukan Tgl AYDA</label>
                            </div>
                            <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="date" name="DibukukanTglAYDA" id="DibukukanTglAYDA" class="form-control"  placeholder="Dibukukan Tgl AYDA">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 

                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="Plafound Baru">Tahun AYDA</label>
                            </div>
                            <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="date" name="TahunAYDA" id="TahunAYDA" class="form-control" value="" placeholder="Tahun AYDA">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 

                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="Plafound Baru">MOB AYDA</label>
                            </div>
                            <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="MOBAYDA" id="MOBAYDA" class="form-control" value="" placeholder="MOB AYDA">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="row clearfix" >
                        <div class="col-lg-12">
                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="No Nasabah">Range MOB</label>
                            </div> 
                            <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="RangeMOB" id="RangeMOB" class="form-control" value="" placeholder="Range MOB">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix" >
                        <div class="col-lg-12">
                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="No Nasabah">Tgl LPJ Awal AYDA</label>
                            </div>
                            <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="date" name="TglLPJAwalAYDA" id="TglLPJAwalAYDA" class="form-control" value="" placeholder="Tgl LPJ Awal AYDA">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="No Nasabah">MV</label>
                            </div>
                            <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="MV" id="MV" class="form-control" value="" placeholder="MV" >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="No Nasabah">LV</label>
                            </div>
                            <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="LV" id="LV" class="form-control" value="" placeholder="LV">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="No Nasabah">MV2</label>
                            </div>
                            <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="MV2" id="MV2" class="form-control" value="" placeholder="MV2" >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="No Nasabah">LV2</label>
                            </div>
                            <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="LV2" id="LV2" class="form-control" value="" placeholder="LV2">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="No Nasabah">Tgl LPJ AYDA 1 > <thead>
                                
                                </thead></label>
                            </div>
                            <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="date" name="TglLPJAYDA1" id="TglLPJAYDA1" class="form-control" value="" placeholder="Tgl LPJ AYDA 1" >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-12" hidden="">
                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="No Nasabah">Tgl Eksekusi Restruktur (By system)</label>
                            </div>
                            <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7" hidden="">
                                <div class="form-group">
                                    <div class="form-line" hidden="">
                                        <input type="text" name="tgleksekusirestruktur" id="modaltgleksekusirestruktur" class="form-control" value="" placeholder="Tgl Eksekusi Restruktur (By system)">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="No Nasabah">Tgl LPJ AYDA 2≥ Th</label>
                            </div>
                            <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="date" name="TglLPJAYDA2Th" id="TglLPJAYDA2Th" class="form-control" value="" placeholder="Tgl LPJ AYDA 2≥ Th">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix" >
                        <div class="col-lg-12">
                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="No Nasabah">MV3</label>
                            </div>
                            <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="MV3" id="MV3" class="form-control" value="" placeholder="MV3">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="No Nasabah">LV3</label>
                            </div>
                            <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="LV3" id="LV3" class="form-control" value="" placeholder="LV3">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix" >
                        <div class="col-lg-12">
                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="No Nasabah">Jenis Asset</label>
                            </div>
                            <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="JenisAsset" id="JenisAsset" class="form-control"  placeholder="Jenis Asset">
                                    </div>
                                </div>
                            </div>
                        </div>     
                    </div>
                   
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="No Nasabah">Alamat Jaminan</label>
                            </div>
                            <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="AlamatJaminan" id="AlamatJaminan" class="form-control"  placeholder="Alamat Jaminan">
                                    </div>
                                </div>
                            </div>
                        </div>   
                    </div> 
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="No Nasabah">LT/LB</label>
                            </div>
                            <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="LT_LB" id="LT_LB" class="form-control"  placeholder="LT/LB">
                                    </div>
                                </div>
                            </div>
                        </div>   
                    </div> 
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="No Nasabah">OS Awal</label>
                            </div>
                            <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="OSAwal" id="OSAwal" class="form-control"  placeholder="OS Awal">
                                    </div>
                                </div>
                            </div>
                        </div>   
                    </div> 
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="No Nasabah">Hapus Tagih Awal AYDA</label>
                            </div>
                            <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="HapusTagihAwalAYDA" id="HapusTagihAwalAYDA" class="form-control"  placeholder="Hapus Tagih Awal AYDA">
                                    </div>
                                </div>
                            </div>
                        </div>   
                    </div> 
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="No Nasabah">Nilai Awal AYDA</label>
                            </div>
                            <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="NilaiAwalAYDA" id="NilaiAwalAYDA" class="form-control"  placeholder="Nilai Awal AYDA">
                                    </div>
                                </div>
                            </div>
                        </div>   
                    </div> 
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="No Nasabah">Penjualan AYDA</label>
                            </div>
                            <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="PenjualanAYDA" id="PenjualanAYDA" class="form-control"  placeholder="Penjualan AYDA">
                                    </div>
                                </div>
                            </div>
                        </div>   
                    </div> 
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="No Nasabah">Nett Penjualan</label>
                            </div>
                            <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="NettPenjualan" id="NettPenjualan" class="form-control"  placeholder="Nett Penjualan">
                                    </div>
                                </div>
                            </div>
                        </div>   
                    </div> 
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="No Nasabah">Tanggal Penjualan AYDA</label>
                            </div>
                            <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="date" name="TanggalPenjualanAYDA" id="TanggalPenjualanAYDA" class="form-control"  placeholder="Tanggal Penjualan AYDA">
                                    </div>
                                </div>
                            </div>
                        </div>   
                    </div> 
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="No Nasabah">CKPN</label>
                            </div>
                            <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="CKPN" id="CKPN" class="form-control"  placeholder="CKPN">
                                    </div>
                                </div>
                            </div>
                        </div>   
                    </div> 
                   
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>

            </div>

        </div>
      </div>
      </div>   
     <div class="row">

     <!-- col-lg-4 end here -->
      <div class="col-lg-6 col-md-4 col-sm-12">
        <!-- col-lg-4 start here -->
                <div class="panel panel-danger toggle panelMove panelClose panelRefresh">
            <!-- Start .panel -->
            <div class="panel-heading" style="background-color: red;">
                <h4 class="panel-title"><i class="fa fa-building"></i>Data Nasabah </h4>
            </div>
            <div class="panel-body">
                <div class="row profile">

                    <div class="panel-body">

                        <table  class="table table-striped table-bordered data-server-side dataTable no-footer">
                            <thead>
                                <tr>
                                    <th class="text-center" style="min-width: 80px; ">Aksi
                                    </th>
                                    <th style="min-width: 120px;"class="hidden">Code</th>
                                    <th style="min-width: 120px;">No Nasabah</th>
                                    <th style="min-width: 120px;">Nama Debitur</th>
                                    <th style="min-width: 80px;">Cabang</th>

                                </tr>
                            </thead>
                            
                            <tbody>
                                
                                
                            <?php foreach ($viewaydaimage as $viewimage){ ?>
                                    <tr>
                                        <td>
                                           <a href="<?php echo base_url("Ayda/viewimagesession_param/") .$viewimage->code_in ?>" button type="button" style="background-color: #0bacd3;" class="btn btn-primary">view file</button>
                                            </a>
                                        </td>
                                        <td class="hidden"><?php echo $viewimage->code_in ?></td>
                                        <td><?php echo $viewimage->f_cif ?></td>
                                        <td style="min-width: 150px;"><?php echo $viewimage->f_custname ?></td>
                                        <td><?php echo $viewimage->f_branch ?></td>

                                    </tr>
                                    <?php } ?>
                            </tbody>
                            
                        </table>

                    </div>
                    <!-- Start .row -->
                </div>



                <!-- End .row -->
            </div>

        </div>

      
        <!-- End .tabs -->
      </div>

     <!-- col-lg-4 end here -->
      <div class="col-lg-6 col-md-4 col-sm-12">
        <!-- col-lg-4 start here -->
        <div class="panel panel-success ">
            <!-- Start .panel -->
            <div class="panel-heading" style="background-color: green">
                <h4 class="panel-title"><i class="glyphicon glyphicon-headphones"></i>Detail Jaminan AYDA </h4>
            </div>
            <div class="panel-body">
               
                <div class="row profile">

                        <div class="panel-body">
                            <table class="table table-striped">
                                <thead >
                                    <tr>
                                        <th style="min-width: 80px;">ID</th>
                                        <th style="min-width: 80px;">Jenis Jaminan</th>
                                        <th style="min-width: 150px;">Alamat</th>
                                        <th style="min-width: 150px;">Market Value</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                        <!-- Start .row -->
                    </div>  

                <!-- End .row -->
            </div>
        </div>
    </div>
    <!-- End .panel -->
</div>
<!-- col-lg-4 end here -->
        <div class="row">
            <div class="col-lg-12" style="align-content:center;">
                <div class="panel panel-default toggle panelMove panelClose panelRefresh">
                    <div class="panel-heading" style="background-color: red;">
                        <h4 class="panel-title"><i class="glyphicon glyphicon-headphones"></i>Form Input Data AYDA</h4>
                    </div>
                    <div class="panel-body pt0 pb0">
                       
                        <form action="<?php echo base_url('ayda/insert_ayda_activity'); ?>" method="post" enctype="multipart/form-data"  class="form-horizontal group-border stripped">
                            <div class="form-group" style="padding-top: 5px; padding-bottom: 5px;" hidden="">
                                <div class="col-lg-6"hidden="">
                                    <label class="col-lg-3 control-label" for="debiturName">"Nama debitur"
                                    </label>
                                    <div class="col-lg-6">
                                       <input id="nama" name="nama" style=" height: 30px" 
                                                   placeholder="LTCR" type="text" value="<?php echo $rowayda->NamaDebitur ?>" class="form-control" >
                                    </div>
                                </div>
                                <div class="col-lg-6" hidden="">
                                    <label class="col-lg-3 control-label" for="Cif">Cif</label>
                                    <div class="col-lg-6">
                                        <input id="cif" name="cif" style=" height: 30px" 
                                                   placeholder="LTCR" type="number" value="<?php echo $rowayda->NomorNasabah ?>" class="form-control" >
                                    </div>
                                </div>

                            </div>
                            <div class="form-group" style="padding-top: 5px; padding-bottom: 5px;" hidden="">
                                <div class="col-lg-6" hidden="">
                                    <label class="col-lg-3 control-label" for="Plafond Awal">"Plafond Awal
"
                                    </label>
                                    <div class="col-lg-6">
                                        <input id="plafondAwal" name="plafondAwal" style=" height: 30px" 
                                                   placeholder="LTCR" type="number" value="<?php echo $rowayda->PlafondAmount ?>" class="form-control" >
                                    </div> </div>
                                <div class="col-lg-6" hidden="">
                                    <label class="col-lg-3 control-label" for="MV">
                                        MV
                                    </label>
                                    <div class="col-lg-6">
                                        <input id="mv" name="mv" style=" height: 30px"  type="number" class="form-control">
                                    </div>
                                </div>

                            </div>
                            <!--nama-->
                            <div class="form-group" style="padding-top: 5px; padding-bottom: 5px;">
                                 <div class="col-lg-6">
                                    
                                     <label class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label" for="LTCR">LTCR
                                    </label>
                                    <div class="col-lg-6">
                                          <?php
                                if (!empty($this->session->userdata('redirectvalueform'))) {
                                    $_redirect = $this->session->userdata('redirectvalueform');
                                    $this->session->set_userdata('redirectvalueform', null);
                                }
                                ?>
                                       <?php $ltcr = !empty($_redirect) ? $_redirect['ltcr'] : ''; ?>
                                            <input id="ltcr" name="ltcr" style=" height: 30px;align-self: left;" 
                                                   placeholder="LTCR" type="number" class="form-control"  value="<?php echo $ltcr ?>">
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <label class="col-lg-5 col-md-2 col-sm-4 col-xs-5 form-control-label" for="Dibukukan  tanggal AYDA">Dibukukan Tgl AYDA</label>
                                    <div class="col-lg-5">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            <?php $dibukukantglayda = !empty($_redirect) ? $_redirect['dibukukantglayda'] : ''; ?>
                                            <input id="date"  type="date" placeholder="yyy-mm-dd" style=" height: 30px"
                                                   placeholder="Dibukukan Tanggal AYDA" value="<?php echo $dibukukantglayda ?>" class="form-control" name="dibukukantglayda" >
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--company id-->
                            <div class="form-group" style="padding-top: 5px; padding-bottom: 5px;">
                                <div class="col-lg-6">
                                    <label class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label" for="Tahun AYDA">Tahun AYDA</label>
                                    <div class="col-lg-6">
                                        <?php $thnayda = !empty($_redirect) ? $_redirect['thnayda'] : ''; ?>
                                       <input type="number"  name="thnayda" placeholder="YYYY" 
                                      placeholder="Tahun AYDA" value="<?php echo $thnayda ?>" style=" height: 30px" class="form-control" min="1945" max="2100">
                                    </div>

                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label" for="MOB AYDA">MOB AYDA</label>
                                    <div class="col-lg-6">
                                         <?php $mobayda = !empty($_redirect) ? $_redirect['mobayda'] : ''; ?>
                                            <input style=" height: 30px;" type="number" class="form-control"
                                                   placeholder="MOB AYDA" value="<?php echo $mobayda ?>" id="mobayda"	name="mobayda" >
                                    </div>
                                </div>
                            </div>
                            <!--company id-->
                            <div class="form-group" style="padding-top: 5px; padding-bottom: 5px;">
                                <div class="col-lg-6">
                                    <label class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label" for="Range MOB">Range MOB</label>
                                    <div class="col-lg-6">
                                        <?php $rangemob = !empty($_redirect) ? $_redirect['rangemob'] : ''; ?>
                                            <input style=" height: 30px;" type="text" class="form-control" id="rangemob"
                                                   placeholder="Range MOB" value="<?php echo $rangemob ?>"   name="rangemob" >
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label" for="Dibukukan  tanggal AYDA">Tgl LPJ Awal AYDA</label>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                              <?php $tgllpjawalayda = !empty($_redirect) ? $_redirect['tgllpjawalayda'] : ''; ?>
                                             <input id="date"  class="form-control"style=" height: 30px;" 
                                             type="date" value="<?php echo $tgllpjawalayda ?>" placeholder="yyy-mm-dd" name="tgllpjawalayda">


                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6" hidden="">
                                    <label class="col-lg-3 control-label" for="Cabang">Cabang</label>
                                    <div class="col-lg-6">
                                        <input style=" height: 30px;" type="text" class="form-control" 
                                               value="<?php echo $rowayda->COMPANY_NAME ?>" 
                                               id="cabang"  name="cabang" >
                                    </div>
                                </div>
                            </div>
                            <!--company id-->
                            <div class="form-group" style="padding-top: 5px; padding-bottom: 5px;">
                                
                               <div class="col-lg-6">
                                    <label class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label" for="tgllpjawalayda">MV</label>
                                    <div class="col-lg-6">
                                          <?php $mv2 = !empty($_redirect) ? $_redirect['mv2'] : ''; ?>
                                        <input style=" height: 30px;" class="form-control" placeholder="MV"
                                       value="<?php echo $mv2 ?>"   type="number" class="form-control"id="mv2" name="mv2" >
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label" for="tgllpjawalayda">LV</label>
                                    <div class="col-lg-6">
                                     <?php $lv2 = !empty($_redirect) ? $_redirect['lv2'] : ''; ?>
                                            <input style=" height: 30px;" class="form-control" type="number"
                                                   placeholder="LV"  value="<?php echo $lv2  ?>"  class="form-control" id="lv2" name="lv2" > 
                                    </div>
                                </div>
                            </div>
                            <!--company id-->
                            <div class="form-group" style="padding-top: 5px; padding-bottom: 5px;">
  
                               
                                <div class="col-lg-6">
                                    <label class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label" for="MV3">MV2</label>
                                    <div class="col-lg-6">
                                        <?php $mv3 = !empty($_redirect) ? $_redirect['mv3'] : ''; ?>
                                            <input style=" height: 30px;" class="form-control" type="number"
                                                   placeholder="MV2"  value="<?php echo $mv3 ?>"    class="form-control" id="mv3" name="mv3" >
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label" for="LV2">LV2</label>
                                    <div class="col-lg-6">
                                        <input style=" height: 30px;" type="number"  class="form-control" id="lv3" name="lv3" >
                                    </div>
                                </div>
                            </div>
                            <!--company id-->
                            <div class="form-group" style="padding-top: 5px; padding-bottom: 5px;">
                                <div class="col-lg-6">
                                    <label class="col-lg-4  form-control-label" for="Dibukukan  tanggal AYDA">Tgl LPJ AYDA 1≥ Th</label>
                                    <div class="col-lg-4">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            <input id="date"  style=" height: 30px;"class="form-control" type="date" value="yyy-mm-dd" name="tgllpjaydalbhsetahun">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label" for="Tgl LPJ ayda">Tgl LPJ AYDA 2≥ Th</label>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                             <?php $tgllpjaydalbhduatahun = !empty($_redirect) ? $_redirect['tgllpjaydalbhduatahun'] : ''; ?>
                                            <input id="date" style=" height: 30px;" class="form-control"  type="date" 
                                                   value="<?php echo $tgllpjaydalbhduatahun ?>"    placeholder="yyy-mm-dd" name="tgllpjaydalbhduatahun">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--company id-->
                            <div class="form-group" style="padding-top: 5px; padding-bottom: 5px;">
                               
                                <div class="col-lg-6">
                                    <label class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label" for="MV3">MV3</label>
                                    <div class="col-lg-6">
                                        <?php $mv4 = !empty($_redirect) ? $_redirect['mv4'] : ''; ?>
                                             <input style="  height: 30px;" type="number" class="form-control"
                                                    placeholder="MV3" value="<?php echo $mv4 ?>" id="mv4" name="mv4" >
                                    </div>
                                </div>
                                 <div class="col-lg-6">
                                    <label class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label" for="LV3">LV3</label>
                                    <div class="col-lg-6">
                                        <?php $lv4 = !empty($_redirect) ? $_redirect['lv4'] : ''; ?>
                                            <input style=" height: 30px;" type="number"
                                                   placeholder="LV3" value="<?php echo $lv4 ?>" class="form-control" id="lv4"  name="lv4" >
                                    </div>
                                </div>
                            </div>
                            <!--company id-->
                            <div class="form-group" style="padding-top: 5px; padding-bottom: 5px;">
 
                            <div class="col-lg-6">
                                    <label class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label" for="tgllpjawalayda">Jenis Asset</label>
                                    <div class="col-lg-6">
                                        <?php $jenisasset = !empty($_redirect) ? $_redirect['jenisasset'] : ''; ?>
                                             <input style=" height: 30px;" type="text" class="form-control" 
                                                    placeholder="Jenis Asset" value="<?php echo $jenisasset ?>"  id="jenisasset" name="jenisasset" >
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label" for="landscape">Alamat Jaminan </label>
                                    <div class="col-lg-6">
                                       <?php $alamatjaminan = !empty($_redirect) ? $_redirect['alamatjaminan'] : ''; ?>
                                             <input style=" height: 30px" type="text" class="form-control"  
                                                    placeholder="Alamat Jaminan" value="<?php echo $alamatjaminan ?>"   id="alamatjaminan" name="alamatjaminan">
                                    </div>
                                </div>
                            </div>
                            <!--company id-->


                            <div class="form-group" style="padding-top: 5px; padding-bottom: 5px;">
                                
                              <div class="col-lg-6">
                                <label class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label" for="landscape">LT/LB </label>
                                    <div class="col-lg-6">
                                         <?php $ltlb = !empty($_redirect) ? $_redirect['ltlb'] : ''; ?>
                                             <input style=" height: 30px" type="text" class="form-control"
                                                    placeholder="LT/LB" value="<?php echo $ltlb ?>" id="ltlb" name="ltlb">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                <label class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label" for="landscape">OS Awal</label>
                                    <div class="col-lg-6">
                                       <?php $osawal = !empty($_redirect) ? $_redirect['osawal'] : ''; ?>
                                             <input style=" height: 30px" type="number"
                                                    placeholder="OS Awal" value="<?php echo $osawal ?>" class="form-control" id="osawal" name="osawal">
                                    </div>
                                </div>
                            </div>
                            <!--company id-->


                            <div class="form-group" style="padding-top: 5px; padding-bottom: 5px;">
                              
                                <div class="col-lg-6">
                                <label class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label" for="landscape">Hapus Tagih Awal AYDA</label>
                                    <div class="col-lg-6">
                                        <?php $hpstgihawalayda = !empty($_redirect) ? $_redirect['hpstgihawalayda'] : ''; ?>
                                             <input style=" height: 30px" type="number" class="form-control" 
                                                    placeholder="Hapus Tagih Awal AYDA"  value="<?php echo $hpstgihawalayda ?>"  
                                                     id="hpstgihawalayda" name="hpstgihawalayda">
                                    </div>
                                </div>
                                 <div class="col-lg-6">
                                <label class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label" for="nilaiawalayda">Nilai Awal AYDA</label>
                                    <div class="col-lg-6">
                                         <?php $nilaiawalayda = !empty($_redirect) ? $_redirect['nilaiawalayda'] : ''; ?>
                                             <input style=" height: 30px" type="number" class="form-control" 
                                                    placeholder="Nilai Awal AYDA"  value="<?php echo $nilaiawalayda ?>"    id="nilaiawalayda" name="nilaiawalayda">
                                    </div>
                                </div>
                            </div>
                            <!--company id-->
                            <!--company id-->


                            <div class="form-group" style="padding-top: 20px; padding-bottom: 5px;">
                              <div class="col-lg-6">
                                    <label class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label" for="termintate">Penjualan AYDA</label>
                                    <div class="col-lg-6">
                                        <?php $penjualanayda = !empty($_redirect) ? $_redirect['penjualanayda'] : ''; ?>
                                             <input style=" height: 30px" type="number" class="form-control"
                                                    placeholder="Penjualan AYDA" value="<?php echo $penjualanayda ?>"  id="penjualanayda" name="penjualanayda">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label" for="termintate">Nett Penjualan</label>
                                    <div class="col-lg-6">
                                       <?php $nettpenjualan = !empty($_redirect) ? $_redirect['nettpenjualan'] : ''; ?>
                                             <input style=" height: 30px" type="number" class="form-control"
                                                    placeholder="Nett Penjualan"  value=" <?php echo $nettpenjualan  ?>"  id="nettpenjualan" name="nettpenjualan">
                                    </div>
                                </div>
                            </div>
                             <div class="form-group" style="padding-top: 20px; padding-bottom: 5px;">
                                <div class="col-lg-6">
                                    <label class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label" for="Dibukukan  tanggal AYDA">Tanggal Penjualan AYDA</label>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            <?php $tgllpenjualanayda = !empty($_redirect) ? $_redirect['tgllpenjualanayda'] : ''; ?>
                                             <input id="date" style=" height: 30px" class="form-control"  type="date" 
                                                    value="<?php echo $tgllpenjualanayda ?>" placeholder="yyy-mm-dd"name="tgllpenjualanayda">
                                             
                                        </div>
                                    </div>
                                </div>
                                 <div class="col-lg-6">
                                    <label class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label" for="termintate">CKPN</label>
                                    <div class="col-lg-6">
                                        <?php $nettpenjualan = !empty($_redirect) ? $_redirect['nettpenjualan'] : ''; ?>
                                             <input style=" height: 30px" type="number" class="form-control"
                                                    placeholder="CKPN" value="<?php echo $nettpenjualan ?>"    id="ckpn" name="ckpn">
                                    </div>
                                </div>

                            </div>
                            
                            <div class="form-group" style="padding-top: 20px; padding-bottom: 5px;">
                                <div class="col-lg-6">
                                    <label class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label" for="Dibukukan  tanggal AYDA">Keterangan dokumen</label>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                             <?php $keterangan = !empty($_redirect) ? $_redirect['keterangan'] : ''; ?>
                                                <input type="text" name="keterangan" id="keterangan" class="form-control" 
                                                       value="<?php echo $keterangan ?>" placeholder="Keterangan dokumen" >
                                             
                                        </div>
                                    </div>
                                </div>
                                 <div class="col-lg-6">
                                    <label class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label" for="termintate">Input dokumen</label>
                                    <div class="col-lg-6">
                                        <input type="file" multiple="multiple"  id="myfile" class="form-control" name="myfile[]">
                                    </div>
                                </div>

                            </div>
                                <div class="row clearfix">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                </div>
                                <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <button type="submit" style="background-color:  green" class="btn btn-success btn-sm mr5 mb10"><i class="fa fa-save"></i>  simpan</button>   
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                            <!--company id-->
                        </form>
                        <?php // echo form_open('content/create_um_datakaryawan_process', 'id="swaz-confirm" class="form-horizontal group-border stripped"'); ?>
                        <!--<form class="form-horizontal group-border stripped" id="swaz-confirm" action="">-->
                        <!--nik-->


                    </div>
                </div>
            </div>
        </div>

<div class="modal fade" id="lightbox1" tabindex="-1" role="dialog" aria-hidden="true">modal
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                <img id="image1" alt="image alt" class="img-responsive" > 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<script src=""></script>

<script src="<?php echo base_url('assets/jquery/jquery-2.2.3.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js') ?>"></script>

<!-- Other plugins ( load only nessesary plugins for every page) -->

<script type="text/javascript">
    $(document).ready(function () {
        $('#example').DataTable({
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
//            "order": false,
            "columnDefs": [{
                    "targets": [1, 2, 3, 4, 5, 6, 7, 8, 9], //first column / numbering column
                    "orderable": false //set not orderable

                }],
            columnDefs: [
                {targets: 0, sortable: false},
            ],
            order: [[1, "asc"]]
        });

        $('#lightbox1').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal = $(this);

            //alert(div.data('sp'));

            // Isi nilai pada field
            modal.find('#image1').attr("src", div.data('img'));

        });

        $('#myModal2').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal = $(this);
           
            //modal.find('#idlelang').val(div.data('idlelang'));
            modal.find('#codein').val(div.data('code_in'));
            modal.find('#LTCR1').val(div.data('f_ltcr'));
            modal.find('#DibukukanTglAYDA').val(div.data('f_tglayda'));
            modal.find('#TahunAYDA').val(div.data('f_thnayda'));
           
            modal.find('#MOBAYDA').val(div.data('f_mobayda'));
            modal.find('#RangeMOB').val(div.data('f_rangemob'));
            modal.find('#TglLPJAwalAYDA').val(div.data('f_tgllpjawalayda'));
            modal.find('#MV').val(div.data('f_mv_b'));
            modal.find('#LV').val(div.data('f_lv'));
            modal.find('#MV2').val(div.data('f_mvtwo'));
            modal.find('#LV2').val(div.data('f_lvtwo'));
            modal.find('#TglLPJAYDA1').val(div.data('tlgllpjlbh_satuthn'));
            modal.find('#TglLPJAYDA2Th').val(div.data('tlgllpjlbh_duathn'));
            modal.find('#MV3').val(div.data('f_mvthree'));
            modal.find('#LV3').val(div.data('f_lvthree'));
            modal.find('#JenisAsset').val(div.data('f_jenisasset'));
            modal.find('#AlamatJaminan').val(div.data('alamat_jaminan1'));
            modal.find('#LT_LB').val(div.data('lt_lb1'));
            modal.find('#OSAwal').val(div.data('os_awal1'));
			
			 modal.find('#HapusTagihAwalAYDA').val(div.data('hpustgih_ayda1'));
            modal.find('#NilaiAwalAYDA').val(div.data('nilai_awal_ayda1'));
            modal.find('#PenjualanAYDA').val(div.data('penjualan_ayda1'));
            modal.find('#NettPenjualan').val(div.data('neet_penjualan1'));
			
			modal.find('#TanggalPenjualanAYDA').val(div.data('tglpenjualan_ayda1'));
            modal.find('#CKPN').val(div.data('ckpn1'));
			
			//  modal.find('#HapusTagihAwalAYDA').val(div.data('HapusTagihAwalAYDA'));
            // modal.find('#NilaiAwalAYDA').val(div.data('NilaiAwalAYDA'));
            // modal.find('#PenjualanAYDA').val(div.data('PenjualanAYDA'));
            // modal.find('#NettPenjualan').val(div.data('NettPenjualan'));
			
			// modal.find('#TanggalPenjualanAYDA').val(div.data('TanggalPenjualanAYDA'));
            // modal.find('#CKPN').val(div.data('CKPN'));
            //$('#jenissp1').trigger('change');//.change();//trigger('update.fs');//.selectpicker("refresh");
        });




    });


</script>