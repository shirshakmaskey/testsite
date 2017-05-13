<?php
class Setting extends Functions{		
	
	function find_by_id($id)
	{
		 $query  =  "SELECT * from `".TABLE_SEO."` WHERE id='$id'";
		 $result = $this->execute($query);
		 return $this->result($result);
	}
}