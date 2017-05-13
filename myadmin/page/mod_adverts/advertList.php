<?php
include("page/setAndCheckAll.php");
$searchQu ="";
if(isset($_POST['search_x'])) { $searchQu = $_POST['searchTxt']; }
$pages   =        $funAdvertsObj -> adverType( $searchQu );
?>
<br>
<h1>Change/Manage Advertisement Types</h1>
                
                    <table width="100%" border="0" cellspacing="1" cellpadding="1" class="managetable">
                        <tr>
                          <td colspan="10" class="bgTdOne">
                            
                            <!-- pagination starts -->
                            <div id="pagination">
                            
                               <a href="#" title="List Content" class="active btn btn-primary"><span class="glyphicon glyphicon-align-center"></span>&nbsp;List</a> &nbsp;&nbsp;
                                <a href="index.php?_page=addeditAdvertType&action=add&mod=<?php echo $module; ?>" title="Add Content" class='btn btn-primary white'><span class="glyphicon glyphicon-plus"></span>&nbsp;Add</a>                     
                               <span style="text-align:right"><form action="" method="post" >
                               <input type="text" name="searchTxt" class="form-control" value="<?php echo $_POST['searchTxt'];  ?>" id="searchTxt"   onblur="setValueInSearch();" />
                               <input type="image" src="images/preview.png" border="0" name="search" alt="Search" title="Search" />
                               </form>
                               </span>
                            </div>
                            <!-- pagination ends -->                              
                         </td>
                      </tr>
                        <tr>
                          <td  colspan="2" class="bgTdTwo"><a href="index.php" title="Control Home">Control Home</a> &nbsp;&nbsp;&nbsp;&nbsp;<?php if(isset($_SESSION['succesMesage']))
						  {
						  echo "<b style=\"color:#FF3300\" > | ".$_SESSION['succesMesage']."</b>";
						 
						  
						  unset($_SESSION['succesMesage']);						  
						  } ?> </td>
                         
					
                          <td colspan="5"  class="bgTdTwo"> <?php echo $pages[2]; ?></td>
                   	  </tr> 
                        <?php
                       if($pages[0] > 0)
        				 {
						?>
                        <tr>
                          <td class="bgTdHeader" > NAME</td>
                           <td class="bgTdHeader" > STATUS</td>
                           <td class="bgTdHeader" colspan="3">ACTION</td>
                        </tr>
                        <?php
                            $altCol=0;
							 $resultExec    =    $funAdvertsObj ->exec($pages[1]);
							 while($rows     =    $funAdvertsObj ->fetch_array($resultExec))
							{
								/* hover Toot tips start here */
								$hovertooltipsMessage ='';
								$hovertooltipsMessage .="<b>Name : ".$rows['advert_name']."</b><br>";
								$hovertooltipsMessage .=($rows["status"]=='1') ? "Status : Active" : "Status : Inactive"."<br>";

								
								
								
    							/* hover Toot tips start here */
								
								
							?>
                        <tr <?php echo (($altCol%2)>0)?"class='bgTdROne' ":"class='bgTdRTwo'"; ?>   title="<?php echo $hovertooltipsMessage; ?>">
                          <td  ><?php echo $rows["advert_name"];?></td>
                          <td  ><?php echo ($rows["status"]==1)?"Active":"Inactive";?></td>						
                           <td  align="center" ><a href="index.php?_page=viewAdvertList&mod=<?php echo $module; ?>&aid=<?php echo urlencode($rows["id"]);?>&action=view"  title="View"><span class="glyphicon glyphicon-eye-open"></span></a></td>
                          <td align="center" ><a href="index.php?_page=addeditAdvertType&mod=<?php echo $module; ?>&aid=<?php echo urlencode($rows["id"]);?>&action=edit" title="Edit"><span class="glyphicon glyphicon-pencil"></span></a></td>
                          <td   align="center"><a href="page/mod_<?php echo $module; ?>/actAdvertType.php?aid=<?php echo urlencode($rows["id"]);?>&action=delete" onclick="return confirm('Are you sure you want to delete this row!!');" title="Delete"><span class="glyphicon glyphicon-trash"></span></a></td>
                        
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