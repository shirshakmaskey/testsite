<?php 
if(isset($contentPage) and $contentPage=='logout'){
     $user_data = array(ENCR_KEY.'front_bgt',                    
					    ENCR_KEY.'front_username',
						ENCR_KEY.'front_name',
						ENCR_KEY.'front_user_id',
						ENCR_KEY.'login_method'
					    ); 	
    unset_userdata($user_data);  
    redirect(base_url());
}
?>