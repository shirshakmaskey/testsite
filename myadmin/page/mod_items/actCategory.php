<?php
session_start();
include_once("../../includes/application_top.php");
if($_GET['action']=='view') { $_GET['action']='edit'; }
$funObj->action = isset($_GET['action']) ? $_GET['action'] :"";
$funObj->aid  = isset( $_GET['aid'] ) ? $_GET['aid'] : "";
$funObj->table=TABLE_CATEGORY_ITEMS;

if( isset( $_POST['Save_x'] ) or isset( $_POST['Save'] ) )
{
	   include("../mod_setAndCheckAll/checkToken.php");
   foreach($_POST as $key=>$val)
   {  $$key=$funObj->check($val);   }
	
	if(!empty($category_name)){
		   $slug  = create_slug($category_name);
	  }
	  
	            $catImage = "";
                //start storing the images				
				$countArticleImage  = count($_POST['image_arr']);
				if($countArticleImage>0){					
					 foreach($_POST['image_arr'] as $k=>$v){						  
						  $catImage  =  $v;					  
					 }					
				}			
				
				$remaining = array_diff($_SESSION['imageFiles'], $_POST['image_arr']);
                if(count($remaining)>0){
					foreach($remaining as $delImg){
						if(file_exists(FCPATH."uploads/images/items/".$delImg) and !empty($delImg)){
							unlink(FCPATH."uploads/images/items/".$delImg); 
							 } 
					}
				}
				unset($_SESSION['imageFiles']);	
				//Image storing finished	  
	              
				  $special  =  isset($special)?1:0;
				  
				   $funObj->data =array("slug"=>$slug,
				                        "parent_id"=>$parent_id,
										"category_name"=>$category_name,
										"category_name_de"=>$category_name_de,
										"description"=>$description,
										"description_de"=>$description_de,
										"image"=>$catImage,
										"status"=>$status,
										"special"=>$special
										); 
						
	         $funObj->begin();		
	         $queryResult  =  $funObj->doAction(); 
              
                               if(!$queryResult) { $funObj->rollback(); $_SESSION['succesMesage'] = "Action cannot place Occur due to some internal errors!!.Please try again";
			                    } else { $funObj->commit(); 
								if(!empty($back_again))
			{$funObj->redirect($_SERVER['HTTP_REFERER']);}
								}
			 
			

}
else
{       $funObj->begin();
        $queryResult  =  $funObj->doAction();	 
		$funObj->deleteChildTableRow( $funObj->aid, "package_type_id", TABLE_PACKAGE);
		if(!$queryResult) { $funObj->rollback(); $_SESSION['succesMesage'] = "Transaction can place Occur due to some internal errors!!";
			                    } else { $funObj->commit();  }
}

$funObj->url_back  = $sitePathB."index.php?_page=category&mod=items";
$funObj->redirect($funObj->url_back);
?>