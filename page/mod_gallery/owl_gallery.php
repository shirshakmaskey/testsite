<?php
ob_start();
?>
<div class="one-page-inner one-default">
		<div class="container content">
			<div class="row"> 
				<!-- Owl Clients v1 -->
				<div class="headline">
					<h2>Gallery</h2>
				</div>
				
				<div class="owl-clients-v1">
           <?php $results  =  $funGalleryObj->rowsListPage();
						     if($results[0]>0){
               	             $result = $funObj->execute($results[1]);
							  while($row = $funObj->result($result)){								 
		  $item_id   =  $row->id;
		  $gallery_name  =  $row->gallery_name;					  
		  $results_item  = $funGalleryObj->file_items($item_id,'asc',100);
		  if($results_item[0]>0){ 
	         $result_item = $funObj->execute($results_item[1]);
			 $sn=1;
        	 while($row_item = $funObj->result($result_item)){
	               $image         = @$row_item->photoname;
				   $item_desc     = @$row_item->photodescription;
			if(file_exists(FCPATH."uploads/images/gallery/album_".$item_id."_image/".$image) and !empty($image)){
						 ?>
						 <div class="item <?php echo $sn==1?"first-child":""?>">
                <a href="<?=base_url("uploads/images/gallery/album_".$item_id."_image/".$image)?>" class="fbox-modal fancybox.iframe" rel="my_gallery" title="<?php echo $item_desc?>"> <img width="800" alt="<?php echo $item_desc?>"  src="<?=base_url("uploads/images/gallery/album_".$item_id."_image/".$image)?>" class="img-responsive"> </a>
            </div>			
						<?php 
			              $sn++;  }//if
			               }//while
		                  }//if  results_item[0]
					 }}//while and if of gallery?>	
			</div>
		</div>
	</div>
<?php
$cms['module:owl_gallery'] = ob_get_clean();