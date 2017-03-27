<?php
ob_start();
$result   =  $funSponserObj->custom_list('left');
$num  =  $funObj->num_rows($result);
if($num>0){
?>
<div id="myCarousel-sponser" class="carousel slide carousel-v1">
    <div class="carousel-inner">							
<?php   $sn=1;	
        while($row  =  $funObj->result($result)){
		$title  =  $row->block_title;
		$img  =  $row->image;
		$short_description  =  $row->short_description;
		$url_link  =  $row->url_link;
		$custom_link  =  $url_link;
		$slug  =  $row->slug;
		if(empty($url_link)){
			$custom_link  = base_url('sponser/'.$slug);
		}else{
			$custom_link  = "#";
		}			
   if(file_exists(FCPATH.'uploads/images/sponser/'.$img) and !empty($img)){ ?>
	<div class="item <?php echo $sn==1?'active':'';?>">
		<a href="<?php echo $custom_link; ?>" target="<?php echo ($url_link=='internal')?"_self":"_blank"; ?>"><img class="img-responsive"  src="<?php echo base_url('uploads/images/sponser/'.$img); ?>" width="100%" /></a>

		<?php if(!empty($title)){ ?>
		<div class="carousel-caption">
			<p><?php echo $title;?></p>
		</div>
		<?php } ?>
	</div>
<?php $sn++; }  
}//while?>
</div>

	<div class="carousel-arrow">
		<a class="left carousel-control" href="#myCarousel-sponser" data-slide="prev">
			<i class="fa fa-angle-left"></i>
		</a>
		<a class="right carousel-control" href="#myCarousel-sponser" data-slide="next">
			<i class="fa fa-angle-right"></i>
		</a>
	</div>
</div>

<?php }
$cms['module:custom_left'] = ob_get_clean();