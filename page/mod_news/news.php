<?php
//Pages Contents
ob_start();
if(defined("NEWS_PAGE")){
$rowPage            =  $funContentsObj->find_by_static_slug('news');
/* id and meta contents */
$data['page_title']          =  $rowPage->menu_name;
$data['metakeyword']         =  $rowPage->meta_keywords;
$data['metadescription']     =  $rowPage->meta_desc; 
/* id and meta contents end*/
?>
<?php  
$results  =  $funNewsObj->rowsListPage();?>
<div class="news-v3 bg-color-white margin-bottom-30">
<br>
  <?php if($results[0]>0){
	  $result = $funObj->execute($results[1]);
	  while($row = $funObj->result($result)){
		  $news_id   =  $row->id;
		  $row_item  = $funNewsObj->file_items($news_id,'image','asc',1);
	      $image     = @$row_item->item_name;
		  $image_title     = @$row_item->item_title;
		  ?>
                <!-- News v3 -->
                <div class="row margin-bottom-20">
                    <div class="col-sm-5 sm-margin-bottom-20">
<?php if(file_exists(FCPATH."uploads/images/news/".$image) and !empty($image)){ ?>
<img src="<?=base_url("uploads/images/news/".$image)?>" class="img-responsive" title="<?=$image_title?>" alt="<?=$image_title?>"><?php }?>	
                    </div>
                    <div class="col-sm-7 news-v3">
                        <div class="news-v3-in-sm no-padding">
                            <ul class="list-inline posted-info">
                               <li><?php echo date("F d,Y",strtotime($row->created_at));?></li>
                            </ul>
                            <h2><a href="<?php echo base_url('news/'.$row->slug); ?>"><?php echo ucfirst($row->title); ?></a></h2>
                            <p><?php echo $row->short_description;?></p>                            
                        </div>
                    </div>
                </div><!--/end row-->
                <!-- End News v3 -->
                <div class="clearfix margin-bottom-20"><hr></div>
  <?php }//while ?>
  <?php echo $results[2]; ?>
  <?php }else{ echo "No news found!!"; } ?>
  </div>
<?php
}//check defined NEWS_PAGE


if(defined("NEWS_CAT_PAGE")){
$rowPage            =  $funContentsObj->find_by_static_slug('news');
/* id and meta contents */
$data['page_title']          =  $rowPage->menu_name;
$data['metakeyword']         =  $rowPage->meta_keywords;
$data['metadescription']     =  $rowPage->meta_desc; 
/* id and meta contents end*/
?>
<?php  
$results  =  $funNewsObj->rowsListPage($gslug);?>
<div class="news-v3 bg-color-white margin-bottom-30">
<br>
  <?php if($results[0]>0){ 
      $result = $funObj->execute($results[1]);
      while($row = $funObj->result($result)){
          $news_id   =  $row->id;
          $row_item  = $funNewsObj->file_items($news_id,'image','asc',1);
          $image     = @$row_item->item_name;
          $image_title     = @$row_item->item_title;
          ?>
                <!-- News v3 -->
                <div class="row margin-bottom-20">
                    <div class="col-sm-5 sm-margin-bottom-20">
<?php if(file_exists(FCPATH."uploads/images/news/".$image) and !empty($image)){ ?>
<img src="<?=base_url("uploads/images/news/".$image)?>" class="img-responsive" title="<?=$image_title?>" alt="<?=$image_title?>"><?php }?>  
                    </div>
                    <div class="col-sm-7 news-v3">
                        <div class="news-v3-in-sm no-padding">
                            <ul class="list-inline posted-info">
                               <li><?php echo date("F d,Y",strtotime($row->created_at));?></li>
                            </ul>
                            <h2><a href="<?php echo base_url('news/'.$row->slug); ?>"><?php echo ucfirst($row->title); ?></a></h2>
                            <p><?php echo $row->short_description;?></p>                            
                        </div>
                    </div>
                </div><!--/end row-->
                <!-- End News v3 -->
                <div class="clearfix margin-bottom-20"><hr></div>
  <?php }//while ?>
  <?php echo $results[2]; ?>
  <?php }else{ echo "No news found!!"; } ?>
  </div>
<?php
}//check defined NEWS_CAT_PAGE
?>
<?php
//single News by Slug
if(defined("NEWS_DETAIL_PAGE")){
$row            =  $funNewsObj->find_by_slug($gslug);
/* id and meta contents */
$news_id     =  $row->id;
$data['page_title']          =  $row->title;
$data['metakeyword']         =  $row->meta_keywords;
$data['metadescription']     =  $row->meta_desc; 
/* id and meta contents end*/
?>
<div class="news-v3 bg-color-white margin-bottom-30">
<?php ob_start()?>			
<?php   
   if($news_id>0){
	   $resultImage 	=  $funNewsObj->file_items($news_id);
	   $num   = $funObj->num_rows($resultImage);
	  if($num>0){ $sn_cnt=1;?>
	<?php echo '<div id="myCarousel" class="carousel slide carousel-v1">
                    <div class="carousel-inner">';
		  while($row_item =  $funObj->result($resultImage)){
			    $img =  $row_item->item_name;
				$item_desc =  $row_item->item_desc;
				if(file_exists(FCPATH.'uploads/images/news/'.$img) and !empty($img)){ ?>
                        <div class="item <?php echo ($sn_cnt==1)?"active":"";?>">
                            <img src="<?php echo base_url('uploads/images/news/'.$img); ?>"  alt="<?php echo $item_desc; ?>" class="img-responsive full-width" >
                            <div class="carousel-caption">
                                <p><?php echo ucfirst($item_desc); ?></p>
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
    <?php echo $the_contents_image?>
    <div class="news-v3-in">
        <ul class="list-inline posted-info">
            <li>Posted <?php echo date("F d,Y",strtotime($row->created_at));?></li>
        </ul>
        <h2><?php echo $row->title;?></h2>
        <?php echo html_entity_decode($row->description);?>     
    </div>
</div>
<?php	
}//NEWS_DETAIL_PAGE
$cms['module:news'] = ob_get_clean();
?>