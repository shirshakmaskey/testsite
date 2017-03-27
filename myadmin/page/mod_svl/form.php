
<div class="row"> 
  <div class="col-sm-12">
    <div class="panel">
<?php 
$artist  =   isset($_REQUEST['pid'])?decode($_REQUEST['pid']):0;
$artist_row = $funArtistObj->artist_detail($artist);

$aid  =   isset($_REQUEST['aid'])?decode($_REQUEST['aid']):0; 
    if(!empty($aid)){
        $row            =  $funSVLObj->svl_detail($aid);
    } else{ 
      $rf = $funSVLObj->table_fields();      
      if($rf){if($db->total_rows($rf)>0){while($rowfield=$db->fetch_array($rf)){@$row->{$rowfield['Field']}='';}}}
      }//elseclose

    if(isset($_SESSION['imageFiles'])){ 
    foreach($_SESSION['imageFiles'] as $key=>$val){
         if(file_exists(FCPATH."uploads/images/songs/".$val) and !empty($val)){
          unlink(FCPATH."uploads/images/songs/".$val); 
         } 
        }
        unset($_SESSION['imageFiles']);
    }
?>  
 
<div class="panel-heading"> <span class="panel-title"><?php echo $artist_row->artist_name?>
            <small>Lyrics and Songs</small></span> </div>
      <div class="panel-body">
<link rel="stylesheet" href="<?php echo base_url(APPLICATIONS."uploadify/uploadify.css"); ?>" />
              <form action="<?php echo base_url("$administrator/page/mod_$module/action.php"); ?>" method="post" name="addEditForm" role="form" enctype="multipart/form-data" class="form-horizontal">    
          <input type="hidden" name="hidden_id" id="hidden_id" value="<?php echo @encode($aid); ?>" />
          <input type="hidden" name="artist_id" id="artist_id" value="<?php echo @encode($artist); ?>" />


            <div class="form-group">
            	<label for="inputSVLTitle" class="col-sm-2 control-label">Songs Lyrics Title</label>
                <div class="col-sm-4">
                	<input type="text" class="form-control required" id="name" name="title" placeholder="Songs Lyrics Title" title="Please Enter Title" value="<?php echo @$row->title?>"/>
                </div>     	       		
            </div>

            <div class="form-group">
                    <label for="inputDescription" class="col-sm-2 control-label">Genre</label>
                    <div class="col-sm-4">
                        <select class="form-control" id="genre" name="genre">
                        <option value="pop">Pop Music</option>
                        <option value="classic">Classical Music</option>
                        <option value="dance music">Dance Music</option>
                        <option value="rock">Rock</option>
                        <option value="opera">Opera</option>
                        <option value="reggae">Reggae</option>
                        <option value="new age">New Age</option>
                        <option value="blues">Blues</option>
                        <option value="spritual">Spritual</option>
                        <option value="electronic music">Electronic Music</option>
                        <option value="jazz">Jazz</option>
                        </select>
                    </div>
                </div>
           
            <div class="form-group">
            	<label for="inputArtist" class="col-sm-2 control-label">Album Name</label>
                <div class="col-sm-4">
                <select name="album_id" id="album_id" class="form-control required">
       				 <option value="">Choose</option>
        				<?php  $result  =  $funAlbumObj->activeAlbumList($artist);
							$num  =  $db->num_rows($result);
							if($num>0){
							while($row_album  =  $db->result($result)){
		 				?>
        			<option value="<?php echo $row_album->id?>" <?php echo (@$row->album_id==$row_album->id)?"selected":"";?>><?php echo $row_album->album_name?></option>
            			<?php }}?>
       			 </select>
                </div>     	       		
            </div>
            
            <?php
				$songs_file = @$row->songs_file;
				if(file_exists(FCPATH."uploads/songs/".$songs_file) and !empty($songs_file))
			{?>
            <div class="form-group">
            	<label for="inputSongs" class="col-sm-2 control-label">Old Songs File</label>
                <div class="col-sm-6">
                	<audio controls>
                          <source src="<?php echo base_url('uploads/songs/'.$songs_file);?>" type="audio/mpeg">
                          Your browser does not support the audio tag.
                        </audio>
                </div>
            </div>
            <?php }?>


            <div class="clear"></div>
               <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-4">
                   <div id="file_preview"></div>
                 </div>
           </div>

           
            <div class="form-group">
            	<label for="inputSongs" class="col-sm-2 control-label">Upload Songs </label>
                <div class="col-sm-6">
                	<input type="file" id="songs_file" name="songs_file" accept=".mp3">
                    <input type="hidden" name="hidden_songs" value="<?php echo $songs_file?>"> 
                </div> 
            </div> 
            
            

            <?php
                $video_file = @$row->video_file;
                if(!empty($video_file))
            { $video_code  =  get_youtube_code($video_file);?>
            <div class="form-group">
                <label for="inputSongs" class="col-sm-2 control-label">Old Videos</label>
                <div class="col-sm-6">
                    <iframe title="YouTube video player" class="youtube-player" type="text/html" width="100%" height="120" src="http://www.youtube.com/embed/<?php echo $video_code;?>" frameborder="0" allowFullScreen></iframe>
                </div>
            </div>
            <?php }?>

             <div class="form-group">
                	<label for="inputDescription" class="col-sm-2 control-label">Video(Youtube Link)</label>
                    <div class="col-sm-8">
                    	<textarea class="form-control" id="video_file" name="video_file" rows="5"><?php echo @$row->video_file?></textarea>
                    </div>
                </div>           
            
            
            <div class="form-group">
            	<label for="inputImage" class="col-sm-2 control-label">Upload Lyrics </label>
                <div class="col-sm-8">
                        <textarea class="form-control" id="lyrics_file" name="lyrics_file" rows="5"><?php echo @$row->lyrics_file?></textarea>
                    </div> 
            </div>
            
            
            
                <div class="form-group">
                	<label for="inputDescription" class="col-sm-2 control-label">Description</label>
                    <div class="col-sm-8">
                    	<textarea class="form-control" id="detail" name="detail" rows="5"><?php echo @$row->detail;?></textarea>
                    </div>
                </div>

            <div class="form-group">
                <label for="price" class="col-sm-2 control-label">Price</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control required" id="price" name="price" placeholder="Price" title="Please Enter Price" value="<?php echo @$row->price?>"/>
                </div>                  
            </div>

            <div class="form-group">
                <label for="price" class="col-sm-2 control-label">Rating</label>
                <div class="col-sm-4">
                    
                    <select name="rating" id="rating" class="form-control">
                        <?php for($i=1;$i<=5;$i++){?>
                        <option value="<?php echo $i;?>" <?php echo @($row->rating==$i) ? "selected":"";?> ><?php echo $i;?></option>
                        <?php } ?>
                    </select>
                </div>                  
            </div>



                
                <div class="form-group">
                <label for="showInHome" class="col-sm-2 control-label">Show in Home</label>
                <div class="col-sm-4">
                    <label class="radio-inline">
                    <input type="checkbox" id="show_in_home" name="show_in_home" value="1" <?php echo (@$row->show_in_home=='1')?"checked":"";?> <?php echo empty($id) ? "checked":"";?> > Yes
                    </label>
                </div>                  
            </div>

            <div class="form-group">
                <label for="Featured" class="col-sm-2 control-label">Featured</label>
                <div class="col-sm-4">
                    <label class="radio-inline">
                    <input type="checkbox" id="featured1" name="featured" value="1" <?php echo (@$row->featured=='1')?"checked":"";?> <?php echo empty($id) ? "checked":"";?> > Yes
                    </label>
                </div>                  
            </div>
                
           
                <div class="form-group">
    			<label for="inputStatus" class="col-sm-2 control-label">Status</label>
    			<div class="col-sm-4">
	 				<label class="radio-inline">
      				<input type="radio" id="status1" name="status" value="1" <?php echo (@$row->status=='1')?"checked":"";?> <?php echo empty($id) ? "checked":"";?> > Active
	  				</label>
	  				<label class="radio-inline">
	  				<input type="radio" id="status2" name="status" value="0" <?php echo (@$row->status=='0')?"checked":"";?>> Inactive
	  				</label>
    			</div>
  			</div>
                
                <div class="form-group">
                	<div class="col-sm-offset-2 col-sm-10">
                    	<button type="submit" class="btn btn-info" id="submit" name="submit" value="Save">Save</button>
                        <button type="button" class="btn btn-danger" id="cancel" value="Cancel" onclick="window.location.href='lists-<?php echo $module;?>-<?=encode($artist);?>';">Cancel</button>
                    </div>
                </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php ob_start();?>
