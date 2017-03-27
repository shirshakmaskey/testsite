<?php 
ob_start();
$row            =  $funContentsObj->find_by_slug('our-patners');
if($row):
$content_id     =  $row->id;
	  $has_image=0; 
      $resultImage 	=  $funContentsObj->file_items($content_id);
	   $num   = $funObj->num_rows($resultImage);
	   ?>
	   <div class="clients-section parallaxBg">
            <div class="container">
                <div class="title-v1">
                    <h2>Our Clients</h2>
                </div>
                <ul class="owl-clients-v2">  
<?php
	  if($num>0){ $sn_cnt=1; $has_image=1;
		  while($row_item =  $funObj->result($resultImage)){
			    $img =  $row_item->item_name;
				$item_desc =  $row_item->item_desc;
				if(file_exists(FCPATH.'uploads/images/contents/'.$img) and !empty($img)){ ?>
				<li class="item"><a href="#">
                            <img src="<?php echo base_url('uploads/images/contents/'.$img); ?>"  alt="<?php echo $item_desc; ?>"></a></li>
		     <?php }//file exist
		      $sn_cnt++;
	  }//while
	} ?>	  
      </ul>
  </div>
</div>	  
<?php
endif;
$cms['module:our_patners'] = ob_get_clean(); 