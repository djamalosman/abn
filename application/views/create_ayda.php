<html>

    <body>
       
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default toggle panelMove panelClose panelRefresh">
                    <div class="panel-heading">
                        <h4 class="panel-title">Form Input Data AYDA</h4>
                    </div>
                    <div class="panel-body pt0 pb0">
                        <form action="<?php echo base_url('Ayda/insert_ayda') ?>" method="POST" enctype="multipart/form-data" class="form-horizontal group-border stripped">
                            <div class="form-group" style="padding-top: 5px; padding-bottom: 5px;">
                                <div class="col-lg-6">
                                    <label class="col-lg-4 control-label" for="debiturName">Nama debitur
                                    </label>
                                    <div class="col-lg-6">
                                        <input id="Nama" name ="nama" style=" height: 30px"  type="text" class="form-control" required="" >
                                    </div> </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-4 control-label" for="Cif">Cif</label>
                                    <div class="col-lg-6">
                                        <input id="nama" name="cif" style=" height: 30px"  type="number" class="form-control" required="">
                                    </div>
                                </div>

                            </div>
                            <div class="form-group" style="padding-top: 5px; padding-bottom: 5px;">
                                <div class="col-lg-6">
                                    <label class="col-lg-4 control-label" for="Plafond Awal">Plafond Awal
                                    </label>
                                    <div class="col-lg-6">
                                        <input id="PlafondAwal" name ="plafondAwal" style=" height: 30px"  type="number" class="form-control" required="" >
                                    </div> </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-4 control-label" for="MV">
                                        MV
                                    </label>
                                    <div class="col-lg-6">
                                        <input id="mv" name="mv" style=" height: 30px"  type="number" class="form-control" required="">
                                    </div>
                                </div>

                            </div>
                            <!--nama-->
                            <div class="form-group" style="padding-top: 5px; padding-bottom: 5px;">
                                 <div class="col-lg-6">
                                    <label class="col-lg-4 control-label" for="LTCR">
                                        LTCR
                                    </label>
                                    <div class="col-lg-6">
                                        <input id="ltcr" name="ltcr" style=" height: 30px"  type="number" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-4 control-label" for="Dibukukan  tanggal AYDA">Dibukukan tanggal AYDA</label>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            <input id="date" required="" type="date" value="yyy-mm-dd" name="dibukukantglayda">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--company id-->
                            <div class="form-group" style="padding-top: 5px; padding-bottom: 5px;">
                                <div class="col-lg-6">
                                    <label class="col-lg-4 control-label" for="Tahun AYDA">Tahun AYDA</label>
                                    <div class="col-lg-6">
                                        <input type="number" required="" name="thnayda" placeholder="YYYY" min="1945" max="2100">
                                    </div>

                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-4 control-label" for="MOB AYDA">MOB AYDA</label>
                                    <div class="col-lg-6">
                                        <input style=" height: 30px;" type="number" class="form-control" id="mobayda" required="" name="mobayda" >
                                    </div>
                                </div>
                            </div>
                            <!--company id-->
                            <div class="form-group" style="padding-top: 5px; padding-bottom: 5px;">
                                <div class="col-lg-6">
                                    <label class="col-lg-4 control-label" for="Range MOB">Range MOB</label>
                                    <div class="col-lg-6">
                                        <input style=" height: 30px;" type="text" class="form-control" id="rangemob" required="" name="rangemob" >
                                    </div>
                                </div>
                               <div class="col-lg-6">
                                    <label class="col-lg-4 control-label" for="Cabang">Cabang</label>
                                    <div class="col-lg-6">
                                        <input style=" height: 30px;" type="text" class="form-control" id="cabang" required="" name="cabang" >
                                    </div>
                                </div>
                            </div>
                            <!--company id-->
                            <div class="form-group" style="padding-top: 5px; padding-bottom: 5px;">
                                <div class="col-lg-6">
                                    <label class="col-lg-4 control-label" for="Dibukukan  tanggal AYDA">Tgl LPJ Awal AYDA</label>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            <input id="date" required="" type="date" value="yyy-mm-dd" name="tgllpjawalayda">


                                            
                                        </div>
                                    </div>
                                </div>
                               <div class="col-lg-6">
                                    <label class="col-lg-4 control-label" for="tgllpjawalayda">MV</label>
                                    <div class="col-lg-6">
                                        <input style=" height: 30px;"  type="number" class="form-control" id="mv2" name="mv2" >
                                    </div>
                                </div>
                            </div>
                            <!--company id-->
                            <div class="form-group" style="padding-top: 5px; padding-bottom: 5px;">
                                <div class="col-lg-6">
                                    <label class="col-lg-4 control-label" for="tgllpjawalayda">LV</label>
                                    <div class="col-lg-6">
                                        <input style=" height: 30px;" type="number"  class="form-control" id="lv2" name="lv2" >
                                    </div>
                                </div>
                               <div class="col-lg-6">
                                    <label class="col-lg-4 control-label" for="Dibukukan  tanggal AYDA">Tgl LPJ AYDA 1= Th</label>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            <input id="date"  type="date" value="yyy-mm-dd" name="tgllpjaydalbhsetahun">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--company id-->
                            <div class="form-group" style="padding-top: 5px; padding-bottom: 5px;">
                                <div class="col-lg-6">
                                    <label class="col-lg-4 control-label" for="MV3">MV2</label>
                                    <div class="col-lg-6">
                                        <input style=" height: 30px;"  type="number" class="form-control" id="mv3" name="mv3" >
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-4 control-label" for="LV2">LV2</label>
                                    <div class="col-lg-6">
                                        <input style=" height: 30px;" type="number"  class="form-control" id="lv3" name="lv3" >
                                    </div>
                                </div>
                            </div>
                            <!--company id-->
                            <div class="form-group" style="padding-top: 5px; padding-bottom: 5px;">
                               <div class="col-lg-6">
                                    <label class="col-lg-4 control-label" for="Tgl LPJ ayda">Tgl LPJ AYDA 2= Th</label>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            <input id="date"  type="date" value="yyy-mm-dd"
 name="tgllpjaydalbhduatahun" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-4 control-label" for="MV3">MV3</label>
                                    <div class="col-lg-6">
                                        <input style="  height: 30px;" type="number" class="form-control"  id="mv4" name="mv4" >
                                    </div>
                                </div>
                            </div>
                            <!--company id-->
                            <div class="form-group" style="padding-top: 5px; padding-bottom: 5px;">
                               <div class="col-lg-6">
                                    <label class="col-lg-4 control-label" for="LV3">LV3</label>
                                    <div class="col-lg-6">
                                        <input style=" height: 30px;" type="number" class="form-control" id="lv4"  name="lv4" >
                                    </div>
                                </div>
                            <div class="col-lg-6">
                                    <label class="col-lg-4 control-label" for="tgllpjawalayda">Jenis Asset</label>
                                    <div class="col-lg-6">
                                        <input style=" height: 30px;" type="text" class="form-control" required="" id="jenisasset" name="jenisasset" >
                                    </div>
                                </div>
                            </div>
                            <!--company id-->


                            <div class="form-group" style="padding-top: 5px; padding-bottom: 5px;">
                                <div class="col-lg-6">
                                    <label class="col-lg-4 control-label" for="landscape">Alamat Jaminan </label>
                                    <div class="col-lg-6">
                                        <input style=" height: 30px" type="text" class="form-control"  required="" id="alamatjaminan" name="alamatjaminan">
                                    </div>
                                </div>
                              <div class="col-lg-6">
                                <label class="col-lg-4 control-label" for="landscape">LT/LB </label>
                                    <div class="col-lg-6">
                                        <input style=" height: 30px" type="text" class="form-control" required="" id="ltlb" name="ltlb">
                                    </div>
                                </div>
                            </div>
                            <!--company id-->


                            <div class="form-group" style="padding-top: 5px; padding-bottom: 5px;">
                               <div class="col-lg-6">
                                <label class="col-lg-4 control-label" for="landscape">OS Awal</label>
                                    <div class="col-lg-6">
                                        <input style=" height: 30px" type="number" class="form-control" required="" id="osawal" name="osawal">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                <label class="col-lg-4 control-label" for="landscape">Hapus Tagih Awal AYDA</label>
                                    <div class="col-lg-6">
                                        <input style=" height: 30px" type="number" class="form-control" required="" id="hpstgihawalayda" name="hpstgihawalayda">
                                    </div>
                                </div>
                            </div>
                            <!--company id-->


                            <div class="form-group" style="padding-top: 5px; padding-bottom: 5px;">
                                 <div class="col-lg-6">
                                <label class="col-lg-4 control-label" for="nilaiawalayda">Nilai Awal AYDA</label>
                                    <div class="col-lg-6">
                                        <input style=" height: 30px" type="number" class="form-control" required="" id="nilaiawalayda" name="nilaiawalayda">
                                    </div>
                                </div>
                                 <div class="col-lg-6">
                                    <label class="col-lg-4 control-label" for="biaya">biaya</label>
                                    <div class="col-lg-6">
                                        <input style=" height: 30px" type="number" class="form-control" required="" id="biaya" name="biaya">
                                    </div>
                                </div>
                            </div>
                            <!--company id-->


                            <div class="form-group" style="padding-top: 20px; padding-bottom: 5px;">
                              <div class="col-lg-6">
                                    <label class="col-lg-4 control-label" for="termintate">Penjualan AYDA</label>
                                    <div class="col-lg-6">
                                        <input style=" height: 30px" type="number" class="form-control" required="" id="penjualanayda" name="penjualanayda">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-4 control-label" for="termintate">Nett Penjualan</label>
                                    <div class="col-lg-6">
                                        <input style=" height: 30px" type="number" class="form-control" required="" id="nettpenjualan" name="nettpenjualan">
                                    </div>
                                </div>
                            </div>
                             <div class="form-group" style="padding-top: 20px; padding-bottom: 5px;">
                                <div class="col-lg-6">
                                    <label class="col-lg-4 control-label" for="Dibukukan  tanggal AYDA">Tanggal Penjualan AYDA</label>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                           <input id="date" required="" type="date" value="yyy-mm-dd"name="tgllpenjualanayda">
                                             
                                        </div>
                                    </div>
                                </div>
                                 <div class="col-lg-6">
                                    <label class="col-lg-4 control-label" for="termintate">CKPN</label>
                                    <div class="col-lg-6">
                                        <input required="" style=" height: 30px" type="number" class="form-control" id="ckpn" name="ckpn">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <br>
                                    <label class="col-lg-4 control-label" for="notlp">File</label>
                                    <div class="col-lg-6">
                                    <input type="file" id="myfile" class="form-control" name="myfile" multiple  required>
                                    </div>
                                </div>
                                <!-- <div class="col-lg-6">
                                    <br>
                                    <label class="col-lg-4 control-label" for="notlp">File</label>
                                    <div class="col-lg-6">
                                       <input type="hidden" name="MAX_FILE_SIZE" value="222222000000">
                                    <input type="file" id="myfile" class="form-control" name="myfile"  required  multiple>
                                    </div>
                                </div> -->

                            </div>
                            <br>
                                <div class="col-lg-6">
                                    <label class="col-lg-4 control-label" for="f_deptid"></label>
                                    <div class="col-lg-6">
                                         <button style=" height: 30px" type="submit" class="btn btn-success mr5 mb10" id="simpan" value="Simpan" name="simpan"><i class=" fa fa-save"></i><span class="text"> Simpan</span> </button>
                                        <a style=" height: 30px" href="<?php echo base_url('content/view_ayda') ?>" type="button" class="btn btn-warning mr5 mb10"><i class=" fa fa-undo"></i> <span class="text">Cancel</span></a>
                                       
                                        <?php echo form_error('f_deptid', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                                    </div>
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
