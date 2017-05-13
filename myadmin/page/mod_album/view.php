<?php
include("page/setAndCheckAll.php"); 
if(isset($_REQUEST['aid']))
{$id  =   isset($_REQUEST['aid'])?decode($_REQUEST['aid']):0; 
    $row = $funAlbumObj->album_detail($id); 
?> 
<div class="row">
  <div class="col-sm-12">
    <div class="panel"> 
    
<div class="panel-heading"> 
  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="" >
    <tr >
      <td><span class="panel-title">Details [ <?php echo @$row->album_name?> ]</span>
        <div style="text-align:left;float:right;">
 &nbsp;&nbsp;
<a class="btn btn-primary btn-sm" href="form-<?php echo $module; ?>-<?php echo encode($row->artist_id);?>">
  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Album</a> &nbsp;&nbsp;        
  <a class="btn btn-primary btn-sm" href="form-<?php echo $module?>-<?php echo encode($row->artist_id);?>-<?php echo encode($id);?>">Update Album</a>

  &nbsp;&nbsp;
  <button type="button" class="btn btn-primary btn-sm" id="cancel" name="cancel" value="Cancel" onclick="window.location.href='lists-<?php echo $module; ?>-<?php echo encode($row->artist_id);?>';">Album Management</button>


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
                    <td>Album Name</td>
                    <td><?php echo isset($row->album_name)?$row->album_name:''?></td>
                  </tr>
                  <tr>
                    <td>Cover Image</td>
                    <td><?php $img = @$row->cover_image;
								 if(file_exists(FCPATH."uploads/images/album/".$img) and !empty($img)){?>
								 <img src="<?php echo base_url("uploads/images/album/".$img);?>" width="80" />
						<?php }?>
                    </td>
                  </tr>
                  <tr>
                    <td>Version</td>
                    <td><?php echo isset($row->version)?$row->version:''?></td>
                  </tr>
                  <tr>
                    <td>Details</td>
                    <td><?php echo isset($row->detail)?$row->detail:''?></td>
                  </tr>
                  <tr>
                    <td>Hit/Featured</td>
                    <td><?php echo ($row->featured=='1')?'Yes':'No'?></td>
                  </tr>
                  <tr>
                    <td>Genre</td>
                    <td><?php echo isset($row->genre)?ucwords($row->genre):''?></td>
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