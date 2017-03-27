<?php
session_start();
include_once("../../includes/application_top.php");
$funObj->action = isset( $_GET['action'] ) ? $_GET['action'] : "";
$funObj->aid    = isset( $_GET['aid'] )    ? decode($_GET['aid']) : ""; 
$funObj->table  = TABLE_CONFIGURATION;

if( isset( $_POST['submitBtn'] ) )
{
  include("../mod_setAndCheckAll/checkToken.php");	
   foreach($_POST as $key=>$val)
   {  $$key=check($val);   } 
   
      $hidden_id      =  decode($hidden_id);
      $funObj->aid    =  !empty($hidden_id)?$hidden_id:0;
	  $funObj->action =  !empty($hidden_id)?'edit':'add';

    if(empty($configname)) { $configname = $previous_configname; }
      $funObj->data  =   array("configname"=>$configname,
	                        "configdesc"=>$configdesc,
							"configtype"=>$configtype,
							"configdesc"=>$configdesc,
							"status"=> 1
						   ); 
       if( $configtype=='file' or $configtype=='image'){
            $image_file   =  $_FILES['configvalue_file']['name'];
		   if(!empty($image_file))
		   {
		     $image_file_temp   =  $_FILES['configvalue_file']['tmp_name'];
			 $image_file        =   randomkeys(7).$image_file;
			 move_uploaded_file($image_file_temp,FCPATH."uploads/config/".$image_file); 
			 if(!empty($hidden_id)){
                 $row   = $funSettingObj -> configurationPageSel($hidden_id);
                 $config_image_file   =  $row->configvalue;
                 if(file_exists(FCPATH."uploads/config/".$config_image_file) and !empty($config_image_file)){
                 	unlink(FCPATH."uploads/config/".$config_image_file);
                 }
			 }
			$funObj->data['configvalue']  =  $image_file; 
		   }
       }else{
       	   $funObj->data['configvalue']  =  $configvalue;  
       }   
	   
	   //print_r($funObj->data); die();
		
	         $funObj->begin();		
	         $queryResult  =  $funObj->doAction(); 
              
                               if(!$queryResult) { $funObj->rollback(); $_SESSION['successMsg'] = "Action cannot place Occur due to some internal errors!!.Please try again";
			                    } else { $funObj->commit();  }
			 
			

}
else 
{       $funObj->begin();
        $queryResult  =  $funObj->doAction();
		  
		   if(!$queryResult) { $funObj->rollback(); $_SESSION['successMsg'] = "Transaction can place Occur due to some internal errors!!";
			                    } else { $funObj->commit();  }
}

$funObj->redirect($sitePathB."configurationpage-setting");
?>