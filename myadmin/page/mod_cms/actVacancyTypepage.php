<?php
session_start();
include_once("../../includes/application_top.php");
if($_GET['action']=='view') { $_GET['action']='edit'; }
$funCmsObj->action = isset( $_GET['action'] ) ? $_GET['action'] : "";
$funCmsObj->aid  =isset( $_GET['aid'] ) ? $_GET['aid'] : ""; 
$funCmsObj->table=TABLE_VACANCY_TYPE;

 
if( isset( $_POST['Save_x'] ) )
{
   include("../mod_setAndCheckAll/checkToken.php");
   foreach($_POST as $key=>$val)
   {  $$key=$funCmsObj->check($val);   }

   $funCmsObj->data =array(
						"vacancy_type_name"=>$vacancy_type_name,
                        "vacancy_type_description"=>$vacancy_type_description ,
						"added_date"=> date("Y-m-d"),
						"added_by"=>$_SESSION['pathsaleLoginId'],
                        "status"=>$status,
						 ); 
						
	         $funCmsObj->begin();		
	         $queryResult  =  $funCmsObj->doAction(); 
              
                               if(!$queryResult) { $funCmsObj->rollback(); $_SESSION['succesMesage'] = "Action cannot place Occur due to some internal errors!!.Please try again";
			                    } else { $funCmsObj->commit();  }		 
			

  
}
else
{         $funCmsObj->begin();
        $queryResult  =  $funCmsObj->doAction();
		
		$funObj->deleteChildTableRow( $funCmsObj->aid, "vacancy_type_id", TABLE_VACANCY); 
	    if(!$queryResult) { $funCmsObj->rollback(); $_SESSION['succesMesage'] = "Transaction can place Occur due to some internal errors!!";
			                    } else { $funCmsObj->commit();  }
}
$funCmsObj->url_back  = isset($_POST['url_back'])?$_POST['url_back']:$_SERVER['HTTP_REFERER'];
$funCmsObj->redirect($funCmsObj->url_back);
?>