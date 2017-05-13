<?php
session_start();
include_once("../../includes/application_top.php");
error_reporting(E_ALL);
ini_set('display_errors',1);
$funObj->table  =  "tbl_user_items";
$funObj->action = isset( $_GET['action'] ) ? $_GET['action'] : "";
$funObj->aid    = isset( $_GET['aid'] )    ? $_GET['aid'] : ""; 
if(isset($_POST['submitBtn']))
{              
				$title_arr	        =	@array_filter($_POST['image_title']);				
				$content_arr	    =	@array_filter($_POST['image_content']);
				$imageTitleArr	    =	array();
				$contentArr		    =	array();
				if(count($title_arr)>0){foreach($title_arr as $key=>$val)$imageTitleArr[]=mysqli_real_escape_string($db->conn_id,$val);}			
				if(count($content_arr)>0){foreach($content_arr as $key =>$val)$contentArr[]=mysqli_real_escape_string($db->conn_id,$val);}
				$pid  =  $_POST['user_id'];

				foreach($_POST['image_arr'] as $key => $val)	
				{	$hidden_id	    =	$_POST['hidden_id'];
					$item_title	    =	$imageTitleArr[$key];					
					$item_content	=	$contentArr[$key];
			$item_slug   =   create_slug($item_title);		
			$funObj->data  		 =  array('user_id'=>$pid,
				                          'pid'=>0,
					                      'item_title'  => $item_title,
					                      'item_detail' => $item_content,
					                      'item_slug'   => $item_slug,	                  
										  'item_file'   => $val,
										  'item_type'   => 'image',
									 	  'status'      => '1'
							 			  );                 
			  
					if(empty($hidden_id))
					{ 					
					$funObj->table  =  "tbl_user_items";
					$funObj->insert();
					set_flashdata('successMsg','Image have been added.');	
					}
					else
					{	
                        //pr($funObj->data);die();
						$funObj->table  =  "tbl_user_items";						
						$funObj->cond  =  array("id"=>$hidden_id);
						$funObj->update();
						set_flashdata('successMsg','Image have been updated.');			
					}
				}
				
			$remaining=	@array_diff($_SESSION['imageFiles'], $_POST['image_arr']);
			if(count($remaining)>0)
			{
			    foreach($remaining as $delImg)
			    {
	if(file_exists(FCPATH."uploads/images/members/".$pid."/".$delImg) and !empty($delImg))
	{ unlink(FCPATH."uploads/images/members/".$pid."/".$delImg);}
				}	
			}		
		    unset($_SESSION['imageFiles']);					
				
}else{
	  $aid	    =  $_GET['aid'];
	  $row      =  $funMemberObj->find_item_by_id($aid);
	  //pr($row);
	  $img      =  $row->item_file;
	  $pid  =  $row->user_id;
		if(file_exists(FCPATH.'uploads/images/members/'.$pid.'/'.$img) and !empty($img)){ 
		 unlink(FCPATH.('uploads/images/members/'.$pid.'/'.$img));
	  }//file exist
	
	$funObj->cond  =  array("id"=>$aid);
	$funObj->delete();
	set_flashdata('successMsg',"Data has been deleted!!");
}
$funObj->url_back  = $sitePathB."gallery-member-".$pid;
redirect($funObj->url_back);
?>