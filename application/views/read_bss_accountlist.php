<!DOCTYPE html>

<html>

    <head> 

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Simple Serverside jQuery Datatable</title>

    <link rel="stylesheet" type="text/css" href="">



<style>



</style>



    </head> 

<body>

    

<div class="col-lg-12">

<!-- col-lg-12 start here -->

<div class="panel panel-danger toggle panelMove panelClose panelRefresh">

<div class="panel-heading" style = "background-color : red;">
<h4 class="panel-title"> Data Account List</h4>
</div>
    <div class="panel-body">

        <br />
		<a style=" margin-top: 15px;  margin-bottom: 20px;" href='<?php echo base_url("Content/excel_countlist"); ?>' type="button" style="background-color: #0bacd3; height: 29px" class="btn btn-primary"><i class="fa  fa-download"></i>  Download Excel</a>
        <div class="table-responsive">

        <table id="table" class="table table-bordered table-striped" cellspacing="0" width="50%">

            <thead>

                <tr>

                    <!-- <th>Chek</th> -->

<th>No</th>
<th style="min-width: 135px;">Nomor Nasabah</th>
<th style="min-width: 135px;">Nomor Rekening</th>
<th style="min-width: 135px;">No LD </th>
<th style="min-width: 220px;">Nama Debitur</th>
<th style="min-width: 135px;">Tipe Fasilitas</th>
<th style="min-width: 135px;">Ket. Fasilitas</th>
<th style="min-width: 135px;">Kode Cabang</th>
<th style="min-width: 135px;">Nama cabang</th>
<th style="min-width: 135px;">Cabang Mapping</th>
<th style="min-width: 135px;">Plafond</th>
<th style="min-width: 135px;">Baki Debet</th>
<th style="min-width: 135px;">Angsuran</th>
<th style="min-width: 135px;">Due Bunga</th>
<th style="min-width: 135px;">Due Pokok</th>
<th style="min-width: 135px;">Denda</th>
<th style="min-width: 135px;">Available Funds</th>
<th style="min-width: 135px;">Lock Amt</th>
<th style="min-width: 135px;">Int Rate</th>
<th style="min-width: 135px;">Kolektibiltas</th>
<th style="min-width: 135px;">DPD Awal Bulan Perloan</th>
<th style="min-width: 135px;">DPD Saat Ini Perloan</th>
<th style="min-width: 135px;">DPD Awal Bulan Obl</th>
<th style="min-width: 135px;">Bucket Last Obl</th>
<th style="min-width: 135px;">DPD Saat Ini Obl</th>
<th style="min-width: 135px;">Bucket Now Obl</th>
<th style="min-width: 135px;">DPD EOM</th>
<th style="min-width: 135px;">Estimasi Bucket EOM</th>
<th style="min-width: 135px;">Kode AO</th>
<th style="min-width: 135px;">Nama AO</th>
<th style="min-width: 135px;">Date Approved</th>
<th style="min-width: 135px;">Start Date</th>
<th style="min-width: 135px;">Date Expired PT</th>
<th style="min-width: 135px;">Date Expired</th>
<th style="min-width: 135px;">Flag Resc</th>
<th style="min-width: 135px;">Flag Probiz</th>            

                </tr>

            </thead>

            <tbody>

            </tbody>

 



        </table>

        </div>

    </div>

</div>

</div>

    

 

<script src="<?php echo base_url('assets/jquery/jquery-2.2.3.min.js')?>"></script>

<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>

 

<script type="text/javascript">

 

var table;

 

$(document).ready(function() {

 

    //datatables

    table = $('#table').DataTable({ 

 

        "processing": true, //Feature control the processing indicator.

        "serverSide": true, //Feature control DataTables' server-side processing mode.

        "order": [], //Initial no order.

 

        // Load data for the table's content from an Ajax source

        "ajax": {

            "url": "<?php echo site_url('content/ajax_list') ?>",

            "type": "POST",





        },

        //Set column definition initialisation properties.

        "columnDefs": [

        { 

            "targets": [ 0 ], //first column / numbering column

            "orderable": false, //set not orderable

            'checkboxes': {

               'selectRow': true

            }

        },

      

        ],

          'select': {

         'style': 'multi'

      },

         "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],

        

    });

 

});

</script>



 

</body>

</html>