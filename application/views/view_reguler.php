<?php echo $this->session->flashdata('message'); ?>
<head>  
    <!--   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"> -->
    <style type="text/css">
        .scrollmenu {  
            overflow: auto;  
            white-space: nowrap;}.open-modal {  
            cursor: pointer;  /*color:#;*/  
            font-size: 15px;}
        #mask {  position: fixed;  
                 top: 0; 
                 left: 0;  
                 width: 100%; 
                 height: 100%;  
                 display: none;    
                 background: black;  
                 z-index: 98;  
                 opacity: 0.8;}
        .modal {  
            background-color: #fff;  
            display: none;  
            position: fixed;  
            top: 50%;  
            left: 50%;  
            width: 700px;  
            height: 350px;  
            margin-left: -200px;  
            margin-top: -150px;  
            padding: 50px;  
            z-index: 99;}
        .close-modal {  
            color:  #000;  
            text-decoration: none;  
            float: right;  
            position: absolute;  
            top: 10px;  
            right: 20px}
        @media (max-width : 37.500rem) {  
            .modal {    
                top: 0;    
                left: 0;    
                width: 100%;    
                height: 100%;    
                margin: 0;    
                padding: 1.250rem  }  
            .close-modal{    
                display: block;   
                position: relative;   
                padding: 5px 10px 20px 0  }   
            .modal-content{    
                clear: both;    
                padding-right: 1.25rem  } }    
            </style>
        </head>
        <body>
            <div class="col-lg-12">
        <!-- col-lg-12 start here -->
        <div class="panel panel-danger toggle panelMove panelClose panelRefresh">    
            <!-- Start .panel -->
            <div class="panel-heading" style="background-color: red ">    
            <!-- <a class="btn btn-success btn-block panel-title" style="width: 70px; height: 0px;" href="<?php echo base_url("content/create_mntr_lelang") ?>">                
            <i class="fa fa-plus"></i>                Create            </a> -->         
                <h4 class="panel-title"><i class="glyphicon glyphicon-headphones" ></i> Data Plan Pelunasan</h4> 
            </div>
            <div class="scrollmenu">
                <div class="panel-body"> 
                    <div class="">   
<!--                        <a href="<?php echo base_url("controller_assignment/read_as_debitur") ?>" button type="button" style="background-color: #0bacd3;" class="btn btn-primary">Create Assigment</a>   
                        <br>   
                        <br>-->
						<div>
                                <a href="<?php echo base_url("Regular/createdataplanpelunasan_excel"); ?>" button type="button" style="background-color: #0bacd3;" class="btn btn-primary">Download Excel</button></a>
                        </div>
						<br>
                        <table id="example"  class="table nowrap table-bordered" style="width:100%;border: 2px;">
                            <thead> 
                                <tr>          
                                <!--<th class="text-center">Pilih</th>-->      
                                    <th >Action</th>      
                                    <th style="min-width: 150px;">Tanggal Visit Terakhir</th>      
                                    <th style="min-width: 150px;">Recod Visit</th>      
                                    <th style="min-width: 150px;">Nama</th>      
                                    <th style="min-width: 150px;">Cabang</th>      
                                    <th style="min-width: 150px;">Cif</th>      
                                    <th style="min-width: 150px;">DPD</th> 
                                    <th style="min-width: 150px;">Action Plan</th> 
                                    <th style="min-width: 150px;">Status</th> 
                                    <th style="min-width: 150px;">Hasil</th> 
                                </tr>
                            </thead> 
                            <tbody><?php foreach ($debitur as $item) { ?>    
                                    <tr>                    
                                    <!--<td class="text-center"><input type="checkbox" value="<?php echo $item->NomorNasabah ?>" name="idnya[]"/></td>-->        
                                        <td><center>
                                            <form id="<?php echo $item->f_cif ?>" name="userdetails1" action="<?php echo base_url("regular/viewdetail") ?>" method="post">
                                                <input type="hidden" name="cif" id="cif" value="<?php echo $item->f_cif ?>">
                                                <input type="hidden" name="idkj" id="idkj" value="<?php echo $item->f_id ?>">
                                            </form> 
                                            <a href="javascript: formsubmit('<?php echo $item->f_cif ?>')" ><i class="fa fa-eye"></i></a>
                                </center></td>        
                                <td><?php echo $item->tgl_terakhirkunjungan ?></td>        
                                <td><?php echo $item->jmlh_recod ?></td>        
                                <td><?php echo $item->f_nama_nasabah ?></td>        
                                <td></td>        
                                <td><?php echo $item->f_cif ?></td>        
                                <td></td>        
                                <td><?php echo $item->f_actionplan ?></td>        
                                <td></td>        
                                <td></td>        
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
    <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js') ?>">
    </script><script type="text/javascript">
        $(document).ready(function () {
            $('#example').DataTable({
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                //"scrollX": true,   
                "columnDefs": [{
                        "targets": [0], //first column / numbering column
                        "orderable": false //set not orderable

                    }]
               // "order": [[1, "asc"]]
            });
        });
        
        function formsubmit(b){
            $('#'+b).submit();
        }
    </script>
</body>