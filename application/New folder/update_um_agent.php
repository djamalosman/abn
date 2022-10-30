<html>
<head>
    <style type="text/css">
        
    </style>
</head>
    <body>
        <div class="row">
            <div style="margin-left: 245px;"class="col-sm-7">
                <div class="panel panel-danger toggle panelMove panelClose panelRefresh">
                    <!-- Start .panel -->
                    <div class="panel-heading" style="background-color: red;">
                <h4 class="panel-title"><i class="fa fa-users" style="color: white;"></i>Update User Web</h4>
            </div>
                    <div class="panel-body" >
                        <form class="form-horizontal" action="<?php echo base_url('usermobile/update_um_agent_process'); ?>" method="POST" role="form">
                            <div class="form-group" style="min-width: 100%;">
                                <label for="inputEmail3" class="col-sm-2 control-label">NIK
                                </label>
                                <div class="col-sm-10">
                                    <input id="nik" readonly="" value="<?php echo $agent->f_agentid ?>" name ="nik" style=" height: 30px"  type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group" style="min-width: 100%;">
                                <label for="inputEmail3" class="col-sm-2 control-label">Username</label>
                                <div class="col-sm-10">
                                   <input id="nama" readonly=""  value="<?php echo $agent->f_agentname ?>" name="nama" style=" height: 30px"  type="text" class="form-control" >
                                </div>
                            </div>
                            <div class="form-group" style="min-width: 100%;">
                                <label for="inputEmail3" class="col-sm-2 control-label">Nomor Telepon</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="f_nohp" name="f_nohp" required="" value="<?php echo $agent->f_nohp ?>" placeholder="Nomor Telepon">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control"  id="f_email" name="f_email" required="" value="<?php echo $agent->f_email ?>"  placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Status</label>
                                <div class="col-sm-10"> 
                                <select id="f_active" required="" name="f_active" class="form-control">
                            <option disabled selected>-- pilih status --</option>
                            <option value="1" <?php echo $agent->f_active==1 ? "selected" : "" ?> >Aktif</option>
                            <option value="0" <?php echo $agent->f_active==0 ? "selected" : "" ?> >Tidak aktif</option>
                        </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary center-block">Submit</button>

                                </div>
                                <!-- <div class="col-sm-offset-2 col-sm-10">
                                <a href="<?php //echo base_url('usermobile/index') ?>" button type="button" class="btn btn-primary center-block">Cancel</button></a>
                            </div> -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
  