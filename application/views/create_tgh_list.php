<html>
    <body>
            <div class="container-fluid">
           <?php echo form_open('content/create_um_agent_process', 'id="swaz-confirm" class="form-horizontal"'); ?>
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

                <div class="col-md-3">     
                <div class="row form-group" >
                    <div class="col-12 col-md-11">
                     <label for="f_dpd">DPD</label>
                    <input type="text" class="form-control" id="f_dpd" name="f_dpd">
                    <?php echo form_error('f_dpd', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                    </div>
                </div>
                
                <div class="row form-group" >
                    <div class="col-12 col-md-11">
                        <label for="f_cycle">Cycle</label>
                    <input type="text" class="form-control" id="f_cycle" name="f_cycle">
                    <?php echo form_error('f_cycle', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                    </div>
                </div>

                <div class="row form-group" >
                    <div class="col-12 col-md-11">
                    <label for="f_pokok">Tagihan Pokok</label>
                    <input type="text" class="form-control" id="f_pokok" name="f_pokok">
                    <?php echo form_error('f_pokok', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                    </div>
                </div>

                <div class="row form-group" >
                    <div class="col-12 col-md-11">
                       <label for="f_bunga">Bunga (Rupiah)</label>
                    <input type="text" class="form-control" id="f_pokok" name="f_bunga">
                    <?php echo form_error('f_bunga', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                    </div>
                </div>  



                <div class="row form-group" >
                    <div class="col-12 col-md-11">
                       <label for="f_outstanding">Out Standing</label>
                    <input type="text" class="form-control" id="f_pokok" name="f_outstanding">
                    <?php echo form_error('f_outstanding', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                    </div>
                </div>
                
                <div class="row form-group" >
                    <div class="col-12 col-md-11">
                    <label for="f_startdate">Mulai Tanggal</label>
                    <input readonly type="text" class="tanggal form-control" id="f_startdate" name="f_startdate">
                    <?php echo form_error('f_startdate', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                    </div>
                </div>
                
                <div class="row form-group" >
                    <div class="col-12 col-md-11">
                       <label for="f_duedate">Batas tanggal terakhir</label>
                    <input readonly type="text" class="tanggal form-control" id="f_duedate" name="f_duedate">
                    <?php echo form_error('f_duedate', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-12 col-md-11">
                         <label for="f_installmentdate">Tanggal Cicilan</label>
                    <input readonly type="text" class="tanggal form-control" id="f_installmentdate" name="f_installmentdate">
                    <?php echo form_error('f_installmentdate', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                    </div>
                </div>
                </div>

                <div class="col-md-3"> 
                    
                <div class="row form-group" >
                    <div class="col-12 col-md-11">
                      <label for="f_tagihanpokok">Tagihan Pokok</label>
                    <input type="text" class="form-control" id="f_tagihanpokok" name="f_tagihanpokok">
                    <?php echo form_error('f_tagihanpokok', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                    </div>
                </div>
                
                <div class="row form-group" >
                    <div class="col-12 col-md-11">
                       <label for="f_tagihanbunga">Tagihan Bunga</label>
                    <input type="text" class="form-control" id="f_tagihanbunga" name="f_tagihanbunga">
                    <?php echo form_error('f_tagihanbunga', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                    </div>
                </div>
                
                <div class="row form-group" >
                    <div class="col-12 col-md-11">
                       <label for="f_tagihandenda">Tagihan Denda</label>
                    <input type="text" class="form-control" id="f_tagihandenda" name="f_tagihandenda">
                    <?php echo form_error('f_tagihandenda', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                    </div>
                </div>
                
                <div class="row form-group" >
                    <div class="col-12 col-md-11">
                        <label for="f_homeaddreass">Alamat Rumah</label>
                    <input type="text" class="form-control" id="f_homeaddreass" name="f_homeaddreass">
                    <?php echo form_error('f_homeaddreass', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-12 col-md-11">
                         <label for="f_homecity">Kota</label>
                    <input type="text" class="form-control" id="f_homecity" name="f_homecity">
                    <?php echo form_error('f_homecity', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                    </div>
                </div>

                <div class="row form-group" >
                    <div class="col-12 col-md-11">
                         <label for="f_homepostcode">Kode Pos Tempat Tinggal</label>
                    <input type="text" class="form-control" id="f_homepostcode" name="f_homepostcode">
                    <?php echo form_error('f_homepostcode', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                    </div>
                </div>
                
                <div class="row form-group" >
                    <div class="col-12 col-md-11">
                       <label for="f_officeaddreaa">Alamat Kantor</label>
                    <input type="text" class="form-control" id="f_officeaddreaa" name="f_officeaddreaa">
                    <?php echo form_error('f_officeaddreaa', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-12 col-md-11">
                         <label for="f_officecity">Kota</label>
                    <input type="text" class="form-control" id="f_officecity" name="f_officecity">
                    <?php echo form_error('f_officecity', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                    </div>
                </div>
                </div>
                
                <div class="col-md-3"> 
                    
                <div class="row form-group" >
                    <div class="col-12 col-md-11">
                        <label for="f_officepostcode">Kode Pos</label>
                    <input type="text" class="form-control" id="f_officepostcode" name="f_officepostcode">
                    <?php echo form_error('f_officepostcode', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                    </div>
                </div>
                
                <div class="row form-group" >
                    <div class="col-12 col-md-11">
                         <label for="f_buzaddress">Alamat Business</label>
                    <input type="text" class="form-control" id="f_buzaddress" name="f_buzaddress">
                    <?php echo form_error('f_buzaddress', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                    </div>
                </div>

                <div class="row form-group" >
                    <div class="col-12 col-md-11">
                       <label for="f_buzcity">Kota</label>
                    <input type="text" class="form-control" id="f_buzcity" name="f_buzcity">
                    <?php echo form_error('f_buzcity', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                    </div>
                </div>

                <div class="row form-group" >
                    <div class="col-12 col-md-11">
                         <label for="f_buzpostcode">Kode Pos</label>
                    <input type="text" class="form-control" id="f_buzpostcode" name="f_buzpostcode">
                    <?php echo form_error('f_buzpostcode', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                    </div>
                </div>

                <div class="row form-group" >
                    <div class="col-12 col-md-11">
                         <label for="f_assigndate">Tanggal Penugasan</label>
                    <input readonly type="text" class="tanggal form-control" id="f_assigndate" name="f_assigndate">
                    <?php echo form_error('f_assigndate', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                    </div>
                </div>
                
                <div class="row form-group" >
                    <div class="col-12 col-md-11">
                         <label for="f_assignid">Kode Penugasan</label>
                    <input type="text" class="form-control" id="f_assignid" name="f_assignid">
                    <?php echo form_error('f_assignid', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                    </div>
                </div>
                
                <div class="row form-group" >
                    <div class="col-12 col-md-11">
                       <label for="f_agentid">Agen</label>
                    <select class="form-control" id="f_agentid" name="f_agentid">
                        <option disabled selected>-- pilih agen --</option>
                        <option value="<?php echo $agenid; ?>"><?php echo $agenid; ?></option>
                       
                    </select>                    
                    <?php echo form_error('f_agentid', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-12 col-md-11">
                         <label for="f_status">Status</label>
                    <select class="form-control" id="f_status" name="f_status">
                        <option selected disabled>-- pilih --</option>
                        <option value="1">Selesai</option>
                        <option value="0">Belum Selesai</option>
                    </select>
                    <?php echo form_error('f_status', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
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
