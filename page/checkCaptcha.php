<?php
session_start();
   if( $_SESSION['securimage_code_value']['default'] == strtolower($_POST['captcha']) && !empty($_SESSION['securimage_code_value']['default']) ) {
	echo json_encode(array('result'=>'yes'));
   } else {
		// Insert your code for showing an error message here
	die(json_encode(array("result"=>"no")));
   }
?>