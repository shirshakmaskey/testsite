<?php
/* bassic setting */
define("MYINDEX",1);
define("SITEVALUE","local");
define("DS","/");
define("PAGE","page");
define("PROJECT_KEY",'nepalassitance');
if(!defined("ENCR_KEY"))define("ENCR_KEY",PROJECT_KEY.'_');
/* --------------------------------------------------------------------------------*/
/* foldernames  */
define("PROJECT_FOLDER","/");
define("ADMINISTRATOR","myadmin/");
$administrator       = "myadmin";
define("APPLICATIONS","applications/");
define("THEMES","themes");
/* --------------------------------------------------------------------------------*/
/* database and site path and site url*/
include_once("database.php");
/* --------------------------------------------------------------------------------*/
/* database table names*/
include_once("tablename.php");
/* --------------------------------------------------------------------------------*/
define("DR_ADMIN",$_SESSION[ENCR_KEY.'siteDocAdminUrl']);
define('FCPATH', $document_root);
define('FCPATH_ADMIN', FCPATH.ADMINISTRATOR);

/* control pages constant*/
define("FILENAME_DEFAULT","index.php");
define("FILENAME_CONTAINER","container.php");
define("FILENAME_CONTROL","control.php");
/* --------------------------------------------------------------------------------*/
?>