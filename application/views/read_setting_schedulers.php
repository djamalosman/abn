<?php echo $this->session->flashdata('message'); ?>
<div class="container-fluid">  
    <form action="<?php echo base_url("content/excel_upload/t_schedulers/setting/read_schedulers");?>" method="post" enctype="multipart/form-data">
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
    
    <?php echo form_open("setting/delete_multi_setting_scheduler", "id='swa-confirm'") ?>
    <div class="row">
        <div class="border-primary col-xs-12 col-md-auto p-1">
            <a class="btn btn-success btn-block" href="<?php echo base_url("setting/create_schedulers") ?>"><i class="fa fa-plus"></i> Tambah Scheduler</a>
        </div>
        
<!--        <div class="border-primary col-xs-12 col-md-auto p-1">
            <a class="btn btn-success btn-block" href="<?php echo base_url("als_asset/excel/form_setting_scheduler.xlsx") ?>">
                <i class="fa fa-download"></i>
                Download Format
            </a>    
        </div>
        
        <div class="border-primary col-xs-12 col-md-auto p-1">
            <button type="button" data-toggle="modal" data-target="#ModalAgent" class="btn btn-success btn-block" >
                <i class="fa fa-upload"></i>
                Import
            </button>         
        </div>-->
    </div>
    
    </br></br>
    <div style="overflow-x: scroll; " class="w-100">
    <table class="table table-striped table-bordered data">
        <thead>
            <tr>	
                <th class="text-center"><button type="submit" class="btn btn-danger px-1 py-0"><i class="fa fa-trash-o"></i></button></th>
                <th>Aksi</th>                
                <th>#ID</th>
                <th>Tanggal Mulai</th>
                <th>Jam Mulai</th>
                <th>Counter</th>
                <th>Waktu Selesai</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($schedulers as $item) { ?>
                <tr>			
                    <td class="text-center"><input type="checkbox" value="<?php echo $item->f_id ?>" name="idnya[]"/></td>
                    <td>
                        <a title="Edit" href="<?php echo base_url("setting/update_setting_schedulers/".$item->f_id) ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                    </td>
                    <td><?php echo $item->f_id ?></td>
                    <td><?php echo DateTime::createFromFormat('Y-m-d', $item->f_startingdate)->format('D, d M Y') ?></td>
                    <td><?php echo $item->f_startingtime ?></td>
                    <td><?php echo $item->f_refreshcounter ?></td>
                    <td><?php echo $item->f_finishtime ?></td>
                </tr>                            
            <?php } ?>
        </tbody>
    </table>    
    </div>
    <?php echo form_close() ?>
</div>