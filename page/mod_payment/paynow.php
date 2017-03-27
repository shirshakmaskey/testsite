<?php 
if(defined("PAYMENT_PAGE")){
    $results =  $db->query("select * from tbl_product_price where status='1'");
    ob_start();?>
    <form class="sky-form" id="payment_form" name="payment_form" method="post" action="<?php echo base_url('action/payment/payment_section');?>" novalidate="novalidate" enctype="multipart/form-data" onsubmit="return checkPaymentForm();" >
        <header>Please fill your detail with amount and select payment method</header>
        <fieldset>
            <div class="row">
                <section class="col col-6">
                    <div>Fullname <span class="color-red">*</span></div>
                    <label class="input">
                        <input type="text" class="form-control required" id="fullname" name="fullname" value="<?php echo @isset($_POST['fullname_paynow'])?$_POST['fullname_paynow']:'';?>" >
                    </label>
                </section>
                <section class="col col-6">
                    <div>Address <span class="color-red">*</span></div>
                    <label class="input">
                        <input type="text" class="form-control required" id="address" name="address" value="<?php echo @isset($_POST['address_paynow'])?$_POST['address_paynow']:'';?>" >
                    </label>
                </section>
            </div>
            <div class="row">
                <section class="col col-6">
                    <label>Contact No <span class="color-red">*</span></label>
                    <label class="input">
                        <input type="text" class="form-control required" id="contact_no" name="contact_no" value="<?php echo @isset($_POST['contact_no_paynow'])?$_POST['contact_no_paynow']:'';?>" >
                    </label>
                </section>
                <section class="col col-6">
                    <label>Email <span class="color-red">*</span></label>
                    <label class="input">
                        <input type="email" class="form-control email" id="email_address" name="email_address" value="<?php echo @isset($_POST['email_paynow'])?$_POST['email_paynow']:'';?>" >
                    </label>
                </section>
            </div>

            <div class="row">
                <section class="col col-6">
                    <label>Select the services <span class="color-red">*</span></label>
                    <div style="height:200px;width:100%;overflow:auto;">
                        <?php if($db->num_rows($results)>0){ while($row =  $db->result($results)) {?>
                        <label class="checkbox">
                            <input type="checkbox" name="service[]" value="<?php echo $row->id?>" title="<?php echo $row->price?>" onclick="total_price();" class="service_price"> <i></i><?php echo $row->title?> ( NPR. <?php echo $row->price?>)</label>   
                        </label>
                        <?php }} ?>
                    </div>
                </section>
                <section class="col col-6">
                    <label> Service/Product Delivery address and details <span class="color-red">*</span></label>
                    <textarea class="form-control required" id="delivery_address_detail" name="delivery_address_detail" rows="6"></textarea>
                </section>

            </div>	
            <div class="row">
                <section class="col col-12">
                    <label>Total Amount</label>
                    <label class="input">
                        <div><span>Rs. </span><span class="grand_total">0</span></div>
                    </label>
                </section>

            </div>
            <div class="row">
                <section class="col"><label> Select Payment Method <span class="color-red">*</span></label></section>
                <section class="col col-3">
                    <div class="thumbnail"><img src="<?php echo base_url('images/payment/esewa.jpg');?>" title="Esewa"></div>
                    <label class="radio"><input type="radio" name="payment_method" value="esewa" checked > <i></i> Esewa </label>
                </section>
                <!-- <section class="col col-3 hide">
            <div class="thumbnail"><img src="<?php echo base_url('images/payment/investment.png');?>" title="Investment"></div>
                 <label class="radio"><input type="radio" name="payment_method" value="investment"> <i></i> Investment </label>
                </section> -->
                

            </div>
        </fieldset>
        <footer>
            <button class="btn-u btn-u-default" type="submit" name="submitBtn" id="submitBtn" value="1">Submit</button>
            <button  class="btn-u" type="reset">Reset</button>
        </footer>
        <div class="message">
         <i class="rounded-x fa fa-check"></i>
         <p>Your message was successfully sent!</p>
     </div>
 </form>
<script type="text/javascript">
$(function(){ $('#payment_form').validate(); });

function checkPaymentForm()
{
    if($('#payment_form').valid()){
         var service_len   =  $('.service_price:checked').length; 
         if(service_len>0)return true;
         else return false;
    }else{
        return false;
    }
}

    function total_price()
    {    var total = 0;
          $(".service_price").each(function(){
               if($(this).prop('checked')==true){
                       var price  =  $(this).attr('title');
                       total  += parseInt(price);
               }
          });
          $(".grand_total").html(total);
    }
</script>
 <?php $cms['module:payment_paynow'] = ob_get_clean();
}