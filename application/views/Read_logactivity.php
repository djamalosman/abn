
<?php echo $this->session->flashdata('message'); ?>
<div class="row">
    <!-- .row -->
    <!-- .row start -->
    <div class=" col-lg-12">
        <div class="panel panel-danger toggle panelMove panelClose panelRefresh">
            <!-- Start .panel -->
            <div class="panel-heading" style="background-color: red">
                <h4 class="panel-title">Log Activity</h4>
            </div>
            <div class="panel-body">
                <div class=" form-group" style="height: 60px;">

                    <div class="col-md-2">
                        <select style=" height: 30px"  id="user" name="user" class="fancy-select form-control">
                            <option value="Non">Select User</option>
                            <?php foreach ($user as $item1) { ?>
                                <option  value="<?php echo $item1->f_userid ?>"><?php echo $item1->full_name ?></option>
                            <?php } ?>

                        </select>
                    </div>
                    <div class="col-md-2">
                        <select style=" height: 30px"  id="prangkat" name="prangkat" class="fancy-select form-control">
                            <option value="Non">Select Perangkat</option>
                            <?php foreach ($prangkat as $item) { ?>
                                <option  value="<?php echo $item->f_prangkat ?>"><?php echo $item->f_prangkat ?></option>
                            <?php } ?>

                        </select>
                    </div>
                    <div class="col-md-4">
                        <div style=" height: 30px" class="input-daterange input-group">
                            <span style=" height: 30px"  class="input-group-addon" style=''><i class="fa fa-calendar"></i></span>
                            <input id="datetimestart" style=" height: 30px"   type="text" class="form-control" name="start" />
                            <span style=" height: 30px"  class="input-group-addon">to</span>
                            <input id="datetimeend" style=" height: 30px"  type="text" class="form-control" name="end" />
                        </div>
                    </div>
                    <div style=" height: 30px"  class="col-md-1">
                        <button type="button" onclick="tampilelog()"  class="btn btn-primary" style="border-radius: 0px 10px 0px 0px; height: 30px;"  ><i class="fa fa-search" aria-hidden="true"></i></button>
                    </div>

					<div style=" height: 30px"  class="col-md-1">
                         <a href="<?php echo base_url('downloadexcel/logactivity'); ?>" style="border-radius: 0px 10px 0px 0px; height: 30px;"  class="btn btn-success mr5 mb10" ><i class="fa fa-download"></i>  <span class="text">Download Excel</span></a>
                    </div>

                </div>
                <div class="form-group">
                    <div class="col-lg-12">
                        <!--table baru-->
                        <table id="responsive" class="table table-bordered table-striped">
                            <thead>
                                <tr>	
                                    <th>No</th>
                                    <th>User ID</th>
                                    <th>Device</th>
                                    <th>Activity</th>
                                    <th>Date Time</th>
                                </tr>
                            </thead>
                            <tbody id="show_data">

                            </tbody>
                        </table> 
                    </div>

                </div>



            </div>
        </div>
        <!-- End .panel -->
    </div>

</div>

<script type="text/javascript">
    $(document).ready(function () {
//        tampilelog();
        $('#responsive').DataTable({
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            //"scrollX": true,
        });

    });


    function tampilelog() {

        var user = ''; //$('#agent').val();
        var prangkat = ''; //$('#agent').val();
        var datetimestart = ''; //$('#start').val();
        var datetimeend = ''; //$('#end').val();
        console.log($('#user').val());
        console.log($('#prangkat').val());
        console.log($('#datetimestart').val());
        console.log($('#datetimeend').val());
        if ($('#user').val()) {
            user = $('#user').val();
        }
        if ($('#prangkat').val()) {
            prangkat = $('#prangkat').val();
        }

        if ($('#datetimestart').val()) {
            datetimestart = $('#datetimestart').val();
        }

        if ($('#datetimeend').val()) {
            datetimeend = $('#datetimeend').val();
        }
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url("logactivity/getlogactivity") ?>',
            async: false,
            data: {
                user: user,
                prangkat: prangkat,
                datetimestart: datetimestart,
                datetimeend: datetimeend
            },
            dataType: 'json',
            success: function (data) {
                $('#responsive').DataTable().destroy();
                var html = '';
                var a = 1;
                for (i = 0; i < data.length; i++) {
                    html += '<tr>' +
                            '<td class="text-center" >' + a++ + '</td>' +
                            '<td>' + data[i].f_userid + '</td>' +
                            '<td>' + data[i].f_prangkat + '</td>' +
                            '<td>' + data[i].f_activity + '</td>' +
                            '<td>' + data[i].f_date_time + '</td>' +
                            '</tr>';
                }
                $('#show_data').html(html);
                $('#responsive').DataTable({
                    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                    //"scrollX": true,
                });
                console.log('Debug Objects:' + data);
            }

        });
    }

</script>