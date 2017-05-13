<?php 
    include("page/setAndCheckAll.php");
    include("page/mod_setAndCheckAll/setToken.php");
    $aid  =   isset($_REQUEST['aid'])?decode($_REQUEST['aid']):0; 
	if(!empty($aid)){
	  	$row  			=  $funItemsObj->find_by_id($aid);
	   	$resultImage 	=  $funItemsObj->file_items($aid);
	   	$resultfile  	=  $funItemsObj->file_items($aid,'file');
	}
	if(isset($_SESSION['imageFiles'])){ 
	  foreach($_SESSION['imageFiles'] as $key=>$val){
		 if(file_exists(FCPATH."uploads/images/items/".$val) and !empty($val)){
			unlink(FCPATH."uploads/images/items/".$val); 
		 } 
	  }
	  unset($_SESSION['imageFiles']);
	}
	if(isset($_SESSION['selectedfiles'])){ 
	  foreach($_SESSION['selectedfiles'] as $key=>$val){
		 if(file_exists(FCPATH."uploads/files/items/".$val) and !empty($val)){
			unlink(FCPATH."uploads/files/items/".$val); 
		 } 
	  }
	  unset($_SESSION['selectedfiles']);
	}
?>

<div>
	<h2>Manage Food Items</h2>
	<hr />
