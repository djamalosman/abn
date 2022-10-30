<style>
input:valid {
  color: black;
}
input:invalid {
  color: red;
}    
    
</style>

<html>

    <body>

        <div class="row">

            <div class="col-lg-12">

                <div class="panel panel-danger toggle panelMove panelClose panelRefresh">

                    <div class="panel-heading" style="background-color: red;">

                        <h4 class="panel-title"><i class="fa fa-users"></i>Form Input Data Karyawan</h4>

                    </div>

                    <div class="panel-body pt0 pb0">

                        <form action="<?php echo base_url('employee/create_um_datakaryawan_process') ?>" method="POST" class="form-horizontal group-border stripped">

                            <div class="form-group" style="padding-top: 5px; padding-bottom: 5px;">

                                <div class="col-lg-6">

                                    <label class="col-lg-3 control-label" for="nik">NIK <h style="color: red;">*</h></label>

                                    <div class="col-lg-6">

                                        <input  style=" height: 30px;" type="text" class="form-control" id="nik" name="nik" required="" pattern="[0-9a-zA-Z]{1,20}" title="Numeric Only, And Max 20 Digit">

                                    </div>

                                </div>

                                <div class="col-lg-6">

                                    <label class="col-lg-3 control-label" for="nama">Name <h style="color: red;">*</h></label>

                                    <div class="col-lg-6">

                                        <input id="nama" name="nama" style=" height: 30px"  pattern="[a-zA-Z/.& ,-]+" title="Please enter the data in correct format." type="text" class="form-control" required="">


                                    </div></div>

                            </div>

                            <!--nama-->

                            <div class="form-group" style="padding-top: 5px; padding-bottom: 5px;">

                                <div class="col-lg-6">

                                    <label class="col-lg-3 control-label" for="gender">Gender <h style="color: red;">*</h></label>

                                    <div class="col-lg-6">

                                        <div class="radio-custom radio-inline">

                                            <input type="radio" name="gender" value="laki-laki" pattern="[a-zA-Z0-9/.& -]+" title="Please enter the data in correct format." id="radio4" required="">

                                            <label for="radio4">Male</label>

                                        </div>

                                        <div class="radio-custom radio-inline">

                                            <input type="radio" name="gender" value="perempuan" checked="checked" id="radio5" required="">

                                            <label for="radio5">Female</label>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">

                                    <label class="col-lg-3 control-label" for="basic-datepicker">Birth Date</label>

                                    <div class="col-lg-6">

                                        <div class="input-group">

                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                                            <input style="height: 30px;"type="date"  name="multiple-datepicker"  pattern="[a-zA-Z0-9/.& -]+" title="Please enter the data in correct format." class="form-control">

                                        </div>
                                    </div>

                                </div>

                            </div>

                            <!--company id-->

                            <div class="form-group" style="padding-top: 5px; padding-bottom: 5px;">

                                <div class="col-lg-6">

                                    <label class="col-lg-3 control-label" for="email">Email <h style="color: red;">*</h></label>

                                    <div class="col-lg-6">

                                        <input name="email" id="email" style=" height: 30px" type="text" class="form-control" required="" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Please enter the data in correct format.">


                                    </div></div>

                                <div class="col-lg-6">

                                    <label class="col-lg-3 control-label" for="notlp">No Phone <h style="color: red;">*</h></label>

                                    <div class="col-lg-6">

                                        <input style=" height: 30px;" type="text" class="form-control" id="notlp" name="notlp" required="" pattern="[0-9]{1,20}" title="Numeric Only, And Max 20 Digit" >

                                    </div>
                                </div>

                            </div>

                            <!--company id-->

                            <div class="form-group" style="padding-top: 5px; padding-bottom: 5px;">

                                <div class="col-lg-6">

                                    <label class="col-lg-3 control-label"  for="ktp">No KTP <h style="color: red;">*</h></label>

                                    <div class="col-lg-6">

                                        <input  style=" height: 30px;" type="textt" class="form-control" id="ktp" name="ktp" required="" pattern="[0-9]{1,20}" title="Numeric Only, And Max 20 Digit" >

                                    </div>

                                </div>

                                <div class="col-lg-6">

                                    <label class="col-lg-3 control-label" for="basic-datepicker">Join Date <h style="color: red;">*</h></label>

                                    <div class="col-lg-6">

                                        <div class="input-group">

                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                                            <input style="height: 30px;"type="date"  name="joindate" required="" pattern="[a-zA-Z0-9/.& -]+" title="Please enter the data in correct format." class="form-control">

                                        </div>
                                    </div>

                                </div>

                            </div>

                            <!--company id-->

                            <div class="form-group" style="padding-top: 5px; padding-bottom: 5px;">

                                <div class="col-lg-6">

                                    <label class="col-lg-3 control-label" for="selectcompany"> Cabang / Emp Office  <h style="color: red;">*</h></label>

                                    <div class="col-lg-6">

                                        <select name="selectcompany" id="selectcompany" class="fancy-select form-control"  required="">

                                            <option value="">Select</option>

                                            <?php foreach ($cmp as $a) { ?>

                                                <option value="<?php echo $a->f_code ?>|<?php echo $a->f_desc ?>"><?php echo $a->f_desc ?></option>

                                            <?php } ?>

                                        </select>

                                    </div>
                                </div>

                                <div class="col-lg-6">

                                    <label class="col-lg-3 control-label" for="selectdirectorate">Directorate</label>

                                    <div class="col-lg-6">

                                        <select name="selectdirectorate" id="selectdirectorate" class="fancy-select form-control" >

                                            <option value="0|0">Select</option>

                                            <?php foreach ($direct as $b) { ?>

                                                <option value="<?php echo $b->f_code ?>|<?php echo $b->f_desc ?>"><?php echo $b->f_desc ?> </option>

                                            <?php } ?>

                                        </select><?php echo form_error('f_deptid', "<span style='font-size: 10pt; color: red'>", "</span>") ?>

                                    </div></div>

                            </div>

                            <!--company id-->

                            <div class="form-group" style="padding-top: 5px; padding-bottom: 5px;">

                                <div class="col-lg-6">

                                    <label class="col-lg-3 control-label" for="selectdivisi">Divisi</label>

                                    <div class="col-lg-6">

                                        <select name="selectdivisi" id="selectdivisi" class="fancy-select form-control" >

                                            <option value="0|0">Select</option>

                                            <?php foreach ($div as $c) { ?>

                                                <option value="<?php echo $c->f_code ?>"><?php echo $c->f_desc ?></option>

                                            <?php } ?>

                                        </select><?php echo form_error('f_compid', "<span style='font-size: 10pt; color: red'>", "</span>") ?>

                                    </div></div>

                                <div class="col-lg-6">

                                    <label class="col-lg-3 control-label" for="selectdept">Departement</label>

                                    <div class="col-lg-6">

                                        <select name="selectdept" id="selectdept" class="fancy-select form-control" >

                                            <option value="0|0">Select</option>

                                            <?php foreach ($dept as $d) { ?>

                                                <option value="<?php echo $d->f_code ?>|<?php echo $d->f_desc ?>    "><?php echo $d->f_desc ?></option>

                                            <?php } ?>

                                        </select><?php echo form_error('f_deptid', "<span style='font-size: 10pt; color: red'>", "</span>") ?>

                                    </div></div>

                            </div>

                            <!--company id-->

                            <div class="form-group" style="padding-top: 5px; padding-bottom: 5px;">

                                <div class="col-lg-6">

                                    <label class="col-lg-3 control-label" for="selectposition">Position</label>

                                    <div class="col-lg-6">

                                        <select name="selectposition" id="selectposition" class="fancy-select form-control">

                                            <option value="0|0">Select</option>

                                            <?php foreach ($pst as $e) { ?>

                                                <option value="<?php echo $e->f_code ?>|<?php echo $e->f_desc ?>"><?php echo $e->f_desc ?></option>

                                            <?php } ?>

                                        </select><?php echo form_error('f_compid', "<span style='font-size: 10pt; color: red'>", "</span>") ?>

                                    </div></div>

                                <div class="col-lg-6">

                                    <label class="col-lg-3 control-label" for="selectgroup">Group</label>

                                    <div class="col-lg-6">

                                        <select name="selectgroup" id="selectgroup" class="fancy-select form-control">

                                            <option value="0|0">Select</option>

                                            <?php foreach ($grp as $f) { ?>

                                                <option value="<?php echo $f->f_code ?>|<?php echo $f->f_desc ?>"><?php echo $f->f_desc ?></option>

                                            <?php } ?>

                                        </select><?php echo form_error('f_deptid', "<span style='font-size: 10pt; color: red'>", "</span>") ?>

                                    </div></div>

                            </div>

                            <!--company id-->

                            <div class="form-group" style="padding-top: 5px; padding-bottom: 5px;">

                                <div class="col-lg-6">

                                    <label class="col-lg-3 control-label" for="selectcostcenter">Cost Center</label>

                                    <div class="col-lg-6">

                                        <select name="selectcostcenter" id="selectcostcenter" class="fancy-select form-control">

                                            <option value="0|0">Select</option>

                                            <?php foreach ($cc as $g) { ?>

                                                <option value="<?php echo $g->f_code ?>|<?php echo $g->f_desc ?>"><?php echo $g->f_desc ?></option>

                                            <?php } ?>

                                        </select><?php echo form_error('f_compid', "<span style='font-size: 10pt; color: red'>", "</span>") ?>

                                    </div></div>

                                <div class="col-lg-6">

                                    <label class="col-lg-3 control-label" for="selectarea">Emp Area</label>

                                    <div class="col-lg-6">

                                        <select name="slelctarea" id="selectarea" class="fancy-select form-control">

                                            <option value="0|0">Select</option>

                                            <?php foreach ($area as $h) { ?>

                                                <option value="<?php echo $h->f_code ?>|<?php echo $h->f_desc ?>"><?php echo $h->f_desc ?></option>

                                            <?php } ?>

                                        </select><?php echo form_error('f_deptid', "<span style='font-size: 10pt; color: red'>", "</span>") ?>

                                    </div></div>

                            </div>

                            <!--company id-->

                            
                            <!--company id-->





                            <div class="form-group" style="padding-top: 5px; padding-bottom: 5px;">

                                <div class="col-lg-6">

                                    <label class="col-lg-3 control-label" for="landscape">Landscape </label>

                                    <div class="col-lg-6">

                                        <input style=" height: 30px" type="text" class="form-control" id="landscape" pattern="[a-zA-Z0-9/.& -]+" title="Please enter the data in correct format." name="landscape">

                                    </div>
                                </div>

                                <div class="col-lg-6">

                                    <label class="col-lg-3 control-label" for="selectorgunit">Org Unit</label>

                                    <div class="col-lg-6">

                                        <select name="selectorgunit" id="selectorgunit" class="fancy-select form-control">

                                            <option value="0|0">Select</option>

                                            <?php foreach ($orgunit as $k) { ?>

                                                <option value="<?php echo $k->f_code ?>|<?php echo $k->f_desc ?>"><?php echo $k->f_desc ?></option>

                                            <?php } ?>

                                        </select><?php echo form_error('f_deptid', "<span style='font-size: 10pt; color: red'>", "</span>") ?>

                                    </div></div>

                            </div>

                            <!--company id-->





                            <div class="form-group" style="padding-top: 5px; padding-bottom: 5px;">

                                <div class="col-lg-6">

                                    <label class="col-lg-3 control-label" for="basic-datepicker">Terminate Date</label>

                                    <div class="col-lg-6">

                                        <div class="input-group">

                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                                            <input style="height: 30px;"type="date"  name="termintate"  class="form-control">

                                        </div>
                                    </div>

                                </div>

                                <div class="col-lg-6">

                                    <label class="col-lg-3 control-label" for="groupgrade">Group Grade</label>

                                    <div class="col-lg-6">

                                        <input style=" height: 30px" type="text" class="form-control" id="groupgrade" name="groupgrade">

                                    </div></div>

                            </div>

                            <!--company id-->





                            <div class="form-group" style="padding-top: 20px; padding-bottom: 5px;">

                                <div class="col-lg-6">

                                    <label class="col-lg-3 control-label" for=""></label>

                                    <div class="col-lg-6">

                                    </div></div>

                                <div class="col-lg-6">

                                    <label class="col-lg-3 control-label" for="f_deptid"></label>

                                    <div class="col-lg-6">
                                        <button style=" height: 30px" type="submit" class="btn btn-primary" id="simpan" value="Simpan" name="simpan"><i class=" fa fa-save"></i><span class="text"> Simpan</span> </button>

                                        <a style=" height: 30px" href="<?php echo base_url('content/read_um_datakaryawan') ?>" type="button" class="btn btn-warning"><i class=" fa fa-undo"></i> <span class="text">Cancel</span></a>


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

            var max_chars = 16;

            $('#ktp').keydown(function (e) {

                if ($(this).val().length >= max_chars) {

                    $(this).val($(this).val().substr(0, max_chars));

                }

            });



            $('#ktp').keyup(function (e) {

                if ($(this).val().length >= max_chars) {

                    $(this).val($(this).val().substr(0, max_chars));

                }

            });

        </script>

        <script type="text/javascript">

            var max_chars = 16;

            $('#nik').keydown(function (e) {

                if ($(this).val().length >= max_chars) {

                    $(this).val($(this).val().substr(0, max_chars));

                }

            });



            $('#nik').keyup(function (e) {

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

