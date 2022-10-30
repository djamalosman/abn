<html>
    <body>
            <div class="container-fluid">
                <!--<form enctype="multipart/form-data" action="<?php echo ""//base_url()   ?>tbl_bank/insert" method="post" id='uploadForm'>-->
                <?php echo form_open('content/update_ms_kodepos_process', 'id="swaz-confirm"'); ?>
                <div class="form-group" >
                    <label for="f_postcode">Kode Pos</label>
                    <input readonly value="<?php echo $records->f_postcode ?>" type="text" class="form-control" id="f_postcode" name="f_postcode">
                    <?php echo form_error('f_postcode', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                </div>
                
                <div class="form-group" >
                    <label for="f_description">Deskripsi</label>
                    <input value="<?php echo $records->f_description ?>" type="text" class="form-control" id="f_description" name="f_description">
                    <?php echo form_error('f_description', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                </div>
                
                <div class="form-group" >
                    <label for="f_notes">Catatan</label>
                    <input value="<?php echo $records->f_notes ?>" type="text" class="form-control" id="f_notes" name="f_notes">
                    <?php echo form_error('f_notes', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                </div>
                
                
                <input type="submit" value="Simpan" class="btn btn-primary" id="btn-submit"/>
                <span id='status'></status>
                    </form>
            </div>
    </body>
</html>
