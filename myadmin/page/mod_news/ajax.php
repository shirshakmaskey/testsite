<?php
session_start();
include_once("../../includes/application_top.php");
$mode  =  $_POST['mode'];
if($mode=='change_status'){
	 $id  =  $_POST['id'];
     $row  =  $funNewsObj->find_by_id($id);	
	 $status  =  ($row->status==0)?"1":"0";
	 $db->update(TABLE_NEWS,array('status'=>$status),array('id'=>$id));
	 echo ($status==0)?"Inactive":"Active";
}
else if($mode=='save_image_file'){
	 $id  =  $_POST['id'];
	 $item_title  =  check($_POST['item_title']);
	 $db->update(TABLE_ITEM_DOWNLOAD,array('item_title'=>$item_title),array('id'=>$id));
	 echo json_encode(array("msg"=>"Title has been changed"));
}
else if($mode=='delete_image'){
	 $id  =  $_POST['id'];
     $row  =  $funNewsObj->find_item_by_id($id);	
	 $val  =  $row->item_name;	 
	 if(file_exists(FCPATH."uploads/images/news/".$val) and !empty($val)){
			unlink(FCPATH."uploads/images/news/".$val); 
		 } 	 
	 $db->delete(TABLE_ITEM_DOWNLOAD,array('id'=>$id));
	 echo json_encode(array("msg"=>"Image has been deleted"));
}
else if($mode=='delete_file'){
	 $id  =  $_POST['id'];
     $row  =  $funNewsObj->find_item_by_id($id);	
	 $val  =  $row->item_name;	 
	 if(file_exists(FCPATH."uploads/files/news/".$val) and !empty($val)){
			unlink(FCPATH."uploads/files/news/".$val); 
		 } 	 
	 $db->delete(TABLE_ITEM_DOWNLOAD,array('id'=>$id));
	 echo json_encode(array("msg"=>"File has been deleted"));
}
else if($mode=='change_status_type'){
	 $id  =  $_POST['id'];
     $row  =  $funNewsObj->newsTypeSel($id);	
	 $status  =  ($row->status==0)?"1":"0";
	 $db->update(TABLE_NEWS_TYPE,array('status'=>$status),array('id'=>$id));
	 echo ($status==0)?"Inactive":"Active";
}
?>