<?php
defined("MYINDEX") or die("Restricted Access for viewing this file");
////////////////////////////////////////////////////////////////////////
//check for the page for the permission
	$resultPagePermission  =  $funObj->pagePermission($contentPage,$module);
	if($resultPagePermission!=true){
	   $_SESSION['errorMessage']  =  "Page is not accessible";
	   $_SESSION['errorPageUrl']  = $funObj->curPageURL();
	   $funObj->redirect("index.php");
	}
//check for the page for the permission end
////////////////////////////////////////////////////////////////////////
if(!empty($_SESSION['orgId']))
{
 $funObj->redirect($funObj->siteUrl()."profileUser-user");	
}

include("page/setAndCheckAll.php"); 
include("page/sortingAndSearch.php");
$pages   =        $funUserObj -> userListPage($module,$contentPage,$_SESSION['recordPerPage'],$sortField,$sortBy,$searchQu);
?>

 
<div class="page-header">
<div class="row">
				<!-- Page header, center on small screens -->
				<h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-tasks page-header-icon"></i>&nbsp;&nbsp;Manage Admin Users</h1>

				<div class="col-xs-12 col-sm-8">
					<div class="row">
						<hr class="visible-xs no-grid-gutter-h">
						<!-- "Create project" button, width=auto on desktops -->
						<div class="pull-right col-xs-12 col-sm-auto"><a style="width: 100%;" class="btn btn-primary btn-labeled" href="index.php?_page=form&action=add&mod=<?php echo $module; ?>"><span class="btn-label icon fa fa-plus"></span>Add</a></div>

					</div>
				</div>
			</div>
</div><!--page-header-->


<div class="row"><div class="col-sm-12"><div class="panel"><div class="panel-body">
<div class="table-primary">
<table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="table_user" width="100%">
	
  <?php if($pages[0]>0){?>
       <thead>
         <tr>	
		 <th>S.N</th>
		<th>FULL NAME</th>		
		<th>USERNAME</th>
		<th>IMAGE</th>
		<?php if($_SESSION[ENCR_KEY.'level']!=3){?><th>GROUP</th><?php }?>
		<!--<th>BRANCH</th>-->
		<th>STATUS</th>
		<th>ACTION</th>
		</tr>
		</thead>
		<tbody>
		<?php $altCol=0;
		      $resultExec  =  $funUserObj ->exec($pages[1]);
			  while($rows  =  $funUserObj ->fetch_array($resultExec))
				{ 
		   ?>
	<tr <?php echo (($altCol%2)>0)?"class='even'":"class='odd'";?>>
	    <td><?php echo $altCol;?></td>
		<td><?php echo $rows["fullname"];?></td>	
		<td><?php echo $rows["username"];?></td>		
		<td><?php $img  =  $rows["image"];							 		  
     if(file_exists("../images/user_image/".$img)  and !empty($img))
	 { $userImage  = "<img src='../images/user_image/$img' height='60'  border='0' >";	 
	 ?><a href="../images/user_image/<?php echo $img; ?>" rel="lytebox[user_image]" title="<?php echo $rows["username"]; ?>"> <?php echo $userImage; ?> </a>
		<?php
	 }
	 ?></td>
	 <?php if($_SESSION[ENCR_KEY.'level']!=3){?><td><?php echo $rows['group_name']?></td><?php }?>
	 <!--<td><?php //if(!empty($rows['branch_id'])){$therow= $funBranchObj->dataSel($rows['branch_id']); echo $therow->branch_name;}else{echo "Administrator";}?></td>	-->
		<td><span class="cp" id="statusChange<?php echo $rows["id"]; ?>" onclick="changeStatus('<?php echo $rows["id"]; ?>');"  ><?=($rows["status"]==1)?"Active":"Inactive";?></span></td>
		<td align="center"><a href="view-<?php echo $module; ?>-<?php echo encode($rows["id"]); ?>"  title="View"><span class="glyphicon glyphicon-eye-open"></span></a>
		<?Php if($_SESSION[ENCR_KEY.'level']==1 or $_SESSION[ENCR_KEY.'level']==2 or $_SESSION[ENCR_KEY.'pathsaleLoginId']==$rows['id']){ ?>
		<a href="form-<?php echo $module; ?>-<?php echo encode($rows["id"]);?>" title="Edit"><span class="glyphicon glyphicon-pencil"></span></a>
		<?php } ?>
		<?php if($_SESSION[ENCR_KEY.'level']==1){?>
		<?php if($_SESSION[ENCR_KEY.'pathsaleLoginId']==1 and $rows['id']!=$_SESSION[ENCR_KEY.'pathsaleLoginId']){ ?>
		<a href="page/mod_<?php echo $module; ?>/actAdminuser.php?aid=<?php echo urlencode(encode($rows["id"]));?>&action=delete" onclick="return confirm('Are you sure you want to delete this row!!');" title="Delete"><span class="glyphicon glyphicon-trash"></span></a>
		<?php }} 
		  
			   ?>	
	</tr>
	<?php $altCol++;}//while close 		 
		   }?>
		</tbody>   
</table>
<script type="text/javascript" charset="utf-8" id="init-code">
		$(document).ready(function() {
			var oTable =  $('#table_user').dataTable( {
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
			function changeStatus(id)
			{  
				$.post(admin_url+'page/mod_user/ajax.php',{id:id,mode:'change_status'},                    function(data){
					  $("#statusChange"+id).text(data);
					  $('#message').show('slow')
								   .addClass('success')
								   .text('Status has been changed!')
								   .delay(3000)
								   .fadeOut('slow');
					});
			}
</script>
</div></div></div></div></div>
