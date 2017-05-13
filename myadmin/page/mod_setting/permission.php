<?php
defined("MYINDEX") or die("Restricted Access for viewing this file");
////////////////////////////////////////////////////////////////////////
//check for the page for the permission
$resultPagePermission  =  $funObj->pagePermission($contentPage,$module);
if($resultPagePermission!=true){
   $_SESSION['errorMessage']  =  "Page is not accessible";
   $_SESSION['errorPageUrl']  = $funObj->curPageURL();
   $funObj->redirect("index.php");
}
//check for the page for the permission end
////////////////////////////////////////////////////////////////////////
include("page/setAndCheckAll.php");
include("page/mod_setAndCheckAll/setToken.php");
?>
<link rel="stylesheet" type="text/css" href="page/mod_setting/permission.css"/>
<script language="javascript" src="page/mod_setting/permission.js"></script>

<div class="page-header">
			
			<div class="row">
				<!-- Page header, center on small screens -->
				<h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-tasks page-header-icon"></i>&nbsp;&nbsp;Permission Setting</h1>

				<div class="col-xs-12 col-sm-8">
					<div class="row">
						<hr class="visible-xs no-grid-gutter-h">
						<!-- "Create project" button, width=auto on desktops -->
						<div class="pull-right col-xs-12 col-sm-auto"></div>

					</div>
				</div>
			</div>
		</div><!--page-header-->



<div class="row"><div class="col-sm-12"><div class="panel"><div class="panel-body">

    <div class="rightPer">
    <?php
	if(isset($_GET['firstId']) and isset($_GET['option']) and isset($_GET['mode'])){ 
	   $_POST['userId']  =  $_GET['firstId'];
	   $_POST['groupId']  =  $_GET['option'];
	   $_POST['perType']  =  $_GET['mode'];
	}
	?>
    <?php $type = isset($_POST['perType']) ? $_POST['perType'] :"group";?>
    <form method="post" action="index.php?_page=permission&mod=setting" id="perTypeForm">
    <select name="perType" onChange="document.getElementById('perTypeForm').submit();" class="form-control">
      <option value="group" <?php echo ($type=='group') ? "selected":""; ?> >Permission According to User Group Level</option>
      <option value="user" <?php echo ($type=='user') ? "selected":""; ?> >Permission According to User</option>
    </select>

    
    
    <?php if($type=='user'){ ?>
	<select name="groupId" onChange="loadTheUser(this.value);" class="form-control">
    <option value="">Choose Group</option>
    <?php $resultGroup = $funSettingObj->userGroupTypeList('BackEnd');
		while( $rowGroup    = $funObj->fetch_object($resultGroup)){
		?>
      <option value="<?php echo $rowGroup->id; ?>" <?php echo ($rowGroup->id==@$_POST['groupId']) ? "selected":""; ?> ><?php echo $rowGroup->group_name; ?></option>
        <?php } ?>
    </select>	    <br />
    <div class="rightPerUser" id="loadUserDiv">
<?php 
if(isset($_POST['userId'])){
$group_type = $_POST['groupId'];	
    $result  =  $funUserObj->loadUserAccordingTogroup($group_type);		
?>
<select name="userId" onChange="if(this.value!=''){document.getElementById('perTypeForm').submit();}" id="userId" class="form-control">
<option value="">Choose user for permission</option>
<?php
while($row = $funObj->fetch_object($result)){
?>
<option value="<?php echo $row->id; ?>" <?php echo ($row->id==$_POST['userId'])?"selected":""; ?> ><?php echo $row->fullname; ?></option>
<?php	
}
?>
</select>
<?php }else{?>    
    <select class="styled_by_me"><option value="">Choose Group & User</option></select><?php } ?></div>
	<?Php } ?>    
    </form>
  </div>
  <div class="clear"></div>
  <div class="table-wrapper_by_me">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><?php include_once("page/mod_setting/moduleListLeft.php"); ?></td>
        <td><?php if($type=='group'){include_once("page/mod_setting/moduleListRightGroup.php");}
		           else{include_once("page/mod_setting/moduleListRightUser.php");}   ?></td>
      </tr>
    </table>
  </div>
  <div class="table-footer"> <a href="#" class="btn remove-delete" onclick="window.location.href='index.php?_page=home'">Back</a> </div>
</div></div></div></div></div>

<script>
$(function(){
	 
	$(document).on('click','.master_checkbox',function(){
		var id =  $(this).attr('id');
	    if($(this).prop('checked')==true){
			 $('.'+id).prop('checked',true); 
		}else{
			 $('.'+id).prop('checked',false); 
		}
	});	 
    $(document).on('click','.module_checkbox',function(){
		var id =  $(this).attr('id');
	    if($(this).prop('checked')==true){			 
			 $('.child_class_'+id).prop('checked',true); 
			 var exp_chk  =  id.split('_');
			 $('#master_checkbox_'+exp_chk[0]).prop('checked',true);
		}else{
			 $('.child_class_'+id).prop('checked',false); 
		}
	});	
	
	$(document).on('click','.sub_module_checkbox',function(){
		var chk_class =  $(this).data('class');
	    if($(this).prop('checked')==true){
			 $('#'+chk_class).prop('checked',true); 
			 var exp_chk  =  chk_class.split('_');
			 $('#master_checkbox_'+exp_chk[0]).prop('checked',true);
		}
	});	
	
});
</script>
