<?php
session_start();
include_once("../../includes/application_top.php");
$mode  =  $_POST['mode'];
if($mode=='change_status'){
	 $id  =  $_POST['id'];
     $row  =  $objCat->find_by_id($id);	
	 $status  =  ($row->status==0)?"1":"0";
	 $db->update('tbl_category',array('status'=>$status),array('id'=>$id));
	 echo ($status==0)?"Inactive":"Active";
}
?>