<?php
include("page/setAndCheckAll.php");
include("page/sortingAndSearch.php");
$branch_id        =  $funUserObj->current_branch();
if(isset($_POST['post_branch_id'])){
    $_SESSION['cust_post_branch_id'] =  $_POST['post_branch_id'];
}
$_SESSION['cust_post_branch_id'] =  isset($_SESSION['cust_post_branch_id'])?$_SESSION['cust_post_branch_id']:'';
$pages   =        $funCustomerObj -> customerList($module,$contentPage,$sortField,$sortBy,$searchQu);
?>
<div class="page-header">
<div class="row">
				<!-- Page header, center on small screens -->
				<h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-tasks page-header-icon"></i>&nbsp;&nbsp;Manage Customer</h1>

				<div class="col-xs-12 col-sm-8">
					<div class="row">
						<hr class="visible-xs no-grid-gutter-h">
						<!-- "Create project" button, width=auto on desktops -->
						<div class="pull-right col-xs-12 col-sm-auto"><a style="width: 100%;" class="btn btn-primary btn-labeled" href="form-<?php echo $module; ?>"><span class="btn-label icon fa fa-plus"></span>Add</a>
						</div>

					</div>
				</div>
			</div>
</div><!--page-header-->
<div class="row"><div class="col-sm-12"><div class="panel"><div class="panel-body">
<div class="table-primary">
<?php 
if($_SESSION[ENCR_KEY.'level']==1){
$branchList =  $funBranchObj->allBranchList();?>
<select name="branch_id" id="branch_id"  onchange="list_branch_user(this.value);" class="form-control"  >
<option value="">All Customer</option>
<?php $num_the  = $db->num_rows($branchList);
if($num_the>0){
	while($row_the  =  $db->result($branchList)){
 ?>
 <option value="<?=$row_the->id?>" <?php echo ($_SESSION['cust_post_branch_id']==$row_the->id)?"selected":""?> ><?=$row_the->branch_name?></option>
 <?php }}?>
</select>   
<?php } ?> 

<table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="table_module_display" width="100%">
	
  <?php if($pages[0]>0){?>
       <thead>
         <tr>
		<th>S.N</th> 
		<?php if($_SESSION[ENCR_KEY.'level']==1){?><th>BRANCH</th><?php }?>
		<th>NAME</th>
		<th>DETAILS</th>
		<th>ADDRESS</th>
		<th>VEHICLE</th>	
		<th>SERVICES</th>	    
		<th>STATUS</th>
		<th>ACTION</th>
		</tr>
		</thead>
		<tbody>
		<?php $altCol=1;
		      $resultExec  =  $db->exec($pages[1]);
			  while($rows  =  $db->fetch_array($resultExec))
				{ 
		   ?>
	    <tr <?php echo (($altCol%2)>0)?"class='even'":"class='odd'";?>>
		<td><?php echo $altCol;?></td>	
		<?php if($_SESSION[ENCR_KEY.'level']==1){?><td><?php echo $rows['branch_name']?></td><?php }?>
		<td><a href="view-<?php echo $module; ?>-<?=encode($rows["id"])?>"><?php echo ucwords($rows["first_name"]." ".$rows["middle_name"]." ".$rows["last_name"]);?></a></td>
		<td><i class="fa fa-phone"></i>&nbsp;<?php echo $rows["phone_no"];?><br />
		<i class="fa fa-mobile"></i>&nbsp;<?php echo $rows["mobile_no"];?><br />
		<i class="fa fa-envelope"></i>&nbsp;<?php echo $rows["email"];?></td>
		<td><?php echo $rows["address"];?></td>
		<td>
			<?php $vehicleRec = $funCustomerObj->get_customer_vehicle($rows["id"]);
			if($vehicleRec){ $num_ve =  $db->num_rows($vehicleRec);if($num_ve>0){while($rowVe = $db->result($vehicleRec)){
			   echo $rowVe->vehicle_name.'( '.$rowVe->vehicle_no.')<br>';}}else{echo 'N/A<br />';}} ?>
			<a href="javascript:void(0);" data-toggle="modal" data-target="#add_vehicle_model" data-id="customer_<?php echo $rows['id'];?>" onclick="add_customer_id(this);">Add Vehicle</a>			
			
		</td>
		<td><a href="view-<?php echo $module; ?>-<?=encode($rows["id"])?>">View Past Services</a><br /><a href="forms-transaction-<?=encode($rows["id"])?>">Add Services</a></td>
		<td><span class="cp" id="statusChange<?php echo $rows["id"]; ?>" onclick="changeStatus('<?php echo $rows["id"]; ?>');" ><?=($rows['status']==1)?"Active":"Inactive";?></span></td>
		<td align="center"><a href="view-<?php echo $module; ?>-<?=encode($rows["id"])?>"  title="View"><span class="glyphicon glyphicon-eye-open"></span></a>
        <?php if($_SESSION[ENCR_KEY.'level']==1 or $branch_id==$rows["branch_id"]){ ?>
		<a href="form-<?php echo $module; ?>-<?=encode($rows["id"])?>" title="Edit"><span class="glyphicon glyphicon-pencil"></span></a>
		<a href="page/mod_<?php echo $module; ?>/act_customer.php?aid=<?php echo encode($rows["id"]);?>&action=delete" onclick="return confirm('Are you sure you want to delete this row!!');" title="Delete"><span class="glyphicon glyphicon-trash"></span></a><?php } ?></td>	
	</tr>
	<?php $altCol++;}//while close 		 
		   }else{
			echo '<tr><td>No record found!</td></tr>';   
		   }?>
		</tbody>   
