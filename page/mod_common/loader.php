<?php ob_start();?>
<div class="page_overlay" id="page_overlay" style="display:none;">
	<div class="page_overlay_loader" >    	
    <img src="<?php echo base_url("images/360.gif"); ?>" alt="Loading.." />
		<p>Loading</p>
	</div>
</div>
<?php $cms['module:loader'] = ob_get_clean();				