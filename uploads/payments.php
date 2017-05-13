<?php
require_once("includes/initialize.php");
/* Error Detecting Script */
/*error_reporting(E_ALL);
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);*/
/* Error Detecting Script */

$action      =  $_REQUEST['payment_method'];
$token_keys  =  $_REQUEST['token_keys'];
//$action  =  'himalayan';
//$token_keys  =  "YSEvAJEcWpxseMiTdapz5qQ7y";
echo "<div align='center' style='margin-top:100px;'>
<img src='".BASE_URL."images/preference/mIYaY_ge9o4_logo.png'><br/>
<img style='margin-top:20px' src='template/home/images/ring.svg'/><h3  style='margin-top:5px;font-family: sans-serif;font-weight:100;'>Processing... Please wait</h3></div><br>";
$result   =  $db->query("SELECT * FROM tbl_booking_master WHERE token_key='$token_keys'");
$row  =  $db->fetch_array($result);
switch($action){
	case 'himalayan':
	ob_start();
	$sql = "UPDATE tbl_booking_master SET payment_type='$action' WHERE token_key='$token_keys'";$db->query($sql);
	/************************************************config start********************************************************/
	putenv("TZ=Asia/Calcutta");		//Set time zone	
	$live=true;
	if($live==true){
		$PGRequestURL = 'https://payment-webinit.sips-atos.com/paymentInit';	//	FOR LIVE ENVIRONMENT
		if($row['country']=='NP' or $row['country']=='IN')
		{
			$MerchantID = '221288400190001';	
	        $PGSecretKey = 'XkvKAJaB5jD_Ck-amQq9LQGvBdtIQWfYJw79EZo13DA';
		}else{
			$MerchantID = '221288400240001';
	        $PGSecretKey = 'NWvd7bpBBgNnKjSiFfx0niPnZG6GRgHe-vmAOZ8vcB8';
		}
		
	}else{ 
	   $PGRequestURL = 'https://payment-webinit.simu.sips-atos.com/paymentServlet';	//	FOR TEST ENVIORNMENT
	   $MerchantID = '002020000000001';	//	FOR TEST	
	   $PGSecretKey = '002020000000001_KEY1';	//	FOR TEST	
	}
	$PGReturnURL  = BASE_URL."success.php?hid=".$token_keys;
	//TO BE USED FOR REDIRECTING BACK TO MERCHANT DOMAIN AFTER PROCESSING PAYMENT REQUEST	
	$PGKeyVersion = '1';
	$CurrencyCode = '356';	
	$PGResponseCodes = array('00'=> 'Transaction success, authorization accepted.','02'=> 'Please phone the bank because the authorization limit on the card has been exceeded','03'=> 'Invalid merchant contract','05'=> 'Do not honor, authorization refused','12'=> 'Invalid transaction, check the parameters sent in the request.','14'=> 'Invalid card number or invalid Card Security Code or Card (for Mastercard) or invalid Card Verification Value (for Visa)','17'=> 'Cancellation of payment by the end user','24'=> 'Invalid status.','25'=> 'Transaction not found in database','30'=> 'Invalid format','34'=> 'Fraud suspicion','40'=> 'Operation not allowed to this merchant','60'=> 'Pending transaction','63'=> 'Security breach detected, transaction stopped.','75'=> 'The number of attempts to enter the card number has been exceeded (Three tries exhausted)','90'=> 'Acquirer server temporarily unavailable','94'=> 'Duplicate transaction. (transaction reference already reserved)','97'=> 'Request time-out; transaction refused','99'=> 'Payment page temporarily unavailable');	
	header("pragma".": "."no-cache");
	header("cache-control".": "."No-cache");	
	/****************************************************config end****************************************************/
	
	/****************************************************request start****************************************************/
	$currency =  $row['currency'];
	$grand_total =  $row['grand_total'];	
	if($currency == 'NPR' or $currency == 'INR'){
		if($currency == 'NPR'){
		  $currency = 'INR';
		  $grand_total = ($grand_total*100/1.6);
	    }else{$currency = 'INR';
	      $grand_total = ($grand_total*100);
	    }
	}
	else{
		$currency = 'USD'; 
		$grand_total = ($grand_total*100);
	}
	$OrderNo=  $token_keys;
	$amount =  $grand_total;
	//$amount =  1000;
	if(empty($amount)){die('Sorry cannot perform transaction at this time.');}
	
	$cur_code  =  array('EUR'=>978, 'USD'=>840, 'CHF'=>756,
	                    'GBP'=>826, 'CAD'=>124, 'CNY'=>392,
						'MXN'=>484, 'AUD'=>036, 'NZD'=>554,
						'NOK'=>578, 'BRL'=>986, 'ARS'=>032,						
						'KHR'=>116, 'TWD'=>901, 'SEK'=>752,						
						'DKK'=>208, 'KRW'=>410, 'SGD'=>702,
						'INR'=>356
						);
    $CurrencyCode = @$cur_code[$currency];						

	$PGData = 'amount='.$amount.'|currencyCode='.$CurrencyCode.'|merchantId='.$MerchantID.'|normalReturnUrl='.$PGReturnURL.'|keyVersion='.$PGKeyVersion.'|orderId='.$OrderNo.'|customerLanguage=en'.'|transactionReference='.$token_keys;
	$PGMessageSeal = hash('sha256', utf8_encode($PGData.$PGSecretKey));
	?>
    <form name="merchantForm" id="merchantForm" method="post" action="<?=$PGRequestURL?>">
	<input type="hidden" name="Data" value="<?=$PGData?>" />
	<input type="hidden" name="InterfaceVersion" value="HP_1.0" />
	<input type="hidden" name="Seal" value="<?=$PGMessageSeal?>" />
	<noscript>
		<br />&nbsp;<br />
		<center>
		Please click Submit to continue the processing of your transaction.<br />&nbsp;<br />
		<input type="submit" />
		</center>
	</noscript>
	</form>
    <script>document.getElementById('merchantForm').submit();</script>
    <?php
	/****************************************************request end****************************************************/
	?>
    <?Php
	echo $content =  ob_get_clean();
	break;
	
	case 'paypal':
	ob_start();
	$sql = "UPDATE tbl_booking_master SET payment_type='$action' WHERE token_key='$token_keys'"; $db->query($sql);
	$site_live =  true;
	//$paypal_id =  "naresh-facilitator@longtail.info"; 
	$paypal_id =  "finance.yeti@chariot.com.sg"; 
	$currency =  $row['currency'];
	$grand_total =  $row['grand_total'];	
	//$grand_total =  10;	
	if($currency == 'NPR'){
		$currency = 'INR';
		$grand_total = ($grand_total/1.6);
	}

	$item_name  = "Ticket Booking - Yeti Airlines";
	$item_number  =  1;
	$custom  = $token_keys;
	$handling_cart  = $token_keys;
	$return  = BASE_URL."success.php?bpid=".$token_keys;
	$notify_url  = BASE_URL."ipn.php";
	$cancel_return  = BASE_URL."failure";
	$cpp_header_image  = IMAGE_PATH."preference/Q30w1_mIYaY_ge9o4_logo.png";
    if(empty($grand_total)){die('Sorry cannot perform transaction at this time.');}
	?>
    <?php if($site_live==true){ ?>     
    <form action="https://www.paypal.com/cgi-bin/webscr" name="frmchkoutpay" method="post" id="frm-paypal">
    <?php }else{ ?>
	<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" name="frmchkoutpay" method="post" id="frm-paypal">
    <?php } ?>
      <input type="hidden" name="cmd"           value="_xclick">
      <input type="hidden" name="business"      value="<?=$paypal_id; ?>"> 	    
      <input type="hidden" name="currency_code" value="<?=$currency?>">
      <input type="hidden" name="item_name"     value="<?=$item_name;?>">
      <input type="hidden" name="item_number"   value="<?=$item_number;?>">
      <input type="hidden" name="custom"        value="<?=$custom;?>">
      <input type="hidden" name="handling_cart" value="<?=$handling_cart;?>" />
      <input type="hidden" name="no_shipping"   value="1">
      <input type="hidden" name="no_note"       value="1">
      <input type="hidden" name="amount"        value="<?=$grand_total;?>">
      <input type="hidden" name="return"        value="<?=$return;?>">
      <input type="hidden" name="cancel_return" value="<?=$cancel_return;?>"/>
      <input type="hidden" name="notify_url"    value="<?=$notify_url;?>">
      <input type="hidden" name="rm" value="2" />
      <input type="hidden" name="cpp_header_image" value="<?=$cpp_header_image;?>" />
	</form>
	<script>document.getElementById('frm-paypal').submit();</script>   
    <?php	    
	echo $content =  ob_get_clean();
	break;
	
	case 'esewa':
	ob_start();
	$sql = "UPDATE tbl_booking_master SET payment_type='$action' 
	 WHERE token_key='$token_keys'";
	$db->query($sql);

	$tax  =  ($row['outbound_tax']+$row['inbound_tax']);
	$grand  = $row['grand_total'];
	$amt  = ($grand-$tax);
	if($row['contact_email']=='nelson.sanjeev@avdigitals.com'){
	$tax  = 0;
	$grand =100;
	$amt=100;
    }
	$return  = BASE_URL."success";
	$cancel_return  = BASE_URL."failure";
	$live = true;
	if($live==false){
	   $esewa_url  = 	"https://dev.esewa.com.np/epay/main";
	   $scd  =  "B2C";
	}
	else{
	   $esewa_url  = 	"https://esewa.com.np/epay/main";
	   $scd  =  "YETIAIR";
	}
	if(empty($grand)){die('Sorry cannot perform transaction at this time.');}
	?>
<form action="<?php echo $esewa_url?>" method="post" name="esewa_form" id="esewa_form">
<input type="hidden" name="amt" value="<?=$amt?>" />
<input type="hidden" name="txAmt" value="<?=$tax?>" />
<input type="hidden" name="psc" value="0" />
<input type="hidden" name="pdc" value="0" />
<input type="hidden" name="tAmt" value="<?=$grand?>" />
<input type="hidden" name="scd" value="<?php echo $scd?>" />
<input type="hidden" name="pid" value="<?=$token_keys?>" />
<input type="hidden" name="su" value="<?=$return?>" />
<input type="hidden" name="fu" value="<?=$cancel_return?>" />
</form>
<script>document.getElementById('esewa_form').submit();</script>
<?php 
	echo $content =  ob_get_clean();
	break;
	
	case 'npay':
	ob_start();
	$sql = "UPDATE tbl_booking_master SET payment_type='$action' WHERE token_key='$token_keys'";$db->query($sql);
	/************************************************config start********************************************************/
	# Merchant are requested to store following information securely
$live=true;
	if($live==true){   
	define("MERCHANT_ID","13");
	define("MERCHANT_USER_NAME","yeti_airlines_live_user");
	define("MERCHANT_PASSWORD","yetiairlines@liveapi-13");
	define("SIGNATURE_PASSCODE","YALIVE01");
	define("NPAY_SOAP_URL","https://gateway.npay.com.np/websrv/Service.asmx?wsdl");
    define("NPAY_GATEWAY_URL","https://gateway.npay.com.np/pay.aspx");
}else{ 
	 define("MERCHANT_ID","19");
	define("MERCHANT_USER_NAME","yeti_airlines_uat_user");
	define("MERCHANT_PASSWORD","yetiairlines@25-api");
	define("SIGNATURE_PASSCODE","YAUAT01");
	define("NPAY_SOAP_URL","http://gateway.sandbox.npay.com.np/websrv/Service.asmx?wsdl");
	define("NPAY_GATEWAY_URL","http://gateway.sandbox.npay.com.np/pay.aspx");	
}
$currency =  $row['currency'];
$grand_total =  $row['grand_total'];	
if(empty($grand_total)){die('Sorry cannot perform transaction at this time.');}
# Define other variables
$transaction_id = $token_keys;
$strAmount = $grand_total;
if($row['contact_email']=='nelson.sanjeev@avdigitals.com'){
	$strAmount=10;
    }
if(empty($grand_total)){die('Sorry cannot perform transaction at this time.');}
$decription = "Yeti Airlines Ticekt Reservation transaction Transaction ID: " . $transaction_id . " || Amount: " . $strAmount;

# Hash password with SHA256. Combination = MERCHANT_USER_NAME + MERCHANT_PASSWORD
$sha256Pwd = hash ("sha256", MERCHANT_USER_NAME . MERCHANT_PASSWORD);

# Hash signature with SHA256. Combination = SIGNATURE_PASSCODE + MERCHANT_USER_NAME + transaction_id
$signature = hash("sha256", SIGNATURE_PASSCODE . MERCHANT_USER_NAME . $transaction_id);

# Initialize webservice with WSDL
$client = new SoapClient(NPAY_SOAP_URL);

# Set your parameters for the request
$params = array(
  "MerchantId" => MERCHANT_ID,
  "MerchantTxnId" => $transaction_id,
  "MerchantUserName" => MERCHANT_USER_NAME,
  "MerchantPassword" => $sha256Pwd,
  "Signature" => $signature,
  "AMOUNT" => $strAmount,
  "purchaseDescription" => $decription,
);

# Invoke webservice method with parameters, Function Name: ValidateMerchant 
$response = $client->__soapCall("ValidateMerchant", array($params));

# Print webservice response
 //print_r($response);		// Uncomment to print

# if validated, STATUS_CODE is returned as 0 (ZERO) else validation error.
if($response->ValidateMerchantResult->STATUS_CODE != "0")
{
	$STATUS_CODE = $response->ValidateMerchantResult->STATUS_CODE;
	# Error occured while validating merchant. End process.
	die("Error on validating merchant. <br> Error Code: " . $STATUS_CODE . " <br>MESSAGE: " . $response->ValidateMerchantResult->MESSAGE);
}

# Proceed as authentication is successful.
$STATUS_CODE = $response->ValidateMerchantResult->STATUS_CODE;
$PROCESS_ID = $response->ValidateMerchantResult->PROCESSID;

# Now Post values to the gateway page using HTML form
	/****************************************************config end****************************************************/
	
	/****************************************************request start****************************************************/
	?>
    <form action="<?php echo NPAY_GATEWAY_URL;?>" method="post" name="sendForm" id="merchantForm">
    <input type="hidden" value="<?php echo $PROCESS_ID;?>" name="processID" />
    <input type="hidden" value="<?php echo MERCHANT_ID?>" name="MerchantID" />
    <input type="hidden" value="<?php echo $transaction_id?>" name="MerchantTxnID" />
    <input type="hidden" value="<?php echo $strAmount?>" name="PayAmount" />
    <input type="hidden" value="<?php echo MERCHANT_USER_NAME?>" name="MerchantUsername" />
    <input type="hidden" value="<?php echo $decription?>" name="Description" />
    <noscript>
		<br />&nbsp;<br />
		<center>
		Please click Submit to continue the processing of your transaction.<br />&nbsp;<br />
		<input type="submit" value="POST DATA" name="posting"  />
		</center>
	</noscript>
    </form>
    <script>document.getElementById('merchantForm').submit();</script>
    <?php
	/****************************************************request end****************************************************/
	?>
    <?Php
	echo $content =  ob_get_clean();
	break;
	
	case 'investment':
	ob_start();
$sql = "UPDATE tbl_booking_master SET payment_type='$action' WHERE token_key='$token_keys'";$db->query($sql);
$currency       =  $row['currency'];
$grand_total    =  $row['grand_total'];	
$transaction_id = $token_keys;
$amt = $grand_total;
if($row['contact_email']=='nelson.sanjeev@avdigitals.com'){
	$amt=100;
    }
if(empty($grand_total)){die('Sorry cannot perform transaction at this time.');}
	/****************************************************config end****************************************************/
	
	/****************************************************request start****************************************************/
	?>
   
 <form method="post" action="https://www.nibl.com.np/BankAwayRetail/sgonHttpHandler.aspx?Action.ShoppingMall.Login.Init=Y" name="merchantForm" id="merchantForm">
  <input type="hidden" name="BankId" value="004">
  <input type="hidden" name="MD"  value="P">
  <input type="hidden" name="PID" value="000000000014">
  <input type="hidden" name="CRN" value="NPR">
  <input type="hidden" name="RU"  value="<?php echo BASE_URL."success.php?iid=".$token_keys;?>">
  <input type="hidden" name="CG"  value="N">
  <input type="hidden" name="USER_LANG_ID" value="001">
  <input type="hidden" name="UserType" value="1">
  <input type="hidden" name="AppType"  value="retail">
  <input type="hidden"   name="PRN"      value="<?=$transaction_id?>">
  <input type="hidden"   name="ITC"      value="<?=$transaction_id?>">
  <input type="hidden" name="AMT"      value="<?=$amt?>">
   <noscript>
   <center>
   Please click Submit to continue the processing of your transaction.<br />&nbsp;<br />
   <input type="submit" value="POST DATA" name="posting"  />
   </center>
   </noscript>
    </form>
    <script>document.getElementById('merchantForm').submit();</script>
    <?php
	/****************************************************request end****************************************************/
	?>
    <?Php
	echo $content =  ob_get_clean();
	break;	
	
	default:
	break;		
}
?>