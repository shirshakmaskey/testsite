<?php
session_start();
include_once("../../includes/application_top.php");
$funObj->table  =  TABLE_EVENTS;
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
	  $special  = isset($special) ? 1 : 0;
	  if(!empty($txtTitle)) $slug  = create_slug($txtTitle); else $slug='';
	  $funObj->data  =  array("title"=>$txtTitle,
							  "slug"=>$slug,
							  "from_date"=>$from_date,
							  "to_date"=>$to_date,
							  "from_time"=>$from_time,
							  "to_time"=>$to_time,
							  "venue"=>$venue,
							  "special"=>$special,
							  "fees"=>$fees,
							  "short_description"=>$txtShortDescription,
							  "description"=>$txtDescription,
							  "category_id"=>isset($category_id)?$category_id:1,
							  "meta_keywords"=>$meta_keywords,
							  "meta_desc"=>$meta_desc,
							  "status"=>$status
							  );
						  
	$funObj->begin();
	if(empty($hidden_id)){
		        $funObj->data['created_at']	 = date("Y-m-d H:i:s");	
				$funObj->data['added_by']	 =  $_SESSION[ENCR_KEY.'pathsaleLoginId'];				
				$queryResult  =  $funObj->insert();	
				$events_id      =  $funObj->insert_id();											
				set_flashdata('succesMesage',"Data has been inserted Successfully!!");
	}else{      $funObj->data['modified_at']	 = date("Y-m-d H:i:s");	
				$funObj->cond  =  array("id"=>$hidden_id);	
				$queryResult   =  $funObj->update();
				set_flashdata('succesMesage',"Data has been updated Successfully!!");
				$events_id  =  $hidden_id;	
	}	

             if(!$queryResult) { $funObj->rollback(); 
			 $_SESSION['successMsg'] = "Action cannot place Occur due to some internal errors!!.
			                              Please try again";} else { 
	
	
	            //start storing the images				
				
				$countArticleImage  = count($_POST['image_arr']);
				if($countArticleImage>0){	
				
				$titleArr  =  array_filter($_POST['image_title']);
				$imgTitleArr =  array();
				if(count($titleArr)>0){ foreach($titleArr as $v)$imgTitleArr[] = $v;}				
								 
					 foreach($_POST['image_arr'] as $k=>$v){		
					 $funObj->table  =  TABLE_ITEM_DOWNLOAD;		  
						  $item_title  = $imgTitleArr[$k];
						  $funObj->data  =  array("events_id"=>$events_id,
											  "type"=>'image',
											  "item_title"=>$item_title,
											  "item_name"=>$v,
											  "item_desc"=>$item_title,
											  "status"=>1,
											  "created_date"=>date("Y-m-d H:i:s")
											  );
						  $funObj->insert();					  
					 }					
				}
				
				$remaining = array_diff($_SESSION['imageFiles'], $_POST['image_arr']);
                if(count($remaining)>0){
					foreach($remaining as $delImg){
						if(file_exists(FCPATH."uploads/images/events/".$delImg) and !empty($delImg)){
							unlink(FCPATH."uploads/images/events/".$delImg); 
							 } 
					}
				}
				unset($_SESSION['imageFiles']);	
				// Image storing finished
					
				//start storing the Files				
				
				$countArticleFile  = count($_POST['file_arr']);
				if($countArticleFile>0){	
				
				$titleArr  =  array_filter($_POST['file_title']);
				$fileTitleArr =  array();
				if(count($titleArr)>0){ foreach($titleArr as $v)$fileTitleArr[] = $v;}				
								 
					 foreach($_POST['file_arr'] as $k=>$v){			
					 $funObj->table  =  TABLE_ITEM_DOWNLOAD;		  
						  $item_title  = $fileTitleArr[$k];
						  $funObj->data  =  array("events_id"=>$events_id,
											  "type"=>'file',
											  "item_title"=>$item_title,
											  "item_name"=>$v,
											  "item_desc"=>$item_title,
											  "status"=>1,
											  "created_date"=>date("Y-m-d H:i:s")
											  );
						  $funObj->insert();					  
					 }					
				}
				$remaining_file = array_diff($_SESSION['selectedfiles'], $_POST['file_arr']);
                if(count($remaining_file)>0){
					foreach($remaining_file as $delfile){
						if(file_exists(FCPATH."uploads/files/events/".$delfile) and !empty($delfile)){
							unlink(FCPATH."uploads/files/events/".$delfile); 
							 } 
					}
				}
				unset($_SESSION['selectedfiles']);	
				// File storing finished
				
	          $funObj->commit();if(!empty($back_again)){$funObj->redirect($_SERVER['HTTP_REFERER']);}
			}
	
}else{ 
	         $funObj->begin();	
			 if(!empty($funObj->aid)){
				$resultImage 	=  $funEventsObj->file_items($funObj->aid);
				$resultfile  	=  $funEventsObj->file_items($funObj->aid,'file');
								
		//Delete the image first
		if($funObj->num_rows($resultImage )>0){
		  while($row_item =  $funObj->result($resultImage)){
			    $img =  $row_item->item_name;
				if(file_exists(FCPATH.'uploads/images/events/'.$img) and !empty($img)){ 
				 unlink(FCPATH.('uploads/images/events/'.$img));
				 $funObj->delete(TABLE_ITEM_DOWNLOAD,array('id'=>$row_item->id));
		      }//file exist
	         }//while
           }//if num
		
		//Delete the file now
		if($funObj->num_rows($resultfile )>0){
		  while($row_item =  $funObj->result($resultfile)){
			    $file =  $row_item->item_name;
				if(file_exists(FCPATH.'uploads/files/events/'.$file) and !empty($file)){ 
				unlink(FCPATH.('uploads/files/events/'.$file));
				$funObj->delete(TABLE_ITEM_DOWNLOAD,array('id'=>$row_item->id));
		      }//file exist
			  }//while
		   }//if num	
	   //Now delete the row of content	    	
			 $queryResult  =  $funObj->doAction(); 
			 if(!$queryResult) { $funObj->rollback(); 
			 $_SESSION['successMsg'] = "Action cannot place Occur due to some internal errors!!.
										  Please try again";} else { $funObj->commit();}
		}	
}
$funObj->url_back  = $sitePathB."list-events";
redirect($funObj->url_back);
?>
