<?php echo $this->session->flashdata('message'); ?>
<head>

    <!--   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"> -->
    <style type="text/css">
        .scrollmenu {
            overflow: auto;
            white-space: nowrap;
        }

        .open-modal {
            cursor: pointer;
            /*color:#;*/
            font-size: 15px;
        }
        #mask {
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            display: none;  
            background: black;
            z-index: 98;
            opacity: 0.8;
        }
        .modal {
            background-color: #fff;
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            width: 700px;
            height: 350px;
            margin-left: -200px;
            margin-top: -150px;
            padding: 50px;
            z-index: 99;
        }
        .close-modal {
            color:  #000;
            text-decoration: none;
            float: right;
            position: absolute;
            top: 10px;
            right: 20px
        }
        @media (max-width : 37.500rem) {
            .modal {
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                margin: 0;
                padding: 1.250rem
            }
            .close-modal{
                display: block;
                position: relative;
                padding: 5px 10px 20px 0
            } 
            .modal-content{
                clear: both;
                padding-right: 1.25rem
            } 
        }
    </style>
</head>
<body>
    <div class="col-lg-12">
        <!-- col-lg-12 start here -->
        <div class="panel panel-danger toggle panelMove panelClose panelRefresh">
            <!-- Start .panel -->
            <div class="panel-heading" style="background-color: red;">
                <h4 class="panel-title"><i class="fa fa-users"></i>Data Employee</h4> 
            </div>
            <div class="scrollmenu">
                <div class="panel-body">

                    <div class="">
                        <div id="buttons">
                            <a href="<?php echo base_url("employee/create_um_datakaryawan") ?>"  type="button" style="background-color: #0bacd3; height: 29px" class="btn btn-primary"><i class="fa fa-plus"></i>  Add External</a>
                            <!-- button type="button" class="btn  open-modal btn-primary">create Lelang</button> -->
                        </div>
                        <br>
                        <br>

                        <?php // echo form_open("employee/delete_multi_um_datakaryawan", "id='delet'")  ?>
                        <form action="<?php echo base_url('employee/delete_multi_um_datakaryawan'); ?>" method="post" id="delet">
                            <div id="buttons" title="download file"></div>
                            <table id="example"  class="table nowrap table-bordered" style="width:100%;border: 2px;">
                                <thead>
                                    <tr>
                                        <th class="text-center"><button type="button" style="margin-top: 10px" class="btn btn-danger btn-xs mr5 mb10" onclick="delet()" ><i class="fa fa-trash-o"></i></button></th>
                                        <th>Action</th>
                                        <th style=" min-width: 120px">Status</th>
                                        <th style=" min-width: 120px">Type Employee</th>
                                        <th style=" min-width: 120px">NIK</th>
                                        <th style=" min-width: 120px">Name</th>
                                        <th style=" min-width: 120px">Gender</th>
                                        <th style=" min-width: 120px">No KTP</th>
                                        <th style=" min-width: 120px">No Telphone</th>
                                        <th style=" min-width: 120px">Position</th>
                                        <th style=" min-width: 120px">Join Date</th>
                                        <th style=" min-width: 120px">Birth Date</th>
                                        <th style=" min-width: 120px">Email</th>
                                        <th style=" min-width: 120px">Company</th>
                                        <th style=" min-width: 120px">Cost Center</th>
                                        <th style=" min-width: 120px">Dept</th>
                                        <th style=" min-width: 120px">Direct</th>
                                        <th style=" min-width: 120px">Div</th>
                                        <th style=" min-width: 120px">Emp Area</th>
                                        <th style=" min-width: 120px">Emp Office</th>
                                        <th style=" min-width: 120px">Emp Status</th>
                                        <th style=" min-width: 120px">Landscape</th>
                                        <th style=" min-width: 120px">Org Unit</th>
                                        <th style=" min-width: 150px">Terminante Date</th>
                                        <th style=" min-width: 120px">Group</th>
                                        <th style=" min-width: 120px">Group Grade</th>
                                    </tr>
                                </thead>
                                <?php $datenow = date('d-m-Y'); ?>


                                <tbody>
                                    <?php foreach ($karyawan as $item) { ?>
                                        <tr>
                                            <td  class="text-center" >
                                                <!--<div class="checkbox-custom" style="margin-left: 20px;">-->
                                                <input <?php if($item->f_type == 0){ echo 'style ="display:none"';} ?> type="checkbox"  id="checkbox1.<?php echo $item->f_nik ?>" value="<?php echo $item->f_nik ?>" name="idnya[]" >

                                            </td>

                                            <td><center>
                                        <a <?php if($item->f_type == 0){ echo 'style ="display:none"';} ?> href="javascript: formsubmit('<?php echo $item->f_nik ?>')" title="Edit Employee" ><i class="fa fa-pencil"></i></a>
                                    </center>
                                    </td>
                                    <td><?php
                                        if ($item->f_termintate_date >= $datenow) {
                                            echo "
                          <ul class='fa-ul'>
                          <li>Resign</i></li>
                          </ul>
                          ";
                                        } elseif ($item->f_termintate_date <= $datenow) {
                                            if ($item->f_status == 0) {
                                                echo "<ul class = 'fa-ul'>
                                                <li></i></li>
                                                </ul>";
                                            } else {

                                                echo "
                          <ul class='fa-ul'>
                          <li>Active</i></li>
                          </ul>
                          ";
                                            }
                                        } elseif ($item->f_termintate_date == '') {
                                            if ($item->f_status == 0) {
                                                echo "<ul class = 'fa-ul'>
                                                <li></i></li>
                                                </ul>";
                                            } else {
                                                echo "
                          <ul class='fa-ul'>
                          <li>Active</i></li>
                          </ul>
                                            ";
                                            }
                                        } else {
                                            
                                        }
                                        ?>  
                                    </td>                                    
                                    <td><?php
                                        if ($item->f_type == 1) {
                                            echo 'External';
                                        } else {
                                            echo 'Internal';
                                        }
                                        ?></td>
                                    </td>                                    
                                    <td><?php echo $item->f_nik ?></td>
                                    <td><?php echo $item->f_full_name ?></td>
                                    <td><?php echo $item->f_gender ?></td>
                                    <td><?php echo $item->f_no_ktp ?></td>
                                    <td><?php echo $item->f_no_tlp ?></td>
                                    <td><?php echo $item->f_position_desc ?></td>
                                    <td><?php echo $item->f_join_date ?></td>
                                    <td><?php echo $item->f_birth_date ?></td>
                                    <td><?php echo $item->f_email ?></td>
                                    <td><?php echo $item->f_company_desc ?></td>
                                    <td><?php echo $item->f_cost_center ?></td>
                                    <td><?php echo $item->f_dept_desc ?></td>
                                    <td><?php echo $item->f_directorate_desc ?></td>
                                    <td><?php echo $item->f_div_desc ?></td>
                                    <td><?php echo $item->f_emp_area_desc ?></td>
                                    <td><?php echo $item->f_emp_office_desc ?></td>
                                    <td><?php echo $item->f_emp_status_desc ?></td>
                                    <td><?php echo $item->f_landscape ?></td>
                                    <td><?php echo $item->f_org_unit_desc ?></td>
                                    <td><?php echo $item->f_termintate_date ?></td>
                                    <td><?php echo $item->f_group_desc ?></td>
                                    <td><?php echo $item->f_group_grade_code ?></td>

                                    </tr>
                                <?php } ?>

                                </tbody>
                            </table>
                        </form>

                        <form action="<?php echo base_url('employee/editemployee'); ?>" method="post" id="edit">
                            <input id="nik" name="nik" type="hidden" >
                        </form>

                        <?php // echo form_close()   ?>
                        <div id="mask"></div>
                        <div class="modal">
                            <a class="close-modal" href="javascript:void(0)">
                                <i class="fa fa-times"></i>
                            </a>
                            <div class='modal-content'>
                                <div class="modal-header">
                                    <h5 class="modal-title">search Dedibutr</h5>
                                </div>
                                <div class="modal-body">
                                    <form action="<?php echo base_url("content/create_mntr_lelang") ?>" method="GET">       
                                        <div class="form-group">
                                            <label class="control-label col-xs-3" >LOAN</label>
                                            <div class="col-xs-8">
                                                <input id="myInput"  name="myCountry" autocomplete="off"  class="form-control" type="text" placeholder="..." required>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="submit">search</button>
                                              <!-- <a href="<?php echo base_url("content/create_mntr_lelang") ?>" type="btn-primary">search</button></a> -->
                                        </div>
                                </div> 
                                </form>  
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url('assets/jquery/jquery-2.2.3.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js') ?>"></script>
    <script type="text/javascript">
                                            $(document).ready(function () {
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
                    //      alert('masuk cancel');
                }
            })

        }

        function formsubmit(b) {
            $('#nik').val(b);
            $('#edit').submit();
        }
    </script>
</body>