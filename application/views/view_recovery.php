<?php echo $this->session->flashdata('message'); ?>

<head>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedcolumns/3.2.6/css/fixedColumns.dataTables.min.css">
    <style type="text/css">
        .scrollmenu {
            overflow: auto;
            white-space: nowrap;
        }
        .clone .fixed-side {
            border:1px solid #000;
            background:#eee;
            visibility:visible;
        }
    </style>
</head>
<body>
    <div class="col-lg-12">
        <div class="panel panel-danger toggle panelMove panelClose panelRefresh">
            <!-- Start .panel -->
            <div class="panel-heading" style = "background-color:red;">

                <h4 class="panel-title">Recovery</h4> 
            </div>
			<br>
			<br>
			 <div class="">
			 
            </div>
			<div class="scrollmenu">
			<div class="panel-body">
				<a href="<?php echo base_url('downloadexcel/excel_recovery'); ?>" button type="button" style="background-color: #0bacd3;" class="btn btn-primary">Download Excel</button></a>
                
                    <div class="">
                        <table id="exampl"  class="table nowrap table-bordered" style="width:100%;border: 2px;">
                            <thead>
                                <tr>    
                                     <th style=" min-width: 150px;">Nomor Nasabah</th>
                                        <th style=" min-width: 150px;">Nomor Rekening</th>
                                        <th style=" min-width: 150px;">Nama Debitur</th>
                                        <th style=" min-width: 150px;">ID</th>
                                        <th style=" min-width: 150px;">DPD </th>
                                        <th style=" min-width: 150px;">Facility Type</th>
                                        <th style=" min-width: 200px;">Plafond Amount</th>
                                        <th style=" min-width: 200px;">Nama Produk</th>
                                        <th style=" min-width: 150px;">STARTDATE PLAFOND</th>
                                        <th style=" min-width: 150px;">DATE EXPIRED</th>
                                        <th style=" min-width: 150px;">Cycle</th>
                                        <th style=" min-width: 200px;">Tenor</th>
                                        <th style=" min-width: 150px;">Code Cabang</th>
                                        <th style=" min-width: 150px;">Cabang</th>
                                        <th style=" min-width: 150px;">DPD EOM</th>
                                        <th style=" min-width: 150px;">Bucket</th>
                                        <th style=" min-width: 150px;">Flag</th>
                                        <th style=" min-width: 150px;">Angsuran</th>
                                        <th style=" min-width: 150px;">Baki Debit</th>
                                        <th style=" min-width: 150px;">Tunggakan Pokok</th>
                                        <th style=" min-width: 150px;">Bunga</th>
                                        <th style=" min-width: 150px;">Denda</th>
                                        <th style=" min-width: 150px;">Total Tagihan</th>
                                        <th style=" min-width: 150px;">Saldo Tabungan</th>
                                        <th style=" min-width: 150px;">Tanggal Restruktur</th>
                                        <th style=" min-width: 150px;">Struktur Ke</th>
                                        <th style=" min-width: 150px;">Alamat Tagih</th>
                                        <th style=" min-width: 150px;">Post Code</th>
                                        <th style=" min-width: 150px;">No Telpon</th>
                                        <th style=" min-width: 150px;">Email</th>
                                        <th style=" min-width: 150px;">Tanggal</th>
                                        <th style=" min-width: 150px;">Total Pembaayaran</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($recovery as $item) { ?>
                                    <tr>   
                                        <td><?php echo $item->NomorNasabah ?></td>
                                        <td><?php echo $item->NomorRekening ?></td>
                                        <td><?php echo $item->NamaDebitur ?></td>
                                        <td><?php echo $item->ID ?></td>
                                        <td><?php echo $item->DPD ?></td>
                                        <td><?php echo $item->FacilityType ?></td>
                                        <td><?php echo $item->PlafondAmount ?></td>
                                        <td><?php echo $item->ket_facility ?></td>
                                        <td><?php echo $item->STARTDATEPLAFOND ?></td>
                                        <td><?php echo $item->DATEEXPIRED ?></td>
                                        <td><?php echo $item->cycle ?></td>
                                        <td><?php echo $item->tenor ?></td>
                                        <td><?php echo $item->KodeCabang ?></td>
                                        <td><?php echo $item->Cabang ?></td>
                                        <td><?php echo $item->DPD_EOM ?></td>
                                        <td><?php echo $item->bucked ?></td>
                                        <td></td>
                                        <td><?php echo $item->angsuran ?></td>
                                        <td><?php echo $item->BakiDebet ?></td>
                                        <td><?php echo $item->tunggakan_pokok ?></td>
                                        <td><?php echo $item->bunga ?></td>
                                        <td><?php echo $item->denda ?></td>
                                        <td><?php echo $item->total_tagihan ?></td>
                                        <td><?php echo $item->saldo_tabungan ?></td>
                                        <td><?php echo $item->tgl_restru ?></td>
                                        <td><?php echo $item->restru_ke ?></td>
                                        <td><?php echo $item->alamat ?></td>
                                        <td><?php echo $item->postcode ?></td>
                                        <td><?php echo $item->notlp ?></td>
                                        <td><?php echo $item->email ?></td>
                                        <td><?php echo $item->tanggal ?></td>
                                        <td><?php echo $item->repayment ?></td>
                                    </tr>                            
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url('assets/jquery/jquery-2.2.3.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js') ?>"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#exampl').DataTable({
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]

                        //"scrollX": true,
            });
        });
    </script>
</body>

