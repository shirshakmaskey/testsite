<?php
ob_start();
?>
<p><span class="yellow_one"><strong><?php echo COMPANY_SITE_NAME; ?></strong></span></p>
<p><!-- Professional Tour guiding-->
	<span class="glyphicon glyphicon-map-marker"></span><?php echo COMPANY_STREET; ?><br>
	<span class="glyphicon glyphicon-map-marker"></span><?php echo COMPANY_LOCATION; ?>
</p>
<p> 
	<?php echo COMPANY_PHONE; ?> <br>
	<span class="glyphicon glyphicon-phone"></span> <?php echo COMPANY_MOBILE; ?> </p>
<p> <span class="glyphicon glyphicon-envelope"></span> 
    <script type="text/javascript">
    var string_email1 = "<?php echo COMPANY_EMAIL;?>";
    document.write("<a href=" + "mail" + "to:" + string_email1+ " class='yellow_one' >" + string_email1 + "</a><br>");
    var string_email2 = "<?php echo COMPANY_EMAIL_2;?>";
    document.write("<a href=" + "mail" + "to:" + string_email2+ " class='yellow_one' >" + string_email2 + "</a>");
</script>
	 </p>
<?php
$cms['module:we_accept'] = ob_get_clean();