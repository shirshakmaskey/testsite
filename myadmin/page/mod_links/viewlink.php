<?php
include("page/setAndCheckAll.php");
if(isset($_GET['action']))
{ $view  = $_GET['action']; }
		if($view  == 'view')
		{
		  $id   =   $_GET['aid'];
		    $rowEdit =  $funLinkObj  -> linkSel($id);
			?>

<div class="tblform">
  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="table_head_css" >
    <tr >
      <td><div style="width:300px;float:left;font-weight:bold;font-size:18px;padding-left:5px;">Details [ <?php echo ucwords($rowEdit->link_title); ?> ]</div>
        <div style="text-align:left;float:right;"><a href="<?Php echo $_SERVER['HTTP_REFERER']; ?>">Back</a>&nbsp;|&nbsp;<a href="index.php?_page=addEditLink&amp;mod=<?php echo $module; ?>&amp;aid=<?php echo urlencode($id);?>&amp;action=edit">Edit</a></div>
        <div style="clear:both;"> </div></td>
    </tr> 	 	 	 	 	 	 
  </table>
  <table width="850" border="0" cellpadding="1" cellspacing="1">
    
    <tr >
      <td class="evenrowfirst">Link Title</td>
      <td class="evenrowsecond"><?php echo ucwords( $rowEdit->link_title ); ?></td>
    </tr>
    
    <tr >
      <td class="oddrowfirst">Description</td>
      <td class="oddrowsecond"><?php echo $rowEdit->link_desc; ?></td>
    </tr>
    
    <tr >
      <td class="evenrowfirst">Link Url</td>
      <td class="evenrowsecond"><?php echo ucwords( $rowEdit->link_url ); ?></td>
    </tr>
    
    
     <tr >
      <td class="evenrowfirst">Added Date</td>
      <td class="evenrowsecond"><?php echo $rowEdit->added_date; ?></td>
    </tr>
    
     <tr >
      <td class="evenrowfirst">Status</td>
      <td class="evenrowsecond">
      <?php echo ( $rowEdit->status==1) ? "Active " : "Inactive"; ?>
      </td>
    </tr>
         
      </table>
</div>
<?php	} ?>
