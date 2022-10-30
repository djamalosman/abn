<?php echo $this->session->flashdata('message'); ?><head>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <style type="text/css">
        .scrollmenu {
	overflow: auto;
            white-space: nowrap;        }
    </style></head><body>
    <div class="col-lg-12">
        <!-- col-lg-12 start here -->
        <div class="panel panel-danger toggle panelMove panelClose panelRefresh">
            <!-- Start .panel -->
            <div class="panel-heading" style="background-color:red;">
    <!-- <a class="btn btn-success btn-block panel-title" style="width: 70px; height: 0px;" href="<?php echo base_url("content/create_mntr_lelang") ?>">                <i class="fa fa-plus"></i>                Create            </a> -->
                <h4 class="panel-title">Basic Data Assignment</h4>
             </div>
            <div class="scrollmenu">
                <div class="panel-body">
                    <div class="">
    <!-- <a href="<?php echo base_url("content/create_mntr_lelang") ?>" button type="button" style="background-color: #0bacd3;" class="btn btn-primary btn-xs mr2 mb10">Create Lelang</button></a> -->
                        <center>
      <!--   <input type="text" readonly="" style="border 0px;" value="<?php //echo $detailcollector->f_agentname  ?>" name=""> -->
                        </center>
                        <br>
                        <br>
                        <table id="example"  class="display nowrap table-bordered" style="width:100%;border: 2px;">
                            <thead>
                                <tr>
                                        <!--<th style=" min-width: 100px;"> Pilih</th>-->
                                    <th> No</th>
                                    <th style=" min-width: 150px;">Tanggal Penugasan</th>
                                    <th style=" min-width: 150px;"> Cabang</th>
                                    <th style=" min-width: 150px;">Agent Name</th>
                                    <th style=" min-width: 150px;">No Cif</th>
                                    <th style=" min-width: 150px;">Nama Nasabah</th>
                                    <th style=" min-width: 150px;">DPD EOM</th>
                                    <th style=" min-width: 150px;">DPD </th>
                                    <th style=" min-width: 150px;">Bucket</th>
                                    <th style=" min-width: 150px;">Baki Debit</th>
                                    <th style=" min-width: 350px;">Alamat Tagih</th>
                                    <th style=" min-width: 150px;">No Telpon</th>
                                    <th style=" min-width: 150px;">Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $a = 1; foreach ($detailcollector as $item) { ?>
                                    <tr>
                                                <td><center><?php echo $a ?></center></td>
                                        <td><?php echo $item->f_date_cerate?></td>
                                        <td><?php echo $item->cabang ?></td>
                                        <td><?php echo $item->f_agentname ?></td>
                                        <td><?php echo $item->NomorNasabah ?></td>
                                        <td><?php echo $item->NamaDebitur ?></td>
                                        <td><?php echo $item->cust_dpd ?></td>
                                        <td><?php echo $item->JmlHariTunggakan ?></td>
                                        <td><?php echo $item->COL ?></td>
                                        <td><?php echo $item->BakiDebet ?></td>
                                        <td><?php echo $item->HOME_STREET . ", Rt" . $item->HOME_RT . " Rw" . $item->HOME_RW . "," . $item->HOME_KELURAHAN . " ," . $item->HOME_KECAMATAN . "," . $item->HM_TOWN_COUNTRY ?></td>
                                        <td><?php echo $item->SMS_1 ?></td>
                                        <td><?php echo $item->EMAIL_1 ?></td>
                                    </tr>
                                                            <?php $a++; } ?>
                            </tbody>
                        </table>                    
</div>                
</div>            
</div>        
</div>    
</div>    
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>    
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>    
<script type="text/javascript">        
$(document).ready(function () {            
$('#example').DataTable({                
"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]            
});        
});   
 </script>
</body>