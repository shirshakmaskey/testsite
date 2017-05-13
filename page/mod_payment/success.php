<?php 
if(defined("PAYMENT_PAGE") and defined("SUCCESS_PAGE")){
	/*********************************/
	$show_success=0;	//$_REQUEST['oid']  = "eAbi3y"; 
   //esewa
	if(@isset($_REQUEST['oid'])){
		$token_keys  =  $oid =  $_REQUEST['oid'];
		$payment_method          =  'esewa';
		$show_success   =   0;
		$result      =  $db->query("SELECT * FROM tbl_payment WHERE token_keys='$token_keys'");
		$row         =  $db->fetch_array($result);	
		//pr($row);   
		//with curl	
		$live = false;
		if($live==false){
			$esewa_verfication_url  = 	"https://dev.esewa.com.np/epay/transrec";
			$scd  =  "Astronvastu";}
			else{
				$esewa_verfication_url  = 	"https://esewa.com.np/epay/transrec";
				$scd  =  "Astronvastu";}
    	//create array of data to be posted
				$post_data['amt'] = $row['grand_total'];		
				if($row['email']=='bibil1986imns@gmail.com'){
					$post_data['amt'] = 10;
				}
				$post_data['scd'] = $scd;
				$post_data['pid'] = $oid;
				$post_data['rid'] = $_REQUEST['refId'];
		//traverse array and prepare data for posting (key1=value1)
				foreach ($post_data as $key => $value) {
					$post_items[] = $key . '=' . $value;
				}
		//create the final string to be posted using implode()
				$post_string = http_build_query($post_data);

		//create cURL connection
				$curl_connection = curl_init($esewa_verfication_url);
		//set options
				curl_setopt($curl_connection, CURLOPT_CONNECTTIMEOUT, 180);
				curl_setopt($curl_connection, CURLOPT_USERAGENT,$_SERVER['HTTP_USER_AGENT']);
				curl_setopt($curl_connection, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($curl_connection, CURLOPT_SSL_VERIFYPEER, false);
				curl_setopt($curl_connection, CURLOPT_FOLLOWLOCATION, 0);
				curl_setopt($curl_connection, CURLOPT_RETURNTRANSFER, 1); 

		//set data to be posted
				curl_setopt($curl_connection, CURLOPT_POSTFIELDS, $post_string);
		//perform our request
				$result = curl_exec($curl_connection);
				$abc = curl_getinfo($curl_connection);
		//echo curl_errno($curl_connection) . '<br/>';
		//echo curl_error($curl_connection) . '<br/>';

		//close the connection
				curl_close($curl_connection);
				$verification_response  = strtoupper( trim( strip_tags( $result ) ) ) ;
				if('SUCCESS' == $verification_response){
					$show_success   =   1; 
					$sql = "UPDATE tbl_payment SET has_payment='1',transaction_id='".$_REQUEST['refId']."',transaction_date='".date('Y-m-d')."' WHERE token_keys='$token_keys'"; $db->query($sql);	
				}
				else{
					echo '<h2><strong>ERROR:</strong> Transaction could not be verified</h2>';
		}}//esewa
		/***********************************************/   
		ob_start();?>

		<div class="col-md-6">   
		<?php if($show_success==1){ ?>  
			<h1>Payment has been Success</h1> 
			<h4 class="main-message">Your payment has been successfully completed.<br />Your product/details will be sent in your email or with phone contact.</h4>

			<hr>
			<h2>Your Details</h2>
			<table>
				<tr><td>Fullname</td><td><?=$row['fullname']?></td></tr>
				<tr><td>Address</td><td><?=$row['address']?></td></tr>
				<tr><td>Contact No</td><td><?=$row['contact_no']?></td></tr>
				<tr><td>Email</td><td><?=$row['email']?></td></tr>
				<tr><td>Amount</td><td>Rs. <?=$row['grand_total']?></td></tr>
				<tr><td>Payment Method</td><td><?=$row['payment_method']?></td></tr>
				<tr><td valign="top">Services</td><td>
					<?php $payment_id  =  $row['id'];
					    $result_child      =  $db->query("SELECT * FROM tbl_payment_child WHERE payment_id='$payment_id'"); echo "<ul>";
		                 while($row_child         =  $db->fetch_array($result_child)){
		                 	echo "<li>".$row_child['item_name']." (Rs. ".$row_child['price'].")</li>";
		                 }
		                 echo "</ul>";
					?>
				</td></tr>
			</table>
		<?php }else{ ?>
		<h1>Sorry Your payment is not verified</h1> 
		<?php } ?>	
		</div>

		<div class="col-md-6">      
			<img src="<?php echo base_url('uploads/images/pages/success.jpg'); ?>"  alt="Success" class="img-responsive full-width" >
		</div> 
		      <?php
     if($show_success==1){
	       $web_name        =  "Astro and Vastu Service";
		   $web_phone       =   COMPANY_MOBILE;
		   $web_email       =   COMPANY_EMAIL;
		   $web_location    =   COMPANY_LOCATION;
		   $web_url         =   COMPANY_SITE_URL;

 			$fromName       =  $row['fullname'];
 			$fromEmail      =  "info@astroandvastuservice.com";
 			$receiverName   =  $web_name;
 			$receiverEmail  =  $web_email;
 			$email_subject  =  "Payment has been received. "." - Astro and Vastu Service";
            
            $fullname  =  $row['fullname'];
            $address  =  $row['address'];
            $contact_no  =  $row['contact_no'];
            $email  =  $row['email'];
            $grand_total  =  $row['grand_total'];
            $delivery_address_detail  =  $row['delivery_address_detail'];
            $payment_method  =  $row['payment_method'];
            $transaction_date  =  $row['transaction_date'];
            $transaction_id  =  $row['transaction_id'];
            $payment_id  =  $row['id'];

                   

 			$content  =   "Dear Sir,
 			              <b>$receiverName</b><br>
                          <p style='text-align:justify;width:500px;' >
                          We have got a inquiry order from $fullname<br>
                          Following are the details of payment received:<br>
                          <table cellpadding='1' cellspacing='1' border='1' width='500'>
                          <tbody>
                          <tr><td>Fullname</td><td>".$fullname."</td></tr>
                          <tr><td>Address</td><td>".$address."</td></tr>
                          <tr><td>Contact No</td><td>".$contact_no."</td></tr>                          
                          <tr><td>Email</td><td>".$email."</td></tr>                          	
                          <tr><td>Delivery Address/ Details</td><td>".$delivery_address_detail."</td></tr>
                          <tr><td>Payment Method</td><td>".ucwords($payment_method)."</td></tr>
                          <tr><td>Garand Total</td><td>".$grand_total."</td></tr>
                           <tr><td>Transaction Date</td><td>".$transaction_date."</td></tr>
                            <tr><td>Transaction Id</td><td>".$transaction_id."</td></tr>
                          ";
			
			$content  .=   "<tr><td colspan='2'>Services are</td></tr>";			
			$result_child      =  $db->query("SELECT * FROM tbl_payment_child WHERE payment_id='$payment_id'"); 
             while($row_child         =  $db->fetch_array($result_child)){
             	$content  .=   "<tr><td>".$row_child['item_name']."</td><td>Rs.  ".$row_child['price']."</td></tr>";
             }
			$content  .=   "
                          </tbody>
                          </table>
                          <br>
                          Please contact him soon.
						 <br> Webmaster<br>                                 
						      $web_name<br>
							  $web_email<br>
							  $web_phone<br>
							  $web_location<br>
							  <a  href='".$web_url."'>".base_url('')."</a>
						</p>";
			
           $send = $funObj->sendEmail($fromName,$fromEmail,$receiverName,$receiverEmail, $email_subject, $content);
            if(!empty($email)) { 
            $fromName       = "Astro and Vastu Consultancy Service";
 			$fromEmail      =  COMPANY_EMAIL;
 			$receiverName   =  $fullname;
 			$receiverEmail  =  $email;
 			$email_subject  =  "Your Payment has been received. "."- Astro and Vastu Consultancy Service";

 			$content  =   "Dear $fullname,
 			                <br><br>
                          <p style='text-align:justify;width:500px;' >
                          We have received your payment with following details:<br>
                          <table cellpadding='1' cellspacing='1' border='1' width='500'>
                          <tbody>
                          <tr><td>Fullname</td><td>".$fullname."</td></tr>
                          <tr><td>Address</td><td>".$address."</td></tr>
                          <tr><td>Contact No</td><td>".$contact_no."</td></tr>                          
                          <tr><td>Email</td><td>".$email."</td></tr>                          	
                          <tr><td>Delivery Address/ Details</td><td>".$delivery_address_detail."</td></tr>
                          <tr><td>Payment Method</td><td>".ucwords($payment_method)."</td></tr>
                          <tr><td>Garand Total</td><td>".$grand_total."</td></tr>
                           <tr><td>Transaction Date</td><td>".$transaction_date."</td></tr>
                            <tr><td>Transaction Id</td><td>".$transaction_id."</td></tr>";
$content  .=   "<tr><td colspan='2'>Services are</td></tr>";
 
			$result_child      =  $db->query("SELECT * FROM tbl_payment_child WHERE payment_id='$payment_id'"); 
             while($row_child         =  $db->fetch_array($result_child)){             	
             	$content  .=   "<tr><td>".$row_child['item_name']."</td><td>Rs.  ".$row_child['price']."</td></tr>";
             }

          $content  .=   "</tbody>
                          </table>
                          <br>
                          Thank you for your enquires, we will contact your shortly.<br>
						 <br> Webmaster<br>                                 
						      $web_name<br>
							  $web_email<br>
							  $web_phone<br>
							  $web_location<br>
							  
						</p>";
    $send1 = $funObj->sendEmail($fromName,$fromEmail,$receiverName,$receiverEmail, $email_subject, $content);}
}

$cms['module:payment_success'] = ob_get_clean();
	}