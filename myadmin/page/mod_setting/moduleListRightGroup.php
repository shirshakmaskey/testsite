<script language="javascript">
function submitMyForm(groupId){
   document.getElementById('groupId').value=groupId;
   document.getElementById('permissionForm').submit();
}
</script>
<form method="post" action="page/mod_setting/act_permission.php" id="permissionForm">
<input type="hidden" name="savePer" id="savePer" value="1"/>
<input type="hidden" name="groupId" id="groupId"/>
<input type="hidden" name="mytoken" value="<?php echo $mytoken; ?>"  />
<table>
<tr height="35">
  <?php $resultGroup = $funSettingObj->userGroupTypeList('BackEnd');
		while( $rowGroup    = $funObj->fetch_object($resultGroup)){
		$levelIdArr[] = $rowGroup->id;
		?>
  <td align="center"><?php echo $rowGroup->group_name; ?></td>
  <?php } ?>
</tr>
<tr height="35">
  <?php
			  foreach($levelIdArr as $key=>$val){
			  ?>
  <td><input type="checkbox"  <?php echo ($val=="1")? "checked disabled":""; ?>    class="master_checkbox" id="master_checkbox_<?php echo $val; ?>" >
    &nbsp;&nbsp;<?php if($val!=1){?>
    <input type="button" value="Save" name="Save<?php echo $val; ?>" onclick="submitMyForm('<?php echo $val; ?>');"   ><?php } ?></td>
  <?php } ?>
</tr>
<?php 
$resultModulesPer  =   $funObj->modulesList();
$altCol=0;
$altCol_sub=0;
while($rowModules   =  $funObj->fetch_object($resultModulesPer))
 {			
 ?>
<tr height="35">
  <?php
  foreach($levelIdArr as $key=>$val){
  ?>
  <td align="center"><input type="checkbox" name="selectedParent<?php echo $val; ?>[]" id="<?php echo $val; ?>_<?php echo $rowModules->id; ?>" value="<?php echo $rowModules->id; ?>/1"  <?php echo ($val=="1")? "checked disabled":""; ?> <?php $rowses  = $funObj->checkPermissionSelected("group",$val,@$rowModules->id); echo (@$rowses->status=="1") ? "checked":"";   ?> class="module_checkbox  master_checkbox_<?php echo $val; ?> module_class" /></td>
  <?php } ?>
</tr>

<!--For the children-->
<?php 
$resultModSel  =   $funObj->modulesSelectedFromId(@$rowModules->id);
while($rowModSel   =  $funObj->fetch_object($resultModSel))
 {			 
?>
<tr height="35">
  <?php
	foreach($levelIdArr as $key=>$val){
	?>
  <td align="center"><input type="checkbox" name="selected<?php echo $val; ?>[]" data-class="<?php echo $val; ?>_<?php echo $rowModules->id; ?>" id="child_box<?php echo $val; ?>_<?php echo $altCol_sub; ?>" value="<?php echo $rowModSel->id; ?>/1"  <?php echo ($val=="1")? "checked disabled":""; ?> <?php $rowsesChild  = $funObj->checkPermissionSelected("group",$val,@$rowModSel->id); echo (@$rowsesChild->status=="1") ? "checked":"";?>  class="sub_module_checkbox  master_checkbox_<?php echo $val; ?> child_class_<?php echo $val; ?>_<?php echo $rowModules->id; ?>" /></td>
  <?php } ?>
</tr>
<?php 
 $altCol_sub++; } ?>
<!--For the children-->
<?php
$altCol++; } ?>
</table>
</form>