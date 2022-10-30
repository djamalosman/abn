<html>
    <body>
        <div class="row">
            <div style="margin-left: 80px;"class="col-sm-10">
                <div class="panel panel-danger toggle panelMove panelClose panelRefresh">
                    <!-- Start .panel -->
                    <div class="panel-heading" style="background-color: red;">
                        <h4 class="panel-title"><i class="fa fa-users"></i>Form Create User Web</h4>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" action="<?php echo base_url('userweb/create_process'); ?>" method="POST" role="form">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">User ID</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="id_user" name="id_user" value="<?php echo $employee->nik ?>" placeholder="User ID" readonly="true">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Nama Lengkap</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputPassword3" name="name" value="<?php echo $employee->full_name ?>" readonly="true" placeholder="Nama Lengkap">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="email" value="<?php echo $employee->email ?>" readonly="true" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Password Default</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="password"  value="<?php echo $employee->nik ?>" readonly="true" placeholder="Password">
                                </div>
                            </div>
                            
							
							<div class="form-group">
                                <label class="col-sm-2 control-label">Type User</label>
                                <div class="col-sm-10"> 
                                    <select name="level" class="form-control" required >
                                        <optgroup label='User type'>
                                            <option selected disabled style='display: none'>-- pilih tipe user --</option>                        
                                            <?php foreach ($tipe_user as $item) { ?>
                                                <option value="<?php echo $item->t_levelid ?>"><?php echo $item->f_levelname ?></option>
                                            <?php } ?>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
							<br>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-success btn-sm mr5 mb10"><i class="fa fa-save"></i>  Submit</button>
                                    <a href="<?php echo base_url('userweb/index'); ?>" type="button" class="btn btn-warning btn-sm mr5 mb10" style="margin-right: 20px;"><i class="fa fa-rotate-left"></i>  Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

<div class="modal fade" id="modalcabang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-center">
        <form action="<?php echo base_url('dephead/tambahcabang')?>" method="post">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="mySmallModalLabel">Tambah Cabang</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="nik" value="<?php echo $employee->nik ?>" >
                    <table id="example" class="table table-striped table-bordered data-server-side">
                        <thead>
                            <tr>
                                <th style="min-width: 0px;">Pilih</th>
                                <th style="min-width: 80px;">Code Cabang</th>
                                <th style="min-width: 80px;">Nama Cabang</th>
                                <th style="min-width: 150px;">Alamat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($cabang AS $item) { ?>
                                <tr>
                                    <td><center><input type="checkbox" value="<?php echo $item->ID ?>" name="idnya[]"/></center></td>
                            <td><center><?php echo $item->ID ?></center></td>
                            <td><center><?php echo $item->COMPANY_NAME ?></center></td>
                            <td><center><?php echo $item->NAME_ADDRESS ?></center></td>
                            </tr>

                        <?php } ?>
                        </tbody>
                    </table>

                </div>
                <div class="modal-footer">
                    <a type="button" class="btn btn-default" data-dismiss="modal">Close</a>
                    <button type="submit" class="btn btn-primary"><i class=" fa fa-save">simpan</i></button>
                </div>
            </div>
        </form>

    </div>
</div> 
