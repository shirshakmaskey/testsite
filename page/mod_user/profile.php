<?php 
if(isset($contentPage) and $contentPage=='profile'){
ob_start(); 
$profile_id  =  $funUserObj->current_user();
if(empty($profile_id)){ redirect(base_url());}
$row_user    =  $funUserObj->find_by_id($profile_id); 
//pr($row_user);
?>
<div class="tab-v1">
<ul class="nav nav-justified nav-tabs">
  <li class="active"><a data-toggle="tab" href="#profile">Edit Profile</a></li>
  <li><a data-toggle="tab" href="#passwordTab">Change Password</a></li>
</ul> 
<div class="tab-content">
  <div id="profile" class="profile-edit tab-pane fade in active">
    <h2 class="heading-md">Manage your Name, Address Email Addresses And Office Details.</h2>
    <p>Profile Detail <span> <a class="pull-right profile_edit_pencil" href="javascript:void(0);" onclick="toggleDetails(this);"> <i class="fa fa-pencil"></i> </a> </span></p>
    <br>
    <?php if(isset($_SESSION['successMesage'])){?>
        <div class="alert alert-success"><?php echo $_SESSION['successMesage']; unset($_SESSION['successMesage']);?></div>
      <?php }?>	       
      <div id="profile_details">
      <dl class="dl-horizontal">
        <dt><strong>Your name </strong></dt>
        <dd> <span class="label_name"><?php echo ucwords($row_user->first_name. " ".$row_user->last_name); ?></span> </dd>
        <hr>
        <dt><strong>Email Address/Username </strong></dt>
        <dd> <?php echo ($row_user->email); ?> </dd>
        <hr>
        <dt><strong>Phone Number </strong></dt>
        <dd> <?php echo ($row_user->phone_no); ?> </dd>
        <hr>
        <dt><strong>Mobile Number </strong></dt>
        <dd> <?php echo ($row_user->mobile_no); ?> </dd>
        <hr>
        <dt><strong>Country </strong></dt>
        <dd> <?php $country = ($row_user->country); 
		         $row_cou  = $funObj->CountrySel($country);
				 echo @$row_cou->Country;
		?> </dd>
        <hr>
        <dt><strong>Address </strong></dt>
        <dd> <?php echo ($row_user->address); ?> </dd>
        
      </dl>
    </div>
      <div id="profile_details_edit" class="hide">
      <form action="<?php echo base_url('action/user/edit_profile'); ?>" method="post" class="sky-form" id="profile_edit" enctype="multipart/form-data">
        <dl class="dl-horizontal">
        <dt><strong>Profile Image </strong></dt>
          <dd>
            <div class="col-md-12">
              <section>
                             <label for="profile_image" class="input input-file">
                                <div class="button"><input type="file" name="profile_image" id="profile_image" onchange="this.parentNode.nextSibling.value = this.value">Browse</div><input type="text" readonly>
                            </label>
                        </section>
            </div>
          </dd>          <hr>

          <dt><strong>Firstname </strong></dt>
          <dd>
            <div class="col-md-12">
              <input type="text" name="first_name" id="first_name" value="<?php echo $row_user->first_name;?>" class="form-control required">
            </div>
          </dd>
          <hr>
          <dt><strong>Lastname </strong></dt>
          <dd>
            <div class="col-md-12">
              <input type="text" name="last_name" id="last_name" value="<?php echo $row_user->last_name;?>" class="form-control required">
            </div>
          </dd>
          <hr>
          <dt><strong>Email Address </strong></dt>
          <dd>
            <div class="col-md-12">
              <input type="email" name="email" id="email" value="<?php echo $row_user->email;?>" class="form-control required email">
            </div>
          </dd>
          <hr>
          <dt><strong>Phone Number </strong></dt>
          <dd>
            <div class="col-md-12">
              <input type="text" name="phone_no" id="phone_no" value="<?php echo $row_user->phone_no;?>" class="form-control">
            </div>
          </dd>
          <hr>
          <dt><strong>Mobile Number </strong></dt>
          <dd>
            <div class="col-md-12">
              <input type="text" name="mobile_no" id="mobile_no" value="<?php echo $row_user->mobile_no;?>" class="form-control required">
            </div>
          </dd>
          <hr>
          <dt><strong>Country </strong></dt>
          <dd>
            <div class="col-md-12">
            <label class="select">
              <select name="country" id="country" class="form-control required">
                <?php $countryResult   =  $funObj->countryList();
                                              while($row_country   =  $db->result($countryResult)){ 
                                                     $sel   =  @($row_user->country==$row_country->id)?"selected":"";
                                                ?>
                <option value="<?php echo $row_country->id?>" <?php echo $sel?> ><?php echo $row_country->Country?></option>
                <?php }
                                          ?>
              </select>
              </label>
            </div>
          </dd>
          <hr>
          <dt><strong>Address </strong></dt>
          <dd>
            <div class="col-md-12">
              <input type="text" name="address" id="address" value="<?php echo $row_user->address;?>" class="form-control required">
            </div>
          </dd>
          <hr>
        </dl>
        <input type="hidden" name="submitBtn" value="1" />
        <button type="button" class="btn-u btn-u-default" onclick="toggleBack();">Cancel</button>
        <button type="button" class="btn-u"  onclick="save_profile();">Save Changes</button>
      </form>
    </div>
    </div>
    <div id="passwordTab" class="profile-edit tab-pane fade">
      <h2 class="heading-md">Manage your Security Settings</h2>
      <p>Change your password.</p>
      <br>
      <div id="password_message" class=""></div>
      <form action="" method="post" id="change_password_form" name="change_password_form" class="sky-form" >
        <dl class="dl-horizontal">
         <dt>Enter your old password</dt>
          <dd>
            <section>
              <label class="input"> <i class="icon-append fa fa-lock"></i>
                <input type="password" id="old_password" name="old_password" placeholder="Password" class="required" >
                <b class="tooltip tooltip-bottom-right">Enter your old password</b> </label>
            </section>
          </dd>
          <dt>Enter your password</dt>
          <dd>
            <section>
              <label class="input"> <i class="icon-append fa fa-lock"></i>
                <input type="password" id="password" name="password" placeholder="Password" class="required">
                <b class="tooltip tooltip-bottom-right">Don't forget your password</b> </label>
            </section>
          </dd>
          <dt>Confirm Password</dt>
          <dd>
            <section>
              <label class="input"> <i class="icon-append fa fa-lock"></i>
              <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm password" class="required" equalTo="#password" >
                <b class="tooltip tooltip-bottom-right">Don't forget your password</b> </label>
            </section>
          </dd>
        </dl>
        <input type="hidden" name="submitBtn" value="1" />
        <button class="btn-u" type="button" name="submit_button" id="submit_button" value="1" onclick="change_password();" >Save Changes</button>
      </form>
    </div>
   
  </div>
</div>
<?php ob_start();?>
<script type="text/javascript">
$(function(){
    $('#profile_edit').validate();
    $('#change_password_form').validate();
    $('#company_edit').validate();
    
});
function toggleDetails(obj){
    $('#profile_details').addClass('hide');
    $('#profile_details_edit').removeClass('hide');
    $(obj).addClass('hide');
}
function toggleBack(){
    $('#profile_details').removeClass('hide');
    $('#profile_details_edit').addClass('hide');
    $('.profile_edit_pencil').removeClass('hide');
}
function save_profile()
{  if($('#profile_edit').valid()){
   $('#profile_edit').submit();
   }
}
function change_password()
{  if($('#change_password_form').valid()){
         var params   =  $('#change_password_form').serialize();
             params   =  params+'&mode=change_password';
         $.ajax({
            url:base_url+'page/mod_user/ajax.php',
            data:params,
            type:'POST',
            dataType: "JSON",
            success:function(js){
                var json  = eval(js);
                 if(json.result=='true'){
                      $('#change_password_form').resetForm();
                      $('#password_message').html(json.msg).removeAttr('class').addClass('alert alert-success');
                  }else{
                      $('#password_message').html(json.msg).removeAttr('class').addClass('alert alert-warning');
                  }
                 
            }
         });
   }
}

</script>
<?php $scms['JS_CSS_IN_FOOTER'] .= ob_get_clean(); ?>
<?php 
$cms['module:user_profile'] = ob_get_clean();
}
?>
