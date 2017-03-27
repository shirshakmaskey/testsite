<?php
ob_start();
?>
<div class="headline-v2"><h2>Events Category</h2></div>
 <!-- Latest Links -->
                    <ul class="list-unstyled blog-latest-posts margin-bottom-50">
<?php
$result  =  $funEventsObj->category(3);
$num_rows   =  $db->num_rows($result);
if($num_rows>0){ ?>
  <?php
   while($row =  $funObj->result($result)){
       $result_items  =  $funEventsObj->count_item_in_cat($row->id); 
       $num_items  =  $db->num_rows($result_items);
  ?>                
  <li>
                            <h3><a href="<?php echo base_url('events/cat/'.$row->slug); ?>"><?php echo $row->title;?> (<?php echo $num_items?>)</a></h3>
                            <small><i class="fa fa-clock-o"></i> <?php echo date('F d,Y',strtotime($row->created_at));?></small>                           
                        </li>               
<?php   
   }
}
?>            
</ul>
                    <!-- End Latest Links -->
<?php
$cms['module:events_category'] = ob_get_clean();
?>