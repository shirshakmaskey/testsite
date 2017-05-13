<?php
ob_start();?>
<?php
$row  =  $funContentsObj->find_by_id(8);
if($row):
$content_page_layout  =  $row->layout;
/* id and meta contents */
$content_id     =  $row->id;
$image_folder  =  'contents'; $page_url = "pages";
?>
<div class="title-v1">
                <h2><?php echo  $post_title =  $row->article_title;?></h2>
                <p><?=html_entity_decode($row->short_description);?>	</p>
</div>
<?php ob_start();
	  $has_image=0; 
   if($content_id>0){
	   $resultImage 	=  $funContentsObj->file_items($content_id);
	   $num   = $funObj->num_rows($resultImage);
	  if($num>0){ $sn_cnt=1; $has_image=1;?>
	<?php echo '<div id="myCarousel" class="carousel slide carousel-v1">
                    <div class="carousel-inner">';
		  while($row_item =  $funObj->result($resultImage)){
			    $img =  $row_item->item_name;
				$item_desc =  $row_item->item_desc;
				if(file_exists(FCPATH.'uploads/images/'.$image_folder.'/'.$img) and !empty($img)){ 
          ?>
                        <div class="item <?php echo ($sn_cnt==1)?"active":"";?>">
                            <img src="<?php echo base_url('uploads/images/'.$image_folder.'/'.$img); ?>"  alt="<?php echo $item_desc; ?>" class="img-responsive full-width" >
                            <div class="carousel-caption">
                                <p><?php echo $item_desc; ?></p>
                            </div>
                        </div>
                    
	<?php
		      }//file exist
		      $sn_cnt++;
	  }//while
	  echo '</div>';
                if($num>1){    
                    echo '<div class="carousel-arrow">
                        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>';}
    			echo '</div>';
    }//if num
	else{}	
 }//if id >0
  // Images listing ends
  ?>
<?php $the_contents_image =  ob_get_clean(); ?>
<?php ob_start()?>
<?php
$result   =  $funContentsObj->find_contents_by_parent($content_id);
                $child_num  = $db->num_rows($result);
                if($child_num>0){ $child_sn=1;
                    while($row_child =  $db->result($result)){
?>                        
<div class="clearfix margin-bottom-30">
    <i class="<?php echo $row_child->short_description?>"></i>
    <div class="content-boxes-in-v3">
        <h2 class="heading-sm">
            <?php echo $row_child->article_title;?></h2>
        <?php echo html_entity_decode($row_child->description);?><a href="<?php echo base_url('pages/'.$row->slug); ?>">Read more...</a>
    </div>
</div>
<?php }}?>

<?php $the_contents_text =  ob_get_clean(); ?>
            <div class="row">

<?php if($content_page_layout=='two_col_left_image' and $has_image==1){ ?>
			<div class="col-md-6"><?php echo $the_contents_image?></div>
			<div class="col-md-6 content-boxes-v3 margin-bottom-40"><?php echo $the_contents_text?></div>
            <?php }else if($content_page_layout=='two_col_right_image' and $has_image==1){ ?>
            <div class="col-md-6 content-boxes-v3 margin-bottom-40"><?php echo $the_contents_text?></div>
			<div class="col-md-6"><?php echo $the_contents_image?></div>			
            <?php 
			}else if($content_page_layout=='full_page' and $has_image==1){ ?>            
			<div class="col-md-12"><?php echo $the_contents_image?></div>
            <div class="col-md-12 content-boxes-v3 margin-bottom-40"><?php echo $the_contents_text?></div>			
            <?php }else{ ?>
            	<div class="col-md-12 content-boxes-v3 margin-bottom-40"><?php echo $the_contents_text?></div>
            <?php }	?>

        </div>
<?php
endif;
$cms['module:vison_and_mission'] = ob_get_clean();