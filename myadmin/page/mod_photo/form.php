<div class="row"> 
  <div class="col-sm-12">
    <div class="panel">
<?php 
$gid  =   isset($_REQUEST['pid'])?decode($_REQUEST['pid']):0;
$gallery_row = $funGalleryObj->gallery_detail($gid);
$artist_row = $funArtistObj->artist_detail($gallery_row->artist_id);

$aid  =   isset($_REQUEST['aid'])?decode($_REQUEST['aid']):0; 
    if(!empty($aid)){
        $row            =  $funPhotoObj->photo_detail($aid);
    } else{ 
      $rf = $funPhotoObj->table_fields();      
      if($rf){if($db->total_rows($rf)>0){while($rowfield=$db->fetch_array($rf)){@$row->{$rowfield['Field']}='';}}}
      }//elseclose
?>

<div class="panel-heading"> <span class="panel-title"><?php echo $artist_row->artist_name?>
            <?php echo $artist_row->artist_name?>'s <?php echo $gallery_row->gallery_name?>
            <small>Photo Management</small> </div>
      <div class="panel-body">

              <form action="<?php echo base_url("$administrator/page/mod_$module/action.php"); ?>" method="post" name="addEditForm" role="form" enctype="multipart/form-data" class="form-horizontal">    
          <input type="hidden" name="hidden_id" id="hidden_id" value="<?php echo @encode($aid); ?>" />
          <input type="hidden" name="gallery_id" id="gallery_id" value="<?php echo @encode($gid); ?>" />
           
            <div class="form-group">
            	<label for="inputPhotoTitle" class="col-sm-2 control-label">Title</label>
                <div class="col-sm-4">
                	<input type="text" class="form-control required" id="name" name="photo_title" placeholder="Photo Title" title="Please Enter Photo Title" value="<?php echo @$row->photo_title?>"/>
                </div>     	       		
            </div>
            
            <!--Uploodad Gallary Image-->
           <?php
				$img = @$row->image;
				if(file_exists(FCPATH."uploads/images/photo/".$img) and !empty($img))
			{?>
            <div class="form-group">
            	<label for="inputImage" class="col-sm-2 control-label">Old Image</label>
                <div class="col-sm-6">
                	<img src="<?php echo base_url("uploads/images/photo/".$img);?>" width="80">
                </div>
            </div>
            <?php }?>
            <div class="form-group">
            	<label for="inputImage" class="col-sm-2 control-label">Image</label>
                <div class="col-sm-6">
                	<input type="file" id="image" name="image">
                    <input type="hidden" name="hidden_image" value="<?php echo $img?>">
                    <small>Size 1080 * 720</small> 
                </div> 
            </div>
                
                <div class="form-group">
                	<label for="inputDescription" class="col-sm-2 control-label">Description</label>
                    <div class="col-sm-4">
                    	<textarea class="form-control" id="description" name="detail" rows="5"><?php echo @$row->detail?></textarea>
                    </div>
                </div>
                
                <div class="form-group">
    			<label for="inputStatus" class="col-sm-2 control-label">Status</label>
    			<div class="col-sm-4">
	 				<label class="radio-inline">
      				<input type="radio" id="status1" name="status" value="1" <?php echo (@$row->status==1)?"checked":"";?> <?php echo empty($id) ? "checked":"";?> > Active
	  				</label>
	  				<label class="radio-inline">
	  				<input type="radio" id="status2" name="status" value="0" <?php echo (@$row->status==0)?"checked":"";?>> Inactive
	  				</label>
    			</div>
  			</div>
                
                <div class="form-group">
                	<div class="col-sm-offset-2 col-sm-10">
                    	<button type="submit" class="btn btn-info" id="submit" name="submit" value="Save">Save</button>
                        <button type="button" class="btn btn-danger" id="cancel" value="Cancel" onclick="window.location.href='index.php?m=photo&p=list';">Cancel</button>
                    </div>
                </div>
         </form>
      </div>
    </div>
  </div>
</div>