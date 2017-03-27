<?php
session_start();
include_once("../../includes/application_top.php");
	if($_POST['mod_user']=='administrator')
	{
			$fullname   =  $_POST['fullname'];
			$emailOne   =  $_POST['emailOne'];
			$date_registration   =  $_POST['date_registration'];
			$idOfUser   =  $_POST['idOfUser'];
			$num  =  $funUserObj->dublicateAdminUser($fullname, $emailOne, $date_registration,$idOfUser);
			if($num>0) { $_SESSION['errorFree']=2; }else{ $_SESSION['errorFree']=1; }
			echo $num;
			}
	
	if($_POST['mod_user']=='emailTemp')
	{
			$email_title   =  $_POST['email_title'];
			$num  =  $funUserObj->dublicateEmailTemp($email_title);
			if($num>=1){ echo  "Duplicate Entry !!";  }
	}
	
	if($_POST['mod_user']=='student')
	{
			$fullname   =  $funObj->check($_POST['fullname']);
			$roll_no  =  $funObj->check($_POST['roll_no']);
			$date_registration  =  $funObj->check($_POST['date_registration']);
			$course_offer_id    =  $funObj->check($_POST['course_offer_id']);
			$part_id            =  $funObj->check($_POST['part_id']);
			$level_id           =  $funObj->check($_POST['level_id']);			
			$faculty_id         =  $funObj->check($_POST['faculty_id']);	
    		$dob                =  $funObj->check($_POST['dob']);
			$idOfUser           =  $funObj->check($_POST['idOfUser']);
			$academic_year      =  $funObj->check($_POST['academic_year']);
			
			

			$num  =  $funUserObj->dublicateStudentUser($fullname, $roll_no, $date_registration,$course_offer_id,$part_id,$level_id,$faculty_id ,$dob, $academic_year , $idOfUser);
			if($num>0) { $_SESSION['errorFree']=2; }else{ $_SESSION['errorFree']=1; }
			echo $num;
			
			}
?>