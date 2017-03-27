<?php
session_start();
include_once("../../includes/application_top.php");
$mode  =  $_REQUEST['mode'];
if($mode=='change_status'){
	 $id  =  $_POST['id'];
     $row  =  $funCustomerObj->customerSel($id);	
	 $status  =  ($row->status==0)?"1":"0";
	 $db->update('tbl_customer',array('status'=>$status),array('id'=>$id));
	 echo ($status==0)?"Inactive":"Active";
}

if($mode=='add_vehicle'){
	 foreach($_POST as $key=>$val){$$key=$val;}
	 $funObj->table = 'tbl_customer_vehicle';
	 $funObj->data  = array(
	                         'customer_id'=>$customer_id,
							 'vehicle_type_id'=>$vehicle_type_id,
							 'vehicle_brand'=>$vehicle_brand,
							 'vehicle_name'=>$vehicle_name,
							 'vehicle_no'=>$vehicle_no
							); 
	 $funObj->insert();
    $content = '<option value="">Choose Vehicle</option>';
	$dataRec = $funCustomerObj->get_customer_vehicle($customer_id);
	while($theRows  =  $db->fetch_array($dataRec)){ 
		$name = $theRows['vehicle_name'].' ['.$theRows['vehicle_no'].'] '; 
		$content.='<option value="'.$theRows['cust_vehicle_id'].'">'.$name.'</option>';
	}
	echo json_encode(array('result'=>'true','message'=>'Vehicle Added Successfully!', 'content'=>$content));				
							
}
if($mode=='list_vehicle'){
	$customer_id  =  $_REQUEST['id'];	
    $content = '<option value="">Choose Vehicle</option>';
	$dataRec = $funCustomerObj->get_customer_vehicle($customer_id);
	while($theRows  =  $db->fetch_array($dataRec)){ 
		$name = $theRows['vehicle_name'].' ['.$theRows['vehicle_no'].'] '; 
		$content.='<option value="'.$theRows['cust_vehicle_id'].'">'.$name.'</option>';
	}
	echo json_encode(array('result'=>'true','message'=>'Vehicle has been listed.', 'content'=>$content));				
							
}

if($mode=='add_customer'){
	foreach($_POST as $key=>$val){$$key=$val;}
	$funObj->table = 'tbl_customer';
	$funObj->data =array("first_name"=>$first_name,
                        "middle_name"=>$middle_name,
						"last_name"=>$last_name,
						"phone_no"=>$phone_no,
						"mobile_no"=>$mobile_no,
						"email"=>$email,						
						"address"=>$address,
						"gender"=>$gender,
						"status"=>$status
						); 
	$funObj->insert();

	$content = '<option value="">Choose Customer</option>';
	$dataRec = $funCustomerObj->get_customers();
	while($theRows  =  $db->fetch_array($dataRec)){
		$fullname = $theRows['first_name'].' '.$theRows['middle_name'].' '.$theRows['last_name']; 
		$content.='<option value="'.$theRows['id'].'">'.$fullname.'</option>';
	}
	
	echo json_encode(array('result'=>'true','message'=>'Customer Added Successfully!', 'content'=>$content));
}


?>