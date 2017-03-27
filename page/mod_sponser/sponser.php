<?php
//Pages Contents
ob_start();
if(defined("SPONSER_DETAIL_PAGE")){
$row            =  $funSponserObj->find_by_slug($gslug);
/* id and meta contents */
$block_id     =  $row->id;
$data['page_title']          =  $row->block_title;
$data['metakeyword']         =  $row->block_title;
$data['metadescription']     =  $row->block_title; 

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
/* id and meta contents end*/
?>
<div class="row">
           <div class="col-md-12">
<h1><?php echo $block_title  = $row->block_title; ?></h1>
	<?php   
	$img =  $row->image;
	if(file_exists(FCPATH.'uploads/images/sponser/'.$img) and !empty($img)){ ?>
	<a href="#"><img src="<?php echo base_url('uploads/images/sponser/'.$img); ?>" alt="<?php echo $block_title; ?>" title="<?php echo $block_title; ?>" class="img-polaroid" width="100%"></a>
	<?php
	}//file exist	 
	// Images listing ends
	?>
  <div><?php echo html_entity_decode($row->description); ?></div> 
 </div>  
</div> 
<?php	
}//DETAIL PAGE
$cms['module:sponser'] = ob_get_clean();