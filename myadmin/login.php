<?php
  include_once("includes/application_top.php");
  $act  =  isset( $_GET['act'] ) ? $_GET['act'] : 'login';
  $message = '';
  if(isset($_POST['submit_login']))
  { $username = $_POST['signin_username'];
    $password = $_POST['signin_password'];
	$funUserObj    ->   checkUser($username, $password);
  }
  if($act=='change_password')
  { $code = $_GET['code'];
    //check for the valid code 
    $row_user  =  $funUserObj    ->   checkValidCode($code);
    $user_id  =  ($row_user)?$row_user->id:'';
    if(empty($user_id)){
    	$act='login'; 
    	$message  = "<div class='alert alert-warning'>Invalid Access Code.</div>";
    }
  }
?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="ie8"> <![endif]-->
<!--[if IE 9]>         <html class="ie9 gt-ie8"> <![endif]-->
<!--[if gt IE 9]><!-->
<html class="gt-ie8 gt-ie9 not-ie">
<!--<![endif]-->

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Administration Sign In -<?php echo  $funObj->ConfigValue('COMPANY_SITE_NAME'); ?></title>
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
<link href="<?=siteUrl(1)?>assets/stylesheets/pages.min.css" rel="stylesheet" type="text/css">
<link href="<?=siteUrl(1)?>assets/stylesheets/rtl.min.css" rel="stylesheet" type="text/css">
<link href="<?=siteUrl(1)?>assets/stylesheets/themes.min.css" rel="stylesheet" type="text/css">

<!--[if lt IE 9]>
		<script src="<?=siteUrl(1)?>assets/javascripts/ie.min.js"></script>
	<![endif]-->
</script>
<script>var init = [];</script>
<script>var base_url  =  "<?php echo base_url();?>";
var admin_url  =  "<?php echo base_url(ADMINISTRATOR);?>";</script>
</head>
<body class="theme-default page-signin">
<!--<script src="<?=siteUrl(1)?>assets/demo/demo.js"></script>-->
<!-- Page background -->
<div id="page-signin-bg"> 
	<!-- Background overlay -->
	<div class="overlay"></div>
	<!-- Replace this with your bg image --> 
	<img src="<?=siteUrl(1)?>assets/demo/shaky.jpg" alt=""> </div>
<!-- / Page background --> 

