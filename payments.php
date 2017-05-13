<?php
define('PAYMENTPAGE', 1);
/*** define the site path ***/
$site_path = realpath(dirname(__FILE__));
define ('__SITE_PATH', $site_path);
 
 //Load the Main File Which load all files and classes,Function Necessary For The Website
 require("includes/application_top.php");

$action      =  isset($_REQUEST['payment_method'])?$_REQUEST['payment_method']:'esewa';
$token_keys  =  $_REQUEST['token_keys'];
//$action  =  'esewa';
//$token_keys  =  "eAbi3y";
echo "<div align='center' style='margin-top:100px;'>
<img style='margin-top:20px' src='images/360.gif'/><h3  style='margin-top:5px;font-family: sans-serif;font-weight:100;'>Processing... Please wait</h3></div><br>";
$result   =  $db->query("SELECT * FROM tbl_payment WHERE token_keys='$token_keys'");
$row  =  $db->result($result);
switch($action){
	
	
	case 'esewa':
	ob_start();
	$payment_id  =  $row->id;
	$tax  =  0;
	$grand  = $row->grand_total;
	$amt  = ($grand-$tax);
	if($row->email=='bibil1986imns@gmail.com'){
		$tax   = 0;
		$grand = 10;
		$amt   = 10;
    }
	$return         = base_url("success.php");
	$cancel_return  = base_url("payment/paynow");
	$live = false;
	if($live==false){
	   $esewa_url  = 	"https://dev.esewa.com.np/epay/main";
	   $scd  =  "Astronvastu";
	}
	else{
	   $esewa_url  = 	"https://esewa.com.np/epay/main";
	   $scd  =  "Astronvastu";
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
	
	
	default:
	break;		
}
?>