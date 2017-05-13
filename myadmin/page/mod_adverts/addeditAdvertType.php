<?php
include("page/setAndCheckAll.php");
include("page/mod_setAndCheckAll/setToken.php");
$action    = isset( $_GET['action'] ) ? $_GET['action'] : "";
$aid       = isset( $_GET['aid'] ) ? $_GET['aid'] : ""; 
$url_back  = $_SERVER['HTTP_REFERER'];
$rowEdit   = $funAdvertsObj -> adverTypeSel($aid);
?>
<script>$(document).ready( function(){ $("#configname").focus(); });</script>

<div class="tblform">
  <form action="page/mod_<?php echo $module; ?>/actAdvertType.php?aid=<?php echo $aid; ?>&action=<?php echo urlencode($action); ?>" method="post" onsubmit="return advertType();" id="advertType">
  <input type="hidden" name="mytoken" value="<?php echo $mytoken; ?>"  />
    <table width="880" border="0" cellpadding="1" cellspacing="1" class="table_head_css" >
      <tr >
        <td  ><strong>Advertisement Type Name  <?php echo ($action=='add')?" < <em class='add'>Add</em> > ":" < <em class='edit'>Edit</em> >"; ?> </strong></td>
        
      <td align="right" >     <input type="hidden" name="url_back" value="<?php echo $url_back; ?>" />
          <input type="image" src="images/save.png" alt="Save" title="Save" name="Save" border="0">
          <img src="images/cancel.png" alt="cancel" title="cancel" class="cp" border="0" style="margin-top:-30px"  onclick="window.location.href='index.php?_page=advertList&mod=adverts'"/></td>
      </tr>
    </table>
    <table width="880" border="0" cellpadding="1" cellspacing="1">
      <tr>
        <td width="200">Advertisement Type Name</td>
        <td><input type="text" name="advert_name" id="advert_name" value="<?php echo (!is_null($rowEdit))? $rowEdit->advert_name:""; ?>" onkeyup="checkEmpty('advert_name','advert_nameErr');">
          <span id="advert_nameErr"></span></td>
      </tr>
     
     <tr>
        <td>Status </td>
        <td><select name="status" id="status" onchange=checkEmpty('status','statusErr');"">
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
