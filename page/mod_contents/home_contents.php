<?php
ob_start();
?>
<div class="col-md-8">
<?php
$result =  $funContentsObj->get_home_feature_contents(3);
$num    =  $funObj->num_rows($result);  
if($num>0){  $i=1;?>
<div class="headline">
<h2>Topics</h2>
</div>
<?php
	while($row = $funObj->result($result)){	
		$content_id   = $row->id;
		$row_item  = $funContentsObj->file_items($content_id,'image','asc',1);
		$img = "";
		if(!empty($row_item)){	$img     = $row_item->item_name;	 }
		if(file_exists(FCPATH.'uploads/images/contents/'.$img) and !empty($img)){
		    $img  =  base_url('uploads/images/contents/'.$img);	
	     }
	     if(file_exists(FCPATH.'uploads/images/article/'.$img) and !empty($img)){
		    $img  =  base_url('uploads/images/article/'.$img);	
	     }
		?>
		<?php if($i==1){?><div class="magazine-news"> <div class="row"><?php } ?>
	<div class="col-md-4 col-sm-6">
	    <div class="thumbnails thumbnail-style thumbnail-kenburn">
		<div class="thumbnail-img">
		   <div class="overflow-hidden">
			<a href="<?php echo base_url('pages/'.$row->slug)?>"><img class="img-responsive" src='<?php echo $img?>' alt=""></a></div>
			<a class="btn-more hover-effect" href="<?php echo base_url('pages/'.$row->slug)?>">read more +</a>
		</div>
		<div class="caption">
		<h3><a href="<?php echo base_url('pages/'.$row->slug)?>"><?=mb_substr($row->article_title,0,470);?></a></h3>
		<p><?=mb_substr( $row->short_description,0,200);?><!-- ...<a href="<?php echo base_url('pages/'.$row->slug)?>">More..</a> --></p>
		 </div>
		</div> 
	</div> 
	<?php if($i/3==1){ echo '</div></div>';$i=1;}else{$i++;} ?>         
<?php }?>
	<?php if($i!=1){ echo '</div></div>';} ?>
	<?php
}
?>
</div>
<div class="col-md-4">
	
	<div class="headline"><h2>Events</h2></div>

	<div id="myCarousel_events" class="carousel slide carousel-v1">
					<div class="carousel-inner">
					<?php
$result  =  $funEventsObj->latestList(3);
if($result['num_rows']>0){ ?>
  <?php $sn=1;
   while($row =  $funObj->result($result['result'])){
       $item_id   =  $row->id;
      $row_item  = $funEventsObj->file_items($item_id,'image','asc',1);
        $image     = @$row_item->item_name;
      $image_title     = @$row_item->item_title;
  ?>
<div class="item <?php echo ($sn=='1')?'active':'';?>">
	<?php if(file_exists(FCPATH."uploads/images/events/".$image) and !empty($image)){ ?>
	<a href="<?php echo base_url('events/'.$row->slug); ?>"><img src="<?=base_url("uploads/images/events/".$image)?>" class="img-responsive" title="<?=$image_title?>" alt="<?=$image_title?>"></a>
<?php }?>
	<div class="carousel-caption">
		<p><?php echo $row->title. " (" . date("F d,Y",strtotime($row->from_date)). ")"; ?></p>
	</div>
</div>
<?php   
   $sn++;}
}
?>  						

</div>

<div class="carousel-arrow">
	<a class="left carousel-control" href="#myCarousel_events" data-slide="prev">
		<i class="fa fa-angle-left"></i>
	</a>
	<a class="right carousel-control" href="#myCarousel_events" data-slide="next">
		<i class="fa fa-angle-right"></i>
	</a>
</div>
</div>

</div>
<?php
$cms['module:home_contents'] = ob_get_clean();
ob_start();
$row =  $funContentsObj->find_by_id(7);
if($row):
/*$resultImage 	=  $funContentsObj->file_items(7);
$num   = $funObj->num_rows($resultImage);
$img  =  base_url('uploads/2014/12/bg-stone.jpg');
if($num>0){
	$row_item =  $funObj->result($resultImage);
	$img =  $row_item->item_name;
	$item_desc =  $row_item->item_desc;
	if(file_exists(FCPATH.'uploads/images/contents/'.$img) and !empty($img)){
		$img  =  base_url('uploads/images/contents/'.$img);	
	}
}*/
?>
 <section id="about" class="about-section section-first">
        <div class="container">           
            <!-- Service Box -->
            <div class="row text-center">
            <?=html_entity_decode($row->description);?>
            </div>
            <!-- End Service Box -->
        </div>
</section>
<?php
endif;
$cms['module:home_page_box_section'] = ob_get_clean();