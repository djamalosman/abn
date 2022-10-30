<script type="text/javascript">
function nav()
   {
   var w = document.myform.mylist.selectedIndex;
   var url_add = document.myform.mylist.options[w].value;
   window.location.href = url_add;
   }
</script>
<div id="" style="position: relative; width: 100%; min-height: 800px;  max-height: 800px;">
    <div style="position: absolute; max-width: 100%; " >
     <div class="row" >
        <div class="border-primary col-xs-12 col-md-auto p-1">
            <a class="btn btn-success btn-block" href="<?php echo base_url("content/read_mrpk") ?>">
                <i class="fa fa-chevron-circle-left"></i>
                back
            </a>
        </div>
        <div class="border-primary col-xs-12 col-md-auto p-1">
            <form name="myform">
<select name="mylist" onChange="nav()">
<option value="<?php echo base_url('content/mrpk_ayda') ?>">MRPK AYDA</option>
<option value="<?php echo base_url('content/read_mrpk') ?>">MRPK Pelunasan</option>
<option value="http://www.wikipedia.org">Wikipedia</option>
<option value="http://www.yahoo.com">Yahoo!</option>
<option value="http://www.deviantart.com">DeviantArt</option>
<option value="http://www.flickr.com">Flickr</option>
<option value="http://www.twitter.com">Twitter</option>
<option value="http://www.tumblr.com">Tumblr</option>
</select>
</form>  
        </div>
    </div>
    <br>
    <br>
    	<div style="overflow-x: scroll; " class="w-80 tabelnya" >
        <table class="table table-striped table-bordered data">
        <thead>
            <tr>  
                <th class="text-center"><button type="submit" class="btn btn-danger p-1"><i class="fa fa-trash-o"></i></button></th>
                <th>Aksi</th>
                <th>Kode Cabang</th>
                <th>CIF</th>
                <th>Account Number</th>
                <th>Nama Customer</th>
                <th>Kode Pinjaman</th>
                <th>Produk ID</th>
                
                <th>DPD</th>
                <th>Cycle</th>
                <th>Agent Id</th>
                <th>Status Special Stage</th>
        </thead>
        <tbody>
          <!-- <?php foreach ($viewstagespecial as $item) { ?>
                <tr>      
                    <td class="text-center"><input type="checkbox" value="<?php echo $item->f_cif ?>" name="idnya[]"/></td>
                    <td>
                        <a title="Edit" href="<?php echo base_url("content/update_tgh_list/".$item->f_cif) ?>"><i class="fa fa-list" aria-hidden="true"></i></a>
                        <!--<a title="Detail" href="#"><i class="fa fa-list" aria-hidden="true"></i></a>-->
                    <!--  </td>                    
                    <td><?php echo $item->f_branch_id ?></td>
                    <td><?php echo $item->f_cif ?></td>
                    <td><?php echo $item->f_acctno ?></td>
                    <td><?php echo $item->f_custname ?></td>
                    <td><?php echo $item->f_loanid ?></td>
                    <td><?php echo $item->f_productid ?></td>
                    <td><?php echo $item->f_dpd ?></td>
                    <td><?php echo $item->f_cycle ?></td>
                    <td><?php echo $item->f_agentid ?></td>
                    <td><?php echo $item->f_flagspecialstage ?></td> -->
                    
                </tr>                            
            <?php } ?>  -->
        </tbody> 
    </table> 
    </div>

	</div>
</div>