<!-- Container -->
<div class="signin-container"> 
	
	<!-- Left side -->
	<div class="signin-info"> <a href="index.html" class="logo"><div style="margin-bottom:15px;background:#FFF;padding:5px;text-align:center;"><img src="<?=siteUrl(1)?>assets/demo/logo.png" alt="" style="margin-top: -5px;height:55px;"></div></a> 
		<div class="slogan"><?php echo $funObj->ConfigValue('COMPANY_SITE_NAME');?></div>
		<ul>
			<li><i class="fa"></i> Developed by : CMS Icon</li>
			<li><i class="fa fa-sitemap signin-icon"></i> Website Development</li>
			<li><i class="fa fa-file-text-o signin-icon"></i> Web Hosting</li>
			<li><i class="fa fa-outdent signin-icon"></i> Domain Registration</li>
			<li><i class="fa fa-heart signin-icon"></i> IT Training</li>
		</ul>
		<!-- / Info list --> 
	</div>
	<!-- / Left side --> 
	  
	<!-- Right side -->
	<div class="signin-form"> <br>
	    <?php echo $message; ?>
		<!-- Form -->
		<form action="" id="signin-form_id" method="post" name="signin-form_id" style="display:<?php echo ($act=='login')?"block":"none;";?>">
			<div class="signin-text"> <span>Sign In to your account</span> </div>
			<!-- / .signin-text -->
			
			<div class="form-group w-icon">
				<input type="text" name="signin_username" id="username_id" class="form-control input-lg" placeholder="Username or email">
				<span class="fa fa-user signin-form-icon"></span> </div>
			<!-- / Username -->
			
			<div class="form-group w-icon">
				<input type="password" name="signin_password" id="password_id" class="form-control input-lg" placeholder="Password">
				<span class="fa fa-lock signin-form-icon"></span> </div>
			<!-- / Password -->
			
			<div class="form-actions">
				<input type="submit" value="SIGN IN" class="signin-btn bg-primary"  name="submit_login">
				<a href="#" class="forgot-password" id="forgot-password-link">Forgot your password?</a> </div>
			<!-- / .form-actions -->
		</form>
		<!-- / Form --> 
		
		
		
		<!-- Password reset form -->
		<div class="password-reset-form" id="password-reset-form">
			<div class="header">
				<div class="signin-text"> <span>Password reset</span>
					<div class="close">&times;</div>
				</div>
				<!-- / .signin-text --> 
			</div>
			<!-- / .header --> 
			
			<!-- Form -->
			<form action="" id="password-reset-form_id" method="post">
				<div class="form-group w-icon">
					<input type="text" name="password_reset_email" id="p_email_id" class="form-control input-lg" placeholder="Enter your email">
					<span class="fa fa-envelope signin-form-icon"></span> </div>
				<!-- / Email -->
				
				<div class="form-actions">
					<input type="button" value="SEND PASSWORD RESET LINK" class="signin-btn bg-primary" id="submit_forget_password" name="submit_forget_password">
				</div>
				<!-- / .form-actions -->
			</form>
			<!-- / Form --> 
		</div>
		<!-- / Password reset form --> 

		<!-- Change Password form -->
		<div class="change-password-form" id="change-password-form" style="display: <?php echo $act=='change_password' ? 'block':'none'; ?>">
			<div class="header">
				<div class="signin-text"> <span>Change Password</span>
					<div class="close">&times;</div>
				</div>
				<!-- / .signin-text --> 
			</div>
			<!-- / .header --> 
			
			<!-- Form -->
			<form action="" id="change-password-form_id" method="post">
				<div class="form-group w-icon">
					<input type="password" name="new_password" id="new_password" class="form-control input-lg required" placeholder="New Password">
					<span class="fa fa-envelope signin-form-icon"></span> </div>
				
				<div class="form-group w-icon">
					<input type="password" name="confirm_new_password" id="confirm_new_password" class="form-control input-lg required" placeholder="confirm Password" equalTo="#new_password"> 
					<span class="fa fa-envelope signin-form-icon"></span> </div>
				
				
				<div class="form-actions">
					<input type="button" value="Change Password" class="signin-btn bg-primary" id="submit_change_password" name="submit_change_password">
				</div>
				<!-- / .form-actions -->
			</form>
			<!-- / Form --> 
		</div>
		<!-- / Change Password form --> 


		<!-- "Sign In with" block -->
		<div class="signin-with"> 
			<!-- Facebook --> 
			<a href="<?php echo COMPANY_SITE_URL?>"  class="signin-with-btn" style="background:#4f6faa;background:rgba(79, 111, 170, .8);"> <span>Visit Website</span></a> </div>
		<!-- / "Sign In with" block --> 


	</div>
	<!-- Right side --> 
</div>
<!-- / Container -->

<div class="not-a-member"> Powered By <a href="#" target="_blank">CMS Icon</a> </div>
<script type="text/javascript"> window.jQuery || document.write("<script src='<?=siteUrl(1)?>assets/javascripts/jquery.js'>"+"<"+"/script>"); </script> 

<!-- Pixel Admin's javascripts --> 
<script src="<?=siteUrl(1)?>assets/javascripts/bootstrap.min.js"></script> 
<script src="<?=siteUrl(1)?>assets/javascripts/pixel-admin.min.js"></script> 
<script type="text/javascript">
"use strict";jQuery.base64=(function($){var _PADCHAR="=",_ALPHA="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/",_VERSION="1.0";function _getbyte64(s,i){var idx=_ALPHA.indexOf(s.charAt(i));if(idx===-1){throw"Cannot decode base64"}return idx}function _decode(s){var pads=0,i,b10,imax=s.length,x=[];s=String(s);if(imax===0){return s}if(imax%4!==0){throw"Cannot decode base64"}if(s.charAt(imax-1)===_PADCHAR){pads=1;if(s.charAt(imax-2)===_PADCHAR){pads=2}imax-=4}for(i=0;i<imax;i+=4){b10=(_getbyte64(s,i)<<18)|(_getbyte64(s,i+1)<<12)|(_getbyte64(s,i+2)<<6)|_getbyte64(s,i+3);x.push(String.fromCharCode(b10>>16,(b10>>8)&255,b10&255))}switch(pads){case 1:b10=(_getbyte64(s,i)<<18)|(_getbyte64(s,i+1)<<12)|(_getbyte64(s,i+2)<<6);x.push(String.fromCharCode(b10>>16,(b10>>8)&255));break;case 2:b10=(_getbyte64(s,i)<<18)|(_getbyte64(s,i+1)<<12);x.push(String.fromCharCode(b10>>16));break}return x.join("")}function _getbyte(s,i){var x=s.charCodeAt(i);if(x>255){throw"INVALID_CHARACTER_ERR: DOM Exception 5"}return x}function _encode(s){if(arguments.length!==1){throw"SyntaxError: exactly one argument required"}s=String(s);var i,b10,x=[],imax=s.length-s.length%3;if(s.length===0){return s}for(i=0;i<imax;i+=3){b10=(_getbyte(s,i)<<16)|(_getbyte(s,i+1)<<8)|_getbyte(s,i+2);x.push(_ALPHA.charAt(b10>>18));x.push(_ALPHA.charAt((b10>>12)&63));x.push(_ALPHA.charAt((b10>>6)&63));x.push(_ALPHA.charAt(b10&63))}switch(s.length-imax){case 1:b10=_getbyte(s,i)<<16;x.push(_ALPHA.charAt(b10>>18)+_ALPHA.charAt((b10>>12)&63)+_PADCHAR+_PADCHAR);break;case 2:b10=(_getbyte(s,i)<<16)|(_getbyte(s,i+1)<<8);x.push(_ALPHA.charAt(b10>>18)+_ALPHA.charAt((b10>>12)&63)+_ALPHA.charAt((b10>>6)&63)+_PADCHAR);break}return x.join("")}return{decode:_decode,encode:_encode,VERSION:_VERSION}}(jQuery));

