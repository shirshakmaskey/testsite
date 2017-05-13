<div class="row">
	<div class="col-sm-12">
		
<?php
include("page/setAndCheckAll.php");
$id  =   isset($_REQUEST['aid'])?decode($_REQUEST['aid']):0;
if(!empty($id)){$view = $_GET['action'] = 'view'; }
if($view  == 'view')
{$rowEdit =  $funCustomerObj->customerSel($id);
?>
<div class="panel">
<div class="panel-heading"> <span class="panel-title">Details [ <?php echo ucwords($rowEdit->first_name); ?> ]</span> </div>
<div class="panel-body">
    
    <div class="form-group">
						<label class="col-sm-2 control-label" for="title">Fullname</label>
						<div class="col-sm-4">
							<?php echo ucwords($rowEdit->first_name." ".$rowEdit->middle_name." ".$rowEdit->last_name); ?>
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
						<label class="col-sm-2 control-label" for="title">Address</label>
						<div class="col-sm-4">
							<?php echo $rowEdit->address; ?>
							 </div>
					</div>
					
					
					
					<div class="form-group">
						<label class="col-sm-2 control-label" for="title">Status</label>
						<div class="col-sm-4">
							<?php echo $rowEdit->status==1 ? "Active":"Inactive"; ?>
							 </div>
					</div>
					
					<div style="margin-bottom: 0;" class="form-group">
						<div class="col-sm-4">
                        <?php 
						$branch_id        =  $funUserObj->current_branch();
						if($_SESSION[ENCR_KEY.'level']==1 or $branch_id==$rowEdit->branch_id){ ?>
							<button  type="button" name="editBtn" class="btn btn-primary" onclick="window.location.href='add_edit_package_price-<?php echo $module; ?>-<?php echo encode($id);?>'">Edit</button><?php } ?>
							<button  type="button" name="backBtn" class="btn btn-primary" onclick="window.location.href='<?php echo $_SERVER['HTTP_REFERER'];?>'">Back</button>
						</div>
					</div>

</div><!--panel body-->
</div><!--panel close-->
		
		
		<!--Next Panel-->
		<div class="panel">
<div class="panel-heading"><span class="panel-title">Transaction Details</span></div>
<div class="panel-body">
  <?php $result_transaction  =  $funTranObj->customer($id);
        $num_transaction = $db->num_rows($result_transaction);
		?>
		<table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="table_module_display" width="100%">
	
       <thead>
         <tr>
		<th>S.N</th> 	
		<th>INVOICE NO/DATE</th>
		<th>VEHICLE TYPE</th>		
		<th>GRAND TOTAL</th>
		<th>PAYMENT DETAIL</th>
		<th>STATUS</th>
		<th>ACTION</th>
		</tr>
		</thead>
  
		<tbody>
		<?php 
		if($num_transaction>0){ 
		 $altCol=1;
		 while($row_transaction  =  $db->result($result_transaction)){ ?>
	    <tr <?php echo (($altCol%2)>0)?"class='even'":"class='odd'";?>>
		<td><?php echo $altCol;?></td>	
		<td><a href="view-transaction-<?=encode($row_transaction->id)?>"  title="View"><?php echo $row_transaction->invoice_no?><br /><?php echo date("F d,Y",strtotime($row_transaction->transaction_date));?></a></td>
		<td>
		<?php echo $row_transaction->vehicle_name."( ".$row_transaction->vehicle_no.")";?><br />
		Size :<?php echo $row_transaction->cv_veh_title;?>
		</td>
		<td><?php echo $row_transaction->grand_total;?></td>
		<td><?php if($row_transaction->payment_method!=''){
			 echo 'payment Method :'.$row_transaction->payment_method;
			 echo '<br> Transaction Code : '.$row_transaction->payment_transaction_id;
		}else{
		     echo 'No Payment';	
		}?></td>
		<td><?php echo ucwords($row_transaction->status);?></td>
		<td><a href="view-transaction-<?=encode($row_transaction->id)?>"  title="View"><span class="glyphicon glyphicon-eye-open"></span></a>
		<a href="form-transaction-<?=encode($row_transaction->id)?>" title="Edit"><span class="glyphicon glyphicon-pencil"></span></a>
		<a href="page/mod_transaction/act_transaction.php?aid=<?php echo encode($row_transaction->id);?>&action=delete" onclick="return confirm('Are you sure you want to delete this row!!');" title="Delete"><span class="glyphicon glyphicon-trash"></span></a></td>
	</tr>
	<?php $altCol++;}//while close 
	       }else{
			echo '<tr><td colspan="4">No record found!</td></tr>';   
		   }?>
		</tbody>   
</table>

</div><!--panel body-->
</div><!--panel close-->
<?php } ?>		
		
		
		
		
	</div>
</div>
