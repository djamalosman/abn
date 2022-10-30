<!DOCTYPE html>
<html>

<head>
    <title></title>
    <style type="text/css">
    .my_panel>.panel-body {
        padding: 0px;
    }

    .my_panel>.panel-body>img {
        width: 100%;
        height: 100%;
    }

    .my_panel>.panel-footer {
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

    #inner {
        display: table;
        margin: 0 auto;
        border: 1px solid black;
    }

    #outer {
        border: 1px solid red;
        width: 100%
    }
    
    </style>
</head>

<body>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="panel panel-danger toggle panelMove panelClose panelRefresh">
                <!-- Start .panel -->
                <div class="panel-heading" style="background-color: #1f3983;">
                    <h4 class="panel-title"><i class="glyphicon glyphicon-list-alt"></i><?php echo $pagename ?></h4>
                </div>
                <div class="panel-body">
                    <div class="row profile">
                            <form action="<?php echo base_url('Create_document_video/insert_videodelete'); ?>"
                                method="post" enctype="multipart/form-data">
                                <div class="row clearfix">
                                    <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                            <button type="submit" name="update" id="insert"
                                            style="background-color: #1f3983;"
                                                    class="btn btn-success btn-sm mr5 mb10"><i class="fa fa-trash"></i>
                                                    <span class="text"> insert</span></button>
                                                <button type="submit" name="delete" id="delete"
                                                style="background-color: #1f3983;"
                                                    class="btn btn-success btn-sm mr5 mb10"><i class="fa fa-trash"></i>
                                                    <span class="text"> Delete</span></button>
                                        </div>
                                    </div>    
                                        <div class="row clearfix">
                                    <div class="col-lg-12">
                                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <input type="text" name="judul" id="judul" class="form-control"
                                                placeholder="Judul">
                                        </div>
                                    </div>
                                </div>
                                
                                <br>
                                <div class="row clearfix">
                                    <div class="col-lg-12">
                                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <input type="text" name="link_video" id="link_video" class="form-control"
                                                placeholder="Link Video">
                                        </div>

                                    </div>
                                </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    if (!empty($video)) {
                                        foreach ($video as $file1) {
                                            ?>
                                <div class="col-sm-3">
                                    <table  id="responsive"class="table table-striped table-bordered data-server-side dataTable no-footer">
                                        
                                            <tr>
                                                <th>
                                                    <?php echo $file1->judul_modif ?>
                                                </th>
                                            </tr>
                                            <tr>        
                                                    <div class="panel panel-default my_panel">
                                                        <div class="panel-body">
                                                        <td>
                                                                        <a data-src = "<?php echo  $file1->link_video ?>" 
                                                                           data-toggle = "modal" data-target="#modalimage">
                                                                            <div class="image-wrapper">
                                                                                <img  <?php
                                                                                if ($file1->link_video == 'application/pdf') {
                                                                                    echo 'src=' . base_url('gambar/pdficon1.png');
                                                                                } else {
                                                                                    echo 'src=' . base_url('gambar/image1.png');
                                                                                }
                                                                                ?>>
                                                                            </div>
                                                                        </a>
                                                        </td>                
                                                        </div>
                                                    </div>
                                                    <input type="checkbox" title="delete"
                                                        value="<?php echo $file1->codevideo ?>" name="idnya[]" />
                                            </tr>
                                       
                                    </table>
                                </div>
                                <?php       
                                }
                                } else {
                                ?>
                                <p>Video(s) not found.....</p>
                                <?php } ?>
                                <div class="modal fade" id="modalimage" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-center">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">
                                                    <span aria-hidden="true">&times;</span><span
                                                        class="sr-only">Close</span>
                                                </button>
                                                <h4 class="modal-title" id="myModalLabel">Video</h4>
                                            </div>

                                            <div class="modal-body">
                                            <iframe class="youtube-video" width="850" height="450" id="img1"  frameborder="0" allowfullscreen></iframe>
                                            <!-- <iframe class="youtube-video"  id="img1" width="860" height="515"" 
                                            frameborder="0" allowfullscreen></iframe>   -->
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary stop-video"style="background-color: #1f3983;">
                                                <div clsass="btnclr"><a href="<?php echo base_url('video_v') ?>" class="stop-video">Stop Video</a></div>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            </div>
                            <br>
                            <div class="panel panel-danger toggle panelMove panelClose panelRefresh">
                            <div class="panel-body">
                            <div class="form-group">
                                <div class="col-lg-12">      
                            <table id="example"class="table table-bordered table-striped table-hover dt-responsive non-responsive">
                                        <thead>
                                            <tr>
                                            <tr style="background-color: #1f3983;color:white;">
                                                <th>Aksi</th>
                                                <th>Judul</th>
                                                <th>Nama file</th>
                                                <th>Tanggal input data</th>

                                            </tr>
                                        </thead>

                                        <?php foreach ($video as $item) { ?>
                                        <tr>
                                            <td>
                                
                                                <a data-toggle="modal" data-target="#ModalAgent1"
                                                data-id_video2="<?php echo $item->id_video ?>"
                                                data-judul2="<?php echo $item->judul ?>"
                                                data-link_video2="<?php echo $item->link_video ?>">
                                                <i class="fa fa-pencil"  style="color: #1f3983;" aria-hidden="true"></i></a>
                                                
                                            </td>
                                            
                                            <td><?php echo $item->judul ?></td>
                                            <td><?php echo $item->link_video ?></td>
                                            <td><?php echo $item->tanggal_insert ?></td>
                                           
                                        </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                               </div>
                               </div> 
                               </div> 
                            
 
                    </div>
                </div>
                <form action="<?php echo base_url('Create_document_video/update_video'); ?>" method="post">
    <div class="modal fade" id="ModalAgent1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-center" role="document">
            <div class="modal-content" style="width: 400px;">
                <div class="modal-header" style="background-color:#1f3983">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" style="color: white" id="exampleModalLabel">Update Video</h4>
                </div>
                <div class="modal-body">
                    <div class="row clearfix">
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line" hidden>
                                    <input type="text" autocomplete="off" name="id_video" id="id_video2" class="form-control"  readonly="true" placeholder="id video" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="no_ld">Judul</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" autocomplete="off" name="judul" id="judul2" class="form-control"  placeholder="judul" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="Cif">Link Video</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" autocomplete="off" name="link_video" id="link_video2" class="form-control"
                                        value="" required=""  placeholder="link video">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>    
                        <script src="<?php echo base_url('assets/jquery/jquery-2.2.3.min.js') ?>"></script>
                        <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js') ?>"></script>
                        <script>
                        $('a.play-video').click(function(){
                        $('.youtube-video')[0].contentWindow.postMessage('{"event":"command","func":"' + 'playVideo' + '","args":""}', '*');
                        });
                        $('a.stop-video').click(function(){
                            $('.youtube-video')[0].contentWindow.postMessage('{"event":"command","func":"' + 'stopVideo' + '","args":""}', '*');
                        });
                        $('a.pause-video').click(function(){
                        	$('.youtube-video')[0].contentWindow.postMessage('{"event":"command","func":"' + 'pauseVideo' + '","args":""}', '*');
                        });
                        </script>
                        <script>
                        $(document).ready(function() {

                            $('#modalimage').on('show.bs.modal', function(event) {
                                var div = $(event.relatedTarget); // Tombol dimana modal di tampilkan
                                var modal = $(this);

                                //console.log('masuk');

                                //alert(div.data('sp'));

                                // Isi nilai pada field
                                modal.find('#img1').attr("src", div.data('src'));
                                //modal.find('#img1').attr("data", div.data('src'));
                                 
                                 
                            });

                            $('#ModalAgent1').on('show.bs.modal', function(event) {
        var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
        var modal = $(this);
        modal.find('#id_video2').val(div.data('id_video2'));
        modal.find('#judul2').val(div.data('judul2'));
        modal.find('#link_video2').val(div.data('link_video2'));
        //$('#jenissp1').trigger('change');//.change();//trigger('update.fs');//.selectpicker("refresh");
    });
                        });
                        // $('#modal1').on('hidden.bs.modal', function (e) {
                        // $('#modal1 iframe').attr("src", $("#modal1 iframe").attr("src"));
                        // });
                        </script>


</body>

</html>