<?php echo $this->session->flashdata('message'); ?>
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12">
        <!-- col-lg-4 start here -->
        <div class="panel panel-default plain">
            <!-- Start .panel -->
            <div class="panel-heading">
                <h4 class="panel-title bb">Profile Details</h4>
            </div>
            <div class="panel-body">
                <div class="row profile">
                    <!-- Start .row -->
                    <div class="col-md-4">
                        <div class="profile-avatar">
                            <img src="<?php echo base_url('bst/Bootstrap/admin-html/'); ?>img/avatars/user.png" alt="Avatar">
                            <p class="mt10">
                                Active
                                <span class="device">
                                    <i class="fa fa-user"></i>
                                </span>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="profile-name">
                            <h3><?php echo $depthead->full_name ?> </h3>
                            <label class="job-title mb0"> Birth Date <i class="fa fa-birthday-cake"></i> <?php echo $depthead->birth_date ?> </label> <br>
                            <label class="job-title mb0"> Job Title <i class="fa fa-building"></i> <?php //echo $depthead->f_jabatan ?> </label> <br>
                            <label class="job-title mb0"> No Induk Karyawan <i class="fa fa-user"></i> <?php echo $depthead->nik ?>  </label> <br>
                            <!--<label>No Induk Karyawan : </label>-->
                            <!--<label>099384938 </label>-->
