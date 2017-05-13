<?php
session_start();
include_once("../../includes/application_top.php");
$funCmsObj->action = $_GET['action'];
$funCmsObj->url_back  = "../../index.php?_page=replytemfeedbackpage&mod=cms";
$funCmsObj->table=TABLE_REPLIESFEED;

if(isset($_POST['selected']))
{
  foreach($_POST['selected'] as $key=>$val)
  {  
   $funCmsObj->cond=array("id"=>$val);
   $funCmsObj->delete();
   }
   $_SESSION['succesMesage']="Data delete sucessfully!!";
   $funCmsObj->redirect($funCmsObj->url_back);
}
else
{
$funCmsObj->aid  = $_GET['aid'];
$funCmsObj->begin();		
	         $queryResult  =  $funCmsObj->doAction(); 
              
                               if(!$queryResult) { $funCmsObj->rollback(); $_SESSION['succesMesage'] = "Action cannot place Occur due to some internal errors!!.Please try again";
			                    } else { $funCmsObj->commit();  }
}
$funCmsObj->redirect($funCmsObj->url_back);
?>