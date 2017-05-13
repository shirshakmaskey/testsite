<?php 
$pagename  =  pagename();
if($pagename=='artist.php'){    
    $row_artist  =  $funSVLObj->artist_by_slug($gslug);
    $artist_id   =  $row_artist->id;
    $result_gallery  =  $funSVLObj->gallery_by_artist_id($artist_id); 
    $result_album    =  $funSVLObj->latestSVLAlbum($artist_id); 
    $result_album_related    =  $funSVLObj->relatedSVLAlbum($artist_id);
    $result_album_hit        =  $funSVLObj->hitRelatedSVLAlbum($artist_id);
}
else if($pagename=='album.php'){    
    $row_album   =  $funSVLObj->album_by_slug($gslug);
    $album_id    =  $row_album->id;
    $artist_id   =  $row_album->artist_id;
    $row_artist  =  $funSVLObj->artist_by_id($artist_id);
    $feature_album_songs  =  $funSVLObj->featuredAlbumSongs($album_id,2);
    $all_album_songs  =  $funSVLObj->albumSongs($album_id);

    $result_gallery  =  $funSVLObj->gallery_by_artist_id($artist_id); 
    $result_album    =  $funSVLObj->latestSVLAlbum($artist_id); 
    $result_album_related    =  $funSVLObj->relatedSVLAlbum($artist_id);
    $result_album_hit        =  $funSVLObj->hitRelatedSVLAlbum($artist_id);
}
else if($pagename=='lyrics.php'){
    $svl_row  =  $funSVLObj->find_by_slug($gslug);  
    $artist_id   =  $svl_row->artist_id;
    $album_id    =  $svl_row->album_id;
    $row_artist  =  $funSVLObj->artist_by_id($artist_id);   
    $row_album   =  $funSVLObj->album_by_id($album_id);
    $all_album_songs  =  $funSVLObj->albumSongs($album_id);
    $result_gallery  =  $funSVLObj->gallery_by_artist_id($artist_id); 
    $result_album    =  $funSVLObj->latestSVLAlbum($artist_id); 
    $result_album_related    =  $funSVLObj->relatedSVLAlbum($artist_id);

    $result_album_hit        =  $funSVLObj->hitRelatedSVLAlbum($artist_id);
}
else{
    $result_album_related    =  $funSVLObj->relatedSVLAlbum();
    $result_album_hit        =  $funSVLObj->hitRelatedSVLAlbum();
}
?>
<?php
ob_start();?>
<div class="container content">
    <div class="row">
        <form action="" method="post" name="event_form" id="event_form" class="form-horizontal book_a_thereater" >
                <h2 class="h2_plain">BOOK EVENTS TICKETS</h2> 
                 <div class="col-md-3">
                     <label>Events</label>
                     <select name="event_type" id="event_type" class="form-control" onchange="$('#event_form').attr('action',this.value);">
                            <option value="">Select Events</option>
                            <?php
$result  =  $funEventsObj->latestList(3);
if($result['num_rows']>0){ 
   while($row =  $funObj->result($result['result'])){
  ?>
                            <option value="<?php echo base_url('events/'.$row->slug); ?>"><?php echo $row->title;?></option>
                           <?php }}?> 
                     </select>
                 </div> 

                 <div class="col-md-2">
                     <label>Qty</label>
                     <select name="ticket_qty" id="ticket_qty" class="form-control">
                            <?php foreach (range(1,10) as $key => $value) { ?>
                  <option value="<?php echo $value;?>"><?php echo $value;?></option>  
                  <?php } ?>  
                     </select>
                 </div>
 
                 <div class="col-md-3">
                     <label>Name</label>
                    <input type="text" name="fullname" id="fullname" class="form-control">
                 </div>

                 <div class="col-md-3">
                     <label>Email</label>
                    <input type="text" name="email" id="email" class="form-control">
                 </div>

                 
                 <div class="col-md-1">
                     <label>&nbsp;</label>
                     <input type="submit" class="btn btn-danger" name="submitBtn" value="Book Now">
                 </div>

        </form>
    </div>
