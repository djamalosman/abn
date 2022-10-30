<!--Demo question asked on
https://qawithexperts.com/questions/228/how-to-export-html-table-to-pdf-excel-in-jquery-datatable -->
<head>

<!-- <link href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css" rel="stylesheet" />

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script> -->

<!-- <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
        
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script> -->
</head>

<body>
    <div class="col-lg-12">
<!-- col-lg-12 start here -->
<div class="panel panel-danger toggle panelMove panelClose panelRefresh">
    <!-- Start .panel -->
<div class="panel-heading" style="background-color:red;">

    <!-- <a class="btn btn-success btn-block panel-title" style="width: 70px; height: 0px;" href="<?php echo base_url("content/create_mntr_lelang") ?>">
                <i class="fa fa-plus"></i>
                Create
            </a> -->
         <h4 class="panel-title">Data Restrukturisasi</h4> 
</div>
<div class="scrollmenu">
       <div id="buttons" title="download file"></div>
<div class="panel-body">
<div class="">
  <div>
    <div>
    
    <a href="<?php echo base_url('Restru/createxls'); ?>" button type="button" style="background-color: #0bacd3;" class="btn btn-primary">Download Excel</button></a>
   <!-- button type="button" class="btn  open-modal btn-primary">create Lelang</button> -->
   </div>
   </div>
   <br>
   <br>

   <?php echo form_open("Restru/delete_data_restru", "id='delet'") ?>

<table id="example"  class="table nowrap table-bordered" style="width:100%;border: 2px;">
<thead>
            <tr >    
                <!--<th class="text-center"><button type="submit" class="btn btn-danger p-1"><i class="fa fa-trash-o"></i></button></th>-->
           <!--  <th>Aksi</th> -->
           <th class="text-center"><button onclick="delet()" type="submit" style="margin-top: 10px;" class="btn btn-danger btn-xs mr5 mb10"><i class="fa fa-trash-o"></i></button></th>
                        <th style="min-width: 135px;">Nama Nasabah</th>
                        <th>Cif</th>
                        <th>Tgl Visit</th>
                       
                        
                        <!--<th>Aksi</th>-->
                    </tr>
</thead>




                        <tbody>
                          <?php foreach ($debitur as $item) { ?> 
                           
                            <tr>
                                        <td class="text-center">
                                            <input type="checkbox" title="delete" value="<?php echo $item->f_cif ?>" name="idnya[]"/>
                                            <i class="-paintbrush"></i> 
                                            <a title="Edit" 
                                               href="<?php echo base_url
                                        ("Restru/testing/".$item->f_cif)
                                    ?>">
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                            </a>
                                        
                                        </td>
                     
                            <td>
                            <?php 
                              if(!empty($item->f_cif))
                              {
                                echo $item->f_nama_nasabah;
                                
                              }else {
                                echo '';
                              }      
                            
                            ?>
                            </td>
                            <td><?php 
                            if(!empty($item->f_cif))
                              {
                                echo $item->f_cif;
                                  
                              }else {
                                echo '';
                              }  
                              ?>
                            </td>
                          
							<td>
							<?php echo $item->f_tgl_visit ?>
                            </td>
                        </tr>                   
                    <?php } ?>
                        </tbody>
</table>
 <?php echo form_close() ?>

              
            


                

                <div class="modal fade" id="ModalAgent1" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                    <form action="<?php echo base_url("Restru/updatestatusRestru") ?>" method="post" enctype="multipart/form-data">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                                    </button>
                                    <h4 class="modal-title" id="myModalLabel2">Modal title</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="Username">CIF</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="cif" id="cif"  class="form-control"  value="<?php echo $item->NomorNasabah ?>" autocomplete="off" required="" placeholder="Username" >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="Username">Document</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                     <input type="file" multiple="multiple"  id="myfile" class="form-control" name="myfile[]">
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="row clearfix">
                        <div class="col-lg-4 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="Email">Status Restru</label>
                        </div>
                        <div class="col-lg-7 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                   <select name="status_restru" id="status_restru" class="fancy-select2 form-control"> 
                                   <option value="">Select</option>           
                                   <?php foreach ($parameter as $item) { ?>                                  
                                    <option value="<?php echo $item->f_code?>"><?php echo $item->f_desc ?></option>                             
                                <?php } ?> 
                                    </select>
                            </div>
                        </div>
                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" name="fileSubmit" value="UPLOAD" class="btn btn-primary">Save changes</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>


<script src="<?php echo base_url('assets/jquery/jquery-2.2.3.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>

<script type="text/javascript">$(document).ready(function () {
        $('#example').DataTable({
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
             columnDefs : [
        { targets: 0, sortable: false},
    ],
    order: [[ 1, "asc" ]]
        });
    });
</script>
 <script type="text/javascript">
    $(document).ready(function () {
        //$('.fancy-select2').fancySelect();
    //var mySelect = $('#status_restru');
        //mySelect.fancySelect().on('change.fs', function () {
            //$(this).trigger('change.$');
        //}); // trigger the DOM's change event when changing FancySelect


        $('#ModalAgent1').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal = $(this);

            //alert(div.data('sp'));

            // Isi nilai pada field
            modal.find('#cif').attr("value", div.data('cif1'));
            modal.find('#status_restru').val(div.data('status_res'));
            //$('#jenissp').val(div.data('sp'));

            // $('#statushj').val('2');

            $('#status_restru').trigger('change');//.change();//trigger('update.fs');//.selectpicker("refresh");
            // console.log($('#jenissp1').val());

        });

    });
</script>
<script type="text/javascript">

function delet() {
    //event.preventDefault(); // prevent form submit
    var form = $('#delet');//event.target.form; // storing the form
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
                timer: 11500,
                onOpen: function () {
                    setTimeout(function () {
                        swal.close()
                    }, 21000)
                }
            });

        }
    })

}
function formsubmit(b) {
    $('#nik').val(b);
    $('#edit').submit();
}
function formsubmit_detail(c) {
    $('#nik1').val(c);
    $('#detail').submit();
}
//    var table = $('#example').DataTable()

</script>
<!--     <script type="text/javascript">
        //    var table = $('#example').DataTable();

        var table = $('#example').DataTable({
            columnDefs: [
                {targets: 0, sortable: false},
            ],
            order: [[1, "asc"]]
        })


        var buttons = new $.fn.dataTable.Buttons(table, {

            buttons: [

                {
                    extend: 'excelHtml5', exportOptions: {
                        columns: [1, 2, 3, 4, 5, 6, 7]

                    },
                    title: 'Data Regular'
                },
                {
                    extend: 'csvHtml5',
                    title: 'Data Regular'
                }

            ]
        }).container().appendTo($('#buttons'));

    </script> -->

</body>
