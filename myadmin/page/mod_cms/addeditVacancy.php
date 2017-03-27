<?php
include("page/setAndCheckAll.php");
include("page/mod_setAndCheckAll/setToken.php");
$action  = isset($_GET['action'])?$_GET['action']:"";
$url_back  = $_SERVER['HTTP_REFERER'];
$aid       = $_GET['aid'];
$rowEdit   = $funCmsObj -> vacancySel($aid);
?>
<script>$(document).ready( function(){ $("#firstname").focus(); });</script>

<div class="tblform">
 <form action="page/mod_<?php echo $module; ?>/actVacancy.php?<?php echo ($action=='edit')?"aid=".urlencode($aid):""; ?>&action=<?php echo urlencode($action); ?>" method="post" onsubmit="return vacancyCheck();"> 
  <input type="hidden" name="mytoken" value="<?php echo $mytoken; ?>"  />
    <table width="100%" border="0" cellpadding="1" cellspacing="1" class="table_head_css" >
     
      <tr >
        <td><strong> Vacancy <?php echo ($action=='add')?" < <em class='add'>Add</em> > ":" < <em class='edit'>Edit</em> >"; ?></strong> </td>
        <td align="right">
        <input type="hidden" name="url_back" value="<?php echo $url_back; ?>"  />
          <input type="image" src="images/save.png" alt="Save" title="Save" name="Save" border="0">
          <img src="images/cancel.png" alt="cancel" title="cancel" class="cp" border="0" style="margin-top:-30px"  onclick="index.php?_page=vacancy&mod=cms"/></td>
      </tr>
    </table>
    <table width="100%" border="0" cellpadding="1" cellspacing="1">
     <tr>
        <td width="200">Vacancy type</td>
        <td><span id="vacancy_type_idErr"></span>
        <select name="vacancy_type_id" id="vacancy_type_id" onchange="checkEmpty('vacancy_type_id','vacancy_type_idErr');">
        <option value="-1">Choose Type</option>
        <?php 
		$resultVacancyType  =  $funCmsObj->selectAllVacancyType();
		while($rowVacancyType  = $funCmsObj->fetch_object($resultVacancyType))
		{
		?>
        <option value="<?php echo $rowVacancyType->id; ?>" <?php echo ($rowVacancyType->id==$rowEdit->vacancy_type_id)?"selected":""; ?>><?php echo $rowVacancyType->vacancy_type_name; ?></option>
        <?php } ?>
        </select>
        </td>
      </tr>
      <tr>
        <td width="150">Vacancy Title</td>
        <td><input type="text" name="vacancy_title" id="vacancy_title" value="<?php echo $rowEdit->vacancy_title; ?>" onkeyup="checkEmpty('vacancy_title','vacancy_titleErr');">
          <span id="vacancy_titleErr"></span></td>
      </tr>
      <tr>
        <td width="150">Number</td>
        <td><input type="text" name="vacancy_number" id="vacancy_number" value="<?php echo $rowEdit->vacancy_number; ?>" onkeyup="checkEmpty('vacancy_number','vacancy_numberErr');">
          <span id="vacancy_numberErr"></span></td>
      </tr>
       
           
       <tr>
        <td width="150" valign="top">Description</td>
        <td>
        <span id="vacancy_descriptionErr"></span><br />
        <textarea name="vacancy_description" id="vacancy_description" rows="20" cols="70" onkeyup="checkEmpty('vacancy_description','vacancy_descriptionErr');"><?php echo $rowEdit->vacancy_description; ?></textarea>
          </td>
      </tr>
       <tr>
        <td width="150">Start Date</td>
        <td><input type="text" name="started_date" id="started_date" value="<?php echo $rowEdit->started_date; ?>" onkeyup="checkEmpty('started_date','started_dateErr');">
        
   	  <span>
            <img src="../applications/calender/cal.gif" id="calendar-trigger1"></span>
       <script>			
        Calendar.setup({
		trigger    : "calendar-trigger1",
		dateFormat: "%Y-%m-%d",
        inputField : "started_date",
		min: 19500408,
        max: <?php 
		$y = date("Y")+1;
		$m = date("m");
		$d = date("d");
		echo $y.$m.$d; ?>,
		onSelect   : function() { this.hide() }
			
    });
</script>
          <span id="started_dateErr"></span></td>
      </tr>
       <tr>
        <td width="150">Expire Date</td>
        <td><input type="text" name="expire_date" id="expire_date" value="<?php echo $rowEdit->expire_date; ?>" onkeyup="checkEmpty('expire_date','expire_dateErr');">
        
   	  <span>
            <img src="../applications/calender/cal.gif" id="calendar-trigger"></span>
       <script>			
        Calendar.setup({
		trigger    : "calendar-trigger",
		dateFormat: "%Y-%m-%d",
        inputField : "expire_date",
		min: 19500408,
        max: <?php 
		$y = date("Y")+1;
		$m = date("m");
		$d = date("d");
		echo $y.$m.$d; ?>,
		onSelect   : function() { this.hide() }
			
    });
</script>
          <span id="expire_dateErr"></span></td>
      </tr>
        
     
      <tr>
              <td>Status</td>
              <td><select name="status" id="status" onchange="checkEmpty('status','statusErr');" >
                  <option value="-1">select status</option>
                  <option value="1" <?php echo ($rowEdit->status==1)?"selected":"";?>>Active</option>
                  <option value="0" <?php echo ($rowEdit->status==0)?"selected":"";?>>Inactive</option>
                </select>
                <span id="statusErr"></span>
                
                </td>
            </tr>
           
    </table>
  </form>
</div>
