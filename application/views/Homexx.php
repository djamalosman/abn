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
        <link href="css/icons.css" rel="stylesheet" />
        <!-- Bootstrap stylesheets (included template modifications) -->
        <link href="css/bootstrap.css" rel="stylesheet" />
        <!-- Plugins stylesheets (all plugin custom css) -->
        <link href="css/plugins.css" rel="stylesheet" />
        <!-- Main stylesheets (template main css file) -->
        <link href="css/main.css" rel="stylesheet" />
        <!-- Custom stylesheets ( Put your own changes here ) -->
        <link href="css/custom.css" rel="stylesheet" />
        <!-- Fav and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="img/ico/apple-touch-icon-57-precomposed.png">
        <link rel="icon" href="img/ico/favicon.ico" type="image/png">
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
                <img src="img/logo.png" class="logo hidden-xs" alt="Dynamic logo">
                <img src="img/logosm.png" class="logo-sm hidden-lg hidden-md" alt="Dynamic logo">
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
                        <div class="sidebar-panel">
                            <h5 class="sidebar-panel-title">Profile</h5>
                        </div>
                        <!-- / .sidebar-panel -->
                        <div class="user-info clearfix">
                            <img src="img/avatars/128.jpg" alt="avatar">
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
                        </div>
                        <!--  .sidebar-panel -->
                        <div class="sidebar-panel">
                            <h5 class="sidebar-panel-title">Navigation</h5>
                        </div>
                        <!-- / .sidebar-panel -->
                        <!-- .side-nav -->
                        <div class="side-nav">
                            <ul class="nav">
                                <li><a href="index.html"><i class="l-basic-laptop"></i><span class="txt">Dashboard</span></a>
                                </li>
                                <li><a href="http://themes.suggelab.com/#dynamic_frontend" target="_blank"><i class="l-basic-webpage"></i><span class="txt">Frontend</span><span class="label">hot</span></a>
                                </li>
                                <li>
                                    <a href="#"><i class="l-ecommerce-graph1"></i> <span class="txt">Charts</span></a>
                                    <ul class="sub">
                                        <li><a href="charts-flot.html"><span class="txt">Flot charts</span></a>
                                        </li>
                                        <li><a href="charts-morris.html"><span class="txt">Morris charts</span></a>
                                        </li>
                                        <li><a href="charts-chartjs.html"><span class="txt">Chartjs </span></a>
                                        </li>
                                        <li><a href="charts-other.html"><span class="txt">Other charts</span></a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#"><i class="l-basic-webpage-txt"></i><span class="txt">Forms</span></a>
                                    <ul class="sub">
                                        <li><a href="forms-basic.html"><span class="txt">Basic forms</span></a>
                                        </li>
                                        <li><a href="forms-advanced.html"><span class="txt">Advanced forms</span></a>
                                        </li>
                                        <li><a href="forms-layouts.html"><span class="txt">Form layouts</span></a>
                                        </li>
                                        <li><a href="forms-wizard.html"><span class="txt">Form wizard</span></a>
                                        </li>
                                        <li><a href="forms-validation.html"><span class="txt">Form validation</span></a>
                                        </li>
                                        <li><a href="code-editor.html"><span class="txt">Code editor</span></a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#"><i class="l-software-layout-header-3columns"></i><span class="txt">Tables</span></a>
                                    <ul class="sub">
                                        <li><a href="tables-basic.html"><span class="txt">Basic tables</span></a>
                                        </li>
                                        <li><a href="tables-data.html"><span class="txt">Data tables</span></a>
                                        </li>
                                        <li><a href="tables-editable.html"><span class="txt">Editable tables</span></a>
                                        </li>
                                        <li><a href="tables-ajax.html"><span class="txt">Ajax tables</span></a>
                                        </li>
                                        <li><a href="tables-pricing.html"><span class="txt">Pricing tables</span></a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#"><i class="l-software-layers2"></i><span class="txt">UI Elements</span></a>
                                    <ul class="sub">
                                        <li><a href="icons.html"><span class="txt">Icons</span></a>
                                        </li>
                                        <li><a href="typography.html"><span class="txt">Typography</span></a>
                                        </li>
                                        <li><a href="tabs.html"><span class="txt">Tabs</span></a>
                                        </li>
                                        <li><a href="accordions.html"><span class="txt">Accordions</span></a>
                                        </li>
                                        <li><a href="buttons.html"><span class="txt">Buttons</span></a>
                                        </li>
                                        <li><a href="notifications.html"><span class="txt">Notifications</span></a>
                                        </li>
                                        <li><a href="modals.html"><span class="txt">Modals</span></a>
                                        </li>
                                        <li><a href="sliders.html"><span class="txt">Sliders</span></a>
                                        </li>
                                        <li><a href="progressbars.html"><span class="txt">Progressbars</span></a>
                                        </li>
                                        <li><a href="lists.html"><span class="txt">Lists</span></a>
                                        </li>
                                        <li><a href="grid.html"><span class="txt">Grid</span></a>
                                        </li>
                                        <li><a href="ui-other.html"><span class="txt">Other</span></a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="portlets.html"><i class="l-software-layout-header"></i><span class="txt">Portlets</span><span class="label">22</span></a>
                                </li>
                                <li>
                                    <a href="#"><i class="l-basic-mail"></i> <span class="txt">Email</span></a>
                                    <ul class="sub">
                                        <li><a href="email-inbox.html"><span class="txt">Inbox</span></a>
                                        </li>
                                        <li><a href="email-read.html"><span class="txt">Read email</span></a>
                                        </li>
                                        <li><a href="email-write.html"><span class="txt">Write email</span></a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#"><i class="l-basic-geolocalize-01"></i><span class="txt">Maps</span></a>
                                    <ul class="sub">
                                        <li><a href="maps-google.html"><span class="txt">Google maps</span></a>
                                        </li>
                                        <li><a href="maps-vector.html"><span class="txt">Vector maps</span></a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#"><i class="l-basic-webpage"></i><span class="txt">Pages</span></a>
                                    <ul class="sub">
                                        <li><a href="login.html"><span class="txt">Login</span></a>
                                        </li>
                                        <li><a href="lock-screen.html"><span class="txt">Lock screen</span></a>
                                        </li>
                                        <li><a href="register.html"><span class="txt">Register</span></a>
                                        </li>
                                        <li><a href="lost-password.html"><span class="txt">Lost password</span></a>
                                        </li>
                                        <li><a href="profile.html"><span class="txt">User profile</span></a>
                                        </li>
                                        <li><a href="calendar.html"><span class="txt">Calendar</span></a>
                                        </li>
                                        <li><a href="timeline.html"><span class="txt">Timeline</span></a>
                                        </li>
                                        <li><a href="gallery.html"><span class="txt">Gallery</span></a>
                                        </li>
                                        <li><a href="invoice.html"><span class="txt">Invoice</span></a>
                                        </li>
                                        <li><a href="blank.html"><span class="txt">Blank page</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><span class="txt">Error pages</span></a>
                                            <ul class="sub">
                                                <li><a href="403.html"><span class="txt">403</span></a>
                                                </li>
                                                <li><a href="404.html"><span class="txt">404</span></a>
                                                </li>
                                                <li><a href="500.html"><span class="txt">500</span></a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
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
            <!-- .page-content -->
            <div class="page-content sidebar-page right-sidebar-page clearfix">
                <!-- .page-content-wrapper -->
                <div class="page-content-wrapper">
                    <div class="page-content-inner">
                        <!-- .page-content-inner -->
                        <div id="page-header" class="clearfix">
                            <div class="page-header">
                                <h2>Dashboard</h2>
                                <span class="txt">Welcome to Dynamic admin</span>
                            </div>
                        </div>
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
        <script src="plugins/core/pace/pace.min.js"></script>
        <!-- Important javascript libs(put in all pages) -->
        <script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script>
        window.jQuery || document.write('<script src="js/libs/jquery-2.1.1.min.js">\x3C/script>')
        </script>
        <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
        <script>
        window.jQuery || document.write('<script src="js/libs/jquery-ui-1.10.4.min.js">\x3C/script>')
        </script>
        <!--[if lt IE 9]>
  <script type="text/javascript" src="js/libs/excanvas.min.js"></script>
  <script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <script type="text/javascript" src="js/libs/respond.min.js"></script>
