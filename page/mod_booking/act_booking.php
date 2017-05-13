<?php
session_start();
include_once("../../includes/application_top.php");
$funObj->action = "add";
$funObj->table  = TABLE_BOOKING_ONLINE;
if( isset( $_POST['RegisterAndbooking'] ) )
{
   foreach($_POST as $key=>$val)
   {  $$key=$funObj->check($val);   } 
    if(count($_POST['activities'])>0)
	{    $other_activities    =   implode(",",$_POST['activities']); }
	else { $other_activities    =   ""; }
	
	if(count($_POST['i_am'])>0)
	{    $i_am    =   implode(",",$_POST['i_am']); }
	else { $i_am    =   ""; }
	
		
	$image    =   $_FILES['image']['name'];
	$tmp_path    =   $_FILES['image']['tmp_name'];
	$image  =  @$funObj->randomkeys(6).$image;
	move_uploaded_file($tmp_path,FCPATH."uploads/images/booking/".$image);	
	
	$checkIn = explode('/',$checkIndate);
	$checkOut = explode('/',$checkOutdate);
	$dateIn = date("Y-m-d", mktime(0,0,0, $checkIn[0], $checkIn[1], $checkIn[2]));  
	$dateOut = date("Y-m-d", mktime(0,0,0, $checkOut[0], $checkOut[1], $checkOut[2])); 
	 	 	 	 	 	 	 	 	 	 	
    $funObj->data =array("checkindate"=>$dateIn,
						"checkoutdate"=>$dateOut,
						"trip_name"=>$trip_name,
						"child"=>$childsNO,
						"adult"=>$adultsNo,
						"fullname"=>$fullname,
						"address"=>$address,
						"country"=>$country,
						"phone"=>$countrycode.$areacode.$telephone,
						"mobile"=>$mobile,
						"email"=>$email,
						"company"=>$company,
						"description"=>$client_description,
                        "airlines"=>$airlines,
						"flightno"=>$flightno,
						"notify"=>$specialoffer,
						"hear_about"=>$hearFrom,
						"i_am"=>$i_am,
						"other_activities"=>$other_activities,
						"image"=>$image,
						"booked_date"=>date("Y-m-d"),
						"status"=>0
						); 						
	         $funObj->begin();		
	         $queryResult  =  $funObj->doAction(); 
              
                               if(!$queryResult) { $funObj->rollback(); $_SESSION['succesMesage'] = "Action cannot place Occur due to some internal errors!!.Please try again";
			                    } else { $funObj->commit(); 
								
				   // Now fot the client thanking Email
				   $thankyouEmail     = "";				   
				   $senderEmails      =   $funObj->ConfigValue('COMPANY_EMAIL');
				   $senderEmailArr    =   explode(",",$senderEmails);
				   $senderEmail       =   $senderEmailArr[0];
				   $senderName        =   $funObj->ConfigValue('COMPANY_SITE_NAME');
    			   $senderPhone       =   $funObj->ConfigValue('COMPANY_PHONE');
				   $senderLocation    =   $funObj->ConfigValue('COMPANY_LOCATION');
				   $subject           =   "Welcome to ".$funObj->ConfigValue('COMPANY_SITE_NAME');
				   $thankyouEmail     =   "Dear $fullname<br>
				                          <p style='text-align:justify;width:500px;' >
										  We are very greatful and we very welcome to you in our Tour and Tavels.We are very happy that you have belive in us and provide and                                        oppurtunitis .<br>
										So once again thank you and i would like to notify you that
										you have successfully booked the Services.
										We will be waiting for you to serve.
										Please contact us in following contact information if you any                                        thing you  like  to ask    <br>  <br>                                 
										      $senderName<br>
											  $senderEmail<br>
											  $senderPhone<br>
											  $senderLocation<br>
											  <a  href='http://nepassistance.com/'>
<img width='220' alt='Nepal Assitance' src='http://nepassistance.com/themes/default/images/logo.png'>
</a>
										</p>								   
									   ";
					$receiverEmail  =   $email;	
                    $funObj->sendEmail($senderName, $senderEmail, $receiverEmail, $subject, $thankyouEmail);
				   $countryrow  = $funObj->CountrySel($country);
				   $receiverEmail  = $senderEmail;
				   $subject  =  "Booking received from ".$funObj->ConfigValue('COMPANY_SITE_NAME');
				   $message  = "Dear sir,
				   
				                 We have received a new booking form ".$funObj->ConfigValue('COMPANY_SITE_NAME')." having following details.<br><br>
								 
				   <h2>Personal Details</h2>
				   Fullname : ".$fullname."<br>				   
				   Address : ".$address."<br>
				   Country : ".@$countryrow->Country."<br>
				   Phone : ".$countrycode.$areacode.$telephone."<br>
				   Mobile : ".$mobile."<br>
				   Email : ".$email."<br>
				   Booking Date : ".date("Y-m-d")."<br>
				   <h2>Booking Details</h2>
				   Check In Date : ".$dateIn."<br>
				   Check Out Date : ".$dateOut."<br>
				   Child : ".$childsNO."<br>
				   Adult : ".$adultsNo."<br>
				   Airlines : ".$airlines."<br>
				   Flightno : ".$flightno."<br>
				   I am : ".$i_am."<br>
				   Other Activities : ".$other_activities."<br>						
				   <br>	
				   Please contact him/her soon, or see the booking details on website.			 
				   <br> <br> <br>				 
				   Thank You<br>
				   Webmaster<br>
				   ".$funObj->ConfigValue('COMPANY_SITE_NAME')."<br>
				   <a  href='http://nepassistance.com/'>
<img width='220' alt='Spring Travels and Tours' src='http://nepassistance.com/themes/default/images/logo.png'>
</a>";
	$receiverEmail2  = $funObj->ConfigValue('COMPANY_EMAIL_2');			   
	$funObj->sendEmail($fullname, $email, 'bibil1986imns@gmail.com', $subject, $message);
	$funObj->sendEmail($fullname, $email, $receiverEmail2, $subject, $message);	   
	$emailAndBookingSuccess  =  $funObj->sendEmail($fullname, $email, $receiverEmail, $subject, $message);
				  }//else close 
				  			
  $_SESSION['successMesage'] = "Thank you for your booking, we will contact you shortly..";
}
$url_back  = base_url('booking');
redirect($url_back);
?>