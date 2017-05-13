<?php
$resultConfig  =  $funObj->ConfigList();
while($rowConfig  =  $funObj->fetch_object($resultConfig))
{	define($rowConfig->configname,$rowConfig->configvalue); }
//for setting the level
$funObj->userLevelList();
// for setting the level End
?>