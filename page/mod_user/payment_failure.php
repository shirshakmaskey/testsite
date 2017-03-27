<?php 
if(isset($contentPage) and $contentPage=='payment_failure'){
ob_start(); 
$profile_id  =  $funUserObj->current_user();
if(empty($profile_id)){ redirect(base_url());}
$row_user    =  $funUserObj->find_by_id($profile_id); 
//pr($row_user);
?>
Sorry, Try again later.
<?php 
$cms['module:user_payment_failure'] = ob_get_clean();
}
?>
