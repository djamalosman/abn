<?php echo $this->session->flashdata('message'); ?>
<div class="container-fluid" >       
    <!-- Modal -->
    <div class="modal fade" id="ModalAgent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form id="imp_submit" action="<?php echo base_url("content/excel_upload/t_collectionlist/content/read_tgh_list"); ?>" method="post" enctype="multipart/form-data">
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
    <!--<div class="row">-->
        
<!--        <div class="border-primary col-sm-12 col-md-auto p-1">
            <a class="btn btn-success btn-block" href="<?php echo base_url("als_asset/excel/form_tgh_tagihan.xlsx") ?>">
                <i class="fa fa-download"></i>
                Download Format
            </a>    
        </div>-->
        
<!--        <div class="border-primary col-sm-12 col-md-auto p-1">
            <button type="button" data-toggle="modal" data-target="#ModalAgent" class="btn btn-success btn-block" >
                <i class="fa fa-upload"></i>
                Import
            </button>        
        </div>-->
        
    <!--</div>-->
   
 
    
    </br></br>

    <!--<iframe id="bingkai" width="100%"></iframe>-->
    
    <div id="relativetocontent" style="position: relative; width: 100%; min-height: 800px; max-height: 800px;">
        <div style="position: absolute; max-width: 100%; overflow: auto;">
        <table class="table table-striped table-bordered dataz">
        <thead>
            <tr>	
                <!--<th class="text-center"><button type="submit" class="btn btn-danger p-1"><i class="fa fa-trash-o"></i></button></th>-->
                <th>No</th>
                <th>Nama</th>
                <th>Pinjaman</th>
                <th>Cycle</th>
                <th>Aset</th>
                <th>Pekerjaan</th>
                <th>Tgl Gajian</th>
                <th>Jbtn Buziness</th>
                <th>Kond. Jaminan</th>
                <th>Tgl Assign</th>
                <th>Tgl Proses</th>
                <!--<th>Aksi</th>-->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($assignment as $item) { ?>
                <tr>			
                    <!--<td class="text-center"><input type="checkbox" value="<?php echo $item->id ?>" name="idnya[]"/></td>-->
                    <td><?php echo $item->no ?></td>
                    <td><?php echo $item->nama ?></td>
                    <td><?php echo $item->no_loan ?></td>
                    <td><?php echo $item->cycle ?></td>
                    <td><?php echo $item->keberadaan_aset ?></td>
                    <td><?php echo $item->pekerjaan_nasabah ?></td>
                    <td><?php echo $item->tanggal_gajian ?></td>
                    <td><?php echo $item->jabatan_jenisusaha ?></td>
                    <td><?php echo $item->kondisi_jaminan ?></td>
                    <td><?php echo $item->tgl_asign ?></td>
                    <td><?php echo $item->tgl_proses ?></td>
                    <!--<td>-->
                        <!--<a title="Edit" href="<?php echo base_url("content/update_tgh_list/".$item->f_cif) ?>"><i class="fa fa-list" aria-hidden="true"></i></a>-->
                        <!--<a title="Detail" href="#"><i class="fa fa-list" aria-hidden="true"></i></a>-->
                    <!--</td>-->
                </tr>                            
            <?php } ?>
        </tbody>
    </table> 
        </div>
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