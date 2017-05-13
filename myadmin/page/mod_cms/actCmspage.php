<?php
session_start();
include_once("../../includes/application_top.php");
if($_GET['action']=='view') { $_GET['action']='edit'; }
$funObj->action = isset( $_GET['action'] ) ? $_GET['action'] : "";
$funObj->aid  =isset( $_GET['aid'] ) ? $_GET['aid'] : ""; 
$funObj->table=TABLE_STATIC;


if( isset( $_POST['Save_x'] ) )
{  
   foreach($_POST as $key=>$val)
   {  $$key=$funObj->check($val);   }
   $pagedescription = mysql_real_escape_string( stripslashes($_POST['pagedescription'])); 	
   $funObj->data =array("pagename"=>$pagename,
                        "pagetitle"=>$pagetitle,
						"pagedescription"=> htmlentities($pagedescription),
						"metasubject"=>$metasubject,
                        "metakeyword"=>$metakeyword,
						"metadesc"=>$metadesc                       
					   ); 
						
	         $funObj->begin();		
	         $queryResult  =  $funObj->doAction(); 
             if(!$queryResult) { $funObj->rollback(); 
			 $_SESSION['succesMesage'] = "Action cannot place Occur due to some internal errors!!.
			                              Please try again";} else { $funObj->commit();} 
}
else
{            $funObj->begin();		
	         $queryResult  =  $funObj->doAction(); 
             if(!$queryResult) { $funObj->rollback(); 
			 $_SESSION['succesMesage'] = "Action cannot place Occur due to some internal errors!!.
			                              Please try again";} else { $funObj->commit();}
}
$funObj->url_back  = $sitePathB."index.php?_page=cmspage&mod=cms";
$funObj->redirect($funObj->url_back);
?>