<html>
    <body>
            <div class="container-fluid">
                <!--<form enctype="multipart/form-data" action="<?php echo ""//base_url()   ?>tbl_bank/insert" method="post" id='uploadForm'>-->
                <?php echo form_open('content/create_as_data_process', 'id="swaz-confirm"'); ?>
                <div class="form-group">
                    <label for="f_assignid">Assignment ID</label>
                    <input type="text" class="form-control" id="f_assignid" name="f_assignid">
                    <?php echo form_error('f_assignid', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                </div>
                
                
                <div class="form-group" >
                    <label for="f_assigndate">Tanggal Penugasan</label>
                    <input type="text" class="form-control tanggal" id="f_assigndate" name="f_assigndate">
                    <?php echo form_error('f_assigndate', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                </div>
                
                <div class="form-group" >
                    <label for="f_agentid">Transfer ke Kolektor</label>
                    <select class="form-control" id="f_agentid" name="f_agentid">
                        <option disabled selected>-- pilih agen --</option>
                        <option value="AGT1">Agent Utomo</option>
                        <option value="AGT2">Al Bahri</option>
                    </select>                    
                    <?php echo form_error('f_agentid', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                </div>
                
                <div class="form-group" >
                    <label for="f_rectotal">Total Record</label>
                    <input type="text" class="form-control" id="f_rectotal" name="f_rectotal">
                    <?php echo form_error('f_rectotal', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                </div>
                
                <div class="form-group" >
                    <label for="f_recdone">Record Completed</label>
                    <input type="text" class="form-control" id="f_recdone" name="f_recdone">
                    <?php echo form_error('f_recdone', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                </div>
                
<!--                <div class="form-group" >
                    <label for="f_trftoagentid">Pindah tugas ke Agen</label>
                    <select class="form-control" id="f_trftoagentid" name="f_trftoagentid">
                        <option disabled selected>-- pemindahan tugas agen --</option>
                        <option value="AGT1">Agent Utomo</option>
                        <option value="AGT2">Al Bahri</option>
                    </select>                    
                    <?php // echo form_error('f_trftoagentid', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                </div>-->
                
                <div class="form-group" >
                    <label for="f_originagent">Agen sebelumnya</label>
                    <select class="form-control" id="f_originagent" name="f_originagent">
                        <option disabled selected>-- pilih agen sebelumnya --</option>
                        <option value="AGT1">Agent Utomo</option>
                        <option value="AGT2">Al Bahri</option>
                    </select>                    
                    <?php echo form_error('f_originagent', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                </div>
                
                <div class="form-group" >
                    <label for="f_trfdate">Tanggal pemindahan tugas</label>
                    <input type="text" class="form-control tanggal" id="f_trfdate" name="f_trfdate">
                    <?php echo form_error('f_trfdate', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                </div>

                <div class="form-group" >
                    <label for="f_status">Status</label>
                    <select class="form-control" id="f_status" name="f_status">
                        <option value="1">Selesai</option>
                        <option value="0">Bellum Selesai</option>
                    </select>
                    <?php echo form_error('f_status', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                </div>
                
                <input type="submit" value="Simpan" class="btn btn-primary" id="btn-submit"/>
                <span id='status'></status>
                    </form>
            </div>
    </body>
</html>
