<html>
    <body>
            <div class="container-fluid">               
                <!--<form enctype="multipart/form-data" action="<?php echo ""//base_url()   ?>tbl_bank/insert" method="post" id='uploadForm'>-->
                <?php echo form_open('content/update_as_data_process', 'id="swaz-confirm" class="form-horizontal"'); ?>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label class="control-label" for="f_assignid">Assignment ID</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input readonly value="<?php echo $assignment->f_assignid ?>" type="text" class="form-control" id="f_assignid" name="f_assignid">
                    </div>
                    <?php echo form_error('f_assignid', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                </div>
                
                
                <div class="row form-group" >
                    <div class="col col-md-3">
                        <label for="f_assigndate">Tanggal Penugasan</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input disabled value="<?php echo DateTime::createFromFormat('Y-m-d', $assignment->f_assigndate)->format('D, d M Y') ?>" type="text" class="form-control tanggal" id="f_assigndate" name="f_assigndate">
                    </div>
                    <?php echo form_error('f_assigndate', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                </div>
                
                <div class="row form-group" >
                    <div class="col col-md-3">
                        <label for="f_agentid">Agen</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <select disabled class="form-control" id="f_agentid" name="f_agentid">
                            <option disabled>-- pilih agen --</option>
                            <option value="AND111" <?php echo $assignment->f_agentid=="AND111" ? "selected" : "" ?> >Andi</option>
                            <option value="DAV888" <?php echo $assignment->f_agentid=="DAV888" ? "selected" : "" ?> >David</option>
                            <option value="HEN222" <?php echo $assignment->f_agentid=="HEN222" ? "selected" : "" ?> >Hen</option>
                            <option value="MUM999" <?php echo $assignment->f_agentid=="MUM999" ? "selected" : "" ?> >Morizt</option>
                            <option value="RBS777" <?php echo $assignment->f_agentid=="RBS777" ? "selected" : "" ?> >Rudy Bunyamin</option>
                        </select>                    
                    </div>
                    <?php echo form_error('f_agentid', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                </div>
                
                <div class="row form-group" >
                    <div class="col col-md-3">
                        <label for="f_rectotal">Total Record</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input disabled  value="<?php echo $assignment->f_rectotal ?>" type="text" class="form-control" id="f_rectotal" name="f_rectotal">
                    </div>
                    <?php echo form_error('f_rectotal', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                </div>
                
                <div class="row form-group" >
                    <div class="col col-md-3">
                        <label for="f_recdone">Record Completed</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input disabled value="<?php echo $assignment->f_recdone ?>" type="text" class="form-control" id="f_recdone" name="f_recdone">
                    </div>
                    <?php echo form_error('f_recdone', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                </div>
                
                <div class="row form-group" >
                    <div class="col col-md-3">
                        <label for="f_trftoagentid">Agen saat ini</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <select disabled  class="form-control" id="f_trftoagentid" name="f_trftoagentid">
                            <option disabled selected>-- pemindahan tugas agen --</option>
                            <option value="AND111" <?php echo $assignment->f_trftoagentid=="AND111" ? "selected" : "" ?> >Andi</option>
                            <option value="DAV888" <?php echo $assignment->f_trftoagentid=="DAV888" ? "selected" : "" ?> >David</option>
                            <option value="HEN222" <?php echo $assignment->f_trftoagentid=="HEN222" ? "selected" : "" ?> >Hen</option>
                            <option value="MUM999" <?php echo $assignment->f_trftoagentid=="MUM999" ? "selected" : "" ?> >Morizt</option>
                            <option value="RBS777" <?php echo $assignment->f_trftoagentid=="RBS777" ? "selected" : "" ?> >Rudy Bunyamin</option>
                        </select>                    
                    </div>
                    <?php echo form_error('f_trftoagentid', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                </div>
                
<!--                <div class="row form-group" >
                    <label for="f_originagent">Agen sebelumnya</label>
                    <select disabled  class="form-control" id="f_originagent" name="f_originagent">
                        <option disabled selected>-- pilih agen sebelumnya --</option>-->
<!--                        <option value="AND111" <?php // echo $assignment->f_originagent=="AND111" ? "selected" : "" ?> >Andi</option>
                        <option value="DAV888" <?php // echo $assignment->f_originagent=="DAV888" ? "selected" : "" ?> >David</option>
                        <option value="HEN222" <?php // echo $assignment->f_originagent=="HEN222" ? "selected" : "" ?> >Hen</option>
                        <option value="MUM999" <?php // echo $assignment->f_originagent=="MUM999" ? "selected" : "" ?> >Morizt</option>
                        <option value="RBS777" <?php // echo $assignment->f_originagent=="RBS777" ? "selected" : "" ?> >Rudy Bunyamin</option>-->
                    <!--</select>-->                    
                    <?php // echo form_error('f_originagent', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                <!--</div>-->
                
                <div class="row form-group" >
                    <div class="col col-md-3">
                        <label for="f_trfdate">Tanggal pemindahan tugas</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input disabled  value="<?php echo DateTime::createFromFormat('Y-m-d', $assignment->f_trfdate)->format('D, d M Y') ?>" type="text" class="form-control tanggal" id="f_trfdate" name="f_trfdate">
                        <?php echo form_error('f_trfdate', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                    </div>
                </div>
                
                <div class="row form-group" >
                    <div class="col col-md-3">
                        <label for="f_status">Status</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <select disabled  class="form-control" id="f_status" name="f_status">
                            <option disabled selected>-- Pilih status --</option>
                            <option value="1" <?php echo $assignment->f_status="1" ? "selected" : "" ?> >Selesai</option>
                            <option value="0" <?php echo $assignment->f_status="0" ? "selected" : "" ?> >Belum Selesai</option>
                        </select>
                    </div>
                    <?php echo form_error('f_status', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                </div>
                
                <!--<input disabled type="submit" value="Simpan" class="btn btn-primary" id="btn-submit"/>-->
                <a class="btn btn-primary" href="<?php echo base_url('content/read_as_data') ?>">
                    <i class="fa fa-arrow-circle-left"></i>
                    Kembali
                </a>
                <span id='status'></status>
                    </form>
            </div>
    </body>
</html>
