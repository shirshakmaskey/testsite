<link rel="stylesheet" href="<?php echo base_url(APPLICATIONS."uploadify/uploadify.css"); ?>" />
<?php
	$aid  =   isset($_REQUEST['aid'])?$_REQUEST['aid']:0; 
	if(!empty($aid)){
	  	$row 	=  $funSponserObj->find_by_id($aid);
	}
	else{
	    $rf = $funSponserObj->table_fields();		
	  if($rf){if($db->total_rows($rf)>0){while($rowfield=$db->fetch_array($rf)){@$rowEdit->{$rowfield['Field']}='';}}}	
	}
	if(isset($_SESSION['imageFiles'])){ 
	  foreach($_SESSION['imageFiles'] as $key=>$val){
		 if(file_exists(FCPATH."uploads/images/sponser/".$val) and !empty($val)){
			unlink(FCPATH."uploads/images/sponser/".$val); 
		 } 
	  }
	  unset($_SESSION['imageFiles']);
	}
?>
<div class="row">
  <div class="col-sm-12">
    <div class="panel">
      <div class="panel-heading"> <span class="panel-title">Manage Sponser</span> </div>
      <div class="panel-body">
        <form action="<?php echo base_url("$administrator/page/mod_$module/act_thismodule.php"); ?>" method="post" enctype="multipart/form-data" id="addEditForm">
          <input type="hidden" name="mytoken" value="<?php echo $mytoken; ?>"  />
          <input type="hidden" name="hidden_id" id="hidden_id" value="<?php echo @$aid; ?>" />
         <div class="form-group">
            <label class="col-sm-2 control-label" for="block_name">Name <span class="req">*</span></label>
            <div class="col-sm-4"><input type="text" name="block_name" id="block_name" class="form-control required" value="<?php echo @$row->block_name;?>" /></div>
          </div>
         <div class="form-group">
            <label class="col-sm-2 control-label" for="block_title">Title</label>
            <div class="col-sm-4"><input type="text" name="block_title" id="block_title" class="form-control" value="<?php echo @$row->block_title;?>" /></div>
          </div>
        
         <div class="form-group">
            <label class="col-sm-2 control-label" for="position">Position <span class="req">*</span></label>
           <div class="col-sm-4"> <input type="radio" value="left" name="position" <?php echo @($row->position=='left')?"checked":"";?> <?php echo empty($hidden_id)?"checked":"";?> />
            &nbsp;Left
            <input type="radio" value="footer" name="position" <?php echo @($row->position=='footer')?"checked":"";?> />
            &nbsp;Footer</div> </div>
         <div class="form-group">
            <div id="preview"> </div>
          </div>
         <div class="form-group">
            <div id="old_preview">
              <?php
   if($aid>0){
			    $img =  $row->image;
				if(file_exists(FCPATH.'uploads/images/sponser/'.$img) and !empty($img)){ ?>
              <div class="thumb_box" id="thumb_image_<?php echo $row_item->id; ?>"><a href=""><img src="<?php echo base_url(APPLICATIONS);?>timthumb/timthumb.php?src=<?php echo base_url('uploads/images/sponser/'.$img); ?>&w=200&h=100" class="img-polaroid"></a>
                <input type="checkbox" name="old_image_arr"  value="<?php echo $img; ?>" checked="checked">
                <a style="cursor:pointer;" onclick="deleteImage(<?php echo $rowImage->id; ?>);" class="btn btn-default">Delete <span class="glyphicon glyphicon-remove"></span></a> </div>
              <?php
		      }//file exist
  }//if id >0
  ?>
            </div>
          </div>
         <div class="form-group">
            <div class="form-group">
              <label class="col-sm-2 control-label" for="image">Upload Images</label>
              <div class="col-sm-4">
                <input type="file" name="image_upload" id="image_upload" class="form-control">
              </div>
            </div>
          </div>
         <div class="form-group">
            <label class="col-sm-2 control-label" for="short_description">Short Description <span class="req">*</span></label>
           <div class="col-sm-10">
              <textarea name="short_description" id="short_description" class="form-control" rows="4"><?php echo @$row->short_description;?></textarea>
            </div>
          </div>
         
         <div class="form-group">
            <label class="col-sm-2 control-label" for="description">Description <span class="req">*</span></label>
            <div class="col-sm-10">
              <textarea name="txtDescription" id="txtDescription" class="form-control"><?php echo @$row->description;?></textarea>
            </div>
          </div>
        
          <?php if(!empty($aid)){?>
         <div class="form-group">
            <label class="col-sm-2 control-label" for="Sorting">Sorting <span class="req">*</span></label>
           <div class="col-sm-1">
              <input type="text" name="sortorder" id="sortorder" value="<?php echo @$row->sortorder;?>" class="form-control" />
            </div>
          </div>
          <?php } ?>
         <div class="form-group">
            <label class="col-sm-2 control-label" for="url_link">Url Link <span class="req">*</span></label>
           <div class="col-sm-4"> <input type="text" name="url_link" id="url_link" class="form-control required" value="<?php echo @$row->url_link;?>" /></div>
          </div>
         <div class="form-group">
            <label class="col-sm-2 control-label" for="url_link">Link Type <span class="req">*</span></label>
            <div class="col-sm-4">
            <input type="radio" name="link_type" value="internal" <?php echo @($row->url_link=="internal")?"checked":"";?> <?php echo empty($hidden_id)?"checked":"";?> />
            Internal
            <input type="radio" name="link_type" value="external" <?php echo @($row->url_link=="external")?"checked":"";?> />
            External </div></div>
        <div class="form-group">
						<div class="col-sm-offset-2 col-sm-4">
							<div class="checkbox">
								<label>
									<input type="checkbox" class="px" name="back_again" id="back_again" value="1">
									<span class="lbl">Save and Return Here</span> </label>
							</div>
							<!-- / .checkbox --> 
						</div>
					</div>
					<div style="margin-bottom: 0;" class="form-group">
						<div class="col-sm-offset-2 col-sm-4">
							<button class="btn btn-primary" type="submit" name="submitBtn" id="submitBtn">Save</button>
							<button type="button" name="cancelBtn" class="btn btn-primary" onclick="window.location.href='list-<?php echo $module;?>'">Cancel</button>
						</div>
					</div>
        </form>
      </div>
    </div>
  </div>
