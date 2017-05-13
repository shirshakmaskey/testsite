<?php
class Events extends Functions{
    	
	function dataList()
	{   $sql =  "SELECT * FROM ".TABLE_EVENTS." where status='1' ORDER BY id ASC";
		 return $this->execute($sql);		 
	}
	
	
	function find_by_id($id)
	{
		 $query  =  "SELECT * from ".TABLE_EVENTS." WHERE id='$id'";
		 $result = $this->execute($query);
		 return $this->result($result);
	}
	
	
	public function latestList($limit)
	 {   return $this->get(TABLE_EVENTS,'',array('status'=>1),array('id'=>'desc'),$limit);		 
	 }

	function specialEvents($limit=5)
		{
			$sql=  "SELECT * FROM ".TABLE_EVENTS." 
			        WHERE status='1'  AND special='1'
			        ORDER BY id DESC 
			        LIMIT 0, $limit";
			return  $this->query($sql);
		}
	
	function find_item_by_id($id)
	{
		 $query  =  "SELECT * from `".TABLE_EVENTS."` WHERE id='$id'";
		 $result = $this->execute($query);
		 return $this->result($result);
	}
	
	function find_by_slug($slug)
	{
		 $query  =  "SELECT * from `".TABLE_EVENTS."` WHERE slug='$slug' and status='1'";
		 $result = $this->execute($query);
		 return $this->result($result);
	}
	
	
	function file_items($events_id,$type='image',$order_by='asc',$limit=10)
	{
		 $query  =  "SELECT * from `".TABLE_ITEM_DOWNLOAD."` WHERE events_id='$events_id' and type='$type' order by id {$order_by}  limit 0,$limit";
		 $result =  $this->execute($query);
		 if($limit==1){ 
			return $this->result($result);
		 }else{ 
			return $result; 
		 }
	}
	
	
	
	
	public function rowsListPage($cat='',$limit=10000,$searchText='')
	{ 	$add_query  = ""; 	    
		if(!empty($searchText)){  	 
		$add_query .= " AND  (   tn.title    like '%$searchText%' 
		                     ||  tn.short_description    like '%$searchText%'
							 )";
							   }
		if($cat!=''){
            if(is_numeric($cat))
            {
                $add_query  .= " AND tn.category_id='$cat'";
            }else{
                $add_query  .= " AND tnt.slug='$cat'";
            }
        }
		
		$sql = "SELECT `tn`.*,`tnt`.`title` as category,`tnt`.`slug` as cat_slug FROM `".TABLE_EVENTS."` as tn INNER JOIN ".TABLE_EVENTS_TYPE." as tnt ON `tn`.`category_id`=`tnt`.`id` WHERE 1=1 AND `tn`.`status`='1'  {$add_query} order by `tn`.`id` desc";
		$url  = "news";
        if(!empty($cat)){$url  = "events/cat/".$cat;}
        $vals = $this->listings($sql,base_url($url),$limit,1);
		return $vals;
	}



     

	public function category($limit=1000)
	 {
		 $sql = "SELECT * FROM `".TABLE_EVENTS_TYPE."` where status='1'  order by id desc limit 0 ,$limit";
		return  $this->exec($sql); 
		 
	 }

	 public function count_item_in_cat($category_id='0')
	 {
		 $sql = "SELECT * FROM `".TABLE_EVENTS."` where status='1' AND category_id='$category_id'";
		return  $this->exec($sql); 
		 
	 }
	 	
}