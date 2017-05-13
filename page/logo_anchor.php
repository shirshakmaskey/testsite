<?php ob_start(); ?>
<a href="{BASE_URL}"><img class="shrink-logo" src="<?php echo base_url(THEMES.DS.get_template()); ?>/images/logo.png" alt="Logo"></a>
<?php
$cms['module:logo_anchor'] = ob_get_clean();
?>