</div>
<?php
$cms['module:ticket_booking'] = ob_get_clean();
ob_start();
$profile_image  =  $row_artist->profile_image;
?>
 <h3 class="headline_title"><?php echo $row_artist->artist_name;?></h3>

<?php if(file_exists(FCPATH.'uploads/images/artist/'.$profile_image) and !empty($profile_image)){?>
<div class="feature_image"><img class="img-responsive" src="<?php echo base_url('uploads/images/artist/'.$profile_image);?>"></div><?php } ?>

    <div class="feature_thumb_images">
<?php $num_gallery  =  $db->num_rows($result_gallery);
if($num_gallery>0){
    while($row_gal =  $db->result($result_gallery)){  
 $gallery_id  =  $row_gal->id;
 $cover_image  =  $row_gal->cover_image;   
 if(file_exists(FCPATH.'uploads/images/gallery/'.$cover_image) and !empty($cover_image)){
?>
<div class="item_image"><a href="<?php echo base_url('uploads/images/gallery/'.$cover_image);?>" class="fancybox" rel="gallery" title="<?php echo $row_gal->gallery_name;?>"><img class="img-responsive" src="<?php echo base_url('uploads/images/gallery/'.$cover_image);?>"></a></div>
<?php }}
  $result_photo  =  $funSVLObj->photo_by_gallery_id($gallery_id); 
    $num_photo  =  $db->num_rows($result_photo);
    if($num_photo>0){
    while($row_photo =  $db->result($result_photo)){   
     $photo_image  =  $row_photo->image;   
  if(file_exists(FCPATH.'uploads/images/photo/'.$photo_image) and !empty($photo_image)){?>
<div class="item_image"><a href="<?php echo base_url('uploads/images/photo/'.$photo_image);?>" class="fancybox"  rel="gallery" title="<?php echo $row_photo->photo_title;?>"><img class="img-responsive" src="<?php echo base_url('uploads/images/photo/'.$photo_image);?>"></a></div>
 <?php }}}
}//num_gallery ?>
       <div class="clearfix"></div>
    </div> 
<?php
$cms['module:artist_images'] = ob_get_clean();
ob_start();
$result_videos  =  $funSVLObj->featuredVideoSVL($artist_id);
$num =  $db->num_rows($result_videos);
if($num>0){
?>
<h3 class="headline_title">Feature vidoes</h3>
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
 $result_videos  =  $funSVLObj->featuredVideoSVL($artist_id);
 while($row_videos  =  $db->result($result_videos)){ 
            $video_url   =  $row_videos->video_file;
            $video_code  =  get_youtube_code($video_url);
            $video_image =  get_youtube_thumbnail($video_url); 
        ?>
   <div class="item"><a href="javascript:void(0);" onclick="document.getElementById('feature_video_iframe').src='http://www.youtube.com/embed/<?php echo $video_code;?>';" data-code="<?php echo $video_code;?>"><img class="img-responsive" src="<?php echo $video_image;?>"></a></div>
   <?php
 $sn++; }//while?>
</div>
<?php }//num ?>
<?php $cms['module:artist_videos'] = ob_get_clean();
ob_start();?>
<h3 class="headline_title">INFO</h3>
<p class="info">
  <?php echo html_entity_decode($row_artist->biography);?>
