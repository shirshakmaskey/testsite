<?php
class Sponser extends Database{
		
		
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
	
	function find_by_block_name($block_name)
	{
		 $query  =  "SELECT * from `".TABLE_SPONSER."` WHERE block_name='$block_name' and status='1'";
		 return $this->execute($query);
	}
	
	
	function find_by_slug($slug)
	{
		 $query  =  "SELECT * from `".TABLE_SPONSER."` WHERE slug='$slug' and status='1'";
		 $result = $this->execute($query);
		 return $this->result($result);
	}
	
	function custom_list($position='left',$order_by='asc',$limit=10)
	{
		$query  =  "SELECT * from `".TABLE_SPONSER."` WHERE position='$position' and status='1' order by sortorder {$order_by}  limit 0,$limit";
		 $result =  $this->execute($query);
		 return $result; 
	}
}