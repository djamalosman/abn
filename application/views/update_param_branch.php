<html>
    <body>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default toggle panelMove panelClose panelRefresh">
                    <div class="panel-heading">
                        <h4 class="panel-title">edit branch</h4>
                    </div>
                    <div class="panel-body pt0 pb0">
                        <form action="<?php echo base_url('content/update_param_branch_process') ?>" method="POST" class="form-horizontal group-border stripped">
                            <div class="form-group" style="padding-top: 5px; padding-bottom: 5px;">
                            
                            <div class="col-lg-6">
                                    <label class="col-lg-3 control-label" for="f_id">Nama Cabang</label>
                                    <div class="col-lg-6">
                                        <input id="branch_name"  value="<?php echo$branch->f_branchname ?>" name ="branch_name" style=" height: 30px"  type="text" class="form-control" required="">
                                    </div>
                            </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-3 control-label" for="f_areaid">ID Are</label>
                                    <div class="col-lg-6">
                                        <input id="id_area"  value="<?php echo $branch->f_areaid ?>" name ="id_area" style=" height: 30px"  type="text" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-3 control-label" for="Type">Alamat</label>
                                    <div class="col-lg-6">
                                        <input id="address" value="<?php echo $branch->f_address ?>" name="address" style=" height: 30px"  type="text" class="form-control" required="">
                                        
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-3 control-label" for="Code">ID Kota</label>
                                    <div class="col-lg-6">
                                        <input id="id_kota" value="<?php echo $branch->f_cityid ?>" name="id_kota" style=" height: 30px"  type="text" class="form-control" required="">
                                       
                                    </div>
                                </div>
                            </div>
                            <!--nama-->
                            <div class="form-group" style="padding-top: 5px; padding-bottom: 5px;">
                                <div class="col-lg-6">
                                    <label class="col-lg-3 control-label" for="Code">Kode Pos</label>
                                    <div class="col-lg-6">
                                        <input id="postal_code" value="<?php echo $branch->f_postcode ?>"  name="postal_code" style=" height: 30px"  type="number" class="form-control" required="">
                                       
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-3 control-label" for="f_id">ID Cabang</label>
                                    <div class="col-lg-6">
                                        <input id="id_branch"  value="<?php echo $branch->f_branchid  ?>" name ="id_branch" style=" height: 30px"  type="text" class="form-control" required="">
                                    </div>
                            </div>
                              
                            </div>
                          
                            <!--company id-->
                            


                           


                            <div class="form-group" style="padding-top: 20px; padding-bottom: 5px;">
                                <div class="col-lg-6">
                                    <label class="col-lg-3 control-label" for=""></label>
                                    <div class="col-lg-6">
                                        <!--<input style=" height: 30px" type="text" class="form-control" id="f_compid" name="f_compid">-->
                                        <?php echo form_error('f_compid', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                                    </div></div>
                                <div class="col-lg-6">
                                    <label class="col-lg-3 control-label" for="f_deptid"></label>
                                    <div class="col-lg-6">
                                        <a style=" height: 30px" href="<?php echo base_url('content/read_param_branch') ?>" type="button" class="btn btn-primary"><i class=" fa fa-undo"></i> <span class="text">Cancel</span></a>
                                        <button style=" height: 30px" type="submit" class="btn btn-primary" id="simpan" value="Simpan" name="simpan"><i class=" fa fa-save"></i><span class="text"> Simpan</span> </button>
                                        <?php echo form_error('f_deptid', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                                    </div></div>
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
           <script type="text/javascript">
            var max_chars = 5;
            $('#postal_code').keydown( function(e){
    if ($(this).val().length >= max_chars) { 
        $(this).val($(this).val().substr(0, max_chars));
    }
});

$('#postal_code').keyup( function(e){
    if ($(this).val().length >= max_chars) { 
        $(this).val($(this).val().substr(0, max_chars));
    }
});
        </script>
  <script>
function myFunction() {
  var x = document.getElementById("myText").required;
  
}
</script>
    </body>
</html>
