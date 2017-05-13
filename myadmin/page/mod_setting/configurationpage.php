<?php
include("page/setAndCheckAll.php");
include("page/sortingAndSearch.php");
$sortBy  =     (@$_POST['sortBy']=="ASC")?"DESC":"ASC";
$pages = $funSettingObj -> configurationPage($module,$contentPage,$sortField,$sortBy,$searchQu);
?>
<div class="page-header">
			
			<div class="row">
				<!-- Page header, center on small screens -->
				<h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-tasks page-header-icon"></i>&nbsp;&nbsp;Manage Configuration</h1>

				<div class="col-xs-12 col-sm-8">
					<div class="row">
						<hr class="visible-xs no-grid-gutter-h">
						<!-- "Create project" button, width=auto on desktops -->
						<div class="pull-right col-xs-12 col-sm-auto"><a style="width: 100%;" class="btn btn-primary btn-labeled" href="form_config-<?php echo $module; ?>"><span class="btn-label icon fa fa-plus"></span>Add</a></div>

					</div>
				</div>
			</div>
		</div><!--page-header-->



<div class="row"><div class="col-sm-12"><div class="panel"><div class="panel-body">
<div class="table-primary">
<table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="table_configuration" width="100%">
	
  <?php if($pages[0]>0){?>
       <thead>
         <tr>
		<th>S.N</th> 	
		<th>CONFIGURATION NAME</th>		
		<th>CONFIGURATION DESCRIPTION</th>
		<th>CONFIGURATION VALUE</th>
		<th>STATUS</th>
		<th>ACTION</th>
		</tr>
		</thead>
		<tbody>
		<?php $altCol=0;
		      $resultExec  =  $funSettingObj ->exec($pages[1]);
			  while($rows  =  $funSettingObj ->fetch_array($resultExec))
				{ 
		   ?>
	    <tr <?php echo (($altCol%2)>0)?"class='even'":"class='odd'";?>>
		<td><?php echo $altCol;?></td>	
		<td><?php echo $rows["configname"];?></td>	
		<td><?php $content = $rows["configdesc"];echo $funSettingObj->subString($content,50);?></td>		
		<td><?php $configvalue =  $rows["configvalue"];
		          $configtype =  $rows["configtype"];
            if($configtype=='image'){
            	?>
            	<a href="<?php echo base_url('uploads/config/'.$configvalue);?>">
            	<img src="<?php echo base_url('uploads/config/'.$configvalue);?>" width="80"></a>
            	<?php
            }else if($configtype=='file'){
            	?>
            	<a href="<?php echo base_url('uploads/config/'.$configvalue);?>">
            	<?php echo $configvalue;?></a>
            	<?php
            }else if($configtype=='link'){
            	?>
            	<a href="<?php echo $configvalue;?>">
            	<?php echo $configvalue;?></a>
            	<?php
            }else{
                 echo $configvalue;
            }
		?></td>
		<td><?=($rows["status"]==1)?"Active":"Inactive";?></td>
		<td align="center"><a href="view_config-<?php echo $module; ?>-<?php echo encode($rows["id"]);?>"  title="View"><span class="glyphicon glyphicon-eye-open"></span></a>
		<a href="form_config-<?php echo $module; ?>-<?php echo encode($rows["id"]);?>" title="Edit"><span class="glyphicon glyphicon-pencil"></span></a>
		<a style="display:none;" href="page/mod_setting/actConfigurationpage.php?aid=<?php echo encode($rows["id"]);?>&action=delete" onclick="return confirm('Are you sure you want to delete this row!!');" title="Delete"><span class="glyphicon glyphicon-trash"></span></a></td>	
	</tr>
	<?php $altCol++;}//while close 		 
		   }?>
		</tbody>   
</table>
</div></div></div></div></div>
<script type="text/javascript" charset="utf-8" id="init-code">
		$(document).ready(function() {				
				var oTable =  $('#table_configuration').dataTable( {
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
				oTable.fnSetColumnVis( 0,false );
								
		$('.tool_tip').tooltip({animation:true,placement:'right'});
			});
</script>