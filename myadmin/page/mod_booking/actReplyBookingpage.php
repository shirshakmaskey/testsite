<?php
session_start();
include_once("../../includes/application_top.php");
$funObj->action = $_GET['action'];
$funObj->url_back  = $_SERVER['HTTP_REFERER'];
$funObj->table=TABLE_REPLIESBOOK;

if(isset($_POST['selected']))
{
  foreach($_POST['selected'] as $key=>$val)
  {  
   $funObj->cond=array("id"=>$val);
   $funObj->delete();
   }
   $_SESSION['succesMesage']="Data delete sucessfully!!";
   $funObj->redirect($funObj->url_back);
}
else
{
$funObj->aid  = $_GET['aid'];
$funObj->begin();		
	         $queryResult  =  $funObj->doAction(); 
              
                               if(!$queryResult) { $funObj->rollback(); $_SESSION['succesMesage'] = "Action cannot place Occur due to some internal errors!!.Please try again";
			                    } else { $funObj->commit();  }
}

$funObj->redirect($funObj->url_back);
?>