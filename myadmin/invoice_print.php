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
<!DOCTYPE html>
<!--[if IE 8]>         <html class="ie8"> <![endif]-->
<!--[if IE 9]>         <html class="ie9 gt-ie8"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="gt-ie8 gt-ie9 not-ie"> <!--<![endif]-->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title><?php echo COMPANY_SITE_NAME?> - Admin Panel</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
<meta name="keywords" content="<?php echo  COMPANY_SITE_NAME; ?>" />
<meta name="description" content="<?php echo COMPANY_SITE_NAME; ?>" />
<meta name="generator" content="Wise Exists Web Technology" />
<script>var base_url  =  "<?php echo base_url();?>";
var admin_url  =  "<?php echo base_url(ADMINISTRATOR);?>";</script>
	<!-- Open Sans font from Google CDN -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300&amp;subset=latin' rel='stylesheet' type='text/css'>

	<!-- Pixel Admin's stylesheets -->
	<link href="<?=siteUrl(1)?>assets/stylesheets/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?=siteUrl(1)?>assets/stylesheets/pixel-admin.min.css" rel="stylesheet" type="text/css">
	<link href="<?=siteUrl(1)?>assets/stylesheets/widgets.min.css" rel="stylesheet" type="text/css">
	<link href="<?=siteUrl(1)?>assets/stylesheets/pages.min.css" rel="stylesheet" type="text/css">
	<link href="<?=siteUrl(1)?>assets/stylesheets/rtl.min.css" rel="stylesheet" type="text/css">
	<link href="<?=siteUrl(1)?>assets/stylesheets/themes.min.css" rel="stylesheet" type="text/css">
	<link href="<?=siteUrl(1)?>control/mystyle.css" rel="stylesheet" type="text/css">
    <!-- notifications -->
	<link rel="stylesheet" href="<?=siteUrl(1)?>assets/lib/sticky/sticky.css" /> 
	<!--[if lt IE 9]>
		<script src="<?=siteUrl(1)?>assets/javascripts/ie.min.js"></script>
	<![endif]-->
<script>var init = [];</script>
<script type="text/javascript"> window.jQuery || document.write("<script src='<?=siteUrl(1)?>assets/javascripts/jquery.js'>"+"<"+"/script>"); </script>	
<script>
	window.onload = function () {
		window.print();
	};
	</script>
</head>
<body class="page-invoice page-invoice-print">
<?php
if(!empty($contentPage))
{   include_once("page/".(!empty($module)?"mod_".$module."/":"").$contentPage.".php");}
?>
</body>
</html>