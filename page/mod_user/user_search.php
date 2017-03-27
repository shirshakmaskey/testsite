<?php 
if(defined("SEARCH_PAGE") and $contentPage=='search'){
    ob_start();
    ?>
    <!--=== Profile ===-->
    <div class="container content profile">
       <div class="row">
        <!--Left Sidebar-->
        <div class="col-md-3 md-margin-bottom-40">
                          <?php echo $cms['module:search_block'];?>
                                 <div class="margin-bottom-50"></div>                
                             </div>
                             <!--End Left Sidebar-->
                             <!-- Profile Content -->            
                             <div class="col-md-9  md-margin-bottom-40">
                                <div class="margin-bottom-20">
                                    <?php echo isset($cms['module:'.$module.'_'.$contentPage]) ? $cms['module:'.$module.'_'.$contentPage] : ''; ?>
                                </div>
                            </div>
                            <!-- End Profile Content -->            
                        </div>
                    </div><!--/container-->    
                    <!--=== End Profile ===-->
                    <?php 
                    $cms['module:user_pages'] = ob_get_clean();
                }
                ?>
                <?php 
                if(defined("SEARCH_PAGE") and $contentPage=='training'){
                    ob_start();
$row  =  $funOrgObj->find_by_slug($gslug);  //pr($row);
$result_course  =  $funCouresObj->dataList($row->id,1);
?>
<!--=== Content Part ===-->
<div class="container content">
    <div class="row margin-bottom-30">
        <div class="col-md-9 mb-margin-bottom-30">
            <div class="headline"><h2><?php echo $row->company_name?></h2></div>
            <div class="col-md-3">
                <?php $logo  =  base_url('images/noimage.png');
                $img   =  $row->office_logo;
                if(file_exists(FCPATH.'uploads/images/company/'.$img) and !empty($img)){
                   $logo =  base_url('uploads/images/company/'.$img);
               } ?>
               <img src="<?php echo $logo;?>" class="img-responsive hover-effect" alt="" />
           </div>
           <div class="col-md-9">
           <p><?php echo $row->office_desc?></p><br>
        </div>
        <div class="clear"></div>
        <div style="margin-top:30px;"></div> 
        <form action="<?php echo base_url('page/mod_user/ajax.php');?>" method="post" id="sky-form3" class="sky-form sky-changes-3">
            <input type="hidden" name="org_id" value="<?php echo $row->id?>">
            <input type="hidden" name="mode" value="inquiry_submit">
            <fieldset>                  
                <div class="row">
                    <section class="col col-6">
                        <label class="label">Name</label>
                        <label class="input">
                            <i class="icon-append fa fa-user"></i>
                            <input type="text" name="fullname" id="fullname">
                        </label>
                    </section>
                    <section class="col col-6">
                        <label class="label">Contact No</label>
                        <label class="input">
                            <i class="icon-append fa fa-phone"></i>
                            <input type="text" name="contact_no" id="contact_no">
                        </label>
                    </section>
                </div>
                <section>
                    <label class="label">Address</label>
                    <label class="input">
                        <i class="icon-append fa fa-map-marker"></i>
                        <input type="text" name="address" id="address">
                    </label>
                </section>
                <section>
                    <label class="label">Email</label>
                    <label class="input">
                        <i class="icon-append fa fa-envelope-o"></i>
                        <input type="email" name="email" id="email">
                    </label>
                </section>
                <section>
                    <label class="label">Subject</label>
                    <label class="input">
                        <i class="icon-append fa fa-tag"></i>
                        <input type="text" name="subject" id="subject" value="Inquiry for Courses">
                    </label>
                </section>
                <section>
                    <label class="label">Message</label>
                    <label class="textarea">
                        <i class="icon-append fa fa-comment"></i>
                        <textarea rows="4" name="message" id="message"></textarea>
                    </label>
                </section>
                <section>
                    <label class="label">Enter characters below:</label>
                    <label class="input input-captcha">
                        <img src="<?php echo base_url('themes/default/');?>assets/plugins/sky-forms-pro/skyforms/captcha/image.php?<?php echo mt_rand(1,9999999)?>" width="100" height="32" alt="Captcha image" />
                        <input type="text" maxlength="6" name="captcha" id="captcha">
                    </label>
                </section>
                <section>
                    <label class="checkbox"><input type="checkbox" name="copy" value="1"><i></i>Send a copy to my e-mail address</label>
                </section>
            </fieldset>
            <footer>
                <button type="submit" class="btn-u">Send message</button>
            </footer>
            <div class="message">
                <i class="rounded-x fa fa-check"></i>
                <p>Your message was sent successfully!</p>
            </div>
        </form>
    </div><!--/col-md-9-->
    <div class="col-md-3">
        <!-- Contacts -->
        <div class="headline"><h2>Contacts</h2></div>
        <ul class="list-unstyled who margin-bottom-30">
            <li><a href="#"><i class="fa fa-home"></i><?php echo $row->office_street?>,<?php echo $row->office_city?></a></li>
            <li><a href="#"><i class="fa fa-map-marker"></i><?php echo $row->Country?>,<?php echo $row->office_city?></a></li>
            <li><a href="#"><i class="fa fa-envelope"></i><?php echo $row->office_email?></a></li>
            <li><a href="#"><i class="fa fa-phone"></i><?php echo $row->office_number?></a></li>
            <li><a href="#"><i class="fa fa-fax"></i><?php echo $row->office_fax?></a></li>
            <li><a href="#"><i class="fa fa-globe"></i><?php echo $row->office_url?></a></li>
        </ul>
       
       <?php if(!empty($row->office_hours)){ ?>
        <!-- Business Hours -->
        <div class="headline"><h2>Business Hours</h2></div>
        <ul class="list-unstyled margin-bottom-30">
            <li><?php echo nl2br($row->office_hours)?></li>
        </ul>
        <?php } ?>
       <?php if($db->num_rows($result_course)>0){ ?>
        <div class="headline"><h2>Available Courses</h2></div>
        <ul class="list-unstyled">                
       
    <?php  $sn=1; while($row_course =  $db->result($result_course)){ ?>
         <li><i class="fa fa-check color-green"></i> <?php echo ucwords($row_course->course_name);?></li>
         <?php }?>
         </ul><?php }?>
        <?php $office_features = unserialize($row->office_features);
        if(is_array($office_features) and count($office_features)>0){?>
        <!-- Why we are? -->
        <div class="headline"><h2>Features</h2></div>
        <ul class="list-unstyled">                
         <?php foreach($office_features as $k=>$v){ ?>
         <li><i class="fa fa-check color-green"></i> <?php echo $v?></li>
         <?php } ?>
     </ul><?php   }?>
 </div><!--/col-md-3-->
</div><!--/row-->
</div><!--/container-->     
<!--=== End Content Part ===-->
<?php 
$cms['module:user_pages'] = ob_get_clean();
}
?>                    