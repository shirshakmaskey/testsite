<?php
require_once("application_top.php");
$setshow  =  $_GET['set']; 
if($setshow=="no")
{ $_SESSION['showHeader'] = "yes";
  $_SESSION['showLeft'] = "yes";
  $funObj->redirect($_SERVER['HTTP_REFERER']);
}
else
{
  $_SESSION['showHeader'] = "no";
  $_SESSION['showLeft'] = "no";
  $funObj->redirect($_SERVER['HTTP_REFERER']);
}
?>
