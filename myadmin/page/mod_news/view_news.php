<?php
include("page/setAndCheckAll.php");
if(isset($_REQUEST['aid']))
{
$id  =   isset($_REQUEST['aid'])?decode($_REQUEST['aid']):0;	
$rowEdit =  $funNewsObj  -> newsSel($id);
			?>

<div class="row">
	<div class="col-sm-12">
		<div class="panel">
		
<div class="panel-heading"> 
	<table width="100%" border="0" cellpadding="1" cellspacing="1" class="" >
		<tr >
			<td><span class="panel-title">Details [ <?php echo ucwords($rowEdit->news_title); ?> ]</span>
				<div style="text-align:left;float:right;"><a href="lists-news">View All Message/News</a></div>
				<div style="clear:both;"> </div></td>
		</tr>
	</table>
    
</div>
<div class="panel-body">    
	<table width="100%" border="0" cellpadding="1" cellspacing="1" class="table table-bordered">

		<tr >
			<td class="evenrowfirst">Title</td>
			<td class="evenrowsecond"><?php echo ucwords( $rowEdit->news_title ); ?></td>
		</tr>
        <tr >
			<td class="oddrowfirst">Short Description</td>
			<td class="oddrowsecond"><?php echo $rowEdit->short_description; ?></td>
		</tr>
		<tr >
			<td class="oddrowfirst">Description</td>
			<td class="oddrowsecond"><?php echo html_entity_decode($rowEdit->description); ?></td>
		</tr>
		<tr >
			<td class="oddrowfirst">Author</td>
			<td class="oddrowsecond"><?php echo $rowEdit->author; ?></td>
		</tr>
        <tr >
			<td class="oddrowfirst">Added Date</td>
			<td class="oddrowsecond"><?php echo date("F d,Y",strtotime($rowEdit->added_date)); ?></td>
		</tr>

	</table>
</div>
		</div>
	</div>
</div>
<?php	} ?>
