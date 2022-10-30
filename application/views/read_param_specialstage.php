

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.7/css/select.dataTables.min.css" />

    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" />
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.3.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {
    $('#special').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'csvHtml5',
                exportOptions: {
                    columns: [ 2,3,]
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: [ 2,3,]
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [2,3]
                }
            }
        ]

    } );
} );
    </script>
<?php echo $this->session->flashdata('message'); ?>
<div class="container-fluid">
    <!-- Modal -->
    <form action="<?php echo base_url("content/excel_upload/t_area/content/read_param_area");?>" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="ModalAgent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Upload Data Area</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
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
    </form>
    <?php echo form_open("content/delete_multi_param_area", "id='swa-confirm'") ?>
    <div class="row">
        <div class="border-primary col-xs-12 col-md-auto p-1">
            <a class="btn btn-success btn-block" href="<?php echo base_url("content/create_param_specialstage") ?>">
                <i class="fa fa-plus"></i>
                 Tambah Special Stage
            </a>
        </div>
        
        <div class="border-primary col-xs-12 col-md-auto p-1">
            <a class="btn btn-success btn-block" href="<?php echo base_url("als_asset/excel/form_param_area.xlsx") ?>">
                <i class="fa fa-download"></i>
                Download Format
            </a>    
        </div>
        
        <div class="border-primary col-xs-12 col-md-auto p-1">
            <button type="button" data-toggle="modal" data-target="#ModalAgent" class="btn btn-success btn-block" >
                <i class="fa fa-upload"></i>
                Import
            </button>         
        </div>
    </div>
    
    </br></br>
    <div style="overflow-x: scroll; " class="w-100">
    <table class="table table-striped table-bordered" id="special">
        <thead>
            <tr>	
                <th class="text-center"><button type="submit" class="btn btn-danger px-1 py-0"><i class="fa fa-trash-o"></i></button></th>
                <th>Aksi</th>
                <th>Category</th>
                <th>Special Stage</th>
                
            </tr>
        </thead>
        <tbody>
            <?php foreach ($paramstage as $item) { ?> 
                <tr>			
                    <td class="text-center"><input type="checkbox" value="<?php echo $item->f_specialstageid ?>" name="idnya[]"/></td>
                    <td>
                        <a title="Edit" href="<?php echo base_url("content/update_param_area/".$item->f_specialstageid) ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                    </td>
                    <td><?php echo $item->f_specialstage ?></td>
                    <td><?php echo $item->f_specialstagecode ?></td>
                    
                </tr>                            
            <?php } ?>
        </tbody>
    </table>       
    </div>
    <?php echo form_close() ?>
</div>
