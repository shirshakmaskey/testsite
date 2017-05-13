<?php ob_start();?>
<h4>WE ACCEPT</h4>
<div class="footer-list">
<div class="footer-list-img"><a href="javascript:void(0);"><img src="<?php echo base_url(THEMES.DS.get_template()); ?>/images/accept.png"></a></div>
<div class="footer-list-img"><a href="javascript:void(0);"><img src="<?php echo base_url(THEMES.DS.get_template()); ?>/images/wi-fi.jpg"></a></div>
</div>
<?php $cms['module:accept_wi_fi'] = ob_get_clean();