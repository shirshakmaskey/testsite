<div class="row">
  <div class="col-sm-12">
    <div class="panel">
      <?php 
include("page/setAndCheckAll.php");
include("page/mod_setAndCheckAll/setToken.php"); 
	$menuTypeList          =  $funMenuObj->menuTypeList();
	$staticPageList        =  $funMenuObj->staticPageList();
	$menuList              =  $funMenuObj->menuList();
	$categoryList          =  $funPageCatObj->categoryList('post');
    $aid  =   isset($_REQUEST['aid'])?decode($_REQUEST['aid']):0; 
	$groupResult  =  $funPageCatObj->categoryList();
	if(!empty($aid)){
	  	$row  			=  $funMenuObj->find_by_id($aid);
	}else{ 
		$rf = $funMenuObj->table_fields();
  if($rf){if($db->total_rows($rf)>0){while($rowfield=$db->fetch_array($rf)){@$row->{$rowfield['Field']}='';}}}
	}//else close
	$cate_id                    =   !empty($aid)? @$row->category : 0;

	if(empty($cate_id)){
		  $hidden_cat = '';   
	   }else{
		   $hidden_cat = $funMenuObj->pages_category($cate_id);
	   }
  if($cate_id=='0'){
      $hidden_cat = '';   
  } 
   else if($cate_id=='-1'){
      $hidden_cat = 'pages/';   
  }else{}   
?>
      <div class="panel-heading"> <span class="panel-title">Menu</span> </div>
      <div class="panel-body">
        <form action="<?php echo base_url("$administrator/page/mod_$module/act_thismodule.php"); ?>" method="post" enctype="multipart/form-data" id="addEditForm">
          <input type="hidden" name="hidden_cat" id="hidden_cat" value="<?php echo $hidden_cat; ?>" />
          <input type="hidden" name="mytoken" value="<?php echo $mytoken; ?>"  />
          <input type="hidden" name="hidden_id" id="hidden_id" value="<?php echo @encode($aid); ?>" />
          <div class="row">
            <label class="col-lg-12 control-label">Asterisk (<span class="req">*</span> ) fields are required</label>
          </div>
          <hr />
          <div class="form-group">
            <label class="col-sm-2 control-label" for="menutype">Menu Type <span class="req">*</span></label>
            <div class="col-sm-4">
              <select name="menu_type" id="menu_type" class="form-control required" onchange="listMenu(this.value);">
                <option value="">Choose Menu type</option>
                <?php if($menuTypeList['num_rows']>0){ 
	    while($rowGr =  $db->result($menuTypeList['result'])){				
	?>
                <option value="<?php echo @$rowGr->id;?>" <?php echo @($row->menu_type==$rowGr->id)?"selected":"";?>  ><?php echo @$rowGr->menu_type_name;?></option>
                <?php }} ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="category">Category <span class="req">*</span></label>
            <div class="col-sm-4">
              <select name="listCat" id="listCat" class="form-control required" onchange="listArticle(this.value);">
                <option value="0" <?php echo empty($row->category) ? "selected":""; ?>  >Static Link</option>
                <option value="-1|pages" <?php echo ($row->category=='-1') ? "selected":""; ?> >Pages</option>
                <optgroup label="Post Categories">
                <?php if($categoryList['num_rows']>0){ 
	    while($rowGr =  $db->result($categoryList['result'])){				
	?>
                <option value="<?php echo @$rowGr->id;?>|post" <?php echo @($row->category==$rowGr->id)?"selected":"";?>  ><?php echo @$rowGr->category_name;?></option>
                <?php }} ?>
                </optgroup>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="parent">Parent <span class="req">*</span></label>
            <div class="col-sm-4"> <span id="menu_list">
              <?php if(empty($aid)){ ?>
              <select name="parent_id" id="parent_id" class="form-control">
                <option value="0">Self</option>
              </select>
              <?php }else{ $funMenuObj->getMenuListInDropDown ($row->menu_type,$row->parent_id); } ?>
              </span></div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="menu_name">Name <span class="req">*</span></label>
            <div class="col-sm-4">
              <input type="text" name="txtmName" id="txtmName" class="form-control required" value="<?php echo @$row->name;?>" />
            </div>
          </div>
          
          
          <div class="form-group">
            <label class="col-sm-2 control-label" for="">Pages/Content/Post <span class="req">*</span></label>
            <div class="col-sm-4">
              <span id="pages_list">
            <?php if(empty($aid)){ ?>
    <select name="pages" id="pages" class="form-control required" onchange="generate_link(this.value);">
              <option value="choose">Choose</option>
              <?php if($staticPageList['num_rows']>0){ 
	    while($rowGr =  $db->result($staticPageList['result'])){				
	?>
              <option value="<?php echo @$rowGr->url_link;?>"><?php echo @$rowGr->menu_name;?></option>
              <?php }} ?>
            </select>
            <?php } else{
		  $funMenuObj->getPagesList($row->category,$row->article_page); } ?>
            </span>
            </div>
             <div class="col-sm-2">
            <label for="menu" style="text-align:right">Menu Link<span class="req">*</span></label>
            </div>
            <div class="col-sm-4">
            <input type="text" name="txtmLink" id="txtmLink" class="form-control" value="<?php echo @$row->menu_link;?>" title="Please enter the menu link" />
            </div>
             
          </div>
          
          <div class="form-group">
            <label class="col-sm-2 control-label" for="link_type">Link Type<span class="req">*</span></label>
            <div class="col-sm-4">
                 <div class="radio">
                      <label>
                          <input type="radio" name="txtltype" value="internal" class="px"  <?php echo ($row->link_type=='internal') ? "checked":""; ?> <?php echo (empty($aid))?"checked":""; ?>/>
                          <span class="lbl">Internal</span> </label>
                  </div>
                  
                  <div class="radio">
                      <label>
                          <input type="radio" name="txtltype" value="external"  class="px" <?php echo ($row->link_type=='external') ? "checked":""; ?> />
                          <span class="lbl">External</span> </label>
                  </div>           
            </div>             
          </div>         
         
          
          <div class="form-group">
            <label class="col-sm-2 control-label" for="status">Status</label>
            <div class="col-sm-4">
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="status" id="status"  value="1" class="px" <?php echo ($row->status==1) ? "checked":""; ?> >
                  <span class="lbl">Active</span> </label>
              </div>
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
      </div>
    </div>
  </div>
</div>
<script language="javascript" src="page/mod_<?Php echo $module;?>/add_edit.js"></script>