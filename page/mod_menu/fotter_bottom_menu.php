<?php
ob_start();
?>
<!--<h4>Quick Links</h4>-->
<ul class="sf-bottom-menu">
	<?php 
		  $rowSetting  =  $funMenuObj->menuSettingByID(3);
		  $menu_type   =  $rowSetting->id;
		  $rowLimit    =  $rowSetting->display_number;
		  $resultMainMenu   =  $funMenuObj->menuListByType($menu_type,0,$rowLimit);
		  if($db->num_rows($resultMainMenu)>0){	
		  while($rowMainMenu =  $db->result($resultMainMenu)){	
		    $main_menu_id =  $rowMainMenu->id;
		   ?>
	<li class="<?php echo ($rowMainMenu->menu_link=='home')?"current-menu-item":""; ?>"><a href="<?php echo base_url($rowMainMenu->menu_link);?>" class="parent"><span><?php echo $rowMainMenu->name; ?></span></a>
		<?php
	             $resultMainMenu1   =  $funMenuObj->menuListByType($menu_type,$main_menu_id);
				  if($db->num_rows($resultMainMenu1)>0){?>
		           <div>
			<ul>
			  <?php while($rowMainMenu1 =  $db->result($resultMainMenu1)){	
					       $main_menu_id1 =  $rowMainMenu1->id;
						   $resultMainMenu2   =  $funMenuObj->menuListByType($menu_type,$main_menu_id1);
						   $numMainMenu2  = $db->num_rows($resultMainMenu2);
				      ?>
				<li><a href="<?php echo base_url($rowMainMenu1->menu_link);?>" class="<?php echo ($numMainMenu2>0)?"parent":""; ?>"><span><?php echo $rowMainMenu1->name; ?></span></a>
					<?php	             
				  if($numMainMenu2>0){?>
					<div>
						<ul>
				      <?php while($rowMainMen2 =  $db->result($resultMainMenu2)){	
					       $main_menu_id2 =  $rowMainMen2->id;
				       ?>
							<li><a href="<?php echo base_url($rowMainMen2->menu_link);?>"><span><?php echo $rowMainMen2->name; ?></span></a></li>
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
$cms['module:fotter_bottom_menu'] = ob_get_clean();