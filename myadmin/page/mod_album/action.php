<?php
session_start();
include_once("../../includes/application_top.php");
 
	$id = isset($_REQUEST['aid'])?decode($_REQUEST['aid']):0;
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
			 		 
             $img = round(microtime(true)) . '.' . $img;
			 move_uploaded_file($tmp_name,FCPATH."uploads/images/album/".$img);
			  if(file_exists(FCPATH."uploads/images/album/".$hidden_image) and !empty($hidden_image)){
				 unlink(FCPATH."uploads/images/album/".$hidden_image); 
			  }
		}else{
		  echo $img = $hidden_image;	
		}  

		$artist_id      =  decode($artist_id);
        $artist_id      =  !empty($artist_id)?$artist_id:0;
        $hidden_id      =  decode($hidden_id);
        $hidden_id      =  !empty($hidden_id)?$hidden_id:0;
		  
		  if(!empty($album_name)) $slug  = create_slug($album_name); else $slug='';
		  $db->data = array('artist_id'=>$artist_id,
		  	                'slug'=>$slug,
		  					'album_name'=>$album_name,
							'cover_image'=>$img,	
							'version'=>$version,	
							'detail'=>$detail,
							'genre'=>$genre,
							'featured' => isset($featured) ? $featured : 0,					
							'status'=>$status
							);
	 
	
	 if(empty($hidden_id)){
	  $db->insert();
	 }else{
		  $db->cond  =  array('id'=>$hidden_id);
		  $db->update(); 
	 }		 
			
}else{  //first delete the songs of that album 
        $result  =  $funSVLObj->songsAllAlbum($id);
        if($db->num_rows($result)>0){
					   while($row  =  $db->result($result)){
			$hidden_songs  =  $row->songs_file;
			$hidden_lyrics  =  $row->lyrics_file;
		if(file_exists(FCPATH."uploads/songs/".$hidden_songs) and !empty($hidden_image)){
					 unlink(FCPATH."uploads/songs/".$hidden_songs); 
				  }
		if(file_exists(FCPATH."uploads/songs/".$hidden_lyrics) and !empty($hidden_lyrics)){
					 unlink(FCPATH."uploads/songs/".$hidden_lyrics); 
				  }				 
		}}
		$db->table = 'tbl_songs_videos';
	    $db->cond  =  array('album_id'=>$id);
        $db->delete();

        //delete the album
	    $row  =  $funAlbumObj->album_detail($id);
        $artist_id     =  $row->artist_id;
        $hidden_image  =  $row->cover_image;
		if(file_exists(FCPATH."uploads/images/album/".$hidden_image) and !empty($hidden_image)){
				 unlink(FCPATH."uploads/images/album/".$hidden_image); 
			  }
		$db->table = 'tbl_album';	  
	    $db->cond  =  array('id'=>$id);
		$db->delete(); 
}
$funObj->url_back  = $sitePathB."lists-album-".encode($artist_id);
redirect($funObj->url_back);
?>	 