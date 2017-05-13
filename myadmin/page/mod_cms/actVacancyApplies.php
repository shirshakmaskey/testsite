<?php
session_start();
include_once("../../includes/application_top.php");
if($_GET['action']=='view') { $_GET['action']='edit'; }
$funCmsObj->action = isset( $_GET['action'] ) ? $_GET['action'] : "";
$funCmsObj->aid  =isset( $_GET['aid'] ) ? $_GET['aid'] : ""; 
$funCmsObj->table=TABLE_VACANCY_APPLIES;

 
if( isset( $_POST['Save_x'] ) )
{
   include("../mod_setAndCheckAll/checkToken.php");
   foreach($_POST as $key=>$val)
   {  $$key=$funCmsObj->check($val);   }

   $funCmsObj->data =array(
						 ); 
						
	         $funCmsObj->begin();		
	         $queryResult  =  $funCmsObj->doAction(); 
              
                               if(!$queryResult) { $funCmsObj->rollback(); $_SESSION['succesMesage'] = "Action cannot place Occur due to some internal errors!!.Please try again";
			                    } else { $funCmsObj->commit();  }		 
			

  
}
else
{         $funCmsObj->begin();

		  $rowEdit =  $funCmsObj  -> vacancyAppliesSel($funCmsObj->aid);
         $queryResult  =  $funCmsObj->doAction();
		 unlink("../../../file/vacancy_cv/".$rowEdit->attachment);
	    if(!$queryResult) { $funCmsObj->rollback(); $_SESSION['succesMesage'] = "Transaction can place Occur due to some internal errors!!";
			                    } else { $funCmsObj->commit();  }
}
$funCmsObj->url_back  = "../../index.php?_page=applies_in_vacancy&mod=cms";
$funCmsObj->redirect($funCmsObj->url_back);
?>