document.getElementById('username_id').focus();
	// Resize BG
	init.push(function () {
		var $ph  = $('#page-signin-bg'),
		    $img = $ph.find('> img');

		$(window).on('resize', function () {
			$img.attr('style', '');
			if ($img.height() < $ph.height()) {
				$img.css({
					height: '100%',
					width: 'auto'
				});
			}
		});
	});

	// Show/Hide password reset form on click
	init.push(function () {
		$('#forgot-password-link').click(function () { 
			$('#password-reset-form').fadeIn(1000);
		});
		$('#password-reset-form .close').click(function () {
			$('#password-reset-form').fadeOut(1000);
		});
	});

	// Setup Sign In form validation
	init.push(function () {
		$("#signin-form_id").validate({ focusInvalid: true, errorPlacement: function () {} });
		
		// Validate username
		$("#username_id").rules("add", {
			required: true,
			minlength: 3
		});

		// Validate password
		$("#password_id").rules("add", {
			required: true,
			minlength: 5
		});
	});

	// Setup Password Reset form validation
	init.push(function () {
		$("#password-reset-form_id").validate({ focusInvalid: true, errorPlacement: function () {} });
		
		// Validate email
		$("#p_email_id").rules("add", {
			required: true,
			email: true
		});



		

		$('#submit_forget_password').click(function(){
			$('.alert').remove(); 
			var email = $('#p_email_id').val();
	$.post(admin_url+'page/login_ajax.php',{email:email,mode:'check_email'},function(response){
          if(response.result=='true'){
              $("#password-reset-form_id").prepend('<div class="alert alert-success">'+response.message+'</div>');  
              $('#p_email_id').val('');
          }else{
              $("#password-reset-form_id").prepend('<div class="alert alert-danger">'+response.message+'</div>');   
          }      
          $('.alert').show().delay(5000).fadeOut('slow'); 
	},'json');//function
		});

		$("#change-password-form_id").validate({ focusInvalid: true, errorPlacement: function () {} });

		$('#submit_change_password').click(function(){
			$('.alert').remove(); 
			var p = $('#new_password').val(); 
			var code = '<?php echo @$_GET['code'];?>';
			if($("#change-password-form_id").valid()){   
			var pass  =  $.base64.encode(p);  
		$.post(admin_url+'page/login_ajax.php',{pass: pass,code:code,mode:'change_password'},function(response){
          if(response.result=='true'){
              $("#change-password-form_id").prepend('<div class="alert alert-success">'+response.message+'</div>');  
              $('#new_password').val('');
              $('#confirm_new_password').val('');
               setTimeout(function()
                                  { var redirect_url = base_url;                    
                                    if(response.redirect_url && response.redirect_url.length)
                                    redirect_url = response.redirect_url;                    
                                    window.location.href = redirect_url;
                                  }, 3000);
          }else{
              $("#change-password-form_id").prepend('<div class="alert alert-danger">'+response.message+'</div>');   
          }      
          $('.alert').show().delay(5000).fadeOut('slow'); 
	},'json');
			}


		});

		

	});

	window.PixelAdmin.start(init);
</script>
</body>
</html>
