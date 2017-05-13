<?php
session_start();
include_once("../../includes/application_top.php");
$pid  =   isset($_POST['pid'])?$_POST['pid']:0; 
$aid  =   isset($_POST['aid'])?$_POST['aid']:0; 
	if(!empty($aid)){
	  	$rowImage 	=  $funMemberObj->find_item_by_id($aid);
}

$img  =  $_POST['imagefile'];
if(!isset($_SESSION['imageFiles'])){ $_SESSION['imageFiles']=array(); }
$_SESSION['imageFiles'][] = $img;
foreach($_SESSION['imageFiles'] as $key=>$val){
	?>
	<div class="row">
		<div class="col-lg-12">
		     <div class="form-group">
		     <div class="col-lg-12"><img src="<?php echo base_url(APPLICATIONS);?>timthumb/timthumb.php?src=<?php echo base_url('uploads/images/members/'.$pid.'/'.$val); ?>&h=100"></div></div>
		     </div>
		     <div class="form-group"><div class="col-lg-12">
			<textarea name="image_title[]" class="form-control" placeholder="Title" ><?=@$rowImage->item_title?></textarea>
			</div></div>
			<div class="form-group"><div class="col-lg-12">
			<textarea  name="image_content[]" class="form-control" placeholder="Content" ><?=@$rowImage->item_detail?></textarea>
			</div></div>
			
			<div class="form-group"><div class="col-lg-2">
			<?php if(!empty($aid)){?>
    <input type="radio" name="image_arr[]"  value="<?php echo $val; ?>" checked >
	<?php }else{?>
	<input type="checkbox" name="image_arr[]"  value="<?php echo $val; ?>" checked >
	<?php } ?>
			&nbsp;<small>Select</small>
			</div></div>
		</div>
	</div>
	<?php } ?>