</table>
<form id="refereshForm" name="refereshForm" action="<?php echo base_url('myadmin/list-customer')?>" method="post">
<input type="hidden" name="post_branch_id" id="post_branch_id" value="" />
</form>
<script type="text/javascript" charset="utf-8" id="init-code">
    $(function(){ $(".frm-vehicle-info").validate();
    });
	
	function list_branch_user(v)
	{
		$('#post_branch_id').val(v);
		$('#refereshForm').submit();
		
	}
	
	function changeStatus(id)
	{  
		$.post(admin_url+'page/mod_<?php echo $module; ?>/ajax.php',{id:id,mode:'change_status'},
		                    function(data){
			  $("#statusChange"+id).text(data);
			  $('#message').show('slow')
						   .addClass('alert alert-success alert-dark')
						   .html('<button class="close" type="button" data-dismiss="alert">×</button>Status has been changed!')
						   .delay(3000)
						   .fadeOut('slow');
			});
	}

		$(document).ready(function() {				
				var oTable =  $('#table_module_display').dataTable( {
					"sPaginationType": "full_numbers",
					"bFilter": true,
					"bLengthChange": true,
					"iDisplayLength": 10
					,"fnDrawCallback": function (oSettings) {
							  var pgr = $(oSettings.nTableWrapper).find('.dataTables_paginate')
							  if (oSettings._iDisplayLength > oSettings.fnRecordsDisplay()) {
								pgr.hide();
							  } else {
								pgr.show()
							  }
	/* auto change settings if it has fewer than iDisplayLength rows */
        var oListSettings = this.fnSettings();
        var wrapper = this.parent();         
        if (oListSettings.fnRecordsTotal() < 25) {
            //$('.dataTables_paginate', wrapper).hide();
            //$('.dataTables_filter', wrapper).hide();
            $('.dataTables_info', wrapper).hide();
            //$('.dataTables_length', wrapper).hide();
        }						  
							  
							}
				});
				//oTable.fnSetColumnVis( 0,false );
								
		$('.tool_tip').tooltip({animation:true,placement:'right'});
			});			
</script>
<?php ob_start();?>
<script>
function add_customer_id(obj)
{
	var id  = $(obj).data('id');	
	id_arr =  id.split("_");
	$('#customer_id').val(id_arr[1]);
}	
var addEditForm = $('#model_form');	
$(function(){
	    addEditForm.validate();
		addEditForm.ajaxForm({ dataType: 'json',
							   beforeSubmit:  showRequest,
							   type:'post',
							   data: { 'mode': 'add_vehicle' },		                              
							   target: '#add_vehicle_model',
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
</div></div></div></div></div>


<!-- Modal -->
<div id="add_vehicle_model" class="modal fade wpcf7" tabindex="-1" role="dialog" style="display: none;">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="wizard ui-wizard-example">						
						<div class="wizard-content">
							<form class="panel form-horizontal frm-vehicle-info" action="<?php echo base_url('myadmin/page/mod_customer/ajax.php');?>" method="post" name="model_form" id="model_form" onsubmit="return checkForm();">
							<input type="hidden" name="customer_id" id="customer_id" value="" />
								<div class="panel-heading">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
									<span class="panel-title">Add New Vehicle</span>
								</div>
								<div class="panel-body">
									<div class="row form-group">
										<label class="col-sm-4 control-label">Brand:</label>
										<div class="col-sm-8">
											<input type="text" class="form-control required" name="vehicle_brand" id="vehicle_brand">
										</div>
									</div>
									<div class="row form-group">
										<label class="col-sm-4 control-label">Name:</label>
										<div class="col-sm-8">
											<input type="text" class="form-control required" name="vehicle_name" id="vehicle_name">
										</div>
									</div>
									<div class="row form-group">
										<label class="col-sm-4 control-label">Vehicle identity no:</label>
										<div class="col-sm-8">
											<input type="text" class="form-control required" name="vehicle_no" id="vehicle_no">
										</div>
									</div>
									<div class="row form-group">
										<label class="col-sm-4 control-label">Type:</label>
										<div class="col-sm-8">
											<select class="form-control" name="vehicle_type_id" id="vehicle_type_id">
											<?php $vehicleType = $funCustomerObj->get_vehicle_type();
											while($rows  =  $db->fetch_array($vehicleType))
											{
												echo '<option value="'.$rows['id'].'">'.$rows['title'].'</option>';
											}?>											
											</select>
										</div>
									</div>	
									
									<div class="wpcf7-response-output"></div>																	
								</div>
								<div class="panel-footer text-right">
									<button class="btn btn-primary" name="submit_btn" id="submit_btn">Save</button>
								</div>
							</form>
						</div> <!-- / .wizard-content -->
					</div> <!-- / .wizard -->
				</div> <!-- / .modal-content -->
			</div> <!-- / .modal-dialog -->
		</div> 
<!-- /.modal -->