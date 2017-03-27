<?php
include("page/setAndCheckAll.php");
if(isset($_REQUEST['aid']))
{$id  =   isset($_REQUEST['aid'])?decode($_REQUEST['aid']):0;	
$rowEdit =  $funSettingObj  -> seoPageSel($id);
			?>

<div class="row">
	<div class="col-sm-12">
		<div class="panel">
		
<div class="panel-heading"> 
	<table width="100%" border="0" cellpadding="1" cellspacing="1" class="" >
		<tr >
			<td><span class="panel-title">Details</span>
				<div style="text-align:left;float:right;"><a href="<?Php echo $_SERVER['HTTP_REFERER']; ?>">Back</a>&nbsp;|&nbsp;<a href="addeditSeopage-<?php echo $module?>-<?php echo encode($id);?>">Edit</a></div>
				<div style="clear:both;"> </div></td>
		</tr>
	</table>
    
</div>
<div class="panel-body">
<table width="100%" border="0" cellpadding="1" cellspacing="1" class="table table-bordered">
		<tr>
			<td>Meta Subject</td>
			<td><?php echo $rowEdit->metasubject; ?></td>
		</tr>
		<tr>
			<td>Meta Keywords</td>
			<td><?php echo $rowEdit->metakeyword; ?></td>
		</tr>
		<tr>
			<td valign="top">Meta Description</td>
			<td><?php echo  $rowEdit->metadesc; ?></td>
		</tr>
		<tr>
			<td>Meta Abstracts</td>
			<td><?php echo $rowEdit->metaabstract; ?></td>
		</tr>
		<tr>
			<td valign="top" class="evenrowfirst">Meta KeyPhrase</td>
			<td><?php echo  $rowEdit->metakeyphrase; ?></td>
		</tr>
		<tr>
			<td valign="top">Meta Clasification</td>
			<td><?php echo  $rowEdit->metaclassification; ?></td>
		</tr>
		<tr>
			<td class="evenrowfirst">Copyright</td>
			<td class="evenrowsecond"><?php echo $rowEdit->copyright; ?></td>
		</tr>
		<tr>
			<td>Meta Catagory</td>
			<td><?php echo $rowEdit->metacatagory; ?></td>
		</tr>
		<tr>
			<td valign="top" class="evenrowfirst">Reply To</td>
			<td><?php echo  $rowEdit->reply_to; ?></td>
		</tr>
		<tr>
			<td>Author</td>
			<td><?php echo $rowEdit->author; ?></td>
		</tr>
	</table>
</div>
		</div>
	</div>
</div>
<?php	} ?>
