<?php
ob_start();
?>
<section class="news-section" id="news">

        <div class="container content-lg">
            <div class="title-v1">
                <h2>{LATEST_NEWS}</h2>
                <p>We do <strong>things</strong> differently company providing key digital services. <br> 
                Focused on helping our clients to build a <strong>successful</strong> business on web and mobile.</p>             
            </div>

            <div class="row news-v1">
            <?php
$result  =  $funNewsObj->latestNewsList(3);
if($result['num_rows']>0){ ?>
  <?php
   while($row =  $funObj->result($result['result'])){
        $item_id   =  $row->id;
      $row_item  = $funNewsObj->file_items($item_id,'image','asc',1);
        $image     = @$row_item->item_name;
      $image_title     = @$row_item->item_title;
  ?>
                <div class="col-md-4 md-margin-bottom-40">
                <div class="news-v1-in">
                       <?php if(file_exists(FCPATH."uploads/images/news/".$image) and !empty($image)){ ?> <a href="<?php echo base_url('news/'.$row->slug); ?>"> <img src="<?=base_url("uploads/images/news/".$image)?>" class="img-responsive" title="<?=$image_title?>" alt="<?=$image_title?>"></a>
    <?php }?>
                        <h3><a href="<?php echo base_url('news/'.$row->slug); ?>"><?php echo $row->title;?></a></h3>
                        <p><?php echo substr($row->short_description,0,60);?></p>
                        <ul class="list-inline news-v1-info">
                           
                            <li><i class="fa fa-clock-o"></i> <?php echo date('F d,Y',strtotime($row->created_at));?></li>
                          
                        </ul>
                    </div>
                </div>
<?php   
   }
}
?>   

            </div>
        </div>      
         
    </section>          

<?php
$cms['module:news_list'] = ob_get_clean();
ob_start();
?>
<div class="headline-v2"><h2>{LATEST_NEWS}</h2></div>
 <!-- Latest Links -->
                    <ul class="list-unstyled blog-latest-posts margin-bottom-50">
<?php
$result  =  $funNewsObj->latestNewsList(3);
if($result['num_rows']>0){ ?>
  <?php
   while($row =  $funObj->result($result['result'])){
        $item_id   =  $row->id;
      $row_item  = $funNewsObj->file_items($item_id,'image','asc',1);
      $image     = @$row_item->item_name;
      $image_title     = @$row_item->item_title;
  ?>                
  <li>
                            <h3><a href="<?php echo base_url('news/'.$row->slug); ?>"><?php echo $row->title;?></a></h3>
                            <small><i class="fa fa-clock-o"></i> <?php echo date('F d,Y',strtotime($row->created_at));?></small>                           
                        </li>               
<?php   
   }
}
?>            
</ul>
<!-- End Latest Links -->
<?php
$cms['module:latest_news'] = ob_get_clean();
ob_start();
?>
<div class="rightsidesection margin-bottom-10"> 
  <!-- album Works -->
  <div class="owl-carousel-v1 owl-work-v1 margin-bottom-40">
      <div class=""><h3 class="headline_title pull-left">NEWS AND EVENTS</h3>            
          <div class="owl-navigation">
              <div class="customNavigation">
                  <a class="owl-btn prev-v1"><i class="fa fa-angle-left"></i></a>
                  <a class="owl-btn next-v1"><i class="fa fa-angle-right"></i></a>
              </div>
          </div><!--/navigation-->
      </div>

      <div class="owl-recent-works-v1">
<?php
$result  =  $funNewsObj->latestNewsList(10);
if($result['num_rows']>0){ ?>
  <?php
   while($row =  $funObj->result($result['result'])){
        $item_id   =  $row->id;
      $row_item  = $funNewsObj->file_items($item_id,'image','asc',1);
        $image     = @$row_item->item_name;
      $image_title     = @$row_item->item_title;
  ?>
  <?php if(file_exists(FCPATH."uploads/images/news/".$image) and !empty($image)){ ?>    
          <div class="item">
              <a href="<?php echo base_url('news/'.$row->slug); ?>"> 
                  <em class="overflow-hidden">
                      <img src="<?=base_url("uploads/images/news/".$image)?>" class="img-responsive" title="<?=$image_title?>" alt="<?=$image_title?>">
                  </em>
                  <span>
                      <strong><a href="<?php echo base_url('news/'.$row->slug); ?>"><?php echo $row->title;?></a></strong>
                  </span>
              </a>
          </div>
    <?php }?>
<?php   
   }
}
?>     
      </div>
      <!-- End owl Works -->
    </div>
  <!-- End album Works -->
 </div><!-- End rightsidesection -->
<?php
$cms['module:scroll_news'] = ob_get_clean();