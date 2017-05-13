<?php
ob_start();
?>
<ul class="footer_col1">
	<?php 
		  $rowSetting  =  $funMenuObj->menuSettingByID(12);
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
		   ?>
	<li class="<?php echo ($rowMainMenu->menu_link=='home')?"current-menu-item":""; ?> nav_top"><a href="<?php echo $menu_link;?>" target="<?php echo $link_type;?>"  class="parent" id="id_menu_<?php echo $main_menu_id?>" data-id="<?php echo "data_menu_id_".$main_menu_id; ?>" title="<?php echo $rowMainMenu->name; ?>"><span><?php echo $rowMainMenu->name; ?></span></a>
		<?php
	             $resultMainMenu1   =  $funMenuObj->menuListByType($menu_type,$main_menu_id);
				  if($db->num_rows($resultMainMenu1)>0){?>
		           <div>
			<ul>
			  <?php while($rowMainMenu1 =  $db->result($resultMainMenu1)){	
					       $main_menu_id1 =  $rowMainMenu1->id;
						   $resultMainMenu2   =  $funMenuObj->menuListByType($menu_type,$main_menu_id1);
						   $numMainMenu2  = $db->num_rows($resultMainMenu2);
						   
						    $link_type1  = ($rowMainMenu1->link_type=="external")?"target='_blank'":"_self";
							$menu_link1  =  $rowMainMenu1->menu_link;
							if(!preg_match("/http:/",$menu_link1)){ 
							$menu_link1  =  base_url($menu_link1); }
				      ?>
				<li><a href="<?php echo $menu_link1;?>" target="<?php echo $link_type1;?>" class="<?php echo ($numMainMenu2>0)?"parent":""; ?> nav_child" id="id_menu_<?php echo $main_menu_id1?>" data-id="<?php echo "data_menu_id_".$main_menu_id1; ?>" title="<?php echo $rowMainMenu1->name; ?>"><span><?php echo $rowMainMenu1->name; ?></span></a>
					<?php	             
				  if($numMainMenu2>0){?>
					<div>
						<ul>
				      <?php while($rowMainMen2 =  $db->result($resultMainMenu2)){	
					       $main_menu_id2 =  $rowMainMen2->id;
						    $link_type2  = ($rowMainMen2->link_type=="external")?"target='_blank'":"_self";
							$menu_link2  =  $rowMainMen2->menu_link;
							if(!preg_match("/http:/",$menu_link2)){ 
							$menu_link2  =  base_url($menu_link2); }
				       ?>
							<li><a href="<?php echo $menu_link2;?>" target="<?php echo $link_type2;?>" class="nav_child_2" id="id_menu_<?php echo $main_menu_id2?>" data-id="<?php echo "data_menu_id_".$main_menu_id2; ?>" title="<?php echo $rowMainMen2->name; ?>"><span><?php echo $rowMainMen2->name; ?></span></a></li>
						<?php } ?>
						</ul>
					</div>
					<?php 
				     }//resultMainMenu2 if end ?>
				</li>
				<?php }//while close ?>
			</ul>
		</div>
		           <?php  }//if close resultMainMenu1 ?>
		</li>		   
		<?php 
		   }//while
	  }//if close ?>
</ul>
<?php
$cms['module:footer_col1'] = ob_get_clean();