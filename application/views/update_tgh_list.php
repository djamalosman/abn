<html>
    <body>
            <div class="container-fluid">
                <!--<form enctype="multipart/form-data" action="<?php echo ""//base_url()   ?>tbl_bank/insert" method="post" id='uploadForm'>-->
                <?php echo form_open('content/update_tgh_list_process', 'id="swaz-confirm" class="form-horizontal"'); ?>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="f_branch_id">Kode Cabang</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input readonly value="<?php echo $fields->f_branch_id ?>" type="text" class="form-control" id="f_branch_id" name="f_branch_id">
                        </div>
                    <?php echo form_error('f_branch_id', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                </div>                
                
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="f_cif">CIF</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input readonly value="<?php echo $fields->f_cif ?>" type="text" class="form-control" id="f_cif" name="f_cif">
                        </div>
                    <?php echo form_error('f_cif', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                </div>
                
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="f_loanid">Account Number</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input readonly value="<?php echo $fields->f_loanid ?>" type="text" class="form-control" id="f_loanid" name="f_loanid">
                        </div>
                    <?php echo form_error('f_acctno', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                </div>
                
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="f_custname">Nama Customer</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input readonly  value="<?php echo $fields->f_custname ?>" type="text" class="form-control" id="f_custname" name="f_custname">
                        </div>
                    <?php echo form_error('f_custname', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                </div>                
                
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="f_acctno">Kode Pinjaman</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input readonly  value="<?php echo $fields->f_acctno ?>" type="text" class="form-control" id="f_acctno" name="f_acctno">
                    </div>
                    <?php echo form_error('f_acctno', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                </div>
                
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="f_productid">Kode Produk</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input readonly value="<?php echo $fields->f_productid ?>" type="text" class="form-control" id="f_productid" name="f_productid">
                    </div>
                    <?php echo form_error('f_productid', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                </div>
                
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="f_tenor">Tenor</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input readonly value="<?php echo $fields->f_tenor ?>" type="text" class="form-control" id="f_tenor" name="f_tenor">
                    </div>
                    <?php echo form_error('f_tenor', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                </div>
                
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="f_tenorunit">Tenor Unit</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input readonly  value="<?php echo $fields->f_tenorunit ?>" type="text" class="form-control" id="f_tenorunit" name="f_tenorunit">
                    </div>
                    <?php echo form_error('f_tenorunit', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                </div>
                
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="f_dpd">DPD</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input readonly value="<?php echo $fields->f_dpd ?>" type="text" class="form-control" id="f_dpd" name="f_dpd">
                    </div>
                    <?php echo form_error('f_dpd', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                </div>             
                
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="f_cycle">Cycle</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input readonly  value="<?php echo $fields->f_cycle ?>" type="text" class="form-control" id="f_cycle" name="f_cycle">
                    </div>
                    <?php echo form_error('f_cycle', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                </div>
                
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="f_pokok">Tagihan Pokok</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input readonly  value="<?php echo $fields->f_pokok ?>" type="text" class="form-control" id="f_pokok" name="f_pokok">
                    </div>
                    <?php echo form_error('f_pokok', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                </div>
                
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="f_bunga">Bunga (Rupiah)</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input readonly value="<?php echo $fields->f_bunga ?>" type="text" class="form-control" id="f_pokok" name="f_bunga">
                    </div>
                    <?php echo form_error('f_bunga', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                </div>
                
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="f_outstanding">Out Standing</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input readonly  value="<?php echo $fields->f_outstanding ?>" type="text" class="form-control" id="f_pokok" name="f_outstanding">
                        <?php echo form_error('f_outstanding', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                    </div>
                    
                </div>                
                
                
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="f_startdate">Mulai Tanggal</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input readonly value="<?php echo DateTime::createFromFormat('Y-m-d', $fields->f_startdate)->format('D, d M Y') ?>" readonly type="text" class="tanggal form-control" id="f_startdate" name="f_startdate">
                        <?php echo form_error('f_startdate', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                    </div>
                    
                </div>
                
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="f_duedate">Batas tanggal terakhir</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input readonly value="<?php echo DateTime::createFromFormat('Y-m-d', $fields->f_duedate)->format('D, d M Y') ?>" readonly type="text" class="tanggal form-control" id="f_duedate" name="f_duedate">
                        <?php echo form_error('f_duedate', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                    </div>
                    
                </div>                
                
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="f_installmentdate">Tanggal Cicilan</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input readonly value="<?php echo DateTime::createFromFormat('Y-m-d', $fields->f_installmentdate)->format('D, d M Y') ?>" readonly type="text" class="tanggal form-control" id="f_installmentdate" name="f_installmentdate">
                        <?php echo form_error('f_installmentdate', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                    </div>
                    
                </div>                
                
                
                <div class="row form-group" >
                    <div class="col col-md-3">
                        <label for="f_tagihanpokok">Tagihan Pokok</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input readonly value="<?php echo $fields->f_tagihanpokok ?>" type="text" class="form-control" id="f_tagihanpokok" name="f_tagihanpokok">
                        <?php echo form_error('f_tagihanpokok', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                    </div>
                    
                </div>
                
                
                <div class="row form-group" >
                    <div class="col col-md-3">
                        <label for="f_tagihanbunga">Tagihan Bunga</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input readonly value="<?php echo $fields->f_tagihanbunga ?>" type="text" class="form-control" id="f_tagihanbunga" name="f_tagihanbunga">
                        <?php echo form_error('f_tagihanbunga', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                    </div>
                    
                </div>
                
                <div class="row form-group" >
                    <div class="col col-md-3">
                        <label for="f_tagihandenda">Tagihan Denda</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input readonly value="<?php echo $fields->f_tagihandenda ?>" type="text" class="form-control" id="f_tagihandenda" name="f_tagihandenda">
                        <?php echo form_error('f_tagihandenda', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                    </div>
                    
                </div>
                
                <div class="row form-group" >
                    <div class="col col-md-3">
                        <label for="f_homeaddreass">Alamat Rumah</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input readonly value="<?php echo $fields->f_homeaddreass ?>" type="text" class="form-control" id="f_homeaddreass" name="f_homeaddreass">
                        <?php echo form_error('f_homeaddreass', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                    </div>
                    
                </div>
                
                <div class="row form-group" >
                    <div class="col col-md-3">
                        <label for="f_homecity">Kota</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input readonly value="<?php echo $fields->f_homecity ?>" type="text" class="form-control" id="f_homecity" name="f_homecity">
                        <?php echo form_error('f_homecity', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                    </div>
                    
                </div>
                
                <div class="row form-group" >
                    <div class="col col-md-3">
                        <label for="f_homepostcode">Kode Pos Tempat Tinggal</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input readonly value="<?php echo $fields->f_homepostcode ?>" type="text" class="form-control" id="f_homepostcode" name="f_homepostcode">
                        <?php echo form_error('f_homepostcode', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                    </div>
                </div>
                
                <div class="row form-group" >
                    <div class="col col-md-3">
                        <label for="f_officeaddreaa">Alamat Kantor</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input readonly value="<?php echo $fields->f_officeaddreaa ?>" type="text" class="form-control" id="f_officeaddreaa" name="f_officeaddreaa">
                        <?php echo form_error('f_officeaddreaa', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                    </div>
                </div>
                
                <div class="row form-group" >
                    <div class="col col-md-3">
                        <label for="f_officecity">Kota</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input readonly value="<?php echo $fields->f_officecity ?>" type="text" class="form-control" id="f_officecity" name="f_officecity">
                        <?php echo form_error('f_officecity', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                    </div>
                </div>
                
                <div class="row form-group" >
                    <div class="col col-md-3">
                        <label for="f_officepostcode">Kode Pos</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input readonly value="<?php echo $fields->f_officepostcode ?>" type="text" class="form-control" id="f_officepostcode" name="f_officepostcode">
                        <?php echo form_error('f_officepostcode', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                    </div>
                </div>
                
                <div class="row form-group" >
                    <div class="col col-md-3">
                        <label for="f_buzaddress">Alamat Business</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input readonly value="<?php echo $fields->f_buzaddress ?>" type="text" class="form-control" id="f_buzaddress" name="f_buzaddress">
                        <?php echo form_error('f_buzaddress', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                    </div>
                </div>
                
                <div class="row form-group" >
                    <div class="col col-md-3">
                        <label for="f_buzcity">Kota</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input readonly value="<?php echo $fields->f_buzcity ?>" type="text" class="form-control" id="f_buzcity" name="f_buzcity">
                        <?php echo form_error('f_buzcity', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                    </div>
                </div>
                
                <div class="row form-group" >
                    <div class="col col-md-3">
                        <label for="f_buzpostcode">Kode Pos</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input readonly value="<?php echo $fields->f_buzpostcode ?>" type="text" class="form-control" id="f_buzpostcode" name="f_buzpostcode">
                        <?php echo form_error('f_buzpostcode', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                    </div>
                </div>
                
                <div class="row form-group" >
                    <div class="col col-md-3">
                        <label for="f_assigndate">Tanggal Penugasan</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input readonly value="<?php echo DateTime::createFromFormat('Y-m-d', $fields->f_assigndate)->format('D, d M Y') ?>" readonly type="text" class="tanggal form-control" id="f_assigndate" name="f_assigndate">
                        <?php echo form_error('f_assigndate', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                    </div>
                </div>
                
                <div class="row form-group" >
                    <div class="col col-md-3">
                        <label for="f_assignid">Kode Penugasan</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input readonly value="<?php echo $fields->f_assignid ?>" type="text" class="form-control" id="f_assignid" name="f_assignid">
                        <?php echo form_error('f_assignid', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                    </div>
                </div>
                
                <div class="row form-group" >
                    <div class="col col-md-3">
                        <label for="f_agentid">Agen</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <select readonly class="form-control" id="f_agentid" name="f_agentid">
                            <option disabled>-- pilih agen --</option>
                            <option value="AND111" <?php echo $fields->f_agentid=="AND111" ? "selected" : "" ?> >Andi</option>
                            <option value="DAV888" <?php echo $fields->f_agentid=="DAV888" ? "selected" : "" ?> >David</option>
                            <option value="HEN222" <?php echo $fields->f_agentid=="HEN222" ? "selected" : "" ?> >Hen</option>
                            <option value="MUM999" <?php echo $fields->f_agentid=="MUM999" ? "selected" : "" ?> >Morizt</option>
                            <option value="RBS777" <?php echo $fields->f_agentid=="RBS777" ? "selected" : "" ?> >Rudy Bunyamin</option>
                        </select>                    
                        <?php echo form_error('f_agentid', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                    </div>
                </div>
                
                <div class="row form-group" >
                    <div class="col col-md-3">
                        <label for="f_status">Status</label>
                    </div>
                    <div class="col col-md-9">
                        <select readonly class="form-control" id="f_status" name="f_status">
                            <option disabled>-- pilih --</option>
                            <option value="1" <?php echo $fields->f_status=="1" ? "selected" : "" ?> >Selesai</option>
                            <option value="0" <?php echo $fields->f_status=="0" ? "selected" : "" ?> >Belum Selesai</option>
                        </select>
                        <?php echo form_error('f_status', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                    </div>
                </div>
                
                <!--<input type="submit" value="Simpan" class="btn btn-primary" id="btn-submit"/>-->
                <a class="btn btn-primary" href="<?php echo base_url('content/read_tgh_list') ?>">
                    <i class="fa fa-arrow-circle-left"></i>
                    Kembali
                </a>
                <span id='status'></status>
                    </form>
            </div>
    </body>
</html>
