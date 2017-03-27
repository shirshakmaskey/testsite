<?php ob_start();?>
<ul class="left-topbar list-inline pull-left">
	<li><a href="tel:<?php echo COMPANY_PHONE?>"> <i class="fa fa-phone"></i> <?php echo COMPANY_PHONE?></a></li>
    <li> <a href="mailto:<?php echo COMPANY_EMAIL?>"> <i class="fa fa-envelope"></i> <?php echo COMPANY_EMAIL?></a></li>
</ul>
<?php
$cms['module:top_left'] = ob_get_clean();
?>