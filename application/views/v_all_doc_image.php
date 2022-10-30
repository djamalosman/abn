<!doctype html>
<!--[if lt IE 8]><html class="no-js lt-ie8"> <![endif]-->
<html class="no-js">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <title>Portfolio 4 columns | Dynamic frontend</title>
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
        <link href='http://fonts.googleapis.com/css?family=Raleway:100,200,300,700,800,900' rel='stylesheet' type='text/css'>
        <!-- Css files -->
        <!-- Icons -->
        <link href="<?php echo base_url ('assets/frontend/css/icons.css')?>" rel="stylesheet" />
        <!-- Bootstrap stylesheets (included template modifications) -->
        <link href="<?php echo base_url ('assets/frontend/css/bootstrap.css')?>" rel="stylesheet" />
        <!-- Main stylesheets (template main css file) -->
        <link href="<?php echo base_url ('assets/frontend/css/main.css')?>" rel="stylesheet" />
        <!-- Plugins stylesheets (all plugin custom css) -->
        <link href="<?php echo base_url ('assets/frontend/css/plugins.css')?>" rel="stylesheet" />
        <!-- Custom stylesheets ( Put your own changes here ) -->
        <link href="<?php echo base_url ('assets/frontend/css/custom.css')?>" rel="stylesheet" />
        <!-- Fav and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url ('assets/frontend/img/ico/apple-touch-icon-144-precomposed.png')?>">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url ('assets/frontend/img/ico/apple-touch-icon-114-precomposed.png')?>">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url ('assets/frontend/img/ico/apple-touch-icon-72-precomposed.png')?>">
        <link rel="apple-touch-icon-precomposed" href="<?php echo base_url ('assets/frontend/img/ico/apple-touch-icon-57-precomposed.png')?>">
        <link rel="icon" href="<?php echo base_url ('assets/frontend/img/ico/favicon.ico" type="image/png')?>">
        <!-- Windows8 touch icon ( http://www.buildmypinnedsite.com/ )-->
        <meta name="msapplication-TileColor" content="#3399cc" />
    </head>
    <body>
        <!--[if lt IE 9]>
      <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
        <div id="header" class="header-fixed">
            <!-- #header -->
            <div class="container">
                <a href="#" class="responsive-menu-toggle">
                    <i class="fa fa-reorder"></i>
                    <span class="sr-only">Open Menu</span>
                </a>
                <!-- <a href="index.html" class="logo">
                    <img src="img/sitelogo.png" alt="Dynamic Frontend logo">
                </a> -->
                <div id="morphsearch" class="morphsearch"hidden="">
                    <form class="morphsearch-form">
                        <input class="morphsearch-input" type="search" placeholder="Search..." />
                        <button class="morphsearch-submit" type="submit">Search</button>
                    </form>
                    <div class="morphsearch-content">
                        <!-- <div class="search-column">
                            <h2>People</h2>
                            <a class="search-media-object" href="#">
                                <img class="round" src="img/avatars/2.jpg" alt="Dean Huges" />
                                <h3>Dean Huges</h3>
                            </a>
                            <a class="search-media-object" href="#">
                                <img class="round" src="img/avatars/4.jpg" alt="Selena Jones" />
                                <h3>Selena Jones</h3>
                            </a>
                            <a class="search-media-object" href="#">
                                <img class="round" src="img/avatars/5.jpg" alt="Mike Thomas" />
                                <h3>Mike Thomas</h3>
                            </a>
                            <a class="search-media-object" href="#">
                                <img class="round" src="img/avatars/6.jpg" alt="Jim Kerry" />
                                <h3>Jim Kerry</h3>
                            </a>
                            <a class="search-media-object" href="#">
                                <img class="round" src="img/avatars/7.jpg" alt="Little Jonh" />
                                <h3>Little Jonh</h3>
                            </a>
                            <a class="search-media-object" href="#">
                                <img class="round" src="img/avatars/8.jpg" alt="Keith Smith" />
                                <h3>Keith Smith</h3>
                            </a>
                        </div> -->
                        <!-- <div class="search-column">
                            <h2>Projects</h2>
                            <a class="search-media-object" href="project-item.html">
                                <img src="img/projects/thumbs/project1.jpg" alt="Project 1" />
                                <h3>Project title 1</h3>
                            </a>
                            <a class="search-media-object" href="project-item.html">
                                <img src="img/projects/thumbs/project2.jpg" alt="Project 2" />
                                <h3>Project title 2</h3>
                            </a>
                            <a class="search-media-object" href="project-item.html">
                                <img src="img/projects/thumbs/project3.jpg" alt="Project 3" />
                                <h3>Project title 3</h3>
                            </a>
                            <a class="search-media-object" href="project-item.html">
                                <img src="img/projects/thumbs/project4.jpg" alt="Project 4" />
                                <h3>Project title 4</h3>
                            </a>
                            <a class="search-media-object" href="project-item.html">
                                <img src="img/projects/thumbs/project5.jpg" alt="Project 5" />
                                <h3>Project title 5</h3>
                            </a>
                            <a class="search-media-object" href="project-item.html">
                                <img src="img/projects/thumbs/project6.jpg" alt="Project 6" />
                                <h3>Project title 6</h3>
                            </a>
                        </div> -->
                        <!-- <div class="search-column">
                            <h2>Recent</h2>
                            <a class="search-media-object" href="project-item.html">
                                <img src="img/projects/thumbs/project4.jpg" alt="Project 4" />
                                <h3>Project title 4</h3>
                            </a>
                            <a class="search-media-object" href="project-item.html">
                                <img src="img/blog/thumbs/blog.jpg" alt="Blog" />
                                <h3>Creativity standards rise once again</h3>
                            </a>
                            <a class="search-media-object" href="project-item.html">
                                <img src="img/blog/thumbs/blog1.jpg" alt="Blog" />
                                <h3>Find the perfect spot when parking your car</h3>
                            </a>
                            <a class="search-media-object" href="project-item.html">
                                <img src="img/blog/thumbs/blog2.jpg" alt="Blog" />
                                <h3>What we need to know when do laundry in public spots</h3>
                            </a>
                            <a class="search-media-object" href="#">
                                <img class="round" src="img/avatars/6.jpg" alt="Jim Kerry" />
                                <h3>Jim Kerry</h3>
                            </a>
                            <a class="search-media-object" href="project-item.html">
                                <img src="img/blog/thumbs/blog3.jpg" alt="Blog" />
                                <h3>How to make your garden looks like paradise</h3>
                            </a>
                        </div> -->
                    </div>
                    <!-- /morphsearch-content -->
                    <span class="morphsearch-close"></span>
                </div>
                <!-- /morphsearch -->
                <div class="site-nav">
                    <ul>
                        <<li>
                            <a href="<?php echo base_url('/') ?>">Beranda</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('Create_document/v_all_doc_news') ?>">Berita</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('Create_document_agenda/v_all_doc_agenda') ?>">Agenda</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('Create_document_video/v_all_doc_video') ?>">Video</a>
                        </li>
                        <li>
                        <a href="<?php echo base_url('Create_document_image/v_all_doc_image') ?>">Gambar</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('Create_document_opini/v_all_doc_opini') ?>">Opini</a>
                        </li>
                        
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Profil </a>
                            <ul class="dropdown-menu right" role="menu">
                            
                                <li><a href="<?php echo base_url("Create_document_about/v_all_one_about") ?>">Tentang ABN</a>
                                </li>
                                <li><a href="<?php echo base_url('Create_document_tokoh/v_all_doc_tokoh')?>">Tokoh</a>
                                </li>
                                <li><a href="<?php echo base_url('Create_document_staff/v_all_doc_staff')?>"">Staff</a>
                                </li>
                                <!-- <li><a href="portfolio-4.html">4 columns</a>
                                </li> -->
                            </ul>
                        </li>
                        <!-- <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Blog </a>
                            <ul class="dropdown-menu right" role="menu">
                                <li><a href="blog.html">Blog list</a>
                                </li>
                                <li><a href="blog-item.html">Blog item</a>
                                </li>
                            </ul>
                        </li> -->
                        <!-- <li>
                            <a href="http://themes.suggelab.com/#product=dynamic" target="_blank">Admin Theme</a>
                        </li> -->
                    </ul>
                </div>
                <!-- / .site-nav -->
            </div>
            <!-- / .container -->
        </div>
        <!-- / #header -->
        <div id="content">
            <!-- #content -->
            <!-- SECTION START TOPBAR -->
            <section id="topbar">
                <div class="container">
                    <div class="row">
                        <!-- .row start -->
                        <div class="col-md-6">
                            <!-- col-md-6 start here -->
                            <h1><?php echo $pagename ?></h1>
                        </div>
                        <!-- col-md-6 end here -->
                        <div class="col-md-6 text-right">
                            <!-- col-md-6 start here -->
                            <ul class="breadcrumb">
                                <!-- <li><a href="index.html">Home</a>
                                </li>
                                <li><a href="#">Portfolio</a>
                                </li>
                                <li class="active">Portfolio 4 columns</li> -->
                            </ul>
                        </div>
                        <!-- col-md-6 end here -->
                    </div>
                    <!-- / .row -->
                </div>
            </section>
            <!-- SECTION END -->
            <!-- SECTION START PORTFOLIO -->
            <section class="portfolio portfolio-4-columns white-bg">
                <div class="container">
                    <!-- .container -->
                    <div class="tabs">
                        <!-- Start tabs -->
                        <ul class="nav nav-tabs nav-justified">
                            <!-- <li class="active">
                                <a class="filter" href="#" data-toggle="tab" data-filter="all"> All</a>
                            </li>
                            <li>
                                <a class="filter" href="#" data-toggle="tab" data-filter=".person" data-type="person"> Persons</a>
                            </li>
                            <li>
                                <a class="filter" href="#" data-toggle="tab" data-filter=".animals" data-type="animals"> Animals</a>
                            </li>
                            <li>
                                <a class="filter" href="#" data-toggle="tab" data-filter=".nature" data-type="nature"> Nature</a>
                            </li>
                            <li>
                                <a class="filter" href="#" data-toggle="tab" data-filter=".other" data-type="other"> Others</a>
                            </li> -->
                        </ul>
                    </div>
                </div>
                <!-- / .container -->
                <div class="projects relative ovh">
                        <div class="row">
                            <div id="" class="col-lg-10">
                                <div class="row gallery sortable-layout">
                                    <!-- Start .row -->
                                   
                                    <!-- End .col-md-3 -->
                                <?php foreach ($all_doc_image as $image_all){?>    
                                    <div class="col-xs-12 col-md-3" >
                                        <!-- Start .col-md-3 -->
                                        <div class="panel panel-default plain panelMove">
                                            <!-- Start .panel -->
                                            
                                            <div class="panel-body">
                                            
                                                <a href="<?php echo base_url('uploads/' . $image_all->file_content); ?>" data-toggle="lightbox" data-gallery="gallerymode" data-title="Gallery" data-parrent>
                                                    <img class="img-responsive" src="<?php echo base_url('uploads/' . $image_all->file_content); ?>"style="width:404px;height:300px">
                                                </a>
                                            </div>
                                        </div>
                                        <!-- End .panel -->
                                    </div>
                                <?php } ?>    
                                </div>
                                <!-- End .row -->
                            </div>
                            <!-- col-lg-10 end here -->
                            
                            <!-- col-lg-2 end here -->
                        </div>
                </div>
                <!-- / .projects -->
            </section>
            <!-- SECTION END -->
        </div>
        <!-- / #content -->
        <div id="overlay" class="overlay"></div>
        <div id="footer">
            <!-- #footer -->
            <div class="container">
                <div class="row">
                    <!-- .row start -->
                    <div class="col-md-4 footer-column">
                        <!-- col-md-4 start here -->
                       
                        <div class="footer-map">
                            
                        </div>
                    </div>
                    <!-- col-md-4 end here -->
                    <div class="col-md-4 footer-column">
                        <div class="footer-map">
                            
                        </div>
                    </div>
                    <!-- col-md-4 end here -->
                    <div class="col-md-4 col-xs-10 footer-column">
                        <!-- col-md-4 start here -->
                        <h5 class="mb20"><strong>Subscribe</strong> to Our Newsletter to get latest updates, Discount Offers &amp; free support:</h5>
                        <form class="form-inline mb30" role="form">
                            <div class="form-group">
                                <div class="input-group input-icon">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Enter email">
                                    <span class="input-group-btn">
                                <button type="submit" class="btn btn-success">Subscribe</button>
                            </span>
                                </div>
                            </div>
                        </form>
                        <div class="row">
                            <!-- .row start -->
                            <div class="col-md-6  col-sm-6 clearfix mb20">
                                <!-- col-md-6 start here -->
                                <a href="#" class="btn btn-social-icon btn-facebook pull-left mr10">
                                    <i class="fa fa-facebook"></i>
                                </a>
                                <a href="#" class="pull-left footer-link">
                                    <strong>Like us</strong>
                                    <br>on Facebook
                                </a>
                            </div>
                            <!-- col-md-6 end here -->
                            <div class="col-md-6  col-sm-6 clearfix mb20">
                                <!-- col-md-6 start here -->
                                <a href="#" class="btn btn-social-icon btn-twitter pull-left mr10">
                                    <i class="fa fa-twitter"></i>
                                </a>
                                <a href="#" class="pull-left footer-link">
                                    <strong>Follow us</strong>
                                    <br>on Twitter
                                </a>
                            </div>
                            <!-- col-md-6 end here -->
                            <div class="col-md-6 col-sm-6 clearfix mb20">
                                <!-- col-md-6 start here -->
                                <a href="#" class="btn btn-social-icon btn-instagram pull-left mr10">
                                    <i class="fa fa-instagram"></i>
                                </a>
                                <a href="#" class="pull-left footer-link">
                                    <strong>Follow us</strong>
                                    <br>on Instagram
                                </a>
                            </div>
                            <!-- col-md-6 end here -->
                            <div class="col-md-6 col-sm-6 clearfix ">
                                <!-- col-md-6 start here -->
                                <a href="#" class="btn btn-social-icon btn-google-plus pull-left mr10">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                                <a href="#" class="pull-left footer-link">
                                    <strong>Add us</strong>
                                    <br>on GooglePlus
                                </a>
                            </div>
                            <!-- col-md-6 end here -->
                        </div>
                        <!-- / .row -->
                    </div>
                    <!-- col-md-4 end here -->
                </div>
                <!-- / .row -->
            </div>
            <div class="footer-copyright">
                <div class="container">
                    <p class="pull-left">
                       
                    </p>
                    <p class="pull-right">
                        <a href="#" class="mr5">Terms of use</a>
                        |
                        <a href="#" class="ml5 mr25">Privacy police</a>
                    </p>
                </div>
            </div>
        </div>
        <!-- / #footer -->
        <!-- Back to top -->
        <div id="back-to-top"><a href="#">Back to Top</a>
        </div>
        <!-- Javascripts -->
        <!-- Load pace first -->
        <script src="<?php echo base_url('assets/frontend/plugins/core/pace/pace.min.js')?>"></script>
        <!-- Important javascript libs(put in all pages) -->
        <script type="text/javascript" src="<?php echo base_url('assets/frontend/js/libs/jquery-2.1.1.min.js')?>"></script>
        
        <script type="text/javascript" src="<?php echo base_url('assets/frontend/js/libs/jquery-ui-1.10.4.min.js')?>"></script>
       
        <!--[if lt IE 9]>
  <script type="text/javascript" src="js/libs/excanvas.min.js"></script>
  <script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <script type="text/javascript" src="js/libs/respond.min.js"></script>
<![endif]-->
        <!-- Bootstrap plugins -->
        <script src="<?php echo base_url('assets/frontend/js/bootstrap/bootstrap.js')?>"></script>
        <!-- Core plugins ( not remove ) -->
        <script src="<?php echo base_url('assets/frontend/js/libs/modernizr.custom.js')?>"></script>
        <!-- Remove click delay in touch -->
        <script src="<?php echo base_url('assets/frontend/plugins/core/fastclick/fastclick.js')?>"></script>
        <!-- Css browser selector -->
        <script src="<?php echo base_url('assets/frontend/plugins/core/browser-selector/css_browser_selector.js')?>"></script>
        <!-- Class condition helper -->
        <script src="<?php echo base_url('assets/frontend/js/libs/classie.js')?>"></script>
        <!-- Other plugins ( load only nessesary plugins for every page) -->
        <script src="<?php echo base_url('assets/frontend/plugins/ui/mixitup/jquery.mixitup.js')?>"></script>
        <script src="<?php echo base_url('assets/frontend/js/main.js')?>"></script>
        <script src="<?php echo base_url('assets/frontend/js/pages/portfolio.js')?>"></script>
        <script src="<?php echo base_url('assets/frontend/plugins/ui/lightbox/ekko-lightbox.js')?>"></script>
        <script src="<?php echo base_url('assets/frontend/plugins/ui/lightbox/ekko-lightbox.js')?>"></script>
        <script src="<?php echo base_url('assets/frontend/js/pages/gallery.js')?>"></script>
       
        <script src="<?php echo base_url('assets/frontend/plugins/sparklines/jquery.sparkline.js')?>"></script>
        <script src="<?php echo base_url('assets/frontend/plugins/checkall/jquery.checkAll.js')?>"></script>
       
    </body>
</html>