<?php
session_start();
include_once("../../includes/application_top.php");
$mode  =  isset($_REQUEST['mode'])?$_REQUEST['mode']:0;
switch($mode){
   	case 'change_status':
	$id   = $_REQUEST['id'];
	$row  =  $funVideosObj->videos_detail($id);
	$status  =  ($row->status==1)?0:1;
	$db->update('tbl_videos',array('status'=>$status),array('id'=>$id));
	$stat =  ($status==1)?"Published":"Un-Published";
	$title = ($status==1)?"Click to make inactive":"Click to make active";
	echo json_encode(array('result'=>'true','status'=>$stat,'title'=>$title));
	break;
	case 'featured':
	$id   = $_REQUEST['id'];
	$row  =  $funVideosObj->videos_detail($id);
	$featured  =  ($row->featured==1)?0:1;
	$db->update('tbl_videos',array('featured'=>$featured),array('id'=>$id));
	$stat =  ($featured==1)?"Yes":"No";
	$title = ($featured==1)?"Click to make un-featured":"Click to make featured";
	echo json_encode(array('result'=>'true','status'=>$stat,'title'=>$title));
	break;
	case 'show_in_home':
	$id   = $_REQUEST['id'];
	$row  =  $funVideosObj->videos_detail($id);
	$show_in_home  =  ($row->show_in_home==1)?0:1;
	$db->update('tbl_videos',array('show_in_home'=>$show_in_home),array('id'=>$id));
	$stat =  ($show_in_home==1)?"Yes":"No";
	$title = ($show_in_home==1)?"Click to make Un-Published":"Click to make Published";
	echo json_encode(array('result'=>'true','status'=>$stat,'title'=>$title));
	break;
	default:
	break;
}
?>