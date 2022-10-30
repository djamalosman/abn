<!--<script src="http://maps.googleapis.com/maps/api/js?v=3&sensor=false"></script>-->
<script src="//maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD7_f6fTQagVISVELyzcIML6i5ea3_kTeI"></script>
<script src="https://maps.googleapis.com/maps/api/js"></script>



<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default plain toggle panelMove panelClose panelRefresh">
            <div class="panel-heading"style = "background-color:red;">
                <h4 class="panel-title">Audit Trail Menu Data Employee</h4>
            </div>
            <div class="panel-body">
                <div class="col-lg-12">
                    <form action="<?php echo base_url('AuditTrail'); ?>" method="POST">
                        <div class="col-md-2">
                            <select style=" height: 30px" id="tabel" required=""  name="tabel" class="fancy-select form-control">
                            <option value="">Select Collector</option>
                                <?php foreach ($tabel as $item) { ?>
                                <option  value="<?php echo $item->f_value ?>"><?php echo $item->f_desc ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <div style=" height: 30px" class="input-daterange input-group">
                                <span style=" height: 30px" class="input-group-addon" style=''><i
                                        class="fa fa-calendar"></i></span>
                                <input  style=" height: 30px" required="" autocomplete="off" type="text" class="form-control" name="start" />
                                <span style=" height: 30px" class="input-group-addon">to</span>
                                <input  style=" height: 30px" required="" type="text" autocomplete="off" class="form-control" name="end" />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <select style=" height: 30px" id="action" required="" name="action" class="fancy-select form-control">
                            <option value="">Select Collector</option>
                                <?php foreach ($action as $key) { ?>
                                <option  value="<?php echo $key->f_value ?>"><?php echo $key->f_desc ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div style=" height: 30px" class="col-md-1">
                            <button type="submit" class="btn btn-primary"
                                style="border-radius: 0px 10px 0px 0px; height: 30px;"><i class="fa fa-search"
                                    aria-hidden="true"></i></button>
                        </div>
                    </form>
                </div>
                <br>
                <br>
                <br>
                <br>
                <div class="col-lg-12">
                    <table id="example" class="table nowrap table-bordered" style="width:100%;border: 2px;">
                        <thead>
                            <tr>
                                <th style=" min-width: 120px">Action</th>                              
                                <th style=" min-width: 120px">Status</th>
                                <th style=" min-width: 120px">Type Employee</th>
                                <th style=" min-width: 120px">NIK</th>
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
                                <th style=" min-width: 150px">Terminante Date</th>
                                <th style=" min-width: 120px">Group</th>
                                <th style=" min-width: 120px">Group Grade</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                      <?php if(!empty($action_i)) { ?>  
                        <?php foreach ($action_i as $item) { ?>
                            <tr>
                                <td><?php echo $item->action ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        <?php } ?>
                      <?php } else{
                          echo'
                          <tr>
                          <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                      </tr>';
                      } ?>
                      
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>
</div>

<br>
<br>
<br>
<br>

<!-- Elemen yang akan menjadi kontainer peta -->