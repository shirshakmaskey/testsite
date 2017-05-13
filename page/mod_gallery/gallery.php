<?php
//Pages Contents
ob_start();
if(defined("GALLERY_PAGE")){
$rowPage            =  $funContentsObj->find_by_static_slug('gallery');
/* id and meta contents */
$data['page_title']          =  $rowPage->menu_name;
$data['metakeyword']         =  $rowPage->meta_keywords;
$data['metadescription']     =  $rowPage->meta_desc; 
/* id and meta contents end*/
?>
<div class="text-center margin-bottom-50">
	<h2 class="title-v2 title-center">Our <?php echo $rowPage->menu_name; ?></h2>
</div>
<?php  
$results  =  $funGalleryObj->rowsListPage();?>
<div class="row">
	<?php if($results[0]>0){
	  $result = $funObj->execute($results[1]);
	  $divTr =1;
	  while($row = $funObj->result($result)){
	  	  if($results[0]==1){
	  	  	  redirect(base_url('gallery/'.$row->slug));
	  	  }
		  $item_id   =  $row->id;
		  $row_item  = $funGalleryObj->file_items($item_id,'desc',1);
	     $image     = @$row_item->photoname; 
	     //echo FCPATH."uploads/images/gallery/album_".$item_id."_image/".$image; die();
		  $galleryname     = @$row_item->galleryname;
		  ?>
			<div class="col-sm-4 sm-margin-bottom-30">
				<?php if(file_exists(FCPATH."uploads/images/gallery/album_".$item_id."_image/".$image) and !empty($image)){ ?>
				<a href="<?php echo base_url('gallery/'.$row->slug); ?>"><img class="img-responsive" src="<?=base_url("uploads/images/gallery/album_".$item_id."_image/".$image)?>" title="<?=$gallery_name?>" alt="<?=$gallery_name?>"></a>
				<p>
				<a href="<?php echo base_url('gallery/'.$row->slug); ?>">
				<?php echo ucfirst($row->gallery_name); ?>
				</a>
				</p>
				<?php }else{?>
				<a href="<?php echo base_url('gallery/'.$row->slug); ?>"><img src="<?=base_url("uploads/images/gallery/noimage.png")?>" width="150" title="<?=$gallery_name?>" alt="<?=$gallery_name?>"></a>
				<p>
				<a href="<?php echo base_url('gallery/'.$row->slug); ?>">
				<?php echo ucfirst($row->gallery_name); ?>
				</a>
				</p>
				<?php }?>
				
			</div>
	<?php 		  
	if($divTr%3==0) echo "<div style='clear:both;'></div>";
	$divTr++;
	}//while ?>
	<p class="clear"></p>
	<div id="paginate"><?php echo $results[2]; ?></div>
	<?php }else{ echo "No gallery found!!"; } ?>
</div>
<?php
}//check defined PAGES_PAGE
if(defined("GALLERY_DETAIL_PAGE")){
$row            =  $funGalleryObj->find_by_slug($gslug);

/* id and meta contents */
$item_id     =  $row->id;
$data['page_title']          =  $row->gallery_name;
$data['metakeyword']         =  $row->gallery_name;
$data['metadescription']     =  $row->gallery_name; 
/* id and meta contents end*/
?>

<div class="text-center margin-bottom-50">
	<h2 class="title-v2 title-center"><?php echo $row->gallery_name; ?> 's Gallery</h2>
</div>
<?php  
$results  =  $funGalleryObj->file_items($item_id,'desc',100);
?>
<div class="row">
	<?php if($results[0]>0){ 
	  $result = $funObj->execute($results[1]);
	  $divTr =1;
	  while($row = $funObj->result($result)){
	      $image         = @$row->photoname;
		  $item_desc     = @$row->photodescription;
		  if(!empty($image)){
		  ?>
			<div class="col-sm-4 sm-margin-bottom-30">
<?php if(file_exists(FCPATH."uploads/images/gallery/album_".$item_id."_image/".$image) and !empty($image)){ ?>
				<a class="fancybox img-hover-v1" rel="gallery" href="<?=base_url("uploads/images/gallery/album_".$item_id."_image/".$image)?>"><span><img class="img-responsive" src="<?=base_url("uploads/images/gallery/album_".$item_id."_image/".$image)?>"  title="<?=$item_desc?>" alt="<?=$item_desc?>"></span></a>
				<p>
				<a class="fancybox" rel="gallery_name" href="<?=base_url("uploads/images/gallery/album_".$item_id."_image/".$image)?>"><?php echo ucfirst($item_desc); ?></a>
				</p>
				<?php }
				/*else{?>
				<a class="fancybox" rel="gallery" href="<?=base_url("uploads/images/gallery/album_".$item_id."_image/".$image)?>"><img src="<?=base_url("uploads/images/gallery/noimage.png")?>" width="150" title="<?=$item_desc?>" alt="<?=$item_desc?>"></a>
				<p>
				<a class="fancybox" rel="gallery" href="<?=base_url("uploads/images/gallery/album_".$item_id."_image/".$image)?>"><?php echo ucfirst($item_desc); ?></a>
				</p>
				<?php }*/ 
				?>
				
			</div>
	<?php 		  
	if($divTr%3==0) echo "<div style='clear:both;'></div>";
	$divTr++;
	    }
	}//while ?>
	<p class="clear"></p>
	<div id="paginate"><?php echo $results[2]; ?></div>
	<?php }else{ echo "No images found!!"; } ?>
</div>
<?php	
}//DESTINATION_DETAIL_PAGE
$cms['module:gallery'] = ob_get_clean(); 