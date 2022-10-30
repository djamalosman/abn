<?php echo $this->session->flashdata('message'); ?>



<div class="container-fluid" >    

    <?php // echo form_open("content/transfer_account_proses", "id='swa-confirm'") ?>

    <div class="row">

        <div class="col-lg-12">

            <div class="panel panel-default plain toggle panelMove panelClose panelRefresh">

                <div class="panel-heading">

                    <h4 class="panel-title">Detail Reject And Approve Transfer Account</h4>

                </div>

                <div class="panel-body">

                    <form action="<?php echo base_url('content/transfer_account_proses2'); ?>" method="POST" class="form-horizontal group-border stripped">

                       <div class="col-md-1">

                                <!-- col-lg-6 start here -->

                                <!--<label for="input" class="control-label"></label>-->

                                <a type="button"  href="<?php echo base_url('content/transfer_account');?>" style="margin-top: 25px; margin-right: 10px; height: 30px;" class="btn btn-primary mr5 mb10" ><i class="fa fa-arrow-left"></i>  <span class="text">Back</span></a>

                                <!--<input type="text" class="form-control" id="text" placeholder="Input">-->

                            </div>

                        <div class="form-group">

                            <div class="col-lg-12">

                                <table  id="example" class="table table-bordered table-striped">

                                    <thead>

                                        <tr>  

                                            <th class="text-center">Pilih</th>

                                            <th style="min-width: 150px;">Status</th>

                                            <th style="min-width: 150px;">Agent Asal</th>

                                            <th style="min-width: 150px;">Agent Transfer</th>

                                            <th style="min-width: 150px;">CIF</th>

                                            <th style="min-width: 150px;">Account Number</th>

                                            <th style="min-width: 150px;">Nama Customer</th>



                                    </thead>

                                    <tbody>

                                        <?php foreach ($assignment as $item) { ?>

                                            <tr>      

                                                <td class="text-center"><input type="checkbox" value="<?php echo $item->f_id ?>" name="idnya[]"/></td>

                                                <td><?php 

                                                if ($item->f_aproved ==1) {

                                                  echo "approve";

                                                }elseif ($item->f_reject ==1) {

                                                  echo "Reject";

                                                }

                                                 ?></td>

                                                <td><?php echo $item->f_agent_awal ?></td>

                                                <td><?php echo $item->f_agentname ?></td>

                                                <td><?php echo $item->f_cif ?></td>

                                                <td><?php echo $item->f_acctno ?></td>

                                                <td><?php echo $item->f_custname ?></td>

                                            </tr>                            

                                        <?php } ?>

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



<script>

    $('.show-load').click(function () {

        $('.tmpl-loading').toggle();

    });



</script>



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