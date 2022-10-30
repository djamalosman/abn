
<?php echo $this->session->flashdata('message'); ?>
<div class="row">
    <!-- .row -->
    <!-- .row start -->
    <div class=" col-lg-12">
        <div class="panel panel-danger toggle panelMove panelClose panelRefresh">
            <!-- Start .panel -->
            <div class="panel-heading" style="background-color : red;">
                <h4 class="panel-title">Iput Parameter System Process</h4>
            </div>
            <div class="panel-body">
                <form action="<?php echo base_url("content/create_sysproses") ?>" method="POST" class="form-horizontal group-border stripped" role="form">
                    <div class=" form-group" >
                        <div class="col-lg-2">
                            <label for="f_untuk" class="control-label">System Process </label>
                            <input name="sysname" type="text" class="form-control" id="sysname" style="height: 30px"placeholder="System Process" />
                        </div>

                        <div class="col-lg-2">
                            <label for="f_type" class="control-label">PHP / BAT</label>
                            <input name="string" type="text" class="form-control" style="height: 30px" id="string" placeholder="PHP / BAT"/>
                        </div>
                        <div class="col-lg-2">
                            <label for="f_desc" class="control-label">Program / Path</label>
                            <input name="string1" id="string1" style="height: 30px"   type="text" class="form-control" id="text" placeholder="Program / Path">
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
                                        <th>Action</th>
                                        <th>ID</th>
                                        <th >System Process</th>
                                        <th>PHP / BAT</th>
                                        <th>Program / Path</th>
                                        

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($param as $item) { ?>
                                        <tr>			
                                            <td class="text-center" >
                                                <!--<div class="checkbox-custom" style="margin-left: 20px;">-->
                                                <input type="checkbox"  id="checkbox1.<?php echo $item->f_id ?>" value="<?php echo $item->f_id ?>" name="idnya[]" >
                                                <!--<label for="checkbox1.<?php echo $item->f_id ?>"></label>-->
                                                <!--</div>-->
                                                <!--<input type="checkbox" />-->
                                            </td>
                                            <td><a href="<?php echo base_url('content/sys_process_edit/').$item->f_id?>"><i class="fa fa-pencil"></i></a></td>
                                            <td><?php echo $item->f_id ?></td>
                                            <td><?php echo $item->f_sysname ?></td>
                                            <td><?php echo $item->f_string ?></td>
                                            <td><?php echo $item->f_string1 ?></td>
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