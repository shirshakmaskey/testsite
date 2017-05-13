<?php
session_start();
include_once("../../includes/application_top.php");
$mode  =  isset($_REQUEST['mode'])?$_REQUEST['mode']:0;
switch($mode){
   	case 'change_status':
	$id   = $_REQUEST['id'];
	$row  =  $funAlbumObj->album_detail($id);
	$status  =  ($row->status==1)?0:1;
	$db->update('tbl_user',array('status'=>$status),array('id'=>$id));
	$stat =  ($status==1)?"Active":"Inactive";
	$title = ($status==1)?"Click to make inactive":"Click to make active";
	echo json_encode(array('result'=>'true','status'=>$stat,'title'=>$title));
	break;
	case 'featured':
	$id   = $_REQUEST['id'];
	$row  =  $funAlbumObj->album_detail($id);
	$featured  =  ($row->featured==1)?0:1;
	$db->update('tbl_songs_videos',array('featured'=>$featured),array('id'=>$id));
	$stat =  ($featured==1)?"Yes":"No";
	$title = ($featured==1)?"Click to make un-featured":"Click to make featured";
	echo json_encode(array('result'=>'true','status'=>$stat,'title'=>$title));
	break;
	default:
	break;
}
?>