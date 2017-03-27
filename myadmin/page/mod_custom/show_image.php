<?php
session_start();
include_once("../../includes/application_top.php");
$img  =  $_POST['imagefile'];
if(!isset($_SESSION['imageFiles'])){ $_SESSION['imageFiles']=array(); }
$_SESSION['imageFiles'][] = $img;
foreach($_SESSION['imageFiles'] as $key=>$val){
?>
<div style="width:150px;padding:8px;background:#CCC;margin-right:10px;float:left;text-align:center;">
<img src="<?php echo base_url(APPLICATIONS);?>timthumb/timthumb.php?src=<?php echo base_url('uploads/images/custom/'.$val); ?>&w=100&h=100"><br />
<input type="hidden" name="image_arr"  value="<?php echo $val; ?>">
</div>
<?php } ?>