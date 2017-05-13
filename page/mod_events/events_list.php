<?php
ob_start();
?>
<section class="news-section" id="news">
        <div class="container content-lg">
            <div class="title-v1">
                <h2>{LATEST_EVENTS}</h2>
                <p>We do <strong>things</strong> differently company providing key digital services. <br> 
                Focused on helping our clients to build a <strong>successful</strong> business on web and mobile.</p>             
            </div>

            <div class="row news-v1">
<?php
$result  =  $funEventsObj->latestList(3);
if($result['num_rows']>0){ ?>
  <?php
   while($row =  $funObj->result($result['result'])){
        $item_id   =  $row->id;
      $row_item  = $funEventsObj->file_items($item_id,'image','asc',1);
        $image     = @$row_item->item_name;
      $image_title     = @$row_item->item_title;
  ?>
    <div class="col-md-4 md-margin-bottom-40">
    <div class="news-v1-in">
           <?php if(file_exists(FCPATH."uploads/images/events/".$image) and !empty($image)){ ?> <a href="<?php echo base_url('events/'.$row->slug); ?>"> <img src="<?=base_url("uploads/images/events/".$image)?>" class="img-responsive" title="<?=$image_title?>" alt="<?=$image_title?>"></a>
    <?php }?>
    <h3><a href="<?php echo base_url('events/'.$row->slug); ?>"><?php echo $row->title;?></a></h3>
                <p><?php echo substr($row->short_description,0,60);?></p>
                <ul class="list-inline news-v1-info">                   
                    <li><i class="fa fa-clock-o"></i> <?php echo date('F d,Y',strtotime($row->from_date));?></li>                  
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
$cms['module:events_list'] = ob_get_clean();
ob_start();
?>
<div class="headline-v2"><h2>{LATEST_EVENTS}</h2></div>
 <!-- Latest Links -->
<ul class="list-unstyled blog-latest-posts margin-bottom-50">
<?php
$result  =  $funEventsObj->latestList(5);
if($result['num_rows']>0){ ?>
  <?php
   while($row =  $funObj->result($result['result'])){
        $item_id   =  $row->id;
      $row_item  = $funEventsObj->file_items($item_id,'image','asc',1);
      $image     = @$row_item->item_name;
      $image_title     = @$row_item->item_title;
  ?>                
  <li>
      <h3><a href="<?php echo base_url('events/'.$row->slug); ?>"><?php echo $row->title;?></a></h3>
      <small><i class="fa fa-clock-o"></i> <?php echo date('F d,Y',strtotime($row->created_at));?></small>                           
  </li>               
<?php   
   }
}
?>            
</ul>
<!-- End Latest Links -->
<?php
$cms['module:latest_events'] = ob_get_clean();
ob_start();
  $result = $funEventsObj->specialEvents(3);
  $num = $db->num_rows($result);
  if($num>0){?>
<div class="row">
    <?php
    while($row = $db->result($result)){  //pr($row);
      $item_id   =  $row->id;
      $row_item  = $funEventsObj->file_items($item_id,'image','asc',1);
      $image     = @$row_item->item_name;
      $image_title     = @$row_item->item_title;    
?>
<div class="col-md-4">
<?php if(file_exists(FCPATH."uploads/images/events/".$image) and !empty($image)){ ?><div class="eventbanner"><a href="<?php echo base_url('events/'.$row->slug); ?>"> <img src="<?=base_url("uploads/images/events/".$image)?>" class="img-responsive" title="<?=$row->title;?>" alt="<?=$row->title;?>"></a>
  <p><?=$row->title;?></p>
</div>
</div>
<?php 
    }
  }?>
</div>
<?php } 
$cms['module:event_home'] = ob_get_clean();