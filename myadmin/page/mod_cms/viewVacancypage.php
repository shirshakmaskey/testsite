<?php
if($_SESSION['user_agent']!=$_SERVER['HTTP_USER_AGENT']){ echo "<script>window.location.href='http://google.com'</script>";  }
defined("MYINDEX") or die("Restricted Access for viewing this file");
?>
<?php
$view  = isset($_GET['action'])?$_GET['action']:"";
		if($view  == 'view')
		{
		  $id   =   $_GET['aid'];
		    $rowEdit =  $funCmsObj  -> vacancySel($id);
			?>
			<div class="tblform">		 
			          
            <table width="100%" border="0" cellpadding="1" cellspacing="1" class="table_head_css" >
  <tr >
  <td><div style="width:300px;float:left;font-weight:bold;font-size:18px;">Details [ <?php echo ucwords($rowEdit->vacancy_title); ?> ]</div>
            <div style="text-align:left;float:right;"><a href="<?Php echo $_SERVER['HTTP_REFERER']; ?>">Back</a>&nbsp;|&nbsp;<a href="index.php?_page=addeditVacancy&mod=<?php echo $module; ?>&aid=<?php echo urlencode($id);?>&action=edit">Edit</a></div><div style="clear:both;">
            </div>
        </td>
  </tr>
  </table>
<table width="100%" border="0" cellpadding="1" cellspacing="1"> 
  <tr >
    <td class="oddrowfirst">Vacancy Name</td>
    <td class="oddrowsecond"><?php echo $rowEdit->vacancy_title; ?>
	</td>
  </tr>
  <tr >
    <td class="evenrowfirst">Type</td>
    <td class="evenrowsecond"><?php 
	$vacancyInfo  =  $funCmsObj->vacancyTypeSel($rowEdit->vacancy_type_id);
	echo $vacancyInfo->vacancy_type_name;
	?>
	</td>
  </tr>
  <tr >
  <td valign="top" class="oddrowfirst">Description</td>
    <td class="oddrowsecond"><?php echo $rowEdit->vacancy_description; ?></td>
    
  </tr>
  <tr >
    <td class="evenrowfirst">Added By</td>
    <td class="evenrowsecond"><?php
	$userInfo  =  $funUserObj->userSel($rowEdit->added_by);
	echo $userInfo->fullname; ?>
	</td>
  </tr>
  <tr >
  <td valign="top" class="oddrowfirst">Number Needed</td>
    <td class="oddrowsecond"><?php echo $rowEdit->vacancy_number; ?></td>
    
  </tr>
  <tr >
    <td class="evenrowfirst">Started Date</td>
    <td class="evenrowsecond"><?php echo date("F d,Y",strtotime($rowEdit->started_date)); ?>	</td>
  </tr>
  <tr >
  <td valign="top" class="oddrowfirst">Expire Date</td>
    <td class="oddrowsecond"><?php echo date("F d,Y",strtotime($rowEdit->expire_date)); ?></td>
    
  </tr>
  <tr >
  <td valign="top" class="oddrowfirst">Status</td>
    <td class="oddrowsecond"><?php echo ($rowEdit->status==1) ?"Active":"Inactive"; ?></td>
    
  </tr>
 
  </table>
</div>
			
			
			
<?php	} ?>