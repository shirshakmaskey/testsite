<?php
session_start();
include_once("../../includes/application_top.php");
if($_GET['action']=='view') { $_GET['action']='edit'; }
$funSettingObj->action = $_GET['action'];
$funSettingObj->aid  = $_GET['aid'];
$funSettingObj->table=TABLE_EMAIL_TEMPLETE_SETTING;

if( isset( $_POST['Save_x'] ) )
{
  include("../mod_setAndCheckAll/checkToken.php");	
   foreach($_POST as $key=>$val)
   {  $$key=$funSettingObj->check($val);   }
   
  
    
	if(empty($email_title)) { $email_title = $previous_email_title; }
	
	$description   =    mysql_real_escape_string(stripcslashes(trim( $_POST['description']) ) );
   $funSettingObj->data =array("email_title"=>$email_title,
                        "description"=>$description,
						"status"=> $status,
					   ); 
		
		
	         $funSettingObj->begin();		
	         $queryResult  =  $funSettingObj->doAction(); 
              
                               if(!$queryResult) { $funSettingObj->rollback(); $_SESSION['successMsg'] = "Action cannot place Occur due to some internal errors!!.Please try again";
			                    } else { $funSettingObj->commit();  }
			 
			

}
else 
{         $funSettingObj->begin();
        $queryResult  =  $funSettingObj->doAction();
		  
		   if(!$queryResult) { $funSettingObj->rollback(); $_SESSION['successMsg'] = "Transaction can place Occur due to some internal errors!!";
			                    } else { $funSettingObj->commit();  }
}

$funSettingObj->url_back  = "../../index.php?_page=emailTemplete&mod=setting";
$funSettingObj->redirect($funSettingObj->url_back);
?>