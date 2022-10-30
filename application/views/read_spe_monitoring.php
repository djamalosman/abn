<?php echo $this->session->flashdata('message'); ?>
<div class="container-fluid">    
    <!-- Modal -->

    <form action="<?php echo base_url('content/delete_multi_sp_administration'); ?>" method="post" >
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-danger toggle panelMove panelClose panelRefresh">
                    <div class="panel-heading" style="background-color: red;">
                        <h4 class="panel-title"><i class="fa fa-files-o"></i>SPe Monitoring</h4>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="col-lg-12" style="margin-bottom: 20px;">
                                <a href='<?php echo base_url("downloadexcel/excel_monitoringspe"); ?>' type="button" style="background-color: #0bacd3; height: 29px" class="btn btn-primary"><i class="fa fa-download"></i>  Download Excel</a>
                            </div>
                        </div>
                        <div class="form_group">
                            <table id="example" class="table table-striped table-bordered data-server-side">
                                <thead>
                                    <tr>
                                        <th style="min-width: 100px;">Action</th>
                                        <th style="min-width: 100px;">No Surat</th>
                                        <th style="min-width: 70px;">Jenis SP</th>
                                        <th >CIF</th>
                                        <th style="min-width: 150px;">Nama Nasabah</th>
                                        <th>Cabang</th>
                                        <th>DPD</th>
                                        <th style="min-width: 160px;">Tanggal Angsuran</th>
                                        <th style="min-width: 100px;">Status</th>
                                        <th>View</th>
                                        <th style="min-width: 100px;">Tanggal Terbit</th>
                                        <th style="min-width: 100px;">Tanggal Cetak</th>
                                        <th style="min-width: 100px;">Tanggal Kirim</th>
                                        <th style="min-width: 100px;">Tanggal Terima</th>
                                        <th style="min-width: 130px;">Tanggal Return</th>
                                        <th style="min-width: 160px;">Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($sp as $item) { ?>
                                        <tr>
                                            <td><a title="Edit" data-toggle="modal" data-target="#modals4" 
                                                   data-id = '<?php echo $item->spid; ?>'
                                                   data-nomer = '<?php echo $item->f_nomer; ?>'
                                                   data-jabatan1 = '<?php echo $item->f_jabatan_1; ?>'
                                                   data-namaasign1 = '<?php echo $item->f_nama_asign_1; ?>'
                                                   data-jabatan2 = '<?php echo $item->f_jabatan_2; ?>'
                                                   data-namaasign2 = '<?php echo $item->f_nama_asign_2; ?>'

                                                   ><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                </a><a title="Cetak" <?php
                                                if ($item->f_status != 0) {
                                                    echo "href = '#'";
                                                } else {
                                                    echo 'href =' . base_url('spe/update_cetak/' . $item->spid);
                                                }
                                                ?> ><i class="fa fa-print" aria-hidden="true"></i></a>
                                                <a title="Kirim" <?php
                                                if ($item->f_status == 1) {
                                                    echo 'data-toggle="modal" data-target="#modals2" 
                                                   data-id = ' . $item->spid;
                                                } else {
                                                    echo "href = '#'";
                                                }
                                                ?> > <i class="fa fa-send"> </i></a>
                                                <a <?php
                                                if ($item->f_status == 2) {
                                                    echo 'data-toggle="modal" data-target="#modals1" 
                                                   data-id = ' . $item->spid;
                                                } else {
                                                    echo "href = '#'";
                                                }
                                                ?>  title="Terkirim"  > <i class="glyphicon  glyphicon-map-marker"></i></a>
                                                <!--<a title="Percepatan" <?php
                                                if ($item->f_status == 3) {
                                                    echo 'data-toggle="modal" data-target="#modals1" 
                                                   data-id = ' . $item->spid;
                                                } else {
                                                    echo "href = '#'";
                                                }
                                                ?>  ><i class="glyphicon glyphicon-fast-forward"></i></a>-->
                                            </td>
                                            <td><?php echo $item->f_nomer ?></td>
                                            <td><?php echo $item->f_sp ?></td>                                     
                                            <td><?php echo $item->f_cif ?></td>
                                            <td><?php echo $item->f_nama_nasabah ?></td>
                                            <td><?php echo $item->f_cabang ?></td>
                                            <td><?php echo $item->f_dpd ?></td>
                                            <td><?php echo $item->f_tgl_angsuran ?></td>
                                            <td><?php
                                                if ($item->f_status == 0) {
                                                    echo 'Belum Tercetak';
                                                } elseif ($item->f_status == 1) {
                                                    echo 'Sudah Tercetak';
                                                } elseif ($item->f_status == 2) {
                                                    echo 'Kirim';
                                                } elseif ($item->f_status == 3) {
                                                    echo 'Di Terima';
                                                }
                                                ?></td>

                                            <td><center><a <?php
                                        if ($item->f_status == 0) {
                                            echo "href= '#'";
                                            ?>
                                                ><i class="glyphicon  glyphicon-eye-close"></i> 
                                                    <?php
                                                } else {
                                                    echo "href= '" . base_url('generatepdf/spe/' . $item->spid . '/' . $item->f_sp) . "' target = '_blank'";
                                                    ?>
                                                ><i class="glyphicon  glyphicon-eye-open"></i> <?php } ?></a></center></td>
                                    <td><?php echo $item->f_date_time ?></td>
                                    <td><?php echo $item->f_tgl_cetak ?></td>
                                    <td><?php echo $item->f_tgl_kirim ?></td>
                                    <td><?php echo $item->f_tgl_terima ?></td>
                                    <td><?php echo $item->f_tgl_update ?></td>
                                    <td><?php echo $item->f_keterangan ?></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <?php echo form_open("content/delete_multi_sp_administration", "id='swa-confirmzzz'") ?>
    <div >
        <div style="position: absolute; width: 100%; overflow: auto;" >
            <table id="responsive" class="table table-striped table-bordered data-server-side">
                <thead>
                    <tr>
                        <th class="text-center"><button type="submit" class="btn btn-danger px-1 py-0"><i class="fa fa-trash-o"></i></button></th>
                        <th>Aksi</th>
                        <th>Jenis SP</th>
                        <th>Produk</th>
                        <th>DPD Min</th>
                        <th>Masa Berlaku</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <?php echo form_close() ?>
    <!--</form>-->
</div>




<!--modals-->

<div  class="modal fade" id="modals1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-center">
        <form action=" <?php echo base_url('spe/update_trima'); ?>" method="post">

            <div class="modal-content" style="width: 350px;">
                <div class="modal-header" style="background-color: red;">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="mySmallModalLabel" style="color: white"><i class="fa fa-users"></i>  SP Di Terima</h4>
                </div>
                <div class="modal-body">
                    <div style="width: 70px;"class="col-lg-1">
                        <label class=" control-label"> Keterangan</label>
                        <input type="hidden" name="id" id="id1" >
                    </div>
                    <div class="col-lg-4">
                        <textarea id="ket" name="ket" type="text" class=" form-control" placeholder="keterangan" style="width: 200px;" ></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <div style="margin-left: 200px;" class="col-lg-4">
                        <button  class="btn btn-success btn-sm mr5 mb10 " ><i class="fa fa-save"></i>   Simpan</button>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div> 
<div  class="modal fade" id="modals2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-center">
        <form action=" <?php echo base_url('spe/update_kirim'); ?>" method="post">

            <div class="modal-content" style="width: 350px;">
                <div class="modal-header" style="background-color: red;">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="mySmallModalLabel" style="color: white"><i class="fa fa-send"></i>  SP Di Kirim</h4>
                </div>
                <div class="modal-body">
                    <div style="width: 70px;"class="col-lg-1">
                        <label class=" control-label"> Keterangan</label>
                        <input type="hidden" name="id" id="id2" >
                    </div>
                    <div class="col-lg-4">
                        <textarea id="ket" name="ket" type="text" class=" form-control" placeholder="keterangan" style="width: 200px;" ></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <div style="margin-left: 200px;" class="col-lg-4">
                        <button  class="btn btn-success btn-sm mr5 mb10 " ><i class="fa fa-save"></i>   Simpan</button>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div> 
<div  class="modal fade" id="modals3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-center">
        <form action=" <?php echo base_url('spe/percepatan'); ?>" method="post">

            <div class="modal-content" style="width: 350px;">
                <div class="modal-header" style="background-color: red;">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="mySmallModalLabel" style="color: white"><i class="fa fa-send"></i>  SP Percepatan</h4>
                </div>
                <div class="modal-body">
                    
                    <div style="width: 70px;"class="col-lg-1">
                        <label class=" control-label"> Keterangan</label>
                        <input type="hidden" name="id" id="id2" >
                    </div>
                    <div class="col-lg-4">
                        <textarea id="ket" name="ket" type="text" class=" form-control" placeholder="keterangan" style="width: 200px;" ></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <div style="margin-left: 200px;" class="col-lg-4">
                        <button  class="btn btn-success btn-sm mr5 mb10 " ><i class="fa fa-save"></i>   Simpan</button>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div> 

<div  class="modal fade" id="modals4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-center">
        <form action=" <?php echo base_url('spe/asignspe'); ?>" method="post">

            <div class="modal-content" >
                <div class="modal-header" style="background-color: red;">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="mySmallModalLabel" style="color: white"><i class="fa fa-send"></i>  Sign SP</h4>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">
                        <div class="col-lg-6">
                            <div style="width: 130px;"class="col-lg-1">
                                <label class=" control-label"> Jabatan</label>
                                <input type="hidden" name="id" id="id4" >
                                <input type="hidden" name="nomersp" id="nomer4" >
                            </div>
                            <div class="col-lg-12">
                                <select name="jabatan1" id="jabatan1" class="form-control" required="">
                                    <?php foreach ($jabatan as $a) { ?>     
                                        <option value="<?php echo $a->f_desc ?>"><?php echo $a->f_desc ?></option>   
                                    <?php } ?>        
                                </select>     
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div style="width: 130px;"class="col-lg-1">
                                <label class=" control-label"> Nama</label>
                            </div>
                            <div class="col-lg-12">
                                <select name="namaasign1" id="namaasign1" class="form-control" required=""> 
                                    <?php foreach ($namaasignsp as $b) { ?>      
                                        <option value="<?php echo $b->f_desc ?>"><?php echo $b->f_desc ?></option>   
                                    <?php } ?>        
                                </select>     
                            </div>
                        </div>
						<div class="col-lg-6">
                            <div style="width: 130px;"class="col-lg-1">
                                <label class=" control-label">Contact Person</label>
                            </div>
                            <div class="col-lg-12">
                                <select name="namaasign2" id="namaasign2" class="form-control" required=""> 
                                    <?php foreach ($contactperson as $b) { ?>      
                                        <option value="<?php echo $b->f_desc ?>"><?php echo $b->f_desc ?></option>   
                                    <?php } ?>        
                                </select>     
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div style="margin-left: 100px;" class="col-lg-8">
                        <button  class="btn btn-success btn-sm mr5 mb10 " type="submit"><i class="fa fa-save"></i>   Simpan</button>
                        <button  class="btn btn-warning btn-sm mr5 mb10 " data-dismiss="modal" ><i class="fa fa-undo"></i>   Cancel</button>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div> 

<script src="<?php echo base_url('assets/jquery/jquery-2.2.3.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js') ?>"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#example').DataTable({"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]});

        $('#modals1').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal = $(this);
            modal.find('#id1').val(div.data('id'));
            //$('#jenissp1').trigger('change');//.change();//trigger('update.fs');//.selectpicker("refresh");
        });
        $('#modals2').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal = $(this);
            modal.find('#id2').val(div.data('id'));
            //$('#jenissp1').trigger('change');//.change();//trigger('update.fs');//.selectpicker("refresh");
        });
        
        $('#modals4').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal = $(this);
            modal.find('#id4').val(div.data('id'));
            modal.find('#nomer4').val(div.data('nomer'));
            modal.find('#jabatan1').val(div.data('jabatan1'));
            modal.find('#namaasign1').val(div.data('namaasign1'));
            modal.find('#namaasign2').val(div.data('namaasign2'));
            //$('#jenissp1').trigger('change');//.change();//trigger('update.fs');//.selectpicker("refresh");
        });

    });
</script>