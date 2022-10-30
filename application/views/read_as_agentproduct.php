<?php echo $this->session->flashdata('message'); ?>
<div class="container-fluid">       
    
    <form action="<?php echo base_url("content/excel_upload/t_paramassign/content/read_as_agentproduct");?>" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="ModalAgent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Upload Data Agent</h5>
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
    
    <?php echo form_open("content/delete_multi_as_agentproduct", "id='swa-confirm'") ?>
    <div class="row">
        <div class="border-primary col-xs-12 col-md-auto p-1">
            <a class="btn btn-success btn-block" href="<?php echo base_url("content/create_um_datakaryawan") ?>">
                <i class="fa fa-plus"></i>
                Tambah Parameter
            </a>
        </div>
        
        <div class="border-primary col-xs-12 col-md-auto p-1">
            <a class="btn btn-success btn-block" href="<?php echo base_url("als_asset/excel/form_agent_product.xlsx") ?>">
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
   
 
    
    </br></br>
    
    <div style="overflow-x: scroll; " class="w-100">    
    <table class="table table-striped table-bordered data">
        <thead>
            <tr>	
                <th class="text-center"><button type="submit" class="btn btn-danger p-1"><i class="fa fa-trash-o"></i></button></th>
                <th>Aksi</th>
                <th>Link ID</th>
                <th>Product ID</th>
                <th>DPD Awal</th>
                <th>DPD Akhir</th>
                <th>Cycle Awal</th>
                <th>Cycle Akhir</th>
                <th>Catatan</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($assignment as $item) { ?>
                <tr>			
                    <td class="text-center"><input type="checkbox" value="<?php echo $item->f_linkid ?>" name="idnya[]"/></td>
                    <td>
                        <a class="disabled" title="Edit" href="<?php echo base_url("content/update_as_data/".$item->f_linkid) ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        <!--<a title="Detail" href="#"><i class="fa fa-list" aria-hidden="true"></i></a>-->
                    </td>                    
                    <td><?php echo $item->f_linkid ?></td>
                    <td><?php echo $item->f_productid ?></td>
                    <td><?php echo $item->f_dpdawal ?></td>
                    <td><?php echo $item->f_dpdakhir ?></td>
                    <td><?php echo $item->f_cycleawal ?></td>
                    <td><?php echo $item->f_cycleakhir ?></td>
                    <td><?php echo $item->f_notes ?></td>
                </tr>                            
            <?php } ?>
        </tbody>
    </table> 
    </div>
    <?php echo form_close() ?>
</div>

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
//       $('.tmpl-loading').hide();
       $('.show-load').click(function(){
           $('.tmpl-loading').toggle();
           
           setTimeout(function() {
            $('.tmpl-loading').toggle();
           }, 5000);           
       });
</script>