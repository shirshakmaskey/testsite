<div class="row">
  <div class="col-sm-12">
    <div class="panel">
<?php
include("page/setAndCheckAll.php");
include("page/mod_setAndCheckAll/setToken.php");
$aid  =   isset($_REQUEST['aid'])?decode($_REQUEST['aid']):0;
if(!empty($aid)){
$rowEdit   = $funSettingObj -> configurationPageSel($aid);
} else{ 
	  $rf = $funSettingObj->table_fields('tbl_configuration');		
	  if($rf){if($db->total_rows($rf)>0){while($rowfield=$db->fetch_array($rf)){@$rowEdit->{$rowfield['Field']}='';}}}
	  }//elseclose
$type_arr  =  array('text'=>'Text',
	                'textarea'=>'Textarea',
	                'option'=>'Options',
	                'checkbox'=>'Checkbox',
	                'functions'=>'Functions',
	                'file'=>'File',
	                'image'=>'Image',
	                'link'=>'Link'
	                );	  
?>
<script>
$(document).ready( function(){ 
	 $("#configname").focus(); 
});

function checkDuplicate(configname)
{
           $.ajax({
		   type: "POST",
		   url: "page/mod_<?php echo $module; ?>/ajaxSetting.php",
		   data: { configname:configname,mod_setting:"configuration" },
		   success: function(response){			   
			    if(response.result=='true'){ $("#configname").val(msg);}	
		   }
		 },'json');
}
</script>


<div class="panel-heading"> <span class="panel-title">Configuration</span> </div>
      <div class="panel-body">
<form action="<?php echo base_url("$administrator/page/mod_$module/actConfigurationpage.php"); ?>" method="post" onsubmit="return congifurationpage();" id="configform" enctype="multipart/form-data">
	<div class="row">
		<div class="pull-right">
			<input type="hidden" name="mytoken" value="<?php echo $mytoken; ?>"  />
          <input type="hidden" name="hidden_id" id="hidden_id" value="<?php echo @encode($aid); ?>" />
		</div>
	</div>
	<br />
	<div class="clear"></div>
	<table width="100%" border="0" cellpadding="1" cellspacing="1" class="table table-bordered">

		<tr>
			<td width="200">Configuration Name</td>
			<td><input type="text" name="configname" id="configname" class="form-control required" value="<?php echo @(!is_null($rowEdit))? @$rowEdit->configname:""; ?>" onkeyup="checkEmpty('configname','confignameErr');" <?php echo !empty($rowEdit->configname)?"disabled":@$rowEdit->configname;?> onblur="checkDuplicate(this.value);" />
				<input type="hidden" name="previous_configname" id="previous_configname" value="<?php echo (!is_null($rowEdit))? $rowEdit->configname:""; ?>" />
				<span id="confignameErr" class="errorClass"> </span></td>
		</tr>

		<tr>
			<td valign="top">Configuration Description</td>
			<td><textarea name="configdesc" id="configdesc" rows="4" cols="50" onkeyup="checkEmpty('configdesc','configdescErr');" class="form-control"><?php echo (!is_null($rowEdit))? @$rowEdit->configdesc:""; ?></textarea>
				<span id="configdescErr"></span></td>
		</tr>

		<tr>
			<td valign="top"> Type </td>
			<td><select name="configtype" id="configtype" class="form-control">
			<?php foreach($type_arr as $kkey=>$vval){ $sel = ($kkey==@$rowEdit->configtype) ? "selected":"";?>
                <option value="<?php echo $kkey;?>" <?php echo $sel;?> ><?php echo $vval;?></option>
				<?php } ?>				
			    </select>
			    </td>
		</tr>

		<tr class="text_textarea">
	<td valign="top"> Configuration Value (Text/Textarea/Functions/Option/CheckBox)</td>
			<td><textarea name="configvalue" id="configvalue" rows="4" cols="50" onkeyup="checkEmpty('configvalue','configvalueErr');" class="form-control"><?php if(!is_null($rowEdit)){if( @$rowEdit->configtype!='file' and $rowEdit->configtype!='image'){ echo @$rowEdit->configvalue;}}?></textarea>
				<span id="configvalueErr"></span></td>
		</tr>

		<tr class="image_file" style="">
			<td valign="top">Configuration Value (Image/File)</td>
			<td><input type="file" name="configvalue_file" id="configvalue_file">
			<small>File or Image will be uploaded in <?php echo base_url('uploads/config/');?> Location.</small>
<?php       if(!empty($aid) and $rowEdit->configtype=='image'){
            	?>
            	<a href="<?php echo base_url('uploads/config/'.$rowEdit->configvalue);?>">
            	<img src="<?php echo base_url('uploads/config/'.$rowEdit->configvalue);?>" width="80"></a>
            	<?php
            }else if(!empty($aid) and $rowEdit->configtype=='file'){
            	?>
            	<a href="<?php echo base_url('uploads/config/'.$rowEdit->configvalue);?>">
            	<?php echo $rowEdit->configvalue;?></a>
            	<?php
            }else{}
		?>

			</td>
		</tr>



		<tr>
			<td>&nbsp;</td><td><input type="submit" name="submitBtn" id="submitBtn" class="btn btn-primary" value="Save"  />
				<input type="button" name="cancelBtn" class="btn btn-primary" value="Cancel" onclick="window.location.href='configurationpage-<?php echo $module;?>'"  /></td>
		</tr>

	</table>
</form>
</div>
    </div>
  </div>
</div>