</p>
<?php
$cms['module:artist_info'] = ob_get_clean();
ob_start();
$result = $funSVLObj->latestSVLItem($artist_id,10);
    $num = $db->num_rows($result);
    if($num>0){?>
<h3 class="headline_title">Lyrics <a href="javascript:void(0);" class="up_down_anchor pull-right next-button">&nbsp;Down&nbsp;</a> <a href="javascript:void(0);" class="up_down_anchor pull-right prev-button">&nbsp;Up&nbsp;</a>  </h3>
                            <div class="items_list">                               

<ul class="newsticker news_ticker_box">
        <?php while($row = $db->result($result)){
            $songs_file = $row->songs_file;
            $video_url = $row->video_file;
            $video_code  =  get_youtube_code($video_url);
            $slug = $row->token_keys;
?>
<li class="news-item">
<div class="music1">                            
    <div class="row music_icons">
        <div class="col-md-7">
        <a href="javascript:void(0);" onclick="addThisSongsPlay('<?php echo $slug;?>');" class="lyrics_anchor"><img src="<?php echo get_template_directory_uri(); ?>/images/addico.png"></a> 
        <a href="<?php echo base_url('lyrics/'.$row->token_keys);?>" class="lyrics_anchor">                               
        <span class="songs_name"><?php echo substr($row->title, 0, 50) ?></span></a>
        </div>
        <div class="col-md-5">
        <a href="http://www.youtube.com/embed/<?php echo $video_code;?>?autoplay=1" class="lyrics_anchor various fancybox.iframe"><img src="<?php echo get_template_directory_uri(); ?>/images/videoplay.png"></a>
        <a href="<?php echo base_url('lyrics/'.$row->token_keys);?>" class="lyrics_anchor"><img src="<?php echo get_template_directory_uri(); ?>/images/lyricsico.png"  ></a>
        <?php if(file_exists(FCPATH."uploads/songs/".$songs_file) and !empty($songs_file)){?>
        <audio id="songs_<?php echo $slug;?>">
        <source type="audio/mpeg" src="<?php echo base_url('uploads/songs/'.$songs_file);?>"></source>
        Your browser does not support the audio tag.
        </audio>
<a id="playbtn_<?php echo $slug;?>" href="javascript:void(0);" onclick="document.getElementById('songs_<?php echo $slug;?>').play();show_pause_stop('<?php echo $slug;?>');" class="lyrics_anchor" ><img src="<?php echo get_template_directory_uri(); ?>/images/musicsico.png"></a>
        <?php }?>  
<a id="pausebtn_<?php echo $slug;?>" href="javascript:void(0);" onclick="document.getElementById('songs_<?php echo $slug;?>').pause();show_play_btn('<?php echo $slug;?>');"  class="lyrics_anchor" style="display:none;"><i class="fa fa-pause fa-2x"></i></a>
<a id="stopbtn_<?php echo $slug;?>" href="javascript:void(0);" onclick="document.getElementById('songs_<?php echo $slug;?>').pause();document.getElementById('songs_<?php echo $slug;?>').currentTime = 0;show_play_btn('<?php echo $slug;?>');" class="lyrics_anchor" style="display:none;" ><i class="fa fa-stop fa-2x"></i></a> 
<a href="javascript:void(0);" onclick="addThisSongs('<?php echo $slug;?>');" class="lyrics_anchor"><img src="<?php echo get_template_directory_uri(); ?>/images/cart.png"></a>         
        </div>
    </div>                             
</div>
</li>

<?php }?>
</ul>
</div>
    <?php }
$cms['module:artist_lyrics'] = ob_get_clean();
ob_start();?>
<div class="owl-carousel-v1 owl-work-v1 margin-bottom-40">
       <div class=""><h3 class="headline_title pull-left">ALBUM</h3>            
           <div class="owl-navigation">
            <div class="customNavigation">
                <a class="owl-btn prev-v1"><i class="fa fa-angle-left"></i></a>
                <a class="owl-btn next-v1"><i class="fa fa-angle-right"></i></a>
            </div>
        </div><!--/navigation-->
    </div>

    <div class="owl-recent-works-v1">
    <?php $num_album  =  $db->num_rows($result_album);
if($num_album>0){
    while($row_album_item =  $db->result($result_album)){ 
        ?>
        <div class="item">
            <a href="#">
                <em class="overflow-hidden">
                <?php $cover_image  =  $row_album_item->cover_image;   
 if(file_exists(FCPATH.'uploads/images/album/'.$cover_image) and !empty($cover_image)){?>
                    <img class="img-responsive" src="<?php echo base_url('uploads/images/album/'.$cover_image);?>" alt="<?php echo $row_album_item->album_name;?>">
      <?php } ?>              
                </em>
                <span>
                    <strong><?php echo $row_album_item->album_name;?></strong>
                    <i>Version : <?php echo $row_album_item->version;?></i>
                    <p><?php echo substr($row_album_item->detail,0,50);?></p>
                </span>
            </a>
        </div>
<?php }}?>
    </div>
