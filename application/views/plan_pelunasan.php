
<?php echo $this->session->flashdata('message'); ?>
<?php // echo form_open("content/assign_debitur", "id='swa-campur'")   ?> 

<!-- Modal1 -->
<div class="modal fade" id="ModalAgent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="imp_submit" action="<?php echo base_url("content/updateplunasan"); ?>" method="post" >
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title" id="exampleModalLabel">PROOF CALL AREA</h5>

                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-lg-4">
                            <label class="control-label"> Validasi No Telepon</label>
                        </div>
                        <div class="col-lg-8">
                            <div class="radio-custom radio-inline">
                                <input type="radio" name="radio1" value="Ya" id="radio4">
                                <label for="radio4">Ya</label>
                            </div>
                            <div class="radio-custom radio-inline">
                                <input type="radio" name="radio1" value="Tidak" id="radio5">
                                <label for="radio5">Tidak</label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <label class=" control-label">FC VISIT</label>
                        </div>
                        <div class="col-lg-8">
                            <div class="radio-custom radio-inline">
                                <input type="radio" name="radio2" value="Ya" id="radio6">
                                <label for="radio6">Ya</label>
                            </div>
                            <div class="radio-custom radio-inline">
                                <input type="radio" name="radio2" value="Tidak" id="radio7">
                                <label for="radio7">Tidak</label>
                            </div> 
                        </div>
                        <div class="col-lg-4">
                            <label class=" control-label">Pengajuan Pelunasan</label>
                        </div>
                        <div class="col-lg-8">
                            <div class="radio-custom radio-inline">
                                <input type="radio" name="radio3" value="Ya" id="radio8">
                                <label for="radio8">Ya</label>
                            </div>
                            <div class="radio-custom radio-inline">
                                <input type="radio" name="radio3" value="Tidak" id="radio9">
                                <label for="radio9">Tidak</label>
                            </div> 
                        </div>

                        <div class="col-lg-4">
                            <label class=" control-label"> Nominal Pelunasan</label>
                        </div>
                        <div class="col-lg-8">
                            <input id="cif" name="cif" class="form-control" type="hidden"/>
                            <input name="nominalpelunaasan" class="form-control" type="text" />
                        </div>
                        <div class="col-lg-4">
                            <label class=" control-label">Validitas</label>
                        </div>
                        <div class="col-lg-8">
                            <div class="radio-custom radio-inline">
                                <input type="radio" name="radio4" value="VALID" id="radio10">
                                <label for="radio10">VALID</label>
                            </div>
                            <div class="radio-custom radio-inline">
                                <input type="radio" name="radio4" value="TIDAK VALID" id="radio11">
                                <label for="radio11">TIDAK VALID</label>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="simpan1" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>   
    </div>
</div>    
<!-- Modal 2 -->
<div class="modal fade" id="Modalpembelianjaminan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="imp_submit" action="<?php echo base_url("content/"); ?>" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title" id="exampleModalLabel">Validasi Pembeli Jaminan</h5>

                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-lg-4">
                            <label class=" control-label"> Validasi No Telepon</label>
                        </div>
                        <div class="col-lg-8">
                            <div class="radio-custom radio-inline">
                                <input type="radio" name="radio1" value="option1" id="radio4">
                                <label for="radio4">Ya</label>
                            </div>
                            <div class="radio-custom radio-inline">
                                <input type="radio" name="radio1" value="option2" id="radio5">
                                <label for="radio5">Tidak</label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <label class=" control-label">Pembelian Jaminan</label>
                        </div>
                        <div class="col-lg-8">
                            <div class="radio-custom radio-inline">
                                <input type="radio" name="radio1" value="option1" id="radio6">
                                <label for="radio6">Ya</label>
                            </div>
                            <div class="radio-custom radio-inline">
                                <input type="radio" name="radio1" value="option2" id="radio7">
                                <label for="radio7">Tidak</label>
                            </div> 
                        </div>
                        <div class="col-lg-4">
                            <label class=" control-label"> Nominal Pembelian</label>
                        </div>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" />
                        </div>
                    </div>
                </div>    
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>   
    </div>
