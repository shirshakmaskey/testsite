<?php
include("page/setAndCheckAll.php");
$searchQu ="";
if(isset($_POST['tablenametype'])) { $searchQu = $_POST['tablenametype']; }
$pages   =        $funUserObj -> userInformation($searchQu);
?>
<h1>Manage User Information</h1>
                
                   <table width="890" border="0" cellspacing="1" cellpadding="1">
                        <tr>
                          <td colspan="10" class="bgTdOne">
                            
                            <!-- pagination starts -->
                            <div id="pagination">
                            
                               <a href="#" title="List Content" class="active btn btn-primary"><span class="glyphicon glyphicon-align-center"></span>&nbsp;List</a>
                               <a href="index.php?_page=addeditAdminuser&amp;action=add&amp;mod=user" title="Add Content" class='btn btn-primary white'><span class="glyphicon glyphicon-plus"></span>&nbsp;Add</a>                              <span style="text-align:right"><form action="" method="post" id="searchForms" >
                             <select name="tablenametype" id="tablenametype" onchange="document.getElementById('searchForms').submit();">
                             <option value="">Choose User</option>
                             <option value="TABLE_ADMINUSER" <?php echo ($_POST['tablenametype']=='TABLE_ADMINUSER') ? "selected":"";  ?>>Adminstrator User</option>
                             <option value="TABLE_USERS" <?php echo ($_POST['tablenametype']=='TABLE_USERS') ? "selected":"";  ?>>Front User/ Member</option>
                             <option value="TABLE_ADVERTISER" <?php echo ($_POST['tablenametype']=='TABLE_ADVERTISER') ? "selected":"";  ?>>Advertisement User</option>
                             </select>
                               
                             
                               </form>
                               </span>
                            </div>
                            <!-- pagination ends -->                              
                         </td>
                        </tr>
                        <tr>
                          <td  colspan="2" class="bgTdTwo"><a href="index.php" title="Control Home">Control Home</a> </td>
                          
                          <td colspan="5"  class="bgTdTwo"> <?php echo $pages[2]; ?></td>
                        </tr>
                       
                        <?php
                       if($pages[0] > 0)
        				//	if($recordStart>0)
                        {
						?>
                        <tr>
                          <td class="bgTdHeader" >NAME</td>
                          <td class="bgTdHeader" >USER</td>
                           <td class="bgTdHeader" >Created Date</td>
                          <td class="bgTdHeader" >Modified Date</td>
                           <td class="bgTdHeader" >Number of Login</td>
                            <td class="bgTdHeader" >Last Login Time</td>
                          <td class="bgTdHeader">ACTION</td>
                        </tr>
                        <?php
                            $altCol=0;
							//foreach($recordStart as $rows)
							 $resultExec    =    $funUserObj ->exec($pages[1]);
							 while($rows     =    $funUserObj ->fetch_array($resultExec))
							{   $aid   = $rows["info_id"];
								 if( $rows["tablename"]==TABLE_ADMINUSER)
						     {
								$userInforamation  =  "Administrator"; 
								
								$userEdit  =  $funUserObj -> adminUserSel($aid);
								$userNameFromTable  =  !empty($userEdit->username) ? "<a href='index.php?_page=viewAdminuser&aid=$aid&action=view&mod=user' class='ancorStyle'>".$userEdit->username."</a>" : "<span style='color:#FF0000' >It is Deleted</span>";
							 }
							 else if($rows["tablename"]==TABLE_ADVERTISER)
							 {
								$userInforamation  =  "Advertiser";
								$userEdit  =  $funUserObj -> advertiserSel($aid);
								$userNameFromTable  =  !empty($userEdit->name) ? "<a href='index.php?_page=viewDetail_adRequest&mod=advert&aid=$aid&action=view' class='ancorStyle'>".$userEdit->name."</a>" : "<span style='color:#FF0000' >It is Deleted</span>";
	 
							 }
							 else if($rows["tablename"]==TABLE_USERS)
							 {
								 $userInforamation  =  "Front User"; 
								$userEdit  =  $funUserObj  -> frontUserSel($aid);
								
								$userNameFromTable  =  !empty($userEdit->firstname) ? "<a href='index.php?_page=viewFrontuser&aid=$aid&action=view&mod=user' class='ancorStyle'>".$userEdit->firstname."</a>" : "<span style='color:#FF0000' >It is Deleted</span>";
							 }
									 
								 
							
								
								
								/* hover Toot tips start here */
								$hovertooltipsMessage ='';
								$hovertooltipsMessage .="<b>User : ".$userInforamation."</b><br>";
								$hovertooltipsMessage .="Name : ".$userNameFromTable."<br>";
							   							
    							/* hover Toot tips start here */								
							?>
                            
               
                            
                        <tr <?php echo (($altCol%2)>0)?"class='bgTdROne'":"class='bgTdRTwo'"; ?>  onMouseover="mover(this);";
onMouseout="mout(this);"  title="<?php echo $hovertooltipsMessage; ?>" >
                          <td  ><?php echo $userNameFromTable;?></td>
                          <td  ><?php echo  $userInforamation; ?></td>

                                 <td  ><?php echo $rows["account_created"];?></td>
                               <td  ><?php echo $rows["account_modified"];?></td>
                              <td  ><?php echo $rows["number_of_logon"];?></td>
                              <td  ><?php echo $rows["date_of_last_logon"];?></td>
                              
                          
                          <?php if($_SESSION["group"]=='super') {  ?>
                           <td   align="center"><a href="page/mod_user/actUserInfo.php?aid=<?php echo urlencode($rows["id"]);?>&amp;action=delete" onclick="return confirm('Are you sure you want to delete this row!!');" title="Delete"><img src="images/delete.png" height="30" width="25" border="0" title="Delete" alt="Delete"></a></td>
                          <?php }  ?>

                        
                         
                          
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
                          <td class="noRecordFound" colspan="10">No Record Found</td>
                        </tr>
                        <?php
                        }
						?>
                      </table>   