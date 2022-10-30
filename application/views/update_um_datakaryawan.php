<html>
    <body>
            <div class="container-fluid">
                <!--<form enctype="multipart/form-data" action="<?php echo ""//base_url()   ?>tbl_bank/insert" method="post" id='uploadForm'>-->
                <?php echo form_open('content/update_um_datakaryawan_process', 'id="swaz-confirm" class="form-horizontal"'); ?>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="f_nik">NIK</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input value="<?php echo $karyawan->f_nik ?>" readonly type="text" class="form-control" id="id_agen" name="f_nik">
                        <?php echo form_error('f_nik', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                    </div>
                </div>
                
                
                <div class="row form-group" >
                    <div class="col col-md-3">
                        <label for="f_empname">Nama Karyawan</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input value="<?php echo $karyawan->f_empname ?>" type="text" class="form-control" id="nik" name="f_empname">
                        <?php echo form_error('f_empname', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                    </div>
                </div>
                
                <div class="row form-group" >
                    <div class="col col-md-3">
                        <label for="f_compid">Comp ID</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input value="<?php echo $karyawan->f_compid ?>" type="text" class="form-control" id="f_compid" name="f_compid">
                        <?php echo form_error('f_compid', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                    </div>
                </div>
                
                <div class="row form-group" >
                    <div class="col col-md-3">
                        <label for="f_deptid">Dep ID</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input value="<?php echo $karyawan->f_deptid ?>" type="text" class="form-control" id="f_deptid" name="f_deptid">
                        <?php echo form_error('f_deptid', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                    </div>
                </div>
                
                <div class="row form-group" >
                    <div class="col col-md-3">
                        <label for="f_groupid">Group ID</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input value="<?php echo $karyawan->f_groupid ?>" type="text" class="form-control" id="f_groupid" name="f_groupid">
                        <?php echo form_error('f_groupid', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                    </div>
                </div>
                
                <div class="row form-group" >
                    <div class="col col-md-3">
                        <label for="f_divid">Div ID</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input value="<?php echo $karyawan->f_divid ?>" type="text" class="form-control" id="f_divid" name="f_divid">
                        <?php echo form_error('f_divid', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                    </div>
                </div>
                
                <div class="row form-group" >
                    <div class="col col-md-3">
                        <label for="f_unitid">Unit ID</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input value="<?php echo $karyawan->f_unitid ?>" type="text" class="form-control" id="f_unitid" name="f_unitid">
                        <?php echo form_error('f_unitid', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                    </div>
                </div>
                
                <div class="row form-group" >
                    <div class="col col-md-3">
                        <label for="f_branch_id">Branch ID</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input value="<?php echo $karyawan->f_branch_id ?>" type="text" class="form-control" id="f_branch_id" name="f_branch_id">
                        <?php echo form_error('f_branch_id', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                    </div>
                </div>
                
                <div class="row form-group" >
                    <div class="col col-md-3">
                        <label for="f_positionid">Position ID</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input value="<?php echo $karyawan->f_positionid ?>" type="text" class="form-control" id="f_positionid" name="f_positionid">
                        <?php echo form_error('f_positionid', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                    </div>
                </div>
                
                <div class="row form-group" >
                    <div class="col col-md-3">
                        <label for="f_nohp">No HP</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input value="<?php echo $karyawan->f_nohp ?>" type="text" class="form-control" id="f_nohp" name="f_nohp">
                        <?php echo form_error('f_nohp', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                    </div>
                </div>
                
                <div class="row form-group" >
                    <div class="col col-md-3">
                        <label for="f_email">Email</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input value="<?php echo $karyawan->f_email ?>" type="text" class="form-control" id="f_email" name="f_email">
                        <?php echo form_error('f_email', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                    </div>
                </div>
                
                <div class="row form-group" >
                    <div class="col col-md-3">
                        <label for="f_active">Status</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <select id="f_active" name="f_active" class="form-control">
                            <option disabled selected>-- pilih status --</option>
                            <option value="1" <?php echo $karyawan->f_active==1 ? "selected" : "" ?> >Aktif</option>
                            <option value="0" <?php echo $karyawan->f_active==0 ? "selected" : "" ?> >Tidak aktif</option>
                        </select>
                        <?php echo form_error('f_active', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                    </div>
                </div>
                
                <input type="submit" value="Simpan" class="btn btn-primary" id="btn-submit"/>
                <span id='status'></status>
                    </form>
            </div>
    </body>
</html>
