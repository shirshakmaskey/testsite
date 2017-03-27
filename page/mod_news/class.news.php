<?php
class News extends Functions{
    	
	function dataList()
	{   $sql =  "SELECT * FROM ".TABLE_NEWS." where status='1' ORDER BY id ASC";
		 return $this->execute($sql);		 
	}
	
	
	function find_by_id($id)
	{
		 $query  =  "SELECT * from ".TABLE_NEWS." WHERE id='$id'";
		 $result = $this->execute($query);
		 return $this->result($result);
	}
	
	
	public function latestNewsList($limit)
	 {   return $this->get(TABLE_NEWS,'',array('status'=>1),array('id'=>'desc'),$limit);		 
	 }
	
	function find_item_by_id($id)
	{
		 $query  =  "SELECT * from `".TABLE_NEWS."` WHERE id='$id'";
		 $result = $this->execute($query);
		 return $this->result($result);
	}
	
	function find_by_slug($slug)
	{
		 $query  =  "SELECT * from `".TABLE_NEWS."` WHERE slug='$slug' and status='1'";
		 $result = $this->execute($query);
		 return $this->result($result);
	}
	
	
	function file_items($news_id,$type='image',$order_by='asc',$limit=10)
	{
		 $query  =  "SELECT * from `".TABLE_ITEM_DOWNLOAD."` WHERE news_id='$news_id' and type='$type' order by id {$order_by}  limit 0,$limit";
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
		
		$sql = "SELECT `tn`.*,`tnt`.`title` as category,`tnt`.`slug` as cat_slug FROM `".TABLE_NEWS."` as tn INNER JOIN ".TABLE_NEWS_TYPE." as tnt ON `tn`.`category_id`=`tnt`.`id` WHERE 1=1 AND `tn`.`status`='1'  {$add_query} order by `tn`.`id` desc";
		$url  = "news";
        if(!empty($cat)){$url  = "news/cat/".$cat;}
        $vals = $this->listings($sql,base_url($url),$limit,1);
		return $vals;
	}



     

	public function category($limit=1000)
	 {
		 $sql = "SELECT * FROM `".TABLE_NEWS_TYPE."` where status='1'  order by id desc limit 0 ,$limit";
		return  $this->exec($sql); 
		 
	 }

	 public function count_item_in_cat($category_id='0')
	 {
		 $sql = "SELECT * FROM `".TABLE_NEWS."` where status='1' AND category_id='$category_id'";
		return  $this->exec($sql); 
		 
	 }
	 	
}