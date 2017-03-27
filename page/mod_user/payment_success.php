<?php 
if(isset($contentPage) and $contentPage=='payment_success'){
ob_start(); 
$profile_id  =  $funUserObj->current_user();
if(empty($profile_id)){ redirect(base_url());}
$row_user    =  $funUserObj->find_by_id($profile_id);
if(isset($_POST['txn_id']) and !empty($_POST['txn_id'])): 
	$booking_id         = $_POST['custom'];
    $txn_id             = $_POST['txn_id'];
    $price      = $_POST['payment_gross'];
    $payment_data   = array('has_payment'=>1,
    	                    'payment_transaction_id'=>$txn_id,
    	                    'payment_date'=>date("Y-m-d"),
    	                    'grand_total'=>$price,
    	                    'payment_type'=>'paypal',
    	                    'status'=>'Payment Done and Completed',
    	                    'booking_status'=>'close'
    	                    );
    $funBookingObj->paymentSuccess($booking_id,$payment_data);
    $row  =  $funBookingObj->find_book_by_id($booking_id);
    $songsList = "";

              $result_items   =  $funBookingObj->find_book_child_by_id($booking_id);
              $num_items      =  $db->num_rows($result_items);
              $booking_status =  $row->booking_status;
             ob_start();
              ?>
              <strong>Wishlist <?php echo date("F d,Y",strtotime($row->booking_date)); ?></strong><br>
              <table class="table table-bordered">
                  <?php
              if($num_items>0){ $sn=1;
                  while($row_items  =  $db->result($result_items)){ 
                        $item_id  =  $row_items->item_id;
                        $row_item     =  $funSVLObj->find_by_id_songs($item_id);
                      ?>
                  <tr>
                      <td><?php echo $sn;?></td> <td><?php echo $row_item->title;?></td>               
                  </tr>
                 <?php $sn++; } } ?>                   
                </table>
    <?php $songsList  = ob_get_clean();  

    //now send email to user and admin    
    $user_id   =  $row->user_id;
    $customer_row  =  $funUserObj->find_by_id($user_id);
    $fullname      =  $customer_row->first_name." ".$customer_row->last_name; 
    $email =  $customer_row->email;
    // Now for the client thanking Email
				   $thankyouEmail     = "";				   
				   $senderEmails      =   $funObj->ConfigValue('COMPANY_EMAIL');
				   $senderEmailArr    =   explode(",",$senderEmails);
				   $senderEmail       =   $senderEmailArr[0];
				   $senderName        =   $funObj->ConfigValue('COMPANY_SITE_NAME');
				   $subject           =   "Thank you for the payment - ".$funObj->ConfigValue('COMPANY_SITE_NAME');
				   $thankyouEmail     =   "Dear $fullname<br>
				                          <p style='text-align:justify;width:500px;' >
										  Your payment has been done for your wishlist songs for following songs.<br>
										  ".$songsList."

										<br>  
										Please send us email if you have any query
										<br><br>                                 
										      $senderName<br>
											  $senderEmail<br>
											  <a  href='http://lyricsnepal.com/'>
<img width='220' alt='Lyrics Nepal' src='http://lyricsnepal.com/themes/default/images/logo.png'>
</a>
										</p>								   
									   ";
					$receiverEmail  =   $email;	
                    $funObj->sendEmail($senderName, $senderEmail,$fullname, $receiverEmail, $subject, $thankyouEmail);
                   $receiverName        =   $senderName;
				   $receiverEmail  = $senderEmail;
				   $subject  =  "Payment has been received to ".$funObj->ConfigValue('COMPANY_SITE_NAME');
				   $message  = "Dear sir,
				   
				                 We have received a payment from ".$funObj->ConfigValue('COMPANY_SITE_NAME')." having following details.<br><br>
								 
				   <h2>Personal Details</h2>
				   Fullname : ".$fullname."<br> for wishlist  having following songs<br>
                     ".$songsList."
				   <br>	
				   Please contact him/her soon, or see the booking details on website.			 
				   <br> <br> <br>				 
				   Thank You<br>
				   Webmaster<br>
				   ".$funObj->ConfigValue('COMPANY_SITE_NAME')."<br>
				   <a  href='http://lyricsnepal.com/'>
<img width='220' alt=Lyrics Nepal' src='http://lyricsnepal.com/themes/default/images/logo.png'>
</a>";
	$receiverEmail2  = $funObj->ConfigValue('COMPANY_EMAIL_2');			   
	$funObj->sendEmail($fullname, $email,$receiverName, 'bibil1986imns@gmail.com', $subject, $message);
	$funObj->sendEmail($fullname, $email,$receiverName, $receiverEmail2, $subject, $message);	   
	$emailAndBookingSuccess  =  $funObj->sendEmail($fullname, $email, $receiverName, $receiverEmail, $subject, $message);
?>
<strong>You payment has been received. Please click on the <a href="<?php echo base_url('user/wishlist');?>">wishlist</a> to download your favourate songs.</strong>
<?php 
endif;
$cms['module:user_payment_success'] = ob_get_clean();
}
?>
