<?Php
$result  =  $funItemsObj->dataList();
$num     =  $db->num_rows($result);
?>
<div><h2 class="headingh2">Manage Items</h2>
<p class="actionp"><a href="form-<?php echo $module; ?>" class="btn btn-default" style="color:#06C"><span class="glyphicon glyphicon-plus"></span> Add</a></p>
<div class="clear"></div>
<hr />
</div>
<div>
<table cellpadding="0" cellspacing="0" border="0" class="managetable table" id="example">
	<thead>
		<tr class="bgTdHeader">
			<th>S.N</th>
			<th>Title</th>
			<th>Title(Denish)</th>
			<th>Category</th>
			<th>Price</th>
			<th>Show in <br />Home Page</th>
			<th>Today's Special</th>
			<th>Special</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
	</thead>
    <tbody>
	<?php if($num>0){
		   $sn=1;
		   while($row  =  $db->result($result)){
		 ?>
		<tr>	
			<td><?=$sn?></th>
			<td><?=$row->article_title;?></td>
			<td><?=$row->article_title_de;?></td>
			<td><?=ucwords($row->category_name);?></td>
			<td><?=$row->currency_title;?> (<?=$row->symbol;?>) <?=$row->price;?></td>
			<td><span class="cp" id="showInHomepage<?php echo $row->id; ?>" onclick="showInHomepage('<?php echo $row->id; ?>');"  ><?=($row->show_in_home_page==1)?"Yes":"No";?></span></td>		
			<td><span class="cp" id="todaySpecial<?php echo $row->id; ?>" onclick="todaySpecial('<?php echo $row->id; ?>');"  ><?=($row->todays_special==1)?"Yes":"No";?></span></td>
			<td><span class="cp" id="specialBlock<?php echo $row->id; ?>" onclick="specialBlock('<?php echo $row->id; ?>');"  ><?=($row->special_block==1)?"Yes":"No";?></span></td>
			<td><span class="cp" id="statusChange<?php echo $row->id; ?>" onclick="changeStatus('<?php echo $row->id; ?>');"  ><?=($row->status==1)?"Active":"Inactive";?></span></td>
			<td><a href="form-<?php echo $module; ?>-<?=encode($row->id)?>" title="Edit" class="tool_tip"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;&nbsp;<a href="<?php echo base_url("$administrator/page/mod_$module/act_thismodule.php?action=delete&aid=".encode($row->id)); ?>" class="tool_tip" title="Delete" onclick="return confirm('Are you sure you want to delete?');"><span class="glyphicon glyphicon-remove"></span></a></th>
		</tr>
        <?php $sn++;}} ?>
	</tbody>
	
</table>
</div>
<script type="text/javascript" charset="utf-8" id="init-code">
		$(document).ready(function() {
			$('#example').dataTable({
				"sPaginationType": "full_numbers"
				});
			$('.tool_tip').tooltip({animation:true,placement:'right'});
			});
			function changeStatus(id)
			{  
				$.post(admin_url+'page/mod_items/ajax.php',{id:id,mode:'change_status'},                    function(data){
					  $("#statusChange"+id).text(data);
					  $('#message').show('slow')
								   .addClass('success')
								   .text('Status has been changed!')
								   .delay(3000)
								   .fadeOut('slow');
					});
			}
			
			function showInHomepage(id)
			{  
				$.post(admin_url+'page/mod_items/ajax.php',{id:id,mode:'showInHomepage'},                    function(data){
					  $("#showInHomepage"+id).text(data);
					  $('#message').show('slow')
								   .addClass('success')
								   .text('Status has been changed!')
								   .delay(3000)
								   .fadeOut('slow');
					});
			}
			function todaySpecial(id)
			{  
				$.post(admin_url+'page/mod_items/ajax.php',{id:id,mode:'todaySpecial'},                    function(data){
					  $("#todaySpecial"+id).text(data);
					  $('#message').show('slow')
								   .addClass('success')
								   .text('Status has been changed!')
								   .delay(3000)
								   .fadeOut('slow');
					});
			}
			function specialBlock(id)
			{  
				$.post(admin_url+'page/mod_items/ajax.php',{id:id,mode:'specialBlock'},                    function(data){
					  $("#specialBlock"+id).text(data);
					  $('#message').show('slow')
								   .addClass('success')
								   .text('Status has been changed!')
								   .delay(3000)
								   .fadeOut('slow');
					});
			}
			
</script>