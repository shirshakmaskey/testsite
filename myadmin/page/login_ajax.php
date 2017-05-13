<?php
session_start();
include_once("../includes/application_top.php");
$mode  =  isset($_REQUEST['mode'])?$_REQUEST['mode']:0;
switch($mode){
   	case 'check_email':
	$email   = $_REQUEST['email'];
	$row  =  $funUserObj->userByEmail($email);
	
	if($row){ $id  = @$row->id; $fullname  = @$row->fullname;
	  $access_code     =  strtotime(date("Y-m-d H:i:s")); 
      $funObj->table   =  TABLE_USER;
      $funObj->action  = 'edit';
      $funObj->data    =  array("access_code"=>$access_code);
      $funObj->cond    =  array("id"=>$id);
	  $queryResult     =  $funObj->doAction(); 
	  //now send email to the password reset link.
		$fromName      =  COMPANY_SITE_NAME;
		$fromEmail     =  COMPANY_EMAIL;
		$receiverName  =  $fullname;
		$receiverEmail =  $email;
	  $subject = "Reset your password - ".COMPANY_SITE_NAME;
			$web_name        =  COMPANY_SITE_NAME;
			$web_phone       =   COMPANY_MOBILE;
			$web_email       =   COMPANY_EMAIL;
			$web_location    =   COMPANY_LOCATION;
			$web_url         =   COMPANY_SITE_URL;   
                $content  = "Dear ".$fullname;
                $content .= "<br><br>
                             Your have requested a password reset.
                             Please click below link to change your password.<br>
                             <a href='".base_url('myadmin/signin/change-password/'.$access_code)."'>Please click here to reset your password.</a>";
                $content .= "<br><br>";
                $content .= "<br>
Note: If you have received this email but you are not aware of the change password, simply ignore the email. <br>
						 <br>                                  
						      $web_name<br>
							  $web_email<br>
							  $web_phone<br>
							  $web_location<br>
							  <a  href='".$web_url."'><img width='220' alt='".$web_name."'  src='".base_url('myadmin/assets/demo/logo.png')."'></a>
						</p>";
				$send = $funObj->sendEmail($fromName,$fromEmail,$receiverName,$receiverEmail, $subject, $content,'','',array());		

      $found='true';
      $message  = "Your password link has been sent in your email, Please check";
	}else{
      $found='false';
      $message  = "Sorry, Your email address couldn't found in our system.";
	}
	echo json_encode(array( 'result'=>$found,'message'=>$message ));
	break;

    case 'change_password':
	$pass     =  base64_decode($_POST['pass']);
	$code     =  $_POST['code'];
	$row  =  $funUserObj->checkValidCode($code);
	$pass = base64_encode(md5($pass));
	
	if($row){ $id  = @$row->id; $fullname  = @$row->fullname;
	  $email   = @$row->email;
	  $access_code     =  strtotime(date("Y-m-d H:i:s")); 
      $funObj->table   =  TABLE_USER;
      $funObj->action  = 'edit';
      $funObj->data    =  array("access_code"=>$access_code,'password'=>$pass);
      $funObj->cond    =  array("id"=>$id);
	  $queryResult     =  $funObj->doAction(); 
	  //now send email to the user about password changed.
		$fromName      =  COMPANY_SITE_NAME;
		$fromEmail     =  COMPANY_EMAIL;
		$receiverName  =  $fullname;
		$receiverEmail =  $email;
	  $subject = "Your password has been changed - ".COMPANY_SITE_NAME;
			$web_name        =  COMPANY_SITE_NAME;
			$web_phone       =   COMPANY_MOBILE;
			$web_email       =   COMPANY_EMAIL;
			$web_location    =   COMPANY_LOCATION;
			$web_url         =   COMPANY_SITE_URL;   
                $content  = "Dear ".$fullname;
                $content .= "<br><br>
                             Your password has been changed successfully.You can login with following link.
                             Please click below link to change your password.<br>
                             <a href='".base_url('myadmin/signin')."'>Login.</a>";
                $content .= "<br><br>";
                $content .= "<br>
Note: If you have received this email but you are not aware of the change password, simply ignore the email. <br>
						 <br>                                  
						      $web_name<br>
							  $web_email<br>
							  $web_phone<br>
							  $web_location<br>
							  <a  href='".$web_url."'><img width='220' alt='".$web_name."'  src='".base_url('myadmin/assets/demo/logo.png')."'></a>
						</p>";
				$send = $funObj->sendEmail($fromName,$fromEmail,$receiverName,$receiverEmail, $subject, $content,'','',array());		

      $found='true';
      $message  = "Your password has been changed successfully, Please login to manage your profile";
	}else{
      $found='false';
      $message  = "Sorry, Can't perform your action at this time. Please try later.";
	}
	echo json_encode(array( 'result'=>$found,'message'=>$message,'redirect_url'=>base_url('myadmin/signin') ));
	break;	
	 
	default:
	break;
}
?>