
<?php echo $this->session->flashdata('message'); ?>
<div class="row">
    <!-- .row -->
    <!-- .row start -->
    <div class=" col-lg-12">
        <div class="panel panel-default toggle panelMove panelClose panelRefresh">
            <!-- Start .panel -->
            <div class="panel-heading">
                <h4 class="panel-title">Master Param</h4>
            </div>
            <div class="panel-body">
                <form action="<?php echo base_url("content/create_schproses") ?>" method="POST" class="form-horizontal group-border stripped" role="form">
                    <div class=" form-group" >
                        <div class="col-lg-3">
                            <label for="f_untuk" class="control-label">Process Name </label>
                            <input name="processname" value="<?php echo $param->f_processname ;?>" type="text" class="form-control" id="processname" style="height: 30px"placeholder="Process Name" />
                            <input name="processid" value="<?php echo $param->f_processid ;?>" type="hidden" class="form-control" id="processname" style="height: 30px"placeholder="Process Name" />
                        </div>

                        <div class="col-lg-3">
                            <label for="f_type" class="control-label">Program Type</label>
                            <input name="programtype" value="<?php echo $param->f_progtype ;?>" type="text" class="form-control" style="height: 30px" id="programtype" placeholder="Program Type"/>
                        </div>
                        <div class="col-lg-3">
                            <label for="f_desc" class="control-label">Time Start</label>
                            <input name="timestart" value="<?php echo $param->f_timestart ;?>" id="timestart" style="height: 30px"   type="text" class="form-control" id="text" placeholder="Time Start">
                        </div>
                        <div class="col-lg-3">
                            <label for="f_untuk" class="control-label">Max Run</label>
                            <input name="maxrun" value="<?php echo $param->f_maxrun ;?>" type="number" class="form-control" id="maxrun" style="height: 30px"placeholder="Max Run" />
                        </div>

                        <div class="col-lg-3">
                            <label for="f_type" class="control-label">Counter Run</label>
                            <input name="counterrun" value="<?php echo $param->f_countrun ;?>" type="number" class="form-control" style="height: 30px" id="counterrun" placeholder="Counter Run"/>
                        </div>
                        
                        <div class="col-lg-3">
                            <label for="timestop" class="control-label">Time Stop</label>
                            <input name="timestop" value="<?php echo $param->f_timestop ;?>" id="timestop" style="height: 30px"   type="text" class="form-control" id="text" placeholder="Time Stop">
                        </div>
                        <div class="col-lg-3">
                            <label for="f_desc" class="control-label">Status Done</label>
                            <input name="statusdone" value="<?php echo $param->f_stsdone ;?>" id="statusdone" style="height: 30px"   type="number" class="form-control" id="text" placeholder="Status Done">
                        </div>  
                        <div class="col-lg-3">
                            <label for="f_desc" class="control-label">Active</label>
                            <input name="active" value="<?php echo $param->f_active ;?>" id="active" style="height: 30px"   type="number" class="form-control" id="text" placeholder="Active">
                        </div>
                        <div class="col-lg-3">
                            <!-- col-lg-6 start here -->
                            <label for="input" class="control-label"></label>
                            <button name="edit" id="edit" type="submit" style="margin-top: 25px; height: 30px;" class="btn btn-success mr5 mb10" ><i class="fa fa-save"></i>  <span class="text">Update</span></button>
                            <!--<input type="text" class="form-control" id="text" placeholder="Input">-->
                        </div>
                        
                    </div>
                    
                </form> 




            </div>
        </div>
        <!-- End .panel -->
    </div>

</div>