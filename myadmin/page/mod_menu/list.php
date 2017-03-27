<?php
$result  =  $funMenuObj->dataList();
$num =  $db->num_rows($result);
?>
<div class="page-header">
			
			<div class="row">
				<!-- Page header, center on small screens -->
				<h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-tasks page-header-icon"></i>&nbsp;&nbsp;Menu Menu</h1>

				<div class="col-xs-12 col-sm-8">
					<div class="row">
						<hr class="visible-xs no-grid-gutter-h">
						<!-- "Create project" button, width=auto on desktops -->
						<div class="pull-right col-xs-12 col-sm-auto"><a style="width: 100%;" class="btn btn-primary btn-labeled" href="form-<?php echo $module; ?>"><span class="btn-label icon fa fa-plus"></span>Add</a></div>

					</div>
				</div>
			</div>
		</div><!--page-header-->



<div class="row"><div class="col-sm-12"><div class="panel"><div class="panel-body">
<div class="table-primary">
<table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="example" width="100%">
	<thead>
		<tr>
			<th width="5%">S.N</th>
			<th width="15%">Menu Type</th>
  			<th width="8%">Name</th>
   			<th width="15%">Parent</th>
   			<th width="12%">link Type</th>
   			<th width="15%">Menu Link</th>
   			
            <th width="8%">Status</th>
			<th width="12%">Action</th>
		</tr>
	</thead>
    <tbody>
	<?php if($num>0){
		   $sn=1;
		   while($row  =  $db->result($result)){
		 ?>
		<tr>
			<td><?=$sn?></td>
			<td><?=$row->menu_type_name?></th>
   			<td><?=$row->name?></td>
			<td><?php $parent_id  = $row->parent_id;
			if(empty($parent_id)) echo "Self";
			else{
			echo $funMenuObj->find_name_by_id($parent_id);	
			}
			?></td>
  			<td><?=$row->link_type?></td>
  			<td><?=$row->menu_link?></td>
  			

			<td><span class="cp" id="statusChange<?php echo $row->id; ?>" onclick="changeStatus('<?php echo $row->id; ?>');"  ><?=($row->status==1)?"Published":"Un-published";?></span></td>
			<td><a href="form-menu-<?=encode($row->id)?>" title="Edit" class="tool_tip"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;&nbsp;<a href="<?php echo base_url("myadmin/page/mod_menu/act_thismodule.php?aid=".encode($row->id).'&action=delete'); ?>" class="tool_tip" title="Delete" onclick="return confirm('Are you sure you want to delete?');"><span class="glyphicon glyphicon-remove"></span></a></td>
		</tr>
        <?php $sn++;}} ?>
	</tbody>
	
</table>
</div></div></div></div></div>
<script type="text/javascript" charset="utf-8" id="init-code">
		$(document).ready(function() {
			$('#example').dataTable({
				"sPaginationType": "full_numbers"
				});
			$('.tool_tip').tooltip({animation:true,placement:'right'});
			});
			function changeStatus(id)
			{  
				$.post(admin_url+'page/mod_menu/ajax.php',{id:id,mode:'change_status'},                    function(data){
					  $("#statusChange"+id).text(data);
					  $('#message').show('slow')
						   .addClass('alert alert-success alert-dark')
						   .html('<button class="close" type="button" data-dismiss="alert">×</button>Status has been changed!')
						   .delay(3000)
						   .fadeOut('slow');
					});
			}
</script>