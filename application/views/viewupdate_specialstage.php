<html>

<head>
    <title>Upload Form</title>
</head>

<body>
    <div class="panel-body pt0 pb0">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-danger toggle panelMove panelClose panelRefresh">
                    <div class="panel-heading" style="background-color: red;">
                        <h4 class="panel-title"><i class="fa fa-users"></i>Input Data Special Stage</h4>
                    </div>
                    <div class="panel-body">
                        <form action="<?php echo base_url('Spesial_stage/update_specialstage'); ?>" enctype="multipart/form-data" method="post">
                            <div class="form-group">
                                <div class="col-lg-6">
                                    <label class="col-lg-3 control-label" for="cif">Cif</label>
                                    <div class="col-lg-6">
                                        <input style=" height: 30px;" type="number" readonly="" class="form-control" id="cif" value="<?php echo $inputsepcialstage->f_cif ?>" name="cif">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-3 control-label" for="nama">Nomor Rekening</label>
                                    <div class="col-lg-6">
                                        <input id="loanid" readonly="" value="<?php echo $inputsepcialstage->f_acctno ?>" name="NomorRekening" style=" height: 30px" type="text" class="form-control" required="">
                                        <?php echo form_error('f_empname', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                                    </div>
                                </div>
                                <div class="col-lg-6" hidden="">
                                    <label class="col-lg-3 control-label" for="nama">NamaDebitur</label>
                                    <div class="col-lg-6">
                                        <input id="loanid" readonly="" value="<?php echo $inputsepcialstage->f_custname ?>" name="NamaDebitur" style=" height: 30px" type="text" class="form-control" required="">
                                        <?php echo form_error('f_empname', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                                    </div>
                                </div>
                                <div class="col-lg-6"hidden="">
                                    <label class="col-lg-3 control-label" for="nama">LD_Temenos</label>
                                    <div class="col-lg-6">
                                        <input id="loanid" readonly="" value="<?php echo $inputsepcialstage->f_loanid ?>" name="LD_Temenos" style=" height: 30px" type="text" class="form-control" required="">
                                        <?php echo form_error('f_empname', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                                    </div>
                                </div>
                                <div class="col-lg-6"hidden="">
                                    <label class="col-lg-3 control-label" for="nama">Nama cabang</label>
                                    <div class="col-lg-6">
                                        <input id="loanid" readonly="" value="<?php echo $inputsepcialstage->nama_branch ?>" name="nama_cabang" style=" height: 30px" type="text" class="form-control" required="">
                                        <?php echo form_error('f_empname', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                                    </div>
                                </div>
                                <div class="col-lg-6"hidden="">
                                    <label class="col-lg-3 control-label" for="nama">kode cabang</label>
                                    <div class="col-lg-6">
                                        <input id="loanid" readonly="" value="<?php echo $inputsepcialstage->f_branch_id ?>" name="KodeCabang" style=" height: 30px" type="text" class="form-control" required="">
                                        <?php echo form_error('f_empname', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-6">
                                    <label class="col-lg-3 control-label" for="email">Sepcial Stage</label>
                                    <div class="col-lg-6">

                                        <?php echo form_error('f_compid', "<span style='font-size: 10pt; color: red'>", "</span>") ?> <select class="form-control show-tick" name="f_flagspecialstage" id="f_flagspecialstage" data-live-search="true" required="">
                                        <option value="">-- Please select --</option>
                                    <?php   
                                    foreach($paramstage as $row) : ?>
                                    <option <?php echo $row->f_desc == $inputsepcialstage->f_flagspecialstage ? "selected" : "" ;?>
                                     value="<?php echo $row->f_type.'-'.$row->f_desc ?>" > 
                                     <?php echo $row->f_desc; ?>
                                    </option>
                             <?php endforeach ;?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-3 control-label" for="notlp">File</label>
                                    <div class="col-lg-6" style="margin-bottom:20px;">
                                        <input type="file" name="userfile" size="20" />
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group" style>
                                <div class="col-lg-6">
                                    <label class="col-lg-3 control-label" for="f_deptid"></label>
                                    <div class="col-lg-6">
                                        <a style=" height: 30px" href="<?php echo base_url('Spesial_stage/index') ?>" type="button" class="btn btn-warning"><i class=" fa fa-undo"></i> <span class="text">Cancel</span></a>
                                        <button type="submit" value="upload" class="btn btn-success" ><i class="fa fa-save"></i> Upload</button>
                                    </div>
                                </div>
                             </div>

                        </form>
                    </div>

                </div>
                <!-- Start .panel -->

            </div>



            <!-- <div class="col-lg-12">
                <div class="panel panel-default toggle panelMove panelClose panelRefresh">

                    <?php //echo form_open_multipart('Spesial_stage/update_insert_specialstage'); ?>

                    <div class="form-group" style="padding-top: 5px; padding-bottom: 5px;">


                    </div>
                    <div class="form-group" style="padding-top: 5px; padding-bottom: 5px;">

                    </div>


                    <br /><br />



                    </form>
                </div>
            </div> -->
        </div>
    </div>
    <script type="text/javascript">
        var max_chars = 16;
        $('#ktp').keydown(function(e) {
            if ($(this).val().length >= max_chars) {
                $(this).val($(this).val().substr(0, max_chars));
            }
        });

        $('#ktp').keyup(function(e) {
            if ($(this).val().length >= max_chars) {
                $(this).val($(this).val().substr(0, max_chars));
            }
        });
    </script>
    <script type="text/javascript">
        var max_chars = 16;
        $('#nik').keydown(function(e) {
            if ($(this).val().length >= max_chars) {
                $(this).val($(this).val().substr(0, max_chars));
            }
        });

        $('#nik').keyup(function(e) {
            if ($(this).val().length >= max_chars) {
                $(this).val($(this).val().substr(0, max_chars));
            }
        });
    </script>
    <script>
        function myFunction() {
            var x = document.getElementById("myText").required;

        }
    </script>
</body>

</html>