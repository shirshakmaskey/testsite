<?php
session_start();
include_once("../../includes/application_top.php");
$mode  =  $_REQUEST['mode'];
if($mode=='check_login'){
	 if($_POST['my_token']!=""){ foreach($_POST as $key=>$val){ $$key = check($val); }}
      
	  if(isset($my_token) and $_SESSION['mytoken']==$my_token)	
		{ 
		  if ($txtUsername=='' and $hash=='')
			{   if($fromJs){
				 echo json_encode(array("act"=>"validation_error","message"=>'Please enter valid username and password',"redirect_url"=>""));
			    }
			}else{ 	
			      $pwdPassword = preg_replace("/$my_token/", '', $hash);	      
				  $cooke_pass = $pwdPassword;
				  $pwdPassword  =  base64_decode(base64_decode($pwdPassword));
				  $pwdPassword = base64_encode(md5($pwdPassword));
				  $login_result =  $funUserObj->checkLogin($txtUsername,$pwdPassword);		  
				if($login_result['result']=='not_found')
				{  // if result return not found in database return error message 
				if($fromJs){
				 echo json_encode(array("act"=>"not_found","message"=>"Invalid Username or Password","redirect_url"=>""));
			       }
				}
		   else if($login_result['result']=='verification_needed')
				{ 
				if($fromJs){
				 echo json_encode(array("act"=>"account_inactive","message"=>"Account is still not verified! Please check email.","redirect_url"=>""));
			        }				
				}
		   else if($login_result['result']=='account_deactive')
				{ 
				   if($fromJs){
				 echo json_encode(array("act"=>"account_deactive","message"=>"Account has been disabled. Contact admin.","redirect_url"=>""));}
			    }
				else if($login_result['result']=='group_deactive')
				{ 
				   if($fromJs){
				 echo json_encode(array("act"=>"group_deactive","message"=>"This group has been deactivated.","redirect_url"=>""));}
			    }
				else if($login_result['result']=='success')
				{
					// To set cookie
					if($chkRemember!="")
					{
						$user_cookie = array('name'   => 'user_name',
											 'value'  => $txtUsername,
											 'expire' => '300',
											 );
					   
						set_cookie($user_cookie);
						$pass_cookie = array('name'   => 'user_pass',
											 'value'  =>$cooke_pass,
											 'expire' => '300',
											  );			
						set_cookie($pass_cookie);
						$chk_val = array('name' => 'chk_Remember',
										 'value'   => 1,
										 'expire' => '300',);
						set_cookie($chk_val);
					}else{
					  delete_cookie("txtUsername");
					  delete_cookie("pwdPassword");
					  delete_cookie("chkRemember");
					}  				       				
				  if($fromJs){
				 echo json_encode(array("act"=>"success","message"=>"Welcome","redirect_url"=>base_url()."welcome"));
			        }
				}
 			}		  
		}else{
			    // if error is found show it
			if($fromJs){
				 echo json_encode(array("act"=>"not_found","message"=>"Invalid Username or Password","redirect_url"=>""));
			    }
		}
}
else if($mode=='save_image_file'){
	 $id  =  $_POST['id'];
	 $item_title  =  check($_POST['item_title']);
	 $db->update(TABLE_ITEM_DOWNLOAD,array('item_title'=>$item_title),array('id'=>$id));
	 echo json_encode(array("msg"=>"Title has been changed"));
}
else if($mode=='change_password'){
	 foreach($_POST as $key=>$val){$$key=$val;}
	 $check  =  $funUserObj->checkOldPassword($old_password);
	 if($check>0){
	 	     $profile_id  =  $funUserObj->current_user(); 
             $funUserObj->change_password($profile_id,$password);
             echo json_encode(array("result"=>"true","msg"=>"Password has been changed!"));
	 }else{
             echo json_encode(array("result"=>"false","msg"=>"Old password doesn't matched!"));
	 }
}
if($mode=='check_captcha'){
     if(!empty($_REQUEST['captcha']) and strlen($_REQUEST['captcha'])=='5' and $_REQUEST['captcha']==$_SESSION['digit']){ echo 'true';}else{
     	echo 'false';
     }
}
if($mode=='inquiry_submit'){
	foreach($_POST as $key=>$val){$$key=$val;}
	       $data=array('fullname'=>$fullname,
 				       'contact_no'=>$contact_no, 		
 				       'address'=>$address, 			       
 				       'email'=>$email,
 				       'subject'=>$subject,
 				       'message'=>$message,
 				       'posted_date'=>fulldate(),
 				       'org_id'=>$org_id
 				       );
	       $db->insert('tbl_inquiry',$data);
	 $row  =  $funOrgObj->find_by_id($org_id);
	 //now email to verify account and redirectto login section for displaying message
 			$fromName       =  $fullname;
 			$fromEmail      =  $email;
 			$receiverName   =  $row->company_name;
 			$receiverEmail  =  $row->office_email;
 			$email_subject  =  "Inquiry has been received. ".COMPANY_SITE_NAME;
                   $web_name        =  COMPANY_SITE_NAME;
    			   $web_phone       =   COMPANY_MOBILE;
    			   $web_email       =   COMPANY_EMAIL;
				   $web_location    =   COMPANY_LOCATION;
				   $web_url         =   COMPANY_SITE_URL;
 			$content  =   "Dear Sir,
 			              <b>$receiverName</b><br>
                          <p style='text-align:justify;width:500px;' >
                          We have got a enquires from $fullname<br>
                          Following are the details of enquires:<br>
                          <table cellpadding='1' cellspacing='1' border='1' width='500'>
                          <tbody>
                          <tr><td>Fullname</td><td>".$fullname."</td></tr>
                          <tr><td>Address</td><td>".$address."</td></tr>
                          <tr><td>Contact No</td><td>".$contact_no."</td></tr>                          
                          <tr><td>Email</td><td>".$email."</td></tr>
                          <tr><td>Inquiry For:</td><td>".$subject."</td></tr>
                          <tr><td>Message</td><td>".$message."</td></tr>
                          </tbody>
                          </table>
                          <br>
                          Please contact him soon.
						 <br> Webmaster<br>                                 
						      $web_name<br>
							  $web_email<br>
							  $web_phone<br>
							  $web_location<br>
							  <a  href='".$web_url."'><img width='220' alt='".$web_name."' src='".base_url('themes/default/images/logo.png')."'></a>
						</p>";
           $send = $funObj->sendEmail($fromName,$fromEmail,$receiverName,$receiverEmail, $subject, $content,'','',array());
            $fromName       = COMPANY_SITE_NAME;
 			$fromEmail      =  COMPANY_EMAIL;
 			$receiverName   =  $fullname;
 			$receiverEmail  =  $email;
 			$email_subject  =  "Your inquiry has been received. ".COMPANY_SITE_NAME;
 			$content  =   "Dear $fullname,
 			                <br><br>
                          <p style='text-align:justify;width:500px;' >
                          We have received your enquires with following details:<br>
                          <table cellpadding='1' cellspacing='1' border='1' width='500'>
                          <tbody>
                          <tr><td>Fullname</td><td>".$fullname."</td></tr>
                          <tr><td>Address</td><td>".$address."</td></tr>
                          <tr><td>Contact No</td><td>".$contact_no."</td></tr>                          
                          <tr><td>Email</td><td>".$email."</td></tr>
                          <tr><td>Inquiry For:</td><td>".$subject."</td></tr>
                          <tr><td>Message</td><td>".$message."</td></tr>
                          </tbody>
                          </table>
                          <br>
                          Thank you for your enquires, we will contact your shortly.<br>
						 <br> Webmaster<br>                                 
						      $web_name<br>
							  $web_email<br>
							  $web_phone<br>
							  $web_location<br>
							  <a  href='".$web_url."'><img width='220' alt='".$web_name."' src='".base_url('themes/default/images/logo.png')."'></a>
						</p>";
           $send1 = $funObj->sendEmail($fromName,$fromEmail,$receiverName,$receiverEmail, $email_subject, $content,'','',array());
           if($send1)
            echo json_encode(array("result"=>"true"));
            else
            echo json_encode(array("result"=>"false"));
}
else if($mode=='check_email'){
	 $email   = $_REQUEST['email'];
	 $row  =  $funUserObj->find_by_email($email);
	
	if($row){ $id  = @$row->id; $fullname  = @$row->first_name;
	  $access_code     =  strtotime(date("Y-m-d H:i:s")); 
      $funObj->table   =  'tbl_customer';
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
                             <a href='".base_url('user/change-password/'.$access_code)."'>Please click here to reset your password.</a>";
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
}

else if($mode=='change_password_code'){
	$pass     =  base64_decode($_POST['pass']);
	$code     =  $_POST['code'];
	$row  =  $funUserObj->find_by_code($code);
	$pass = base64_encode(md5($pass));
	
	if($row){ $id  = @$row->id; $fullname  = @$row->first_name;
      $email   = @$row->email; 
	  $access_code     =  strtotime(date("Y-m-d H:i:s")); 
      $funObj->table   =  'tbl_customer';
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
	echo json_encode(array( 'result'=>$found,'message'=>$message,'redirect_url'=>base_url('login') ));
	

}	
else if($mode=='get_center'){
	 $id  =  $_POST['id'];
	 $html  = "";
	 ob_start();
	 ?>
	   <option value="">Center</option>
		<?php 
		$result  =  $funOrgObj->org_by_country($id);
		if($db->num_rows($result)>0){
		while($row =  $db->result($result)){ ?>
		<option value="<?php echo $row->id?>"><?php echo $row->company_name?></option>
		<?php }}
         $html  =  ob_get_clean();		
	     echo json_encode(array("result"=>"true","msg"=>"","html"=>$html));
}
else if($mode=='get_courses'){
	 $id  =  $_POST['id'];
	 $html  = "";
	 ob_start();
	 ?>
	   <option value="">Coures</option>
		<?php 
		$result  =  $funCouresObj->unique_course($id);
		if($db->num_rows($result)>0){
		while($row =  $db->result($result)){ ?>
		<option value="<?php echo $row->course_name?>"><?php echo $row->course_name?></option>
		<?php }}
         $html  =  ob_get_clean();		
	     echo json_encode(array("result"=>"true","msg"=>"","html"=>$html));
}
else{}
?>