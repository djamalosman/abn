<?php echo $this->session->flashdata('message'); ?>
<div class="container-fluid">       
<!--    <div class="row">
        <div class="border-primary col-xs-12 col-md-auto p-1">
            <a class="btn btn-success btn-block" href="<?php echo base_url("content/create_as_data") ?>">
                <i class="fa fa-plus"></i>
                Transfer Assignment
            </a>
        </div>
        
        <?php echo form_open("content/bg_upload/t_assignheader") ?>
        <div class="border-primary col-xs-12 col-md-auto p-1">
            <button type="submit" class="btn btn-success btn-block show-load " >
                <i class="fa fa-cogs"></i>
                Proses
            </button>        
        </div>
        <?php echo form_close() ?>
        
    </div>    -->
    
    
    <?php echo form_open("content/delete_multi_as_data", "id='swa-confirm'") ?>    
    </br></br>
    
    <div style="overflow-x: scroll; " class="w-100">    
    <table class="table table-striped table-bordered data">
        <thead>
            <tr>
                <!--<th class="text-center"><button type="submit" class="btn btn-danger p-1"><i class="fa fa-trash-o"></i></button></th>-->
                <th>Assignment</th>
                <th>Tgl Tugas</th>
                <th>Agen</th>
                <th>CIF</th>
                <th>No. Rekening</th>
                <th>Pinjaman</th>
                <th>Product</th>
                <th>Status</th>
                <!--<th>Aksi</th>-->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($assignment as $item) { ?>
                <tr>			
                    <!--<td class="text-center"><input type="checkbox" value="<?php // echo $item->f_assignid ?>" name="idnya[]"/></td>-->
                    <td><?php echo $item->f_assignid ?></td>
                    <td><?php echo $item->f_assigndate ?></td>
                    <td><?php echo $item->f_agentid ?></td>
                    <td><?php echo $item->f_cif ?></td>
                    <td><?php echo $item->f_acctno ?></td>
                    <td><?php echo $item->f_loanid ?></td>
                    <td><?php echo $item->f_productid ?></td>
                    <td><?php echo $item->f_status ?></td>
<!--                    <td>
                        <a title="Edit" href="<?php echo base_url("content/update_as_data/".$item->f_assignid) ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                    </td>-->
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