</div>
<?php
$cms['module:artist_album'] = ob_get_clean();
ob_start();?>
<div class="owl-carousel-v1 owl-work-v1 margin-bottom-40">
            <div class=""><h3 class="headline_title pull-left"><?php if($pagename!="welcome.php"){ echo "RELATED ALBUM"; }else{ echo "ALBUM";}?></h3>            
                <div class="owl-navigation">
                    <div class="customNavigation">
                        <a class="owl-btn prev-v2"><i class="fa fa-angle-left"></i></a>
                        <a class="owl-btn next-v2"><i class="fa fa-angle-right"></i></a>
                    </div>
                </div><!--/navigation-->
            </div>

    <div class="owl-recent-works-v2">
    <?php $num_album  =  $db->num_rows($result_album_related);
if($num_album>0){
    while($row_album_item =  $db->result($result_album_related)){ 
        $slug  = $row_album_item->slug;
        ?>
        <div class="item">
            <a href="<?php echo base_url('album/'.$slug);?>">
                <em class="overflow-hidden">
                <?php $cover_image  =  $row_album_item->cover_image;   
 if(file_exists(FCPATH.'uploads/images/album/'.$cover_image) and !empty($cover_image)){?>
                    <img class="img-responsive" src="<?php echo base_url('uploads/images/album/'.$cover_image);?>" alt="<?php echo $row_album_item->album_name;?>">
      <?php } ?>              
                </em>
                <span>
                    <strong><?php echo $row_album_item->album_name;?></strong>
                    <i>Version : <?php echo $row_album_item->version;?></i>
                    <p><?php echo substr($row_album_item->detail,0,50);?></p>
                </span>
            </a>
        </div>
<?php }}?>
    </div>
</div>
<?php
$cms['module:artist_related_album'] = ob_get_clean();
ob_start();
$result = $funSVLObj->relatedlatestSVL($artist_id,10);
    $num = $db->num_rows($result);
    if($num>0){?>
<h3 class="headline_title">Other Lyrics <a href="javascript:void(0);" class="up_down_anchor pull-right next-button">&nbsp;Down&nbsp;</a> <a href="javascript:void(0);" class="up_down_anchor pull-right prev-button">&nbsp;Up&nbsp;</a>  </h3>
                            <div class="items_list">                               

<ul class="newsticker_other news_ticker_box">
        <?php while($row = $db->result($result)){
            $songs_file = $row->songs_file;
            $video_url = $row->video_file;
            $video_code  =  get_youtube_code($video_url);
            $slug = $row->token_keys;
?>
<li class="news-item">
<div class="music1">                            
    <div class="row music_icons">
        <div class="col-md-7">
        
        <a href="javascript:void(0);" onclick="addThisSongsPlay('<?php echo $slug;?>');" class="lyrics_anchor"><img src="<?php echo get_template_directory_uri(); ?>/images/addico.png"></a>  
        <a href="<?php echo base_url('lyrics/'.$row->token_keys);?>" class="lyrics_anchor">                               
        <span class="songs_name"><?php echo substr($row->title, 0, 50) ?></span></a>
        </div>
        <div class="col-md-5">
        <a href="http://www.youtube.com/embed/<?php echo $video_code;?>?autoplay=1" class="lyrics_anchor various fancybox.iframe"><img src="<?php echo get_template_directory_uri(); ?>/images/videoplay.png"></a>
        <a href="<?php echo base_url('lyrics/'.$row->token_keys);?>" class="lyrics_anchor"><img src="<?php echo get_template_directory_uri(); ?>/images/lyricsico.png"  ></a>
        <?php if(file_exists(FCPATH."uploads/songs/".$songs_file) and !empty($songs_file)){?>
        <audio id="songs_<?php echo $slug;?>">
        <source type="audio/mpeg" src="<?php echo base_url('uploads/songs/'.$songs_file);?>"></source>
        Your browser does not support the audio tag.
        </audio>
<a id="playbtn_<?php echo $slug;?>" href="javascript:void(0);" onclick="document.getElementById('songs_<?php echo $slug;?>').play();show_pause_stop('<?php echo $slug;?>');" class="lyrics_anchor" ><img src="<?php echo get_template_directory_uri(); ?>/images/musicsico.png"></a>
        <?php }?>  
<a id="pausebtn_<?php echo $slug;?>" href="javascript:void(0);" onclick="document.getElementById('songs_<?php echo $slug;?>').pause();show_play_btn('<?php echo $slug;?>');"  class="lyrics_anchor" style="display:none;"><i class="fa fa-pause fa-2x"></i></a>
<a id="stopbtn_<?php echo $slug;?>" href="javascript:void(0);" onclick="document.getElementById('songs_<?php echo $slug;?>').pause();document.getElementById('songs_<?php echo $slug;?>').currentTime = 0;show_play_btn('<?php echo $slug;?>');" class="lyrics_anchor" style="display:none;" ><i class="fa fa-stop fa-2x"></i></a>
<a href="javascript:void(0);" onclick="addThisSongs('<?php echo $slug;?>');" class="lyrics_anchor"><img src="<?php echo get_template_directory_uri(); ?>/images/cart.png"></a>          
        </div>
    </div>                             
</div>
</li>

<?php }?>
</ul>
</div>
    <?php }
