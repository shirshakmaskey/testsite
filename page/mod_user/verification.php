<?php
ob_start();
if(@$mode=='success'){
    ?>
    <div class="alert alert-success">Your account has been verified. Please click here to <a href="<?php echo base_url('login');?>">Login</a></div>
    <?php
}
if(@$mode=='failure'){
   ?>
   <div class="alert alert-danger">Your account cannot verified. Please contact admin to verify your account.</a></div>
    <?php
}
$cms['module:user_verification'] = ob_get_clean();