<link rel="stylesheet" href="<?php echo base_url(APPLICATIONS."uploadify/uploadify.css"); ?>" />
<div class="row">
  <div class="col-sm-12">
    <div class="panel">
      <?php 
    include("page/setAndCheckAll.php");
    include("page/mod_setAndCheckAll/setToken.php");
    $aid  =   isset($_REQUEST['aid'])?decode($_REQUEST['aid']):0; 
	$groupResult  =  $funEventsObj->categoryList();
	if(!empty($aid)){
	  	$row  			=  $funEventsObj->find_by_id($aid);
	   	$resultImage 	=  $funEventsObj->file_items($aid);
	   	$resultfile  	=  $funEventsObj->file_items($aid,'file');
	} else{ 
	  $rf = $funEventsObj->table_fields(TABLE_EVENTS);		
	  if($rf){if($db->total_rows($rf)>0){while($rowfield=$db->fetch_array($rf)){@$row->{$rowfield['Field']}='';}}}
	  }//elseclose

	
	if(isset($_SESSION['imageFiles'])){ 
    foreach($_SESSION['imageFiles'] as $key=>$val){
     if(file_exists(FCPATH."uploads/images/events/".$val) and !empty($val)){
      unlink(FCPATH."uploads/images/events/".$val); 
     } 
    }
    unset($_SESSION['imageFiles']);
  }
  if(isset($_SESSION['selectedfiles'])){ 
    foreach($_SESSION['selectedfiles'] as $key=>$val){
     if(file_exists(FCPATH."uploads/files/events/".$val) and !empty($val)){
      unlink(FCPATH."uploads/files/events/".$val); 
     } 
    }
    unset($_SESSION['selectedfiles']);
  }
?>
      <div class="panel-heading"> <span class="panel-title">Manage Events </span> </div>
      <div class="panel-body">
        <form action="<?php echo base_url("$administrator/page/mod_$module/act_thismodule.php"); ?>" method="post" enctype="multipart/form-data" id="addEditForm">
          <input type="hidden" name="mytoken" value="<?php echo $mytoken; ?>"  />
          <input type="hidden" name="hidden_id" id="hidden_id" value="<?php echo @encode($aid); ?>" />
          <div class="row">
            <label class="col-lg-12 control-label">Asterisk (<span class="req">*</span> ) fields are required</label>
          </div>
          <hr />
     <div class="form-group">
    <label class="control-label col-sm-2" for="Category">Category:</label>
    <div class="col-sm-10">
      <select name="category_id" id="category_id" class="form-control required">
  <option value="">Choose Category</option>
  <?php if($groupResult['num_rows']>0){  
      while($rowGr =  $db->result($groupResult['result'])){       
  ?>
  <option value="<?php echo @$rowGr->id;?>" <?php echo @($row->category_id==$rowGr->id)?"selected":"";?>  ><?php echo @$rowGr->title;?></option>
  <?php }} ?>
  </select> 
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="Title">Title:</label>
    <div class="col-sm-10">
      <input type="text" name="txtTitle" id="txtTitle" class="form-control required" value="<?php echo @$row->title;?>" />
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="Title">From Date:</label>
    <div class="col-sm-4">
      <input type="text" name="from_date" id="from_date" class="form-control required" value="<?php echo @$row->from_date;?>" />
    </div>
    <label class="control-label col-sm-2" for="Title">To Date:</label>
    <div class="col-sm-4">
      <input type="text" name="to_date" id="to_date" class="form-control required" value="<?php echo @$row->to_date;?>" />
    </div>
  </div>  
  

  <div class="form-group">
    <label class="control-label col-sm-2" for="Title">From Time:</label>
    <div class="col-sm-4">
      <input type="text" name="from_time" id="from_time" class="form-control required" value="<?php echo @$row->from_time;?>" />
    </div>
    <label class="control-label col-sm-2" for="Title">End Time:</label>
    <div class="col-sm-4">
      <input type="text" name="to_time" id="to_time" class="form-control required" value="<?php echo @$row->to_time;?>" />
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-2" for="Title">Venue:</label>
    <div class="col-sm-10">
      <input type="text" name="venue" id="venue" class="form-control required" value="<?php echo @$row->venue;?>" />
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="Fees">Fees:</label>
    <div class="col-sm-10">
      <input type="text" name="fees" id="fees" class="form-control" value="<?php echo @$row->fees;?>" />
    </div>
  </div>

  <div class="form-group">
            <label for="Status" class="col-lg-2 control-label">Special</label>
            <div class="col-lg-10">
              <input type="checkbox" name="special" id="special" value="1"  <?php echo @($row->special=='1')?"checked":"";?>  /> Yes
            </div>
          </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="txtShortDescription">Short Description:</label>
    <div class="col-sm-10">
      <textarea name="txtShortDescription" id="txtShortDescription" rows="4" class="form-control required"><?php echo @$row->short_description;?></textarea>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="txtDescription">Description:</label>
    <div class="col-sm-10">
      <textarea name="txtDescription" id="txtDescription" class="form-control required"><?php echo @$row->description;?></textarea>
    </div>
  </div>
          
          
          
         
           
