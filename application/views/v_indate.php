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
</style>

<div class="row">
    <div class="col-lg-12 col-md-4 col-sm-12">
        <div  class="panel panel-danger toggle panelMove panelClose panelRefresh">
            <!-- Start .panel -->
            <div class="panel-heading" style="background-color: red;">
                <h4 class="panel-title"><i class="glyphicon glyphicon-list-alt"></i>Hasil Restrukturisasi</h4>
            </div>
            <div class="panel-body">
                <div class="row profile">

                    <div class="panel-body">
                        <div class="row clearfix">
                            <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <a style="background-color :orange;" href="<?php echo base_url('restru/index'); ?>" class="btn btn-warning btn-sm mr5 mb10"><i class="fa  fa-arrow-left "></i>  Back</a>  
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">

                        </div>
                        <?php echo form_open("Restru/delete_retruktur_edit", "id='swa-confirm'") ?>
                        <table id="example" class="table table-striped table-bordered data-server-side dataTable no-footer">
                            <thead>
                                <tr>
                                    <th class="text-center" style="min-width: 80px; "><button title="hapus" type="submit" style="margin-top: 10px;" class="btn btn-danger btn-xs mr5 mb10"><i class="fa fa-trash-o"></i></button>
                                    </th>
                                    <th hidden=""></th>
                                    <th style="min-width: 120px;">No Nasabah</th>
                                    <th style="min-width: 120px;">ID Temenos</th>
                                    <th style="min-width: 120px;">Sub Product</th>
                                    <th style="min-width: 120px;">Nama Debitur</th>
                                    <th style="min-width: 120px;">Fasilitas Awal</th>
                                    <th style="min-width: 120px;">Fasilitas  Baru</th>
                                    <th style="min-width: 220px;">Plafond Sebelumnya (IDR)</th>
                                    <th style="min-width: 120px;">Bunga Awal(%)</th>
                                    <th style="min-width: 120px;">Plafond Baru(IDR)</th>
                                    <th style="min-width: 120px;">Cabang</th>
                                    <th style="min-width: 120px;">AO</th>
                                    <th style="min-width: 120px;">Jaminan</th>
                                    <th style="min-width: 180px;">Struktur Fasilitas Baru</th>
                                    <th style="min-width: 160px;">LBU Sifat Kredit</th>
                                    <th style="min-width: 160px;">Cara Restruktur</th>
                                    <th style="min-width: 160px;">Restruktur ke </th>
                                    <th style="min-width: 160px;">Kol.(Sebelumnya)</th>
                                    <th style="min-width: 120px;">Kol.(baru)</th>
                                    <th style="min-width: 180px;">Jumlah Hari Tunggakan</th>
                                    <th style="min-width: 180px;">Jk.Waktu Awal</th>   
                                    <th style="min-width: 180px;">Jk.Waktu ExpiredDate</th>
                                    <th style="min-width: 120px;">Jenis Usaha</th>
                                    <th style="min-width: 180px;">Alasan Restruktur</th>  
                                    <th style="min-width: 120px;">Kondisi Usaha</th>
                                    <th style="min-width: 190px;">Tgl Eksekusi Restruktur</th>
                                    <th>GP</th>
                                    <th style="min-width: 120px;">Jk.Waktu GP</th>
                                    <th style="min-width: 120px;">Tgl Berakhir GP</th>
                                    <th style="min-width: 120px;">Bunga GP</th>
                                    <th style="min-width: 120px;">Keterangan</th>
                                    <th>PIC</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($vtables1 as $key) { ?>


                                    <tr>
                                        <td>
                                <center>

                                    <input type="checkbox" title="delete" value="<?php echo $key->restruktur_ke ?>" name="idnya[]"/>
                                    <a data-toggle="modal" data-target="#myModal2"
                                       data-fidmodal = "<?php echo $key->f_id ?>"
                                       data-cifnasabahmodal = "<?php echo $key->no_nasabah ?>"
                                       data-fasilitas_barumodal = "<?php echo $key->fasilitas_baru ?>"
                                       data-plafound_barumodal = "<?php echo $key->plafound_baru ?>"
                                       data-sruktur_fasilitas_barumodal = "<?php echo $key->sruktur_fasilitas_baru ?>"
                                       data-lbu_sifat_kreditmodal = "<?php echo $key->lbu_sifat_kredit ?>"
                                       data-cara_restrukturmodal = "<?php echo $key->cara_restruktur ?>"
                                       data-kol_barumodal = "<?php echo $key->kol_baru ?>"
                                       data-alasan_restruktur = "<?php echo $key->alasan_restruktur ?>"
                                       data-kondisi_usahamodal = "<?php echo $key->kondisi_usaha ?>"
                                       data-restruktur_kemodal = "<?php echo $key->restruktur_ke ?>"
                                       data-jkwaktu_expireddatemodal = "<?php echo $key->jkwaktu_expireddate ?>"
                                       data-tgleksekusirestruktur = "<?php echo $key->tgleksekusirestruktur ?>"
                                       data-gpmodal = "<?php echo $key->gp ?>"
                                       data-jk_waktu_gpmodal = "<?php echo $key->jk_waktu_gp ?>"
                                       data-tgl_berakhir_gpmodal = "<?php echo $key->tgl_berakhir_gp ?>"
                                       data-bunga_gpmodal = "<?php echo $key->bunga_gp ?>"
                                       data-keteranganmodal = "<?php echo $key->keterangan ?>"
                                       >
                                        <i class="fa fa-pencil-square-o"></i>
                                    </a>
                                </center>
                                </td>
                                <td hidden=""><?php echo $key->f_id ?></td>
                                <td><?php echo $key->no_nasabah ?></td>
                                <td><?php echo $key->id_loan ?></td>
                                <td><?php echo $key->sub_product ?></td>
                                <td><?php echo $key->nama_debitur ?></td>
                                <td><?php echo $key->fasilitas_awal ?></td>
                                <td><?php echo $key->fasilitas_baru ?></td>
                                <td><?php echo $key->plafound_awal ?></td>
                                <td><?php echo $key->bunga_awal ?></td>
                                <td><?php echo $key->plafound_baru ?></td>
                                <td><?php echo $key->cabang ?></td>
                                <td><?php echo $key->ao ?></td>
                                <td><?php echo $key->jaminan ?></td>
                                <td><?php echo $key->sruktur_fasilitas_baru ?></td>
                                <td><?php echo $key->lbu_sifat_kredit ?></td>
                                <td><?php echo $key->cara_restruktur ?></td>
                                <td><?php echo $key->restruktur_ke ?></td>
                                <td><?php echo $key->kol_sebelumnya ?></td>
                                <td><?php echo $key->kol_baru ?></td>
                                <td><?php echo $key->jmlhr_tunggkn ?></td>
                                <td><?php echo $key->jk_waktu_awal ?></td>
                                <td><?php echo $key->jkwaktu_expireddate ?></td>
                                <td><?php echo $key->jenis_usaha ?></td>
                                <td><?php echo $key->alasan_restruktur ?></td>
                                <td><?php echo $key->kondisi_usaha ?></td>
                                <td><?php echo $key->tgleksekusirestruktur ?></td>
                                <td><?php echo $key->gp ?></td>
                                <td><?php echo $key->jk_waktu_gp ?></td>
                                <td><?php echo $key->tgl_berakhir_gp ?></td>
                                <td><?php echo $key->bunga_gp ?></td>
                                <td><?php echo $key->keterangan ?></td>
                                <td><?php echo $key->pic ?></td>

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
                <h4 class="modal-title" id="myModalLabel2">Edit Data Restrukturisasi</h4>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('restru/updatemodal_restru'); ?>" method="post" > 
                    <div class="row clearfix">
                        <div class="col-lg-12" hidden="">
                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="id">id</label>
                            </div>
                            <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="modalf_id" id="modalfid" class="form-control"  placeholder="f_id">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="No Nasabah">Nomor Nasabah</label>
                            </div>
                            <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="nomornasabh" readonly="" id="modalnomornasabh" class="form-control"  placeholder="Nomor Nasabah">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="No Nasabah">Fasilitas Baru</label>
                            </div>
                            <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="fasilitas_baru" id="fasilitas_modalplafound_baru" class="form-control"  placeholder="fasilitas_baru">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 

                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="Plafound Baru">Plafound Baru</label>
                            </div>
                            <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="plafound_baru" id="modalplafound_baru" class="form-control" value="" placeholder="plafound_baru">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 

                    <div class="row clearfix" >
                        <div class="col-lg-12">
                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="No Nasabah">Sruktur Fasilitas Baru</label>
                            </div>
                            <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea rows="4" cols="45" name="sruktur_fasilitas_baru" id="modalsruktur_fasilitas_baru">
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix" >
                        <div class="col-lg-12">
                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="No Nasabah">Lbu Sifat Kredit</label>
                            </div> 
                            <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="lbu_sifat_kredit" id="modallbu_sifat_kredit" class="form-control" value="" placeholder="lbu_sifat_kredit" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix" >
                        <div class="col-lg-12">
                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="No Nasabah">Cara Restruktur</label>
                            </div>
                            <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="cara_restruktur" id="modalcara_restruktur" class="form-control" value="" placeholder="cara_restruktur" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="No Nasabah">Kol Baru</label>
                            </div>
                            <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="kol_baru" id="modalkol_baru" class="form-control" value="" placeholder="kol_baru" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="No Nasabah">Jk.Waktu Restruktur (Expired Date)</label>
                            </div>
                            <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="jkwaktu_expireddate" id="modaljkwaktu_expireddate" class="form-control" value="" placeholder="jkwaktu_expireddate">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="No Nasabah">Alasan Restruktur</label>
                            </div>
                            <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="alasan_restruktur" id="modalalasan_restruktur" class="form-control" value="" placeholder="alasan_restruktur" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="No Nasabah">Kondisi Usaha</label>
                            </div>
                            <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="kondisi_usaha" id="modalkondisi_usaha" class="form-control" value="" placeholder="kondisi_usaha" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="No Nasabah">restruktur_ke</label>
                            </div>
                            <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="restruktur_ke" id="modalrestruktur_ke" class="form-control" readonly="" value="" placeholder="restruktur_ke" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="No Nasabah">Tgl Eksekusi Restruktur (By system)</label>
                            </div>
                            <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="tgleksekusirestruktur" id="modaltgleksekusirestruktur" class="form-control" value="" placeholder="Tgl Eksekusi Restruktur (By system)">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="No Nasabah">GP</label>
                            </div>
                            <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="gp" id="modalgp" class="form-control" value="" placeholder="gp">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix" >
                        <div class="col-lg-12">
                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="No Nasabah">Jk.Waktu GP</label>
                            </div>
                            <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="jk_waktu_gp" id="modaljk_waktu_gp" class="form-control" value="" placeholder="Jk Waktu_GP">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="No Nasabah">tgl_berakhir_gp</label>
                            </div>
                            <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="tgl_berakhir_gp" id="modaltgl_berakhir_gp" class="form-control" value="" placeholder="tgl_berakhir_gp">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix" >
                        <div class="col-lg-12">
                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="No Nasabah">Bunga GP</label>
                            </div>
                            <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="bunga_gp" id="modalbunga_gp" class="form-control"  placeholder="Bunga GP">
                                    </div>
                                </div>
                            </div>
                        </div>     
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="No Nasabah">Keterangan</label>
                            </div>
                            <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="keterangan" id="modalketerangan" class="form-control"  placeholder="keterangan">
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
                <h4 class="panel-title" ><i class="glyphicon glyphicon-user"></i>Data Nasabah</h4>
            </div>
            <div class="panel-body">
                <div class="row profile">
                    <!-- Start .row -->
                    <div class="col-md-12">
                        <div class="row clearfix">
                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="NomorNasabah">Nomor Nasabah</label>
                            </div>
                            <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" readonly="" class="form-control" name="NomorNasabah" value="<?php echo $row->NomorNasabah ?>"  placeholder="NomorNasabah">
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
                                        <input type="text" id="NamaDebitur" class="form-control" name="NamaDebitur" value="<?php echo $row->NamaDebitur ?>" readonly="" placeholder="Nama Nasabah">
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
                                        <input type="text" id="Cabang" name="Cabang" class="form-control" value="<?php echo $row->COMPANY_NAME ?>" readonly=""  placeholder="Hasil Kunjungan">
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>
                <!-- End .row -->
            </div>
            
        </div>

        <div class="panel panel-danger toggle panelMove panelClose panelRefresh">
            <!-- Start .panel -->
            <div class="panel-heading" style="background-color: red;">
                <h4 class="panel-title"><i class="fa fa-building"></i>Detail Dokumen Restrukturisasi</h4>
            </div>
            <div class="panel-body">
                <div class="row profile">

                    <div class="panel-body">

                        <table  class="table table-striped table-bordered data-server-side dataTable no-footer">
                            <thead>
                                <tr>
                                    <th class="text-center" style="min-width: 80px; ">Aksi
                                    </th>
                                    <th style="min-width: 120px;">No Nasabah</th>
                                    <th style="min-width: 120px;">Nama Debitur</th>
                                    <th style="min-width: 80px;">Restruktur ke </th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($vtables2 as $key) { ?>


                                    <tr>
                                        <td>
                                            <a href="<?php echo base_url("Restru/viewimagesession_param/") . $key->no_nasabah . '-' . $key->restruktur_ke ?>" button type="button" style="background-color: #0bacd3;" class="btn btn-primary">view file</button>
                                            </a>
                                        </td>
                                        <td><?php echo $key->no_nasabah ?></td>
                                        <td style="min-width: 150px;"><?php echo $key->nama_debitur ?></td>
                                        <td><?php echo $key->restruktur_ke ?></td>

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
                <form action="<?php echo base_url('restru/insert_indate'); ?>" method="post" enctype="multipart/form-data">
                    <div class="row profile">
                        <!-- Start .row -->
                        <div class="col-md-12">
                            <div class="row clearfix" hidden="">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="No Nasabah">No Nasabah</label>
                                </div>
                                <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="no_nasabah" id="no_nasabah" class="form-control" 
                                                   value="<?php echo $row->NomorNasabah ?>" placeholder="no_nasabah">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix" hidden="">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="No Nasabah">id_loan</label>
                                </div>
                                <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="id_loan" id="id_loan" class="form-control" value="<?php echo $row->id ?>" placeholder="id_loan" >
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix" hidden="">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="No Nasabah">sub_product</label>
                                </div>
                                <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="sub_product" id="sub_product" class="form-control"  placeholder="sub_product">
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row clearfix" hidden="">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="No Nasabah">nama_debitur</label>
                                </div>
                                <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="nama_debitur" id="nama_debitur" class="form-control" value="<?php echo $row->NamaDebitur ?>" placeholder="nama_debitur" required="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix" hidden="">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="fasilitas_awal" class="form-control" >fasilitas_awal</label>
                                </div>
                                <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="fasilitas_awal" id="fasilitas_awal"  placeholder="fasilitas_awal" >
                                        </div>
                                    </div>
                                </div>
                            </div>              

                            <div class="row clearfix">
                                <?php
                                if (!empty($this->session->userdata('redirectvalue'))) {
                                    $_redirect = $this->session->userdata('redirectvalue');
                                    $this->session->set_userdata('redirectvalue', null);
                                }
                                ?>
                                <div class="col-lg-12">
                                    <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="Fasilitas Baru">Fasilitas Baru</label>
                                    </div>
                                    <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <?php $_fas_bar = !empty($_redirect) ? $_redirect['fasilitas_baru'] : ''; ?>
                                                <input type="text" name="fasilitas_baru" id="fasilitas_baru" class="form-control"  
                                                       placeholder="Fasilitas Baru"
                                                       value="<?php echo $_fas_bar; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>  


                            <div class="row clearfix" hidden="">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="No Nasabah">plafound_awal</label>
                                </div>
                                <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="plafound_awal" id="plafound_awal" class="form-control"  placeholder="plafound_awal">
                                        </div>
                                    </div>
                                </div>
                            </div>  

                            <div class="row clearfix" hidden="">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="No Nasabah">bunga_awal</label>
                                </div>
                                <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="bunga_awal" id="bunga_awal" class="form-control" value="" placeholder="bunga_awal">
                                        </div>
                                    </div>
                                </div>
                            </div>  

                            <div class="row clearfix">
                                <div class="col-lg-12">
                                    <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="Plafound Baru">Plafound Baru</label>
                                    </div>
                                    <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                 <?php $_plaf_bar = !empty($_redirect) ? $_redirect['plafound_baru'] : ''; ?>
                                                <input type="text" name="plafound_baru" id="plafound_baru" class="form-control" 
                                                       value="<?php echo $_plaf_bar; ?>" placeholder="Plafound Baru">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>  

                            <div class="row clearfix" hidden="">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="No Nasabah">cabang</label>
                                </div>
                                <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="cabang" id="cabang" class="form-control" value="<?php echo $row->COMPANY_NAME ?>" placeholder="cabang">
                                        </div>
                                    </div>
                                </div>
                            </div>  

                            <div class="row clearfix" hidden="">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="No Nasabah">ao</label>
                                </div>
                                <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="ao" id="ao" class="form-control" value="" placeholder="ao">
                                        </div>
                                    </div>
                                </div>
                            </div>  


                            <div class="row clearfix" hidden="">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="No Nasabah">jaminan</label>
                                </div>
                                <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="jaminan" id="jaminan" class="form-control" value="" placeholder="jaminan">
                                        </div>
                                    </div>
                                </div>
                            </div>     

                            <div class="row clearfix" >
                                <div class="col-lg-12">
                                    <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="Sruktur Fasilitas Baru">Sruktur Fasilitas Baru</label>
                                    </div>
                                    <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                 <?php $_struk_fas_bar = !empty($_redirect) ? $_redirect['sruktur_fasilitas_baru'] : ''; ?>
<!--                                                <input type="text-area" name="sruktur_fasilitas_baru" id="sruktur_fasilitas_baru" class="form-control" value="" placeholder="sruktur_fasilitas_baru" required="">-->
                                                <textarea rows="4" cols="37" name="sruktur_fasilitas_baru" placeholder="Sruktur Fasilitas Baru">
<?php echo $_struk_fas_bar ?>
                                                </textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>     

                            <div class="row clearfix" >
                                <div class="col-lg-12">
                                    <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="Lbu Sifat Kredit">LBU Sifat Kredit</label>
                                    </div> 
                                    <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                 <?php $_lbu_sifat_kredit = !empty($_redirect) ? $_redirect['lbu_sifat_kredit'] : ''; ?>
                                                <input type="text" name="lbu_sifat_kredit" id="lbu_sifat_kredit" class="form-control" 
                                                       value="<?php echo $_lbu_sifat_kredit  ?>" placeholder="LBU Sifat Kredit" required="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix" >
                                <div class="col-lg-12">
                                    <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="Cara Restruktur">Cara Restruktur</label>
                                    </div>
                                    <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                 <?php $cara_restruktur = !empty($_redirect) ? $_redirect['cara_restruktur'] : ''; ?>
                                                <input type="text" name="cara_restruktur" id="cara_restruktur" class="form-control"
                                                       value="<?php echo $cara_restruktur ?>" placeholder="Cara Restruktur" required="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix" hidden="">
                                <div class="col-lg-12">
                                    <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="No Nasabah">Kol Sebelumnya</label>
                                    </div>
                                    <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="kol_sebelumnya" id="kol_sebelumnya" class="form-control" value="" placeholder="kol_sebelumnya">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-12">
                                    <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="Kol Baru">Kol Baru</label>
                                    </div>
                                    <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                 <?php $kol_baru = !empty($_redirect) ? $_redirect['kol_baru'] : ''; ?>
                                                <input type="text" name="kol_baru" id="kol_baru" class="form-control" 
                                                       value="<?php echo $kol_baru ?>" placeholder="Kol Baru" required="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix" hidden="">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="No Nasabah">jmlhr_tunggkn</label>
                                </div>
                                <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="jmlhr_tunggkn" id="jmlhr_tunggkn" class="form-control" value="<?php echo $row->JmlHariTunggakan ?>" placeholder="jmlhr_tunggkn" required="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix" hidden="">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="No Nasabah">jk_waktu_awal</label>
                                </div>
                                <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="jk_waktu_awal" id="jk_waktu_awal" class="form-control" value="" placeholder="jk_waktu_awal">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-12">
                                    <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="No Nasabah">Jangka Waktu Restruktur (Expired Date)</label>
                                    </div>
                                    <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <?php $jkwaktu_expireddate = !empty($_redirect) ? $_redirect['jkwaktu_expireddate'] : ''; ?>
                                                <input type="text" name="jkwaktu_expireddate" id="jkwaktu_expireddate" class="form-control"
                                                       value="<?php echo $jkwaktu_expireddate ?>" placeholder="Jangka Waktu Restruktur Expired Date">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix" hidden="">
                                <div class="col-lg-12">
                                    <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="No Nasabah">Jenis Usaha</label>
                                    </div>
                                    <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="jenis_usaha" id="jenis_usaha" class="form-control" value="" placeholder="jenis_usaha">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-12">
                                    <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="Alasan Restruktur">Alasan Restruktur</label>
                                    </div>
                                    <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <?php $alasan_restruktur = !empty($_redirect) ? $_redirect['alasan_restruktur'] : ''; ?>
                                                <input type="text" name="alasan_restruktur" id="alasan_restruktur" class="form-control" 
                                                       value="<?php echo $alasan_restruktur ?>" placeholder="Alasan Restruktur" required="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-12">
                                    <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="Kondisi Usaha">Kondisi Usaha</label>
                                    </div>
                                    <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <?php $kondisi_usaha = !empty($_redirect) ? $_redirect['kondisi_usaha'] : ''; ?>
                                                <input type="text" name="kondisi_usaha" id="kondisi_usaha" class="form-control"
                                                       value="<?php echo $kondisi_usaha ?>" placeholder="Kondisi Usaha" required="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-12">
                                    <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="Restruktur ke">Restruktur ke</label>
                                    </div>
                                    <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <?php $restruktur_ke = !empty($_redirect) ? $_redirect['restruktur_ke'] : ''; ?>
                                                <input type="text" name="restruktur_ke" id="restruktur_ke" class="form-control" 
                                                       value="<?php echo $restruktur_ke ?>" placeholder="Restruktur ke" required="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row clearfix">
                                <div class="col-lg-12">
                                    <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="Tgl Eksekusi Restruktur (By system)">Tgl Eksekusi Restruktur (By system)</label>
                                    </div>
                                    <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <?php $tgleksekusirestruktur = !empty($_redirect) ? $_redirect['tgleksekusirestruktur'] : ''; ?>
                                                <input type="text" name="tgleksekusirestruktur" id="tgleksekusirestruktur" class="form-control"
                                                       value="<?php echo $tgleksekusirestruktur ?>" placeholder="Tgl Eksekusi Restruktur By system">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>    

                            <div class="row clearfix">
                                <div class="col-lg-12">
                                    <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="No Nasabah">GP</label>
                                    </div>
                                    <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                 <?php $gp = !empty($_redirect) ? $_redirect['gp'] : ''; ?>
                                                <input type="text" name="gp" id="gp" class="form-control" 
                                                       value="<?php echo $gp ?>" placeholder="GP">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix" >
                                <div class="col-lg-12">
                                    <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="Jangka Waktu GP">Jangka Waktu GP</label>
                                    </div>
                                    <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <?php $jk_waktu_gp = !empty($_redirect) ? $_redirect['jk_waktu_gp'] : ''; ?>
                                                <input type="text" name="jk_waktu_gp" id="jk_waktu_gp" class="form-control"
                                                       value="<?php echo $jk_waktu_gp ?>" placeholder="Jangka Waktu GP">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-12">
                                    <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="TGL Berakhir GP">TGL Berakhir GP</label>
                                    </div>
                                    <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <?php $tgl_berakhir_gp = !empty($_redirect) ? $_redirect['tgl_berakhir_gp'] : ''; ?>
                                                <input type="text" name="tgl_berakhir_gp" id="tgl_berakhir_gp" class="form-control" 
                                                       value="<?php echo $tgl_berakhir_gp ?>" placeholder="TGL Berakhir GP">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix" >
                                <div class="col-lg-12">
                                    <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="Bunga GP">Bunga GP</label>
                                    </div>
                                    <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                 <?php $bunga_gp = !empty($_redirect) ? $_redirect['bunga_gp'] : ''; ?>
                                                <input type="text" name="bunga_gp" id="bunga_gp" class="form-control" 
                                                       value="<?php echo $bunga_gp ?>" placeholder="Bunga GP">
                                            </div>
                                        </div>
                                    </div>
                                </div>     
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-12">
                                    <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="Keterangan">Keterangan</label>
                                    </div>
                                    <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                 <?php $keterangan = !empty($_redirect) ? $_redirect['keterangan'] : ''; ?>
                                                <input type="text" name="keterangan" id="keterangan" class="form-control"
                                                       value="<?php echo $keterangan ?>" placeholder="Keterangan">
                                            </div>
                                        </div>
                                    </div>
                                </div>   
                            </div> 
                            <div class="row clearfix">
                                <div class="col-lg-12">
                                    <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="No Nasabah">Keterangan dokumen</label>
                                    </div>
                                    <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                 <?php $name_dokumen = !empty($_redirect) ? $_redirect['keterangan'] : ''; ?>
                                                <input type="text" name="name_dokumen" id="name_dokumen" class="form-control" 
                                                       value="<?php echo $name_dokumen ?>" placeholder="Keterangan dokumen" required="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-12">
                                    <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="Input Dokument">Input Dokument</label>
                                    </div>
                                    <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="file" multiple="multiple"  id="myfile" class="form-control" name="myfile[]">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>        
                            <div class="row clearfix" hidden="">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="No Nasabah">pic</label>
                                </div>
                                <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="pic" id="pic" class="form-control" placeholder="pic">
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
                    </div>
                </form>

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

                                </tbody>
                            </table>
                        </div>
                        <!-- Start .row -->
                    </div>
                    <!-- End .row -->
                </div>
            </div>

        </div>

    </div>



</div>
<!-- col-lg-4 end here -->


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
            modal.find('#modalfid').val(div.data('fidmodal'));
            modal.find('#modalnomornasabh').val(div.data('cifnasabahmodal'));
            modal.find('#fasilitas_modalplafound_baru').val(div.data('fasilitas_barumodal'));
            modal.find('#modalplafound_baru').val(div.data('plafound_barumodal'));
            modal.find('#modalsruktur_fasilitas_baru').val(div.data('plafound_barumodal'));
            modal.find('#modallbu_sifat_kredit').val(div.data('sruktur_fasilitas_barumodal'));
            modal.find('#modalcara_restruktur').val(div.data('lbu_sifat_kreditmodal'));
            modal.find('#modalkol_baru').val(div.data('cara_restrukturmodal'));
            modal.find('#modaljkwaktu_expireddate').val(div.data('kol_barumodal'));
            modal.find('#modalalasan_restruktur').val(div.data('alasan_restruktur'));
            modal.find('#modalkondisi_usaha').val(div.data('kondisi_usahamodal'));
            modal.find('#modalrestruktur_ke').val(div.data('restruktur_kemodal'));
            modal.find('#modaltgleksekusirestruktur').val(div.data('jkwaktu_expireddatemodal'));
            modal.find('#modaltgl_berakhir_gp').val(div.data('tgleksekusirestruktur'));
            modal.find('#modalbunga_gp').val(div.data('gpmodal'));
            modal.find('#modaljk_waktu_gp').val(div.data('jk_waktu_gpmodal'));
            modal.find('#modaltgl_berakhir_gp').val(div.data('tgl_berakhir_gpmodal'));
            modal.find('#modalketerangan').val(div.data('keteranganmodal'));
            //$('#jenissp1').trigger('change');//.change();//trigger('update.fs');//.selectpicker("refresh");
        });




    });


</script>