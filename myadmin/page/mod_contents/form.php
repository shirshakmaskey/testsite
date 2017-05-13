<link rel="stylesheet" href="<?php echo base_url("assets/uploadify/uploadify.css"); ?>" />
<div class="row">
  <div class="col-sm-12">
    <div class="panel">
<?php 
    include("page/setAndCheckAll.php");
    include("page/mod_setAndCheckAll/setToken.php");
    $aid  =   isset($_REQUEST['aid'])?decode($_REQUEST['aid']):0; 
	$groupResult  =  $funPageCatObj->categoryList('post');
	if(!empty($aid)){
	  	$row  			=  $funContentsObj->find_by_id($aid);
	   	$resultImage 	=  $funContentsObj->file_items($aid);
	   	$resultfile  	=  $funContentsObj->file_items($aid,'file');
	}
	if(isset($_SESSION['imageBannerFiles'])){ 
	  foreach($_SESSION['imageBannerFiles'] as $key=>$val){
		 if(file_exists(FCPATH."uploads/images/contents/".$val) and !empty($val)){
			unlink(FCPATH."uploads/images/contents/".$val); 
		 } 
	  }
	  unset($_SESSION['imageBannerFiles']);
	}
	if(isset($_SESSION['imageFiles'])){ 
	  foreach($_SESSION['imageFiles'] as $key=>$val){
		 if(file_exists(FCPATH."uploads/images/contents/".$val) and !empty($val)){
			unlink(FCPATH."uploads/images/contents/".$val); 
		 } 
	  }
	  unset($_SESSION['imageFiles']);
	}
	if(isset($_SESSION['selectedfiles'])){ 
	  foreach($_SESSION['selectedfiles'] as $key=>$val){
		 if(file_exists(FCPATH."uploads/files/contents/".$val) and !empty($val)){
			unlink(FCPATH."uploads/files/contents/".$val); 
		 } 
	  }
	  unset($_SESSION['selectedfiles']);
	}