<div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">   
          <strong>Featured Images</strong>
          <?php if($aid>0){  ?>
            <div id="old_preview"> 
              <?php 
      if($funObj->num_rows($resultImage )>0){
      while($row_item =  $funObj->result($resultImage)){
          $img =  $row_item->item_name;
        if(file_exists(FCPATH.'uploads/images/events/'.$img) and !empty($img)){ ?>
              <div id="thumb_image_<?php echo $row_item->id; ?>"><div class="thumb_box"><a href=""><img src="<?php echo base_url(APPLICATIONS);?>timthumb/timthumb.php?src=<?php echo base_url('uploads/images/events/'.$img); ?>&w=100&h=100" class="img-polaroid"></a></div><br /> 
                <input type="text" name="old_preview_title_<?php echo $row_item->id; ?>" id="old_preview_title_<?php echo $row_item->id; ?>" value="<?php echo $row_item->item_title; ?>" placeholder="Title" class="form-control" />
                <br />
                <a style="cursor:pointer;" onclick="SaveImageFile(<?php echo $row_item->id; ?>);"><i class="fa fa-check-square-o"></i></a> <a style="cursor:pointer;" onclick="deleteImage(<?php echo $row_item->id; ?>);"><i class="fa fa-trash-o"></i></a><hr></div>
              <?php
          }//file exist
    }//while
  }//if num 
  ?>
   
            </div>
            <?php  }//if id >0 ?>
            <div id="preview"></div>
          </div></div>
         


          <div class="form-group">
           <label class="control-label col-sm-2" for="image_upload">Upload Images:</label>
    <div class="col-sm-10">
              <input type="file" name="image_upload" id="image_upload" class="form-control">
            </div>
          </div>

          <div class="clear"></div>
          <div class="row">
          <?php   if($aid>0){ ?>
            <div id="old_file_preview">
              <?php 
	  if($funObj->num_rows($resultfile )>0){
		  while($row_item =  $funObj->result($resultfile)){
			    $file =  $row_item->item_name;
				if(file_exists(FCPATH.'uploads/files/events/'.$file) and !empty($file)){ ?>
              <div id="thumb_file_<?php echo $row_item->id; ?>"><div class="thumb_box"><a href="<?php echo base_url('uploads/files/events/'.$file); ?>" target="_blank"><?php echo $file; ?></a></div><br />
                <input type="text" name="old_preview_title_<?php echo $row_item->id; ?>" id="old_preview_title_<?php echo $row_item->id; ?>" value="<?php echo $row_item->item_title; ?>" placeholder="Title" class="form-control" />
                <br />
                <a style="cursor:pointer;" onclick="SaveImageFile(<?php echo $row_item->id; ?>);"><i class="fa fa-check-square-o"></i></a> <a style="cursor:pointer;" onclick="deleteFile(<?php echo $row_item->id; ?>);"><i class="fa fa-trash-o"></i></a><hr></div>
              <?php
		      }//file exist
	  }//while
   }//if num
  ?>
            </div>
            <?php }//if id >0 ?>
            <div class="clear"></div>
            <div id="file_preview"></div>
          </div>
          <hr />
          <div class="form-group">
           <label class="control-label col-sm-2" for="file_upload">Upload Files:</label>
    <div class="col-sm-10">
              <input type="file" name="file_upload" id="file_upload" class="form-control">
            </div>
          </div>


          <div class="form-group">
            <label for="Status" class="col-lg-2 control-label">Status <span class="req">*</span></label>
            <div class="col-lg-10">
              <input type="checkbox" name="status" id="status" value="1"  <?php echo @($row->status=='1')?"checked":"";?>  /> Active
            </div>
          </div>




          <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
     <input type="submit" name="submitBtn" id="submitBtn" class="btn btn-primary" value="Save"  />
              <input type="button" name="cancelBtn" class="btn btn-primary" value="Cancel" onclick="window.location.href='list-<?php echo $module;?>'"  />
    </div>
  </div>
          <br />
