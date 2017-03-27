<div class="row">
  <div class="col-sm-12">
    <div class="panel">
<?php 
$form_show = true;
include("page/setAndCheckAll.php");
include("page/mod_setAndCheckAll/setToken.php");
$aid  =   isset($_REQUEST['aid'])?$_REQUEST['aid']:0;
if(!empty($aid)){
  $row  =  $funMenuSetObj->find_by_id($aid);
}else{
 $form_show = false;
    $rf = $funMenuSetObj->table_fields();
	  if($rf){if($db->total_rows($rf)>0){while($rowfield=$db->fetch_array($rf)){@$row->{$rowfield['Field']}='';}}}
}
?>
<?php if($form_show==true){?>
 <div class="panel-heading"> <span class="panel-title">Menu Setting </span> </div>
      <div class="panel-body">
<form action="<?php echo base_url("$administrator/page/mod_$module/act_thismodule.php"); ?>" method="post" enctype="multipart/form-data" id="addEditForm">
<input type="hidden" name="mytoken" value="<?php echo $mytoken; ?>"  />
<input type="hidden" name="hidden_id" id="hidden_id" value="<?php echo @$aid; ?>" />
  <div class="row">
            <label class="col-lg-12 control-label">Asterisk (<span class="req">*</span> ) fields are required</label>
          </div>
          <hr />
                     <div class="form-group">
						<label class="col-sm-2 control-label" for="menutype">Menu Type <span class="req">*</span></label>
						<div class="col-sm-4">
							<input type="text" name="txtMenuType" id="txtMenuType"  value="<?php echo $row->menu_type_name; ?>" class="form-control required" placeholder="Menu Type"   <?php echo (!empty($aid))?"readonly='readonly'":''; ?> ></div>
					</div> 
                    
                    
                    
                    <div class="form-group">
						<label class="col-sm-2 control-label" for="position">Position <span class="req">*</span></label>
						<div class="col-sm-4">
							<select name="position" id="position"  class="form-control required" <?php echo (!empty($aid))?"readonly='readonly'":''; ?> >
  <option value="">Choose Position</option>
    <?php  $positionArr  =  array(
                 		          "top"=>"Top",
								  
                 		          "top_left"=>"Top Left",
								  "top_middle"=>"Top Middle",
								  "top_right"=>"Top Right",
								  
								  "bottom"=>"Bottom",
								  
								  "bottom_top"=>"Bottom Top",
								  "bottom_left"=>"Bottom Left",
								  "bottom_middle"=>"Bottom Middle",
								  "bottom_right"=>"Bottom Right",		                          

								  "left_top"=>"Left Top",
								  "left_middle"=>"Left Middle",
								  "left_bottom"=>"Left Bottom",

								  "right_top"=>"Right Top",
								  "right_middle"=>"Right Middle",
								  "right_bottom"=>"Right Bottom"
								  );
	   foreach($positionArr as $key=>$val){
		?>
		<option value="<?php echo $key;?>" <?php if(!empty($aid)){ echo ($key==@$row->position)?"selected":""; } ?> ><?php echo $val;?></option>
		<?php  } ?>
  </select></div>
					</div>   
                    
                     <div class="form-group">
						<label class="col-sm-2 control-label" for="displaynum">Display Number <span class="req">*</span></label>
						<div class="col-sm-4">
							<input type="number" name="NumDisplay" id="NumDisplay"  min="1" max="20" step="1" value="<?php echo @$row->display_number; ?>" class="form-control required"></div>
					</div>        
   
  <div class="form-group">
						<label class="col-sm-2 control-label" for="status">Status</label>
						<div class="col-sm-4">
						    <div class="checkbox">
							<label>
							<input type="checkbox" name="status" id="status"  value="1" class="px" <?php echo ($row->status==1) ? "checked":""; ?> >
							<span class="lbl">Active</span> </label>
							</div>
							</div>
					</div>

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
<script>$(document).ready( function(){ $("#txtMenuType").focus(); });</script>
<?php }else{ echo "<h2>You are in wrong place.</h2>"; }?>