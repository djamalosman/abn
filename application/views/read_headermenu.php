<?php echo $this->session->flashdata('message'); ?>
<div class="container-fluid">
    <form action="<?php echo base_url("content/excel_upload_agent_data/");?>" method="post" enctype="multipart/form-data">
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
    <?php echo form_open("menu/delete_multiheader", "id='swa-confirm'") ?>
    <div class="row">
        <div class="border-primary col-xs-12 col-md-auto p-1">
            <a class="btn btn-success btn-block" href="<?php echo base_url("menu/create_headermenu") ?>">
                <i class="fa fa-plus"></i>
                 Tambah header menu
            </a>
        </div>
        
        <div class="border-primary col-xs-12 col-md-auto p-1">
            <a class="btn btn-success btn-block" href="<?php echo base_url("als_asset/excel/form_agent.xlsx") ?>">
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
                <th class="text-center"><button type="submit" class="btn btn-danger px-2 py-0"><i class="fa fa-trash-o"></i></button></th>
                <th>Aksi</th>
                <th>Menu ID</th>
                <th>Menu Name</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($headermenu as $item) { ?>
                <tr>			
                    <td class="text-center"><input type="checkbox" value="<?php echo $item->f_menuid ?>" name="idnya[]"/></td>
                    <td>
                        <a title="Edit" href="<?php echo base_url("menu/update_headermenu/".$item->f_menuid) ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                    </td>
                    <td><?php echo $item->f_menuid ?></td>
                    <td><?php echo $item->f_menuname ?></td>
                    <td><?php echo $item->f_status=="1" ? "Aktif" : "Tidak aktif" ?></td>
                </tr>                            
            <?php } ?>
        </tbody>
    </table>    
    </div>
    <?php echo form_close() ?>
</div>