</div>
<link rel="stylesheet" href="<?php echo base_url("assets/uploadify/uploadify.css"); ?>" />
<div class="body_part">
	<form action="<?php echo base_url("$administrator/page/mod_$module/act_thismodule.php"); ?>" method="post" enctype="multipart/form-data" id="addEditForm">
		<input type="hidden" name="mytoken" value="<?php echo $mytoken; ?>"  />
		<input type="hidden" name="hidden_id" id="hidden_id" value="<?php echo @encode($aid); ?>" />
		<div class="row">Asterisk (<span class="req">*</span> ) fields are required</div>
		<div class="row">
		   <div class="col-md-6">
		       <div class="form-group">
			<label for="title">Title <span class="req">*</span></label>
			<input type="text" name="txtTitle" id="txtTitle" class="form-control required" value="<?php echo @$row->article_title;?>" />
		</div>
		
		<div class="form-group">
			<label for="title">Title (Danish)<span class="req">*</span></label>
			<input type="text" name="txtTitle_de" id="txtTitle_de" class="form-control required" value="<?php echo @$row->article_title_de;?>" />
		</div>
		   </div>
		   
		   <div class="col-md-6">
		       <div class="form-group">
			<label for="title">Category <span class="req">*</span></label>
			<?php
				$category_id  = @$row->category;
	            $funItemsObj->getCatListInDropDownItems($category_id,"category_id");				
				 ?>
		</div>
		
		
		
		<div class="form-group">
			<label for="title">Price <span class="req">*</span></label>
			<div class="">
				<select name="currency" id="currency" class="form-control required" style="width:110px;float:left;" >
					<?php $res  =  $funItemsObj->currency(); 
	    if($funObj->num_rows($res)>0){
		   while($row_res  = $funObj->result($res)){
			?>
					<option value="<?=$row_res->cur_id?>">
					<?=$row_res->currency_title?>
					(
					<?=$row_res->symbol?>
					)</option>
					<?php }
		}
	?>
				</select>
				<input type="text" name="price" id="price" class="form-control required" style="width:60px;float:left;" value="<?php echo @$row->price;?>" />
			</div>
		</div>
		   </div>
		
		</div>
		
		
		
		<div class="row">
			<label for="description">Short Description <span class="req">*</span></label>
			<textarea name="txtShortDescription" id="txtShortDescription" rows="4" class="form-control required"><?php echo @$row->short_description;?></textarea>
		</div>
		
		<div class="row">
			<label for="description">Short Description (Danish)<span class="req">*</span></label>
			<textarea name="txtShortDescription_de" id="txtShortDescription_de" rows="4" class="form-control required"><?php echo @$row->short_description_de;?></textarea>
		</div>
		<div class="row">
			<label for="description">Description <span class="req">*</span></label>
			<textarea name="txtDescription" id="txtDescription" class="txt required"><?php echo @$row->description;?></textarea>
		</div>
		<div class="row">
			<label for="description">Description (Danish)<span class="req">*</span></label>
			<textarea name="txtDescription_de" id="txtDescription_de" class="txt required"><?php echo @$row->description_de;?></textarea>
		</div>
		<div class="row">
			<div id="old_preview">
				<?php
   if($aid>0){
	  if($funObj->num_rows($resultImage )>0){
		  while($row_item =  $funObj->result($resultImage)){
			    $img =  $row_item->item_name;
				if(file_exists(FCPATH.'uploads/images/items/'.$img) and !empty($img)){ ?>
				<div class="thumb_box" id="thumb_image_<?php echo $row_item->id; ?>"><a href=""><img src="<?php echo base_url(APPLICATIONS);?>timthumb/timthumb.php?src=<?php echo base_url('uploads/images/items/'.$img); ?>&w=100&h=100" class="img-polaroid"></a><br />
					<br />
					<input type="text" name="old_preview_title_<?php echo $row_item->id; ?>" id="old_preview_title_<?php echo $row_item->id; ?>" value="<?php echo $row_item->item_title; ?>" placeholder="Title" class="form-control" />
					<br />
					<a style="cursor:pointer;" onclick="SaveImageFile(<?php echo $row_item->id; ?>);">Save</a> <a style="cursor:pointer;" onclick="deleteImage(<?php echo $row_item->id; ?>);">Delete</a> </div>
				<?php
		      }//file exist
	  }//while
   }//if num
  }//if id >0
  ?>
			</div>
			<div id="preview"></div>
		</div>
		<div class="row">
			<div class="form-group">
				<label for="image">Upload Images</label>
				<div class="col-lg-2">
					<input type="file" name="image_upload" id="image_upload" class="form-control">
				</div>
			</div>
		</div>
		<div class="clear"></div>
		<div class="row">
			<div id="old_file_preview">
				<?php
   if($aid>0){
	  if($funObj->num_rows($resultfile )>0){
		  while($row_item =  $funObj->result($resultfile)){
			    $file =  $row_item->item_name;
				if(file_exists(FCPATH.'uploads/files/items/'.$file) and !empty($file)){ ?>
				<div class="file_box" id="thumb_file_<?php echo $row_item->id; ?>"><a href="<?php echo base_url('uploads/files/items/'.$file); ?>" target="_blank"><?php echo $file; ?></a><br />
					<a style="cursor:pointer;" onclick="deleteFile(<?php echo $row_item->id; ?>);">Delete</a> </div>
				<?php
		      }//file exist
	  }//while
   }//if num
  }//if id >0
  ?>
			</div>
			<div class="clear"></div>
			<div id="file_preview"></div>
		</div>
		<div class="row">
			<div class="form-group">
				<label for="image">Upload Files</label>
				<div class="col-lg-2">
					<input type="file" name="file_upload" id="file_upload" class="form-control">
				</div>
			</div>
		</div>
		<div class="clear"></div>
		<br />
		<div class="row">
			<label for="menu">Show in Homepage<span class="req">*</span></label>
			<input type="checkbox" name="chkHomepage" id="chkHomepage" value="1"  <?php echo @($row->show_in_home_page==1)?"checked":"";?>  />
		</div>
		
		<div class="row">
			<label for="menu">Today's Special<span class="req">*</span></label>
			<input type="checkbox" name="todays_special" id="todays_special" value="1"  <?php echo @($row->todays_special==1)?"checked":"";?>  />
		</div>
		
		<div class="row">
			<label for="menu">Special Block<span class="req">*</span></label>
			<input type="checkbox" name="special_block" id="special_block" value="1"  <?php echo @($row->special_block==1)?"checked":"";?>  />
		</div>
		
		<div class="row">
			<label for="Status">Status <span class="req">*</span></label>
			<input type="checkbox" name="status" id="status" value="1"  <?php echo @($row->status==1)?"checked":"";?>  />
		</div>
		<div class="row">
			<input type="submit" name="submitBtn" id="submitBtn" class="btn btn-primary" value="Save"  />
			<input type="button" name="cancelBtn" class="btn btn-primary" value="Cancel" onclick="window.location.href='list-<?php echo $module;?>'"  />
		</div>
		<br />
		<div class="row" style="margin-left:0px;">
			<div onclick="$('.meta_contents').slideToggle('slow');" style="border:1px solid #999;border-radius:8px;background:#CCC;padding-left:50px;cursor:pointer;"><strong>Meta Contents</strong></div>
			<br />
			<div class="row meta_contents" style="display:none;margin-left:0px;">
				<label for="description">Meta kewords <span class="req">*</span></label>
				<textarea class="form-control" name="meta_keywords" id="meta_keywords"><?php echo @$row->meta_keywords;?></textarea>
			</div>
			<div class="row meta_contents" style="display:none;margin-left:0px;">
				<label for="description">Meta Description <span class="req">*</span></label>
				<textarea class="form-control" name="meta_desc" id="meta_desc"><?php echo @$row->meta_desc;?></textarea>
			</div>
		</div>
		<!--meta contents end-->
		
	</form>
