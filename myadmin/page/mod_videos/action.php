<?php
session_start();
include_once("../../includes/application_top.php");
 
	$id = isset($_REQUEST['aid'])?decode($_REQUEST['aid']):0;

	$db->table = 'tbl_videos';
	if(isset($_POST['submit'])){
		foreach($_POST as $key=>$val){
			$$key = $val;
		}

	  $hidden_id      =  decode($hidden_id);
      $hidden_id      =  !empty($hidden_id)?$hidden_id:0;
			
			$db->data = array('title' => $title,
							  'url' => $url,
							  'featured' => isset($featured) ? $featured : 0,
							  'show_in_home' => isset($show_in_home) ? $show_in_home : 0,
							  'status'=>$status
			                   );
			
			if(empty($hidden_id)){
			  $db->data['created_on']  =  date('Y-m-d H:i:s');
			  $db->data['created_by']  =   $_SESSION['admin_login_id'];
			  $db->insert();
			 }else{
				  $db->data['modified_on']  =  date('Y-m-d H:i:s');
				  $db->data['modified_by']  =  $_SESSION['admin_login_id'];
				  $db->cond  =  array('id'=>$hidden_id);
				  $db->update(); 
			 }		 
					
}else{  
        //now delete artist
	    $row  =  $funVideosObj->videos_detail($id);
		$db->table = 'tbl_videos';	  
		$db->cond  =  array('id'=>$id);
		$db->delete(); 
}
$funObj->url_back  = $sitePathB."lists-videos";
redirect($funObj->url_back);
?>	 