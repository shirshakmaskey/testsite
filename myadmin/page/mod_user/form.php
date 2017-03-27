<div class="row">
	<div class="col-sm-12">
		<div class="panel">
			<?php
include("page/setAndCheckAll.php");
include("page/mod_setAndCheckAll/setToken.php");
$url_back  = $_SERVER['HTTP_REFERER'];
$aid  =   isset($_REQUEST['aid'])?decode($_REQUEST['aid']):0;
//$branchList =  $funBranchObj->allBranchList();
if(!empty($aid)){
$_SESSION['errorFree']=1;	
$rowEdit   = $funUserObj -> userListSel($aid);}
else{ 
$rf = $funUserObj->table_fields();
if($rf){if($db->total_rows($rf)>0){while($rowfield=$db->fetch_array($rf)){@$rowEdit->{$rowfield['Field']}='';}}}
$rf = $funUserObj->table_fields_info();
if($rf){if($db->total_rows($rf)>0){while($rowfield=$db->fetch_array($rf)){@$rowEdit->{$rowfield['Field']}='';}}}
}//elseclose
?>
			<script>
$(document).ready( function(){ 
   $("#firstname").focus();
   if($("#dob").val()!=""){ $("#dob"+"Err").text(''); } 															
});</script>
			<div class="panel-heading"> <span class="panel-title">Admin User <?php echo (empty($aid)=='add')?" < <em class='add'>Add</em> > ":" < <em class='edit'>Edit</em> >"; ?></span> </div>
			<div class="panel-body">
				<form action="page/mod_<?php echo $module; ?>/actAdminuser.php" method="post"  enctype="multipart/form-data" id="adminUserForm" onsubmit="return adminUserList();" class="form-horizontal">
					<input type="hidden" name="mytoken" value="<?php echo $mytoken; ?>"  />
					<input type="hidden" name="hidden_id" id="hidden_id" value="<?php echo @encode($aid); ?>" />
					<?php if(!empty($aid)){?>
					<div class="form-group">
						<label class="col-sm-2 control-label" for="firstname">Current Image <span class="starRed">*</span></label>
						<div class="col-sm-4">
							<?php 
    
    $img  =  $rowEdit->image;							 		  
     if(file_exists("../images/user_image/".$img)  and !empty($img)){	
	$userImage  = "<img src='../images/user_image/$img' height='100'  border='0' >";	 
	 ?><a href="../images/user_image/<?php echo $img; ?>" rel="lytebox[user_image]" title="<?php echo $rows["bannername"]; ?>"> <?php echo $userImage; ?> </a><?php }?>
						</div>
					</div>
					<?php }?>
					<div class="form-group">
						<label class="col-sm-2 control-label" for="current_image">Fullname</label>
						<div class="col-sm-4">
							<?php $fullname  =  explode(" ",$rowEdit->fullname); ?>
							<input type="text" name="firstname" id="firstname" value="<?php echo @$fullname[0]; ?>" onkeyup="checkEmpty('firstname','firstnameErr');" class="form-control required" placeholder="Firstname">
							 <span id="firstnameErr"></span> </div>
					</div>
					<?php if(count($fullname)>2 || empty($aid)){ ?>
					<div class="form-group">
						<label class="col-sm-2 control-label" for="middlename">Middle Name <span class="starRed">*</span></label>
						<div class="col-sm-4">
							<input type="text" name="middlename" id="middlename" value="<?php echo @$fullname[1]; ?>" class="form-control" placeholder="Middle Name">
						 <span id="middlenameErr"></span> </div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label" for="lastname">Last Name <span class="starRed">*</span></label>
						<div class="col-sm-4">
							<input type="text" name="lastname" id="lastname" value="<?php echo @$fullname[2]; ?>" onkeyup="checkEmpty('lastname','lastnameErr');" class="form-control required" placeholder="Firstname">
							 <span id="lastnameErr"></span> </div>
					</div>
					<?php }else{ ?>
					<div class="form-group">
						<label class="col-sm-2 control-label" for="middlename">Middle Name <span class="starRed">*</span></label>
						<div class="col-sm-4">
							<input type="text" name="middlename" id="middlename" value="" class="form-control" placeholder="Middle Name">
							 <span id="middlenameErr"></span> </div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label" for="lastname">Last Name <span class="starRed">*</span></label>
						<div class="col-sm-4">
							<input type="text" name="lastname" id="lastname" value="<?php echo @$fullname[1]; ?>" onkeyup="checkEmpty('lastname','lastnameErr');" class="form-control required" placeholder="Firstname">
							<span id="lastnameErr"></span> </div>
					</div>
					<?php } ?>
					<div class="form-group">
						<label class="col-sm-2 control-label" for="user_types">User Types <span class="starRed">*</span></label>
						<div class="col-sm-4">
							
								<?php
