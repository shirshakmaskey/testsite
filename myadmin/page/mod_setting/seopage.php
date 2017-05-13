<?php
include("page/setAndCheckAll.php");
include("page/sortingAndSearch.php");
$pages   =        $funSettingObj -> seoPage($module,$contentPage,$sortField,$sortBy,$searchQu);
?>
<div class="page-header">
			
			<div class="row">
				<!-- Page header, center on small screens -->
				<h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-tasks page-header-icon"></i>&nbsp;&nbsp;Manage Seo</h1>

				<div class="col-xs-12 col-sm-8">
					<div class="row">
						<hr class="visible-xs no-grid-gutter-h">
						<!-- "Create project" button, width=auto on desktops -->
						<div class="pull-right col-xs-12 col-sm-auto"><a style="width: 100%;" class="btn btn-primary btn-labeled" href="addeditSeopage-<?php echo $module; ?>"><span class="btn-label icon fa fa-plus"></span>Add</a></div>

					</div>
				</div>
			</div>
		</div><!--page-header-->



<div class="row"><div class="col-sm-12"><div class="panel"><div class="panel-body">
<div class="table-primary">
<table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="table_seo" width="100%">
<?php if($pages[0] > 0){?>
    <thead>
	<tr>
		<th>META SUBJECT</th>
		<th>META KEYWORD</th>
		<th>META DESCRIPTION</th>
		<th>ACTION</th>
	</tr>
	</thead>
	<tbody>
	<?php
                            $altCol=0;
							//foreach($recordStart as $rows)
							 $resultExec    =    $funSettingObj ->exec($pages[1]);
							 while($rows     =    $funSettingObj ->fetch_array($resultExec))
							{
								
								/* hover Toot tips content start here */
								$hovertooltipsMessage ='';

								$hovertooltipsMessage .="Keywords : ".substr( $rows['metakeyword'], 0 ,60)."<br>";
								$hovertooltipsMessage .="copy Right : ".$rows['copyright']."<br>";
								$hovertooltipsMessage .="Catagory : ".$rows['metacatagory']."<br>";
								$hovertooltipsMessage .="Reply to  : ". $rows['reply_to']."<br>";
								$hovertooltipsMessage .="Author : ". $rows['author']."<br>";
								
    							/* hover Toot tips content end here */
							?>
	<tr <?php echo (($altCol%2)>0)?"class='bgTdROne'":"class='bgTdRTwo'"; ?>  title="<?php echo $hovertooltipsMessage; ?>" >
		<td  ><?php echo substr($rows["metasubject"],0,40);?></td>
		<td ><?php echo substr($rows["metakeyword"],0,40);?></td>
		<td  ><?php echo substr($rows["metadesc"],0,40);?></td>
		<td><a href="viewSeopage-<?php echo $module; ?>-<?php echo encode($rows["id"]);?>"  title="View"><span class="glyphicon glyphicon-eye-open"></span></a>&nbsp;<a href="addeditSeopage-<?php echo $module; ?>-<?php echo encode($rows["id"]);?>" title="Edit"><span class="glyphicon glyphicon-pencil"></span></a></td>
	</tr>
	<?php $altCol++; }  // while close 
						}   // if close 
	  else {?>
	<tr>
		<td class="noRecordFound" colspan="5">No Record Found</td>
	</tr>
	<?php } ?>
	</tbody>					
</table>
</div></div></div></div></div>
