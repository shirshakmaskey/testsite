<?php
session_start();
include_once("../../includes/application_top.php");
$funObj->action   = @isset($_GET['action']) ? $_GET['action'] :"";
$funObj->aid      = isset( $_GET['aid'] )    ? decode($_GET['aid']) : "";
$funObj->table    = TABLE_USER;

if( isset( $_POST['submitBtn'] ) ){
   include("../mod_setAndCheckAll/checkToken.php");
   foreach($_POST as $key=>$val)
   {  $$key   =  $funObj->check($val);   }
      $hidden_id      =  decode($hidden_id);
      $funObj->aid    =  !empty($hidden_id)?$hidden_id:0;
	  $funObj->action =  !empty($hidden_id)?'edit':'add';
       
   /* for the user history */
   if($funObj->action=='edit'){
    $funObj-> table  =  TABLE_USER_HISTORY;
	$rowEdit  =  $funUserObj->userListSel($funObj->aid);
    $funObj->data  = array("user_id"=>$funObj->aid,
							   "fullname"=>$rowEdit->fullname,
							   "username"=>$rowEdit->username,
   							   "password"=>$rowEdit->password,
							   "group_type"=>$group_type,
							   "designation"=>$rowEdit->designation,
							   "make_login"=>$rowEdit->make_login,
							   /*"branch_id"=>$branch_id,*/
							   "status"=>$rowEdit->status,
							   "temporary_address"=>$rowEdit->temporary_address,
							   "permanent_address"=>$rowEdit->permanent_address,
							   "dob"=>$rowEdit->dob,
							   "gender"=>$rowEdit->gender,
							   "telephone1"=>$rowEdit->telephone1,
							   "mobile1"=>$rowEdit->mobile1,
							   "email1"=>$rowEdit->email1,
							   "user_description"=>$rowEdit->user_description,
							   "modified_date"=>$rowEdit->modified_date
							    );
	$funObj->insert();  }
   
   /* for the user history end */

   /*file uploading*/
   $image_name   =  $_FILES['image']['name'];
   if(!empty($image_name))
   {	$image_temp  = $_FILES['image']['tmp_name'];							
		$image_name  =  $funObj->randomkeys(7).$image_name; 											
		$imagePathToUpload  = $_SESSION[ENCR_KEY.'siteDocUrl']."images/user_image/";								
		move_uploaded_file($image_temp,$imagePathToUpload.$image_name); 
		if(file_exists($imagePathToUpload.$old_image) and $old_image!="" )
		{ unlink("../../../images/user_image/".$old_image); }									
	}
   else{$image_name   =  $old_image;}  
   /*file uploading end*/
 
   $funObj->begin();
	
		if(!empty($middlename))
		{ $fullname  = $firstname." ".$middlename." ".$lastname;}
		else { $fullname  = $firstname." ".$lastname;}
	
	$funObj->table=TABLE_USER;
    $funObj->data =array("username"=>$email1,
						"fullname"=>$fullname,	 
                        "group_type"=>$group_type,
                        "make_login"=>$make_login,
                        /*"branch_id"=>$branch_id,*/						
						"status"=>$status                       
					   );
     $funObj->cond =array("id"=>$funObj->aid);	
	  
      if($funObj->action=='add')
	  {$funObj->data['password']  =  base64_encode(md5($pwdPassword));     }
	  if($funObj->action=='edit'){
	  if(!empty($chkChangePassword)){ 
		$funObj->data['password']  =   base64_encode(md5($pwdPassword));
	  }}
      $queryResult1  =  $funObj->doAction();
	  if(empty($hidden_id)){
		 $latest_insert_id  = $_SESSION['latest_insert_id'];  
	  }
  
	   $funObj->data =  array();
	   $funObj->table=TABLE_USER_INFO;
       $funObj->data =array("temporary_address"=>$temporary_address,	 
                                "permanent_address"=>$permanent_address,
								"gender"=>$gender,
								"image"=>$image_name,								
								"telephone1"=>$telephone1,						
								"mobile1"=>$mobile1,
								"email1"=>$email1
								);
	    $funObj->cond =array("user_id"=>$funObj->aid);	
								
			 if($funObj->action=='add')
	          {   $funObj->data['user_id']  =  $latest_insert_id;
			      $funObj->data['added_date']  =  date("Y-m-d");
			  }else{  $funObj->data['modified_date']  =  date("Y-m-d"); }					
				 $queryResult2  =  $funObj->doAction();	  
	
                               if(!$queryResult2) { $funObj->rollback(); $_SESSION['successMsg'] = "Transaction cannot place Occur due to some internal errors!!.Please try again";
			                    } else { $funObj->commit(); }
								
}
else
{
	     if($funObj->action=='delete'){
			    $funObj->begin();
				$funObj-> table  =  TABLE_USER;
			 	$rowEdit  =  $funUserObj->userListSel($funObj->aid);
			 	//print_r($rowEdit); die();
				$imagePathToUpload  = $_SESSION[ENCR_KEY.'siteDocUrl']."images/user_image/";	
				if(file_exists($imagePathToUpload.$rowEdit->image) and $rowEdit->image!="" )
				{ unlink("../../../images/user_image/".$rowEdit->image); }
				$filePathToUpload  = $_SESSION[ENCR_KEY.'siteDocUrl']."file/user/pdf/";	
				if(file_exists($filePathToUpload.$rowEdit->file_attach) and $rowEdit->file_attach!="" )
				{ unlink("../../../file/user/pdf/".$rowEdit->file_attach); }
   
			    $funObj-> table  =  TABLE_USER; 
			    $funObj->action  = "delete"; 
				$queryResult   =  $funObj->doAction();
				if(!$queryResult) { $funObj->rollback(); $_SESSION['successMsg'] = "Transaction can place Occur due to some internal errors!!";
			                    } else { $funObj->commit();  }
				
			 
		 }
}
/******************Now User Inforamtion Storage for add or edit**************/
						$funObj->table=TABLE_USER_LOGININFO;
						$new_U=time("U")+5.75*3600;
                        $c_date=date("Y-m-d")." ".gmdate("h:i:s", $new_U);
						if($funObj->action=='delete' || $funObj->action=='edit' )
						{ 
						 $resUserOnfo   =   $funUserObj->user_info_sel_from_info_id( TABLE_USER,$_GET['aid'] );               $rowUserInfo     =  $funUserObj->fetch_object($resUserOnfo);

						  $funObj->action = "edit";
						  $funObj->data =array("account_modified"=>$c_date); 
						   $funObj->cond=array("id"=>$rowUserInfo->id);
						   $funObj->doAction();	
						   
						}
						else
						{						
						 $funObj->data =array("tablename"=>TABLE_USER,
                                               "info_id"=>$latest_insert_id,
						                        "account_created"=>$c_date
						                        ); 
						 $funObj->doAction();
						}
						
						
	

/*****************UserInforamtion store end ***************/
if($_SESSION[ENCR_KEY.'level']==3){
	$funObj->url_back  = $sitePathB."view-user-".encode($funObj->aid);
}else{
    $funObj->url_back  = $sitePathB."list-user";
}
$funObj->redirect($funObj->url_back);
?>