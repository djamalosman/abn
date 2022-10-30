<?php echo $this->session->flashdata('message'); ?>
<div class="container-fluid">
    <!-- Modal -->
    <!--<form action="<?php echo base_url("menu/excel_upload/t_level/menu/read_level"); ?>" method="post" enctype="multipart/form-data">
        <div class="modal fade" id="ModalAgent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h5 class="modal-title" id="exampleModalLabel">Upload Data User Level</h5>
                        
                    </div>
                    <div class="modal-body">
                        <input type="file" name="file"/> 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Import Data</button>
                    </div>
                </div>
            </div>
        </div>    
    </form> -->


    <!--bssbaru-->
    <?php //echo form_open("menu/delete_multilevel", "id='swa-confirm'") ?>
    <div class="row">
        <div class=" col-lg-12">
            <div class="panel panel-danger toggle panelMove panelClose panelRefresh">
                <!-- Start .panel -->
                <div class="panel-heading" style="background-color : red;">
                    <h4 class="panel-title">Data User Level</h4>
                </div>
                <div class="panel-body">
                    <div class=" form-group" >
                        <div class="col-md-2">
                           
                        </div>
                        <!--<div class="col-md-2">
                            <a class="btn btn-success" href="<?php echo base_url("als_asset/form_menu_level.xlsx") ?>">
                                <i class="fa fa-download"></i>
                                Download Format
                            </a>    
                        </div>
                        <div class="col-lg-2">
                            <button type="button" data-toggle="modal" data-target="#ModalAgent" class="btn btn-success " >
                                <i class="fa fa-upload"></i>
                                Import
                            </button>         
                        </div>-->
                    </div>
                    <br>
                    <br>
                    <br>

                    <div class="col-lg-12">
					<form action="<?php echo base_url('menu/delete_multilevel'); ?>" method="post" id="delete">
						<table id="example" class="table table-striped table-bordered">
                            <thead>
                                <tr>	
                                    
                                    <th>Aksi</th>
                                    <th>Level name</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($user_data as $item) { ?>
                                    <tr>			
                                       
                                        <td>
                                           
											<?php if ($this->session->userdata('level') == "99") { ?>
                                                <a title="Fitur" href="<?php echo base_url("menu/read_menu_access/" . $item->t_levelid) ?>" >
                                                    <i class="fa fa-sitemap" aria-hidden="true"></i>
                                                </a>
                                            <?php } ?>
                                        </td>
                                        <td><?php echo $item->f_levelname ?></td>
                                        <td><?php echo $item->f_active == 1 ? "Aktif" : "Tidak Aktif" ?></td>
                                    </tr>                            
                                <?php } ?>
                            </tbody>
                        </table> 
					</form>
					
					<form action="<?php echo base_url("menu/update_level") ?>" method="post" id="updatelevel">
                            <input name="idlevel" type="hidden" id = "idlevel"/>

                    </form>
                        
                    </div>
                </div>
            </div>
        </div>
        <?php //echo form_close() ?>
    </div>
    <script src="<?php echo base_url('assets/jquery/jquery-2.2.3.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable( {
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
         columnDefs: [
                {targets: 0, sortable: false},
            ],
            order: [[1, "asc"]]
         //"scrollX": true,
    } );
} );

											function updatelevel(a) {
                                                $('#idlevel').val(a);
                                                $('#updatelevel').submit();
                                            }
function delet() {
        //event.preventDefault(); // prevent form submit
        var form = $('#delete');//event.target.form; // storing the form
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