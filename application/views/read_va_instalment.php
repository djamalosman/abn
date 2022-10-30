<?php echo $this->session->flashdata('message'); ?>

<div class="container-fluid">
    <!-- Modal -->  
    <form action="<?php echo base_url('content/excel_upload/t_lelang/content/read_mt_lelang'); ?>" method="post" enctype="multipart/form-data" >
        <div class="modal fade" id="ModalAgent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Upload Data Lelang</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="file" name="file"/> 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Import Data</button>
                    </div>
                </div>
            </div>
        </div>    
    </form>    


    <?php echo form_open("content/#", "id='swa-confirmzzz'") ?>
    <!--<form method="post" action="<?php // echo base_url('content/delete_multi_mntr_lelang') ?>" >-->
    <div class="row d-none">
        <div class="border-primary col-xs-12 col-md-auto p-1">
            <a class="btn btn-success btn-block" href="<?php echo base_url("content/create_mntr_lelang") ?>">
                <i class="fa fa-plus"></i>
                Tambah Data Lelang
            </a>
        </div>

        <div class="border-primary col-xs-12 col-md-auto p-1">
            <a class="btn btn-success btn-block" href="<?php echo base_url("als_asset/excel/form_mntr_lelang.xlsx") ?>">
                <i class="fa fa-download"></i>
                Download Format
            </a>    
        </div>

        <div class="border-primary col-xs-12 col-md-auto p-1">
            <button type="button" data-toggle="modal" data-target="#ModalAgent" class="btn btn-success btn-block" >
                <i class="fa fa-upload"></i>
                Import
            </button>        
        </div>
    </div>
    
    <div class="row form-group">
        <div class="col col-md-3">
            <label for="mtanggal">Mulai Tanggal</label>
        </div>
        <div class="col-12 col-md-9">
            <input readonly type="text" class="form-control tanggal" id="mtanggal" name="mtanggal">
            <?php echo form_error('mtanggal', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
        </div>
    </div>
    
    <div class="row form-group">
        <div class="col col-md-3">
            <label for="ntanggal">Hingga Tanggal</label>
        </div>
        <div class="col-12 col-md-9">
            <input readonly type="text" class="form-control tanggal" id="ntanggal" name="ntanggal">
            <?php echo form_error('ntanggal', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
        </div>
    </div>
    
    <hr>

    <!--<div id="relativetocontent" style="position: relative; width: 100%; " >-->
        <!--<div id="absolutecontent" style="position: absolute; width:100%; overflow-x: auto;" >-->
    <div id="relativetocontent" style="position: relative; width: 100%; min-height: 800px; max-height: 800px" >
        <div id="absolutecontent" style="position: absolute; min-height: 800px; max-height: 800px; width:100%; overflow: auto;" >
                <table class="table table-striped table-bordered data-server-side">
                    <thead>
                        <tr>	
                            <!--<th class="text-center"><button type="submit" class="btn btn-danger px-1 py-0"><i class="fa fa-trash-o"></i></button></th>-->
                            <th>Assignment</th>
                            <th>Due Date</th>
                            <th>Agent</th>
                            <th>CIF</th>
                            <th>Rekening</th>
                            <th>Nasabah</th>
                            <th>Pinjaman</th>
                            <th>Produk</th>
                            <th>Status</th>
                            <!--<th>Aksi</th>-->
                        </tr>
                    </thead>
                </table> 
        </div>
    </div>
    <?php echo form_close() ?>
    <!--</form>-->
</div>

<script type="text/javascript" language="javascript" >
// $(document).ready(function(){  
    var dataTable = function(){
       return $('.data-server-side').DataTable({
           "pageResize": true,
           "autoWidth": false,
           "processing": true,
           "serverSide": true,
           retrieve: true,
           "order": [],
           "ajax": {
               url: "<?php echo base_url() . 'content/get_va_instalment'; ?>",
               type: "POST",
               "data": {
//                   "mtanggal": '2018-04-01',
//                   "ntanggal": '2018-04-03'
                   "mtanggal": $('[name=mtanggal]').val(),
                   "ntanggal": $('[name=ntanggal]').val()
               }
           },      
           "columnDefs": [
               {
                   "targets": [8],
                   "orderable": false
               }          
           ],
       });        
    }
    
    dataTable();
    
    $('[name=ntanggal]').change(function(){
        if($('[name=mtanggal]').val() !='' && $('[name=ntanggal]').val() !=''){
            dataTable().destroy();
            dataTable();
        }
    });
    
    $('[name=mtanggal]').change(function(){
        if($('[name=mtanggal]').val() !='' && $('[name=ntanggal]').val() !=''){
            dataTable().destroy();
            dataTable();
        }
    });
    
    
    
           
</script>  