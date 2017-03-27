<?php
session_start();
include_once("../../includes/application_top.php");
$funObj->table  =  TABLE_POST_CATEGORY;
$funObj->action = isset( $_GET['action'] ) ? $_GET['action'] : "";
$funObj->aid    = isset( $_GET['aid'] )    ? decode($_GET['aid']) : ""; 
if(isset($_POST['submitBtn']))
{  
	foreach($_POST as $key=>$val)
   {  $$key=$funObj->check($val);   }
      $hidden_id      =  decode($hidden_id);
      $funObj->aid    =  !empty($hidden_id)?$hidden_id:0;
	  $funObj->action =  !empty($hidden_id)?'edit':'add';
	  if(!empty($txtCatName)){
		   $slug  = create_slug($txtCatName);
		   $exp   =  explode("_",$slug);
		   $slug  =  $exp[0];
	  }
	  $funObj->data  =  array("category_name"=>$txtCatName,
	                      "slug"=>$slug,
						  "type"=>$type,
						  "status"=>$status
						  );
	         $funObj->begin();		
	         $queryResult  =  $funObj->doAction(); 
             if(!$queryResult) { $funObj->rollback(); 
			 $_SESSION['succesMesage'] = "Action cannot place Occur due to some internal errors!!.
			                              Please try again";} else { $funObj->commit();if(!empty($back_again)){$funObj->redirect($_SERVER['HTTP_REFERER']);}}
	
}else{
			 $funObj->begin();		
			 $queryResult  =  $funObj->doAction(); 
			 if(!$queryResult) { $funObj->rollback(); 
			 $_SESSION['succesMesage'] = "Action cannot place Occur due to some internal errors!!.
										  Please try again";} else { $funObj->commit();}	
}
$funObj->url_back  = $sitePathB."list-pagecat";
redirect($funObj->url_back);
?>