<?php echo $this->session->flashdata('message'); ?>

<div class="container-fluid" >    
    <?php // echo form_open("content/transfer_account_proses", "id='swa-confirm'") ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-danger toggle panelMove panelClose panelRefresh">
                <div class="panel-heading" style="background-color: red;">
                    <h4 class="panel-title"><i class="fa fa-users"></i> Transfer List</h4>
                </div>
                <div class="panel-body">
                    <form id="formtf" action="<?php echo base_url('transfer_account/transfer_account_proses2'); ?>" method="POST" class="form-horizontal group-border stripped">
                        <div class="col-lg-2">
                            <label for="f_untuk" class="control-label">Agent</label>
                            <select style=" height: 30px"  id="agent" name="agent" required="" class="fancy-select form-control">
                                <option value="Non">Select</option>
                                <?php foreach ($agent as $item) { ?>
                                    <option value="<?php echo $item->f_agentid ?>"><?php echo $item->f_agentname ?></option>
                                <?php } ?>

                            </select>
                        </div>
                        <div class="col-lg-3">
                            <!-- col-lg-6 start here -->
                            <label for="desc" class="control-label">Description</label>
                            <input name="desc" id="desc" style="height: 30px" required=""  type="text" class="form-control" id="text" placeholder="Description">
                        </div>
                        <div class="col-md-16">
                            <!-- col-lg-6 start here -->
                            <!--<label for="input" class="control-label"></label>-->
                            <button type="submit" name="edit" id="edit" style="margin-top: 22px; height: 30px;" class="btn btn-warning  mr5 mb10" ><i class="fa fa-pencil"></i>  <span class="text"> Edit</span></button> <label style="text-align: center; color:  red;"> *Silahkan Pilih Data Account Dan Collector, Untuk Mengedit.</label>
                            <!--<input type="text" class="form-control" id="text" placeholder="Input">-->
                        </div>
                        <div class="col-lg-12" style="margin-bottom: 20px;">
                            <div class="col-md-1">
                                <!-- col-lg-6 start here -->
                                <!--<label for="input" class="control-label"></label>-->
                                <button type="button" onclick="delete1('delete')" name="delete" id="delete" style="margin-top: 25px; background-color: red; height: 30px;" class="btn btn-danger  mr5 mb10" ><i class="fa fa-trash"></i>  <span class="text"> Delete</span></button>
                                <input type="hidden" name="deletetxt" id="deletetxt">
                            </div>

                            <div class="col-lg-3" style="margin-left: 610px;">
                                <a type="button"  href="<?php echo base_url('transfer_account/view_reject_aprove_acctransfer'); ?>" style="margin-top: 25px; display: none; margin-right: 10px; height: 30px;" class="btn btn-primary mr5 mb10" ><i class="fa fa-plus"></i>  <span class="text">View Reject/Approve</span></a>
                            </div>
                            <div class="col-md-1">
                                <!-- col-lg-6 start here -->
                                <!--<label for="input" class="control-label"></label>-->
                                <a type="button"  href="<?php echo base_url('transfer_account/read_transfer_account'); ?>" style="margin-top: 25px; margin-right: 10px; height: 30px;" class="btn btn-success mr5 mb10" ><i class="fa fa-plus"></i>  <span class="text"> Add Transfer</span></a>
                            </div>
                        </div>


                        <div class="col-lg-12">
                            <table style="margin-top: 10px;" id="example" class="table table-bordered table-striped">
                                <thead>
                                    <tr>  
                                        <th class="text-center">Pilih</th>
                                        <th style="min-width: 50px;">Status</th>
                                        <th style="min-width: 100px;">Agent Asal</th>
                                        <th style="min-width: 100px;">Agent Transfer</th>
                                        <th style="min-width: 100px;">CIF</th>
                                        <th style="min-width: 100px;">Nama Customer</th>
                                        <th style="min-width: 120px;">Loan ID</th>
                                        <th style="min-width: 100px;">Tanggal Transfer</th>
                                        <th style="min-width: 100px;">User Transfer</th>

                                </thead>
                                <tbody>
                                    <?php foreach ($assignment as $item) { ?>
                                        <tr>      
                                            <td class="text-center">
											<input type="checkbox" 
											<?php
                                                if ($item->f_aproved == '0' && $item->f_reject == '') {
                                                    echo "style='display:none;'";
                                                } elseif ($item->f_reject == 1) {
                                                    echo "";
                                                }
                                                ?>
											value="<?php echo $item->f_id ?>" name="idnya[]"/>
											
											</td>
                                            <td><center><?php
                                                if ($item->f_aproved == '0' && $item->f_reject == '') {
                                                    echo "<span class='badge badge-warning mr10 mb10' style='background-color: orange;'>Pending Approval</span>";
                                                } elseif ($item->f_reject == 1) {
                                                    echo "<span class='badge badge-warning mr10 mb10' style='background-color: red;'>Reject</span>";
                                                } elseif ($item->f_aproved == 1) {
                                                    echo "Approve";
                                                }
                                                ?></center></td>
                                            <td><?php echo $item->f_agent_awal ?></td>
                                            <td><?php echo $item->f_agentname ?></td>
                                            <td><?php echo $item->f_cif ?></td>
                                            <td><?php echo $item->f_custname ?></td>
                                            <td><?php echo $item->ID ?></td>
                                            <td><?php echo $item->tgl ?></td>
                                            <td><?php echo $item->user ?></td>
                                        </tr>                            
                                    <?php } ?>
                                </tbody>
                            </table> 
                        </div>
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

<script>
    $('.show-load').click(function () {
        $('.tmpl-loading').toggle();
    });

</script>

<script src="<?php echo base_url('assets/jquery/jquery-2.2.3.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js') ?>"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#example').DataTable({
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            //"scrollX": true,
        });
    });
    
    function delete1(a) {
            //event.preventDefault(); // prevent form submit
            var form = $('#formtf');//event.target.form; // storing the form
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
                    $('#deletetxt').val(a);
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
</script>