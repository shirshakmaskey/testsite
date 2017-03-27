<div class="row">
  <div class="col-sm-12">
    <div class="panel">
      <?php
include("page/setAndCheckAll.php");
include("page/mod_setAndCheckAll/setToken.php");
$url_back  = @$_SERVER['HTTP_REFERER'];
$aid  =   isset($_REQUEST['aid'])?decode($_REQUEST['aid']):0;
if(!empty($aid)){
$rowEdit   = $funNewsObj -> newsTypeSel($aid);
}else{ 
$rf = $funNewsObj->table_fields('tbl_news_type');		
if($rf){if($db->total_rows($rf)>0){while($rowfield=$db->fetch_array($rf)){@$rowEdit->{$rowfield['Field']}='';}}}
}//elseclose
?>
      <div class="panel-heading"> <span class="panel-title">News Category <?php echo empty($aid)?" < <em class='add'>Add</em> > ":" < <em class='edit'>Edit</em> >"; ?></span> </div>
      <div class="panel-body">
        <form action="page/mod_<?php echo $module; ?>/act_type.php" method="post" onsubmit="return newsTypeCheck();" enctype="multipart/form-data" id="addEditForm" name="addEditForm">
          <input type="hidden" name="mytoken" value="<?php echo $mytoken; ?>"  />
          <input type="hidden" name="hidden_id" id="hidden_id" value="<?php echo @encode($aid); ?>" />
          <div class="form-group">
            <label class="col-sm-2 control-label" for="news_type_name">Title <span class="req">*</span></label>
            <div class="col-sm-4">
              <input type="text" name="title" id="title" value="<?php echo $rowEdit->title; ?>" class="form-control required" placeholder="Title"></div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="Description">Description <span class="req">*</span></label>
            <div class="col-sm-4">
              <textarea name="description" id="description" class="form-control required" placeholder="Description"><?php echo @$rowEdit->description;?></textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-4">
              <div class="checkbox">
                <label>
                  <input type="checkbox" class="px" name="status" id="status" value="1" <?php echo ($rowEdit->status==1) ? "checked":""; ?>>
                  <span class="lbl">Status (Active)</span> </label>
              </div>
              <!-- / .checkbox --> 
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-4">
              <div class="checkbox">
                <label>
                  <input type="checkbox" class="px" name="back_again" id="back_again" value="1">
                  <span class="lbl">Save and Return Here</span> </label>
              </div>
              <!-- / .checkbox --> 
            </div>
          </div>
          <div style="margin-bottom: 0;" class="form-group">
            <div class="col-sm-offset-2 col-sm-4">
              <button class="btn btn-primary" type="submit" name="submitBtn" id="submitBtn">Save</button>
              <button type="button" name="cancelBtn" class="btn btn-primary" onclick="window.location.href='list-<?php echo $module;?>'">Cancel</button>
            </div>
          </div>
        </form>
        </script> 
        <script>$(document).ready( function(){ $("#title").focus(); });</script> 
        <script language="javascript" src="page/mod_<?Php echo $module;?>/add_edit.js"></script> 
      </div>
    </div>
  </div>
</div>
