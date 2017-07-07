<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head> 
  <cms:metacontains/> 
  <script>var base_url  = "{BASE_URL}";</script>
    <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin'>
    <cms:defaultSourcesCSS/>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/header_footer_index.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="assets/plugins/owl-carousel/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="assets/plugins/fancybox/source/jquery.fancybox.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <cms:analyticstracking/>
</head>
  
<body>
 
<div class="wrapper">
    <!--=== Header  ===-->
    <div class="header-v4">
        <!-- Topbar -->
        <cms:module:top_bar/>
        <!-- End Topbar -->

        <!-- Navbar -->
        <cms:module:search/>
        <!-- End Navbar -->
    </div>
    <!--=== End Header ===-->

 
    <!--=== Content ===-->
    <div class="home_body_start">
        <div class="some_blue_body"></div>
        <div class="container content now_content_start">
        <div class="row">
            <div class="col-md-4">                            
                <div class="videosize margin-bottom-10">                
                  <cms:module:video_home_five_a/>
                </div>              
            </div>                
                <!-- <div class="cmslogo margin-bottom-30"><img class="img-responsive" src="images/cmslogo.png"></div> --> 
            <div class="col-md-8">
                <!--div class="margin-bottom-100"></div-->
                <div class="musicscroll" style="margin-top: 5.5%">
                      <cms:module:svl_home/>
                      <!--p align="center">ADvertisement Banner will be here</p-->  
                </div>  
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <cms:module:sponser_home/>
                <br>
                <cms:module:sponser_home/>
            </div>
            <div class="col-md-8">
                <cms:module:event_home/>
            </div>
        </div>
        </div>
    </div>
    <!--=== End Content ===-->

    <!--=== Footer ===-->
    <div class="footer-v1">
        <cms:module:copyright_footer/>
        <!--/copyright-->
    </div>
    <!--=== End Footer ===-->
</div><!--/wrapper-->
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<cms:defaultSourcesJS/>
<script type="text/javascript" src="assets/plugins/back-to-top.js"></script>
<script type="text/javascript" src="assets/plugins/smoothScroll.js"></script>
<script type="text/javascript" src="assets/plugins/owl-carousel/owl-carousel/owl.carousel.js"></script>
<script type="text/javascript" src="assets/plugins/fancybox/source/jquery.fancybox.pack.js"></script>
<script type="text/javascript" src="assets/js/custom.js"></script>
<script type="text/javascript" src="assets/js/app.js"></script>
<script type="text/javascript" src="assets/js/plugins/owl-carousel.js"></script>
<script type="text/javascript" src="assets/js/plugins/fancy-box.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        App.init();
        OwlCarousel.initOwlCarousel();
        FancyBox.initFancybox();
    });
</script>
<!--[if lt IE 9]>
    <script src="assets/plugins/respond.js"></script>
    <script src="assets/plugins/html5shiv.js"></script>
    <script src="assets/plugins/placeholder-IE-fixes.js"></script>
<![endif]-->
<cms:module:js_css_in_footer/>
</body>
</html>
