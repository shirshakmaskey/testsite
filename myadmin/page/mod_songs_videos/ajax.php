<?php
session_start();
require_once($_SESSION['admin_doc_path']."includes/application_top.php");
require_once(FCPATH_ADMIN.'page/mod_user/user_detail.php');
$mode  =  isset($_REQUEST['mode'])?$_REQUEST['mode']:0;
switch($mode){
   	case 'change_status':
	$id   = $_REQUEST['id'];
	$row  =  $funUserObj->user_detail($id);
	$status  =  ($row->status==1)?0:1;
	$db->update('tbl_user',array('status'=>$status),array('id'=>$id));
	$stat =  ($status==1)?"Active":"Inactive";
	$title = ($status==1)?"Click to make inactive":"Click to make active";
	echo json_encode(array('result'=>'true','status'=>$stat,'title'=>$title));
	break;
	default:
	break;
}
?>