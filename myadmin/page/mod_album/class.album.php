<?php
	class Album extends Functions
	{
		function album_detail($id=0)
		{
			$sql = "SELECT * FROM `tbl_album` WHERE id = '$id'";
			$result = $this->execute($sql);
			return $this->result($result);	
		}
		
		function albumAll($artist_id)
		{
			$sql = "SELECT * FROM `tbl_album`  where artist_id='$artist_id'";
			return $this->execute($sql);
		}

		function activeAlbumList($artist_id)
		{
			$sql = "SELECT * FROM `tbl_album`  where artist_id='$artist_id' and status='1'";
			return $this->execute($sql);
		}

		function table_fields($table = 'tbl_album')
		{
			$sql = "SHOW COLUMNS FROM `".$table."`";
			return $this->execute($sql);	
		}
	}
?>