</div>
<script language="javascript" src="page/mod_<?Php echo $module;?>/add_edit.js"></script> 
<script>$(document).ready( function(){ $("#txtCatName").focus(); });</script> 
<script type="text/javascript" src="<?php echo base_url(APPLICATIONS.'ckeditor/ckeditor.js'); ?>"></script> 
<script type="text/javascript" src="<?php echo base_url(APPLICATIONS.'ckfinder/ckfinder.js'); ?>"></script> 
<script>
autosize(document.querySelectorAll('textarea'));
var base_url =  "<?php echo base_url(); ?>";
CKEDITOR.replace( 'txtDescription',
    {   extraPlugins : 'autogrow',
		autoGrow_maxHeight : 800,
		// Remove the Resize plugin as it does not make sense to use it in conjunction with the AutoGrow plugin.
		removePlugins : 'resize',
        filebrowserBrowseUrl : base_url+'assets/ckfinder/ckfinder.html',
        filebrowserImageBrowseUrl : base_url+'assets/ckfinder/ckfinder.html?Type=Images',
        filebrowserFlashBrowseUrl : base_url+'assets/ckfinder/ckfinder.html?Type=Flash',
        filebrowserUploadUrl : base_url+'assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        filebrowserImageUploadUrl : base_url+'assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
        filebrowserFlashUploadUrl : base_url+'assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
    });
CKEDITOR.replace( 'txtDescription_de',
    {   extraPlugins : 'autogrow',
		autoGrow_maxHeight : 800,
		// Remove the Resize plugin as it does not make sense to use it in conjunction with the AutoGrow plugin.
		removePlugins : 'resize',
        filebrowserBrowseUrl : base_url+'assets/ckfinder/ckfinder.html',
        filebrowserImageBrowseUrl : base_url+'assets/ckfinder/ckfinder.html?Type=Images',
        filebrowserFlashBrowseUrl : base_url+'assets/ckfinder/ckfinder.html?Type=Flash',
        filebrowserUploadUrl : base_url+'assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        filebrowserImageUploadUrl : base_url+'assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
        filebrowserFlashUploadUrl : base_url+'assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
    });	
