<!doctype html>
<!--[if lt IE 8]><html class="no-js lt-ie8"> <![endif]-->
<html class="">
    <head>
        <meta charset="utf-8">
        <title>ABN</title>
        <style type="text/css">
           .visual-aid {
                /* Styles for visual aid. */
                font-size: 1.5em;
                height: 1.2em;
                background: transparent;
                width: 100%;
                margin: 20px auto;
                position: relative;
            }

            .marquee {
                overflow: hidden;
            }
            .marquee > * {
                white-space: nowrap;
                position: absolute;
                animation: marquee 20s linear 0s infinite;
            }

            @keyframes marquee {
                0% {
                    left: 100%;
                    transform: translateX(0%);
                }
                100% {
                    left: 0%;
                    transform: translateX(-100%);
                }
            }
            .padding-header{
                padding: 5px;
            }
			
			
        </style>
        <!-- Mobile specific metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1 user-scalable=no">
        <!-- Force IE9 to render in normal mode -->
        <!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
        <meta name="author" content="" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta name="application-name" content="" />
        <link rel="shortcut icon" href="<?php echo base_url("template/images/favicon.ico") ?>">
        <!-- Import google fonts - Heading first/ text second -->
        
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
        <!--<link rel="icon" href="<?php echo base_url("template/images/shortcut-icon.png") ?>" type="image/png">-->
        <!--Windows8 touch icon ( http://www.buildmypinnedsite.com/ )-->
        <meta name="msapplication-TileColor" content="#3399cc" />

        <script src="<?php echo base_url('als_asset/offline-asset/') ?>sweetalert2.all.min.js"></script>


        <!--<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" />-->
        <!--<link href="https://cdn.datatables.net/scroller/2.0.0/css/scroller.dataTables.min.css" rel="stylesheet" />-->

        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
        <script src="<?php echo base_url("bst/Bootstrap/admin-html/js/libs/query3.3.1.min.js") ?>"></script>
        <script>
          </script>

    </head>
    <body>
     <?php echo $this->session->flashdata('message'); ?>
        <!--[if lt IE 9]>
      <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
        <!-- .page-navbar -->
        <div id="header" class="page-navbar">
            <!-- .navbar-brand -->
            <a href="<?php echo base_url('menu/home');?>" class="navbar-brand hidden-xs hidden-sm">
                <!-- <img src="<?php echo base_url('bst/Bootstrap/admin-html/img/logo.png') ?>" class="logo hidden-xs" alt="Dynamic logo"> -->
                
                <img src="<?php echo base_url('template/images/iphone.png') ?>" class="logo-sm hidden-lg hidden-md" alt="Dynamic logo">
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
                        <a href="#"><span style="font-size: 20px;" class="text">ABN - Akademi Bela Negara </span> </a>
                    </li>

                </ul>
                <!-- / top left nav -->
                <!-- top right nav -->
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <?php
                        $nama = $this->session->userdata('name');
                        $level = $this->session->userdata('level');
						$username = $this->session->userdata('username');
                        $levelname = $this->session->userdata('levelname');
                        // $reqflag = $this->session->userdata('reqflag');
                        // $appflag = $this->session->userdata('appflag');
                        ?>
                        <a href="#"><span style="font-size: 15px;" class="text"><?php echo $nama . " | " . $levelname ?></span>&nbsp;&nbsp;</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url("menu/logout/$username") ?>">
                            <i class="fa fa-power-off"></i>
                            <span class="sr-only">Logout</span>
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

                        <div class="side-nav">

                        </div>
                        <!-- / side-nav -->
                        <div class="sidebar-panel">
                            <h5 class="sidebar-panel-title">Navigation</h5>
                        </div>
                        <!--  .sidebar-panel -->
                        <div class="side-nav">
                            <ul class="nav">
                                <?php $temp = ""; ?>
                                <?php foreach ($data as $key => $item) { ?>
                                    <?php if ($item->f_parentid != $temp) { ?>
                                        <li class="<?php if ($item->clasy == 'active') echo'hasSub highlight-menu' ?>"><a class="<?php if ($item->clasy == 'active') echo'expand' ?>" href="#"><i class="<?php echo $item->icon ?>"></i>
                                                <span class="txt"><?php echo $item->f_menuname ?></span></a>
                                            <ul class="sub <?php if ($item->clasy == 'active') echo 'show' ?> ">
                                            <?php } ?>
                                                <?php if($item->f_itemurl == uri_string()){
                                                    
                                                } ?>
                                            <li><a class="<?php echo $item->clasz ?>" href="<?php echo base_url($item->f_itemurl) ?>"><span class="txt"><?php echo $item->f_itemname ?></span></a>
                                            </li> 
                                            <?php if ($key == count($data) - 1 || $item->f_parentid != $data[$key + 1]->f_parentid) { ?>  
                                            </ul>
                                        </li>
                                    <?php } ?>

                                    <?php $temp = $item->f_parentid ?>
                                <?php } ?>
                            </ul>
                        </div>



                    </div>
                    <!-- End .sidebar-scrollarea -->
                </div>
                <!-- End .sidebar-inner -->
            </aside>
            <!-- / page-sidebar -->
            <!-- Start #right-sidebar -->

            <!-- End #right-sidebar  //right-sidebar-page-->
            <!-- .page-content -->
			
            <div class="page-content sidebar-page  clearfix">
                <!-- .page-content-wrapper -->
                <div class="page-content-wrapper">
                    <div class="page-content-inner">
                        <!-- .page-content-inner -->
                            <div id="page-header" class="clearfix" style="padding: 10px; background: white">
                            <div class=" marquee visual-aid">
                                <!-- <div class="marquee visual-aid"> -->
                                <span class="txt"><?php echo $nama = $this->session->userdata('text_header'); ?></span>
                                <!-- </div> -->
                                <h2 style="display: none; ">C24System</h2>
                               <!-- <span class="txt"></span> --> 
                            </div>

                        </div>
                            

                        <!-- / .row -->

                        <!-- End .row -->

                        <!--content-->
                        <?php $this->load->view($content); ?>    
                        <!-- / .page-content-inner -->
                    </div>
                    <!-- / page-content-wrapper -->
                </div>
                <!-- / page-content -->
            </div>
            <!-- / page-content -->
        </div>
        <!-- / #wrapper -->

        <!-- End #footer  -->
        <!-- Back to top -->
        <div id="back-to-top"><a href="#">Back to Top</a>
        </div>
        <!-- Javascripts -->
        <!-- Load pace first -->
        <script src="<?php echo base_url('bst/Bootstrap/admin-html/plugins/core/pace/pace.min.js') ?>"></script>
        <!-- Important javascript libs(put in all pages) -->
          <script src="<?php echo base_url("bst/Bootstrap/admin-html/js/libs/jquery-2.1.1.min.js") ?>"></script>
        
        <script src="<?php echo base_url("bst/Bootstrap/admin-html/js/libs/jquery-ui-1.10.4.min.js") ?>"></script>
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
        <script src="<?php echo base_url('bst/Bootstrap/admin-html/plugins/core/velocity/jquery.velocity.min.js') ?>"></script>
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
  
        <script src="<?php echo base_url('bst/Bootstrap/admin-html/plugins/ui/waypoint/waypoints.js') ?>"></script>
        <script src="<?php echo base_url('bst/Bootstrap/admin-html/plugins/ui/weather/skyicons.js') ?>"></script>
        <script src="<?php echo base_url('bst/Bootstrap/admin-html/plugins/ui/notify/jquery.gritter.js') ?>"></script>
        <script src="<?php echo base_url('bst/Bootstrap/admin-html/plugins/misc/vectormaps/jquery-jvectormap-1.2.2.min.js') ?>"></script>
        <script src="<?php echo base_url('bst/Bootstrap/admin-html/plugins/misc/vectormaps/maps/jquery-jvectormap-world-mill-en.js') ?>"></script>



        <script src="<?php echo base_url('bst/Bootstrap/admin-html/plugins/forms/fancyselect/fancySelect.js') ?>"></script>
        <script src="<?php echo base_url('bst/Bootstrap/admin-html/plugins/forms/select2/select2.js') ?>"></script>
        <script src="<?php echo base_url('bst/Bootstrap/admin-html/plugins/forms/maskedinput/jquery.maskedinput.js') ?>"></script>
        <script src="<?php echo base_url('bst/Bootstrap/admin-html/plugins/forms/dual-list-box/jquery.bootstrap-duallistbox.js') ?>"></script>
        <script src="<?php echo base_url('bst/Bootstrap/admin-html/plugins/forms/spinner/jquery.bootstrap-touchspin.js') ?>"></script>
        <script src="<?php echo base_url('bst/Bootstrap/admin-html/plugins/forms/bootstrap-datepicker/bootstrap-datepicker.js') ?>"></script>
        <script src="<?php echo base_url('bst/Bootstrap/admin-html/plugins/forms/bootstrap-timepicker/bootstrap-timepicker.js') ?>"></script>
        <script src="<?php echo base_url('bst/Bootstrap/admin-html/plugins/forms/bootstrap-colorpicker/bootstrap-colorpicker.js') ?>"></script>
        <script src="<?php echo base_url('bst/Bootstrap/admin-html/plugins/forms/bootstrap-tagsinput/bootstrap-tagsinput.js') ?>"></script>
        <script src="<?php echo base_url('bst/Bootstrap/admin-html/js/libs/typeahead.bundle.js') ?>"></script>
        <script src="<?php echo base_url('bst/Bootstrap/admin-html/plugins/forms/summernote/summernote.js') ?>"></script>
        <script src="<?php echo base_url('bst/Bootstrap/admin-html/plugins/forms/bootstrap-markdown/bootstrap-markdown.js') ?>"></script>
        <script src="<?php echo base_url('bst/Bootstrap/admin-html/plugins/forms/dropzone/dropzone.js') ?>"></script>


        <script src="<?php echo base_url('bst/Bootstrap/admin-html/plugins/charts/sparklines/jquery.sparkline.js') ?>"></script>
        <script src="<?php echo base_url('bst/Bootstrap/admin-html/plugins/tables/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('bst/Bootstrap/admin-html/plugins/tables/datatables/dataTables.tableTools.js') ?>"></script>
        <script src="<?php echo base_url('bst/Bootstrap/admin-html/plugins/tables/datatables/dataTables.bootstrap.js') ?>"></script>
        <script src="<?php echo base_url('bst/Bootstrap/admin-html/plugins/tables/datatables/dataTables.responsive.js') ?>"></script>


        <script src="<?php echo base_url('bst/Bootstrap/admin-html/plugins/misc/countTo/jquery.countTo.js') ?>"></script>
        <script src="<?php echo base_url('bst/Bootstrap/admin-html/js/jquery.dynamic.js') ?>"></script>
        <script src="<?php echo base_url('bst/Bootstrap/admin-html/js/main.js') ?>"></script>
        


        <script src="<?php echo base_url('bst/Bootstrap/admin-html/js/pages/forms-advanced.js') ?>"></script>
       

      
        <script>
!function(n){"use strict";n.fn.idle=function(e){var t,i,o={idle:6e4,events:"mousemove keydown mousedown touchstart",onIdle:function(){},onActive:function(){},onHide:function(){},onShow:function(){},keepTracking:!0,startAtIdle:!1,recurIdleCall:!1},c=e.startAtIdle||!1,d=!e.startAtIdle||!0,l=n.extend({},o,e),u=null;return n(this).on("idle:stop",{},function(){n(this).off(l.events),l.keepTracking=!1,t(u,l)}),t=function(n,e){return c&&(e.onActive.call(),c=!1),clearTimeout(n),e.keepTracking?i(e):void 0},i=function(n){var e,t=n.recurIdleCall?setInterval:setTimeout;return e=t(function(){c=!0,n.onIdle.call()},n.idle)},this.each(function(){u=i(l),n(this).on(l.events,function(){u=t(u,l)}),(l.onShow||l.onHide)&&n(document).on("visibilitychange webkitvisibilitychange mozvisibilitychange msvisibilitychange",function(){document.hidden||document.webkitHidden||document.mozHidden||document.msHidden?d&&(d=!1,l.onHide.call()):d||(d=!0,l.onShow.call())})})}}(jQuery);

// <-- THIS IS THE JS SOURCE CODE OF Jquery.Idle --------
//var $username = $this->session->userdata('username');
$(document).idle({
  onIdle: function(){
    alert('Waktu Login Anda Telah Habis,Silakan Login Kembali');
    window.location.href ="<?php echo base_url('menu/logout/'.$username)?>";
  },
  idle: 600000
})
</script>

<script>
$('form input').keydown(function (e) {
    if (e.keyCode == 13) {
        e.preventDefault();
        return false;
    }
});
</script>




        <!--<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>-->
        <!--<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap.min.js"></script>-->

    </body>
</html>