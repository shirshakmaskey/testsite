<?php
if(!isset($_SESSION['successMsg']))
$_SESSION['successMsg'] = "";
$result  =  $funEventsObj->dataList();
$num =  $db->num_rows($result);
if(!file_exists(FCPATH.'uploads/images/events/')){
  mkdir(FCPATH.'uploads/images/events');
}
?>
<div class="page-header">
<div class="row">
        <!-- Page header, center on small screens -->
        <h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-tasks page-header-icon"></i>&nbsp;&nbsp;Manage Events</h1>

        <div class="col-xs-12 col-sm-8">
          <div class="row">
            <hr class="visible-xs no-grid-gutter-h">
            <!-- "Create project" button, width=auto on desktops -->
            <div class="pull-right col-xs-12 col-sm-auto"><a style="width: 100%;" class="btn btn-primary btn-labeled" href="form-<?php echo $module; ?>"><span class="btn-label icon fa fa-plus"></span>Add</a></div>

          </div>
        </div>
      </div>
</div><!--page-header-->
<div class="row"><div class="col-sm-12"><div class="panel"><div class="panel-body">
<div class="table-primary">
<table cellpadding="0" cellspacing="0" border="0" class="managetable table table-bordered" id="example" width="100%">
  <thead>
    <tr class="bgTdHeader">
      <th width="5%">S.N</th>
      <th width="20%">Title</th>
      <th >Category</th>
      <th >Date and Time</th>
      <th >Special</th>
      <th width="12%">Status</th>
      <th width="12%">Action</th>
    </tr>
  </thead>
    <tbody>
  <?php if($num>0){
       $sn=1;
       while($row  =  $db->result($result)){
     ?>
    <tr>
      <td><?=$sn?></td>
      <td><?=$row->title;?></td>
      <td><?=$row->category_name?></td>
      <td><?=date("F d,Y",strtotime($row->from_date));?> - <?=date("F d,Y",strtotime($row->to_date));?><br>
      <?=$row->from_time." to ".$row->to_time;?></td>      
      <td><span class="cp" id="specialChange<?php echo $row->id; ?>" onclick="specialStatus('<?php echo $row->id; ?>');"  ><?=($row->special==1)?"Yes":"No";?></span></td>
      <td><span class="cp" id="statusChange<?php echo $row->id; ?>" onclick="changeStatus('<?php echo $row->id; ?>');"  ><?=($row->status==1)?"Published":"Un-Published";?></span></td>
      <td>
        <a href="view-<?php echo $module; ?>-<?php echo encode($row->id)?>"  title="View"><span class="glyphicon glyphicon-eye-open"></span></a>
    <a href="form-<?php echo $module; ?>-<?=encode($row->id)?>" title="Edit"><span class="glyphicon glyphicon-pencil"></span></a>
    <a href="page/mod_<?php echo $module; ?>/act_thismodule.php?aid=<?php echo encode($row->id);?>&amp;action=delete" onclick="return confirm('Are you sure you want to delete this row!!');" title="Delete"><span class="glyphicon glyphicon-trash"></span></a>
      </td>
    </tr>
        <?php $sn++;}} ?>
  </tbody>
  
</table>
<script type="text/javascript" charset="utf-8" id="init-code">
    $(document).ready(function() {
      $('#example').dataTable({
        "sPaginationType": "full_numbers"
        });
      $('.tool_tip').tooltip({animation:true,placement:'right'});
      });
      
function changeStatus(id)
{  
    $.post(admin_url+'page/mod_<?php echo $module?>/ajax.php',{id:id,mode:'change_status'},function(data){
      $("#statusChange"+id).text(data);
      $('#message').show('slow')
               .addClass('alert alert-success alert-dark')
               .html('<button class="close" type="button" data-dismiss="alert">×</button>Status has been changed!')
               .delay(3000)
               .fadeOut('slow');
    });
}
function specialStatus(id)
{  
    $.post(admin_url+'page/mod_<?php echo $module?>/ajax.php',{id:id,mode:'change_special'},function(data){
      $("#specialChange"+id).text(data);
      $('#message').show('slow')
               .addClass('alert alert-success alert-dark')
               .html('<button class="close" type="button" data-dismiss="alert">×</button>Special status has been changed!')
               .delay(3000)
               .fadeOut('slow');
    });
}
</script>
</div></div></div></div></div>
