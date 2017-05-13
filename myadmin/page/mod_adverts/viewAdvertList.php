<?php
include("page/setAndCheckAll.php");
$view  = isset($_GET['action']) ? $_GET['action'] : "";
		if($view  == 'view')
		{
		  $id   =   $_GET['aid'];
		    $rowEdit =  $funAdvertsObj  -> adverTypeSel($id);
			?>
			<div class="tblform">
	<table width="850" border="0" cellpadding="1" cellspacing="1" class="table_head_css" >
  <tr >
  <td><div style="width:300px;float:left;font-weight:bold;font-size:13px;padding-left:5px;">Details [ <?php echo ucwords($rowEdit->advert_name); ?> ]</div><div style="text-align:left;float:right;"><a href="<?Php echo $_SERVER['HTTP_REFERER']; ?>">Back</a>&nbsp;|&nbsp;<a href="index.php?_page=addeditAdvertType&mod=<?php echo $module; ?>&aid=<?php echo urlencode($id);?>&action=edit">Edit</a></div><div style="clear:both;"></div>
        </td>
  </tr>
  </table>
<table width="850" border="0" cellpadding="1" cellspacing="1"> 
  <tr >
    <td class="oddrowfirst">Advertisement Type Name</td>
    <td class="oddrowsecond"><?php echo $rowEdit->advert_name; ?>
	</td>
  </tr>

   <tr >
    <td class="evenrowfirst">Status</td>
    <td class="evenrowsecond"><?php echo ($rowEdit->status==1)?"Active":"Inactive"; ?>
	</td>
  </tr>
  </table>
</div>
			
			
			
<?php	} ?>