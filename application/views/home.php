<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">

    <!doctype html>
    <!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
    <!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
    <!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
    <!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
        <head>
            
            <base href="<?php echo base_url() ?>">
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title>BSS | Bank Sahabat Sampoerna</title>
            <meta name="description" content="Sufee Admin - HTML5 Admin Template">
            <meta name="viewport" content="width=device-width, initial-scale=1">



            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1 user-scalable=no">
        <!-- Force IE9 to render in normal mode -->
        <!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
        <meta name="author" content="" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta name="application-name" content="" />
            
            <?php $this->load->view('head_tag'); ?>
            
            <style>
                .kiri{
                    min-width: 210px;
                    width: 210px;
                }
                
            </style>
            
           <link rel="stylesheet" href="<?php echo base_url('als_asset/offline-asset/icon.css?family=Material+Icons') ?>">

         


        </head>
        <body ng-app="myApp" ng-controller="ctrl">


            <!-- Left Panel -->
            
            <aside id="left-panel" class="left-panel kiri" style="background: #262d37; color: white; font-weight: bold">
                <nav class="navbar navbar-expand-sm navbar-default">
                    <div class="navbar-header" style="background: black;">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                            <i class="fa fa-bars"></i>
                        </button>
                        <a class="navbar-brand logo-al  d-inline-block d-sm-none" href=""><img class="logo-al" style="height: 30px" src="<?php echo base_url("template/images/") ?>" alt="Logo"></a>
                        <div style="width: 100%; height: auto; background: #262d37; margin-top: 5px">
                            <!--<a  class="navbar-brand" href=""><img  class="logo-al  d-none d-sm-inline-block" src="<?php // echo base_url("template/images/logo.png") ?>" alt="Logo"></a>-->
                            <img  id="main-logo" style="width: 100%; height: auto;" class="logo-sm-hidelah navbar-brand d-none d-sm-block" src="<?php echo base_url("template/images/") ?>" alt="Logo">
                        </div>
                        <a class="logo-kecil navbar-brand hidden" href="" style="background: #262d37;"><img src="<?php echo base_url("template/images/shortcut-icon.png") ?>" alt="Logo"></a>
                    </div>

                    <div id="main-menu" class="main-menu collapse navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li class="active lebar" style="background: #262d37;"> <!--style="width: 300px"-->
                                <a title="Dashboard" onclick="myfuction" target="_blank" href="<?php echo base_url("./phpjobscheduler/pjsfiles/?add=1") ?>"><i id="dshboard" class="menu-icon fa fa-dashboard d-none"></i>C24System | Collection System</a>
                            </li>
                            
                            <h3 class="menu-title" style="background: #262d37; color: white; font-weight: bold">Main Menu</h3><!-- /.menu-title -->
                            <?php $temp = ""; ?>
                            <?php foreach ($data as $key=>$item) { ?>
                                <?php if($item->f_parentid!=$temp) { ?>
                                <li class="menu-item-has-children dropdown" style="background: 8b929a;">
                                    <a href="#" class="link-menu dropdown-toggle" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false" title="<?php echo $item->f_menuname ?>"> 
                                        <i class="menu-icon  <?php echo $item->icon ?> <?php echo $item->clasz ?>"></i> 

                                        <?php echo $item->f_menuname ?>
                                    </a>
                                    <ul class="sub-menu children dropdown-menu" id="floating-pilihan">
                                <?php } ?>
                                        <li><i  style="font-size: 8pt" class="fa fa-angle-double-right <?php echo $item->clasz ?>"></i><a href="<?php echo base_url($item->f_itemurl) ?>" style="font-size: 8pt; font-weight: lighter"><?php echo $item->f_itemname ?></a></li>  
                                <?php if($key==count($data)-1 || $item->f_parentid!=$data[$key+1]->f_parentid) { ?>    
                                    </ul>
                                </li>
                                <?php } ?>
                                
                                <?php $temp = $item->f_parentid ?>
                            <?php } ?>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </nav>
            </aside><!-- /#left-panel -->

            <!-- Left Panel -->

            <!-- Right Panel -->

            <div id="right-panel" class="right-panel">
                <!-- Header-->
                <header id="header" class="header">
                    <div class="header-menu">

                        <div class="col-sm-7">
                            <a id="menuToggle" class="tombol menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                            <div>
                                <span style="font-size: 15pt">BSS - Bank Sahabat Sampoerna</span>
                            </div>
                            <div class="header-left">

                            </div>
                        </div>

                        <div class="col-sm-5">
                            <div class="user-area dropdown float-right">
                                <?php 
                                $nama = $this->session->userdata('name');
                                $level = $this->session->userdata('level');
                                $levelname = $this->session->userdata('levelname');
                                // $reqflag = $this->session->userdata('reqflag');
                                // $appflag = $this->session->userdata('appflag');
                                ?>
                                <span class="d-none d-md-inline-block" ><?php echo $nama." | ".$levelname  ?></span>&nbsp;&nbsp;
                                <a href="menu/logout">
                                    <i style="color: red;" class="fa fa-sign-out" aria-hidden="true"></i>
                                </a>                                

                          
                            </div>

                        </div>
                    </div>

                </header><!-- /header -->
                <!-- Header-->

                <div class="breadcrumbs">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>C24System | Collection System</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <!--<li class="active">Dashboard</li>-->
                                    <li class="active"><?php echo isset($pagename) ? $pagename : "" ?></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="content mt-3" style="width: 100%;">
                    <?php $this->load->view($content);?>    
       
           <!--  <table class="table table-striped table-bordered data ">
            <thead>
                <tr>            
                    <th colspan="5">info Segmentasi</th>
                </tr>
            </thead>
            <tbody>
                <tr>                
                    <td>Tanggal Auto Assigmen Terakhir</td>
                    <td></td>
                    
                </tr>
            </tbody>
        </table> -->
        
                    <div class="text-center kaki">
                        BSS | Bank Sahabat Sampoerna &copy; 2018
                    </div>
                </div> <!-- .content -->
            </div><!-- /#right-panel -->

            <!-- Right Panel -->
            
            <script src="<?php echo base_url("template/assets/js/vendor/jquery-2.1.4.min.js") ?>"></script>
            <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>-->
            <script src="<?php echo base_url('als_asset/offline-asset/') ?>popper.min.js"></script>
            <script src="<?php echo base_url("template/assets/js/plugins.js") ?>"></script>
            <script src="<?php echo base_url("template/assets/js/main.js") ?>"></script>
            <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->

            <!--<script src="<?php echo base_url("template/assets/js/dashboard.js") ?>"></script>-->
            <!--<script src="<?php echo base_url("template/assets/js/widgets.js") ?>"></script>-->
            <script src="<?php echo base_url("template/assets/js/lib/vector-map/jquery.vmap.js") ?>"></script>
            <script src="<?php echo base_url("template/assets/js/lib/vector-map/jquery.vmap.min.js") ?>"></script>
            <script src="<?php echo base_url("template/assets/js/lib/vector-map/jquery.vmap.sampledata.js") ?>"></script>
            <script src="<?php echo base_url("template/assets/js/lib/vector-map/country/jquery.vmap.world.js") ?>"></script>

            <script src="<?php echo base_url('als_asset/js/angular-controller.js') ?>"></script>

            <script src="<?php echo base_url('template/assets/js/lib/chosen/chosen.jquery.min.js'); ?>"></script>


        
            <script type="text/javascript">
                $(document).ready(function(){
$(".li a").each(function() {
    console.log($(this).attr('href'));
    if ((window.location.pathname.indexOf($(this).attr('href'))) > -1) {
        $(this).parent().addClass('activeMenuItem');
    }
});
});
            </script>

                <script>
        jQuery(document).ready(function() {
            jQuery(".standardSelect").chosen({
                disable_search_threshold: 10,
                no_results_text: "Oops, nothing found!",
                width: "100%"
            });
        });
    </script>

            <!--<script src="<?php // echo base_url('template/assets/js/lib/chart-js/Chart.bundle.js') ?>"></script>-->
            <!--<script src="<?php // echo base_url('template/assets/js/lib/chart-js/chartjs-init.js') ?>"></script>-->            
        </body>
    </html>