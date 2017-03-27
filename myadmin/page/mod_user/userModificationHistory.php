<?php
session_start();
include_once("../../includes/application_top.php");
if(!isset($_SESSION[ENCR_KEY.'level']) or !isset($_SESSION[ENCR_KEY.'pathsaleLoginId'])  )
  {
	  session_unset();
    $url = "login.php";
	$funObj->redirect($url);
  }
include("../setAndCheckAll.php");
include("../sortingAndSearch.php");
$aid  =  $_GET['aid'];
$pages   =        $funUserObj -> userHistoryPage($module,"userModificationHistory",$aid);
?>

<!-- Pixel Admin's stylesheets -->
<link href="<?=siteUrl(1)?>assets/stylesheets/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="<?=siteUrl(1)?>assets/stylesheets/pixel-admin.min.css" rel="stylesheet" type="text/css">
<link href="<?=siteUrl(1)?>assets/stylesheets/widgets.min.css" rel="stylesheet" type="text/css">
<link href="<?=siteUrl(1)?>assets/stylesheets/pages.min.css" rel="stylesheet" type="text/css">
<link href="<?=siteUrl(1)?>assets/stylesheets/rtl.min.css" rel="stylesheet" type="text/css">
<link href="<?=siteUrl(1)?>assets/stylesheets/themes.min.css" rel="stylesheet" type="text/css">
<link href="<?=siteUrl(1)?>control/mystyle.css" rel="stylesheet" type="text/css">
<script>var init = [];</script>
<script type="text/javascript"> window.jQuery || document.write("<script src='<?=siteUrl(1)?>assets/javascripts/jquery.js'>"+"<"+"/script>"); </script>
<script type="text/javascript" src="../../js/validation.js"> </script>
<div class="row">
<div class="col-sm-12">
  <div class="panel">
    <div class="panel-heading">
      <h1>User Account Modification History of
        <?php $rowUser  =  $funUserObj->userSel($aid);
echo ucwords($rowUser->fullname);
?>
      </h1>
    </div>
    <div class="panel-body">
      <table width="100%" border="0" cellspacing="1" cellpadding="1" class="table table-bordered">
        <?php
                       if($pages[0] > 0)
        				 {
						?>
        <tr>
          <td class="bgTdHeader" >FULL NAME</td>
          <td class="bgTdHeader" >USERNAME </td>
          <td class="bgTdHeader" >LEVEL</td>
          <td class="bgTdHeader" >Modified Date</td>
          <td class="bgTdHeader" >STATUS</td>
          <td class="bgTdHeader" colspan="3">ACTION</td>
        </tr>
        <?php
                            $altCol=0;
							 $resultExec    =    $funUserObj ->exec($pages[1]);
							 while($rows     =    $funUserObj ->fetch_array($resultExec))
							{
								$fullname  = $rows["fullname"];
							 	
								
							?>
        <tr <?php echo (($altCol%2)>0)?"class='bgTdROne'":"class='bgTdRTwo'"; ?>   >
          <td  ><?php echo $fullname;?></td>
          <td ><?php echo $rows['username']; ?></td>
          <td  ><?php echo $rows["designation"];?></td>
          <td  ><?php echo date("M d,Y",strtotime($rows["modified_date"]));?></td>
          <td  ><?php echo ($rows["status"]==1)?"Active":"Inactive";?></td>
          <td  align="center" ><a href="javascript:void(0);" onclick=" javascript:openpopup('<?php echo base_url('myadmin/')?>page/mod_user/viewadminUserModificationHistory.php?aid=<?php echo $rows["id"]; ?>&action=view');" target="_blank" ><span class="glyphicon glyphicon-eye-open"></span></a></td>
          <td   align="center"><a href="actUserHistory.php?aid=<?php echo urlencode($rows["id"]);?>&action=delete" onclick="return confirm('Are you sure you want to delete this row!!');" title="Delete"><span class="glyphicon glyphicon-trash"></span></a></td>
        </tr>
        <?php
						$altCol++;						       
                        	}  // while close 
							echo "<tr><td colspan='5'>Number of Records found : <b>".$pages[0]."</b></td></tr>";
						}   // if close 
						else
						{
						?>
        <tr>
          <td class="noRecordFound" colspan="5">No Record Found</td>
        </tr>
        <?php
                        }
						?>
      </table>
    </div>
  </div>
</div>
