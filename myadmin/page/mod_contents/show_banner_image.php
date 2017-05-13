<?php
session_start();
include_once("../../includes/application_top.php");
$img  =  $_POST['imagefile'];
if(!isset($_SESSION['imageBannerFiles'])){ $_SESSION['imageBannerFiles']=array(); }
$_SESSION['imageBannerFiles'][] = $img;
foreach($_SESSION['imageBannerFiles'] as $key=>$val){
?>
<div style="width:150px;padding:8px;background:#CCC;margin-right:10px;float:left;text-align:center;">
<img src="<?php echo base_url(APPLICATIONS);?>timthumb/timthumb.php?src=<?php echo base_url('uploads/images/contents/'.$val); ?>&w=100&h=100"><br>
<input type="text" name="image_banner_title_<?php echo substr($val,0,5); ?>" class="form-control" placeholder="Banner Slogan"  >
<input type="radio" name="image_banner_arr"  value="<?php echo $val; ?>" checked="checked">&nbsp;<small>Select</small>
</div>
<?php } ?>