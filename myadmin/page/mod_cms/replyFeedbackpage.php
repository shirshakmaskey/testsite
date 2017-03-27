<?php
include("page/setAndCheckAll.php");
include("page/mod_setAndCheckAll/setToken.php");
?>
<?php
$action    = $_GET['action'];
$url_back  = $_SERVER['HTTP_REFERER'];
$aid       = $_GET['aid'];
$couty     = isset($_GET['couty']) ? $_GET['couty'] :'';
if(isset($_POST['selected']) and count($_POST['selected'])==1)
{ $aid  =  $_POST['selected'][0]; }
$rowEdit   = $funCmsObj -> feedPageSel($aid);

?>
<script>$(document).ready( function(){ $("#subject").focus(); });</script>

<div class="tblform">
  <form action="page/mod_cms/actFeedbackpage.php?aid=<?php echo urlencode($aid); ?>&action=<?php echo urlencode($action); ?>" method="post" onsubmit="return feedbackpage();">
  <input type="hidden" name="mytoken" value="<?php echo $mytoken; ?>"  />
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
    <table width="100%" border="0" cellpadding="1" cellspacing="1" class="table_head_css" >
      <tr >
        <td><strong> Reply to <?php echo ($aid!='')?" < <em class='add'>".$rowEdit->fullname."</em> > ":" < <em class='edit'>All</em> >"; ?> </strong> </td>
        <td align="right">
        <input type="hidden" name="url_back" value="<?php echo $url_back; ?>" />
          <input type="submit" alt="Save" title="Save" name="Save" border="0" value="Save" class="btn btn-primary">
          <a href="index.php?_page=feedbackpage&mod=cms" class="btn btn-primary">Back</a> </td>
      </tr>
    </table>
    <table width="100%" border="0" cellpadding="1" cellspacing="1">
      <tr>
        <td>Subject</td>
        <td><input type="text" name="subject" id="subject" onkeyup="checkEmpty('subject','subjectErr');" size="100">
          <span id="subjectErr"></span></td>
      </tr>
      <tr>
        <td valign="top">Description</td>
        <td><div>You must enter description !!</div>
	<textarea name="feedbackreplydescription" id="feedbackreplydescription"></textarea>
	</td>
      </tr>
    </table>
  </form>
</div>
<script type="text/javascript" src="<?php echo base_url(APPLICATIONS.'ckeditor/ckeditor.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url(APPLICATIONS.'ckfinder/ckfinder.js'); ?>"></script>
<script>
var base_url =  "<?php echo base_url(); ?>";
CKEDITOR.replace( 'feedbackreplydescription',
    {   height:500,
        filebrowserBrowseUrl : base_url+'assets/ckfinder/ckfinder.html',
        filebrowserImageBrowseUrl : base_url+'assets/ckfinder/ckfinder.html?Type=Images',
        filebrowserFlashBrowseUrl : base_url+'assets/ckfinder/ckfinder.html?Type=Flash',
        filebrowserUploadUrl : base_url+'assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        filebrowserImageUploadUrl : base_url+'assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
        filebrowserFlashUploadUrl : base_url+'assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
    });
</script>