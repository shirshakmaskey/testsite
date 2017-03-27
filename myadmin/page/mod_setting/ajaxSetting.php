<?php
session_start();
include_once("../../includes/application_top.php");
	if($_POST['mod_setting']=='configuration')
	{
			$configname   =  $_POST['configname'];
			$num  =  $funSettingObj->dublicateConfig($configname);
			if(!empty($num)){ echo "Dublicate Entry!!"; }else{ echo "success"; }
			
	}
	
	if($_POST['mod_setting']=='emailTemp')
	{
			$email_title   =  $_POST['email_title'];
			$num  =  $funSettingObj->dublicateEmailTemp($email_title);
			if($num>=1){ echo  "Duplicate Entry !!";  }
	}
?>