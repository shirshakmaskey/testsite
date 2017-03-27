<?php 
ob_start();$cms['module:js_css_in_head'] = ob_get_clean();
ob_start();$cms['module:js_css_in_head_alternative'] = ob_get_clean();
ob_start();$cms['module:js_css_in_bodytop'] = ob_get_clean();
ob_start();$cms['module:js_css_in_bottom'] = ob_get_clean();
ob_start();$cms['module:js_css_in_header'] = ob_get_clean();
ob_start();$cms['module:js_css_in_maintop'] = ob_get_clean();
ob_start();$cms['module:js_css_in_mainbottom'] = ob_get_clean();
ob_start();
$profile_id  =  $funUserObj->current_user();
?>
<div id="custom_modal" class="modal fade bs-alert-modal-sm" tabindex="-1" role="dialog" aria-labelledby="myAlertModalLabel1" aria-hidden="true">
	<div class="modal-dialog modal-custom ">
		<div class="modal-content">
			<div class="modal-header">
	<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
				<h4 id="myAlertModalLabel1" class="modal-title"></h4>
			</div>
			<div class="modal-body">
				
			</div>
			<div class="modal-footer">
<button type="button" class="btn-u" id="btn-modal-save"></button>
<button type="button" class="btn-u btn-u-default" data-dismiss="modal">Close</button>				
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
 $(function(){
 	if($('#div_bottom_append').length==0)
      {$("body").append('<div id="div_bottom_append"></div>');}	
    $("#div_bottom_append").append('<input type="hidden" id="hidden_user_id" value="<?php echo $profile_id?>">');

 });
 function show_alert_modal(json)
 {  if(json.btn=='hide'){
        jQuery('#'+json.id+' .modal-footer').hide();
    }else{ 
    	jQuery('#'+json.id+' .modal-footer #btn-modal-save').text(json.btn_txt);
    	jQuery('#'+json.id+' .modal-footer #btn-modal-save').addClass('btn-'+json.random_no);
    	jQuery('#'+json.id+' .modal-footer').show();
    }
    if(json.header=='hide'){
        jQuery('#'+json.id+' .modal-header').hide();
    }else{ 
    	jQuery('#'+json.id+' .modal-title').html(json.title);
    	jQuery('#'+json.id+' .modal-header').show();
    }
    jQuery('#'+json.id+' .modal-custom').css('width',json.width);
 	jQuery('#'+json.id).modal({backdrop: 'static',keyboard: false,show: true}); 	
    jQuery('#'+json.id+' .modal-body').html('');
    jQuery('#'+json.id+' .modal-body').empty();
    jQuery('#'+json.id+' .modal-body').html(json.msg);
 }
</script>
<?php $scms['JS_CSS_IN_FOOTER'] .= ob_get_clean();
//finaloutput to js_css_in_footer
ob_start();?>JS_CSS_IN_FOOTER<?php $cms['module:js_css_in_footer'] = ob_get_clean();					