<?php
session_start();
include_once("../../includes/application_top.php");
$funObj->action = isset( $_GET['action'] ) ? $_GET['action'] : "";
$funObj->aid    = isset( $_GET['aid'] )    ? decode($_GET['aid']) : ""; 
$funObj->table  = TABLE_SEO;

if( isset( $_POST['submitBtn'] ) )
{
  include("../mod_setAndCheckAll/checkToken.php");	
   foreach($_POST as $key=>$val)
   {  $$key=check($val);   } 
   
      $hidden_id      =  decode($hidden_id);
      $funObj->aid    =  !empty($hidden_id)?$hidden_id:0;
	  $funObj->action =  !empty($hidden_id)?'edit':'add';
    
 	
	
   $funObj->data =array("keywords"=>$keywords,
                        "metasubject"=>$metasubject,  
                        "metakeyword"=>$metakeyword,
						"metadesc"=> $metadesc,  
						"metaabstract"=>$metaabstract,
                        "metakeyphrase"=>$metakeyphrase,
						"metaclassification"=> $metaclassification,  
						"copyright"=>$copyright,
                        "metacatagory"=>$metacatagory,
						"reply_to"=> $replyto,  
						"author"=>$author
                        ); 				
						
	         $funObj->begin();		
	         $queryResult  =  $funObj->doAction(); 
              
                               if(!$queryResult) { $funObj->rollback(); $_SESSION['successMsg'] = "Action cannot place Occur due to some internal errors!!.Please try again";
			                    } else { $funObj->commit();  }
			 
			

}
else
{         $funObj->begin();
        $queryResult  =  $funObj->doAction();
		  
		   if(!$queryResult) { $funObj->rollback(); $_SESSION['successMsg'] = "Transaction can place Occur due to some internal errors!!";
			                    } else { $funObj->commit();  }
}

$funObj->redirect($sitePathB."seopage-setting");
?>