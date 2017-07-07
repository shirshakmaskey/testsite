<?php
ob_start();
if(defined("LOGIN_REGISTER_PAGE")){
/* id and meta contents */
$content_id     =  0;
if($contentPage=='login'){ $pagetitle = "Login";}
if($contentPage=='register'){ $pagetitle = "Registration";}
$data['page_title']          =  $pagetitle;
$data['metakeyword']         =  COMPANY_SITE_NAME.$pagetitle;
$data['metadescription']     =  COMPANY_SITE_NAME.$pagetitle;
/* id and meta contents end*/
$banner                =  '';
$banner_title          =  $pagetitle;
if(file_exists(FCPATH.'uploads/images/contents/'.$banner) and !empty($banner)){
?>
<style>
.breadcrumbs-v3.img-v3 {
	background: rgba(0, 0, 0, 0) url("<?php echo base_url('uploads/images/contents/'.$banner);?>") no-repeat scroll center center / cover;
}
</style>
<?php }else{ ?>
<style>
.breadcrumbs-v3.img-v3 {
	background: rgba(0, 0, 0, 0) url("<?php echo base_url('themes/default/assets/img/breadcrumbs/default_breadcumb.jpg');?>") no-repeat scroll center center / cover;
}
</style>
<?php } ?>
<!--=== Breadcrumbs v3 ===-->
<?php /*
<div class="breadcrumbs-v3 img-v3 text-center">
  <div class="container">
    <h1><?php echo $banner_title;?></h1>
  </div>
</div>
*/?>
<!--=== End Breadcrumbs v3 ===-->
<?php if($contentPage=='register'){ ?>
<!--=== Content Part ===-->
<div class="container content">
  <div class="row">
    <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
      <?php if(isset($_SESSION['successMesage'])){?>
      <div class="alert alert-success"><?php echo $_SESSION['successMesage'];//unset($_SESSION['successMesage']); ?></div>
      <?php }?>
      <form class="reg-page sky-form" id="frmRegister" name="frmRegister" method="post" 
                action="<?php echo action_url('user/registration');?>">
        <div class="reg-header">
          <h2>Register a new account</h2>
          <p>Already Signed Up? Click <a href="<?php echo base_url('login')?>" class="color-green">Sign In</a> to login your account.</p>
        </div>
        <section>
          <label class="input">First Name <span class="color-red">*</span></label>
          <input type="text" class="form-control required" name="first_name" id="first_name">
        </section>
        <section>
          <label  class="input">Last Name <span class="color-red">*</span></label>
          <input type="text" class="form-control  required" name="last_name" id="last_name">
        </section>
        <section>
          <label class="input">Mobile No <span class="color-red">*</span></label>
          <input type="text" class="form-control  required" name="mobile_no" id="mobile_no">
        </section>
        <section>
          <label class="input">Email Address <span class="color-red">*</span></label>
          <input type="text" class="form-control  required email" name="email" id="email">
        </section>
        <div class="row">
          <section class="col-sm-6">
            <label class="input">Password <span class="color-red">*</span></label>
            <input type="password" class="form-control  required"  name="password" id="password" min-lenght='6'>
          </section>
          <section class="col-sm-6">
            <label class="input">Confirm Password <span class="color-red">*</span></label>
            <input type="password" class="form-control  required" name="confirm_password" id="confirm_password" equalTo="#password">
          </section>
        </div>
        <section>
          <label class="label">Country <span class="color-red">*</span></label>
          <label class="select">
            <select name="country" id="country" class="form-control required">
              <option value="">Choose Country</option>
              <?php $countries = $db->countryList();
                                          if($db->num_rows($countries)>0){
                                            while($row_coun  =  $db->result($countries)){
                                                ?>
              <option value="<?php echo $row_coun->id?>"><?php echo $row_coun->Country?></option>
              <?php
                                            }
                                          }
                                      ?>
            </select>
            <i></i> </label>
        </section>
        <hr>
        <div class="row">
          <div class="col-lg-6 checkbox">
            <label class="checkbox">
              <input type="checkbox" name="term_and_condition" id="term_and_condition" value='1'>
              <i class="no-rounded"></i> I have read the <a href="<?php echo base_url('pages/term-and-conditions');?>" class="color-green" target="_blank">Terms and Conditions</a> </label>
          </div>
          <div class="col-lg-6 text-right">
            <button class="btn-u" type="submit" name="registerBtn" id="registerBtn" value="Register">Register</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!--/container--> 
<!--=== End Content Part ===-->
<?php } ?>
<?php if($contentPage=='login'){ ?>
<!--=== Content Part ===-->
<div class="container content">
  <div class="row">
    <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
      <?php if(isset($_SESSION['successMesage'])){?>
      <div class="message success" style="background:#093;color:#FFF;padding-left:15px;line-height:30px;line-height:30px;"><?php echo $_SESSION['successMesage'];unset($_SESSION['successMesage']); ?></div>
      <?php }?>
      <div id="errMessageDiv" class="alert alert-warning"></div>
      <form class="reg-page reg-block sky-form" id="frmLogin" name="frmLogin" method="post" action="<?php echo action_url('user/login');?>" onsubmit="return checkLogin(this);">
      <input type="hidden" name="my_token" value="<?php echo my_token()?>">
        <div class="reg-header">
          <h2>Login to your account</h2>
        </div>
        <div class="row">
          <section class="col-md-12">
            <label class="input"> <i class="icon-prepend fa fa-envelope"></i>
              <input type="email" name="email" id="js_username" class="form-control  email required" placeholder="Email Address" value="<?php echo get_cookie('user_name');?>" >
            </label>
          </section>
        </div>
        <?php $cookie_pass  =  get_cookie('user_pass');
        if($cookie_pass!=''){
           $user_pass   =  get_cookie('user_pass');
           $user_pass   =  base64_decode(base64_decode($user_pass));
        }else{$user_pass='';}
        ?>
        <div class="row">
          <section  class="col-md-12">
            <label class="input"> <i class="icon-prepend fa fa-lock"></i>
              <input type="password" name="password" id="js_password" class="form-control required" placeholder="Password" value="<?php echo $user_pass?>" >
            </label>
          </section>
        </div>
        <div class="row">
          <section class="col-md-6">
            <div class="inline-group">
              <label class="checkbox">
                <input type="checkbox"  name="chkRemember" id="chkRemember" value="1" <?php echo get_cookie('user_name')!='' ? "checked":"";?> >
                <i class="square-x"></i>Stay signed in</label>
            </div>
          </section>
          <div class="col-md-6">
            <button class="btn-u pull-right" type="submit" name="js_Login" id="js_Login" >Login</button>
            <!--fb:login-button 
              scope="public_profile,email"
              onlogin="checkLoginState();">
            </fb:login-button-->
            <div class="fb-login-button" data-max-rows="1" data-size="small" data-button-type="login_with" data-show-faces="false" data-auto-logout-link="false" data-use-continue-as="false"></div>
          </div>
        </div>
        <hr>
        <h4>Forget your Password ?</h4>
        <p>no worries, <a class="color-green" href="javascript:void(0);"  data-target="#forget_dialog" data-toggle="modal">click here</a> to reset your password.</p>
      </form>
    </div>
  </div>
  <!--/row--> 
</div>
<!--/container--> 
<!--=== End Content Part ===-->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="forget_dialog" class="modal fade" style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                 <form action="" method="post" accept-charset="utf-8" id="forget_password_form">
                                
                                    <div class="modal-header">
                                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                        <h4 id="myModalLabel4" class="modal-title">Forget Password!</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h4>Please enter your email address! </h4>
                                                <p><input type="email" class="form-control required email" name="forget_email" id="forget_email" placeholder="Email Address"></p>
                                            </div>
                                           
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                       <button class="btn-u btn-u-primary" type="button" id="forget_submit" name="forget_submit">Submit</button>
                                        <button data-dismiss="modal" class="btn-u btn-u-default" type="button">Close</button>
                                        
                                    </div>
                                     </form>
                                </div>
                            </div>
                        </div>
<?php } ?>
<?php ob_start();?>
<script src="<?php echo base_url('page/mod_user/action.js');?>" type="text/javascript"></script><?php $scms['JS_CSS_IN_FOOTER'] .= ob_get_clean(); ?>
<?php
}
$cms['module:register'] = ob_get_clean();
