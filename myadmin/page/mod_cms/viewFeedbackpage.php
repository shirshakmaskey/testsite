<?php
if($_SESSION['user_agent']!=$_SERVER['HTTP_USER_AGENT']){echo "<script>window.location.href='http://google.com'</script>";}
defined("MYINDEX") or die("Restricted Access for viewing this file");
?>
<?php
$view  = $_GET['action'];
		if($view  == 'view')
		{
		  $id   =   $_GET['aid'];
		    $rowEdit =  $funCmsObj  -> feedPageSel($id);
			?>


<div class="row">
  <div class="col-sm-12">
    <div class="panel">
    
<div class="panel-heading"> 
  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="" >
    <tr >
      <td><span class="panel-title">Details [ <?php echo ucwords($rowEdit->fullname); ?> ]</span>
        <div style="text-align:left;float:right;"><a href="<?Php echo $_SERVER['HTTP_REFERER']; ?>">Back</a>&nbsp;|&nbsp;<a href="index.php?_page=replyFeedbackpage&aid=<?php echo urlencode($id);?>&action=add&mod=cms">Reply</a></div>
        <div style="clear:both;"> </div></td>
    </tr>
  </table>
    
</div>
<div class="panel-body">    
  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="table table-bordered">      

    <tr >
      <td class="oddrowfirst">Name</td>
      <td class="oddrowsecond"><?php echo $rowEdit->fullname; ?></td>
    </tr>
	 <tr >
      <td class="oddrowfirst">Mobile</td>
      <td class="oddrowsecond"><?php echo $rowEdit->mobile; ?></td>
    </tr>
    <tr >
      <td class="evenrowfirst">Email</td>
      <td class="evenrowsecond"><?php echo $rowEdit->email; ?></td>
    </tr>
	<tr >
      <td class="oddrowfirst">Address</td>
      <td class="oddrowsecond"><?php echo $rowEdit->address; ?></td>
    </tr>
    <tr >
      <td valign="top" class="oddrowfirst">Subject</td>
      <td class="oddrowsecond"><?php echo  $rowEdit->subject; ?></td>
    </tr>
    <tr >
      <td class="evenrowfirst">Message</td>
      <td class="evenrowsecond"><?php echo $rowEdit->message; ?></td>
    </tr>
    <tr >
      <td valign="top" class="oddrowfirst">Posted Date</td>
      <td class="oddrowsecond"><?php echo  date( " F d, Y",strtotime( $rowEdit->posted_date )); ?></td>
    </tr>
   
  </table>
</div>
    </div>
  </div>
</div>
<?php	} ?>
