<?php
include("page/setAndCheckAll.php");
if(isset($_REQUEST['aid']))
{$id  =   isset($_REQUEST['aid'])?decode($_REQUEST['aid']):0; 
    $row = $funSVLObj->svl_detail($id); 
    $artist_row = $funArtistObj->artist_detail($row->artist_id);
    $album_row = $funAlbumObj->album_detail($row->album_id);
?> 
<div class="row">
  <div class="col-sm-12">
    <div class="panel">
    
<div class="panel-heading"> 
  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="">
  <tr >
      <td><span class="panel-title">Details [ <?php echo @$artist_row->artist_name?> ][<?php echo $row->title; ?>]</span>
        <div style="text-align:left;float:right;">
 &nbsp;&nbsp;
<a class="btn btn-primary btn-sm" href="form-<?php echo $module; ?>-<?php echo encode($row->artist_id);?>">
  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Songs/Videos/Lyrics</a> &nbsp;&nbsp;        
  <a class="btn btn-primary btn-sm" href="form-<?php echo $module?>-<?php echo encode($row->artist_id);?>-<?php echo encode($id);?>">Update Songs</a>

  &nbsp;&nbsp;
  <button type="button" class="btn btn-primary btn-sm" id="cancel" name="cancel" value="Cancel" onclick="window.location.href='lists-<?php echo $module; ?>-<?php echo encode($row->artist_id);?>';">Songs Management</button>


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
                    <td><?php echo isset($row->album_id)?$album_row->album_name:''?></td>
                  </tr>
                  <tr>
                    <td>Token Keys</td>
                    <td><?php echo isset($row->token_keys)?$row->token_keys:''?></td>
                  </tr>
                  <tr>
                    <td>Title</td>
                    <td><?php echo isset($row->title)?$row->title:''?></td>
                  </tr>
                  <tr>
                    <td>Genre</td>
                    <td><?php echo isset($row->genre)?ucwords($row->genre):''?></td>
                  </tr>
                  <tr>
                    <td>Songs</td>
                    <td><?php $songs_file = $row->songs_file;?>
                       <audio controls>
                          <source src="<?php echo base_url('uploads/songs/'.$songs_file);?>" type="audio/mpeg">
                          Your browser does not support the audio tag.</td>
                  </tr>
                  <tr>
                    <td>Videos</td>
                    <td><?php $video_file=  $row->video_file; 
                              $video_code  =  get_youtube_code($video_file);?>
<iframe title="YouTube video player" class="youtube-player" type="text/html" width="100%" height="120" src="http://www.youtube.com/embed/<?php echo $video_code;?>" frameborder="0" allowFullScreen></iframe>
</td>
                  </tr>
                  <tr>
                    <td>Lyrics</td>
                    <td><a target="_blank" href="<?php echo base_url('uploads/lyrics/'.$row->lyrics_file);?>">View Lyrics</a></td>
                  </tr>
                  <tr>
                    <td>Details</td>
                    <td><?php echo isset($row->detail)?$row->detail:''?></td>
                  </tr>

                  <tr>
                    <td>Featured</td>
                    <td><?php echo ($row->featured=='1')?'Yes':'No'?></td>
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

