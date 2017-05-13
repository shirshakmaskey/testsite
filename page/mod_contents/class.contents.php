<?php
class Contents extends Functions{
		
	function get_home_contents($limit=1)
	{		 $query  =  "SELECT * from `".TABLE_CONTENTS."` WHERE status='1' and show_in_home_page='1' and post_type='page' order by id asc limit 0,$limit";
		 return $this->execute($query);
	}
	function get_home_feature_contents($limit=1)
	{
		 $query  =  "SELECT * from `".TABLE_CONTENTS."` WHERE status='1' and show_in_home_page='1' and feature='1' and post_type='post' order by id asc limit 0,$limit";
		 return $this->execute($query);
	}
	
	function find_by_id($id)
	{
		 $query  =  "SELECT * from `".TABLE_CONTENTS."` WHERE id='$id'";
		 $result = $this->execute($query);
		 return $this->result($result);
	}
	
	function find_item_by_id($id)
	{
		 $query  =  "SELECT * from `".TABLE_ITEM_DOWNLOAD."` WHERE id='$id'";
		 $result = $this->execute($query);
		 return $this->result($result);
	}
	
	
	function find_by_slug($slug)
	{
		 $query  =  "SELECT * from `".TABLE_CONTENTS."` WHERE slug='$slug' and status='1'";
		 $result = $this->execute($query);
		 return $this->result($result);
	}
    
	function find_contents_by_parent($post_parent){
		 $query  =  "SELECT * from `".TABLE_CONTENTS."` WHERE post_parent='$post_parent' and status='1'";
		 return $this->execute($query);
	}
	
	function find_by_static_slug($slug)
	{
		 $query  =  "SELECT * from tbl_static_link WHERE url_link='$slug'";
		 $result = $this->execute($query);
		 return $this->result($result);
	}
	
		
	function file_items($content_id,$type='image',$order_by='asc',$limit=10)
	{
		 $query  =  "SELECT * from `".TABLE_ITEM_DOWNLOAD."` WHERE content_id='$content_id' and type='$type' order by id {$order_by}  limit 0,$limit";
		 $result =  $this->execute($query);
		 if($limit==1){ 
			return $this->result($result);
		 }else{ 
			return $result; 
		 }
	}
	
	
	public function contentsList($category_id,$limit=1000,$type='post')
	 {
	    $sql = "SELECT * FROM `".TABLE_POST_CATEGORY_TAXONOMY."` as pct
		        JOIN `".TABLE_POST_CATEGORY."` tpc on tpc.id=pct.category_id
		        JOIN `".TABLE_CONTENTS."` p on p.id=pct.post_id
			    where  pct.category_id='$category_id' and tpc.type='$type' and p.status='1'
				and tpc.status='1'
				order by p.id asc
				limit 0,$limit";	
				return  $this->exec($sql); 		 
	 }
	
	function articleListByCat($cid,$limit=1000,$type='post')
	{   $sql = "SELECT  p.* FROM `".TABLE_POST_CATEGORY_TAXONOMY."` as pct
		        JOIN `".TABLE_POST_CATEGORY."` tpc on tpc.id=pct.category_id
		        JOIN `".TABLE_CONTENTS."` p on p.id=pct.post_id
			    where  pct.category_id='$cid' and tpc.type='$type' and p.status='1'
				and tpc.status='1'
				order by p.id asc
				limit 0,$limit";	
				return  $this->exec($sql); 	
		 return $this->execute($sql);		 
	}
	
	function articleListByCatSlug($slug,$limit=1000,$type='post',$sort_by='asc')
	{   $sql = "SELECT p.* FROM `".TABLE_POST_CATEGORY_TAXONOMY."` as pct
		        JOIN `".TABLE_POST_CATEGORY."` tpc on tpc.id=pct.category_id
		        JOIN `".TABLE_CONTENTS."` p on p.id=pct.post_id
			    where  tpc.slug='$slug' and tpc.type='$type' and p.status='1'
				and tpc.status='1'
				order by p.id {$sort_by}
				limit 0,$limit";	
				return  $this->exec($sql); 	
		 return $this->execute($sql);		 
	}
	
	function search($keyword)
	{   $query = '';
	    if($keyword!=''){
		$query  .=  " AND (article_title like '%$keyword%'
		               ||  description like '%$keyword%'
						   )";	
		}
		$sql =  "SELECT DISTINCT a.*,m.name,m.link_type,m.menu_link FROM 
	             ".TABLE_CONTENTS." a 
				 INNER JOIN tbl_menu m ON m.article_page=a.slug
				 WHERE a.status='1' 
				 AND m.status='1'
				 {$query}
				 ORDER BY a.article_title ASC";
		 return $this->execute($sql);		 
	}
}