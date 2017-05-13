<div class="row">
  <div class="col-sm-12">
    <div class="panel">

<?php 
include("page/setAndCheckAll.php");
include("page/mod_setAndCheckAll/setToken.php");
$aid  =   isset($_REQUEST['aid'])?decode($_REQUEST['aid']):0; 
if(!empty($aid)){ 
  $row  =  $funPageCatObj->find_by_id($aid); //pr($row);
}else{ 
$rf = $funPageCatObj->table_fields();
if($rf){if($db->total_rows($rf)>0){while($rowfield=$db->fetch_array($rf)){@$row->{$rowfield['Field']}='';}}}
}//elseclose
?>


<div class="panel-heading"> <span class="panel-title">Manage Pages Category </span> </div>
      <div class="panel-body">


<form action="<?php echo base_url("$administrator/page/mod_$module/act_thismodule.php"); ?>" method="post" enctype="multipart/form-data" id="addEditForm">
<input type="hidden" name="mytoken" value="<?php echo $mytoken; ?>"  />
<input type="hidden" name="hidden_id" id="hidden_id" value="<?php echo @encode($aid); ?>" />
<div class="form-group"><label class="col-sm-12 control-label" for="category_name"> Asterisk (<span class="req">*</span> ) fields are required</label></div>
  
  
                   <div class="form-group">
						<label class="col-sm-2 control-label" for="category_name">Category Name <span class="req">*</span></label>
						<div class="col-sm-4">
							<input type="text" name="txtCatName" id="txtCatName"  value="<?php echo $row->category_name; ?>" class="form-control required" placeholder="Category Name" ></div>
					</div>
                    
                    
                    <div class="form-group">
						<label class="col-sm-2 control-label" for="type">Type <span class="req">*</span></label>
						<div class="col-sm-4">
							<?php $res  =  $funPageCatObj->getDistinctType();
	      $res_num  =  $db->num_rows($res);
	if($res_num>0){ 
	?>
	 <select name="select_type" onchange="if(this.value!=''){$('#type').val(this.value);}else{$('#type').val('');}" class="form-control">
	 <option value="">Choose Type</option>
	 <?php while ($row_res  =  $db->result($res)){  ?>
	 <option value="<?php echo $row_res->type?>"><?php echo $row_res->type?></option>
	 <?php } ?>
	 </select>	 
	or
	<?php } ?>
    <input type="text" name="type" id="type" class="form-control required" value="<?php echo @$row->type;?>" />
                            
                            </div>
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
<script>$(document).ready( function(){ $("#txtCatName").focus(); });</script>