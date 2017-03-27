<?php
include("page/setAndCheckAll.php");
$id  =   isset($_REQUEST['aid'])?decode($_REQUEST['aid']):0;
if(!empty($id)){$view = $_GET['action'] = 'view'; }
if($view  == 'view')
{$rowEdit =  $funUserObj->userListSel($id);			
?>
<div class="row">
	<div class="col-sm-12">
		<div class="panel">
		
<div class="panel-heading"> 		
	<table width="100%" border="0" cellpadding="1" cellspacing="1" class="" >
		<tr >
			<td><span class="panel-title">Details [ <?php echo ucwords($rowEdit->fullname); ?> ]</span>
				<div style="text-align:left;float:right;">
					<?php if($_SESSION[ENCR_KEY."pathsaleLoginId"]==1 or $_SESSION[ENCR_KEY."pathsaleLoginId"]==$id){ ?>
					<a href="javascript:void(0);" onclick=" javascript:openpopup('page/mod_<?php echo $module; ?>/userModificationHistory.php?aid=<?php echo $id; ?>');" target="_blank" class="btn" >View Modification History</a>  <a href="javascript:void(0);" data-toggle="modal" data-target="#change_password_model" data-id="user_<?php echo $id;?>" onclick="add_user_id(this);" class="btn">Change Password</a>
				  <a href="form-<?php echo $module; ?>-<?php echo encode($id); ?>" class="btn">Edit</a> 
					<?php } ?>
				
				<div style="clear:both;"></div></td>
		</tr>
	</table>
</div>
<div class="panel-body">	
	<table width="100%" border="0" cellpadding="1" cellspacing="1" class="table table-bordered">
		<tr >
			<td class="evenrowfirst" valign="top">Current Image</td>
			<td class="evenrowsecond"><?php 
	   $img  =  $rowEdit->image;
							 		  
     if(file_exists("../images/user_image/".$img)  and !empty($img))
	 {
	
	$userImage  = "<img src='../images/user_image/$img' width='100'  border='0' >";	 
	 ?>
				<a href="../images/user_image/<?php echo $img; ?>" rel="lytebox[user_image]" title="<?php echo $rows["bannername"]; ?>"> <?php echo $userImage; ?> </a>
				<?php
	 }
	  ?></td>
		</tr>
		<tr >
			<td class="oddrowfirst">First Name</td>
			<td class="oddrowsecond"><?php $fullname  =  explode(" ",$rowEdit->fullname);
	echo $fullname[0]; ?></td>
		</tr>
		<?php if(count($fullname)>2){ ?>
		
			<td class="oddrowfirst">Middle Name</td>
			<td class="oddrowsecond"><?php echo $fullname[1];	?></td>
		</tr>
		
			<td class="oddrowfirst">Last Name</td>
			<td class="oddrowsecond"><?php echo $fullname[2];	?></td>
		</tr>
		<?php } else { ?>
		
			<td class="oddrowfirst">Last Name</td>
			<td class="oddrowsecond"><?php echo $fullname[1];	?></td>
		</tr>
		<?php } ?>
		<tr >
			<td class="evenrowfirst">Username</td>
			<td class="evenrowsecond"><?php echo $rowEdit->username; ?></td>
		</tr>
		<tr >
			<td valign="top" class="oddrowfirst">Group</td>
			<td class="oddrowsecond"><?php $rowgroup =  $funUserObj->userGroupType($rowEdit->group_type);
	echo $rowgroup->group_name;
	?></td>
		</tr>
		<tr >
			<td valign="top" class="oddrowfirst">Designation</td>
			<td class="oddrowsecond"><?php echo $rowEdit->designation; ?></td>
		</tr>
		<tr >
			<td valign="top" class="oddrowfirst">Make Login</td>
			<td class="oddrowsecond"><?php echo ($rowEdit->make_login==1)?"Yes":"No"; ?></td>
		</tr>
		<tr >
			<td class="evenrowfirst">Status</td>
			<td class="evenrowsecond"><?php echo ($rowEdit->status==1)?"Active":"Inactive"; ?></td>
		</tr>
		<tr >
			<td valign="top" class="oddrowfirst">Temporary Address</td>
			<td class="oddrowsecond"><?php echo $rowEdit->temporary_address; ?></td>
		</tr>
		<tr >
			<td class="evenrowfirst">Permanent Address</td>
			<td class="evenrowsecond"><?php echo $rowEdit->permanent_address; ?></td>
		</tr>
		<tr >
			<td class="evenrowfirst">Gender</td>
			<td class="evenrowsecond"><?php echo ucwords($rowEdit->gender); ?></td>
		</tr>
		<tr >
			<td valign="top" class="oddrowfirst">Phone</td>
			<td class="oddrowsecond"><?php echo !empty($rowEdit->telephone1)? $rowEdit->telephone1:"None"; ?></td>
		</tr>
		<tr >
			<td valign="top" class="oddrowfirst">Mobile</td>
			<td class="oddrowsecond"><?php echo !empty($rowEdit->mobile1)? $rowEdit->mobile1:"None"; ?></td>
		</tr>
		<tr >
			<td valign="top" class="oddrowfirst">Email</td>
			<td class="oddrowsecond"><?php echo !empty($rowEdit->email1)? $rowEdit->email1:"None"; ?></td>
		</tr>
		<tr >
			<td class="evenrowfirst">Added Date</td>
			<td class="evenrowsecond"><?php echo !empty($rowEdit->added_date)? $rowEdit->added_date:"None"; ?></td>
		</tr>
		<tr >
			<td class="evenrowfirst">Modified Date</td>
			<td class="evenrowsecond"><?php echo !empty($rowEdit->modified_date )? $rowEdit->modified_date :"None"; ?></td>
		</tr>
	</table>
</div>
		</div>
	</div>
</div>
<?php	} ?>

