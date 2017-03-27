<?php
session_start();
include_once("../../includes/application_top.php");
$group_type   =  $_GET['firstId'];
$result  =  $funUserObj->loadUserAccordingTogroup($group_type);		
?>
<select name="userId" onChange="if(this.value!=''){document.getElementById('perTypeForm').submit();}" id="userId" class="form-control">
<option value="">Choose user for permission</option>
<?php
while($row = $funObj->fetch_object($result)){
?>
<option value="<?php echo $row->id; ?>" <?php echo ($row->id==@$_POST['userId'])?"selected":""; ?> ><?php echo $row->fullname; ?></option>
<?php	
}
?>
</select>