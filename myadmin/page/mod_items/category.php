<?Php
$result   =        $funItemsObj -> categoryListDataTable();
$num     =  $db->num_rows($result);
?>
<div><h2 class="headingh2">Manage Category</h2>
<p class="actionp"><a href="index.php?_page=form_category&action=add&mod=<?php echo $module; ?>" title="Add Content" class='btn btn-primary white'>Add Category</a></p>
<div class="clear"></div>
<hr />
</div>
<div>
<table cellpadding="0" cellspacing="0" border="0" class="managetable table" id="example">
	<thead>
		<tr class="bgTdHeader">
		<th>S.N</th>
			<th>Category</th>
			<th>Category(Denish)</th>
			<th>Parent</th>
			<th>Is Special?</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
	</thead>
    <tbody>
	<?php if($num>0){
		   $sn=1;
		   while($row  =  $db->result($result)){
		 ?>
		<tr><td><?=$sn?></td>
			<td><?=$row-> category_name;?></td>
			<td><?=$row-> category_name_de;?></td>
			<td><?php if($row->parent_id==0)echo "self";
			          else echo $row->parent_name;
 					  ?></td>
    		<td><select onchange="changeStatus(this.value,'<?php echo $row->id; ?>');">
    <option value="1" <?=($row->status=="1")?"selected":"";?>>Active</option>
    <option value="0" <?=($row->status=="0")?"selected":"";?>>Inactive</option>
    </select></td>
	        <td><?=($row->special=="1")?"Normal":"selected";?></td>
			<td><a href="index.php?_page=form_category&amp;aid=<?php echo urlencode($row->id);?>&amp;action=edit&amp;mod=<?php echo $module; ?>" title="Edit"><span class="glyphicon glyphicon-pencil"></span></a> <a href="page/mod_<?php echo $module; ?>/actCategory.php?aid=<?php echo urlencode($row->id);?>&amp;action=delete" onclick="return confirm('Are you sure you want to delete this row!!');" title="Delete"><span class="glyphicon glyphicon-trash"></span></a></th>
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
function changeStatus(vals,id)
{   $('#page_overlay').show().delay(3000).fadeOut('slow');
    $.post(admin_url+'page/mod_crl/ajax.php',{vals:vals,id:id,mode:'change_status_cat'},function(data){ 
		  alert('Status has been updated successfully');    
      });	
}
</script>