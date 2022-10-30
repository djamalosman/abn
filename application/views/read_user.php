<?php echo $this->session->flashdata('message'); ?>
<!--  <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" /> -->

<div class="col-lg-12">
    <!-- Modal -->     
    <form action="<?php echo base_url("menu/excel_upload/t_user/menu/read_user"); ?>" method="post" enctype="multipart/form-data">
        <div class="modal fade" id="ModalAgent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h5 class="modal-title" id="exampleModalLabel">Upload Data User</h5>

                    </div>
                    <div class="modal-body">
                        <input type="file" name="file"/> 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Import Data</button>
                    </div>
                </div>
            </div>
        </div>    
    </form> 

    <?php echo form_open("userweb/delete_multiuser", "id='delet1'") ?>
    <div class="row">
        <div class=" col-lg-12">
            <div class="panel panel-danger toggle panelMove panelClose panelRefresh">
                <!-- Start .panel -->
                <div class="panel-heading" style="background-color: red;">
                    <h4 class="panel-title"><i class="fa fa-users"></i>Data User Web</h4>
                </div>
                <div class="panel-body">
                    <div   id="buttons">
                        <!--href="#<?php // echo base_url("menu/create_user")           ?>"--> 
                        <button class="btn btn-primary" style="height: 29px;" data-toggle="modal" data-target="#modalemployee" type="button" ><i class="fa fa-plus"></i>  Create User Web 
                        
						</button>
						<a href='<?php echo base_url("downloadexcel/excel_userweb"); ?>' type="button" style="background-color: #0bacd3; height: 29px" class="btn btn-primary"><i class="fa  fa-download"></i>  Download Excel</a>

                    </div>

                    <br>
                    <br>
                    <br>
                    <div class="col-lg-12">
                        <div id="buttons" title="download file"></div>
                        <table id="example" class="table table-striped table-bordered">
                            <thead>
                                <tr>	
                                    <th  class="text-center"><button type="button" style="margin-top: 10px" class="btn btn-danger btn-xs mr5 mb10" onclick="delet()" ><i class="fa fa-trash-o"></i></button></th>
                                    <th>Aksi</th>
									<th>Status Login</th>
                                    <th>Status User</th>
                                    <th>Respon</th>
                                    <th>Username</th>
                                    <th>Nama</th>
                                    <th>Level Admin</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($user_data as $item) { ?>
                                  <tr>			
                                    <td><center><input <?php
										if ($item->f_active === "0" or $item->f_active === "2") {
											echo 'hidden=""';
										}
										?> type="checkbox"  value="<?php echo $item->f_userid ?>" name="idnya[]"/></center>
									</td>
									
                                <td>
									<center>
										<a  title="edit" <?php
										if ($item->f_active == '1') {
											echo 'href="javascript: submitform(' . "'" . $item->f_userid . "'" . ')"';
										} else {
											echo 'href="javascript: submitform(' . "'" . $item->f_userid . "'" . ')"';
										}
										?> >
											<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
										</a>
									</center>
								</td>
								<td>
                                        <div class="toggle-custom" >
                                            <label class="toggle"  data-on="ONLINE" data-off="OFFLINE" >
                                                <input type="checkbox"  id="fixed-header-toggle<?php echo $item->f_userid; ?>" name="fixed-header-toggle" <?php echo $item->f_status_login == 1 ? 'onclick="updateonline_userweb(' . "'" . $item->f_userid . "'" . ')"  checked' : 'disabled="true"' ?>>
                                                <span class="button-checkbox" ></span>
                                            </label>
                                            <!--<label for="fixed-header-toggle">Fixed header</label>-->
                                        </div>
                                    </td>
                                <td> <?php
                                    if ($item->f_active == '1') {
                                        echo "<span class='badge badge-warning mr10 mb10' style='background-color: green;'>Active</span>";
                                    } elseif ($item->f_active == '0' or $item->f_active == '3') {
                                        echo "<span class='badge badge-success mr10 mb10' style='background-color: darkred;'>Not Active</span>";
                                    } elseif ($item->f_active == '2') {
                                        echo "<span class='badge badge-danger mr10 mb10' style='background-color: red;'>Delete</span>";
                                    }
                                    ?></td>
                                <td> 
                                    <!---->

                                    <?php
                                    if ($item->f_status_activity === '1' && $item->f_aprove === '0') {
                                        echo "<span class='badge badge-warning mr10 mb10' style='background-color: orange;'>Pending Approve</span>";
                                    } elseif ($item->f_status_activity === '1' && $item->f_aprove === '1') {
                                        echo "<span class='badge badge-warning mr10 mb10' style='background-color: greenyellow;'>Approved</span>";
                                    } elseif ($item->f_status_activity === '1' && $item->f_aprove === '2') {
                                        echo "<span class='badge badge-warning mr10 mb10' style='background-color: red;'>Reject</span>";
                                    } elseif ($item->f_status_activity === '2' && $item->f_aprove === '0') {
                                        echo "<span class='badge badge-warning mr10 mb10' style='background-color: orange;'>Pending Approve</span>";
                                    } elseif ($item->f_status_activity === '2' && $item->f_aprove === '1') {
                                        echo "<span class='badge badge-warning mr10 mb10' style='background-color: greenyellow;'>Approved</span>";
                                    } elseif ($item->f_status_activity === '2' && $item->f_aprove === '2') {
                                        echo "<span class='badge badge-warning mr10 mb10' style='background-color: red;'>Reject</span>";
                                    } elseif ($item->f_status_activity === '3' && $item->f_aprove === '0') {
                                        echo "<span class='badge badge-warning mr10 mb10' style='background-color: orange;'>Pending Approve</span>";
                                    } elseif ($item->f_status_activity === '3' && $item->f_aprove === '2') {
                                        echo "<span class='badge badge-warning mr10 mb10' style='background-color: red;'>Reject</span>";
                                    } elseif ($item->f_status_activity === '3' && $item->f_aprove === '1') {
                                        echo "<span class='badge badge-warning mr10 mb10' style='background-color: greenyellow;'>Approved</span>";
                                    }
                                    ?>  
                                </td>
                                <td><center> <?php echo $item->f_userid ?></center></td>
                                <td><center><?php echo $item->f_username ?></center></td>
                                <td><center><?php echo $item->levelname ?></center></td>
                                </tr>                            
                            <?php } ?>
                            </tbody>
                        </table> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo form_close() ?>


    <!-- ////////////////////////Modals////////////////////////////-->

    <div class="modal fade" id="modalemployee" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-center">

            <div class="modal-content">
                <div class="modal-header" style="background-color: red;">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="mySmallModalLabel" style="color: white"><i class="fa fa-users"></i>  Pilih Employee</h4>
                </div>
                <div class="modal-body">
                    <table id="example1" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Nik</th>
                                <th>Nama</th>
                                <th>Cabang</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($employee AS $item) { ?>
                                <tr>
                                    <td style="padding: 2px"><?php echo $item->nik ?></td>
                                    <td style="padding: 1px"><?php echo $item->full_name ?></td>
                                    <td style="padding: 1px"><?php echo $item->company_desc ?></td>
                                    <td style="padding: 1px"><center><a type="button" style="align-content: center" href="javascript: submitformadd ('<?php echo $item->nik ?>')"  class="btn btn-success btn-xs mr5 mb10"><i class="fa fa-plus"></i>  Add</a></center></td>
                            </tr>



                        <?php } ?>
                        </tbody>
                    </table>

                </div>
                <div class="modal-footer">
                </div>
            </div>
            <form action="<?php echo base_url('userweb/update_user'); ?>" method="post" id="edit">
                <input id="uid" name="uid" type="hidden" >
            </form>

            <form action="<?php echo base_url('userweb/create_user'); ?>" method="post" id="add">
                <input id="uid1" name="uid1" type="hidden" >
            </form>
			 <form action="<?php echo base_url('userweb/updateonline_userweb'); ?>" id="updateonline_userweb" method="post">
                    <input id="iduserweb21" name="iduserweb" type="hidden" >
             </form>
        </div>
    </div> 
