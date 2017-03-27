<?php
include("page/setAndCheckAll.php");
$searchQu ="";
if(isset($_POST['search_x'])) { $searchQu = $_POST['searchTxt']; }
$pages   =        $funAdvertsObj -> advertisementAcceptPage( $searchQu );
?>
<br>

<h1>Change/Manage Advertisement </h1>
                
                    <table width="100%" border="0" cellspacing="1" cellpadding="1" class="managetable">
                        <tr>
                          <td colspan="10" class="bgTdOne">
                            
                            <!-- pagination starts -->
                            <div id="pagination">
                            
                               <a href="#" title="List Content" class="active btn btn-primary"><span class="glyphicon glyphicon-align-center"></span>&nbsp;List</a> &nbsp;<a href="index.php?_page=addeditAdvertisementFromAdmin&action=add&mod=<?php echo $module; ?>">Add Advertisement</a>
                               <span style="text-align:right"><form action="" method="post" >
                               <input type="text" name="searchTxt" class="form-control" value="<?php echo $_POST['searchTxt'];  ?>" id="searchTxt" onblur="setValueInSearch();" />
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
                            <td class="bgTdHeader" >ADVERTISEMENT TYPE</td>
                              <td class="bgTdHeader" >IMAGE</td>
                             <td class="bgTdHeader" > PRICE</td>
                              <td class="bgTdHeader" > Expire DATE</td>
                               <td class="bgTdHeader" colspan="3">ACTION</td>
                        </tr>
                        <?php
                            $altCol=0;
							 $resultExec    =    $funAdvertsObj ->exec($pages[1]);
							 while($rows     =    $funAdvertsObj ->fetch_array($resultExec))
							{
						     $row_advertType  =  $funAdvertsObj->adverTypeSel( $rows["advert_type"] );
								/* hover Toot tips start here */
								$hovertooltipsMessage ='';
							$hovertooltipsMessage .="Advertisement Type : ".$row_advertType->advert_name."<br>";
								$hovertooltipsMessage .="Price : ".$rows["payment"]."<br>";
								$hovertooltipsMessage .="Expire Date : ".date( "F, d,Y",strtotime( $rows['expiredate']))."<br>";
														
    							/* hover Toot tips start here */
								
								
							?>
                        <tr <?php echo (($altCol%2)>0)?"class='bgTdROne' ":"class='bgTdRTwo'"; ?>   title="<?php echo $hovertooltipsMessage; ?>">
                           <td  ><?php    echo $row_advertType  ->advert_name;
						   ?></td>	
                           <td  >          
                        <?Php    $img = $rows["image"];
						 $imgrootpath = "../images/advertisement/"; 
						 if(file_exists($imgrootpath.$img)  and !empty($img))
	 {
	 ?>
	 <a href="<?php echo $imgrootpath.$img; ?>" rel="lytebox[advert]" title="<?php echo substr(strip_tags($rows['message']),0,50); ?>">
	 <img src="../<?php echo APPLICATIONS; ?>phpthumb/phpthumb.php?src=../../<?php echo ADMINISTRATOR."/".$imgrootpath.$img; ?>&h=100&w=100&aoe=1"  border="0"/>
	 </a>
	 <?php
	 }
	 ?>
                           </td>	
                            <td  ><?php echo $rows["payment"]; ?></td>
                             <td  ><?php echo $rows["expiredate"]; ?></td>
                      
                            <td  align="center" ><a href="index.php?_page=viewAdvertisementAccepted&mod=<?php echo $module; ?>&aid=<?php echo urlencode($rows["id"]);?>&action=view"  title="View"><span class="glyphicon glyphicon-eye-open"></span></a></td>			<td>
                            <a href="index.php?_page=addeditAdvertisementFromAdmin&action=edit&aid=<?php echo $rows['id']; ?>&mod=<?php echo $module; ?>"><span class="glyphicon glyphicon-pencil"></span></a>
                            
                            </td>		
                           <td   align="center"><a href="page/mod_<?php echo $module; ?>/act_advertAcceted.php?action=delete&aid=<?php echo urlencode($rows["id"]);?>&action=delete" onclick="return confirm('Are you sure you want to delete this row!!');" title="Delete"><span class="glyphicon glyphicon-trash"></span></a></td>
                        
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