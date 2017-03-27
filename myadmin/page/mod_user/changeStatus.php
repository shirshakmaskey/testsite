<?php
session_start();
include_once("../../includes/application_top.php");
			$user_id   =  $_POST['user_id'];
			$row  =  $funUserObj->userSel($user_id);
            $status  = ($row->status=="1") ? "0" : "1"; 
			
			$funUserObj -> table  =  TABLE_USER;
			$funUserObj->data  = array("status"=>$status);
			$funUserObj->cond  = array("id"=>$user_id);
			$funUserObj->update();
			
			echo ($status==1) ? "Active" : "Inactive";
	?>