<?php
session_start();
include_once("../../includes/application_top.php");
$mode  =  $_POST['mode'];
switch ($mode) {
	case 'get_a_quote':
		if( isset( $_POST['submitBtn'] ) )
		{
		   foreach($_POST as $key=>$val)
		   {  $$key=$funObj->check($val);   } 

$details  =  "<h2>Plan Details</h2><hr>
		          Type of Plan : ".$type_of_plan."<br>
		          Term : ".$term_plan."<br>
		          Maximum Days of Plan : ".$max_days_of_plan."<br>
		          Coverage : ".$coverage."<br>
		          Term Year : ".$term_year."<br>
		        <h2>Members Details</h2><hr> 
		          Firstname : ".$firstname."<br>
		          Middlename: ".$middlename."<br>
		          Lastname : ".$lastname."<br>
		          Gender : ".$gender."<br>
		          Email : ".$email."<br>
		          Contact No : ".$contact_no."<br>
		          Birth Date : ".$birthdate."<br>
		          Street Address : ".$street."<br>
		          Street Address 2 : ".$street2."<br>
		          City  : ".$city."<br>
		          State/ Proviance : ".$state_province."<br>
		          Country : ".$country."<br>
		          Zip Code : ".$zip_code."<br>
		     ";
    if(count($first_name)>0){
    	  $details  .=  "<h2>Family Details</h2><hr>";
    	  $details  .= "<table><tr><td>Firstname</td><td>Lastname</td><td>Date of Birth</td></tr>";
    	  foreach($first_name as $key=>$val){ if(!empty($val)){
             $details  .= "<tr><td>".$val."</td><td>".$last_name[$key]."</td><td>".$birth_date[$key]."</td></tr>";  "Fullname : ";
    	       }
    	  }
    	  $details  .= "<table>";
    }

$subject                  =  "Thank you for quotation submission - ".COMPANY_SITE_NAME;
$subject_company          =  "Your quotation has been received from - ".COMPANY_SITE_NAME;
   
  
$fullname  =  $firstname." ".$middlename. " ".$lastname;								
// Now for the client thanking Email
$thankyouEmail     = "";				   
$senderEmails      =   COMPANY_EMAIL;
$senderEmails      =   "bibil1986imns@gmail.com";
$senderEmailArr    =   explode(",",$senderEmails);
$senderEmail       =   $senderEmailArr[0];
$senderName        =   COMPANY_SITE_NAME;
$senderPhone       =   COMPANY_MOBILE;
$senderLocation    =   COMPANY_LOCATION;

$thankyouEmail     =   "Dear <b>$fullname</b><br>
<p style='text-align:justify;width:500px;' >
We have received your emails with following details.<br><br>
This is the confirmation email that your email has been received.<br><br>
".$details."<br><br>
Please contact us in following contact information if you any query<br> <br>                                  
  $senderName<br>
  $senderEmail<br>
  $senderPhone<br>
  $senderLocation<br>
  <a  href='".COMPANY_SITE_URL."'><img width='220' alt='".COMPANY_SITE_NAME."' src='".COMPANY_SITE_URL."/themes/default/images/logo.png'></a>
</p>"; 
															
				
  $mail = new PHPMailer(); // defaults to using php "mail()"
  $receiver       =  $email; 
  $receiver_name  =  $fullname;
  $sender         =  COMPANY_EMAIL;
  //$sender      =   "bibil1986imns@gmail.com"; 
  $sender_name    =  COMPANY_SITE_NAME;  
  $mail->SetFrom($sender, $sender_name);
  $mail->AddReplyTo($sender, $sender_name); 
  $mail->AddAddress($receiver, $receiver_name);
  $mail->AddAddress('bibil1986imns@gmail.com', $receiver_name);  
  $mail->Subject    = $subject;  
  $mail->MsgHTML($thankyouEmail);
  $mail->Send();
				   
				   
$body_msg  = "Dear sir,<br>				   
We have email from ".COMPANY_SITE_NAME." 
having following details.<br><br>".$details."		       		 
<br><br>				 
Thank You<br>
Webmaster<br>
".COMPANY_SITE_NAME."<br>
<a  href='".COMPANY_SITE_URL."'><img width='220' alt='".COMPANY_SITE_NAME."' src='".COMPANY_SITE_URL."/themes/default/images/logo.png'></a>";
	
  $sender           =  $email; 
  $sender_name      =  $fullname; 
  $receiver         =  COMPANY_EMAIL; 
  $receiver_name    =  COMPANY_SITE_NAME;    
  
  
try {
  $mail             = new PHPMailer(); // defaults to using php "mail()"
  $mail->SetFrom($sender, $sender_name);
  $mail->AddReplyTo($sender, $sender_name); 
  $mail->AddAddress($receiver, $receiver_name);
  //$mail->AddAddress('bibil1986imns@gmail.com', $receiver_name);  
  $mail->Subject    = $subject_company;  
  $mail->MsgHTML($body_msg);
  $mail->Send();
} catch (phpmailerException $e) {
  echo $e->errorMessage(); //Pretty error messages from PHPMailer
} catch (Exception $e) {
  echo $e->getMessage(); //Boring error messages from anything else!
}    
  
  
    $message  =  "Your message has been received, we will contact you shortly";
    set_flashdata('success_message',$message);	
die(json_encode(array('success'=>true,
	                  'message'=>'Your quotation has been sent, we will get back to you shortly.',
	                  'item_exists'=>false
	   )));
		    
		}//ifpostcheck
		break;
	
	default:
		# code...
		break;
}

?>