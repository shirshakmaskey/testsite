<?php
if(!isset($_SESSION['user_agent'])){echo "<script>window.location.href='http://google.com'</script>";}
?>
<br>
<?php
$pages   =        $funBookingObj -> replybookingPage();
?>
<script language="javascript">
function deleteAll()
{ 
  if(validcheck())
   {
   $("#delete").submit(); 
    }   
}
</script>
<h1>Manage Replies</h1>
<form id="delete" action="page/mod_booking/actReplyBookingpage.php?action=delete" method="post" >
                    <table width="100%" border="0" cellspacing="1" cellpadding="1" class="managetable">
                        <tr class="bgTdOne">
                          
                           <td  colspan="2">
                            
                               <a href="#" title="List Content" class="active btn btn-primary"><span class="glyphicon glyphicon-align-center"></span>&nbsp;List</a>
                                                          
                           </td>
                           <td  colspan="6"> <a href="#" onclick="deleteAll();" title="Reply to selected">Delete selected</a>  </td>                              

                        </tr>
                        <tr>
                          <td  colspan="4" class="bgTdTwo"><a href="index.php" title="Control Home">Control Home</a> &nbsp;&nbsp;&nbsp;&nbsp; <span id="errMsgSuccessMsg" style="color:#FF6600">
						  <?php if(isset($_SESSION['succesMesage']))
						  {
						  echo "<b style=\"color:#FF3300\" > | ".$_SESSION['succesMesage']."</b>";
						 					  
						  unset($_SESSION['succesMesage']);						  
						  } ?></span> </td>
                          
                          <td colspan="3"  class="bgTdTwo"> <?php echo $pages[2]; ?></td>
                        </tr>
                       
                        <?php
                       if($pages[0] > 0)
        				//	if($recordStart>0)
                        {
						?>
                        <tr>
                        <td class="bgTdHeader" > <input type="checkbox" name="parent_checkbox" id="parent_checkbox"  onclick="return checkedAll()"/></td>
                          <td width="231" class="bgTdHeader" >DATE</td>
                          <td width="129" class="bgTdHeader" >NAME</td>
                           <td width="135" class="bgTdHeader" >EMAIL</td>
                           <td width="181" class="bgTdHeader" >SUBJECT</td>
                          <td class="bgTdHeader" colspan="3">ACTION</td>
                        </tr>
                        <?php
                            $altCol=0;
							//foreach($recordStart as $rows)
							 $resultExec    =    $funBookingObj ->exec($pages[1]);
							 while($rows     =    $funBookingObj ->fetch_array($resultExec))
							{
								
								/* hover Toot tips content start here */
								$hovertooltipsMessage ='';
								$hovertooltipsMessage .="<b>Reply Name : ".substr($rows['replyname'],0,50)."</b><br>";
								$hovertooltipsMessage .="Reply Email : ".substr( $rows['replyemail'],0,50)."<br>";
							
								$hovertooltipsMessage .="Date: ".date("F d, Y )",strtotime($rows['date']))."<br>";
								$hovertooltipsMessage .="Subject : ".substr( $rows['subject'], 0, 50)."<br>";
							
																
    							/* hover Toot tips content end here */
							?>
                        <tr <?php echo (($altCol%2)>0)?"class='bgTdROne'":"class='bgTdRTwo'"; ?>   title="<?php echo $hovertooltipsMessage; ?>">
                         <td  width="23" align="center"><input type="checkbox" name="selected[]"  id="selected_<?php echo $altCol;?>" value="<?php echo $rows['id']?>"></td>
                          <td  ><?php echo $rows["date"];?></td>
                          <td  ><?php echo substr($rows["replyname"],0,30);?></td>
                             <td  ><?php echo substr($rows["replyemail"],0,35);?></td>
                               <td  ><?php
							   echo substr($rows["subject"],0,30);
							   ?></td>
                          <td width="91"  align="center" ><a href="index.php?_page=viewReplyBookingpage&aid=<?php echo urlencode($rows["id"]);?>&action=view&mod=booking"  title="View"><span class="glyphicon glyphicon-eye-open"></span></a></td>
                          <td width="78"   align="center"><a href="page/mod_booking/actReplyBookingpage.php?aid=<?php echo urlencode($rows["id"]);?>&action=delete" onclick="return confirm('Are you sure you want to delete this row!!');" title="Delete"><span class="glyphicon glyphicon-trash"></span></a></td>
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
					     <input type="hidden" value="<?php echo $altCol; ?>" id="countCheck" name="countCheck">  
					  </form>