

<?php echo $this->session->flashdata('message'); ?>
<head>
</head>
<div class="row">

    <!-- .row -->

    <!-- .row start -->

    <div class="col-lg-12">

        <div class="panel panel-danger toggle panelMove panelClose panelRefresh">

            <!-- Start .panel -->

            <div class="panel-heading" style = "background-color : red;">

                <h4 class="panel-title">Parameter Detail</h4>

            </div>

            <div class="panel-body">

                <form action="<?php echo base_url("content/create_param_proses") ?>" id="delete4" method="POST" class="form-horizontal group-border stripped" role="form">

                    <div class=" form-group" >
 
                        <div class="col-lg-2">

                            <label for="f_untuk" class="control-label">Tujuan</label>

                            <select style=" height: 30px"  id="f_untuk" name="f_untuk" class="fancy-select form-control">

                                <option value="Non">--Select--</option>

                                <option value="W">Web</option>

                                <option value="M">Mobile</option>

                            </select>

                        </div>

                        <div class="col-lg-2">

                            <label for="f_type" class="control-label">Master Parameter</label>

                            <select style=" height: 30px"  id="f_type" name="f_type" class="fancy-select form-control">

                                <option value="Non">--Select--</option>

                                <?php foreach ($paramM as $item) { ?>

                                    <option value="<?php echo $item->f_type ?>"><?php echo $item->f_type .'-'.$item->f_desc?></option>

                                <?php } ?>

                            </select>

                        </div>

                        <div class="col-lg-3">

                            <!-- col-lg-6 start here -->

                            <label for="f_desc" class="control-label">Option</label>

                            <input name="f_desc" id="f_desc" style="height: 30px" required="true"  type="text" class="form-control" id="text" placeholder="Description">

                        </div>
                        
                        <div class="col-lg-3">

                            <!-- col-lg-6 start here -->

                            <label for="f_desc" class="control-label">Value (<h style="color:red;">Bila Di Perlukan</h>)</label>

                            <input name="f_value" id="f_value" style="height: 30px"   type="text" class="form-control" id="value" placeholder="Value">

                        </div>

                        <div class="col-lg-3">

                            <!-- col-lg-6 start here -->

                            <label for="input" class="control-label"></label>

                            <button type="submit" name="simpan" id="simpan" style="margin-top: 25px; height: 30px;" class="btn btn-success mr5 mb10" ><i class="fa fa-save"></i>  <span class="text">Simpan</span></button>
                            
                            <input type="hidden" name="delete2" class="form-control" id="delete1">

                        </div>
						
						
						<div class="col-lg-3">

                            <!-- col-lg-6 start here -->

                            <label for="input" class="control-label"></label>

                        <a href="<?php echo base_url('downloadexcel/paramter'); ?>" style="margin-top: 25px; height: 30px;" class="btn btn-primary mr5 mb10" ><i class="fa fa-download"></i>  <span class="text">Download Excel</span></a>
                               
                        </div>

                    </div>

					
                    <div class="form-group">

                        <div class="col-lg-12">

                            <!--table baru-->

                            <table id="example" class="table table-striped table-bordered data-server-side">

                                <thead>

                                    <tr>	

                                        <th><button type="button" onclick="delet('delete3')" name="delete" id="delete" class="btn btn-danger px-1 py-0"><i  class="fa fa-trash-o"></i></button></th>

                                        <th>Action</th>

                                        <th>Web/Mobile</th>

                                        <th>Type</th>

                                        <th>Code ID / Description</th>

                                        <th>Description</th>
                                        <th>Value</th>

                                        <th>Status</th>



                                    </tr>

                                </thead>

                                <tbody>

                                    <?php foreach ($param as $item) { ?>

                                        <tr>			

                                            <td class="text-center" >

                                                <!--<div class="checkbox-custom" style="margin-left: 20px;">-->

                                                <input type="checkbox"  id="checkbox1.<?php echo $item->f_code ?>" value="<?php echo $item->f_code ?>" name="idnya[]" >

                                                <!--<label for="checkbox1.<?php echo $item->f_id ?>"></label>-->

                                                <!--</div>-->

                                                <!--<input type="checkbox" />-->

                                            </td>

                                            <td class="center" >

                                                <a title="Edit" style="margin-top: 10px;" href="<?php echo base_url("content/edit_allparameter/" . $item->f_id) ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>



                                            </td>

                                            <td><?php echo $item->f_untuk ?></td>

                                            <td><?php echo $item->f_type ?></td>

                                            <td><?php echo $item->f_code." - ".$item->f_desc ?></td>

                                            <td><?php echo $item->f_desc ?></td>
                                            <td><?php echo $item->f_value ?></td>



                                            <td><?php

                                                if ($item->f_status == '1') {

                                                    echo 'Active';

                                                } else {

                                                    echo 'Nonactive';

                                                }

                                                ?></td>

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
<script src="<?php echo base_url('assets/jquery/jquery-2.2.3.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable( {
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
         columnDefs : [
        { targets: 0, sortable: false},
    ],
    order: [[ 1, "asc" ]]
         //"scrollX": true,
    } );
} );


 function delet(a) {
        //event.preventDefault(); // prevent form submit
        var form = $('#delete4');//event.target.form; // storing the form
        Swal.fire({
            title: 'Anda Yakin ?',
            text: "Ingin Menghapus Data Ini ",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
				$('#delete1').val(a);
                form.submit();
            } else {
                swal({
                    position: 'top',
                    title: 'Cancel',
                    text: 'Anda Tidak Jadi Menghapus',
                    type: 'error',
                    showConfirmButton: false,
                    timer: 1500,
                    onOpen: function () {
                        setTimeout(function () {
                            swal.close()
                        }, 2000)
                    }
                });
//      alert('masuk cancel');
            }
        })
    }

</script>
