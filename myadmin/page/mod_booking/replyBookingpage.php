<?php
if(!isset($_SESSION['user_agent'])){echo "<script>window.location.href='http://google.com'</script>";}
?>
<?php
$action    = $_GET['action'];
$url_back  = $_SERVER['HTTP_REFERER'];
$aid       = $_GET['aid'];
if(@count($_POST['selected'])==1)
{ $aid  =  $_POST['selected'][0]; }
$rowEdit   = $funBookingObj -> bookingPageSel($aid);

?>
<script>$(document).ready( function(){ $("#subject").focus(); });</script>
<div class="row">
  <div class="col-sm-12">
    <div class="panel">
<div class="panel-heading"> <span class="panel-title"><strong> Reply to <?php echo ($aid!='')?" < <em class='add'>".$rowEdit->fullname."</em> > ":" < <em class='edit'>All</em> >"; ?> </strong></span> </div>
      <div class="panel-body">    

    <form action="page/mod_booking/actBookingpage.php?aid=<?php echo urlencode($aid); ?>&action=<?php echo urlencode($action); ?>" method="post" onsubmit="return bookingpage();">
    <input type="hidden" name="collect_Id"  value="<?php 
if(isset($_POST['selected']))
{
  $collect_Id = array();
  foreach($_POST['selected'] as $key=>$val)
  {
   $collect_Id[]=$val;
  }
  echo implode(",",$collect_Id);
} 

?>"/>
  
    <table width="100%" border="0" cellpadding="5" cellspacing="5"  class="table table-bordered">
      <tr>
        <td>Subject</td>
        <td><input type="text" name="subject" id="subject"  onkeyup="checkEmpty('subject','subjectErr');" size="100" class="form-control">
          <div id="subjectErr"></div></td>
      </tr>
      <tr>
        <td valign="top">Description</td>
        <td><div class="alert alert-success">You must enter description !!</div>
    <textarea name="bookingreplydescription" id="bookingreplydescription" class="form-control required"><?php echo @$row->description;?></textarea>
    </td>
      </tr>
      
       <tr>
       <td></td>
        <td>
        <input type="hidden" name="url_back" value="<?php echo $url_back; ?>" />
          <input type="image" src="images/save.png" alt="Save" title="Save" name="Save" border="0" class="btn btn-primary">
          <input type="button" value="Cancel" class="btn btn-primary" onclick="window.location.href='index.php?_page=bookingpage&mod=booking';" /></td>
      </tr>
      
    </table>
     
    </form>
</div>
    </div>
  </div>
</div>
</script>
<script type="text/javascript">$(document).ready( function(){ $("#subject").focus(); });</script> 
<script type="text/javascript" src="<?php echo base_url(APPLICATIONS.'ckeditor/ckeditor.js'); ?>"></script> 
<script type="text/javascript" src="<?php echo base_url(APPLICATIONS.'ckfinder/ckfinder.js'); ?>"></script> 
<script>
autosize(document.querySelectorAll('textarea'));
var base_url =  "<?php echo base_url(); ?>";
CKEDITOR.replace( 'bookingreplydescription',
    {   extraPlugins : 'autogrow',
		autoGrow_maxHeight : 800,
		// Remove the Resize plugin as it does not make sense to use it in conjunction with the AutoGrow plugin.
		removePlugins : 'resize',
        filebrowserBrowseUrl : base_url+'assets/ckfinder/ckfinder.html',
        filebrowserImageBrowseUrl : base_url+'assets/ckfinder/ckfinder.html?Type=Images',
        filebrowserFlashBrowseUrl : base_url+'assets/ckfinder/ckfinder.html?Type=Flash',
        filebrowserUploadUrl : base_url+'assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        filebrowserImageUploadUrl : base_url+'assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
        filebrowserFlashUploadUrl : base_url+'assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
    });
	
</script> 