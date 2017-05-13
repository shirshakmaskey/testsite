<?php
class Events extends Functions
{
		
/********************** Events Start **************************/
	  function dataListType()
	{  $sql =  "SELECT * FROM ".TABLE_EVENT_TYPE." ORDER BY id ASC";
	   return $this->execute($sql);		 
	}
	 	 	
	public function find_by_id_type($id)
	{
		$sql = "SELECT * FROM `".TABLE_EVENT_TYPE."` where `id`='$id'";
		if($this->select($sql,false))
		        {
						return $this->rs;
						unset($this->rs);
				}
		      else
				{
					return false;
				}
	 }
	 
	public function file_type()
	 {
$sql = "SELECT * FROM `".TABLE_EVENT_TYPE."` where status='1'  order by id desc";
		return  $this->exec($sql); 
		 
	 }

	 function categoryList()
	{   return $this->get(TABLE_EVENT_TYPE,'','');		 
	}
	 

	 function dataList()
	{  $sql =  "SELECT tfd.*,tfdt.title as category_name FROM ".TABLE_EVENTS." tfd INNER JOIN  ".TABLE_EVENT_TYPE." tfdt ON tfd.category_id=tfdt.id  ORDER BY tfd.id ASC";
	   return $this->execute($sql);		 
	}
	 
	 	 	
	public function find_by_id($id)
	{
		$sql = "SELECT * FROM `".TABLE_EVENTS."` where `id`='$id'";
		if($this->select($sql,false))
		        {
						return $this->rs;
						unset($this->rs);
				}
		      else
				{
					return false;
				}
	 } 

	 function find_item_by_id($id)
	{
		 $query  =  "SELECT * from `".TABLE_ITEM_DOWNLOAD."` WHERE id='$id'";
		 $result = $this->execute($query);
		 return $this->result($result);
	}
	
	
	
	function file_items($events_id,$type='image')
	{
		 $query  =  "SELECT * from `".TABLE_ITEM_DOWNLOAD."` WHERE events_id='$events_id' and type='$type'";
		 return $this->execute($query);
	}

	 function table_fields_type($table=TABLE_EVENTS)
	 {
		 $sql = "SHOW COLUMNS FROM  `".$table."`"; 
		 return $this->exec($sql);
	 }

	  function table_fields($table=TABLE_EVENTS)
	 {
		 $sql = "SHOW COLUMNS FROM  `".$table."`"; 
		 return $this->exec($sql);
	 }
	
	 
/********************** Events End **************************/
}
?>