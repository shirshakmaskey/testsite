<?php
class MenuSetting extends Functions{
		
	function dataList()
	{   $sql =  "SELECT * FROM 
	             ".TABLE_MENU_SETTING."
				 ORDER BY id ASC";
		 return $this->execute($sql);		 
	}
	
	function find_by_id($id)
	{
		 $query  =  "SELECT * from ".TABLE_MENU_SETTING." WHERE id='$id'";
		 $result = $this->execute($query);
		 return $this->result($result);
	}
	
	function table_fields($table=TABLE_MENU_SETTING)
	 {
		 $sql = "SHOW COLUMNS FROM  `".$table."`"; 
		 return $this->exec($sql);
	 }
}
?>