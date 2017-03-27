<div class="row"> 
  <div class="col-sm-12">
    <div class="panel">
<?php 
$artist  =   isset($_REQUEST['pid'])?decode($_REQUEST['pid']):0;
$artist_row = $funArtistObj->artist_detail($artist);

$aid  =   isset($_REQUEST['aid'])?decode($_REQUEST['aid']):0; 
    if(!empty($aid)){
        $row            =  $funGalleryObj->gallery_detail($aid);
    } else{ 
      $rf = $funGalleryObj->table_fields();      
      if($rf){if($db->total_rows($rf)>0){while($rowfield=$db->fetch_array($rf)){@$row->{$rowfield['Field']}='';}}}
      }//elseclose
?>

<div class="panel-heading"> <span class="panel-title"><?php echo $artist_row->artist_name?>
            <small>Gallery</small></span> </div>
      <div class="panel-body">

              <form action="<?php echo base_url("$administrator/page/mod_$module/action.php"); ?>" method="post" name="addEditForm" role="form" enctype="multipart/form-data" class="form-horizontal">    
          <input type="hidden" name="hidden_id" id="hidden_id" value="<?php echo @encode($aid); ?>" />
          <input type="hidden" name="artist_id" id="artist_id" value="<?php echo @encode($artist); ?>" />
            
            <div class="form-group">
            	<label for="inputGallery Name" class="col-sm-2 control-label">Gallery Name</label>
                <div class="col-sm-4">
                	<input type="text" class="form-control required" id="name" name="gallery_name" placeholder="Gallery Name" title="Please Enter Gallery Name" value="<?php echo @$row->gallery_name?>"/>
                </div>     	       		
            </div>
            
            <!--Uploodad Gallary Image-->
           <?php
				$img = @$row->cover_image;
				if(file_exists(FCPATH."uploads/images/gallery/".$img) and !empty($img))
			{?>
            <div class="form-group">
            	<label for="inputImage" class="col-sm-2 control-label">Old Image</label>
                <div class="col-sm-6">
                	<img src="<?php echo base_url("uploads/images/gallery/".$img);?>" width="80">
                </div>
            </div>
            <?php }?>
            <div class="form-group">
            	<label for="inputImage" class="col-sm-2 control-label">Cover Image</label>
                <div class="col-sm-6">
                	<input type="file" id="image" name="cover_image">
                    <input type="hidden" name="hidden_image" value="<?php echo $img?>">
                    <small>Size 1080 * 720</small> 
                </div> 
            </div>
                
                <div class="form-group">
                	<label for="inputDescription" class="col-sm-2 control-label">Description</label>
                    <div class="col-sm-4">
                    	<textarea class="form-control" id="description" name="description" rows="5"><?php echo @$row->description?></textarea>
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
                        <button type="button" class="btn btn-danger" id="cancel" value="Cancel" onclick="window.location.href='index.php?m=gallery&p=list&artist=<?=$artist?>';">Cancel</button>
                    </div>
                </div>
        </form>
      </div>
    </div>
  </div>
</div>