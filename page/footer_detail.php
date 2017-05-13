<?php
ob_start();
$row = $funContentsObj->find_by_id(1);
if($row):
?>
<a href="<?php echo base_url(); ?>"><img class="footer-logo" src="<?php echo base_url('themes/default/');?>assets/img/logo.png" width="100" alt="<?php echo COMPANY_SITE_NAME?>"></a>
<p><?=substr($row->short_description,0,200);?></p>
<a href="<?php echo base_url('pages/'.$row->slug)?>">More..</a>
<?php
endif;
$cms['module:footer_detail'] = ob_get_clean();
?>
<?php
ob_start();
?>
<?php 
$rowSetting  =  $funMenuObj->menuSettingByID(3);
if($rowSetting):
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
$resultMainMenu1   =  $funMenuObj->menuListByType($menu_type,$main_menu_id);
$the_second  =  $db->num_rows($resultMainMenu1);
$category_menu =  $rowMainMenu->category;
if($rowMainMenu->menu_link=='home' and empty($_SERVER['QUERY_STRING']) and $pagename=='index.php'){
$currentItem  =  'current-menu-item active';
if($the_second>0) $currentItem  =  'current-menu-ancestor current-menu-parent';
}else if($rowMainMenu->menu_link==$curUrlRui){
$currentItem  =  'current-menu-item active';
if($the_second>0) $currentItem  =  'current-menu-ancestor current-menu-parent';
}else{}			
?>
<li><a href="<?php echo $menu_link;?>" title="<?php echo $rowMainMenu->name; ?>" ><?php echo $rowMainMenu->name;?></a><i class="fa fa-angle-right"></i></li>
<?php }} ?>
<?php
endif;
$cms['module:shortlinks'] = ob_get_clean();
?>