<?php
class Setting extends Functions
{
	// functions starts
	public function configurationPage($module,$contentPage,$sortField,$sortBy='asc',$searchText="")
	{ 	 $add_query=""; 	 	 	 	
		if(!empty($searchText)){ 
	  $searchText  =  $this->check($searchText);$add_query  =  "WHERE 1=1 and  ( configname   like '%$searchText%' 
		                          ||  configdesc   like '%$searchText%'
								  ||  configvalue   like '%$searchText%'
								         )";
		}
		$sql = "SELECT * FROM `".TABLE_CONFIGURATION."` ".$add_query." order by {$sortField} {$sortBy}";
		$vals = $this->listings($sql, "index.php?_page=$contentPage&mod=$module", 20, 0,false); 
		return $vals;
	}
	
	public function configurationPageSel($id)
	{
		$sql = "SELECT * FROM `".TABLE_CONFIGURATION."` where `id`='$id'";
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
	 
	 public function dublicateConfig($configname)
	 {
	 $sql = "SELECT * FROM `".TABLE_CONFIGURATION."` where `configname`='$configname'";
		$result  =   $this->exec($sql);
		return   $this->total_rows($result);
		 
	 }
	 
	public function seoPage($module,$contentPage,$sortField,$sortBy,$searchText="")
	{ 	 $add_query=""; 	 	 	 	
		if(!empty($searchText)){ 
	  $searchText  =  $this->check($searchText);$add_query  =  "WHERE 1=1 and  ( metasubject   like '%$searchText%' 
		                          ||  metakeyword   like '%$searchText%'
								  ||  metadesc   like '%$searchText%'
								  ||  metaabstract   like '%$searchText%'
								  ||  metakeyphrase   like '%$searchText%'
								  ||  metaclassification   like '%$searchText%'
								  ||  copyright   like '%$searchText%'
								  ||  metacatagory   like '%$searchText%'
								  ||  reply_to   like '%$searchText%'
								  ||  author   like '%$searchText%'
								         )";
		}
		$sql = "SELECT * FROM `".TABLE_SEO."` ".$add_query." order by {$sortField} {$sortBy}";
		$vals = $this->listings($sql, "index.php?_page=$contentPage&mod=$module", 20, 0,false); 
		return $vals;
	}
	
	public function seoPageSel($id)
	{
		$sql = "SELECT * FROM `".TABLE_SEO."` where `id`='$id'";
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
	 
	 
	 public function emailTempSetting($module,$contentPage,$sortField,$sortBy='asc',$searchText="")
	{ 	 $add_query=""; 	 	 	 	
		if(!empty($searchText)){ 
	  $searchText  =  $this->check($searchText);$add_query  =  "WHERE 1=1 and  ( email_title   like '%$searchText%' 
		                                ||  description    like '%$searchText%'
								         )";
		}
		$sql = "SELECT * FROM `".TABLE_EMAIL_TEMPLETE_SETTING."` ".$add_query." order by {$sortField} {$sortBy}";
		$vals = $this->listings($sql, "index.php?_page=$contentPage&mod=$module", 20, 0,false); 
		return $vals;
	}
	
	public function emailTempSettingSel($id)
	{
		$sql = "SELECT * FROM `".TABLE_EMAIL_TEMPLETE_SETTING."` where `id`='$id'";
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
	 
	 public function getEmailTemp($id)
	{
		$sql = "SELECT * FROM `".TABLE_EMAIL_TEMPLETE_SETTING."` where `id`='$id' and status='1' and verify='1'";
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

    public function dublicateEmailTemp($email_title)
	 {
	 $sql = "SELECT * FROM `".TABLE_EMAIL_TEMPLETE_SETTING."` where `email_title`='$email_title'";
		$result  =   $this->exec($sql);
		return   $this->total_rows($result);
		 
	 }
	 
	 
	 public function getLastId()
	{   $sql = "SELECT id FROM `".TABLE_MODULES."`order by id desc limit 0,1";
		$vals = $this->exec($sql); 
		$row  =  $this->fetch_object($vals);
		return $row->id;
	}
	 public function moduleForPermissionList($module,$contentPage)
	{   $sql = "SELECT * FROM `".TABLE_MODULES."` where pid='0'";
		$vals = $this->listings($sql,"index.php?_page=$contentPage&mod=$module"); 
		return $vals;
	}
	
	public function moduleForPermissionSel($pid)
	{
		 $sql = "SELECT * FROM `".TABLE_MODULES."` where pid='$pid'";
		 return  $this->exec($sql);
	 }
	 
	  public function permissionSelection($module_id, $level_id)
	{    $sql = "SELECT * FROM `".TABLE_PERMISSION."` WHERE module_id='$module_id' and level_id='$level_id'";
		$vals = $this->exec($sql); 
		return  $this->fetch_object($vals);
		
	}
	
	 public function permissionSel($id)
	{    $sql = "SELECT * FROM `".TABLE_PERMISSION."` WHERE id='$id'";
		$vals = $this->exec($sql); 
		return  $this->fetch_object($vals);
		
	}
	
	
	public function web_templatePage($module,$contentPage,$sortField,$sortBy='asc',$searchText="")
	{ 	 $add_query=""; 	 	 	 	
		if(!empty($searchText)){ 
	  $searchText  =  $this->check($searchText);$add_query  =  "WHERE 1=1 and  (	                                      parameter   like '%$searchText%'
								  ||  content   like '%$searchText%'
								         )";
		}
		$sql = "SELECT * FROM `".TABLE_DESIGN."` ".$add_query." order by parameter asc";
		$vals = $this->listings($sql, "index.php?_page=$contentPage&mod=$module", 20, 0,false); 
		return $vals;
	}
	
	public function web_templateSel($id)
	{
		$sql = "SELECT * FROM `".TABLE_DESIGN."` where `id`='$id'";
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
	
	public function web_temp_parameter($fieldName)
	{
		$sql = "SELECT * FROM `".TABLE_DESIGN."` where parameter='$fieldName' and verify='1' and status='1'";
		return $this->exec($sql);
	 }
	
	 
	 //userGroup start
	 function userGroupPage($module,$contentPage,$limit,$sortField,$sortBy,$searchText="")
	{ 	$add_query=" WHERE 1=1"; 	 	 	 	
		if(!empty($searchText)){ 
	    $searchText  =  $this->check($searchText);
	    $add_query  .=  " and  (  code   like '%$searchText%' 
							  ||  description   like '%$searchText%'
							  ||  type   like '%$searchText%'			  
							   )";
		}
		 $sql = "SELECT * FROM `".TABLE_GROUP_TYPE."` ".$add_query." order by {$sortField} {$sortBy}"; 
		$vals = $this->listings($sql, "index.php?_page=$contentPage&mod=$module", $limit, 0,false); 
		return $vals;
	}
	
	public function userGroupSettingSel($id)
	{
		$sql = "SELECT * FROM `".TABLE_GROUP_TYPE."` where `id`='$id'";
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
	 
	 public function userGroupType($id)
	{
		$sql = "SELECT * FROM `".TABLE_GROUP_TYPE."` WHERE id='$id'"; 
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
	 
	 public function userGroupTypeList($type)
	{
		$sql = "SELECT * FROM `".TABLE_GROUP_TYPE."` WHERE type='$type' and status='1'  and verify='1'"; 
		return $this->exec($sql);
	 }
	 
	  public function countUserInThisGroup($id)
	{
		$sql = "SELECT count(*) as total FROM `".TABLE_USER."` WHERE group_type='$id'"; 
		$result = $this->exec($sql);
		$row  = $this->fetch_object($result);
		if(!empty($row->total)){return $row->total; }else{return "0"; }
	 }
	 
	 function table_fields($table=TABLE_CONFIGURATION)
	 {
		 $sql = "SHOW COLUMNS FROM  `".$table."`"; 
		 return $this->exec($sql);
	 }
	 

// functions ends
}
?>