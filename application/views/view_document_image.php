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
                    <!-- Start .panel -->
                    <div class="panel-heading" style="background-color: #1f3983;">
                        <h4 class="panel-title"><i class="glyphicon glyphicon-list-alt"></i><?php echo $pagename ?></h4>
                    </div>
                    <div class="panel-body">
                        <div class="row profile">
                            <div class="panel-body">
                                <form action="<?php echo base_url('Create_document_image/insert_Imagedelete'); ?>" method="post" enctype="multipart/form-data">
                                    <div class="row clearfix" >
                                        <div class="col-lg-12" >
                                           
                                            <div class="col-lg-4 col-md-10 col-sm-8 col-xs-7" >
                                                <label for="CIF">Upload Gambar</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="file" multiple="multiple"  id="myfile" class="form-control" name="myfile[]">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-10 col-sm-8 col-xs-7" >
                                                <label for="CIF">Nama Kegiatan </label>
                                                <div class="form-group">
                                                    
                                                    <div class="form-line">
                                                        <input type="text"  class="form-control" name="namakgtn" require>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-10 col-sm-8 col-xs-7" >
                                                <label for="CIF">Nama Folder</label>
                                                <div class="form-group">
                                                
                                                    <div class="form-line">
                                                        <input type="text"  class="form-control" name="namafolder" require>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-md-10 col-sm-8 col-xs-7">
                                                <label for="CIF"></label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <button type="submit" name="update" id="insert"  style="background-color: #1f3983;" class="btn btn-success btn-sm mr5 mb10" ><i class="fa fa-plus"></i>  <span class="text"> insert</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="row clearfix">
                                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        </div>
                                        
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                        <table id="example" class="table table-striped table-bordered">
                            <thead>
                                <tr>	
                                    
                                    <th>Aksi</th>
                                    <th>Nama Kegiatan</th>
                                    <th>Nama Folder</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($imageviewTabel as $item) { ?>
                                    <tr>
                                        <td>
                                            <a title="Fitur" target="blank" href="<?php echo base_url("Create_document_image/detailsImageTabel/" . $item->idfolder) ?>" >
                                            <button type="button"   style="background-color: #1f3983;" class="btn btn-success btn-sm mr5 mb10" ><i class="fa fa-pencil"></i>  <span class="text"> update</span></button>
                                            </a>
                                        </td>
                                        <td><?php echo $item->nama_Kegiatan ?></td>
                                        <td><?php echo $item->nameFolder ?></td>
                                    </tr>                            
                                <?php } ?> 
                            </tbody>
                        </table> 
                                    </div>
                                    
                                    <div class="modal fade" id="modalimage" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-center">
                                            <div class="modal-content" >
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">
                                                        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                                                    </button>
                                                    <h4 class="modal-title" id="myModalLabel">Frame</h4>
                                                </div>
                                               
                                                <div class="modal-body">
                                                    <div>
                                                        
                                                        <object class="col-lg-12"  id="img1" 
                                                                style="height:1000px;width:100%; align-content: center">
                                                                   
                                                        </object>??? 
                                                        
                                                <!--<img id="image1" alt="image alt" class="img-responsive" >-->    
                                                    </div>

                                                </div>
       
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>      

                                    
                                    
                                    <div class="row clearfix" hidden="">
                                        <div class="col-lg-12">
                                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="CIF">CIF</label>
                                            </div>
                                            <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix" hidden >
                                        <div class="col-lg-12">
                                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="No Nasabah">Code</label>
                                            </div>
                                            <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" name="code" id="code" class="form-control" value="<?php echo $imageview->code ?>" placeholder="code" required="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </from>
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
         //"scrollX": true,
    } );
                                                            $('#modalimage').on('show.bs.modal', function (event) {
                                                                var div = $(event.relatedTarget); // Tombol dimana modal di tampilkan
                                                                var modal = $(this);

                                                                //console.log('masuk');

                                                                //alert(div.data('sp'));

                                                                // Isi nilai pada field
                                                                //            modal.find('#img1').attr(("data", div.data('img')),("type", div.data('type')));
                                                                modal.find('#img1').attr("type", div.data('type'));
                                                                modal.find('#img1').attr("data", div.data('img'));


                                                            });
                                                            
                                                            
                                                        });
                                                        
        </script>


    </body>
</html>