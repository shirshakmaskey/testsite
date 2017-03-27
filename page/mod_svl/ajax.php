<?php
session_start();
include_once("../../includes/application_top.php");
$mode  =  isset($_REQUEST['mode'])?$_REQUEST['mode']:0;
switch($mode){
   	case 'add_songs':
	$slug   = $_REQUEST['slug'];
	$user_id  =  $funUserObj->current_user();
	$booking_id  =  $funBookingObj->checkCurrentBooking();
	if(empty($booking_id)){
		 $data = array('user_id'=>$user_id,
		               'booking_date'=>date("Y-m-d H:i:s"),
					   'booking_type'=>empty($user_id)?"guest":"user",
					   'currency'=>'USD',
					   'currency_symbol'=>'$',
					   'subtotal'=>0,
					   'shipping_type'=>'',
					   'shipping_rate'=>'',
					   'discount_coupon'=>'',
					   'discount_rate'=>'',
					   'tax'=>'',
					   'tax_rate'=>'',
					   'service_charge'=>'',
					   'grand_total'=>'',
					   'payment_type'=>'',
					   'has_payment'=>0,
					   'booking_status'=>'open',
					   'status'=>1
					   );
		$booking_id  =  $funBookingObj->add_booking($data); 
	}
		$row_item    =  $funSVLObj->find_by_slug($slug);
		$item_id     =  $row_item->id;
		$qty         =  1;
		$price       =  !empty($row_item->price) ? $row_item->price : 0;
		$action      =  'add';
		$funBookingObj->addRemoveUpdateChildItem($booking_id,$item_id,$qty,$price,$action);	
	
	$json_arr  =  array("result"=>'true',
	 	                 "msg"=>"Item has been added in wishlist.");
	die(json_encode($json_arr));
	break;
    case 'remove_songs':
	$booking_id   = $_REQUEST['b'];
	$item_id      = $_REQUEST['i'];
	$qty         =  1;
	$price       =  0;
	$action      =  'remove';
	$funBookingObj->addRemoveUpdateChildItem($booking_id,$item_id,$qty,$price,$action);	
	$json_arr  =  array("result"=>'true',
	 	                "msg"=>"Item has been remove.",
	 	                'redirect'=>base_url('user/wishlist')
	 	                );
	die(json_encode($json_arr));
	break;

	case 'make_payment':
	$booking_id   =  base64_decode( $_REQUEST['booking_id'] );
	$price      =  base64_decode( $_REQUEST['price'] );
	?>
    <?php
$site_live =  false;
if($site_live==true){
 $paypal_id =  "liveemail@longtail.info"; 
}else{
$paypal_id =  "naresh-facilitator@longtail.info"; 
}

if($site_live==true){ ?>
 <form action="https://www.paypal.com/cgi-bin/webscr" name="paypal_form" method="post" id="paypal_form">
<?php }else{ ?>
<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" name="paypal_form" method="post" id="paypal_form">
<?php } ?>

<?php
$return  =  base_url('user/payment_success');
$cancel_return  =  base_url('user/payment_failure');
$cpp_header_image  = "image ko path";
?>

<input type="hidden" value="_xclick" name="cmd">
<input type="hidden" value="1" name="upload">
<input type="hidden" value="<?php echo $paypal_id;?>" name="business">
<input type="hidden" value="BuildingBlocks" name="page_style">
<input type="hidden" value="1" name="no_shipping">
<input type="hidden" name="return" value="<?=$return;?>">
<input type="hidden" name="cancel_return" value="<?=$cancel_return;?>"/>

<input type="hidden" name="custom"        value="<?=$booking_id;?>">
<input type="hidden" name="handling_cart" value="<?=$booking_id;?>" />
<input type="hidden" name="rm" value="2" />
<input type="hidden" name="cpp_header_image" value="<?=$cpp_header_image;?>" />
<input type="hidden" value="0" name="tax">
<input type="hidden" value="Lyrics Nepal" name="item_name">
<input type="hidden" value="<?php echo $price; ?>" name="amount">
</form>
<script>document.getElementById('paypal_form').submit();</script>
	<?php
	break;


	case 'add_songs_to_playlist':
	$slug   = $_REQUEST['slug'];
	    $user_id  =  $funUserObj->current_user();	
		$row_item    =  $funSVLObj->find_by_slug($slug);
		$item_id     =  $row_item->id;
		$qty         =  1;
		$price       =  !empty($row_item->price) ? $row_item->price : 0;
		$action      =  'add';
		$funSVLObj->addRemovePlaylist($user_id,$item_id,$action);
		$cnt         =  $funSVLObj->count_playlist_by_user($user_id);	
	
	$json_arr  =  array("result"=>'true',
	 	                "msg"=>"Item has been added in playlist.",
	 	                'cnt'=>$cnt);
	die(json_encode($json_arr));
	break;

	case 'remove_songs_playlist':
	$user_id      = $_REQUEST['u'];	
	$item_id      = $_REQUEST['i'];
	$action       =  'remove';
	$funSVLObj->addRemovePlaylist($user_id,$item_id,$action);	
	$json_arr  =  array("result"=>'true',
	 	                "msg"=>"Item has been remove.",
	 	                'redirect'=>base_url('user/playlist')
	 	                );
	die(json_encode($json_arr));
	break;

	default:
	break;
}
?>