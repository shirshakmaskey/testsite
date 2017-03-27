<?php
include("page/setAndCheckAll.php");
include("page/sortingAndSearch.php");
$pages   =        $funCmsObj -> cmsPage($module,$contentPage,$sortField,$sortBy,$searchQu);
?>
<h1>Change/Manage Content</h1>
                
                    <table width="100%" border="0" cellspacing="1" cellpadding="1" class="managetable">
                        <tr>
                          <td colspan="0" class="bgTdOne">
                            <table width="100%">
                            <tr><td valign="bottom">                            
                               <a  onclick="window.location.href=window.location.href" title="List Content" class="active btn btn-primary"><span class="glyphicon glyphicon-align-center"></span>&nbsp;List</a></td>
                              <td  valign="bottom"> <a href="index.php?_page=addeditCmspage&action=add&mod=<?php echo $module; ?>" title="Add Content" class='btn btn-primary white'><span class="glyphicon glyphicon-plus"></span>&nbsp;Add</a></td>
                              <td align="right" valign="top">                     <form action="<?php echo "index.php?_page={$contentPage}&mod={$module}"; ?>" method="post" class="form-inline" role="form"> <div class="form-group"><div class="col-lg-9"><input type="text" name="searchTxt" class="form-control" value="<?php echo $_POST['searchTxt'];  ?>" id="searchTxt" onblur="setValueInSearch();"/></div><input type="image" src="images/preview.png" border="0" name="search" alt="Search" title="Search" class="btn btn-success" /></div></div></form>
                               </td>
                               </tr>
                               </table>
                                                        
                         </td>
                        </tr>
                        <tr>
                          <td  colspan="2" class="bgTdTwo"><a href="index.php" title="Control Home">Control Home</a></td>
                          
                          <td colspan="3"  class="bgTdTwo"> <?php echo $pages[2]; ?></td>
                        </tr>
                       
                        <?php
                       if($pages[0] > 0)
        				//	if($recordStart>0)
                        {
						?>
                        <tr>
                          <td class="bgTdHeader" ><a onclick="sortingField('<?php echo $sortBy;?>','pagename');" class="<?php echo ($sortField=='pagename')?"$sortActive":""; ?>">PAGE NAME</a></td>
                          <td class="bgTdHeader" ><a onclick="sortingField('<?php echo $sortBy;?>','pagetitle');" class="<?php echo ($sortField=='pagetitle')?"$sortActive":""; ?>">PAGE TITLE</a></td>
                          <td class="bgTdHeader" colspan="3">ACTION</td>
                        </tr>
                        <?php
                            $altCol=0;
							//foreach($recordStart as $rows)
							 $resultExec    =    $funCmsObj ->exec($pages[1]);
							 while($rows     =    $funCmsObj ->fetch_array($resultExec))
							{
								/* hover Toot tips content start here */
								$hovertooltipsMessage ='';
								$hovertooltipsMessage .="<b>Pagename : ".$rows['pagename']."</b><br>";
								$hovertooltipsMessage .="Title : ".$rows['pagetitle']."<br>";
								$hovertooltipsMessage .="Metasubject: ".$rows['metasubject']."<br>";
								$hovertooltipsMessage .="Meta Description : ".substr($rows['metadesc'],0,100)."<br>";
								$hovertooltipsMessage .="Meta Keywords : ".substr($rows['metakeyword'],0,100)."<br>";

																
    							/* hover Toot tips content end here */
							?>
                        <tr <?php echo (($altCol%2)>0)?"class='bgTdROne'":"class='bgTdRTwo'"; ?>  title="<?php echo $hovertooltipsMessage; ?>">
                          <td  ><?php echo $rows["pagename"];?></td>
                          <td  ><?php echo $rows["pagetitle"];?></td>
                           <td  align="center" ><a href="index.php?_page=viewCmspage&aid=<?php echo urlencode($rows["id"]);?>&action=view&mod=cms"  title="View"><span class="glyphicon glyphicon-eye-open"></span></a></td>
                          <td align="center" ><a href="index.php?_page=addeditCmspage&aid=<?php echo urlencode($rows["id"]);?>&action=edit&mod=cms" title="Edit"><span class="glyphicon glyphicon-pencil"></span></a></td>
                          <td   align="center" style="display:none;" ><a href="page/mod_cms/actCmspage.php?aid=<?php echo urlencode($rows["id"]);?>&action=delete" onclick="return confirm('Are you sure you want to delete this row!!');" title="Delete"><span class="glyphicon glyphicon-trash"></span></a></td>
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