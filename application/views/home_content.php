<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<div class="animated fadeIn">
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="social-box facebook">
                <i class="fa fa-user-circle"></i>
                <ul>
                    <li>
                        <strong><span class="count">28000</span></strong>
                        <span>Accounts</span>
                    </li>
                    <li>
                        <strong><span class="count">1400</span></strong>
                        <span>NPL</span>
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
                        <strong><span class="count">500</span> </strong>
                        <span>Collectors</span>
                    </li>
                    <li>
                        <strong><span class="count">100</span></strong>
                        <span>Branchs</span>
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
                        <strong><span class="count">100</span> </strong>
                        <span>Branch</span>
                    </li>
                    <li>
                        <strong><span class="count">30</span></strong>
                        <span>Cities</span>
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
                        <strong><span class="count">20</span> </strong>
                        <span>Collect 5</span>
                    </li>
                    <li>
                        <strong><span class="count">1400</span></strong>
                        <span>NPL</span>
                    </li>
                </ul>
            </div>
            <!--/social-box-->
        </div><!--/.col-->                          
    </div>
    
    <div class="row">
        <div class="col-lg-6 d-none">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-3">Yearly Sales </h4>
                    <canvas id="sales-chart"></canvas>
                </div>
            </div>
        </div><!-- /# column -->

        <div class="col-lg-6 d-none">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-3">Team Commits </h4>
                    <canvas id="team-chart"></canvas>
                </div>
            </div>
        </div><!-- /# column -->

        <div class="col-lg-6 pb-4">
            <div class="col-lg-12">
                <div class="card h-100 ">
                    <div class="card-body ">
                        <h4 class="mb-3">NPL Performance</h4>
                        <canvas id="barChart"></canvas>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-3">Payment Performance</h4>
                        <canvas id="lineChart"></canvas>
                    </div>
                </div>            
            </div>
        </div><!-- /# column -->

        <div class="col-lg-6 d-none">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-3">Rader chart </h4>
                    <canvas id="radarChart"></canvas>
                </div>
            </div>
        </div><!-- /# column -->

        <div class="col-lg-6 d-none">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-3">Line Chart </h4>
                    <canvas id="lineChart"></canvas>
                </div>
            </div>

            <div class="col-lg-12 d-none">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-3">Doughut Chart </h4>
                        <canvas id="doughutChart"></canvas>
                    </div>
                </div>
            </div><!-- /# column -->

        </div><!-- /# column -->

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-3">Collectibility Status</h4>
                    <canvas id="pieChart"></canvas>
                </div>
            </div>
        </div><!-- /# column -->


        <div class="col-lg-6 d-none">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-3">Polar Chart </h4>
                    <canvas id="polarChart"></canvas>
                </div>
            </div>
        </div><!-- /# column -->

        <div class="col-lg-6 d-none">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-3">Single Bar Chart </h4>
                    <canvas id="singelBarChart"></canvas>
                </div>
            </div>
        </div><!-- /# column --> 

       

    </div>
</div><!-- .animated -->

   

<!--  Chart js -->
<script src="<?php echo base_url('template/') ?>assets/js/lib/chart-js/Chart.bundle.js"></script>
<script src="<?php echo base_url('template/') ?>assets/js/lib/chart-js/chartjs-init.js"></script>
