<?php ob_start(); ?>
<ul class="list-inline right-topbar pull-right">
                        <!--<?php if($funUserObj->current_user()>0){?>
                        <li> <a href="<?php echo base_url('user/profile')?>" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Dashboard">Dashboard</a></li>
                        <li> <a href="<?php echo base_url('user/logout')?>" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Logout">Logout</a></li>
                        <?php }else{?>
                        <li> <a href="<?php echo base_url('login')?>" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Login">Login</a></li>
                        <li> <a href="<?php echo base_url('register')?>" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Register">Register</a></li>
                        <?php }?>-->
                     

    <?php 
          $rowSetting  =  $funMenuObj->menuSettingByID(2);
          $menu_type   =  $rowSetting->id;
          $rowLimit    =  $rowSetting->display_number;
          $resultMainMenu   =  $funMenuObj->menuListByType($menu_type,0,$rowLimit);
          if($db->num_rows($resultMainMenu)>0){ 
          while($rowMainMenu =  $db->result($resultMainMenu)){  
            $main_menu_id =  $rowMainMenu->id;
            $link_type  = ($rowMainMenu->link_type=="external")?"target='_blank'":"_self";
            $menu_link  =  $menu_link_slug = $rowMainMenu->menu_link;
            if(!preg_match("/http:/",$menu_link)){ 
            $menu_link  =  base_url($menu_link); }
           ?>
    <li><a href="<?php echo $menu_link;?>" target="<?php echo $link_type;?>"><?php echo $rowMainMenu->name; ?></a></li>          
        <?php 
           }//while
      }//if close ?>
                 
							<li> <a href="<?php echo FACEBOOK_PAGE?>" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook"> <i class="fa fa-facebook"></i> </a></li>
                            
                            <li> <a href="<?php echo SKYPE_ID?>" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Skype"> <i class="fa fa-skype"></i> </a> </li>   
                           
						</ul>
<?php $cms['module:social_links'] = ob_get_clean();?>
<?php ob_start(); ?>
<ul class="footer-socials list-inline">
							<li> <a href="<?php echo FACEBOOK_PAGE?>" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook"> <i class="fa fa-facebook"></i> </a></li>
                             
                            <li> <a href="<?php echo SKYPE_ID?>" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Skype"> <i class="fa fa-skype"></i> </a> </li>
                           </ul>
<?php $cms['module:footer_social_links'] = ob_get_clean();?>