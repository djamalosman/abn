<?php echo $this->session->flashdata('message'); ?>
<style type="text/css">
#myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
    padding: 20px;
}

#image {
    box-sizing: border-box;
    border-style: solid;
    border-color: red;
    background-color: lightblue;
    float: left;
    width: 10px;
    -moz-column-break-before: always;
    -webkit-column-break-before: always;
    column-break-before: always;
}

#myImg:hover {
    opacity: 0.7;
}

input:valid {
    color: black;
}

input:invalid {
    color: red;
}
</style>
</style>

<div class="row">
    <div class="col-lg-12 col-md-4 col-sm-12">
        <div class="panel panel-danger toggle panelMove panelClose panelRefresh">
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
                                        <a style="background-color :orange;"
                                            href="<?php echo base_url('Lelang/index'); ?>"
                                            class="btn btn-warning btn-sm mr5 mb10"><i class="fa  fa-arrow-left "></i>
                                            Back</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">

                        </div>
                        <?php echo form_open("Lelang/delete_lelangudpate", "id='swa-confirm'") ?>
                        <table id="example"
                            class="table table-striped table-bordered data-server-side dataTable no-footer">
                            <thead>
                                <tr>
                                    <th class="text-center" style="min-width: 80px; "><button title="hapus"
                                            type="submit" style="margin-top: 10px;"
                                            class="btn btn-danger btn-xs mr5 mb10"><i
                                                class="fa fa-trash-o"></i></button></th>
                                    <th>no_ld</th>
                                    <th>cif</th>
                                    <th style="min-width: 120px;">cabang</th>
                                    <th>nama_debitur</th>
                                    <th style="min-width: 120px;">fasilitas_pinjaman</th>
                                    <th style="min-width: 120px;">flag_probis</th>
                                    <th>col</th>
                                    <th>dpd</th>
                                    <th style="min-width: 120px;">plafond</th>
                                    <th style="min-width: 120px;">outstanding</th>
                                    <th style="min-width: 120px;">ckpn</th>
                                    <th style="min-width: 120px;">jenis_jaminan</th>
                                    <th style="min-width: 120px;">keterangan_jaminan</th>
                                    <th style="min-width: 120px;">lt</th>
                                    <th style="min-width: 120px;">lb</th>
                                    <th style="min-width: 120px;">alamat_jaminan</th>
                                    <th style="min-width: 120px;">periode_lelang_ke</th>
                                    <th style="min-width: 120px;">tgl_collect_D</th>
                                    <th style="min-width: 120px;">tgl_order_apraisal</th>
                                    <th style="min-width: 120px;">mv</th>
                                    <th style="min-width: 120px;">lv</th>
                                    <th style="min-width: 120px;">penilai_apraisal</th>
                                    <th style="min-width: 120px;">tgl_memo_limit</th>
                                    <th style="min-width: 120px;">tgl_spk_bls</th>
                                    <th style="min-width: 120px;">bls</th>
                                    <th style="min-width: 120px;">tgl_somasi_bls</th>
                                    <th style="min-width: 120px;">tgl_permohonan_lelang</th>
                                    <th style="min-width: 120px;">tgl_pedaftaran_lelang</th>
                                    <th style="min-width: 120px;">nilai_limit_lelang</th>
                                    <th style="min-width: 120px;">tgl_penepatan_lelang</th>
                                    <th style="min-width: 120px;">tgl_lelang</th>
                                    <th style="min-width: 120px;">tgl_pengumuman_lelang1</th>
                                    <th style="min-width: 120px;">tgl_pengumuman_lelang2</th>
                                    <th style="min-width: 120px;">hasil_lelang</th>
                                    <th style="min-width: 120px;">terjual_lelang</th>
                                    <th style="min-width: 120px;">keterangan</th>
                                    <th style="min-width: 120px;">biaya_lelang</th>
                                    <th style="min-width: 120px;">pajak_lelang</th>
                                    <th style="min-width: 120px;">cutloos</th>
                                    <th style="min-width: 120px;">last_status</th>
                                    <th style="min-width: 120px;">state_lelang</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($viewlelang as $item) { ?>
                                <tr>
                                    <td>
                                        <center>
                                            <input type="checkbox" title="delete" value="<?php echo $item->id_t_lelang ?>"
                                                name="idnya[]" />
                                            <a data-toggle="modal" data-target="#ModalAgent1"
                                                data-id_t_lelang2="<?php echo $item->id_t_lelang ?>"
                                                data-no_ld2="<?php echo $item->no_ld ?>"
                                                data-cif2="<?php echo $item->cif ?>"
                                                data-cabang2="<?php echo $item->cabang ?>"
                                                data-nama_debitur2="<?php echo $item->nama_debitur ?>"
                                                data-fasilitas_pinjaman2="<?php echo $item->fasilitas_pinjaman ?>"
                                                data-flag_probis2="<?php echo $item->flag_probis	?>"
                                                data-col2="<?php echo $item->col ?>"
                                                data-dpd2="<?php echo $item->dpd ?>"
                                                data-plafond2="<?php echo $item->plafond ?>"
                                                data-outstanding2="<?php echo $item->outstanding?>"
                                                data-ckpn2="<?php echo $item->ckpn ?>"
                                                data-jenis_jaminan2="<?php echo $item->jenis_jaminan ?>"
                                                data-keterangan_jaminan2="<?php echo $item->keterangan_jaminan?>"
                                                data-lt2="<?php echo $item->lt ?>" 
                                                data-lb2="<?php echo $item->lb ?>"
                                                data-alamat_jaminan2="<?php echo $item->alamat_jaminan ?>"
                                                data-periode_lelang_ke2="<?php echo $item->periode_lelang_ke ?>"
                                                data-collect_D_tgl2="<?php echo $item->tgl_collect_D ?>"
                                                data-tgl_order_apraisal2="<?php echo $item->tgl_order_apraisal?>"
                                                data-mv2="<?php echo $item->mv ?>" 
                                                data-lv2="<?php echo $item->lv ?>"
                                                data-penilai_apraisal2="<?php echo $item->penilai_apraisal?>"
                                                data-tgl_memo_limit2="<?php echo $item->tgl_memo_limit ?>"
                                                data-tgl_spk_bls2="<?php echo $item->tgl_spk_bls ?>"
                                                data-bls2="<?php echo $item->bls ?>"
                                                data-tgl_somasi_bls2="<?php echo $item->tgl_somasi_bls ?>"
                                                data-tgl_permohonan_lelang2="<?php echo $item->tgl_permohonan_lelang ?>"
                                                data-tgl_pedaftaran_lelang2="<?php echo $item->tgl_pedaftaran_lelang ?>"
                                                data-nilai_limit_lelang2="<?php echo $item->nilai_limit_lelang ?>"
                                                data-tgl_penepatan_lelang2="<?php echo $item->tgl_penepatan_lelang ?>"
                                                data-tgl_lelang2="<?php echo $item->tgl_lelang ?>"
                                                data-tgl_pengumuman_lelang122="<?php echo $item->tgl_pengumuman_lelang1 ?>"
                                                data-tgl_pengumuman_lelang222="<?php echo $item->tgl_pengumuman_lelang2 ?>"
                                                data-hasil_lelang2="<?php echo $item->hasil_lelang ?>"
                                                data-terjual_lelang2="<?php echo $item->terjual_lelang ?>"
                                                data-keterangan2="<?php echo $item->keterangan ?>"
                                                data-biaya_lelang2="<?php echo $item->biaya_lelang ?>"
                                                data-pajak_lelang2="<?php echo $item->pajak_lelang ?>"
                                                data-cutloos2="<?php echo $item->cutloos ?>"
                                                data-last_status2="<?php echo $item->last_status ?>"
                                                data-state_lelang2="<?php echo $item->state_lelang ?>"
                                            >
                                              
                                                <i class="fa fa-pencil-square-o"></i>
                                            </a>
                                        </center>
                                    </td>
                                    <td><?php echo $item->no_ld ?></td>
                                    <td><?php echo $item->cif ?></td>
                                    <td><?php echo $item->cabang ?></td>
                                    <td><?php echo $item->nama_debitur ?></td>
                                    <td><?php echo $item->fasilitas_pinjaman ?></td>
                                    <td><?php echo $item->flag_probis ?></td>
                                    <td><?php echo $item->col ?></td>
                                    <td><?php echo $item->dpd ?></td>
                                    <td><?php echo $item->plafond ?></td>
                                    <td><?php echo $item->outstanding ?></td>
                                    <td><?php echo $item->ckpn ?></td>
                                    <td><?php echo $item->jenis_jaminan ?></td>
                                    <td><?php echo $item->keterangan_jaminan ?></td>
                                    <td><?php echo $item->lt ?></td>
                                    <td><?php echo $item->lb ?></td>
                                    <td><?php echo $item->alamat_jaminan ?></td>
                                    <td><?php echo $item->periode_lelang_ke ?></td>
                                    <td><?php echo $item->tgl_collect_D ?></td>
                                    <td><?php echo $item->tgl_order_apraisal ?></td>
                                    <td><?php echo $item->mv ?></td>
                                    <td><?php echo $item->lv ?></td>
                                    <td><?php echo $item->penilai_apraisal ?></td>
                                    <td><?php echo $item->tgl_memo_limit ?></td>
                                    <td><?php echo $item->tgl_spk_bls ?></td>
                                    <td><?php echo $item->bls ?></td>
                                    <td><?php echo $item->tgl_somasi_bls ?></td>
                                    <td><?php echo $item->tgl_permohonan_lelang ?></td>
                                    <td><?php echo $item->tgl_pedaftaran_lelang ?></td>
                                    <td><?php echo $item->nilai_limit_lelang ?></td>
                                    <td><?php echo $item->tgl_penepatan_lelang ?></td>
                                    <td><?php echo $item->tgl_lelang ?></td>
                                    <td><?php echo $item->tgl_pengumuman_lelang1 ?></td>
                                    <td><?php echo $item->tgl_pengumuman_lelang2 ?></td>
                                    <td><?php echo $item->hasil_lelang ?></td>
                                    <td><?php echo $item->terjual_lelang ?></td>
                                    <td><?php echo $item->keterangan ?></td>
                                    <td><?php echo $item->biaya_lelang ?></td>
                                    <td><?php echo $item->pajak_lelang ?></td>
                                    <td><?php echo $item->cutloos ?></td>
                                    <td><?php echo $item->last_status ?></td>
                                    <td><?php echo $item->state_lelang ?></th>
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
<form action="<?php echo base_url('Lelang/updatedatalelang'); ?>" method="post">
    <div class="modal fade" id="ModalAgent1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-center" role="document">
            <div class="modal-content" style="width: 400px;">
                <div class="modal-header" style="background-color: red">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" style="color: white" id="exampleModalLabel">Update Data Lelang</h4>
                </div>
                <div class="modal-body">
                <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="no_ld">id lelang</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" autocomplete="off" name="id_t_lelang" id="id_t_lelang12" class="form-control"  readonly="true" placeholder="no_ld" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="no_ld">no_ld</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" autocomplete="off" name="no_ld" id="no_ld12" class="form-control"  readonly="true" placeholder="no_ld" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="Cif">Cif</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" autocomplete="off" name="cif" id="cif12" class="form-control"
                                        value="" required="" readonly="" placeholder="CIF">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="Flag Eligible">nama_debitur</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" autocomplete="off" name="nama_debitur" id="nama_debitur12"
                                        class="form-control" required="" placeholder="nama_debitur">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="Flag Eligible">cabang</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" autocomplete="off" name="cabang" id="cabang12"
                                        class="form-control" required="" placeholder="cabang">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="Flag Register">fasilitas_pinjaman</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" autocomplete="off" name="fasilitas_pinjaman" id="fasilitas_pinjaman12"
                                        class="form-control" required="" placeholder="fasilitas_pinjaman">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="Periode Lelang">flag_probis</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" autocomplete="off" name="flag_probis" id="flag_probis12"
                                        class="form-control" required="" placeholder="flag_probis">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="Aging Lelang">col</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" autocomplete="off" name="col" id="col12"
                                        class="form-control" required="" placeholder="col">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="Hasil Lelang">dpd</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" autocomplete="off" name="dpd" id="dpd12"
                                        class="form-control" required="" placeholder="dpd">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="Biaya Lelang">plafond</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" autocomplete="off" name="plafond" id="plafond12"
                                        class="form-control" required="" placeholder="plafond">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="pajak lelang">outstanding</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" autocomplete="off" name="outstanding" id="outstanding12"
                                        class="form-control" required="" placeholder="outstanding">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="nilai penjualan akhir">ckpn</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" autocomplete="off" name="ckpn"
                                        id="ckpn12" class="form-control" required=""
                                        placeholder="ckpn">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="nilai penjualan awal">jenis_jaminan</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" autocomplete="off" name="jenis_jaminan"
                                        id="jenis_jaminan12" class="form-control" required=""
                                        placeholder="jenis_jaminan">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="cut loss">keterangan_jaminan</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" autocomplete="off" name="keterangan_jaminan" id="keterangan_jaminan12"
                                        class="form-control" required="" placeholder="keterangan_jaminan">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="cut loss">lt</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" autocomplete="off" name="lt" id="lt12"
                                        class="form-control" required="" placeholder="lt">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="cut loss">lb</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" autocomplete="off" name="lb" id="lb12"
                                        class="form-control" required="" placeholder="lb">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="cut loss">alamat_jaminan</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" autocomplete="off" name="alamat_jaminan" id="alamat_jaminan12"
                                        class="form-control" required="" placeholder="alamat_jaminan">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="cut loss">periode_lelang_ke</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" autocomplete="off" name="periode_lelang_ke" id="periode_lelang_ke12"
                                        class="form-control" required="" placeholder="periode_lelang_ke">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="cut loss">tgl_collect_D</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" autocomplete="off" name="tgl_collect_D" id="tgl_collect_D123"
                                        class="form-control" required="" placeholder="tgl_collect_D">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="cut loss">tgl_order_apraisal</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" autocomplete="off" name="tgl_order_apraisal" id="tgl_order_apraisal12"
                                        class="form-control" required="" placeholder="tgl_order_apraisal">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="cut loss">mv</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" autocomplete="off" name="mv" id="mv12"
                                        class="form-control" required="" placeholder="mv">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="cut loss">lv</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" autocomplete="off" name="lv" id="lv12"
                                        class="form-control" required="" placeholder="lv">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="cut loss">penilai_apraisal</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" autocomplete="off" name="penilai_apraisal" id="penilai_apraisal12"
                                        class="form-control" required="" placeholder="penilai_apraisal">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="cut loss">tgl_memo_limit</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" autocomplete="off" name="tgl_memo_limit" id="tgl_memo_limit12"
                                        class="form-control" required="" placeholder="cut loss">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="cut loss">tgl_spk_bls</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" autocomplete="off" name="tgl_spk_bls" id="tgl_spk_bls12"
                                        class="form-control" required="" placeholder="cut loss">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="cut loss">bls</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" autocomplete="off" name="bls" id="bls12"
                                        class="form-control" required="" placeholder="cut loss">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="cut loss">tgl_somasi_bls</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" autocomplete="off" name="tgl_somasi_bls" id="tgl_somasi_bls12"
                                        class="form-control" required="" placeholder="tgl_somasi_bls">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="cut loss">tgl_permohonan_lelang</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" autocomplete="off" name="tgl_permohonan_lelang" id="tgl_permohonan_lelang12"
                                        class="form-control" required="" placeholder="tgl_permohonan_lelang">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="cut loss">tgl_pedaftaran_lelang</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" autocomplete="off" name="tgl_pedaftaran_lelang" id="tgl_pedaftaran_lelang12"
                                        class="form-control" required="" placeholder="tgl_pedaftaran_lelang">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="cut loss">nilai_limit_lelang</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" autocomplete="off" name="nilai_limit_lelang" id="nilai_limit_lelang12"
                                        class="form-control" required="" placeholder="nilai_limit_lelang">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="cut loss">tgl_penepatan_lelang</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" autocomplete="off" name="tgl_penepatan_lelang" id="tgl_penepatan_lelang12"
                                        class="form-control" required="" placeholder="tgl_penepatan_lelang">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="cut loss">tgl_lelang</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" autocomplete="off" name="tgl_lelang" id="tgl_lelang122"
                                        class="form-control" required="" placeholder="tgl_lelang">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="cut loss">tgl_pengumuman_lelang1</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" autocomplete="off" name="tgl_pengumuman_lelang1" id="tgl_pengumuman_lelang1122"
                                        class="form-control" required="" placeholder="tgl_pengumuman_lelang1">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="cut loss">tgl_pengumuman_lelang2</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" autocomplete="off" name="tgl_pengumuman_lelang2" id="tgl_pengumuman_lelang2122"
                                        class="form-control" required="" placeholder="tgl_pengumuman_lelang2">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="cut loss">hasil_lelang</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" autocomplete="off" name="hasil_lelang" id="hasil_lelang12"
                                        class="form-control" required="" placeholder="hasil_lelang">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="cut loss">terjual_lelang</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" autocomplete="off" name="terjual_lelang" id="terjual_lelang12"
                                        class="form-control" required="" placeholder="terjual_lelang">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="cut loss">keterangan</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" autocomplete="off" name="keterangan" id="keterangan12"
                                        class="form-control" required="" placeholder="keterangan">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="cut loss">biaya_lelang</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" autocomplete="off" name="biaya_lelang" id="biaya_lelang12"
                                        class="form-control" required="" placeholder="biaya_lelang">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="cut loss">pajak_lelang</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" autocomplete="off" name="pajak_lelang" id="pajak_lelang12"
                                        class="form-control" required="" placeholder="pajak_lelang">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="cut loss">cutloos</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" autocomplete="off" name="cutloos" id="cutloos12"
                                        class="form-control" required="" placeholder="cutloos">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="cut loss">last_status</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" autocomplete="off" name="last_status" id="last_status12"
                                        class="form-control" required="" placeholder="last_status">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="cut loss">state_lelang</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" autocomplete="off" name="state_lelang" id="state_lelang12"
                                        class="form-control" required="" placeholder="state_lelang">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>
<div class="row">

    <!-- col-lg-4 end here -->
    <div class="col-lg-6 col-md-4 col-sm-12">
        <!-- col-lg-4 start here -->
        <div class="panel panel-danger toggle panelMove panelClose panelRefresh">
            <!-- Start .panel -->
            <div class="panel-heading" style="background-color: red;">
                <h4 class="panel-title"><i class="glyphicon glyphicon-user"></i>Data Nasabah</h4>
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
                                        <input type="text" readonly="" class="form-control" name="NomorNasabah"
                                            value="<?php echo $row->NomorNasabah ?>" placeholder="NomorNasabah">
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
                                        <input type="text" id="NamaDebitur" class="form-control" name="NamaDebitur"
                                            value="<?php echo $row->NamaDebitur ?>" readonly=""
                                            placeholder="Nama Nasabah">
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
                                        <input type="text" id="hasil_kunjungan" class="form-control"
                                            value="<?php echo $row->COMPANY_NAME ?>" readonly=""
                                            placeholder="Hasil Kunjungan">
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
                <h4 class="panel-title"><i class="fa fa-building"></i>Detail Dokumen Lelang</h4>
            </div>
            <div class="panel-body">
                <div class="row profile">

                    <div class="panel-body">

                        <table class="table table-striped table-bordered data-server-side dataTable no-footer">
                            <thead>

                                <tr>
                                    <th class="text-center" style="min-width: 80px; ">Aksi
                                    </th>
                                    <th style="min-width: 120px;">No Nasabah</th>
                                    <th style="min-width: 120px;">Nama Debitur</th>

                                </tr>
                            </thead>
                            <tbody>


                                <?php foreach ($dokumen as $dok){ ?>
                                <tr>
                                    <td>
                                        <a href="<?php echo base_url("Lelang/viewimagesession_param/") . $dok->id_t_lelang . '-' . $dok->cif ?>"
                                            button type="button" style="background-color: #0bacd3;"
                                            class="btn btn-primary">view file</button>
                                        </a>
                                    </td>
                                    <td><?php echo $dok->cif ?></td>
                                    <td style="min-width: 150px;"><?php echo  $dok->nama_debitur ?></td>


                                </tr>
                                <?php }?>
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
                    <form action="<?php echo base_url('Lelang/insert_data'); ?>" method="post"
                        enctype="multipart/form-data">
                        <!-- Start .row -->
                        <div class="col-md-12">
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="tujuan">no_ld</label>
                                </div>
                                <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input name="no_ld" id="no_ld" autocomplete="off"  value="<?php echo $row->id  ?>"
                                                pattern="[a-zA-Z0-9]{1,100}" title="erorr" class="form-control"
                                                type="text" placeholder="..." required
                                                oninvalid="this.setCustomValidity('Karakter tidak di izinkan')"
                                                oninput="setCustomValidity('')">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="Flag Register">cif</label>
                                </div>
                                <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input id="cif" value="<?php echo $row->NomorNasabah  ?>" name="cif" autocomplete="off" pattern="[a-zA-Z0-9]{1,100}"
                                                title="erorr" class="form-control" type="text" placeholder="..."
                                                required oninvalid="this.setCustomValidity('Karakter tidak di izinkan')"
                                                oninput="setCustomValidity('')">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="Periode Lelang">cabang</label>
                                </div>
                                <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input id="cabang" value="<?php echo $row->COMPANY_NAME ?>" name="cabang" type="text" autocomplete="off"
                                                class="form-control" placeholder="...">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="Aging Lelang">nama_debitur</label>
                                </div>
                                <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input id="nama_debitur" value="<?php echo $row->NamaDebitur ?>" name="nama_debitur" autocomplete="off"
                                                title="erorr" class="form-control"
                                                type="text" >

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="Hasil Lelang">fasilitas_pinjaman</label>
                                </div>
                                <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input id="fasilitas_pinjaman" name="fasilitas_pinjaman" autocomplete="off"
                                                pattern="[a-zA-Z0-9 ]{1,100}" title="erorr" class="form-control"
                                                type="text" placeholder="..." required
                                                oninvalid="this.setCustomValidity('Karakter tidak di izinkan')"
                                                oninput="setCustomValidity('')">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="Biaya Lelang">flag_probiz</label>
                                </div>
                                <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input id="flag_probis" name="flag_probis" autocomplete="off"
                                                pattern="[a-zA-Z0-9 ]{1,100}" title="erorr" class="form-control" type="text"
                                                placeholder="..." required
                                                oninvalid="this.setCustomValidity('Karakter tidak di izinkan')"
                                                oninput="setCustomValidity('')">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="pajak lelang">col</label>
                                </div>
                                <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input id="col" name="col" autocomplete="off" pattern="[,.0-9]{1,100}"
                                                title="erorr" class="form-control" type="text" placeholder="..."
                                                required oninvalid="this.setCustomValidity('Karakter tidak di izinkan')"
                                                oninput="setCustomValidity('')">

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="nilai penjualan akhir">dpd</label>
                                </div>
                                <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input name="dpd" id="dpd" autocomplete="off" pattern="[,.0-9]{1,100}"
                                                title="erorr" class="form-control" type="text" placeholder="..."
                                                required oninvalid="this.setCustomValidity('Karakter tidak di izinkan')"
                                                oninput="setCustomValidity('')">

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="nilai penjualan awal">plafond</label>
                                </div>
                                <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input name="plafond" id="plafond" autocomplete="off"
                                                pattern="[,.0-9]{1,100}" title="erorr" class="form-control" type="number"
                                                placeholder="..." required
                                                oninvalid="this.setCustomValidity('Karakter tidak di izinkan')"
                                                oninput="setCustomValidity('')">

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="cut loss">outstanding</label>
                                </div>
                                <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input name="outstanding" id="outstanding" autocomplete="off"
                                                pattern="[,.0-9]{1,100}" title="erorr" class="form-control" type="number"
                                                placeholder="..." required
                                                oninvalid="this.setCustomValidity('Karakter tidak di izinkan')"
                                                oninput="setCustomValidity('')">

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="Nama Dokumen">ckpn</label>
                                </div>
                                <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input name="ckpn" id="ckpn" autocomplete="off" pattern="[a-zA-Z0-9 ]{1,100}"
                                                title="erorr" class="form-control" type="number" placeholder="..."
                                                required oninvalid="this.setCustomValidity('Karakter tidak di izinkan')"
                                                oninput="setCustomValidity('')">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="Nama Dokumen">jenis_jaminan</label>
                                </div>
                                <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input name="jenis_jaminan" id="jenis_jaminan" autocomplete="off"
                                                pattern="[a-zA-Z0-9 ]{1,100}" title="erorr" class="form-control"
                                                type="text" placeholder="..." required
                                                oninvalid="this.setCustomValidity('Karakter tidak di izinkan')"
                                                oninput="setCustomValidity('')">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="Nama Dokumen">keterangan_jaminan</label>
                                </div>
                                <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input name="keterangan_jaminan" id="keterangan_jaminan" autocomplete="off"
                                                pattern="[a-zA-Z0-9  ]{1,100}" title="erorr" class="form-control"
                                                type="text" placeholder="..." required
                                                oninvalid="this.setCustomValidity('Karakter tidak di izinkan')"
                                                oninput="setCustomValidity('')">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="Nama Dokumen">lt</label>
                                </div>
                                <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input name="lt" id="lt" autocomplete="off"
                                                pattern="[a-zA-Z0-9 ]{1,100}" title="erorr" class="form-control"
                                                type="text" placeholder="..." required
                                                oninvalid="this.setCustomValidity('Karakter tidak di izinkan')"
                                                oninput="setCustomValidity('')">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="Nama Dokumen">lb</label>
                                </div>
                                <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input name="lb" id="lb" autocomplete="off" pattern="[a-zA-Z0-9 ]{1,100}"
                                                title="erorr" class="form-control" type="text" placeholder="..."
                                                required oninvalid="this.setCustomValidity('Karakter tidak di izinkan')"
                                                oninput="setCustomValidity('')">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="Nama Dokumen">alamat_jaminan</label>
                                </div>
                                <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input name="alamat_jaminan" id="alamat_jaminan" autocomplete="off"
                                                pattern="[a-zA-Z0-9 ]{1,100}" title="erorr" class="form-control"
                                                type="text" placeholder="..." required
                                                oninvalid="this.setCustomValidity('Karakter tidak di izinkan')"
                                                oninput="setCustomValidity('')">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="Nama Dokumen">periode_lelang_ke</label>
                                </div>
                                <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input name="periode_lelang_ke" id="periode_lelang_ke" autocomplete="off"
                                                pattern="[a-zA-Z0-9 ]{1,100}" title="erorr" class="form-control"
                                                type="text" placeholder="..." required
                                                oninvalid="this.setCustomValidity('Karakter tidak di izinkan')"
                                                oninput="setCustomValidity('')">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="Nama Dokumen">tgl_collect_D</label>
                                </div>
                                <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input name="tgl_collect_D" id="tgl_collect_D" autocomplete="off"
                                                pattern="[a-zA-Z0-9 ]{1,100}" title="erorr" class="form-control"
                                                type="date" placeholder="..." required
                                                oninvalid="this.setCustomValidity('Karakter tidak di izinkan')"
                                                oninput="setCustomValidity('')">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="Nama Dokumen">tgl_order_apraisal</label>
                                </div>
                                <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input name="tgl_order_apraisal" id="tgl_order_apraisal" autocomplete="off"
                                                pattern="[a-zA-Z0-9 ]{1,100}" title="erorr" class="form-control"
                                                type="date" placeholder="..." required
                                                oninvalid="this.setCustomValidity('Karakter tidak di izinkan')"
                                                oninput="setCustomValidity('')">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="Nama Dokumen">mv</label>
                                </div>
                                <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input name="mv" id="mv" autocomplete="off" pattern="[a-zA-Z0-9]{1,100}"
                                                title="erorr" class="form-control" type="number" placeholder="..."
                                                required oninvalid="this.setCustomValidity('Karakter tidak di izinkan')"
                                                oninput="setCustomValidity('')">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="Nama Dokumen">lv</label>
                                </div>
                                <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input name="lv" id="lv" autocomplete="off" pattern="[a-zA-Z0-9 ]{1,100}"
                                                title="erorr" class="form-control" type="number" placeholder="..."
                                                required oninvalid="this.setCustomValidity('Karakter tidak di izinkan')"
                                                oninput="setCustomValidity('')">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="Nama Dokumen">penilai_apraisal</label>
                                </div>
                                <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input name="penilai_apraisal" id="penilai_apraisal" autocomplete="off"
                                                pattern="[a-zA-Z0-9 ]{1,100}" title="erorr" class="form-control"
                                                type="text" placeholder="..." required
                                                oninvalid="this.setCustomValidity('Karakter tidak di izinkan')"
                                                oninput="setCustomValidity('')">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="Nama Dokumen">tgl_memo_limit</label>
                                </div>
                                <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input name="tgl_memo_limit" id="tgl_memo_limit" autocomplete="off"
                                                pattern="[a-zA-Z0-9 ]{1,100}" title="erorr" class="form-control"
                                                type="date" placeholder="..." required
                                                oninvalid="this.setCustomValidity('Karakter tidak di izinkan')"
                                                oninput="setCustomValidity('')">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="Nama Dokumen">tgl_spk_bls</label>
                                </div>
                                <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input name="tgl_spk_bls" id="tgl_spk_bls" autocomplete="off"
                                                pattern="[a-zA-Z0-9 ]{1,100}" title="erorr" class="form-control"
                                                type="date" placeholder="..." required
                                                oninvalid="this.setCustomValidity('Karakter tidak di izinkan')"
                                                oninput="setCustomValidity('')">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="Nama Dokumen">bls</label>
                                </div>
                                <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input name="bls" id="bls" autocomplete="off" pattern="[a-zA-Z0-9 ]{1,100}"
                                                title="erorr" class="form-control" type="text" placeholder="..."
                                                required oninvalid="this.setCustomValidity('Karakter tidak di izinkan')"
                                                oninput="setCustomValidity('')">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="Nama Dokumen">tgl_somasi_bls</label>
                                </div>
                                <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input name="tgl_somasi_bls" id="tgl_somasi_bls" autocomplete="off"
                                                pattern="[a-zA-Z0-9 ]{1,100}" title="erorr" class="form-control"
                                                type="date" placeholder="..." required
                                                oninvalid="this.setCustomValidity('Karakter tidak di izinkan')"
                                                oninput="setCustomValidity('')">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="Nama Dokumen">tgl_permohonan_lelang</label>
                                </div>
                                <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input name="tgl_permohonan_lelang" id="tgl_permohonan_lelang" type="date"
                                                autocomplete="off" pattern="[a-zA-Z0-9 ]{1,100}" title="erorr"
                                                class="form-control" type="text" placeholder="..." required
                                                oninvalid="this.setCustomValidity('Karakter tidak di izinkan')"
                                                oninput="setCustomValidity('')">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="Nama Dokumen">tgl_pedaftaran_lelang</label>
                                </div>
                                <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input name="tgl_pedaftaran_lelang" id="tgl_pedaftaran_lelang" type="date"
                                                autocomplete="off" pattern="[a-zA-Z0-9 ]{1,100}" title="erorr"
                                                class="form-control" type="text" placeholder="..." required
                                                oninvalid="this.setCustomValidity('Karakter tidak di izinkan')"
                                                oninput="setCustomValidity('')">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="Nama Dokumen">nilai_limit_lelang</label>
                                </div>
                                <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input name="nilai_limit_lelang" type="number" id="nilai_limit_lelang" autocomplete="off"
                                                pattern="[a-zA-Z0-9 ]{1,100}" title="erorr" class="form-control"
                                                type="number" placeholder="..." required
                                                oninvalid="this.setCustomValidity('Karakter tidak di izinkan')"
                                                oninput="setCustomValidity('')">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="Nama Dokumen">tgl_penepatan_lelang</label>
                                </div>
                                <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input name="tgl_penepatan_lelang" id="tgl_penepatan_lelang" type="date"
                                                autocomplete="off" pattern="[a-zA-Z0-9 ]{1,100}" title="erorr"
                                                class="form-control" type="text" placeholder="..." required
                                                oninvalid="this.setCustomValidity('Karakter tidak di izinkan')"
                                                oninput="setCustomValidity('')">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="Nama Dokumen">tgl_lelang</label>
                                </div>
                                <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input name="tgl_lelang" type="date" id="tgl_lelang" autocomplete="off"
                                                pattern="[a-zA-Z0-9 ]{1,100}" title="erorr" class="form-control"
                                                type="text" placeholder="..." required
                                                oninvalid="this.setCustomValidity('Karakter tidak di izinkan')"
                                                oninput="setCustomValidity('')">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="Nama Dokumen">tgl_pengumuman_lelang1</label>
                                </div>
                                <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input name="tgl_pengumuman_lelang1" type="date" id="tgl_pengumuman_lelang1"
                                                autocomplete="off" pattern="[a-zA-Z0-9 ]{1,100}" title="erorr"
                                                class="form-control" type="text" placeholder="..." required
                                                oninvalid="this.setCustomValidity('Karakter tidak di izinkan')"
                                                oninput="setCustomValidity('')">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="Nama Dokumen">tgl_pengumuman_lelang2</label>
                                </div>
                                <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input name="tgl_pengumuman_lelang2" type="date" id="tgl_pengumuman_lelang2"
                                                autocomplete="off" pattern="[a-zA-Z0-9 ]{1,100}" title="erorr"
                                                class="form-control" type="text" placeholder="..." required
                                                oninvalid="this.setCustomValidity('Karakter tidak di izinkan')"
                                                oninput="setCustomValidity('')">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="Nama Dokumen">hasil_lelang</label>
                                </div>
                                <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input name="hasil_lelang" id="hasil_lelang" autocomplete="off"
                                                pattern="[a-zA-Z0-9 ]{1,100}" title="erorr" class="form-control"
                                                type="text" placeholder="..." required
                                                oninvalid="this.setCustomValidity('Karakter tidak di izinkan')"
                                                oninput="setCustomValidity('')">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="Nama Dokumen">terjual_lelang</label>
                                </div>
                                <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input name="terjual_lelang" id="terjual_lelang" autocomplete="off"
                                                pattern="[a-zA-Z0-9 ]{1,100}" title="erorr" class="form-control"
                                                type="text" placeholder="..." required
                                                oninvalid="this.setCustomValidity('Karakter tidak di izinkan')"
                                                oninput="setCustomValidity('')">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="Nama Dokumen">keterangan</label>
                                </div>
                                <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input name="keterangan" id="keterangan" autocomplete="off"
                                                pattern="[a-zA-Z0-9 ]{1,100}" title="erorr" class="form-control"
                                                type="text" placeholder="..." required
                                                oninvalid="this.setCustomValidity('Karakter tidak di izinkan')"
                                                oninput="setCustomValidity('')">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="Nama Dokumen">biaya_lelang</label>
                                </div>
                                <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input name="biaya_lelang" id="biaya_lelang" autocomplete="off"
                                                pattern="[a-zA-Z0-9 ]{1,100}" title="erorr" class="form-control"
                                                type="text" placeholder="..." required
                                                oninvalid="this.setCustomValidity('Karakter tidak di izinkan')"
                                                oninput="setCustomValidity('')">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="Nama Dokumen">pajak_lelang</label>
                                </div>
                                <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input name="pajak_lelang" id="pajak_lelang" autocomplete="off"
                                                pattern="[a-zA-Z0-9 ]{1,100}" title="erorr" class="form-control"
                                                type="text" placeholder="..." required
                                                oninvalid="this.setCustomValidity('Karakter tidak di izinkan')"
                                                oninput="setCustomValidity('')">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="Nama Dokumen">cutloos</label>
                                </div>
                                <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input name="cutloos" id="cutloos" autocomplete="off"
                                                pattern="[a-zA-Z0-9 ]{1,100}" title="erorr" class="form-control"
                                                type="text" placeholder="..." required
                                                oninvalid="this.setCustomValidity('Karakter tidak di izinkan')"
                                                oninput="setCustomValidity('')">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="Nama Dokumen">last_status</label>
                                </div>
                                <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input name="last_status" id="last_status" autocomplete="off"
                                                pattern="[a-zA-Z0-9 ]{1,100}" title="erorr" class="form-control"
                                                type="text" placeholder="..." required
                                                oninvalid="this.setCustomValidity('Karakter tidak di izinkan')"
                                                oninput="setCustomValidity('')">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="Nama Dokumen">state_lelang</label>
                                </div>
                                <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input name="state_lelang" id="state_lelang" autocomplete="off"
                                                pattern="[a-zA-Z0-9 ]{1,100}" title="erorr" class="form-control"
                                                type="text" placeholder="..." required
                                                oninvalid="this.setCustomValidity('Karakter tidak di izinkan')"
                                                oninput="setCustomValidity('')">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="Hasil Lelang">Input Dokumen</label>
                                </div>
                                <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="file" multiple="multiple" required="" id="myfile"
                                                class="form-control" name="myfile[]">
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
                                            <button type="submit" style="background-color:  green"
                                                class="btn btn-success btn-sm mr5 mb10"><i class="fa fa-save"></i>
                                                simpan</button>
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
                                <thead>
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
                <img id="image1" alt="image alt" class="img-responsive">
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
<script src="<?php echo base_url('bst/Bootstrap/admin-html/plugins/forms/checkall/jquery.checkAll.js') ?>"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable({
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],
        //            "order": false,
        "columnDefs": [{
            "targets": [1, 2, 3, 4, 5, 6, 7, 8, 9], //first column / numbering column
            "orderable": false //set not orderable

        }],
        columnDefs: [{
            targets: 0,
            sortable: false
        }, ],
        order: [
            [1, "asc"]
        ]
    });

    $('#lightbox1').on('show.bs.modal', function(event) {
        var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
        var modal = $(this);

        //alert(div.data('sp'));

        // Isi nilai pada field
        modal.find('#image1').attr("src", div.data('img'));

    });

    $('#ModalAgent1').on('show.bs.modal', function(event) {
        var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
        var modal = $(this);
        modal.find('#id_t_lelang12').val(div.data('id_t_lelang2'));
        modal.find('#no_ld12').val(div.data('no_ld2'));
        modal.find('#cif12').val(div.data('cif2'));
        modal.find('#cabang12').val(div.data('cabang2'));
        modal.find('#nama_debitur12').val(div.data('nama_debitur2'));
        modal.find('#fasilitas_pinjaman12').val(div.data('fasilitas_pinjaman2'));
        modal.find('#flag_probis12').val(div.data('flag_probis2'));
        modal.find('#col12').val(div.data('col2'));
        modal.find('#dpd12').val(div.data('dpd2'));
        modal.find('#plafond12').val(div.data('plafond2'));
        modal.find('#outstanding12').val(div.data('outstanding2'));
        modal.find('#ckpn12').val(div.data('ckpn2'));
        modal.find('#jenis_jaminan12').val(div.data('jenis_jaminan2'));
        modal.find('#keterangan_jaminan12').val(div.data('keterangan_jaminan2'));
        modal.find('#lt12').val(div.data('lt2'));
        modal.find('#lb12').val(div.data('lb2'));
        modal.find('#alamat_jaminan12').val(div.data('alamat_jaminan2'));
        modal.find('#periode_lelang_ke12').val(div.data('periode_lelang_ke2'));
        modal.find('#tgl_collect_D123').val(div.data('collect_D_tgl2'));
        modal.find('#tgl_order_apraisal12').val(div.data('tgl_order_apraisal2'));
        modal.find('#mv12').val(div.data('mv2'));
        modal.find('#lv12').val(div.data('lv2'));
        modal.find('#penilai_apraisal12').val(div.data('penilai_apraisal2'));
        modal.find('#tgl_memo_limit12').val(div.data('tgl_memo_limit2'));
        modal.find('#tgl_spk_bls12').val(div.data('tgl_spk_bls2'));
        modal.find('#bls12').val(div.data('bls2'));

        modal.find('#tgl_somasi_bls12').val(div.data('tgl_somasi_bls2'));
        modal.find('#tgl_permohonan_lelang12').val(div.data('tgl_permohonan_lelang2'));

        modal.find('#tgl_pedaftaran_lelang12').val(div.data('tgl_pedaftaran_lelang2'));
        modal.find('#nilai_limit_lelang12').val(div.data('nilai_limit_lelang2'));
        modal.find('#tgl_somasi_bls12').val(div.data('tgl_somasi_bls2'));
        modal.find('#tgl_penepatan_lelang12').val(div.data('tgl_penepatan_lelang2'));

        modal.find('#tgl_lelang12').val(div.data('tgl_lelang'));
        modal.find('#tgl_pengumuman_lelang1122').val(div.data('tgl_pengumuman_lelang122'));
        modal.find('#tgl_pengumuman_lelang2122').val(div.data('tgl_pengumuman_lelang222'));
        modal.find('#hasil_lelang').val(div.data('hasil_lelang2'));

        modal.find('#terjual_lelang21').val(div.data('terjual_lelang2'));
        modal.find('#keterangan12').val(div.data('keterangan2'));
        modal.find('#biaya_lelang12').val(div.data('biaya_lelang2'));
        modal.find('#pajak_lelang12').val(div.data('pajak_lelang2'));

        modal.find('#cutloos1').val(div.data('cutloos'));
        modal.find('#last_status1').val(div.data('last_status'));
        modal.find('#state_lelang1').val(div.data('state_lelang'));


        //$('#jenissp1').trigger('change');//.change();//trigger('update.fs');//.selectpicker("refresh");
    });



});
</script>