<?php
session_start();
include_once("../../includes/application_top.php");
$mode  =  isset($_REQUEST['mode'])?$_REQUEST['mode']:0;
switch($mode){
   	case 'change_status':
	$id   = $_REQUEST['id'];
	$row  =  $funGalleryObj->gallery_detail($id);
	$status  =  ($row->status==1)?0:1;
	$db->update('tbl_gallery',array('status'=>$status),array('id'=>$id));
	$stat =  ($status==1)?"Active":"Inactive";
	$title = ($status==1)?"Click to make inactive":"Click to make active";
	echo json_encode(array('result'=>'true','status'=>$stat,'title'=>$title));
	break;
	default:
	break;
}
?>