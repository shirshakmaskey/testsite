<?php
session_start();
include_once("../../includes/application_top.php");
$rowUser  =  $funUserObj->userSel($_GET['id']);
?>
<script language="javascript" src="../../js/jquery-latest.js"></script>
<script language="javascript" src="../../js/validation.js"></script>
<script language="javascript">
function changePassword()
{
	 if($("#new_password").val()=="")
	{  
	   setfocus('new_password');
	   setMessage('new_password'+'Err','Please enter the password!!');
	  fadeInfadeOut('new_password'+'Err');
	  addClas('new_password'+'Err','errorClass');
		return false; 
	 }
	 else if($("#conpassword").val()=="")
	{  
	   setfocus('conpassword');
	   setMessage('conpassword'+'Err','Please re-type the password!!');
	  fadeInfadeOut('conpassword'+'Err');
	  addClas('conpassword'+'Err','errorClass');
		return false; 
	 }
	 
	 else if($("#conpassword").val()!=$("#new_password").val() )
	{  
	   setfocus('conpassword');
	   setMessage('conpassword'+'Err','Re-type password not match!!');
	  fadeInfadeOut('conpassword'+'Err');
	  addClas('conpassword'+'Err','errorClass');
		return false; 
	 }
	 else
	 {
		return true; 
	 }
}

function goToHome()
{
	top.hideThickBox();
}
</script>
<style>
.errorClass
{
color:#F00;	
}

#msgs
{
padding-top:50px;
font-weight:bold;
text-align:center;
color:#F90;
}

.table_change_Pass
{
line-height:29px;
padding-left:20px;
}


.table_change_Pass h3
{
color:#6C0;	
}
</style>
<?php
if(isset($_POST['SaveBtn']))
{  
   $funUserObj->table  =  TABLE_USER;
   $funUserObj->data  =  array("password"=>md5($funObj->check($_POST['new_password']))
							  );
   $funUserObj->cond  = array("id"=>$_GET['id']);
   $funUserObj->update();
   echo "<div id='msgs'>Password Changed Suffessfully!!</div>";
   echo "<script>setInterval('goToHome()',2000);</script>";
}else{
?>

   <form action="" method="post" onsubmit="return changePassword();">
    <table width="100%" border="0" cellpadding="1" cellspacing="1" class="table_change_Pass" >
    <tr>
    <td colspan="2">
    <h3>Change Password For <?php echo ucwords($rowUser->fullname); ?></h3>
    </td>
    </tr>
    <tr >
    <td width="150" height="50"> Password </td>
    <td><input type="password" name="new_password" id="new_password" onkeyup="checkEmpty('new_password','new_passwordErr');"  />
    <div id="new_passwordErr"></div>
    </td>
    </tr>
    
    <tr >
    <td> Re-type Password </td>
    <td><input type="password" name="conpassword" id="conpassword" onkeyup="checkEmpty('conpassword','conpasswordErr');"  />
     <div id="conpasswordErr"></div>
    </td>
    </tr>
    
    <tr >
    <td></td>
    <td><input type="submit" value="Save" name="SaveBtn" id="SaveBtn" /></td>
    </tr>   
   </table>
   </form>
   <?php } ?>
