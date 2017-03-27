<link rel="stylesheet" href="<?php echo base_url(APPLICATIONS."uploadify/uploadify.css"); ?>" />
<div class="row">
	<div class="col-sm-12">
		<div class="panel">
<?php 
	$pid  =   isset($_REQUEST['pid'])?$_REQUEST['pid']:0; 
	$aid  =   isset($_REQUEST['aid'])?$_REQUEST['aid']:0; 
	$rowMember        =  $funMemberObj->find_by_id($pid);
	if(!empty($aid)){
	  	$resultImage        =  $funMemberObj->find_item_id($aid);
	  	$user_upload_path  =  FCPATH.'uploads/images/members/'.$pid.'/'; 

	}
	if(isset($_SESSION['imageFiles'])){ 
	  foreach($_SESSION['imageFiles'] as $key=>$val){
		 if(file_exists($user_upload_path.$val) and !empty($val)){
			unlink($user_upload_path.$val); 
		 } 
	  }
	  unset($_SESSION['imageFiles']);
	}
?>
<div class="panel-heading"> <span class="panel-title">Manage Image <?php echo $rowMember->first_name;?></span> </div>
			<div class="panel-body">
<form action="<?php echo base_url($administrator."/page/mod_$module/act_gallery.php"); ?>" method="post" enctype="multipart/form-data" id="addEditForm">
<input type="hidden" name="hidden_id" id="hidden_id" value="<?php echo @$aid; ?>" />
<input type="hidden" name="user_id" id="user_id" value="<?php echo @$pid; ?>" />
<div class="row">
  	<div id="preview"></div>
</div>

<div class="row">
  	<div id="old_preview">  
  <?php
   if($aid>0){
   	    $num_images  =  $db->num_rows($resultImage);
	    if($num_images>0){ 
		  while($rowImage =  $db->result($resultImage)){
			    $img =  $rowImage->item_file; $image_exist =  0;
			    $user_id  = $rowImage->user_id;
			    $user_upload_path  =  FCPATH.'uploads/images/members/'.$user_id.'/'; 
                $user_url_path  =  base_url().'uploads/images/members/'.$user_id.'/';
				if(file_exists($user_upload_path.$img) and !empty($img)){
                     $image_exist =  1;
				?>
				<div class="" id="thumb_image_<?php echo $rowImage->id; ?>"><a href=""><img src="<?php echo $user_url_path.$img;?>" class="img-polaroid"></a><br /><br />
				<div class="form-group">
				 <label for="title" class="col-lg-3 control-label">Title</label>
				<div class="col-lg-9"><textarea name="image_title[]" class="form-control" ><?=@$rowImage->item_title?></textarea></div></div><br />
				
				<div class="form-group">
				<label for="title" class="col-lg-3 control-label">Content</label>
				<div class="col-lg-9"><textarea name="image_content[]" class="form-control" ><?=@$rowImage->item_detail?></textarea></div></div><br />
				
                 
                 <input type="checkbox" name="image_arr[]"  value="<?php echo $img; ?>" checked="checked">
				<a style="cursor:pointer;" onclick="deleteImage(<?php echo $rowImage->id; ?>);" class="btn btn-default">Delete <span class="glyphicon glyphicon-remove"></span></a>
				</div>
				
				<?php
		      }//file exist
	  }//while
   }//if num
  }//if id >0
  ?>
  </div>
  </div>
  

<div class="row" style="display:<?php echo empty($aid)?"block":(($num_images>0 and $image_exist=='1')?"none":"block");?>" id="image_upload_div">  
    <div class="form-group">
      <label for="image" class="col-lg-3 control-label">Upload Images</label>
	  <div class="col-lg-5">
	   <input type="file" name="image_upload" id="image_upload" class="form-control">
	  </div>
    </div> 
</div>

    <div class="form-group">
    <label for="buttons" class="col-lg-3 control-label">&nbsp;</label>
    <input type="submit" name="submitBtn" id="submitBtn" class="btn btn-primary" value="Save"  />
	<input type="button" name="cancelBtn" class="btn btn-primary" value="Cancel" onclick="window.location.href='list-<?=$module?>'"  />
  </div>
</form>
</div>
		</div>
	</div>
</div>  

<script type="text/javascript" src="<?php echo base_url(APPLICATIONS.'uploadify/jquery.uploadify.min.js'); ?>"></script>
<script type="text/javascript">
//<![CDATA[
$(document).ready(function() {
    $('#image_upload').uploadify({
    'swf'  			: '<?php echo base_url(APPLICATIONS.'uploadify/uploadify.swf'); ?>',
    'uploader'    	: '<?php echo base_url(ADMINISTRATOR."page/mod_$module/uploadify.php"); ?>',
	'formData'    	: {project_path : '<?php echo base64_encode(constant("FCPATH")); ?>',				                       targetFolder:'uploads/images/members/<?php echo $pid?>/'},
	'method'   		: 'post',
    'cancelImg' 	: '<?php echo base_url(APPLICATIONS);?>uploadify/cancel.png',
    'auto'      	: true,
	'multi'     	: true,	
	'hideButton': false,
	'buttonText' : 'Choose an Image',
	'width'     : 150,
	'height'	: 40,
	'removeCompleted' : true,
	'progressData' : 'speed',
	'uploadLimit' : 100,
	'fileTypeExts' : '*.gif; *.jpg; *.jpeg;  *.png; *.GIF; *.JPG; *.JPEG; *.PNG;',
	 'buttonClass' : 'btn btn-primary',
  	'onUploadSuccess' : function(file, data, response) {
		var filename =  data;
		$.post(base_url+'<?php echo ADMINISTRATOR."page/mod_".$module;?>/show_image.php',{imagefile:filename,pid:'<?php echo $pid;?>',aid:'<?php echo $aid;?>'},function(msg){
			   $('#preview').html(msg).show();
			});	    
    },
	'onDialogOpen'  : function(event,ID,fileObj) {},
	'onUploadError' : function(file, errorCode, errorMsg, errorString) { alert(errorMsg); },
	'onUploadComplete' : function(file){ //alert('The file ' + file.name + ' was successfully uploaded');
        } 	
  });
});
// ]]>
function deleteImage(id)
{
	if(confirm('Are you sure, you want to delete this?')){
		  $.post(admin_url+'page/mod_<?php echo $module?>/ajax.php',{id:id,mode:'delete_image'},function(data){
			  $("#thumb_image_"+id).hide('slow');
			  $("#thumb_image_"+id).html('');
		      alert(data.msg);
		      $('#image_upload_div').show();
		      $('#hidden_id').val('0');		     
	      },'json');//function
    }//if confirm close
}
</script>