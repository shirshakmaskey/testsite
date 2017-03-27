<?php
include("page/setAndCheckAll.php");
include("page/sortingAndSearch.php");
$pages   =  $funCmsObj -> vacancyType($module,$contentPage,$sortField,$sortBy,$searchQu);
?>
<h1>Change/Manage Vacancy Types</h1> 
                
                    <table width="100%" border="0" cellspacing="1" cellpadding="1" class="managetable">
                        <tr>
                          <td colspan="10" class="bgTdOne">
                            <table width="100%">
                            <tr><td valign="bottom">                            
                               <a  onclick="window.location.href=window.location.href" title="List Content" class="active btn btn-primary"><span class="glyphicon glyphicon-align-center"></span>&nbsp;List</a></td>
                               <td  valign="bottom"> <a href="index.php?_page=addeditVacancyType&action=add&mod=<?php echo $module;?>" title="Add Content" class='btn btn-primary white'><span class="glyphicon glyphicon-plus"></span>&nbsp;Add</a>         </td>
                              <td align="right" valign="top">                     <form action="<?php echo "index.php?_page={$contentPage}&mod={$module}"; ?>" method="post" class="form-inline" role="form"> <div class="form-group"><div class="col-lg-9"><input type="text" name="searchTxt" class="form-control" value="<?php echo $_POST['searchTxt'];  ?>" id="searchTxt" onblur="setValueInSearch();"/></div><input type="image" src="images/preview.png" border="0" name="search" alt="Search" title="Search" class="btn btn-success" /></div></div></form>
                               </td>
                               </tr>
                               </table>
                                                        
                         </td>
                        </tr>
                        <tr>
                          <td  colspan="3" class="bgTdTwo"><a href="index.php" title="Control Home">Control Home</a> </td>
                          
                          <td colspan="5"  class="bgTdTwo"> <?php echo $pages[2]; ?></td>
                        </tr>
                       
                        <?php
                       if($pages[0] > 0)
        				//	if($recordStart>0)
                        {
						?>
                        <tr>
                          <td class="bgTdHeader" ><a onclick="sortingField('<?php echo $sortBy;?>','vacancy_type_name');" class="<?php echo ($sortField=='vacancy_type_name')?"$sortActive":""; ?>">VACANCY TYPE NAME</a></td>
                          <td class="bgTdHeader" ><a onclick="sortingField('<?php echo $sortBy;?>','vacancy_type_description');" class="<?php echo ($sortField=='vacancy_type_description')?"$sortActive":""; ?>">DESCRIPTION</a></td>
                         <td class="bgTdHeader" ><a onclick="sortingField('<?php echo $sortBy;?>','added_date');" class="<?php echo ($sortField=='added_date')?"$sortActive":""; ?>">ADDED DATE</a></td>
                          <td class="bgTdHeader" ><a onclick="sortingField('<?php echo $sortBy;?>','added_by');" class="<?php echo ($sortField=='added_by')?"$sortActive":""; ?>">ADDED BY</a></td>
                          <td class="bgTdHeader" colspan="3">ACTION</td>
                        </tr>  
                        <?php 
                            $altCol=0;
							//foreach($recordStart as $rows)
							 $resultExec    =    $funCmsObj ->exec($pages[1]);
							 while($rows     =    $funCmsObj ->fetch_array($resultExec))
							{
								 $userInfo  =  $funUserObj->userSel($rows['added_by']);
								/* hover Toot tips content start here */
								$hovertooltipsMessage ='';
								$hovertooltipsMessage .="<b>Name : ".$rows['vacancy_type_name']."</b><br>";
								$hovertooltipsMessage .="Added Date : ".$rows['added_date']."<br>";
								$hovertooltipsMessage .="Added By: ".$userInfo->fullname."<br>";
								$hovertooltipsMessage .="Status : ".$status=($rows["status"]==1)?"Active":"Inactive"."<br>";

																
    							/* hover Toot tips content end here */
							?>
                        <tr <?php echo (($altCol%2)>0)?"class='bgTdROne'":"class='bgTdRTwo'"; ?>  title="<?php echo $hovertooltipsMessage; ?>">
                          <td  ><?php echo $rows["vacancy_type_name"];?></td>
                          <td  ><?php echo $rows["vacancy_type_description"];?></td>
                          <td  ><?php echo $rows["added_date"];?></td>
                           <td  ><?php echo $userInfo->fullname;?></td>
                          
                           <td  align="center" ><a href="index.php?_page=viewVacancyTypepage&aid=<?php echo urlencode($rows["id"]);?>&action=view&mod=<?php echo $module; ?>"  title="View"><span class="glyphicon glyphicon-eye-open"></span></a></td>
                          <td align="center" ><a href="index.php?_page=addeditVacancyType&aid=<?php echo urlencode($rows["id"]);?>&action=edit&mod=<?php echo $module; ?>" title="Edit"><span class="glyphicon glyphicon-pencil"></span></a></td>
                          <td   align="center" ><a href="page/mod_<?php echo $module; ?>/actVacancyTypepage.php?aid=<?php echo urlencode($rows["id"]);?>&action=delete" onclick="return confirm('Are you sure you want to delete this row!!');" title="Delete"><span class="glyphicon glyphicon-trash"></span></a></td>
                        </tr>
                        <?php
						$altCol++;						       
                        	}  // while close 
							echo "<tr style='border-top:1px solid #ccc'><td colspan='3'>Number of Records found : <b>".$pages[0]."</b></td></tr>";
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