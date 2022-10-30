<html>
<style type="text/css">
  #myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
  padding: 20px;
}

#myImg:hover {opacity: 0.7;}
</style>
    <body>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-danger toggle panelMove panelClose panelRefresh">
                    <div class="panel-heading" style = "background-color : red;">
                        <h4 class="panel-title">Form Input Data AYDA</h4>
                    </div>
                    <div class="panel-body pt0 pb0">
                        <form action="<?php echo base_url('content/update_ayda/'.$aydaedit->f_cif) ?>" method="POST" enctype="multipart/form-data" class="form-horizontal group-border stripped">
                            <div class="form-group" style="padding-top: 5px; padding-bottom: 5px;">
                                <div class="col-lg-6">
                                    <label class="col-lg-4 control-label" for="debiturName">"Nama debitur"
                                    </label>
                                    <div class="col-lg-6">
                                        <input id="Nama" value="<?php echo $aydaedit->f_custname ?>" name ="nama" style=" height: 30px"  type="text" class="form-control">
                                    </div> 
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-4 control-label" for="Cif">Cif</label>
                                    <div class="col-lg-6">
                                        <input id="nama"  value="<?php echo $aydaedit->f_cif ?>" name="cif" style=" height: 30px"  type="text" class="form-control" >
                                    </div>
                                </div>

                            </div>
                            <div class="form-group" style="padding-top: 5px; padding-bottom: 5px;">
                                <div class="col-lg-6">
                                    <label class="col-lg-4 control-label" for="Plafond Awal">"Plafond Awal
