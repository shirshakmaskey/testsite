<?php
class Gallery extends Functions{
    	
	function dataList()
	{   $sql =  "SELECT * FROM ".TABLE_GALLERY." where status='1' ORDER BY id ASC";
		 return $this->execute($sql);		 
	}
	
	
	function find_by_id($id)
	{
		 $query  =  "SELECT * from ".TABLE_GALLERY." WHERE id='$id'";
		 $result = $this->execute($query);
		 return $this->result($result);
	}
	
	
	public function latestItemsList($limit)
	 {   return $this->get(TABLE_GALLERY,'',array('status'=>1),array('id'=>'desc'),$limit);		 
	 }
	
	function find_item_by_id($id)
	{
		 $query  =  "SELECT * from `".TABLE_GALLERY."` WHERE id='$id'";
		 $result = $this->execute($query);
		 return $this->result($result);
	}
	
	function find_by_slug($slug)
	{
		 $query  =  "SELECT * from `".TABLE_GALLERY."` WHERE slug='$slug' and status='1'";
		 $result = $this->execute($query);
		 return $this->result($result);
	}
	
	
	function file_items($gallery_id,$order_by='asc',$limit=10)
	{
		  if($limit==1){ 
		    $query  =  "SELECT * from `".TABLE_PHOTOS."` WHERE  gallery_id='$gallery_id' order by id {$order_by}  limit 0,$limit";
		    $result =  $this->execute($query);
			return $this->result($result);
		 }else{ 
		    $query  =  "SELECT * from `".TABLE_PHOTOS."` WHERE  gallery_id='$gallery_id' order by id {$order_by}";
		    $row = $this->find_by_id($gallery_id);
			$slug  = $row->artist_id;
		    return $this->listings($query, "gallery-".$slug, $limit, 1,false);
		 }
	}	
	
	public function rowsListPage($searchText="")
	{ 	$add_query  = " WHERE 1=1 AND status='1' "; 	    
		if(!empty($searchText)){  	 
		$add_query .= " AND  (   gallery_name    like '%$searchText%' 
		                     ||  description    like '%$searchText%'
							 )";
							   }
		
		$sql  = "SELECT * FROM `".TABLE_GALLERY."` ".$add_query." order by id asc";
		$vals = $this->listings($sql, "gallery", 12, 1,false); 
		return $vals;
	}	
}