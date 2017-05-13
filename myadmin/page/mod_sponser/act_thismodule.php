<?php
session_start();
include_once("../../includes/application_top.php");
$funObj->table  =  TABLE_SPONSER;
$funObj->action = isset( $_GET['action'] ) ? $_GET['action'] : "";
$funObj->aid    = isset( $_GET['aid'] )    ? $_GET['aid'] : ""; 
if(isset($_POST['submitBtn']))
{              
				
					$hidden_id	=	$_POST['hidden_id'];
					
					foreach($_POST as $key=>$val)
                    {  $$key=$funObj->check($val);   }
					if(!empty($block_title)){
					   $slug  = create_slug($block_title);
	                }				
					if(empty($image_arr)){
					  $image_arr  =  $old_image_arr;	
					}
						
					$funObj->data = array('block_name'=>$block_name,
					                      'block_title'=>$block_title, 
										  
					                      'slug'=>$slug,
							  		  	  'position'=>$position,
										  'short_description'=>$short_description,
										  
										  'description'=>$txtDescription,
										  
										  'image'=>$image_arr,
										  'url_link'=>$url_link,
										  'link_type'=>$link_type, 
									 	  'status'=>'1'
							 			  );  
			  
					if(empty($hidden_id))
					{ $funObj->data['sortorder'] = $funSponserObj->find_maximum();
					$funObj->insert();
					set_flashdata('successMsg','Data has been added.');	
					}
					else
					{
						$funObj->data['sortorder'] = $sortorder;  	
					$funObj->cond  =  array("id"=>$hidden_id);
					$funObj->update();
					set_flashdata('successMsg','Data has been updated.');				
					}
			
		    unset($_SESSION['imageFiles']);	
			
			if(!empty($back_again))
			{$funObj->redirect($_SERVER['HTTP_REFERER']);}
				
				
}else{
	  $aid	=	$_GET['aid'];
	  $row  =  $funSponserObj->find_item_by_id($aid);
	  $img =  $row->image;
		if(file_exists(FCPATH.'uploads/images/sponser/'.$img) and !empty($img)){ 
		 unlink(FCPATH.('uploads/images/sponser/'.$img));
	  }//file exist
	
	$funObj->cond  =  array("id"=>$aid);
	$funObj->delete();
	set_flashdata('successMsg',"Data has been deleted!!");
}
$funObj->url_back  = $sitePathB."list-sponser";
redirect($funObj->url_back);
?>