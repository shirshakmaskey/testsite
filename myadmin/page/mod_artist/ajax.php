<?php
session_start();
include_once("../../includes/application_top.php");
$mode  =  isset($_REQUEST['mode'])?$_REQUEST['mode']:0;
switch($mode){
   	case 'change_status':
	$id   = $_REQUEST['id'];
	$row  =  $funArtistObj->artist_detail($id);
	$status  =  ($row->status==1)?0:1;
	$db->update('tbl_artist',array('status'=>$status),array('id'=>$id));
	$stat =  ($status==1)?"Published":"Un-Published";
	$title = ($status==1)?"Click to make inactive":"Click to make active";
	echo json_encode(array('result'=>'true','status'=>$stat,'title'=>$title));
	break;
	case 'top_artist':
	$id   = $_REQUEST['id'];
	$row  =  $funArtistObj->artist_detail($id);
	$top_artist  =  ($row->top_artist==1)?0:1;
	$db->update('tbl_artist',array('top_artist'=>$top_artist),array('id'=>$id));
	$stat =  ($top_artist==1)?"Yes":"No";
	$title = ($top_artist==1)?"Click to not to make top artist":"Click to make top artist";
	echo json_encode(array('result'=>'true','status'=>$stat,'title'=>$title));
	break;
	default:
	break;
}
?>