$cms['module:artist_other_lyrics'] = ob_get_clean();
ob_start();?>
<div class="owl-carousel-v1 owl-work-v1 margin-bottom-40">
            <div class=""><h3 class="headline_title pull-left">HIT ALBUM</h3>            
                <div class="owl-navigation">
                    <div class="customNavigation">
                        <a class="owl-btn prev-v4"><i class="fa fa-angle-left"></i></a>
                        <a class="owl-btn next-v4"><i class="fa fa-angle-right"></i></a>
                    </div>
                </div><!--/navigation-->
            </div>

    <div class="owl-recent-works-v4">
    <?php $num_album  =  $db->num_rows($result_album_hit);
if($num_album>0){
    while($row_album_item =  $db->result($result_album_hit)){ 
        $slug  = $row_album_item->slug;
        ?>
        <div class="item">
            <a href="<?php echo base_url('album/'.$slug);?>">
                <em class="overflow-hidden">
                <?php $cover_image  =  $row_album_item->cover_image;   
 if(file_exists(FCPATH.'uploads/images/album/'.$cover_image) and !empty($cover_image)){?>
                    <img class="img-responsive" src="<?php echo base_url('uploads/images/album/'.$cover_image);?>" alt="<?php echo $row_album_item->album_name;?>">
      <?php } ?>              
                </em>
                <span>
                    <strong><?php echo $row_album_item->album_name;?></strong>
                    <i>Version : <?php echo $row_album_item->version;?></i>
                    <p><?php echo substr($row_album_item->detail,0,50);?></p>
                </span>
            </a>
        </div>
<?php }}?>
    </div>
</div>
<?php
$cms['module:artist_hit_album'] = ob_get_clean();
ob_start();?>
<div class="row">
                
                 <div class="col-md-4">
                    <table class="album_title_table" class="table">
                      <tr>
                      <td valign="top" class="album_title_table_title">Title :</td><td> 
                         
                         <?php
$num_songs  =  $db->num_rows($feature_album_songs);
if($num_songs>0){
    while($row_songs =  $db->result($feature_album_songs)){
            $slug  = $row_songs->token_keys;
            $rating  =  $row_songs->rating;
            ?>
    <a href="<?php echo base_url('lyrics/'.$slug);?>"><?php echo $row_songs->title;?></a><br>
    <?php }}?>
                      </td>
                      </tr>
                    </table>
                                         
                 </div>

                 <div class="col-md-4">
                     <table class="album_title_table" class="table">
                      <tr>
                      <td valign="top" class="album_title_table_title">ALBUM :</td><td> 
                      <a href="<?php echo base_url('album/'.$row_album->slug);?>"><?php echo ucwords($row_album->album_name);?></a> </td></tr>
                      <tr>
                      <td valign="top" class="album_title_table_title">ARTIST :</td><td> 
                      <a href="<?php echo base_url('artist/'.$row_artist->slug);?>"><?php echo ucwords($row_artist->artist_name);?></a> </td>
                      </tr>
                    </table>
                     
                 </div>

                 <div class="col-md-4">
                     <table class="album_title_table" class="table">
                      <tr>
                      <td valign="top" class="album_title_table_title">GENERE :</td><td> <?php echo ucwords($row_album->genre);?> </td></tr>
                      <tr>
                      <td valign="top" class="album_title_table_title">RATING :</td><td> 
                      <?php for($i=1;$i<=$rating;$i++){
                           echo "<i class='fa fa-star'></i>";
                        } ?>
                       </td>
                      </tr>
                    </table>
                      
                 </div>
                </div>
