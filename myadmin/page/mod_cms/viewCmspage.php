<?php
if($_SESSION['user_agent']!=$_SERVER['HTTP_USER_AGENT']){ echo "<script>window.location.href='http://google.com'</script>";  }
defined("MYINDEX") or die("Restricted Access for viewing this file");
?>
<?php
$view  = isset($_GET['action'])?$_GET['action']:"";
		if($view  == 'view')
		{
		  $id   =   $_GET['aid'];
		    $rowEdit =  $funCmsObj  -> cmsPageSel($id);
			?>
			<div class="tblform">		
			          
            <table width="100%" border="0" cellpadding="1" cellspacing="1" class="table_head_css" >
  <tr >
  <td><div style="width:300px;float:left;font-weight:bold;font-size:18px;">Details [ <?php echo ucwords($rowEdit->pagename); ?> ]</div>
            <div style="text-align:left;float:right;"><a href="<?Php echo $_SERVER['HTTP_REFERER']; ?>">Back</a>&nbsp;|&nbsp;<a href="index.php?_page=addeditCmspage&mod=cms&aid=<?php echo urlencode($id);?>&action=edit">Edit</a></div><div style="clear:both;">
            </div>
        </td>
  </tr>
  </table>
<table width="100%" border="0" cellpadding="1" cellspacing="1"> 
  <tr >
    <td class="oddrowfirst">Page Name</td>
    <td class="oddrowsecond"><?php echo $rowEdit->pagename; ?>
	</td>
  </tr>
  <tr >
    <td class="evenrowfirst">Page Title</td>
    <td class="evenrowsecond"><?php echo $rowEdit->pagetitle; ?>
	</td>
  </tr>
  <tr >
  <td valign="top" class="oddrowfirst">Page Description</td>
    <td class="oddrowsecond"><?php echo html_entity_decode( $rowEdit->pagedescription ); ?></td>
    
  </tr>
  <tr >
    <td class="evenrowfirst">Meta Subject</td>
    <td class="evenrowsecond"><?php echo $rowEdit->metasubject; ?>
	</td>
  </tr>
  <tr >
  <td valign="top" class="oddrowfirst">Meta Description</td>
    <td class="oddrowsecond"><?php echo $rowEdit->metadesc; ?></td>
    
  </tr>
  <tr >
    <td class="evenrowfirst">Meta Keyword</td>
    <td class="evenrowsecond"><?php echo $rowEdit->metakeyword; ?>
	</td>
  </tr>
 
  </table>
</div>
			
			
			
<?php	} ?>