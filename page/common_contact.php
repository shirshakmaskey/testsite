<?php
ob_start();
?>
<div class="headline">
							<h2>Contact Us</h2>
						</div>
						<address class="md-margin-bottom-40">
						<?php echo COMPANY_SITE_NAME; ?><br />
					    <?php echo COMPANY_STREET; ?><br />
						<?php echo COMPANY_LOCATION; ?><br />
						Phone: <?php echo COMPANY_PHONE; ?> <br />
						Email: <script type="text/javascript">
    var string_email1 = "<?php echo COMPANY_EMAIL;?>";
    document.write("<a href=" + "mail" + "to:" + string_email1+ " class='yellow_one' >" + string_email1 + "</a>");
</script> <br />
<i class="fa fa-skype"></i> <?php echo SKYPE_ID; ?>
						</address>
<?php $cms['module:common_contact'] = ob_get_clean();