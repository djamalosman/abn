<style>
    input:valid {
        color: black;
    }
    input:invalid {
        color: red;
    }    
    textarea:valid,.oke {
        color: black;
    }
    textarea:invalid,.error {
        color: red;
    }    

</style>

<?php echo $this->session->flashdata('message'); ?><div class="container-fluid">    <!-- Modal -->  
    <form action="<?php echo base_url('sp/sp_ad_proses'); ?>" method="post" >        
        <div class="modal fade" id="ModalAgent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">        
            <div class="modal-dialog modal-dialog-center" role="document">              
                <div class="modal-content">                    
                    <div class="modal-header"> 
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">     
                            <span aria-hidden="true">&times;</span>                
                        </button>                      
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data SP</h5>      
                    </div>                  
                    <div class="modal-body" style="height: 254px; margin-top: 30px;">       
                        <div class="col-lg-4">                       
                            <label class=" control-label">Jenis SP</label>                
                        </div>                       
                        <div class="col-lg-7">                   
                            <select name="jenissp" id="jenissp" class="form-control">    
                                <option value="null">Select</option>                       
                                <?php foreach ($jsp as $a) { ?>                                 
                                    <option value="<?php echo $a->f_code ?>|<?php echo $a->f_desc ?>"><?php echo $a->f_desc ?></option>      
                                <?php } ?>                        
                            </select>                       
                        </div>                     
                        <br>                      
                        <br>                       
                        <div class="col-lg-4">    
                            <label class=" control-label">Pilih Produk</label>
                        </div>  
                        <div class="col-lg-7">        
                            <select name="produk" id="produk" class="form-control">      
                                <option value="null">Select</option>    
                                <?php foreach ($produk as $a) { ?>      
                                    <option value="<?php echo $a->id ?>|<?php echo $a->descrip ?>"><?php echo $a->id ." | ".$a->descrip ?> </option>   
                                <?php } ?>        
                            </select>                  
                        </div>                     
                        <br>                 
                        <br>                    
                        <div class="col-lg-4">           
                            <label class=" control-label">Min DPD</label>         
                        </div>                       
                        <div class="col-lg-7">                      
                            <input name="mindpd" class="form-control" type="number">                  
                        </div>                       
                        <br>                       
                        <br>                      
                        <div class="col-lg-4">             
                            <label class=" control-label">Masa Berlaku</label>      
                        </div>                    
                        <div class="col-lg-7">                     
                            <input name="masa" class="form-control" type="number" >        
                        </div>             
                    </div>                   
                    <br>                   
                    <div class="modal-footer">                
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>                   
                        <button type="submit" class="btn btn-primary">Simpan</button>                
                    </div>             
                </div>          
            </div>      
        </div>   
    </form>    



    <!-- Modal -->   
    <form action="<?php echo base_url('sp/sp_ad_proses_update'); ?>" method="post" >      
        <div class="modal fade" id="ModalAgent1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">        
            <div class="modal-dialog modal-dialog-center" role="document">          
                <div class="modal-content" style="width: 400px;">                  
                    <div class="modal-header" style="background-color: red"> 
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">      
                            <span aria-hidden="true">&times;</span>           
                        </button>                  
                        <h4 class="modal-title" style="color: white" id="exampleModalLabel">Update Data SP</h4>      
                    </div>                   
                    <div class="modal-body">                    
                        <div class="col-lg-5">                          
                            <label class=" control-label">Jenis SP</label>                  
                        </div>                      
                        <div style="margin-bottom: 5px;" class="col-lg-7">              
                            <!--//<input type="hidden" style="height: 25px;" readonly="true" class="form-control" name="id" id="id" >-->
                            <input type="text" style="height: 25px;" readonly="true" class="form-control" name="jenissp1" id="jenissp1" >
<!--                            <select name="jenissp" id="jenissp1" class="fancy-select form-control">            
                                <option value="null">Select</option>                                
                            <?php // foreach ($jsp as $a) { ?>                                  
                                    <option  value="<?php // echo $a->f_desc  ?>"><?php // echo $a->f_desc  ?></option>             
                            <?php // } ?>                          
                            </select>                       -->
                        </div>                          
                        <div class="col-lg-5">                           
                            <label class=" control-label">Produk</label>     
                        </div>                 
                        <div style="margin-bottom: 5px;" class="col-lg-7"> 
                            <input type="text" style="height: 25px;" readonly="true" class="form-control" name="prdk" id="prdk1" >

<!--                            <input name="id" id="produk"  class="form-control" type="hidden" >                    
<select name="produk" id="prdk1" class="fancy-select form-control">                          
<option value="null">Select</option>                            
//<?php // foreach ($produk as $a) {  ?>      
    <option value="<?php // echo $a->ID  ?>|<?php // echo $a->DESCRIPTION  ?>"><?php // echo $a->DESCRIPTION  ?></option>   
                            <?php // } ?>                                
