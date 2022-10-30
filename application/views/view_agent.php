<?php echo $this->session->flashdata('message'); ?>

<head>

    <!-- <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" /> -->



    <style type="text/css">

        .scrollmenu {

            overflow: auto;

            white-space: nowrap;

        }

        .clone .fixed-side {

            border:1px solid #000;

            background:#eee;

            visibility:visible;

        }

    </style>

</head>

<body >

    <div class="col-lg-12">

        <!-- col-lg-12 start here -->

        <div class="panel panel-danger toggle panelMove panelClose panelRefresh">

            <!-- Start .panel -->

            <div class="panel-heading" style="background-color: red;">
                <h4 class="panel-title"><i class="fa fa-users"></i>Data User Mobile</h4>
            </div>

            <div class="scrollmenu">

                <div class="panel-body">



                    <div class="">

    <!-- <a href="<?php echo base_url("content/create_mntr_lelang") ?>" button type="button" style="background-color: #0bacd3;" class="btn btn-primary btn-xs mr2 mb10">Create Lelang</button></a> -->

                        <div id="buttons">

                            <a href="<?php echo base_url("usermobile/create_collector") ?>" button type="button" style="background-color: #0bacd3; height: 29px;" class="btn btn-primary"><i class="fa fa-plus"></i>  Create User Mobile </a>
                            <a href="<?php echo base_url("downloadexcel/excel_usermobile"); ?>" type="button" style="background-color: #0bacd3; height: 29px" class="btn btn-primary"><i class="fa  fa-download"></i>  Download Excel</a>

                        </div>

                        <br>

                        <br>

                        <?php // echo form_open("content/delete_multi_um_agent", "id='swa-confirm'")   ?>
                        <form action="<?php echo base_url('usermobile/delete_multi_um_agent') ?>" method="POST" id="delet">


                            <div id="buttons" title="download file"></div>

                            <table id="example"  class="table nowrap table-bordered" style="width:100%;border: 2px;">

                                <thead>

                                    <tr>

                                        <th class="text-center"><button onclick="delet()" type="button" class="btn btn-danger btn-xs mr5 mb10" style="margin-top:  10px;"><i class="fa fa-trash-o"></i></button></th>

                                        <th>No</th>
                                        <th>Status Online</th>
                                        <th>Aksi</th>

                                        <th>Status</th>
                                        <th>Respon</th>

                                        <th>NIK</th>

                                        <th>Nama Agen</th>
                                        <th>Dept Head</th>

                                        <th>Jabatan</th>

                                        <th>Cabang</th>

                                        <th>ID Cabang</th>

                                        <th>Username</th>

                                        <th>Email</th>

                                        <th>No HP</th>

                                        <th>IMEI</th>

                                        <th>Serial Number HP</th>

                                    </tr>

                                </thead>



                                <tbody>

                                    <?php
                                    $a = 1;
                                    foreach ($agent as $item) {
                                        ?> 

                                        <tr>
                                            <td class="text-center" >
                                                <input <?php
                                                if ($item->f_active == "0" or $item->f_active == "2" or $item->f_active == "3") {
                                                    echo 'hidden=""';
                                                }
                                                ?> type="checkbox" value="<?php echo $item->f_agentid ?>" name="idnya[]"/>

                                            </td>
                                            <td><center><?php echo $a++; ?></center></td>

									<td>
                                        <div class="toggle-custom" >
                                            <label class="toggle"  data-on="ONLINE" data-off="OFFLINE" >
                                                <input type="checkbox"  id="fixed-header-toggle<?php echo $item->f_agentid; ?>" name="fixed-header-toggle" <?php echo $item->f_status == 1 ? 'onclick="updateonline(' . "'" . $item->f_agentid . "'" . ')"  checked' : 'disabled="true"' ?>>
                                                <span class="button-checkbox" ></span>
                                            </label>
                                            <!--<label for="fixed-header-toggle">Fixed header</label>-->
                                        </div>
                                    </td>
                                    <td class="text-center" style=" display:<?php echo $this->session->userdata('allowedit'); ?>"> 
                                        <a title="Edit" type="button" class="btn btn-warning btn-xs mr5 mr10" <?php
                                        if ((int) $item->f_active1 != 3) {
                                            echo 'href="javascript: formsubmit(' . "'" . $item->f_agentid . "'" . ')"';
                                        } else {
                                            echo '';
                                        }
                                        ?> ><i class="fa fa-pencil-square-o" ></i></a>
                                        <a title="Detail Assignment" type="button" class="btn btn-primary btn-xs mr5 mr10" <?php
                                        if ((int) $item->f_active1 == 1) {
                                            echo 'href="javascript: formsubmit_detail(' . "'" . $item->f_agentid . "'" . ')"';
                                        } else {
                                            echo '';
                                        }
                                        ?>  ><i class="fa fa-list" ></i></a>
                                    </td>
                                    <td> <?php
                                        if ((int) $item->f_active1 == 1) {
                                            echo "<span class='badge badge-warning mr10 mb10' style='background-color: green;'>Active</span>";
                                        } elseif ((int) $item->f_active1 == 0 || (int) $item->f_active1 == 2) {
                                            echo "<span class='badge badge-success mr10 mb10' style='background-color: darkred;'>Not Active</span>";
                                        } elseif ((int) $item->f_active1 == 3) {
                                            echo "<span class='badge badge-danger mr10 mb10' style='background-color: red;'>Delete</span>";
                                        }
                                        ?>
                                    </td>
                                    <td> 
                                        <!---->

                                        <?php
                                        if ($item->f_status_activity === '1' && $item->f_aprove === '0') {
                                            echo " <span class='badge badge-warning mr10 mb10' style='background-color: orange;'>Pending Approval</span>";
                                        } elseif ($item->f_status_activity === '1' && $item->f_aprove === '1') {
                                            echo "<span class='badge badge-warning mr10 mb10' style='background-color: greenyellow;'>Approved</span>";
                                        } elseif ($item->f_status_activity === '1' && $item->f_aprove === '2') {
                                            echo " <span class='badge badge-warning mr10 mb10' style='background-color: red;'>Reject</span>";
                                        } elseif ($item->f_status_activity === '2' && $item->f_aprove === '0') {
                                            echo " <span class='badge badge-warning mr10 mb10' style='background-color: orange;'>Pending Approval</span>";
                                        } elseif ($item->f_status_activity === '2' && $item->f_aprove === '1') {
                                            echo "<span class='badge badge-warning mr10 mb10' style='background-color: greenyellow;'>Approved</span>";
                                        } elseif ($item->f_status_activity === '2' && $item->f_aprove === '2') {
                                            echo "<span class='badge badge-warning mr10 mb10' style='background-color: red;'>Reject</span>";
                                        } elseif ($item->f_status_activity === '3' && $item->f_aprove === '0') {
                                            echo "<span class='badge badge-warning mr10 mb10' style='background-color: orange;'>Pending Approval</span>";
                                        } elseif ($item->f_status_activity === '3' && $item->f_aprove === '2') {
                                            echo "<span class='badge badge-warning mr10 mb10' style='background-color: red;'>Reject</span>";
                                        } elseif ($item->f_status_activity === '3' && $item->f_aprove === '1') {
                                            echo "<span class='badge badge-warning mr10 mb10' style='background-color: greenyellow;'>Approved</span>";
                                        }
                                        ?>  
                                    </td>

                                    <td><?php echo $item->f_agentid ?></td>

                                    <td><?php echo $item->f_agentname ?></td>
                                    <td><?php echo $item->depthead ?></td>

                                    <td><?php echo $item->f_jabatan ?></td>
                                    <td><?php echo $item->cabang ?></td>

                                    <td><?php echo $item->f_branch_id ?></td>

                                    <td><?php echo $item->f_username ?></td>

                                    <td><?php echo $item->f_email ?></td>

                                    <td><?php echo $item->f_nohp ?></td>

                                    <td><?php echo $item->f_imeihp ?></td>

                                    <td><?php echo $item->f_snhp ?></td>



                                    </tr>

<?php } ?>

                                </tbody>

                            </table>



                        </form>
