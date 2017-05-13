<?php
$resultConfig  =  $funObj->ConfigList();
while($rowConfig  =  $funObj->fetch_object($resultConfig))
{	if($rowConfig->configtype=='image' OR $rowConfig->configtype=='file'){ 
	$config_image_file  =  base_url('uploads/config/').$rowConfig->configvalue;
	define($rowConfig->configname,$config_image_file);
	$scms['{'.$rowConfig->configname.'}'] = $config_image_file; 
    }else{
	define($rowConfig->configname,$rowConfig->configvalue);
	$scms['{'.$rowConfig->configname.'}'] = $rowConfig->configvalue; 
    }
    define($rowConfig->configname."_DESC",$rowConfig->configdesc);
 }
//for setting the level
$funObj->userLevelList();
// for setting the level End

//some constants
?>