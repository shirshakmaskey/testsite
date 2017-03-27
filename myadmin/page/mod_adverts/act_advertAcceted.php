<?php
session_start();
include_once("../../includes/application_top.php");
$funAdvertsObj->action = isset( $_GET['action'] ) ? $_GET['action'] : "";

$funAdvertsObj->aid  =isset( $_GET['aid'] ) ? $_GET['aid'] : ""; 

$funAdvertsObj->table=TABLE_ADVERTISEMENT_SPACE;
if(isset($_POST['Save_x']))
{
	include("../mod_setAndCheckAll/checkToken.php");
	foreach($_POST as $key=>$val)
   {  $$key=$funAdvertsObj->check($val);   } 
   
    $advert_image   =  $_FILES['image']['name'];
   if(!empty($advert_image))
   {
     $image_temp   =  $_FILES['image']['tmp_name'];
	 $advert_image  =  $funAdvertsObj->randomkeys(7).$advert_image;
	  $request_url  =  explode("/",$_SERVER['PHP_SELF']);	  
	 $imgrootpath = $_SERVER['DOCUMENT_ROOT'].$request_url[1]."/images/advertisement/"; 
	 move_uploaded_file($image_temp,$imgrootpath.$advert_image); 
	 unlink($imgrootpath.$old_image);
   }
   else
   {
	$advert_image  = $old_image;   
   }
   
  
	 	 	 	 	 	 	 							
	$message   =  mysql_real_escape_string(stripslashes($_POST['message']));
   $funAdvertsObj->data =array(
						"advert_type"=>$advert_type,
						"image"=>$advert_image,
						"message"=>$message,
						"accept"=>1,						
						"payment"=>"$payment",
						"status"=>1,
						"expiredate"=>$expiredate,
						"advert_url"=>$advert_url						
						 ); 

	         $funAdvertsObj->begin();		
	         $queryResult  =  $funAdvertsObj->doAction(); 
              
                               if(!$queryResult) { $funAdvertsObj->rollback(); $_SESSION['succesMesage'] = "Action cannot place Occur due to some internal errors!!.Please try again";
			                    } else { $funAdvertsObj->commit();  }
	
}




if(  $_GET['action'] =='delete' )
{     
			 $rowEdit   = $funAdvertsObj -> advertisementRequestSel($funAdvertsObj->aid);
			 	  $request_url  =  explode("/",$_SERVER['PHP_SELF']);
				 $FilePath  =  $_SERVER['DOCUMENT_ROOT'].$request_url[1]."/images/advertisement/";
					  $old_file  =  $rowEdit->image; 
					  if(!empty($old_file))
						{ unlink($FilePath."/".$old_file); }
			  $queryResult  =  $funAdvertsObj->doAction();			  		if(!$queryResult) { $funAdvertsObj->rollback(); $_SESSION['succesMesage'] = "Action cannot place Occur due to some internal errors!!.Please try again";
			                    } else { $funAdvertsObj->commit();  }	 
	 
}
 

$funAdvertsObj->url_back  = "../../index.php?_page=advertiseAccepted&mod=adverts";
$funAdvertsObj->redirect($funAdvertsObj->url_back);
?>