</div>
<script language="javascript" src="page/mod_<?Php echo $module;?>/add_edit.js"></script> 
<script type="text/javascript" src="<?php echo base_url(APPLICATIONS.'uploadify/jquery.uploadify.min.js'); ?>"></script> 
<script type="text/javascript" src="<?php echo base_url(APPLICATIONS.'ckeditor/ckeditor.js'); ?>"></script> 
<script type="text/javascript" src="<?php echo base_url(APPLICATIONS.'ckfinder/ckfinder.js'); ?>"></script> 
<script>
autosize(document.querySelectorAll('textarea'));
var base_url =  "<?php echo base_url(); ?>";
CKEDITOR.replace( 'txtDescription',
    {   height:500,
        filebrowserBrowseUrl : base_url+'assets/ckfinder/ckfinder.html',
        filebrowserImageBrowseUrl : base_url+'assets/ckfinder/ckfinder.html?Type=Images',
        filebrowserFlashBrowseUrl : base_url+'assets/ckfinder/ckfinder.html?Type=Flash',
        filebrowserUploadUrl : base_url+'assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        filebrowserImageUploadUrl : base_url+'assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
        filebrowserFlashUploadUrl : base_url+'assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
    });
CKEDITOR.replace( 'txtDescription_de',
    {   height:500,
        filebrowserBrowseUrl : base_url+'assets/ckfinder/ckfinder.html',
        filebrowserImageBrowseUrl : base_url+'assets/ckfinder/ckfinder.html?Type=Images',
        filebrowserFlashBrowseUrl : base_url+'assets/ckfinder/ckfinder.html?Type=Flash',
        filebrowserUploadUrl : base_url+'assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        filebrowserImageUploadUrl : base_url+'assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
        filebrowserFlashUploadUrl : base_url+'assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
    });	
</script> 
<script type="text/javascript">
   // <![CDATA[
    $(document).ready(function() {
    $('#image_upload').uploadify({
    'swf'  			: '<?php echo base_url(APPLICATIONS.'uploadify/uploadify.swf'); ?>',
    'uploader'    	: '<?php echo base_url(ADMINISTRATOR."page/mod_$module/uploadify.php"); ?>',
	'formData'    	: {project_path : '<?php echo base64_encode(constant("FCPATH")); ?>',				                       targetFolder:'uploads/images/sponser/'},
	'method'   		: 'post',
    'cancelImg' 	: '<?php echo base_url(APPLICATIONS);?>uploadify/cancel.png',
    'auto'      	: true,
	'multi'     	: false,	
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
function deleteImage(id)
{
	if(confirm('Are you sure, you want to delete this?')){
		  $.post(admin_url+'page/mod_sponser/ajax.php',{id:id,mode:'delete_image'},function(data){
			  $("#thumb_image_"+id).hide('slow');
			  $("#thumb_image_"+id).html('');
		      alert(data.msg);		     
	      },'json');//function
    }//if confirm close
}
</script> 
