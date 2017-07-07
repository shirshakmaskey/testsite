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
<style type="text/css">
 /* Dropdown Button */
.dropbtn {
    background-color: transparent;
    color: lightgrey;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
    position: relative;
    display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 50px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #f1f1f1}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
    display: block;
}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {
    background-color: #3e8e41;
} 
</style>
<div class="row">
<div class="pull-right" style="margin-right: 20px;">
 <div class="dropdown">
  <button class="dropbtn"><i class="fa fa-angle-double-down" style="color: black;"></i></button>
  <div class="dropdown-content">
    <li><a href="javascript:void(0);" class='print_this_table'><i class="fa fa-print fa-3x" style="color: lightgrey;"></i></a></li>
    <li><a href="javascript:void(0);" class='print_this_table'><i class="fa fa-facebook fa-3x" style="color: lightgrey;"></i></a></li>
    <li><a href="javascript:void(0);" class='print_this_table'><i class="fa fa-tumblr fa-3x" style="color: lightgrey;"></i></a></li>
  </div>
</div> 
</div>
<!--div class="col-md-6">
   <div class="pull-right">
   <div class="addthis_sharing_toolbox"></div>
   </div>
</div-->
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