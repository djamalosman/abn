
<?php echo $this->session->flashdata('message'); ?>
<div class="row">
    <!-- .row -->
    <!-- .row start -->
    <div class=" col-lg-12">
        <div class="panel panel-danger toggle panelMove panelClose panelRefresh">
            <!-- Start .panel -->
            <div class="panel-heading" style="background-color:red;">
                <h4 class="panel-title">Master Parameter</h4>
            </div>
            <div class="panel-body">
                <form action="<?php echo base_url("content/create_m_param_proses"); ?>"  method="POST" class="form-horizontal group-border stripped" role="form">
                    <div class="form-group" >
                        <div class=" col-lg-9">
                            <!-- col-lg-6 end here -->
                            <div class="col-lg-3">
                                <!-- col-lg-6 start here -->
                                <label for="f_type" class="control-label ">Master Parameter</label>
                                <input style=" height: 30px"   type="text" required="" class="form-control" id="f_type" name="f_type" placeholder="Type">
                            </div>
                            <!-- col-lg-6 end here -->
                            <div class="col-lg-3">
                                <!-- col-lg-6 start here -->
                                <label for="f_desc" class="control-label">Option</label>
                                <input name="f_desc" id="f_desc" style="height: 30px"   type="text" class="form-control" id="text" required="" placeholder="Option">
                            </div>
                            <div class="col-lg-3">
                                <!-- col-lg-6 start here -->
                                <label for="input" class="control-label"></label>
                                <button type="submit" style="margin-top: 25px; height: 30px;" class="btn btn-success mr5 mb10" ><i class="fa fa-save"></i>  <span class="text">Simpan</span></button>
                                <label for="input" class="control-label"></label>
                                <!--<input type="text" class="form-control" id="text" placeholder="Input">-->
                            </div>
                            <div class="col-lg-3">
                                <!-- col-lg-6 start here -->
                               <a href="<?php echo base_url('downloadexcel/m_param'); ?>" style="margin-top: 25px; height: 30px;" class="btn btn-primary mr5 mb10" ><i class="fa fa-download"></i>  <span class="text">Download Excel</span></a>
                               
                                <!--<input type="text" class="form-control" id="text" placeholder="Input">-->
                            </div>
                            
                        </div>

                </form>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-12">
                            <!--table baru-->
						<form action="<?php echo base_url('content/delete_masterparameter'); ?>" method="post" id="delete4" >
							<input type="hidden" name="delete2" class="form-control" id="delete1">
                                
							<table id="example" class="table table-bordered table-striped">
                                <thead>
                                    <tr> 
                                         <th><button type="button" onclick ="delet('delete3')" name="delete" id="delete"class="btn btn-danger px-1 py-0"><i  class="fa fa-trash-o"></i></button></th>   
                                        <th>Action</th>
                                        <th>Type</th>
                                        <th>Description </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($param as $item) { ?>
                                        <tr>            
                                             <td class="text-center" >
                                               
                                                <input type="checkbox"  id="checkbox1.<?php echo $item->f_code ?>" value="<?php echo $item->f_code ?>" name="idnya[]" >
                                                
                                            </td>
                                            <td class="text-center" >
											<!--href="<?php //echo base_url("content/update_param/" . $item->f_id) ?>"-->
                                                <a title="Edit" style="margin-top: 10px;" data-toggle="modal" data-target="#m_param" 
												data-code = "<?php echo $item->f_code ?>"
												data-type = "<?php echo $item->f_type ?>"
                                                data-desc = "<?php echo $item->f_desc ?>"
												><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                                            </td>
                                            <td>
                                            <input type="text" style="border: 0px; background-color: transparent;" value="<?php echo $item->f_type ?>" name="f_type">
                                            </td>
                                            <td>
                                                <input type="text" style="border: 0px; background-color: transparent;" value="<?php echo $item->f_desc ?>" name="f_desc">
                                            </td>
                                        </tr>                            
                                    <?php } ?>
                                </tbody>
                            </table> 
						</form>
                           
                           </div>

                    </div>
                
            </div>
        </div>
        <!-- End .panel -->
    </div>

</div>



<form action="<?php echo base_url('content/update_m_param'); ?>" method="post" >        
        <div class="modal fade" id="m_param" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">        
            <div class="modal-dialog modal-dialog-center" role="document">              
                <div class="modal-content">                    
                    <div class="modal-header" style ="background-color:red;"> 
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">     
                            <span aria-hidden="true">&times;</span>                
                        </button>                      
                        <h5 class="modal-title" style="color: white" id="exampleModalLabel">Update Data</h5>      
                    </div>                  
                    <div class="modal-body" > 
						<div class="form-group"> 
								<label class=" control-label">Type</label>                
								<input readonly = "true" type = "text" class="form-control" name = "type1" id="type1" >                     
								<input  type = "hidden" class="form-control" name = "code1" id="code1">                     
						</div>					
                                           
                        <div class="form-group">
                            <label class=" control-label">Option</label>
                            <input type = "text" class="form-control" name = "desc1" placeholder="Description" id="desc1"> 
							
						</div>             
                                           
                                  
                    </div>                   
                    <br>                   
                    <div class="modal-footer">                
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>                   
                        <button type="submit" class="btn btn-primary">Simpan</button>                
                    </div>             
                </div>          
            </div>      
        </div>   
    </form>  
<script src="<?php echo base_url('assets/jquery/jquery-2.2.3.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js') ?>">
</script><script type="text/javascript">
$(document).ready(function () {
	
	$('#m_param').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal = $(this);

            //alert(div.data('sp'));

            // Isi nilai pada field
            modal.find('#type1').attr("value", div.data('type'));
            modal.find('#desc1').attr("value", div.data('desc'));
            modal.find('#code1').attr("value", div.data('code'));
           
        });
	
	
        $('#example').DataTable({
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
             columnDefs : [
        { targets: 0, sortable: false},
    ],
    order: [[ 1, "asc" ]]
        });
    });
	
	function delet(a) {
        //event.preventDefault(); // prevent form submit
        var form = $('#delete4');//event.target.form; // storing the form
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
				$('#delete1').val(a);
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
	
	
	
</script>
<br>
<br>
<br>
<br>