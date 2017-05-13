<?php
if($_SESSION['user_agent']!=$_SERVER['HTTP_USER_AGENT']){echo "<script>window.location.href='http://google.com'</script>";}
defined("MYINDEX") or die("Restricted Access for viewing this file");
?>
<?php
$view  = $_GET['action'];
		if($view  == 'view')
		{
		  $id   =   $_GET['aid'];
		    $rowEdit =  $funCmsObj  -> replyFeedBackPageSel($id);			?>

<div class="tblform">
  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="table_head_css" >
    <tr >
      <td><div style="width300px;float:left;font-weight:bold;font-size:13px;padding-left:5px;">Details [ <?php echo ucwords($rowEdit->replyname); ?> ]</div>
        <div style="text-align:left;float:right;"><a href="<?Php echo $_SERVER['HTTP_REFERER']; ?>">Back</a>&nbsp;|&nbsp;<a href="page/mod_cms/actReplyfeedbackpage.php?aid=<?php echo urlencode($id);?>&action=delete&url_back=<?php echo urlencode($_SERVER['HTTP_REFERER']); ?>" onclick="return confirm('Are you sure you want to delete this row!!');" title="Delete">Delete</a></div>
        <div style="clear:both;"></div></td>
    </tr>
  </table>
  <table width="100%" border="0" cellpadding="1" cellspacing="1">
    <tr >
      <td class="oddrowfirst">Date</td>
      <td class="oddrowsecond"><?php echo date ( "F d Y",strtotime( $rowEdit->date)); ?></td>
    </tr>
    <tr >
      <td class="evenrowfirst">Name</td>
      <td class="evenrowsecond"><?php echo ucwords( $rowEdit->replyname ); ?></td>
    </tr>
    <tr >
      <td valign="top" class="oddrowfirst">Email</td>
      <td class="oddrowsecond"><?php echo  wordwrap($rowEdit->replyemail,50,"\n",5); ?></td>
    </tr>
    <tr >
      <td class="evenrowfirst">Subject</td>
      <td class="evenrowsecond"><?php echo $rowEdit->subject; ?></td>
    </tr>
    <tr >
      <td valign="top" class="oddrowfirst">Description</td>
      <td class="oddrowsecond"><?php echo  html_entity_decode( $rowEdit->description); ?></td>
    </tr>
  </table>
</div>
<?php	} ?>