<?php ob_start();?>
<script>
function add_user_id(obj)
{
	var id  = $(obj).data('id');	
	id_arr =  id.split("_");
	$('#user_id').val(id_arr[1]);
}	
var addEditForm = $('#model_form');	
$(function(){
	    addEditForm.validate();
		addEditForm.ajaxForm({ dataType: 'json',
							   beforeSubmit:  showRequest,
							   type:'post',
							   data: { 'mode': 'change_password' },		                              
							   target: '#change_password_model',
							   success:showResponse
							   });//ajaxForm	
});
// pre-submit callback
function showRequest(formData, jqForm, options) {
    var queryString = $.param(formData);
    //alert('About to submit: \n\n' + queryString);
    return true;
}

// post-submit callback
function showResponse(data,statusText, xhr,jqForm)  {
	if (! $.isPlainObject(data) || $.isEmptyObject(data))
			return;
    if(data.result=='true'){
	  $.sticky(data.message, {autoclose : 5000, position: "top-right", type: "st-success" });	
	}else{
	  $.sticky(data.message, {autoclose : 5000, position: "top-right", type: "st-error" });	
	}
	jqForm.resetForm();
}	
	
function checkForm(){
   if(addEditForm.valid()==true){	    
	 return true; 
   }
}
</script>
<?php
$content_footer[] = ob_get_clean();
?>


<!-- Modal -->
<div id="change_password_model" class="modal fade wpcf7" tabindex="-1" role="dialog" style="display: none;">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="wizard ui-wizard-example">						
						<div class="wizard-content">
							<form class="panel form-horizontal frm-vehicle-info" action="<?php echo base_url('myadmin/page/mod_user/ajax.php');?>" method="post" name="model_form" id="model_form" onsubmit="return checkForm();">
							<input type="hidden" name="user_id" id="user_id" value="" />
								<div class="panel-heading">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
									<span class="panel-title">Change Password</span>
								</div>
								<div class="panel-body">
									<div class="row form-group">
										<label class="col-sm-4 control-label">New Password:</label>
										<div class="col-sm-8">
											<input type="password" class="form-control required" name="new_password" id="new_password" >
										</div>
									</div>
									<div class="row form-group">
										<label class="col-sm-4 control-label">Confirm Password:</label>
										<div class="col-sm-8">
											<input type="password" class="form-control required" name="conpassword" id="conpassword" equalTo="#new_password">
										</div>
									</div>
									
									
									<div class="wpcf7-response-output"></div>																	
								</div>
								<div class="panel-footer text-right">
									<button class="btn btn-primary" name="SaveBtn" id="SaveBtn">Save</button>
								</div>
							</form>
						</div> <!-- / .wizard-content -->
					</div> <!-- / .wizard -->
				</div> <!-- / .modal-content -->
			</div> <!-- / .modal-dialog -->
		</div> 
<!-- /.modal -->
