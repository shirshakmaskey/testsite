<?php
session_start();
include_once("../../includes/application_top.php");
$file  =  $_POST['selectedfile'];
if(!isset($_SESSION['selectedfiles'])){ $_SESSION['selectedfiles']=array(); }
$_SESSION['selectedfiles'][] = $file;

foreach($_SESSION['selectedfiles'] as $key=>$val){
?>
<div class="thumbnail">
<label for="file"><?php echo $val; ?></label>
<input type="text" name="file_title[]" class="form-control" placeholder="Title">
<input type="checkbox" name="file_arr[]"  value="<?php echo $val; ?>">&nbsp;<small>Select</small>
</div>
<?php } ?>