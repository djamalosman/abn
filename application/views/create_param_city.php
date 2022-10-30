<html>
    <body>
            <div class="container-fluid">
                <!--<form enctype="multipart/form-data" action="<?php echo ""//base_url()   ?>tbl_bank/insert" method="post" id='uploadForm'>-->
                <?php echo form_open('content/create_param_city_process', 'id="swaz-confirm"'); ?>
                <div class="form-group">
                    <label for="id_kota">ID Kota</label>
                    <input type="text" class="form-control" id="id_kota" name="id_kota">
                    <?php echo form_error('id_kota', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                </div>
                
                
                <div class="form-group" >
                    <label for="city_name">Nama Kota</label>
                    <input type="text" class="form-control" id="city_name" name="city_name">
                    <?php echo form_error('city_name', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                </div>
                
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" class="form-control">
                        <optgroup label="Status">
                            <option disabled selected style='display: none'>--pilih status--</option>
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </optgroup>
                    </select>
                </div>
                <input type="submit" value="Simpan" class="btn btn-primary" id="btn-submit"/>
                <span id='status'></status>
                    </form>
            </div>
    </body>
</html>
