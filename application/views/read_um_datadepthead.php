<?php echo $this->session->flashdata('message'); ?>
<div class="container-fluid">    <!-- Modal -->  

    <form id="delet1" action="<?php echo base_url('dephead/delete_multi_um_depthead'); ?>" method="post" >      
        <div class="row">          
            <div class="col-lg-12">         
                <div class="panel panel-danger toggle panelMove panelClose panelRefresh">                   
                    <div class="panel-heading" style="background-color: red">                      
                        <h4 class="panel-title"><i class="fa fa-user"></i> Setting Cabang Handle</h4>                  
                    </div>       
                    <div class="panel-body">      
                        <!--<a style="margin-bottom: 20px;" href="<?php echo base_url('dephead/create_um_datadepthead') ?>" class="btn btn-success btn-sm mr5 mb10" type="button">                                  
                            <i class="fa fa-plus"></i>                                   
                            Add DeptHead                               
                        </a> 
                        <a style="margin-bottom: 20px;" href="<?php echo base_url('dephead/create_um_bm') ?>" class="btn btn-success btn-sm mr5 mb10" type="button">                                  
                            <i class="fa fa-plus"></i>                                   
                            Add Branch Manager                              
                        </a>--> 
                        <a style="margin-bottom: 20px;"  href='<?php echo base_url("downloadexcel/excel_depthead"); ?>' type="button"  class="btn btn-primary btn-sm mr5 mb10"><i class="fa fa-download"></i>  Download Excel</a>

                        <div class="form_group">                            
                            <table id="example" class="table table-striped table-bordered data-server-side">                               
                                <thead>                                    
                                    <tr>                                        
                                      <!--<th class="text-center"><button type="submit" class="btn btn-danger px-1 py-0"><i class="fa fa-trash-o"></i></button></th>-->          
                                        <!--<th class="text-center">
                                            <button  type="button" class="btn btn-danger btn-xs mr5 mb10" onclick="archiveFunction()" ><i class="fa fa-trash-o"></i></button></th>    
                                <!--<button style="display: none" type="submit" id="deletbtn" class="btn btn-danger px-1 py-0" ><i class="fa fa-trash-o"></i></button>-->   
                                        <!--<th style=" min-width: 120px">Pilih</th>-->
                                        <th >Action</th>          
                                        <th style=" min-width: 120px">Nik</th>
                                        <th style=" min-width: 120px">Name</th>
                                        <th style=" min-width: 120px">Jabatan</th>                          
                                        <th style=" min-width: 120px">Cabang Yang Di Tangani</th>                              
                                    </tr>                              
                                </thead>              
                                <tbody>                                  
                                    <?php foreach ($karyawan as $item) { ?>                         
                                        <tr>                                           
                                                                <!--<td>xhgdjzs</td>-->       
                                            <!--<td class="text-center"><input type="checkbox" value="<?php echo $item->f_userid ?>" name="idnya[]"/>          
                                            </td>-->                                    
                                            <!--<td><center><a data-toggle="modal" data-target="#ModalAgent1" ><i class="fa fa-pencil-square-o"></i></a></center></td>-->                                      
                                            <td><center><a href="javascript: submitform('<?php echo $item->f_userid ?>','<?php echo $item->f_userlevel ?>')"><i class="glyphicon glyphicon-eye-open"></i></a></center></td>
                                    <td><?php echo $item->f_userid ?></td>                                       
                                    <td><?php echo $item->f_username ?></td>                                     
                                    <td><?php echo $item->jabatan ?></td>                                                            
                                    <td><?php echo $item->cabang ?></td>                                                                    
                                    </tr>                                                            
                                <?php } ?>                                
                                </tbody>             
                            </table>                  
                        </div>                   
                    </div>             
                </div>            
            </div>       
        </div>   
    </form>   

    <form action="<?php echo base_url('dephead/detaildepthead'); ?>" method="post" id="detail">
        <input type="hidden" name="nik" id="nik">
        <input type="hidden" name="jbtn" id="jbtn">
    </form>

    <!--</form>--></div>
<script src="<?php echo base_url('assets/jquery/jquery-2.2.3.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js') ?>">
</script>
<script type="text/javascript">

    function archiveFunction() {
        //event.preventDefault(); // prevent form submit
        var form = $('#delet1');//event.target.form; // storing the form
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
//            ,
//                    function (isConfirm) {
//                    if (isConfirm) {
//                    //$('#deletbtn').click();//form.submit(); // submitting the form when user press yes
//                    alert('masuk');
//                    } else {
//                    swal("Cancelled", "Your imaginary file is safe :)", "error");
//                    }
//                    });
    }
    function submitform(a,b) {
        $('#nik').val(a);
        $('#jbtn').val(b);
        $('#detail').submit();
    }
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#example').DataTable({
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
        });
    });
</script>