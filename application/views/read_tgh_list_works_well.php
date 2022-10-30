<?php echo $this->session->flashdata('message'); ?>
<div class="container-fluid" >    
    <!-- Modal -->
    <div class="modal fade" id="ModalAgent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form id="imp_submit" action="<?php echo base_url("content/excel_upload/t_accountlist/content/read_tgh_list"); ?>" method="post" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload Data Tagihan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input class="form-control" type="file" name="file"/>
                    </div>
                    
                    <div class="form-group">
                        <select class="form-control" name="source">
                            <option disabled selected>-- pilih sumber data --</option>
                            <option value="internal">Internal</option>
                            <option value="external">external</option>
                        </select>
                    </div>
                    <!--<input type="submit" value="Upload file"/>-->
                       
                </div>
                
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Import</button>
                </div>
            </div>
            </form>   
        </div>
    </div>    
    
    
    <?php echo form_open("content/delete_multi_tgh_list", "id='swa-confirm'") ?>
    <div class="row">
<!--        <div class="border-primary col-sm-12 col-md-auto p-1">
            <a class="btn btn-success btn-block" href="<?php // echo base_url("content/create_tgh_list") ?>">
                <i class="fa fa-plus"></i>
                Tambah Tagihan
            </a>
        </div>-->
        
        <div class="border-primary col-sm-12 col-md-auto p-1">
            <a class="btn btn-success btn-block" href="<?php echo base_url("als_asset/excel/form_tgh_tagihan.xlsx") ?>">
                <i class="fa fa-download"></i>
                Download Format
            </a>    
        </div>
        
        <div class="border-primary col-sm-12 col-md-auto p-1">
            <button type="button" data-toggle="modal" data-target="#ModalAgent" class="btn btn-success btn-block" >
                <i class="fa fa-upload"></i>
                Import
            </button>        
        </div>
        
    </div>
   
 
    
    </br></br>
    <div style="overflow-x: scroll; " class="w-80 tabelnya" >
        <table class="table table-striped table-bordered data">
        <thead>
            <tr>	
                <th class="text-center"><button type="submit" class="btn btn-danger p-1"><i class="fa fa-trash-o"></i></button></th>
                <th>Aksi</th>
                <th>Kode Cabang</th>
                <th>CIF</th>
                <th>Account Number</th>
                <th>Nama Customer</th>
                <th>Kode Pinjaman</th>
                <th>Produk ID</th>
                
                <th>DPD</th>
                <th>Cycle</th>
<!--                <th>Tagihan Pokok</th>
                <th>Bunga</th>
                <th>Out standing</th>
                
                
                <th>Tanggal Cicilan</th>
                <th>Tagihan Pokok</th>
                <th>Tagihan Bunga</th>
                <th>Tagihan Denda</th>
                <th>Assign ID</th>
                <th>Agent ID</th>
                <th>Status</th>-->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($assignment as $item) { ?>
                <tr>			
                    <td class="text-center"><input type="checkbox" value="<?php echo $item->f_cif ?>" name="idnya[]"/></td>
                    <td>
                        <a title="Edit" href="<?php echo base_url("content/update_tgh_list/".$item->f_cif) ?>"><i class="fa fa-list" aria-hidden="true"></i></a>
                        <!--<a title="Detail" href="#"><i class="fa fa-list" aria-hidden="true"></i></a>-->
                    </td>                    
                    <td><?php echo $item->f_branch_id ?></td>
                    <td><?php echo $item->f_cif ?></td>
                    <td><?php echo $item->f_acctno ?></td>
                    <td><?php echo $item->f_custname ?></td>
                    <td><?php echo $item->f_loanid ?></td>
                    <td><?php echo $item->f_productid ?></td>
                    
                    <td><?php echo $item->f_dpd ?></td>
                    <td><?php echo $item->f_cycle ?></td>
<!--                    <td><?php // echo $item->f_pokok ?></td>
                    <td><?php // echo $item->f_bunga ?></td>
                    <td><?php // echo $item->f_outstanding ?></td>
                    
                    
                    <td><?php // echo $item->f_installmentdate ?></td>
                    <td><?php // echo $item->f_tagihanpokok ?></td>
                    <td><?php // echo $item->f_tagihanbunga ?></td>
                    <td><?php // echo $item->f_tagihandenda ?></td>
                    <td><?php // echo $item->f_assignid ?></td>
                    <td><?php // echo $item->f_agentid ?></td>
                    <td><?php // echo $item->f_status ?></td>-->
                </tr>                            
            <?php } ?>
        </tbody>
    </table> 
    </div>
    <?php echo form_close() ?>
</div>

<script>
    $('#imp_submit').submit(function(){
       if($("select[name='source']").val() != null && $("input[name='file']").val()){
           document.getElementById("imp_submit").submit();
       }else{
           swal("Oops!", "jenis sumber data atau file belum dipilih!", "warning");
       }
       return false; 
    });

</script>