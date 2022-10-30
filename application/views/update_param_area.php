<html>
    <body>
            <div class="container-fluid">
                <!--<form enctype="multipart/form-data" action="<?php echo ""//base_url()   ?>tbl_bank/insert" method="post" id='uploadForm'>-->
                <?php echo form_open('content/update_param_area_process', 'id="swaz-confirm"'); ?>
                <div class="form-group">
                    <label for="id_area">ID Area</label>
                    <input readonly value="<?php echo $area->f_areaid ?>" type="text" class="form-control" id="id_area" name="id_area">
                    <?php echo form_error('id_area', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                </div>
                
                
                <div class="form-group" >
                    <label for="area_name">Nama Area</label>
                    <input value="<?php echo $area->f_areaname ?>" type="text" class="form-control" id="area_name" name="area_name">
                    <?php echo form_error('area_name', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                </div>
                
                <div class="form-group" >
                    <label for="notes">Keterangan</label>
                    <textarea type="text" class="form-control" id="notes" name="notes"><?php echo $area->f_notes ?></textarea>
                    <?php echo form_error('notes', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                </div>
                
                <input type="submit" value="Simpan" class="btn btn-primary" id="btn-submit"/>
                <span id='status'></status>
                    </form>
            </div>
    </body>
</html>
