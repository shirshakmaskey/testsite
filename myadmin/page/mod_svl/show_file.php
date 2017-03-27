<?php
session_start();
include_once("../../includes/application_top.php");
$file  =  $_POST['selectedfile'];
$_SESSION['selectedfiles']=array();
$_SESSION['selectedfiles'][] = $file;

foreach($_SESSION['selectedfiles'] as $key=>$val){
?>
<div class="thumbnail">
<label for="file"><?php echo $val; ?></label>
<input type="hidden" name="file_arr"  value="<?php echo $val; ?>">
</div>
<?php } ?>