<!--                            <a href="#" class="btn btn-primary btn-large mr10"> <i class="fa fa-envelope"></i> Send email</a>
                            <a href="#" class="btn btn-default btn-alt btn-large"> Send PM</a>-->
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="contact-info bt">
                            <div class="row">
                                <!-- Start .row -->
                                <div class="col-md-4">
                                    <dl class="mt20">
                                        <dt class="text-muted">No ID(KTP)</dt>
                                        <dd><?php echo $depthead->no_ktp ?> </dd>
                                        <dt class="text-muted">Phone</dt>
                                        <dd><?php echo $depthead->no_tlp ?> </dd>
                                        <dt class="text-muted">Mobile</dt>
                                        <dd><?php echo $depthead->no_tlp ?> </dd>
                                        <dt class="text-muted">Email</dt>
                                        <dd><?php echo $depthead->email ?> </dd>
                                        <!--                                        <dt class="text-muted">Fax</dt>
                                                                                <dd>(362)-666-347</dd>-->
                                    </dl>
                                </div>
                                <div class="col-md-8">
                                    <dl class="mt20">
                                        <dt class="text-muted">Departement </dt>
                                        <dd><?php echo $depthead->dept_desc ?> </dd>
                                        <dt class="text-muted">Divisi</dt>
                                        <dd><?php echo $depthead->div_desc ?> </dd>
                                        <dt class="text-muted">Directorate</dt>
                                        <dd><?php echo $depthead->directorate_desc ?> </dd>
                                        <dt class="text-muted">Position</dt>
                                        <dd><?php echo $depthead->position_desc ?> </dd>
                                    </dl>
                                </div>
                            </div>
                            <!-- End .row -->
                        </div>
                    </div>

                </div>
                <!-- End .row -->
            </div>
        </div>
        <!-- End .panel -->
        <div class="panel panel-default plain">
            <!-- Start .panel -->
            <div class="panel-heading">
                <h4 class="panel-title">Cabang </h4>
            </div>
            <div class="panel-body">
                <a  class="btn btn-success btn-xs mr5 mb10" type="button" data-toggle="modal" data-target="#modalcabang"><i class="fa fa-plus"></i><span> Add Cabang</span> </a>
                <form id="delete" action="<?php echo base_url('dephead/deletmcabang') ?>" method="post" class="form-horizontal group-border stripped">
                    <input type="hidden" name="nik" value="<?php echo $depthead->nik ?>" >
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="min-width: 0px;"><center><button class="btn btn-danger btn-xs mr5 mb10" type="button" onclick="delet()"><i class="fa fa-trash"></i></button></center></th>
                        <th style="min-width: 80px;">Kode Cabang</th>
                        <th style="min-width: 80px;">Nama Cabang</th>
                        <th style="min-width: 150px;">Alamat</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($branch AS $item) { ?>
                                <tr>
                                    <td><center><input type="checkbox" value="<?php echo $item->f_id ?>" name="idnya[]"/></center></td>
                            <td><center><?php echo $item->f_kode_cabang ?></center></td>
                            <td><center><?php echo $item->COMPANY_NAME ?></center></td>
                            <td><center><?php echo $item->NAME_ADDRESS ?></center></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
    <!-- End .panel -->

    <!-- col-lg-4 end here -->
    <!--    <div class="col-lg-6 col-md-6 col-sm-12">
         col-lg-4 start here 
        <div class="panel panel-default plain">
             Start .panel 
            <div class="panel-heading">
                <h4 class="panel-title">Settingan DPD Handle</h4>
            </div>
            <div class="panel-body">

                <div class="col-lg-12">
                    <div class=" form-group" >
                        <form action="<?php echo base_url('dephead/setdpd') ?>" method="POST" id="dpd">

                            <div class="col-lg-6">

                                 col-lg-6 start here 




                                <label for="f_desc" class="control-label">Select DPD Handel</label>

                                <select style=" height: 30px"  id="f_dpd" name="f_dpd" class="fancy-select form-control">

                                    <option value="Non">--Select--</option>

                                    <?php foreach ($parameter as $item) { ?>

                                        <option value="<?php echo $item->f_value ?>" <?php echo  $item->f_value == $depthead->f_value ? "selected" : ""   ?>><?php echo $item->f_desc ?></option>

                                    <?php } ?>

                                </select>
                                <input name="f_value" id="f_value" style="height: 30px;"   type="text" class="form-control" id="value" placeholder="Value">

                            </div>


                            <div class="col-lg-4">

                                 col-lg-6 start here 

                                <label for="input" class="control-label"></label>

                                <button type="submit" name="simpan" id="simpan" style="margin-top: 20px; height: 30px;" class="btn btn-success mr5 mb10" ><i class="fa fa-save"></i>  <span class="text">Simpan</span></button>

                                <input type="hidden" name="delete2" class="form-control" id="delete1">

                            </div>
                            <div class="col-lg-6">

                                 col-lg-6 start here 

                                <label for="f_desc" class="control-label">DPD Handel</label>

                                <input name="f_desc" id="f_desc" value="<?php echo  $depthead->f_value  ?>" style="height: 30px;" type="text" class="form-control" id="text" readonly placeholder="DPD Handle">

                            </div>

                        </form>
                    </div>

                </div>


                 End .row 
            </div>
        </div>
         End .panel 
    </div>-->
    <!-- col-lg-4 end here -->
    <div class="col-lg-6 col-md-6 col-sm-12">
        <!-- col-lg-4 start here -->
        <div class="panel panel-default plain">
            <!-- Start .panel -->
            <div class="panel-heading">
                <h4 class="panel-title">User Collector</h4>
            </div>
            <div class="panel-body">

                <table id="example1" class="table table-striped table-bordered data-server-side">
                    <thead>
                        <tr>
                            <th>ID USER</th>
                            <th>Nama Collector</th>
                            <th>Kode Cabang</th>
                            <th>Cabang</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($agent as $item) { ?> 
                            <tr>
                                <td><?php echo $item->f_agentid ?></td>
                                <td><?php echo $item->f_agentname ?></td>
                                <td><?php echo $item->f_branch_id ?></td>
                                <td><?php echo $item->cabang ?></td>
                            </tr>

                        <?php } ?>
                    </tbody>
                </table>

                <!-- End .row -->
            </div>
        </div>
        <!-- End .panel -->
    </div>
</div>
<!-- /////////Modal Tambah Cabang/////////// -->

<!-- ////////////////////////Modals////////////////////////////-->

<div class="modal fade" id="modalcabang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-center">
        <form action="<?php echo base_url('dephead/tambahcabang')?>" method="post">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="mySmallModalLabel">Tambah Cabang</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="nik" value="<?php echo $depthead->nik ?>" >
                    <table id="example" class="table table-striped table-bordered data-server-side">
                        <thead>
                            <tr>
                                <th  style="min-width: 0px;">Pilih</th>
                                <th style="min-width: 80px;">Code Cabang</th>
                                <th style="min-width: 80px;">Nama Cabang</th>
                                <th style="min-width: 150px;">Alamat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($cabang AS $item) { ?>
                                <tr>
                                    <td><center><input type="checkbox" value="<?php echo $item->ID ?>" name="idnya[]"/></center></td>
                            <td><center><?php echo $item->ID ?></center></td>
                            <td><center><?php echo $item->COMPANY_NAME ?></center></td>
                            <td><center><?php echo $item->NAME_ADDRESS ?></center></td>
                            </tr>

                        <?php } ?>
                        </tbody>
                    </table>

                </div>
                <div class="modal-footer">
                    <a type="button" class="btn btn-default" data-dismiss="modal">Close</a>
                    <button type="submit" class="btn btn-primary"><i class=" fa fa-save">simpan</i></button>
                </div>
            </div>
        </form>

    </div>
</div> 

<!-- //////////////// Script js //////////////////// -->


<script src="<?php echo base_url('assets/jquery/jquery-2.2.3.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js') ?>"></script>
<script type="text/javascript">

                                    function delet() {
                                        //event.preventDefault(); // prevent form submit
                                        var form = $('#delete');//event.target.form; // storing the form
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
                                        })
                                    }

                                    $(document).ready(function () {
                                        $('#example').DataTable({
                                            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
//            "order": false,
                                            "columnDefs": [{
                                                    "targets": [0], //first column / numbering column
                                                    "orderable": false //set not orderable

                                                }],
                                            "order": [[1, "asc"]]
                                        });
                                        $('#example1').DataTable({
                                            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
//            "order": false,
                                            "columnDefs": [{
                                                    "targets": [0], //first column / numbering column
                                                    "orderable": false //set not orderable

                                                }],
                                            "order": [[1, "asc"]]
                                        });
                                    });</script>