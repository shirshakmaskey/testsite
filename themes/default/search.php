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
    <link rel="stylesheet" href="assets/plugins/parallax-slider/css/parallax-slider.css">
    <link rel="stylesheet" href="assets/plugins/owl-carousel/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/search.css">
    <link rel="stylesheet" href="assets/css/custom.css">
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
    <div class="inside_body_start">

                
        <div class="container content">
            <div class="row">
                <div class="col-md-4 col_md_4">                            

                    <div class="leftsidesection margin-bottom-10">
                    <h3 class="headline_title">Feature vidoes</h3>
                         <div id="feature_video" class="videosize margin-bottom-10">   
                         <cms:module:video_featured/>             
                         </div>
                    </div>
<div class="leftsidesection margin-bottom-10">
                     <h3 class="headline_title">JUST ADDED</h3>
                          <div class="items_list">
                              <cms:module:latest_svl/>
                          </div>        
                    </div>

<div class="leftsidesection margin-bottom-10">
                    <cms:module:custom_left/>
                    </div> <!-- leftsidesection -->                    


                </div>
                <!-- col-md-4 -->
                <div class="col-md-8 col_md_8">

                    <div class="rightsidesection margin-bottom-10"> 

                    <cms:module:user_search/>                        

                   </div><!-- End rightsidesection -->
                </div>
                <!-- col-md-8 -->
            </div>
            <!-- row -->
        </div><!-- container -->





    </div>
    <!--=== End Content ===--> 

    <!--=== Footer ===-->
    <div class="footer-v1">
        <cms:module:copyright_footer/>
        <!--/copyright-->
    </div>
    <!--=== End Footer ===-->
</div><!--/wrapper-->

<cms:defaultSourcesJS/>
<script type="text/javascript" src="assets/plugins/back-to-top.js"></script>
<script type="text/javascript" src="assets/plugins/smoothScroll.js"></script>
<script type="text/javascript" src="assets/plugins/parallax-slider/js/modernizr.js"></script>
<script type="text/javascript" src="assets/plugins/parallax-slider/js/jquery.cslider.js"></script>
<script type="text/javascript" src="assets/plugins/owl-carousel/owl-carousel/owl.carousel.js"></script>
<!-- JS Customization -->
<script type="text/javascript" src="assets/js/custom.js"></script>
<!-- JS Page Level -->
<script type="text/javascript" src="assets/js/app.js"></script>
<script type="text/javascript" src="assets/js/plugins/owl-carousel.js"></script>
<script type="text/javascript" src="assets/js/plugins/parallax-slider.js"></script>
<script type="text/javascript" src="assets/js/plugins/owl-recent-works.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        App.init();
        OwlCarousel.initOwlCarousel();
        ParallaxSlider.initParallaxSlider();
        OwlRecentWorks.initOwlRecentWorksV1();
        OwlRecentWorks.initOwlRecentWorksV2();
        OwlRecentWorks.initOwlRecentWorksV4();
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
