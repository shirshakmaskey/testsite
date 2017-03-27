<?php ob_start(); ?>
<h3 class="headline_title hr_bottom"><?php echo $svl_row->title;?><br>
<small>By : <?php echo @$row_artist->artist_name;?></small>

<div class="pull-right">
<?php
$video_url = $svl_row->video_file;
$video_code  =  get_youtube_code($video_url);
$songs_file = $svl_row->songs_file;
if(file_exists(FCPATH."uploads/songs/".$songs_file) and !empty($songs_file)){?>
<audio id="songs_<?php echo $gslug;?>">
<source type="audio/mpeg" src="<?php echo base_url('uploads/songs/'.$songs_file);?>"></source>
Your browser does not support the audio tag.
</audio>

<a href="http://www.youtube.com/embed/<?php echo $video_code;?>?autoplay=1" class="lyrics_anchor various fancybox.iframe"><img src="<?php echo get_template_directory_uri(); ?>/images/videoplay.png"></a>
<?php }?>
<a id="playbtn_<?php echo $gslug;?>" href="javascript:void(0);" onclick="document.getElementById('songs_<?php echo $gslug;?>').play();show_pause_stop('<?php echo $gslug;?>');" class="lyrics_anchor" ><img src="<?php echo get_template_directory_uri(); ?>/images/musicsico.png"></a>
<a id="pausebtn_<?php echo $gslug;?>" href="javascript:void(0);" onclick="document.getElementById('songs_<?php echo $gslug;?>').pause();show_play_btn('<?php echo $gslug;?>');"  style="display:none;"><i class="fa fa-pause"></i></a>
<a id="stopbtn_<?php echo $gslug;?>" href="javascript:void(0);" onclick="document.getElementById('songs_<?php echo $gslug;?>').pause();document.getElementById('songs_<?php echo $gslug;?>').currentTime = 0;show_play_btn('<?php echo $gslug;?>');" style="display:none;" ><i class="fa fa-stop"></i></a>
</div>
</h3>

<div class="row">
<div class="col-md-6">
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<a href="javascript:void(0);" class='print_this_table'><i class="fa fa-print fa-2x"></i></a>
</div>
<div class="col-md-6">
   <div class="pull-right">
   <div class="addthis_sharing_toolbox"></div>
   </div>
</div>
</div>

<div class="row">
<div class="col-md-12">
    <div class="lyrics_body" id="print_wrapper">
    <div class="hide"><?php echo $svl_row->title;?></div>
    <?php echo html_entity_decode($svl_row->lyrics_file);?></div>
 </div>
</div>
<script type="text/javascript">
     jQuery(function(){ 
       $(document).on("click",".print_this_table",function(){  
           PopupPrint('print_wrapper');
       });
     });
function PopupPrint(content) 
{  
	var divToPrint = document.getElementById(content);
	var popupWin = window.open('', 'Print Lyrics','width=1740,height=1380');
	popupWin.document.open(); 
	popupWin.document.write('<html><head><title></title><body onload="window.print()">' + divToPrint.innerHTML + '</body></head></html>');
	popupWin.document.close();
	return true;  
}     
</script>
<?php $cms['module:lyrics'] = ob_get_clean();?>