</div>
<script type="text/javascript">$(document).ready(function () {
        $('#example').DataTable({
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            columnDefs: [
                {targets: 0, sortable: false},
            ],
            order: [[1, "asc"]]
        });
        $('#example1').DataTable({
        });
    });
</script>
<!--end modal-->
<script type="text/javascript">
		
		function updateonline_userweb(z) {
//            alert("test");
            var form = $('#updateonline_userweb');//event.target.form; // storing the form
            Swal.fire({
                title: 'Anda Yakin ?',
                text: "Ingin Me Reset Login Account Ini ",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, reset it!'
            }).then((result) => {
                if (result.value) {
                    $('#iduserweb21').val(z);
                    form.submit();
                } else {
                    form.submit();
//                    swal({
//                        position: 'top',
//                        title: 'Cancel',
//                        text: 'Anda Tidak Jadi Menghapus',
//                        type: 'error',
//                        showConfirmButton: false,
//                        timer: 1500,
//                        onOpen: function () {
//                            setTimeout(function () {
//                                swal.close()
//                            }, 2000)
//                        }
//                    });

                }
            })
        }
</script>
<script type="text/javascript">

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
        })

    }
    function submitform(id) {
        $('#uid').val(id);
        $('#edit').submit();

    }
    function submitformadd(d) {
        $('#uid1').val(d);
        $('#add').submit();

    }

</script>