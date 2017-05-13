<?php
	class Photo extends Functions
	{
		function photo_detail($id=0)
		{
			$sql = "SELECT * FROM `tbl_photo` WHERE id = '$id'";
			$result = $this->execute($sql);
			return $this->result($result);	
		}
		
		function photoAll($gallery_id)
		{
			$sql = "SELECT * FROM `tbl_photo` where gallery_id='$gallery_id'";
			return $this->execute($sql);
		}
		
		function table_fields($table = 'tbl_photo')
		{
			$sql = "SHOW COLUMNS FROM `".$table."`";
			return $this->execute($sql);	
		}
	}
?>