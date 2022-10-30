<?php echo $this->session->flashdata('message'); ?>

<div class="row">
    <form action="<?php echo base_url('transfer_account/transfer_account_prosesfinal'); ?>" method="POST" class="form-horizontal group-border stripped">
        <div class="col-lg-12">
            <div class="panel panel-danger toggle panelMove panelClose panelRefresh">
                <div class="panel-heading" style ="background-color : red ;">
                    <h4 class="panel-title"> Transfer List Aproved</h4>
                </div>
                <div class="panel-body">
                    <div class=" form-group" style = "margin-left : 4px;" >
                        <div class="col-md-1">
                            <button type="submit" name="aproved" id="aproved" style=" width: 120px ; background-color : green;" class="btn btn-success" ><i class="fa fa-pencil-square-o"></i>  <span class="text"> Approve</span></button>
                        </div>
                        <div class="col-md-1" style = "margin-left : 40px;">
                            <button type="submit" name="reject" id="reject" style=" width: 120px ; background-color : red;" class="btn btn-danger" ><i class="fa fa-pencil-square-o"></i>  <span class="text">Reject</span></button>
                        </div>
                    </div>
                    <div style ="margin-top : 10px;" class="col-lg-12">
                        <table  id="example" class="table table-bordered table-striped">
                            <thead>
                                <tr>  
                                    <th class="text-center">Pilih</th>
                                     <!-- <th class="text-center" hidden="">Pilih</th> -->
                                    <th style="min-width: 150px;">Agent Asal</th>
                                    <th style="min-width: 150px;">Agent Transfer</th>
                                    <th style="min-width: 150px;">CIF</th>
                                    <th style="min-width: 150px;">Nama Customer</th>
                                    <th style="min-width: 150px;">Date Time</th>
                                    <th style="min-width: 150px;">User Create</th>
                            </thead>
                            <tbody>
                                <?php foreach ($assignment as $item) { ?>
                                    <tr>      
                                        <!--<td class="text-center"><input type="checkbox" value="<?php // echo $item->f_id.'-'.$item->f_agent_awal.'-'.$item->f_transfer_to ?>" name="idnya[]"/></td>-->
                                        <td class="text-center"><input type="checkbox" value="<?php echo $item->idtransfer ?>" name="idnya[]"/></td>
                                        <td><?php echo $item->f_agent_awal ?></td>
                                        <td><?php echo $item->f_agentname ?></td>
                                        <td><?php echo $item->f_cif ?></td>
                                        <td><?php echo $item->f_custname ?></td>
                                        <td><?php echo $item->tgl ?></td>
                                        <td><?php echo $item->user ?></td>
                                    </tr>                            
                                <?php } ?>
                            </tbody>
                        </table> 
                    </div>
                </div>
            </div>
        </div>

    </form>
</div>

<?php // echo form_open("content/transfer_account_proses", "id='swa-confirm'") ?>

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
<script src="<?php echo base_url('assets/jquery/jquery-2.2.3.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable( {
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
         //"scrollX": true,
    } );
} );
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