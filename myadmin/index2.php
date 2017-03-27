<?php
/* Error Detecting Script */
/*error_reporting(E_ALL);
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);*/
/* Error Detecting Script */
 include_once("includes/application_top.php");
 $contentPage   = (isset($_GET['_page']))?$_GET['_page']:"home";
 $module   = (isset($_GET['mod']))?$_GET['mod']:"";

  if(!isset($_SESSION['level']) or !isset($_SESSION['pathsaleLoginId'])  )
  {
	session_unset();
    $url = "signin";
	$funObj->redirect($url);
  }
?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="ie8"> <![endif]-->
<!--[if IE 9]>         <html class="ie9 gt-ie8"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="gt-ie8 gt-ie9 not-ie"> <!--<![endif]-->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title><?php echo  $funObj->ConfigValue('COMPANY_SITE_NAME'); ?> - Admin Panel</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
<meta name="keywords" content="<?php echo  COMPANY_SITE_NAME; ?>" />
<meta name="description" content="<?php echo COMPANY_SITE_NAME; ?>" />
<meta name="generator" content="Wise Exists Web Technology" />
	<!-- Open Sans font from Google CDN -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300&amp;subset=latin' rel='stylesheet' type='text/css'>

	<!-- Pixel Admin's stylesheets -->
	<link href="<?=siteUrl(1)?>assets/stylesheets/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?=siteUrl(1)?>assets/stylesheets/pixel-admin.min.css" rel="stylesheet" type="text/css">
	<link href="<?=siteUrl(1)?>assets/stylesheets/widgets.min.min.css" rel="stylesheet" type="text/css">
	<link href="<?=siteUrl(1)?>assets/stylesheets/pages.min.css" rel="stylesheet" type="text/css">
	<link href="<?=siteUrl(1)?>assets/stylesheets/rtl.min.css" rel="stylesheet" type="text/css">
	<link href="<?=siteUrl(1)?>assets/stylesheets/themes.min.css" rel="stylesheet" type="text/css">

	<!--[if lt IE 9]>
		<script src="<?=siteUrl(1)?>assets/javascripts/ie.min.js"></script>
	<![endif]-->
    </script>
	<script>var init = [];</script>
</head>
<body class="theme-default main-menu-animated">
<!-- Demo script --> <script src="<?=siteUrl(1)?>assets/demo/demo.js"></script> <!-- / Demo script -->
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
				<a href="index.html" class="navbar-brand">
					<div><img alt="Pixel Admin" src="<?=siteUrl(1)?>assets/images/pixel-admin/main-navbar-logo.png"></div>
					<?php echo COMPANY_SITE_NAME; ?>
				</a>

				<!-- Main navbar toggle -->
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-navbar-collapse"><i class="navbar-icon fa fa-bars"></i></button>

			</div> <!-- / .navbar-header -->

			<div id="main-navbar-collapse" class="collapse navbar-collapse main-navbar-collapse">
				<div>
					<ul class="nav navbar-nav">
						<li>
							<a href="#">Home</a>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown</a>
							<ul class="dropdown-menu">
								<li><a href="#">First item</a></li>
								<li><a href="#">Second item</a></li>
								<li class="divider"></li>
								<li><a href="#">Third item</a></li>
							</ul>
						</li>
					</ul> <!-- / .navbar-nav -->

					<div class="right clearfix">
						<ul class="nav navbar-nav pull-right right-navbar-nav">

<!-- 3. $NAVBAR_ICON_BUTTONS =======================================================================

							Navbar Icon Buttons

							NOTE: .nav-icon-btn triggers a dropdown menu on desktop screens only. On small screens .nav-icon-btn acts like a hyperlink.

							Classes:
							* 'nav-icon-btn-info'
							* 'nav-icon-btn-success'
							* 'nav-icon-btn-warning'
							* 'nav-icon-btn-danger' 
