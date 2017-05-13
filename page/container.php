<?php
//This is the step to include all the pages or folder pages of the folder page
//if there is any page or folder you do not want to include please fill in do_no_include array
/*
metacontains.php must include in last. so do not include here.
container.php is the self page. it is already included so donot include it.
sample.php is the sample page for creating the template contents.
*/
$do_not_include =  array("error_log","metacontains.php","container.php",'sample.php','checkCaptcha.php','action.php','action.js','ajax.php','ajax.js');
include("do_not_include.php"); // For the page that shouldn't include
$mydir  =  "page/";
$d      =  dir($mydir);
$folder_pages = array();
while($entry = $d->read())
{	if($entry!="." && $entry!=".." && !in_array($entry,$do_not_include))
	{	$cur_path  =  $mydir.$entry;						
		if(!preg_match("/\./",$cur_path))
		{   $filenumber  =  $funObj->file_count($cur_path);
			if($filenumber>0){				
				$d1      =  dir($cur_path);
				while($entry1 = $d1->read())
				{ 	if($entry1!="." && $entry1!=".." && !in_array($entry1,$do_not_include) )
					{   $cur_path1  =  $cur_path.'/'.$entry1;						
						if(!preg_match("/\./",$cur_path1))
						{   $filenumber1  =  $funObj->file_count($cur_path1);
							 if($filenumber1>0){												
								$d2      =  dir($cur_path1);
								while($entry2 = $d2->read())
									{  if($entry2!="." && $entry2!=".." && !in_array($entry2,$do_not_include) )
										{   $cur_path2  =  $cur_path1.'/'.$entry2;						
											if(!preg_match("/\./",$cur_path2))
											{  $filenumber2  =  $funObj->file_count($cur_path2);
												 if($filenumber2>0)
												  {	$d3      =  dir($cur_path2);
													while($entry3 = $d3->read())
													{ if($entry3!="." && $entry3!=".." && !in_array($entry3,$do_not_include) )
													   { $cur_path3  =  $cur_path2.'/'.$entry3;						
														 if(!preg_match("/\./",$cur_path3))
														 {//for folder in third level do nothing
														 }else{
															 if(!preg_match("/\/class./",$cur_path3))
						                                       { 
															   if(!in_array($entry3,$do_not_include)){
												               if(!in_array($cur_path3,$do_not_include)){
													            $folder_pages[] = $_SESSION[ENCR_KEY.'siteDocUrl'].$cur_path3;
													                 }}													   
															     }
															   }//else close
														}//if entry dot check									
													}//while
													$d3->close();			
												  }//file count filenumber1											
											}else{
												 if(!preg_match("/\/class./",$cur_path2))
						                         { if(!in_array($entry2,$do_not_include)){
												   if(!in_array($cur_path2,$do_not_include)){
													  $folder_pages[] = $_SESSION[ENCR_KEY.'siteDocUrl'].$cur_path2;
												   }}													   
												 }
											}//else close
										}//if entry dot									
									}//while close	
									$d2->close();		
								}//file count filenumber1
						}else{
							if(!preg_match("/\/class./",$cur_path1))
						     {   if(!in_array($entry1,$do_not_include)){
							     if(!in_array($cur_path1,$do_not_include)){
							    $folder_pages[] =  $_SESSION[ENCR_KEY.'siteDocUrl'].$cur_path1;
							  }}
							 }
							 
						}//else close
					}//if entry dot check									
				}//while
				$d1->close();				
		  }//if count				   
		}else{							
    			   if(!in_array($entry,$do_not_include))
				   if(!in_array($cur_path,$do_not_include)){
				   	$folder_pages[] = $_SESSION[ENCR_KEY.'siteDocUrl'].$cur_path;
				   }
	        }//else close
	}//if entry
}//while close
$d->close();
foreach($folder_pages as $folder_page){require($folder_page);}
/*---------------------------------------------------------------------------------------*/
//Now set the default variable you want to pass
include("jvars.php"); // For default js and css variable
include("metacontains.php"); // For Seo and Titles  
include("analyticstracking.php"); // For google analytics etc  
//require "applications/jpcache/jpcache.php";