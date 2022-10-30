<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<!--[if lt IE 8]><html class="no-js lt-ie8"> <![endif]-->
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <title>Dashboard | Dynamic Admin Template</title>
        <!-- Mobile specific metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1 user-scalable=no">
        <!-- Force IE9 to render in normal mode -->
        <!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
        <meta name="author" content="" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta name="application-name" content="" />
        <!-- Import google fonts - Heading first/ text second -->
        <link href='http://fonts.googleapis.com/css?family=Quattrocento+Sans:400,700' rel='stylesheet' type='text/css'>
        <!-- Css files -->
        <!-- Icons -->
        <link href="<?php echo base_url('bst/Bootstrap/admin-html/css/icons.css') ?>" rel="stylesheet" />
        <!-- Bootstrap stylesheets (included template modifications) -->
        <link href="<?php echo base_url('bst/Bootstrap/admin-html/css/bootstrap.css') ?>" rel="stylesheet" />
        <!-- Plugins stylesheets (all plugin custom css) -->
        <link href="<?php echo base_url('bst/Bootstrap/admin-html/css/plugins.css') ?>" rel="stylesheet" />
        <!-- Main stylesheets (template main css file) -->
        <link href="<?php echo base_url('bst/Bootstrap/admin-html/css/main.css') ?>" rel="stylesheet" />
        <!-- Custom stylesheets ( Put your own changes here ) -->
        <link href="<?php echo base_url('bst/Bootstrap/admin-html/css/custom.css') ?>" rel="stylesheet" />
        <!-- Fav and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href= "<?php echo base_url('bst/Bootstrap/admin-html//img/ico/apple-touch-icon-144-precomposed.png') ?>">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url('bst/Bootstrap/admin-html/img/ico/apple-touch-icon-114-precomposed.png') ?>">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url('bst/Bootstrap/admin-html/img/ico/apple-touch-icon-72-precomposed.png') ?>">
        <link rel="apple-touch-icon-precomposed" href="<?php echo base_url('bst/Bootstrap/admin-html/img/ico/apple-touch-icon-57-precomposed.png') ?>">
        <link rel="icon" href="<?php echo base_url('bst/Bootstrap/admin-html/img/ico/favicon.ico') ?>" type="image/png">
        <!-- Windows8 touch icon ( http://www.buildmypinnedsite.com/ )-->
        <meta name="msapplication-TileColor" content="#3399cc" />
    </head>
    <body>
        <!--[if lt IE 9]>
      <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
        <!-- .page-navbar -->
        <div id="header" class="page-navbar">
            <!-- .navbar-brand -->
            <a href="index.html" class="navbar-brand hidden-xs hidden-sm">
                <!-- <img src="<?php echo base_url('bst/Bootstrap/admin-html/img/logo.png') ?>" class="logo hidden-xs" alt="Dynamic logo"> -->
                <img src="<?php echo base_url('template/images/logobesar.png') ?>" class="logo hidden-xs" alt="Dynamic logo">
                <img src="<?php echo base_url('template/images/logokecil1.png') ?>" class="logo-sm hidden-lg hidden-md" alt="Dynamic logo">
                <!-- <img src="<?php echo base_url('bst/Bootstrap/admin-html/img/logosm.png') ?>" class="logo-sm hidden-lg hidden-md" alt="Dynamic logo"> -->
                <!-- <?php echo base_url('bst/Bootstrap/admin-html/img/logosm.png') ?>" -->
            </a>
            <!-- / navbar-brand -->
            <!-- .no-collapse -->
            <div id="navbar-no-collapse" class="navbar-no-collapse">
                <!-- top left nav -->
                <ul class="nav navbar-nav">
                    <li class="toggle-sidebar">
                        <a href="#">
                            <i class="fa fa-reorder"></i>
                            <span class="sr-only">Collapse sidebar</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="reset-layout tipB" title="Reset panel position for this page"><i class="fa fa-history"></i></a>
                    </li>
                </ul>
                <!-- / top left nav -->
                <!-- top right nav -->
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="sr-only">Notifications</span>
                            <span class="badge badge-danger">6</span>
                        </a>
                        <ul class="dropdown-menu right dropdown-notification" role="menu">
                            <li><a href="#" class="dropdown-menu-header">Notifications</a>
                            </li>
                            <li><a href="#"><i class="l-basic-life-buoy"></i> 2 support request</a>
                            </li>
                            <li><a href="#"><i class="l-basic-gear"></i> Settings is changed</a>
                            </li>
                            <li><a href="#"><i class="l-weather-lightning"></i> 5 min server downtime</a>
                            </li>
                            <li><a href="#"><i class="l-basic-server2"></i> Databse backup is complete</a>
                            </li>
                            <li><a href="#"><i class="l-basic-lightbulb"></i> SuggeElson push 1 commit</a>
                            </li>
                            <li><a href="#" class="view-all">View all <i class="l-arrows-right"></i> </a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown">
                            <i class="fa fa-cog"></i>
                            <span class="sr-only">Settings</span>
                        </a>
                        <ul class="dropdown-menu dropdown-form dynamic-settings right" role="menu">
                            <li><a href="#" class="dropdown-menu-header">Template settings</a>
                            </li>
                            <li>
                                <div class="toggle-custom">
                                    <label class="toggle" data-on="ON" data-off="OFF">
                                        <input type="checkbox" id="fixed-header-toggle" name="fixed-header-toggle" checked>
                                        <span class="button-checkbox"></span>
                                    </label>
                                    <label for="fixed-header-toggle">Fixed header</label>
                                </div>
                            </li>
                            <li>
                                <div class="toggle-custom">
                                    <label class="toggle" data-on="ON" data-off="OFF">
                                        <input type="checkbox" id="fixed-left-sidebar" name="fixed-left-sidebar" checked>
                                        <span class="button-checkbox"></span>
                                    </label>
                                    <label for="fixed-left-sidebar">Fixed Left Sidebar</label>
                                </div>
                            </li>
                            <li>
                                <div class="toggle-custom">
                                    <label class="toggle" data-on="ON" data-off="OFF">
                                        <input type="checkbox" id="fixed-right-sidebar" name="fixed-right-sidebar" checked>
                                        <span class="button-checkbox"></span>
                                    </label>
                                    <label for="fixed-right-sidebar">Fixed Right Sidebar</label>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="login.html">
                            <i class="fa fa-power-off"></i>
                            <span class="sr-only">Logout</span>
                        </a>
                    </li>
                    <li>
                        <a id="toggle-right-sidebar" href="#" class="tipB" title="Toggle right sidebar">
                            <i class="l-software-layout-sidebar-right"></i>
                            <span class="sr-only">Toggle right sidebar</span>
                        </a>
                    </li>
                </ul>
                <!-- / top right nav -->
            </div>
            <!-- / collapse -->
        </div>
        <!-- / page-navbar -->


        <!-- #wrapper -->
        <div id="wrapper">
            <!-- .page-sidebar -->
            <aside id="sidebar" class="page-sidebar hidden-md hidden-sm hidden-xs">
                <!-- Start .sidebar-inner -->
                <div class="sidebar-inner">
                    <!-- Start .sidebar-scrollarea -->
                    <div class="sidebar-scrollarea">
                        <!--  .sidebar-panel -->
                        <!--  <div class="sidebar-panel">
                             <h5 class="sidebar-panel-title">Profile</h5>
                         </div> -->
                        <!-- / .sidebar-panel -->
                        <!--  <div class="user-info clearfix">
                             <img src="<?php echo base_url('bst/Bootstrap/admin-html/img/avatars/128.jpg') ?>" alt="avatar">
                             <span class="name">SuggeElson</span>
                             <div class="btn-group">
                                 <button type="button" class="btn btn-default btn-xs"><i class="l-basic-gear"></i>
                                 </button>
                                 <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">settings <span class="caret"></span>
                                 </button>
                                 <ul class="dropdown-menu right" role="menu">
                                     <li><a href="profile.html"><i class="fa fa-edit"></i>Edit profile</a>
                                     </li>
                                     <li><a href="#"><i class="fa fa-money"></i>Windraws</a>
                                     </li>
                                     <li><a href="#"><i class="fa fa-credit-card"></i>Deposits</a>
                                     </li>
                                     <li class="divider"></li>
                                     <li><a href="login.html"><i class="fa fa-power-off"></i>Logout</a>
                                     </li>
                                 </ul>
                             </div>
                         </div> -->
                        <!--  .sidebar-panel -->




                        <div class="sidebar-panel">
                            <h5 class="sidebar-panel-title">Navigation</h5>
                        </div>
                        <!-- / .sidebar-panel -->


                        <!-- .side-nav -->
                        <div class="side-nav">
                            <ul class="nav">
                                <?php $temp = ""; ?>
                                <?php foreach ($data as $key => $item) { ?>
                                    <?php if ($item->f_parentid != $temp) { ?>
                                        <li><a class="<?php echo $item->clasz ?>" href="#"><i class="l-ecommerce-graph1"></i>
                                                <span class="txt"><?php echo $item->f_menuname ?></span></a>
                                            <ul class="sub <?php if ($item->clasz == 'active') echo 'show' ?> ">
                                            <?php } ?>
                                            <li><a  class="<?php echo $item->clasz ?>" href="<?php echo base_url($item->f_itemurl) ?>"><span class="txt"><?php echo $item->f_itemname ?></span></a>
                                            </li> 
                                            <?php if ($key == count($data) - 1 || $item->f_parentid != $data[$key + 1]->f_parentid) { ?>  
                                            </ul>
                                        </li>
                                    <?php } ?>

                                    <?php $temp = $item->f_parentid ?>
                                <?php } ?>
                            </ul>
                        </div>
                        <!-- / side-nav -->



                        <!--  .sidebar-panel -->
                        <div class="sidebar-panel">
                            <h5 class="sidebar-panel-title">Server stats</h5>
                            <div class="sidebar-panel-content">
                                <div class="sidebar-stat mb10">
                                    <p class="color-white mb5 mt5"><i class="fa fa-hdd-o mr5"></i> Disk Space <span class="pull-right small">30%</span>
                                    </p>
                                    <div class="progress flat transparent progress-bar-xs">
                                        <div class="progress-bar progress-bar-white" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%;"></div>
                                    </div>
                                    <span class="dib s12 mt5 per100 text-center">3001.56 / 10000 MB</span>
                                </div>
                                <div class="sidebar-stat">
                                    <p class="color-white mb5 mt5"><i class="glyphicon glyphicon-transfer mr5"></i> Bandwidth Transfer <span class="pull-right small">78%</span>
                                    </p>
                                    <div class="progress flat transparent progress-bar-xs">
                                        <div class="progress-bar progress-bar-white" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100" style="width: 78%;"></div>
                                    </div>
                                    <span class="dib s12 mb10 mt5 per100 text-center">87565.12 / 120000 MB</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End .sidebar-scrollarea -->



                </div>
                <!-- End .sidebar-inner -->
            </aside>
            <!-- / page-sidebar -->




            <!-- Start #right-sidebar -->
            <aside id="right-sidebar" class="right-sidebar hidden-md hidden-sm hidden-xs">
                <!-- Start .sidebar-inner -->
                <div class="sidebar-inner">
                    <!-- Start .sidebar-scrollarea -->
                    <div class="sidebar-scrollarea">
                        <div class="tabs">
                            <!-- Start .rs tabs -->
                            <ul id="rstab" class="nav nav-tabs nav-justified">
                                <li class="active">
                                    <a href="#activity" data-toggle="tab"><i class="glyphicon glyphicon-bullhorn"></i> </a>
                                </li>
                                <li>
                                    <a href="#users" data-toggle="tab"><i class="fa fa-comments"></i> </a>
                                </li>
                            </ul>
                            <div id="rstab-content" class="tab-content">
                                <div class="tab-pane fade active in" id="activity">
                                    <ul class="timeline timeline-icons timeline-sm">
                                        <li>
                                            <p>
                                                <a href="#">Jonh Doe</a> attached new <a href="#">file</a>
                                                <span class="timeline-icon"><i class="fa fa-file-text-o"></i></span>
                                                <span class="timeline-date">Dec 10, 22:00</span>
                                            </p>
                                        </li>
                                        <li>
                                            <p>
                                                <a href="#">Admin</a> approved <a href="#">3 new comments</a>
                                                <span class="timeline-icon"><i class="fa fa-comment"></i></span>
                                                <span class="timeline-date">Dec 8, 13:35</span>
                                            </p>
                                        </li>
                                        <li>
                                            <p>
                                                <a href="#">Jonh Smith</a> deposit 300$
                                                <span class="timeline-icon"><i class="fa fa-money color-green"></i></span>
                                                <span class="timeline-date">Dec 6, 10:17</span>
                                            </p>
                                        </li>
                                        <li>
                                            <p>
                                                <a href="#">Serena Williams</a> purchase <a href="#">3 items</a>
                                                <span class="timeline-icon"><i class="fa fa-shopping-cart color-red"></i></span>
                                                <span class="timeline-date">Dec 5, 04:36</span>
                                            </p>
                                        </li>
                                        <li>
                                            <p>
                                                <a href="#">1 support </a> request is received from <a href="#">Klaudia Chambers</a>
                                                <span class="timeline-icon"><i class="fa fa-life-ring color-gray-light"></i></span>
                                                <span class="timeline-date">Dec 4, 18:40</span>
                                            </p>
                                        </li>
                                        <li>
                                            <p>
                                                You received 136 new likes for <a href="#">your page</a>
                                                <span class="timeline-icon"><i class="glyphicon glyphicon-thumbs-up"></i></span>
                                                <span class="timeline-date">Dec 4, 12:00</span>
                                            </p>
                                        </li>
                                        <li>
                                            <p>
                                                <a href="#">12 settings </a> are changed from <a href="#">Master Admin</a>
                                                <span class="timeline-icon"><i class="glyphicon glyphicon-cog"></i></span>
                                                <span class="timeline-date">Dec 3, 23:17</span>
                                            </p>
                                        </li>
                                        <li>
                                            <p>
                                                <a href="#">Klaudia Chambers</a> change your photo
                                                <span class="timeline-icon"><i class="l-basic-photo"></i></span>
                                                <span class="timeline-date">Dec 2, 05:17</span>
                                            </p>
                                        </li>
                                        <li>
                                            <p>
                                                <a href="#">Master server </a> is down for 10 min.
                                                <span class="timeline-icon"><i class="l-basic-server2"></i></span>
                                                <span class="timeline-date">Dec 2, 04:56</span>
                                            </p>
                                        </li>
                                        <li>
                                            <p>
                                                <a href="#">12 links </a> are broken
                                                <span class="timeline-icon"><i class="fa fa-unlink"></i></span>
                                                <span class="timeline-date">Dec 1, 22:13</span>
                                            </p>
                                        </li>
                                        <li>
                                            <p>
                                                <a href="#">Last backup </a> is restored by <a href="#">Master admin</a>
                                                <span class="timeline-icon"><i class="fa fa-undo color-red"></i></span>
                                                <span class="timeline-date">Dec 1, 17:42</span>
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="users">
                                    <div class="chat-user-list">
                                        <form class="form-vertical chat-search" role="form">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input type="text" class="form-control input-sm" placeholder="Search ...">
                                                    <span class="input-group-btn">                                        
                                                        <button class="btn btn-default btn-sm" type="submit"><i class="fa fa-search"></i></button>
                                                    </span>
                                                </div>
                                            </div>
                                            <!-- End .form-group  -->
                                        </form>
                                        <ul class="user-list list-group">
                                            <li class="list-group-item clearfix">
                                                <a href="#">
                                                    <img src="img/avatars/2.jpg" alt="avatar" class="avatar">
                                                    <span class="name">Dean Huges</span>
                                                    <span class="status status-online">online</span>
                                                </a>
                                                <div class="chat-messages">
                                                    <ul>
                                                        <li class="chat-back"><a href="#">Back <i class="fa fa-chevron-right ml5"></i> </a>
                                                        </li>
                                                        <li>
                                                            <div class="avatar">
                                                                <img src="img/avatars/2.jpg" alt="@chadengle">
                                                            </div>
                                                            <p class="chat-name">Dean Huges <span class="chat-time">15 sec ago</span>
                                                            </p>
                                                            <div class="message">
                                                                <p class="chat-txt">We need to meet today. I have some things to show you.</p>
                                                            </div>
                                                        </li>
                                                        <li class="chat-me">
                                                            <div class="avatar">
                                                                <img src="img/avatars/1.jpg" alt="@jonhdoe">
                                                            </div>
                                                            <p class="chat-name">SuggeElson <span class="chat-time">10 sec ago</span>
                                                            </p>
                                                            <div class="message message-info">
                                                                <p class="chat-txt">I have tons of work today maybe tomorrow will be fine</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="avatar">
                                                                <img src="img/avatars/2.jpg" alt="@chadengle">
                                                            </div>
                                                            <p class="chat-name">Dean Huges <span class="chat-time">just now</span>
                                                            </p>
                                                            <div class="message">
                                                                <p class="chat-txt">Okay i will wait..</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li class="list-group-item clearfix">
                                                <a href="#">
                                                    <img src="img/avatars/4.jpg" alt="avatar" class="avatar">
                                                    <span class="name">Selena Jones</span>
                                                    <span class="status status-offline">offline from 1 Dec</span>
                                                </a>
                                                <div class="chat-messages">
                                                    <ul>
                                                        <li class="chat-back"><a href="#">Back <i class="fa fa-chevron-right ml5"></i> </a>
                                                        </li>
                                                        <li class="no-messages">
                                                            <p class="text-center color-red">No messages are found</p>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li class="list-group-item clearfix">
                                                <a href="#">
                                                    <img src="img/avatars/5.jpg" alt="avatar" class="avatar">
                                                    <span class="name">Mike Tomas</span>
                                                    <span class="status status-online">online</span>
                                                </a>
                                                <div class="chat-messages">
                                                    <ul>
                                                        <li class="chat-back"><a href="#">Back <i class="fa fa-chevron-right ml5"></i> </a>
                                                        </li>
                                                        <li class="no-messages">
                                                            <p class="text-center color-red">No messages are found</p>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li class="list-group-item clearfix">
                                                <a href="#">
                                                    <img src="img/avatars/6.jpg" alt="avatar" class="avatar">
                                                    <span class="name">Jim Kerry</span>
                                                    <span class="status status-online">online</span>
                                                </a>
                                                <div class="chat-messages">
                                                    <ul>
                                                        <li class="chat-back"><a href="#">Back <i class="fa fa-chevron-right ml5"></i> </a>
                                                        </li>
                                                        <li class="no-messages">
                                                            <p class="text-center color-red">No messages are found</p>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li class="list-group-item clearfix">
                                                <a href="#">
                                                    <img src="img/avatars/7.jpg" alt="avatar" class="avatar">
                                                    <span class="name">Little Jonh</span>
                                                    <span class="status status-online">online</span>
                                                </a>
                                                <div class="chat-messages">
                                                    <ul>
                                                        <li class="chat-back"><a href="#">Back <i class="fa fa-chevron-right ml5"></i> </a>
                                                        </li>
                                                        <li class="no-messages">
                                                            <p class="text-center color-red">No messages are found</p>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li class="list-group-item clearfix">
                                                <a href="#">
                                                    <img src="img/avatars/8.jpg" alt="avatar" class="avatar">
                                                    <span class="name">Keith Smith</span>
                                                    <span class="status status-online">online</span>
                                                </a>
                                                <div class="chat-messages">
                                                    <ul>
                                                        <li class="chat-back"><a href="#">Back <i class="fa fa-chevron-right ml5"></i> </a>
                                                        </li>
                                                        <li class="no-messages">
                                                            <p class="text-center color-red">No messages are found</p>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li class="list-group-item clearfix">
                                                <a href="#">
                                                    <img src="img/avatars/9.jpg" alt="avatar" class="avatar">
                                                    <span class="name">Tracy Miller</span>
                                                    <span class="status status-online">online</span>
                                                </a>
                                                <div class="chat-messages">
                                                    <ul>
                                                        <li class="chat-back"><a href="#">Back <i class="fa fa-chevron-right ml5"></i> </a>
                                                        </li>
                                                        <li class="no-messages">
                                                            <p class="text-center color-red">No messages are found</p>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li class="list-group-item clearfix">
                                                <a href="#">
                                                    <img src="img/avatars/10.jpg" alt="avatar" class="avatar">
                                                    <span class="name">Peter Petrovski</span>
                                                    <span class="status status-online">online</span>
                                                </a>
                                                <div class="chat-messages">
                                                    <ul>
                                                        <li class="chat-back"><a href="#">Back <i class="fa fa-chevron-right ml5"></i> </a>
                                                        </li>
                                                        <li class="no-messages">
                                                            <p class="text-center color-red">No messages are found</p>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li class="list-group-item clearfix">
                                                <a href="#">
                                                    <img src="img/avatars/11.jpg" alt="avatar" class="avatar">
                                                    <span class="name">Kim Lee</span>
                                                    <span class="status status-online">online</span>
                                                </a>
                                                <div class="chat-messages">
                                                    <ul>
                                                        <li class="chat-back"><a href="#">Back <i class="fa fa-chevron-right ml5"></i> </a>
                                                        </li>
                                                        <li class="no-messages">
                                                            <p class="text-center color-red">No messages are found</p>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                        <div id="chat-write">
                                            <form id="chat-write-form" class="form-vertical" role="form">
                                                <div class="form-group mb5">
                                                    <textarea name="writetext" id="chatwritearea" rows="3" class="form-control" placeholder="Type message ..."></textarea>
                                                </div>
                                                <!-- End .form-group  -->
                                                <div class="form-group mb0">
                                                    <a href="#" class="btn btn-link btn-sm p0 mr5 color-gray"><i class="fa fa-picture-o"></i> </a>
                                                    <a href="#" class="btn btn-link btn-sm p0 color-gray"><i class="fa fa-file"></i> </a>
                                                    <a href="#" class="btn btn-default btn-sm pull-right">Send</a>
                                                </div>
                                                <!-- End .form-group  -->
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End .rs tabs -->
                    </div>
                    <!-- End .sidebar-scrollarea -->
                </div>
                <!-- End .sidebar-inner -->
            </aside>
            <!-- End #right-sidebar -->



            <!-- .page-content #right-sidebar-page  -->
            <div class="page-content sidebar-page clearfix">
                <!-- .page-content-wrapper -->
                <div class="page-content-wrapper">
                    <div class="page-content-inner">
                        <!-- .page-content-inner -->
                        <div id="page-header" class="clearfix">
                            <div class="page-header">
                                <h2>Dashboard</h2>
                                <span class="txt">Welcome to Dynamic admin</span>
                            </div>
                            <div class="header-stats">
                                <div class="spark clearfix">
                                    <div class="spark-info"><span class="number">2345</span>Visitors</div>
                                    <div id="spark-visitors" class="sparkline"></div>
                                </div>
                                <div class="spark clearfix">
                                    <div class="spark-info"><span class="number">17345</span>Views</div>
                                    <div id="spark-templateviews" class="sparkline"></div>
                                </div>
                                <div class="spark clearfix">
                                    <div class="spark-info"><span class="number">3700$</span>Sales</div>
                                    <div id="spark-sales" class="sparkline"></div>
                                </div>
                            </div>
                        </div>

                        <!-- / .row -->

                        <!-- End .row -->
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- col-lg-12 start here -->
                                <div class="panel panel-default toggle panelMove panelClose panelRefresh">
                                    <!-- Start .panel -->
                                    <div class="panel-heading">
                                        <h4 class="panel-title">Responsive example</h4>
                                    </div>
                                    <div class="panel-body">
                                        <table id="basic-datatables" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>First name</th>
                                                    <th>Last name</th>
                                                    <th>Position</th>
                                                    <th>Office</th>
                                                    <th>Age</th>
                                                    <th>Start date</th>
                                                    <th>Salary</th>
                                                    <th>Extn.</th>
                                                    <th>E-mail</th>
                                                    <th>E-mail</th>
                                                    <th>E-mail</th>
                                                    <th>E-mail</th>
                                                    <th>E-mail</th>
                                                    <th>E-mail</th>
                                                    <th>E-mail</th>
                                                    <th>E-mail</th>
                                                    <th>E-mail</th>
                                                    <th>E-mail</th>
                                                    <th>E-mail</th>
                                                    <th>E-mail</th>
                                                    <th>E-mail</th>
                                                    <th>E-mail</th>
                                                    <th>E-mail</th>
                                                    <th>E-mail</th>
                                                    <th>E-mail</th>
                                                    <th>E-mail</th>
                                                    <th>E-mail</th>
                                                    <th>E-mail</th>
                                                    <th>E-mail</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Tiger</td>
                                                    <td>Nixon</td>
                                                    <td>System Architect</td>
                                                    <td>Edinburgh</td>
                                                    <td>61</td>
                                                    <td>2011/04/25</td>
                                                    <td>$320,800</td>
                                                    <td>5421</td>
                                                    <td>t.nixon@datatables.net</td>
                                                    <td>t.nixon@datatables.net</td>
                                                    <td>t.nixon@datatables.net</td>
                                                    <td>t.nixon@datatables.net</td>
                                                    <td>t.nixon@datatables.net</td>
                                                    <td>t.nixon@datatables.net</td>
                                                    <td>t.nixon@datatables.net</td>
                                                    <td>t.nixon@datatables.net</td>
                                                    <td>t.nixon@datatables.net</td>
                                                    <td>t.nixon@datatables.net</td>
                                                    <td>t.nixon@datatables.net</td>
                                                    <td>t.nixon@datatables.net</td>
                                                    <td>t.nixon@datatables.net</td>
                                                    <td>t.nixon@datatables.net</td>
                                                    <td>t.nixon@datatables.net</td>
                                                    <td>t.nixon@datatables.net</td>
                                                    <td>t.nixon@datatables.net</td>
                                                    <td>t.nixon@datatables.net</td>
                                                    <td>t.nixon@datatables.net</td>
                                                    <td>t.nixon@datatables.net</td>
                                                    <td>t.nixon@datatables.net</td>
                                                </tr>











                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- End .row -->
                        </div>
                        <!-- / .page-content-inner -->
                    </div>
                    <!-- / page-content-wrapper -->
                </div>
                <!-- / page-content -->
            </div>
            <!-- / #wrapper -->



            <div id="footer" class="clearfix sidebar-page right-sidebar-page">
                <!-- Start #footer  -->
                <p class="pull-left">
                    Copyrights &copy; 2014 <a href="http://suggeelson.com/" class="color-blue strong" target="_blank">SuggeElson</a>. All rights reserved.
                </p>
                <p class="pull-right">
                    <a href="#" class="mr5">Terms of use</a>
                    |
                    <a href="#" class="ml5 mr25">Privacy police</a>
                </p>
            </div>
            <!-- End #footer  -->
            <!-- Back to top -->
            <div id="back-to-top"><a href="#">Back to Top</a>
            </div>
            <!-- Javascripts -->
            <!-- Load pace first -->
            <script src="<?php echo base_url('bst/Bootstrap/admin-html/plugins/core/pace/pace.min.js') ?>"></script>
            <!-- Important javascript libs(put in all pages) -->
            <script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
            <script>
                window.jQuery || document.write('<script src="<?php echo base_url('bst/Bootstrap/admin-html/js/libs/jquery-2.1.1.min.js') ?>">\x3C/script>')
            </script>
            <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
            <script>
                window.jQuery || document.write('<script src="<?php echo base_url('bst/Bootstrap/admin-html/js/libs/jquery-ui-1.10.4.min.js') ?>">\x3C/script>')
            </script>
            <!--[if lt IE 9]>
      <script type="text/javascript" src="js/libs/excanvas.min.js"></script>
      <script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
      <script type="text/javascript" src="js/libs/respond.min.js"></script>
    <![endif]-->
            <!-- Bootstrap plugins -->
            <script src="<?php echo base_url('bst/Bootstrap/admin-html/js/bootstrap/bootstrap.js') ?>"></script>
            <!-- Core plugins ( not remove ) -->
            <script src="<?php echo base_url('bst/Bootstrap/admin-html/js/libs/modernizr.custom.js') ?>"></script>
            <!-- Handle responsive view functions -->
            <script src="<?php echo base_url('bst/Bootstrap/admin-html/js/jRespond.min.js') ?>"></script>
            <!-- Custom scroll for sidebars,tables and etc. -->
            <script src="<?php echo base_url('bst/Bootstrap/admin-html/plugins/core/slimscroll/jquery.slimscroll.min.js') ?>"></script>
            <script src="<?php echo base_url('bst/Bootstrap/admin-html/plugins/core/slimscroll/jquery.slimscroll.horizontal.min.js') ?>"></script>
            <!-- Remove click delay in touch -->
            <script src="<?php echo base_url('bst/Bootstrap/admin-html/plugins/core/fastclick/fastclick.js') ?>"></script>
            <!-- Increase jquery animation speed -->
            <script src="<?php echo base_url('bst/Bootstrap/admin-html/plugins/core/velocity/jquery.velocity.min.j') ?>"></script>
            <!-- Quick search plugin (fast search for many widgets) -->
            <script src="<?php echo base_url('bst/Bootstrap/admin-html/plugins/core/quicksearch/jquery.quicksearch.js') ?>"></script>
            <!-- Bootbox fast bootstrap modals -->
            <script src="<?php echo base_url('bst/Bootstrap/admin-html/plugins/ui/bootbox/bootbox.js') ?>"></script>
            <!-- Other plugins ( load only nessesary plugins for every page) -->
            <script src="<?php echo base_url('bst/Bootstrap/admin-html/js/libs/date.js') ?>"></script>
            <script src="<?php echo base_url('bst/Bootstrap/admin-html/plugins/charts/flot/jquery.flot.custom.js') ?>"></script>
            <script src="<?php echo base_url('bst/Bootstrap/admin-html/plugins/charts/flot/jquery.flot.pie.js') ?>"></script>
            <script src="<?php echo base_url('bst/Bootstrap/admin-html/plugins/charts/flot/jquery.flot.resize.js    ') ?>"></script>
            <script src="<?php echo base_url('bst/Bootstrap/admin-html/plugins/charts/flot/jquery.flot.time.js') ?>"></script>
            <script src="<?php echo base_url('bst/Bootstrap/admin-html/plugins/charts/flot/jquery.flot.growraf.js') ?>"></script>
            <script src="<?php echo base_url('bst/Bootstrap/admin-html/plugins/charts/flot/jquery.flot.categories.js') ?>"></script>
            <script src="<?php echo base_url('bst/Bootstrap/admin-html/plugins/charts/flot/jquery.flot.stack.js') ?>"></script>
            <script src="<?php echo base_url('bst/Bootstrap/admin-html/plugins/charts/flot/jquery.flot.orderBars.js') ?>"></script>
            <script src="<?php echo base_url('bst/Bootstrap/admin-html/plugins/charts/flot/jquery.flot.tooltip.min.js') ?>"></script>
            <script src="<?php echo base_url('bst/Bootstrap/admin-html/plugins/charts/flot/jquery.flot.curvedLines.js') ?>"></script>
            <script src="<?php echo base_url('bst/Bootstrap/admin-html/plugins/charts/sparklines/jquery.sparkline.js') ?>"></script>
            <script src="<?php echo base_url('bst/Bootstrap/admin-html/plugins/charts/progressbars/progressbar.js') ?>"></script>
            <script src="<?php echo base_url('bst/Bootstrap/admin-html/plugins/ui/waypoint/waypoints.js') ?>"></script>
            <script src="<?php echo base_url('bst/Bootstrap/admin-html/plugins/ui/weather/skyicons.js') ?>"></script>
            <script src="<?php echo base_url('bst/Bootstrap/admin-html/plugins/ui/notify/jquery.gritter.js') ?>"></script>
            <script src="<?php echo base_url('bst/Bootstrap/admin-html/plugins/misc/vectormaps/jquery-jvectormap-1.2.2.min.js') ?>"></script>
            <script src="<?php echo base_url('bst/Bootstrap/admin-html/plugins/misc/vectormaps/maps/jquery-jvectormap-world-mill-en.js') ?>"></script>



            <script src="<?php echo base_url('bst/Bootstrap/admin-html/plugins/tables/datatables/jquery.dataTables.js') ?>"></script>
            <script src="<?php echo base_url('bst/Bootstrap/admin-html/plugins/tables/datatables/dataTables.tableTools.js') ?>"></script>
            <script src="<?php echo base_url('bst/Bootstrap/admin-html/plugins/tables/datatables/dataTables.bootstrap.js') ?>"></script>
            <script src="<?php echo base_url('bst/Bootstrap/admin-html/plugins/tables/datatables/dataTables.responsive.js') ?>"></script>
            <script src="<?php echo base_url('bst/Bootstrap/admin-html/js/pages/tables-data.js') ?>"></script>



            <script src="<?php echo base_url('bst/Bootstrap/admin-html/plugins/misc/countTo/jquery.countTo.js') ?>"></script>
            <script src="<?php echo base_url('bst/Bootstrap/admin-html/js/jquery.dynamic.js') ?>"></script>
            <script src="<?php echo base_url('bst/Bootstrap/admin-html/js/main.js') ?>"></script>
            <script src="<?php echo base_url('bst/Bootstrap/admin-html/js/pages/dashboard.js') ?>"></script>




    </body>
</html>