</div>
<!-- Modal 3 -->
<div class="modal fade" id="Modalcallfieldcollection" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="imp_submit" action="<?php echo base_url("content/"); ?>" method="post" >
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title" id="exampleModalLabel">PROOF CALL FIELD COLLECTION</h5>

                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-lg-4">
                            <label class=" control-label"> Validasi No Telepon</label>
                        </div>
                        <div class="col-lg-8">
                            <div class="radio-custom radio-inline">
                                <input type="radio" name="radio1" value="option1" id="radio4">
                                <label for="radio4">Ya</label>
                            </div>
                            <div class="radio-custom radio-inline">
                                <input type="radio" name="radio1" value="option2" id="radio5">
                                <label for="radio5">Tidak</label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <label class=" control-label">FC VISIT</label>
                        </div>
                        <div class="col-lg-8">
                            <div class="radio-custom radio-inline">
                                <input type="radio" name="radio1" value="option1" id="radio6">
                                <label for="radio6">Ya</label>
                            </div>
                            <div class="radio-custom radio-inline">
                                <input type="radio" name="radio1" value="option2" id="radio7">
                                <label for="radio7">Tidak</label>
                            </div> 
                        </div>
                        <div class="col-lg-4">
                            <label class=" control-label">Nominal Pelunasan</label>
                        </div>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" />
                        </div>
                        <div class="col-lg-4">
                            <label class=" control-label">Validitas</label>
                        </div>
                        <div class="col-lg-8">
                            <div class="radio-custom radio-inline">
                                <input type="radio" name="radio1" value="option1" id="radio10">
                                <label for="radio10">VALID</label>
                            </div>
                            <div class="radio-custom radio-inline">
                                <input type="radio" name="radio1" value="option2" id="radio11">
                                <label for="radio11">TIDAK VALID</label>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Import</button>
                </div>
            </div>
        </form>   
    </div>
</div>    


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default plain toggle panelMove panelClose panelRefresh">
            <div class="panel-heading">
                <h4 class="panel-title">Data Plan Pelunasan</h4>
            </div>
            <div class="panel-body">

                <div class="form-group">
                    <div class="col-lg-12">
                        <table id="responsive" class="table table-bordered table-striped">
                            <thead>
                                <tr>	
                                    <th style=" min-width: 100px;" rowspan="2"> Action</th>
