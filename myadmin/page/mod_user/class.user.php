<?php
class User extends Functions
{
	// function starts	
  function checkUser($user,$password)
		{	$user  =  $this->escape_str($user);
			$password  =  $this->escape_str($password);
			$array1  = array('/select/i','/\*/','/from/i','/1=1/','/update/i','/delete/i','/drop/i','/truncate/i');
			$array2  = array('','','','','','','','');  
			$user  =  preg_replace($array1,$array2,$user);	
	$sql="select * from ".TABLE_USER." where username='$user' and password='" .base64_encode(md5($password)). "' and make_login='1' and (group_type='1' or group_type='2' or group_type='3')";
			
		 $data=$this->exec($sql);		
	     $no=$this->total_rows($data);
		 $rows  =  $this->fetch_array($data);
		 
 			if($no<>1)
			{
				 $_SESSION["errorMessage"]="Invalid Username and Password!!";
				 $url="signin";
				 $this->redirect($url);
				return(false); 
			}
			else
			{
				//for session security
				session_regenerate_id(true);
				$_SESSION['user_agent']  =  $_SERVER['HTTP_USER_AGENT'];
				//for session security end			
			    $_SESSION[ENCR_KEY."level"]           = $rows["group_type"];
				$_SESSION[ENCR_KEY."pathsaleLoginId"] = $rows["id"];				
				/******************Now User Inforamtion Storage for add or edit**************/
						$this->table=TABLE_USER_LOGININFO;
						$new_U=time("U")+5.75*3600;
                        $c_date=date("Y-m-d")." ".gmdate("h:i:s", $new_U);
						
						 $resUserOnfo   =   $this->user_info_sel_from_info_id( TABLE_USER,$_SESSION["pathsaleLoginId"] );               $rowUserInfo     =  $this->fetch_object($resUserOnfo);
						 
						 
						  $this->action = "edit";
						  $this->data =array( "date_of_last_logon"=>$c_date,
						                      "number_of_logon"=>(($rowUserInfo->number_of_logon)+1)    
					                          ); 
						   	 
						   $this->cond=array("id"=>$rowUserInfo->id);
						   $this->doAction();					
/*****************UserInforamtion store end ***************/
                     unset($_SESSION['successMsg']);
                   $url="administrator";
    			   $this->redirect($url);
				
				
				}	
				
		}
		
		function current_user()
		{
			return $_SESSION[ENCR_KEY."pathsaleLoginId"];
		}
		
		function current_group()
		{
			$id =  $_SESSION[ENCR_KEY."pathsaleLoginId"];
			$row   =  $this->userSel($id);
			return $row->group_type;
		}
		
		function current_branch()
		{
			$id =  $_SESSION[ENCR_KEY."pathsaleLoginId"];
			$row   =  $this->userSel($id);
			return $row->branch_id;
		}
		
		
		
