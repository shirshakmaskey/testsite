<?php
session_start();
include_once("../../includes/application_top.php");
if($_GET['action']=='view') { $_GET['action']='edit'; }
$funAdvertsObj->action = isset( $_GET['action'] ) ? $_GET['action'] : "";
$funAdvertsObj->aid  =isset( $_GET['aid'] ) ? $_GET['aid'] : ""; 
$funAdvertsObj->table=TABLE_ADVERT_TYPE;

if( isset( $_POST['Save_x'] ) )
{
	include("../mod_setAndCheckAll/checkToken.php");
   foreach($_POST as $key=>$val)
   {  $$key=$funAdvertsObj->check($val);   }	 	 	
	
   $funAdvertsObj->data =array("advert_name"=>$advert_name,
                       "status"=>$status                       
					   );    			
	         $funAdvertsObj->begin();		
	         $queryResult  =  $funAdvertsObj->doAction(); 
              
             if(!$queryResult) { $funAdvertsObj->rollback(); $_SESSION['succesMesage'] = "Action cannot place Occur due to some internal errors!!.Please try again";
			                    } else { $funAdvertsObj->commit();  }	

}
else
{         $funAdvertsObj->begin();
        $queryResult  =  $funAdvertsObj->doAction();
		$request_url  =  explode("/",$_SERVER['PHP_SELF']);
		 $funObj->deleteChildTableRow( $funAdvertsObj->aid, "advert_type", TABLE_ADVERTISEMENT_SPACE,$_SERVER['DOCUMENT_ROOT'].$request_url[1]."/images/advertisement/","image"); 
		   if(!$queryResult) { $funAdvertsObj->rollback(); $_SESSION['succesMesage'] = "Transaction can place Occur due to some internal errors!!";
			                    } else { $funAdvertsObj->commit();  }
}
$funAdvertsObj->url_back  = isset($_POST['url_back'])?$_POST['url_back']:$_SERVER['HTTP_REFERER'];
$funAdvertsObj->redirect($funAdvertsObj->url_back);
?>

 
  