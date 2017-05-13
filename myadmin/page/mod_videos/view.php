 <?php
include("page/setAndCheckAll.php");
if(isset($_REQUEST['aid']))
{$id  =   isset($_REQUEST['aid'])?decode($_REQUEST['aid']):0; 
    $row = $funVideosObj->videos_detail($id); 
?>
<div class="row">
  <div class="col-sm-12">
    <div class="panel">
    
<div class="panel-heading"> 
  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="" >
    <tr >
      <td><span class="panel-title">Details [ <?php echo @$row->title?> ]</span>
        <div style="text-align:left;float:right;">
 &nbsp;&nbsp;
<a class="btn btn-primary btn-sm" href="form-<?php echo $module; ?>">
  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Artist</a> &nbsp;&nbsp;        
  <a class="btn btn-primary btn-sm" href="form-<?php echo $module?>-<?php echo encode($id);?>">Update Artist</a>

  &nbsp;&nbsp;
  <button type="button" class="btn btn-primary btn-sm" id="cancel" name="cancel" value="Cancel" onclick="window.location.href='lists-<?php echo $module; ?>';">Videos Management</button>


        </div>
        <div style="clear:both;"> </div></td>
    </tr>
  </table>
    
</div>
<div class="panel-body">    
  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="table table-bordered">
                <tbody>
                  <tr>
                    <td>Title</td>
                    <td><?php echo isset($row->title)?$row->title:''?></td>
                  </tr>
                  <tr>
                    <td>Url</td>
                    <td>
                      <?php $video_file=  $row->url;
                      $video_code  =  get_youtube_code($video_file);?>
<iframe title="YouTube video player" class="youtube-player" type="text/html" width="100%" height="120" src="http://www.youtube.com/embed/<?php echo $video_code;?>" frameborder="0" allowFullScreen></iframe>
                    </td>
                  </tr>
                  
                  <tr>
                    <td>Featured</td>
                    <td><?php echo ($row->featured=='1')?'Yes':'No'?></td>
                  </tr>
                  <tr>
                    <td>Show In Home</td>
                    <td><?php echo ($row->show_in_home=='1')?'Yes':'No'?></td>
                  </tr>
                  <tr>
                    <td>Created on</td>
                    <td><?php echo isset($row->created_on)?$row->created_on:''?></td>
                  </tr>
                  <tr>
                    <td>Created By</td>
                    <td><?php 
						  $created_by  = $row->created_by;
						  $row_user  = $funUserObj->userSel($created_by);
						  echo $row_user->fullname;
						  ?>
                    </td>
                  </tr>
                  <tr>
                    <td>Modified on</td>
                    <td><?php echo isset($row->modified_on)?$row->modified_on:''?></td>
                  </tr>
                  <tr>
                    <td>Modified by</td>
                    <td><?php 
						  $created_by  = $row->created_by;
						  $row_user  = $funUserObj->userSel($created_by);
						  echo $row_user->fullname;
						  ?>
                    </td>
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


