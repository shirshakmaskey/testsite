<?php
//$db->execute("ALTER TABLE `tbl_category_url` ADD `parent_id` INT NOT NULL AFTER `id`");
include("page/setAndCheckAll.php");
include("page/mod_setAndCheckAll/setToken.php");
$action    = isset( $_GET['action'] ) ? $_GET['action'] : "";
$url_back  = $_SERVER['HTTP_REFERER'];
$aid       = isset( $_GET['aid'] ) ? $_GET['aid'] : "";
$rowEdit   = $funItemsObj->catSel($aid);
if(isset($_SESSION['imageFiles'])){ 
	  foreach($_SESSION['imageFiles'] as $key=>$val){
		 if(file_exists(FCPATH."uploads/images/items/".$val) and !empty($val)){
			unlink(FCPATH."uploads/images/items/".$val); 
		 } 
	  }
	  unset($_SESSION['imageFiles']);
	}
?>
<div class="tblform">
  <form action="page/mod_<?php echo $module; ?>/actCategory.php?aid=<?php echo urlencode($aid); ?>&amp;action=<?php echo urlencode($action); ?>" method="post" enctype="multipart/form-data">
  <input type="hidden" name="mytoken" value="<?php echo $mytoken; ?>"  />
    <table width="100%" border="0" cellpadding="1" cellspacing="1" class="table_head_css" >
      <tr >
        <td class="bgTdTwo"><strong> Foods Category <?php echo ($action=='add')?" < <em class='add'>Add</em> > ":" < <em class='edit'>Edit</em> >"; ?></strong></td>
         <td class="bgTdTwo" align="right" > 
        <input type="hidden" name="url_back" value="<?php echo $url_back; ?>" />
          <input type="image" src="images/save.png" alt="Save" title="Save" name="Save" border="0">
          <img src="images/cancel.png" alt="cancel" title="cancel" border="0" onclick="history.go(-1);" style="margin-top:-30px;"/> </td>
      </tr>
    </table>
    <table width="100%" border="0" cellpadding="1" cellspacing="1">
	<tr>
	<td><label for="menu">Parent<span class="req">*</span></label></td>
	<td><div class="col-lg-4"><?php 
	
	$parent_id  = @$rowEdit->parent_id;
	$funItemsObj->getCatListInDropDown($parent_id);?>
	</div>
    </td>
	</tr>
     <tr>
        <td width="200">Category Name</td>
        <td><div class="col-lg-6"><input type="text" name="category_name" id="category_name" value="<?php echo !is_null($rowEdit) ? @$rowEdit->category_name:""; ?>" onkeyup="checkEmpty('category_name','category_nameErr');" class="form-control"></div>
          <span id="category_nameErr"></span></td>
      </tr>
	  
	  
	  <tr>
        <td width="200">Category Name(Denish)</td>
        <td><div class="col-lg-6"><input type="text" name="category_name_de" id="category_name_de" value="<?php echo !is_null($rowEdit) ? @$rowEdit->category_name:""; ?>" onkeyup="checkEmpty('category_name_de','category_name_deErr');" class="form-control"></div>
          <span id="category_name_deErr"></span></td>
      </tr>
	  
	  <tr>
				<td width="200" valign="top">Description</td>
				<td><div class="col-lg-12">
						<textarea name="description" id="description" onkeyup="checkEmpty('description','descriptionErr');" class="form-control" rows="10"><?php echo !is_null($rowEdit) ? @$rowEdit->description:""; ?></textarea>
					</div>
					<span id="descriptionErr"></span></td>
			</tr>
	  <tr>
				<td width="200" valign="top">Description(Denish)</td>
				<td><div class="col-lg-12">
						<textarea name="description_de" id="description_de" onkeyup="checkEmpty('description_de','description_deErr');" class="form-control" rows="10"><?php echo !is_null($rowEdit) ? @$rowEdit->description_de:""; ?></textarea>
					</div>
					<span id="description_deErr"></span></td>
			</tr>		
	  
	  <tr>
	  <td colspan="2">
	  <div class="row">
  <div id="old_preview">
  <?php
   if($aid>0){
			    $img =  $rowEdit->image;
				if(file_exists(FCPATH.'uploads/images/items/'.$img) and !empty($img)){ ?>
				<div class="thumb_box" id="thumb_image_<?php echo $rowEdit->id; ?>"><img src="<?php echo base_url(APPLICATIONS);?>timthumb/timthumb.php?src=<?php echo base_url('uploads/images/items/'.$img); ?>&w=100&h=100" class="img-polaroid"><br /> 
	<a style="cursor:pointer;" onclick="deleteImageCat(<?php echo $rowEdit->id; ?>);" title="Delete">X</a>
				</div>
				<?php
		      }//file exist
  }//if id >0
  ?>
  </div>
  <div id="preview"></div>
  </div>
  
  
  <div class="row" style="float:left;width:150px;margin-left:160px;">
	<input type="file" name="image_upload" id="image_upload" >
  </div>
  
  <div class="clear"></div>
	  
	  </td>
	  </tr>
            
       
      <tr>
        <td>Status </td>
        <td><input type="checkbox" name="status" id="status" value="1"  <?php echo @($rowEdit->status==1)?"checked":"";?> /></td>
      </tr>
	  
	  <tr>
        <td>Is Special </td>
        <td><input type="checkbox" name="special" id="special" value="1"  <?php echo @($rowEdit->special==1)?"checked":"";?> /></td>
      </tr>
      
      <tr>
        <td valign="top">Save and Return Here</td>
        <td><input type="checkbox" name="back_again" id="back_again" value="1" /></td>
      </tr> 
	  
	  <tr>
				<td></td>
				<td>
				<input type="submit" name="Save" value="Save" class="btn btn-primary">
				<input type="button" name="Cancel" value="Cancel" class="btn btn-primary" onclick="window.location.href='index.php?_page=category&mod=items'">
				</td>
			</tr>
     
    </table>
  </form>
