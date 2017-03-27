<?php
class Videos extends Functions
{
    function videos_detail($id = 0)
	{
		$sql = "SELECT * FROM `tbl_videos` WHERE id = '$id'";
		$result = $this->execute($sql);
		return $this->result($result);	
	}
	
	function videosAll()
	{
		$sql = "SELECT * FROM `tbl_videos`";
		return $this->execute($sql);	
	}
	
	function table_fields($table = 'tbl_videos')
	{
		$sql = "SHOW COLUMNS FROM `".$table."`";
		return $this->execute($sql);	
	}
}