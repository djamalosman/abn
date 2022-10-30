<html>
    <body>
        <div>

        </div>

        <div class="container-fluid">
            <!--<form enctype="multipart/form-data" action="<?php echo ""//base_url()    ?>tbl_bank/insert" method="post" id='uploadForm'>-->
            <?php echo form_open('menu/create_level_process', 'id="swaz-confirm" class="form-horizontal"'); ?>
            <!--<div class="row form-group">
                <div class="col col-md-3">
                    <label for="level_id">Level ID</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" class="form-control" required="" id="level_id" name="level_id">
            <?php echo form_error('level_id', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                </div>
            </div>-->


            <div class="row form-group" >
                <div class="col col-md-3">
                    <label for="level_name">Level Name</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" class="form-control" required="" id="id_user" name="level_name">
                    <?php echo form_error('level_name', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                </div>
            </div>

            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="status">Status</label>
                </div>
                <div class="col-12 col-md-9">
                    <select name="status" class="form-control">
                        <optgroup label='status'>
                            <option selected disabled style="display: none;">-- pilih status --</option>
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </optgroup>
                    </select>
                    <?php echo form_error('status', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="status">DPD Handle</label>
                </div>
                <div class="col-12 col-md-9">
                    <select name="value" class="form-control">
                        <option value="" >-- Select --</option>
                        <?php foreach ($parameter as $item) { ?>

                            <option value="<?php echo $item->f_value ?>" ><?php echo $item->f_desc ?></option>

                        <?php } ?>
                    </select>
                    <?php echo form_error('status', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                </div>
            </div>
            <a style=" height: 30px" href="<?php echo base_url('menu/read_level') ?>" type="button" class="btn btn-primary"><i class=" fa fa-undo"></i> <span class="text">Cancel</span></a>
            <input type="submit" value="Simpan" class="btn btn-primary" id="btn-submit"/>
            <span id='status'></span>

                <!--</form>-->
        </div>

    </body>
</html>
