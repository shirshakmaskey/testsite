<?php ob_start();?>
<div class="topbar-v1">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                    
                      <ul class="left-topbar top-v1-contacts">                      
<?php 
$profile_id =  $funUserObj->current_user();
if($profile_id>0){
$row_user    =  $funUserObj->find_by_id($profile_id); 
$logo  =  base_url('images/noimage.png');
$img   =  $row_user->image;
 if(file_exists(FCPATH.'uploads/images/customer/'.$img) and !empty($img)){
       $img_path =  base_url('uploads/images/customer/'.$img);
  } else{
    $img_path = $logo;
  }
?>
<li><img class="profile-image rounded-x" alt="" src="<?php echo $img_path;?>"></li>


                        <li>
                          <a><?php echo $row_user->first_name;?> <i class="fa fa-angle-down fa-2x pull_left_50"></i></a>
                          <ul class="currency">
                            <li><a href="<?php echo base_url()?>">Home</a></li>
                            <li><a href="<?php echo base_url('user/profile')?>">Profile</a></li>
                            <li><a href="<?php echo base_url('user/wishlist')?>">Wishlist</a></li>
                            <li><a href="<?php echo base_url('user/logout')?>">Logout</a></li>
                          </ul>
                        </li>  
                        <?php }else{?> 
                             <li><a href="mailto:<?php echo COMPANY_EMAIL;?>"> <i class="fa fa-envelope"></i> <?php echo COMPANY_EMAIL;?></a></li>
                            <?php } ?>                      
                      </ul>

            </div>

            <div class="col-md-6">
                <ul class="list-inline top-v1-data">
                <?php if($funUserObj->current_user()>0){
                  $cnt =  $funSVLObj->count_playlist_by_user($profile_id); 
                  ?>
                   <li><a href="<?php echo base_url()?>">Home</a></li>
                    <li><a href="<?php echo base_url('user/playlist')?>"> <i class="fa fa-music"></i> Playlist <span class='item_badge'><?php echo $cnt;?></span></a></li>
                    <li><a href="<?php echo base_url('user/wishlist')?>"> <i class="fa fa-list"></i> Wishlist</li>
                    <li><a href="<?php echo base_url('welcome')?>"> <i class="fa fa-list"></i> Explore</li> 
                    <!-- <li><a href="#">Advertise with us</a></li> -->
                    <li><a href="<?php echo base_url('contact');?>">Contact us</a></li>
                 <?php }else{ ?> 
                    <li><a href="<?php echo base_url('login')?>"> <i class="fa fa-key"></i> Login</a></li>
                    <li><a href="<?php echo base_url('register')?>"> <i class="fa fa-user"></i> Signup</a></li>
                 <?php }?>   
                </ul>
            </div>
        </div>
    </div>
</div>
<?php
$cms['module:top_bar'] = ob_get_clean();