?>

 <div class="panel-heading"> <span class="panel-title">Manage Contents </span> </div>
      <div class="panel-body">
	<form action="<?php echo base_url("$administrator/page/mod_$module/act_thismodule.php"); ?>" method="post" enctype="multipart/form-data" id="addEditForm"  >
		<input type="hidden" name="mytoken" value="<?php echo $mytoken; ?>"  />
		<input type="hidden" name="hidden_id" id="hidden_id" value="<?php echo @encode($aid); ?>" />
		<div class="form-group"><label class="col-sm-12 control-label" for="category_name"> Asterisk (<span class="req">*</span> ) fields are required</label></div>
  
  

			<div class="col-md-8" style="border-right:1px solid #CCC;">

					<div class="form-group">
						<label for="title">Title <span class="req">*</span></label>
						<input type="text" name="txtTitle" id="txtTitle" class="form-control required" value="<?php echo @$row->article_title;?>" />
					</div>
					
					<div class="form-group">
						<label for="description">Short Description <span class="req">*</span></label>
						<textarea name="txtShortDescription" id="txtShortDescription" rows="8" class="form-control required"><?php echo @$row->short_description;?></textarea>
					</div>
					
					
			</div>
			<div class="col-md-4">

					<div class="form-group">
						<label for="Group">Type</label><br />
                        <div class="col-sm-offset-1 col-sm-12">
                        
						<input type="radio" name="post_type"  onclick="change_post_type('page');" value="page" <?php echo @($row->post_type=='page')?"checked":"";?> <?php echo empty($row->post_type)?"checked":"";?>  /> <span class="lbl">Page</span>

                        
                        <input type="radio" name="post_type" onclick="change_post_type('post');" value="post" <?php echo @($row->post_type=='post')?"checked":"";?>  /> <span class="lbl">Post</span>
						
					</div>
					<div class="form-group">						
						<div id="page_post_type" class="post_type_category">
						<label for="Group">Choose Parent</label>
	                   <?php 
					   $post_parent  =  @$row->post_parent;
					   $funContentsObj->getCatListInDropDown($post_parent,"post_parent"); ?>
						</div>
						<div id="post_post_type" class="post_type_category">
						<label for="Group">Categories</label>
						<div class="" style="height:100px;overflow-y:scroll;border:1px solid #CCC;line-height:20px;">
							<?php if($groupResult['num_rows']>0){ $insert_arr  =  array(); 
							if(!empty($row)){ 
								$res_res  =  $funContentsObj->find_detail_by_id($row->id);							
								if($db->num_rows($res_res)>0){
								   while($row_row  =  $db->result($res_res)){
										$insert_arr[] = $row_row->category_id;   
								   }
								}
							}
					while($rowGr =  $db->result($groupResult['result'])){				
				?>
							&nbsp;&nbsp;<input type="checkbox" name="category_id[]" value="<?php echo @$rowGr->id;?>" <?php echo @in_array($rowGr->id,$insert_arr)?"checked":"";?>> &nbsp;<?php echo @$rowGr->category_name;?> <br />
							<?php }} ?>
						   </div>
						</div>
					</div>
					

					<div class="col-sm-offset-0 col-sm-12">
							<div class="checkbox">
								<label>
									<input type="checkbox" class="px" name="feature" id="feature"  value="1" <?php echo @($row->feature=='1')?"checked":""?>  >
									<span class="lbl">Feature Contents</span> </label>
							</div>
						</div>
                    
                    <div class="col-sm-offset-0 col-sm-12">
							<div class="checkbox">
								<label>
									<input type="checkbox" class="px" name="chkHomepage" id="chkHomepage"  value="1" <?php echo @($row->show_in_home_page=='1')?"checked":""?>  >
									<span class="lbl">Show in Homepage</span> </label>
							</div>
						</div>
                    
                    <div class="col-sm-offset-0 col-sm-12">
							<div class="checkbox">
								<label>
									<input type="checkbox" class="px" name="status" id="status"  value="1" <?php echo @($row->status=='1')?"checked":""?>  >
									<span class="lbl">Publish</span> </label>
							</div>
						</div>
						
					</div>
					<div class="form-group">
						<input type="submit" name="submitBtn" id="submitBtn" class="btn btn-primary" value="Save"  />
						<input type="button" name="cancelBtn" class="btn btn-primary" value="Cancel" onclick="window.location.href='list-<?php echo $module;?>'"  />
					</div>
					<div class="form-group">
						<div onclick="$('.content_layout').slideToggle('slow');" style="cursor:pointer;text-decoration:underline;color:#06C;"><strong>Change Display Layout</strong></div>
						<br />
						<div class="col-sm-offset-0 col-sm-12 content_layout" style="display:none;">
							<div class="radio">
								<label>
									<input type="radio" class="px" name="layout"  value="full_page" <?php echo empty($hidden_id)?"checked":""?> <?php echo @($row->layout=='full_page')?"checked":""?>  >
									<span class="lbl">Full Page Layout</span> </label>
							</div>
						</div>
						<div class="col-sm-offset-0 col-sm-12 content_layout" style="display:none;">
							<div class="radio">
								<label>
									<input type="radio" class="px" name="layout"  value="two_col_left_image" <?php echo @($row->layout=='two_col_left_image')?"checked":""?> >
									<span class="lbl">Two Column and Image in Left</span> </label>
							</div>
						</div>
						<div class="col-sm-offset-0 col-sm-12 content_layout" style="display:none;">
							<div class="radio">
								<label>
									<input type="radio" class="px" name="layout"  value="two_col_right_image" <?php echo @($row->layout=='two_col_right_image')?"checked":""?> >
									<span class="lbl">Two Column and Image in Right</span> </label>
							</div>
						</div>
						
						
					</div>
					<!--meta contents end--> 

					<div class="form-group">
						<div onclick="$('.meta_contents').slideToggle('slow');" style="cursor:pointer;text-decoration:underline;color:#06C;"><strong>Change Meta Contents</strong></div>
						<br />
						<div class="col-md-12 meta_contents" style="display:none;">
							<label for="description">Meta kewords <span class="req">*</span></label>
							<textarea style="min-height:50px !important;" class="form-control" name="meta_keywords" id="meta_keywords"><?php echo @$row->meta_keywords;?></textarea>
						</div>
						<div class="col-md-12 meta_contents" style="display:none;">
							<label for="description">Meta Description <span class="req">*</span></label>
							<textarea style="min-height:50px !important;" class="form-control" name="meta_desc" id="meta_desc"><?php echo @$row->meta_desc;?></textarea>
						</div>
					</div>
					<!--meta contents end--> 
					
				
			</div>
		    
			<div class="col-md-12">
			<div class="form-group">
						<label for="description">Description <span class="req">*</span></label>
						<textarea name="txtDescription" id="txtDescription" class="form-control required"><?php echo @$row->description;?></textarea>
						<a class="btn btn-primary" title="Read More" id="readMore" href="javascript:void(0);"><span class="button-content">Read More</span></a>
					</div>


