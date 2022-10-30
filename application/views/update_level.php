<html>
    <body>
        <div class="container-fluid">
            <!--<form enctype="multipart/form-data" action="<?php echo ""//base_url()     ?>tbl_bank/insert" method="post" id='uploadForm'>-->
            <?php echo form_open('menu/update_level_process', 'id="swaz-confirm"'); ?>
            <div class="form-group">
                <label for="level_id">Level ID</label>
                <input readonly type="text" class="form-control" id="level_id" name="level_id" value="<?php echo $user_data->t_levelid ?>">

            </div>


            <div class="form-group" >
                <label for="level_name">Level Name</label>
                <input type="text" class="form-control" id="id_user" name="level_name" value="<?php echo $user_data->f_levelname ?>" >

            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" class="form-control">
                    <option selected disabled style="display: none; color: red">-- pilih status --</option>
                    <option value="1" <?php echo $user_data->f_active == 1 ? "selected" : "" ?> >Aktif</option>
                    <option value="0" <?php echo $user_data->f_active == 0 ? "selected" : "" ?> >Tidak Aktif</option>
                </select>
                <?php echo form_error('status', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
            </div>
            <div class="form-group">
                <label for="status">DPD Handle</label>
                <select name="value"  class="form-control">
                    <option value="Non" >-- Select --</option>
                    <?php foreach ($parameter as $item) { ?>
                        <option value="<?php echo $item->f_id ?>" <?php echo $item->f_id == $user_data->f_value ? "selected" : ""; ?> ><?php echo $item->f_desc ?></option>
                    <?php } ?>
                </select>
            </div>
			<a style=" height: 30px" href="<?php echo base_url('menu/read_level') ?>" type="button" class="btn btn-warning"><i class=" fa fa-undo"></i> <span class="text">Cancel</span></a>
            
            <input type="submit" style=" height: 30px" value="Simpan" class="btn btn-primary" id="btn-submit"/>
            <span id='status'></span>
            <?php echo form_close() ?>
        </div>
    </body>
</html>
