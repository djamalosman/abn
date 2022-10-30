
<?php echo $this->session->flashdata('message'); ?>
<?php echo form_open("content/assign_debitur", "id='swa-campur'") ?>   
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default plain toggle panelMove panelClose panelRefresh">
            <div class="panel-heading">
                <h4 class="panel-title"> List Assignment Debitur</h4>
            </div>
            <div class="panel-body">
                <div class=" form-group">
                    <div class="col-lg-2">
                        <label for="f_untuk" class="control-label">Agent</label>
                        <select style=" height: 30px"  id="agent" name="agent" class="fancy-select form-control">
                            <option value="Non">Select</option>
                            <?php foreach ($agent as $item) { ?>
                                <option value="<?php echo $item->f_agentid ?>"><?php echo $item->f_agentname ?></option>
                            <?php } ?>

                        </select>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" name="aproved" id="aproved" style=" margin-top: 25px; width: 100px;" class="btn btn-success" ><i class="fa fa-pencil-square-o"></i>  <span class="text"> Assign</span></button>
                    </div>
                </div>
                <br>
                <br>
                <br>
                <br>
                <div class="form-group">
                    <div class="col-lg-12">
                        <table id="responsive" class="table table-bordered table-striped">
                            <thead>
                                <tr>	
                                    <th style=" min-width: 150px;">No Cif</th>
                                    <th style=" min-width: 150px;">Nama Nasabah</th>
                                    <th style=" min-width: 150px;">Nama Product</th>
                                    <th style=" min-width: 200px;">Tanggal Awal Pinjam</th>
                                    <th style=" min-width: 200px;">Tanggal Jatuh Tempo</th>
                                    <th style=" min-width: 150px;">Cycle</th>
                                    <th style=" min-width: 150px;">Tenor</th>
                                    <th style=" min-width: 150px;">Area</th>
                                    <th style=" min-width: 200px;">Code Cabang Maintenance</th>
                                    <th style=" min-width: 200px;">Cabang Maintenance</th>
                                    <th style=" min-width: 150px;">Code Post Tagih</th>
                                    <th style=" min-width: 150px;">DPD EOM</th>
                                    <th style=" min-width: 150px;">DPD</th>
                                    <th style=" min-width: 150px;">Bucket</th>
                                    <th style=" min-width: 150px;">Flag</th>
                                    <th style=" min-width: 150px;">Angsuran</th>
                                    <th style=" min-width: 150px;">Baki Debit</th>
                                    <th style=" min-width: 150px;">Tunggakan Pokok</th>
                                    <th style=" min-width: 150px;">Bunga</th>
                                    <th style=" min-width: 150px;">Denda</th>
                                    <th style=" min-width: 150px;">Total Tagihan</th>
                                    <th style=" min-width: 150px;">Saldo Tabungan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($assignment as $item) { ?>
                                    <tr>			
                                        <td class="text-center" >
                                            <input type="checkbox"  id="checkbox1.<?php echo $item->f_id ?>" value="<?php echo $item->f_id ?>" name="idnya[]" >
                                        </td>
                                        <td><?php echo $item->No_CIF ?></td>
                                        <td><?php echo $item->Nama_Nasabah ?></td>
                                        <td><?php echo $item->Nama_Produk ?></td>
                                        <td><?php echo $item->Tanggal_Awal_Pinjaman ?></td>
                                        <td><?php echo $item->Tanggal_Jatuh_Tempo ?></td>
                                        <td><?php echo $item->Cycle ?></td>
                                        <td><?php echo $item->Tenor ?></td>
                                        <td><?php echo $item->Area ?></td>
                                        <td><?php echo $item->Kode_Cabang_Maintenance ?></td>
                                        <td><?php echo $item->Cabang_Maintenance ?></td>
                                        <td><?php echo $item->Kodepos_Tagih ?></td>
                                        <td><?php echo $item->DPD_EOM ?></td>
                                        <td><?php echo $item->DPD ?></td>
                                        <td><?php echo $item->Bucket ?></td>
                                        <td><?php echo $item->Flag ?></td>
                                        <td><?php echo $item->Angsuran ?></td>
                                        <td><?php echo $item->Baki_Debet ?></td>
                                        <td><?php echo $item->Tunggakan_Pokok ?></td>
                                        <td><?php echo $item->Bunga ?></td>
                                        <td><?php echo $item->Denda ?></td>
                                        <td><?php echo $item->Total_Tagihan ?></td>
                                        <td><?php echo $item->Saldo_Tabungan ?></td>
                                        <td><?php echo $item->Tanggal_Restruktur ?></td>
                                        <td><?php echo $item->Restruktur_ke ?></td>
                                        <td><?php echo $item->Alamat_Tagih ?></td>
                                    </tr>                            
                                <?php } ?>
                            </tbody>
                        </table> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo form_close() ?>


