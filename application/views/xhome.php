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
            
            <?php $this->load->view('head_tag'); ?>
            
            <style>
                .kiri{
                    min-width: 280px;
                    width: 280px;
                }
                
            </style>
        </head>
        <body ng-app="myApp" ng-controller="ctrl">


            <!-- Left Panel -->
            
            <aside id="left-panel" class="left-panel kiri" style="background: black; color: white; font-weight: bold">
                <nav class="navbar navbar-expand-sm navbar-default">
                    <div class="navbar-header" style="background: black;">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                            <i class="fa fa-bars"></i>
                        </button>
                        <a class="navbar-brand logo-al  d-inline-block d-sm-none" href=""><img class="logo-al" style="height: 30px" src="<?php echo base_url("template/images/logo.png") ?>" alt="Logo"></a>
                        <div style="width: 100%; height: auto; background: #7F0000; margin-top: 5px">
                            <!--<a  class="navbar-brand" href=""><img  class="logo-al  d-none d-sm-inline-block" src="<?php // echo base_url("template/images/logo.png") ?>" alt="Logo"></a>-->
                            <img  id="main-logo" style="width: 100%; height: auto;" class="logo-sm-hidelah navbar-brand d-none d-sm-block" src="<?php echo base_url("template/images/logo.png") ?>" alt="Logo">
                        </div>
                        <a class="logo-kecil navbar-brand hidden" href="" style="background: black;"><img src="<?php echo base_url("template/images/shortcut-icon.png") ?>" alt="Logo"></a>
                    </div>

                    <div id="main-menu" class="main-menu collapse navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li class="active lebar" style="background: black;"> <!--style="width: 300px"-->
                                <a href="<?php echo base_url("menu/home") ?>"><i id="dshboard" class="menu-icon fa fa-dashboard d-none"></i>C24System | Collection System</a>
                            </li>
                            <!--<script>alert("<?php echo ""//$data[0]->f_menuname ?>");</script>-->
                            <h3 class="menu-title" style="background: black; color: white; font-weight: bold">Main Menu</h3><!-- /.menu-title -->
                            <?php $temp = ""; ?>
                            <?php foreach ($data as $key=>$item) { ?>
                                <?php if($item->f_parentid!=$temp) { ?>
                                <li class="menu-item-has-children dropdown" style="background: black;">
                                    <!--<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i><?php echo $item->f_menuname ?></a>-->
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon <?php echo $item->icon ?>"></i><?php echo $item->f_menuname ?></a>
                                    <ul class="sub-menu children dropdown-menu" id="floating-pilihan">
                                <?php } ?>
                                        <li><i class="fa fa-angle-double-right"></i><a href="<?php echo base_url($item->f_itemurl) ?>"><?php echo $item->f_itemname ?></a></li>  
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
<!--                                <button class="search-trigger"><i class="fa fa-search"></i></button>
                                <div class="form-inline">
                                    <form class="search-form">
                                        <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                        <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                                    </form>
                                </div>

                                <div class="dropdown for-notification">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-bell"></i>
                                        <span class="count bg-danger">5</span>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="notification">
                                        <p class="red">You have 3 Notification</p>
                                        <a class="dropdown-item media bg-flat-color-1" href="#">
                                            <i class="fa fa-check"></i>
                                            <p>Server #1 overloaded.</p>
                                        </a>
                                        <a class="dropdown-item media bg-flat-color-4" href="#">
                                            <i class="fa fa-info"></i>
                                            <p>Server #2 overloaded.</p>
                                        </a>
                                        <a class="dropdown-item media bg-flat-color-5" href="#">
                                            <i class="fa fa-warning"></i>
                                            <p>Server #3 overloaded.</p>
                                        </a>
                                    </div>
                                </div>

                                <div class="dropdown for-message">
                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                            id="message"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="ti-email"></i>
                                        <span class="count bg-primary">9</span>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="message">
                                        <p class="red">You have 4 Mails</p>
                                        <a class="dropdown-item media bg-flat-color-1" href="#">
                                            <span class="photo media-left"><img alt="avatar" src="<?php echo base_url("template/images/avatar/1.jpg") ?>"></span>
                                            <span class="message media-body">
                                                <span class="name float-left">Jonathan Smith</span>
                                                <span class="time float-right">Just now</span>
                                                <p>Hello, this is an example msg</p>
                                            </span>
                                        </a>
                                        <a class="dropdown-item media bg-flat-color-4" href="#">
                                            <span class="photo media-left"><img alt="avatar" src="<?php echo base_url("template/images/avatar/2.jpg") ?>"></span>
                                            <span class="message media-body">
                                                <span class="name float-left">Jack Sanders</span>
                                                <span class="time float-right">5 minutes ago</span>
                                                <p>Lorem ipsum dolor sit amet, consectetur</p>
                                            </span>
                                        </a>
                                        <a class="dropdown-item media bg-flat-color-5" href="#">
                                            <span class="photo media-left"><img alt="avatar" src="<?php echo base_url("template/images/avatar/3.jpg") ?>"></span>
                                            <span class="message media-body">
                                                <span class="name float-left">Cheryl Wheeler</span>
                                                <span class="time float-right">10 minutes ago</span>
                                                <p>Hello, this is an example msg</p>
                                            </span>
                                        </a>
                                        <a class="dropdown-item media bg-flat-color-3" href="#">
                                            <span class="photo media-left"><img alt="avatar" src="<?php echo base_url("template/images/avatar/4.jpg") ?>"></span>
                                            <span class="message media-body">
                                                <span class="name float-left">Rachel Santos</span>
                                                <span class="time float-right">15 minutes ago</span>
                                                <p>Lorem ipsum dolor sit amet, consectetur</p>
                                            </span>
                                        </a>
                                    </div>
                                </div>-->
                            </div>
                        </div>

                        <div class="col-sm-5">
                            <div class="user-area dropdown float-right">
                                <!--<a href="" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                                    <!--<img class="user-avatar rounded-circle" src="<?php echo ""//base_url() ?>template/images/admin.jpg" alt="User Avatar">-->
                                    <!--<i class="fa fa-sign-out" aria-hidden="true"></i>-->
                                <!--</a>-->
                                <?php 
                                $nama = $this->session->userdata('name');
                                $level = $this->session->userdata('level');
                                $levelname = $this->session->userdata('levelname');
                                ?>
                                <span class="d-none d-md-inline-block" ><?php echo $nama." | ".$levelname  ?></span>&nbsp;&nbsp;
                                <a href="menu/logout">
                                    <!--<img class="user-avatar rounded-circle" src="<?php echo base_url() ?>template/images/admin.jpg" alt="User Avatar">-->
                                    <i style="color: red;" class="fa fa-sign-out" aria-hidden="true"></i>
                                </a>                                

<!--                                <div class="user-menu dropdown-menu">
                                    <a class="nav-link" href="#"><i class="fa fa- user"></i>My Profile</a>

                                    <a class="nav-link" href="#"><i class="fa fa- user"></i>Notifications <span class="count">13</span></a>

                                    <a class="nav-link" href="#"><i class="fa fa -cog"></i>Settings</a>

                                    <a class="nav-link" href="<?php echo base_url("menu/logout") ?>"><i class="fa fa-power -off"></i>Logout</a>
                                </div>-->
                            </div>

                            <div class="language-select dropdown" id="language-select">
<!--                                <a class="dropdown-toggle" href="#" data-toggle="dropdown"  id="language" aria-haspopup="true" aria-expanded="true">
                                    <i class="flag-icon flag-icon-us"></i>
                                </a>-->
<!--                                <div class="dropdown-menu" aria-labelledby="language" >
                                    <div class="dropdown-item">
                                        <span class="flag-icon flag-icon-fr"></span>
                                    </div>
                                    <div class="dropdown-item">
                                        <i class="flag-icon flag-icon-es"></i>
                                    </div>
                                    <div class="dropdown-item">
                                        <i class="flag-icon flag-icon-us"></i>
                                    </div>
                                    <div class="dropdown-item">
                                        <i class="flag-icon flag-icon-it"></i>
                                    </div>
                                </div>-->
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

            <script src="<?php echo base_url("template/assets/js/dashboard.js") ?>"></script>
            <script src="<?php echo base_url("template/assets/js/widgets.js") ?>"></script>
            <script src="<?php echo base_url("template/assets/js/lib/vector-map/jquery.vmap.js") ?>"></script>
            <script src="<?php echo base_url("template/assets/js/lib/vector-map/jquery.vmap.min.js") ?>"></script>
            <script src="<?php echo base_url("template/assets/js/lib/vector-map/jquery.vmap.sampledata.js") ?>"></script>
            <script src="<?php echo base_url("template/assets/js/lib/vector-map/country/jquery.vmap.world.js") ?>"></script>

            <script src="<?php echo base_url('als_asset/js/angular-controller.js') ?>"></script>
            
            <!--<script src="<?php // echo base_url('template/assets/js/lib/chart-js/Chart.bundle.js') ?>"></script>-->
            <!--<script src="<?php // echo base_url('template/assets/js/lib/chart-js/chartjs-init.js') ?>"></script>-->            
        </body>
    </html>