<?php
	class SVL extends Functions
	{   function find_by_id_songs($id)
		{
			 $query  =  "SELECT * from `tbl_songs_videos` WHERE id='$id'";
			 $result = $this->execute($query);
			 return $this->result($result);
		}
		
		function svl_detail($id=0)
		{
			$sql = "SELECT * FROM `tbl_songs_videos` WHERE id = '$id'";
			$result = $this->execute($sql);
			return $this->result($result);	
		}
		
		function svlAll($artist_id)
		{
			$sql = "SELECT * FROM `tbl_songs_videos` where artist_id='$artist_id' ORDER BY id DESC";
			return $this->execute($sql);
		}

		function svlDataList()
		{
			$sql = "SELECT * FROM `tbl_songs_videos` ORDER BY id DESC";
			return $this->execute($sql);
		}

		function songsAllAlbum($album_id)
		{
			$sql = "SELECT * FROM `tbl_songs_videos` where album_id='$album_id'";
			return $this->execute($sql);
		}
		
		function table_fields($table = 'tbl_songs_videos')
		{
			$sql = "SHOW COLUMNS FROM `".$table."`";
			return $this->execute($sql);	
		}
	}
?>