<script type="text/javascript" src="<?php echo base_url(APPLICATIONS.'ckeditor/ckeditor.js'); ?>"></script> 
<script type="text/javascript" src="<?php echo base_url(APPLICATIONS.'ckfinder/ckfinder.js'); ?>"></script> 
<script>
autosize(document.querySelectorAll('textarea'));
var base_url =  "<?php echo base_url(); ?>";
var editor_arr = ["lyrics_file","detail"];
create_editor(base_url,editor_arr);
</script>
<script type="text/javascript" src="<?php echo base_url(APPLICATIONS.'uploadify/jquery.uploadify.min.js'); ?>"></script> 
<script type="text/javascript">
   // <![CDATA[
    $(document).ready(function() {
    $('#songs_file').uploadify({
    'swf'           : '<?php echo base_url(APPLICATIONS.'uploadify/uploadify.swf'); ?>',
    'uploader'      : '<?php echo base_url(ADMINISTRATOR."page/mod_$module/uploadify_file.php"); ?>',   
    'formData'          : {project_path : '<?php echo base64_encode(constant("FCPATH")); ?>',targetFolder:'uploads/songs/'},
    'method'            : 'post',
    'cancelImg'         : '<?php echo base_url(APPLICATIONS);?>uploadify/cancel.png',
    'auto'              : true,
    'multi'             : false, 
    'hideButton'        : false,
    'buttonText'        : 'Choose File',
    'width'             : 150,
    'height'            : 40,
    'removeCompleted'   : true,
    'progressData'      : 'speed',
    'uploadLimit'       : 100,
    'fileTypeExts'      : '*.mp3; *.wmv;',
    'buttonClass'       : 'btn btn-primary',
    'onUploadSuccess'   : function(file, data, response) {
        var filename    =  data;
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

</script>
<?php $content_footer[] = ob_get_clean();?> 