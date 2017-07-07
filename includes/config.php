<?php
/* basic setting */
$project_folder  = "lyricsnepal";
define("MYINDEX",1);
define("SITEVALUE","local");
define("DS","/");
define("PAGE","page");
define("ENCR_KEY",$project_folder.'f_');
/* --------------------------------------------------------------------------------*/
/* foldernames  */
define("PROJECT_FOLDER","/lyricsnepal/");
//define("PROJECT_FOLDER","/");
define("ADMINISTRATOR","myadmin/");
$administrator       = "myadmin";
define("ASSETS","assets/");
define("APPLICATIONS","applications/");
define("THEMES","themes");
/* --------------------------------------------------------------------------------*/
/* database and site path and site url*/
include_once("database.php");
/* --------------------------------------------------------------------------------*/
/* database table names*/
include_once("tablename.php");
/* --------------------------------------------------------------------------------*/
/* fcpath and session variable*/
include_once("document_path.php");
/* --------------------------------------------------------------------------------*/
/* control pages constant*/
include_once("filename.php");
/* --------------------------------------------------------------------------------*/
/* --------------------------------------------------------------------------------*/
/* --------------------------------------site status-------------------------------*/
$env_status_arr   = array('running','beta','maintenance','under_construction');
$env_status_value =  $env_status_arr[1];
define('ENVIRONMENT_STATUS', $env_status_value);
$environment_status =  constant("ENVIRONMENT_STATUS");
if($env_status_value==='maintenance' ||  $env_status_value==='under_construction')
{ include("images/cgi/".$environment_status.".php"); 
  exit(); 
}
/* --------------------------------------------------------------------------------*/