<div class="row"> 
  <div class="col-sm-12">
    <div class="panel">
<?php 
$artist  =   isset($_REQUEST['pid'])?decode($_REQUEST['pid']):0;
$artist_row = $funArtistObj->artist_detail($artist);

$aid  =   isset($_REQUEST['aid'])?decode($_REQUEST['aid']):0; 
    if(!empty($aid)){
        $row            =  $funAlbumObj->album_detail($aid);
    } else{ 
      $rf = $funAlbumObj->table_fields();      
      if($rf){if($db->total_rows($rf)>0){while($rowfield=$db->fetch_array($rf)){@$row->{$rowfield['Field']}='';}}}
      }//elseclose
?> 
 
 
<div class="panel-heading"> <span class="panel-title"><?php echo $artist_row->artist_name?>
            <small>Album</small></span> </div>
      <div class="panel-body">

              <form action="<?php echo base_url("$administrator/page/mod_$module/action.php"); ?>" method="post" name="addEditForm" role="form" enctype="multipart/form-data" class="form-horizontal">    
        	<input type="hidden" name="hidden_id" id="hidden_id" value="<?php echo @encode($aid); ?>" />
          <input type="hidden" name="artist_id" id="artist_id" value="<?php echo @encode($artist); ?>" />
            
            
            <div class="form-group">
            	<label for="inputAlbumName" class="col-sm-2 control-label">Album Name</label>
                <div class="col-sm-4">
                	<input type="text" class="form-control required" id="name" name="album_name" placeholder="Album Name" title="Please Enter Album Name" value="<?php echo @$row->album_name?>"/>
                </div>     	       		
            </div>
            
            <!--Uploodad Gallary Image-->
           <?php
				$img = @$row->cover_image;
				if(file_exists(FCPATH."uploads/images/album/".$img) and !empty($img))
			{?>
            <div class="form-group">
            	<label for="inputImage" class="col-sm-2 control-label">Old Image</label>
                <div class="col-sm-6">
                	<img src="<?php echo base_url("uploads/images/album/".$img);?>" width="80">
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
                    	<textarea class="form-control" id="description" name="detail" rows="5"><?php echo @$row->detail?></textarea>
                    </div>
                </div>
                
                <div class="form-group">
            		<label for="inputVersion" class="col-sm-2 control-label">Version</label>
                	<div class="col-sm-4">
                		<input type="text" class="form-control required" id="version" name="version" placeholder="Version" title="Please Enter Version" value="<?php echo @$row->version?>"/>
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
                <label for="Featured" class="col-sm-2 control-label">Hit/Featured</label>
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
                        <button type="button" class="btn btn-danger" id="cancel" value="Cancel" onclick="window.location.href='lists-album-<?php echo encode($artist);?>';">Cancel</button>
                    </div>
                </div>
        </form>

      </div>
    </div>
  </div>
</div>