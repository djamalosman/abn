<html>
    <body>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default toggle panelMove panelClose panelRefresh">
                    <div class="panel-heading">
                        <h4 class="panel-title">Form  Data Lelang</h4>
                    </div>
                    <div class="panel-body pt0 pb0">
                        <form action="<?php echo base_url('Lelang/create_mntr_lelang_process') ?>" method="post" class="form-horizontal group-border stripped">
                            <div class="form-group" style="padding-top: 5px; padding-bottom: 5px;">
                                <div class="col-lg-6">
                                    <label style="min-width: 150px;" class="col-lg-3 control-label" for="debiturName">Nama debitur
                                    </label>
                                    <div class="col-lg-6">
                                    <input id="Nama" value="<?php echo $viewcreate_lelang->NamaDebitur ?>" name ="nama" style=" height: 30px"  type="text" class="form-control" >
                                    </div> </div>
                                <div class="col-lg-6">
                                    <label style="min-width: 150px;" class="col-lg-3 control-label" for="Cif">Cif</label>
                                    <div class="col-lg-6">
                                    <input id="cif" value="<?php echo $viewcreate_lelang->NomorNasabah ?>" name="cif" style=" height: 30px"  type="text" class="form-control" >
                                    </div>
                                </div>

                            </div>
                            <div class="form-group" style="padding-top: 5px; padding-bottom: 5px;">
                               <div class="col-lg-6">
                                <label style="min-width: 150px;" class="col-lg-3 control-label" for="flag Eligible">Flag Eligible</label>
                                    <div class="col-lg-6">
                                        <input style=" height: 30px" type="text" class="form-control" required="" id="eligible" name="eligible">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                <label style="min-width: 150px;" class="col-lg-3 control-label" for="Flag Register">Flag Register</label>
                                    <div class="col-lg-6">
                                        <input style=" height: 30px" type="text" class="form-control" required="" id="register_a" name="register">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" style="padding-top: 5px; padding-bottom: 5px;">
                               <div class="col-lg-6">
                                <label style="min-width: 150px;" class="col-lg-3 control-label" for="Periode Lelang">Periode Lelang</label>
                                    <div class="col-lg-6">
                                        <input style=" height: 30px" type="text" class="form-control" required="" id="periodelelang" name="periodelelang">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                <label style="min-width: 150px;" class="col-lg-3 control-label" for="Cut Loss">
                                    Cut Loss
                                    </label>
                                    <div class="col-lg-6">
                                    <input id="cut_loss" name="cut_loss" style=" height: 30px"  type="text" class="form-control" >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" style="padding-top: 5px; padding-bottom: 5px;">
                               <div class="col-lg-6">
                                <label style="min-width: 150px;" class="col-lg-3 control-label" for="Aging Lelang">Aging Lelang</label>
                                    <div class="col-lg-6">
                                        <input style=" height: 30px" type="text" class="form-control"  id="aginglelang" name="aginglelang">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                <label style="min-width: 150px;" class="col-lg-3 control-label" for="Hasil lelang">Hasil Lelang</label>
                                    <div class="col-lg-6">
                                        <input style=" height: 30px" type="text" class="form-control"  id="hasillelang" name="hasillelang">
                                    </div>
                                </div>
                                <br>
                                <br>
                            </div>
                            <div class="form-group" style="padding-top: 5px; padding-bottom: 5px;">
                               <div class="col-lg-6">
                                <label style="min-width: 150px;" class="col-lg-3 control-label" for="Aging Lelang">Biaya Lelang</label>
                                    <div class="col-lg-6">
                                        <input style=" height: 30px" type="text" class="form-control"  id="biaya_lelang" name="biaya_lelang">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                <label style="min-width: 150px;" class="col-lg-3 control-label" for="Hasil lelang">Pajak Lelang</label>
                                    <div class="col-lg-6">
                                        <input style=" height: 30px" type="text" class="form-control"  id="pajak_lelang" name="pajak_lelang">
                                    </div>
                                </div>
                                <br>
                                <br>
                            </div>
                            <div class="form-group" style="padding-top: 5px; padding-bottom: 5px;">
                               <div class="col-lg-6">
                                <label style="min-width: 150px;" class="col-lg-3 control-label" for="Aging Lelang">Nilai Penjualan Akhir</label>
                                    <div class="col-lg-6">
                                        <input style=" height: 30px" type="text" class="form-control"  id="nilai_penjualan_akhir" name="nilai_penjualan_akhir">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                <label style="min-width: 150px;" class="col-lg-3 control-label" for="Hasil lelang">Nilai Penjualan Awal</label>
                                    <div class="col-lg-6">
                                        <input style=" height: 30px" type="text" class="form-control"  id="nilai_penjualan_awal" name="nilai_penjualan_awal">
                                    </div>
                                </div>
                                <br>
                                <br>
                            </div>
                            <div class="form-group" style="padding-top: 5px; padding-bottom: 5px;">
                               <div class="col-lg-6">
                                <label style="min-width: 150px;" class="col-lg-3 control-label" for="Aging Lelang">Action Plan</label>
                                    <div class="col-lg-6">
                                       <select name="status_lelang" id="status_lelang" class="fancy-select2 form-control"> 
                                   <option value="">Select</option>           
                                   <?php foreach ($parameter as $item) { ?>                                  
                                    <option value="<?php echo $item->f_desc?>"><?php echo $item->f_desc ?></option>                             
                                <?php } ?> 
                                    </select>
                                    </div>
                                </div>
                                <br>
                                <br>
                            </div>
                            <div class="col-lg-12">
                            <div class="row">
                         
                                        <a style="float: right;" href="<?php echo base_url('Lelang/Index') ?>" type="button" class="btn btn-warning mr5 mb10"><i class=" fa fa-undo"></i> <span class="text">Cancel</span></a>
                                        <button style="float: right;" type="submit" class="btn btn-success mr5 mb10" id="simpan" value="Simpan" name="simpan"><i class=" fa fa-save"></i><span class="text"> Simpan</span> </button>
                                        <?php echo form_error('f_deptid', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                                
                            </div>
                        </div>
                            <!--nama-->
                            <div class="form-group" hidden="" style="padding-top: 5px; padding-bottom: 5px;">
                                 <div class="col-lg-6">
                                    <label class="col-lg-3 control-label" for="plafond">
                                        Plafond
                                    </label>
                                    <div class="col-lg-6" hidden="">
                                         <input hidden="" type="text" id="plafondAmount" class="form-control" name="plafondAmount" value="<?php echo $viewcreate_lelang->PlafondAmount ?>" readonly="" placeholder="PlafondAmount">
                                    </div>
                                </div>
                                <div class="col-lg-6" hidden="">
                                    <label class="col-lg-3 control-label" for="nama produk">
                                        idloan
                                    </label>
                                    <div class="col-lg-6">
                                       <input hidden="" type="text" id="idloan" class="form-control" name="idloan" value="<?php echo $viewcreate_lelang->id ?>" readonly="" placeholder="PlafondAmount">
                                    </div>
                                </div>
                            </div>
                            <!--company id-->
                            <div class="form-group" hidden="" style="padding-top: 5px; padding-bottom: 5px;">
                                <div class="col-lg-6" hidden="">
                                    <label class="col-lg-3 control-label" for="Start date">
                                        Kode Cabang
                                    </label>
                                    <div class="col-lg-6">
                                    <input  type="text" id="KodeCabang" class="form-control" name="KodeCabang" value="<?php echo $viewcreate_lelang->KodeCabang ?>"  readonly="" placeholder="KodeCabang">
                                    </div>
                                </div>
                                <div class="col-lg-6" hidden="">
                                    <label class="col-lg-3 control-label" for="Dudate">angsuran</label>
                                    <div class="col-lg-6">
                                        <input  type="text" id="angsuran" class="form-control" name="angsuran" value="<?php echo $viewcreate_lelang->ANNUITY_REPAY_AMT ?>"  readonly="" placeholder="angsuran">
                                    </div>
                                </div>
                            </div>
                            <!--company id-->
                            <div class="form-group" hidden="" style="padding-top: 5px; padding-bottom: 5px;">
                                <div class="col-lg-6" hidden="">
                                    <label class="col-lg-3 control-label" for="Tenor">NomorRekening</label>
                                    <div class="col-lg-6">
                                <input  type="text" id="norek" class="form-control" name="norek" value="<?php echo $viewcreate_lelang->NomorRekening ?>"  readonly="" placeholder="NomorRekening">
                                    </div>
                                </div>
                               <div class="col-lg-6" hidden="">
                                <label class="col-lg-3 control-label" for="Cabang">tipe_fasilitas</label>
                                <div class="col-lg-6">
                                <input  type="text" id="tipe_fasilitas" class="form-control" name="tipe_fasilitas" value="<?php echo $viewcreate_lelang->FacilityType ?>"  readonly="" placeholder="tipe_fasilitas">
                                    </div>
                                </div>
                                <div class="col-lg-6" hidden="">
                                <label class="col-lg-3 control-label" for="Cabang">keterangan_fasilitas</label>
                                <div class="col-lg-6">
                                <input  type="text" id="keterangan_fasilitas" class="form-control" name="keterangan_fasilitas" value="<?php echo $viewcreate_lelang->description ?>"  readonly="" placeholder="keterangan_fasilitas">
                                    </div>
                                </div>
                            </div>
                            <!--company id-->
                            <div class="form-group" hidden="" style="padding-top: 5px; padding-bottom: 5px;">
                              <div class="col-lg-6" hidden="">
                                <label class="col-lg-3 control-label" for="dpd">DueBunga</label>
                                <div class="col-lg-6">
                                <input  type="text" id="DueBunga" class="form-control" name="DueBunga" value="<?php echo $viewcreate_lelang->DueBunga ?>"  readonly="" placeholder="DueBunga">
                                    </div>
                                </div>
                               <div class="col-lg-6" hidden="">
                                <label class="col-lg-3 control-label" for="bucket">DuePokok</label>
                                <div class="col-lg-6">
                               <input  type="text" id="DuePokok" class="form-control" name="DuePokok" value="<?php echo $viewcreate_lelang->DuePokok ?>"  readonly="" placeholder="DuePokok">
                                    </div>
                                </div>
                            </div>
                            <!--company id-->
                            <div class="form-group" hidden="" style="padding-top: 5px; padding-bottom: 5px;">
                               <div class="col-lg-6" hidden="">
                                <label class="col-lg-3 control-label" for="flag">BakiDebet</label>
                                <div class="col-lg-6">
                                <input  type="text" id="BakiDebet" class="form-control" name="BakiDebet" value="<?php echo $viewcreate_lelang->BakiDebet ?>"  readonly="" placeholder="BakiDebet">
                                    </div>
                                </div>
                            <div class="col-lg-6" hidden="">
                            <label class="col-lg-3 control-label" for="flag">Nama Produk</label>
                            <div class="col-lg-6">
                                <input  type="text" id="description" class="form-control" name="description" value="<?php echo $viewcreate_lelang->description ?>"  readonly="" placeholder="description">
                            </div>
                            </div>
                            </div>
                            <!--company id-->
                            <div class="form-group" hidden="" style="padding-top: 5px; padding-bottom: 5px;">
                            <div class="col-lg-6" hidden="">
                            <label class="col-lg-3 control-label" for="buki_debit">Branch</label>
                            <div class="col-lg-6">
                                <input  type="text" id="branch" class="form-control" name="branch" value="<?php echo $viewcreate_lelang->COMPANY_NAME ?>"  readonly="" placeholder="COMPANY_NAME">
                            </div>
                            </div>
                            </div>
                                <div class="col-lg-12">
                                    <label class="col-lg-5 control-label" for="f_deptid"></label>
                                    
                                </div>
                            <!--company id-->
                        </form>
                        <?php // echo form_open('content/create_um_datakaryawan_process', 'id="swaz-confirm" class="form-horizontal group-border stripped"'); ?>
                        <!--<form class="form-horizontal group-border stripped" id="swaz-confirm" action="">-->
                        <!--nik-->


                    </div>
                </div>
            </div>
        </div>
   <script>
  document.querySelector("input[type=number]")
  .oninput = e => console.log(new Date(e.target.valueAsNumber, 0, 1))
</script>
    </body>
</html>
