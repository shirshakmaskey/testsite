<?php
session_start();
include_once("../../includes/application_top.php");
if($_GET['action']=='view') { $_GET['action']='edit'; }
$funLinkObj->action = isset($_GET['action']) ? $_GET['action'] :"";
$funLinkObj->aid  = isset( $_GET['aid'] ) ? $_GET['aid'] : "";
$funLinkObj->table=TABLE_LINKS;

if( isset( $_POST['Save_x'] ) )
{
	   include("../mod_setAndCheckAll/checkToken.php");
   foreach($_POST as $key=>$val)
   {  $$key=$funLinkObj->check($val);   } 
   
  
	 	 	 	 	 	 	 							
	
   $funLinkObj->data =array("link_title"=>$link_title,
						"link_desc"=>$link_desc,
						"link_url"=>$link_url,
						"added_date"=>date("Y-m-d"),
						"status"=>$status
						 ); 
						
	         $funLinkObj->begin();		
	         $queryResult  =  $funLinkObj->doAction(); 
              
                               if(!$queryResult) { $funLinkObj->rollback(); $_SESSION['succesMesage'] = "Action cannot place Occur due to some internal errors!!.Please try again";
			                    } else { $funLinkObj->commit();  }
			 
			

}
else
{       $funLinkObj->begin();
        $queryResult  =  $funLinkObj->doAction();	 
		   if(!$queryResult) { $funLinkObj->rollback(); $_SESSION['succesMesage'] = "Transaction can place Occur due to some internal errors!!";
			                    } else { $funLinkObj->commit();  }
}

$funLinkObj->disconnect_db();
$funLinkObj->url_back  =isset($_POST['url_back'])?$_POST['url_back']:$_SERVER['HTTP_REFERER'];
$funLinkObj->redirect($funLinkObj->url_back);
?>