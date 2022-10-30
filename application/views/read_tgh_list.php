<?php echo $this->session->flashdata('message'); ?>
<head>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<style type="text/css">
.scrollmenu {
  overflow: auto;
  white-space: nowrap;
}

    </style>
</head>
<body>
<div class="col-lg-12">
<!-- col-lg-12 start here -->
<div class="panel panel-danger toggle panelMove panelClose panelRefresh">
    <!-- Start .panel -->
<div class="panel-heading" style = "background-color : red;">
         <h4 class="panel-title">Basic Data tables</h4> 
</div>
<div class="scrollmenu">
<div class="panel-body">
 
<div class="">
    <!-- <a href="<?php echo base_url("content/create_mntr_lelang") ?>" button type="button" style="background-color: #0bacd3;" class="btn btn-primary btn-xs mr2 mb10">Create Lelang</button></a> -->
    <a href="<?php echo base_url('content/create_ayda') ?>" button type="submit" style=" margin-top: 30px; height: 30px;" class="btn btn-success mr5 mb10" ><i class="fa fa-send">
                         
                     </i>  <span class="text"> Create AYDA</span></button></a>
   <br>
   <br>
<table id="example"  class="display nowrap table-bordered" style="width:100%;border: 2px;">
<thead>
 <tr>
                        <th>Aksi</th>
                     <th style=" min-width: 120px;">Nama debitur Lengkap</th>
                     <th style=" min-width: 120px;">Cif</th>
                     <th style=" min-width: 120px;">Plafond Awal</th>
                     <th style=" min-width: 120px;">MV</th>
                     <th style=" min-width: 120px;">LTCR</th>
                     <th style=" min-width: 120px;">Dibukukan AYDA TGL</th>
                     <th style=" min-width: 120px;">Tahun AYDA</th>
                     <th style=" min-width: 120px;">MOB AYDA</th>
                     <th style=" min-width: 120px;">Range MOB</th>
                     <th style=" min-width: 120px;">Cabang</th>
                     <th style=" min-width: 120px;">Tgl LPJ Awal AYDA</th>
                     <th style=" min-width: 120px;">MV</th>
                     <th style=" min-width: 120px;">LV</th>
                     <th style=" min-width: 120px;">Tgl LPJ AYDA 1≥ Th</th>
                     <th style=" min-width: 120px;">MV2</th>
                     <th style=" min-width: 120px;">LV2</th>
                     <th style=" min-width: 120px;">Tgl LPJ AYDA 2≥ Th</th>
                     <th style=" min-width: 120px;">MV3</th>
                     <th style=" min-width: 120px;">LV3</th>
                     <th style=" min-width: 120px;">Jenis Asset</th>
                     <th style=" min-width: 120px;">Alamat Jaminan</th>
                     <th style=" min-width: 120px;">LT/LB</th>
                     <th style=" min-width: 120px;">OS Awal</th>
                     <th style=" min-width: 120px;">Hapus Tagih Awal AYDA</th>
                     <th style=" min-width: 120px;">Nilai Awal AYDA</th>
                     <th style=" min-width: 120px;">Penjualan AYDA</th>
                     <th style=" min-width: 120px;">Biaya </th>
                     <th style=" min-width: 120px;">Nett Penjualan</th>
                    <th style=" min-width: 120px;">Tanggal Penjualan AYDA </th>
                     <th style=" min-width: 120px;">CKPN</th>


                            </tr>
</thead>




                        <tbody>
                          <?php foreach ($viewayda as $key) { ?> 

                      <tr>
                        <td>
                            <a title="Edit" href="<?php echo base_url("content/edit_ayda/".$key->f_cif) ?>"><i class="fa fa-list" aria-hidden="true"></i></a>
                        </td>
<td><?php echo $key->f_custname ?>        </td>
<td><?php echo $key->f_cif ?>             </td>
<td><?php echo $key->f_plafondawal ?>     </td>
<td><?php echo $key->f_mv_a ?>            </td>
<td><?php echo $key->f_ltcr ?>            </td>
<td><?php echo $key->f_tglayda ?>         </td>
<td><?php echo $key->f_thnayda ?>         </td>
<td><?php echo $key->f_mobayda ?>         </td>
<td><?php echo $key->f_rangemob ?>        </td>
<td><?php echo $key->f_branch ?>          </td>
<td><?php echo $key->f_tgllpjawalayda ?>  </td>
<td><?php echo $key->f_mv_b ?>            </td>
<td><?php echo $key->f_lv ?>              </td>
<td><?php echo $key->tlgllpjlbh_satuthn ?></td>
<td><?php echo $key->f_mvtwo ?>           </td>
<td><?php echo $key->f_lvtwo ?>           </td>
<td><?php echo $key->tlgllpjlbh_duathn ?> </td>
<td><?php echo $key->f_mvthree ?>         </td>
<td><?php echo $key->f_lvthree ?>         </td>
<td><?php echo $key->f_jenisasset ?>      </td>
<td><?php echo $key->alamat_jaminan ?>    </td>
<td><?php echo $key->lt_lb ?>             </td>
<td><?php echo $key->os_awal ?>           </td>
<td><?php echo $key->hpustgih_ayda ?>     </td>
<td><?php echo $key->nilai_awal_ayda ?>   </td>
<td><?php echo $key->penjualan_ayda ?>    </td>
<td><?php echo $key->biaya ?>             </td>
<td><?php echo $key->neet_penjualan ?>    </td>
<td><?php echo $key->tglpenjualan_ayda ?> </td>
<td><?php echo $key->ckpn ?>              </td>

                    </tr>
                    <?php } ?>
                        </tbody>
</table>

 
</div>
</div>
</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable( {
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
    } );
} );
</script>


</body>