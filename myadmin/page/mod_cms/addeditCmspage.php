<?php 
include("page/setAndCheckAll.php");
include("page/mod_setAndCheckAll/setToken.php");
$action    = isset( $_GET['action'] ) ? $_GET['action'] : "";
if($action=='edit')
{ $aid       = isset( $_GET['aid'] ) ? $_GET['aid'] : ""; 
$rowEdit   = $funCmsObj -> cmsPageSel($aid); }
$url_back  = $_SERVER['HTTP_REFERER'];
?>
<script language="javascript" src="page/mod_<?Php echo $module;?>/CmsPage.js"></script>
<script>$(document).ready( function(){ $("#pagename").focus(); });</script>

<div class="tblform">
  <form action="page/mod_cms/actCmspage.php?action=<?php echo urlencode($action); ?><?php echo ($action=='edit')?"&aid=".urlencode($aid):""; ?>" method="post" onsubmit="return cmspage();">
<input type="hidden" name="mytoken" value="<?php echo $mytoken; ?>"  />
    <table width="100%" border="0" cellpadding="1" cellspacing="1" class="table_head_css" >
      <tr >
        <td><strong> Cms Page <?php echo ($action=='add')?" < <em class='add'>Add</em> > ":" < <em class='edit'>Edit</em> >"; ?></strong> </td>
         <td align="right" > 
        <input type="hidden" name="url_back" value="<?php echo $url_back; ?>" />
          <input type="image" src="images/save.png" alt="Save" title="Save" name="Save" border="0">
          <img src="images/cancel.png" alt="cancel" title="cancel" class="cp" border="0" style="margin-top:-30px"  onclick="window.location.href='index.php?_page=cmspage&mod=cms'"/> </td>
      </tr>
    </table>
    <table width="100%" border="0" cellpadding="1" cellspacing="1">
      <tr>
        <td>Page Name</td>
        <td><input type="text" name="pagename" id="pagename" value="<?php echo (!is_null($rowEdit))? $rowEdit->pagename:""; ?>" onkeyup="checkEmpty('pagename','pagenameErr');">
          <span id="pagenameErr"></span></td>
      </tr>
      <tr>
        <td>Page Title</td>
        <td><input type="text" name="pagetitle" id="pagetitle" value="<?php echo (!is_null($rowEdit))? $rowEdit->pagetitle:""; ?>" onkeyup="checkEmpty('pagetitle','pagetitleErr');">
          <span id="pagetitleErr"></span></td>
      </tr>
      <tr>
        <td colspan="2"> Page Description<br />
          <br />
       <textarea name="pagedescription" id="pagedescription"><?php echo (!is_null($rowEdit))? $rowEdit->pagedescription:""; ?></textarea>
          </td>
      </tr>
      <tr>
        <td>Meta Subject</td>
        <td><input type="text" name="metasubject" id="metasubject"  onkeyup="checkEmpty('metasubject','metasubjectErr');" value="<?php echo (!is_null($rowEdit))? $rowEdit->metasubject:""; ?>">
          <span id="metasubjectErr"></span></td>
      </tr>
      <tr>
        <td>Meta Keywords</td>
        <td><textarea name="metakeyword" id="metakeyword" rows="10" cols="50" onkeyup="checkEmpty('metakeyword','metakeywordErr');"><?php echo (!is_null($rowEdit))? $rowEdit->metakeyword:""; ?></textarea>
          <span id="metakeywordErr"></span></td>
      </tr>
      <tr>
        <td>Meta Description</td>
        <td><textarea name="metadesc" id="metadesc" rows="10" cols="50" onkeyup="checkEmpty('metadesc','metadescErr');"><?php echo (!is_null($rowEdit))?  $rowEdit->metadesc : ""; ?></textarea>
          <span id="metadescErr"></span></td>
      </tr>
    </table>
  </form>
</div>
<script type="text/javascript" src="<?php echo base_url(APPLICATIONS.'ckeditor/ckeditor.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url(APPLICATIONS.'ckfinder/ckfinder.js'); ?>"></script>
<script>
var base_url =  "<?php echo base_url(); ?>";
CKEDITOR.replace( 'pagedescription',
    {   height:500,
        filebrowserBrowseUrl : base_url+'assets/ckfinder/ckfinder.html',
        filebrowserImageBrowseUrl : base_url+'assets/ckfinder/ckfinder.html?Type=Images',
        filebrowserFlashBrowseUrl : base_url+'assets/ckfinder/ckfinder.html?Type=Flash',
        filebrowserUploadUrl : base_url+'assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        filebrowserImageUploadUrl : base_url+'assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
        filebrowserFlashUploadUrl : base_url+'assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
    });
</script>
