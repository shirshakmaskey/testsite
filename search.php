<?php 
  define('SEARCH_PAGE', 1);
  /*** define the site path ***/
  $site_path = realpath(dirname(__FILE__));
  define ('__SITE_PATH', $site_path);
 
 //Load the Main File Which load all files and classes,Function Necessary For The Website
 require("includes/application_top.php");
 $scms['{BODY_CLASS}']     = "";
 $scms['JS_CSS_IN_FOOTER'] = "";
 define("CURRENT_TEMPLATE",get_template()); 
 $mode  =  isset($_REQUEST['mode'])?$_REQUEST['mode']:'search';
 $themes 			=  THEMES.DS.CURRENT_TEMPLATE.DS.FILENAME_SEARCH;

  //load the html body container
  require(PAGE.DS.FILENAME_CONTAINER);
  themes($themes, $cms, $scms, CURRENT_TEMPLATE);
?>