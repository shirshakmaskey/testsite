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
if(!empty($_SESSION['orgId']))
{
 $funObj->redirect($funObj->siteUrl()."profileUser-user");	
}
include("page/setAndCheckAll.php");
include("page/sortingAndSearch.php");
$pages   =        $funUserObj -> userListPage($module,$contentPage,$_SESSION['recordPerPage'],$sortField,$sortBy,$searchQu);
?>
<h1>Change/Manage Administrator User</h1>
<form action="<?php echo $funObj->curPageURL(); ?>" method="post" class="main-container" id="adminForm" name="adminForm">
<table width="100%" border="0" cellspacing="1" cellpadding="1" class="managetable">
<tbody>
	<tr>
		<td colspan="10" class="bgTdOne"><table width="100%" border="0" cellspacing="1" cellpadding="1">
			<tr>
				<td valign="bottom"><a  onclick="window.location.href=window.location.href" title="List Content" class="active btn btn-primary"><span class="glyphicon glyphicon-align-center"></span>&nbsp;List</a></td>
				<td  valign="bottom"><?Php if($_SESSION[ENCR_KEY.'level']==1) { ?>
					<a href="index.php?_page=addeditAdminuser&action=add&mod=<?php echo $module; ?>" title="Add User" class='btn btn-primary'><span class="glyphicon glyphicon-plus"></span>&nbsp;Add User</a>
					<?php } ?></td>
				<td align="right" valign="top">
<form action="<?php echo $funObj->siteUrl(1); ?>adminUserList-user" method="post" >
	<input type="text" name="searchTxt" class="form-control" value="<?php echo $_POST['searchTxt'];  ?>" id="searchTxt"   onblur="setValueInSearch();" />
	<input type="image" src="images/preview.png" border="0" name="search" alt="Search" title="Search" />
</form>
</td>
</tr>
</table>
</td>
</tr>
<tr>
	<td  colspan="2" class="bgTdTwo"><a href="index.php" title="Control Home">Control Home</a></td>
	<td  class="bgTdTwo">Display:
		<?php $funObj->dropDownRecordLimit($recordPerPage); ?></td>
	<td colspan="5"  class="bgTdTwo"><?php echo $pages[2]; ?></td>
</tr>
<?php
                       if($pages[0] > 0)
        				 {
						?>
<tr>
	<td class="bgTdHeader" ><a onclick="sortingField('<?php echo $sortBy;?>','tu.fullname');" class="<?php echo ($sortField=='tu.fullname')?"$sortActive":""; ?>">FULL NAME</a></td>
	<td class="bgTdHeader" ><a onclick="sortingField('<?php echo $sortBy;?>','tu.username');" class="<?php echo ($sortField=='tu.username')?"$sortActive":""; ?>">USERNAME</a></td>
	<td class="bgTdHeader" ><a onclick="sortingField('<?php echo $sortBy;?>','tui.image');" class="<?php echo ($sortField=='tui.image')?"$sortActive":""; ?>">IMAGE</a></td>
	<td class="bgTdHeader" ><a onclick="sortingField('<?php echo $sortBy;?>','tu.status');" class="<?php echo ($sortField=='tu.status')?"$sortActive":""; ?>">STATUS</a></td>
	<td class="bgTdHeader" colspan="3">ACTION</td>
</tr>
<?php
                            $altCol=0;
							 $resultExec    =    $funUserObj ->exec($pages[1]);
							 while($rows     =    $funUserObj ->fetch_array($resultExec))
							{
								$fullname  = $rows["fullname"];
							 	/* hover Toot tips content start here */
								$hovertooltipsMessage ='';
								$hovertooltipsMessage .="<b>Full Name : ".$fullname."</b><br>";
								$hovertooltipsMessage .="Username : ".$rows['username']."<br>";
								$hovertooltipsMessage .="Address1 : ".$rows['temporary_address']."<br>";
								$hovertooltipsMessage .="Address2 : ".$rows['permanent_address']."<br>";
								$hovertooltipsMessage .=($rows["status"]=='1') ? "Status : Active" : "Status : Inactive"."<br>";

																
    							/* hover Toot tips content end here */
								
							?>
<tr <?php echo (($altCol%2)>0)?"class='bgTdROne'":"class='bgTdRTwo'"; ?>  title="<?php echo $hovertooltipsMessage; ?>" >
	<td><?php echo $fullname."<br>";?></td>
	<td><?php echo $rows['username']; ?></td>
	<td><?php $img  =  $rows["image"];
							 		  
     if(file_exists("../images/user_image/".$img)  and !empty($img))
	 {
	$userImage  = "<img src='../applications/phpthumb/phpthumb.php?src=../../images/user_image/$img&aoe=1&h=125&w=125'  border='0' >";	 
	 ?>
		<a href="../images/user_image/<?php echo $img; ?>" rel="lytebox[user_image]" title="<?php echo $rows["bannername"]; ?>"> <?php echo $userImage; ?> </a>
		<?php
	 }
	 ?></td>
	<td><?php echo ($rows["status"]==1)?"Active":"Inactive";?></td>
	<td  align="center" ><a href="viewadminUserListpage-<?php echo $module; ?>-<?php echo urlencode($funObj->map_me($rows["id"])); ?>-lweivl<?php echo "-".rand(1,10); ?>"  title="View"><span class="glyphicon glyphicon-eye-open"></span></a></td>
	<td align="center" ><?Php if($_SESSION[ENCR_KEY.'level']==1 or $_SESSION[ENCR_KEY.'level']==2 or $_SESSION[ENCR_KEY.'pathsaleLoginId']==$rows['id']){ ?>
		<a href="index.php?_page=addeditAdminuser&mod=<?php echo $module; ?>&aid=<?php echo urlencode($rows["id"]);?>&action=edit" title="Edit"><span class="glyphicon glyphicon-pencil"></span></a>
		<?php } ?></td>
	<td align="center"><?php if($_SESSION[ENCR_KEY.'level']==1){?>
		<?php if($_SESSION[ENCR_KEY.'pathsaleLoginId']==1 and $rows['id']!=$_SESSION[ENCR_KEY.'pathsaleLoginId']){ ?>
		<a href="page/mod_<?php echo $module; ?>/actAdminuser.php?aid=<?php echo urlencode($rows["id"]);?>&action=delete" onclick="return confirm('Are you sure you want to delete this row!!');" title="Delete"><span class="glyphicon glyphicon-trash"></span></a>
		<?php }} 
		  
			   ?></td>
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
</tbody>
</table>
</form>
