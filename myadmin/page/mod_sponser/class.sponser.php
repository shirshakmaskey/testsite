<?php
class Sponser extends Database{
		
	function dataList()
	{   $sql =  "SELECT *FROM `".TABLE_SPONSER."` ORDER BY id ASC";
		 return $this->execute($sql);		 
	}
	
	function find_item_by_id($id)
	{
		 $query  =  "SELECT * from `".TABLE_SPONSER."` WHERE id='$id'";
		 $result = $this->execute($query);
		 return $this->result($result);
	}
	
	function find_by_id($id)
	{
		 $query  =  "SELECT * from `".TABLE_SPONSER."` WHERE id='$id'";
		 $result = $this->execute($query);
		 return $this->result($result);
	}
	
	function find_maximum($field="sortorder"){
		$result = $this->execute("SELECT MAX({$field}) AS maximum FROM ".TABLE_SPONSER);
		$return = $this->fetch_array($result);
		return ($return) ? ($return['maximum']+1) : 1 ;
	}
	
	function table_fields($table=TABLE_SPONSER)
	 {
		 $sql = "SHOW COLUMNS FROM  `".$table."`"; 
		 return $this->exec($sql);
	 }

}
?>