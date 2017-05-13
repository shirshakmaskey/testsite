<?php
session_start();
$targetFolder  =  $_POST['targetFolder'];
$project_path  =  base64_decode($_POST['project_path']);


if(!function_exists("randomKeys")){
	function randomKeys($length,$str=''){
	   $keys = '';	
	   $add  = '';
	   if(empty($str)){
		$str  =  "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";   
	   }
	   $i = 0;
	   $strLength  =  strlen($str);
	   for($i=1;$i<=$length;$i++){
		   $add     =  @$str[rand(0,$strLength)];
		   if(empty($add)){
		   $add     =  @$str[rand(0,$strLength)];
		   $keys   .= $add; 
		   }
		   else if(empty($add)){
		   $add     =  @$str[rand(0,$strLength)];
		   $keys   .= $add; 
		   }
		   else{
			 $keys   .= $add;   
		   }		  
	   }
	   return $keys;
	}	
}



if (!empty($_FILES)) {
	$tempFile = $_FILES['Filedata']['tmp_name'];
	$targetPath = $project_path.$targetFolder;
	if(!file_exists($targetPath)){ mkdir($targetPath); }
	$targetFile = $_FILES['Filedata']['name'];
	$targetFile = preg_replace('/\-+/', '', $targetFile);
	$targetFile = preg_replace('/\s+/', '_', $targetFile);
	//add bye me
	$targetFile =  randomKeys(10).$targetFile; 
	
	// Validate the file type
	$blacklist = array("php","exe");
	$fileTypes = array('mp3',"wmv"); // File extensions
	$fileParts = pathinfo($_FILES['Filedata']['name']);	

	if(in_array($fileParts['extension'],$blacklist)) {
	    die("Restricted File!");				
		}	
		
	if (in_array($fileParts['extension'],$fileTypes)) {
		{   move_uploaded_file($tempFile,$targetPath.$targetFile); }
		
	echo $targetFile;
	} else {
		echo 'Invalid file type.';
	}
}



?>