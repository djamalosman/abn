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

            <div class="panel panel-default toggle panelMove panelClose panelRefresh">

                <div class="panel-body">

                    <br />

                    <div class="table-responsive">

                        <table id="table" class="table table-bordered table-striped" cellspacing="0" width="50%">

                            <thead>

                                <tr>

                    <!-- <th>Chek</th> -->

                                    <th>NO</th>                

                                    <th style="min-width: 20px;">CIF</th>

                                    <th style="min-width: 200px;">NAMA CUSTOMER</th>

                                    <th>LOANID</th>

                                    <th style="min-width: 20px;">FASILITAS</th>

                                    <th>PLAFOND</th>

                                    <th style="min-width: 200px;">NAMA PRODUK</th>

                                    <th style="min-width: 100px;">TGL AWAL</th>

                                    <th style="min-width: 100px;">TGL AKHIR</th>

                                    <th>CYCLE</th>

                                    <th>TENOR</th>

                                    <th style="min-width: 135px;">KODE CABANG</th>

                                    <th style="min-width: 100px;">KODE POS</th>

                                    <th style="min-width: 100px;">DPD EOM</th>

                                    <th>DPD</th>

                                    <th>BUCKET</th>

                                    <th>FLAG</th>

                                    <th>ANGSURAN</th>

                                    <th style="min-width: 120px;">BAKI DEBET</th>

                                    <th style="min-width: 120px;">T POKOK</th>

                                    <th>BUNGA</th>

                                    <th>DENDA</th>

                                    <th style="min-width: 120px;">TOT TAGIHAN</th>

                                    <th>TABUNGAN</th>

                                    <th style="min-width: 160px;">TGL RESTRUKTUR</th>

                                    <th style="min-width: 160px;">RES TRUKTUR KE</th>

    <!-- <th>TANGGAL UPDATE DATA T24</th> -->

    <!-- <th>TANGGAL UPDATE DWH</th> -->

                                    <th style="min-width: 300px;" >ALAMAT TAGIH</th>

                                    <th style="min-width: 160px;">NO TLP DEBITUR</th>

                                    <th style="min-width: 130px;">NO ACCOUNT</th>

                                    <th>EMAIL</th>

                                    <th>STATUS</th>

                                    <th style="min-width: 140px;">ASSIGN ID</th>



                                </tr>

                            </thead>

                            <tbody>

                            </tbody>





                        </table>

                    </div>

                </div>

            </div>

        </div>





        <script src="<?php echo base_url('assets/jquery/jquery-2.2.3.min.js') ?>"></script>

        <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js') ?>"></script>



        <script type="text/javascript">



            var table;



            $(document).ready(function () {



                //datatables

                table = $('#table').DataTable({

                    "processing": true, //Feature control the processing indicator.

                    "serverSide": true, //Feature control DataTables' server-side processing mode.

                    "order": [], //Initial no order.



                    // Load data for the table's content from an Ajax source

                    "ajax": {

                        "url": "<?php echo site_url('inhouse/ajax_list') ?>",

                        "type": "POST",

                    },

                    //Set column definition initialisation properties.

                    "columnDefs": [

                        {

//                            "targets": [0], //first column / numbering column
//
//                            "orderable": false, //set not orderable
                            
                            "targets": [0],
                                "data": null,
                                "defaultContent": "<button>Click!</button>"


                            'checkboxes': {

                                'selectRow': true
                                
                            }

                        },
                    ],

                    'select': {

                        'style': 'multi'

                    },

                    "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],

                });



            });

        </script>





    </body>

</html>