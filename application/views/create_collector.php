<?php echo $this->session->flashdata('message'); ?>

<div class="container-fluid" >    
    <?php // echo form_open("content/transfer_account_proses", "id='swa-confirm'") ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-danger toggle panelMove panelClose panelRefresh">
                <div class="panel-heading" style="background-color: red;">
                    <h4 class="panel-title"><i class="fa fa-users"></i>Create User Mobile</h4>
                </div>
                <div class="panel-body">
                    <form action="<?php echo base_url('usermobile/create_proses_collector'); ?>" method="POST" class="form-horizontal group-border stripped">

                        <div class="col-md-5">
                            <!-- col-lg-6 start here -->
                            <!--<label for="input" class="control-label"></label>-->
                            <button type="submit" name="save" id="save" class="btn btn-primary" ><i class="fa fa-pencil"></i>  <span class="text"> Create</span></button>
                            <!--<input type="text" class="form-control" id="text" placeholder="Input">-->
                        </div>
                        <br>
                        <br>
                        <br>
                        <div class="form-group">
                            <div class="col-lg-12">
                                <table  id="example" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Pilih</i></button></th>
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
                                            <th style=" min-width: 150px">Terminante Date</th>
                                            <th style=" min-width: 120px">Group</th>
                                            <th style=" min-width: 120px">Group Grade</th>
                                    </thead>
                                    <tbody  id="show_data">
									
                                       <!-- <?php
                                        $idx = 0;
                                        //foreach ($inputkaryawan as $item) {
                                            ?>
                                            <tr>
                                                <td class="text-center" >
                                                    <input type="checkbox"  id="<?php echo $item->f_nik ?>" value="<?php echo $item->f_nik ?>" name= "idnya[]">
                                                </td>
                                                <td><?php //echo $item->f_nik ?></td>
                                                <td><?php //echo $item->f_full_name ?></td>
                                                <td><?php //echo $item->f_gender ?></td>
                                                <td><?php //echo $item->f_no_ktp ?></td>
                                                <td><?php //echo $item->f_no_tlp ?></td>
                                                <td><?php //echo $item->f_position_desc ?></td>
                                                <td><?php //echo $item->f_join_date ?></td>
                                                <td><?php //echo $item->f_birth_date ?></td>
                                                <td><?php //echo $item->f_email ?></td>
                                                <td><?php //echo $item->f_company_desc ?></td>
                                                <td><?php //echo $item->f_cost_center ?></td>
                                                <td><?php //echo $item->f_dept_desc ?></td>
                                                <td><?php //echo $item->f_directorate_desc ?></td>
                                                <td><?php //echo $item->f_div_desc ?></td>
                                                <td><?php //echo $item->f_emp_area_desc ?></td>
                                                <td><?php //echo $item->f_emp_office_desc ?></td>
                                                <td><?php //echo $item->f_emp_status_desc ?></td>
                                                <td><?php //echo $item->f_landscape ?></td>
                                                <td><?php //echo $item->f_org_unit_desc ?></td>
                                                <td><?php //echo $item->f_termintate_date ?></td>
                                                <td><?php //echo $item->f_group_desc ?></td>
                                                <td><?php //echo $item->f_group_grade_code ?></td>

                                            </tr>
                                            <?php //$idx++;
                                        //}
                                        ?> -->

                                    </tbody>
                                </table> 
                            </div>

                        </div>
                        <!--                        <div class="form-group">
                                                    <div class="col-lg-1"></div>
                                                    <div class="col-lg-10">
                                                        <button type="submit" class="btn btn-success mr5 mb10">
                                                            <i class="fa fa-send"></i>
                                                            Transfer
                                                        </button>  
                                                        <br>
                                                        <br>
                                                    </div>
                        
                                                </div>-->

                    </form>


                </div>
            </div>
        </div>
        <div class="col-lg-12">

        </div>
    </div>
    <br>
    <br>