<div class="row" style="margin-left:0px;">
            <div onclick="$('.meta_contents').slideToggle('slow');" style="border:1px solid #999;border-radius:8px;background:#CCC;padding-left:50px;cursor:pointer;"><strong>Meta Contents</strong></div>
            <br />


    <div class="form-group meta_contents" style="display:none;">
           <label class="control-label col-sm-2" for="meta_keywords">Meta kewords:</label>
    <div class="col-sm-10">
              <textarea class="form-control" name="meta_keywords" id="meta_keywords"><?php echo @$row->meta_keywords;?></textarea>
            </div>
          </div>


          <div class="form-group meta_contents" style="display:none;">
           <label class="control-label col-sm-2" for="description">Meta Description:</label>
    <div class="col-sm-10">
              <textarea class="form-control" name="meta_desc" id="meta_desc"><?php echo @$row->meta_desc;?></textarea>
            </div>
          </div>

</div>
          <!--meta contents end-->
          
        </form>
      </div>
    </div>
  </div>
</div>
<script language="javascript" src="page/mod_<?Php echo $module;?>/add_edit.js"></script> 
<script>$(document).ready( function(){ $("#txtTitle").focus(); });</script> 
<script type="text/javascript" src="<?php echo base_url(APPLICATIONS.'ckeditor/ckeditor.js'); ?>"></script> 
<script type="text/javascript" src="<?php echo base_url(APPLICATIONS.'ckfinder/ckfinder.js'); ?>"></script> 
<script>
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
</script> 
<script type="text/javascript" src="<?php echo base_url(APPLICATIONS.'uploadify/jquery.uploadify.min.js'); ?>"></script> 
<script type="text/javascript">
   // <![CDATA[
    $(document).ready(function() {
    $('#image_upload').uploadify({
    'swf'  			: '<?php echo base_url(APPLICATIONS.'uploadify/uploadify.swf'); ?>',
    'uploader'    	: '<?php echo base_url(ADMINISTRATOR."page/mod_$module/uploadify.php"); ?>',
	'formData'    	: {project_path : '<?php echo base64_encode(constant("FCPATH")); ?>',				                       targetFolder:'uploads/images/<?php echo $module?>/'},
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
	'formData'    		: {project_path : '<?php echo base64_encode(constant("FCPATH")); ?>',targetFolder:'uploads/files/<?php echo $module?>/'},
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
		$.post(admin_url+'page/mod_<?php echo $module?>/ajax.php',{id:id,mode:'delete_image'},function(data){
			  $("#thumb_image_"+id).hide('slow');
			  $("#thumb_image_"+id).html('');
		      alert(data.msg);		     
	      },'json');//function
    }//if confirm close
}

function deleteFile(id)
{
	if(confirm('Are you sure, you want to delete this?')){
		$.post(admin_url+'page/mod_<?php echo $module?>/ajax.php',{id:id,mode:'delete_file'},function(data){
			  $("#thumb_file_"+id).hide('slow');
			  $("#thumb_file_"+id).html('');
		      alert(data.msg);		     
	      },'json');//function
    }//if confirm close
}

function SaveImageFile(id)
{
	var item_title = $("#old_preview_title_"+id).val();
		$.post(admin_url+'page/mod_<?php echo $module?>/ajax.php',{id:id,item_title:item_title,mode:'save_image_file'},function(data){
		      alert(data.msg);		     
	      },'json');//function
}
</script>

<?php ob_start();?>
<script type="text/javascript">
$(function(){
   $('#from_date').datepicker({
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'yy-mm-dd',
        minDate: '0',
        maxDate: '+2Y',
        onSelect: function(dateStr) {
                var d1 = $(this).datepicker("getDate");
                d1.setDate(d1.getDate() + 0); // change to + 1 if necessary
                var d2 = $(this).datepicker("getDate");
                d2.setDate(d2.getDate() + 180); // change to + 180 if necessary
                $("#to_date").datepicker("option", "minDate", d1);
                $("#to_date").datepicker("option", "maxDate", d2); 
                var start = $("#from_date").datepicker("getDate");
                var end   = $("#to_date").datepicker("getDate");
                var days   = (end - start)/1000/60/60/24;
                //if(end!=null)$('input[name=nofnight]').val(days);
            }
      });



      $('#to_date').datepicker({
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'yy-mm-dd',   
        minDate: $("#from_date").datepicker("getDate"),
            maxDate: '+2Y',
            onSelect: function(){
              var start = $("#from_date").datepicker("getDate");
                var end   = $("#to_date").datepicker("getDate");
                var days   = (end - start)/1000/60/60/24;
                //if(end!=null)$('input[name=nofnight]').val(days);
            }
      });
   /*for nepali calender */
   //var calendar = tjq.calendars.instance('nepali');  
   //jQuery('#inquiry_work_date').calendarsPicker({calendar: calendar,dateFormat:'yyyy-mm-dd',minDate:0});
   //for time picker
   jQuery('#from_time,#to_time').timepicker({
    showPeriod: true,
    showLeadingZero: true,
    amPmText: ['am', 'pm'],
    hours: {
                  starts: 0,  
                  ends: 23 
             }
   });

});
</script>
<?php $content_footer[] = ob_get_clean();?>