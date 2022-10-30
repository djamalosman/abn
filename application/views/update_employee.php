<html>

    <body>

        <div class="row">

            <div class="col-lg-12">

                <div class="panel panel-danger toggle panelMove panelClose panelRefresh">

                    <div class="panel-heading" style="background-color: red;">

                        <h4 class="panel-title"><i class="fa fa-users"></i>Form Update Data Karyawan</h4>

                    </div>

                    <div class="panel-body pt0 pb0">

                        <form action="<?php echo base_url('employee/update_um_datakaryawan_process') ?>" method="POST" class="form-horizontal group-border stripped">

                            <div class="form-group" style="padding-top: 5px; padding-bottom: 5px;">

                                <div class="col-lg-6">

                                    <label class="col-lg-3 control-label" for="nik">NIK</label>

                                    <div class="col-lg-6">

                                        <input readonly="true" value="<?php echo $employee->nik; ?>"  style=" height: 30px;" type="text" class="form-control" id="nik" name="nik" required="" pattern="[0-9]{1,20}" title="Numeric Only, And Max 20 Digit">

                                        <?php echo form_error('f_compid', "<span style='font-size: 10pt; color: red'>", "</span>") ?>

                                    </div>

                                </div>

                                <div class="col-lg-6">

                                    <label class="col-lg-3 control-label" for="nama">Name</label>

                                    <div class="col-lg-6">

                                        <input id="nama" value="<?php echo $employee->full_name; ?>" name="nama" style=" height: 30px"  type="text" class="form-control" required="">

                                        <?php echo form_error('f_empname', "<span style='font-size: 10pt; color: red'>", "</span>") ?>

                                    </div></div>

                            </div>

                            <!--nama-->

                            <div class="form-group" style="padding-top: 5px; padding-bottom: 5px;">

                                <div class="col-lg-6">

                                    <label class="col-lg-3 control-label" for="gender">Gender</label>

                                    <div class="col-lg-6">

                                        <div class="radio-custom radio-inline">
                                            <input type="radio" name="gender" id="radio4" 
                                            <?php
                                            if ($employee->gender == 'laki-laki') {
                                                echo 'checked';
                                            } else {
                                                echo '';
                                            }
                                            ?>     value="laki-laki" class="rb1" required="" >
                                            <label for="radio4">Male</label>

                                        </div>

                                        <div class="radio-custom radio-inline">
                                            <input type="radio" name="gender" 
                                            <?php
                                            if ($employee->gender == 'perempuan') {
                                                echo 'checked';
                                            } else {
                                                echo '';
                                            }
                                            ?>    
                                                   value="perempuan" class="rb1" id="radio5" required="">

                                            <label for="radio5">Female</label>

                                        </div><?php echo form_error('f_compid', "<span style='font-size: 10pt; color: red'>", "</span>") ?>

                                    </div></div>

                                <div class="col-lg-6">

                                    <label class="col-lg-3 control-label" for="basic-datepicker">Birth Date <span ><i class="fa fa-calendar"></i></span>
                                    </label>

                                    <div class="col-lg-6">
                                        <input style="height: 30px;"type="date" value="<?php echo $employee->birth_date; ?>"  name="multiple-datepicker"  class="form-control">
                                    </div>

                                </div>

                            </div>

                            <!--company id-->

                            <div class="form-group" style="padding-top: 5px; padding-bottom: 5px;">

                                <div class="col-lg-6">

                                    <label class="col-lg-3 control-label" for="email">Email</label>

                                    <div class="col-lg-6">

                                        <input name="email" id="email" style=" height: 30px" value="<?php echo $employee->email; ?>" type="text" class="form-control" required="" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">


                                    </div></div>

                                <div class="col-lg-6">

                                    <label class="col-lg-3 control-label" for="notlp">No Phone</label>

                                    <div class="col-lg-6">

                                        <input style=" height: 30px;" type="text" class="form-control" id="notlp" name="notlp" value="<?php echo $employee->no_tlp; ?>" required="" pattern="[0-9]{1,20}" title="Numeric Only, And Max 20 Digit" >

                                    </div></div>

                            </div>

                            <!--company id-->

                            <div class="form-group" style="padding-top: 5px; padding-bottom: 5px;">

                                <div class="col-lg-6">

                                    <label class="col-lg-3 control-label"  for="ktp">No KTP</label>

                                    <div class="col-lg-6">

                                        <input  style=" height: 30px;" type="textt" class="form-control" id="ktp" name="ktp" required="" pattern="[0-9]{1,20}" value="<?php echo $employee->no_ktp; ?>" title="Numeric Only, And Max 20 Digit" >

                                    </div>

                                </div>

                                <div class="col-lg-6">

                                    <label class="col-lg-3 control-label" for="basic-datepicker">Join Date <span ><i class="fa fa-calendar"></i></span>
                                    </label>

                                    <div class="col-lg-6">

                                        <input style="height: 30px;"type="date" value="<?php echo $employee->join_date; ?>"  name="joindate"  class="form-control">

                                    </div>

                                </div>

                            </div>

                            <!--company id-->

                            <div class="form-group" style="padding-top: 5px; padding-bottom: 5px;">

                                <div class="col-lg-6">

                                    <label class="col-lg-3 control-label" for="selectcompany"> Cabang / Emp Office</label>

                                    <div class="col-lg-6">

                                        <select name="selectcompany" id="selectcompany1" class="fancy-select form-control" required="">

                                            <option value="">Select</option>

                                            <?php foreach ($cmp as $a) { ?>

                                                <option value="<?php echo $a->f_code ?>|<?php echo $a->f_desc ?>"><?php echo $a->f_desc ?></option>

                                            <?php } ?>

                                        </select>

                                    </div></div>

                                <div class="col-lg-6">

                                    <label class="col-lg-3 control-label" for="selectdirectorate">Directorate</label>

                                    <div class="col-lg-6">

                                        <select name="selectdirectorate" id="selectdirectorate" class="fancy-select form-control" required="">

                                            <option value="0|0">Select</option>

                                            <?php foreach ($direct as $b) { ?>

                                                <option value="<?php echo $b->f_code ?>|<?php echo $b->f_desc ?>"><?php echo $b->f_desc ?> </option>

                                            <?php } ?>

                                        </select>
                                    </div></div>

                            </div>

                            <!--company id-->

                            <div class="form-group" style="padding-top: 5px; padding-bottom: 5px;">

                                <div class="col-lg-6">

                                    <label class="col-lg-3 control-label" for="selectdivisi">Divisi</label>

                                    <div class="col-lg-6">

                                        <select name="selectdivisi" id="selectdivisi" class="fancy-select form-control" required="">

                                            <option value="0|0">Select</option>

                                            <?php foreach ($div as $c) { ?>

                                                <option value="<?php echo $c->f_code ?>"><?php echo $c->f_desc ?></option>

                                            <?php } ?>

                                        </select><?php echo form_error('f_compid', "<span style='font-size: 10pt; color: red'>", "</span>") ?>

                                    </div></div>

                                <div class="col-lg-6">

                                    <label class="col-lg-3 control-label" for="selectdept">Departement</label>

                                    <div class="col-lg-6">

                                        <select name="selectdept" id="selectdept" class="fancy-select form-control" required="">

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

                                        <select name="selectposition" id="selectposition" class="fancy-select form-control"required="">

                                            <option value="0|0">Select</option>

                                            <?php foreach ($pst as $e) { ?>

                                                <option value="<?php echo $e->f_code ?>|<?php echo $e->f_desc ?>"><?php echo $e->f_desc ?></option>

                                            <?php } ?>

                                        </select><?php echo form_error('f_compid', "<span style='font-size: 10pt; color: red'>", "</span>") ?>

                                    </div></div>

                                <div class="col-lg-6">

                                    <label class="col-lg-3 control-label" for="selectgroup">Group</label>

                                    <div class="col-lg-6">

                                        <select name="selectgroup" id="selectgroup" class="fancy-select form-control"required="">

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

                                        <select name="selectcostcenter" id="selectcostcenter1" class="fancy-select form-control"required="">

                                            <option value="0|0">Select</option>

                                            <?php foreach ($cc as $g) { ?>

                                                <option value="<?php echo $g->f_code ?>|<?php echo $g->f_desc ?>"><?php echo $g->f_desc ?></option>

                                            <?php } ?>

                                        </select><?php echo form_error('f_compid', "<span style='font-size: 10pt; color: red'>", "</span>") ?>

                                    </div></div>

                                <div class="col-lg-6">

                                    <label class="col-lg-3 control-label" for="selectarea">Emp Area</label>

                                    <div class="col-lg-6">

                                        <select name="slelctarea" id="selectarea1" class="fancy-select form-control"required="">

                                            <option value="0|0">Select</option>

                                            <?php foreach ($area as $h) { ?>

                                                <option value="<?php echo $h->f_code ?>|<?php echo $h->f_desc ?>"><?php echo $h->f_desc ?></option>

                                            <?php } ?>

                                        </select><?php echo form_error('f_deptid', "<span style='font-size: 10pt; color: red'>", "</span>") ?>

                                    </div></div>

                            </div>

                            <!--company id-->

                            <!--<div class="form-group" style="padding-top: 5px; padding-bottom: 5px;">

                                <div class="col-lg-6">

                                    <label class="col-lg-3 control-label" for="selectoffice">Emp Office</label>

                                    <div class="col-lg-6">

                                        <select name="selectoffice" id="selectoffice1" class="fancy-select form-control"required="">

                                            <option value="0|0">Select</option>

                                            <?php foreach ($office as $i) { ?>

                                                <option value="<?php echo $i->f_code ?>|<?php echo $i->f_desc ?>"><?php echo $i->f_desc ?></option>

                                            <?php } ?>

                                        </select><?php echo form_error('f_compid', "<span style='font-size: 10pt; color: red'>", "</span>") ?>

                                    </div></div>

                                <div class="col-lg-6">

                                    <label class="col-lg-3 control-label" for="selectstatus">Emp Status</label>

                                    <div class="col-lg-6">

                                        <select name="selectstatus" id="selectstatus1" class="fancy-select form-control"required="">

                                            <option value="0|0">Select</option>

                                            <?php foreach ($status as $j) { ?>

                                                <option value="<?php echo $j->f_code ?>|<?php echo $j->f_desc ?>"><?php echo $j->f_desc ?></option>

                                            <?php } ?>

                                        </select>
                                    </div></div>

                            </div>-->

                            <!--company id-->





                            <div class="form-group" style="padding-top: 5px; padding-bottom: 5px;">

                                <div class="col-lg-6">

                                    <label class="col-lg-3 control-label" for="landscape">Landscape </label>

                                    <div class="col-lg-6">

                                        <input style=" height: 30px" type="text" value="<?php echo $employee->landscape; ?>" class="form-control" id="landscape" name="landscape">

                                        <?php echo form_error('f_compid', "<span style='font-size: 10pt; color: red'>", "</span>") ?>

                                    </div></div>

                                <div class="col-lg-6">

                                    <label class="col-lg-3 control-label" for="selectorgunit">Org Unit</label>

                                    <div class="col-lg-6">

                                        <select name="selectorgunit" id="selectorgunit1" class="fancy-select form-control"required="">

                                            <option value="0|0">Select</option>

                                            <?php foreach ($orgunit as $k) { ?>

                                                <option value="<?php echo $k->f_code ?>|<?php echo $k->f_desc ?>"><?php echo $k->f_desc ?></option>

                                            <?php } ?>

                                        </select><?php echo form_error('f_deptid', "<span style='font-size: 10pt; color: red'>", "</span>") ?>

                                    </div>
                                </div>

                            </div>

                            <!--company id-->





                            <div class="form-group" style="padding-top: 5px; padding-bottom: 5px;">

                                <div class="col-lg-6">

                                    <label class="col-lg-3 control-label" for="basic-datepicker">Terminate Date <span ><i class="fa fa-calendar"></i></span>
                                    </label>

                                    <div class="col-lg-6">
                                        <input style="height: 30px;"type="date"  name="termintate" value = "<?php echo $employee->termintate_date; ?>" class="form-control">
                                    </div>

                                </div>

                                <div class="col-lg-6">

                                    <label class="col-lg-3 control-label" for="groupgrade">Group Grade</label>

                                    <div class="col-lg-6">

                                        <input style=" height: 30px" type="text" class="form-control" id="groupgrade" value="<?php echo $employee->group_grade_code; ?>" name="groupgrade" >

                                        <?php echo form_error('f_deptid', "<span style='font-size: 10pt; color: red'>", "</span>") ?>

                                    </div></div>

                            </div>
                            <!--company id-->





                            <div class="form-group" style="padding-top: 20px; padding-bottom: 5px;">

                                <div class="col-lg-6">

                                    
                                </div>

                                <div class="col-lg-6">

                                    <label class="col-lg-3 control-label" for="f_deptid"></label>

                                    <div class="col-lg-6">
                                        <button style=" height: 30px" type="submit" class="btn btn-primary" id="simpan" value="Simpan" name="simpan"><i class=" fa fa-save"></i><span class="text"> Simpan</span> </button>

                                        <a style=" height: 30px" href="<?php echo base_url('employee/index') ?>" type="button" class="btn btn-warning"><i class=" fa fa-undo"></i> <span class="text">Cancel</span></a>


                                        <?php echo form_error('f_deptid', "<span style='font-size: 10pt; color: red'>", "</span>") ?>

                                    </div></div>

                            </div>

                            <!--company id-->

                        </form>

                        <?php // echo form_open('content/create_um_datakaryawan_process', 'id="swaz-confirm" class="form-horizontal group-border stripped"');    ?>

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

            $(".rb1").change(function () {
                $(".rb1").prop('checked', fales);
                $(this).prop('checked', true);
            });

            $("#selectcompany1").val('<?php echo $employee->company_id ?>|<?php echo $employee->company_desc ?>');
                $("#selectorgunit1").val('<?php echo $employee->org_unit_id ?>|<?php echo $employee->org_unit_desc ?>');
                    $("#selectstatus1").val('<?php echo $employee->emp_status_code ?>|<?php echo $employee->emp_status_desc ?>');
                        $("#selectoffice1").val('<?php echo $employee->emp_office ?>|<?php echo $employee->emp_office_desc ?>');
                            $("#selectarea1").val('<?php echo $employee->emp_area ?>|<?php echo $employee->emp_area_desc ?>');
                                $("#selectcostcenter1").val('<?php echo $employee->cost_center ?>|<?php echo $employee->emp_area_desc ?>');
                                    //console.log('<?php // echo $employee->spv_id         ?>|<?php // echo $employee->spv_name         ?>');

        </script>

    </body>

</html>

