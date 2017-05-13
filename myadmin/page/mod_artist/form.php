<div class="row"> 
  <div class="col-sm-12">
    <div class="panel">
<?php 
	$aid  =   isset($_REQUEST['aid'])?decode($_REQUEST['aid']):0; 
    if(!empty($aid)){
        $row            =  $funArtistObj->artist_detail($aid);
    } else{ 
      $rf = $funArtistObj->table_fields();      
      if($rf){if($db->total_rows($rf)>0){while($rowfield=$db->fetch_array($rf)){@$row->{$rowfield['Field']}='';}}}
      }//elseclose
?> 

<div class="panel-heading"> <span class="panel-title">Artist Management </span> </div>
      <div class="panel-body">

              <form action="<?php echo base_url("$administrator/page/mod_$module/action.php"); ?>" method="post" name="addEditForm" role="form" enctype="multipart/form-data" class="form-horizontal">
        	<input type="hidden" name="hidden_id" id="hidden_id" value="<?php echo @encode($aid); ?>" />
            <div class="form-group">
            	<label for="inputArtist" class="col-sm-2 control-label">Artist Name</label>
                <div class="col-sm-4">
                	<input type="text" class="form-control required" id="name" name="artist_name" placeholder="Artist Name" title="Please Enter Artist Name" value="<?php echo @$row->artist_name?>"/>
                </div>     	       		
            </div>
            
            <div class="form-group">
            	<label for="inputAddress" class="col-sm-2 control-label">Address</label>
                <div class="col-sm-4">
                	<input type="text" class="form-control required" id="address" name="address" placeholder="Address" title="Please Enter Customer Address" value="<?php echo @$row->address?>"/>
                </div>     	       		
            </div>
            
            <div class="form-group">
            	<label for="inputCountry" class="col-sm-2 control-label">Country</label>
                <div class="col-sm-4">
                	<input type="text" class="form-control required" id="country" name="country" placeholder="Country" title="Please Enter Country" value="<?php echo @$row->country?>"/>
                </div>     	       		
            </div>
            
            <!-- Upload Profile Image -->
             <?php $img  =  @$row->profile_image;
			 if(file_exists(FCPATH."uploads/images/artist/".$img) and !empty($img)){?>
             <div class="form-group">
    			<label for="inputImage" class="col-sm-2 control-label">Old Image</label>
        		<div class="col-sm-4">
        	 		<img src="<?php echo base_url("uploads/images/artist/".$img);?>" width="80" />
        		</div>
    		</div> 
             <?php }?>
    
    		<div class="form-group">
    			<label for="inputImage" class="col-sm-2 control-label">Profile Image</label>
        		<div class="col-sm-4">
        			<input type="file" class="form-control" id="image" name="profile_image" >
           			<input type="hidden" name="hidden_image" value="<?php echo @$img?>" />
            		<small>Size: 600*600</small>
        		</div>
    			</div>


             
                 
                <div class="form-group">
            	<label for="inputEmail" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-4">
                	<input type="email" class="form-control required email" id="email" name="email" placeholder="Email" title="Please Enter Email" value="<?php echo @$row->email?>"/>
                </div>     	       		
            </div>
                
            <div class="form-group">
            	<label for="inputContact" class="col-sm-2 control-label">Contact No</label>
                <div class="col-sm-4">
                	<input type="text" class="form-control required email" id="contact_no" name="contact_no" placeholder="Contact No" title="Please Enter Contact No" value="<?php echo @$row->contact_no?>"/>
                </div>     	       		
            </div>
            <div class="form-group">
            	<label for="inputGender" class="col-sm-2 control-label">Gender</label>
                <div class="col-sm-4">
	 				<label class="radio-inline">
      				<input type="radio" id="gender1" name="gender" value="Male" <?php echo (@$row->gender=='Male')?"checked":"";?> <?php echo empty($id) ? "checked":"";?> > Male
	  				</label>
	  				<label class="radio-inline">
	  				<input type="radio" id="gender2" name="gender" value="Female" <?php echo (@$row->gender=='Female')?"checked":"";?>> Female
	  				</label>
    			</div>   	       		
            </div>
                
                <div class="form-group">
                	<label for="inputBiography" class="col-sm-2 control-label">Biography</label>
                    <div class="col-sm-8">
                    	<textarea class="form-control" id="description" name="biography"><?php echo @$row->biography?></textarea>
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
<?php ob_start();?>
<script type="text/javascript" src="<?php echo base_url(APPLICATIONS.'ckeditor/ckeditor.js'); ?>"></script> 
<script type="text/javascript" src="<?php echo base_url(APPLICATIONS.'ckfinder/ckfinder.js'); ?>"></script> 
<script>
autosize(document.querySelectorAll('textarea'));
var base_url =  "<?php echo base_url(); ?>";
var editor_arr = ["biography"];
create_editor(base_url,editor_arr);
</script>
<?php $content_footer[] = ob_get_clean();?> 