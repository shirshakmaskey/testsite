<div class="row">
	<div class="col-sm-12">
		<div class="panel">
			<?php
include("page/setAndCheckAll.php");
include("page/mod_setAndCheckAll/setToken.php");
$url_back  = $_SERVER['HTTP_REFERER'];
$aid  =   isset($_REQUEST['aid'])?decode($_REQUEST['aid']):0;
if(!empty($aid)){
$rowEdit   = $funMemberObj -> find_by_id($aid);
}else{ 
$rf = $funMemberObj->table_fields();		
if($rf){if($db->total_rows($rf)>0){while($rowfield=$db->fetch_array($rf)){@$rowEdit->{$rowfield['Field']}='';}}}
}//elseclose
?>
			<div class="panel-heading"> <span class="panel-title">Climber <?php echo empty($aid)?" < <em class='add'>Add</em> > ":" < <em class='edit'>Edit</em> >"; ?></span> </div>
			<div class="panel-body">
				<form action="page/mod_<?php echo $module; ?>/act_customer.php" method="post" onsubmit="return customerCheck();" enctype="multipart/form-data" id="addEditForm" name="addEditForm" enctype="multipart/form-data">
					<input type="hidden" name="mytoken" value="<?php echo $mytoken; ?>"  />
					<input type="hidden" name="hidden_id" id="hidden_id" value="<?php echo @encode($aid); ?>" />
                    
                    
                    
					<div class="form-group">
						<label class="col-sm-2 control-label" for="first_name">First Name</label>
						<div class="col-sm-4">
							<input type="text" name="first_name" id="first_name"  onkeyup="checkEmpty('first_name','first_nameErr');" value="<?php echo $rowEdit->first_name; ?>" class="form-control required" placeholder="First Name">
							<span id="first_nameErr"></span>
							</div>							
					</div>
					
					
					
					<div class="form-group">
						<label class="col-sm-2 control-label" for="last_name">Last name</label>
						<div class="col-sm-4">
							<input type="text" name="last_name" id="last_name"  onkeyup="checkEmpty('last_name','last_nameErr');" value="<?php echo $rowEdit->last_name; ?>" class="form-control required" placeholder="Last name"><span id="last_nameErr"></span></div>							
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label" for="gender">Gender</label>
						<div class="col-sm-4">
						    <div class="radio col-sm-3">
							<label>
							<input type="radio" name="gender" id="gender"  value="male" class="px" <?php echo ($rowEdit->gender=='male') ? "checked":""; ?> <?php echo empty($id)?"checked":"";?> >
							<span class="lbl">Male</span> </label>
							</div>
							<div class="radio col-sm-2" style="margin-top:0;">
							<label>
							<input type="radio" name="gender" id="gender"  value="female" class="px" <?php echo ($rowEdit->gender=='male') ? "checked":""; ?> >
							<span class="lbl">Female</span> </label>
							</div>
							
							</div>
					</div>
					
	                 
	                 <div class="form-group">
						<label class="col-sm-2 control-label" for="phone_no">Phone No</label>
						<div class="col-sm-4">
							<input type="text" name="phone_no" id="phone_no" value="<?php echo $rowEdit->phone_no; ?>" class="form-control" placeholder="Phone No"></div>							
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label" for="mobile_no">Mobile No</label>
						<div class="col-sm-4">
							<input type="text" name="mobile_no" id="mobile_no"  onkeyup="checkEmpty('mobile_no','mobile_noErr');" value="<?php echo $rowEdit->mobile_no; ?>" class="form-control required" placeholder="Mobile No"><span id="mobile_noErr"></span></div>							
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label" for="address">Address</label>
						<div class="col-sm-4">
							<input type="text" name="address" id="address"  onkeyup="checkEmpty('address','addressErr');" value="<?php echo $rowEdit->address; ?>" class="form-control required" placeholder="Address"><span id="addressErr"></span></div>							
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label" for="email">Email</label>
						<div class="col-sm-4">
							<input type="text" name="email" id="email"  onkeyup="checkEmpty('email','emailErr');" value="<?php echo $rowEdit->email; ?>" class="form-control required" placeholder="Email Address"><span id="emailErr"></span></div>							
					</div>


					<div class="form-group">
						<label class="col-sm-2 control-label" for="password">Password</label>
						<div class="col-sm-4">
							<input type="text" name="password" id="password" class="form-control" placeholder="Password"><span id="passwordErr"></span></div>							
					</div>

					

					<div class="form-group">
						<label class="col-sm-2 control-label" for="country">Country</label>
						<div class="col-sm-4">
						      <select name="country" id="country" class="form-control required">
              <option value="">Choose Country</option>
              <?php $countries = $db->countryList();
                                          if($db->num_rows($countries)>0){
                                            while($row_coun  =  $db->result($countries)){
                                                ?>
              <option value="<?php echo $row_coun->id?>" <?php echo (@$row_coun->id==@$rowEdit->country)?"selected":"";?> ><?php echo $row_coun->Country?></option>
              <?php
                                            }
                                          }
                                      ?>
            </select>	
						</div>							
					</div>
					
		

		
        
        <?php 
        $img   =  $rowEdit->image;
       if(file_exists(FCPATH.'uploads/images/customer/'.$img) and !empty($img)){?>
		<div class="form-group">
			<label class="col-sm-2 control-label" for="image">Current Image.</label>
			<div class="col-sm-4">
				 <img src="<?php echo base_url('uploads/images/customer/'.$img);?>" width="120">
			</div>							
		</div>
	<?php }?>

		<div class="form-group">
			<label class="col-sm-2 control-label" for="image">Upload Image.</label>
			<div class="col-sm-4">
				 <input type="file" class="form-control" name="image" id="image">
			</div>							
		</div>

  
					
					
					
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-4">
							<div class="checkbox">
								<label>
									<input type="checkbox" class="px" name="status" id="status" value="1" <?php echo ($rowEdit->status==1) ? "checked":""; ?>>
									<span class="lbl">Status (Active)</span> </label>
							</div>
							<!-- / .checkbox --> 
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-4">
							<div class="checkbox">
								<label>
									<input type="checkbox" class="px" name="back_again" id="back_again" value="1">
									<span class="lbl">Save and Return Here</span> </label>
							</div>
							<!-- / .checkbox --> 
						</div>
					</div>
					<div style="margin-bottom: 0;" class="form-group">
						<div class="col-sm-offset-2 col-sm-4">
							<button class="btn btn-primary" type="submit" name="submitBtn" id="submitBtn">Save</button>
							<button type="button" name="cancelBtn" class="btn btn-primary" onclick="window.location.href='list-<?php echo $module;?>'">Cancel</button>
						</div>
					</div>
				</form>
				</script> 
				<script>$(document).ready( function(){ $("#title").focus(); });</script> 
				<script language="javascript" src="page/mod_<?Php echo $module;?>/member.js"></script> 
			</div>
		</div>
	</div>
</div>
