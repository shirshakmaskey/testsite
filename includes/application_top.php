<?php
if(!ob_start("ob_gzhandler")) ob_start();
if(session_id()==''){ session_start(); }
//for environment and displaying errors
define('ENVIRONMENT', 'development');
switch (ENVIRONMENT)
{
	case 'development':
		error_reporting(E_ALL);
		ini_set('display_errors', 1);
	break;

	case 'testing':
	case 'production':
		ini_set('display_errors', 0);
		if (version_compare(PHP_VERSION, '5.3', '>='))
		{
			error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);
		}
		else
		{
			error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_USER_NOTICE);
		}
	break;

	default:
		header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
		echo 'The application environment is not set correctly.';
		exit(1); // EXIT_ERROR
}
//for configs arrays and config file
$cms 			=  array();
$scms          =  array();
$lang_array     =  array();
$data     =  array();
include_once("config.php");
if(!defined("PROJECT_FOLDER"))
include_once(__DIR__."\config.php");
//default time zone set
date_default_timezone_set('Asia/Katmandu');
/* setting for language */
$_SESSION['lang']  =  isset($_SESSION['lang']) ? $_SESSION['lang']: "english";

$system_path = 'system';
$system_path = rtrim($system_path, '/').'/';
define("APPPATH",FCPATH."includes/");
define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));
define('BASEPATH', FCPATH.str_replace('\\', '/', $system_path));
define('SYSDIR', trim(strrchr(trim(BASEPATH, '/'), '/'), '/'));
$view_folder = 'page';
define('VIEWPATH', FCPATH.str_replace('\\', '/', $view_folder));
require_once(BASEPATH.'core/Ci3.php');
/* --------------------------------------------------------------------------------*/
require("classes/functions.php"); 
$funObj  =  $db   =  new Functions;
$funObj			 ->  connect_db();
$base_url         =   $funObj->siteUrl();
$base_urls        =   $funObj->siteUrl(true);
require("config_list.php");
include_once(FCPATH."languages/".$_SESSION['lang'].".php");
//upto here same for front and back
//----------------------------------------------------------------------------------------
/*** auto load model classes ***/
    function __autoload($class_name) {
    $filename = 'class.'.strtolower($class_name). '.php';
	!defined("__SITE_PATH")? define("__SITE_PATH",$_SESSION[ENCR_KEY.'siteDocUrl']):"";
    $file = __SITE_PATH . '/page/mod_'.strtolower($class_name).'/' . $filename;
    if (file_exists($file) == false)
    {
        return false;
    }
	require($file);
}
$contentPage   = (isset($_GET['p']))?$_GET['p']:"home";
$module        = (isset($_GET['m']))?$_GET['m']:"";
$gslug         = (isset($_GET['slug']))?$_GET['slug']:"";

$funMenuObj             =  new Menu;
$funContentsObj         =  new Contents;
$funSettingObj          =  new Setting;
$funNewsObj             =  new News;
$funEventsObj           =  new Events;
$funGalleryObj          =  new Gallery;
$funUserObj             =  new User;
$funSVLObj 	            =  new SVL();
$funVideosObj 	        =  new Videos();
$funSponserObj          =  new Sponser();
$funBookingObj          =  new Booking(); 

$pagename  =  pagename();
if($pagename=='artist.php'){	
	$row_artist  =  $funSVLObj->artist_by_slug($gslug);
	$artist_id   =  $row_artist->id;
	$result_gallery  =  $funSVLObj->gallery_by_artist_id($artist_id); 
	$result_album    =  $funSVLObj->latestSVLAlbum($artist_id); 
	$result_album_related    =  $funSVLObj->relatedSVLAlbum($artist_id);
	$result_album_hit        =  $funSVLObj->hitRelatedSVLAlbum($artist_id);
}
else if($pagename=='album.php'){	
	$row_album   =  $funSVLObj->album_by_slug($gslug);
	$album_id    =  $row_album->id;
	$artist_id   =  $row_album->artist_id;
	$row_artist  =  $funSVLObj->artist_by_id($artist_id);
	$feature_album_songs  =  $funSVLObj->featuredAlbumSongs($album_id,2);
	$all_album_songs  =  $funSVLObj->albumSongs($album_id);

	$result_gallery  =  $funSVLObj->gallery_by_artist_id($artist_id); 
	$result_album    =  $funSVLObj->latestSVLAlbum($artist_id); 
	$result_album_related    =  $funSVLObj->relatedSVLAlbum($artist_id);
	$result_album_hit        =  $funSVLObj->hitRelatedSVLAlbum($artist_id);
}
else if($pagename=='lyrics.php'){
	$svl_row  =  $funSVLObj->find_by_slug($gslug);	
	$artist_id   =  $svl_row->artist_id;
	$album_id    =  $svl_row->album_id;
	$row_artist  =  $funSVLObj->artist_by_id($artist_id);	
	$row_album   =  $funSVLObj->album_by_id($album_id);
	$all_album_songs  =  $funSVLObj->albumSongs($album_id);
	$result_gallery  =  $funSVLObj->gallery_by_artist_id($artist_id); 
	$result_album    =  $funSVLObj->latestSVLAlbum($artist_id); 
	$result_album_related    =  $funSVLObj->relatedSVLAlbum($artist_id);

	$result_album_hit        =  $funSVLObj->hitRelatedSVLAlbum($artist_id);
}
else{
	$result_album_related    =  $funSVLObj->relatedSVLAlbum();
	$result_album_hit        =  $funSVLObj->hitRelatedSVLAlbum();
}