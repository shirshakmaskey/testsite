<div class="row">
  <div class="col-sm-12">
    <div class="panel">
<?php
include("page/setAndCheckAll.php");
include("page/mod_setAndCheckAll/setToken.php");
$aid  =   isset($_REQUEST['aid'])?decode($_REQUEST['aid']):0;
if(!empty($aid)){
$rowEdit   = $funSettingObj -> seopagesel($aid);
} else{ 
	  $rf = $funCustomerObj->table_fields('tbl_seo');		
	  if($rf){if($db->total_rows($rf)>0){while($rowfield=$db->fetch_array($rf)){@$rowEdit->{$rowfield['Field']}='';}}}
	  }//elseclose
?>


<script>$(document).ready( function(){ $("#metasubject").focus(); });</script>
<div class="panel-heading"> <span class="panel-title">Seo Page</span> </div>
      <div class="panel-body">
      
  <form action="<?php echo base_url("$administrator/page/mod_$module/actSeopage.php"); ?>" method="post" onsubmit="return seopage();" class="form-horizontal" role="form">
  <input type="hidden" name="mytoken" value="<?php echo $mytoken; ?>"  />
          <input type="hidden" name="hidden_id" id="hidden_id" value="<?php echo @encode($aid); ?>" />
	<table width="100%" border="0" cellpadding="1" cellspacing="1" class="table table-bordered">
      <tr>
        <td>Meta Subject</td>
        <td><div class="col-lg-8"><input type="text" name="metasubject" id="metasubject"  onkeyup="checkEmpty('metasubject','metasubjectErr');" value="<?php echo $rowEdit->metasubject; ?>" class="form-control"></div><span id="metasubjectErr"></span></td>
      </tr>
	  <tr>
        <td valign="top">Keywords</td>
        <td><div class="col-lg-8"><textarea name="keywords" id="keywords" rows="4" cols="50" onkeyup="checkEmpty('keywords','keywordsErr');" class="form-control"><?php echo $rowEdit->keywords; ?></textarea></div>
          <span id="keywordsErr"></span></td>
      </tr>
      <tr>
        <td valign="top">Meta Keywords</td>
        <td><div class="col-lg-8"><textarea name="metakeyword" id="metakeyword" rows="4" cols="50" onkeyup="checkEmpty('metakeyword','metakeywordErr');" class="form-control"><?php echo $rowEdit->metakeyword; ?></textarea></div>
          <span id="metakeywordErr"></span></td>
      </tr>
      <tr>
        <td valign="top">Meta Description</td>
        <td><div class="col-lg-8"><textarea name="metadesc" id="metadesc" rows="4" cols="50" onkeyup="checkEmpty('metadesc','metadescErr');" class="form-control"><?php echo $rowEdit->metadesc; ?></textarea></div>
          <span id="metadescErr"></span></td>
      </tr>
      <tr>
        <td valign="top">Meta Abstracts</td>
        <td><div class="col-lg-8"><textarea name="metaabstract" id="metaabstract" rows="4" cols="50" onkeyup="checkEmpty('metaabstract','metaabstractErr');" class="form-control"><?php echo $rowEdit->metaabstract; ?></textarea></div>
          <span id="metaabstractErr"></span></td>
      </tr>
      <tr>
        <td valign="top">Meta KeyPhrase</td>
        <td><div class="col-lg-8"><textarea name="metakeyphrase" id="metakeyphrase" rows="4" cols="50" onkeyup="checkEmpty('metakeyphrase','metakeyphraseErr');" class="form-control"><?php echo $rowEdit->metakeyphrase; ?></textarea></div>
          <span id="metakeyphraseErr"></span></td>
      </tr>
      <tr>
        <td valign="top">Meta Clasification</td>
        <td><div class="col-lg-8"><textarea name="metaclassification" id="metaclassification" rows="4" cols="50" onkeyup="checkEmpty('metaclassification','metaclassificationErr');" class="form-control"><?php echo $rowEdit->metaclassification; ?></textarea></div>
          <span id="metaclassificationErr"></span></td>
      </tr>
      <tr>
        <td valign="top">Copyright</td>
        <td><div class="col-lg-8"><input type="text" name="copyright" id="copyright" value="<?php echo $rowEdit->copyright; ?>" onkeyup="checkEmpty('copyright','copyrightErr');" class="form-control"></div>
          <span id="copyrightErr"></span></td>
      </tr>
      <tr>
        <td valign="top">Meta Catagory</td>
        <td><div class="col-lg-8"><textarea name="metacatagory" id="metacatagory" rows="4" cols="50" onkeyup="checkEmpty('metacatagory','metacatagoryErr');" class="form-control"><?php echo $rowEdit->metacatagory; ?></textarea></div>
          <span id="metacatagoryErr"></span></td>
      </tr>
      <tr>
        <td valign="top">Reply To</td>
        <td><div class="col-lg-8"><input type="text" name="replyto" id="replyto" value="<?php echo $rowEdit->reply_to; ?>" onkeyup="checkEmpty('replyto','replytoErr');" class="form-control"></div>
          <span id="replytoErr"></span></td>
      </tr>
      <tr>
        <td valign="top">Author</td>
        <td><div class="col-lg-8"><input type="text" name="author" id="author" value="<?php echo $rowEdit->author; ?>" onkeyup="checkEmpty('author','authorErr');" class="form-control"></div>
          <span id="authorErr"></span></td>
      </tr>
      <tr>
			<td>&nbsp;</td><td><input type="submit" name="submitBtn" id="submitBtn" class="btn btn-primary" value="Save"  />
				<input type="button" name="cancelBtn" class="btn btn-primary" value="Cancel" onclick="window.location.href='seopage-<?php echo $module;?>'"  /></td>
		</tr>
    </table>
  </form>
</div>
