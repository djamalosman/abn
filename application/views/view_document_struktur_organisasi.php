<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <style type="text/css">
            .my_panel > .panel-body {
                padding: 0px;
            }
            .my_panel > .panel-body > img {
                width: 100%;
                height: 100%;
            }
            .my_panel > .panel-footer {
                text-align: center;
            }
            .image-wrapper {
                height: 120px;
                width: 100px;
                display: block;
                margin-left: auto;
                margin-right: auto;
            }

            .image-wrapper img {
                width: 100%;
                height: auto;
            }
            
             .imagemodal-wrapper {
                height: 150px;
                width: 550px;
                display: block;
                margin-left: auto;
                margin-right: auto;
            }

            .imagemodal-wrapper img {
                width: 100%;
                height: auto;
            }
        </style>
        
    </head>
    <body>

        <div class="row">
            <div class="col-lg-12 col-md-4 col-sm-12">
                <div  class="panel panel-danger toggle panelMove panelClose panelRefresh">
                    <!-- Start panel -->
                        <div class="panel-heading" style="background-color: #1f3983;">
                            <h4 class="panel-title"><i class="glyphicon glyphicon-list-alt"></i><?php echo $pagename ?></h4>
                        </div>
                        <div class="panel-body">
                            <div class="row profile">
                                <div class="panel-body">
                                    <form action="<?php echo base_url('Strkorgsn/insert_StrukturOrganisasi'); ?>" method="post" enctype="multipart/form-data">
                                        <div class="row clearfix" >
                                            <div class="col-lg-12" >
                                                <div class="col-lg-4 col-md-10 col-sm-8 col-xs-7" >
                                                    <label>Upload File</label>
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="file" multiple="multiple"  id="myfile" class="form-control" name="myfile[]">
                                                        </div>
                                                    </div>
                                                </div><p>
                                                <div class="col-lg-4 col-md-10 col-sm-8 col-xs-7">
                                                    <label></label>
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <button type="submit" name="update" id="insert"  style="background-color: #1f3983;" class="btn btn-success btn-sm mr5 mb10" ><i class="fa fa-plus"></i>  <span class="text">Upload</span></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama File</th>
                                                        <th>File Size</th>
                                                        <th>File type</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php  $no=1 ?>
                                                    <?php foreach ($Alldata as $item) { ?>
                                                        <tr>
                                                        <td><?php echo $no ?></td>
                                                            <td><?php echo $item->name_file ?></td>
                                                            <td><?php echo $item->file_size ?></td>
                                                            <td><?php echo $item->type_file ?></td>
                                                            <td>
                                                                
                                                                <a title="Fitur" target="blank" href="<?php echo base_url("Strkorgsn/detailsStrukturOrganisasi/$item->id_file") ?>" >
                                                                    <button type="button" class="btn btn-primary">Update</button>
                                                                </a>
                                                                <a title="Fitur" target="blank" href="<?php echo base_url("Strkorgsn/deleteStrukturOrganisasi/$item->id_file") ?>" >
                                                                    <button type="button" class="btn btn-danger">Delete</button>
                                                                </a>
                                                            </td>
                                                            
                                                        </tr>
                                                                                  
                                                    <?php $no++;   } ?> 
                                                </tbody>
                                            </table> 
                                    </from>
                                </div>
                            </div>
                        </div>
                    <!-- End  panel -->         
                 </div>
            </div>
        </div>                    
        <script src="<?php echo base_url('assets/jquery/jquery-2.2.3.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js') ?>"></script>
        <script>
                $(document).ready(function () {
                    $('#example').DataTable( {
                        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                        columnDefs: [
                                {targets: 0, sortable: false},
                            ],
                            order: [[1, "asc"]]
                    } );
                });                                     
        </script>
    </body>
</html>