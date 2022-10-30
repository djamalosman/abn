<html>
    <body>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default toggle panelMove panelClose panelRefresh">
                    <div class="panel-heading">
                        <h4 class="panel-title">edit parameter</h4>
                    </div>
                    <div class="panel-body pt0 pb0">
                        <form action="<?php echo base_url('content/create_param_branch_process') ?>" method="POST" class="form-horizontal group-border stripped">
                            <div class="form-group" style="padding-top: 5px; padding-bottom: 5px;">
                            <div class="col-lg-6">
                                    <label class="col-lg-3 control-label" for="id_branch">ID Branch</label>
                                    <div class="col-lg-6">
                                        <input id="id_branch"  name ="id_branch" style=" height: 30px"  type="text" class="form-control" required="">
                                    </div>
                                </div>
                          
                                <div class="col-lg-6">
                                    <label class="col-lg-3 control-label" for="branch_name">Branch Name</label>
                                    <div class="col-lg-6">
                                        <input id="branch_name"   name ="branch_name" style=" height: 30px"  type="text" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-3 control-label" for="id_area">ID area</label>
                                    <div class="col-lg-6">
                                        <input id="id_area" name="id_area" style=" height: 30px"  type="text" class="form-control" required="">
                                        
                                    </div>
                                 
                                </div>
                            <div class="col-lg-6">
                                    <label class="col-lg-3 control-label" for="address">Address</label>
                                    <div class="col-lg-6">
                                        <input id="address" name="address" style=" height: 30px"  type="text" class="form-control" required="">
                                        
                                    </div>
                                 
                                </div>
                            </div>
                            <!--nama-->
                            <div class="form-group" style="padding-top: 5px; padding-bottom: 5px;">
                                <div class="col-lg-6">
                                    <label class="col-lg-3 control-label" for="id_kota">ID Kota</label>
                                    <div class="col-lg-6">
                                        <input id="id_kota"  name="id_kota" style=" height: 30px"  type="text" class="form-control" required="">
                                       
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="col-lg-3 control-label" for="postal_code">Kode Post</label>
                                    <div class="col-lg-6">
                                        <input id="postal_code" name="postal_code" style=" height: 30px" type="number"  type="text" class="form-control" required="">
                                       
                                    </div></div>
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
