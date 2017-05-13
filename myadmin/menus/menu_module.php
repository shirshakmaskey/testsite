<div id="menuTab" style="margin:0 auto;">
<?php if(!empty($module)) { 
$background_arr  =  array("0"=>"#DB532D","1"=>"#62AD1C","2"=>"#2D8BEF",
                          "3"=>"#B31B42","4"=>"#B31B42","5"=>"#5735AF",
						  "6"=>"#00A21B","7"=>"#2D8BEF","8"=>"#DB532D",
						  "9"=>"#019E1B","10"=>"#019E1B","11"=>"#5535B0",
						  "12"=>"#432000","13"=>"#CB1605","14"=>"#BD1C48"
						  );
$resultModulesSub  =  $funObj->modulesSelectedFromId($rowModule->id); 
while($rowsubMod   =  $funObj->fetch_object($resultModulesSub)){
	$background_color  =  $background_arr[rand(0,14)];
    $background_color  =  empty($background_color)?$background_arr[0]:$background_color;
?>
  <a href="<?php echo $base_urls; ?><?php echo $rowsubMod->page; ?>-<?php echo $rowsubMod->module_fol_name; ?><?php echo !empty($rowsubMod->query_string)?"-".$rowsubMod->query_string:""; ?>" title="">
  <div class="menuItem" style="float:left;height:119px;width:119px;margin-left:10px;padding:40px 10px 10px 10px;color:#FFF;text-align:center;background:<?php echo $background_color; ?>"><?php echo $rowsubMod->module_name;  ?></div>
  </a>
<?php } // while close for menu
}// if close for menu  ?>
</div>