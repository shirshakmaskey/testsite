<?php
include("page/setAndCheckAll.php");
include("page/sortingAndSearch.php");

$pages   =        $funMemberObj -> customerList($module,$contentPage,$sortField,$sortBy,$searchQu);
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

<table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="table_module_display" width="100%">
	
  <?php if($pages[0]>0){?>
       <thead>
         <tr>
		<th>S.N</th> 		
		<th>USER DETAILS</th>
		<th>IMAGE</th>
		<th>STATUS</th>
		<th>ORDER</th>
		<th>ACTION</th>
		</tr>
		</thead>
		<tbody>
		<?php $altCol=1;
		      $resultExec  =  $db->exec($pages[1]);
			  while($rows  =  $db->fetch_array($resultExec))
				{ //pr($rows);
		   ?>
	    <tr <?php echo (($altCol%2)>0)?"class='even'":"class='odd'";?>>
		<td><?php echo $altCol;?></td>	
		
		<td><a href="view-<?php echo $module; ?>-<?=encode($rows["id"])?>"><?php echo ucwords($rows["first_name"]." ".$rows["last_name"]);?></a><br>
		<i class="fa fa-phone"></i>&nbsp;<?php echo $rows["phone_no"];?><br />
		<i class="fa fa-mobile"></i>&nbsp;<?php echo $rows["mobile_no"];?><br />
		<i class="fa fa-envelope"></i>&nbsp;<?php echo $rows["email"];?><br>
		<?php echo $rows["address"];?>
		</td>
		<td><?php 
          $image =  ($rows["image"]); 
          if(file_exists(FCPATH.'uploads/images/customer/'.$image) and !empty($image)){
  echo "<a href='".base_url('uploads/images/customer/'.$image)."' target='_blank'><img src='".base_url('uploads/images/customer/'.$image)."' width='100'></a>";
          }
        ?></td>
        
       
		
		<td><span class="cp" id="statusChange<?php echo $rows["id"]; ?>" onclick="changeStatus('<?php echo $rows["id"]; ?>');" ><?=($rows['status']==1)?"Active":"Inactive";?></span></td>
      <td>
      <a href="order-member-<?php echo $rows['id']; ?>"><i class="fa fa-image fa-3x"></i></a></td>
		<td align="center"><a href="view-<?php echo $module; ?>-<?php echo encode($rows["id"]); ?>"  title="View"><span class="glyphicon glyphicon-eye-open"></span></a>
		
		<a href="form-<?php echo $module; ?>-<?php echo encode($rows["id"]);?>" title="Edit"><span class="glyphicon glyphicon-pencil"></span></a>
		
		
		<a href="page/mod_<?php echo $module; ?>/act_customer.php?aid=<?php echo encode($rows["id"]);?>&action=delete" onclick="return confirm('Are you sure you want to delete this row!!');" title="Delete"><span class="glyphicon glyphicon-trash"></span></a>
		
		</td>
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

	function makeVerified(id)
			{  
				$.post(admin_url+'page/mod_<?php echo $module; ?>/ajax.php',{id:id,mode:'makeVerified'},                    function(data){
					  $("#makeVerified"+id).text(data);
					  $('#message').show('slow')
						   .addClass('alert alert-success alert-dark')
						   .html('<button class="close" type="button" data-dismiss="alert">×</button>Status has been changed!')
						   .delay(3000)
						   .fadeOut('slow');
					});
			}

	function makeFeature(id)
			{  
				$.post(admin_url+'page/mod_<?php echo $module; ?>/ajax.php',{id:id,mode:'makeFeature'},                    function(data){
					  $("#makeFeature"+id).text(data);
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

</div></div></div></div></div>