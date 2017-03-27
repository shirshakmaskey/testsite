<?php
ob_start();
if(defined("CONTACT_PAGE")){
$rowPage            =  $funContentsObj->find_by_static_slug('contact');
/* id and meta contents */
$data['page_title']          =  $rowPage->menu_name;
$data['metakeyword']         =  $rowPage->meta_keywords;
$data['metadescription']     =  $rowPage->meta_desc; 
/* id and meta contents end*/
$content_id = 3;
$row    =  $funContentsObj->find_by_id($content_id);
if($row):
$content_id   = $row->id;
$row_item  = $funContentsObj->file_items($content_id,'image','asc',1);
$img = "";
if(!empty($row_item)){	$img     = $row_item->item_name;	
      if(file_exists(FCPATH.'uploads/images/contents/'.$img) and !empty($img)){
				$img  =  base_url('uploads/images/contents/'.$img);	
				}
}
?>
<div class="col-md-9 mb-margin-bottom-30">
                <div class="headline"><h2>Contact Us</h2></div>
                <p>You can comment or ask any question from here.</p><br />
    			
				<div class="wpcf7">
				<form name="addEditForm" id="addEditForm" action="<?php echo base_url();?>page/mod_contents/act_contact.php" method="post"  class="wpcf7-form" >							
								<div class="row">
									<div class="col-lg-6">
										<p><span class="wpcf7-form-control-wrap res-fullname">
										
											<input name="fullname" type="text" id="fullname" required="true" size="40" class="wpcf7-form-control wpcf7-validates-as-required required form-control" placeholder="Fullname">
											
											</span></p>
										<p><span class="wpcf7-form-control-wrap res-phonenumber">
											<input name="contact_number" type="text" id="contact_number" size="40" required="true" class="wpcf7-form-control wpcf7-validates-as-required required form-control" placeholder="Contact Number">
											</span></p>
										
									</div>
									<div class="col-lg-6">
										<p><span class="wpcf7-form-control-wrap res-address">
										
											<input name="address" type="text" id="address" size="40" required="true" class="wpcf7-form-control wpcf7-text required form-control" placeholder="Address" >
											
											</span></p>
										<p><span class="wpcf7-form-control-wrap res-email">
											<input name="email" type="text" id="email" size="40" class="wpcf7-form-control wpcf7-text required email form-control" placeholder="{EMAIL}" >
											</span></p>
										
									</div>
									<div class="col-lg-12">
									<p><span class="wpcf7-form-control-wrap res-subject">
											<input name="subject" type="text" id="subject" size="40" class="wpcf7-form-control wpcf7-text required form-control" placeholder="{SUBJECT}" >
											</span></p>
										<p><span class="wpcf7-form-control-wrap res-message">
											<textarea name="res_message" cols="40" rows="3" class="wpcf7-form-control wpcf7-textarea required form-control" aria-invalid="false" placeholder="{MESSAGE_TEXT}"></textarea>
											</span></p>
										
										<p>
										<div class="col-md-4">
										<img id="siimage" style="border: 1px solid #000; margin-right: 15px" src="<?php echo base_url(); ?>applications/securimage-master/securimage_show.php?sid=<?php echo md5(uniqid()) ?>" alt="CAPTCHA Image" align="left" />
						<object type="application/x-shockwave-flash" data="<?php echo base_url(); ?>applications/securimage-master/securimage_play.swf?bgcol=#ffffff&amp;icon_file=<?php echo base_url(); ?>applications/securimage-master/images/audio_icon.png&amp;audio_file=<?php echo base_url(); ?>applications/securimage-master/securimage_play.php" height="32" width="32">
							<param name="movie" value="<?php echo base_url(); ?>applications/securimage-master/securimage_play.swf?bgcol=#ffffff&amp;icon_file=<?php echo base_url(); ?>applications/securimage-master/images/audio_icon.png&amp;audio_file=<?php echo base_url(); ?>applications/securimage-master/securimage_play.php" />
						</object>
						&nbsp; <a tabindex="-1" style="border-style: none;" href="#" title="Refresh Image" onclick="document.getElementById('siimage').src = '<?php echo base_url(); ?>applications/securimage-master/securimage_show.php?sid=' + Math.random(); this.blur(); return false" id="refresh_image"><img src="<?php echo base_url(); ?>applications/securimage-master/images/refresh.png" alt="Reload Image" height="32" width="32" onclick="this.blur()" align="bottom" border="0" /></a>
						</div>
						<div class="col-md-8">
						<label>Enter Code <span class="star">*</span></label> 
						<input type="text" name="ct_captcha" id="ct_captcha" size="12" maxlength="8" class="required form-control wpcf7-captcha-1 captcha" style="width:150px;"   />
						</div>
						<div class="clear"></div>
										</p>	
										<p>
											<input type="submit" value="{SUBMIT}" name="RegisterAndbooking" id="RegisterAndbooking" class="btn-u wpcf7-form-control wpcf7-submit btn btn-default pull-left" />
										</p>
									</div>
								</div>
								<div class="wpcf7-response-output wpcf7-display-none"></div>
							</form>
				</div>			
							<script>
							  $(function(){							
								$('#sky-form3').validate();								
							  });
							  
							</script>
				
            </div><!--/col-md-9-->
<div class="col-md-3">
            	<!-- Contacts -->
                <div class="headline"><h2>Contacts</h2></div>
                <ul class="list-unstyled who margin-bottom-30">
                    <li><a href="#"><i class="fa fa-home"></i><?php echo COMPANY_STREET; ?></a></li>
					<li><a href="#"><i class="fa fa-home"></i><?php echo COMPANY_LOCATION; ?></a></li>
					
                    <li><a href="#"><i class="fa fa-envelope"></i><script type="text/javascript">
    var string_email1 = "<?php echo COMPANY_EMAIL;?>";
    document.write("<a href=" + "mail" + "to:" + string_email1+ " class='yellow_one' >" + string_email1 + "</a>");
</script></a></li>
                    <li><a href="#"><i class="fa fa-phone"></i><?php echo COMPANY_MOBILE; ?></a></li>
                    <li><a href="#"><i class="fa fa-globe"></i><?php echo COMPANY_SITE_URL; ?></a></li>
                </ul>
            	
            </div>
<?php
endif;
}
$cms['module:contact'] = ob_get_clean();
?>