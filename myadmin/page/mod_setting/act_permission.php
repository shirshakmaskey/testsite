<?php
session_start();
if(!isset($_SESSION['mytoken'])){ header("Location:../../login.php"); }
include_once("../../includes/application_top.php");
$funObj->table=TABLE_PERMISSION;

if( isset( $_POST['savePer'] ) )
{  include("../mod_setAndCheckAll/checkToken.php");
   $groupId  =  isset($_POST['groupId'])?$_POST['groupId']:"";
   $userId  =  isset($_POST['userId'])?$_POST['userId']:"";
   

   if(!empty($groupId))
   {
    $newArr =  array_merge($_POST['selectedParent'.$groupId],$_POST['selected'.$groupId]);
	 $type = "group"; 
	 //now first reset the value if exist
	 $funObj->data = 	array("status"=>"0");
	 $funObj->cond =    array("group_id"=>$groupId);
	 $funObj->update();
	 //again set the new value for the moudles checked

     foreach($newArr as $key=>$val)
	 {  $value  =  explode("/",$val);
		$id  = $funObj->checkPermissionRowSel($type,$groupId,$value[0]); 
		$funObj->table=TABLE_PERMISSION;
		$funObj->data = 	array("type"=>$type,
		                          "group_id"=>$groupId,
		                          "module_id"=>$value[0],
								  "status"=>$value[1]
								  );
		if(!empty($id))
		{ $funObj->cond  = array("id"=>$id);
		  $funObj->update();
		}else{
		  $funObj->insert();
		}
	 }
   }
   
    if(!empty($userId))
   {
    $newArr =  array_merge($_POST['selectedParentUser'],$_POST['selectedUser']);
	 $type = "user"; 
	 //now first reset the value if exist
	 $funObj->data = 	array("status"=>"0");
	 $funObj->cond =    array("user_id"=>$userId);
	 $funObj->update();
	 //again set the new value for the moudles checked

     foreach($newArr as $key=>$val)
	 {  $value  =  explode("/",$val);
		$id  = $funObj->checkPermissionRowSel($type,$userId,$value[0]); 
		//echo $id; die();
		$funObj->table=TABLE_PERMISSION;
		$funObj->data = 	array("type"=>$type,
		                          "user_id"=>$userId,
		                          "module_id"=>$value[0],
								  "status"=>$value[1]
								  );
		if(!empty($id))
		{ $funObj->cond  = array("id"=>$id);
		  $funObj->update();
		}else{
		  $funObj->insert();
		}
	 }
   }
  
}
if(!empty($userId)){
$row  =  $funUserObj->userSel($userId);
$gid  = $row->group_type;	
$funObj->url_back  = $_SERVER['HTTP_REFERER']."&firstId=$userId&option=$gid&mode=user";
}else{
$funObj->url_back  = $_SERVER['HTTP_REFERER'];	
}
$funObj->redirect($funObj->url_back);
?>