<![endif]-->
        <!-- Bootstrap plugins -->
        <script src="js/bootstrap/bootstrap.js"></script>
        <!-- Core plugins ( not remove ) -->
        <script src="js/libs/modernizr.custom.js"></script>
        <!-- Handle responsive view functions -->
        <script src="js/jRespond.min.js"></script>
        <!-- Custom scroll for sidebars,tables and etc. -->
        <script src="plugins/core/slimscroll/jquery.slimscroll.min.js"></script>
        <script src="plugins/core/slimscroll/jquery.slimscroll.horizontal.min.js"></script>
        <!-- Remove click delay in touch -->
        <script src="plugins/core/fastclick/fastclick.js"></script>
        <!-- Increase jquery animation speed -->
        <script src="plugins/core/velocity/jquery.velocity.min.js"></script>
        <!-- Quick search plugin (fast search for many widgets) -->
        <script src="plugins/core/quicksearch/jquery.quicksearch.js"></script>
        <!-- Bootbox fast bootstrap modals -->
        <script src="plugins/ui/bootbox/bootbox.js"></script>
        <!-- Other plugins ( load only nessesary plugins for every page) -->
        <script src="js/libs/date.js"></script>
        <script src="plugins/charts/flot/jquery.flot.custom.js"></script>
        <script src="plugins/charts/flot/jquery.flot.pie.js"></script>
        <script src="plugins/charts/flot/jquery.flot.resize.js"></script>
        <script src="plugins/charts/flot/jquery.flot.time.js"></script>
        <script src="plugins/charts/flot/jquery.flot.growraf.js"></script>
        <script src="plugins/charts/flot/jquery.flot.categories.js"></script>
        <script src="plugins/charts/flot/jquery.flot.stack.js"></script>
        <script src="plugins/charts/flot/jquery.flot.orderBars.js"></script>
        <script src="plugins/charts/flot/jquery.flot.tooltip.min.js"></script>
        <script src="plugins/charts/flot/jquery.flot.curvedLines.js"></script>
        <script src="plugins/charts/sparklines/jquery.sparkline.js"></script>
        <script src="plugins/charts/progressbars/progressbar.js"></script>
        <script src="plugins/ui/waypoint/waypoints.js"></script>
        <script src="plugins/ui/weather/skyicons.js"></script>
        <script src="plugins/ui/notify/jquery.gritter.js"></script>
        <script src="plugins/misc/vectormaps/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="plugins/misc/vectormaps/maps/jquery-jvectormap-world-mill-en.js"></script>
        <script src="plugins/misc/countTo/jquery.countTo.js"></script>
        <script src="js/jquery.dynamic.js"></script>
        <script src="js/main.js"></script>
        <script src="js/pages/dashboard.js"></script>
    </body>
</html>