-->
							<li class="nav-icon-btn nav-icon-btn-danger dropdown">
								<a href="#notifications" class="dropdown-toggle" data-toggle="dropdown">
									<span class="label">5</span>
									<i class="nav-icon fa fa-bullhorn"></i>
									<span class="small-screen-text">Notifications</span>
								</a>

								<!-- NOTIFICATIONS -->
								
								<!-- Javascript -->
								<script>
									init.push(function () {
										$('#main-navbar-notifications').slimScroll({ height: 250 });
									});
								</script>
								<!-- / Javascript -->

								<div class="dropdown-menu widget-notifications no-padding" style="width: 300px">
									<div class="notifications-list" id="main-navbar-notifications">

										<div class="notification">
											<div class="notification-title text-danger">SYSTEM</div>
											<div class="notification-description"><strong>Error 500</strong>: Syntax error in index.php at line <strong>461</strong>.</div>
											<div class="notification-ago">12h ago</div>
											<div class="notification-icon fa fa-hdd-o bg-danger"></div>
										</div> <!-- / .notification -->

										<div class="notification">
											<div class="notification-title text-info">STORE</div>
											<div class="notification-description">You have <strong>9</strong> new orders.</div>
											<div class="notification-ago">12h ago</div>
											<div class="notification-icon fa fa-truck bg-info"></div>
										</div> <!-- / .notification -->

										<div class="notification">
											<div class="notification-title text-default">CRON DAEMON</div>
											<div class="notification-description">Job <strong>"Clean DB"</strong> has been completed.</div>
											<div class="notification-ago">12h ago</div>
											<div class="notification-icon fa fa-clock-o bg-default"></div>
										</div> <!-- / .notification -->

										<div class="notification">
											<div class="notification-title text-success">SYSTEM</div>
											<div class="notification-description">Server <strong>up</strong>.</div>
											<div class="notification-ago">12h ago</div>
											<div class="notification-icon fa fa-hdd-o bg-success"></div>
										</div> <!-- / .notification -->

										<div class="notification">
											<div class="notification-title text-warning">SYSTEM</div>
											<div class="notification-description"><strong>Warning</strong>: Processor load <strong>92%</strong>.</div>
											<div class="notification-ago">12h ago</div>
											<div class="notification-icon fa fa-hdd-o bg-warning"></div>
										</div> <!-- / .notification -->

									</div> <!-- / .notifications-list -->
									<a href="#" class="notifications-link">MORE NOTIFICATIONS</a>
								</div> <!-- / .dropdown-menu -->
							</li>
							<li class="nav-icon-btn nav-icon-btn-success dropdown">
								<a href="#messages" class="dropdown-toggle" data-toggle="dropdown">
									<span class="label">10</span>
									<i class="nav-icon fa fa-envelope"></i>
									<span class="small-screen-text">Income messages</span>
								</a>

								<!-- MESSAGES -->
								
								<!-- Javascript -->
								<script>
									init.push(function () {
										$('#main-navbar-messages').slimScroll({ height: 250 });
									});
								</script>
								<!-- / Javascript -->

								<div class="dropdown-menu widget-messages-alt no-padding" style="width: 300px;">
									<div class="messages-list" id="main-navbar-messages">

										<div class="message">
											<img src="assets/demo/avatars/2.jpg" alt="" class="message-avatar">
											<a href="#" class="message-subject">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</a>
											<div class="message-description">
												from <a href="#">Robert Jang</a>
												&nbsp;&nbsp;·&nbsp;&nbsp;
												2h ago
											</div>
										</div> <!-- / .message -->

										<div class="message">
											<img src="assets/demo/avatars/3.jpg" alt="" class="message-avatar">
											<a href="#" class="message-subject">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</a>
											<div class="message-description">
												from <a href="#">Michelle Bortz</a>
												&nbsp;&nbsp;·&nbsp;&nbsp;
												2h ago
											</div>
										</div> <!-- / .message -->

										<div class="message">
											<img src="assets/demo/avatars/4.jpg" alt="" class="message-avatar">
											<a href="#" class="message-subject">Lorem ipsum dolor sit amet.</a>
											<div class="message-description">
												from <a href="#">Timothy Owens</a>
												&nbsp;&nbsp;·&nbsp;&nbsp;
												2h ago
											</div>
										</div> <!-- / .message -->

										<div class="message">
											<img src="assets/demo/avatars/5.jpg" alt="" class="message-avatar">
											<a href="#" class="message-subject">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</a>
											<div class="message-description">
												from <a href="#">Denise Steiner</a>
												&nbsp;&nbsp;·&nbsp;&nbsp;
												2h ago
											</div>
										</div> <!-- / .message -->

										<div class="message">
											<img src="assets/demo/avatars/2.jpg" alt="" class="message-avatar">
											<a href="#" class="message-subject">Lorem ipsum dolor sit amet.</a>
											<div class="message-description">
												from <a href="#">Robert Jang</a>
												&nbsp;&nbsp;·&nbsp;&nbsp;
												2h ago
											</div>
										</div> <!-- / .message -->

										<div class="message">
											<img src="assets/demo/avatars/2.jpg" alt="" class="message-avatar">
											<a href="#" class="message-subject">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</a>
											<div class="message-description">
												from <a href="#">Robert Jang</a>
												&nbsp;&nbsp;·&nbsp;&nbsp;
												2h ago
											</div>
										</div> <!-- / .message -->

										<div class="message">
											<img src="assets/demo/avatars/3.jpg" alt="" class="message-avatar">
											<a href="#" class="message-subject">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</a>
											<div class="message-description">
												from <a href="#">Michelle Bortz</a>
												&nbsp;&nbsp;·&nbsp;&nbsp;
												2h ago
											</div>
										</div> <!-- / .message -->

										<div class="message">
											<img src="assets/demo/avatars/4.jpg" alt="" class="message-avatar">
											<a href="#" class="message-subject">Lorem ipsum dolor sit amet.</a>
											<div class="message-description">
												from <a href="#">Timothy Owens</a>
												&nbsp;&nbsp;·&nbsp;&nbsp;
												2h ago
											</div>
										</div> <!-- / .message -->

										<div class="message">
											<img src="assets/demo/avatars/5.jpg" alt="" class="message-avatar">
											<a href="#" class="message-subject">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</a>
											<div class="message-description">
												from <a href="#">Denise Steiner</a>
												&nbsp;&nbsp;·&nbsp;&nbsp;
												2h ago
											</div>
										</div> <!-- / .message -->

										<div class="message">
											<img src="assets/demo/avatars/2.jpg" alt="" class="message-avatar">
											<a href="#" class="message-subject">Lorem ipsum dolor sit amet.</a>
											<div class="message-description">
												from <a href="#">Robert Jang</a>
												&nbsp;&nbsp;·&nbsp;&nbsp;
												2h ago
											</div>
										</div> <!-- / .message -->

									</div> <!-- / .messages-list -->
									<a href="#" class="messages-link">MORE MESSAGES</a>
								</div> <!-- / .dropdown-menu -->
							</li>
