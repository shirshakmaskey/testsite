<?php
class News extends Functions
{
		
/************************************ News and Event Start *************************************/
	  public function newsTypeList($module,$contentPage,$sortField,$sortBy,$searchText="")
	{ 	 $add_query=""; 	 		 	
		if(!empty($searchText)){  	 
		 $add_query  .=     " WHERE 1=1   
		                          and  ( news_type_name    like '%$searchText%' 
		                          ||  news_type_desc    like '%$searchText%'
								  ||  added_date   like '%$searchText%'
								       )";
		}
		$sql = "SELECT * FROM `".TABLE_NEWS_TYPE."` ".$add_query." order by {$sortField} {$sortBy}";
		$vals = $this->listings($sql, "index.php?_page=$contentPage&mod=$module", 20, 0,false); 
		return $vals;
	}
	 	 	
	public function newsTypeSel($id)
	{
		$sql = "SELECT * FROM `".TABLE_NEWS_TYPE."` where `id`='$id'";
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
	 
	public function newsTypeLists()
	 {
		 $sql = "SELECT * FROM `".TABLE_NEWS_TYPE."`  order by id desc";
		return  $this->exec($sql); 
		 
	 }
	 
	 
	 function categoryList()
	{   return $this->get(TABLE_NEWS_TYPE,'','');		 
	}
	 
		
	public function newsList($module,$contentPage,$sortField,$sortBy,$searchText="")
	{ 	 $add_query=""; 	 	 	 	
		if(!empty($searchText)){  	 
		 $add_query  .=     " WHERE 1=1   
		                          and  ( title    like '%$searchText%' 
		                          ||  description    like '%$searchText%'
								  ||  author    like '%$searchText%'
								  ||  added_date   like '%$searchText%'
								       )";
		}
		 $sql = "SELECT * FROM `".TABLE_NEWS."` ".$add_query." order by {$sortField} {$sortBy}";
		$vals = $this->listings($sql, "index.php?_page=$contentPage&mod=$module", 100000, 0,false); 
		return $vals;
	}
	 	 	
	public function newsSel($id)
	{
		$sql = "SELECT * FROM `".TABLE_NEWS."` where `id`='$id'";
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
	 
	 public function newsListActive()
	 {
		 $sql = "SELECT * FROM `".TABLE_NEWS."` where status='1'  order by id desc";
		return  $this->exec($sql); 
		 
	 }
	 
	 function find_by_id($id)
	{
		 $query  =  "SELECT * from `".TABLE_NEWS."` WHERE id='$id'";
		 $result = $this->execute($query);
		 return $this->result($result);
	}
	
	function find_item_by_id($id)
	{
		 $query  =  "SELECT * from `".TABLE_ITEM_DOWNLOAD."` WHERE id='$id'";
		 $result = $this->execute($query);
		 return $this->result($result);
	}
	
	
	
	function file_items($news_id,$type='image')
	{
		 $query  =  "SELECT * from `".TABLE_ITEM_DOWNLOAD."` WHERE news_id='$news_id' and type='$type'";
		 return $this->execute($query);
	}
	
	function table_fields($table='tbl_news')
	 {
		 $sql = "SHOW COLUMNS FROM  `".$table."`"; 
		 return $this->exec($sql);
	 }
	 
/************************************ News and Event end *************************************/
}
?>