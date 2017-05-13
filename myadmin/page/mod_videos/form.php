<div class="row"> 
  <div class="col-sm-12">
    <div class="panel">
<?php 
	$aid  =   isset($_REQUEST['aid'])?decode($_REQUEST['aid']):0; 
    if(!empty($aid)){
        $row            =  $funVideosObj->videos_detail($aid);
    } else{ 
      $rf = $funVideosObj->table_fields();      
      if($rf){if($db->total_rows($rf)>0){while($rowfield=$db->fetch_array($rf)){@$row->{$rowfield['Field']}='';}}}
      }//elseclose
?> 

<div class="panel-heading"> <span class="panel-title">Videos Management </span> </div>
      <div class="panel-body">

              <form action="<?php echo base_url("$administrator/page/mod_$module/action.php"); ?>" method="post" name="addEditForm" role="form" enctype="multipart/form-data" class="form-horizontal">
        	<input type="hidden" name="hidden_id" id="hidden_id" value="<?php echo @encode($aid); ?>" />
            <div class="form-group">
            	<label for="inputArtist" class="col-sm-2 control-label">Title</label>
                <div class="col-sm-4">
                	<input type="text" class="form-control required" id="title" name="title" placeholder="Title" title="Please Enter Title" value="<?php echo @$row->title?>"/>
                </div>     	       		
            </div>
             <?php
                $video_url = @$row->url;
                if(!empty($video_url))
            { $video_code  =  get_youtube_code($video_url);?>
            <div class="form-group">
                <label for="inputSongs" class="col-sm-2 control-label">Old Videos</label>
                <div class="col-sm-6">
                    <iframe title="YouTube video player" class="youtube-player" type="text/html" width="100%" height="120" src="http://www.youtube.com/embed/<?php echo $video_code;?>" frameborder="0" allowFullScreen></iframe>
                </div>
            </div>
            <?php }?>
                       
            <div class="form-group">
            	<label for="inputAddress" class="col-sm-2 control-label">Url</label>
                <div class="col-sm-4">
                	<textarea class="form-control required" id="url" name="url" placeholder="Url Address" title="Please Enter Url"><?php echo @$row->url?></textarea>
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
                        <button type="button" class="btn btn-danger" id="cancel" value="Cancel" onclick="window.location.href='lists-<?php echo $module;?>';">Cancel</button>
                    </div>
                </div>
        </form>

        </div>
    </div>
  </div>
</div>