</script> 
<script type="text/javascript" src="<?php echo base_url(APPLICATIONS.'uploadify/jquery.uploadify.min.js'); ?>"></script> 
<script type="text/javascript">
   // <![CDATA[
    $(document).ready(function() {
    $('#image_upload').uploadify({
    'swf'  			: '<?php echo base_url(APPLICATIONS.'uploadify/uploadify.swf'); ?>',
    'uploader'    	: '<?php echo base_url(ADMINISTRATOR."page/mod_$module/uploadify.php"); ?>',
	'formData'    	: {project_path : '<?php echo base64_encode(constant("FCPATH")); ?>',				                       targetFolder:'uploads/images/items/'},
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
		$.post(base_url+'<?php echo ADMINISTRATOR."page/mod_".$module;?>/show_image.php',{imagefile:filename},function(msg){
			   $('#preview').html(msg).show();
			}); 
		    
    },
	'onDialogOpen'      : function(event,ID,fileObj) {		
    },
	'onUploadError' : function(file, errorCode, errorMsg, errorString) {
           alert(errorMsg);
        },
	'onUploadComplete' : function(file) {
           // alert('The file ' + file.name + ' was successfully uploaded');
        } 	
  });
});
    // ]]>
</script> 
<script type="text/javascript">
   // <![CDATA[
    $(document).ready(function() {
    $('#file_upload').uploadify({
	'swf'  			: '<?php echo base_url(APPLICATIONS.'uploadify/uploadify.swf'); ?>',
    'uploader'    	: '<?php echo base_url(ADMINISTRATOR."page/mod_$module/uploadify_file.php"); ?>',	
	'formData'    		: {project_path : '<?php echo base64_encode(constant("FCPATH")); ?>',targetFolder:'uploads/files/items/'},
	'method'   			: 'post',
    'cancelImg' 		: '<?php echo base_url(APPLICATIONS);?>uploadify/cancel.png',
    'auto'      		: true,
	'multi'     		: true,	
	'hideButton'		: false,
	'buttonText' 		: 'Choose File',
	'width'     		: 150,
	'height'			: 40,
	'removeCompleted' 	: true,
	'progressData' 		: 'speed',
	'uploadLimit' 		: 100,
	'fileTypeExts' 		: '*.doc; *.docx; *.pdf;  *.txt; *.xls; *.ppt;',
	'buttonClass' 		: 'btn btn-primary',
  	'onUploadSuccess' 	: function(file, data, response) {
		var filename 	=  data;
		$.post(base_url+'<?php echo ADMINISTRATOR."page/mod_".$module;?>/show_file.php',{selectedfile:filename},function(msg){
			   $('#file_preview').html(msg).show();
			}); 
		    
    },
	'onDialogOpen'      : function(event,ID,fileObj) {		
    },
	'onUploadError' : function(file, errorCode, errorMsg, errorString) {
           alert(errorMsg);
        },
	'onUploadComplete' : function(file) {
           // alert('The file ' + file.name + ' was successfully uploaded');
        } 	
  });
});
    // ]]>
	
	
function deleteImage(id)
{
	if(confirm('Are you sure, you want to delete this?')){
		$.post(admin_url+'page/mod_items/ajax.php',{id:id,mode:'delete_image'},function(data){
			  $("#thumb_image_"+id).hide('slow');
			  $("#thumb_image_"+id).html('');
		      alert(data.msg);		     
	      },'json');//function
    }//if confirm close
}

function deleteFile(id)
{
	if(confirm('Are you sure, you want to delete this?')){
		$.post(admin_url+'page/mod_items/ajax.php',{id:id,mode:'delete_file'},function(data){
			  $("#thumb_file_"+id).hide('slow');
			  $("#thumb_file_"+id).html('');
		      alert(data.msg);		     
	      },'json');//function
    }//if confirm close
}

function SaveImageFile(id)
{
	var item_title = $("#old_preview_title_"+id).val();
		$.post(admin_url+'page/mod_<?=$module?>/ajax.php',{id:id,item_title:item_title,mode:'save_image_file'},function(data){
		      alert(data.msg);		     
	      },'json');//function
}

</script>