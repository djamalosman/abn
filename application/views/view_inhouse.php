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
                <h4 class="panel-title"><i class="glyphicon glyphicon-headphones" ></i> Data In House</h4> 
            </div>
            <div class="scrollmenu">
                <div class="panel-body"> 
                    <div class="">   
<!--                        <a href="<?php echo base_url("controller_assignment/read_as_debitur") ?>" button type="button" style="background-color: #0bacd3;" class="btn btn-primary">Create Assigment</a>   
                        <br>   
                        <br>-->
						<div>
                                <a href="<?php echo base_url("downloadexcel/datainhouse_excel"); ?>" button type="button" style="background-color: #0bacd3;" class="btn btn-primary">Download Excel</button></a>
                            </div>
							<br>
							
                        <table id="example"  class="table nowrap table-bordered" style="width:100%;border: 2px;">
                            <thead> 
                                <tr>          
                                <!--<th class="text-center">Pilih</th>-->      
                                    <th >Action</th>      
                                    <th style="min-width: 150px;">Tanggal Terakhir Di Hubungi</th>      
                                    <th style="min-width: 150px;">Jumlah Di Hubungi</th>      
                                    <th style="min-width: 150px;">Nama</th>      
                                    <th style="min-width: 150px;">Cabang</th>      
                                    <th style="min-width: 150px;">Cif</th>      
                                    <th style="min-width: 150px;">DPD</th> 
                                </tr>
                            </thead> 
                            <tbody><?php foreach ($cad as $item) { ?>    
                                    <tr>                    
                                    <!--<td class="text-center"><input type="checkbox" value="<?php echo $item->NomorNasabah ?>" name="idnya[]"/></td>-->        
                                        <td><center>
                                    <!--<a type="button" href="<?php echo ('inputinhouse/' . $item->NomorNasabah ); ?>" ><i class="glyphicon glyphicon-earphone"></i></a>-->  
                                    <a type="button" href="<?php echo ('inputinhouse/' . $item->NomorNasabah ); ?>" ><i class="fa fa-eye"></i></a>
                                </center></td>        
                                <td><?php echo $item->tglcall ?></td>        
                                <td><?php echo $item->jumlahcall ?></td>        
                                <td><?php echo $item->NamaDebitur ?></td>        
                                <td><?php echo $item->cabang ?></td>        

                                <td><?php echo $item->NomorNasabah ?></td>        
                                <td><?php echo $item->dpd ?></td>        
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
    <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js') ?>"></script>
	
	<script type="text/javascript">
        $(document).ready(function () {
            $('#example').DataTable({
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                //"scrollX": true,   
                "columnDefs": [{
                        "targets": [0], //first column / numbering column
                        "orderable": false //set not orderable

                    }],
                "order": [[1, "asc"]]
            });
        });
    </script>
</body>