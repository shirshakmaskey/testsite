<?php
class Cms extends Functions
{
	public function cmsPage($module,$contentPage,$sortField,$sortBy,$searchText="")
	{ 	 $add_query=""; 	 	 	 	
		if(!empty($searchText)){ 
		 $add_query  =  "WHERE 1=1 and  ( pagename   like '%$searchText%' 
		                          ||  pagetitle   like '%$searchText%'
								  ||  pagedescription   like '%$searchText%'
								  ||  metasubject   like '%$searchText%'
								  ||  metakeyword   like '%$searchText%'
								  ||  metadesc   like '%$searchText%'
								       )";
		}
		 $sql = "SELECT * FROM `".TABLE_STATIC."` ".$add_query." order by {$sortField} {$sortBy}";
		$vals = $this->listings($sql, "index.php?_page=$contentPage&mod=$module", 20, 0,false); 
		return $vals;
	}
	
	public function cmsPageSel($id)
	{
		$sql = "SELECT * FROM `".TABLE_STATIC."` where `id`='$id'";
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
	 
	 function cmspageList() 
		{
	$sql = "SELECT * FROM `".TABLE_STATIC."` order by id asc ";
			if($this->selectAll($sql,false))
				{
					  if(!empty($this->rsa))
					  { 	
							return $this->rsa;
							unset($this->rsa);
					  }
				}
				else
				{
					return false;
				}
		}
		
		// level of site
		 public function levelOfSiteList()
	 {
		 $sql = "SELECT * FROM `".TABLE_LEVEL."`  order by id desc";
		return  $this->exec($sql); 
		 
	 }
	 
	 public function levelOfSiteSel($id)
	{
		$sql = "SELECT * FROM `".TABLE_LEVEL."` where `id`='$id'";
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
		
		
		//feedback
		
		function feedPage($module,$contentPage,$sortField,$sortBy,$searchText="")
	{   $add_query=""; 	 	 	 	
		if(!empty($searchText)){ 
		 $add_query  =  "WHERE 1=1 and  ( name   like '%$searchText%' 
		                          ||  email   like '%$searchText%'
								  ||  subject   like '%$searchText%'
								  ||  message   like '%$searchText%'
								  ||  posted_date   like '%$searchText%'
								        )";
		}
		 $sql = "SELECT * FROM `".TABLE_FEEDBACK."`  ".$add_query." order by {$sortField} {$sortBy}";
		$vals = $this->listings($sql, "index.php?_page=$contentPage&mod=$module", 20, 0,false); 
		return $vals;
	}
	
	public function feedPageSel($id)
	{
		$sql = "SELECT * FROM `".TABLE_FEEDBACK."` where `id`='$id'";
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
		
	
	function replyFeedbackPage($module,$contentPage,$sortField,$sortBy,$searchText="")
	{   $add_query=""; 	 	 	 	
		if(!empty($searchText)){ 
		 $add_query  =  "WHERE 1=1 and  ( date   like '%$searchText%' 
		                          ||  replyname   like '%$searchText%'
								  ||  replyemail   like '%$searchText%'
								  ||  subject   like '%$searchText%'
								  ||  description   like '%$searchText%'
								        )";
		}
		 $sql = "SELECT * FROM `".TABLE_REPLIESFEED."`  ".$add_query." order by {$sortField} {$sortBy}";
		$vals = $this->listings($sql, "index.php?_page=$contentPage&mod=$module", 20, 0,false); 
		return $vals;
	}
	
	public function replyFeedBackPageSel($id)
	{
		$sql = "SELECT * FROM `".TABLE_REPLIESFEED."` where `id`='$id'";
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
	 
	 public function vacancyType($module,$contentPage,$sortField,$sortBy,$searchText="")
	{ 	 $add_query=""; 	 	 	 	
		if(!empty($searchText)){ 
		 $add_query  =  "WHERE 1=1 and  ( vacancy_type_name   like '%$searchText%' 
		                                ||  vacancy_type_description   like '%$searchText%'
								        )";
		}
		$sql = "SELECT * FROM `".TABLE_VACANCY_TYPE."` ".$add_query." order by  {$sortField} {$sortBy}";
		$vals = $this->listings($sql, "index.php?_page=$contentPage&mod=$module", 20, 0,false); 
		return $vals;
	}
	
	function vacancyTypeSel($id)
		{
			 $sql = "SELECT * FROM `".TABLE_VACANCY_TYPE."` where `id`='$id'";
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
		
	public function vacancy($module,$contentPage,$sortField,$sortBy,$searchText="")
	{ 	 $add_query=""; 	 	 	 	
		if(!empty($searchText)){ 
		 $add_query  =  "WHERE 1=1 and  ( vacancy_title    like '%$searchText%' 
		                                ||  vacancy_description    like '%$searchText%'
										 ||  started_date    like '%$searchText%'
										  ||  expire_date    like '%$searchText%'
										   ||  vacancy_number     like '%$searchText%'
								        )";
		}
		
		$sql = "SELECT * FROM `".TABLE_VACANCY."` ".$add_query." order by {$sortField} {$sortBy}";
		$vals = $this->listings($sql, "index.php?_page=$contentPage&mod=$module", 20, 0,false); 
		return $vals;
	}
	
	function vacancySel($id)
		{
			 $sql = "SELECT * FROM `".TABLE_VACANCY."` where `id`='$id'";
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
		
		
		function selectAllVacancyType()
		{
			  $sql = "SELECT * FROM `".TABLE_VACANCY_TYPE."` order by id desc";
			  return $this->exec($sql);
		}
	
	function makeInActive($status,$id)
	{  $this->table = TABLE_VACANCY;
	   $this->data = array("status"=>$status);
	   $this->cond = array("id"=>$id);
	   $this->update();		
	}
	
	
	/*function deleteChildTableRow($parentTableId,$fieldName,$tableName)
	{
	   	 $sql = "DELETE  FROM `".$tableName."` where $fieldName='$parentTableId'";
	     return $this->exec($sql);
	}*/
	 
	 
    public function vacancyApplies($module,$contentPage,$sortField,$sortBy,$searchText="")
	{ 	 $add_query=""; 	 	 	 	
		if(!empty($searchText)){ 
		 $add_query  =  "WHERE 1=1 and  ( fullname    like '%$searchText%' 
		                                ||  email    like '%$searchText%'
										||  mobile    like '%$searchText%'
										||  phone    like '%$searchText%'
										||  added_date    like '%$searchText%'
										||  address    like '%$searchText%'
										||  gender    like '%$searchText%'
								        )";
		}
		
		$sql = "SELECT * FROM `".TABLE_VACANCY_APPLIES."` ".$add_query." order by {$sortField} {$sortBy}";
		$vals = $this->listings($sql, "index.php?_page=$contentPage&mod=$module", 20, 0,false); 
		return $vals;
	}
	
	function vacancyAppliesSel($id)
		{
			 $sql = "SELECT * FROM `".TABLE_VACANCY_APPLIES."` where `id`='$id'";
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

}
?>