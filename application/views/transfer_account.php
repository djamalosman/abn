<?php echo $this->session->flashdata('message'); ?>


<?php // echo form_open("content/transfer_account_proses", "id='swa-confirm'") ?>

<style>
    input:valid {
        color: black;
    }
    input:invalid {
        color: red;
    }    

</style>

<div class="col-lg-12">
    <div class="panel panel-danger toggle panelMove panelClose panelRefresh">
        <div class="panel-heading" style="background-color: red">
            <h4 class="panel-title"><i class="fa fa-users"></i> Account List</h4>
        </div>
        <div class="scrollmenu">
            <div class="panel-body">
                <form action="<?php echo base_url('transfer_account/transfer_account_proses') ?>" method="POST" class="form-horizontal group-border stripped">
                    <div class="col-lg-2" >
                        <label for="f_untuk" class="control-label">Agent</label>
                        <select style=" height: 30px"  id="agent" name="agent" class="fancy-select form-control">
                            <option value="">Select</option>
                            <?php foreach ($agent as $item) { ?>
                                <option value="<?php echo $item->f_agentid ?>"><?php echo $item->f_agentname ?></option>
                            <?php } ?>

                        </select>
                    </div>
                    <div class="col-lg-2">
                        <!-- col-lg-6 start here -->
                        <label for="desc" class="control-label">Description</label>
                        <input name="desc" id="desc" style="height: 35px" required="" pattern="[a-zA-Z0-9/.& ,-]+" title="Please enter the data in correct format." type="text" class="form-control" id="text" placeholder="Description">
                    </div>
                    <div class="col-md-1">
                        <!-- col-lg-6 start here -->
                        <!--<label for="input" class="control-label"></label>-->
                        <button type="submit" style="  background-color: green; margin-top: 30px; height: 30px;" class="btn btn-success mr5 mb10" ><i class="fa fa-send"></i>  <span class="text"> Transfer</span></button>
                        <!--<input type="text" class="form-control" id="text" placeholder="Input">-->
                    </div>
                    <div class="col-md-1">
                        <!-- col-lg-6 start here -->
                        <!--<label for="input" class="control-label"></label>-->
                        <a type="button" href="<?php echo base_url('transfer_account/index'); ?>" style=" background-color: orange; margin-top: 30px;height: 30px; margin-left: 10px;" class="btn btn-warning mr5 mb10" ><i class="fa fa-undo"></i>  <span class="text">Back</span></a>
                        <!--<input type="text" class="form-control" id="text" placeholder="Input">-->
                    </div>
                    <div class="col-lg-12">
                        <table style="margin-top: 10px;" id="example" class="table table-bordered table-striped">
                            <thead>
                                <tr>	
                                    <th class="text-center">Pilih</th>
                                    <th class="text-center">No</th>
                                    <th style="min-width: 150px;">Kode Cabang</th>
                                    <th style="min-width: 150px;">Agent Id</th>
                                    <th style="min-width: 150px;">Agent</th>
                                    <th style="min-width: 150px;">CIF</th>
                                    <th style="min-width: 150px;">Account Number</th>
                                    <th style="min-width: 150px;">Nama Customer</th>
                                    <th style="min-width: 150px;">Kode Pinjaman</th>
                                    <th style="min-width: 150px;">Produk ID</th>
                                    <th style="min-width: 150px;">DPD</th>
                                    <th style="min-width: 150px;" >Cycle</th>

                            </thead>
                            <tbody>
                                <?php $a = 1;
                                foreach ($assignment as $item) { ?>
                                    <tr>			
                                        <td class="text-center"><input type="checkbox" value="<?php echo $item->NomorNasabah ?>" name="idnya[]"/></td>
                                        <td class="text-center"><?php echo $a++ ?></td>
                                        <td><?php echo $item->KodeCabang ?></td>
                                        <td><?php echo $item->f_agentid ?></td>
                                        <td><?php echo $item->f_agentname ?></td>
                                        <td><?php echo $item->f_cif ?></td>
                                        <td><?php echo $item->NomorRekening ?></td>
                                        <td><?php echo $item->NamaDebitur ?></td>
                                        <td><?php echo $item->ID ?></td>
                                        <td><?php echo $item->FacilityType ?></td>
                                        <td><?php echo $item->JmlHariTunggakan ?></td>
                                        <td></td>
                                    </tr>                            
<?php } ?>
                            </tbody>
                        </table> 
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
<?php // echo form_close()  ?>
<!--<div class="tmpl-loading" style="
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
</div>-->
<script src="<?php echo base_url('assets/jquery/jquery-2.2.3.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js') ?>"></script>
<script type="text/javascript">
    $(document).ready(function () {
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