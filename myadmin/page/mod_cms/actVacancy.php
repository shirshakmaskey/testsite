<?php
session_start();
include_once("../../includes/application_top.php");
if($_GET['action']=='view') { $_GET['action']='edit'; }
$funCmsObj->action = isset( $_GET['action'] ) ? $_GET['action'] : "";
$funCmsObj->aid  =isset( $_GET['aid'] ) ? $_GET['aid'] : ""; 
$funCmsObj->table=TABLE_VACANCY;

 
if( isset( $_POST['Save_x'] ) )
{
   include("../mod_setAndCheckAll/checkToken.php");
   foreach($_POST as $key=>$val)
   {  $$key=$funCmsObj->check($val);   }

   $funCmsObj->data =array(
						"vacancy_type_id"=>$vacancy_type_id,
                        "vacancy_title"=>$vacancy_title,
						"vacancy_number"=>$vacancy_number,
						"vacancy_description"=>$vacancy_description,
						"started_date"=>$started_date,
						"expire_date"=>$expire_date,
						"added_by"=>$_SESSION['pathsaleLoginId'],
                        "status"=>$status,
						 ); 
						
	         $funCmsObj->begin();		
	         $queryResult  =  $funCmsObj->doAction(); 
              
                               if(!$queryResult) { $funCmsObj->rollback(); $_SESSION['succesMesage'] = "Action cannot place Occur due to some internal errors!!.Please try again";
			                    } else { $funCmsObj->commit();  }		 
			

  
}
else
{       $funCmsObj->begin();

        $queryResult  =  $funCmsObj->doAction();
		  
		   if(!$queryResult) { $funCmsObj->rollback(); $_SESSION['succesMesage'] = "Transaction can place Occur due to some internal errors!!";
			                    } else { $funCmsObj->commit();  }
}
$funCmsObj->url_back  = isset($_POST['url_back'])?$_POST['url_back']:$_SERVER['HTTP_REFERER'];
$funCmsObj->redirect($funCmsObj->url_back);
?>