<?php
$cms['module:album_info'] = ob_get_clean();
ob_start();
$artist_id   =  $svl_row->artist_id;
$album_id    =  $svl_row->album_id;
$row_artist  =  $funSVLObj->artist_by_id($artist_id);   
$row_album   =  $funSVLObj->album_by_id($album_id);
$rating      =  $svl_row->rating;
?>
<div class="row">
                
                 <div class="col-md-4">
                    <table class="album_title_table" class="table">
                      <tr>
                      <td valign="top" class="album_title_table_title">Title :</td><td> 
                         <?php echo $svl_row->title;?>                         
                      </td>
                      </tr>
                    </table>
                                         
                 </div>

                 <div class="col-md-4">
                     <table class="album_title_table" class="table">
                      <tr>
                      <td valign="top" class="album_title_table_title">ALBUM :</td><td> 
                      <a href="<?php echo base_url('album/'.$row_album->slug);?>"><?php echo ucwords($row_album->album_name);?></a> </td></tr>
                      <tr>
                      <td valign="top" class="album_title_table_title">ARTIST :</td><td> 
                      <a href="<?php echo @base_url('artist/'.$row_artist->slug);?>"><?php echo @ucwords($row_artist->artist_name);?></a> </td>
                      </tr>
                    </table>
                     
                 </div>

                 <div class="col-md-4">
                     <table class="album_title_table" class="table">
                      <tr>
                      <td valign="top" class="album_title_table_title">GENERE :</td><td> <?php echo ucwords($row_album->genre);?> </td></tr>
                      <tr>
                      <td valign="top" class="album_title_table_title">RATING :</td><td> 
                      <?php for($i=1;$i<=$rating;$i++){
                           echo "<i class='fa fa-star'></i>";
                        } ?>
                       </td>
                      </tr>
                    </table>
                     
                 </div>
                </div>
<?php
$cms['module:album_info_lyrics'] = ob_get_clean();
ob_start();
$row_album   =  $funSVLObj->album_by_slug($gslug);
$album_id    =  $row_album->id;
$artist_id   =  $row_album->artist_id;
$row_artist  =  $funSVLObj->artist_by_id($artist_id);
?>
<?php $profile_image  =  $row_artist->profile_image;   
 if(file_exists(FCPATH.'uploads/images/artist/'.$profile_image) and !empty($profile_image)){?>
<div class="pro_image"><img class="img-responsive" src="<?php echo base_url('uploads/images/artist/'.$profile_image);?>" alt="<?php echo $row_artist->artist_name;?>"></div>
      <?php } ?>
<?php $cover_image  =  $row_album->cover_image;   
 if(file_exists(FCPATH.'uploads/images/album/'.$cover_image) and !empty($cover_image)){?>
<div class="feature_image"><img class="img-responsive" src="<?php echo base_url('uploads/images/album/'.$cover_image);?>" alt="<?php echo $row_album->album_name;?>"></div>
      <?php } ?>  
<?php
$cms['module:album_profile_cover_image'] = ob_get_clean();
ob_start();?>
<div class="right_breadcumb">
   <ul class="list-inline">
     <li><a href="<?php echo base_url();?>">Home</a></li>
     <li><i class="fa fa-angle-right"></i></li>
     <li><a href="<?php echo base_url('artist/'.$row_artist->slug);?>"><?php echo ucwords($row_artist->artist_name);?></a></li>
     <li><i class="fa fa-angle-right"></i></li>
     <li><?php echo ucwords($row_album->album_name);?></li>
   </ul>
