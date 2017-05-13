<?php 
if(defined("USER_PAGE")){
ob_start();
$profile_id  =  $funUserObj->current_user();
$row_user    =  $funUserObj->find_by_id($profile_id);
 ?>
 <!--=== Profile ===-->
    <div class="container content profile">
    	<div class="row">
           <?php if($row_user){?>
            <!--Left Sidebar-->
            <div class="col-md-3 md-margin-bottom-40">
               <?php $logo  =  base_url('images/noimage.png');
                    $img   =  $row_user->image;
               if(file_exists(FCPATH.'uploads/images/customer/'.$img) and !empty($img)){
                     $logo =  base_url('uploads/images/customer/'.$img);
                } ?>
                <img class="img-responsive profile-img margin-bottom-20 hide" width="100%" src="<?php echo $logo;?>" alt="">
                <ul class="list-group sidebar-nav-v1 margin-bottom-40" id="sidebar-nav-1">
                    
                    <li class="list-group-item <?php echo ($contentPage=='profile')?"active":"";?>">
                        <a href="<?php echo base_url('user/profile');?>"><i class="fa fa-user"></i> Profile</a>
                    </li>

                    <li class="list-group-item <?php echo ($contentPage=='wishlist')?"active":"";?>">
                        <a href="<?php echo base_url('user/wishlist');?>"><i class="fa fa-music"></i> Wishlist</a>
                    </li>
                    <li class="list-group-item <?php echo ($contentPage=='playlist')?"active":"";?>">
                        <a href="<?php echo base_url('user/playlist');?>"><i class="fa fa-list"></i> Playlist</a>
                    </li>
                   
                    <li class="list-group-item">
                        <a href="<?php echo base_url('user/logout');?>"><i class="fa fa-group"></i> Logout</a>
                    </li>                                        
                   
                </ul>                    
            </div>
            <!--End Left Sidebar-->
            <!-- Profile Content -->            
            <div class="col-md-9">
            <?php }else{?><div class="col-md-12"><?php } ?>
                <div class="profile-body margin-bottom-20">
                <?php 
                $include_file  =  FCPATH."page/mod_$module/$contentPage.php";
                if(file_exists($include_file)){ include($include_file); }
                echo isset($cms['module:'.$module.'_'.$contentPage]) ? $cms['module:'.$module.'_'.$contentPage] : ''; ?>
                </div>
            </div>
            <!-- End Profile Content -->            
        </div>
    </div><!--/container-->    
    <!--=== End Profile ===-->
<?php 
$cms['module:user_pages'] = ob_get_clean();
}
