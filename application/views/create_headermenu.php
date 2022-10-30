<html>
    <body>
            <div class="container-fluid">
                <!--<form enctype="multipart/form-data" action="<?php echo ""//base_url()   ?>tbl_bank/insert" method="post" id='uploadForm'>-->
                <?php echo form_open('menu/create_headermenu_process', 'id="swaz-confirm" class="form-horizontal"'); ?>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="header_id">Header ID</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" class="form-control" id="header_id" name="header_id">
                        <?php echo form_error('header_id', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                    </div>
                </div>
                
                
                <div class="row form-group" >
                    <div class="col col-md-3">
                        <label for="headerName">Nama Header Menu</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" class="form-control" id="id_user" name="headerName">
                        <?php echo form_error('headerName', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                    </div>
                </div>   
                
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="status">Status Header</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <select name="status" class="form-control">
                            <optgroup label='Status'>
                                <option selected disabled style='display: none'>-- pilih status menu --</option>                        
                                <option value="1">Aktif</option>
                                <option value="0">Tidak aktif</option>
                            </optgroup>
                        </select>
                    </div>
                </div>
                
                <input type="submit" value="Simpan" class="btn btn-primary" id="btn-submit"/>
                <span id='status'></status>
                    </form>
            </div>
    </body>
</html>
