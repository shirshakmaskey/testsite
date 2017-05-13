<?php 
	$id = isset($_GET['id'])?$_GET['id']:0;
	if($id>0){
		$row = $funSongsVideosLyricsObj->svl_detail($id);
	}
?>
    <!-- Site wrapper -->
    <div class="wrapper">
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Add/Edit Form
            <small>Songs/Videos/Lyrics</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">SVL Mgmt</a></li>
            <li class="active">Create Songs/Videos/Lyrics</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Title</h3>
              <div class="box-tools pull-right">
                <button type="button" class="fa  fa-list" id="cancel" name="cancel" value="Cancel" onclick="window.location.href='index.php?m=songs_videos&p=list';"> Songs/Videos/Lyrics Mgmt</button>
              </div>
            </div>
            <div class="box-body">
              <form action="page/mod_<?php echo $module?>/action.php" method="post" name="addEditForm" role="form" enctype="multipart/form-data" class="form-horizontal">
        	<input type="hidden" name="hidden_id" id="hidden_id" value="<?=$id?>" />
            
            <div class="form-group">
            	<label for="inputAlbumName" class="col-sm-2 control-label">Album Name</label>
                <div class="col-sm-4">
                	<input type="text" class="form-control required" id="name" name="album_name" placeholder="Album Name" title="Please Enter Album Name" value="<?php echo @$row->album_name?>"/>
                </div>     	       		
            </div>
            
            <div class="form-group">
            	<label for="inputTokenKey" class="col-sm-2 control-label">Token Keys</label>
                <div class="col-sm-4">
                	<input type="text" class="form-control required" id="name" name="token_keys" placeholder="Token Keys" title="Please Enter Token Keys" value="<?php echo @$row->token_keys?>"/>
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
                        <button type="button" class="btn btn-danger" id="cancel" value="Cancel" onclick="window.location.href='index.php?m=album&p=list';">Cancel</button>
                    </div>
                </div>
        </form>
            </div><!-- /.box-body -->
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
    </div><!-- ./wrapper -->
