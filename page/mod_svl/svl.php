<?php
ob_start();
	$result = $funSVLObj->showInHome(5);
	$num = $db->num_rows($result);
	if($num>0){
		while($row = $db->result($result)){
			$songs_file = $row->songs_file;
            $video_url = $row->video_file;
            $video_code  =  get_youtube_code($video_url);
            $slug = $row->token_keys;
?> 
<div class="music1">                            
    <div class="row music_icons">
        <div class="col-md-7">
        <a href="javascript:void(0);" onclick="addThisSongsPlay('<?php echo $slug;?>');" class="lyrics_anchor" ><img src="<?php echo get_template_directory_uri(); ?>/images/addico.png" title="Add to wishlist"></a> 
<a href="<?php echo base_url('lyrics/'.$slug);?>" class="lyrics_anchor">                      
        <b><span class="songs_name"><?php echo substr($row->title, 0, 50) ?></span></b>
</a>
        </div>
        <div class="col-md-5">
        <a href="http://www.youtube.com/embed/<?php echo $video_code;?>?autoplay=1" class="lyrics_anchor various fancybox.iframe" title="Play video"><img src="<?php echo get_template_directory_uri(); ?>/images/videoplay.png"></a>
        <a href="<?php echo base_url('lyrics/'.$slug);?>" class="lyrics_anchor" title="View lyrics"><img src="<?php echo get_template_directory_uri(); ?>/images/lyricsico.png"></a>
        <?php if(file_exists(FCPATH."uploads/songs/".$songs_file) and !empty($songs_file)){?>
        <audio id="songs_<?php echo $slug;?>">
        <source type="audio/mpeg" src="<?php echo base_url('uploads/songs/'.$songs_file);?>"></source>
        Your browser does not support the audio tag.
        </audio>
<a id="playbtn_<?php echo $slug;?>" href="javascript:void(0);" onclick="document.getElementById('songs_<?php echo $slug;?>').play();show_pause_stop('<?php echo $slug;?>');" class="lyrics_anchor" title="View lyrics"><img src="<?php echo get_template_directory_uri(); ?>/images/musicsico.png"></a>
        <?php }?>  
<a id="pausebtn_<?php echo $slug;?>" href="javascript:void(0);" onclick="document.getElementById('songs_<?php echo $slug;?>').pause();show_play_btn('<?php echo $slug;?>');"  class="lyrics_anchor" style="display:none;"><i class="fa fa-pause fa-2x"></i></a>
<a id="stopbtn_<?php echo $slug;?>" href="javascript:void(0);" onclick="document.getElementById('songs_<?php echo $slug;?>').pause();document.getElementById('songs_<?php echo $slug;?>').currentTime = 0;show_play_btn('<?php echo $slug;?>');"  class="lyrics_anchor" style="display:none;" title="Play Song" ><i class="fa fa-stop fa-2x"></i></a>
<a href="javascript:void(0);" onclick="addThisSongs('<?php echo $slug;?>');" class="lyrics_anchor" title="Add to Cart"><img src="<?php echo get_template_directory_uri(); ?>/images/cart.png"></a> 
        </div>
    </div>                             
</div>
<?php	
		}
	}
