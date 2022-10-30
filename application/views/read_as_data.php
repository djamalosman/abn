<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.7/css/select.dataTables.min.css" />

    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" />
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.3.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>


    <script type="text/javascript">
        $(document).ready(function () {
            $('#example').DataTable({
                lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
                dom: 'Bfrtip',
        buttons: [
            {
                extend: 'pdf',
                text: '<i class="fa fa-file-pdf-o" aria-hidden="true"></i>',
                titleAttr: 'PDF',
                exportOptions: {
                    columns: [ 2, 3,4,5,6,7,8,9]
                }
            },
            {
                extend: 'excel',
                text: '<i class="fa fa-file-excel-o" aria-hidden="true"></i>',
                titleAttr: 'Excel',
                exportOptions: {
                    columns: [ 2, 3,4,5,6,7,8,9]
                }
            },
            {
                extend: 'csv',
                text: '<i class="fa fa-file-text-o"></i>',
                 titleAttr: 'CSV',
                exportOptions: {
                    columns:[ 2, 3,4,5,6,7,8,9]
                }
            },
        ],
        select: true
            });
        });
    </script>

<?php echo $this->session->flashdata('message'); ?>
<?php echo form_open("content/submit_as_data", "id='swa-campur'") ?>
<div class="container-fluid">     
    <div class="row">
        <div class="border-primary col-xs-12 col-md-auto p-1">
            <button type="submit" name="kirim" value="update_assignment"  class="btn btn-success btn-block" >
                <i class="fa fa-files-o"></i>
                Transfer Assignment
            </button>
        </div>
        
        <div class="border-primary col-xs-12 col-md-auto p-1">
            <button type="submit" name="kirim" value="proses" class="btn btn-success btn-block show-load " >
                <i class="fa fa-cogs"></i>
                Proses
            </button>        
        </div>
    </div>    
    
    
    </br></br>
    
    <div style="overflow-x: scroll; " class="w-100">    
    <table class="table table-striped table-bordered"id="example">
        <thead>
            <tr>	
                <th class="text-center"><button type="submit" name="kirim" value="delete" class="swa-klik btn btn-danger p-1"><i class="fa fa-trash-o"></i></button></th>
                <th>Aksi</th>
                <th>Assignment</th>
                <th>Tgl Tugas</th>
                <th>NIK</th>
                <th>Nama Lengkap</th>
                <th>Jabatan</th>
                <th>Tot. Record</th>
                <th>Finish Record</th>
<!--                <th>Pindah ke Agen</th>
                <th>Agen Asal</th>-->
                <th>Tgl Transfer</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($assignment as $item) { ?>
                <tr>			
                    <!--<td class="text-center"><input type="checkbox" value="<?php // echo $item->f_assignid ?>" name="idnya[]"/></td>-->
                    <td class="text-center"><input class="ceklis" type="checkbox" value="<?php echo $item->f_assignid ?>" name="idnya[]"/></td>
                    <td>
                        <a title="View" href="<?php echo base_url("content/view_as_data/".$item->f_assignid) ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        <a title="Detail" href="<?php echo base_url('content/read_as_datadetail/'.$item->f_agentid) ?>"><i class="fa fa-list" aria-hidden="true"></i></a>
                    </td>
                    <td><?php echo $item->f_assignid ?></td>
                    <td><?php echo $item->f_assigndate ?></td>
                    <td><?php echo $item->f_agentid ?></td>
                    <td><?php echo $item->f_namaagent ?></td>
                    <td><?php echo $item->f_jabatan ?></td>
                    <td><?php echo $item->f_rectotal ?></td>
                    <td><?php echo $item->f_recdone ?></td>
                    <!--<td><?php // echo $item->f_trftoagentid ?></td>-->
                    <!--<td><?php // echo $item->f_originagent ?></td>-->
                    <td><?php echo $item->f_trfdate ?></td>
                   
                </tr>                            
            <?php } ?>
        </tbody>
    </table> 
    </div>
    
</div>
<?php echo form_close() ?>

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
            <p class="text-center" style="font-size: 21pt"><strong><i class="fa fa-spinner fa-spin"></i> Processing... </strong></p>
        </div>
    </div>

<script>
       $('.show-load').click(function(){
           $('.tmpl-loading').toggle();
           
           setTimeout(function() {
            $('.tmpl-loading').toggle();
           }, 5000);           
       });
       
       $("[name='idnya[]']").click(function(){
            $("[name='idnya[]']").prop('checked', false);
            $(this).prop('checked', true);
       });
        
</script>

<script>
$("#swa-campur button").click(function(ev){
//    alert($(this).attr("value"));
    ev.preventDefault()// cancel form submission
    if($(this).attr("value")=="proses"){
          $("#swa-campur").attr('action', $('base').attr('href')+'content/bg_upload/t_assignheader');
//          alert( $("input[type='checkbox'][checked='true']").val() );
          $("#swa-campur").submit();
    }
    
    if($(this).attr("value")=="update_assignment"){
        var ccc = $('input:checkbox:checked');

        var id = $('input:checkbox:checked').length;
        var msg = id>0 ? id+' data yang dipilih akan dihapus' : 'Tidak ada data yang dipilih';
        var textCancel = id==1 ? 'Batal'  : 'OK';
        var showConfirm = id==1 ? true : false;

        if(id!=1){
            swal(
                'Tidak ada data yang dipilih',
                'pilih satu data!',
                'question'
            )            
        }else{
            $("#swa-campur").attr('action', $('base').attr('href')+'content/update_as_data/'+$('input:checkbox:checked').val());
            $("#swa-campur").submit();              
        }      
    }
    
    if($(this).attr("value")=="delete"){
        var id = $('input:checkbox:checked').length;
        var msg = id>0 ? id+' data yang dipilih akan dihapus' : 'Tidak ada data yang dipilih';
        var textCancel = id>0 ? 'Batal'  : 'OK';
        var showConfirm = id>0 ? true : false;

        Swal({
          title: 'Anda Yakin?',
          type: 'question',
          text: msg,
          showCancelButton: true,
          confirmButtonText: 'Ya',
          showConfirmButton: showConfirm,
          cancelButtonText: textCancel
        }).then((result) => {
          if (result.value == true) {
            $("#swa-campur").attr('action', $('base').attr('href')+'content/delete_multi_as_data');
            $("#swa-campur").submit();  
          }
        }); 
    }
});    
</script>