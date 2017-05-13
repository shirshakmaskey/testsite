<?php 
if(isset($contentPage) and $contentPage=='playlist'){
ob_start(); 
$profile_id  =  $funUserObj->current_user();
if(empty($profile_id)){ redirect(base_url());}
$row_user    =  $funUserObj->find_by_id($profile_id); 
//pr($row_user);
?>
<!-- Accordion v1 -->
          <div class="panel-group acc-v1" id="accordion-1">
            <?php $result  =  $funSVLObj->playlist_by_user($profile_id);
            $cnt   =  $db->num_rows($result);
            if($cnt>0){ ?>
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-1" href="#collapse-One">
                    Playlist
                  </a>
                </h4>
              </div>
              <div id="collapse-One" class="panel-collapse collapse in">
                <div class="panel-body">
                 <table class="table table-bordered">
                 <thead>
                   <tr>
                   <th>S.N</th>
                   <th>Songs</th>
                   <th>Date</th>
                   <th>Action</th>
                   </tr>
                 </thead>
                  <?php while($row  =  $db->result($result)){
                    $songs_file = $row->songs_file;
                    $video_url = $row->video_file;
                    $video_code  =  get_youtube_code($video_url);
                    $slug = $row->token_keys;
            ?>
                  <tr>
                      <td><?php echo $sn;?></td>
                      <td><?php echo substr($row->title, 0, 50) ?></td>
                      <td><?php echo date("F d,Y",strtotime($row->playlist_date));?></td>
                      <td>
<a href="http://www.youtube.com/embed/<?php echo $video_code;?>?autoplay=1" class="lyrics_anchor various fancybox.iframe"><img src="<?php echo get_template_directory_uri(); ?>/images/videoplay.png"></a>
<a href="<?php echo base_url('lyrics/'.$slug);?>" class="lyrics_anchor"><img src="<?php echo get_template_directory_uri(); ?>/images/lyricsico.png"></a>
<?php if(file_exists(FCPATH."uploads/songs/".$songs_file) and !empty($songs_file)){?>
<audio id="songs_<?php echo $slug;?>">
<source type="audio/mpeg" src="<?php echo base_url('uploads/songs/'.$songs_file);?>"></source>
Your browser does not support the audio tag.
</audio>
<a id="playbtn_<?php echo $slug;?>" href="javascript:void(0);" onclick="document.getElementById('songs_<?php echo $slug;?>').play();show_pause_stop('<?php echo $slug;?>');" class="lyrics_anchor" ><img src="<?php echo get_template_directory_uri(); ?>/images/musicsico.png"></a>
<?php }?>  
<a id="pausebtn_<?php echo $slug;?>" href="javascript:void(0);" onclick="document.getElementById('songs_<?php echo $slug;?>').pause();show_play_btn('<?php echo $slug;?>');"  class="lyrics_anchor" style="display:none;"><i class="fa fa-pause fa-2x"></i></a>
<a id="stopbtn_<?php echo $slug;?>" href="javascript:void(0);" onclick="document.getElementById('songs_<?php echo $slug;?>').pause();document.getElementById('songs_<?php echo $slug;?>').currentTime = 0;show_play_btn('<?php echo $slug;?>');"  class="lyrics_anchor" style="display:none;" ><i class="fa fa-stop fa-2x"></i></a>

<a style="border:1px solid; border-radius:8px;padding:4px 6px;" href="javascript:void(0);" class="cp" onclick="removeItemsPlaylist('<?php echo $row->puser_id;?>','<?php echo $row->id;?>');" title="Remove from List"><i class="fa fa-minus"></i></a>
                      </td>
                  </tr>
                  <?php } ?>
                 
                </table>
                </div>
              </div>
            </div>
          </div>
         
              <?php      
       }else{
          echo "Your playlist is empty. Please add it.";
       }
      ?>
</div>
 <!-- End Accordion v1 -->
<?php 
$cms['module:user_playlist'] = ob_get_clean();
}
?>
