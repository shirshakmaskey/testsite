<?php 
$mytoken   = md5(uniqid( rand(),true));
$_SESSION['mytoken'] = $mytoken;
?>