<?php echo form_close() ?>
</div>
<br>
<br>

<div class="tmpl-loading" style="
     /*min-width: 240px;*/ 
     display: none;
     position: fixed;
     width: 100%; 
     height: 100%; 
     left: 0px;
     /*background: gray;*/
     /*opacity: 0.5;*/
     top: 0px;
     "
     >
    <div  style="
          border: 2px solid black; 
          margin: 0px auto 0px auto;
          padding-top: 35px;
          position: absolute;
          /*opacity: 0.99;*/
          background: white;
          width: 240px;
          height: 100px;
          position: fixed;
          left: calc(50% - 120px);
          top: calc(50% - 150px);    

          -webkit-border-radius: 10px; 

          /* Firefox 1-3.6 */
          -moz-border-radius: 10px; 

          /* Opera 10.5, IE 9, Safari 5, Chrome, Firefox 4, iOS 4, Android 2.1+ */
          border-radius: 10px;             
          ">
        <p class="text-center" style="font-size: 21pt"><strong><i class="fa fa-spinner fa-spin"></i> Sending... </strong></p>
    </div>
</div>
<script src="<?php echo base_url('assets/jquery/jquery-2.2.3.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js') ?>"></script>
<script type="text/javascript">
    $(document).ready(function () {
		tampilemployee();
        $('#example').DataTable({
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            //"scrollX": true,
        });
    });
</script>
<script>
    $('.show-load').click(function () {
        $('.tmpl-loading').toggle();
    });

</script>

<script>
    $('#imp_submit').submit(function () {
        if ($("select[name='source']").val() != null && $("input[name='file']").val()) {
            document.getElementById("imp_submit").submit();
        } else {
            swal("Oops!", "jenis sumber data atau file belum dipilih!", "warning");
        }
        return false;
    });
	
	
	function tampilemployee() {
        
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url("usermobile/getemployee") ?>',
            async: false,
            dataType: 'json',
            success: function (data) {
                var html = '';
                    var i;
                for (i = 0; i <data.length; i++) {
                    html += '<tr>'+
					'<td class="text-center" >' +
						'<input type="checkbox"  id="'+ data[i].f_nik +'" value="'+ data[i].f_nik +'" name= "idnya[]">'+
						'</td>' +
						'<td>'+data[i].f_nik+'</td>'+
						'<td>'+data[i].f_full_name+ '</td>'+
						'<td>'+data[i].f_gender+ '</td>'+
						'<td>'+data[i].f_no_ktp+ '</td>'+
						'<td>'+data[i].f_no_tlp+ '</td>'+
						'<td>'+data[i].f_position_desc+ '</td>'+
						'<td>'+data[i].f_join_date+ '</td>'+
						'<td>'+data[i].f_birth_date+ '</td>'+
						'<td>'+data[i].f_email+ '</td>'+
						'<td>'+data[i].f_company_desc+ '</td>'+
						'<td>'+data[i].f_cost_center+ '</td>'+
						'<td>'+data[i].f_dept_desc+ '</td>'+
						'<td>'+data[i].f_directorate_desc+ '</td>'+
						'<td>'+data[i].f_div_desc+ '</td>'+
						'<td>'+data[i].f_emp_area_desc+ '</td>'+
						'<td>'+data[i].f_emp_office_desc+ '</td>'+
						'<td>'+data[i].f_emp_status_desc+ '</td>'+
						'<td>'+data[i].f_landscape+ '</td>'+
						'<td>'+data[i].f_org_unit_desc+ '</td>'+
						'<td>'+data[i].f_termintate_date+ '</td>'+
						'<td>'+data[i].f_group_desc+ '</td>'+
						'<td>'+data[i].f_group_grade_code+ '</td>'+
                    '</tr>';

                }
				 $('#show_data').html(html);
                console.log('Debug Objects:' + data);

            }

        });
    }

</script>