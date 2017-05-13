<?php
session_start();
include_once("../../includes/application_top.php");
$funObj->action = "add";
$funObj->table  = TABLE_FEEDBACK;
if( isset( $_POST['RegisterAndbooking'] ) )
{
   foreach($_POST as $key=>$val)
   {  $$key=check($val);   } 
   
	   //now check captcha
	   if( $_SESSION['securimage_code_value']['default'] == strtolower($_POST['ct_captcha']) && !empty($_SESSION['securimage_code_value']['default'])){}else{
		 
		 $message  =  "Invalid Captcha code has been entered.";
		 die(json_encode(array('success'=>false, 'email_exists'=> false,'message'=>$message,'redirect_url'=>base_url('contact'))));
  
	   }
   
    	 	 	 	 	 	 	 	 	 	
       $funObj->data =array("fullname"=>$fullname,
							"address"=>$address,
							"phone"=>$contact_number,
							"mobile"=>$contact_number,
							"email"=>$email,
							"subject"=>$subject,
							"message"=>$res_message,
							"posted_date"=>date("Y-m-d")
							); 						
	         $funObj->begin();		
	         $queryResult  =  $funObj->doAction(); 
              
			   if(!$queryResult) { $funObj->rollback(); $_SESSION['succesMesage'] = "Action cannot place Occur due to some internal errors!!.Please try again";
				} else { $funObj->commit(); 
								
				   // Now for the client thanking Email
				   $thankyouEmail     = "";				   
				   $senderEmails      =   COMPANY_EMAIL;
				   $senderEmailArr    =   explode(",",$senderEmails);
				   $senderEmail       =   $senderEmailArr[0];
				   $senderName        =   COMPANY_SITE_NAME;
    			   $senderPhone       =   COMPANY_MOBILE;
				   $senderLocation    =   COMPANY_LOCATION;
				   
				   $thankyouEmail     =   "Dear <b>$fullname</b><br>
				                          <p style='text-align:justify;width:500px;' >
										  We are very thankful for your inquiry in Our Company.<br><br>
										This is the confirmation email that your email has been received.<br<>
										Please contact us in following contact information if you any query<br> <br>                                  
										      $senderName<br>
											  $senderEmail<br>
											  $senderPhone<br>
											  $senderLocation<br>
											  <a  href='".COMPANY_SITE_URL."'><img width='220' alt='".COMPANY_SITE_NAME."' src='".COMPANY_SITE_URL."/themes/default/img/logo.png'></a>
										</p>"; 
																
				
  $mail = new PHPMailer(); // defaults to using php "mail()"
  $receiver       =  $email; 
  $receiver_name  =  $fullname;
  $sender         =  COMPANY_EMAIL; 
  $sender_name    =  COMPANY_SITE_NAME; 
  $subject =  "Thank you for inquiry message - ".COMPANY_SITE_NAME;
  $mail->SetFrom($sender, $sender_name);
  $mail->AddReplyTo($sender, $sender_name); 
  $mail->AddAddress($receiver, $receiver_name);
  $mail->AddAddress('bibil1986imns@gmail.com', $receiver_name);  
  $mail->Subject    = $subject;  
  $mail->MsgHTML($thankyouEmail);
  $mail->Send();
				   
				   
				    $body_msg  = "Dear sir,<br>
				   
	 We have received a new inquiry from ".COMPANY_SITE_NAME." having following details.<br>
								 
			       <h2>Personal Details</h2><hr>
				   Fullname : ".$fullname."<br>				   
				   Address : ".$address."<br>
				   Subject : ".$_POST['subject']."<br>
				   Phone : ".$contact_number."<br>
				   Email : ".$email."<br>
				   Message : ".$res_message."<br>
				   Posted Date : ".date("Y-m-d")."<br>
				   <br>	
				   Please contact him/her soon and check  inquiries in website.			 
				   <br>				 
				   Thank You<br>
				   Webmaster<br>
				   ".COMPANY_SITE_NAME."<br>
				   <a  href='".COMPANY_SITE_URL."'><img width='220' alt='".COMPANY_SITE_NAME."' src='".COMPANY_SITE_URL."/themes/default/img/logo.png'></a>";
	
  $sender           =  $email; 
  $sender_name      =  $fullname; 
  $receiver         =  COMPANY_EMAIL; 
  $receiver_name    =  COMPANY_SITE_NAME;    
  $subject          =  "Inquiry has been received from - ".COMPANY_SITE_NAME;
  
try {
  $mail             = new PHPMailer(); // defaults to using php "mail()"
  $mail->SetFrom($sender, $sender_name);
  $mail->AddReplyTo($sender, $sender_name); 
  $mail->AddAddress($receiver, $receiver_name);
  $mail->AddAddress('bibil1986imns@gmail.com', $receiver_name);  
  $mail->Subject    = $subject;  
  $mail->MsgHTML($body_msg);
  $mail->Send();
} catch (phpmailerException $e) {
  echo $e->errorMessage(); //Pretty error messages from PHPMailer
} catch (Exception $e) {
  echo $e->getMessage(); //Boring error messages from anything else!
}    
  
  }//else close 
    $message  =  "Your message has been received, we will contact you shortly";
    set_flashdata('success_message',$message);	
	die(json_encode(array('success'=>true, 'email_exists'=> false,'message'=>$message,'redirect_url'=>base_url('contact'))));	  			
}
?>