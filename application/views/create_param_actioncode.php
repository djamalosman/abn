<html>
    <body>
            <div class="container-fluid">
                <!--<form enctype="multipart/form-data" action="<?php echo ""//base_url()   ?>tbl_bank/insert" method="post" id='uploadForm'>-->
                <?php echo form_open('content/create_param_actioncode_process'); ?>
                <div class="form-group">
                    <label for="id_area">Category</label>
                    <input type="text" class="form-control" id="Category" name="Category">
                    <?php echo form_error('Category', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                </div>
                
                
                <div class="form-group" >
                    <label for="area_name">Action Code</label>
                    <input type="text" class="form-control" maxlength="2" minlength="2" onkeypress="return Angkasaja(event)" id="Action_Code" name="Action_Code">
                    <?php echo form_error('Action_Code', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                </div>
                
                <div class="form-group" >
                    <label for="notes">Description</label>
                    <textarea type="" class="form-control" id="Description" name="Description"></textarea>
                    <?php echo form_error('Description', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
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
