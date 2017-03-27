<?php
ob_start();
if(defined("BOOKING_PAGE")){
$trip_name = '';
$act_id    = isset($_GET['act_id'])?$_GET['act_id']:'';
if($act_id){
$row        =  $funPackageObj->packageSel($act_id);
$trip_name  =  $row->package_name;
}
?>
<div class="welcome">
	<h2>Booking</h2>
</div>
<?php
if(isset($_SESSION['successMesage'])){
?>
<div class="message success" style="background:#093;color:#FFF;padding-left:15px;line-height:30px;line-height:30px;"><?php echo $_SESSION['successMesage'];unset($_SESSION['successMesage']);?></div>
<?php }?>
<div class="clearfix"></div>
<form id="standardForm" name="standardForm" method="post" action="<?php echo base_url();?>page/mod_booking/act_booking.php" enctype="multipart/form-data" onsubmit="return checkBooking();">
	<div style="margin-top:15px; margin-bottom:10px; line-height: 23px; font-size:16px;">We would be delighted to speak with you. Whether you are looking
		
		to book our services or have any questions, please do not hesitate to contact us:</div>
	<div style=" color:#DA0000;">Fields with asterisk (*) sign are required fields.</div>
	<table class="table mytable" width="100%" cellspacing="0" cellpadding="0" border="0" align="center" style="color:#231f20 !important;">
		<tbody>
			<tr>
				<td colspan="4"></td>
			</tr>
			<tr>
				<td colspan="4">&nbsp;</td>
			</tr>
			<tr>
				<td width="168" align="left" valign="middle">Trip Name</td>
				<td colspan="3"><input type="text" name="trip_name" id="trip_name" value="<?php echo @$trip_name; ?>" class="input-book required" />
					<span class="star">*</span></td>
			</tr>
			<tr>
				<td width="168" align="left" valign="middle">Check in Date</td>
				<td width="173" valign="middle"><input type="text" name="checkIndate" id="checkIndate" value="<?php echo @$_POST['checkInDate']; ?>" class="input-book required" />
					<span class="star">*</span></td>
				<td width="107" valign="middle">Check Out Date</td>
				<td width="171" valign="middle"><input type="text" name="checkOutdate" id="checkOutdate" value="<?php echo @$_POST['checkOutDate']; ?>" class="input-book required" />
					<span class="star">*</span></td>
			</tr>
			<tr>
				<td valign="middle">No Of Person</td>
				<td colspan="3"><select name="adultsNo" id="adultsNo" class="input-book" >
						<option value="-1" >Adults</option>
						<?php for($i=1;$i<=10;$i++) { ?>
						<option value="<?php echo $i; ?>" <?Php echo (@$_POST['adults']==$i)?"selected":""; ?>  ><?php echo $i; ?></option>
						<?Php } ?>
					</select>
					&nbsp;
					<select name="childsNO" id="childsNO" class="input-book" >
						<option value="-1" >Childs</option>
						<?php for($i=1;$i<=10;$i++) { ?>
						<option value="<?php echo $i; ?>" <?Php echo (@$_POST['childs']==$i)?"selected":""; ?>  ><?php echo $i; ?></option>
						<?Php } ?>
					</select></td>
			</tr>
			<tr valign="middle">
				<td colspan="4">&nbsp;</td>
			</tr>
			<tr>
				<td colspan="4"><div class="border_seperator"></div>
					<h2>Personal Information</h2>
					<br/></td>
			</tr>
			<tr>
				<td valign="middle">Full Name</td>
				<td colspan="3"><input type="text" name="fullname" id="fullname" onkeyup="checkEmpty('fullname','fullnameErr');" class="input-book required" />
					<span class="star">*</span>
					<div id="fullnameErr"></div></td>
			</tr>
			<tr>
				<td valign="middle">Address</td>
				<td colspan="3"><input type="text" name="address" id="address" onkeyup="checkEmpty('address','addressErr');" class="input-book required" />
					<span class="star">*</span>
					<div id="addressErr"></div></td>
			</tr>
			<tr>
				<td valign="middle">Country</td>
				<td colspan="3"><select name="country" id="country" onchange="checkEmpty('country','countryErr');" class="input-book required" >
						<option value="-1">Select country</option>
						<?php 
	  $resCon  = $funObj->countryList();
	  while($rowCon = $funObj->fetch_object( $resCon ) )
		{ ?>
						<option value="<?php echo $rowCon->id; ?>"  <?php echo (@$_POST['country']==$rowCon->id)?"selected":""; ?> ><?php echo $rowCon->Country; ?></option>
						<?php } ?>
					</select>
					<span class="star">*</span></td>
			</tr>
			<tr>
				<td rowspan="2" valign="middle">Phone</td>
				<td colspan="3"></td>
			</tr>
			<tr>
				<td colspan="3"><input type="text" value="Country code" name="countrycode" id="countrycode" size="10" onkeyup="checkEmpty('countrycode','phoneErr');" class="input-book" />
					&nbsp;
					<input type="text" value="Area Code " name="areacode" id="areacode" size="8" onkeyup="checkEmpty('areacode','phoneErr');" class="input-book" />
					&nbsp;
					<input type="text" name="telephone" value="Telephone" id="telephone" size="14" onkeyup="checkEmpty('telephone','phoneErr');" class="input-book" />
					<span class="star">*</span>
					<div id="phoneErr"></div></td>
			</tr>
			<tr>
				<td valign="middle">Mobile</td>
				<td colspan="3"><input type="text" name="mobile" id="mobile"  maxlength="20" class="input-book required"/></td>
			</tr>
			<tr>
				<td valign="middle">Email</td>
				<td colspan="3"><input type="text" name="email" id="email"  onkeyup="checkEmpty('email','emailErr');" class="input-book required"/>
					<span class="star">*</span>
					<div id="emailErr"></div></td>
			</tr>
			<tr>
				<td valign="middle">Company Name</td>
				<td colspan="3"><input type="text" name="company" id="company" class="input-book"/></td>
			</tr>
			<tr>
				<td valign="middle"><p>Description</p></td>
				<td colspan="3"><textarea name="client_description" id="client_description" cols="45" rows="7" class="input-book required"></textarea>
					<span class="star">*</span></td>
			</tr>
			<tr>
				<td valign="middle">Airlines</td>
				<td colspan="3"><input type="text" name="airlines" id="airlines" class="input-book" /></td>
			</tr>
			<tr>
				<td valign="middle">Flight No</td>
				<td colspan="3"><input type="text" name="flightno" id="flightno" class="input-book" /></td>
			</tr>
			<tr>
				<td valign="middle" style="padding:7px 0 !important;">Notify for special offer ?</td>
				<td colspan="3" style="padding:7px 0 !important;"><input  type="checkbox" name="specialoffer" id="specialoffer" value="1"  class="input-book"/></td>
			</tr>
			<tr>
				<td valign="middle" style="padding:7px 0 !important;">where did you hear of us?</td>
				<td colspan="3" style="padding:7px 0 !important;"><select id="hearFrom" name="hearFrom" class="input-book" >
						<option value="-1">Select</option>
						<option value="Search Engine">Search Engine</option>
						<option value="Recommendation">Recommendation</option>
						<option value="Repeat Client">Repeat Client</option>
						<option value="Agent">Agent</option>
						<option value="Other Website">Other Website</option>
					</select></td>
			</tr>
			<tr>
				<td valign="middle" style="padding:7px 0 !important;">I am</td>
				<td colspan="3" style="padding:7px 0 !important;"><input type="checkbox" name="i_am[]" id="traveler" value="Traveler" />
					Traveler&nbsp;&nbsp;
					<input type="checkbox" name="i_am[]" id="toorOperator" value="Toor Operator" />
					Toor Operator</td>
			</tr>
			<tr>
				<td valign="middle">Other Activities</td>
				<td colspan="3"><table width="362" border="0">
						<tr>
							<?php
	 $sql  =  "select * from tbl_activity where status='1'";
	 $result  =  $funObj->execute($sql);
	 $sn=1;
	 while($row = $funObj->result($result)){
	 ?>
							<td width="20" class="smartclass"><input type="checkbox" name="activities[]" value="<?php echo $row->activity_title;?>"/></td>
							<td width="150" class="smartclass2"><?php echo $row->activity_title;?></td>
							<?php 
	    if($sn%2==0){
		echo "</tr><tr>";	
		}
	$sn++;
	} ?>
					</table></td>
			</tr>
			<tr>
				<td valign="middle" style="padding:10px 0 !important;">Image</td>
				<td colspan="3" style="padding:10px 0 !important;"><input type="file" name="image" id="image"  />
					<div id="imageErr"></div></td>
			</tr>
			<tr>
				<td valign="middle">&nbsp;</td>
				<td colspan="3"><img id="siimage" style="border: 1px solid #000; margin-right: 15px" src="<?php echo base_url(); ?>applications/securimage-master/securimage_show.php?sid=<?php echo md5(uniqid()) ?>" alt="CAPTCHA Image" align="left" />
					<object type="application/x-shockwave-flash" data="<?php echo base_url(); ?>applications/securimage-master/securimage_play.swf?bgcol=#ffffff&amp;icon_file=<?php echo base_url(); ?>applications/securimage-master/images/audio_icon.png&amp;audio_file=<?php echo base_url(); ?>applications/securimage-master/securimage_play.php" height="20" width="20">
						<param name="movie" value="<?php echo base_url(); ?>applications/securimage-master/securimage_play.swf?bgcol=#ffffff&amp;icon_file=<?php echo base_url(); ?>applications/securimage-master/images/audio_icon.png&amp;audio_file=<?php echo base_url(); ?>applications/securimage-master/securimage_play.php" />
					</object>
					&nbsp; <a tabindex="-1" style="border-style: none;" href="#" title="Refresh Image" onclick="document.getElementById('siimage').src = '<?php echo base_url(); ?>applications/securimage-master/securimage_show.php?sid=' + Math.random(); this.blur(); return false" id="refresh_image"><img style="position: relative;
top: 19px;
left: -35px;" src="<?php echo base_url(); ?>applications/securimage-master/images/refresh.png" alt="Reload Image" height="15" width="15" onclick="this.blur()" align="bottom" border="0" /></a><br />
					<div  style=" clear:both; padding:0; margin:0px;"></div>
					<br />
					<strong>Enter Code*:</strong><br />
					<input type="text"  name="ct_captcha" id="ct_captcha" onkeyup="checkCaptcha(this.value);" size="12" maxlength="8" class="required" />
					<input type="hidden" name="errorCheck" id="errorCheck" value="0" />
					<div id="ct_captchaErr"></div></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td colspan="3"><input type="submit" name="RegisterAndbooking"  value="Submit" class="registerButton btn-primary" />
					<input type="reset"   class="registerButton btn-primary"/></td>
			</tr>
		</tbody>
	</table>
</form>
<script language="javascript" src="<?php echo base_url('page/mod_booking/booking.js');?>"></script>
<?php
}
$cms['module:booking'] = ob_get_clean();