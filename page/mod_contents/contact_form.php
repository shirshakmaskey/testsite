<?php
ob_start();
$subject = '';
$act_id    = isset($_GET['act_id'])?$_GET['act_id']:'';
if($act_id){
$row        =  $funPackageObj->packageSel($act_id);
$subject  =  "Inquiry for : ".$row->package_name;
}
?>
<div class="welcome">
	<h2>Inquiry / Feedback</h2>
</div>
<br />
<div class="clearfix"></div>
<?php if(isset($_SESSION['succesMesage'])){?>
<div class="message success" style="background:#093;color:#FFF;padding-left:15px;line-height:30px;line-height:30px;"><?php echo $_SESSION['succesMesage'];unset($_SESSION['succesMesage']); ?></div>
<?php }?>
<form name="standardForm" id="standardForm" action="<?php echo base_url();?>page/mod_contents/act_contact.php" method="post" onsubmit="return checkContact();" >
	<table border="0" align="center" cellpadding="0" cellspacing="9" class="table table-bordered" >
						<tbody>
							<tr>
								<td>Full Name : <span class="star">*</span></td>
								<td>
										<div class="col-sm-8">
											<input name="fullname" type="text" id="fullname" required="true" size="40" class="input-book form-control" placeholder="Your Full Name">
									</div></td>
							</tr>
							<tr>
								<td> Address : <span class="star">*</span></td>
								<td><div class="col-sm-8">
										
											<input name="address" type="text" id="address" size="40" required="true" class="input-book form-control" placeholder="Your Full Address" >
										
									</div></td>
							</tr>
							<tr>
								<td>Contact Number : <span class="star">*</span></td>
								<td><div class="col-sm-8">
										
											<input name="phonenumber" type="text" id="phonenumber" size="40" required="true" class="input-book form-control" placeholder="Phone Number" value="<?php if(isset($_POST['phonenumber']) && $_POST['phonenumber'] != ''){echo strip_tags($_POST['phonenumber']);}?>">
										
									</div></td>
							</tr>
							<tr>
								<td>Email Address : <span class="star">*</span></td>
								<td><div class="col-sm-8">
										
											<input name="email" type="text" id="email" size="40" class="input-book required email form-control" placeholder="Email Address" >
										
									</div></td>
							</tr>
							<tr>
								<td>Subject : <span class="star">*</span></td>
								<td><div class="col-sm-8">
										
											<input name="subject" type="text" id="subject" size="40" required="true" class="input-book form-control" placeholder="Subject" value="<?php echo $subject;?>" >
										
									</div></td>
							</tr>
							<tr>
								<td> Message : <span class="star">*</span></td>
								<td><div class="col-sm-12">
										
											<textarea name="message" id="massage" cols="40" rows="5" class="required form-control" placeholder="Write Short Message..." ></textarea>
										
									</div></td>
							</tr>
							<tr>
								<td colspan="2"><br /><img id="siimage" style="border: 1px solid #000; margin-right: 15px" src="<?php echo base_url(); ?>applications/securimage-master/securimage_show.php?sid=<?php echo md5(uniqid()) ?>" alt="CAPTCHA Image" align="left" />
						<object type="application/x-shockwave-flash" data="<?php echo base_url(); ?>applications/securimage-master/securimage_play.swf?bgcol=#ffffff&amp;icon_file=<?php echo base_url(); ?>applications/securimage-master/images/audio_icon.png&amp;audio_file=<?php echo base_url(); ?>applications/securimage-master/securimage_play.php" height="32" width="32">
							<param name="movie" value="<?php echo base_url(); ?>applications/securimage-master/securimage_play.swf?bgcol=#ffffff&amp;icon_file=<?php echo base_url(); ?>applications/securimage-master/images/audio_icon.png&amp;audio_file=<?php echo base_url(); ?>applications/securimage-master/securimage_play.php" />
						</object>
						&nbsp; <a tabindex="-1" style="border-style: none;" href="#" title="Refresh Image" onclick="document.getElementById('siimage').src = '<?php echo base_url(); ?>applications/securimage-master/securimage_show.php?sid=' + Math.random(); this.blur(); return false" id="refresh_image"><img src="<?php echo base_url(); ?>applications/securimage-master/images/refresh.png" alt="Reload Image" height="32" width="32" onclick="this.blur()" align="bottom" border="0" /></a><br />
						Enter Code <span class="star">*</span>:<br /><div class="col-sm-2">
						<input type="text" name="ct_captcha" id="ct_captcha" onkeyup="checkCaptcha(this.value);" size="12" maxlength="8" class="required form-control" /></div>
						<input type="hidden" name="errorCheck" id="errorCheck" value="0" />
						<div id="ct_captchaErr"></div></td>
							</tr>
							<tr>
								<td height="24">&nbsp;</td>
								<td><div align="left">
								<button class="btn btn-primary" type="Submit" name="submitBtn" >Submit</button>
								<button class="btn btn-primary" type="reset" name="reset" >Reset</button>
										
									</div></td>
							</tr>
						</tbody>
					</table>
</form>
<script language="javascript" src="<?php echo base_url('page/mod_contents/contact.js');?>"></script>
<?php $cms['module:contact_form'] = ob_get_clean();?>