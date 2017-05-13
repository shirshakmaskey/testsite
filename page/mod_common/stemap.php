<?php
ob_start();
?>
<h3>Sitemap</h3>
<ul class="sitemap">
				<li><a href="<?=base_url()?>" class="special_btn">Home</a></li>
				<?php 
		  $rowSetting  =  $funMenuObj->menuSettingByID(1);
		  $menu_type   =  $rowSetting->id;
		  $rowLimit    =  $rowSetting->display_number;
		  $resultMainMenu   =  $funMenuObj->menuListByType($menu_type,0,$rowLimit);
		  if($db->num_rows($resultMainMenu)>0){	
		  while($rowMainMenu =  $db->result($resultMainMenu)){	
		    $main_menu_id =  $rowMainMenu->id;
			$link_type  = ($rowMainMenu->link_type=="external")?"target='_blank'":"_self";
			$menu_link  =  $rowMainMenu->menu_link;
			if(!preg_match("/http:/",$menu_link)){ 
			$menu_link  =  base_url($menu_link); }
			$currentItem  =  '';
			$pagename  = basename($_SERVER['PHP_SELF']);			
			$curUrlRui  =  str_replace(PROJECT_FOLDER,"",$_SERVER['REQUEST_URI']);
			if(substr($curUrlRui,0,1)=="/"){
			 $curUrlRui  =	substr($curUrlRui,1,300);
			}
			if($rowMainMenu->menu_link=='home' and empty($_SERVER['QUERY_STRING']) and $pagename=='index.php'){
				$currentItem  =  'current-menu-item';
			}else if($rowMainMenu->menu_link==$curUrlRui){
				$currentItem  =  'current-menu-item';
			}else{}
			$resultMainMenu1   =  $funMenuObj->menuListByType($menu_type,$main_menu_id);
			$the_second  =  $db->num_rows($resultMainMenu1);
		   ?>
	<li class=""><a href="<?php echo $menu_link;?>" target="<?php echo $link_type;?>"  class="parent special_btn" id="id_menu_<?php echo $main_menu_id?>" data-id="<?php echo "data_menu_id_".$main_menu_id; ?>" title="<?php echo $rowMainMenu->name; ?>"><span><?php echo $rowMainMenu->name; ?></span></a>
		<?php  if($the_second>0){?>
			<ul class="dropdown2">
			  <?php while($rowMainMenu1 =  $db->result($resultMainMenu1)){	
					       $main_menu_id1 =  $rowMainMenu1->id;
						   $resultMainMenu2   =  $funMenuObj->menuListByType($menu_type,$main_menu_id1);
						   $numMainMenu2  = $db->num_rows($resultMainMenu2);
						   
						    $link_type1  = ($rowMainMenu1->link_type=="external")?"target='_blank'":"_self";
							$menu_link1  =  $rowMainMenu1->menu_link;
							if(!preg_match("/http:/",$menu_link1)){ 
							$menu_link1  =  base_url($menu_link1); }
				      ?>
				<li><a href="<?php echo $menu_link1;?>" target="<?php echo $link_type1;?>" class="<?php echo ($numMainMenu2>0)?"parent":""; ?> nav_child special_btn" id="id_menu_<?php echo $main_menu_id1?>" data-id="<?php echo "data_menu_id_".$main_menu_id1; ?>" title="<?php echo $rowMainMenu1->name; ?>"><span><?php echo $rowMainMenu1->name; ?></span></a>
					<?php	             
				  if($numMainMenu2>0){?>
						<ul>
				      <?php while($rowMainMen2 =  $db->result($resultMainMenu2)){	
					       $main_menu_id2 =  $rowMainMen2->id;
						    $link_type2  = ($rowMainMen2->link_type=="external")?"target='_blank'":"_self";
							$menu_link2  =  $rowMainMen2->menu_link;
							if(!preg_match("/http:/",$menu_link2)){ 
							$menu_link2  =  base_url($menu_link2); }
				       ?>
							<li><a href="<?php echo $menu_link2;?>" target="<?php echo $link_type2;?>" class="nav_child_2 special_btn" id="id_menu_<?php echo $main_menu_id2?>" data-id="<?php echo "data_menu_id_".$main_menu_id2; ?>" title="<?php echo $rowMainMen2->name; ?>"><span><?php echo $rowMainMen2->name; ?></span></a></li>
						<?php } ?>
						</ul>
					<?php 
				     }//resultMainMenu2 if end ?>
				</li>
				<?php }//while close ?>
			</ul>
		           <?php  }//if close resultMainMenu1 ?>
		</li>		   
		<?php 
		   }//while
	  }//if close ?>
					
					<div class="clearfix"></div>
				</ul>
<?php $cms['module:sitemap'] = ob_get_clean();