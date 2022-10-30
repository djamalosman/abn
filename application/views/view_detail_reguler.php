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
        <div  class="panel panel-danger toggle panelMove panelClose panelRefresh" style="display : none;">
            <!-- Start .panel -->
            <div class="panel-heading" style="background-color: red;">
                <h4 class="panel-title"><i class="glyphicon glyphicon-list-alt"></i>Hasil Activitas</h4>
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
                                <td><center><?php echo $item->f_resumenasabah ?></center></td>
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
                                        <input type="text" readonly="" id="tgl_ttp" value="<?php echo $debitur->dpd; ?>"  class="form-control"  placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>  
                        <!--<div class="row clearfix">
                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="">Hasil Kunjungan</label>
                            </div>
                            <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" readonly="" id="hasilkj" value="<?php echo $hasil_visit->f_hasilkunjungan; ?>"  class="form-control" placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>  -->
                        <div class="row clearfix">
                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="">Hasil Kunjungan</label>
                            </div>
                            <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" readonly="" id="hasilkj" value="<?php echo $hasil_visit->f_hasilkunjungan; ?>"  class="form-control" placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>  
                        <div class="row clearfix">
                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="">Keterangan Hasil Kunjungan</label>
                            </div>
                            <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" readonly="" id="hasilkj" value="<?php echo $hasil_visit->f_keterangan_hasilkunjungan; ?>"  class="form-control" placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>  
                        <div class="row clearfix">
                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="">Bertemu Dengan</label>
                            </div>
                            <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" readonly="" id="hasilkj" value="<?php echo $hasil_visit->f_bertemu; ?>"  class="form-control"  placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>  
                        <div class="row clearfix">
                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="">Keterangan Bertemu Dengan</label>
                            </div>
                            <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" readonly="" id="hasilkj" value="<?php echo $hasil_visit->f_keterangan_bertemu; ?>"  class="form-control"  placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>  
                        <div class="row clearfix">
                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="">Lokasi Bertemu</label>
                            </div>
                            <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" readonly="" id="hasilkj" value="<?php echo $hasil_visit->f_lokasibertemu; ?>"  class="form-control"  placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>  
                        <div class="row clearfix">
                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="">Keterangan Lokasi Bertemu</label>
                            </div>
                            <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" readonly="" id="hasilkj" value="<?php echo $hasil_visit->f_keterangan_lokasi; ?>"  class="form-control" placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>  
                        <div class="row clearfix">
                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="">Karakter Nasabah</label>
                            </div>
                            <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" readonly="" id="hasilkj" value="<?php echo $hasil_visit->f_karakter; ?>"  class="form-control" placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>  
                        <div class="row clearfix">
                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="">Keterangan Karakter Nasabah</label>
                            </div>
                            <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" readonly="" id="hasilkj" value="<?php echo $hasil_visit->f_keterangan_karakter; ?>"  class="form-control"  placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>  
                        <div class="row clearfix">
                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="">Negatif Issue</label>
                            </div>
                            <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" readonly="" id="hasilkj" value="<?php echo $hasil_visit->f_negatif_issue; ?>"  class="form-control" placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>  
                        <div class="row clearfix">
                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="">Action Plan</label>
                            </div>
                            <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" readonly="" id="hasilkj" value="<?php echo $hasil_visit->f_actionplan; ?>"  class="form-control" placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>  
                        <div class="row clearfix">
                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="">Date Action Plan</label>
                            </div>
                            <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" readonly="" id="hasilkj" value="<?php echo $hasil_visit->f_date_actionplan; ?>"  class="form-control"  placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>  
                        <!--<div class="row clearfix">
                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="">Nominal</label>
                            </div>
                            <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" readonly="" id="hasilkj" value="<?php echo $hasil_visit->f_nominal_pelunasan; ?>"  class="form-control"  placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>  -->
                        <div class="row clearfix">
                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="">Resume Nasabah</label>
                            </div>
                            <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea type="text" readonly=""  value="<?php echo $hasil_visit->f_resumenasabah ; ?>"  class="form-control" placeholder=""><?php echo $hasil_visit->f_resumenasabah ; ?></textarea>
                                    </div>
                                </div>
                            </div>	
                        </div>  
                        <div class="row clearfix">
                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="">Total Tunggakan</label>
                            </div>
                            <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" readonly="" id="hasilkj" value="<?php echo $hasil_visit->f_total_tunggakan; ?>"  class="form-control" placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>  

                        <div class="row clearfix">
                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="">Total Bayar</label>
                            </div>
                            <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" readonly="" id="hasilkj" value="<?php echo $hasil_visit->f_total_bayar; ?>"  class="form-control"  placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>  


                    </div>
                </div>
                <!-- End .row -->
            </div>
        </div>
    </div>

    <div class="col-lg-6 col-md-4 col-sm-12">

        <!--activity input plan plunasan-->
        <div class="panel panel-success" <?php
        if ($hasil_pp['numrow'] != 0) {
            echo 'style= "display: none;"';
        }
        ?>>
            <!-- Start .panel -->
            <div class="panel-heading" style="background-color: green">
                <h4 class="panel-title"><i class="glyphicon glyphicon-headphones"></i>Activity </h4>
            </div>
            <div class="panel-body">
                <div class="row profile">

                    <form action="<?php echo base_url('regular/insertdata'); ?>" method="post"  enctype="multipart/form-data" >
                        <!-- Start .row -->
                        <div class="col-md-12">
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="tujuan">Status</label>
                                </div>
                                <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <select class="form-control" name="status" id="status" >
                                                <option value="proses"> Proses</option>
                                                <option value="reject"> Reject</option>
                                                <option value="done"> Done</option>
                                            </select>
                                            <!--<input type="text" name="tujuanCall" id="tujuan" class="form-control"  placeholder="Tujuan Call">-->
                                            <input type="hidden" name="cif" id="cif" class="form-control" value="<?php echo $debitur->NomorNasabah; ?>">
                                            <input type="hidden" name="idkj" id="idkj" class="form-control" value="<?php echo $hasil_visit->f_id; ?>">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="Hasil Kunjungan">Sumber Dana</label>
                                </div>
                                <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <select class="form-control" name="sumberdana" id="sumberdana" >
                                                <option value="1"> Pribadi</option>
                                                <option value="2"> Penjualan Asset</option>
                                                <option value="3"> Pihak ke 3</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="namapmbdana">Nama Pemberi Dana</label>
                                </div>
                                <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="namapmbdana" name="namapmbdana" class="form-control" placeholder="Nama Pemberi Dana ">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="notlp">Nomor Telpon</label>
                                </div>
                                <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="notlp"   class="form-control" name="notlp" placeholder="Nomor Telpon">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="notlp">Nominal Dana</label>
                                </div>
                                <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text"  id="nominal" class="form-control" name="nominal" placeholder="Nominal">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="notlp">Nominal Plan</label>
                                </div>
                                <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" readonly="true" id="nominalplan"  value="<?php echo $hasil_visit->f_total_bayar; ?>"  class="form-control" name="nominalplan" placeholder="Nominal Plan">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="notlp">Upload File</label>
                                </div>
                                <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="file" id="notlp"   name="myfile[]" multiple=""  accept="image/*,application/pdf" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="notlp">Keterangan File</label>
                                </div>
                                <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="ketfile"   class="form-control" name="ketfile" placeholder="Keterangan File">
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
                                            <button type="submit" style="background-color:  green" class="btn btn-success btn-sm mr5 mb10"><i class="fa fa-save"></i>  Simpan</button>   
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
        <!--end activity input plan plunasan-->

        <!--hasil inputan plan plunasan-->
        <div class="panel panel-success" <?php
        if ($hasil_pp['numrow'] == 0) {
            echo 'style = "display: none;"'. '>' ;
        } else {
            ?> >
                <!-- Start .panel -->
                <div class="panel-heading" style="background-color: green">
                    <h4 class="panel-title"><i class="glyphicon glyphicon-headphones"></i>Hasil Input Plan Plunasan</h4>
                </div>
                <div class="panel-body">
                    <div class="row profile">
                        <form action="<?php echo base_url('regular/update'); ?>" method="post" >
                            <!-- Start .row -->
                            <div class="col-md-12">
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="tujuan">Status</label>
                                    </div>
                                    <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control" name="status1" id="status1" >
                                                    <option value="proses"> Proses</option>
                                                    <option value="reject"> Reject</option>
                                                    <option value="done"> Done</option>
                                                </select>
                                                <!--<input type="text" name="tujuanCall" id="tujuan" class="form-control"  placeholder="Tujuan Call">-->
                                                <input type="hidden" name="cif1" id="cif1" class="form-control" value="<?php echo $hasil_pp['data']->f_cif; ?>" >
                                                <input type="hidden" name="idkj1" id="idkj1" class="form-control" value="<?php echo $hasil_pp['data']->f_idkj; ?>" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="Hasil Kunjungan">Sumber Dana</label>
                                    </div>
                                    <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control" name="sumberdana1" id="sumberdana1" >
                                                    <option value="1"> Pribadi</option>
                                                    <option value="2"> Penjualan Asset</option>
                                                    <option value="3"> Pihak ke 3</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="namapmbdana">Nama Pemberi Dana</label>
                                    </div>
                                    <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="namapmbdana1" name="namapmbdana1" value="<?php echo $hasil_pp['data']->f_nama_pd; ?>" class="form-control" placeholder="Nama Pemberi Dana ">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="notlp">Nomor Telpon</label>
                                    </div>
                                    <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="notlp1"  value="<?php echo $hasil_pp['data']->f_no_tlp_pd; ?>"  class="form-control" name="notlp1" placeholder="Nomor Telpon">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="">Nominal Dana</label>
                                    </div>
                                    <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text"  id="nominal1" value="<?php echo $hasil_pp['data']->f_nominal_pd; ?>"   class="form-control" name="nominal1" placeholder="Nominal">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="notlp">Nominal Plan</label>
                                    </div>
                                    <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" readonly="true" id="nominalplan" value="<?php echo $hasil_visit->f_total_bayar; ?>"  class="form-control" name="nominalplan" placeholder="Nominal Plan">
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
                                                <button type="submit" style="background-color:  green" class="btn btn-success btn-sm mr5 mb10"><i class="fa fa-save"></i>  Update</button>   
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                <?php } ?>
                <!-- End .row -->
            </div>
        </div>
        <!--end hasil inputan plan plunasan-->
        <div class="panel panel-danger toggle panelMove panelClose panelRefresh" <?php
        if ($hasil_pp['numrow'] == 0) {
            echo 'style = "display: none;"';
        }
        ?>>
            <!-- Start .panel -->
            <div class="panel-heading" style="background-color: red;">
                <h4 class="panel-title"><i class="fa fa-building"></i>File Plan Plunasan</h4>
            </div>
            <div class="panel-body">
                <div class="row profile">
                    <div class="panel-body">
                        <div class="col-lg-12">
                            <div class="col-lg-12">

                                <form action="<?php echo base_url('regular/inserfile'); ?>" method="post"  enctype="multipart/form-data" >
                                    <div class="row clearfix">
                                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="notlp">Upload File</label>
                                        </div>
                                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="file" id="notlp" required class="form-control" name="myfile" accept="image/*,application/pdf" >
                                                    <input type="hidden" id="codeimage"  class="form-control" name="codeimage" <?php if($hasil_pp['numrow'] == 0 ){ } else {     echo ' value='.$hasil_pp['data']->f_code_file; }?> >
                                                    <input type="hidden" id="cif"  class="form-control" name="cif" value="<?php echo $hasil_pp['data']->f_cif; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="notlp">Keterangan File</label>
                                        </div>
                                        <div class="col-lg-4 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <textarea type="text" id="ketfile2"   class="form-control" name="ketfile2" placeholder="Keterangan"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <button type="submit" class="btn btn-success btn-xs mr5 mb10" style="background-color: green;" > <i class="fa fa-plus"></i> Add</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </form>


                            </div>

                            <form action="<?php echo base_url('regular/deleteimage'); ?>" id="delet1" method="post">
                                <div class="row clearfix">

                                    <div style="margin-left: 430px;" class="col-lg-10 col-md-10 col-sm-8 col-xs-10">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <button style="background-color : red; " class="btn btn-danger btn-xs mr5 mb10" type="button" onclick="delet()" ><i class="fa fa-trash"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <?php
                                    $idx = 0;
                                    $idxx = 1;
                                    $total = sizeof($imagepp)
                                    ?>
                                    <?php foreach ($imagepp as $d) { ?> 
                                        <?php
                                        $idx++;
                                        if ($idx === 1) {
                                            echo '<div class="row">';
                                        }
                                        ?>
                                        <div class="col-lg-4">
                                            <div class="panel panel-danger">
                                                <div class="panel-heading" style="background-color : blue;">

                                                    <h4 style="color: white; " class="panel-title">
                                                        <input type="checkbox" name="idnya[]" id ="idnya[]" value="<?php echo $d['f_id']; ?>">   
                                                        <i class="fa fa-paperclip"></i> </h4>
                                                </div>
                                                <div class="panel-body">
                                                    <div style="word-break: break-all;"><small>ket :  <?php echo $d['f_keterangan'] ?> </small></div>

                                                    <a data-img = "data:<?php echo $d['f_type_file'] ?>;base64,<?php echo base64_encode($d['f_file_content']) ?>" 
                                                       data-type = "<?php echo $d['f_type_file'] ?>" 
                                                       data-toggle = "modal" data-target="#modalimage">
                                                        <img <?php
                                                        if ($d['f_type_file'] == 'application/pdf') {
                                                            echo 'src=' . base_url('gambar/pdficon1.png');
                                                        } else {
                                                            echo 'src=' . base_url('gambar/image1.png');
                                                        }
                                                        ?>  style="height:70px; width: auto;" >
                                                        <br>
                                                        <small style="word-break: break-all;"><?php echo $d['f_name_file'] ?> </small>
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                        <?php
                                        if ($idx === 3 || $idxx === $total) {
                                            echo '</div>';
                                            $idx = 0;
                                        }
                                        $idxx++;
                                        ?>
                                    <?php } ?>
                                </div>

                            </form>
                        </div>

                    </div>
                    <!-- Start .row -->
                </div>
                <!-- End .row -->
            </div>
        </div>


    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-4 col-sm-12">
        <div class="col-lg-6 col-md-4 col-sm-12">
            <div class="panel panel-danger toggle panelMove panelClose panelRefresh">
                <!-- Start .panel -->
                <div class="panel-heading" style="background-color: red;">
                    <h4 class="panel-title"><i class="fa fa-building"></i>Detail Fasilitas</h4>
                </div>
                <div class="panel-body">
                    <div class="row profile">

                        <div class="panel-body">
                            <table class="table table-striped">
                                <thead >
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
        </div>
        <div class="col-lg-6 col-md-4 col-sm-12">
            <div class="panel panel-danger toggle panelMove panelClose panelRefresh">
                <!-- Start .panel -->
                <div class="panel-heading" style="background-color: red;">
                    <h4 class="panel-title"><i class="fa fa-building"></i>Image Hasil Visit</h4>
                </div>
                <div class="panel-body">
                    <div class="row profile">

                        <div class="panel-body">
                            <?php foreach ($imagevisit as $f) : ?> 
                                <div class="col-lg-2">
                                    <a data-img = "data:<?php echo $f['f_type_file'] ?>;base64,<?php echo base64_encode($f['f_file_content']) ?>" 
                                       data-type = "<?php echo $f['f_type_file'] ?>" 
                                       data-toggle = "modal" data-target="#modalimage" >
                                        <object data="data:<?php echo $f['f_type_file'] ?>;base64,<?php echo base64_encode($f['f_file_content']) ?>" type="<?php echo $f['f_type_file'] ?>" style="height:50px;width:100%">
                                        </object>﻿
                                    </a>
                                </div>

                            <?php endforeach; ?>
                        </div>
                        <!-- Start .row -->
                    </div>
                    <!-- End .row -->
                </div>
            </div>
        </div>
    </div>


    <!-- End .tabs -->
