<?php 
  define('PAYMENT_PAGE', 1);
  define('SUCCESS_PAGE', 1);
  /*** define the site path ***/
  $site_path = realpath(dirname(__FILE__));
  define ('__SITE_PATH', $site_path);
 
 //Load the Main File Which load all files and classes,Function Necessary For The Website
 require("includes/application_top.php");
 $module  =  "payment"; $contentPage  =  "success";
 $scms['{BODY_CLASS}']     = "";
 $scms['JS_CSS_IN_FOOTER'] = "";
  define("CURRENT_TEMPLATE",get_template()); 
 $themes 			=  THEMES.DS.CURRENT_TEMPLATE.DS."success.php";

  //load the html body container
  require(PAGE.DS.FILENAME_CONTAINER);
  themes($themes, $cms, $scms, CURRENT_TEMPLATE);
?>