<?php
session_start();
include_once("../../includes/application_top.php");
$funObj->table  =  TABLE_EVENT_TYPE;
$funObj->action = isset( $_GET['action'] ) ? $_GET['action'] : "";
$funObj->aid    = isset( $_GET['aid'] )    ? decode($_GET['aid']) : ""; 
if(isset($_POST['submitBtn']))
{  
   include("../mod_setAndCheckAll/checkToken.php"); 	  	 	 	 	 	 	 	 	 	  	 	 	 	 	 	
   foreach($_POST as $key=>$val)
    {  if($key != 'txtDescription') $$key= check($val); 
	   else $$key= check($val,1);   
    } 
	  $hidden_id      =  decode($hidden_id);
      $funObj->aid    =  !empty($hidden_id)?$hidden_id:0;
	  $funObj->action =  !empty($hidden_id)?'edit':'add';	 	
	
	if(!empty($title)) $slug  = create_slug($title); else $slug='';
       $funObj->data =array("slug"=>$slug,
                            "title"=>$title,
						    "description"=>$description,
						    "status"=>$status
						    ); 				
   
		
	if(empty($hidden_id)){
		        $funObj->data['created_at']	     =  fulldate();	
				$funObj->data['added_by']	     =  $_SESSION[ENCR_KEY.'pathsaleLoginId'];				
				$queryResult  = $funObj->insert();	
				$event_id     =  $db->insert_id();										
				set_flashdata('succesMesage',"Data has been inserted Successfully!!");
	}else{      $funObj->data['modified_at']	 =  fulldate();	
				$funObj->cond  =  array("id"=>$hidden_id);	
				$queryResult   =  $funObj->update();
				set_flashdata('succesMesage',"Data has been updated Successfully!!");
				$news_id  =  $hidden_id;	
	}	

             if(!$queryResult) { $funObj->rollback(); 
			 $_SESSION['successMsg'] = "Action cannot place Occur due to some internal errors!!.
			                              Please try again";
									} else { $funObj->commit();}
}else
{       $funObj->begin();
        $funObj->deleteChildTableRow( $funObj->aid, "category_id", TABLE_NEWS);$funObj->begin();
		$funObj->table  =  TABLE_EVENT_TYPE;
        $queryResult    =  $funObj->doAction();	 
		if(!$queryResult) { 
		    $funObj->rollback(); 
			$_SESSION['successMsg'] = "Transaction can place Occur due to some internal errors!!";
	     } else { $funObj->commit();  }
}
$funObj->url_back  = $sitePathB."type-events";
redirect($funObj->url_back);
?>