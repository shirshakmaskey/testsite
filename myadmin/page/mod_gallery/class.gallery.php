<?php
	class Gallery extends Functions
	{
		function gallery_detail($id=0)
		{
			$sql = "SELECT * FROM `tbl_gallery` WHERE id = '$id'";
			$result = $this->execute($sql);
			return $this->result($result);	
		}
		
		function galleryAll($artist_id)
		{
			$sql = "SELECT * FROM `tbl_gallery` where artist_id='$artist_id'";
			return $this->execute($sql);
		}

		function table_fields($table = 'tbl_gallery')
		{
			$sql = "SHOW COLUMNS FROM `".$table."`";
			return $this->execute($sql);	
		}
	}
?>