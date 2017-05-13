<?php 
include_once('paynow.php');
include_once(FCPATH.'page/mod_payment/success.php');
if(defined("PAYMENT_PAGE")){
ob_start();
?>
 <!--=== Payment ===-->
    <div class="container content payment">
    	<div class="row">
                       
            <div class="col-md-12">
                <div class="profile-body margin-bottom-20">
                <?php echo isset($cms['module:'.$module.'_'.$contentPage]) ? $cms['module:'.$module.'_'.$contentPage] : '';?>
                </div>
            </div>
            <!-- End Payment Content -->            
        </div>
    </div><!--/container-->    
    <!--=== End Payment ===-->
<?php 
$cms['module:payment_z_pages'] = ob_get_clean();
}
?>