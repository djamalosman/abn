
<?php echo $this->session->flashdata('message'); ?>
<div class="row">
    <!-- .row -->
    <!-- .row start -->
    <div class=" col-lg-12">
        <div class="panel panel-default toggle panelMove panelClose panelRefresh">
            <!-- Start .panel -->
            <div class="panel-heading">
                <h4 class="panel-title">Edit Parameter System Process</h4>
            </div>
            <div class="panel-body">
                <form action="<?php echo base_url("content/create_sysproses") ?>" method="POST" class="form-horizontal group-border stripped" role="form">
                    <div class=" form-group" >
                        <div class="col-lg-2">
                            <label for="f_untuk" class="control-label">System Process</label>
                            <input name="sysname" type="text" class="form-control" id="sysname" value="<?php echo $param->f_sysname; ?>" style="height: 30px"placeholder="System Name" />
                            <input name="id" type="hidden" class="form-control" id="id" value="<?php echo $param->f_id; ?>" style="height: 30px"placeholder="System Name" />
                        </div>

                        <div class="col-lg-2">
                            <label for="f_type" class="control-label">PHP / BAT</label>
                            <input name="string" type="text" class="form-control" style="height: 30px" value="<?php echo $param->f_string; ?>"  id="string" placeholder="String"/>
                        </div>
                        <div class="col-lg-2">
                            <label for="f_desc" class="control-label">Program / Path</label>
                            <input name="string1" id="string1" style="height: 30px"   type="text" class="form-control" id="text" value="<?php echo $param->f_string1; ?>"  placeholder="String 1">
                        </div>
                        
                        <div class="col-lg-3">
                            <!-- col-lg-6 start here -->
                            <label for="input" class="control-label"></label>
                            <button type="submit" name="edit" id="edit" style="margin-top: 25px; height: 30px;" class="btn btn-success mr5 mb10" ><i class="fa fa-save"></i>  <span class="text">Update</span></button>
                            <!--<input type="text" class="form-control" id="text" placeholder="Input">-->
                        </div>
                    </div>
                   
                </form> 




            </div>
        </div>
        <!-- End .panel -->
    </div>

</div>