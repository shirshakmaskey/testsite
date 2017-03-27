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
	<!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300&amp;subset=latin' rel='stylesheet' type='text/css'> -->

	<!-- Pixel Admin's stylesheets -->
	<link href="<?=siteUrl(1)?>assets/stylesheets/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?=siteUrl(1)?>assets/stylesheets/pixel-admin.min.css" rel="stylesheet" type="text/css">
	<link href="<?=siteUrl()?>assets/ui/jquery-ui.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="<?=siteUrl()?>assets/timepicker/jquery.ui.timepicker.css">
	<link href="<?=siteUrl(1)?>assets/stylesheets/widgets.min.css" rel="stylesheet" type="text/css">
	<link href="<?=siteUrl(1)?>assets/stylesheets/pages.min.css" rel="stylesheet" type="text/css">
	<link href="<?=siteUrl(1)?>assets/stylesheets/rtl.min.css" rel="stylesheet" type="text/css">
	<link href="<?=siteUrl(1)?>assets/stylesheets/themes.min.css" rel="stylesheet" type="text/css">
	<!-- Open this for nepali calender
	<link rel="stylesheet" href="<?=siteUrl()?>applications/jquery.calendars.package-2.0.0/jquery.calendars.picker.css">-->    
	<link href="<?=siteUrl(1)?>control/mystyle.css" rel="stylesheet" type="text/css">
    <!-- notifications -->
	<link rel="stylesheet" href="<?=siteUrl(1)?>assets/lib/sticky/sticky.css" /> 
	<!--[if lt IE 9]>
		<script src="<?=siteUrl(1)?>assets/javascripts/ie.min.js"></script>
	<![endif]-->

<script>var init = [];</script>
<script type="text/javascript"> window.jQuery || document.write("<script src='<?=siteUrl(1)?>assets/javascripts/jquery.js'>"+"<"+"/script>"); </script>	
<script src="<?php echo siteUrl(1); ?>js/autosize.min.js" /></script>
</head>
<?php 
$add_body_class =  "";
if($contentPage=='view' and $module=='transaction') $add_body_class =  " page-invoice ";

?>
<body class="theme-default main-menu-animated <?=$add_body_class?>">
<?php $content_footer =  array();?>
<div id="main-wrapper">


<!-- 2. $MAIN_NAVIGATION ===========================================================================

	Main navigation
-->
	<div id="main-navbar" class="navbar navbar-inverse" role="navigation">
		<!-- Main menu toggle -->
		<button type="button" id="main-menu-toggle"><i class="navbar-icon fa fa-bars icon"></i><span class="hide-menu-text">HIDE MENU</span></button>
		
		<div class="navbar-inner">
			<!-- Main navbar header -->
			<div class="navbar-header">

				<!-- Logo -->
				<a href="<?=siteUrl(1)?>" class="navbar-brand">
					<div><img alt="Wise Admin" src="<?=siteUrl(1)?>assets/demo/small_logo.jpg"></div>
					<?php echo COMPANY_SITE_NAME; ?>
				</a>

				<!-- Main navbar toggle -->
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-navbar-collapse"><i class="navbar-icon fa fa-bars"></i></button>

			</div> <!-- / .navbar-header -->

			<?php require_once('page/header.php');?>
		</div> <!-- / .navbar-inner -->
	</div> <!-- / #main-navbar -->
<!-- /2. $END_MAIN_NAVIGATION -->



	<div id="main-menu" role="navigation">
		<div id="main-menu-inner">
			<?php require_once('menus/side_menu.php');?>
		</div> <!-- / #main-menu-inner -->
	</div> <!-- / #main-menu -->
<!-- /4. $MAIN_MENU -->

	<div id="content-wrapper">
<?php require_once('page/breadcumb.php');?>
		
<?php
if(!empty($contentPage))
{  if($contentPage=='home' and $module=='')	include_once("page/home.php");
   else{ 
   $messsage_class  =  @($_SESSION['successMsg']!='')? 'alert alert-success alert-dark' : '';
   //alert alert-danger alert-dark
   echo '<div id="message" class="'.$messsage_class.'">'.
   (@($_SESSION['successMsg']!='')?'<button data-dismiss="alert" class="close" type="button">×</button>':'').
   flashdata('successMsg').'</div>';   
   //echo '<div class="row"><div class="col-sm-12"><div class="panel"><div class="panel-body">';
   include_once("page/".(!empty($module)?"mod_".$module."/":"").$contentPage.".php"); 
   //echo '</div></div></div></div>';
   }
}
  if("page/mod_".$module."/".$contentPage.".php"=="page/mod_".$module."/index.php")
  { include_once("menus/menu_module.php"); }
?>
	</div> <!-- / #content-wrapper -->
	<div id="main-menu-bg"></div>
</div> <!-- / #main-wrapper -->

<!-- Pixel Admin's javascripts -->
<script src="<?=siteUrl(1)?>assets/javascripts/bootstrap.min.js"></script>
<script src="<?=siteUrl(1)?>assets/javascripts/pixel-admin.min.js"></script>
<script src="<?=siteUrl()?>assets/ui/jquery-ui.min.js"></script>
<script src="timepicker/jquery.ui.timepicker.js"></script>

<!-- Open this for nepali calender
<script src="<?=siteUrl()?>applications/jquery.calendars.package-2.0.0/jquery.plugin.js"></script>
<script src="<?=siteUrl()?>applications/jquery.calendars.package-2.0.0/jquery.calendars.js"></script>
<script src="<?=siteUrl()?>applications/jquery.calendars.package-2.0.0/jquery.calendars.plus.js"></script>
<script src="<?=siteUrl()?>applications/jquery.calendars.package-2.0.0/jquery.calendars.picker.js"></script>
<script src="<?=siteUrl()?>applications/jquery.calendars.package-2.0.0/jquery.calendars.nepali.js"></script>
-->


<!-- jquery form -->
<script src="<?=siteUrl(1)?>js/jquery.form.min.js"></script>
<!-- sticky messages -->
<script src="<?=siteUrl(1)?>assets/lib/sticky/sticky.min.js"></script>
<script language="javascript" src="<?php echo siteUrl(1); ?>js/validation.js"></script>
<script src="<?php echo siteUrl(1); ?>js/common.js"></script>
<script language="javascript" src="<?php echo siteUrl(1); ?>js/scrolltopcontrol.js"></script>
<div id="top-link"><small><a href="#top" class="anchor">top</a></small></div>
<script type="text/javascript">
	init.push(function () {
		// Javascript code here
	})
	window.PixelAdmin.start(init);
</script>
<?php if(is_array($content_footer)){
	 foreach($content_footer as $key=>$val){
		 echo $val; 
	 }
}?>
</body>
</html>