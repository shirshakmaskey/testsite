<?php
include("page/setAndCheckAll.php");
if(isset($_REQUEST['aid']))
{$id  =   isset($_REQUEST['aid'])?decode($_REQUEST['aid']):0; 
    $row = $funGalleryObj->gallery_detail($id); 
?> 
<div class="row">
  <div class="col-sm-12">
    <div class="panel">
    
<div class="panel-heading"> 
  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="" >
    <tr >
      <td><span class="panel-title">Details [ <?php echo @$row->gallery_name?> ]</span>
        <div style="text-align:left;float:right;">
 &nbsp;&nbsp;
<a class="btn btn-primary btn-sm" href="form-<?php echo $module; ?>-<?php echo encode($row->artist_id);?>">
  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Gallery</a> &nbsp;&nbsp;        
  <a class="btn btn-primary btn-sm" href="form-<?php echo $module?>-<?php echo encode($row->artist_id);?>-<?php echo encode($id);?>">Update Gallery</a>

  &nbsp;&nbsp;
  <button type="button" class="btn btn-primary btn-sm" id="cancel" name="cancel" value="Cancel" onclick="window.location.href='lists-<?php echo $module; ?>-<?php echo encode($row->artist_id);?>';">Gallery Management</button>


        </div>
        <div style="clear:both;"> </div></td>
    </tr>
  </table>
    
</div>
<div class="panel-body">    
  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="table table-bordered">
                <tbody>
                <tr>
                    <td>Artist Name</td>
                    <td><?php 
                    $artist_id = isset($row->artist_id)?$row->artist_id:'0';
                    $artist_row = $funArtistObj->artist_detail($artist_id);
                    echo $artist_row->artist_name;?></td>
                  </tr>
                  <tr>
                    <td>Gallery Name</td>
                    <td><?php echo isset($row->gallery_name)?$row->gallery_name:''?></td>
                  </tr>
                  <tr>
                    <td>Cover Image</td>
                    <td><?php $img = @$row->cover_image;
                 if(file_exists(FCPATH."uploads/images/gallery/".$img) and !empty($img)){?>
                 <img src="<?php echo base_url("uploads/images/gallery/".$img);?>" width="80" />
            <?php }?>
                    </td>
                  </tr>
                 
                  <tr>
                    <td>Details</td>
                    <td><?php echo isset($row->description)?$row->description:''?></td>
                  </tr>
                 
                  <tr>
                    <td>Status</td>
                    <td><?php echo ($row->status=='1')?'Active':'Inactive'?></td>
                  </tr>
                </tbody>
              </table>
      </div>
    </div>
  </div>
</div>
<?php } ?>



