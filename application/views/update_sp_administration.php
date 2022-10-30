<html>
    <body>
            <div class="container-fluid">
                <!--<form enctype="multipart/form-data" action="<?php echo ""//base_url()   ?>tbl_bank/insert" method="post" id='uploadForm'>-->
                <?php echo form_open('content/update_sp_administration_process', 'id="swaz-confirm" class="form-horizontal"'); ?>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="f_jenisSp">Jenis SP</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input readonly value="<?php echo $row->f_jenisSp ?>" type="text" class="form-control" id="f_jenisSp" name="f_jenisSp">
                        <?php echo form_error('f_jenisSp', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                    </div>
                </div>
                
                
                <div class="row form-group" >
                    <div class="col col-md-3">
                        <label for="f_produk">Produk</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input value="<?php echo $row->f_produk ?>" type="text" class="form-control" id="f_produk" name="f_produk">
                        <?php echo form_error('f_produk', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                    </div>
                </div>
                
                <div class="row form-group" >
                    <div class="col col-md-3">
                        <label for="f_DPDmin">DPD Minimum</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input value="<?php echo $row->f_DPDmin ?>" type="text" class="form-control" id="f_DPDmin" name="f_DPDmin">
                        <?php echo form_error('f_DPDmin', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                    </div>
                </div>
                
                <div class="row form-group" >
                    <div class="col col-md-3">
                        <label for="f_masaBerlaku">Masa Berlaku</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input value="<?php echo $row->f_masaBerlaku ?>" type="text" class="form-control" id="f_masaBerlaku" name="f_masaBerlaku">
                        <?php echo form_error('f_masaBerlaku', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                    </div>
                </div>
                
                
                
                <input type="submit" value="Simpan" class="btn btn-primary" id="btn-submit"/>
                <span id='status'></status>
                    <?php echo form_close() ?>
            </div>
    </body>
</html>
<script>
    $('input[name=f_debtNum]').focus();
</script>
