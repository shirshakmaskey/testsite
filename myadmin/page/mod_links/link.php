<?php
include("page/setAndCheckAll.php");
include("page/sortingAndSearch.php");
$pages   =        $funLinkObj -> linkList($module,$contentPage,$sortField,$sortBy,$searchQu);
?>

<h1>Change/Manage Links</h1>
<table width="100%" border="0" cellspacing="1" cellpadding="1" class="managetable">
	<tr>
		<td colspan="10" class="bgTdOne"><table width="100%">
				<tr>
					<td valign="bottom"><a  onclick="window.location.href=window.location.href" title="List Content" class="active btn btn-primary"><span class="glyphicon glyphicon-align-center"></span>&nbsp;List</a></td>
					<td  valign="bottom"><a href="index.php?_page=addEditLink&action=add&mod=<?php echo $module; ?>" title="Add Content" class='btn btn-primary white'>Add Link</a></td>
					<td align="right" valign="top"><form action="<?php echo "index.php?_page={$contentPage}&mod={$module}"; ?>" method="post" class="form-inline" role="form"> <div class="form-group"><div class="col-lg-9"><input type="text" name="searchTxt" class="form-control" value="<?php echo $_POST['searchTxt'];  ?>" id="searchTxt" onblur="setValueInSearch();"/></div><input type="image" src="images/preview.png" border="0" name="search" alt="Search" title="Search" class="btn btn-success" /></div></div></form></td>
				</tr>
			</table></td>
	</tr>
	<tr>
		<td  colspan="4" class="bgTdTwo"><a href="index.php" title="Control Home">Control Home</a></td>
		<td colspan="8"  class="bgTdTwo"><?php echo $pages[2]; ?></td>
	</tr>
	<?php
                       if($pages[0] > 0)
        				//	if($recordStart>0)
                        {
						?>
	<tr>
		<td width="251" class="bgTdHeader" ><a onclick="sortingField('<?php echo $sortBy;?>','link_title');" class="<?php echo ($sortField=='link_title')?"$sortActive":""; ?>">LINK TITLE</a></td>
		<td width="274" class="bgTdHeader" ><a onclick="sortingField('<?php echo $sortBy;?>','link_url');" class="<?php echo ($sortField=='link_url')?"$sortActive":""; ?>">LINK URL</a></td>
		<td width="137" class="bgTdHeader" ><a onclick="sortingField('<?php echo $sortBy;?>','added_date');" class="<?php echo ($sortField=='added_date')?"$sortActive":""; ?>">ADDED DATE</a></td>
		<td width="181" class="bgTdHeader" ><a onclick="sortingField('<?php echo $sortBy;?>','status');" class="<?php echo ($sortField=='status')?"$sortActive":""; ?>">STATUS</a></td>
		<td class="bgTdHeader" colspan="5">ACTION</td>
	</tr>
	<?php
                            $altCol=0;
							//foreach($recordStart as $rows)
							 $resultExec    =    $funLinkObj ->exec($pages[1]);
							 while($rows     =    $funLinkObj ->fetch_array($resultExec))
							{ 	 
								$hovertooltipsMessage ='';
								$hovertooltipsMessage .="<b>Title : ".$rows['link_title']."</b><br>";
					    		$hovertooltipsMessage .="Added Date : ".$rows['added_date']."<br>";
								$hovertooltipsMessage .="Link Url : ".$rows['link_url']."<br>";
								$hovertooltipsMessage .="Added Date : ".$rows['added_date']."<br>";
								$hovertooltipsMessage .=($rows["status"]=='1') ? "Status : Active" : "Status : Inactive"."<br>";
																
							?>
	<tr <?php echo (($altCol%2)>0)?"class='bgTdROne'":"class='bgTdRTwo'"; ?>  title="<?php echo $hovertooltipsMessage; ?>"  >
		<td  ><?php echo $rows["link_title"];?></td>
		<td  ><?php echo $rows["link_url"];?></td>
		<td  ><?php echo $rows["added_date"];?></td>
		<td  ><?php echo ($rows["status"]==1)?"Active":"Inactive";?></td>
		<td width="65"  align="center" ><a href="index.php?_page=viewlink&amp;aid=<?php echo urlencode($rows["id"]);?>&amp;action=view&amp;mod=<?php echo $module; ?>"  title="View"><span class="glyphicon glyphicon-eye-open"></span></a></td>
		<td width="59" align="center" ><a href="index.php?_page=addEditLink&amp;aid=<?php echo urlencode($rows["id"]);?>&amp;action=edit&amp;mod=<?php echo $module; ?>" title="Edit"><span class="glyphicon glyphicon-pencil"></span></a></td>
		<td width="58"   align="center"><a href="page/mod_<?php echo $module; ?>/actLink.php?aid=<?php echo urlencode($rows["id"]);?>&amp;action=delete" onclick="return confirm('Are you sure you want to delete this row!!');" title="Delete"><span class="glyphicon glyphicon-trash"></span></a></td>
		<?php 
						   if(!empty($rows['file_attach']))
						   {
							?>
		<td  width="43"   align="center"><a href="../file/article/pdf/pdf<?php echo $rows['article_type_id'];?>/<?php echo $rows["file_attach"]?>" title="Get File" target="_blank"><span class="glyphicon glyphicon-trash"></span></a></td>
		<?Php   
						   }else{ echo "<td>&nbsp;</td>"; }
						   ?>
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
