<?php
class links extends Functions
{
		
/************************************ Link Start *************************************/
	
	
	public function linkList($module,$contentPage,$sortField,$sortBy,$searchText="")
	{ 	 $add_query=""; 	 		 	
		if(!empty($searchText)){  	 
		 $add_query  .=     " WHERE 1=1   
		                          and  ( link_title    like '%$searchText%' 
		                          ||  link_desc    like '%$searchText%'
								  ||  link_url    like '%$searchText%'
								  ||  added_date   like '%$searchText%'
								  ||  status   like '%$searchText%'
								   )";
		}
		$sql = "SELECT * FROM `".TABLE_LINKS."` ".$add_query." order by {$sortField} {$sortBy}";
		$vals = $this->listings($sql, "index.php?_page=$contentPage&mod=$module", 20, 0,false); 
		return $vals;
	}
	 	 	
	public function linkSel($id)
	{
		$sql = "SELECT * FROM `".TABLE_LINKS."` where `id`='$id'";
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
	
	 
		/************************************ Link end *************************************/

}
?>