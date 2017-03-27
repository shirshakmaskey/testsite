<?php
header("Content-Type: text/html; charset=utf-8");
ini_set('memory_limit', '999M');
define('ENVIROMENT','development');
if(ENVIROMENT!='development'){
error_reporting(0);	
}else{
/* Error Detecting Script */
error_reporting(E_ALL);
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
/* Error Detecting Script */	
}
 include_once("includes/application_top.php");
 $contentPage   = (isset($_GET['_page']))?$_GET['_page']:"home";
 $module   = (isset($_GET['mod']))?$_GET['mod']:"";
  if(!isset($_SESSION[ENCR_KEY.'level']) or !isset($_SESSION[ENCR_KEY.'pathsaleLoginId'])  )
  {
	session_unset();
    $url = "signin";
	redirect($url);
  }
?>		
<?php
if(!empty($contentPage))
{ include_once("page/".(!empty($module)?"mod_".$module."/":"").$contentPage.".php");
}
?>
</body>
</html>