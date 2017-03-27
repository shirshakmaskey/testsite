<?php
include("page/setAndCheckAll.php");
if(isset($_REQUEST['aid']))
{$id  =   isset($_REQUEST['aid'])?decode($_REQUEST['aid']):0;	
$rowEdit =  $funSettingObj  -> configurationPageSel($id);
			?>

<div class="row">
	<div class="col-sm-12">
		<div class="panel">
		
<div class="panel-heading"> 
	<table width="100%" border="0" cellpadding="1" cellspacing="1" class="" >
		<tr >
			<td><span class="panel-title">Details [ <?php echo ucwords($rowEdit->configname); ?> ]</span>
				<div style="text-align:left;float:right;"><a href="<?Php echo $_SERVER['HTTP_REFERER']; ?>">Back</a>&nbsp;|&nbsp;<a href="form_config-<?php echo $module?>-<?php echo encode($id);?>">Edit</a></div>
				<div style="clear:both;"> </div></td>
		</tr>
	</table>
    
</div>
<div class="panel-body">
<table width="100%" border="0" cellpadding="1" cellspacing="1" class="table table-bordered">
  <tr >
    <td class="oddrowfirst">Configuration Name</td>
    <td class="oddrowsecond"><?php echo $rowEdit->configname; ?>
	</td>
  </tr>
  <tr >
    <td class="evenrowfirst">Configuration Description</td>
    <td class="evenrowsecond"><?php echo html_entity_decode($rowEdit->configdesc); ?>
	</td>
  </tr>
  <tr >
  <td valign="top" class="oddrowfirst">Configuration Value</td>
    <td class="oddrowsecond"><?php echo  $rowEdit->configvalue; ?></td>
    
  </tr>
  
   <tr >
    <td class="evenrowfirst">Status</td>
    <td class="evenrowsecond"><?php echo ($rowEdit->status==1)?"Active":"Inactive"; ?>
	</td>
  </tr>
  </table>
</div>
		</div>
	</div>
</div>
<?php	} ?>