</div>
<!-- col-lg-4 end here -->

<!-- End .panel -->

<div class="row" style=" margin-left: 2px; margin-right: 2px;" >
    <div class="col-lg-12 col-md-4 col-sm-12">
    </div>
</div>
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

<!--modal-->

<div class="modal fade" id="modalimage" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-center">
        <div class="modal-content" >
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Frame</h4>
            </div>
            <div class="modal-body" style="height:1000px;" >
                <div>
                    <object class="col-lg-12" id="img1" style="height:1000px;width:100%; align-content: center"></object>﻿ 
            <!--<img id="image1" alt="image alt" class="img-responsive" >-->    
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
                                                        $('#modalimage').on('show.bs.modal', function (event) {
                                                            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
                                                            var modal = $(this);

                                                            //alert(div.data('sp'));

                                                            // Isi nilai pada field
                                                            //            modal.find('#img1').attr(("data", div.data('img')),("type", div.data('type')));
                                                            modal.find('#img1').attr("type", div.data('type'));
                                                            modal.find('#img1').attr("data", div.data('img'));

                                                        });

                                                        $("#status1").val('<?php echo !empty($hasil_pp['data']->f_status_plan) ? $hasil_pp['data']->f_status_plan : ''; ?>');
                                                        $("#sumberdana1").val('<?php echo !empty($hasil_pp['data']->f_methode) ? $hasil_pp['data']->f_methode : ''; ?>');
                                                    });

                                                    function delet() {
                                                        //event.preventDefault(); // prevent form submit
                                                        var form = $('#delet1');//event.target.form; // storing the form
                                                        Swal.fire({
                                                            title: 'Anda Yakin ?',
                                                            text: "Ingin Menghapus Data Ini ",
                                                            type: 'warning',
                                                            showCancelButton: true,
                                                            confirmButtonColor: '#3085d6',
                                                            cancelButtonColor: '#d33',
                                                            confirmButtonText: 'Yes, delete it!'
                                                        }).then((result) => {
                                                            if (result.value) {
                                                                form.submit();
                                                            } else {
                                                                swal({
                                                                    position: 'top',
                                                                    title: 'Cancel',
                                                                    text: 'Anda Tidak Jadi Menghapus',
                                                                    type: 'error',
                                                                    showConfirmButton: false,
                                                                    timer: 1500,
                                                                    onOpen: function () {
                                                                        setTimeout(function () {
                                                                            swal.close()
                                                                        }, 2000)
                                                                    }
                                                                });
                                                                //      alert('masuk cancel');
                                                            }
                                                        });

                                                    }


</script>