</div>
</script>
<script>$(document).ready( function(){ $("#category_name").focus(); });</script>

<script type="text/javascript" src="<?php echo base_url(APPLICATIONS.'ckeditor/ckeditor.js'); ?>"></script> 
<script type="text/javascript" src="<?php echo base_url(APPLICATIONS.'ckfinder/ckfinder.js'); ?>"></script> 
<script>
var base_url =  "<?php echo base_url(); ?>";
CKEDITOR.replace( 'description',
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
<script>
autosize(document.querySelectorAll('textarea'));
var base_url =  "<?php echo base_url(); ?>";
CKEDITOR.replace( 'description_de',
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

<link rel="stylesheet" href="<?php echo base_url(APPLICATIONS.'uploadify/uploadify.css'); ?>" />
<script type="text/javascript" src="<?php echo base_url(APPLICATIONS.'uploadify/jquery.uploadify.min.js'); ?>"></script>
<script type="text/javascript">
   // <![CDATA[
    $(document).ready(function() {
    $('#image_upload').uploadify({
    'swf'  			: '<?php echo base_url(APPLICATIONS.'uploadify/uploadify.swf'); ?>',
    'uploader'    	: '<?php echo base_url(ADMINISTRATOR."page/mod_$module/uploadify_cat.php"); ?>',
	'formData'    	: {project_path : '<?php echo base64_encode(constant("FCPATH")); ?>',				                       targetFolder:'uploads/images/items/'},
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
		$.post(base_url+'<?php echo ADMINISTRATOR."page/mod_".$module;?>/show_image_cat.php',{imagefile:filename},function(msg){
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
	
function deleteImageCat(id)
{
	if(confirm('Are you sure, you want to delete this?')){
		$.post(admin_url+'page/mod_items/ajax.php',{id:id,mode:'delete_image_cat'},function(data){
			  $("#thumb_image_"+id).hide('slow');
			  $("#thumb_image_"+id).html('');
		      alert(data.msg);		     
	      },'json');//function
    }//if confirm close
}	
</script>