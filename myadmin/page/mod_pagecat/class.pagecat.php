<?php 
class Pagecat extends Functions{
    	
	function dataList()
	{   $sql =  "SELECT * FROM ".TABLE_POST_CATEGORY." ORDER BY id ASC";
		 return $this->execute($sql);		 
	}
	
	
	function find_by_id($id)
	{
		$query  =  "SELECT * from ".TABLE_POST_CATEGORY." WHERE id='$id'";
		 $result = $this->execute($query);
		 return $this->result($result);
	}
	
	function categoryList($type='')
	{   return $this->get(TABLE_POST_CATEGORY,'',array('status'=>1,'type'=>$type));		 
	}
	
	function getDistinctType()
	{
	  $query = "SELECT distinct type from tbl_post_category order by id asc";
	  return $this->execute($query);	
	}
	
	function table_fields($table='tbl_post_category')
	 {
		 $sql = "SHOW COLUMNS FROM  `".$table."`"; 
		 return $this->exec($sql);
	 }
}
?>