<head>
    <style type="text/css">
    textarea {
        border: none;
        overflow: auto;
        outline: none;

        -webkit-box-shadow: none;
        -moz-box-shadow: none;
        box-shadow: none;

        resize: none;
        /*remove the resize handle on the bottom right*/
    }

    img {
        max-width: 180px;
    }

    input[type=file] {
        padding: 10px;
        background: white;
    }

    label {
        font-size: 15px;
    }

    td,
    tr,
    tbody,
    th,
    thead {
        border: 1px solid black !important;
        border-collapse: collapse;
    }

    th,
    td {
        font-family: "Quattrocento Sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
        font-size: 16px !important;
    }

    .tablex {
        table-layout: auto !important;
        min-width: 95% !important;
        max-width: 95% !important;
        width: 1px !important;
        white-space: nowrap;

    }

    .tablex tr {
        height: 28px !important;
    }

    .inputx {
        min-width: 111px !important;
        width: 1px !important;
        padding-right: 0px !important;
        margin-left: 5px;

    }

    h4 {
        text-align: center;

    }
    </style>


</head>

<body>
    <?php echo $this->session->flashdata('message'); ?>
    <div id="wrapper">
        <div class="anel panel-danger toggle panelMove panelClose panelRefresh">
            <div class="page-content-wrapper">
                <div class="container py-5">
                    <div class="panel panel-success ">
                        <div class="row">
                            <div class="col-md-12 mx-auto">
                                <form action="<?php echo base_url('Welcome/update_welcome') ?>" method="POST"
                                    enctype="multipart/form-data">

                                    <div class="form-group row">


                                        <div class="panel-body">
                                            <div class="panel-heading" style="background-color:#1f3983">
                                                <h4 class="panel-title " style="color:white"><i
                                                        class="glyphicon glyphicon-headphones" style="color:white"
                                                        ;></i>Update Data</h4>
                                            </div>
                                                <div class="col-sm-11">
                                                    <br>
                                                    <input  name="id_welcome" id="id_welcome" autocomplete="off"
                                                    value="<?php echo $v_datawelcome->id_welcome ?>" title="erorr" align="right"
                                                    class="form-control" type="hidden" placeholder="Judul" required ">

                                                    <input  name="code_image" id="code_image" autocomplete="off"
                                                    value="<?php echo $v_datawelcome->code_image ?>" title="erorr" align="right"
                                                    class="form-control" type="hidden" placeholder="Judul" required ">
                                                    <br>
                                                    <h4 class="panel-title">Input Slide Atas</h4>
                                                    <div class=" col-lg-11 col-md-9"style="width: 90%; ">
                                                            <div style=" height: 50%;" id="" class="summernote1"><?php echo $v_datawelcome->textslidesatu ?></div>
                                                    </div>
                                                            <textarea style="display: none;" name="summernote3" class="summernote3" id="sm3" cols="5" rows="3"></textarea>
                                                </div>
                                                <div class="col-sm-11">
                                                    <h4 class="panel-title">Input Slide Bawah</h4>
                                                    <div class=" col-lg-11 col-md-9"style="width: 90%; ">
                                                            <div style=" height: 50%;" id="" class="summernote2"><?php echo $v_datawelcome->textslidesatu ?></div>
                                                    </div>
                                                            <textarea style="display: none;" name="summernote33" class="summernote33" id="sm33" cols="5" rows="3"></textarea>
                                                </div>
                                    </div>
                            </div>



                            <br>
                            <div class="col-lg-6 col-md-4 col-sm-12">
                                <!-- col-lg-4 start here -->
                                <div class="panel panel-success ">
                                    <!-- Start .panel -->
                                    <div class="panel-heading" style="background-color:#1f3983">
                                        <h4 class="panel-title"><i class="glyphicon glyphicon-headphones"></i>Upload
                                            image</h4>
                                    </div>
                                    <div class="panel-body">
                                        <input type='file' value="<?php echo base_url('uploads/' . $v_datawelcome->file_content)?>" multiple="multiple" required="" class="form-control"
                                            id="blah[]" name="myfile[]" onchange="readURL(this);" /><img id="blah"
                                            src="<?php echo base_url('uploads/' . $v_datawelcome->file_content)?>"
                                            alt="your image" />
                                        <!-- <input type="file" multiple="multiple" required="" id="myfile" class="form-control" name="myfile[]"> -->
                                    </div>


                                    <button type="submit" value="btn-submit" class="btn btn-primary px-4 float-right"
                                        name="btn-submit" id="btn-submit" style="display: none">Save</button>
                                    <button type="button" value="btn-submit" class="btn btn-primary px-4 float-right"
                                        onclick="test()">Save</button>
                                    <a href="<?php echo base_url ('news')?>" button type="submit"
                                        class="btn btn-primary px-4 float-right">Cancel</button></a>
                                    <!-- <input type="button"  value="Print 1st Div" onclick="javascript:printDiv('printablediv')" /> -->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script>
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#blah')
                            .attr('src', e.target.result);
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }
            </script>
            <script type="text/javascript">
            $(document).ready(function() {
                //var dasarpertimbangan = $('.summernote1').summernote();      
                //$('.summernote2').summernote();
                $('.summernote1').summernote();
                $('.summernote2').summernote();
                $('.summernote5').summernote();
                $('.summernote8').summernote();
                $('.summernote11').summernote();
            });

            function test() {
                //var test = $('.summernote3').summernote('code');
                //alert(test.editable());
                //alert($('#sm3').summernote('code'));
                var text = document.getElementsByClassName('note-editable');
                //alert(text[0].innerText+" - "+text[1].innerText);
                $('.summernote3').val(text[0].innerHTML);
                $('.summernote33').val(text[1].innerHTML);
                $('#btn-submit').click();
            }
            </script>
            <script type="text/javascript">
            $(".chb1").change(function() {
                $(".chb1").prop('checked', false);
                $(this).prop('checked', true);

            });

            $(".chb2").change(function() {
                $(".chb2").prop('checked', false);
                $(this).prop('checked', true);
            });
            $(".chb3").change(function() {
                $(".chb3").prop('checked', false);
                $(this).prop('checked', true);
            });
            $(".chb4").change(function() {
                $(".chb4").prop('checked', false);
                $(this).prop('checked', true);
            });
            $(".chb5").change(function() {
                $(".chb5").prop('checked', false);
                $(this).prop('checked', true);
            });
            </script>
</body