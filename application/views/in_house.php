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
    <div class="col-lg-12 col-md-4 col-sm-12">
        <div  class="panel panel-danger toggle panelMove panelClose panelRefresh">
            <!-- Start .panel -->
            <div class="panel-heading" style="background-color: red;">
                <h4 class="panel-title"><i class="glyphicon glyphicon-list-alt"></i>Hasil Call In House</h4>
            </div>
            <div class="panel-body">
                <div class="row profile">

                    <div class="panel-body">
                        <div class="row clearfix">
                            <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <a style="background-color :orange;" href="<?php echo base_url('inhouse/index'); ?>" class="btn btn-warning btn-sm mr5 mb10"><i class="fa  fa-arrow-left "></i>  Back</a>   
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">

                        </div>
                        <table id="example" class="table table-striped table-bordered data-server-side dataTable no-footer">
                            <thead 
                                <tr>
                                    <th style="min-width: 80px;">Tanggal</th>
                                    <th style="min-width: 80px;">Tujuan Call</th>
                                    <th style="min-width: 80px;">Hasil Call</th>
                                    <th style="min-width: 150px;">Keterangan Hasil Call</th>
                                    <th style="min-width: 150px;">Berbicara Dengan</th>
                                    <th style="min-width: 150px;">Karakter</th>
                                    <th style="min-width: 150px;">Keterangan Karakter</th>
                                    <th style="min-width: 150px;">Negatif Issue</th>
                                    <th style="min-width: 150px;">Action Plan</th>
                                    <th style="min-width: 150px;">Reresume Nasabah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($hasil_inhouse AS $item) { ?>
                                    <tr>
                                        <td><center><?php echo $item->f_tanggal_activity ?></center></td>
                                <td><center><?php echo $item->f_tujuan ?></center></td>
                                <td><center><?php echo $item->f_hasil ?></center></td>
                                <td><center><?php echo $item->f_keterangan_hasil ?></center></td>
                                <td><center><?php echo $item->f_berbicara_dengan ?></center></td>
                                <td><center><?php echo $item->f_karakter ?></center></td>
                                <td><center><?php echo $item->f_keterangan_karakter ?></center></td>
                                <td><center><?php echo $item->f_negatif_isue ?></center></td>
                                <td><center><?php echo $item->f_action_plan ?></center></td>
                                <td><center><?php echo $item->f_resume_nasabah ?></center></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- Start .row -->
                </div>
                <!-- End .row -->

                <div class="col-lg-8 col-md-10 col-sm-10 col-xs-10">
                    <div class="form-group">
                        <!--                            <div class="form-line">
                                                        <input type="text" readonly="" class="form-control"  value="<?php echo $debitur->NomorNasabah ?>"  placeholder="Tujuan">
                                                    </div>-->
                    </div>
                </div>
            </div>


        </div>

    </div>

</div>


<div class="row">
    <div class="col-lg-12 col-md-4 col-sm-12">
        <div  class="panel panel-danger toggle panelMove panelClose panelRefresh">
            <!-- Start .panel -->
            <div class="panel-heading" style="background-color: red;">
                <h4 class="panel-title"><i class="glyphicon glyphicon-list-alt"></i>Hasil Visit</h4>
            </div>
            <div class="panel-body">
                <div class="row profile">

                    <div class="panel-body">
                        
                       <table id="example1" class="table nowrap table-bordered" style="width:100%;border: 2px;">
                            <thead>
                                <tr >    
                                    <!--<th class="text-center"><button type="submit" class="btn btn-danger p-1"><i class="fa fa-trash-o"></i></button></th>-->
                                    <th >Aksi</th>
                                    <th>Tujuan</th>
                                    <th style="min-width: 135px;">Nama Nasabah</th>
                                    <th>Cif</th>
                                    <th style="min-width: 135px;">Hasil Kunjungan</th>
                                    <th style="min-width: 135px;">Action Plan</th>
                                    <th style="min-width: 135px;">Date Action Plan</th>
                                    <th style="min-width: 175px;">Keteranggan Hasil Kunjungan</th>
                                    <th style="min-width: 115px;">Tanggal Visit</th>
									<th style="min-width: 135px;">Nama Collector</th>

<!--<th>Aksi</th>-->
                                </tr>
                            </thead>




                            <tbody>
                                <?php foreach ($datavisit as $item) { ?> 

                                    <tr>            
                                           <!--<td class="text-center"><input type="checkbox" value="<?php echo $item->id ?>" name="idnya[]"/></td>-->
                                        <td class="text-center">
                                            <form id="<?php echo $item->f_code_image ?>" name="userdetails1" action="<?php echo base_url("generatepdf/collreport") ?>" method="post" target = "_blank">
                                                <input type="hidden" name="cif" id="cif" value="<?php echo $item->f_id ?>">    
                                                <input type="hidden" name="codeimage" id="codeimage" value="<?php echo $item->f_code_image ?>">    

                                            </form>  
                                            <a title="View Detail" href="<?php echo base_url("Datavisit/viewDetail/" . $item->f_id ."/".$item->f_code_image) ?>"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                           <!-- <a title="Call Report"  href="javascript: submitform('<?php echo $item->f_code_image ?>')" target = "_blank" ><i class="fa fa-print" aria-hidden="true"></i></a>-->

        <!--href="<?php // echo base_url("generatepdf/collreport/" . $item->f_cif)    ?>"-->
                                        </td>
                                        <td><?php echo $item->f_tujuan ?></td>
                                        <td><?php echo $item->f_nama_nasabah ?></td>
                                        <td><?php echo $item->f_cif ?></td>
                                        <td><?php echo $item->f_hasilkunjungan ?></td>
                                        <td><?php echo $item->f_actionplan ?></td>
                                        <td><?php echo $item->f_date_actionplan ?></td>
                                        <td><?php echo $item->f_keterangan_hasilkunjungan ?></td>
                                        <td><?php echo $item->f_tgl_visit    ?></td>
                                        <td><?php echo $item->agent    ?></td>

                                                <!--<td>-->
                                                    <!--<a title="Edit" href="<?php // echo base_url("content/update_tgh_list/" . $item->f_cif)    ?>"><i class="fa fa-list" aria-hidden="true"></i></a>-->
                                                    <!--<a title="Detail" href="#"><i class="fa fa-list" aria-hidden="true"></i></a>-->
                                        <!--</td>-->
                                    </tr>                   
                                <?php } ?>
                            </tbody>
                        </table>

                    </div>
                    <!-- Start .row -->
                </div>
                <!-- End .row -->

                <div class="col-lg-8 col-md-10 col-sm-10 col-xs-10">
                    <div class="form-group">
                        <!--                            <div class="form-line">
                                                        <input type="text" readonly="" class="form-control"  value="<?php echo $debitur->NomorNasabah ?>"  placeholder="Tujuan">
                                                    </div>-->
                    </div>
                </div>
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
                <h4 class="panel-title" ><i class="glyphicon glyphicon-user"></i>Data Nasabah</h4>
            </div>
            <div class="panel-body">
                <div class="row profile">
                    <!-- Start .row -->
                    <div class="col-md-12">
                        <div class="row clearfix">
                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="Tujuan">Nomor Nasabah</label>
                            </div>
                            <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" readonly="" class="form-control"  value="<?php echo $debitur->NomorNasabah ?>"  placeholder="Tujuan">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="">Nama Nasabah</label>
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
                                <label for="CIF">No Telpon</label>
                            </div>
                            <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="cif" class="form-control" name="cif" value="<?php echo $debitur->no_tlp; ?>" readonly="" placeholder="CIF">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="Hasil Kunjungan">Cabang</label>
                            </div>
                            <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="hasil_kunjungan" class="form-control" value="<?php echo $debitur->cabang ?>" readonly=""  placeholder="Hasil Kunjungan">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="">Jumlah Hari Tunggakan</label>
                            </div>
                            <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" readonly="" id="tgl_ttp" value="<?php echo $debitur->dpd; ?>"  class="form-control" name="tgl_ttp" placeholder="Tanggal TTP">
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>
                <!-- End .row -->
            </div>
        </div>
        <div class="panel panel-danger toggle panelMove panelClose panelRefresh"">
            <!-- Start .panel -->
            <div class="panel-heading" style="background-color: red;">
                <h4 class="panel-title"><i class="fa fa-building"></i>Detail Fasilitas</h4>
            </div>
            <div class="panel-body">
                <div class="row profile">

                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead 
                                <tr>
                                    <th style="min-width: 80px;">ID</th>
                                    <th style="min-width: 80px;">Fasilitas</th>
                                    <th style="min-width: 150px;">Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($fasilitas AS $item) { ?>
                                    <tr>
                                        <td><center><?php echo $item->ID ?></center></td>
                                <td><center><?php echo $item->name ?></center></td>
                                <td><center><?php echo $item->DESCRIPTION ?></center></td>
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
                <h4 class="panel-title"><i class="glyphicon glyphicon-headphones"></i>Activity </h4>
            </div>
            <div class="panel-body">
                <div class="row profile">

                    <form action="<?php echo base_url('inhouse/insert'); ?>" method="post" >
                        <!-- Start .row -->
                        <div class="col-md-12">
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="tujuan">Tujuan Call</label>
                                </div>
                                <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="tujuanCall" id="tujuan" class="form-control"  placeholder="Tujuan Call">
                                            <input type="hidden" name="cif" id="tujuan" class="form-control" value="<?php echo $debitur->NomorNasabah; ?>"  placeholder="Tujuan Call">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="Hasil Kunjungan">Hasil Call</label>
                                </div>
                                <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="hasil_kunjungan" name="hasilkunjungan" class="form-control" placeholder="Hasil Kunjungan">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="Keterangan Hasil Kunjungan">Keterangan Hasil Call</label>
                                </div>
                                <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="ket_hasil_kunjungan" name="kethasilkunjungan" class="form-control" placeholder="Keterangan Hasil Kunjungan">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--                        <div class="row clearfix">
                                                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                            <label for="Tanggal">Tanggal TTP</label>
                                                        </div>
                                                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <input type="text" id="tgl_ttp"  class="form-control" name="tgl_ttp" placeholder="Tanggal TTP">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>-->
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="Bertemu">Berbicara Dengan</label>
                                </div>
                                <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="bertemu"   class="form-control" name="berbicaradengan" placeholder="Bertemu">
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
                                            <input type="text" id="karakter" class="form-control" name="karakter"  placeholder="karakter">
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
                                            <input type="text" id="keterangan_karakter" class="form-control" name="keterangan_karakter"  placeholder="Keterangan Karakter">
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
                                            <input type="text" id="negatif_issue" class="form-control" name="negatif_issue"  placeholder="Negatif Issue">
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
                                            <input type="text" id="actionplan" class="form-control" name="actionplan" placeholder="Actionplan">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="Resume Nasabah">Resume Nasabah</label>
                                </div>
                                <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea type="teext" id="resum_nasabah" class="form-control" name="resum_nasabah"  placeholder="Resume Nasabah"></textarea>
                                        </div>
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
                    </form>

                </div>
                <!-- End .row -->
            </div>
        </div>
    </div>
    <!-- End .panel -->

    <div class="row" style=" margin-left: 2px; margin-right: 2px;">
        <div class="col-lg-12 col-md-4 col-sm-12">
            <div class="panel panel-danger toggle panelMove panelClose panelRefresh">
                <!-- Start .panel -->
                <div class="panel-heading" style="background-color: red;">
                    <h4 class="panel-title">Detail Jaminan</h4>
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
                                    <?php foreach ($jaminan AS $item) { ?>
                                        <tr>
                                            <td><center><?php echo $item->id ?></center></td>
                                    <td><center><?php echo $item->f_jaminan ?></center></td>
                                    <td><center><?php echo $item->f_location ?></center></td>
                                    <td><center><?php echo $item->f_value ?></center></td>
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
            <div  class="panel panel-danger toggle panelMove panelClose panelRefresh">
                <!-- Start .panel -->
                <div class="panel-heading" style="background-color: red;">
                    <h4 class="panel-title">Detail Tunggakan</h4>
                </div>
                <div class="panel-body">
                    <div class="row profile">

                        <div class="panel-body">
                            <table class="table table-striped">
                                <thead 
                                    <tr>
                                        <th style="min-width: 80px;">ID</th>
                                        <th style="min-width: 80px;">Installment Date</th>
                                        <th style="min-width: 150px;">DPD</th>
                                        <th style="min-width: 150px;">Due Pokok</th>
                                        <th style="min-width: 150px;">Due BUNGA</th>
                                        <th style="min-width: 150px;">Due DENDA</th>
                                        <th style="min-width: 150px;">Due TOTAL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($tagihan AS $item) { ?>
                                        <tr>
                                            <td><center><?php echo $item->ID ?></center></td>
                                    <td><center><?php echo $item->INSTALLMENT_DATE ?></center></td>
                                    <td><center><?php echo $item->NO_DAYS_OD ?></center></td>
                                    <td><center><?php echo $item->DUE_PR ?></center></td>
                                    <td><center><?php echo $item->DUE_IN ?></center></td>
                                    <td><center><?php echo $item->DUE_CH ?></center></td>
                                    <td><center><?php echo $item->TOTAL_DUE ?></center></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- Start .row -->
                    </div>
                    <!-- End .row -->

                    <div class="col-lg-8 col-md-10 col-sm-10 col-xs-10">
                        <div class="form-group">
                            <!--                            <div class="form-line">
                                                            <input type="text" readonly="" class="form-control"  value="<?php echo $debitur->NomorNasabah ?>"  placeholder="Tujuan">
                                                        </div>-->
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-10 col-sm-10 col-xs-10">
                        <div class="form-group">
                            <div class="form-line">
                                <label> <h5 style="height : 15px;">Total Tunggakan</h5> </label>    
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-10 col-sm-10 col-xs-10">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" style="height: 20px;margin-top: 5px;" readonly="" class="form-control"  value="<?php echo $totaltunggakan->total_tunggakan ?>"  placeholder="0.00">
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>

    </div>



</div>
<!-- col-lg-4 end here -->
<script src="<?php echo base_url('assets/jquery/jquery-2.2.3.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js') ?>"></script>
<script type="text/javascript">

$(document).ready(function () {
        $('#example').DataTable({
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
//            "order": false,
            "columnDefs": [{
                    "targets": [1, 2, 3, 4, 5, 6, 7, 8, 9], //first column / numbering column
                    "orderable": false //set not orderable

                }],
            "order": [[1, "asc"]]
        });
		
		$('#example1').DataTable({
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
//            "order": false,
            "columnDefs": [{
                    "targets": [1, 2, 3, 4, 5, 6, 7, 8, 9], //first column / numbering column
                    "orderable": false //set not orderable

                }],
            "order": [[1, "asc"]]
        });
    });
</script>