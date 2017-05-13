<?php
if(@$mode=='registration'):   
   	if(isset($_POST['registerBtn'])){   $post = clean_post();
 		foreach($post as $key=>$val){$$key=$val;}
 		 $db->table  =  "";
 		$num = $funUserObj->dublicate_user_check($email);
 		if($num==0){
			$pass  =  base64_encode(md5($password));
 			$access_code =  strtotime(date("Y-m-d H:i:s")); 
 			$data=array('first_name'=>$first_name,
 				       'last_name'=>$last_name,
 				       'mobile_no'=>$mobile_no,
 				       'email'=>$email,
 				       'password'=>$pass,
 				       'country'=>$country,
 				       'created_at'=>fulldate(),
 				       'account_type'=>'memeber',
               'group_id'=>'1',
 				       'access_code'=>$access_code,
 				       'status'=>'0');
 			$user_id  = $funUserObj->save($data);
 			//now email to verify account and redirectto login section for displaying message
 			$fromName  = COMPANY_SITE_NAME;
 			$fromEmail =  COMPANY_EMAIL;
 			$receiverName =  $fullname  =  $first_name." ".$last_name;
 			$receiverEmail =  $email;
 			$subject  =  "Complete your registration in ".COMPANY_SITE_NAME;
                   $web_name        =  COMPANY_SITE_NAME;
    			   $web_phone       =   COMPANY_MOBILE;
    			   $web_email       =   COMPANY_EMAIL;
				   $web_location    =   COMPANY_LOCATION;
				   $web_url         =   COMPANY_SITE_URL;
 			$content  =   "Dear <b>$fullname</b><br>
                          <p style='text-align:justify;width:500px;' >
                          Thank you for associating with ".COMPANY_SITE_NAME.". <br>
						To complete your registration please verify your email address by clicking below. <br>
						 <br>
						 <a href='".base_url('action/user/verify/'.$access_code)."'>Please click here to confirm your registration.</a>
						 <br> 
After the confirmation, please login at ".COMPANY_SITE_NAME.". to proceed. We recommend you to update your details and add  your institutions and coures details . <br>
Username : $email<br>
<strong>Why verify the email address?</strong>
                                        <br>
<ul>
<li>Confirms you are willing to register at ".COMPANY_SITE_NAME.". with this email address</li>
<li>Adds credibility to your profile</li>
</ul>
<br>
You will receive the alerts (if you choose to receive) in this email address. 
<br>
Note: If you have received this email but you are not aware of the registration, simply ignore the email. <br>
						 <br>                                  
						      $web_name<br>
							  $web_email<br>
							  $web_phone<br>
							  $web_location<br>
							  <a  href='".$web_url."'><img width='220' alt='".$web_name."'  src='".base_url('themes/default/images/logo.png')."'></a>
						</p>"; 
           $send = $funObj->sendEmail($fromName,$fromEmail,$receiverName,$receiverEmail, $subject, $content,'','',array());
           if($send){  
             $_SESSION['successMesage'] = "Your registration has been initiated, Please check your email for verification. Please be patient until the owner approved your registration.";
             redirect(base_url('login'));        	
           }else{
           	$_SESSION['successMesage'] = "Sorry,there is probem in your email.Please contact administrator to verify your account"; 
           	redirect(base_url('register'));
           }
 		}else{ 
 			$_SESSION['successMesage'] = "Email address already exist, Please try another!"; 
 			redirect(base_url('register'));
 		}
   	}   	
endif;
if(@$mode=='verify'):
    $access_code  =  isset($_GET['id']) ? $_GET['id']: 0;
    $arr  =  $funUserObj->verify($access_code);
    if(count($arr)>0){
         $_SESSION['verified_id'] = $arr->id; 
         redirect(base_url('user/verification/success'));    
    }else{
         redirect(base_url('user/verification/failure')); 
    }
endif;
if(@$mode=='edit_profile'):
   	if(isset($_POST['submitBtn'])){
 		$post = clean_post();
 		foreach($post as $key=>$val){$$key=$val;}

     $profile_image   =  $_FILES['profile_image']['name'];
     $error       =  $_FILES['profile_image']['error'];
     if(!empty($profile_image) and $error==0){
        $tmp_name   =  $_FILES['profile_image']['tmp_name'];
        $profile_image  =  salt(5).$profile_image;
        move_uploaded_file($tmp_name,FCPATH.'uploads/images/customer/'.$profile_image); 
     }

 		 $db->table  =  "";
		$profile_id  =  $funUserObj->current_user(); 
 		$num = $funUserObj->dublicate_user_check($email,$profile_id);
 		if($num==0){
		   //$pass  =  base64_encode(md5($password));
 		   $data=array('first_name'=>$first_name,
 				       'last_name'=>$last_name,
 				       'mobile_no'=>$mobile_no,
					     'phone_no'=>$phone_no,
 				       'email'=>$email,
 				       /*'password'=>$pass,*/
 				       'country'=>$country,
					     'address'=>$address,
 				       'modified_at'=>fulldate()
					   );	
      if(!empty($profile_image)){
           $data['image'] = $profile_image;
        //remove old images
        $row_user    =  $funUserObj->find_by_id($profile_id); 
        $img   =  $row_user->image;
         if(file_exists(FCPATH.'uploads/images/customer/'.$img) and !empty($img)){
               @unlink(FCPATH.'uploads/images/customer/'.$img);
          }
     }				   
			$user_id     =  $funUserObj->save($data,$profile_id);
        if($user_id)  $_SESSION['successMesage'] = "Data has been modified successfully.";        	
                 else $_SESSION['successMesage'] = "Sorry,there is probem in saving your data. Please try again later";            	
                      redirect(base_url('user/profile'));
 		}else{ 
 			redirect(base_url());
 		   }
   	}
endif;
if(@$mode=='edit_company'):
    if(isset($_POST['submitBtn'])){
    $post = clean_post();
    foreach($post as $key=>$val){$$key=$val;}
     $logo_name   =  $_FILES['logo']['name'];
     $error       =  $_FILES['logo']['error'];
     if(!empty($logo_name) and $error==0){
        $tmp_name   =  $_FILES['logo']['tmp_name'];
        $logo_name  =  salt(5).$logo_name;
        move_uploaded_file($tmp_name,FCPATH.'uploads/images/company/'.$logo_name); 
     }
     if(!empty($company_name)) $slug  = create_slug($company_name); else $slug='';
     $profile_id  =  $funUserObj->current_user(); 
     $db->table  =  "tbl_organisation";  
     if(count($office_features)>0)
     $ofeature   =  serialize($office_features);
     else   $ofeature   = "";
     $db->data=array('company_name'  =>$company_name,
                     'slug'          =>$slug,
                     'office_email'  =>$office_email,
                     'office_email'  =>$office_email,
                     'office_number' =>$office_number,
                     'office_city'   =>$office_city,
                     'office_street' =>$office_street,
                     'office_country'=>$office_country,
                     'office_url'    =>$office_url,
                     'office_fax'    =>$office_fax,
                     'office_desc'   =>$office_desc,
                     'office_hours'   =>$office_hours,
                     'office_features'=>$ofeature
                     );
      if(!empty($logo_name)){
           $db->data['office_logo'] = $logo_name;
      } 
      $db->cond=array('user_id'  =>$profile_id);
      $org_id  = $db->update();
      $_SESSION['successMesage'] = "Company profile has been modified successfully.";     
      redirect(base_url('user/profile'));
  }
endif;    
?>