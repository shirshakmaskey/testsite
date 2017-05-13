<?php
session_start();
include_once("../../includes/application_top.php"); 
	$id = isset($_REQUEST['aid'])?decode($_REQUEST['aid']):0;
	$db->table = 'tbl_songs_videos'; 
	if(isset($_POST['submit'])){
		foreach($_POST as $key=>$val){
			$$key = $val;
		}
		//For Songs File
		$songs_file  = '';
		if(isset($_FILES) and $_FILES['songs_file']['error']==0){
		 	 $songs_file  =  $_FILES['songs_file']['name'];
			 $tmp_name  =  $_FILES['songs_file']['tmp_name'];			 
             $songs_file = round(microtime(true)) . '.' . $songs_file;
			 move_uploaded_file($tmp_name,FCPATH."uploads/songs/".$songs_file);
			  if(file_exists(FCPATH."uploads/songs/".$hidden_songs) and !empty($hidden_songs)){
				 unlink(FCPATH."uploads/songs/".$hidden_songs); 
			  }
		}else{
		  $songs_file = $hidden_songs;	
		}
		//For Lyrics File
		$lyrics_file  = '';
		if(isset($_FILES) and $_FILES['lyrics_file']['error']==0){
		 	 $lyrics_file  =  $_FILES['lyrics_file']['name'];
			 $tmp_name  =  $_FILES['lyrics_file']['tmp_name'];
			 $lyrics_file = round(microtime(true)) . '.' . $lyrics_file;
			 move_uploaded_file($tmp_name,FCPATH."uploads/lyrics/".$lyrics_file);
			  if(file_exists(FCPATH."uploads/lyrics/".$hidden_lyrics) and !empty($hidden_lyrics)){
				 unlink(FCPATH."uploads/lyrics/".$hidden_lyrics); 
			  }
		}else{
		  $lyrics_file = $hidden_lyrics;	
		}
 
         
		$artist_id      =  decode($artist_id);
        $artist_id      =  !empty($artist_id)?$artist_id:0;
        $hidden_id      =  decode($hidden_id);
        $hidden_id      =  !empty($hidden_id)?$hidden_id:0;

		  $token_keys    =  $db->randomKeys(7);
		  $db->data = array('artist_id'=>$artist_id,
		  					'album_id'=>$album_id,
							'title'=>$title,
							'songs_file'=>$songs_file,
							'video_file'=>$video_file,	
							'lyrics_file'=>$lyrics_file,	
							'detail'=>$detail,
							'genre'=>$genre,
							'featured' => isset($featured) ? $featured : 0,
							'show_in_home' => isset($show_in_home) ? $show_in_home : 0,			
							'status'=>$status
							);
	 
	 if(empty($hidden_id)){ 
	 	  $db->data['token_keys'] =  $token_keys;
	      $db->insert();
	 }else{
		  $db->cond  =  array('id'=>$hidden_id);
		  $db->update(); 
	 }		 
			
}else{  $row  =  $funSVLObj->svl_detail($id);
        $hidden_songs  =  $row->songs_file;
		$hidden_lyrics  =  $row->lyrics_file;
		if(file_exists(FCPATH."uploads/songs/".$hidden_songs) and !empty($hidden_image)){
				 unlink(FCPATH."uploads/songs/".$hidden_songs); 
			  }
	    if(file_exists(FCPATH."uploads/songs/".$hidden_lyrics) and !empty($hidden_lyrics)){
				 unlink(FCPATH."uploads/songs/".$hidden_lyrics); 
			  }		  
	    $db->cond  =  array('id'=>$id);
		$db->delete(); 
}
$funObj->url_back  = $sitePathB."lists-svl-".encode($artist_id);
redirect($funObj->url_back);
?>	 