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
                        <form class="form-horizontal" action="<?php echo base_url('Userweb/update_process'); ?>" method="POST" role="form">
                            <div class="form-group" style="min-width: 100%;">
                                <label for="inputEmail3" class="col-sm-2 control-label">User ID</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="id_user" name="id_user" value="<?php echo $user_data->f_userid ?>" placeholder="User ID"readonly="true">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Nama Lengkap</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputPassword3" name="name" value="<?php echo $user_data->f_username ?>" readonly="true" placeholder="Nama Lengkap">
                                </div>
                            </div>
                            <!--                            <div class="form-group">
                                                            <label class="col-sm-2 control-label">Password Default</label>
                                                            <div class="col-sm-10">
                                                                <input type="password" class="form-control" name="password"  value="<?php // echo $user_data->f_userpswd  ?>" readonly="true" placeholder="Password">
                                                            </div>
                                                        </div>-->
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Status</label>
                                <div class="col-sm-10"> 
                                    <select name="status" class="form-control">
                                        <optgroup label="pilih status">
                                            <option disabled selected>--pilih status--</option>
                                            <option value="1" <?php echo $user_data->f_active == "1" ? "selected" : "" ?>>Aktif</option>
                                            <option value="0" <?php echo $user_data->f_active == "0" ? "selected" : "" ?>>Tidak Aktif</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-sm-2 control-label">Type User</label>
                                <div class="col-sm-10"> 
                                    <select name="level" class="form-control">
                                        <option disabled selected>--pilih level--</option>
                                        <?php foreach ($tipe_user as $a) { ?>
                                            <option value="<?php echo $a->t_levelid ?>" <?php echo $user_data->f_userlevel === $a->t_levelid ? "selected" : "" ;?>><?php echo $a->f_levelname ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-lg-5">
                                </div>

                                <div class="col-lg-7">

                                    <div class="col-lg-4">
                                        <button style=" height: 30px" type="submit" class="btn btn-primary" id="simpan" value="Simpan" name="simpan"><i class=" fa fa-save"></i><span class="text"> Simpan</span> </button>
                                    </div>
                                    <div class="col-lg-3">
                                        <a style=" height: 30px" href="<?php echo base_url('userweb/index') ?>" type="button" class="btn btn-warning"><i class=" fa fa-undo"></i> <span class="text">Cancel</span></a>
                                    </div>
                                </div>

                            </div>
<!--                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary center-block">Submit</button>
                                </div>
                            </div>-->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