$cms['module:svl_home'] = ob_get_clean();   
ob_start();
    $result = $funSVLObj->featuredSVL(5);
    $num = $db->num_rows($result);
    if($num>0){
        while($row = $db->result($result)){
            $songs_file = $row->songs_file;
            $video_url = $row->video_file;
            $video_code  =  get_youtube_code($video_url);
            $slug = $row->token_keys;
?>
<div class="music1">                            
    <div class="row music_icons">
        <div class="col-md-7">
        <a href="javascript:void(0);" onclick="addThisSongsPlay('<?php echo $slug;?>');" class="lyrics_anchor"><img src="<?php echo get_template_directory_uri(); ?>/images/addico.png"></a>  
        <a href="<?php echo base_url('lyrics/'.$slug);?>" class="lyrics_anchor">                               
        <span class="songs_name"><?php echo substr($row->title, 0, 50) ?></span></a>
        </div>
        <div class="col-md-5">
        <a href="http://www.youtube.com/embed/<?php echo $video_code;?>?autoplay=1" class="lyrics_anchor various fancybox.iframe"><img src="<?php echo get_template_directory_uri(); ?>/images/videoplay.png"></a>
        <a href="<?php echo base_url('lyrics/'.$slug);?>" class="lyrics_anchor"><img src="<?php echo get_template_directory_uri(); ?>/images/lyricsico.png"  ></a>
        <?php if(file_exists(FCPATH."uploads/songs/".$songs_file) and !empty($songs_file)){?>
        <audio id="songs_<?php echo $slug;?>">
        <source type="audio/mpeg" src="<?php echo base_url('uploads/songs/'.$songs_file);?>"></source>
        Your browser does not support the audio tag.
        </audio>
<a id="playbtn_<?php echo $slug;?>" href="javascript:void(0);" onclick="document.getElementById('songs_<?php echo $slug;?>').play();show_pause_stop('<?php echo $slug;?>');" class="lyrics_anchor" title="Play video" ><img src="<?php echo get_template_directory_uri(); ?>/images/musicsico.png"></a>
        <?php }?>  
<a id="pausebtn_<?php echo $slug;?>" href="javascript:void(0);" onclick="document.getElementById('songs_<?php echo $slug;?>').pause();show_play_btn('<?php echo $slug;?>');" class="lyrics_anchor"  style="display:none;"><i class="fa fa-pause fa-2x"></i></a>
<a id="stopbtn_<?php echo $slug;?>" href="javascript:void(0);" onclick="document.getElementById('songs_<?php echo $slug;?>').pause();document.getElementById('songs_<?php echo $slug;?>').currentTime = 0;show_play_btn('<?php echo $slug;?>');" class="lyrics_anchor" style="display:none;" ><i class="fa fa-stop fa-2x"></i></a>
<a href="javascript:void(0);" onclick="addThisSongs('<?php echo $slug;?>');" class="lyrics_anchor"><img src="<?php echo get_template_directory_uri(); ?>/images/cart.png"></a> 
        </div>
    </div>                             
</div>
<?php   
        }
    }
$cms['module:featured_svl'] = ob_get_clean();  
ob_start();
    $result = $funSVLObj->latestSVL(5);
    $num = $db->num_rows($result);
    if($num>0){
        while($row = $db->result($result)){
            $songs_file = $row->songs_file;
            $video_url = $row->video_file;
            $video_code  =  get_youtube_code($video_url);
            $slug = $row->token_keys;
?>
<div class="music1">                            
    <div class="row music_icons">
        <div class="col-md-7">
        <a href="javascript:void(0);" onclick="addThisSongsPlay('<?php echo $slug;?>');" class="lyrics_anchor"><img src="<?php echo get_template_directory_uri(); ?>/images/addico.png"></a>  
        <a href="<?php echo base_url('lyrics/'.$slug);?>" class="lyrics_anchor">                              
        <span class="songs_name"><?php echo substr($row->title, 0, 50) ?></span></a>
        </div>
        <div class="col-md-5">
        <a href="http://www.youtube.com/embed/<?php echo $video_code;?>?autoplay=1" class="lyrics_anchor various fancybox.iframe"><img src="<?php echo get_template_directory_uri(); ?>/images/videoplay.png"></a>
        <a href="<?php echo base_url('lyrics/'.$slug);?>" class="lyrics_anchor"><img src="<?php echo get_template_directory_uri(); ?>/images/lyricsico.png" ></a>
        <?php if(file_exists(FCPATH."uploads/songs/".$songs_file) and !empty($songs_file)){?>
        <audio id="songs_<?php echo $slug;?>">
        <source type="audio/mpeg" src="<?php echo base_url('uploads/songs/'.$songs_file);?>"></source>
        Your browser does not support the audio tag.
        </audio>
<a id="playbtn_<?php echo $slug;?>" href="javascript:void(0);" onclick="document.getElementById('songs_<?php echo $slug;?>').play();show_pause_stop('<?php echo $slug;?>');" class="lyrics_anchor" title="Play video" ><img src="<?php echo get_template_directory_uri(); ?>/images/musicsico.png"></a>
        <?php }?>  
<a id="pausebtn_<?php echo $slug;?>" href="javascript:void(0);" onclick="document.getElementById('songs_<?php echo $slug;?>').pause();show_play_btn('<?php echo $slug;?>');"  class="lyrics_anchor" style="display:none;"><i class="fa fa-pause fa-2x"></i></a>
<a id="stopbtn_<?php echo $slug;?>" href="javascript:void(0);" onclick="document.getElementById('songs_<?php echo $slug;?>').pause();document.getElementById('songs_<?php echo $slug;?>').currentTime = 0;show_play_btn('<?php echo $slug;?>');" class="lyrics_anchor" style="display:none;" ><i class="fa fa-stop fa-2x"></i></a>   
<a href="javascript:void(0);" onclick="addThisSongs('<?php echo $slug;?>');" class="lyrics_anchor"><img src="<?php echo get_template_directory_uri(); ?>/images/cart.png"></a>     
        </div>
    </div>                             
</div>
<?php   
        }
    }
