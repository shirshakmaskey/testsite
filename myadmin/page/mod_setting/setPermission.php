<?php
session_start();
include_once("../../includes/application_top.php");
$levelId =  $_POST['levelId'];
$moduleId =  $_POST['moduleId'];
$permissionRowId =  $_POST['permissionRowId'];


if($permissionRowId!="")
{	
$row  = $funSettingObj->permissionSel($permissionRowId);	
$moduleId   =  ($row->module_id!="") ? "" :	$moduleId;
$funSettingObj->action = "edit";
$funSettingObj->table=TABLE_PERMISSION;
$funSettingObj->data =array("module_id"=>$moduleId,
                        "level_id"=>$levelId
					   );
$funSettingObj->cond =array("id"=>$row->id);
$funSettingObj->doAction();
}

else
{
echo $funSettingObj->action = "add";
$funSettingObj->table=TABLE_PERMISSION;
$funSettingObj->data =array("module_id"=>$moduleId,
                        "level_id"=>$levelId
					   );
$funSettingObj->doAction();	
}

?>