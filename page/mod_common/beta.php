<?php ob_start();?>
<img  class="beta_image_css" src="<?php echo base_url("images/beta.png"); ?>">
<?php $cms['module:beta'] = ob_get_clean();