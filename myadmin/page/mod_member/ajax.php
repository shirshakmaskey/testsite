<?php
session_start();
include_once("../../includes/application_top.php");
$mode  =  $_REQUEST['mode'];
if($mode=='change_status'){
	 $id  =  $_POST['id'];
     $row  =  $funMemberObj->customerSel($id);	
	 $status  =  ($row->status==0)?"1":"0";
	 $db->update('tbl_customer',array('status'=>$status),array('id'=>$id));
	 echo ($status==0)?"Inactive":"Active";
}

if($mode=='makeFeature'){
	 $id  =  $_POST['id'];
     $row  =  $funMemberObj->customerSel($id);	
	 $award_winner  =  ($row->award_winner==0)?"1":"0";
	 $db->update('tbl_customer',array('award_winner'=>$award_winner),array('id'=>$id));
	 echo ($award_winner==0)?"No":"Yes";
}

if($mode=='makeVerified'){
	 $id  =  $_POST['id'];
     $row  =  $funMemberObj->customerSel($id);	
	 $approve  =  ($row->approve==0)?"1":"0";
	 $db->update('tbl_customer',array('approve'=>$approve),array('id'=>$id));
	 echo ($approve==0)?"Not Approved":"Approved";
}
else if($mode=='delete_image'){
	 $id  =  $_POST['id'];
     $row  =  $funMemberObj->find_item_by_id($id);	
	 $val  =  $row->item_file;	
	 $user_id  =  $row->user_id; 
	 if(file_exists(FCPATH."uploads/images/member/$user_id") and !empty($val)){
		    unlink(FCPATH."uploads/images/member/".$user_id); 
		} 	 
	 $db->update('tbl_user_items',array('item_file'=>''),array('id'=>$id));
	 echo json_encode(array("msg"=>"Image has been deleted."));
}

?>