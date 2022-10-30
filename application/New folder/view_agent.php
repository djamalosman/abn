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

    <div <?php
    if ($acsess->f_acsess === "0") {
        echo 'style= "display: none;"';
    }
    ?>  class="col-lg-12">

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

                        <div <?php
    if ($acsess->f_acsess === "1") {
        echo 'style= "display: none;"';
    }
    ?> id="buttons">

                            <a href="<?php echo base_url("usermobile/create_collector") ?>" button type="button" style="background-color: #0bacd3; height: 29px;" class="btn btn-primary"><i class="fa fa-plus"></i>  Create User Mobile </a>

                        </div>

                        <br>

                        <br>

<?php // echo form_open("content/delete_multi_um_agent", "id='swa-confirm'")   ?>
                        <form action="<?php echo base_url('usermobile/delete_multi_um_agent') ?>" method="POST" id="delet">


                            <div id="buttons" title="download file"></div>

                            <table id="example"  class="table nowrap table-bordered" style="width:100%;border: 2px;">

                                <thead>

                                    <tr>

                                    <tr>

                                        <th <?php
                                        if ($acsess->f_acsess === "1") {
                                            echo 'style= "display: none;"';
                                        }
                                        ?> class="text-center"><button onclick="delet()" type="button" class="btn btn-danger btn-xs mr5 mb10" style="margin-top:  10px;"><i class="fa fa-trash-o"></i></button></th>

                                        <th <?php
                                        if ($acsess->f_acsess === "1") {
                                            echo 'style= "display: none;"';
                                        }
                                        ?> >Aksi</th>

                                        <th>Status</th>

                                        <th>NIK</th>

                                        <th>Nama Agen</th>

                                        <th>Jabatan</th>

                                        <th>Kode Post</th>

                                        <th>ID Cabang</th>

                                        <th>Username</th>

                                        <th>Email</th>

                                        <th>No HP</th>

                                        <th>IMEI</th>

                                        <th>Serial Number HP</th>

                                    </tr>

                                </thead>



                                <tbody>

                                            <?php foreach ($agent as $item) { ?> 



                                        <tr>

                                            <td <?php
                                            if ($acsess->f_acsess === "1") {
                                                echo 'style= "display: none;"';
                                            }
                                                ?> class="text-center" >
                                                <input type="checkbox" value="<?php echo $item->f_agentid ?>" name="idnya[]"/>

                                            </td>
                                            <td <?php
                                               if ($acsess->f_acsess === "1") {
                                                   echo 'style= "display: none;"';
                                               }
                                                ?>  class="text-center" style=" display:<?php echo $this->session->userdata('allowedit'); ?>"> 
                                                <a title="Edit" type="button" class="btn btn-warning btn-xs mr5 mr10" <?php
                                                if ($item->f_aprove == 0) {
                                                    echo '';
                                                } else {
                                                    echo 'href="javascript: formsubmit(' . $item->f_agentid . ')"';
                                                }
                                                ?> ><i class="fa fa-pencil-square-o" ></i></a>
                                                <a title="Detail Collector" type="button" class="btn btn-primary btn-xs mr5 mr10" href="javascript: formsubmit_detail('<?php echo $item->f_agentid ?>')" ><i class="fa fa-list" ></i></a>
                                            </td>
                                            <td> 
                                                <!---->

    <?php
    if ($item->f_status_activity == '1' && $item->f_aprove == '0') {
        echo "<span class='badge badge-warning mr10 mb10' style='background-color: green;'>Create</span> <span class='badge badge-warning mr10 mb10' style='background-color: orange;'>Pending Aprove</span>";
    } elseif ($item->f_status_activity == '1' && $item->f_aprove == '1' && $item->f_active == '1') {
        echo "<span class='badge badge-sucess mr10 mb10' >Active</span> <span class='badge badge-warning mr10 mb10' style='background-color: greenyellow;'>Aprove</span>";
    } elseif ($item->f_status_activity == '1' && $item->f_aprove == '1' && $item->f_active == '0' or $item->f_active = '2') {
        echo "<span class='badge badge-danger mr10 mb10' style='background-color: green;'>Non Active</span> <span class='badge badge-warning mr10 mb10' style='background-color: greenyellow;'>Aprove</span>";
    } elseif ($item->f_status_activity == '2' && $item->f_aprove == '0') {
        echo "<span class='badge badge-warning mr10 mb10' style='background-color: blue;'>Update</span> <span class='badge badge-warning mr10 mb10' style='background-color: orange;'>Pending Aprove</span>";
    
    } elseif ($item->f_status_activity == '2' && $item->f_aprove == '1' && $item->f_active == '1') {
        echo "<span class='badge badge-success mr10 mb10'>Active</span> <span class='badge badge-warning mr10 mb10' style='background-color: greenyellow;'>Aprove</span>";
    
    } elseif ($item->f_status_activity == '2' && $item->f_aprove == '1' && $item->f_active == '0' or $item->f_active == '2' ) {
        echo "<span class='badge badge-danger mr10 mb10' style='background-color: red ;'>Non Active</span> <span class='badge badge-warning mr10 mb10' style='background-color: greenyellow;'>Aprove</span>";
    
        
    } elseif ($item->f_status_activity == '3' && $item->f_aprove == '0' && $item->f_active == '1') {
        echo "<span class='badge badge-danger mr10 mb10' style='background-color: red;'>Delete</span> <span class='badge badge-warning mr10 mb10' style='background-color: orange;'>Pending Aprove</span>";
    
    } elseif ($item->f_status_activity == '3' && $item->f_aprove == '1' && $item->f_active == '1') {
        echo "<span class='badge badge-success mr10 mb10'>Active</span> <span class='badge badge-warning mr10 mb10' style='background-color: greenyellow;'>Aprove</span>";
    
    } elseif ($item->f_status_activity == '3' && $item->f_aprove == '1' && $item->f_active == '0' or $item->f_active == '2' ) {
        echo "<span class='badge badge-danger mr10 mb10' style='background-color: red ;'>Non Active</span> <span class='badge badge-warning mr10 mb10' style='background-color: greenyellow;'>Aprove</span>";
    }
    ?>  
                                            </td>

                                            <td><?php echo $item->f_agentid ?></td>

                                            <td><?php echo $item->f_agentname ?></td>

                                            <td><?php echo $item->f_jabatan ?></td>
                                            <td><?php echo $item->f_kode_post ?></td>

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
<?php // echo form_close()   ?>

                        <form action="<?php echo base_url('usermobile/update_um_agent'); ?>" method="post" id="edit">
                            <input id="nik" name="nik" type="hidden" >
                        </form>
                        <form action="<?php echo base_url('usermobile/detail_data_debitruperagent'); ?>" method="post" id="detail">
                            <input id="nik1" name="nik" type="hidden" >
                        </form>
                    </div>

                </div>

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