<div class="form-group">
					<strong>Banner Image</strong>
					<div class="form-group">
						<div id="old_preview">
							<?php
   if($aid>0){
			    $img =  $row->banner;
				if(file_exists(FCPATH.'uploads/images/contents/'.$img) and !empty($img)){ ?>
							<div class="thumb_box" id="thumb_banner_image_<?php echo $row->id; ?>"><a href=""><img src="<?php echo base_url(APPLICATIONS);?>timthumb/timthumb.php?src=<?php echo base_url('uploads/images/contents/'.$img); ?>&w=100" class="img-polaroid"></a><br />
								<br />
								<input type="text" name="old_preview_banner_title_<?php echo $row->id; ?>" id="old_preview_banner_title_<?php echo $row->id; ?>" value="<?php echo $row->banner_title; ?>" placeholder="Banner Slogan" class="form-control" />
								<br />
								<a style="cursor:pointer;" onclick="SaveBannerImageFile(<?php echo $row->id; ?>);" class="btn btn-default"><i class="fa fa-check-square-o"></i></a> <a style="cursor:pointer;" onclick="deleteBannerImage(<?php echo $row->id; ?>);" class="btn btn-default"><i class="fa fa-trash-o"></i></a> </div>
							<?php
		      }//file exist
	    }//if id >0
  ?>
						</div>
						<div id="preview_banner"></div>
					</div>
					<div class="form-group">
						<div class="col-lg-2">
							<input type="file" name="banner_image_upload" id="banner_image_upload" class="form-control">
						</div>
					</div>
					</div>


					
					<div class="form-group">
					<strong>Featured Images</strong>
						<div id="old_preview">
							<?php
   if($aid>0){
	  if($funObj->num_rows($resultImage )>0){
		  while($row_item =  $funObj->result($resultImage)){
			    $img =  $row_item->item_name;
				if(file_exists(FCPATH.'uploads/images/contents/'.$img) and !empty($img)){ ?>
							<div class="thumb_box" id="thumb_image_<?php echo $row_item->id; ?>"><a href=""><img src="<?php echo base_url(APPLICATIONS);?>timthumb/timthumb.php?src=<?php echo base_url('uploads/images/contents/'.$img); ?>&w=100&h=100" class="img-polaroid"></a><br />
								<br />
								<input type="text" name="old_preview_title_<?php echo $row_item->id; ?>" id="old_preview_title_<?php echo $row_item->id; ?>" value="<?php echo $row_item->item_title; ?>" placeholder="Title" class="form-control" />
								<br />
								<a style="cursor:pointer;" onclick="SaveImageFile(<?php echo $row_item->id; ?>);"><i class="fa fa-check-square-o"></i></a> <a style="cursor:pointer;" onclick="deleteImage(<?php echo $row_item->id; ?>);"><i class="fa fa-trash-o"></i></a> </div>
							<?php
		      }//file exist
	  }//while
   }//if num
  }//if id >0
  ?>
						</div>
						<div id="preview"></div>
					</div>
					<div class="form-group">
						<div class="col-lg-2">
							<input type="file" name="image_upload" id="image_upload" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<div id="old_file_preview">
							<?php
   if($aid>0){
	  if($funObj->num_rows($resultfile )>0){
		  while($row_item =  $funObj->result($resultfile)){
			    $file =  $row_item->item_name;
				if(file_exists(FCPATH.'uploads/files/contents/'.$file) and !empty($file)){ ?>
							<div class="file_box" id="thumb_file_<?php echo $row_item->id; ?>"><a href="<?php echo base_url('uploads/files/contents/'.$file); ?>" target="_blank"><?php echo $file; ?></a><br />
								<a style="cursor:pointer;" onclick="deleteFile(<?php echo $row_item->id; ?>);"><i class="fa fa-trash-o"></i></a> </div>
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
					<div class="form-group">
						<div class="form-group">
							<div class="col-lg-2">
								<input type="file" name="file_upload" id="file_upload" class="form-control">
							</div>
						</div>
					</div>
				
			</div>
	</form>
</div>
    </div>
  </div>
</div>
<?php ob_start();?>
<script language="javascript" src="page/mod_<?php echo $module;?>/add_edit.js"></script> 
<script>$(document).ready( function(){ $("#txtCatName").focus(); });</script> 
<script type="text/javascript" src="<?php echo base_url(APPLICATIONS.'ckeditor/ckeditor.js'); ?>"></script> 
<script type="text/javascript" src="<?php echo base_url(APPLICATIONS.'ckfinder/ckfinder.js'); ?>"></script> 
<script> 
autosize(document.querySelectorAll('textarea'));
var base_url =  "<?php echo base_url(); ?>";
var editor_arr = ["txtDescription"];
create_editor(base_url,editor_arr);
</script> 
<script type="text/javascript" src="<?php echo base_url(APPLICATIONS.'uploadify/jquery.uploadify.min.js'); ?>"></script> 
<script type="text/javascript">
   // <![CDATA[
    $(document).ready(function() {
    $('#image_upload').uploadify({
    'swf'  			: '<?php echo base_url(APPLICATIONS.'uploadify/uploadify.swf'); ?>',
    'uploader'    	: '<?php echo base_url(ADMINISTRATOR."page/mod_$module/uploadify.php"); ?>',
	'formData'    	: {project_path : '<?php echo base64_encode(constant("FCPATH")); ?>',				                       targetFolder:'uploads/images/contents/'},
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

$('#banner_image_upload').uploadify({
    'swf'  			: '<?php echo base_url(APPLICATIONS.'uploadify/uploadify.swf'); ?>',
    'uploader'    	: '<?php echo base_url(ADMINISTRATOR."page/mod_$module/uploadify.php"); ?>',
	'formData'    	: {project_path : '<?php echo base64_encode(constant("FCPATH")); ?>',				                       targetFolder:'uploads/images/contents/'},
	'method'   		: 'post',
    'cancelImg' 	: '<?php echo base_url(APPLICATIONS);?>uploadify/cancel.png',
    'auto'      	: true,
	'multi'     	: true,	
	'hideButton': false,
	'buttonText' : 'Choose Banner',
	'width'     : 150,
	'height'	: 40,
	'removeCompleted' : true,
	'progressData' : 'speed',
	'uploadLimit' : 100,
	'fileTypeExts' : '*.gif; *.jpg; *.jpeg;  *.png; *.GIF; *.JPG; *.JPEG; *.PNG;',
	 'buttonClass' : 'btn btn-primary',
  	'onUploadSuccess' : function(file, data, response) {
		var filename =  data;
		$.post(base_url+'<?php echo ADMINISTRATOR."page/mod_".$module;?>/show_banner_image.php',{imagefile:filename},function(msg){
			   $('#preview_banner').html(msg).show();
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
	'formData'    		: {project_path : '<?php echo base64_encode(constant("FCPATH")); ?>',targetFolder:'uploads/files/contents/'},
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
		$.post(admin_url+'page/mod_contents/ajax.php',{id:id,mode:'delete_image'},function(data){
			  $("#thumb_image_"+id).hide('slow');
			  $("#thumb_image_"+id).html('');
		      alert(data.msg);		     
	      },'json');//function
    }//if confirm close
}

function deleteFile(id)
{
	if(confirm('Are you sure, you want to delete this?')){
		$.post(admin_url+'page/mod_contents/ajax.php',{id:id,mode:'delete_file'},function(data){
			  $("#thumb_file_"+id).hide('slow');
			  $("#thumb_file_"+id).html('');
		      alert(data.msg);		     
	      },'json');//function
    }//if confirm close
}
function deleteBannerImage(id)
{
	if(confirm('Are you sure, you want to delete this?')){
		$.post(admin_url+'page/mod_contents/ajax.php',{id:id,mode:'delete_banner_image'},function(data){
			  $("#thumb_banner_image_"+id).hide('slow');
			  $("#thumb_banner_image_"+id).html('');
		      alert(data.msg);		     
	      },'json');//function
    }//if confirm close
}
function SaveImageFile(id)
{
	var item_title = $("#old_preview_title_"+id).val();
		$.post(admin_url+'page/mod_contents/ajax.php',{id:id,item_title:item_title,mode:'save_image_file'},function(data){
		      alert(data.msg);		     
	      },'json');//function
}
function SaveBannerImageFile(id)
{
	var item_title = $("#old_preview_banner_title_"+id).val();
		$.post(admin_url+'page/mod_contents/ajax.php',{id:id,item_title:item_title,mode:'save_banner_image_file'},function(data){
		      alert(data.msg);		     
	      },'json');//function
}
$(function(){$('.post_type_category').hide();<?php if(@$row->post_type=='post'){?>$('#post_post_type').show();
<?php }else{ ?>$('#page_post_type').show();<?php }?>});
function change_post_type(v)
{
	  $('.post_type_category').hide();	
	  $('#'+v+'_post_type').show();	  	
}

</script>
<?php $content_footer[] = ob_get_clean();?>