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
    <link rel="stylesheet" href="assets/plugins/fancybox/source/jquery.fancybox.css">
    <link rel="stylesheet" href="assets/css/artist.css">
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
    <div class="artist_body_start">

            <div class="container">
            <div class="row">
            <div class="col-md-12"> 
            <cms:module:ticket_booking/>
              <!--cms:module:event_home/-->
            </div>  
            </div>
            </div>
       
                
        <div class="container">
            <div class="row">
                <div class="col-md-4 col_md_4">                            
                    <div class="leftsidesection margin-bottom-10">                   
                    <cms:module:artist_images/>    
                    </div>  
                </div>
                <!-- col-md-4 -->
                <div class="col-md-8 col_md_8">
                    <div class="rightsidesection margin-bottom-10" style="height: 400px;"> 
                        <cms:module:artist_info/>        
                    </div>
                    <div class="rightsidesection margin-bottom-10">
                         <cms:module:artist_lyrics/>
                     </div><!-- End rightsidesection -->
                </div>
                <!-- col-md-8 -->
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-md-4 col_md_4">
                    <div class="leftsidesection margin-bottom-10">
                        <cms:module:artist_videos/>    
                    </div>  
                </div>
                <div class="col-md-8 col_md_8">
                    <div class="rightsidesection margin-bottom-10"> 
                        <!-- album Works -->
                          <cms:module:artist_album/>   
                        <!-- End album Works -->
                   </div>  
                </div>
            </div>
        </div><!-- container -->

    

    <div class="container">
    <!-- Related Album -->
       <!--cms:module:artist_related_album/--> 
    <!-- End Related Album -->
    </div>   
  
    <div class="container">
            <div class="row">
                <div class="col-md-4 col_md_4">                            
                    <div class="leftsidesection margin-bottom-10">
                    <cms:module:sponser_home/><br>
                    <cms:module:sponser_home/>
                    </div> <!-- leftsidesection -->
                       
                </div>
                <!-- col-md-4 -->
                <div class="col-md-8 col_md_8">
                    <div class="rightsidesection margin-bottom-10">
                           <cms:module:artist_other_lyrics/>        
                    </div>
                </div>
                <!-- col-md-8 -->
            </div>
            <!-- row -->
        </div><!-- container -->

    <div class="container">
        <!-- Hit Album -->
        <cms:module:artist_hit_album/> 
        <!-- End Hit Album -->
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

<!-- JS Global Compulsory -->
<script type="text/javascript" src="assets/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="assets/plugins/jquery/jquery-migrate.min.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- JS Implementing Plugins -->
<script type="text/javascript" src="assets/plugins/back-to-top.js"></script>
<script type="text/javascript" src="assets/plugins/smoothScroll.js"></script>
<script type="text/javascript" src="assets/plugins/parallax-slider/js/modernizr.js"></script>
<script type="text/javascript" src="assets/plugins/parallax-slider/js/jquery.cslider.js"></script>
<script type="text/javascript" src="assets/plugins/owl-carousel/owl-carousel/owl.carousel.js"></script>
<script type="text/javascript" src="assets/plugins/fancybox/source/jquery.fancybox.pack.js"></script> 
<script type="text/javascript" src="assets/js/plugins/newsTicker.js"></script>
<script type="text/javascript" src="assets/js/custom.js"></script> 
<!-- JS Page Level -->
<script type="text/javascript" src="assets/js/app.js"></script>
<script type="text/javascript" src="assets/js/plugins/owl-carousel.js"></script>
<script type="text/javascript" src="assets/js/plugins/parallax-slider.js"></script>
<script type="text/javascript" src="assets/js/plugins/owl-recent-works.js"></script>
<script type="text/javascript" src="assets/js/plugins/fancy-box.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        App.init();
        OwlCarousel.initOwlCarousel();
        ParallaxSlider.initParallaxSlider();
        OwlRecentWorks.initOwlRecentWorksV1();
        OwlRecentWorks.initOwlRecentWorksV2();
        OwlRecentWorks.initOwlRecentWorksV4();
        FancyBox.initFancybox();

        var multilines = $('.newsticker').newsTicker({
                row_height: 78,
                speed: 800,
                autostart:0,
                prevButton: $('.prev-button'),
                nextButton: $('.next-button'),
                stopButton: $('.stop-button'),
                startButton: $('.start-button'),
            });

         var multilines = $('.newsticker_other').newsTicker({
                row_height: 78,
                speed: 800,
                autostart:0,
                prevButton: $('.prev-button'),
                nextButton: $('.next-button'),
                stopButton: $('.stop-button'),
                startButton: $('.start-button'),
            });

         
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
