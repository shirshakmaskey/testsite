<?php
class Custom extends Database{
		
	function dataList()
	{   $sql =  "SELECT *FROM `".TABLE_CUSTOM_BLOCKS."` ORDER BY id ASC";
		 return $this->execute($sql);		 
	}
	
	function find_item_by_id($id)
	{
		 $query  =  "SELECT * from `".TABLE_CUSTOM_BLOCKS."` WHERE id='$id'";
		 $result = $this->execute($query);
		 return $this->result($result);
	}
	
	function find_by_id($id)
	{
		 $query  =  "SELECT * from `".TABLE_CUSTOM_BLOCKS."` WHERE id='$id'";
		 $result = $this->execute($query);
		 return $this->result($result);
	}
	
	function find_maximum($field="sortorder"){
		$result = $this->execute("SELECT MAX({$field}) AS maximum FROM ".TABLE_CUSTOM_BLOCKS);
		$return = $this->fetch_array($result);
		return ($return) ? ($return['maximum']+1) : 1 ;
	}
	
	function table_fields($table=TABLE_CUSTOM_BLOCKS)
	 {
		 $sql = "SHOW COLUMNS FROM  `".$table."`"; 
		 return $this->exec($sql);
	 }

}
?>