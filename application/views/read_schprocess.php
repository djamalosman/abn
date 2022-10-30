
<?php echo $this->session->flashdata('message'); ?>
<div class="row">
    <!-- .row -->
    <!-- .row start -->
    <div class=" col-lg-12">
        <div class="panel panel-danger toggle panelMove panelClose panelRefresh">
            <!-- Start .panel -->
            <div class="panel-heading" style="background-color : red;">
                <h4 class="panel-title">Scheduller Parameter Process</h4>
            </div>
            <div class="panel-body">
                <form action="<?php echo base_url("content/create_schproses") ?>" method="POST" class="form-horizontal group-border stripped" role="form">
                    <div class=" form-group" >
                        <div class="col-lg-3">
                            <label for="f_untuk" class="control-label">Process Name </label>
                            <input name="processname" type="text" class="form-control" id="processname" style="height: 30px"placeholder="Process Name" />
                        </div>

                        <div class="col-lg-3">
                            <label for="f_type" class="control-label">Program Type</label>
                            <input name="programtype" type="text" class="form-control" style="height: 30px" id="programtype" placeholder="Program Type"/>
                        </div>
                        <div class="col-lg-3">
                            <label for="f_desc" class="control-label">Time Start</label>
                            <input name="timestart" id="timestart" style="height: 30px"   type="text" class="form-control" id="text" placeholder="Time Start">
                        </div>
                        <div class="col-lg-3">
                            <label for="f_untuk" class="control-label">Max Run</label>
                            <input name="maxrun" type="number" class="form-control" id="maxrun" style="height: 30px"placeholder="Max Run" />
                        </div>

                        <div class="col-lg-3">
                            <label for="f_type" class="control-label">Counter Run</label>
                            <input name="counterrun" type="number" class="form-control" style="height: 30px" id="counterrun" placeholder="Counter Run"/>
                        </div>
                        
                        <div class="col-lg-3">
                            <label for="timestop" class="control-label">Time Stop</label>
                            <input name="timestop" id="timestop" style="height: 30px"   type="text" class="form-control" id="text" placeholder="Time Stop">
                        </div>
                        <div class="col-lg-3">
                            <label for="f_desc" class="control-label">Status Done</label>
                            <input name="statusdone" id="statusdone" style="height: 30px"   type="number" class="form-control" id="text" placeholder="Status Done">
                        </div>  
                        <div class="col-lg-3">
                            <label for="f_desc" class="control-label">Active</label>
                            <input name="active" id="active" style="height: 30px"   type="number" class="form-control" id="text" placeholder="Active">
                        </div>
                        <div class="col-lg-3">
                            <!-- col-lg-6 start here -->
                            <label for="input" class="control-label"></label>
                            <button type="submit" name="simpan" id="simpan" style="margin-top: 25px; height: 30px;" class="btn btn-success mr5 mb10" ><i class="fa fa-save"></i>  <span class="text">Simpan</span></button>
                            <!--<input type="text" class="form-control" id="text" placeholder="Input">-->
                        </div>
                        
                    </div>
                    <div class="form-group">
                        <div class="col-lg-12">
                            <!--table baru-->
                            <table id="responsive" class="table table-bordered table-striped">
                                <thead>
                                    <tr>	
                                        <th><button type="submit" name="delete" id="delete" class="btn btn-danger px-1 py-0"><i  class="fa fa-trash-o"></i></button></th>
                                        <th>ID</th>
                                        <th>Action</th>
                                        <th>Process Name</th>
                                        <th>Program Type</th>
                                        <th>Time Start</th>
                                        <th>Max Run</th>
                                        <th>Counter Run </th>
                                        <th>Time Stop </th>
                                        <th>Status Done </th>
                                        <th>Active </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($param as $item) { ?>
                                        <tr>			
                                            <td class="text-center" >
                                                <!--<div class="checkbox-custom" style="margin-left: 20px;">-->
                                                <input type="checkbox"  id="checkbox1.<?php echo $item->f_processid ?>" value="<?php echo $item->f_processid ?>" name="idnya[]" >
                                                <!--<label for="checkbox1.<?php echo $item->f_id ?>"></label>-->
                                                <!--</div>-->
                                                <!--<input type="checkbox" />-->
                                            </td>
                                            <td><a href="<?php echo base_url('content/sch_process_edit/').$item->f_processid?>"><i class="fa fa-pencil"></i></a></td>
                                            <td><?php echo $item->f_processid ?></td>
                                            <td><?php echo $item->f_processname ?></td>
                                            <td><?php echo $item->f_progtype ?></td>
                                            <td><?php echo $item->f_timestart ?></td>
                                            <td><?php echo $item->f_maxrun ?></td>
                                            <td><?php echo $item->f_countrun ?></td>
                                            <td><?php echo $item->f_timestop ?></td>
                                            <td><?php echo $item->f_stsdone ?></td>
                                            <td><?php echo $item->f_active ?></td>
                                        </tr>                            
                                    <?php } ?>
                                </tbody>
                            </table> 
                        </div>

                    </div>

                </form> 




            </div>
        </div>
        <!-- End .panel -->
    </div>

</div>
<br>
<br>
<br>
<br>