 
<?php echo $this->session->flashdata('message'); ?>

<div class="row">
    <!-- .row -->
    <!-- .row start -->
    <div class=" col-lg-12">
        <div class="panel panel-default toggle panelMove panelClose panelRefresh">
            <!-- Start .panel -->
            <div class="panel-heading">
                <h4 class="panel-title">Detail</h4>
            </div>
            <div class="panel-body" id="tabeldetailassignment">
                <form action="<?php echo base_url("content/aproved_proses/") . $agent->f_agentid ?>" method="POST" class="form-horizontal group-border stripped" role="form">
                <!--     <div class=" form-group" >
                        <div class="col-lg-2">
                            <label class="control-label">Nama Collector</label> <br>
                        </div>
                        
                        
                    </div> -->

                                       

                    <div class="form-group" >
                        <div class="col-lg-12">
                            <!--table baru-->
                            <table id="example" class="table table-bordered table-striped">
                                <thead>
                                    <tr>    
                                        <th>No</th>
                                        <th>Status</th>
                                        <th>Cif</th>
                                        <th>Nama</th>
                                        <th>DPD</th>
                                        <th>Nama Produck</th>
                                        <th>Alamat</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($param as $item) {
                                        ?>
                                        <tr>
                                            <td><?php echo $i++ ?></td>
                                             <td><?php 
                                                if ($item->f_reject==1) {
                                                    echo "Reject";
                                                }elseif ($item->f_aproved==2) {
                                                    echo "Approved";
                                                }
                                             ?></td>
                                            <td><?php echo $item->NomorNasabah ?></td>
                                            <td><?php echo $item->NamaDebitur ?></td>
                                            <td><?php echo $item->DPD ?></td>
                                            <td><?php echo $item->SHORT_NAME ?></td>
                                            <td><?php echo $item->STREET ?></td>

                                        </tr>                            
                                    <?php } ?>
                                </tbody>
                            </table> 
                        </div>

                    </div>

                   

                </form> 




            </div>
        </div>
        <!-- End .panel -->
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
<script type="text/javascript">
function toggle(source) {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i] != source)
            checkboxes[i].checked = source.checked;
    }
}
</script>