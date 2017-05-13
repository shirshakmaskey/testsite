<div class="row">
	<div class="col-sm-12">
		
<?php
include("page/setAndCheckAll.php");
$id  =   isset($_REQUEST['aid'])?decode($_REQUEST['aid']):0;
if(!empty($id)){$view = $_GET['action'] = 'view'; }
if($view  == 'view')
{$rowEdit =  $funMemberObj->customerSel($id);
?>
<div class="panel">
<div class="panel-heading"> <span class="panel-title">Details [ <?php echo ucwords($rowEdit->first_name); ?> ]</span> 
<a href="list-<?php echo $module; ?>" class="btn btn-primary btn-labeled pull-right ">Back</a>
</div>
<div class="panel-body">
    
    <div class="form-group">
						<label class="col-sm-2 control-label" for="title">Fullname</label>
						<div class="col-sm-4">
							<?php echo ucwords($rowEdit->first_name." ".$rowEdit->last_name); ?>
							 </div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label" for="title">Phone No.</label>
						<div class="col-sm-4"><?php echo $rowEdit->phone_no; ?></div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label" for="title">Mobile No.</label>
						<div class="col-sm-4"><?php echo $rowEdit->mobile_no; ?></div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label" for="title">Email</label>
						<div class="col-sm-4">
							<?php echo $rowEdit->email; ?>
							 </div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label" for="title">Country</label>
						<div class="col-sm-4">
							<?php $country_id  =  $rowEdit->country;
							$row_count   =  $db->CountrySel($country_id); 
							echo $row_count->Country;?>
							 </div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label" for="title">Address</label>
						<div class="col-sm-4">
							<?php echo $rowEdit->address; ?>
							 </div>
					</div>

					

					
					<?php 
        $img   =  $rowEdit->image;
       if(file_exists(FCPATH.'uploads/images/customer/'.$img) and !empty($img)){?>
		<div class="form-group">
			<label class="col-sm-2 control-label" for="image">Current Image.</label>
			<div class="col-sm-4">
				 <img src="<?php echo base_url('uploads/images/customer/'.$img);?>" width="120">
			</div>							
		</div>
	<?php }?>

	

					<div class="form-group">
						<label class="col-sm-2 control-label" for="title">Date of Last Log on </label>
						<div class="col-sm-4">
							<?php echo date("F d,Y H:i:s",strtotime($rowEdit->date_of_last_logon)); ?>
							 </div>
					</div>

					
					
					
					
					<div class="form-group">
						<label class="col-sm-2 control-label" for="title">Status</label>
						<div class="col-sm-4">
							<?php echo $rowEdit->status==1 ? "Active":"Inactive"; ?>
							 </div>
					</div>
					
					

</div><!--panel body-->
</div><!--panel close-->
		
		

<?php } ?>		
		
		
		
		
	</div>
</div>
