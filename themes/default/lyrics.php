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
    <link rel="stylesheet" href="assets/css/search.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src='https://s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4d9d79c30a2d0a7f'></script>

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
                <cms:module:album_info_lyrics/>
                <!-- row -->
        </div>
        <!-- container -->    
                
        <div class="container content">
            <div class="row">
                <div class="col-md-4 col_md_4">                            

                    <div class="leftsidesection margin-bottom-10">
                    <h3 class="headline_title">Feature vidoes</h3>
                         <div id="feature_video" class="videosize margin-bottom-10">   
                         <cms:module:video_featured_songs/>             
                         </div>
                    </div>
                    <div class="leftsidesection margin-bottom-10">
                     <h3 class="headline_title">LATEST</h3>
                          <div class="items_list">
                              <cms:module:svl_home/>
                          </div>        
                    </div>

                <div class="leftsidesection margin-bottom-10">
                    <cms:module:custom_left/>
                </div> <!-- leftsidesection -->                    


                </div>
                <!-- col-md-4 -->
                <div class="col-md-8 col_md_8">

                    <div class="rightsidesection margin-bottom-10"> 

                    <cms:module:lyrics/>                        

                   </div><!-- End rightsidesection -->


                    <div class="rightsidesection margin-bottom-10">
                       <cms:module:lyrice_album_lyrics/>                       
                    </div>

                </div>
                <!-- col-md-8 -->
            </div>
            <!-- row -->
        </div><!-- container -->

    
    <div class="container">
    <!-- Related Album -->
       <cms:module:artist_album/>
    <!-- End Related Album -->
    </div>

    <div class="container">
    <!-- Related Album -->
       <cms:module:artist_related_album/> 
    <!-- End Related Album -->
    </div>   
  
    

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

<cms:defaultSourcesJS/>
<script type="text/javascript" src="assets/plugins/back-to-top.js"></script>
<script type="text/javascript" src="assets/plugins/smoothScroll.js"></script>
<script type="text/javascript" src="assets/plugins/fancybox/source/jquery.fancybox.pack.js"></script>
<script type="text/javascript" src="assets/plugins/parallax-slider/js/modernizr.js"></script>
<script type="text/javascript" src="assets/plugins/parallax-slider/js/jquery.cslider.js"></script>
<script type="text/javascript" src="assets/plugins/owl-carousel/owl-carousel/owl.carousel.js"></script>
<!-- JS Customization -->
<script type="text/javascript" src="assets/js/custom.js"></script>
<!-- JS Page Level -->
<script type="text/javascript" src="assets/js/app.js"></script>
<script type="text/javascript" src="assets/js/plugins/fancy-box.js"></script>
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
