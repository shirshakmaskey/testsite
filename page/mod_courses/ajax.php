<?php
session_start();
include_once("../../includes/application_top.php");
$mode  =  $_REQUEST['mode'];
if($mode=='save_course_form'){
	 foreach($_POST as $key=>$val){$$key=$val;}
	 if(!empty($company_name)) $slug  = create_slug($company_name); else $slug='';
	 $data  =  array('course_name'=>$course_name,'org_id'=>$org_id,'slug'=>$slug,'status'=>$status);	
	 if($hidden_id>0) $data['modified_at']  =  fulldate();
	 else $data['created_at']  =  fulldate();
	 $id     =  $funCouresObj->save($data,$hidden_id);
	 if($id) echo json_encode(array("result"=>"true","msg"=>"Course has been saved!"));
      else echo json_encode(array("result"=>"false","msg"=>"Cannot saved at this time, Please try again."));
}
else if($mode=='course_by_id'){
	foreach($_POST as $key=>$val){$$key=$val;}
	$row    =  $funCouresObj->find_by_id($id);
	  if($id) echo json_encode(array("result"=>"true","row_content"=>$row));
      else echo json_encode(array("result"=>"false","row_content"=>""));
}
else if($mode=='change_status'){
	foreach($_POST as $key=>$val){$$key=$val;}
	  $row    =  $funCouresObj->find_by_id($id);
      $status =  ($row->status==1)?0:1;
      $cond   =  array('id'=>$id);
      $data   =  array('status'=>$status);
      $db->update(constant('TABLE_TRAINING_COURSES'),$data,$cond);
      $content  =  ($status==1)?"Active":"Inactive";
	  echo json_encode(array('result'=>'true','message'=>'Status has been changed','content_text'=>$content));
}
else if($mode=='delete_course'){
	foreach($_POST as $key=>$val){$$key=$val;}	  
      $cond   =  array('id'=>$id);
      $db->delete(constant('TABLE_TRAINING_COURSES'),$cond);
	  echo json_encode(array('result'=>'true','message'=>'Course has been deleted successfully!'));
}
else{}
?>