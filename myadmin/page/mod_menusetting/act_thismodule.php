<?php
session_start();
include_once("../../includes/application_top.php");
$funObj->table  =  TABLE_MENU_SETTING;
$funObj->action = isset( $_GET['action'] ) ? $_GET['action'] : "";
$funObj->aid    = isset( $_GET['aid'] )    ? $_GET['aid'] : ""; 
if(isset($_POST['submitBtn']))
{  
	foreach($_POST as $key=>$val)
   {  $$key=$funObj->check($val);   }
      $funObj->aid    =  !empty($hidden_id)?$hidden_id:0;
	  $funObj->action =  !empty($hidden_id)?'edit':'add';

	  $db->data  =  array("menu_type_name"=>$txtMenuType,
	  					  "position"=>$position,
						  "display_number"=>$NumDisplay,
						  "status"=>$status
						  );					  
	         $funObj->begin();		
	         $queryResult  =  $funObj->doAction(); 
             if(!$queryResult) { $funObj->rollback(); 
			 $_SESSION['succesMesage'] = "Action cannot place Occur due to some internal errors!!.
			                              Please try again";} else { $funObj->commit();}
	
}else{
			 $funObj->begin();		
			 $queryResult  =  $funObj->doAction(); 
			 if(!$queryResult) { $funObj->rollback(); 
			 $_SESSION['succesMesage'] = "Action cannot place Occur due to some internal errors!!.
										  Please try again";} else { $funObj->commit();}	
}
$funObj->url_back  = $sitePathB."list-menusetting";
redirect($funObj->url_back);
?>