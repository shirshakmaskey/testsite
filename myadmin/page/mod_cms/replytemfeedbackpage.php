<?php
include("page/setAndCheckAll.php");
include("page/sortingAndSearch.php");
$pages   =        $funCmsObj -> replyFeedbackPage($module,$contentPage,$sortField,$sortBy,$searchQu);
?>
<script language="javascript">
function deleteAll()
{ 
  if(validcheck())
   {
   $("#deleteTemFeedbackPage").submit(); 
    }   
}
</script>


<div class="page-header">
      
      <div class="row">
        <!-- Page header, center on small screens -->
        <h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-tasks page-header-icon"></i>&nbsp;&nbsp;Manage Replies</h1>

        <div class="col-xs-12 col-sm-8">
          <div class="row">
            <hr class="visible-xs no-grid-gutter-h">
            <!-- "Create project" button, width=auto on desktops -->
            <div class="pull-right col-xs-12 col-sm-auto">
<form action="<?php echo "index.php?_page={$contentPage}&mod={$module}"; ?>" method="post" class="form-inline" role="form"> <input type="text" name="searchTxt" class="form-control" value="<?php echo $_POST['searchTxt'];  ?>" id="searchTxt" onblur="setValueInSearch();"/><input type="image" src="images/preview.png" border="0" name="search" alt="Search" title="Search" class="btn btn-success" /></form>

            </div>

          </div>
        </div>
      </div>
    </div><!--page-header-->



<div class="row"><div class="col-sm-12"><div class="panel"><div class="panel-body">
<div class="table-primary">
 <a class="btn btn-primary" href="#" onclick="deleteAll();" title="Delete selected">Delete selected</a> 

<?php echo $pages[2]; ?>
                        
               <form id="deleteTemFeedbackPage" action="page/mod_cms/actReplyfeedbackpage.php?action=delete" method="post" >
                    <table width="100%" border="0" cellspacing="1" cellpadding="1" class="table table-bordered">         
                        
                       
                        <?php
                       if($pages[0] > 0)
        				//	if($recordStart>0)
                        {
						?>             <thead>
                        <tr>
                        <td align="center" ><input type="checkbox" name="parent_checkbox" id="parent_checkbox"  onclick="$('input[name*=\'selected\']').prop('checked', this.checked);"/>
                         </td>
                          <td><a onclick="sortingField('<?php echo $sortBy;?>','date');" class="<?php echo ($sortField=='date')?"$sortActive":""; ?>">DATE</a></td>
                          <td><a onclick="sortingField('<?php echo $sortBy;?>','replyname');" class="<?php echo ($sortField=='replyname')?"$sortActive":""; ?>">NAME</a></td>
                           <td><a onclick="sortingField('<?php echo $sortBy;?>','replyemail');" class="<?php echo ($sortField=='replyemail')?"$sortActive":""; ?>">EMAIL</a></td>
                           <td><a onclick="sortingField('<?php echo $sortBy;?>','subject');" class="<?php echo ($sortField=='subject')?"$sortActive":""; ?>">SUBJECT</a></td>
                          <td colspan="3">ACTION</td>
                        </tr>
                        </thead>
                        <?php
                            $altCol=0;
							//foreach($recordStart as $rows)
							 $resultExec    =    $funCmsObj ->exec($pages[1]);
							 while($rows     =    $funCmsObj ->fetch_array($resultExec))
							{  
							?>
                        <tr <?php echo (($altCol%2)>0)?"class='bgTdROne'":"class='bgTdRTwo'"; ?>>
                         <td  width="110" align="center"><input type="checkbox" name="selected[]"  id="selected_<?php echo $altCol;?>" value="<?php echo $rows['id']?>"></td>
                          <td><?php echo $rows["date"];?></td>
                          <td><?php echo substr($rows["replyname"],0,30);?></td>
                             <td  ><?php echo substr($rows["replyemail"],0,35);?></td>
                               <td  ><?php
							   echo substr($rows["subject"],0,30);
							   ?></td>
                          <td  align="center" ><a href="index.php?_page=viewReplyFeedbackpage&aid=<?php echo urlencode($rows["id"]);?>&action=view&mod=cms"  title="View"><span class="glyphicon glyphicon-eye-open"></span></a></td>
                          <td   align="center"><a href="page/mod_cms/actReplyfeedbackpage.php?aid=<?php echo urlencode($rows["id"]);?>&action=delete" onclick="return confirm('Are you sure you want to delete this row!!');" title="Delete"><span class="glyphicon glyphicon-trash"></span></a></td>
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