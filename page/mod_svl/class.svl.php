<?php
	class SVL extends Functions
	{
		function latestSVL($limit=10)
		{
			$sql=  "SELECT * FROM tbl_songs_videos 
			        WHERE status='1' AND featured='1'
			        ORDER BY id DESC 
			        LIMIT 0, $limit";
			return  $this->query($sql);
		}
		function featuredSVL($limit=5)
		{
			$sql=  "SELECT * FROM tbl_songs_videos 
			        WHERE status='1'  AND featured='1'
			        ORDER BY id DESC 
			        LIMIT 0, $limit";
			return  $this->query($sql);
		}
		function showInHome($limit=5)
		{
			$sql=  "SELECT * FROM tbl_songs_videos 
			        WHERE status='1' AND show_in_home='1'
			        ORDER BY id DESC 
			        LIMIT 0, $limit";
			return  $this->query($sql);
		}

	function find_by_slug($slug)
	{
		 $query  =  "SELECT * from `tbl_songs_videos` WHERE token_keys='$slug' and status='1'";
		 $result = $this->execute($query);
		 return $this->result($result);
	}

	function find_by_id_songs($id)
	{
		 $query  =  "SELECT * from `tbl_songs_videos` WHERE id='$id'";
		 $result = $this->execute($query);
		 return $this->result($result);
	}

	function top_artist($limit=9)
	{   $query  =  "SELECT * from `tbl_artist` WHERE top_artist='1' and status='1' order by id desc limit 0,$limit";
		 return $this->execute($query);
	}

	function artist_by_slug($slug)
	{
		 $query  =  "SELECT * from `tbl_artist` WHERE slug='$slug' and status='1'";
		 $result = $this->execute($query);
		 return $this->result($result);
	}

	function album_by_slug($slug)
	{
		 $query  =  "SELECT * from `tbl_album` WHERE slug='$slug'";
		 $result = $this->execute($query);
		 return $this->result($result);
	}

	function artist_by_id($id)
	{
         $query  =  "SELECT * from `tbl_artist` WHERE id='$id'";
		 $result = $this->execute($query);
		 return $this->result($result);
	}

	function album_by_id($id)
	{
         $query  =  "SELECT * from `tbl_album` WHERE id='$id'";
		 $result = $this->execute($query);
		 return $this->result($result);
	}

	function gallery_by_artist_id($id)
	{
         $query  =  "SELECT * from `tbl_gallery` WHERE artist_id='$id'";
		 return $this->execute($query);
	}

	function photo_by_gallery_id($id)
	{
         $query  =  "SELECT * from `tbl_photo` WHERE gallery_id='$id'";
		 return $this->execute($query);
	}

	function featuredVideoSVL($artist_id=0,$limit=10)
	{   $add_query  =  "";
	    if(!empty($artist_id)){
	    	$add_query  .=  " AND artist_id='$artist_id' ";
	    }
		$sql=  "SELECT * FROM tbl_songs_videos 
		        WHERE status='1'  AND featured='1' AND video_file!='' {$add_query}
		        ORDER BY id DESC 
		        LIMIT 0, $limit";
		return  $this->query($sql);
	}

	function latestSVLItem($artist_id=0,$limit=10)
	{   $add_query  =  "";
	    if(!empty($artist_id)){
	    	$add_query  .=  " AND artist_id='$artist_id' ";
	    }
		$sql=  "SELECT * FROM tbl_songs_videos 
		        WHERE status='1' {$add_query}
		        ORDER BY id DESC 
		        LIMIT 0, $limit";
		return  $this->query($sql);
	}

	function latestSVLAlbum($artist_id=0,$limit=20)
	{   $add_query  =  "";
	    if(!empty($artist_id)){
	    	$add_query  .=  " AND artist_id='$artist_id' ";
	    }
		$sql=  "SELECT * FROM tbl_album 
		        WHERE status='1' {$add_query}
		        ORDER BY id DESC 
		        LIMIT 0, $limit";
		return  $this->query($sql);
	}

	function relatedSVLAlbum($artist_id=0,$limit=20)
	{   $add_query  =  "";
	    if(!empty($artist_id)){
	    	$add_query  .=  " AND artist_id!='$artist_id' ";
	    }
		$sql=  "SELECT * FROM tbl_album 
		        WHERE status='1' {$add_query}
		        ORDER BY id DESC 
		        LIMIT 0, $limit";
		return  $this->query($sql);
	}

	function hitRelatedSVLAlbum($artist_id=0,$limit=20)
	{   $add_query  =  "";
	    if(!empty($artist_id)){
	    	$add_query  .=  " AND artist_id!='$artist_id' ";
	    }
		$sql=  "SELECT * FROM tbl_album 
		        WHERE status='1' {$add_query} AND featured='1'
		        ORDER BY id DESC 
		        LIMIT 0, $limit";
		return  $this->query($sql);
	}

	function relatedlatestSVL($artist_id=0,$limit=20)
		{   $add_query  =  "";
		    if(!empty($artist_id)){
		    	$add_query  .=  " AND artist_id!='$artist_id' ";
		    }
			$sql=  "SELECT * FROM tbl_songs_videos 
			        WHERE status='1' AND featured='1' {$add_query}
			        ORDER BY id DESC 
			        LIMIT 0, $limit";
			return  $this->query($sql);
		}

		function featuredAlbumSongs($album_id,$limit=20)
		{
			$sql=  "SELECT * FROM tbl_songs_videos 
			        WHERE status='1' AND  album_id='$album_id'
			        ORDER BY id DESC 
			        LIMIT 0, $limit";
			return  $this->query($sql);
		}

		function albumSongs($album_id,$limit=50)
		{
			$sql=  "SELECT * FROM tbl_songs_videos 
			        WHERE status='1' AND album_id='$album_id'
			        ORDER BY id DESC 
			        LIMIT 0, $limit";
			return  $this->query($sql);
		}

	function addRemovePlaylist($user_id='0',$item_id='0',$action='add')
	{   if($action=='add'){
		     $item_exists  =  $this->check_items($user_id,$item_id);
            if($item_exists=='0'){
	              $frm   =  array('user_id'    => $user_id,
			                       'item_id'    => $item_id,
								   'date_added'   => date("Y-m-d")
								   );
				  $this->table  = 'tbl_playlist';
				  $this->data   = $frm;
				  $this->insert();
            }
		}
 
		else if($action=='remove'){
             	  $this->table  = 'tbl_playlist';				  
	              $this->cond   = array( 'user_id' => $user_id , 'item_id' => $item_id );
				  $this->delete();
		}
		else{} 
	}

	function check_items($user_id='0',$item_id='0')
	{
      $query  =  "SELECT count(*) as cnt from `tbl_playlist` WHERE user_id='$user_id' and item_id='$item_id'";
		  $result = $this->execute($query);
		  $row  = $this->result($result);
		  return $row->cnt;
	}

	function count_playlist_by_user($id)
	{
         $query  =  "SELECT count(*) as cnt from `tbl_playlist` WHERE user_id='$id'";
		 $result = $this->execute($query);
		 $row = $this->result($result);
		 return $row->cnt;
	}	
	function playlist_by_user($user_id)
	{
         $query  =  "SELECT p.id as playlist_id,p.date_added as playlist_date,p.user_id as puser_id,tsv.* from `tbl_playlist` p inner join tbl_songs_videos tsv ON tsv.id=p.item_id WHERE p.user_id='$user_id' ";
		 return  $this->query($query);
	}

	function exploreSongs($limit=80)
	{   $add_query  =  "";
		$sql=  "SELECT tsv.*,ta.artist_name,ta.profile_image ,ta.slug as artist_slug,tal.slug as album_slug
		        FROM tbl_songs_videos tsv 
		        INNER JOIN tbl_artist ta
		        /*ON tsv.artist_id=ta.id*/
		        INNER JOIN tbl_album tal
		        /*ON tsv.album_id=tal.id*/
		        WHERE tsv.status='1'  {$add_query}
		        ORDER BY id DESC 
		        LIMIT 0, $limit";
		return  $this->query($sql);
	}

}
?>