<?php
class adverts extends Functions
{
		
/************************************ Modules  Advertisement start *************************************/
	
	 public function adverType($searchText="")
	{ 	 $add_query=""; 	 		 	
		if(!empty($searchText)){  	 
		 $add_query  .=     "   where 1=1 
		                          and  ( advert_name   like '%$searchText%' 
		                          
								       )";
		}
		  $sql = "SELECT * FROM `".TABLE_ADVERT_TYPE."` ".$add_query." order by id desc";
		$vals = $this->listings($sql, "index.php?_page=advertList&mod=advert", 10, 0,false); 
		return $vals;
	}
	
	public function adverTypeSel($id)
	{
		$sql = "SELECT * FROM `".TABLE_ADVERT_TYPE."` where `id`='$id'";
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
	 
	 public function advertTypeLists()
	 {
		$sql = "SELECT * FROM `".TABLE_ADVERT_TYPE."`  order by id desc"; 
		return $this->exec($sql);
	 }
	 
	 
	 	 	
	public function advertisementRequestSel($id)
	{
		$sql = "SELECT * FROM `".TABLE_ADVERTISEMENT_SPACE."` where `id`='$id'";
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
	 
	  public function advertisementAcceptPage($searchText="")
	{ 	 
		  $sql = "SELECT * FROM `".TABLE_ADVERTISEMENT_SPACE."`  WHERE 1=1   and  `payment` !='0' and status='1'   order by id desc";
		$vals = $this->listings($sql, "index.php?_page=advertiseAccepted&mod=advert", 10, 0,false); 
		return $vals;
	}
	
	public function advertisementAcceptSel($id)
	{
		$sql = "SELECT * FROM `".TABLE_ADVERTISEMENT_SPACE."` where `id`='$id'";
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
	 
	  public function advertisementRejectPage($searchText="")
	{ 	 
		   $sql = "SELECT * FROM `".TABLE_ADVERTISEMENT_SPACE."`  WHERE 1=1   and  `payment` ='0' and status='1' and accept='0'   order by id desc";
		$vals = $this->listings($sql, "index.php?_page=advertiseAccepted&mod=advert", 10, 0,false); 
		return $vals;
	}
	
	public function advertisementRejectSel($id)
	{

		 $sql = "SELECT * FROM `".TABLE_ADVERTISEMENT_SPACE."` where `id`='$id'";
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
	 
	 
	 
	 function getAdmistratorEmail()
	 {
		 $sql = "SELECT * FROM `".TABLE_ADMINUSER."` where `id`='". $_SESSION["adminId"] ."'";
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
	 
	 		public function user_info_sel_from_info_id( $tableName, $info_id)
		{
		   $sql  = "SELECT * FROM ".TABLE_USER_INFO." where tablename='$tableName'  and info_id='$info_id'";
		  return $this->exec($sql);
		}
	 
/************************************ Modules  Advertisement end *************************************/

}
?>