if($_SESSION[ENCR_KEY."level"]==1)
{
?>                              <select name="group_type" id="group_type" class="form-control required">
								<option value="1" <?php echo ($rowEdit->group_type==1)?"selected":"" ?>>Super Admin</option>
								<option value="2" <?php echo ($rowEdit->group_type==2)?"selected":"" ?>>Manager Admin</option>
								<option value="3"<?php echo ($rowEdit->group_type==3)?"selected":"" ?><?php echo !isset($rowEdit->group_type)?"selected":""  ?>>General Admin</option>
								</select>
								<?php
}
else if($_SESSION[ENCR_KEY."level"]==2)
{                   
?> <select name="group_type" id="group_type" class="form-control required">
								<option value="2" <?php echo ($rowEdit->group_type==2)?"selected":"" ?>>Manager Admin</option>
								<option value="3"<?php echo ($rowEdit->group_type==3)?"selected":"" ?><?php echo !isset($rowEdit->group_type)?"selected":""  ?>>General Admin</option></select>
								<?php
}
else
{?><input type="hidden" name="group_type" value="3" />General Admin <?php }?>
						</div>
					</div>
					
					<?php /*?><div class="form-group">
						<label class="col-sm-2 control-label" for="title">Branch <span class="starRed">*</span></label>
						<div class="col-sm-4">
							<select name="branch_id" id="branch_id"  onchange="checkEmpty('branch_id','branch_idErr');" class="form-control required"  >
							<option value="">Choose Branch</option>
							<?php $num_the  = $db->num_rows($branchList);
							if($num_the>0){
								while($row_the  =  $db->result($branchList)){
							 ?>
							 <option value="<?=$row_the->id?>" <?php echo ($rowEdit->branch_id==$row_the->id)?"selected":"";?> ><?=$row_the->branch_name?></option>
							 <?php }}?>
							</select>
							<span id="branch_idErr"></span> </div>
					</div><?php */?>
					
					<div class="form-group">
						<label class="col-sm-2 control-label" for="email_username">Email/Username <span class="starRed">*</span></label>
						<div class="col-sm-4">
							<input type="text" name="email1" id="email1"   onkeyup="checkDuplicate();" value="<?php echo $rowEdit->email1; ?>" class="form-control required" placeholder="Email/Username">
							<span id="email1Err"></span> </div>
					</div>
					<?php if(!empty($aid)){ ?>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-4">
						<div class="checkbox">
								<label>
							<input name="chkChangePassword" id="chkChangePassword" type="checkbox" value="1" onclick="checkMeOldPass(this);" class="px"/>
							<span class="lbl">Change Password</span></label></div>
							
							 </div>
					</div>
					<?php } ?>
					<div class="form-group password_group" style="display:<?php echo ($action=='edit')?'none':'';?>">
						<label class="col-sm-2 control-label" for="password">Password <span class="starRed">*</span></label>
						<div class="col-sm-4">
							<input type="password" name="pwdPassword" id="pwdPassword" size="25"  class="form-control password" placeholder="Password" minlength="6">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-4">
							<div class="checkbox">
								<label>
									<input type="checkbox" class="px" name="make_login" id="make_login" value="1" <?php echo ($rowEdit->make_login==1) ? "checked":""; ?>>
									<span class="lbl">Make Login</span> </label>
							</div>
							<!-- / .checkbox --> 
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label" for="status">Status <span class="starRed">*</span></label>
						<div class="col-sm-4">
							<select name="status" id="status" onchange="checkEmpty('status','statusErr');" class="form-control required" <?php if(@$_SESSION["group"]=='normal') echo 'disabled';?>  >
								<option value="-1">select status</option>
								<option value="1" <?php echo ($rowEdit->status==1)?"selected":"";?>>Active</option>
								<option value="0" <?php echo ($rowEdit->status==0)?"selected":"";?>>Inactive</option>
							</select>
							<span id="statusErr"></span> </div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label" for="temorary_address">Temporary Address <span class="starRed">*</span></label>
						<div class="col-sm-4">
							<input type="text" name="temporary_address" id="temporary_address"  onkeyup="checkEmpty('temporary_address','temporary_addressErr');" value="<?php echo $rowEdit->temporary_address; ?>" class="form-control required" placeholder="Temporary Address">
							<span id="temporary_addressErr"></span> </div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label" for="permanent_address">Permanent Address <span class="starRed">*</span></label>
						<div class="col-sm-4">
							<input type="text" name="permanent_address" id="permanent_address"  onkeyup="checkEmpty('permanent_address','permanent_addressErr');" value="<?php echo $rowEdit->permanent_address; ?>" class="form-control required" placeholder="Permanent Address">
							<span id="permanent_addressErr"></span> </div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label" for="gender">Gender <span class="starRed">*</span></label>
						<div class="col-sm-4">
						   <div class="radio">
								<label>
									<input type="radio" name="gender" value="male" class="px"  <?php echo ($rowEdit->gender=='male') ? "checked":""; ?> <?php echo (empty($aid))?"checked":""; ?>/>
									<span class="lbl">Male</span> </label>
							</div>
							
							<div class="radio">
								<label>
									<input type="radio" name="gender" value="female"  class="px" <?php echo ($rowEdit->gender=='female') ? "checked":""; ?> />
									<span class="lbl">Female</span> </label>
							</div>
                        </div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label" for="image">Image <span class="starRed">*</span></label>
						<div class="col-sm-4">
							<input type="file" name="image" id="image"  class="form-control required">
							<span id="imageErr"></span>
							<input type="hidden" name="old_image" id="old_image" value="<?php echo $img; ?>" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label" for="temorary_address">Phone</label>
						<div class="col-sm-4">
							<input type="text" name="telephone1" id="telephone1"  onkeyup="checkEmpty('telephone1','telephone1Err');" value="<?php echo $rowEdit->telephone1; ?>" class="form-control" placeholder="Phone no.">
							<span id="telephone1Err"></span> </div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label" for="temorary_address">Mobile <span class="starRed">*</span></label>
						<div class="col-sm-4">
							<input type="text" name="mobile1" id="mobile1"  onkeyup="checkEmpty('mobile1','mobile1Err');" value="<?php echo @$rowEdit->mobile1; ?>" class="form-control" placeholder="Mobile no.">
							<span id="mobile1Err"></span> </div>
					</div>
					<div style="margin-bottom: 0;" class="form-group">
						<div class="col-sm-offset-2 col-sm-4">
							<button class="btn btn-primary" type="submit" name="submitBtn" id="submitBtn">Save</button>
							<button type="button" name="cancelBtn" class="btn btn-primary" onclick="window.location.href='list-<?php echo $module;?>'">Cancel</button>
						</div>
					</div>
					<input  type="hidden" id="errorCheck" name="errorCheck" value="1" />
				</form>
				<script>
function checkMeOldPass(obj)
{
   if(obj.checked==true){ $('.password_group').show(); }else{ $('.password_group').hide(); }	
}
</script> 
			</div>
		</div>
	</div>
</div>