</select>                       -->
                        </div>                           
                        <div class="col-lg-5">                           
                            <label class=" control-label">Min DPD</label>              
                        </div>                       
                        <div style="margin-bottom: 5px;" class="col-lg-7">                       
                            <input name="mindpd" id="mindpd" style="height: 25px;" class="form-control" required="" title="Numeric Only" pattern="[0-9]{1,20}" type="text" >         
                        </div>                       
                        <div class="col-lg-5">                         
                            <label class=" control-label">Masa Berlaku</label>        
                        </div>                     
                        <div class="col-lg-7">                       
                            <input name="masa" style="height: 25px;" id="masa" required="" title="Numeric Only" pattern="[0-9]{1,20}" class="form-control" type="text" >       
                            <input name="idsp" id="idsp"  class="form-control" type="hidden" >        
                        </div>                   
                    </div>                   
                    <div class="modal-footer">                        
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>                      
                        <button type="submit" class="btn btn-primary">Simpan</button>                  
                    </div>               
                </div>           
            </div>        
        </div>    
    </form>    
    <form action="<?php echo base_url('sp/delete_multi_sp_administration'); ?>" method="post" id="delete">      
        <div class="row">          
            <div class="col-lg-12">         
                <div class="panel panel-danger toggle panelMove panelClose panelRefresh">                   
                    <div class="panel-heading" style="background-color:red;">                      
                        <h4 class="panel-title"> SP Parameter</h4>                  
                    </div>                    <div class="panel-body">                       
                        <div class="form-group">                           
                            <div class="col-lg-12">                                
                                <a class="btn btn-success" type="button" data-toggle="modal" data-target="#ModalAgent">                                  
                                    <i class="fa fa-plus"></i>                                   
                                    Tambah Data SP Administrasi                               
                                </a>         
                                <a href="<?php echo base_url('sp/create_sp_excel'); ?>" button type="button" style="background-color: #0bacd3;" class="btn btn-success">Download Excel</button></a>                        
                                               
                            </div>           
                        </div>                         
                        <br>                        
                        <br>                       
                        <br>                       
                        <div class="form_group">                            
                            <table id="example" class="table table-striped table-bordered data-server-side">                               
                                <thead>                                    
                                    <tr>                                        
                                      <!--<th class="text-center"><button type="submit" class="btn btn-danger px-1 py-0"><i class="fa fa-trash-o"></i></button></th>-->          
                                        <th class="text-center"><button type="button" onclick="delet()" class="btn btn-danger px-1 py-0"><i class="fa fa-trash-o"></i></button></th>    
                                        <th>Action</th>               
                                        <th>Jenis SP</th>               
                                        <th>Produk ID</th>                                   
                                        <th>Produk</th>                                   
                                        <th>DPD Min</th>                                      
                                        <th>Masa Berlaku</th>                                   
                                    </tr>                              
                                </thead>              
                                <tbody>                                  
                                    <?php foreach ($sp as $item) { ?>                         
                                        <tr>                                           
                                                                <!--<td>xhgdjzs</td>-->       
                                            <td class="text-center"><input type="checkbox" value="<?php echo $item->id_sp ?>" name="idnya[]"/>          
                                            </td>                                    
                                            <td><center><a data-toggle="modal" data-target="#ModalAgent1"
                                                   data-sp = "<?php echo $item->f_sp ?>"
                                                   data-prd = "<?php echo $item->f_produk ?>"
                                                   data-masa = "<?php echo $item->f_masa ?>"
                                                   data-dpd = "<?php echo $item->f_min_dpd ?>"
                                                   data-id = "<?php echo $item->id_sp ?>"
                                                   ><i class="fa fa-pencil-square-o"></i></a></center></td>                                      
                                    <td><?php echo $item->f_sp ?></td>                                       
                                    <td><?php echo $item->f_produk_id?></td>                                     
                                    <td><?php echo $item->f_produk ?></td>                                     
                                    <td><?php echo $item->f_min_dpd ?></td>                                  
                                    <td><?php echo $item->f_masa ?></td>                                  
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
    <div > 
        <div style="position: absolute; width: 100%; overflow: auto;" >           
            <table id="responsive" class="table table-striped table-bordered data-server-side">            
                <thead>                 
                    <tr>                       
                        <th class="text-center"><button type="submit" class="btn btn-danger px-1 py-0"><i class="fa fa-trash-o"></i></button></th>          
                        <th>Aksi</th>                       
                        <th>Jenis SP</th>                       
                        <th>Produk</th>                        
                        <th>DPD Min</th>                        
                        <th>Masa Berlaku</th>                  
                    </tr>               
                </thead>          
            </table>       
        </div>   
    </div>   
    <?php echo form_close() ?> 
    <!--</form>--></div>
<script src="<?php echo base_url('assets/jquery/jquery-2.2.3.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js') ?>">
</script><script type="text/javascript">
    $(document).ready(function () {



        $('#example').DataTable({
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            columnDefs: [
                {targets: 0, sortable: false},
            ],
            order: [[1, "asc"]]
        });
//        var mySelect = $('#jenissp1');
//        var mySelect1 = $('#prdk1');
//        mySelect.fancySelect().on('change.fs', function () {
//            $(this).trigger('change.$');
//        }); // trigger the DOM's change event when changing FancySelect
//        mySelect1.fancySelect().on('change.fs', function () {
//            $(this).trigger('change.$');
//        }); // trigger the DOM's change event when changing FancySelect


        $('#ModalAgent1').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal = $(this);

            //alert(div.data('sp'));

            // Isi nilai pada field
            modal.find('#prdk1').attr("value", div.data('prd'));
            modal.find('#jenissp1').attr("value", div.data('sp'));
            modal.find('#masa').attr("value", div.data('masa'));
            modal.find('#mindpd').attr("value", div.data('dpd'));
            modal.find('#idsp').attr("value", div.data('id'));
//            modal.find('#jenissp1').val(div.data('sp'));
//            modal.find('#prdk1').val(div.data('prd'));
            //$('#jenissp').val(div.data('sp'));

            // $('#statushj').val('2');

//            $('#jenissp1').trigger('change');//.change();//trigger('update.fs');//.selectpicker("refresh");
//            $('#prdk1').trigger('change');//.change();//trigger('update.fs');//.selectpicker("refresh");
            // console.log($('#jenissp1').val());

        });

    });
    
    
    function delet() {
            //event.preventDefault(); // prevent form submit
            var form = $('#delete');//event.target.form; // storing the form
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

                }
            })

        }


</script>