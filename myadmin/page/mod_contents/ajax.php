<?php
session_start();
include_once("../../includes/application_top.php");
$mode  =  $_POST['mode'];
if($mode=='change_status'){
	 $id  =  $_POST['id'];
     $row  =  $funContentsObj->find_by_id($id);	
	 $status  =  ($row->status==0)?"1":"0";
	 $db->update(TABLE_CONTENTS,array('status'=>$status),array('id'=>$id));
	 echo ($status==0)?"Inactive":"Active";
}
else if($mode=='show_in_home'){
	 $id  =  $_POST['id'];
     $row  =  $funContentsObj->find_by_id($id);	
	 $status  =  ($row->show_in_home_page==0)?"1":"0";
	 $db->update(TABLE_CONTENTS,array('show_in_home_page'=>$status),array('id'=>$id));
	 echo ($status==0)?"No":"Yes";
}
else if($mode=='feature'){
	 $id  =  $_POST['id'];
     $row  =  $funContentsObj->find_by_id($id);	
	 $status  =  ($row->feature==0)?"1":"0";
	 $db->update(TABLE_CONTENTS,array('feature'=>$status),array('id'=>$id));
	 echo ($status==0)?"No":"Yes";
}
else if($mode=='save_image_file'){
	 $id  =  $_POST['id'];
	 $item_title  =  check($_POST['item_title']);
	 $db->update(TABLE_ITEM_DOWNLOAD,array('item_title'=>$item_title,'item_desc'=>$item_title),array('id'=>$id));
	 echo json_encode(array("msg"=>"Title has been changed"));
}
else if($mode=='save_banner_image_file'){
	 $id  =  $_POST['id'];
	 $item_title  =  check($_POST['item_title']);
	 $db->update(TABLE_CONTENTS,array('banner_title'=>$item_title),array('id'=>$id));
	 echo json_encode(array("msg"=>"Title has been changed"));
}
else if($mode=='delete_banner_image'){
	 $id  =  $_POST['id'];
     $row  =  $funContentsObj->find_by_id($id);	
	 $val  =  $row->banner;	 
	 if(file_exists(FCPATH."uploads/images/contents/".$val) and !empty($val)){
			unlink(FCPATH."uploads/images/contents/".$val); 
		 } 	 
	 $db->update(TABLE_CONTENTS,array('banner'=>'','banner_title'=>''),array('id'=>$id));
	 echo json_encode(array("msg"=>"Image has been deleted"));
}
else if($mode=='delete_image'){
	 $id  =  $_POST['id'];
     $row  =  $funContentsObj->find_item_by_id($id);	
	 $val  =  $row->item_name;	 
	 if(file_exists(FCPATH."uploads/images/contents/".$val) and !empty($val)){
			unlink(FCPATH."uploads/images/contents/".$val); 
		 } 	 
	 $db->delete(TABLE_ITEM_DOWNLOAD,array('id'=>$id));
	 echo json_encode(array("msg"=>"Image has been deleted"));
}
else if($mode=='delete_file'){
	 $id  =  $_POST['id'];
     $row  =  $funContentsObj->find_item_by_id($id);	
	 $val  =  $row->item_name;	 
	 if(file_exists(FCPATH."uploads/files/contents/".$val) and !empty($val)){
			unlink(FCPATH."uploads/files/contents/".$val); 
		 } 	 
	 $db->delete(TABLE_ITEM_DOWNLOAD,array('id'=>$id));
	 echo json_encode(array("msg"=>"File has been deleted"));
}
?>