<?php
session_start();
include_once("../../includes/application_top.php");
$funObj->action   = @isset($_GET['action']) ? $_GET['action'] :"";
$funObj->aid      = isset( $_GET['aid'] )    ? decode($_GET['aid']) : "";
$funObj->table    = 'tbl_customer';
$branch_id        =  $funUserObj->current_branch();
if( isset( $_POST['submitBtn'] ) )
{
   include("../mod_setAndCheckAll/checkToken.php");
   foreach($_POST as $key=>$val)
   {  $$key   =  $funObj->check($val);   }
      $hidden_id      =  decode($hidden_id);
      $funObj->aid    =  !empty($hidden_id)?$hidden_id:0;
	  $funObj->action =  !empty($hidden_id)?'edit':'add';
      $access_code =  strtotime(date("Y-m-d H:i:s"));

if(!file_exists(FCPATH.'uploads/images/customer')){
   mkdir(FCPATH.'uploads/images/customer/');
}

//upload image and certificate
$image   =  $_FILES['image']['name'];
$error       =  $_FILES['image']['error'];
if(!empty($image) and $error==0){
  $tmp_name   =  $_FILES['image']['tmp_name'];
  $image  =  salt(5).$image;
  move_uploaded_file($tmp_name,FCPATH.'uploads/images/customer/'.$image); 
}   

// $certificate   =  $_FILES['certificate']['name'];
// $error       =  $_FILES['certificate']['error'];
// if(!empty($certificate) and $error==0){
//   $tmp_name   =  $_FILES['certificate']['tmp_name'];
//   $certificate  =  salt(5).$certificate;
//   move_uploaded_file($tmp_name,FCPATH.'uploads/images/members/'.$certificate); 
// } 

   $status   =  @isset($status)?$status:0;
   $funObj->data =array("first_name"=>$first_name,
                        "last_name"=>$last_name,                         
                        "gender"=>$gender,     
                        "phone_no"=>$phone_no,                 
            						"mobile_no"=>$mobile_no,
            						"email"=>$email,
            						"address"=>$address,
            						'country'=>$country,
                        //'company_name'=>$company_name,
                        //'climbing_date'=>$climbing_date,
                        'account_type'=>'memeber',
                        'group_id'=>'1', 				        
                        'status'=>'1'
						); 

    if(!empty($password)){
      $pass  =  base64_encode(md5($password));
      $funObj->data['password']  =  $pass;
    }
 		if(!empty($image)){
           $funObj->data['image'] = $image;
        } 

      // if(!empty($certificate)){
      //      $funObj->data['certificate'] = $certificate;
      // } 	        
	
	if(empty($hidden_id)){
		        $funObj->data['access_code']	 =  $access_code;
		        $funObj->data['created_at']	     =  date("Y-m-d H:i:s");	
				$funObj->data['created_by']	     =  $_SESSION[ENCR_KEY.'pathsaleLoginId'];												
	}else{      $funObj->data['modified_at']	 =  date("Y-m-d H:i:s");	
	            $funObj->data['modified_by']	 =  $_SESSION[ENCR_KEY.'pathsaleLoginId'];
		 }
	
						
	         $funObj->begin();		
	         $queryResult  =  $funObj->doAction(); 
              
                            if(!$queryResult) { 
							      $funObj->rollback(); 
								  $_SESSION['successMsg'] = "Action cannot place Occur due to some internal errors!!.Please try again";
			                 } else { $funObj->commit(); 
							      if(!empty($back_again))
		                          {$funObj->redirect($_SERVER['HTTP_REFERER']);}
							    }//else close
}//ifclose
else
{       $funObj->begin();
        $row      =  $funMemberObj->find_by_id($funObj->aid);

        $image    =  $row->image;
        $certificate    =  $row->certificate;
        if(file_exists(FCPATH.'uploads/images/customer/'.$image) and !empty($image)){ 
            @unlink(FCPATH.('uploads/images/customer/'.$image));
          }//file exist
        // if(file_exists(FCPATH.'uploads/images/customer/'.$certificate) and !empty($certificate)){ 
        //     @unlink(FCPATH.('uploads/images/customer/'.$certificate));
        //   }//file exist  
        /*$result  =  $funMemberObj->gallery($funObj->aid);  
        $num =  $db->num_rows($result);
          if($num>0){ while($row_item  =  $db->result($result)){ //pr($row);
               $item_id   = $row_item->id;
               $user_id   = $row_item->user_id;
               $image     = $row_item->item_file;  
               $user_upload_path  =  FCPATH.'uploads/images/customer/'.$user_id.'/'; 
               $user_url_path  =  base_url().'uploads/images/customer/'.$user_id.'/';
               
               if(file_exists($user_upload_path.$image) and !empty($image)){
                   @unlink($user_upload_path.$image);
               }
               $db->delete('tbl_user_items',array('id'=>$item_id));
           }}*/
        
        $funObj->table    = 'tbl_customer';
        $funObj->aid      =  $row->id;
        $queryResult      =  $funObj->doAction();	 
		if(!$queryResult) { 
		    $funObj->rollback(); 
			$_SESSION['successMsg'] = "Transaction can place Occur due to some internal errors!!";
	     } else { $funObj->commit();  }
}
//redirect to pages
$funObj->url_back  = $sitePathB."list-member";
$funObj->redirect($funObj->url_back);