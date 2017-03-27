<?php
include("page/setAndCheckAll.php");
include("page/mod_setAndCheckAll/setToken.php");
$action    = isset( $_GET['action'] ) ? $_GET['action'] : "";
$aid       = isset( $_GET['aid'] ) ? $_GET['aid'] : ""; 
$url_back  = $_SERVER['HTTP_REFERER'];

$rowEdit   = $funLinkObj -> linkSel($aid); 
?>
<script language="javascript" src="page/mod_<?php echo $module; ?>/link.js"></script>

<div class="tblform">
	<form action="page/mod_<?php echo $module; ?>/actLink.php?aid=<?php echo $aid; ?>&amp;action=<?php echo urlencode($action); ?>" method="post" onsubmit="return linkCheck();" enctype="multipart/form-data">
		<input type="hidden" name="mytoken" value="<?php echo $mytoken; ?>"  />
		<table width="100%" border="0" cellpadding="1" cellspacing="1" class="table_head_css" >
			<tr >
				<td><strong> Links <?php echo ($action=='add')?" < <em class='add'>Add</em> > ":" < <em class='edit'>Edit</em> >"; ?></strong></td>
				<td align="right" ><input type="hidden" name="url_back" value="<?php echo $url_back; ?>" />
					<input type="image" src="images/save.png" alt="Save" title="Save" name="Save" border="0">
					<img src="images/cancel.png" alt="cancel" title="cancel" class="cp" border="0" style="margin-top:-30px"  onclick="window.location.href='index.php?_page=index&mod=link'"/></td>
			</tr>
		</table>
		<table width="100%" border="0" cellpadding="1" cellspacing="1">
			<tr>
				<td width="150">Title</td>
				<td><input type="text" name="link_title" id="link_title" value="<?php echo (!is_null($rowEdit))? $rowEdit->link_title:""; ?>" onkeyup="checkEmpty('link_title','link_titleErr');" size="30">
					<span id="link_titleErr"></span></td>
			</tr>
			<tr>
				<td width="150">Link Url</td>
				<td><input type="text" name="link_url" id="link_url" value="<?php echo (!is_null($rowEdit))? $rowEdit->link_url:""; ?>" onkeyup="checkEmpty('link_url','link_urlErr');" size="30">
					<span id="link_urlErr"></span></td>
			</tr>
			<tr>
				<td width="150" valign="top">Description</td>
				<td><span id="link_descErr"></span><br />
					<textarea rows="10" cols="70" name="link_desc" id="link_desc" onkeyup="checkEmpty('link_desc','link_descErr');"  ><?php echo (!is_null($rowEdit))? $rowEdit->link_desc:""; ?></textarea>
					<span id="link_descErr"></span></td>
			</tr>
			<tr>
				<td>Status </td>
				<td><select name="status" id="status" onchange="checkEmpty('status','statusErr');">
						<option value="-1" >Select Status</option>
						<?php $status  = (!is_null($rowEdit))? $rowEdit->status : ""; ?>
						<option value="1" <?php echo ($status=='1')?"selected":""; ?>>Active</option>
						<option value="0" <?php echo ($status=='0')?"selected":""; ?>>Inactive</option>
					</select>
					<span id="statusErr"></span></td>
			</tr>
		</table>
	</form>
</div>
