<?php echo $this->session->flashdata('message'); ?>
<head>

  <link href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css" rel="stylesheet" />

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <!--     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"> -->
    <style type="text/css">
        .scrollmenu {
            overflow: auto;
            white-space: nowrap;
        }


    </style>
</head>
<body>
    <div class="col-lg-12">
        <!-- col-lg-12 start here -->
        <div class="panel panel-danger toggle panelMove panelClose panelRefresh">
            <!-- Start .panel -->
            <div class="panel-heading" style="background-color : red">

    <!-- <a class="btn btn-success btn-block panel-title" style="width: 70px; height: 0px;" href="<?php echo base_url("content/create_mntr_lelang") ?>">
                <i class="fa fa-plus"></i>
                Create
            </a> -->
                <h4 class="panel-title">Data Branch</h4> 
            </div>
            <div class="scrollmenu">
                <div class="panel-body">

                    <div class="">
                        <!-- <a href="<?php echo base_url("content/create_mntr_lelang") ?>" button type="button" style="background-color: #0bacd3;" class="btn btn-primary btn-xs mr2 mb10">Create Lelang</button></a> -->
                        <a href="<?php echo base_url('downloadexcel/excel_branch'); ?>" button type="button" style="background-color: #0bacd3;" class="btn btn-primary"><i class="fa  fa-download"></i> Download Excel</button></a>
                        <br>
                        <br>
                        <?php echo form_open("content/delete_multi_mntr_lelang", "id='swa-confirm'") ?>
                      
                        <table id="example"  class="table nowrap table-bordered" style="width:100%;border: 2px;">
                            <thead>
                                <tr>  
<th>ID Cabang</th>
<th>Nama Cabang</th>
<th>Alamat</th>

</tr>
                            </thead>

                           tbody>
            <?php foreach ($branch as $item) { ?>
                <tr>            
                   
                    </td>
							<td><center><?php echo $item->ID ?></center></td>
                            <td><center><?php echo $item->COMPANY_NAME ?></center></td>
                            <td><center><?php echo $item->NAME_ADDRESS ?></center></td>
                </tr>                            
            <?php } ?>
        </tbody>
                        </table>
<?php echo form_close() ?>
                       
                
                       
                    </div>
                </div>
            </div>
			   <div class="modal fade" id="mySmallModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                                    </button>
                                    <h4 class="modal-title" id="mySmallModalLabel">Modal title</h4>
                                </div>
					 <form action="<?php echo base_url('content/create_param_branch_process') ?>" method="POST" class="form-horizontal group-border stripped">			
                     <div class="modal-body">
                      <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="Username">ID Cabang</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="id_branch" id="id_branch"  class="form-control"  value="" autocomplete="off" required="" placeholder="Username">
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="Email">Nama Cabang</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" autocomplete="off" name="branch_name" id="branch_name" class="form-control"  value="" required="" placeholder="Email">
                                </div>
                            </div>
                        </div>
                    </div>
					 <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="Email">Alamat</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="email" autocomplete="off" name="address" id="address" class="form-control"  value="" required="" placeholder="Email">
                                </div>
                            </div>
                        </div>
                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button></a>
                                </div>
                </form>
                            </div>
                        </div>
                    </div>  
        </div>
    </div>
<script src="<?php echo base_url('assets/jquery/jquery-2.2.3.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
   <script type="text/javascript">$(document).ready(function () {
        $('#example').DataTable({
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
             columnDefs : [
        { targets: 0, sortable: false},
    ],
    order: [[ 1, "asc" ]]
        });
    });
</script>


 
    
</body>