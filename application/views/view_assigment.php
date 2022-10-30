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
            <div class="panel-heading" style="background-color:red;">    
            <!-- <a class="btn btn-success btn-block panel-title" style="width: 70px; height: 0px;" href="<?php echo base_url("content/create_mntr_lelang") ?>">                
            <i class="fa fa-plus"></i>                Create            </a> -->         
                <h4 class="panel-title">Assignment Debitur</h4> 
            </div>
            <div class="scrollmenu">
                <div class="panel-body"> 
                    <div class="">   
						<a href="<?php echo base_url("controller_assignment/read_as_debitur") ?>" button type="button" style=" margin-top: 15px;  margin-bottom: 20px;" class="btn btn-success"><i class="fa  fa-plus"></i>  Create Assigment</a>   
						<a style=" margin-top: 15px;  margin-bottom: 20px;" href='<?php echo base_url("Downloadexcel/excel_assignmentcollector"); ?>' type="button" style="background-color: #0bacd3; height: 29px" class="btn btn-primary"><i class="fa  fa-download"></i>  Download Excel</a>
        <div class="table-responsive">
						<br>   
                        <br>
                        <table id="example"  class="table nowrap table-bordered" style="width:100%;border: 2px;">
                            <thead> 
                                <tr>          
                                <!--<th class="text-center">Pilih</th>-->      
                                    <th>No</th>      
                                    <th style="min-width: 150px;">Cabang</th>      
                                    <th style="min-width: 150px;">Kode Cabang</th>      
                                    <th style="min-width: 150px;">Agent Id</th>      
                                    <th style="min-width: 150px;">Agent</th>      
                                    <th style="min-width: 150px;">Tanggal Penugasan</th>      
                                    <th style="min-width: 150px;">Cycle</th>      
                                    <th style="min-width: 150px;">CIF</th>      
                                    <th style="min-width: 150px;">Account Number</th>      
                                    <th style="min-width: 150px;">Nama Customer</th>      
                                    <th style="min-width: 150px;">Kode Pinjaman</th>      
                                    <th style="min-width: 150px;">Produk ID</th>      
                                    <th style="min-width: 150px;">Nama Produk</th>      
                                    <th style="min-width: 150px;">DPD</th>
                                </tr>
                            </thead> 
                            <tbody><?php $a = 1; foreach ($assignment as $item) { ?>    
                                    <tr>                    
                                    <!--<td class="text-center"><input type="checkbox" value="<?php echo $item->NomorNasabah ?>" name="idnya[]"/></td>-->        
                                        <td><center><?php echo $a++ ?></center></td>        
                                        <td><?php echo $item->cabang ?></td>        
                                        <td><?php echo $item->KodeCabang ?></td>        

                                        <td><?php echo $item->f_agentid ?></td>        
                                        <td><?php echo $item->f_agentname ?></td>        
                                        <td><?php echo $item->f_tgl_tugas ?></td>        
                                        <td><?php echo $item->cycle ?></td>        
                                        <td><?php echo $item->NomorNasabah ?></td>        
                                        <td><?php echo $item->NomorRekening ?></td>        
                                        <td><?php echo $item->NamaDebitur ?></td>        
                                        <td><?php echo $item->ID ?></td>        
                                        <td><?php echo $item->FacilityType ?></td>        
                                        <td><?php echo $item->ket_facility ?></td>        
                                        <td><?php echo $item->JmlHariTunggakan ?></td>            
                                    </tr>                            
                                <?php } ?>
                            </tbody>
                        </table>
                        <div id="mask">

                        </div>
                        <div class="modal">  
                            <a class="close-modal" href="javascript:void(0)">    
                                <i class="fa fa-times"></i>  </a>  
                            <div class='modal-content'>          
                                <div class="modal-header">                
                                    <h5 class="modal-title">search Dedibutr</h5>            
                                </div>                
                                <div class="modal-body">                    
                                    <form action="<?php echo base_url("content/create_mntr_lelang") ?>" method="GET">                           
                                        <div class="form-group">                        
                                            <label class="control-label col-xs-3" >LOAN</label>                        
                                            <div class="col-xs-8">                            
                                                <input id="myInput"  name="myCountry" autocomplete="off"  class="form-control" type="text" placeholder="..." required>                        
                                            </div>                    
                                        </div>                                   
                                        <div class="modal-footer">                  
                                            <button type="submit">search</button>                    
                                            <!-- <a href="<?php echo base_url("content/create_mntr_lelang") ?>" type="btn-primary">search</button></a> -->                
                                        </div>
                                    </form>  
                                </div>                  

                            </div>
                        </div>
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
            })
        });
    </script>
</body>