</div> 
<h3 class="headline_title">ALBUM INFO</h3>
<p class="info">
<?php echo $row_album->detail;?>
</p>  
<?php
$cms['module:album_breadcumb_detail'] = ob_get_clean();
ob_start();
$svl_row     =  $funSVLObj->album_by_slug($gslug); 
$artist_id   =  $svl_row->artist_id;
$album_id    =  $svl_row->id;
$row_artist  =  $funSVLObj->artist_by_id($artist_id);   
$row_album   =  $funSVLObj->album_by_id($album_id); 
    $num = $db->num_rows($all_album_songs);
    if($num>0){?>
<h3 class="headline_title">Lyrics FROM <?php echo ucwords($row_album->album_name);?> <a href="javascript:void(0);" class="up_down_anchor pull-right next-button">&nbsp;Down&nbsp;</a> <a href="javascript:void(0);" class="up_down_anchor pull-right prev-button">&nbsp;Up&nbsp;</a>  </h3>
                            <div class="items_list">                               

<ul class="newsticker news_ticker_box">
        <?php while($row = $db->result($all_album_songs)){
            $songs_file = $row->songs_file;
            $video_url = $row->video_file;
            $video_code  =  get_youtube_code($video_url);
            $slug = $row->token_keys;
?>
<li class="news-item">
<div class="music1">                            
    <div class="row music_icons">
        <div class="col-md-7">
        <a href="javascript:void(0);" onclick="addThisSongsPlay('<?php echo $slug;?>');" class="lyrics_anchor"><img src="<?php echo get_template_directory_uri(); ?>/images/addico.png"></a>  
        <a href="<?php echo base_url('lyrics/'.$row->token_keys);?>" class="lyrics_anchor">                               
        <span class="songs_name"><?php echo substr($row->title, 0, 50) ?></span></a>
        </div>
        <div class="col-md-5">
        <a href="http://www.youtube.com/embed/<?php echo $video_code;?>?autoplay=1" class="lyrics_anchor various fancybox.iframe"><img src="<?php echo get_template_directory_uri(); ?>/images/videoplay.png"></a>
        <a href="<?php echo base_url('lyrics/'.$row->token_keys);?>" class="lyrics_anchor"><img src="<?php echo get_template_directory_uri(); ?>/images/lyricsico.png"  ></a>
        <?php if(file_exists(FCPATH."uploads/songs/".$songs_file) and !empty($songs_file)){?>
        <audio id="songs_<?php echo $slug;?>">
        <source type="audio/mpeg" src="<?php echo base_url('uploads/songs/'.$songs_file);?>"></source>
        Your browser does not support the audio tag.
        </audio>
<a id="playbtn_<?php echo $slug;?>" href="javascript:void(0);" onclick="document.getElementById('songs_<?php echo $slug;?>').play();show_pause_stop('<?php echo $slug;?>');" class="lyrics_anchor" ><img src="<?php echo get_template_directory_uri(); ?>/images/musicsico.png"></a>
        <?php }?>  
<a id="pausebtn_<?php echo $slug;?>" href="javascript:void(0);" onclick="document.getElementById('songs_<?php echo $slug;?>').pause();show_play_btn('<?php echo $slug;?>');"  class="lyrics_anchor" style="display:none;"><i class="fa fa-pause fa-2x"></i></a>
<a id="stopbtn_<?php echo $slug;?>" href="javascript:void(0);" onclick="document.getElementById('songs_<?php echo $slug;?>').pause();document.getElementById('songs_<?php echo $slug;?>').currentTime = 0;show_play_btn('<?php echo $slug;?>');" class="lyrics_anchor" style="display:none;" ><i class="fa fa-stop fa-2x"></i></a>
<a href="javascript:void(0);" onclick="addThisSongs('<?php echo $slug;?>');" class="lyrics_anchor"><img src="<?php echo get_template_directory_uri(); ?>/images/cart.png"></a>          
        </div>
    </div>                             
</div>
</li>

<?php }?>
</ul>
</div>
    <?php }