"
                                    </label>
                                    <div class="col-lg-6">
                                        <input id="PlafondAwal"  value="<?php echo $aydaedit->f_plafondawal ?>" name ="plafondAwal" style=" height: 30px"  type="text" class="form-control" >
                                    </div> </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-4 control-label" for="MV">
                                        MV
                                    </label>
                                    <div class="col-lg-6">
                                        <input id="mv" value="<?php echo $aydaedit->f_mv_a ?>" name="mv" style=" height: 30px"  type="text" class="form-control" >
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
                                        <input id="ltcr" value="<?php echo $aydaedit->f_ltcr ?>"  name="ltcr" style=" height: 30px"  type="text" class="form-control" >
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-4 control-label" for="Dibukukan  tanggal AYDA">Dibukukan  tanggal AYDA</label>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            <input type="month" value="<?php echo $aydaedit->f_tglayda ?>" name="dibukukantglayda">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--company id-->
                            <div class="form-group" style="padding-top: 5px; padding-bottom: 5px;">
                                <div class="col-lg-6">
                                    <label class="col-lg-4 control-label" for="Tahun AYDA">Tahun AYDA</label>
                                    <div class="col-lg-6">
                                        <input type="number" value="<?php echo $aydaedit->f_thnayda ?>" name="thnayda" placeholder="YYYY" min="1945" max="2100">
                                    </div>

                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-4 control-label" for="MOB AYDA">MOB AYDA</label>
                                    <div class="col-lg-6">
                                        <input style="  height: 30px;" type="text" class="form-control" id="mobayda" name="mobayda" value="<?php echo $aydaedit->f_mobayda ?>">
                                    </div>
                                </div>
                            </div>
                            <!--company id-->
                            <div class="form-group" style="padding-top: 5px; padding-bottom: 5px;">
                                <div class="col-lg-6">
                                    <label class="col-lg-4 control-label" for="Range MOB">Range MOB</label>
                                    <div class="col-lg-6">
                                        <input style=" height: 30px;" type="text" class="form-control" id="rangemob" name="rangemob"  value="<?php echo $aydaedit->f_rangemob ?>" >
                                    </div>
                                </div>
                               <div class="col-lg-6">
                                    <label class="col-lg-4 control-label" for="Cabang">Cabang</label>
                                    <div class="col-lg-6">
                                        <input style=" height: 30px;" type="text" class="form-control"  id="cabang" name="cabang"value="<?php echo $aydaedit->f_branch ?>"  >
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
                                            <input type="month" name="tgllpjawalayda" value="<?php echo $aydaedit->f_tgllpjawalayda ?>" >
                                            
                                        </div>
                                    </div>
                                </div>
                               <div class="col-lg-6">
                                    <label class="col-lg-4 control-label" for="tgllpjawalayda">MV</label>
                                    <div class="col-lg-6">
                                        <input style=" height: 30px;" type="text" class="form-control" id="mv2" name="mv2" value="<?php echo $aydaedit->f_mv_b ?>"  >
                                    </div>
                                </div>
                            </div>
                            <!--company id-->
                            <div class="form-group" style="padding-top: 5px; padding-bottom: 5px;">
                                <div class="col-lg-6">
                                    <label class="col-lg-4 control-label" for="tgllpjawalayda">LV</label>
                                    <div class="col-lg-6">
                                        <input style=" height: 30px;" type="text" class="form-control" id="lv2" name="lv2" value="<?php echo $aydaedit->f_lv ?>">
                                    </div>
                                </div>
                               <div class="col-lg-6">
                                    <label class="col-lg-4 control-label" for="Dibukukan  tanggal AYDA">Tgl LPJ AYDA 1≥ Th</label>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            <input type="month" name="tgllpjaydalbhsetahun"value="<?php echo $aydaedit->tlgllpjlbh_satuthn ?>">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--company id-->
                            <div class="form-group" style="padding-top: 5px; padding-bottom: 5px;">
                                <div class="col-lg-6">
                                    <label class="col-lg-4 control-label" for="MV3">MV2</label>
                                    <div class="col-lg-6">
                                        <input style=" height: 30px;" type="text" class="form-control" id="mv3" name="mv3" value="<?php echo $aydaedit->f_mvtwo ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-4 control-label" for="LV2">LV2</label>
                                    <div class="col-lg-6">
                                        <input style=" height: 30px;" type="text" class="form-control" id="lv3" name="lv3"value="<?php echo $aydaedit->f_lvtwo ?>" >
                                    </div>
                                </div>
                            </div>
                            <!--company id-->
                            <div class="form-group" style="padding-top: 5px; padding-bottom: 5px;">
                               <div class="col-lg-6">
                                    <label class="col-lg-4 control-label" for="Tgl LPJ ayda">Tgl LPJ AYDA 2≥ Th</label>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            <input type="month" name="tgllpjaydalbhduatahun" value="<?php echo $aydaedit->tlgllpjlbh_duathn ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-4 control-label" for="MV3">MV3</label>
                                    <div class="col-lg-6">
                                        <input style=" height: 30px;" type="text" class="form-control" id="mv4" name="mv4"value="<?php echo $aydaedit->f_mvthree ?>" >
                                    </div>
                                </div>
                            </div>
                            <!--company id-->
                            <div class="form-group" style="padding-top: 5px; padding-bottom: 5px;">
                               <div class="col-lg-6">
                                    <label class="col-lg-4 control-label" for="LV3">LV3</label>
                                    <div class="col-lg-6">
                                        <input style=" height: 30px;" type="text" class="form-control" id="lv4" name="lv4"value="<?php echo $aydaedit->f_lvthree ?>" >
                                    </div>
                                </div>
                            <div class="col-lg-6">
                                    <label class="col-lg-4 control-label" for="tgllpjawalayda">Jenis Asset</label>
                                    <div class="col-lg-6">
                                        <input style=" height: 30px;" type="text" class="form-control" id="jenisasset" name="jenisasset"value="<?php echo $aydaedit->f_jenisasset ?>" >
                                    </div>
                                </div>
                            </div>
                            <!--company id-->


                            <div class="form-group" style="padding-top: 5px; padding-bottom: 5px;">
                                <div class="col-lg-6">
                                    <label class="col-lg-4 control-label" for="landscape">Alamat Jaminan </label>
                                    <div class="col-lg-6">
                                        <input style=" height: 30px" type="text" class="form-control" id="alamatjaminan" name="alamatjaminan" value="<?php echo $aydaedit->alamat_jaminan ?>">
                                    </div>
                                </div>
                              <div class="col-lg-6">
                                <label class="col-lg-4 control-label" for="landscape">LT/LB </label>
                                    <div class="col-lg-6">
                                        <input style=" height: 30px" type="text" class="form-control" id="ltlb" name="ltlb"value="<?php echo $aydaedit->lt_lb ?>">
                                    </div>
                                </div>
                            </div>
                            <!--company id-->


                            <div class="form-group" style="padding-top: 5px; padding-bottom: 5px;">
                               <div class="col-lg-6">
                                <label class="col-lg-4 control-label" for="landscape">OS Awal</label>
                                    <div class="col-lg-6">
                                        <input style=" height: 30px" type="text" class="form-control" id="osawal" name="osawal"value="<?php echo $aydaedit->os_awal ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                <label class="col-lg-4 control-label" for="landscape">Hapus Tagih Awal AYDA</label>
                                    <div class="col-lg-6">
                                        <input style=" height: 30px" type="text" class="form-control" id="hpstgihawalayda" name="hpstgihawalayda"value="<?php echo $aydaedit->hpustgih_ayda ?>">
                                    </div>
                                </div>
                            </div>
                            <!--company id-->


                            <div class="form-group" style="padding-top: 5px; padding-bottom: 5px;">
                                 <div class="col-lg-6">
                                <label class="col-lg-4 control-label" for="nilaiawalayda">Nilai Awal AYDA</label>
                                    <div class="col-lg-6">
                                        <input style=" height: 30px" type="text" class="form-control" id="nilaiawalayda" name="nilaiawalayda"value="<?php echo $aydaedit->nilai_awal_ayda ?>">
                                    </div>
                                </div>
                                 <div class="col-lg-6">
                                    <label class="col-lg-4 control-label" for="termintate">biaya</label>
                                    <div class="col-lg-6">
                                        <input style=" height: 30px" type="text" class="form-control" id="penjualbiayaanayda" name="biaya"value="<?php echo $aydaedit->penjualan_ayda ?>">
                                    </div>
                                </div>
                            </div>
                            <!--company id-->


                            <div class="form-group" style="padding-top: 20px; padding-bottom: 5px;">
                              <div class="col-lg-6">
                                    <label class="col-lg-4 control-label" for="termintate">Penjualan AYDA</label>
                                    <div class="col-lg-6">
                                        <input style=" height: 30px" type="text" class="form-control" id="penjualanayda" name="penjualanayda"value="<?php echo $aydaedit->biaya ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-4 control-label" for="termintate">Nett Penjualan</label>
                                    <div class="col-lg-6">
                                        <input style=" height: 30px" type="text" class="form-control" id="nettpenjualan" name="nettpenjualan"value="<?php echo $aydaedit->neet_penjualan ?>">
                                    </div>
                                </div>
                            </div>
                             <div class="form-group" style="padding-top: 20px; padding-bottom: 5px;">
                                <div class="col-lg-6">
                                    <label class="col-lg-4 control-label" for="Dibukukan  tanggal AYDA">Tanggal Penjualan AYDA</label>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                           <input id="date" type="date" value="yyy-mm-dd"name="tgllpenjualanayda"value="<?php echo $aydaedit->tglpenjualan_ayda ?>">
                                             
                                        </div>
                                    </div>
                                </div>
                                 <div class="col-lg-6">
                                    <label class="col-lg-4 control-label" for="termintate">CKPN</label>
                                    <div class="col-lg-6">
                                        <input style=" height: 30px" type="text" class="form-control" id="ckpn" name="ckpn"value="<?php echo $aydaedit->ckpn ?>">
                                    </div>
                                </div>
                                 <div class="col-lg-6">
                                    <br>
                                    <label class="col-lg-4 control-label" for="notlp">File</label>
                                    <div class="col-lg-6">
                                    <input type="file" value="" id="myfile" class="form-control" name="myfile"   multiple >
                                    </div>
                                </div>
                        <div class="col-lg-12 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                             <table id="responsive"  class="table nowrap table-bordered" style="width:100%;border: 2px;">
                                    <thead>
                                    <tr> 
                                    <th>   
                                    <img  id="myImg" src="<?php echo base_url("uploads/".$aydaedit->foto)?>" width="100%" height="40%"/>
                                    <br><label></label>
                                    </th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                            </div>
 
                            <br>
                                <div class="col-lg-6">
                                    <label class="col-lg-3 control-label" for="f_deptid"></label>
                                    <div class="col-lg-6">
                                        
                                          <a style=" height: 30px" href="<?php echo base_url('content/view_ayda/') ?>" type="button" class="btn btn-warning mr5 mb10"><i class=" fa fa-undo"></i><span class="text"> Cancel</span> </button></a>
                                           <button style=" height: 30px" type="submit" class="btn btn-success mr5 mb10" id="simpan" value="Simpan" name="simpan"><i class=" fa fa-save"></i><span class="text"> Simpan</span> </button>

                                        
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
