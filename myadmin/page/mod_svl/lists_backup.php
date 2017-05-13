<?php
  $artist  =   isset($_REQUEST['aid'])?decode($_REQUEST['aid']):0;
  $artist_row = $funArtistObj->artist_detail($artist);
  $result  =  $funSVLObj->svlAll($artist);
?> 
<div class="page-header">
      
      <div class="row">
        <!-- Page header, center on small screens -->
        <h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-tasks page-header-icon"></i>&nbsp;&nbsp;<?php echo $artist_row->artist_name ?>
            <small>Songs, Video Lyrics Management</small></h1>

        <div class="col-xs-12 col-sm-8">
          <div class="row">
            <hr class="visible-xs no-grid-gutter-h">
            <!-- "Create project" button, width=auto on desktops -->
            <div class="pull-right col-xs-12 col-sm-auto">

            <a class="btn btn-primary btn-labeled" href="form-<?php echo $module; ?>-<?php echo encode($artist)?>"><span class="btn-label icon fa fa-plus"></span>Add New Songs or Video or Lyrics</a>

            <a class="btn btn-primary btn-labeled" href="form-album-<?php echo encode($artist)?>"><span class="btn-label icon fa fa-plus"></span>Add Album</a>

<a  href="lists-artist" class="btn btn-primary btn-labeled">
<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Back to Artist List</a>

            </div>

          </div>
        </div>
      </div>
    </div><!--page-header-->


<div class="row"><div class="col-sm-12"><div class="panel"><div class="panel-body">
<div class="table-primary">
<table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="example" width="100%">

                    <thead>
                      <tr>
                        <th>S.N</th>
                        <th>Album Name</th>
                        <th>Token Keys</th>
                        <th>Title</th>
                        <th>Songs</th>
                        <th>Videos</th>
                        <th>Lyrics</th>
                        <th>Featured</th>
                        <th>In Home</th>
                        <!--<th>Description</th>-->
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $sn=1;
					   if($db->num_rows($result)>0){
					   while($row  =  $db->result($result)){
					?>
                      <tr>
                        <td><?php echo $sn;?></td>
                        <td><?php $album_id  = $row->album_id;
                        $row_album = $funAlbumObj->album_detail($album_id);
                        echo @$row_album->album_name;
                        ?></td>
                        <td><?php echo $row->token_keys;?></td>
                        <td><?php echo $row->title;?></td>
                        <td><?php $songs_file = $row->songs_file;?>
                       <audio controls>
                          <source src="<?php echo base_url('uploads/songs/'.$songs_file);?>" type="audio/mpeg">
                          Your browser does not support the audio tag.
                        </audio> 
                        </td>
                        <td><?php $video_file=  $row->video_file;
                        $video_code  =  get_youtube_code($video_file);
                        ?>
<iframe title="YouTube video player" class="youtube-player" type="text/html" width="100%" height="80" src="http://www.youtube.com/embed/<?php echo $video_code;?>" frameborder="0" allowFullScreen></iframe>
                        </td>
                        <td><a target="_blank" href="<?php echo base_url('uploads/lyrics/'.$row->lyrics_file);?>">View Lyrics</a></td>
                        <td>
                        <span class="cp" id="featuredChange<?php echo $row->id; ?>" onclick="featuredChange('<?php echo $row->id; ?>');"  ><?=($row->featured==1)?"Yes":"No";?></span></td>
                        <td>
                        <span class="cp" id="homeChange<?php echo $row->id; ?>" onclick="homeChange('<?php echo $row->id; ?>');"  ><?=($row->show_in_home==1)?"Yes":"No";?></span></td>
                        <td><span class="cp change_status" title="<?php echo ($row->status==1)?"Click to make inactive":"Click to make active";?>" data-id='<?php echo $row->id?>'><?php echo ($row->status==1)?"Active":"Inactive";?></span></td>
                        <td><a href="view-<?php echo $module?>-<?php echo @encode($row->id);?>"><span class="glyphicon glyphicon-eye-open"></span></a>&nbsp;
                        <a href="form-<?php echo $module?>-<?php echo encode($artist);?>-<?php echo encode($row->id);?>"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;
			 
             <a href="page/mod_<?php echo $module; ?>/action.php?aid=<?php echo encode($row->id);?>&action=delete" onclick="return confirm('Are you sure you want to delete this row!!');" title="Delete"><span class="glyphicon glyphicon-trash"></span></a>
             </td>
                      </tr>
                      <?php $sn++;}
						   }
					  ?>
                    </tbody>
                  </table>
                </div></div></div></div></div>

<script type="text/javascript" charset="utf-8" id="init-code">
$(function(){

$('#example').dataTable({
        "sPaginationType": "full_numbers"
        });
      $('.tool_tip').tooltip({animation:true,placement:'right'});

  $(document).on('click','.change_status',function(){
       var id  =  $(this).data('id');
         var _this  =  $(this);
     $.post(admin_url+'page/mod_svl/ajax.php',{id:id,mode:'change_status'},function(data){   
           if(data.result=='true'){
            _this.html(data.status);
            _this.attr('title',data.title);
            $('#message').show('slow')
               .addClass('alert alert-success alert-dark')
               .html('<button class="close" type="button" data-dismiss="alert">×</button>Status has been changed!')
               .delay(3000)
               .fadeOut('slow');
         }
       },'json');
    });

});

function featuredChange(id)
{  
  $.post(admin_url+'page/mod_svl/ajax.php',{id:id,mode:'featured'},                    function(data){
      $("#featuredChange"+id).html(data.status);
      $('#message').show('slow')
         .addClass('alert alert-success alert-dark')
         .html('<button class="close" type="button" data-dismiss="alert">×</button>Status has been changed!')
         .delay(3000)
         .fadeOut('slow');
    },'json');
}
function homeChange(id)
      {  
        $.post(admin_url+'page/mod_svl/ajax.php',{id:id,mode:'show_in_home'},                    function(data){
            $("#homeChange"+id).html(data.status);
            $('#message').show('slow')
               .addClass('alert alert-success alert-dark')
               .html('<button class="close" type="button" data-dismiss="alert">×</button>Status has been changed!')
               .delay(3000)
               .fadeOut('slow');
          },'json');
      }
</script>
