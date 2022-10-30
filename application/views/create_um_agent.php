<html>
    <body>
        <!--        <div class="container-fluid">
        <?php echo form_open('content/create_um_agent_process', 'id="swaz-confirm" class="form-horizontal"'); ?>
                    <div class="row">
                        <div class="col-md-6">
                              <div class="row form-group">
                                 <div class="col col-md-3">
                                     <label for="id_agen">ID Agen</label>
                                 </div>
                                 <div class="col-12 col-md-9">
                                     <input type="text" class="form-control" id="id_agen" name="id_agen">
        <?php echo form_error('id_agen', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                                 </div>
                             </div> 
        
                            <div class="row form-group" >
                                <div class="col col-md-3">
                                    <label for="nik">NIK</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" class="form-control" id="nik" name="nik">
        <?php echo form_error('nik', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                                </div>
                            </div>
        
                            <div class="row form-group" >
                                <div class="col col-md-3">
                                    <label for="agent_name">Nama Agen</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" class="form-control" id="agent_name" name="agent_name">
        <?php echo form_error('agent_name', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                                </div>
                            </div>
        
                            <div class="row form-group" >
                                <div class="col col-md-3">
                                    <label for="id_branch">ID Cabang</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" class="form-control" id="id_branch" name="id_branch">
        <?php echo form_error('id_branch', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                                </div>
                            </div>
        
                            <div class="row form-group" >
                                <div class="col col-md-3">
                                    <label for="username">Username</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" class="form-control" id="username" name="username">
        <?php echo form_error('username', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                                </div>
                            </div>
        
                            <div class="row form-group" >
                                <div class="col col-md-3">
                                    <label for="password">password</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" class="form-control" id="password" name="password">
        <?php echo form_error('password', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6"> 
        
                            <div class="row form-group" >
                                <div class="col col-md-3">
                                    <label for="email">Email</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="email" class="form-control" id="email" name="email">
        <?php echo form_error('email', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                                </div>
                            </div>
        
                            <div class="row form-group" >
                                <div class="col col-md-3">
                                    <label for="no_hp">No. HP</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" class="form-control" id="no_hp" name="no_hp">
        <?php echo form_error('no_hp', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                                </div>
                            </div>
        
                            <div class="row form-group" >
                                <div class="col col-md-3">
                                    <label for="imei">Nomor IMEI</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" class="form-control" id="imei" name="imei">
        <?php echo form_error('imei', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                                </div>
                            </div>
        
                            <div class="row form-group" >
                                <div class="col col-md-3">
                                    <label for="phone_sn">Serial Number HP</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" class="form-control" id="phone_sn" name="phone_sn">
        <?php echo form_error('phone_sn', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                                </div>
                            </div>
        
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="">User Dep Head</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select name="userdep" class="form-control">
                                        <optgroup label='User Dep Head'>
                                            <option selected disabled style="display: none;">-- pilih user Dep Head --</option>
        <?php foreach ($userdep as $item) { ?>
                                                            <option value="<?php echo $item->f_email ?>">
            <?php echo $item->f_userid . ' - ' . $item->f_username ?></option>
        <?php } ?>
                                        </optgroup>
                                    </select>
       
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="submit" value="Simpan" class="btn btn-primary" id="btn-submit"/>
                    <span id='status'></status>
                        </form>
                </div>-->
        <div class="row">
            <div class="col-lg-12">
                <!-- col-lg-12 start here -->
                <div class="panel panel-default plain toggle panelMove panelClose panelRefresh">
                    <!-- Start .panel -->
                    <div class="panel-heading">
                        <h4 class="panel-title">Data Employe</h4>
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="<?php echo base_url('content/create_proses_collector '); ?>" class="form-horizontal group-border stripped" >
                            <div class="form-group">
                               
                                
                                <div class="col-lg-12">
                                    <table id="responsive" class="table table-striped table-bordered" >
                                        <thead>
                                            <tr>
                                                <!--<th class="text-center"><button type="submit" class="btn btn-danger px-1 py-0"><i class="fa fa-trash-o"></i></button></th>-->
                                                <th >Pilih</th>
                                                <th style=" min-width: 120px">Nik</th>
                                                <th style=" min-width: 120px">Name</th>
                                                <th style=" min-width: 120px">Gender</th>
                                                <th style=" min-width: 120px">No KTP</th>
                                                <th style=" min-width: 120px">No Telphone</th>
                                                <th style=" min-width: 120px">Position</th>
                                                <th style=" min-width: 120px">Join Date</th>
                                                <th style=" min-width: 120px">Birth Date</th>
                                                <th style=" min-width: 120px">Email</th>
                                                <th style=" min-width: 120px">Company</th>
                                                <th style=" min-width: 120px">Cost Center</th>
                                                <th style=" min-width: 120px">Dept</th>
                                                <th style=" min-width: 120px">Direct</th>
                                                <th style=" min-width: 120px">Div</th>
                                                <th style=" min-width: 120px">Emp Area</th>
                                                <th style=" min-width: 120px">Emp Office</th>
                                                <th style=" min-width: 120px">Emp Status</th>
                                                <th style=" min-width: 120px">Landscape</th>
                                                <th style=" min-width: 120px">Org Unit</th>
                                                <th style=" min-width: 120px">Status Date</th>
                                                <th style=" min-width: 150px">Terminante Date</th>
                                                <th style=" min-width: 120px">Group</th>
                                                <th style=" min-width: 120px">Group Grade</th>
                                                <th style=" min-width: 120px">SPV</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php foreach ($karyawan as $item) { ?>
                                                <tr>
                                                    <td class="text-center" >
                                                        <!--<div class="checkbox-custom" style="margin-left: 20px;">-->
                                                        <input type="checkbox"  id="checkbox1.<?php echo $item->f_id ?>" value="<?php echo $item->f_id ?>" name="idnya[]" >
                                                        <!--<label for="checkbox1.<?php echo $item->f_id ?>"></label>-->
                                                        <!--</div>-->
                                                    </td>

                                                    <td><?php echo $item->f_nik ?></td>
                                                    <td><?php echo $item->f_full_name ?></td>
                                                    <td><?php echo $item->f_gender ?></td>
                                                    <td><?php echo $item->f_no_ktp ?></td>
                                                    <td><?php echo $item->f_no_tlp ?></td>
                                                    <td><?php echo $item->f_position_desc ?></td>
                                                    <td><?php echo $item->f_join_date ?></td>
                                                    <td><?php echo $item->f_birth_date ?></td>
                                                    <td><?php echo $item->f_email ?></td>
                                                    <td><?php echo $item->f_company_desc ?></td>
                                                    <td><?php echo $item->f_cost_center ?></td>
                                                    <td><?php echo $item->f_dept_desc ?></td>
                                                    <td><?php echo $item->f_directorate_desc ?></td>
                                                    <td><?php echo $item->f_div_desc ?></td>
                                                    <td><?php echo $item->f_emp_area_desc ?></td>
                                                    <td><?php echo $item->f_emp_office_desc ?></td>
                                                    <td><?php echo $item->f_emp_status_desc ?></td>
                                                    <td><?php echo $item->f_landscape ?></td>
                                                    <td><?php echo $item->f_org_unit_desc ?></td>
                                                    <td><?php echo $item->f_status_date ?></td>
                                                    <td><?php echo $item->f_termintate_date ?></td>
                                                    <td><?php echo $item->f_group_desc ?></td>
                                                    <td><?php echo $item->f_group_grade_code ?></td>
                                                    <td><?php echo $item->f_spv_name ?></td>

                                                </tr>
                                            <?php } ?>

                                        </tbody>
                                    </table>

                                </div>
                                
                                 <div class="col-lg-2">
                                </div>
                                <div class="col-lg-3">
                                    <!-- col-lg-6 start here -->
                                    <label for="input" class="control-label"></label>
                                    <button type="submit" style="margin-top: 25px; height: 30px;" class="btn btn-success mr5 mb10" ><i class="fa fa-save"></i>  <span class="text">Simpan</span></button>
                                    <a href="<?php echo base_url('content/read_um_agent')?>" type="button" style="margin-top: 25px; height: 30px;" class="btn btn-warning mr5 mb10" ><i class="fa fa-undo"></i>  <span class="text">Cancel</span></a>
                                    <!--<input type="text" class="form-control" id="text" placeholder="Input">-->
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
                <!-- End .panel -->
            </div>

        </div>


    </body>
</html>
