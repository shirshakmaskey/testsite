<?php
session_start();
include_once("../../includes/application_top.php");
$mode  =  $_POST['mode'];
if($mode=='change_status'){
	 $id  =  $_POST['id'];
     $row  =  $funItemsObj->find_by_id($id);	
	 $status  =  ($row->status==0)?"1":"0";
	 $db->update(TABLE_ITEMS,array('status'=>$status),array('id'=>$id));
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
     $row  =  $funItemsObj->find_item_by_id($id);	
	 $val  =  $row->item_name;	 
	 if(file_exists(FCPATH."uploads/images/items/".$val) and !empty($val)){
			unlink(FCPATH."uploads/images/items/".$val); 
		 } 	 
	 $db->delete(TABLE_ITEM_DOWNLOAD,array('id'=>$id));
	 echo json_encode(array("msg"=>"Image has been deleted"));
}
else if($mode=='delete_file'){
	 $id  =  $_POST['id'];
     $row  =  $funItemsObj->find_item_by_id($id);	
	 $val  =  $row->item_name;	 
	 if(file_exists(FCPATH."uploads/files/items/".$val) and !empty($val)){
			unlink(FCPATH."uploads/files/items/".$val); 
		 } 	 
	 $db->delete(TABLE_ITEM_DOWNLOAD,array('id'=>$id));
	 echo json_encode(array("msg"=>"File has been deleted"));
}

else if($mode=='change_status_cat'){
	 $id  =  $_POST['id'];
	 $status  =  $_POST['vals'];
	 $funObj->update(TABLE_CATEGORY_ITEMS,array('status'=>$status),array('id'=>$id));
}


else if($mode=='delete_image_cat'){
	 $id  =  $_POST['id'];
     $row  =  $funCrlObj->catSel($id);	
	 $val  =  $row->image;	 
	 if(file_exists(FCPATH."uploads/images/items/".$val) and !empty($val)){
			unlink(FCPATH."uploads/images/items/".$val); 
		 } 	 
	 $db->update(TABLE_CATEGORY_ITEMS,array("image"=>""),array('id'=>$id));
	 echo json_encode(array("msg"=>"Image has been deleted"));
}
else if($mode=='showInHomepage'){
	 $id  =  $_POST['id'];
     $row  =  $funItemsObj->find_by_id($id);	
	 $status  =  ($row->show_in_home_page==0)?"1":"0";
	 $db->update(TABLE_ITEMS,array('show_in_home_page'=>$status),array('id'=>$id));
	 echo ($status==0)?"No":"Yes";
}
else if($mode=='todaySpecial'){
	 $id  =  $_POST['id'];
     $row  =  $funItemsObj->find_by_id($id);	
	 $status  =  ($row->todays_special==0)?"1":"0";
	 $db->update(TABLE_ITEMS,array('todays_special'=>$status),array('id'=>$id));
	 echo ($status==0)?"No":"Yes";
}
else if($mode=='specialBlock'){
	 $id  =  $_POST['id'];
     $row  =  $funItemsObj->find_by_id($id);	
	 $status  =  ($row->special_block==0)?"1":"0";
	 $db->update(TABLE_ITEMS,array('special_block'=>$status),array('id'=>$id));
	 echo ($status==0)?"No":"Yes";
}

?>