<!--                                    <th style=" min-width: 100px;"> Pilih</th>-->
                                    <th style=" min-width: 150px;" rowspan="2">Coverage</th>
                                    <th style=" min-width: 150px;" rowspan="2">Area </th>
                                    <th style=" min-width: 150px;" rowspan="2">Cabang</th>
                                    <th style=" min-width: 200px;" rowspan="2">Nama Nasabah</th>
                                    <th style=" min-width: 150px;" rowspan="2">Flag</th>
                                    <th style=" min-width: 150px;" rowspan="2">Os Awal</th>
                                    <th style=" min-width: 150px;" rowspan="2">Os Akhir</th>
                                    <th style=" min-width: 200px;" rowspan="2">No Telepon</th>
                                    <th style=" min-width: 200px;" rowspan="2">Ammount Collected</th>
                                    <th style=" min-width: 150px;" rowspan="2">Cut Loss</th>
                                    <th style=" min-width: 150px;" rowspan="2">Tanggal pelunasan</th>
                                    <th style=" min-width: 200px;" rowspan="2">Nama Pembeli Jaminan</th>
                                    <th style=" min-width: 150px;" rowspan="2">No Tlp Pembeli</th>
                                    <th style=" min-width: 150px;" colspan="5">Proof Call Area</th>
                                    <th style=" min-width: 200px;" colspan="3">Validasi Pembeli Jaminan</th>
                                    <th style=" min-width: 150px;" colspan="5">PROOF CALL FIELD COLLECTION</th>
                                </tr>
                                <tr>
                                    <th style=" min-width: 180px;">Validasi No Telepon </th>
                                    <th style=" min-width: 100px;">Fc Visit </th>
                                    <th style=" min-width: 200px;">Pengajuan Pelunasan </th>
                                    <th style=" min-width: 150px;">Nominal Pelunasan </th>
                                    <th style=" min-width: 150px;">Validitas </th>
                                    <th style=" min-width: 200px;">Validasi No. Telepon </th>
                                    <th style=" min-width: 150px;">Pembelian Jaminan</th>
                                    <th style=" min-width: 150px;">Nominal Pembelian</th>
                                    <th style=" min-width: 180px;">Validasi No Telepon </th>
                                    <th style=" min-width: 100px;">Fc Visit </th>
                                    <th style=" min-width: 200px;">Pengajuan Pelunasan </th>
                                    <th style=" min-width: 150px;">Nominal Pelunasan </th>
                                    <th style=" min-width: 150px;">Validitas </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($assignment as $item) { ?>
                                    <tr>
                                        <td class="text-center"> 
                                            <div class="btn-group dropup">
                                                <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu left" role="menu" style="overflow: visible !important">
                                                    <li><a type="button" data-toggle="modal" data-target="#ModalAgent"
                                                           data-cif="<?php echo $item->f_cif; ?>"
                                                           >Proof Call Area</a>
                                                    </li>
                                                    <li><a type="button" data-toggle="modal" data-target="#Modalpembelianjaminan">Validasi Pembeli Jaminan</a>
                                                    </li>
                                                    <li><a type="button" data-toggle="modal" data-target="#Modalcallfieldcollection">Proof Call Field Collection</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                    <!--                                        <td class="text-center" >
                         <input type="checkbox"  id="checkbox1.<?php echo $item->f_id ?>" value="<?php echo $item->f_id ?>" name="idnya[]" >
                     </td>-->
                                        <td><?php echo $item->cabang ?></td>
                                        <td><?php echo $item->cabang?></td>
                                        <td><?php echo $item->cabang ?></td>
                                        <td><?php echo $item->NamaDebitur ?></td>
                                        <td></td>
                                        <td></td>
                                        <td><?php echo $item->BakiDebet ?></td>
                                        <td><?php echo $item->f_no_tlp_debitur ?></td>
                                        <td></td>
                                        <td></td>
                                        <td><?php echo $item->f_date_actionplan ?></td>
                                        <td></td>
                                        <td></td>
                                        <td><?php echo $item->f_validasi_telpon ?></td>
                                        <td><?php echo $item->f_fc_visit ?></td>
                                        <td><?php echo $item->f_actionplan ?></td>
                                        <td><?php echo $item->f_nominal_pelunasan ?></td>
                                        <td><?php echo $item->f_validitas ?></td>
                                        <td><?php echo $item->f_validitasnotlppembelian ?></td>
                                        <td></td>
                                        <td></td>
                                        <td><?php echo $item->f_validasi_tlp_ckc ?></td>
                                        <td><?php echo $item->f_fc_visit2 ?></td>
                                        <td><?php echo $item->f_actionplan ?></td>
                                        <td><?php echo $item->f_nominal_pelunasan ?></td>
                                        <td><?php echo $item->f_validitas2 ?></td>

        <!--                                        <td><button type="button" class="btn btn-info waves-effect" data-toggle="modal" data-target="#modaleditfamily"
            data-idnumber="<?php echo $f['fld_idnumber']; ?>"
            data-nama="<?php echo $f['fld_membername']; ?>"
            data-gender="<?php echo $f['fld_gender']; ?>"
            data-relationship="<?php echo $f['fld_relationship']; ?>"
            data-nik="<?php echo $f['fld_nik']; ?>"
            data-id="<?php echo $f['fld_id']; ?>"
            ><i class="material-icons">mode_edit</i></button>
        </center></td>-->
                                    </tr>                            
                                <?php } ?>
                            </tbody>
                        </table> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<br>
<br>
<br>
<br>
<br>

<?php // echo form_close() ?>


<script>
    $(document).ready(function () {
        // Untuk sunting
        $('#ModalAgent').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal = $(this)

            // Isi nilai pada field
            modal.find('#cif').attr("value", div.data('cif'));

        });


    });
</script>
