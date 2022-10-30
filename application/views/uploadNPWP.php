<html>
    <body>
    <div class="container-fluid">
        <form method="post" action="<?php echo base_url('content/uploadfileNpwp');?>" 
            enctype="multipart/form-data">
                
                <div class="row form-group" >
                    <div class="col col-md-3">
                        <label for="f_agentid">ID Agen</label>
                    </div>
                    <div class="col-12 col-md-2">
                        <input readonly value="<?php echo $agent->f_agentid ?>" type="text" class="form-control" id="f_agentid" name="f_agentid">
                        <?php echo form_error('f_agentid', "<span style='font-size: 10pt; color: red'>", "</span>") ?>
                    </div>
                    
                </div>
                <div class="row form-group" >
                    <div class="col col-md-3">
                        <label for="f_agentid">File NPWP</label>
                    </div>
                        <div class="col-12 col-md-9">                      
                            <input type="file" name="file"/> 
                   </div>
               </div>
            <center>
            <div >
            <button type="submit" class="btn btn-primary" >Upload data</button>
            </div>
            </center>
        </form> 
    </div>
    </body>
</html>
