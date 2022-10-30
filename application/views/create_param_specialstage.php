<html>
    <body>
            <div class="container-fluid">
                <!--<form enctype="multipart/form-data" action="<?php echo ""//base_url()   ?>tbl_bank/insert" method="post" id='uploadForm'>-->
                <?php echo form_open('content/create_param_specialstage_process'); ?>
                <div class="form-group">
                    <label for="id_area">Category</label>
                    <input type="text" class="form-control" id="categoryspecialstage" name="categoryspecialstage">
                   <span style='font-size: 10pt; color: red'></span>
                </div>
                
                
                <div class="form-group" >
                    <label for="area_name">Special Stage Code</label>
                    <input type="text" class="form-control" maxlength="2" minlength="2" onkeypress="return Angkasaja(event)" id="specialstagecode" name="specialstagecode">
                    <span style='font-size: 10pt; color: red'></span>
                </div>
                <input type="submit" value="Simpan" class="btn btn-primary" id="btn-submit"/>
                    </form>
            </div>

<script type="text/javascript">
function Angkasaja(evt) {
var charCode = (evt.which) ? evt.which : event.keyCode
if (charCode > 31 && (charCode < 48 || charCode > 57))
return false;
return true;
}
</script>
    </body>
</html>
