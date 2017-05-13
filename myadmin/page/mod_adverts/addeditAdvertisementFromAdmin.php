<?php
include("page/setAndCheckAll.php");
include("page/mod_setAndCheckAll/setToken.php");
$action    = isset( $_GET['action'] ) ? $_GET['action'] : "";
$aid       = isset( $_GET['aid'] ) ? $_GET['aid'] : ""; 
$url_back  = $_SERVER['HTTP_REFERER'];

$rowEdit   = $funAdvertsObj -> advertisementRequestSel($aid); 
?> 
 
<div class="tblform">
  <form action="page/mod_<?php echo $module; ?>/act_advertAcceted.php?aid=<?php echo $aid; ?>&action=<?php echo urlencode($action); ?>" method="post" onsubmit="return advertisementCheck();" enctype="multipart/form-data">
  <input type="hidden" name="mytoken" value="<?php echo $mytoken; ?>"  />
    <table width="100%" border="0" cellpadding="1" cellspacing="1" class="table_head_css" >
      <tr >
        <td><strong> Advertisement <?php echo ($action=='add')?" < <em class='add'>Add</em> > ":" < <em class='edit'>Edit</em> >"; ?></strong> </td>
         <td align="right" > 
        <input type="hidden" name="url_back" value="<?php echo $url_back; ?>" />
          <input type="image" src="images/save.png" alt="Save" title="Save" name="Save" border="0">
          <img src="images/cancel.png" alt="cancel" title="cancel" class="cp" border="0" style="margin-top:-30px"  onclick="window.location.href='index.php?_page=advertiseAccepted&mod=adverts'"/> </td>
      </tr>
    </table>
    <table width="100%" border="0" cellpadding="1" cellspacing="1">
   
      <tr>
        <td>Type</td> 
        <td><select name="advert_type" id="advert_type" onchange="checkEmpty('advert_type','advert_typeErr');">
          <option value="-1">Choose Type</option>
          <?php 
		  $resAdvertType  =  $funAdvertsObj->advertTypeLists();
		  while( $rowAdvertType  =  $funAdvertsObj->fetch_array( $resAdvertType ))   
		   { ?>
           <option value="<?php echo  $rowAdvertType['id']; ?>"  <?php  echo ($rowAdvertType['id']==$rowEdit->advert_type)?"selected":""?> ><?php  echo  $rowAdvertType['advert_name']; ?> </option>
          <?php } ?>
        </select>
          <span id="advert_typeErr"></span></td>
      </tr>
      
      <?php
	  if($action=='edit')
	  { 
	  ?>
      <tr >
    <td class="oddrowfirst">Image</td>
    <td class="oddrowsecond"><?php 
	 $img =  (!is_null($rowEdit))? $rowEdit->image : "";
						 $imgrootpath = "../images/advertisement/"; 
						 if(file_exists($imgrootpath.$img)  and !empty($img))
	 {
	 ?>
	 <a href="<?php echo $imgrootpath.$img; ?>" rel="lytebox[advert]">
	 <img src="../<?php echo APPLICATIONS; ?>phpthumb/phpthumb.php?src=../../<?php echo ADMINISTRATOR."/".$imgrootpath.$img; ?>&h=200&w=200&aoe=1"  border="0"/>
	 </a>
	 <?php
	 }
	 ?>

	</td>
  </tr>
      <?php } ?>
    
      <tr>
        <td width="150">Advertisement Image</td>
        <td><input type="file" name="image" id="image" />
        
          <span id="imageErr"></span>
           <input type="hidden" name="old_image" id="old_image"  value="<?php echo $rowEdit->image; ?>"  />
          </td>
      </tr> 
   
     
      
      <tr>
        <td>Price</td>
        <td><input type="text" name="payment" id="payment"  onkeyup="checkEmpty('payment','paymentErr');" value="<?php echo (!is_null($rowEdit))? $rowEdit->payment:""; ?>">
          <span id="paymentErr"></span></td>
      </tr>
      <tr>
        <td>Url</td>
        <td><input type="text" name="advert_url" id="advert_url"  onkeyup="checkEmpty('advert_url','advert_urlErr');" value="<?php echo (!is_null($rowEdit))? $rowEdit->advert_url:""; ?>">&nbsp;&nbsp; eg: http://google.com
          <span id="advert_urlErr"></span></td>
      </tr>
           
      <tr>
        <td>Expire Date</td>
        <td><input type="text" name="expiredate" id="expiredate"  onkeyup="checkEmpty('expiredate','expiredateErr');" value="<?php echo (!is_null($rowEdit))? $rowEdit->expiredate:""; ?>" maxlength="10">
        
         <span>
            <img src="../applications/calender/cal.gif" id="calendar-triggerDAte"></span>
       <script>			
        Calendar.setup({
		trigger    : "calendar-triggerDAte",
		dateFormat: "%Y-%m-%d",
        inputField : "expiredate",
		min: <?php echo date("Ymd"); ?>,
        max: <?php 
		$y = date("Y")+1;
		$m = date("m");
		$d = date("d");
		echo $y.$m.$d; ?>,
		onSelect   : function() { this.hide() }
			
    });
</script>
          <span id="expiredateErr"></span></td>
      </tr>
      
      <tr>
        <td colspan="2"> Description<br />
          <br />
          <?php 	$funAdvertsObj->fckEditor("message", (!is_null($rowEdit))? $rowEdit->message:"","../applications/"); ?></td>
      </tr>
      
      
             
    </table>
  </form>
</div>
