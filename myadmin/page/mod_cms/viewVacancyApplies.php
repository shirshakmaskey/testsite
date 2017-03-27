<?php
if($_SESSION['user_agent']!=$_SERVER['HTTP_USER_AGENT']){ echo "<script>window.location.href='http://google.com'</script>";  }
defined("MYINDEX") or die("Restricted Access for viewing this file");
?>
<?php
$view  = isset($_GET['action'])?$_GET['action']:"";
		if($view  == 'view')
		{
		  $id   =   $_GET['aid'];
		    $rowEdit =  $funCmsObj  -> vacancyAppliesSel($id);
			?>
			<div class="tblform">		 
			          
            <table width="100%" border="0" cellpadding="1" cellspacing="1" class="table_head_css" >
  <tr >
  <td><div style="width:300px;float:left;font-weight:bold;font-size:18px;">Details [ <?php echo ucwords($rowEdit->fullname); ?> ]</div>
            <div style="text-align:left;float:right;"><a href="<?Php echo $_SERVER['HTTP_REFERER']; ?>">Back</a>&nbsp;|&nbsp;<a href="page/mod_<?php echo $module; ?>/actVacancyApplies.php?aid=<?php echo urlencode($id);?>&action=delete" onclick="return confirm('Are you sure?');">Delete</a></div><div style="clear:both;">
            </div>
        </td>
  </tr>
  </table>
<table width="100%" border="0" cellpadding="1" cellspacing="1"> 
  <tr >
    <td class="oddrowfirst">Vacancy Title</td>
    <td class="oddrowsecond"><?php 
	$vacancyInfo  =  $funCmsObj->vacancySel($rowEdit->vacancy_id);
	echo	 $vacancyName  =   $vacancyInfo->vacancy_title; 
   ?>
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
  <td valign="top" class="oddrowfirst">Fullname</td>
    <td class="oddrowsecond"><?php echo $rowEdit->fullname; ?></td>
    
  </tr>
  <tr >
    <td class="evenrowfirst">Address</td>
    <td class="evenrowsecond"><?php
	echo $rowEdit->address; ?>
	</td>
  </tr>
  <tr >
  <td valign="top" class="oddrowfirst">Email</td>
    <td class="oddrowsecond"><?php echo $rowEdit->email; ?></td>
    
  </tr>
  <tr >
    <td class="evenrowfirst">Phone</td>
    <td class="evenrowsecond"><?php echo $rowEdit->phone; ?>	</td>
  </tr>
  <tr >
  <td valign="top" class="oddrowfirst">Mobile</td>
    <td class="oddrowsecond"><?php echo $rowEdit->mobile; ?></td>
    
  </tr>
  <tr >
  <td valign="top" class="oddrowfirst">gender</td>
    <td class="oddrowsecond"><?php echo $rowEdit->gender; ?></td>
    
  </tr>
   <tr >
  <td valign="top" class="oddrowfirst">Attachment Info</td>
    <td class="oddrowsecond"><a href="../file/vacancy_cv/<?php echo $rowEdit->attachment; ?>" title="Attachment" target="_blank"><img src="images/icon/attach.png" border="0" alt="Attachment" title="Attachment"></a></td>
    
  </tr>
  <tr >
    <td class="evenrowfirst">Added Date</td>
    <td class="evenrowsecond"><?php echo date("F d,Y", strtotime($rowEdit->added_date)); ?>	</td>
  </tr>
 
  </table>
</div>
			
			
			
<?php	} ?>