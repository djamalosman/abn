<?php echo $this->session->flashdata('message'); ?>
<style type="text/css">
  #myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
  padding: 20px;
}

#myImg:hover {opacity: 0.7;}
</style>
<div class="row">
    <div class="col-lg-8 col-md-4 col-sm-12">
        <!-- col-lg-4 start here -->
        <div class="panel panel-default plain">
            <!-- Start .panel -->
            <div class="panel-heading">
                <h4 class="panel-title bb">Detail Data AYDA</h4>
            </div>
            <div class="panel-body">
                <div class="row profile">
                    <!-- Start .row -->
                  <div class="col-md-12">
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="CIF">Nama Nasabah</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" readonly="" class="form-control"  value="<?php echo $detailayda->f_custname ?>"  placeholder="CIF">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="CIF">CIF</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="cif" class="form-control" name="cif" value=" <?php  
                                    $a= $detailayda->f_cif;
                                    $b=substr($a,0,-2);
                                    echo $b;
                                    ?>" readonly="" placeholder="CIF">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="plafondawal">Plafond Awal</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="plafondawal" class="form-control" name="plafondawal" value="<?php echo $detailayda->f_plafondawal ?>" readonly="" placeholder="plafondawal">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="MV">MV</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="mv" class="form-control" value="<?php echo $detailayda->f_mv_a ?>" readonly="" name="mv" placeholder="MV">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="LTCR">LTCR</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="ltcr" class="form-control" value="<?php echo $detailayda->f_ltcr ?>" readonly="" name="ltcr" placeholder="ltcr">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="">Dibukukan AYDA TGL</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="tgl_ttp" value="<?php echo $detailayda->f_tglayda ?>" readonly="" class="form-control" name="" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="Tahun AYDA">Tahun AYDA</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="bertemu" readonly="" value="<?php echo $detailayda->f_thnayda ?>" class="form-control" name="Tahun AYDA" placeholder="Tahun AYDA">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="">MOB AYDA</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="lok_bertemu" readonly="" value="<?php echo $detailayda->f_mobayda ?>" class="form-control" name="" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="Range MOB">Range MOB</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="RangeMOB" class="form-control" name="RangeMOB" value="<?php echo $detailayda->f_rangemob ?>" readonly="" placeholder="Keterangan Lokasi">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="Cabang">Cabang</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="Cabang" class="form-control" name="Cabang" value="<?php echo $detailayda->f_branch ?>" readonly="" placeholder="Cabang">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="Tgl LPJ Awal AYDA">Tgl LPJ Awal AYDA</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="keterangan_karakter" class="form-control" name="keterangan_karakter" value="<?php echo $detailayda->f_tgllpjawalayda ?>" readonly="" placeholder="Tgl LPJ Awal AYDA">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="MV">MV2</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="MV" class="form-control" name="MV" readonly="" value="<?php echo $detailayda->f_mv_b ?>" placeholder="MV">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="LV">LV</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="LV" class="form-control" name="LV" value="<?php echo $detailayda->f_lv ?> " readonly="" placeholder="LV">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="Resume Nasabah">Tgl LPJ AYDA 1≥ Th</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="resum_nasabah" class="form-control" name="resum_nasabah" value="<?php echo $detailayda->tlgllpjlbh_satuthn ?>" readonly="" placeholder="Resume Nasabah">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="Total Tunggakan">MV2</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="MV2" class="form-control" value="<?php echo $detailayda->f_mvtwo ?> " readonly="" name="MV2" placeholder="MV2">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="LV2">LV2</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="Lv2" class="form-control" name="Lv2" readonly="" value="<?php echo $detailayda->f_lvtwo ?>" placeholder="LV2">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="Tgl LPJ AYDA 2≥ Th">Tgl LPJ AYDA 2≥ Th</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="Tgl LPJ AYDA 2≥ Th" class="form-control" name="Tgl LPJ AYDA 2≥ Th" value="<?php echo $detailayda->tlgllpjlbh_duathn ?>" readonly="" placeholder="Tgl LPJ AYDA 2≥ Th">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="MV3">MV3</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="MV3" class="form-control" name="MV3" readonly="" value="<?php echo $detailayda->f_mvthree ?>" placeholder="MV3">
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="LV3">LV3</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="LV3" class="form-control" name="LV3" readonly="" value="<?php echo $detailayda->f_lvthree ?> " placeholder="LV3">
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="Jenis Asset">Jenis Asset</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="JenisAsset" class="form-control" name="JenisAsset" readonly="" value="<?php echo $detailayda->f_jenisasset ?>" placeholder="LV3">
                                </div>
                            </div>
                        </div>
                    </div> 
                     <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="alamat_jaminan">Alamat Jaminan</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="alamat_jaminan" class="form-control" name="alamat_jaminan" readonly="" value="<?php echo $detailayda->alamat_jaminan ?> " placeholder="alamat_jaminan">
                                </div>
                            </div>
                        </div>
                    </div> 
                     <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="LT/LB">LT/LB</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="LT/LB" class="form-control" name="LT/LB" readonly="" value="<?php echo $detailayda->lt_lb ?>" placeholder="LT/LB">
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="OS Awal">OS Awal</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="OSAwal" class="form-control" name="OSAwal" readonly="" value="<?php echo $detailayda->os_awal ?>" placeholder="OSAwal">
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="Hps Tagih">Hapus Tagih Awal AYDA</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="HpsTagih" class="form-control" name="HpsTagih" readonly="" value="<?php echo $detailayda->hpustgih_ayda ?>" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="Nilai Awal AYDA">Nilai Awal AYDA</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="NilaiAwalAYDA" class="form-control" name="NilaiAwalAYDA" readonly="" value="<?php echo $detailayda->nilai_awal_ayda ?>" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="Penjualan AYDA">Penjualan AYDA</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="PenjualanAYDA" class="form-control" name="PenjualanAYDA" readonly="" value="<?php echo $detailayda->penjualan_ayda ?>" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="Biaya">Biaya</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="Biaya" class="form-control" name="Biaya" readonly="" value="<?php echo $detailayda->biaya ?>" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="NettPenjualan">Nett Penjualan</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="NettPenjualan" class="form-control" name="NettPenjualan" readonly="" value="<?php echo $detailayda->neet_penjualan ?>" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div> 
                   
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="Tanggal Penjualan AYDA">Tanggal Penjualan AYDA</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="TanggalPenjualanAYDA" class="form-control" name="TanggalPenjualanAYDA" readonly="" value="<?php echo $detailayda->tglpenjualan_ayda ?>" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="CKPN">CKPN</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="CKPN" class="form-control" name="CKPN" readonly="" value=" <?php echo $detailayda->ckpn ?>" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
                </div>
                <!-- End .row -->
            </div>
        </div>
        <!-- End .panel -->
        <!-- <div class="panel panel-default plain">
            <div class="panel-heading">
                <h4 class="panel-title">Cabang </h4>
            </div>
            <div class="panel-body">

            </div>
        </div> -->
    </div>
    <!-- End .panel -->

    <!-- col-lg-4 end here -->
    <div class="col-lg-4 col-md-4 col-sm-12">
        <!-- col-lg-4 start here -->
 <div class="panel panel-default plain">
            <!-- Start .panel -->
            <div class="panel-heading">
                <h4 class="panel-title bb">File Image Data Visit</h4>
            </div>
            <div class="panel-body">
                <div class="row profile">
                    <!-- Start .row -->
                  <div class="col-md-12">
                   <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        </div>
                        <div class="col-lg-12 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                          
                                
                                   <table id="responsive"  class="table nowrap table-bordered" style="width:100%;border: 2px;">
                                    <thead>
                                    <tr> 
                                    <th>   
                                    <img  id="myImg" src="<?php echo base_url("uploads/".$detailayda->foto)?>" width="100%" height="40%"/>
                                    <br><label></label>
                                    </th>
                                    </tr>
                                    </thead>
                                </table>
                               
                            </div>
                        </div>
                    </div> 
                </div>
                </div>
                <!-- End .row -->
            </div>
        </div>
        <!-- End .tabs -->
    </div>
    <!-- col-lg-4 end here -->

</div>
<!-- col-lg-4 end here -->
</div>
<script src="<?php echo base_url('assets/jquery/jquery-2.2.3.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js') ?>"></script>
<script type="text/javascript">$(document).ready(function () {
        $('#example').DataTable({
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
//            "order": false,
            "columnDefs": [{
                    "targets": [0], //first column / numbering column
                    "orderable": false //set not orderable

                }],
            "order": [[ 1, "asc" ]]
        });
    });</script>