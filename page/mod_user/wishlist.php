<?php 
if(isset($contentPage) and $contentPage=='wishlist'){
ob_start(); 
$profile_id  =  $funUserObj->current_user();
if(empty($profile_id)){ redirect(base_url());}
$row_user    =  $funUserObj->find_by_id($profile_id); 
//pr($row_user);
?>
<!-- Accordion v1 -->
          <div class="panel-group acc-v1" id="accordion-1">
      <?php
        $result  =  $funBookingObj->booking_lists($profile_id);
        $num     =  $db->num_rows($result);
        if($num>0){
        while($row =  $db->result($result)){
              $result_items   =  $funBookingObj->find_book_child_by_id($row->id);
              $num_items      =  $db->num_rows($result_items);
              $booking_status =  $row->booking_status;
              $has_payment    =  $row->has_payment;
              ?>

            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-1" href="#collapse-One">
                    Wishlist <?php echo date("F d,Y",strtotime($row->booking_date)); ?>
                  </a>
                </h4>
              </div>
              <div id="collapse-One" class="panel-collapse collapse in">
                <div class="panel-body">
                 <table class="table table-bordered">
                 <thead>
                   <tr>
                   <th>S.N</th>
                   <th>Songs</th>
                   <th>Price</th>
                   <?php if($has_payment=='0'){ ?><th>Trash</th><?php } ?>
                   </tr>
                 </thead>
                  <?php $total_amount = 0;
              if($num_items>0){ $sn=1; 
                  while($row_items  =  $db->result($result_items)){ 
                        $item_id  =  $row_items->item_id;
                        $row_item     =  $funSVLObj->find_by_id_songs($item_id);
                        $songs_file =  $row_item->songs_file;
                        $slug = $row_item->token_keys;
                      ?>
                  <tr>
                      <td><?php echo $sn;?></td>
                      <td><?php if($booking_status=='open'){ ?><?php echo $row_item->title;?>
                        <?php }else{
                        if(file_exists(FCPATH."uploads/songs/".$songs_file) and !empty($songs_file)){
                          ?> 
                         <a target="_blank" href="<?php echo base_url('filedownload.php?u='.$profile_id.'&s='.$slug);?>"><i class="fa fa-download"></i> <?php echo $row_item->title;?> </a>
                        <?php }} ?>
                      </td>
                      
                        <?php if($booking_status=='open'){ ?>
                          <td>
                         $ <?php 
                           $each_price  =  $row_item->price;
                          $total_amount += $each_price;
                         echo $each_price; ?> 
                         </td>

                         <td>
                         <a style="border:1px solid; border-radius:8px;padding:4px 6px;" href="javascript:void(0);" class="cp" onclick="removeItems('<?php echo $row->id;?>','<?php echo $row_items->item_id;?>');"><i class="fa fa-minus"></i></a>
                         </td>
                        <?php }else{?>
                             <td colspan='1'>$ <?php echo $row_item->price;?></td>
                             <?php } ?>
                  </tr>
                 <?php $sn++; }
                      }
                   if($has_payment=='0'){   
                   ?>
                   <tr>
                      <td>#</td>
                      <td>Total Amount</td>
                      <td>$ <?php echo $total_amount;?></td>
                      <td></td>
                  </tr>
                   <tr>
                    <td colspan='4'>

          <a href="javascript:void(0);" onclick="document.getElementById('booking_form_<?php echo $row->id;?>').submit();"  class="btn btn-primary btn pull-right">Pay Now to Download</a>
          <form method="post" action="<?php echo base_url('page/mod_svl/ajax.php');?>" id="booking_form_<?php echo $row->id;?>">                      
          <input type="hidden" name="booking_id" value="<?php echo base64_encode($row->id);?>">   
          <input type="hidden" name="price" value="<?php echo base64_encode($total_amount);?>"> 
          <input type="hidden" name="mode" value="make_payment">
          </form>

                    </td>

                  </tr>
                  <?php }else{?>
                  <tr>
                      <td colspan="4">
                        Payment Type : <?php echo $row->payment_type;?> <br>
                        Payment Date : <?php echo $row->payment_date;?> <br>
                        Transcation Id : <?php echo $row->payment_transaction_id;?> <br>                        

                      </td>
                  </tr>
                  <?php } ?>
                </table>
                </div>
              </div>
            </div>
          </div>
         
              <?php
        }
       }else{
          echo "Your wishlist is empty. Please add it.";
       }
      ?>
</div>
 <!-- End Accordion v1 -->
<?php 
$cms['module:user_wishlist'] = ob_get_clean();
}
?>
