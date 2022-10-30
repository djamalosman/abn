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
                    <div class="panel-heading" style="background-color: red;">
                        <h4 class="panel-title"><i class="glyphicon glyphicon-list-alt"></i>Hasil Restrukturisasi</h4>
                    </div>
                    <div class="panel-body">
                        <div class="row profile">


                            <div class="panel-body">
                                <form action="<?php echo base_url('restru/updateImagedelete'); ?>" method="post" enctype="multipart/form-data">
                                    <div class="row clearfix">
                                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <a style="background-color :orange;" onclick="goBack()" class="btn btn-warning btn-sm mr5 mb10"><i class="fa  fa-arrow-left "></i>  Back</a>   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    if (!empty($foto)) {
                                        foreach ($foto as $file) {
                                            ?>
                                            <div class="col-md-2">
                                                <table id="responsive" class="table table-striped table-bordered data-server-side dataTable no-footer">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                  <label>a</label>
                                                                <div class="panel panel-default my_panel">
                                                                    
                                                                    <div class="panel-body">
                                                                      
                                                                        <a data-img = "<?php echo base_url('uploads/' . $file->file_content); ?>" 
                                                                           data-type = "<?php echo $file->type_file ?>" 
                                                                           data-toggle = "modal" data-target="#modalimage">
                                                                            <div class="image-wrapper">
                                                                                <img  <?php
                                                                                if ($file->type_file == 'application/pdf') {
                                                                                    echo 'src=' . base_url('gambar/pdficon1.png');
                                                                                } else {
                                                                                    echo 'src=' . base_url('gambar/image1.png');
                                                                                }
                                                                                ?>>
                                                                            </div>
                                                                        </a>
                                                                    </div>

                                                                </div>
                                                                <input type="checkbox" title="delete" value="<?php echo $file->file_content ?>" name="idnya[]"/>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                                              <?php
                                                                }
                                                            } else {
                                                                ?>
                                        <p>Image(s) not found.....</p>
                                    <?php } ?>

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
                                                                   
                                                        </object>﻿ 
                                                        
                                                <!--<img id="image1" alt="image alt" class="img-responsive" >-->    
                                                    </div>

                                                </div>
       
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>      

                                    <div class="row clearfix">
                                        <div class="col-lg-12">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="Input Dokument">Input Dokument</label>
                                            </div>
                                            <div class="col-lg-4 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="file" multiple="multiple"  id="myfile" class="form-control" name="myfile[]">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
   
                                    <div class="row clearfix" >
                                        <div class="col-lg-12">
                                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="No Nasabah">Nomor nasabah</label>
                                            </div>
                                            <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" name="nomor_nasabah" id="nomor_nasabah" class="form-control" value="<?php echo $imageview->no_nasabah ?>" placeholder="nomor_nasabah" required="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix" >
                                        <div class="col-lg-12">
                                            <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="No Nasabah">Restruktrur ke</label>
                                            </div>
                                            <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" name="restruktur_ke" id="restruktur_ke" class="form-control" value="<?php echo $imageview->restruktur_ke ?>" placeholder="restruktur_ke" required="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        </div>
                                        <div class="col-lg-4 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <button type="submit" name="update" id="insert"  style="background-color:  green" class="btn btn-success btn-sm mr5 mb10" ><i class="fa fa-trash"></i>  <span class="text"> Update</span></button>
                                                    <button type="submit" name="delete" id="delete"  style="background-color:  green" class="btn btn-success btn-sm mr5 mb10" ><i class="fa fa-trash"></i>  <span class="text"> Delete</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- Start .row -->
                        </div>
                        <!-- End .row -->
                    </div>


                </div>

            </div>

        </div>
        <script src="<?php echo base_url('assets/jquery/jquery-2.2.3.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js') ?>"></script>
        <script>
                                                        $(document).ready(function () {
                                                            
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
                                                        
                                                                    function goBack() {
                window.history.back();
            }
        </script>


    </body>
</html>