$cms['module:latest_svl'] = ob_get_clean();
ob_start();
?>
<div class="rightsidesection margin-bottom-10">
<h3 class="headline_title">New Uploads <a href="javascript:void(0);" class="up_down_anchor pull-right next-button">&nbsp;Down&nbsp;</a> <a href="javascript:void(0);" class="up_down_anchor pull-right prev-button">&nbsp;Up&nbsp;</a>  </h3>
                        <div class="items_list">
<ul class="newsticker news_ticker_box">                        
<?php                        
    $result = $funSVLObj->latestSVL(5);
    $num = $db->num_rows($result);
    if($num>0){
        while($row = $db->result($result)){
            $songs_file = $row->songs_file;
            $video_url = $row->video_file;
            $video_code  =  get_youtube_code($video_url);
            $slug = $row->token_keys;
?>
<li class="news-item">
<div class="music1">                            
    <div class="row music_icons">
        <div class="col-md-7">
        <a href="javascript:void(0);" onclick="addThisSongsPlay('<?php echo $slug;?>');" class="lyrics_anchor"><img src="<?php echo get_template_directory_uri(); ?>/images/addico.png" title="Add to wishlist"></a>  
        <a href="<?php echo base_url('lyrics/'.$slug);?>" class="lyrics_anchor">                              
        <span class="songs_name"><?php echo substr($row->title, 0, 50) ?></span></a>
        </div>
        <div class="col-md-5">
        <a href="http://www.youtube.com/embed/<?php echo $video_code;?>?autoplay=1" class="lyrics_anchor various fancybox.iframe"><img src="<?php echo get_template_directory_uri(); ?>/images/videoplay.png"></a>
        <a href="<?php echo base_url('lyrics/'.$slug);?>" class="lyrics_anchor"><img src="<?php echo get_template_directory_uri(); ?>/images/lyricsico.png" ></a>
        <?php if(file_exists(FCPATH."uploads/songs/".$songs_file) and !empty($songs_file)){?>
        <audio id="songs_<?php echo $slug;?>">
        <source type="audio/mpeg" src="<?php echo base_url('uploads/songs/'.$songs_file);?>"></source>
        Your browser does not support the audio tag.
        </audio>
<a id="playbtn_<?php echo $slug;?>" href="javascript:void(0);" onclick="document.getElementById('songs_<?php echo $slug;?>').play();show_pause_stop('<?php echo $slug;?>');" class="lyrics_anchor" title="Play video" ><img src="<?php echo get_template_directory_uri(); ?>/images/musicsico.png"></a>
        <?php }?>  
<a id="pausebtn_<?php echo $slug;?>" href="javascript:void(0);" onclick="document.getElementById('songs_<?php echo $slug;?>').pause();show_play_btn('<?php echo $slug;?>');"  class="lyrics_anchor" style="display:none;"><i class="fa fa-pause fa-2x"></i></a>
<a id="stopbtn_<?php echo $slug;?>" href="javascript:void(0);" onclick="document.getElementById('songs_<?php echo $slug;?>').pause();document.getElementById('songs_<?php echo $slug;?>').currentTime = 0;show_play_btn('<?php echo $slug;?>');" class="lyrics_anchor" style="display:none;" ><i class="fa fa-stop fa-2x"></i></a>   
<a href="javascript:void(0);" onclick="addThisSongs('<?php echo $slug;?>');" class="lyrics_anchor"><img src="<?php echo get_template_directory_uri(); ?>/images/cart.png"></a>     
        </div>
    </div>                             
</div>
</li>
<?php   
        } 
    }
?>
</ul>

