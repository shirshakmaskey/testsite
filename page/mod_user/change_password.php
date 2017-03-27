<?php
ob_start();
$code = $_GET['mode'];
$row  =  $funUserObj->find_by_code($code);
if($row){
    ?>
    <div class="container content">
  <div class="row">
    <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
       <form action="" method="post" accept-charset="utf-8" id="change_password_form"> <input type="hidden" id="new_password_code" name="new_password_code" value="<?php echo $code;?>">   
        <div class="modal-header">
            <h4 id="myModalLabel4" class="modal-title">Change Password!</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <h4>Please submit your new password! </h4>
                    <p><input type="password" class="form-control required" name="new_password" id="new_password" placeholder="New Password"></p>
                    <p><input type="password" class="form-control required" name="confirm_new_password" id="confirm_new_password" placeholder="Re-Password" equalTo="#new_password"></p>
                </div>
               
            </div>
        </div>
        <div class="modal-footer">
           <button class="btn-u btn-u-primary" type="button" id="submit_change_password" name="submit_change_password">Submit</button>
            <button data-dismiss="modal" class="btn-u btn-u-default" type="button" onclick="window.location.href='<?php echo base_url('login');?>';">Login</button>
            
        </div>
         </form>
    </div></div></div>     
    <?php
}else{
	echo '<div class="text-center"><h3>Change Password</h2></div>';
	echo '<div class="alert alert-warning">Invalid access code, Please submit your email again. <a href="'.base_url('login').'">Click Here</a></div>';
}
$cms['module:user_change_password'] = ob_get_clean();
if($row){
ob_start();?>
<script src="<?php echo base_url('page/mod_user/action.js');?>" type="text/javascript"></script><?php $scms['JS_CSS_IN_FOOTER'] .= ob_get_clean(); 
}?>