<?php
session_start();
require_once($_SESSION['admin_doc_path']."includes/application_top.php");
require_once(FCPATH_ADMIN.'page/mod_user/user_detail.php');
	$id = isset($_REQUEST['id'])?$_REQUEST['id']:0;
	$db->table = 'tbl_album';
	if(isset($_POST['submit'])){
		foreach($_POST as $key=>$val){
			$$key = $val;
		}
		//For Photo Image
		$img  = '';
		if(isset($_FILES) and $_FILES['cover_image']['error']==0){
		 	 $img  =  $_FILES['cover_image']['name'];
			 $tmp_name  =  $_FILES['cover_image']['tmp_name'];
			 move_uploaded_file($tmp_name,FCPATH."uploads/images/album/".$img);
			  if(file_exists(FCPATH."uploads/images/album/".$hidden_image) and !empty($hidden_image)){
				 unlink(FCPATH."uploads/images/album/".$hidden_image); 
			  }
		}else{
		  echo $img = $hidden_image;	
		}
		
		  $db->data = array('artist_id'=>$artist_id,
		  					'album_name'=>$album_name,
							'cover_image'=>$img,	
							'version'=>$version,	
							'detail'=>$detail,					
							'status'=>$status
							);
	 
	
	 if(empty($hidden_id)){
	  $db->insert();
	 }else{
		  $db->cond  =  array('id'=>$hidden_id);
		  $db->update(); 
	 }		 
			
}else{  $row  =  $funAlbumObj->album_detail($id);
        $hidden_image  =  $row->cover_image;
		if(file_exists(FCPATH."uploads/images/album/".$hidden_image) and !empty($hidden_image)){
				 unlink(FCPATH."uploads/images/album/".$hidden_image); 
			  }
	    $db->cond  =  array('id'=>$id);
		$db->delete(); 
}
redirect('../../index.php?m=album&p=list');
?>	 