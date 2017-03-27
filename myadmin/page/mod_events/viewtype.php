<?php
include("page/setAndCheckAll.php");
if(isset($_REQUEST['aid']))
{
$id  =   isset($_REQUEST['aid'])?decode($_REQUEST['aid']):0;  
$rowEdit =  $funNewsObj  -> newsTypeSel($id);
      ?>

<div class="row">
  <div class="col-sm-12">
    <div class="panel">
    
<div class="panel-heading"> 
  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="" >
    <tr >
      <td><span class="panel-title">Details [ <?php echo ucwords($rowEdit->title); ?> ]</span>
        <div style="text-align:left;float:right;"><a href="news_type-news">Back to Category List</a></div>
        <div style="clear:both;"> </div></td>
    </tr>
  </table>
    
</div>
<div class="panel-body">    
  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="table table-bordered">

    <tr >
      <td class="evenrowfirst">Title</td>
      <td class="evenrowsecond"><?php echo ucwords( $rowEdit->title ); ?></td>
    </tr>
      
    <tr >
      <td class="oddrowfirst">Description</td>
      <td class="oddrowsecond"><?php echo html_entity_decode($rowEdit->description); ?></td>
    </tr>
   
        <tr >
      <td class="oddrowfirst">Date</td>
      <td class="oddrowsecond"><?php echo date("F d,Y",strtotime($rowEdit->created_at)); ?></td>
    </tr>

     <tr >
      <td class="oddrowfirst">Status</td>
      <td class="oddrowsecond"><?php echo $rowEdit->status=='1' ? "Active":"Inactive"; ?></td>
    </tr>

  </table>
</div>
    </div>
  </div>
</div>
<?php } ?>
