<?php
if($_SESSION['user_agent']!=$_SERVER['HTTP_USER_AGENT']){ echo "<script>window.location.href='http://google.com'</script>";  }
defined("MYINDEX") or die("Restricted Access for viewing this file");
?>
<script language="javascript">
$(document).ready( function()
{
   $("#company_heading").click(function()
	{ window.location.href='index.php';
	});

});
</script>
<!-- header starts -->
<link rel="stylesheet" href="<?php echo $base_urls; ?>menus/menu.css" />
<div id="header">
  <div class="logo">
    <h1 id="company_heading"><?php echo $funObj->ConfigValue('COMPANY_SITE_NAME'); ?></h1>
    <div class="logoRigth">  
	  <div style="float:left;">
      Welcome Mr./Mrs. &nbsp;<a href="<?php echo $_SERVER['PHP_SELF']; ?>?_page=viewadminUserListpage&mod=user&aid=<?php echo $_SESSION[ENCR_KEY.'pathsaleLoginId']; ?>&lactl=lweivl"><?php echo ucwords( $_SESSION['fullname'] );?></a><br />
      <?php echo date("D F d Y"); ?>&nbsp;<span id="datetime"></span></div>
	  
	  <div style="float:right;width:50px;">
	  <?php	$rowUserImage   =  $funUserObj->userListSel($_SESSION[ENCR_KEY.'pathsaleLoginId']);
		$imgHeader  =  $rowUserImage->image;							 		  
     if(file_exists("../images/user_image/".$imgHeader)  and !empty($imgHeader))
	 {
	echo "<a href='../images/user_image/$imgHeader' title='".$_SESSION['fullname']."'><img src='../applications/phpthumb/phpthumb.php?src=../../images/user_image/$imgHeader&aoe=1&h=40&w=40'  border='0' style='float:left;border-radius:4px;' ></a>"; } ?>
	 </div>
	</div> 
	  
	  <div class="clear"></div>
  </div>
  <div class="clear"></div>
  <!-- ends of class logo -->
<div>
<div class="headerL"> 
<ul>
 <li><a style="cursor:pointer;" class="topMenuAction"><span class="glyphicon glyphicon-list"></span> Menu</a></li>
 <?php if(!empty($module)) { ?>
 <li><a> >> </a></li>
 <li><a style="cursor:pointer;" rel="dropmenu1" >Manage <?php if(!empty($module)){echo $rowModule->module_name;}?></a>
 
 <?php
$accessLevelArray =  array($LevelRow['Super'],$LevelRow['Admin']);
if(in_array($_SESSION[ENCR_KEY.'level'],$accessLevelArray)){
?> 
<ul>
<?php 
$resultModulesSub=$funObj->modulesListPermisson($_SESSION[ENCR_KEY.'pathsaleLoginId'],$_SESSION[ENCR_KEY.'level'],$rowModule->id);
      if($funObj->total_rows($resultModulesSub)>0){
?>
<?php  
     while($rowsubMod   =  $funObj->fetch_object($resultModulesSub)){?>
<li>
<a href="<?php echo $base_urls; ?><?php echo $rowsubMod->page; ?>-<?php echo $rowsubMod->module_fol_name; ?><?php echo !empty($rowsubMod->query_string)?"-".$rowsubMod->query_string:""; ?>"   ><?php echo $rowsubMod->module_name;  ?></a></li> 
<?php } // while close for menu
}// if close for menu  ?>
		</ul>  
    </li>
  <?php } ?>      
</ul>
<?php } ?> 

</div><!-- ends of headerL --> 
<div class="headerR">
    <ul>
      <li> <a href="index.php" title="Please Log me OFF!"><img src="images/Home.png" border="0" height="20" width="20" title="Home" alt="Home"  /> Home</a> </li>
      <li><a href="<?php echo $funObj->siteUrl(1)."signout";?>" title="Please Log me OFF!"><img src="images/logout.png" border="0" height="20" width="20" title="Logout" alt="Logout"/> Logout</a></li>
      <li><a href="<?php echo base_url();?>" target="_blank"><span class="glyphicon glyphicon-th-large"></span> <span class="whiteColor">Visit</span></a></li>
      <li><a href="includes/full_length.php?set=<?php echo @$_SESSION['showHeader'];?>"><span class="glyphicon glyphicon-resize-horizontal"></span> <?php echo (@$_SESSION['showHeader']=='yes' or !@isset($_SESSION['showHeader']))?"Full Length":"Normal"; ?></a> </li>
	  <li><a href="javascript:void(0);" style="cursor:pointer;"><span class="topMenuAction"><span class="glyphicon glyphicon-list"></span> Menu</span></a></li>
    </ul>
  </div>
</div>  

<!-- ends of class headerR -->
  <div class="clearfloat"></div>
  <script type="text/javascript">
	$(document).ready(function() {
		$("#menuTab").hide();							   
		$(".topMenuAction").click( function() { $("#menuTab").slideToggle('slow'); }); 
		$("#messageDiv1").click(function(){ 
		$(this).animate({ 
        width: "95%",
        opacity: 0.4,
        marginLeft: "0.6in",
      }, 1500 );
		$(this).hide("slow"); });		
	});
	</script>
</div>
<!-- header ends -->
<div class="clearfloat"></div>
