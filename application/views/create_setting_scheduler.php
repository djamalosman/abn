<html>
    <body>
            <div class="container-fluid">
                <!--<form enctype="multipart/form-data" action="<?php echo ""//base_url()   ?>tbl_bank/insert" method="post" id='uploadForm'>-->
                <?php echo form_open('setting/create_setting_schedulers_process', 'id="swaz-confirm"'); ?>
                <div class="form-group">
                    <label for="f_id">ID Schedulers</label>
                    <input type="f_id" class="form-control" id="id_scheduler" name="f_id">
                    <?php echo form_error('f_id', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                </div>
                
                <div class="form-group" >
                    <label for="f_progId">Program ID</label>
                    <input type="text" class="form-control" id="f_progId" name="f_progId">
                    <?php echo form_error('f_progId', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                </div>
                
                <div class="form-group" >
                    <label for="f_startingdate">Tanggal mulai</label>
                    <input readonly autocomplete="off" type="text" class="tanggal form-control" id="f_startingdate" name="f_startingdate">
                    <?php echo form_error('f_startingdate', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                </div>
                
                
                <div class="form-group" >
                    <label for="f_startingtime">Jam mulai</label>
                    <input type="text" class="timepicker form-control" id="f_startingtime" name="f_startingtime">
                    <?php echo form_error('f_startingtime', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                </div>
                
                <div class="form-group" >
                    <label for="f_refreshcounter">Refresh Counter</label>
                    <input type="text" class="form-control" id="f_refreshcounter" name="f_refreshcounter">
                    <?php echo form_error('f_refreshcounter', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                </div>
                
                <div class="form-group" >
                    <label for="f_finishtime">Waktu Selesai</label>
                    <input type="text" class="timepicker form-control" id="f_finishtime" name="f_finishtime">
                    <?php echo form_error('f_finishtime', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                </div>
                
                <div class="form-group">
                    <label for="f_status">Status</label>
                    <select name="f_status" class="form-control">
                        <optgroup label="Status">
                            <option disabled selected style='display: none'>--pilih status--</option>
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </optgroup>
                    </select>
                </div>
                
                <div class="form-group" >
                    <label for="f_note">Catatan</label>
                    <textarea type="text" class="tanggal form-control" id="f_progId" name="f_note"></textarea>
                    <?php echo form_error('f_note', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                </div>
                
                <input type="submit" value="Simpan" class="btn btn-primary" id="btn-submit"/>
                <span id='status'></status>
                    </form>
            </div>
    </body>
</html>
