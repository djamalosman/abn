<html>
    <body>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default toggle panelMove panelClose panelRefresh">
                    <div class="panel-heading">
                        <h4 class="panel-title">Form Input Data Karyawan</h4>
                    </div>
                    <div class="panel-body pt0 pb0">
                        <form action="<?php echo base_url('content/update_um_agent_process') ?>" method="POST" class="form-horizontal group-border stripped">
                            <div class="form-group" style="padding-top: 5px; padding-bottom: 5px;">
                                <div class="col-lg-6">
                                    <label class="col-lg-3 control-label" for="nik">Nik</label>
                                    <div class="col-lg-6">
                                        <input id="nik" readonly="" value="<?php echo $agent->f_agentid ?>" name ="nik" style=" height: 30px"  type="text" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-3 control-label" for="nama">Nama</label>
                                    <div class="col-lg-6">
                                        <input id="nama" value="<?php echo $agent->f_agentname ?>" name="nama" style=" height: 30px"  type="text" class="form-control" required="">
                                        <?php echo form_error('f_empname', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                                    </div></div>
                            </div>
                            <!--nama-->
                            <div class="form-group" style="padding-top: 5px; padding-bottom: 5px;">
                                <div class="col-lg-6">
                                    <label class="col-lg-3 control-label" for="nama">Uername</label>
                                    <div class="col-lg-6">
                                        <input id="username" value="<?php echo $agent->f_username ?>" name="username" style=" height: 30px"  type="text" class="form-control" required="">
                                        <?php echo form_error('f_empname', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                                    </div></div>
                                <div class="col-lg-6">
                                    <label class="col-lg-3 control-label" for="nama">Password</label>
                                    <div class="col-lg-6">
                                        <input id="Password" value="<?php echo $agent->f_userpswd ?>" name="password" style=" height: 30px"  type="text" class="form-control" required="">
                                        <?php echo form_error('f_empname', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="col-lg-6">
                                    <label class="col-lg-3 control-label" for="Type">Status</label>
                                    <div class="col-lg-6">
                            <select style=" height: 30px"  id="f_status" name="f_status" class="fancy-select form-control">
                                    
                                   
                                    <?php
                                        if ( $agent->f_status ==1) {
                                            echo " <option value='1'>Active</option>";
                                            echo " <option value='2'>Non-Aktif</option>";
                                        }elseif ($agent->f_status==2) {
                                         echo " <option value='2'>Non-Aktif</option>";  
                                         echo " <option value='1'>Active</option>";
                                         
                                        }
                                    ?>
                            </select>
                                    </div>
                                </div>
                            </div>
                          
                            <!--company id-->
                            


                           


                            <div class="form-group" style="padding-top: 20px; padding-bottom: 5px;">
                                <div class="col-lg-6">
                                    <label class="col-lg-3 control-label" for=""></label>
                                    <div class="col-lg-6">
                                        <!--<input style=" height: 30px" type="text" class="form-control" id="f_compid" name="f_compid">-->
                                        <?php echo form_error('f_compid', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                                    </div></div>
                                <div class="col-lg-6">
                                    <label class="col-lg-3 control-label" for="f_deptid"></label>
                                    <div class="col-lg-6">
                                        <a style=" height: 30px" href="<?php echo base_url('content/view_agent') ?>" type="button" class="btn btn-primary"><i class=" fa fa-undo"></i> <span class="text">Cancel</span></a>
                                        <button style=" height: 30px" type="submit" class="btn btn-primary" id="simpan" value="Simpan" name="simpan"><i class=" fa fa-save"></i><span class="text"> Simpan</span> </button>
                                        <?php echo form_error('f_deptid', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                                    </div></div>
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
