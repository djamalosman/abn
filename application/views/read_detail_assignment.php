 
<?php echo $this->session->flashdata('message'); ?>

<div class="row">
    <!-- .row -->
    <!-- .row start -->
    <div class=" col-lg-12">
        <div class="panel panel-danger toggle panelMove panelClose panelRefresh">
            <!-- Start .panel -->
            <div class="panel-heading" style="background-color:red;">
                <h4 class="panel-title">Detail</h4>
            </div>
            <div class="panel-body" id="tabeldetailassignment">
                <form action="<?php echo base_url("controller_assignment/aproved_proses/") . $agent->f_agentid ?>" method="POST" class="form-horizontal group-border stripped" role="form">
               
                    <div class=" form-group" >
                           
                        <div class="col-lg-12">
						   <div class="col-lg-2"><label class="control-label">Nama Collector :</label></div>
						    <div class = "col-lg-10"> <label class="control-label" ><?php echo $agent->f_agentname; ?></label></div>
                        </div>
						<div class="col-lg-12">
						   <div class="col-lg-2"><label class="control-label">Cabang Collector :</label></div>
						   <div class = "col-lg-10"> <label class="control-label" ><?php echo $agent->cabang; ?></label></div>
                        </div>	
					</div>
					
						
                    <div class="form-group" >
					<div class="col-lg-12">
						<div class="col-md-2" style ="">
                            <a type="button" href="<?php echo base_url('controller_assignment/aproved_assignment'); ?>" style="margin-right: 10px; height: 30px;margin-bottom : 10px;" class="btn btn-warning mr5 mb10" ><i class="fa fa-plus"></i>  <span class="text">Back</span></a>
						</div>
						 <div class="col-md-2" style ="">
                            <a type="button" href="javascript: formsubmit1('<?php echo $agent->f_agentid ?>')" href="<?php echo base_url('controller_assignment/tambah_debitur/').$agent->f_agentid ?>" style="margin-right: 10px; height: 30px;margin-bottom : 10px;" class="btn btn-primary mr5 mb10" ><i class="fa fa-plus"></i>  <span class="text"> Add Debitur</span></a>
						</div>
						 
						<div class="col-md-1">
                            <button type="submit" name="reject" id="reject" style=" margin-right: 10px; height: 30px;margin-bottom : 10px;" class="btn btn-danger" style="background-color:red;"><i class="fa fa-pencil-square-o"></i>  <span class="text">Reject</span></button>
						</div>
						<div class="col-lg-2">
                            <button type="submit" name="aproved" id="aproved" style="margin-right: 10px; height: 30px;margin-bottom : 10px;"   class="btn btn-primary mr5 mb10" > <i class="fa fa-save"></i>  <span class="text">Aproved</span> </button>
                        </div> 
					</div>
                        <div class="col-lg-12">
                            <!--table baru-->
                            <table id="example" class="table table-bordered table-striped">
                                <thead>
                                    <tr>	
                                        <th>No</th>
                                        <th>Cif</th>
                                        <th>Nama</th>
                                        <th>DPD</th>
                                        <th>Nama Produck</th>
                                        <th>Alamat</th>
                                        <th>
                                           <input title="checkbox all" type="checkbox" class="checkbox-primary" onclick="toggle(this);" /><br /></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($param as $item) {
                                        ?>
                                        <tr>
                                            <td><?php echo $i++ ?></td>
                                            <td><?php echo $item->NomorNasabah ?></td>
                                            <td><?php echo $item->NamaDebitur ?></td>
                                            <td><?php echo $item->JmlHariTunggakan ?></td>
                                            <td><?php echo $item->SHORT_NAME ?></td>
                                            <td><?php echo $item->STREET ?></td>

                                            <td class="text-center" >
                                                <input type="checkbox"  id="checkbox1.<?php echo $item->NomorNasabah ?>" value="<?php echo $item->NomorNasabah ?>" name="idnya[]" />
                                            </td>
                                        </tr>                            
                                    <?php } ?>
                                </tbody>
                            </table> 
                        </div>

                    </div>

                   

                </form> 
				
				<form id="a<?php echo $agent->f_agentid ?>" name="userdetails1" action="<?php echo base_url("controller_assignment/tambah_debitur") ?>" method="post">
					<input type="hidden" name="nik" id="nik" value="<?php echo $agent->f_agentid ?>">
				</form>
				
				<form id="b<?php echo $agent->f_agentid ?>" name="userdetails1" action="<?php echo base_url("controller_assignment/tambah_debitur") ?>" method="post">
					<input type="hidden" name="nik" id="nik" value="<?php echo $agent->f_agentid ?>">
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

		function formsubmit1(b){
            $('#a'+b).submit();
        }
		
		function formsubmitback(b){
            $('#b'+b).submit();
        }
</script>