<?php
include("page/setAndCheckAll.php");
include("page/mod_setAndCheckAll/setToken.php");
$action    = isset( $_GET['action'] ) ? $_GET['action'] : "";
$aid       = isset( $_GET['aid'] ) ? $_GET['aid'] : ""; 
$url_back  = $_SERVER['HTTP_REFERER'];
$rowEdit   = $funSettingObj -> emailTempSettingSel($aid);
?>
<script>$(document).ready( function(){ $("#email_title").focus(); });

function checkDuplicate(email_title)
{
           $.ajax({
		   type: "POST",
		   url: "page/mod_<?php echo $module; ?>/ajaxSetting.php",
		   data: { email_title:email_title,mod_setting:"emailTemp" },
		   success: function(msg){
			  if(msg!=""){ $("#email_title").val(msg).fadeOut(500).fadeIn(500);}	
		   }
		 });


}
</script>

<div class="tblform">
  <form action="page/mod_<?php echo $module; ?>/actEmailTemp.php?aid=<?php echo $aid; ?>&action=<?php echo urlencode($action); ?>" method="post" onsubmit="return emailTemp();" id="emailTempForm">
  <input type="hidden" name="mytoken" value="<?php echo $mytoken; ?>"  />
    <table width="100%" border="0" cellpadding="1" cellspacing="1" class="table_head_css" >
      <tr >
        <td><strong> Email Templete <?php echo ($action=='add')?" < <em class='add'>Add</em> > ":" < <em class='edit'>Edit</em> >"; ?> </strong> </td>
        <td align="right">
         <input type="hidden" name="url_back" value="<?php echo $url_back; ?>" />
          <input type="image" src="images/save.png" alt="Save" title="Save" name="Save" border="0">
          <img src="images/cancel.png" alt="cancel" title="cancel" class="cp" border="0" style="margin-top:-30px"  onclick="window.location.href='index.php?_page=emailTemplete&mod=setting'"/></td>
      </tr>
    </table>
    <table width="100%" border="0" cellpadding="1" cellspacing="1">
      <tr>
        <td width="200">Title</td>
        <td>
        <input type="text" name="email_title" id="email_title" value="<?php echo (!is_null($rowEdit))? $rowEdit->email_title:""; ?>" onkeyup="checkEmpty('email_title','email_titleErr');" <?php echo !empty($rowEdit->email_title)?"disabled":$rowEdit->email_title;?> onblur="checkDuplicate(this.value);">
        <input type="hidden" name="previous_email_title" id="previous_email_title" value="<?php echo (!is_null($rowEdit))? $rowEdit->email_title:""; ?>" />
          <span id="email_titleErr" class="errorClass">
		  </span></td>
      </tr>
      <tr>
        <td valign="top">Description</td>
        <td>
        <?php 	$funNoticeObj->fckEditor("description", (!is_null($rowEdit))? $rowEdit->description:"","../applications/"); ?>
          </td>
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
