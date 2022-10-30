<div class="container-fluid d-inline-block">
    <div class="col-sm-12">
        <div class="alert  alert-success alert-dismissible fade show" role="alert">
            <span class="badge badge-pill badge-success">Success</span> You successfully read this important alert message.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="social-box facebook">
            <i class="fa fa-user-circle"></i>
            <ul>
                <li>
                    <strong><span class="count">40</span> org</strong>
                    <span>Karyawan</span>
                </li>
                <li>
                    <strong><span class="count">1450</span></strong>
                    <span>Aktifitas</span>
                </li>
            </ul>
        </div>
        <!--/social-box-->
    </div><!--/.col-->


    <div class="col-lg-3 col-md-6">
        <div class="social-box twitter">
            <i class="fa fa-address-card-o"></i>
            <ul>
                <li>
                    <strong><span class="count">500</span> org</strong>
                    <span>Nasabah</span>
                </li>
                <li>
                    <strong><span class="count">450</span></strong>
                    <span>transaksi</span>
                </li>
            </ul>
        </div>
        <!--/social-box-->
    </div><!--/.col-->


    <div class="col-lg-3 col-md-6">
        <div class="social-box linkedin">
            <i class="fa fa-map-marker"></i>
            <ul>
                <li>
                    <strong><span class="count">150</span> +</strong>
                    <span>Cabang</span>
                </li>
                <li>
                    <strong><span class="count">30</span></strong>
                    <span>Kota</span>
                </li>
            </ul>
        </div>
        <!--/social-box-->
    </div><!--/.col-->


    <div class="col-lg-3 col-md-6">
        <div class="social-box google-plus">
            <i class="fa fa-credit-card-alt"></i>
            <ul>
                <li>
                    <strong><span class="count">94</span> org</strong>
                    <span>kunjungan</span>
                </li>
                <li>
                    <strong><span class="count">92</span></strong>
                    <span>Pembayaran</span>
                </li>
            </ul>
        </div>
        <!--/social-box-->
    </div><!--/.col-->

    



    <div class="col-xl-3 col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="ti-money text-success border-success"></i></div>
                    <div class="stat-content dib">
                        <div class="stat-text">Total Profit</div>
                        <div class="stat-digit">1,012</div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-xl-3 col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="ti-user text-primary border-primary"></i></div>
                    <div class="stat-content dib">
                        <div class="stat-text">New Customer</div>
                        <div class="stat-digit">961</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="ti-layout-grid2 text-warning border-warning"></i></div>
                    <div class="stat-content dib">
                        <div class="stat-text">Active Projects</div>
                        <div class="stat-digit">770</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-xl-3 col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="ti-desktop text-danger border-danger"></i></div>
                    <div class="stat-content dib">
                        <div class="stat-text">Monitoring</div>
                        <div class="stat-digit">770</div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3">Bar chart </h4>
                <canvas id="barChart"></canvas>
            </div>
        </div>
    </div><!-- /# column -->    
    
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3">Pie Chart </h4>
                <canvas id="pieChart"></canvas>
            </div>
        </div>
    </div><!-- /# column -->    
</div>

<script src="<?php echo base_url('template/assets/js/lib/chart-js/Chart.bundle.js') ?>"></script>
<script src="<?php echo base_url('template/assets/js/lib/chart-js/chartjs-init.js') ?>"></script>