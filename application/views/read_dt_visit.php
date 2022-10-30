<!--Demo question asked on
https://qawithexperts.com/questions/228/how-to-export-html-table-to-pdf-excel-in-jquery-datatable -->
<body>
    <div class="col-lg-12">
        <!-- col-lg-12 start here -->
        <div class="panel panel-danger toggle panelMove panelClose panelRefresh">
            <!-- Start .panel -->
            <div class="panel-heading" style ="background-color : red;">

    <!-- <a class="btn btn-success btn-block panel-title" style="width: 70px; height: 0px;" href="<?php echo base_url("content/create_mntr_lelang") ?>">
                <i class="fa fa-plus"></i>
                Create
            </a> -->
                <h4 class="panel-title">Data Visit</h4> 
            </div>
            <div class="scrollmenu">
                <!--<div  style = "margin-top : 30px; margin-left : 10px;" id="buttons" title="download file"></div>-->
                <div class="panel-body">
				<div class="form-group" >
                             <div>
                                <a href="<?php echo base_url("downloadexcel/excel_datavisit"); ?>" button type="button" style="background-color: #0bacd3;" class="btn btn-primary">Download Excel</button></a>
                            </div>
                </div>
                    <div class="">
                        <div>
                            <div hidden="">
                                <a href="<?php echo base_url("content/create_um_datakaryawan") ?>" button type="button" style="background-color: #0bacd3;" class="btn btn-primary"> Create Employee</button></a>
                                <!-- button type="button" class="btn  open-modal btn-primary">create Lelang</button> -->
                            </div>
                        </div>
                        <br>
                        <br>

                        <table id="example" class="table nowrap table-bordered" style="width:100%;border: 2px;">
                            <thead>
                                <tr >    
                                    <!--<th class="text-center"><button type="submit" class="btn btn-danger p-1"><i class="fa fa-trash-o"></i></button></th>-->
                                    <th >Aksi</th>
                                    <th>Tujuan</th>
                                    <th style="min-width: 135px;">Nama Nasabah</th>
                                    <th>Cif</th>
                                    <th style="min-width: 135px;">Hasil Kunjungan</th>
                                    <th style="min-width: 135px;">Action Plan</th>
                                    <th style="min-width: 135px;">Date Action Plan</th>
                                    <th style="min-width: 175px;">Keteranggan Hasil Kunjungan</th>
                                    <th style="min-width: 115px;">Tanggal Visit</th>
									<th style="min-width: 135px;">Nama Collector</th>

<!--<th>Aksi</th>-->
                                </tr>
                            </thead>




                            <tbody>
                                <?php foreach ($assignment as $item) { ?> 

                                    <tr>            
                                           <!--<td class="text-center"><input type="checkbox" value="<?php echo $item->id ?>" name="idnya[]"/></td>-->
                                        <td class="text-center">
                                            <form id="<?php echo $item->f_code_image ?>" name="userdetails1" action="<?php echo base_url("generatepdf/collreport") ?>" method="post" target = "_blank">
                                                <input type="hidden" name="cif" id="cif" value="<?php echo $item->f_cif ?>">    
                                                <input type="hidden" name="codeimage" id="codeimage" value="<?php echo $item->f_code_image ?>">    

                                            </form>  
                                            <a title="View Detail" href="<?php echo base_url("Datavisit/viewDetail/" . $item->f_id ."/".$item->f_code_image) ?>"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            <a title="Call Report"  href="javascript: submitform('<?php echo $item->f_code_image ?>')" ><i class="fa fa-print" aria-hidden="true"></i></a>

        <!--href="<?php // echo base_url("generatepdf/collreport/" . $item->f_cif)    ?>"-->
                                        </td>
                                        <td><?php echo $item->f_tujuan ?></td>
                                        <td><?php echo $item->f_nama_nasabah ?></td>
                                        <td><?php echo $item->f_cif ?></td>
                                        <td><?php echo $item->f_hasilkunjungan ?></td>
                                        <td><?php echo $item->f_actionplan ?></td>
                                        <td><?php echo $item->f_date_actionplan ?></td>
                                        <td><?php echo $item->f_keterangan_hasilkunjungan ?></td>
                                        <td><?php echo $item->f_tgl_visit    ?></td>
                                        <td><?php echo $item->agent    ?></td>

                                                <!--<td>-->
                                                    <!--<a title="Edit" href="<?php // echo base_url("content/update_tgh_list/" . $item->f_cif)    ?>"><i class="fa fa-list" aria-hidden="true"></i></a>-->
                                                    <!--<a title="Detail" href="#"><i class="fa fa-list" aria-hidden="true"></i></a>-->
                                        <!--</td>-->
                                    </tr>                   
                                <?php } ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
	<script src="<?php echo base_url('assets/jquery/jquery-2.2.3.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/jquery/jquery-2.2.3.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js') ?>"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#example').DataTable({
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                //"scrollX": true,   
                "columnDefs": [{
                        "targets": [0], //first column / numbering column
                        "orderable": false //set not orderable

                    }]
                //"order": [[, "asc"]]
            });
        });
    </script>
    <script type="text/javascript">
	
        function submitform()
        {
            document.userdetails1.submit();
        }

        //    var table = $('#example').DataTable();
 
       

        function submitform(a)
        {
            $('#'+a).submit();
        }

    </script>

</body>
