<!--<script src="http://maps.googleapis.com/maps/api/js?v=3&sensor=false"></script>-->
<script src="//maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD7_f6fTQagVISVELyzcIML6i5ea3_kTeI"></script>
<script src="https://maps.googleapis.com/maps/api/js"></script>



<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default plain toggle panelMove panelClose panelRefresh">
            <div class="panel-heading"style = "background-color:red;">
                <h4 class="panel-title">Audit Trail Menu Data User Web</h4>
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
                            <th style=" min-width: 120px">NIK</th>
                            <th style=" min-width: 120px">Password</th>
                            <th style=" min-width: 120px">Nama</th>
                            <th style=" min-width: 120px">Email</th>
                            <th style=" min-width: 120px">Level User</th>
                            <th style=" min-width: 120px">Status</th>
                            <th style=" min-width: 120px">User Create</th>
                            </tr>
                        </thead>
                        <tbody>
                      <?php if(!empty($action_i)) { ?>  
                        <?php foreach ($action_i as $item) { ?>
                            <tr>
                                <td><?php echo $item->action ?></td>
                                <td><?php echo $item->f_userid ?></td>
                                <td><?php echo $item->f_userpswd ?></td>
                                <td><?php echo $item->f_username ?></td>
                                <td><?php echo $item->f_email ?></td>
                                <td><?php echo $item->f_userlevel ?></td>
                                <td>
                                <?php 
                                if($item->f_active==='1')
                                echo 'Active';
                                else{
                                    echo'Not Active';
                                }
                                ?>
                                </td>
                                <td><?php echo $item->f_usercreate ?></td>
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