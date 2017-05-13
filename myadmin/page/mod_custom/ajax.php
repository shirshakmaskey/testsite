<?php
session_start();
include_once("../../includes/application_top.php");
$mode  =  $_POST['mode'];
if($mode=='change_status'){
	 $id  =  $_POST['id'];
     $row  =  $funCustomObj->find_item_by_id($id);	
	 $status  =  ($row->status==0)?"1":"0";
	 $db->update(TABLE_CUSTOM_BLOCKS,array('status'=>$status),array('id'=>$id));
	 echo ($status==0)?"Un-published":"Published";
}
else if($mode=='delete_image'){
	 $id  =  $_POST['id'];
     $row  =  $funCustomObj->find_item_by_id($id);	
	 $val  =  $row->name;	 
	 if(file_exists(FCPATH."uploads/images/testimonials/$val") and !empty($val)){
			unlink(FCPATH."uploads/images/testimonials/".$val); 
		 } 	 
	 $db->delete(TABLE_TESTIMONIALS,array('id'=>$id));
	 echo json_encode(array("msg"=>"Image has been deleted"));
}
?>