<?php
include("page/setAndCheckAll.php");
$view  = isset( $_GET['action'] ) ? $_GET['action'] : "";
		if($view  == 'view')
		{
		  $id   =   $_GET['aid'];
		    $rowEdit =  $funAdvertsObj  -> advertisementAcceptSel($id);
			
			$row_advertType  =  $funAdvertsObj->adverTypeSel( $rowEdit->advert_type );
			
									

			?>
			<div class="tblform">
	<table width="100%" border="0" cellpadding="1" cellspacing="1" class="table_head_css" >
  <tr >
  <td><div style="width:300px;float:left;font-weight:bold;font-size:13px;padding-left:5px;">Details [ Advertisement ]</div>
  <div style="text-align:left;float:right;"><a href="index.php?_page=addeditAdvertisementFromAdmin&action=edit&aid=<?php echo $rowEdit->id; ?>&mod=<?php echo $module; ?>">Edit</a>&nbsp; | <a href="<?Php echo $_SERVER['HTTP_REFERER']; ?>">Back</a>&nbsp;</div><div style="clear:both;"></div>
        </td>
  </tr>
  </table>
<table width="850" border="0" cellpadding="1" cellspacing="1"> 
    <tr >
  <td valign="top" class="oddrowfirst">Advertisement Type</td>
    <td class="oddrowsecond"><?php echo  (!is_null($rowEdit))? $row_advertType->advert_name : ""; ?></td>
    
  </tr>
  
   <tr >
    <td class="evenrowfirst">Message</td>
    <td class="evenrowsecond"><?php echo (!is_null($rowEdit))? $rowEdit->message : ""; ?>
	</td>
  </tr>
  <tr >
    <td class="oddrowfirst">Image</td>
    <td class="oddrowsecond"><?php 
	 $img =  (!is_null($rowEdit))? $rowEdit->image : "";
						 $imgrootpath = "../images/advertisement/"; 
						 if(file_exists($imgrootpath.$img)  and !empty($img))
	 {
	 ?>
	 <a href="<?php echo $imgrootpath.$img; ?>" rel="lytebox[advert]">
	 <img src="../<?php echo APPLICATIONS; ?>phpthumb/phpthumb.php?src=../../<?php echo ADMINISTRATOR."/".$imgrootpath.$img; ?>&h=100&w=100&aoe=1"  border="0"/>
	 </a>
	 <?php
	 }
	 ?>

	</td>
  </tr>
  
   
  <tr >
  <td valign="top" class="oddrowfirst">Expire Date</td>
    <td class="oddrowsecond"><?php echo  (!is_null($rowEdit))? $rowEdit->expiredate : ""; ?></td>
    
  </tr>
  
   <tr >
    <td class="evenrowfirst">Price</td>
    <td class="evenrowsecond"><?php echo (!is_null($rowEdit))? $rowEdit->payment : ""; ?>
	</td>
  </tr>
    
   </table>
</div>			
<?php	} ?>