<!-- /3. $END_NAVBAR_ICON_BUTTONS -->

							<li>
								<form class="navbar-form pull-left">
									<input type="text" class="form-control" placeholder="Search">
								</form>
							</li>

							<li class="dropdown">
								<a href="#" class="dropdown-toggle user-menu" data-toggle="dropdown">
									<img src="assets/demo/avatars/1.jpg">
									<span>John Doe</span>
								</a>
								<ul class="dropdown-menu">
									<li><a href="#">Profile <span class="label label-warning pull-right">new</span></a></li>
									<li><a href="#">Account <span class="badge badge-primary pull-right">new</span></a></li>
									<li><a href="#"><i class="dropdown-icon fa fa-cog"></i>&nbsp;&nbsp;Settings</a></li>
									<li class="divider"></li>
									<li><a href="pages-signin.html"><i class="dropdown-icon fa fa-power-off"></i>&nbsp;&nbsp;Log Out</a></li>
								</ul>
							</li>
						</ul> <!-- / .navbar-nav -->
					</div> <!-- / .right -->
				</div>
			</div> <!-- / #main-navbar-collapse -->
		</div> <!-- / .navbar-inner -->
	</div> <!-- / #main-navbar -->
<!-- /2. $END_MAIN_NAVIGATION -->


<!-- 4. $MAIN_MENU =================================================================================

		Main menu
		
		Notes:
		* to make the menu item active, add a class 'active' to the <li>
		  example: <li class="active">...</li>
		* multilevel submenu example:
			<li class="mm-dropdown">
			  <a href="#"><span class="mm-text">Submenu item text 1</span></a>
			  <ul>
				<li>...</li>
				<li class="mm-dropdown">
				  <a href="#"><span class="mm-text">Submenu item text 2</span></a>
				  <ul>
					<li>...</li>
					...
				  </ul>
				</li>
				...
			  </ul>
			</li>
