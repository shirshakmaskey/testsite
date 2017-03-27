<?php
include("page/setAndCheckAll.php");
$searchQu ="";
if(isset($_POST['search_x'])) { $searchQu = $_POST['searchTxt']; }
else {$searchQu=$_POST['searchQu']; }
// sorting and reading
$sortBy  =     ($_POST['sortBy']=="desc")?"asc":"desc";
$sortActive  = ($sortBy=="desc")?"sortActive1":"sortActive2";
$sortField  =  isset($_POST['sortField'])?$_POST['sortField']:"id";
$pages   =        $funCmsObj -> vacancy($module,$contentPage,$sortField,$sortBy,$searchQu);
// sorting and reading end 
?>
<!--Sorting By field-->
<script language="javascript">
function sortingField(sortBy,sortField)
{
  document.getElementById('sortBy').value=sortBy;
  document.getElementById('sortField').value=sortField;
  document.getElementById('sortingForm').submit();
}
</script>

<form action="<?php echo "index.php?_page={$contentPage}&mod={$module}"; ?>" id="sortingForm" name="sortingForm" method="post">
<input type="hidden" name="sortField" id="sortField" />
<input type="hidden" name="sortBy" id="sortBy" />
<?php if(empty($_POST['searchTxt'])) $_POST['searchTxt']=$searchQu; ?>
<input type="hidden" name="searchQu" id="searchQu" value="<?php echo $_POST['searchTxt']; ?>" />
<input type="hidden" name="SortButton" value="1" />
</form>
<!--Sorting By field end-->

<h1>Change/Manage Vacancy</h1> 
                
                    <table width="100%" border="0" cellspacing="1" cellpadding="1" class="managetable">
                        <tr>
                          <td colspan="10" class="bgTdOne">
                            <table width="100%">
                            <tr><td valign="bottom">                            
                               <a  onclick="window.location.href=window.location.href" title="List Content" class="active btn btn-primary"><span class="glyphicon glyphicon-align-center"></span>&nbsp;List</a></td>
                               <td  valign="bottom"> <a href="index.php?_page=addeditVacancy&action=add&mod=<?php echo $module;?>" title="Add Content" class='btn btn-primary white'><span class="glyphicon glyphicon-plus"></span>&nbsp;Add</a>         </td>
                              <td align="right" valign="top">                     <form action="<?php echo "index.php?_page={$contentPage}&mod={$module}"; ?>" method="post" class="form-inline" role="form"> <div class="form-group"><div class="col-lg-9"><input type="text" name="searchTxt" class="form-control" value="<?php echo $_POST['searchTxt'];  ?>" id="searchTxt" onblur="setValueInSearch();"/></div><input type="image" src="images/preview.png" border="0" name="search" alt="Search" title="Search" class="btn btn-success" /></div></div></form>
                               </td>
                               </tr>
                               </table>
                                                        
                         </td>
                        </tr>
                        <tr>
                          <td  colspan="4" class="bgTdTwo"><a href="index.php" title="Control Home">Control Home</a> </td>
                          
                          <td colspan="6"  class="bgTdTwo"> <?php echo $pages[2]; ?></td>
                        </tr>
                       
                        <?php
                       if($pages[0] > 0)
        				//	if($recordStart>0)
                        {
						?>
                        <tr>
                        <td class="bgTdHeader"  ><a onclick="sortingField('<?php echo $sortBy;?>','vacancy_type_id');" class="<?php echo ($sortField=='vacancy_type_id')?"$sortActive":""; ?>">VACANCY TYPE</a></td>
                          <td class="bgTdHeader" ><a onclick="sortingField('<?php echo $sortBy;?>','vacancy_title');" class="<?php echo ($sortField=='vacancy_title')?"$sortActive":""; ?>">VACANCY TITLE</a></td>
                          <td class="bgTdHeader" ><a onclick="sortingField('<?php echo $sortBy;?>','started_date');" class="<?php echo ($sortField=='started_date')?"$sortActive":""; ?>">STARTED DATE</a></td>
                           <td class="bgTdHeader" ><a onclick="sortingField('<?php echo $sortBy;?>','expire_date');" class="<?php echo ($sortField=='expire_date')?"$sortActive":""; ?>">EXPIRE DATE</a></td>
                          <td class="bgTdHeader" ><a onclick="sortingField('<?php echo $sortBy;?>','added_by');" class="<?php echo ($sortField=='added_by')?"$sortActive":""; ?>">ADDED BY</a></td>
                          <td class="bgTdHeader" ><a onclick="sortingField('<?php echo $sortBy;?>','status');" class="<?php echo ($sortField=='status')?"$sortActive":""; ?>">STATUS</a></td>
                          <td class="bgTdHeader" colspan="3">ACTION</td>
                        </tr>  
                        <?php 
                            $altCol=0;
							//foreach($recordStart as $rows)
							 $resultExec    =    $funCmsObj ->exec($pages[1]);
							 while($rows     =    $funCmsObj ->fetch_array($resultExec))
							{
								 $userInfo  =  $funUserObj->userSel($rows['added_by']);
								 $vacancyTypeInfo  =  $funCmsObj->vacancyTypeSel($rows['vacancy_type_id']);
								 $status = (strtotime($rows['expire_date'])<strtotime(date("Y-m-d")))?"Inactive":"Active";
																						   
						     if($status=='Inactive')
							 {  $funCmsObj->makeInActive('0',$rows['id']); }

								 
								 
								/* hover Toot tips content start here */
								$hovertooltipsMessage ='';
								$hovertooltipsMessage .="<b>Type : ".$vacancyTypeInfo->vacancy_type_name."</b><br>";
								$hovertooltipsMessage .="Title : ".$rows['vacancy_title']."<br>";
								$hovertooltipsMessage .="vacancy Number : ".$rows['vacancy_number']."<br>";
								$hovertooltipsMessage .="Started Date : ".$rows['started_date']."<br>";
								$hovertooltipsMessage .="Expire Date : ".$rows['expire_date']."<br>";
								$hovertooltipsMessage .="Added By: ".$userInfo->fullname."<br>";
								$hovertooltipsMessage .="Status : ".$status."<br>";

																
    							/* hover Toot tips content end here */
							?>
                        <tr <?php echo (($altCol%2)>0)?"class='bgTdROne'":"class='bgTdRTwo'"; ?>  title="<?php echo $hovertooltipsMessage; ?>">
                          <td  ><?php echo $vacancyTypeInfo->vacancy_type_name;?></td>
                           <td  ><?php echo $rows["vacancy_title"];?></td>
                          <td  ><?php echo $rows["started_date"];?></td>
                          <td  ><?php echo $rows["expire_date"];?></td>
                           <td  ><?php echo $userInfo->fullname;?></td>
                            <td  ><?php echo $status;?></td>
                          
                           <td  align="center" ><a href="index.php?_page=viewVacancypage&aid=<?php echo urlencode($rows["id"]);?>&action=view&mod=<?php echo $module; ?>"  title="View"><span class="glyphicon glyphicon-eye-open"></span></a></td>
                          <td align="center" ><a href="index.php?_page=addeditVacancy&aid=<?php echo urlencode($rows["id"]);?>&action=edit&mod=<?php echo $module; ?>" title="Edit"><span class="glyphicon glyphicon-pencil"></span></a></td>
                          <td   align="center" ><a href="page/mod_<?php echo $module; ?>/actVacancy.php?aid=<?php echo urlencode($rows["id"]);?>&action=delete" onclick="return confirm('Are you sure you want to delete this row!!');" title="Delete"><span class="glyphicon glyphicon-trash"></span></a></td>
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