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
                <h4 class="panel-title bb">Detail Data Visit</h4>
            </div>
            <div class="panel-body">
                <div class="row profile">
                    <!-- Start .row -->
                  <div class="col-md-12">
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="Tujuan">Tujuan</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" readonly="" class="form-control"  value="<?php echo $debitur->f_tujuan ?>"  placeholder="Tujuan">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="Tujuan">Nama Nasabah</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="name_nasabah" class="form-control" name="name_nasabah" value="<?php echo $debitur->NamaDebitur ?>" readonly="" placeholder="Nama Nasabah">
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
                                    echo $debitur->NomorNasabah;
                                   
                                    ?>" readonly="" placeholder="CIF">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="Hasil Kunjungan">Hasil Kunjungan</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="hasil_kunjungan" class="form-control" value="<?php echo $debitur->f_hasilkunjungan ?>" readonly="" name="hasil_kunjungan" placeholder="Hasil Kunjungan">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="Keterangan Hasil Kunjungan">Keterangan Hasil Kunjungan</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="ket_hasil_kunjungan" class="form-control" value="<?php echo $debitur->f_keterangan_hasilkunjungan ?>" readonly="" name="ket_hasil_kunjungan" placeholder="Keterangan Hasil Kunjungan">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="Tanggal">Tanggal TTP</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="tgl_ttp" value="<?php echo $debitur->f_tanggal_ptp ?>" readonly="" class="form-control" name="tgl_ttp" placeholder="Tanggal TTP">
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="Bertemu">Bertemu</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="bertemu" readonly="" value="<?php echo $debitur->f_bertemu ?>" class="form-control" name="bertemu" placeholder="Bertemu">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="Lokasi Bertemu">Lokasi Bertemu</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="lok_bertemu" readonly="" value="<?php echo $debitur->f_lokasibertemu ?>" class="form-control" name="lok_bertemu" placeholder="Lokasi Bertemu">
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="Keterangan Lokasi">Keterangan Lokasi</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="keterangan_lokasi" class="form-control" name="keterangan_lokasi" value="<?php echo $debitur->f_keterangan_lokasi ?>" readonly="" placeholder="Keterangan Lokasi">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="karakter">Karakter</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="karakter" class="form-control" name="karakter" value="<?php echo $debitur->f_karakter ?>" readonly="" placeholder="karakter">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="Keterangan Karakter">Keterangan Karakter</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="keterangan_karakter" class="form-control" name="keterangan_karakter" value="<?php echo $debitur->f_keterangan_karakter ?>" readonly="" placeholder="Keterangan Karakter">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="Negatif Issue">Negatif Issue</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="negatif_issue" class="form-control" name="negatif_issue" readonly="" value="<?php echo $debitur->f_negatif_issue ?>" placeholder="Negatif Issue">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="Actionplan">Action Plan</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="actionplan" class="form-control" name="actionplan" value="<?php echo $debitur->f_actionplan ?>" readonly="" placeholder="Actionplan">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="Resume Nasabah">Reresume Nasabah</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="resum_nasabah" class="form-control" name="resum_nasabah" value="<?php echo $debitur->f_resumenasabah ?>" readonly="" placeholder="Resume Nasabah">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="Total Tunggakan">Total Tunggakan</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="total_tunggakan" class="form-control" value="<?php echo $debitur->f_total_tunggakan ?>" readonly="" name="total_tunggakan" placeholder="Total Tunggakan">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="Total Bayar">Total Bayar</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="total_bayar" class="form-control" name="total_bayar" readonly="" value="<?php echo $debitur->f_total_bayar ?>" placeholder="Total Bayar">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="Perkiraan">Perkiraan</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="perkiraan" class="form-control" name="perkiraan" value="<?php echo $debitur->f_perkiraan ?>" readonly="" placeholder="perkiraan">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="Tanggal Visit">Tanggal Visit</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="tgl_visit" class="form-control" name="tgl_visit" readonly="" value="<?php echo $debitur->f_tgl_visit ?>" placeholder="Tanggal Visit">
                                </div>
                            </div>
                        </div>
                    </div> 
                     <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="Tanggal Visit">Action Plan</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="tgl_visit" class="form-control" readonly="" value="<?php echo $debitur->f_actionplan ?>" placeholder="Tanggal Visit">
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="Tanggal Visit">Status Restru</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="tgl_visit" class="form-control" readonly="" value="<?php echo $debitur->f_desc ?>">
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
                       <?php if(!empty($foto)){ 
            foreach($foto as $file){ ?>
                                   <table id="responsive"  class="table nowrap table-bordered" style="width:100%;border: 2px;">
                                    <thead>
                                    <tr> 
                                    <th>
                                    <a href="<?php echo base_url('uploads/'.$file->file_content); ?>" download>   
                                    <img id="myImg" src="<?php echo base_url('uploads/'.$file->file_content); ?>" width="100%" height="10%"/>
                                    </a>
                                    <br><label></label>
                                    </th>
                                    </tr>
                                    </thead>
                                </table>
                                
        
        <?php }
         }
         else{ ?>
        <p>Image(s) not found.....</p>
        <?php } ?>


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