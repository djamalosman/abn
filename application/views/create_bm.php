<?php echo $this->session->flashdata('message1'); ?>
<div class="container-fluid" >    
    <?php // echo form_open("content/transfer_account_proses", "id='swa-confirm'") ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-danger toggle panelMove panelClose panelRefresh">
                <div class="panel-heading" style="background-color: red">
                    <h4 class="panel-title"><i class="fa fa-user"></i>Data Employee</h4>
                </div>
                <div class="panel-body">
                    <form action="<?php echo base_url('dephead/create_proses_bm'); ?>" method="POST" class="form-horizontal group-border stripped">
                        <div class="form-group">
                            <div class="col-lg-12">
                                <a type="button" href="<?php echo base_url('dephead/index'); ?>" name="close" id="save" class="btn btn-warning btn-sm mr5 mb10" ><i class="fa fa-rotate-left"></i>  <span class="text"> Cancel</span></a>
                                <span></span><button type="submit" name="save" id="save" class="btn btn-primary btn-sm mr5 mb10" ><i class="fa fa-pencil"></i>  <span class="text"> Create</span></button>
                                <table style="margin-top: 20px;"  id="example" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Pilih</th>
                                            <th style=" min-width: 120px">Nik</th>
                                            <th style=" min-width: 120px">Name</th>
                                            <th style=" min-width: 120px">User Level</th>
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
                                    <tbody>
                                        <?php
                                        $idx = 0;
                                        foreach ($inputkaryawan as $item) {
                                            ?>
                                            <tr>
                                                <td class="text-center" >
                                                    <!--<div class="checkbox-custom" style="margin-left: 20px;">-->
                                                    <input type="checkbox"  value="<?php echo $item->nik ?>" name="idnya[]">
                                                    <!--<label for="checkbox1.<?php //echo $item->f_id       ?>"></label>-->
                                                    <!--</div>-->
                                                </td>

                                                                    <!--<td><input type="text"  style="border: 0px;" readonly="" value="<?php echo $item->f_nik ?>" name="check_list[nik][<?php echo $item->f_id ?>]"></td>-->

                                                                    <!--<td><input type="" style="border: 0px;" readonly=""  name="check_list[nama][<?php echo $item->f_id ?>]" value="<?php echo $item->f_full_name ?>"></td>-->

                                                <td><?php echo $item->nik ?></td>
                                                <td><?php echo $item->full_name ?></td>
                                                <td><?php echo $item->level ?></td>
                                                <td><?php echo $item->gender ?></td>
                                                <td><?php echo $item->no_ktp ?></td>
                                                <td><?php echo $item->no_tlp ?></td>
                                                <td><?php echo $item->position_desc ?></td>
                                                <td><?php echo $item->join_date ?></td>
                                                <td><?php echo $item->birth_date ?></td>
                                                <td><?php echo $item->email ?></td>
                                                <td><?php echo $item->company_desc ?></td>
                                                <td><?php echo $item->cost_center_desc ?></td>
                                                <td><?php echo $item->dept_desc ?></td>
                                                <td><?php echo $item->directorate_desc ?></td>
                                                <td><?php echo $item->div_desc ?></td>
                                                <td><?php echo $item->emp_area_desc ?></td>
                                                <td><?php echo $item->emp_office_desc ?></td>
                                                <td><?php echo $item->emp_status_desc ?></td>
                                                <td><?php echo $item->landscape ?></td>
                                                <td><?php echo $item->org_unit_desc ?></td>
                                                <td><?php echo $item->group_desc ?></td>
                                                <td><?php echo $item->termintate_date ?></td>
                                                <td><?php echo $item->group_desc ?></td>

                                            </tr>
                                            <?php
                                            $idx++;
                                        }
                                        ?>

                                    </tbody>
                                </table> 
                            </div>

                        </div>
                        <!--                        <div class="form-group">
                                                    <div class="col-lg-1"></div>
                                                    <div class="col-lg-10">
                                                        <button type="submit" class="btn btn-success mr5 mb10">
                                                            <i class="fa fa-send"></i>
                                                            Transfer
                                                        </button>  
                                                        <br>
                                                        <br>
                                                    </div>
                        
                                                </div>-->

                    </form>


                </div>
            </div>
        </div>
        <div class="col-lg-12">

        </div>
    </div>
    <br>
    <br>

    <?php echo form_close() ?>
</div>
<br>
<br>

<div class="tmpl-loading" style="
     /*min-width: 240px;*/ 
     display: none;
     position: fixed;
     width: 100%; 
     height: 100%; 
     left: 0px;
     /*background: gray;*/
     /*opacity: 0.5;*/
     top: 0px;
     "
     >
    <div  style="
          border: 2px solid black; 
          margin: 0px auto 0px auto;
          padding-top: 35px;
          position: absolute;
          /*opacity: 0.99;*/
          background: white;
          width: 240px;
          height: 100px;
          position: fixed;
          left: calc(50% - 120px);
          top: calc(50% - 150px);    

          -webkit-border-radius: 10px; 

          /* Firefox 1-3.6 */
          -moz-border-radius: 10px; 

          /* Opera 10.5, IE 9, Safari 5, Chrome, Firefox 4, iOS 4, Android 2.1+ */
          border-radius: 10px;             
          ">
        <p class="text-center" style="font-size: 21pt"><strong><i class="fa fa-spinner fa-spin"></i> Sending... </strong></p>
    </div>
</div>
<script src="<?php echo base_url('assets/jquery/jquery-2.2.3.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js') ?>"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#example').DataTable({
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            //"scrollX": true,
        });
    });

    $("#success-alert").fadeTo(2000, 500).slideUp(500, function () {
        $("#success-alert").slideUp(500);
    });
</script>
<script>
    $('.show-load').click(function () {
        $('.tmpl-loading').toggle();
    });

</script>

<script>
    $('#imp_submit').submit(function () {
        if ($("select[name='source']").val() != null && $("input[name='file']").val()) {
            document.getElementById("imp_submit").submit();
        } else {
            swal("Oops!", "jenis sumber data atau file belum dipilih!", "warning");
        }
        return false;
    });

</script>

