<?php
session_start();
include_once("../../includes/application_top.php");
$mode  =  $_POST['mode'];
if($mode=='change_status'){
	 $id  =  $_POST['id'];
     $row  =  $funMenuObj->find_by_id($id);	
	 $status  =  ($row->status==0)?"1":"0";
	 $db->update('tbl_menu',array('status'=>$status),array('id'=>$id));
	 echo ($status==0)?"Un-published":"Published";
}
if($mode=='list_article'){
	 $id  =  $_POST['id'];
	 $funMenuObj->getPagesList($id);	 
 }

if($mode=='list_menus'){
	  $menu_type_id  =  $_POST['id'];
      $funMenuObj->getMenuListInDropDown ($menu_type_id);	 
}
?>