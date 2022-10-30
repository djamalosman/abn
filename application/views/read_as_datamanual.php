<?php echo $this->session->flashdata('message'); ?>
<head>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedcolumns/3.2.6/css/fixedColumns.dataTables.min.css">
<style type="text/css">
.scrollmenu {
  overflow: auto;
  white-space: nowrap;
}
.clone .fixed-side {
    border:1px solid #000;
    background:#eee;
    visibility:visible;
}
    </style>
</head>
<body>
<div class="col-lg-12">
<!-- col-lg-12 start here -->
<div class="panel panel-default toggle panelMove panelClose panelRefresh">
    <!-- Start .panel -->
<div class="panel-heading">

    <!-- <a class="btn btn-success btn-block panel-title" style="width: 70px; height: 0px;" href="<?php echo base_url("content/create_mntr_lelang") ?>">
                <i class="fa fa-plus"></i>
                Create
            </a> -->
         <h4 class="panel-title">Basic Data tables</h4> 
</div>
<div class="scrollmenu">
<div class="panel-body">
     <form action="<?php echo base_url("content/excel_upload/t_branch/content/read_param_branch"); ?>" method="post" enctype="multipart/form-data">
        <div class="modal fade" id="ModalAgent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Upload Data Branch</h5>
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
<div class="">
    <!-- <a href="<?php echo base_url("content/create_mntr_lelang") ?>" button type="button" style="background-color: #0bacd3;" class="btn btn-primary btn-xs mr2 mb10">Create Lelang</button></a> -->
    <a href="<?php echo base_url("content/create_as_data") ?>" button type="submit" style=" margin-top: 30px; height: 30px;" class="btn btn-success mr5 mb10" ><i class="fa fa-send">
                     </i>  <span class="text"> Create Manual Assigment</span></button></a>

   <br>
   <br>
<table id="example"  class="display nowrap table-bordered" style="width:100%;border: 2px;">
<thead>
<tr>    
<th class="text-center"><button type="submit" class="btn btn-danger p-1"><i class="fa fa-trash-o"></i></button></th>
<th>Aksi</th>
<th>Assignment ID</th>
<th>Tanggal Penugasan</th>
<th>Agent ID</th>
<th>Total Record</th>
<th>Finish Record</th>
<th>Pindah ke Agen</th>
<th>Agen Asal</th>
<th>Tanggal Transfer</th>
<th>Status</th>
</tr>
</thead>
  <tbody>
            <?php foreach ($assignment as $item) { ?>
                <tr>            
                    <td class="text-center"><input type="checkbox" value="<?php echo $item->f_assignid ?>" name="idnya[]"/></td>
                    <td>
                        <a title="Edit" href="<?php echo base_url("content/update_as_data/".$item->f_assignid) ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        <a title="Detail" href="<?php echo base_url('content/read_as_datadetail/').$item->f_assignid ?>"><i class="fa fa-list" aria-hidden="true"></i></a>
                    </td>                    
                    <td><?php echo $item->f_assignid ?></td>
                    <td><?php echo $item->f_assigndate ?></td>
                    <td><?php echo $item->f_agentid ?></td>
                    <td><?php echo $item->f_rectotal ?></td>
                    <td><?php echo $item->f_recdone ?></td>
                    <td><?php echo $item->f_trftoagentid ?></td>
                    <td><?php echo $item->f_originagent ?></td>
                    <td><?php echo $item->f_trfdate ?></td>
                    <td><?php echo $item->f_status ?></td>
                </tr>                            
            <?php } ?>
        </tbody>
</table>

 
</div>
</div>
</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js">
    
</script>
<script type="text/javascript"src="https://cdn.datatables.net/fixedcolumns/3.2.6/js/dataTables.fixedColumns.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable( {
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
         "scrollX": true,
    } );
} );
</script>


</body>