</div>
</div>
<?php
$cms['module:new_uploads'] = ob_get_clean();
ob_start();
$result_videos  =  $funSVLObj->featuredVideoSVL();
$num =  $db->num_rows($result_videos);
if($num>0){
?>
<!--h3 class="headline_title">Featured Videos</h3-->
<?php
 $sn=1;
 while($row_videos  =  $db->result($result_videos)){ 
    if($sn==1){
            $video_url   =  $row_videos->video_file;
            $video_code  =  get_youtube_code($video_url);
        ?>
 <div id="feature_video" class="videosize margin-bottom-10">                
 <iframe id="feature_video_iframe" type="text/html" width="100%" height="250" src="http://www.youtube.com/embed/<?php echo $video_code;?>" frameborder="0" allowFullScreen></iframe>               
 </div>
    <?php }//sn==1 
 $sn++; }//while?>
 <!--divclose-->
 <div class="owl-clients-v2">
 <?php
 $sn=1;
 $result_videos  =  $funSVLObj->featuredVideoSVL();
 while($row_videos  =  $db->result($result_videos)){ 
            $video_url   =  $row_videos->video_file;
            $video_code  =  get_youtube_code($video_url);
            $video_image =  get_youtube_thumbnail($video_url); 
        ?>
   <!--div class="item"><a href="javascript:void(0);" onclick="document.getElementById('feature_video_iframe').src='http://www.youtube.com/embed/<?php echo $video_code;?>';" data-code="<?php echo $video_code;?>"><img class="img-responsive" src="<?php echo $video_image;?>"></a></div-->
   <?php
 $sn++; }//while?>
</div>
<?php }//num ?>
<?php $cms['module:featured_videos'] = ob_get_clean();
ob_start();?>
<div class="leftsidesection margin-bottom-10">
 <h3 class="headline_title">Top Artist</h3>
     <div class="feature_thumb_images">
    <?php
     $sn=1;
 $result_artist  =  $funSVLObj->top_artist();?>
    <table class="table-condensed table-responsive">
 <?php
 while($row_artist  =  $db->result($result_artist)){ 
       $artist_name =  $row_artist->artist_name;
       $profile_image  =  $row_artist->profile_image;
    ?>
    <?php if(file_exists(FCPATH.'uploads/images/artist/'.$profile_image) and !empty($profile_image)){
        if($sn%3==1){echo "<tr>";}
        ?>
       <td><a href="<?php echo base_url('artist/'.$row_artist->slug);?>" title="<?php echo $artist_name;?>"><img height="200" width="200" class="img-responsive" src="<?php echo base_url('uploads/images/artist/'.$profile_image);?>"></a></td>
    <?php if($sn%3==0){echo "</tr>";} 
         } ?>   
    <?php $sn++; } ?> 
    </table>
       <!--div class="clearfix"></div-->
    </div> 
</div> 
<?php
$cms['module:top_artist'] = ob_get_clean();
ob_start();?>
<!--div class="col-md-2" style="transform: rotate(-90deg);transform-origin: bottom right; background-color: skyblue; ">
           <p class=" pull-left" style="font-size: 32px;">EXPLORE</p> 
            </div-->
            <div class="col-md-1">
                <img src="<?php echo 'http://localhost/lyricsnepal/uploads/images/explore.png';?>">
            </div>

<div style="padding-top: 4%;">
<?php
     $i=1;
     $j=1;
  $result  =  $funSVLObj->exploreSongs();?>
   <table class="table-responsive table-striped cellpadding="5" cellspacing="5" border="0">
<?php
  while($row  =  $db->result($result)):
        $title          = $row->title;
        $slug           = $row->token_keys;
        $artist_name    =  $row->artist_name;
        $profile_image  =  $row->profile_image;
?>      
<?php if(file_exists(FCPATH.'uploads/images/artist/'.$profile_image) and !empty($profile_image) and $j<5){?>

                <?php if($i==1){?>
                    <tr>
                <?php } ?>
                    <td><a href="<?php echo base_url('lyrics/'.$row->token_keys);?>"><img width="50" class="img-responsive" src="<?php echo base_url('uploads/images/artist/'.$profile_image);?>" alt=""></a></td>
                    <td class="pull-left" width="300" style="padding-left: 20px;"><a style="color: black;" href="<?php echo base_url('lyrics/'.$row->token_keys);?>"><i><?php echo ucfirst($title);?></i></a><br>
                        <a style="color: black;" href="<?php echo base_url('artist/'.$row->artist_slug);?>"><strong><?php echo ucwords($artist_name);?></strong></a></td>
                    <?php
                  if($i%3==0){
                     echo "</tr>";
                     $i=1;
                     $j++;
                  } else{$i++;}
        }//check image exist          

                  endwhile;
                  echo "</table>";
                  if($i<3){
                    //echo '</ul>';
                     echo '</tr>';
                  } 
                  ?>  
</div>
<?php
$cms['module:explore_songs'] = ob_get_clean();

