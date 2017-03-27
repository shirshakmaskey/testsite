<?php
session_start();
include_once("../../includes/application_top.php");
$mode  =  $_POST['mode'];
if($mode=='change_status'){
	 $id  =  $_POST['id'];
     $row  =  $funUSERObj->find_by_id($id);	
	 $status  =  ($row->status==0)?"1":"0";
	 $db->update(TABLE_USER,array('status'=>$status),array('id'=>$id));
	 echo ($status==0)?"Inactive":"Active";
}

if($mode=='change_password'){
	 foreach($_POST as $key=>$val){$$key=$val;}
 
	 $funObj->table = TABLE_USER;
	 $funObj->data  = array('password'=>base64_encode(md5(check($new_password)))
							 ); 
	 $funObj->cond  = array("id"=>$user_id);
     $funObj->update();
	// echo $db->last_query();
	echo json_encode(array('result'=>'true','message'=>'Password has been changed successfully!'));			
							
}
?>