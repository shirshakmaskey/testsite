<?php
class Artist extends Functions
{
    function artist_detail($id = 0)
	{
		$sql = "SELECT * FROM `tbl_artist` WHERE id = '$id'";
		$result = $this->execute($sql);
		return $this->result($result);	
	}
	
	function artistAll()
	{
		$sql = "SELECT * FROM `tbl_artist`";
		return $this->execute($sql);	
	}

	function activeArtistAll()
	{
		$sql = "SELECT * FROM `tbl_artist` WHERE status='1'";
		return $this->execute($sql);	
	}
	
	function table_fields($table = 'tbl_artist')
	{
		$sql = "SHOW COLUMNS FROM `".$table."`";
		return $this->execute($sql);	
	}
}