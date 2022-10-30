<?php echo $this->session->flashdata('message'); ?>

<div class="row">
    <form id="action" action="<?php echo base_url('usermobile/approvedcollector'); ?>" method="POST" class="form-horizontal group-border stripped"> 
        <?php // echo form_open("usermobile/approvedcollector", "id='swa-confirm'") ?>
        <div class="col-lg-12">
            <div class="panel panel-danger toggle panelMove panelClose panelRefresh">
                <div class="panel-heading" style="background-color: red">
                    <h4 class="panel-title"><i class="glyphicon glyphicon-check"></i>Approve User Mobile Collector</h4>
                </div>
                <div class="panel-body">
                    <button style="margin-left: 16px;" type="button" name="aproved" id="reject" class="btn btn-danger btn-sm mr5 mb10" ><i class="glyphicon glyphicon-remove"></i>  <span class="text"> Reject</span></button>
                    <button type="button" name="aproved" id="aproved" class="btn btn-primary btn-sm mr5 mb10" ><i class="fa fa-pencil-square-o"></i>  <span class="text"> Aprove</span></button>

                    <!--                <div class=" form-group" >
                                        <div class="col-md-2">
                                        </div>
                                        <div class="col-md-2">
                                        </div>
                    
                                    </div>-->
 
                    <br>
                    <br>
                    <div class="col-lg-12">

                        <table  id="example" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">Aksi</th>
                                    <th>Status</th>
                                    <th>Activity</th>
                                    <th>NIK</th>
                                    <th>Nama Agen</th>
                                    <th>IDCabang</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>No HP</th>
                                    <th>IMEI</th>
                                    <th>Serial Number HP</th>
                                    <th hidden="">Npwp</th>
                                    <th hidden="">Npwp</th>


                                </tr>
                            </thead>



                            <tbody>
                                <?php foreach ($approvecolec as $item) { ?>
                                    <tr>     

                                        <td class="text-center" >

                                            <input type="checkbox" value="<?php echo $item->f_agentid ?>" name="idnya[]"/>
                                        </td>
                                        <td><center><?php
                                            if ($item->f_aprove == 0) {
                                                echo " <span class='badge badge-warning mr10 mb10' style='background-color: orange;'>Panding Aprove</span>";
                                            } elseif ($item->f_aprove == 1) {
                                                echo "<i class='glyphicon glyphicon-check' aria-hidden='true' title='Approve'></i>";
                                            } elseif ($item->f_aprove == 1) {
                                                echo "<i class='glyphicon glyphicon-remove' aria-hidden='true' title='reject'></i> ";
                                            } elseif ($item->f_aprove == 1) {
                                                echo "<i class='fa-li fa fa-spinner fa-spin' aria-hidden='true' title='Wait Approve'></i> ";
                                            }
                                            ?>  </center>
                                        </td>
                                        <td style="background-color: "><?php if($item->f_status_activity == '1'){echo " <span class='badge badge-sucess mr10 mb10' style='background-color: green;'>Create</span>";} elseif ($item->f_status_activity == '2') {    echo " <span class='badge badge-sucess mr10 mb10' style='background-color: blue;'>Update</span>";} elseif($item->f_status_activity == '3') {    echo " <span class='badge badge-sucess mr10 mb10' style='background-color: red;'>Delete</span>";} ?></td>
                                        <td ><?php echo $item->f_agentid ?></td>
                                        <td><?php echo $item->f_agentname ?></td>
                                        <td><?php echo $item->f_branch_id ?></td>
                                        <td><?php echo $item->f_username ?></td>
                                        <td><?php echo $item->f_email ?></td>
                                        <td><?php echo $item->f_nohp ?></td>
                                        <td><?php echo $item->f_imeihp ?></td>
                                        <td><?php echo $item->f_snhp ?></td>


                                     <!-- <td>
                                     <object data="data:application/pdf;base64,<?php
                                        echo base64_encode
                                                ($item->f_file)
                                        ?>" type="application/pdf" style="height:50px;width:100px"></object>﻿
                                     </td> -->
                                        <td hidden=""><?php echo $item->f_emailuserdep ?></td>
                                        <td hidden=""><?php echo $item->f_emailuserdep ?></td>

                                    </tr>                            
                                <?php } ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </form>
    <?php // echo form_close() ?>

</div>

<?php // echo form_open("content/transfer_account_proses", "id='swa-confirm'")   ?>

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

        $('#aproved').click(function () {
            $('#action').attr('action', '<?php echo base_url('usermobile/approvedcollector'); ?>');
            $('#action').submit();
        });

        $('#reject').click(function () {
            $('#action').attr('action', '<?php echo base_url('usermobile/reject_aprove'); ?>');
            $('#action').submit();
        });


        $('#example').DataTable({
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            //"scrollX": true,
        });
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