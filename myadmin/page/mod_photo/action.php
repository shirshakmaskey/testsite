<?php
session_start();
include_once("../../includes/application_top.php");
 
	$id = isset($_REQUEST['aid'])?decode($_REQUEST['aid']):0;
	$db->table = 'tbl_photo';
	if(isset($_POST['submit'])){
		foreach($_POST as $key=>$val){
			$$key = $val;
		}
		//For Photo Image
		$img  = '';
		if(isset($_FILES) and $_FILES['image']['error']==0){
		 	 $img  =  $_FILES['image']['name'];
			 $tmp_name  =  $_FILES['image']['tmp_name'];
			 move_uploaded_file($tmp_name,FCPATH."uploads/images/photo/".$img);
			  if(file_exists(FCPATH."uploads/images/photo/".$hidden_image) and !empty($hidden_image)){
				 unlink(FCPATH."uploads/images/photo/".$hidden_image); 
			  }
		}else{
		  echo $img = $hidden_image;	
		}

		$gallery_id      =  decode($gallery_id);
        $gallery_id      =  !empty($gallery_id)?$gallery_id:0;
        $hidden_id      =  decode($hidden_id);
        $hidden_id      =  !empty($hidden_id)?$hidden_id:0;
		  $db->data = array('gallery_id'=>$gallery_id,
		  					'photo_title'=>$photo_title,
							'image'=>$img,	
							'detail'=>$detail,						
							'status'=>$status
							);
	 
	
	 if(empty($hidden_id)){
	  $db->insert();
	 }else{
		  $db->cond  =  array('id'=>$hidden_id);
		  $db->update(); 
	 }		 
			
}else{  
	    $row  =  $funPhotoObj->photo_detail($id);
	    $gallery_id = $row->gallery_id;
        $hidden_image  =  $row->image;
		if(file_exists(FCPATH."uploads/images/photo/".$hidden_image) and !empty($hidden_image)){
				 unlink(FCPATH."uploads/images/photo/".$hidden_image); 
			  }
	    $db->cond  =  array('id'=>$id);
		$db->delete(); 
}

$funObj->url_back  = $sitePathB."lists-photo-".encode($gallery_id);
redirect($funObj->url_back);
?>	  