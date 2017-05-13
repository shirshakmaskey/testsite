<?php
session_start();
include_once("../../includes/application_top.php");
$funObj->action   = @isset($_GET['action']) ? $_GET['action'] :"";
$funObj->aid      = isset( $_GET['aid'] )    ? decode($_GET['aid']) : "";
$funObj->table    = 'tbl_customer';
$branch_id        =  $funUserObj->current_branch();
if( isset( $_POST['submitBtn'] ) )
{
   include("../mod_setAndCheckAll/checkToken.php");
   foreach($_POST as $key=>$val)
   {  $$key   =  $funObj->check($val);   }
      $hidden_id      =  decode($hidden_id);
      $funObj->aid    =  !empty($hidden_id)?$hidden_id:0;
	  $funObj->action =  !empty($hidden_id)?'edit':'add';
   
   
   $status   =  @isset($status)?$status:0;
   $funObj->data =array("first_name"=>$first_name,
                        "middle_name"=>$middle_name,
						"last_name"=>$last_name,
						"phone_no"=>$phone_no,
						"mobile_no"=>$mobile_no,
						"email"=>$email,						
						"address"=>$address,
						"gender"=>$gender,
						"status"=>$status
						); 
	$funObj->data['branch_id']	     =	!empty($branch_id)?$branch_id:1;
	if(empty($hidden_id)){
		        $funObj->data['created_at']	     =  date("Y-m-d H:i:s");	
				$funObj->data['created_by']	     =  $_SESSION[ENCR_KEY.'pathsaleLoginId'];												
	}else{      $funObj->data['modified_at']	 =  date("Y-m-d H:i:s");	
	            $funObj->data['modified_by']	 =  $_SESSION[ENCR_KEY.'pathsaleLoginId'];
		 }
	
						
	         $funObj->begin();		
	         $queryResult  =  $funObj->doAction(); 
              
                            if(!$queryResult) { 
							      $funObj->rollback(); 
								  $_SESSION['successMsg'] = "Action cannot place Occur due to some internal errors!!.Please try again";
			                 } else { $funObj->commit(); 
								      if(!empty($back_again))
			                          {$funObj->redirect($_SERVER['HTTP_REFERER']);}
								    }//else close
}//ifclose
else
{       $funObj->begin();
        $queryResult  =  $funObj->doAction();	 
		if(!$queryResult) { 
		    $funObj->rollback(); 
			$_SESSION['successMsg'] = "Transaction can place Occur due to some internal errors!!";
	     } else { $funObj->commit();  }
}
//redirect to pages
$funObj->url_back  = $sitePathB."list-customer";
$funObj->redirect($funObj->url_back);