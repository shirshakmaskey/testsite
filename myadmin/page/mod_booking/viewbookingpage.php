<div class="row">
	<div class="col-sm-12">
		<div class="panel">
<?php
if(!isset($_SESSION['user_agent'])){echo "<script>window.location.href='http://google.com'</script>";}
$view  = $_GET['action']; if($view  == 'view'){ $id   =   $_GET['aid'];
$rowEdit =  $funBookingObj  -> bookingPageSel($id);
?>
<div class="panel-heading"><span class="panel-title">Details [<?php echo ucwords($rowEdit->fullname); ?>]</span> 

<div style="text-align:left;float:right;"><a href="page/mod_booking/getpdf.php?aid=<?php echo urlencode($id);?>" title="Get Pdf" target="_blank" class="btn btn-default">Pdf&nbsp;</a>&nbsp;<a href="<?Php echo $_SERVER['HTTP_REFERER']; ?>" class="btn btn-default">Back</a>&nbsp;<a href="index.php?_page=replyBookingpage&aid=<?php echo urlencode($id);?>&action=add&mod=booking" class="btn btn-default">Reply</a>&nbsp;<a href="page/mod_booking/actBookingpage.php?aid=<?php echo urlencode($id);?>&action=delete" onclick="return confirm('Are you sure you want to delete this row!!');" title="Delete" class="btn btn-default">Delete</a></div>
</div>
<div class="panel-body">
<table width="100%" border="0" cellpadding="1" cellspacing="1"  class="table table-bordered">
  <?php 
	                      $img = $rowEdit->image;
						  if(!empty($img))
						  {
							  ?>
       <tr >
      <td class="evenrowfirst" valign="top">Image</td>
      <td class="evenrowsecond"><?php 
	                      $img = $rowEdit->image;
						 $imgrootpath = "../images/frontUserImage/"; 
						 if(file_exists($imgrootpath.$img)  and !empty($img))
	 {
		 // $galImage  =  $funBookingObj->tep_image($imgrootpath.$img, '', '250', '', 'true', '' );
		 $galImage  = "<img src='../applications/phpthumb/phpthumb.php?src=../../images/frontUserImage/$img&aoe=1&h=200&w=200'  border='0'  >";	
	 ?>
        <a href="<?php echo $imgrootpath.$img; ?>" rel="lytebox[user]"> <?php echo $galImage; ?> </a>
        <?php
	 }
	 ?></td>
    </tr>
    <?php } ?>
	
    
    <tr >
      <td class="oddrowfirst" width="200">Fullname</td>
      <td class="oddrowsecond"><?php echo $rowEdit->fullname; ?></td>
    </tr>
     <tr >
      <td class="evenrowfirst">Address</td>
      <td class="evenrowsecond"><?php echo $rowEdit->address; ?></td>
    </tr>
    <tr >
      <td valign="top" class="oddrowfirst">Country</td>
      <td class="oddrowsecond"><?php 
	  $rowCountry = $funBookingObj->CountrySel($rowEdit->country);     
	  echo 	$country  =  $rowCountry->Country; ?></td>
    </tr>
    <tr >
      <td class="evenrowfirst">Email</td>
      <td class="evenrowsecond"><?php echo $rowEdit->email; ?></td>
    </tr>
     <tr >
      <td class="oddrowfirst">Phone</td>
      <td class="oddrowsecond"><?php echo $rowEdit->phone; ?></td>
    </tr>
     <tr >
      <td class="evenrowfirst">Mobile</td>
      <td class="evenrowsecond"><?php echo $rowEdit->mobile; ?></td>
    </tr>
    <tr >
      <td valign="top" class="oddrowfirst">Company</td>
      <td class="oddrowsecond"><?php echo  $rowEdit->company; ?></td>
    </tr>
    <tr >
      <td class="evenrowfirst">Description</td>
      <td class="evenrowsecond"><?php echo $rowEdit->description;  ?></td>
    </tr>
      <tr >
      <td valign="top" class="oddrowfirst">Airlines</td>
      <td class="oddrowsecond"><?php echo  $rowEdit->airlines; ?></td>
    </tr>
    <tr >
      <td class="evenrowfirst">Flight Number</td>
      <td class="evenrowsecond"><?php echo $rowEdit->flightno;  ?></td>
    </tr>
     <tr >
      <td valign="top" class="oddrowfirst">Notification</td>
      <td class="oddrowsecond"><?php echo  ($rowEdit->notify==1)?"Special offer Needed":"No"; ?></td>
    </tr>
    <tr >
      <td class="evenrowfirst">Hear From</td>
      <td class="evenrowsecond"><?php echo ($rowEdit->hear_about!=-1)?$rowEdit->hear_about:"None";  ?></td>
    </tr>
     <tr >
      <td valign="top" class="oddrowfirst">About Me</td>
      <td class="oddrowsecond"><?php echo  $rowEdit->i_am; ?></td>
    </tr>
   
    <tr >
      <td valign="top" class="oddrowfirst">Booked Date</td>
      <td class="oddrowsecond"><?php echo  date( " F d, Y",strtotime( $rowEdit->booked_date )); ?></td>
    </tr>
     <tr >
      <td valign="top" class="evenrowfirst">Status</td>
      <td class="evenrowsecond"><?php echo  ($rowEdit->status==1)?"Reached":"Not Reached Yet"; ?></td>
    </tr>
       <tr >
      <td valign="top" class="oddrowfirst">&nbsp;</td>
      <td class="oddrowsecond">&nbsp;</td>
    </tr>
     <tr >
      <td valign="top" class="evenrowfirst">Checkin Date</td>
      <td class="evenrowsecond"><?php if($rowEdit->checkindate!="0000-00-00"){echo  date(" F d, Y",strtotime( $rowEdit->checkindate ));} ?></td>
    </tr>
     <tr >
      <td valign="top" class="oddrowfirst">Checkout Date</td>
      <td class="oddrowsecond"><?php if($rowEdit->checkoutdate!="0000-00-00"){ echo  date( " F d, Y",strtotime( $rowEdit->checkoutdate ));} ?></td>
    </tr>
    
     <tr >
      <td valign="top" class="evenrowfirst">Adult</td>
      <td class="evenrowsecond"><?php echo  ($rowEdit->adult<=0)?"Null":$rowEdit->adult; ?></td>
    </tr>
      <tr >
      <td valign="top" class="oddrowfirst">Child</td>
      <td class="oddrowsecond"><?php echo  ($rowEdit->child<=0)?"Null":$rowEdit->child; ?></td>
    </tr>
     
  </table>
</div>
<?php	} ?>
         </div>
	</div>
</div>

