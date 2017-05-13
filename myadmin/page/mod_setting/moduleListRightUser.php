<?php if(isset($_POST['userId'])){ $userId = $_POST['userId'];} ?>
<script language="javascript">
function submitMyForm(){
   document.getElementById('permissionForm').submit();
}
</script>
<form method="post" action="page/mod_setting/act_permission.php" id="permissionForm">
<input type="hidden" name="savePer" id="savePer" value="1"/>
<input type="hidden" name="userId" id="userId" value="<?php echo $userId; ?>"/>
<input type="hidden" name="mytoken" value="<?php echo $mytoken; ?>"  />
<?php  
if(!empty($userId)){ ?>
<table id="userPermissionTable">
<tr height="35">
  <?php $resultGroup = $funSettingObj->userGroupTypeList('BackEnd');
		while( $rowGroup    = $funObj->fetch_object($resultGroup)){
		 if($rowGroup->id==$_POST['groupId']){ $levelIdArr[] = $rowGroup->id;
		?>
  <td align="center"><?php echo $rowGroup->group_name; ?></td>
  <?php }} ?>
  <td align="center"><?php $rowUser = $funUserObj->userSel($userId);
  echo $rowUser->fullname; ?></td>
</tr>
<tr height="35">
 <td>&nbsp;</td>
  <?php
			  foreach($levelIdArr as $key=>$val){
			  ?>
 <td><input type="checkbox"  class="master_checkbox" id="master_checkbox_<?php echo $val; ?>">
    &nbsp;&nbsp;
    <input type="button" value="Save" name="Save<?php echo $val; ?>" onclick="submitMyForm();"   ></td>
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
  <td align="center"><input type="checkbox" name="selectedParent<?php echo $val; ?>[]" value="<?php echo $rowModules->id; ?>/1"  disabled="disabled" <?php echo ($val==1)?"checked":""; ?>  <?php $rowses  = $funObj->checkPermissionSelected("group",$val,@$rowModules->id); echo (@$rowses->status=="1") ? "checked":"";?>  /></td>
  <?php } ?>
  
 <td align="center"><input type="checkbox" name="selectedParentUser[]" id="<?php echo $val; ?>_<?php echo $rowModules->id; ?>"  value="<?php echo @$rowModules->id; ?>/1"  <?php $rowses  = $funObj->checkUserPermissionSelected("user",@$userId,@$rowModules->id); echo (@$rowses->status=="1") ? "checked":"";?> class="module_checkbox  master_checkbox_<?php echo $val; ?> module_class" /></td>
</tr>

<!--For the children-->
<?php 
$resultModSel  =   $funObj->modulesSelectedFromId($rowModules->id);
while($rowModSel   =  $funObj->fetch_object($resultModSel))
 {			 
?>
<tr height="35">
  <?php
	foreach($levelIdArr as $key=>$val){
	?>
  <td align="center"><input type="checkbox" name="selected<?php echo $val; ?>[]"  value="<?php echo $rowModSel->id; ?>/1"  disabled="disabled" <?php echo ($val==1)?"checked":""; ?> <?php $rowsesChild  = $funObj->checkPermissionSelected("group",$val,@$rowModSel->id); echo (@$rowsesChild->status=="1") ? "checked":"";?> /></td>
  <?php } ?>
  <td align="center"><input type="checkbox" name="selectedUser[]" data-class="<?php echo $val; ?>_<?php echo $rowModules->id; ?>" id="child_box<?php echo $val; ?>_<?php echo $altCol_sub; ?>"  value="<?php echo @$rowModSel->id; ?>/1"  <?php $rowsesChild  = $funObj->checkUserPermissionSelected("user",@$userId,@$rowModSel->id); echo (@$rowsesChild->status=="1") ? "checked":""; ?> class="sub_module_checkbox  master_checkbox_<?php echo $val; ?> child_class_<?php echo $val; ?>_<?php echo $rowModules->id; ?>"   /></td>
</tr>
<?php 
 $altCol_sub++; } ?>
<!--For the children-->
<?php
$altCol++; } ?>
</table>
<?php }//check for the user set or not end ?>
</form>
