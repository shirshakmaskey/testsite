<?php
session_start();
include_once("../../includes/application_top.php");
$view  = isset($_GET['action']) ? $_GET['action'] : "";
		if($view  == 'view')
		{
		  $id   =   $_GET['aid'];
		    $rowEdit =  $funUserObj  -> userHistorySel($id);
			?>
<!-- Pixel Admin's stylesheets -->
	<link href="<?=siteUrl(1)?>assets/stylesheets/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?=siteUrl(1)?>assets/stylesheets/pixel-admin.min.css" rel="stylesheet" type="text/css">
	<link href="<?=siteUrl(1)?>assets/stylesheets/widgets.min.css" rel="stylesheet" type="text/css">
	<link href="<?=siteUrl(1)?>assets/stylesheets/pages.min.css" rel="stylesheet" type="text/css">
	<link href="<?=siteUrl(1)?>assets/stylesheets/rtl.min.css" rel="stylesheet" type="text/css">
	<link href="<?=siteUrl(1)?>assets/stylesheets/themes.min.css" rel="stylesheet" type="text/css">
	<link href="<?=siteUrl(1)?>control/mystyle.css" rel="stylesheet" type="text/css">
    
<script>var init = [];</script>
<script type="text/javascript"> window.jQuery || document.write("<script src='<?=siteUrl(1)?>assets/javascripts/jquery.js'>"+"<"+"/script>"); </script>    
<script type="text/javascript" src="../../js/validation.js"> </script> 
<div class="row">
	<div class="col-sm-12">
		<div class="panel">
		
<div class="panel-heading"> 

  <table width="100%" border="0" cellpadding="1" cellspacing="1" >
    <tr >
      <td><div style="width:300px;float:left;font-weight:bold;font-size:13px;padding-left:5px;">Details [ <?php echo ucwords($rowEdit->fullname); ?> ]</div>
        
        <div style="clear:both;"></div></td>
    </tr>
  </table>
  </div>
<div class="panel-body">
  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="table table-bordered">
    
   
    <tr >
			<td class="oddrowfirst">First Name</td>
			<td class="oddrowsecond"><?php $fullname  =  explode(" ",$rowEdit->fullname);
	echo $fullname[0]; ?></td>
		</tr>
		<?php if(count($fullname)>2){ ?>
		
			<td class="oddrowfirst">Middle Name</td>
			<td class="oddrowsecond"><?php echo $fullname[1];	?></td>
		</tr>
		
			<td class="oddrowfirst">Last Name</td>
			<td class="oddrowsecond"><?php echo $fullname[2];	?></td>
		</tr>
		<?php } else { ?>
		
			<td class="oddrowfirst">Last Name</td>
			<td class="oddrowsecond"><?php echo $fullname[1];	?></td>
		</tr>
		<?php } ?>
		<tr >
			<td class="evenrowfirst">Username</td>
			<td class="evenrowsecond"><?php echo $rowEdit->username; ?></td>
		</tr>
		<tr >
			<td valign="top" class="oddrowfirst">Group</td>
			<td class="oddrowsecond"><?php $rowgroup =  $funUserObj->userGroupType($rowEdit->group_type);
	echo $rowgroup->group_name;
	?></td>
		</tr>
		<tr >
			<td valign="top" class="oddrowfirst">Designation</td>
			<td class="oddrowsecond"><?php echo $rowEdit->designation; ?></td>
		</tr>
		<tr >
			<td valign="top" class="oddrowfirst">Make Login</td>
			<td class="oddrowsecond"><?php echo ($rowEdit->make_login==1)?"Yes":"No"; ?></td>
		</tr>
		<tr >
			<td class="evenrowfirst">Status</td>
			<td class="evenrowsecond"><?php echo ($rowEdit->status==1)?"Active":"Inactive"; ?></td>
		</tr>
		<tr >
			<td valign="top" class="oddrowfirst">Temporary Address</td>
			<td class="oddrowsecond"><?php echo $rowEdit->temporary_address; ?></td>
		</tr>
		<tr >
			<td class="evenrowfirst">Permanent Address</td>
			<td class="evenrowsecond"><?php echo $rowEdit->permanent_address; ?></td>
		</tr>
		<tr >
			<td class="evenrowfirst">Gender</td>
			<td class="evenrowsecond"><?php echo ucwords($rowEdit->gender); ?></td>
		</tr>
		<tr >
			<td valign="top" class="oddrowfirst">Phone</td>
			<td class="oddrowsecond"><?php echo !empty($rowEdit->telephone1)? $rowEdit->telephone1:"None"; ?></td>
		</tr>
		<tr >
			<td valign="top" class="oddrowfirst">Mobile</td>
			<td class="oddrowsecond"><?php echo !empty($rowEdit->mobile1)? $rowEdit->mobile1:"None"; ?></td>
		</tr>
		<tr >
			<td valign="top" class="oddrowfirst">Email</td>
			<td class="oddrowsecond"><?php echo !empty($rowEdit->email1)? $rowEdit->email1:"None"; ?></td>
		</tr>
		<tr >
			<td class="evenrowfirst">Added Date</td>
			<td class="evenrowsecond"><?php echo !empty($rowEdit->added_date)? $rowEdit->added_date:"None"; ?></td>
		</tr>
		<tr >
			<td class="evenrowfirst">Modified Date</td>
			<td class="evenrowsecond"><?php echo !empty($rowEdit->modified_date )? $rowEdit->modified_date :"None"; ?></td>
		</tr>
    
  </table>
</div>
	</div>
</div>
<?php	} ?>
