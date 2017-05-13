<?php
class Customer extends Functions
{
		
/************************************ Package Start *************************************/
	public function customerList($module,$contentPage,$sortField="tc.id",$sortBy="DESC",$searchText="")
	{ 	
	    $add_query =" WHERE 1=1 "; 	
	    
		if(!empty($searchText)){  	 
		 $add_query  .=     "    
		                          and  ( tc.first_name    like '%$searchText%'
		                           || tc.last_name    like '%$searchText%'
								   ||  tc.middle_name    like '%$searchText%'
								   ||  tc.phone_no    like '%$searchText%'
								   ||  tc.mobile_no    like '%$searchText%'
								   ||  tc.email    like '%$searchText%'
								   ||  tc.address    like '%$searchText%'
								       )";
		}
		
		if(!empty($_SESSION[ENCR_KEY.'level']) and $_SESSION[ENCR_KEY.'level']!=1){
			$funUserObj =   new User;
			$branch_id =  $funUserObj->current_branch();
			$add_query .=" AND tc.branch_id=".$branch_id;
		}
		
		if(!empty($_SESSION['cust_post_branch_id'])){
			$add_query .=" AND tc.branch_id=".$_SESSION['cust_post_branch_id'];
		}
	    $sql = "SELECT tc.*,b.branch_name FROM `tbl_customer` tc inner join tbl_branch b on tc.branch_id=b.id ".$add_query." order by {$sortField} {$sortBy}";
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
	 
	 function table_fields($table='tbl_customer')
	 {
		 $sql = "SHOW COLUMNS FROM  `".$table."`"; 
		 return $this->exec($sql);
	 }
	 
	
		/************************************ Package end *************************************/
		
	public function get_customer_vehicle($id)
	{
		$sql = "SELECT 
		cv.cust_vehicle_id,cv.vehicle_brand, cv.vehicle_name, cv.vehicle_no, vt.title as vehicle_title FROM tbl_customer_vehicle cv
		JOIN tbl_vehicle_type vt
		ON cv.vehicle_type_id = vt.id
		WHERE cv.customer_id = '$id' ";
		return $this->exec($sql);
	}
	
	public function get_vehicle_type()
	{
		$sql="SELECT * FROM tbl_vehicle_type WHERE status=1 ";
		return $this->exec($sql);
	}
	
	public function get_customers()
	{
		$sql="SELECT tc.id, tc.first_name,tc.last_name,tc.middle_name,b.branch_name  FROM tbl_customer tc inner join tbl_branch b on tc.branch_id=b.id  WHERE tc.status=1 order by tc.id desc";
		return $this->exec($sql);
	}
			

}
?>