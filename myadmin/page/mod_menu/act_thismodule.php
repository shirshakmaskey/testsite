<?php
session_start();
include_once("../../includes/application_top.php");
$funObj->table  =  TABLE_MENU;
$funObj->action = isset( $_GET['action'] ) ? $_GET['action'] : "";
$funObj->aid    = isset( $_GET['aid'] )    ? decode($_GET['aid']) : ""; 

if(isset($_POST['submitBtn']))
{  
	foreach($_POST as $key=>$val)
    {  $$key= check($val);   
    } 
	  $hidden_id      =  decode($hidden_id);
      $funObj->aid    =  !empty($hidden_id)?$hidden_id:0;
	  $funObj->action =  !empty($hidden_id)?'edit':'add';
  
	      $funObj->data  =  array("menu_type"=>$menu_type,
								  "category"=>$listCat,
								  "name"=>$txtmName,
								 
								  "parent_id"=>$parent_id,
								  "article_page"=>$pages,
								  "menu_link"=>$txtmLink,
								  "link_type"=>$txtltype,
								  "status"=>$status
								  );
	         $funObj->begin();
	         $queryResult  =  $funObj->doAction(); 
	         if(!$queryResult) { $funObj->rollback(); 
			 $_SESSION['succesMesage'] = "Action cannot place Occur due to some internal errors!!.
			                              Please try again";} else { $funObj->commit();
										  if(!empty($back_again))
			{$funObj->redirect($_SERVER['HTTP_REFERER']);}										  
										  }
	
}else{ 
	         $funObj->begin();	
			 $queryResult  =  $funObj->doAction(); 
			 if(!$queryResult) { $funObj->rollback(); 
			 $_SESSION['succesMesage'] = "Action cannot place Occur due to some internal errors!!.
										  Please try again";} else { $funObj->commit();}
}
$funObj->url_back  = $sitePathB."list-menu";
redirect($funObj->url_back);
?>

<?php
/*session_start();
require($_SESSION['doc_url']."includes/application_top.php");
$db->table  =  "tbl_menu";
if(isset($_POST['submitBtn']))
{
	foreach($_POST as $key=>$val){
		$$key  =  $val;
	}
	
	  $db->data  =  array("menu_type"=>$menu_type,
	  					  "category"=>$listCat,
	  					  "name"=>$txtmName,
						  "parent_id"=>$parent_id,
						  "article_page"=>$pages,
						  "menu_link"=>$txtmLink,
						  "link_type"=>$txtltype,
						  "status"=>$status
						  );
	if(empty($hidden_id)){					
				$db->insert();					
				set_flashdata('successMsg',"Data has been inserted Successfully!!");
	}else{
				$db->cond  =  array("id"=>$hidden_id);	
				$db->update();
				set_flashdata('successMsg',"Data has been updated Successfully!!");	
	}	
	
}else{
	$id =  $_REQUEST['id'];
	$db->cond  =  array("id"=>$id);	
	$db->delete();
	set_flashdata('successMsg',"Data has been deleted Successfully!!");	
}
redirect(base_url('myadmin/menu-list'));*/
?>
