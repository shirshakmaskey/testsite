<?php
include("page/setAndCheckAll.php");
include("page/sortingAndSearch.php");
$pages = $funNewsObj -> newsList($module,$contentPage,$sortField,$sortBy,$searchQu);
if(!file_exists(FCPATH.'uploads/images/news/')){
  mkdir(FCPATH.'uploads/images/news');
}
?>


<div class="page-header">
			
			<div class="row">
				<!-- Page header, center on small screens -->
				<h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-tasks page-header-icon"></i>&nbsp;&nbsp;Manage News</h1>

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
<table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="example" width="100%">
	
  <?php if($pages[0]>0){?>
       <thead>
         <tr>	
		<th>NEWS TITLE</th>		
		<th>ADDED DATE</th>
		<th>STATUS</th>
		<th>ACTION</th>
		</tr>
		</thead>
		<tbody>
		<?php $altCol=0;
		      $resultExec  =  $funObj ->exec($pages[1]);
			  while($rows  =  $funObj ->fetch_array($resultExec))
				{ 
		   ?>
	<tr <?php echo (($altCol%2)>0)?"class='even'":"class='odd'";?>>
		<td><?php echo $rows["title"];?></td>		
		<td><?php echo $rows["created_at"];?></td>
		<td><span class="cp" id="statusChange<?php echo $rows["id"]; ?>" onclick="changeStatus('<?php echo $rows["id"]; ?>');"  ><?=($rows["status"]==1)?"Active":"Inactive";?></span></td>
		<td align="center"><a href="viewnews-<?php echo $module; ?>-<?php echo encode($rows["id"])?>"  title="View"><span class="glyphicon glyphicon-eye-open"></span></a>
		<a href="form-<?php echo $module; ?>-<?=encode($rows["id"])?>" title="Edit"><span class="glyphicon glyphicon-pencil"></span></a>
		<a href="page/mod_<?php echo $module; ?>/act_thismodule.php?aid=<?php echo encode($rows["id"]);?>&amp;action=delete" onclick="return confirm('Are you sure you want to delete this row!!');" title="Delete"><span class="glyphicon glyphicon-trash"></span></a></td>	
	</tr>
	<?php $altCol++;}//while close 		 
		   }?>
		</tbody>   
</table>

<script type="text/javascript" charset="utf-8" id="init-code">
		$(document).ready(function() {
			$('#example').dataTable({
				"sPaginationType": "full_numbers"
				});
			$('.tool_tip').tooltip({animation:true,placement:'right'});
			});
			function changeStatus(id)
			{  
				$.post(admin_url+'page/mod_<?php echo $module; ?>/ajax.php',{id:id,mode:'change_status'},                    function(data){
					  $("#statusChange"+id).text(data);
					  $('#message').show('slow')
						   .addClass('alert alert-success alert-dark')
						   .html('<button class="close" type="button" data-dismiss="alert">×</button>Status has been changed!')
						   .delay(3000)
						   .fadeOut('slow');
			});
			}
</script>
</div></div></div></div></div>