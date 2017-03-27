<?php
class Member extends Functions
{  
	  function __construct()
	    {	parent::__construct();
	    	$this->table = constant('TABLE_CUSTOMER');
	    	$this->tbl_customer_group  = 'tbl_customer_group';
	    	$this->tbl_organisation  = 'tbl_organisation';
	    	$this->tbl_user_items  = 'tbl_user_items';
		}
    
	function find_by_id($id)
	{	//$query  =  "SELECT u.*,o.id as org_id,o.slug as oslug,o.user_id,o.company_name,o.office_logo,o.office_country,o.office_city,o.office_street,o.office_number,o.office_email,o.office_url,o.office_fax,o.office_desc,o.office_hours,o.office_features from `".$this->table."` u inner join `".$this->tbl_organisation."` o on u.id=o.user_id WHERE u.id='$id'";
	    $query  =  "SELECT * from `".$this->table."` WHERE id='$id'";
		$result = $this->execute($query);
		return $this->result($result);
	}

	function find_item_by_id($id)
	{	$query  =  "SELECT * from `".$this->tbl_user_items."` WHERE id='$id'";
		$result = $this->execute($query);
		return $this->result($result);
	}

	function find_item_id($id)
	{	$query  =  "SELECT * from `".$this->tbl_user_items."` WHERE id='$id'";
		return $this->execute($query);
	}
		
/************************************ Package Start *************************************/
	public function customerList($module,$contentPage,$sortField="tc.id",$sortBy="DESC",$searchText="")
	{ 	
	    $add_query =" WHERE 1=1 "; 	
	    
		if(!empty($searchText)){  	 
		 $add_query  .=     "    
		                          and  ( tc.first_name    like '%$searchText%'
		                           || tc.last_name    like '%$searchText%'
								   
								   ||  tc.phone_no    like '%$searchText%'
								   ||  tc.mobile_no    like '%$searchText%'
								   ||  tc.email    like '%$searchText%'
								   ||  tc.address    like '%$searchText%'
								       )";
		}
		
		/*$sql  =  "SELECT u.*,o.id as org_id,o.slug as oslug,o.user_id,o.company_name,o.office_logo,o.office_country,o.office_city,o.office_street,o.office_number,o.office_email,o.office_url,o.office_fax,o.office_desc,o.office_hours,o.office_features,o.is_feature,o.status as ostatus,coun.Country from `".$this->table."` u 
		INNER JOIN `".$this->tbl_organisation."` o 
		ON u.id=o.user_id
		INNER JOIN countries coun
        ON coun.id=o.office_country 
        ".$add_query." order by {$sortField} {$sortBy}";*/
        $sql  =  "SELECT u.* from `".$this->table."` u 
        ".$add_query." order by {$sortField} {$sortBy}";
		$vals = $this->listings($sql, "index.php?_page=$contentPage&mod=$module",100000, 0,false); 
		return $vals;
	}
	
	 	 	
	public function customerSel($id)
	{
		$sql = "SELECT * FROM `tbl_customer` where `id`='$id'";
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

	 function total_memeber($status='all')
	 {  $add_query  =  '';
	    if($status=='all'){$add_query='';}
	    else{
	    	$add_query  =  " AND status='$status'";
	    }

	 	$sql = "SELECT * FROM `tbl_customer` WHERE 1=1 {$add_query}";
	 	$result  =   $this->exec($sql);
	 	return $this->num_rows($result);
	 }

	 public function orgSel($id)
	{
		$sql = "SELECT * FROM `tbl_organisation` where `id`='$id'";
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

	 
	 
	 function table_fields($table='tbl_customer')
	 {
		 $sql = "SHOW COLUMNS FROM  `".$table."`"; 
		 return $this->exec($sql);
	 }
	 
	
	
	
	public function get_customers()
	{
		$sql="SELECT tc.id, tc.first_name,tc.last_name,tc.middle_name,b.branch_name  FROM tbl_customer tc inner join tbl_branch b on tc.branch_id=b.id  WHERE tc.status=1 order by tc.id desc";
		return $this->exec($sql);
	}

	function gallery($user_id,$parent='-1',$type=''){
		$addQuery   =  "";
		if($parent=='-1'){}else{ $addQuery  .= " AND pid='$parent'";}
		if(!empty($type)){$addQuery  .= " AND item_type='$type'";}
        $query      =  "SELECT * from `".$this->tbl_user_items."` WHERE status='1' and user_id='$user_id' {$addQuery} ";
		return $this->execute($query);
	}
			

	function booking_lists($user_id=0)
	{   $funUserObj  =  new User();		
		if (empty($user_id)) {  return FALSE;  }
		 $query  =  "SELECT * from `tbl_booking_master` WHERE user_id='$user_id' ORDER BY id desc";
		 return $this->execute($query);
	}

	function find_book_by_id($id)
	{
		 $query  =  "SELECT * from `tbl_booking_master` WHERE id='$id'";
		 $result = $this->execute($query);
		 return $this->result($result);
	}
	
	function find_book_child_by_id($id)
	{
		 $query  =  "SELECT * from `tbl_booking_child` WHERE booking_id='$id'";
		 return $this->execute($query);
	}


}
?>