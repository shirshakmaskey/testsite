<?php 
ob_start();
	$result = $funVideosObj->homeVideos(1);
	$num = $db->num_rows($result);
	if($num>0){
		while($row = $db->result($result)){
			$video_url = $row->url;
            $video_code  =  get_youtube_code($video_url);
?>
<iframe title="YouTube video player" class="youtube-player" type="text/html" width="100%" height="300" src="http://www.youtube.com/embed/<?php echo $video_code;?>" style="border:10px solid #f6f6f6" frameborder="0" allowFullScreen></iframe>
<?php	
		}
	}
$cms['module:video_home'] = ob_get_clean();    
ob_start();
	$result = $funVideosObj->featuredVideos(1);
	$num = $db->num_rows($result);
	if($num>0){
		while($row = $db->result($result)){
			$video_url = $row->url;
            $video_code  =  get_youtube_code($video_url);
?>
<iframe title="YouTube video player" class="youtube-player" type="text/html" width="100%" height="300" src="http://www.youtube.com/embed/<?php echo $video_code;?>" style="border:10px solid #f6f6f6" frameborder="0" allowFullScreen></iframe>
<?php	
		}
	}
$cms['module:video_featured'] = ob_get_clean();
ob_start();
$video_url = $svl_row->video_file;
$video_code  =  get_youtube_code($video_url);
if(!empty($video_code)){
?>
<iframe title="YouTube video player" class="youtube-player" type="text/html" width="406" height="246" src="http://www.youtube.com/embed/<?php echo $video_code;?>" style="border:10px solid #f6f6f6" frameborder="0" allowFullScreen></iframe>
<?php
}
$cms['module:video_featured_songs'] = ob_get_clean();
ob_start();
$result = $funVideosObj->homeVideos(1);
$num =  $db->num_rows($result);
if($num>0){
?>
<?php
 $sn=1;
 while($row_videos  =  $db->result($result)){ 
    if($sn==1){
            $video_url   =  $row_videos->url;
            $video_code  =  get_youtube_code($video_url);
        ?>
 <div id="feature_video" class="videosize margin-bottom-10">                
 <!-- <iframe id="feature_video_iframe" type="text/html" width="100%" height="250" src="http://www.youtube.com/embed/<?php echo $video_code;?>" frameborder="0" allowFullScreen></iframe> -->
 <iframe id="feature_video_iframe" title="YouTube video player" class="youtube-player" type="text/html" width="100%" height="300" src="http://www.youtube.com/embed/<?php echo $video_code;?>" style="border:10px solid #f6f6f6" frameborder="0" allowFullScreen></iframe>               
 </div>
    <?php }//sn==1 
 $sn++; }//while?>
 <!--divclose-->
 <div class="owl-clients-v2">
 <?php
 $sn=1;
 $result_videos  =  $funVideosObj->featuredVideos();
 while($row_videos  =  $db->result($result_videos)){ 
            $video_url   =  $row_videos->url;
            $video_code  =  get_youtube_code($video_url);
            $video_image =  get_youtube_thumbnail($video_url); 
        ?>
   <div class="item"><a href="javascript:void(0);" onclick="document.getElementById('feature_video_iframe').src='http://www.youtube.com/embed/<?php echo $video_code;?>';" data-code="<?php echo $video_code;?>"><img class="img-responsive" src="<?php echo $video_image;?>"></a></div>
   <?php
 $sn++; }//while?>
</div>
<?php }//num ?>
<?php $cms['module:video_home_five'] = ob_get_clean();  
ob_start();
$result = $funVideosObj->homeVideos(1);
$num =  $db->num_rows($result);
if($num>0){
?>
<?php
 $sn=1;
 while($row_videos  =  $db->result($result)){ 
    if($sn==1){
            $video_url   =  $row_videos->url;
            $video_code  =  get_youtube_code($video_url);
        ?>
 <div id="feature_video" class="videosize margin-bottom-10">                
 <!-- <iframe id="feature_video_iframe" type="text/html" width="100%" height="250" src="http://www.youtube.com/embed/<?php echo $video_code;?>" frameborder="0" allowFullScreen></iframe> -->
 <iframe id="feature_video_iframe" title="YouTube video player" class="youtube-player" type="text/html" width="110%" style="margin-left: -40px;border:5px solid #f6f6f6;" height="335" src="http://www.youtube.com/embed/<?php echo $video_code;?>" frameborder="0" allowFullScreen></iframe>               
 </div>
    <?php }//sn==1 
 $sn++; }//while?>
 <!--divclose-->
 <div class="owl-clients-v2">
 <?php
 $sn=1;
 $result_videos  =  $funVideosObj->featuredVideos();
 while($row_videos  =  $db->result($result_videos)){ 
            $video_url   =  $row_videos->url;
            $video_code  =  get_youtube_code($video_url);
            $video_image =  get_youtube_thumbnail($video_url); 
        ?>
   <!--div class="item"><a href="javascript:void(0);" onclick="document.getElementById('feature_video_iframe').src='http://www.youtube.com/embed/<?php echo $video_code;?>';" data-code="<?php echo $video_code;?>"><img class="img-responsive" src="<?php echo $video_image;?>"></a></div-->
   <?php
 $sn++; }//while?>
</div>
<?php }//num ?>
<?php $cms['module:video_home_five_a'] = ob_get_clean();