<html>
    <body>
        <div class="container-fluid">                 
                <!--<form enctype="multipart/form-data" action="<?php echo ""//base_url()   ?>tbl_bank/insert" method="post" id='uploadForm'>-->
            <?php echo form_open('content/update_as_data_process', 'id="swaz-confirm" class="form-horizontal"'); ?>
            <div class="row">
            <div class="col-md-3">
       <div class="row">
                <div class="col-md-3">
        
                <div class="row form-group" >
                    <div class="col-12 col-md-11">
                       <label for="f_branch_id">Kode Cabang</label>
                    <input type="text" class="form-control" id="f_branch_id" name="f_branch_id">
                    <?php echo form_error('f_branch_id', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                    </div>
                </div>
                
                <div class="row form-group" >
                    <div class="col-12 col-md-11">
                       <label for="f_cif">CIF</label>
                    <input type="text" class="form-control" id="f_assignid" name="f_cif">
                    <?php echo form_error('f_cif', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                    </div>
                </div>
                
                <div class="row form-group" >
                    <div class="col-12 col-md-11">
                        <label for="f_loanid">Account Number</label>
                    <input type="text" class="form-control" id="f_loanid" name="f_loanid">
                    <?php echo form_error('f_acctno', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                    </div>
                </div>
                
                <div class="row form-group" >
                    <div class="col-12 col-md-11">
                     <label for="f_custname">Nama Customer</label>
                    <input type="text" class="form-control" id="f_custname" name="f_custname">
                    <?php echo form_error('f_custname', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                    </div>
                </div>
                
                <div class="row form-group" >
                    <div class="col-12 col-md-11">
                        <label for="f_acctno">Kode Pinjaman</label>
                    <input type="text" class="form-control" id="f_acctno" name="f_acctno">
                    <?php echo form_error('f_acctno', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                    </div>
                </div>

                <div class="row form-group" >
                    <div class="col-12 col-md-11">
                        <label for="f_productid">Kode Produk</label>
                    <input type="text" class="form-control" id="f_productid" name="f_productid">
                    <?php echo form_error('f_productid', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                    </div>
                </div>

                <div class="row form-group" >
                    <div class="col-12 col-md-11">
                       <label for="f_tenor">Tenor</label>
                    <input type="text" class="form-control" id="f_tenor" name="f_tenor">
                    <?php echo form_error('f_tenor', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                    </div>
                </div>
                <div class="row form-group" >
                    <div class="col-12 col-md-11">
                         <label for="f_tenorunit">Tenor Unit</label>
                    <input type="text" class="form-control" id="f_tenorunit" name="f_tenorunit">
                    <?php echo form_error('f_tenorunit', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                    </div>
                </div>
                </div>
            </div>
            <input type="submit" value="Simpan" class="btn btn-primary" id="btn-submit"/>
            <span id='status'></status>
                </form>
        </div>
    </body>
</html>
