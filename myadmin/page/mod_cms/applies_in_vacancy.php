<?php
include("page/setAndCheckAll.php");
include("page/sortingAndSearch.php");
$pages   =        $funCmsObj -> vacancyApplies($module,$contentPage,$sortField,$sortBy,$searchQu);
?>
<h1>Change/Manage Applies in Vacancy</h1> 
                
                    <table width="100%" border="0" cellspacing="1" cellpadding="1" class="managetable">
                        <tr>
                          <td colspan="10" class="bgTdOne">
                            <table width="100%">
                            <tr><td valign="bottom">                            
                               <a  onclick="window.location.href=window.location.href" title="List Content" class="active btn btn-primary"><span class="glyphicon glyphicon-align-center"></span>&nbsp;List</a></td>
                              
                              <td align="right" valign="top"><form action="<?php echo "index.php?_page={$contentPage}&mod={$module}"; ?>" method="post" class="form-inline" role="form"> <div class="form-group"><div class="col-lg-9"><input type="text" name="searchTxt" class="form-control" value="<?php echo $_POST['searchTxt'];  ?>" id="searchTxt" onblur="setValueInSearch();"/></div><input type="image" src="images/preview.png" border="0" name="search" alt="Search" title="Search" class="btn btn-success" /></div></div></form>
                               </td>
                               </tr>
                               </table>
                                                        
                         </td>
                        </tr>
                        <tr>
                          <td  colspan="4" class="bgTdTwo"><a href="index.php" title="Control Home">Control Home</a> &nbsp;&nbsp;&nbsp;&nbsp;<?php if(isset($_SESSION['succesMesage']))
						  {
						  echo "<b style=\"color:#F90\" > | ".$_SESSION['succesMesage']."</b>";
						 					  
						  unset($_SESSION['succesMesage']);						  
						  } ?> </td>
                          
                          <td colspan="6"  class="bgTdTwo"> <?php echo $pages[2]; ?></td>
                        </tr>
                       
                        <?php
                       if($pages[0] > 0)
        				//	if($recordStart>0)
                        {
						?>
                        <tr>
                        <td width="19%" class="bgTdHeader"  ><a onclick="sortingField('<?php echo $sortBy;?>','vacancy_type_id');" class="<?php echo ($sortField=='vacancy_type_id')?"$sortActive":""; ?>">VACANCY TYPE</a></td>
                          <td width="19%" class="bgTdHeader" ><a onclick="sortingField('<?php echo $sortBy;?>','vacancy_id');" class="<?php echo ($sortField=='vacancy_id')?"$sortActive":""; ?>">VACANCY TITLE</a></td>
                          <td width="14%" class="bgTdHeader" ><a onclick="sortingField('<?php echo $sortBy;?>','fullname');" class="<?php echo ($sortField=='fullname')?"$sortActive":""; ?>">FULL NAME</a></td>
                           <td width="9%" class="bgTdHeader" ><a onclick="sortingField('<?php echo $sortBy;?>','mobile');" class="<?php echo ($sortField=='mobile')?"$sortActive":""; ?>">MOBILE</a></td>
                          <td width="9%" class="bgTdHeader" ><a onclick="sortingField('<?php echo $sortBy;?>','email');" class="<?php echo ($sortField=='email')?"$sortActive":""; ?>">EMAIL</a></td>
                          <td width="16%" class="bgTdHeader" ><a onclick="sortingField('<?php echo $sortBy;?>','added_date');" class="<?php echo ($sortField=='added_date')?"$sortActive":""; ?>">ADDED DATE</a></td>
                          <td class="bgTdHeader" colspan="3">ACTION</td>
                        </tr>  
                        <?php 
                            $altCol=0;
							//foreach($recordStart as $rows)
							 $resultExec    =    $funCmsObj ->exec($pages[1]);
							 while($rows     =    $funCmsObj ->fetch_array($resultExec))
							{
								 $vacancyInfo  =  $funCmsObj->vacancySel($rows['vacancy_id']);
								 $vacancyName  =   $vacancyInfo->vacancy_title; 
								 $vacancy_type  = $funCmsObj->vacancyTypeSel($rows['vacancy_type_id']); 							                                 $vacancyTypeName  =   $vacancy_type->vacancy_type_name;
								 
								/* hover Toot tips content start here */
								$hovertooltipsMessage ='';
								$hovertooltipsMessage .="<b>Type : ".$vacancyTypeName."</b><br>";
								$hovertooltipsMessage .="Title : ".$vacancyName."<br>";
								$hovertooltipsMessage .="Fullname : ".$rows['fullname']."<br>";
								$hovertooltipsMessage .="Address : ".$rows['address']."<br>";
								$hovertooltipsMessage .="Email : ".$rows['email']."<br>";
								$hovertooltipsMessage .="Phone : ".$rows['phone']."<br>";
								$hovertooltipsMessage .="Mobile : ".$rows['mobile']."<br>";
								$hovertooltipsMessage .="Gender : ".$rows['gender']."<br>";
								$hovertooltipsMessage .="Added Date : ".$rows['added_date']."<br>";
								
								

																
    							/* hover Toot tips content end here */
							?>
                        <tr <?php echo (($altCol%2)>0)?"class='bgTdROne'":"class='bgTdRTwo'"; ?>  title="<?php echo $hovertooltipsMessage; ?>">
                          <td  ><?php echo $vacancyTypeName;?></td>
                           <td  ><?php echo $vacancyName;?></td>
                          <td  ><?php echo $rows["fullname"];?></td>
                          <td  ><?php echo $rows["mobile"];?></td>
                           <td  ><?php echo $rows["email"];?></td>
                            <td  ><?php echo $rows["added_date"];?></td>
                          
                           <td width="4%"  align="center" ><a href="index.php?_page=viewVacancyApplies&aid=<?php echo urlencode($rows["id"]);?>&action=view&mod=<?php echo $module; ?>"  title="View"><span class="glyphicon glyphicon-eye-open"></span></a></td>
                          <td width="5%" align="center" ><a href="../file/vacancy_cv/<?php echo $rows['attachment']; ?>" title="Attachment" target="_blank"><img src="images/icon/attach.png" border="0" alt="Attachment" title="Attachment"></a></td>
                          <td width="5%"   align="center" ><a href="page/mod_<?php echo $module; ?>/actVacancyApplies.php?aid=<?php echo urlencode($rows["id"]);?>&action=delete" onclick="return confirm('Are you sure you want to delete this row!!');" title="Delete"><span class="glyphicon glyphicon-trash"></span></a></td>
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