<?php 
  define('ACTION', 1);
  /*** define the site path ***/
  $site_path = realpath(dirname(__FILE__));
  define ('__SITE_PATH', $site_path);
 
 //Load the Main File Which load all files and classes,Function Necessary For The Website
 require("includes/application_top.php"); 
   
  $mode  =  $_REQUEST['mode'];

  switch($mode){
  	case 'login': require_once("page/".(!empty($module)?"mod_".$module."/":"").$mode.".php"); break;
  	default:   	  
    if(!empty($contentPage) and file_exists("page/".(!empty($module)?"mod_".$module."/":"").$mode.".php")){  	   
  	   require_once("page/".(!empty($module)?"mod_".$module."/":"").$mode.".php");
     }else{
       require_once("page/".(!empty($module)?"mod_".$module."/":"")."action.php"); break;
     }
  }