<?php
session_start();
include_once("../../includes/application_top.php");
			$user_id   =  $_POST['user_id'];
			$row  =  $funUserObj->userSel($user_id);
            $make_login  = ($row->make_login=="1" or $row->make_login=="on") ? "0" : "1"; 
			
			$funUserObj -> table  =  TABLE_USER;
			$funUserObj->data  = array("make_login"=>$make_login);
			$funUserObj->cond  = array("id"=>$user_id);
			$funUserObj->update();
			
			echo ($make_login==1) ? "Yes" : "No";
	?>
