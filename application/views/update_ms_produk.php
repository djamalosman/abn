<html>
    <body>
            <div class="container-fluid">
                <!--<form enctype="multipart/form-data" action="<?php echo ""//base_url()   ?>tbl_bank/insert" method="post" id='uploadForm'>-->
                <?php echo form_open('content/update_ms_produk_process', 'id="swaz-confirm"'); ?>
                <div class="form-group" >
                    <label for="f_productid">Produk ID</label>
                    <input readonly value="<?php echo $records->f_productid ?>" type="text" class="form-control" id="f_productid" name="f_productid">
                    <?php echo form_error('f_productid', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                </div>
                
                <div class="form-group" >
                    <label for="f_productname">Nama Produk</label>
                    <input value="<?php echo $records->f_productname ?>" type="text" class="form-control" id="f_productname" name="f_productname">
                    <?php echo form_error('f_productname', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                </div>
                
                <div class="form-group" >
                    <label for="f_active">Status</label>
                    
                    <select id="f_active" name="f_active" class="form-control">
                        <option disabled selected>-- pilih status --</option>
                        <option value="1" <?php echo $records->f_active=='1' ? "selected" : "" ?> >Aktif</option>
                        <option value="0" <?php echo $records->f_active=='0' ? "selected" : "" ?> >Tidak aktif</option>
                    </select>
                    <?php echo form_error('f_active', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                </div>
                
                
                <input type="submit" value="Simpan" class="btn btn-primary" id="btn-submit"/>
                <span id='status'></status>
                    </form>
            </div>
    </body>
</html>
