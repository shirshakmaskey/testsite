<ul class="navigation">
	<li class="<?php echo empty($_SERVER['QUERY_STRING'])?'active':''?>"> <a href="<?php echo base_url('myadmin/administrator')?>"><i class="menu-icon fa fa-dashboard"></i><span class="mm-text">Dashboard</span></a> </li>
	<?php
	$current_user   = $funUserObj->current_user();
	$current_group  = $funUserObj->current_group();
	$resultModules  =  $funObj->modulesListPermisson($current_user,$current_group); 
	//$resultModules  =  $funObj->modulesList(); 	
while($rowModules    =  $funObj->fetch_object($resultModules))
{    $main_url  = "index.php?_page=".$rowModules->page."&mod=".$rowModules->module_fol_name.(!empty($rowModules->query_string)?$rowModules->query_string:"");
     $menu_icon  =  $rowModules->menu_icon;
	 $resultModulesSub  =  $funObj->modulesListPermisson($current_user,$current_group,$rowModules->id);
	 //$resultModulesSub  =  $funObj->modulesSelectedFromId($rowModules->id); 
	 $num_submenu  = $funObj->total_rows($resultModulesSub);
	 $mod_class = "";
	 if($num_submenu>0){
		 $mod_class  =  " mm-dropdown ";
		 if($rowModules->module_fol_name==$module){ $mod_class  .=" open active";}
	 }else{
		 if($rowModules->module_fol_name==$module){ $mod_class  .=" active ";}
	 }
	 
	?>
	<li  class="<?php echo $mod_class?>"> <a href="<?php echo $main_url?>"><i class="menu-icon fa <?php echo $menu_icon?>"></i><span class="mm-text"><?php echo $rowModules->module_name; ?></span></a>
	<?php if($num_submenu>0){?>
		<ul><?php while($rowsubMod   =  $funObj->fetch_object($resultModulesSub)){?> 
			<li class="<?php echo ($contentPage==$rowsubMod->page and $module==$rowsubMod->module_fol_name)?'active':''?>"> <a tabindex="-1" href="<?php echo $base_urls; ?><?php echo $rowsubMod->page; ?>-<?php echo $rowsubMod->module_fol_name; ?><?php echo !empty($rowsubMod->query_string)?"-".$rowsubMod->query_string:""; ?>" ><span class="mm-text"><?php echo $rowsubMod->module_name;?></span></a> </li>
			<?php } ?>
		</ul>
		<?php } ?>
	</li>
<?php }  ?>	
</ul>
<!-- / .navigation -->
<div class="menu-content"> <a href="<?php echo base_url('myadmin/signout')?>" class="btn btn-primary btn-block btn-outline dark"><i class="fa fa-user"></i>&nbsp;Logoout</a> </div>