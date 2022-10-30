<html>
    <body>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default toggle panelMove panelClose panelRefresh">
                    <div class="panel-heading">
                        <h4 class="panel-title">edit parameter</h4>
                    </div>
                    <div class="panel-body">
                        <form action="<?php echo base_url('content/update_allparameter') ?>" method="POST" class="form-horizontal group-border stripped">
                            <div class="form-group" style="padding-top: 5px; padding-bottom: 5px;">
                                <div class="col-lg-6">
                                    <label class="col-lg-3 control-label" for="f_id">ID</label>
                                    <div class="col-lg-6">
                                        <input id="f_id" readonly="" value="<?php echo $agent->f_id ?>" name ="f_id" style=" height: 30px"  type="text" class="form-control" required="">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <label class="col-lg-3 control-label" for="untuk">For</label>
                                    <div class="col-lg-6">
                                        <select style=" height: 30px"  id="f_untuk" name="f_untuk" class="fancy-select form-control">
                                            <option value="M" <?php echo $agent->f_untuk == 'M' ? "selected" : "" ?> >Mobile</option>
                                            <option value="W" <?php echo $agent->f_untuk == 'W' ? "selected" : "" ?>>Web</option>
                                        </select>
                                    </div>
<!--                                    <div class="col-lg-6">
                                        <input id="f_untuk"  value="<?php echo $agent->f_untuk ?>" name ="f_untuk" style=" height: 30px"  type="text" class="form-control" required="">
                                    </div>-->
                                </div>



                            </div>
                            <div class="form-group" style="padding-top: 5px; padding-bottom: 5px;">
                                <div class="col-lg-6">
                                    <label class="col-lg-3 control-label" for="Type">Type</label>
                                    <div class="col-lg-6">
                                        <input id="f_type" value="<?php echo $agent->f_type ?>" readonly="true" name="f_type" style=" height: 30px"  type="text" class="form-control" required="">

                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <label class="col-lg-3 control-label" for="Type">Status</label>
                                    <div class="col-lg-6">
                                        <select style=" height: 30px"  id="f_status" name="f_status" class="fancy-select form-control">

                                            <option value="1">Active</option>
                                            <option value="0">Tidak aktif</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!--nama-->
                            <div class="form-group" style="padding-top: 5px; padding-bottom: 5px;">
                                <div class="col-lg-6">
                                    <label class="col-lg-3 control-label" for="Code">Code</label>
                                    <div class="col-lg-6">
                                        <input id="f_code" value="<?php echo $agent->f_code ?>" name="f_code" style=" height: 30px"  type="text" class="form-control" required="">

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-3 control-label" for="desc">desc</label>
                                    <div class="col-lg-6">
                                        <input id="f_desc" value="<?php echo $agent->f_desc ?>" name="f_desc" style=" height: 30px"  type="text" class="form-control" required="">

                                    </div></div>
                            </div>
                            <div class="form-group" >
                                <div class="col-lg-6">
                                    <label class="col-lg-3 control-label" for="">Value</label>
                                    <div class="col-lg-6">
                                        <input style=" height: 30px" type="text" class="form-control" id="f_value" value="<?php echo $agent->f_value ?>" name="f_value">
                                        <?php // echo form_error('f_compid', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                                    </div></div>
                                <div class="col-lg-6">
                                    <label class="col-lg-3 control-label" for="f_deptid"></label>
                                    <div class="col-lg-6">
                                        <a style=" height: 30px" href="<?php echo base_url('content/read_param') ?>" type="button" class="btn btn-warning"><i class=" fa fa-undo" ></i> <span class="text">Cancel</span></a>
                                        <button style=" height: 30px" type="submit" class="btn btn-primary" id="simpan" value="Simpan" name="simpan"><i class=" fa fa-save"></i><span class="text"> Simpan</span> </button>
                                                <?php echo form_error('f_deptid', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                                    </div>
                                </div>
                            </div>
                            <!--company id-->
                        </form>
                        <?php // echo form_open('content/create_um_datakaryawan_process', 'id="swaz-confirm" class="form-horizontal group-border stripped"'); ?>
                        <!--<form class="form-horizontal group-border stripped" id="swaz-confirm" action="">-->
                        <!--nik-->


                    </div>
                </div>
            </div>
        </div>
        <script>
            function myFunction() {
                var x = document.getElementById("myText").required;

            }
        </script>
    </body>
</html>