-->
	<div id="main-menu" role="navigation">
		<div id="main-menu-inner">
			<ul class="navigation">
				<li>
					<a href="index.html"><i class="menu-icon fa fa-dashboard"></i><span class="mm-text">Dashboard</span></a>
				</li>
				<li class="mm-dropdown">
					<a href="#"><i class="menu-icon fa fa-th"></i><span class="mm-text">Layouts</span></a>
					<ul>
						<li>
							<a tabindex="-1" href="layouts-grid.html"><span class="mm-text">Grid</span></a>
						</li>
						<li>
							<a tabindex="-1" href="layouts-main-menu.html"><i class="menu-icon fa fa-th-list"></i><span class="mm-text">Main menu</span></a>
						</li>
					</ul>
				</li>
				<li>
					<a href="stat-panels.html"><i class="menu-icon fa fa-tasks"></i><span class="mm-text">Stat panels</span></a>
				</li>
				<li>
					<a href="widgets.html"><i class="menu-icon fa fa-flask"></i><span class="mm-text">Widgets</span></a>
				</li>
				<li class="mm-dropdown">
					<a href="#"><i class="menu-icon fa fa-desktop"></i><span class="mm-text">UI elements</span></a>
					<ul>
						<li>
							<a tabindex="-1" href="ui-buttons.html"><span class="mm-text">Buttons</span></a>
						</li>
						<li>
							<a tabindex="-1" href="ui-typography.html"><span class="mm-text">Typography</span></a>
						</li>
						<li>
							<a tabindex="-1" href="ui-tabs.html"><span class="mm-text">Tabs &amp; Accordions</span></a>
						</li>
						<li>
							<a tabindex="-1" href="ui-modals.html"><span class="mm-text">Modals</span></a>
						</li>
						<li>
							<a tabindex="-1" href="ui-alerts.html"><span class="mm-text">Alerts &amp; Tooltips</span></a>
						</li>
						<li>
							<a tabindex="-1" href="ui-components.html"><span class="mm-text">Components</span></a>
						</li>
						<li>
							<a tabindex="-1" href="ui-panels.html"><span class="mm-text">Panels</span></a>
						</li>
						<li>
							<a tabindex="-1" href="ui-jqueryui.html"><span class="mm-text">jQuery UI</span></a>
						</li>
						<li>
							<a tabindex="-1" href="ui-icons.html"><span class="mm-text">Icons</span></a>
						</li>
						<li>
							<a tabindex="-1" href="ui-utility-classes.html"><span class="mm-text">Utility classes</span></a>
						</li>
					</ul>
				</li>
				<li class="mm-dropdown">
					<a href="#"><i class="menu-icon fa fa-check-square"></i><span class="mm-text">Form components</span></a>
					<ul>
						<li>
							<a tabindex="-1" href="forms-layouts.html"><span class="mm-text">Layouts</span></a>
						</li>
						<li>
							<a tabindex="-1" href="forms-general.html"><span class="mm-text">General</span></a>
						</li>
						<li>
							<a tabindex="-1" href="forms-advanced.html"><span class="mm-text">Advanced</span></a>
						</li>
						<li>
							<a tabindex="-1" href="forms-pickers.html"><span class="mm-text">Pickers</span></a>
						</li>
						<li>
							<a tabindex="-1" href="forms-validation.html"><span class="mm-text">Validation</span></a>
						</li>
						<li>
							<a tabindex="-1" href="forms-editors.html"><span class="mm-text">Editors</span></a>
						</li>
					</ul>
				</li>
				<li>
					<a href="tables.html"><i class="menu-icon fa fa-table"></i><span class="mm-text">Tables</span></a>
				</li>
				<li>
					<a href="charts.html"><i class="menu-icon fa fa-bar-chart-o"></i><span class="mm-text">Charts</span></a>
				</li>
				<li class="mm-dropdown">
					<a href="#"><i class="menu-icon fa fa-files-o"></i><span class="mm-text">Pages</span></a>
					<ul>
						<li>
							<a tabindex="-1" href="pages-search.html"><span class="mm-text">Search results</span></a>
						</li>
						<li>
							<a tabindex="-1" href="pages-pricing.html"><span class="mm-text">Plans &amp; pricing</span></a>
						</li>
						<li>
							<a tabindex="-1" href="pages-signin.html"><span class="mm-text">Sign In</span></a>
						</li>
						<li>
							<a tabindex="-1" href="pages-invoice.html"><span class="mm-text">Invoice</span></a>
						</li>
						<li>
							<a tabindex="-1" href="pages-404.html"><span class="mm-text">Error 404</span></a>
						</li>
						<li>
							<a tabindex="-1" href="pages-500.html"><span class="mm-text">Error 500</span></a>
						</li>
						<li class="active">
							<a tabindex="-1" href="pages-blank.html"><span class="mm-text">Blank page</span></a>
						</li>
					</ul>
				</li>
				<li>
					<a href="complete-ui.html"><i class="menu-icon fa fa-briefcase"></i><span class="mm-text">Complete UI</span></a>
				</li>
				<li>
					<a href="color-builder.html"><i class="menu-icon fa fa-tint"></i><span class="mm-text">Color Builder</span></a>
				</li>
				<li class="mm-dropdown">
					<a href="#"><i class="menu-icon fa fa-sitemap"></i><span class="mm-text">Menu levels</span></a>
					<ul>
						<li>
							<a tabindex="-1" href="#"><span class="mm-text">Menu level 1.1</span></a>
						</li>
						<li>
							<a tabindex="-1" href="#"><span class="mm-text">Menu level 1.2</span></a>
						</li>
						<li class="mm-dropdown">
							<a tabindex="-1" href="#"><span class="mm-text">Menu level 1.3</span></a>
							<ul>
								<li>
									<a tabindex="-1" href="#"><span class="mm-text">Menu level 2.1</span></a>
								</li>
								<li class="mm-dropdown">
									<a tabindex="-1" href="#"><span class="mm-text">Menu level 2.2</span></a>
									<ul>
										<li class="mm-dropdown">
											<a tabindex="-1" href="#"><span class="mm-text">Menu level 3.1</span></a>
											<ul>
												<li>
													<a tabindex="-1" href="#"><span class="mm-text">Menu level 4.1</span></a>
												</li>
											</ul>
										</li>
										<li>
											<a tabindex="-1" href="#"><span class="mm-text">Menu level 3.2</span></a>
										</li>
									</ul>
								</li>
								<li>
									<a tabindex="-1" href="#"><span class="mm-text">Menu level 2.2</span></a>
								</li>
							</ul>
						</li>
					</ul>
				</li>

			</ul> <!-- / .navigation -->
			<div class="menu-content">
				<a href="pages-invoice.html" class="btn btn-primary btn-block btn-outline dark">Create Invoice</button></a>
			</div>
		</div> <!-- / #main-menu-inner -->
	</div> <!-- / #main-menu -->
<!-- /4. $MAIN_MENU -->


	<div id="content-wrapper">
<!-- 5. $CONTENT ===================================================================================

		Content
-->

		<!-- Content here -->
		Content here.

	</div> <!-- / #content-wrapper -->
	<div id="main-menu-bg"></div>
</div> <!-- / #main-wrapper -->

<div class="not-a-member"> Powered By <a href="http://www.wiseexist.com" target="_blank">Wise Exist</a> </div>
<script type="text/javascript"> window.jQuery || document.write("<script src='<?=siteUrl(1)?>assets/javascripts/jquery.js'>"+"<"+"/script>"); </script> 


<!-- Pixel Admin's javascripts -->
<script src="<?=siteUrl(1)?>assets/javascripts/bootstrap.min.js"></script>
<script src="<?=siteUrl(1)?>assets/javascripts/pixel-admin.min.js"></script>

<script type="text/javascript">
	init.push(function () {
		// Javascript code here
	})
	window.PixelAdmin.start(init);
</script>

</body>

</html>