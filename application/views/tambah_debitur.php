
<?php echo $this->session->flashdata('message'); ?>

<div class="row">
    <!-- .row -->
    <!-- .row start -->
    <div class=" col-lg-12">
        <div class="panel panel-default toggle panelMove panelClose panelRefresh">
            <!-- Start .panel -->
            <div class="panel-heading">
                <h4 class="panel-title">Tambah Debitur</h4>
            </div>
            <div class="panel-body" id="tabeldetailassignment">
                <form action="<?php echo base_url("controller_assignment/tambah_debitur_proses")?>" method="POST" class="form-horizontal group-border stripped" role="form">
                    <div class=" form-group" >
                        <div class="col-lg-3">
                            <button type="submit"  class="btn btn-success mr5 mb10" > <i class="fa fa-save"></i>  <span class="text">Tambah</span> </button>
                            <a type="button" href="<?php echo base_url('controller_assignment/aproved_detail');?>" class="btn btn-warning mr5 mb10" > <i class="fa fa-arrow-left"></i>  <span class="text">Back</span> </a>
                            <input type="hidden" name="nik" value ="<?php echo $agent->f_agentid ;?>">
                        </div>
                    </div>
                    <div class="form-group" >
                        <div class="col-lg-12">
                            <!--table baru-->
                            <table id="responsive" class="table table-bordered table-striped">
                                <thead>
                                    <tr>	
                                        <th>No</th>
                                        <th>Pilih</th>
                                        <th>Cif</th>
                                        <th>Nama</th>
                                        <th>DPD</th>
                                        <th>OS</th>
                                        <th>Produk</th>
                                        <th>Alamat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($param as $item) {
                                        ?>
                                        <tr>
                                            <td><?php echo $i++ ?></td>
                                            <td class="text-center" >
                                                <input type="checkbox"  id="checkbox1.<?php echo $item->NomorNasabah ?>" value="<?php echo $item->NomorNasabah ?>" name="idnya[]" />
                                            </td>
                                             <td><?php echo $item->f_cif ?></td>
                                            <td><?php echo $item->NamaDebitur ?></td>
                                            <td><?php echo $item->dpd ?></td>
                                            <td><?php echo $item->BakiDebet ?></td>
                                            <td><?php echo $item->FacilityType ?></td>
                                            <td><?php echo $item->almt ?></td>
                                        </tr>                            
                                    <?php } ?>
                                </tbody>
                            </table> 
                        </div>

                    </div>



                </form> 




            </div>
        </div>
        <!-- End .panel -->
    </div>

</div>