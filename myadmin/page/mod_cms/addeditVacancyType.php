<?php 
include("page/setAndCheckAll.php");
include("page/mod_setAndCheckAll/setToken.php");
$action    = isset( $_GET['action'] ) ? $_GET['action'] : "";
if($action=='edit')
{ $aid       = isset( $_GET['aid'] ) ? $_GET['aid'] : ""; 
$rowEdit   = $funCmsObj -> vacancyTypeSel($aid); }
$url_back  = $_SERVER['HTTP_REFERER']; 
?>
<script>$(document).ready( function(){ $("#pagename").focus(); });</script>

<div class="tblform">
  <form action="page/mod_<?php echo $module; ?>/actVacancyTypepage.php?<?php echo ($action=='edit')?"aid=".urlencode($aid):""; ?>&action=<?php echo urlencode($action); ?>" method="post" onsubmit="return vacancyTypeCheck();"> 
<input type="hidden" name="mytoken" value="<?php echo $mytoken; ?>"  />
    <table width="100%" border="0" cellpadding="1" cellspacing="1" class="table_head_css" >
      <tr >
        <td><strong> Vacancy Type <?php echo ($action=='add')?" < <em class='add'>Add</em> > ":" < <em class='edit'>Edit</em> >"; ?></strong> </td>
         <td align="right" > 
        <input type="hidden" name="url_back" value="<?php echo $url_back; ?>" />
          <input type="image" src="images/save.png" alt="Save" title="Save" name="Save" border="0">
          <img src="images/cancel.png" alt="cancel" title="cancel" class="cp" border="0" style="margin-top:-30px"  onclick="window.location.href='index.php?_page=vacancy_type&mod=cms'"/> </td>
      </tr>
    </table>
    <table width="100%" border="0" cellpadding="1" cellspacing="1">
      <tr>
        <td width="200">Vacancy Type Name</td>
        <td><input type="text" name="vacancy_type_name" id="vacancy_type_name" value="<?php echo (!is_null($rowEdit))? $rowEdit->vacancy_type_name:""; ?>" onkeyup="checkEmpty('vacancy_type_name','vacancy_type_nameErr');">
          <span id="vacancy_type_nameErr"></span></td>
      </tr>
      <tr >
        <td valign="top">Description</td>
        <td ><span id="vacancy_type_descriptionErr"></span><br />
        <textarea name="vacancy_type_description" id="vacancy_type_description" rows="10"
cols="60" onkeyup="checkEmpty('vacancy_type_description','vacancy_type_descriptionErr');"><?php echo (!is_null($rowEdit))? $rowEdit->vacancy_type_description:""; ?></textarea>
          <tr>
          
          <tr>
              <td>Status</td>
              <td><select name="status" id="status" onchange="checkEmpty('status','statusErr');" >
                  <option value="-1">select status</option>
                  <option value="1" <?php echo ($rowEdit->status==1)?"selected":"";?>>Active</option>
                  <option value="0" <?php echo ($rowEdit->status==0)?"selected":"";?>>Inactive</option>
                </select>
                <span id="statusErr"></span>
                
                </td>
            </tr></td>
      </tr>
      
    </table>
  </form>
</div>
