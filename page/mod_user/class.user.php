<?php
class User extends Functions
{      
	     function __construct()
	    {	parent::__construct();
	    	$this->table = constant('TABLE_CUSTOMER');
	    	$this->tbl_customer_group  = 'tbl_customer_group';
	    	$this->tbl_organisation  = 'tbl_organisation';
		}
		function save($frm='',$id=0)
		{   if($this->data=='' or count($this->data)==0)
			$this->data  = $frm;
            if(empty($id)){                
                  $this->insert(); 
                  $id=   $this->insert_id(false);
            }else{
            	if($this->cond=='' or count($this->cond)==0)
            	   $this->cond =  array('id'=>$id);
            	   $this->update(); 
				   //echo $this->query;die();
            }   
            return $id;
		}
		function current_user()
		{   if(isset($_SESSION[ENCR_KEY."front_user_id"]))
			return $_SESSION[ENCR_KEY."front_user_id"];
			else
			return false;	
		}
		
		function current_group()
		{
			$id =  $_SESSION[ENCR_KEY."front_user_id"];
			$row   =  $this->userSel($id);
			return $row->group_type;
		}
		
		function current_branch()
		{
			$id =  $_SESSION[ENCR_KEY."front_user_id"];
			$row   =  $this->userSel($id);
			return $row->branch_id;
		}

	function find_by_email($email)
	{	 $query  =  "SELECT * from `".$this->table."` WHERE `email`='$email'";
		 $result = $this->execute($query);
		 return $this->result($result);
	}

	function find_by_code($code)
	{	 $query  =  "SELECT * from `".$this->table."` WHERE `access_code`='$code'";
		 $result = $this->execute($query);
		 return $this->result($result);
	}
		
	 function checkOldPassword($pass){
	 	$pass =  base64_encode(md5($pass));
	 	 $sql = "SELECT email from ".$this->table." where password='$pass'"; 
		 $result  =  $this->query($sql);
		 return $this->num_rows($result);
	 }	
	 function change_password($id,$pass){
	 	 $pass = base64_encode(md5($pass));
	 	 $sql = "UPDATE ".$this->table." SET password='$pass' where id='$id'"; 
		 $this->query($sql);
	 }	
		
	 function dublicate_user_check($email,$id="")
	 {   
	     $addQuery="";
	     if(!empty($id)) {  $addQuery  .=" and id!='$id' "; }
		 $sql = "SELECT email from ".$this->table." where email='$email' {$addQuery}  "; 
		 $result  =  $this->query($sql);
		 return   $this->num_rows($result);
	 }
	 
	 function table_fields($table=TABLE_USER)
	 {
		 $sql = "SHOW COLUMNS FROM  `".$table."`";  
		 return $this->exec($sql);
	 }
	 function verify($access_code=0)
	 {   $sql = "select * from `".$this->table."` where access_code='$access_code'";  
		 $result   =  $this->query($sql);
		 $num   =  $this->num_rows($result);
		 if($num>0){
			 $row   =  $this->result($result); 
			 $id  =  $row->id;
			 $sql = "update `".$this->table."` set status='1' where id='$id'";  
			 $this->query($sql);
			 return $row;
		}else{
			return array();
		}
	 }
	function find_by_id($id)
	{	 $query  =  "SELECT * from `".$this->table."` WHERE `id`='$id'";
		 $result = $this->execute($query);
		 return $this->result($result);
	}
	
	function find_by_id_with_org($id)
	{	 $query  =  "SELECT u.*,o.id as org_id,o.slug as oslug,o.user_id,o.company_name,o.office_logo,o.office_country,o.office_city,o.office_street,o.office_number,o.office_email,o.office_url,o.office_fax,o.office_desc,o.office_hours,o.office_features from `".$this->table."` u inner join `".$this->tbl_organisation."` o on u.id=o.user_id WHERE u.id='$id'";
		 $result = $this->execute($query);
		 return $this->result($result);
	}
	function find_group_by_id($id)
	{	 $query  =  "SELECT * from `".$this->tbl_customer_group."` WHERE id='$id'";
		 $result = $this->execute($query);
		 return $this->result($result);
	}
	 	 	
	function checkLogin($user,$pass)
	{    $fun_result  =  array('result'=>'');
		 $this->cond  = array('email'=>$user,
		                      'password'=>$pass);
		 $query    =  $this->get('tbl_customer');
		 $num      =  $query['num_rows']; 
		 $row      =  $this->row($query['result']);
                  
		 if($num==1){
			  $status            =   $row->status;
			  $group_id          =   $row->group_id;
			  $group_row         =   $this->find_group_by_id($group_id);
              if($status==2)
			  {
				 $fun_result  =  array('result'=>'verification_needed');  
			  }
			  else if($status==0)
			  {
				 $fun_result  =  array('result'=>'account_deactive');  
			  }	
			  else if($group_row->status!='1')
			  {
				 $fun_result  =  array('result'=>'group_deactive');  
			  }			 
			  else{ 
			  	 //for session security
				 session_regenerate_id(); 				 
				 $user_data = array(ENCR_KEY.'front_bgt'=>$row->group_id,	                    
								    ENCR_KEY.'front_username'=>$row->email,
									ENCR_KEY.'front_name'=>$row->first_name." ".$row->last_name,
									ENCR_KEY.'front_user_id'=>$row->id,
									ENCR_KEY.'login_method'=>'normal'
								    ); 	
										
				 set_userdata($user_data);
				 ini_set('session.gc_maxlifetime', 15);
				 /*****************UserInforamtion store end ***************/
				   $number_of_logon = $row->number_of_logon;
				   $number_of_logon++;
				   $current_time = time();
				   ///set an ip
				   $ip_address = getenv('REMOTE_ADDR');
				   $this->table  = 'tbl_customer'; 
				   $this->data = array(
				                        "last_login_ip"=>$ip_address,
					                    "date_of_last_logon"=>date("Y-m-d h:i:s"),
					                    "number_of_logon"=>$number_of_logon,
					                    "time_entry"=>$current_time,
					                    "is_login"=>1
					                   );
					$this->cond = array("id"=>$row->id);  
					$this->update();
					set_flashdata('successMessage','');
				 $fun_result  =  array('result'=>'success');	
				 return $fun_result;
			  }
			  return $fun_result;
			  
		 }else{  $fun_result  =  array('result'=>'not_found');	
		         return $fun_result;   		     
		 }		
	} 
	 
// function ends
}
?>