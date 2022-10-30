
<?php echo $this->session->flashdata('message'); ?>
<div class="row">
    <!-- .row -->
    <!-- .row start -->
    <div class=" col-lg-12">
        <div class="panel panel-danger toggle panelMove panelClose panelRefresh">
            <!-- Start .panel -->
            <div class="panel-heading" style= "background-color : red;">
                <h4 class="panel-title">Aproved Plan Visit</h4>
            </div>
            <div class="panel-body">
                <!--<form action="<?php echo base_url("content/create_m_param_proses") ?>" method="POST" class="form-horizontal group-border stripped" role="form"> -->

                    <div class="form-group">
                        <div class="col-lg-12">
                            <!--table baru-->
                            <table class="table table-bordered table-striped datatable" id="example" >
                                <thead>
                                    <tr>	
                                        <th>No</th>
                                        <th>Agent ID</th>
                                        <th>Nama Collector</th>
                                        <th>Tanggal Permohonan</th>
                                        <th>Jumlah Permohonan</th>
                                        <th style="min-width: 10%;">Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1;
                                    foreach ($param as $item)  { ?>
                                        <tr> 
                                            <td><?php echo $i++?></td>
                                            <td><?php echo $item->f_agentid ?></td>
                                            <td><?php echo $item->f_agentname ?></td>
                                            <td><?php echo $item->f_tanggal ?></td>
                                            <td><?php echo $item->jmlh ?></td>

                                            <td>
											<form id="a<?php echo $item->f_agentid ?>" name="userdetails1" action="<?php echo base_url("controller_assignment/aproved_detail") ?>" method="post">
                                                <input type="hidden" name="nik" id="nik" value="<?php echo $item->f_agentid ?>">
                                            </form> 
                                            <a href="javascript: formsubmit1('<?php echo $item->f_agentid ?>')"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                               <!-- <a title="View detail aproved/reject " style="margin-top: 10px;" href="<?php echo base_url('content/aproved_reject_detail/').$item->f_agentid ; ?>" ><i class="fa fa-list" aria-hidden="true"></i></a>-->
                                            </td>
                                        </tr>                            
<?php } ?>
                                </tbody>
                            </table> 
                        </div>

                    </div>
                <!--</form>--> 
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

		function formsubmit1(b){
            $('#a'+b).submit();
        }
</script>