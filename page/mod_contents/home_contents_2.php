<?php
ob_start();
$result =  $funContentsObj->get_home_feature_contents(6);
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
	<div class="col-md-4">
		<div class="magazine-news-img">
			<a href="<?php echo base_url('pages/'.$row->slug)?>"><img class="img-responsive" src='<?php echo $img?>' alt=""></a>
		</div>
		<h3><a href="<?php echo base_url('pages/'.$row->slug)?>"><?=mb_substr($row->article_title,0,470);?></a></h3>
		<p><?=mb_substr( $row->short_description,0,200);?>...<a href="<?php echo base_url('pages/'.$row->slug)?>">More..</a></p>
	</div> 
	<?php if($i/3==1){ echo '</div></div><div class="margin-bottom-35"><hr class="hr-md"></div>';$i=1;}else{$i++;} ?>         
<?php }?>
	<?php if($i!=1){ echo '</div></div><div class="margin-bottom-35"><hr class="hr-md"></div>';} ?>
	<?php
}
$cms['module:home_contents_2'] = ob_get_clean();
ob_start();
$row =  $funContentsObj->find_by_id(9);
$resultImage 	=  $funContentsObj->file_items(9);
$num   = $funObj->num_rows($resultImage);
$img  =  base_url('uploads/2014/12/bg-stone.jpg');
if($num>0){
	$row_item =  $funObj->result($resultImage);
	$img =  $row_item->item_name;
	$item_desc =  $row_item->item_desc;
	if(file_exists(FCPATH.'uploads/images/contents/'.$img) and !empty($img)){
		$img  =  base_url('uploads/images/contents/'.$img);	
	}
}
?>
<section id="reservation" class="section bg-image bg-dark" style="background-image: url('<?php echo $img?>');">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col col-lg-7 text-left">
				<header class="section-header">
					<h2 class="section-title title-lg"><?php echo $row->article_title?></h2>
				</header>
				<?php //echo html_entity_decode($row->description);?> 
				<?=html_entity_decode(( (current_lang()=='danish') ? $row->description_de:$row->description));?>
				<!--<footer class="section-footer"><a class="btn btn-link" href="events/breakfast/index.html" role="button">Find out...</a></footer>--> 
			</div>
			<div class="col col-lg-5 hidden-xs">
				<div id="reservation-panel" class="panel panel-default">
					<div class="panel-top"><span></span></div>
					<div class="panel-heading">
						<h3 class="panel-title">{RESERVATION}</h3>
					</div>
					<div class="panel-body">
						<div class="wpcf7" id="wpcf7-f1958-o1" lang="en-US" dir="ltr">
							<div class="screen-reader-response"></div>							
							<form name="book_a_table" action="<?php echo base_url('book_a_table');?>" method="post" class="book_a_table" novalidate>
								<div style="display: none;">
									<input type="hidden" name="book_a_table" value="1" />
								</div>
								<p><span class="wpcf7-form-control-wrap res_date">
									<input type="date" name="res_date" id="res_date" value="<?php echo date("Y-m-d")?>" class="wpcf7-form-control wpcf7-date wpcf7-validates-as-required wpcf7-validates-as-date form-control" min="<?php echo date("Y-m-d")?>" aria-required="true" aria-invalid="false" />
								</span></p>
								<p><span class="wpcf7-form-control-wrap res_time">
									<select name="res_time" class="wpcf7-form-control wpcf7-select wpcf7-validates-as-required form-control" aria-required="true" aria-invalid="false">
										
										<option value="16:00">4:00 PM</option>
										<option value="16:30">4:30 PM</option>
										<option value="17:00">5:00 PM</option>
										<option value="17:30">5:30 PM</option>
										<option value="18:00">6:00 PM</option>
										<option value="18:30">6:30 PM</option>
										<option value="19:00">7:00 PM</option>
										<option value="19:30">7:30 PM</option>
										<option value="20:00">8:00 PM</option>
										<option value="20:30">8:30 PM</option>
										<option value="21:00">9:00 PM</option>
										<option value="21:30">9:30 PM</option>
										<option value="22:00">10:00 PM</option>
										
									</select>
								</span></p>
								<p><span class="wpcf7-form-control-wrap res_persons">
									<select name="res_persons" class="wpcf7-form-control wpcf7-select wpcf7-validates-as-required form-control" aria-required="true" aria-invalid="false">
										<option value="1">1 person</option>
										<option value="2">2 people</option>
										<option value="3">3 people</option>
										<option value="4">4 people</option>
										<option value="5">5 people</option>
										<option value="6">6 people</option>
										<option value="7">7 people</option>
										<option value="8">8 people</option>
										<option value="9">9 people</option>
										<option value="10">10 people</option>
										<option value="11">11 people</option>
										<option value="12">12 people</option>
										<option value="13">13 people</option>
										<option value="14">14 people</option>
										<option value="15">15 people</option>
										<option value="16">16 people</option>
										<option value="17">17 people</option>
										<option value="18">18 people</option>
										<option value="19">19 people</option>
										<option value="20">20 people</option>
										<option value="21">Larger party</option>
									</select>
								</span> </p>
								<p>
									<input type="submit" name="book_a_table" value="{FIND_A_TABLE}" class="wpcf7-form-control wpcf7-submit btn btn-default" />
								</p>
								<div class="wpcf7-response-output wpcf7-display-none"></div>
							</form>
							
							<script>
								$(function(){							
									$('#res_date').datepicker();
								});
							</script>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
$cms['module:visit_and_enjoy'] = ob_get_clean();