<?php

if(substr_count($_SERVER['HTTP_ACCEPT_ENCODING'],'gzip')) ob_start("ob_gzhandler");else ob_start(); 

if(session_id()==''){ session_start(); }

/* Error Detecting Script */

error_reporting(E_ALL);

ini_set('display_startup_errors', 1);

ini_set('display_errors', 1);

/* Error Detecting Script */

date_default_timezone_set('Asia/Katmandu'); 

include_once("config.php");

if(!defined("PROJECT_FOLDER"))

include_once(__DIR__."\config.php");

/* setting for language */

$_SESSION['lang']  =  isset($_SESSION['lang']) ? $_SESSION['lang']: "english";

/* --------------------------------------------------------------------------------*/

require("classes/functions.php"); 

$funObj  =  $db   =  new Functions;

$funObj			 ->  connect_db();

$base_url         =   $funObj->siteUrl();

$base_urls        =   $funObj->siteUrl(true);

require("config_list.php");

//include_once("languages/".$_SESSION['lang'].".php");

if(isset($_GET['mod']) & !empty($_GET['mod']))

{ $rowModule  =  $funObj->moduleSelected($_GET['mod']); }

/*** auto load model classes ***/

    function __autoload($class_name) {

    $filename = 'class.'.strtolower($class_name). '.php';

	!defined("__SITE_PATH")? define("__SITE_PATH",$_SESSION[ENCR_KEY.'siteDocAdminUrl']):"";

     $file = __SITE_PATH . '/page/mod_'.strtolower($class_name).'/' . $filename;

     $file = preg_replace('/([^:])(\/{2,})/', '$1/', $file); 

    if (file_exists($file) == false)

    {

        return false;

    }

	require_once($file);

}



$contentPage   = (isset($_GET['_page']))?$_GET['_page']:"home";

$module   = (isset($_GET['mod']))?$_GET['mod']:"";




$funCmsObj              =  new Cms;

$funSettingObj          =  new Setting;

$funUserObj             =  new User;

$funNewsObj             =  new News;

$funPageCatObj          =  new Pagecat;

$funContentsObj         =  new Contents;

$funMenuSetObj          =  new Menusetting;

$funMenuObj             =  new Menu;

$funBookingObj          =  new Booking;


$funEventsObj           =  new Events;



$funArtistObj           =  new Artist;

$funAlbumObj            =  new Album;

$funGalleryObj          =  new Gallery;

$funPhotoObj            =  new Photo;

$funSVLObj              =  new SVL;

$funVideosObj           =  new Videos;

$funSponserObj           =  new Sponser;

$funMemberObj           =  new Member;

$funCustomerObj            =  new Customer;

if(!isset($_SESSION['showHeader'])) $_SESSION['showHeader']='yes';

$MyBaseUrl   =   basename($_SERVER['PHP_SELF']);

if($MyBaseUrl!="login.php")

{

if($_SESSION['user_agent']!=$_SERVER['HTTP_USER_AGENT']){echo "<script>window.location.href='http://google.com'</script>";}

}

?>