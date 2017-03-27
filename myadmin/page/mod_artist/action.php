<?php
session_start();
include_once("../../includes/application_top.php");
 
	$id = isset($_REQUEST['aid'])?decode($_REQUEST['aid']):0;

	$db->table = 'tbl_artist';
	if(isset($_POST['submit'])){
		foreach($_POST as $key=>$val){
			$$key = $val;
		}

        foreach($_POST as $key=>$val)
        {  
        	if($key == 'biography') $$key= check($val,1);
	        else $$key= @check($val); 
	    }

			$img = '';
			if(isset($_FILES) and $_FILES['profile_image']['error']==0){
				$img = 	$_FILES['profile_image']['name'];
				$tmp_name = $_FILES['profile_image']['tmp_name'];
						 
                $img = round(microtime(true)) . '.' . $img;
				move_uploaded_file($tmp_name,FCPATH."uploads/images/artist/".$img);
				if(file_exists(FCPATH."uploads/images/artist/".$hidden_image) and !empty($hidden_image)){
					unlink(FCPATH."uploads/images/artist/".$hidden_image);	
				}
			}else{
				echo $img = $hidden_image;	
			}

			

	  $hidden_id      =  decode($hidden_id);
      $hidden_id      =  !empty($hidden_id)?$hidden_id:0;
			if(!empty($artist_name)) $slug  = create_slug($artist_name); else $slug='';
			$db->data = array('artist_name' => $artist_name,
				              'slug'=>$slug,
							  'address' => $address,
							  'country' => $country,
							  'profile_image' => $img,							 
							  'contact_no' => $contact_no,
							  'email' => $email,
							  'gender' => $gender,
							  'biography' => $biography,
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
					
}else{  //first delete the album and gallery
        $result  =  $funAlbumObj->AlbumAll($id); 
        if($db->num_rows($result)>0){
		    while($row  =  $db->result($result)){
//first delete album cover		    	
$hidden_image  =  $row->cover_image;
if(file_exists(FCPATH."uploads/images/album/".$hidden_image) and !empty($hidden_image)){
unlink(FCPATH."uploads/images/album/".$hidden_image);}
$album_id  =  $row->id;
//now delete songs of that album
$result  =  $funSVLObj->songsAllAlbum($album_id);
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

//delete songs videos of that album
$db->table = 'tbl_songs_videos';
$db->cond  =  array('album_id'=>$album_id);
$db->delete();
		}}
//delete artist from album
$db->table = 'tbl_album';	  
$db->cond  =  array('artist_id'=>$id);
$db->delete();


$result  =  $funGalleryObj->galleryAll($id); 
if($db->num_rows($result)>0){
    while($row  =  $db->result($result)){
	$hidden_image  =  $row->cover_image;
	if(file_exists(FCPATH."uploads/images/gallery/".$hidden_image) and !empty($hidden_image)){ unlink(FCPATH."uploads/images/gallery/".$hidden_image);}
$gallery_id   =  $row->id;	
//now delete photos of that gallery
$result  =  $funPhotoObj->photoAll($gallery_id);
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

}}
//now delete gallery of that artist
$db->table = 'tbl_gallery';	  
$db->cond  =  array('artist_id'=>$id);
$db->delete();

        //now delete artist
	    $row  =  $funArtistObj->artist_detail($id);
		$hidden_image  =  $row->profile_image;
		if(file_exists(FCPATH."uploads/images/artist/".$hidden_image) and !empty($hidden_image)){
				 unlink(FCPATH."uploads/images/artist/".$hidden_image); 
			  }
		$db->table = 'tbl_artist';	  
		$db->cond  =  array('id'=>$id);
		$db->delete(); 
}
$funObj->url_back  = $sitePathB."lists-artist";
redirect($funObj->url_back);
?>	 