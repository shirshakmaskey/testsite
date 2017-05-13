<?php
ob_start();
?>
<!-- Brand and toggle get grouped for better mobile display -->
<div class="menu-container">
  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>

<!-- Navbar Brand -->
<div class="navbar-brand">
    <a href="{BASE_URL}">
        <img class="shrink-logo" src="<?php echo base_url(THEMES.DS.get_template()); ?>/images/logo.png" alt="Logo">
    </a>
</div>
<!-- End Navbar Brand -->
  
    
  <!-- Header Inner Right -->
  <div class="header-inner-right">
    <ul class="menu-icons-list">
      <li class="hoverSelector"><a></a></li>
    </ul>
  </div>
  <!-- End Header Inner Right --> 
</div>
<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse navbar-responsive-collapse">
  <div class="menu-container">
    <ul class="nav navbar-nav">
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
      <li id="menu-item-<?=$main_menu_id?>" class="menu-item menu-item-type-<?php echo ($category_menu==0)?"custom":"post_type";?> menu-item-object-<?php echo ($category_menu==0)?"custom":"page";?> <?php echo $currentItem;?> <?php echo ($the_second>0)?"menu-item-has-children":""?> menu-item-<?=$main_menu_id?> <?php echo ($the_second>0)?"dropdown":""?> nav_top"><a href="<?php echo $menu_link;?>" class="parent <?php echo ($the_second>0)?"dropdown-toggle":""?>" <?php if($the_second>0){?>  data-toggle="dropdown" role="button" aria-expanded="false" <?php }?> title="<?php echo $rowMainMenu->name; ?>" ><?php echo $rowMainMenu->name;?></a>
        <?php  if($the_second>0){?>
        <ul class="sub-menu dropdown-menu depth_0">
          <?php while($rowMainMenu1 =  $db->result($resultMainMenu1)){	
		   $main_menu_id1 =  $rowMainMenu1->id;
		   $resultMainMenu2   =  $funMenuObj->menuListByType($menu_type,$main_menu_id1);
		   $numMainMenu2  = $db->num_rows($resultMainMenu2);
		   
			$link_type1  = ($rowMainMenu1->link_type=="external")?"target='_blank'":"_self";
			$menu_link1  =  $rowMainMenu1->menu_link;
			if(!preg_match("/http:/",$menu_link1)){ 
			$menu_link1  =  base_url($menu_link1); }
			
			$category_menu1 =  $rowMainMenu1->category;
		
if($rowMainMenu1->menu_link==$curUrlRui){
$currentItem1  =  'current-menu-item current_page_item';
}else{}	
			
	  ?>
          <li id="menu-item-<?=$main_menu_id1?>" class="dropdown-submenu menu-item menu-item-type-<?php echo ($category_menu1==0)?"custom":"post_type";?> menu-item-object-<?php echo ($category_menu1==0)?"custom":"page";?>  page_item page-item-<?=$main_menu_id1?> <?php echo $currentItem;?> <?php echo ($the_second>0)?"menu-item-has-children":""?> menu-item-<?=$main_menu_id1?>"><a href="<?php echo $menu_link1;?>" target="<?php echo $link_type1;?>" class="nav_child" id="id_menu_<?php echo $main_menu_id1?>" data-id="<?php echo "data_menu_id_".$main_menu_id1; ?>" title="<?php echo $rowMainMenu1->name;?>"><?php echo $rowMainMenu1->name;?></a>
            <?php	             
  if($numMainMenu2>0){?>
            <ul class="sub-menu dropdown-menu depth_1">
              <?php while($rowMainMenu2 =  $db->result($resultMainMenu2)){	
		   $main_menu_id2 =  $rowMainMenu2->id;
			$link_type2  = ($rowMainMenu2->link_type=="external")?"target='_blank'":"_self";
			$menu_link2  =  $rowMainMenu2->menu_link;
			if(!preg_match("/http:/",$menu_link2)){ 
			$menu_link2  =  base_url($menu_link2); }
			
			$category_menu2 =  $rowMainMenu2->category;
	   ?>
              <li id="menu-item-<?=$main_menu_id2?>" class="menu-item menu-item-type-<?php echo ($category_menu2==0)?"custom":"post_type";?> menu-item-object-<?php echo ($category_menu2==0)?"custom":"page";?>  page_item page-item-<?=$main_menu_id2?> menu-item-<?=$main_menu_id2?>"><a href="<?php echo $menu_link2;?>" target="<?php echo $link_type2;?>" class="nav_child_2" id="id_menu_<?php echo $main_menu_id2?>" data-id="<?php echo "data_menu_id_".$main_menu_id2; ?>" title="<?php echo $rowMainMenu2->name; ?>"><?php echo $rowMainMenu2->name; ?></a></li>
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
    </ul>
  </div>
</div>
<!--/navbar-collapse-->
<?php
$cms['module:mainmenu'] = ob_get_clean();