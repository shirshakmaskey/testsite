<?Php
if(!isset($_SESSION['successMsg']))
$_SESSION['successMsg']	=	"";
$id  =   isset($_REQUEST['aid'])?($_REQUEST['aid']):0;
$result  =  $funMemberObj->booking_lists($id);
$num =  $db->num_rows($result);
$rowEdit =  $funMemberObj->customerSel($id); 
?>
<div class="page-header">
<div class="row">
				<!-- Page header, center on small screens -->
				<h1 class="col-xs-12 col-sm-4 text-center text-left-sm"><i class="fa fa-tasks page-header-icon"></i>&nbsp;&nbsp;Manage orders's of <?php echo $rowEdit->first_name;?></h1>

				<div class="col-xs-12 col-sm-8">
					<div class="row">
						<hr class="visible-xs no-grid-gutter-h">
						<!-- "Create project" button, width=auto on desktops -->
						<div class="pull-right col-xs-12 col-sm-auto"><a href="list-<?php echo $module; ?>" class="btn btn-primary btn-labeled">Back</a>
						</div>


					</div>
				</div>
			</div>
</div><!--page-header-->
<div class="row"><div class="col-sm-12"><div class="panel"><div class="panel-body">
<div class="table-primary">


<div class="panel-group acc-v1" id="accordion-1">
      <?php
        if($num>0){
        while($row =  $db->result($result)){
              $result_items   =  $funMemberObj->find_book_child_by_id($row->id);
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
                         <a target="_blank" href="<?php echo base_url('filedownload.php?u='.$id.'&s='.$slug);?>"><i class="fa fa-download"></i> <?php echo $row_item->title;?> </a>
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
        <?php }} ?>  


<script type="text/javascript" charset="utf-8" id="init-code">
		$(document).ready(function() {
		});
</script>
</div></div></div></div></div>
