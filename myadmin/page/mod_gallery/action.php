<?php
session_start();
include_once("../../includes/application_top.php");
 
	$id = isset($_REQUEST['aid'])?decode($_REQUEST['aid']):0;
	$db->table = 'tbl_gallery';
	if(isset($_POST['submit'])){
		foreach($_POST as $key=>$val){
			$$key = $val;
		}
		//For gallary Image
		$img  = '';
		if(isset($_FILES) and $_FILES['cover_image']['error']==0){
		 	 $img  =  $_FILES['cover_image']['name'];
			 $tmp_name  =  $_FILES['cover_image']['tmp_name'];
			 move_uploaded_file($tmp_name,FCPATH."uploads/images/gallery/".$img);
			  if(file_exists(FCPATH."uploads/images/gallery/".$hidden_image) and !empty($hidden_image)){
				 unlink(FCPATH."uploads/images/gallery/".$hidden_image); 
			  }
		}else{
		  echo $img = $hidden_image;	
		}

		$artist_id      =  decode($artist_id);
        $artist_id      =  !empty($artist_id)?$artist_id:0;
        $hidden_id      =  decode($hidden_id);
        $hidden_id      =  !empty($hidden_id)?$hidden_id:0;
		
		  $db->data = array('artist_id'=>$artist_id,
		  					'gallery_name'=>$gallery_name,
							'cover_image'=>$img,	
							'description'=>$description,						
							'status'=>$status
							);
	 
	
	 if(empty($hidden_id)){
	  $db->insert();
	 }else{
		  $db->cond  =  array('id'=>$hidden_id);
		  $db->update(); 
	 }		 
			
}else{  //first delete the photos of that images 
        $result  =  $funPhotoObj->photoAll($id);
        if($db->num_rows($result)>0){
					   while($row  =  $db->result($result)){
					   	$img = @$row->image;
			 if(file_exists(FCPATH."uploads/images/photo/".$img) and !empty($img)){
			 	unlink(FCPATH."uploads/images/photo/".$img); 
			 }			 
		}}
		$db->table = 'tbl_photo';
	    $db->cond  =  array('gallery_id'=>$id);
        $db->delete();
        //now delete the gallery 
	    $row  =  $funGalleryObj->gallery_detail($id);
        $artist_id   =   $row->artist_id;
        $hidden_image  =  $row->cover_image;
		if(file_exists(FCPATH."uploads/images/gallery/".$hidden_image) and !empty($hidden_image)){
				 unlink(FCPATH."uploads/images/gallery/".$hidden_image); 
			  }
		$db->table = 'tbl_gallery';	  
	    $db->cond  =  array('id'=>$id);
		$db->delete(); 
}
$funObj->url_back  = $sitePathB."lists-gallery-".encode($artist_id);
redirect($funObj->url_back);
?>	 