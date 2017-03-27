<?php
@session_start();
include_once("../../includes/application_top.php");
$funObj->table  =  TABLE_ITEMS;
$funObj->action = isset( $_GET['action'] ) ? $_GET['action'] : "";
$funObj->aid    = isset( $_GET['aid'] )    ? decode($_GET['aid']) : ""; 
if(isset($_POST['submitBtn']))
{  
	foreach($_POST as $key=>$val)
    {  if($key != 'txtDescription') $$key= check($val); 
	   else $$key= check($val,1);   
    } 
	  $hidden_id      =  decode($hidden_id);
      $funObj->aid    =  !empty($hidden_id)?$hidden_id:0;
	  $funObj->action =  !empty($hidden_id)?'edit':'add';
	  
	  if(!empty($txtTitle)) $slug  = create_slug($txtTitle).'-'.$room_type; else $slug='';
	  $funObj->data  =  array("article_title"=>$txtTitle,
	                          "article_title_de"=>$txtTitle_de,
	                          "category"=>$category_id,
							  "slug"=>$slug,
							  "currency"=>$currency,
							  "price"=>$price,
							  "short_description"=>$txtShortDescription,
							  "short_description_de"=>$txtShortDescription_de,
							  "description"=>$txtDescription,
							  "description_de"=>$txtDescription_de,
							  "show_in_home_page"=>$chkHomepage,
							  "todays_special"=>$todays_special,
							  "special_block"=>$special_block,
							  "meta_keywords"=>$meta_keywords,
							  "meta_desc"=>$meta_desc,
							  "status"=>$status
							  );
						  
	$funObj->begin();
	if(empty($hidden_id)){
		        $funObj->data['added_date']	 = date("Y-m-d H:i:s");	
				$funObj->data['added_by']	 =  $_SESSION['pathsaleLoginId'];				
				$queryResult  = $funObj->insert();	
				$content_id   =  $funObj->insert_id();									
				set_flashdata('succesMesage',"Data has been inserted Successfully!!");
	}else{      $funObj->data['modified_date']	 = date("Y-m-d H:i:s");	
				$funObj->cond  =  array("id"=>$hidden_id);	
				$queryResult   =  $funObj->update();
				set_flashdata('succesMesage',"Data has been updated Successfully!!");
				$content_id  =  $hidden_id;	
	}	

             if(!$queryResult) { $funObj->rollback(); 
			 $_SESSION['succesMesage'] = "Action cannot place Occur due to some internal errors!!.
			                              Please try again";} else { 
	
	
	            //start storing the images				
				$funObj->table  =  TABLE_ITEM_DOWNLOAD;
				$countArticleImage  = count($_POST['image_arr']);
				if($countArticleImage>0){	
				
				$titleArr  =  array_filter($_POST['image_title']);
				$imgTitleArr =  array();
				if(count($titleArr)>0){ foreach($titleArr as $v)$imgTitleArr[] = $v;}				
								 
					 foreach($_POST['image_arr'] as $k=>$v){						  
						  $item_title  = $imgTitleArr[$k];
						  $funObj->data  =  array("food_item_id"=>$content_id,
											  "type"=>'image',
											  "item_title"=>$item_title,
											  "item_name"=>$v,
											  "item_desc"=>$item_title,
											  "status"=>1,
											  "created_date"=>date("Y-m-d H:i:s")
											  );
						  $funObj->table  =  TABLE_ITEM_DOWNLOAD;					  
						  $funObj->insert();					  
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
				// Image storing finished
					
				//start storing the Files				
				$funObj->table  =  TABLE_ITEM_DOWNLOAD;
				$countArticleFile  = count($_POST['file_arr']);
				if($countArticleFile>0){	
				
				$titleArr  =  array_filter($_POST['file_title']);
				$fileTitleArr =  array();
				if(count($titleArr)>0){ foreach($titleArr as $v)$fileTitleArr[] = $v;}				
								 
					 foreach($_POST['file_arr'] as $k=>$v){						  
						  $item_title  = $fileTitleArr[$k];
						  $funObj->data  =  array("food_item_id"=>$content_id,
											  "type"=>'file',
											  "item_title"=>$item_title,
											  "item_name"=>$v,
											  "item_desc"=>$item_title,
											  "status"=>1,
											  "created_date"=>date("Y-m-d H:i:s")
											  );
						  $funObj->table  =  TABLE_ITEM_DOWNLOAD;					  
						  $funObj->insert();					  
					 }					
				}
				$remaining_file = array_diff($_SESSION['selectedfiles'], $_POST['file_arr']);
                if(count($remaining_file)>0){
					foreach($remaining_file as $delfile){
						if(file_exists(FCPATH."uploads/files/items/".$delfile) and !empty($delfile)){
							unlink(FCPATH."uploads/files/items/".$delfile); 
							 } 
					}
				}
				unset($_SESSION['selectedfiles']);	
				// File storing finished
			  $funObj->table  =  TABLE_ITEMS;	
	          $funObj->commit();}
	
}else{ 
	         $funObj->begin();	
			 if(!empty($funObj->aid)){
				$resultImage 	=  $funContentsObj->file_items($funObj->aid);
				$resultfile  	=  $funContentsObj->file_items($funObj->aid,'file');
								
		//Delete the image first
		if($funObj->num_rows($resultImage )>0){
		  while($row_item =  $funObj->result($resultImage)){
			    $img =  $row_item->item_name;
				if(file_exists(FCPATH.'uploads/images/items/'.$img) and !empty($img)){ 
				 unlink(FCPATH.('uploads/images/items/'.$img));
				 $funObj->delete(TABLE_ITEM_DOWNLOAD,array('id'=>$row_item->id));
		      }//file exist
	         }//while
           }//if num
		
		//Delete the file now
		if($funObj->num_rows($resultfile )>0){
		  while($row_item =  $funObj->result($resultfile)){
			    $file =  $row_item->item_name;
				if(file_exists(FCPATH.'uploads/files/items/'.$file) and !empty($file)){ 
				unlink(FCPATH.('uploads/files/items/'.$file));
				$funObj->delete(TABLE_ITEM_DOWNLOAD,array('id'=>$row_item->id));
		      }//file exist
			  }//while
		   }//if num	
	   //Now delete the row of content	    	
			 $queryResult  =  $funObj->doAction(); 
			 if(!$queryResult) { $funObj->rollback(); 
			 $_SESSION['succesMesage'] = "Action cannot place Occur due to some internal errors!!.
										  Please try again";} else { $funObj->commit();}
		}	
}
$funObj->url_back  = $sitePathB."list-items";
redirect($funObj->url_back);
?>
