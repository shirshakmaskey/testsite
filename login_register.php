<?php 
  define('LOGIN_REGISTER_PAGE', 1);
  /*** define the site path ***/
  $site_path = realpath(dirname(__FILE__));
  define ('__SITE_PATH', $site_path);
 
 //Load the Main File Which load all files and classes,Function Necessary For The Website
 require("includes/application_top.php");
 $scms['{BODY_CLASS}']     = "";
 $scms['JS_CSS_IN_FOOTER'] = "";
 define("CURRENT_TEMPLATE",get_template()); 
 $themes 			=  THEMES.DS.CURRENT_TEMPLATE.DS.FILENAME_LOGIN_REGISTER;
  //load the html body container
  require(PAGE.DS.FILENAME_CONTAINER);
  ?>
  <script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1322253101191500',
      cookie     : true,
      xfbml      : true,
      version    : 'v2.8'
    });
    FB.AppEvents.logPageView();   
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));


FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
});
</script> 
  <?php
  themes($themes, $cms, $scms, CURRENT_TEMPLATE);
?>