<?php // echo form_close()        ?>

                        <form action="<?php echo base_url('usermobile/update_um_agent'); ?>" method="post" id="edit">
                            <input id="nik" name="nik" type="hidden" >
                        </form>
                        <form action="<?php echo base_url('usermobile/detail_data_debitruperagent'); ?>" method="post" id="detail">
                            <input id="nik1" name="nik" type="hidden" >
                        </form>
						 <form action="<?php echo base_url('usermobile/updateonline'); ?>" id="updateonline" method="post">
                            <input id="idagent21" name="idagent" type="hidden" >
                        </form>
                    </div>

                </div>

            </div>

        </div>

    </div>
    <script type="text/javascript">$(document).ready(function () {
            $('#example').DataTable({
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "columnDefs": [
                    {targets: [0, 1, 2],
                        sortable: false}
                ],
                order: [[1, "asc"]]
            });
        });
    </script>
    <script type="text/javascript">

        function delet() {
            //event.preventDefault(); // prevent form submit
            var form = $('#delet');//event.target.form; // storing the form
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

                }
            })

        }
		
		function updateonline(z) {
//            alert("test");
            var form = $('#updateonline');//event.target.form; // storing the form
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
                    $('#idagent21').val(z);
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
        function formsubmit(b) {
            $('#nik').val(b);
            $('#edit').submit();
        }
        function formsubmit_detail(c) {
            $('#nik1').val(c);
            $('#detail').submit();
        }
        //    var table = $('#example').DataTable()

    </script>






</body>