		function userSel($id)
		{
			 $sql = "SELECT * FROM `".TABLE_USER."` where `id`='$id'";
			 $this->query =  $sql;
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

		function checkValidCode($code)
		{
			 
			 $sql = "SELECT tu.*,tui.* FROM `".TABLE_USER."` as tu,`".TABLE_USER_INFO."` as tui  where tu.id=tui.user_id and tu.access_code='$code' limit 0,1"; 
			 $this->query =  $sql;
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

		function userByEmail($email)
		{
			 $sql = "SELECT tu.*,tui.* FROM `".TABLE_USER."` as tu,`".TABLE_USER_INFO."` as tui  where tu.id=tui.user_id and tui.email1='$email' limit 0,1"; 
			 $this->query =  $sql;
			 if($this->select($sql,false))
			        {		return $this->rs;
							unset($this->rs);
					}
			      else{	return false; }
				
			}
		
		public function user_info_sel_from_info_id( $tableName, $info_id)
		{
		   $sql  = "SELECT * FROM ".TABLE_USER_LOGININFO." where tablename='$tableName'  and info_id='$info_id'";
		  return $this->exec($sql);
		}
		
		public function user_info_home( $user_id)
		{
		   $sql  = "SELECT tu.*,tul.*,tui.* FROM ".TABLE_USER." as tu,".TABLE_USER_LOGININFO." as tul,".TABLE_USER_INFO." as tui where tu.id=tul.info_id and tu.id=tui.user_id and tu.id='$user_id'"; 
		   $this->query =  $sql;
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
		
		public function userInformation($searchText="")
	{ 	  	 	 	 	 	 	 	 	
		if(!empty($searchText)){ 
		if($searchText  == 'TABLE_ADMINUSER') $searchText  = "tbladmin";
		else if($searchText  == 'TABLE_USERS') $searchText  = "tbl_users";
		else if($searchText  == 'TABLE_ADVERTISER') $searchText  = "tbl_advertiser";
		else $searchText ="";
		 
		 
		 $add_query  =  "WHERE 1=1 and  tablename='".$searchText."' ";
		}
		 $sql = "SELECT * FROM `".TABLE_USER_INFO."` ".$add_query." order by id desc";
		 $this->query =  $sql;
		$vals = $this->listings($sql, "index.php?_page=user_info&mod=user", 5, 0,false); 
		return $vals;
	}
	
	public function userInformationSel($id)
	{
		$sql = "SELECT * FROM `".TABLE_USER_INFO."` where `id`='$id'";
		$this->query =  $sql;
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
	 
	// functions starts
	public function userListPage($module,$contentPage,$limit,$sortField,$sortBy,$searchText="")
	{ 	 $add_query=""; 		
		if(!empty($searchText)){ 
		   $add_query  =  " and  ( tu.fullname   like '%$searchText%' 
		                          ||  tu.username   like '%$searchText%'
								  ||  tui.temporary_address  like '%$searchText%'
								  ||  tui.permanent_address  like '%$searchText%'
								  ||  tui.gender  	like '%$searchText%'
								  ||  tui.district  like '%$searchText%'
								  ||  tui.zone  	like '%$searchText%'
								  ||  tui.telephone1 like '%$searchText%'
								  ||  tui.mobile1  	 like '%$searchText%'
								  ||  tui.email1  	 like '%$searchText%'
								)";
		}
	$sql = "SELECT DISTINCT tu.id as id,tu.*,tui.*,tg.group_name FROM `".TABLE_USER."` as tu INNER JOIN `".TABLE_USER_INFO."` as tui ON tu.id=tui.user_id INNER JOIN tbl_group_type tg on tu.group_type=tg.id WHERE 1=1 ".$add_query." order by {$sortField} {$sortBy}";
	$this->query =  $sql;
		$vals = $this->listings($sql, "index.php?_page=$contentPage&mod=$module", 20, 0,false);
		return $vals;
	}
	
	 	 
	
	public function userListSel($id)
	{
		$sql = "SELECT tu.*,tui.* FROM `".TABLE_USER."` as tu,`".TABLE_USER_INFO."` as tui  where tu.id=tui.user_id and tu.id='$id'"; 
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
	 
	 // functions starts
	public function userHistoryPage($module,$contentPage,$aid)
	{ 	
		$sql = "SELECT * FROM `".TABLE_USER_HISTORY."` WHERE user_id='$aid' order by id desc";
		$vals = $this->listings($sql, "$contentPage.php?aid=$aid", 200, 0,false); 
		return $vals;
	}
	
	 	 
	
	public function userHistorySel($id)
	{
		$sql = "SELECT * FROM `".TABLE_USER_HISTORY."` where id='$id'"; 
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
	 
	 
	 public function levelUserSel($id)
	{
		$sql = "SELECT * FROM `".TABLE_LEVEL."` WHERE id='$id'"; 
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
	 
	 
	 function dublicateAdminUser($fullname, $emailOne, $date_registration,$idOfUser="")
	 {   
	     $addQuery="";
	     if(!empty($idOfUser))
	    {  $addQuery  .=" and tu.id!='$idOfUser' "; }
		 $sql = "SELECT tu.*,tui.* 
		              FROM `".TABLE_USER."` as tu,`".TABLE_USER_INFO."` as tui  
					  where tu.id=tui.user_id 
					  and tui.email1='$emailOne' 
					  and tu.level='1' 
					  {$addQuery}  "; 
		$result  =  $this->exec($sql);
		return   $this->total_rows($result);
	 }
	 
	 function loadUserAccordingTogroup($group_type)
		{
		$sql = "SELECT * FROM `".TABLE_USER."` where `group_type`='$group_type' and status='1' and make_login='1'";
		return $this->exec($sql);			
		}
		
		public function userGroupType($id)
	{
		$sql = "SELECT * FROM `".TABLE_GROUP_TYPE."` WHERE id='$id'";
		$this->query =  $sql; 
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
		$sql = "SELECT * FROM `".TABLE_GROUP_TYPE."` WHERE type='$type' and status='1'"; 
		return $this->exec($sql);
	 }
	 
	 
	 function table_fields($table=TABLE_USER)
	 {
		 $sql = "SHOW COLUMNS FROM  `".$table."`";  
		 return $this->exec($sql);
	 }
	 
	 function table_fields_info($table=TABLE_USER_INFO)
	 {
		 $sql = "SHOW COLUMNS FROM  `".$table."`"; 
		 return $this->exec($sql);
	 }
	 	
	 
	 
// function ends
}
?>