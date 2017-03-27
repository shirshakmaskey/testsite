<?php
@session_start();
include_once("../../includes/application_top.php");
$funObj->table  =  TABLE_CONTENTS;
$funObj->action = isset( $_GET['action'] ) ? $_GET['action'] : "";
$funObj->aid    = isset( $_GET['aid'] )    ? decode($_GET['aid']) : ""; 
if(isset($_POST['submitBtn']))
{  
	foreach($_POST as $key=>$val)
    {  if($key != 'txtDescription') $$key= @check($val); 
	   else $$key= check($val,1);   
    } 
	  $hidden_id      =  decode($hidden_id);
      $funObj->aid    =  !empty($hidden_id)?$hidden_id:0;
	  $funObj->action =  !empty($hidden_id)?'edit':'add';


	  //start storing the banner image				
				$banner  = @($_POST['image_banner_arr']);
                $banner_title  =  @($_POST['image_banner_title_'.substr($banner,0,5)]);
		
				if(empty($banner)){ $banner =  '';	$banner_title =  '';}
				$remaining = @array_diff($_SESSION['imageBannerFiles'], array("$banner"));
                if(count($remaining)>0){
					foreach($remaining as $delImg){
						if(file_exists(FCPATH."uploads/images/contents/".$delImg) and !empty($delImg)){
							unlink(FCPATH."uploads/images/contents/".$delImg); 
							 }}}
				unset($_SESSION['imageBannerFiles']);	
				// Image Banner storing finished
	  
	  if(!empty($txtTitle)) $slug  = create_slug($txtTitle); else $slug='';
	  $chkHomepage    =  isset($chkHomepage)?1:0;
	  if(empty($meta_keywords)){
		if(!empty($txtShortDescription)){$meta_keywords=implode(",",explode(" ",$txtShortDescription));}
	  }
	  if(empty($meta_desc)){
		if(!empty($txtDescription)){$meta_desc=substr($txtDescription,0,100);}
	  }
	  $feature = isset($feature) ? 1 : 0;
	  $funObj->data  =  array("article_title"  		=>	$txtTitle,
							  "slug"				=>	$slug,
							  "post_type"			=>	$post_type,
							  "short_description"	=>	$txtShortDescription,
							  "description"			=>	$txtDescription,
							  "show_in_home_page"	=>	$chkHomepage,
							  "feature"	            =>	$feature,
							  "meta_keywords"		=>	$meta_keywords,
							  "meta_desc"			=>	$meta_desc,
							  "status"=>$status
							  );
	 if(!empty($banner)){
		     $funObj->data['banner']  =  $banner;
			 $funObj->data['banner_title']  =  $banner_title;
		  }							  
	 if(!empty($layout)){
		     $funObj->data['layout']  =  $layout;
		  }		 
	  if($post_type=='page'){
		     $funObj->data['post_parent']  =  $post_parent;
		  }						  
						  
	$funObj->begin();
	if(empty($hidden_id)){
		        $funObj->data['created_at']	     =  fulldate();	
				$funObj->data['created_by']	     =  login_id();					
				$queryResult  = $funObj->insert();	
				$content_id   =  $funObj->insert_id();										
				set_flashdata('succesMesage',"Data has been inserted Successfully!!");
	}else{      $funObj->data['modified_at']	 =  fulldate();	
	            $funObj->data['modified_by']	 =  login_group();
				$funObj->cond  =  array("id"=>$hidden_id);	
				$queryResult   =  $funObj->update();
				set_flashdata('succesMesage',"Data has been updated Successfully!!");
				$content_id  =  $hidden_id;	
	}	

             if(!$queryResult) { $funObj->rollback(); 
			 $_SESSION['succesMesage'] = "Action cannot place Occur due to some internal errors!!.
			                              Please try again";} else { 
	         
			 
			 if($post_type!='page'){
				 $sql  =  "DELETE FROM ".TABLE_POST_CATEGORY_TAXONOMY." where post_id='$content_id' AND types='contents'";$db->execute($sql);
				 $sql  =  "DELETE FROM ".TABLE_POST_CATEGORY_TAXONOMY." where post_id='$content_id' AND types='post'";$db->execute($sql);
		        foreach($_POST['category_id'] as $kkk=>$vvv){ 
				    $funObj->table       =  TABLE_POST_CATEGORY_TAXONOMY; 
				    $funObj->data        =  array("post_id"    => $content_id,
											      "category_id"=> $vvv,
											      "types"      => 'post'
											      );
				    $db->insert();
				}
		      }
			 
	
	            //start storing the images				
				$countArticleImage  = count($_POST['image_arr']);
				if($countArticleImage>0){	
				
				$titleArr  =  array_filter($_POST['image_title']);
				$imgTitleArr =  array();
				if(count($titleArr)>0){ foreach($titleArr as $v)$imgTitleArr[] = $v;}				
								 
					 foreach($_POST['image_arr'] as $k=>$v){	
					      $funObj->table  =  TABLE_ITEM_DOWNLOAD;						  
						  $item_title  = $imgTitleArr[$k];
						  $funObj->data  =  array("content_id"=>$content_id,
											  "type"=>'image',
											  "item_title"=>$item_title,
											  "item_name"=>$v,
											  "item_desc"=>$item_title,
											  "status"=>1,
											  "created_date"=>$funObj->fulldate()
											  );
						  $funObj->table  =  TABLE_ITEM_DOWNLOAD;					  
						  $funObj->insert();					  
					 }					
				}
				
				
				
				
				$remaining = array_diff($_SESSION['imageFiles'], $_POST['image_arr']);
                if(count($remaining)>0){
					foreach($remaining as $delImg){
						if(file_exists(FCPATH."uploads/images/contents/".$delImg) and !empty($delImg)){
							unlink(FCPATH."uploads/images/contents/".$delImg); 
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
						  $funObj->data  =  array("content_id"=>$content_id,
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
						if(file_exists(FCPATH."uploads/files/contents/".$delfile) and !empty($delfile)){
							unlink(FCPATH."uploads/files/contents/".$delfile); 
							 } 
					}
				}
				unset($_SESSION['selectedfiles']);	
				// File storing finished
				
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
				if(file_exists(FCPATH.'uploads/images/contents/'.$img) and !empty($img)){ 
				 unlink(FCPATH.('uploads/images/contents/'.$img));
				 $funObj->delete(TABLE_ITEM_DOWNLOAD,array('id'=>$row_item->id));
		      }//file exist
	         }//while
           }//if num
		
		//Delete the file now
		if($funObj->num_rows($resultfile )>0){
		  while($row_item =  $funObj->result($resultfile)){
			    $file =  $row_item->item_name;
				if(file_exists(FCPATH.'uploads/files/contents/'.$file) and !empty($file)){ 
				unlink(FCPATH.('uploads/files/contents/'.$file));
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
$funObj->url_back  = $sitePathB."list-contents";
redirect($funObj->url_back);
?>