$cms['module:album_lyrics'] = ob_get_clean();
ob_start();
$svl_row     =  $funSVLObj->find_by_slug($gslug); 
$artist_id   =  $svl_row->artist_id;
$album_id    =  $svl_row->album_id;
$row_artist  =  $funSVLObj->artist_by_id($artist_id);   
$row_album   =  $funSVLObj->album_by_id($album_id);
    $all_album_songs  =  $funSVLObj->albumSongs($album_id);
    $num = $db->num_rows($all_album_songs);
    if($num>0){?>
<h3 class="headline_title">Lyrics FROM <?php echo ucwords($row_album->album_name);?> <a href="javascript:void(0);" class="up_down_anchor pull-right next-button">&nbsp;Down&nbsp;</a> <a href="javascript:void(0);" class="up_down_anchor pull-right prev-button">&nbsp;Up&nbsp;</a>  </h3>
                            <div class="items_list">                               

<ul class="newsticker news_ticker_box">
        <?php             
            while($row = $db->result($all_album_songs)){
            $songs_file = $row->songs_file;
            $video_url = $row->video_file;
            $video_code  =  get_youtube_code($video_url);
            $slug = $row->token_keys;
?>
<li class="news-item">
<div class="music1">                            
    <div class="row music_icons">
        <div class="col-md-7">
        <a href="javascript:void(0);" onclick="addThisSongsPlay('<?php echo $slug;?>');" class="lyrics_anchor"><img src="<?php echo get_template_directory_uri(); ?>/images/addico.png"></a>  
        <a href="<?php echo base_url('lyrics/'.$row->token_keys);?>" class="lyrics_anchor">                               
        <span class="songs_name"><?php echo substr($row->title, 0, 50) ?></span></a>
        </div>
        <div class="col-md-5">
        <a href="http://www.youtube.com/embed/<?php echo $video_code;?>?autoplay=1" class="lyrics_anchor various fancybox.iframe"><img src="<?php echo get_template_directory_uri(); ?>/images/videoplay.png"></a>
        <a href="<?php echo base_url('lyrics/'.$row->token_keys);?>" class="lyrics_anchor"><img src="<?php echo get_template_directory_uri(); ?>/images/lyricsico.png"  ></a>
        <?php if(file_exists(FCPATH."uploads/songs/".$songs_file) and !empty($songs_file)){?>
        <audio id="songs_<?php echo $slug;?>">
        <source type="audio/mpeg" src="<?php echo base_url('uploads/songs/'.$songs_file);?>"></source>
        Your browser does not support the audio tag.
        </audio>
<a id="playbtn_<?php echo $slug;?>" href="javascript:void(0);" onclick="document.getElementById('songs_<?php echo $slug;?>').play();show_pause_stop('<?php echo $slug;?>');" class="lyrics_anchor" ><img src="<?php echo get_template_directory_uri(); ?>/images/musicsico.png"></a>
        <?php }?>  
<a id="pausebtn_<?php echo $slug;?>" href="javascript:void(0);" onclick="document.getElementById('songs_<?php echo $slug;?>').pause();show_play_btn('<?php echo $slug;?>');"  class="lyrics_anchor" style="display:none;"><i class="fa fa-pause fa-2x"></i></a>
<a id="stopbtn_<?php echo $slug;?>" href="javascript:void(0);" onclick="document.getElementById('songs_<?php echo $slug;?>').pause();document.getElementById('songs_<?php echo $slug;?>').currentTime = 0;show_play_btn('<?php echo $slug;?>');" class="lyrics_anchor" style="display:none;" ><i class="fa fa-stop fa-2x"></i></a>
<a href="javascript:void(0);" onclick="addThisSongs('<?php echo $slug;?>');" class="lyrics_anchor"><img src="<?php echo get_template_directory_uri(); ?>/images/cart.png"></a>          
        </div>
    </div>                             
</div>
</li>

<?php }?>
</ul>
</div>
    <?php }
$cms['module:lyrice_album_lyrics'] = ob_get_clean();
?>