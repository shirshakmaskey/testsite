//var base_url  =  $("base").attr('href');
var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
var webExp = /^http:\/\/(www\.)?[a-zA-Z0-9]+\.[\.a-zA-Z0-9]+/;
var numExp = /^[0-9]+$/;
var imageExt = /\.jpg|gif|png|jpeg|JPG|GIF|PNG|JPEG/;  

"use strict";jQuery.base64=(function($){var _PADCHAR="=",_ALPHA="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/",_VERSION="1.0";function _getbyte64(s,i){var idx=_ALPHA.indexOf(s.charAt(i));if(idx===-1){throw"Cannot decode base64"}return idx}function _decode(s){var pads=0,i,b10,imax=s.length,x=[];s=String(s);if(imax===0){return s}if(imax%4!==0){throw"Cannot decode base64"}if(s.charAt(imax-1)===_PADCHAR){pads=1;if(s.charAt(imax-2)===_PADCHAR){pads=2}imax-=4}for(i=0;i<imax;i+=4){b10=(_getbyte64(s,i)<<18)|(_getbyte64(s,i+1)<<12)|(_getbyte64(s,i+2)<<6)|_getbyte64(s,i+3);x.push(String.fromCharCode(b10>>16,(b10>>8)&255,b10&255))}switch(pads){case 1:b10=(_getbyte64(s,i)<<18)|(_getbyte64(s,i+1)<<12)|(_getbyte64(s,i+2)<<6);x.push(String.fromCharCode(b10>>16,(b10>>8)&255));break;case 2:b10=(_getbyte64(s,i)<<18)|(_getbyte64(s,i+1)<<12);x.push(String.fromCharCode(b10>>16));break}return x.join("")}function _getbyte(s,i){var x=s.charCodeAt(i);if(x>255){throw"INVALID_CHARACTER_ERR: DOM Exception 5"}return x}function _encode(s){if(arguments.length!==1){throw"SyntaxError: exactly one argument required"}s=String(s);var i,b10,x=[],imax=s.length-s.length%3;if(s.length===0){return s}for(i=0;i<imax;i+=3){b10=(_getbyte(s,i)<<16)|(_getbyte(s,i+1)<<8)|_getbyte(s,i+2);x.push(_ALPHA.charAt(b10>>18));x.push(_ALPHA.charAt((b10>>12)&63));x.push(_ALPHA.charAt((b10>>6)&63));x.push(_ALPHA.charAt(b10&63))}switch(s.length-imax){case 1:b10=_getbyte(s,i)<<16;x.push(_ALPHA.charAt(b10>>18)+_ALPHA.charAt((b10>>12)&63)+_PADCHAR+_PADCHAR);break;case 2:b10=(_getbyte(s,i)<<16)|(_getbyte(s,i+1)<<8);x.push(_ALPHA.charAt(b10>>18)+_ALPHA.charAt((b10>>12)&63)+_ALPHA.charAt((b10>>6)&63)+_PADCHAR);break}return x.join("")}return{decode:_decode,encode:_encode,VERSION:_VERSION}}(jQuery));


   $(function(){                         
		if($('#frmRegister').length>0)
		$('#frmRegister').validate(); 
		if($('#frmLogin').length>0)
		$('#frmLogin').validate(); 
		$('#errMessageDiv').hide(); 
		if($('#forget_password_form').length>0)  
		$("#forget_password_form").validate();   
		$('#change_password_form').validate();       
    
    $('#forget_submit').click(function(){
			$('.alert').remove(); 
			var email = $('#forget_email').val();
	$.post(base_url+'page/mod_user/ajax.php',{email:email,mode:'check_email'},function(response){
          if(response.result=='true'){
              $("#forget_password_form").prepend('<div class="alert alert-success">'+response.message+'</div>');  
              $('#forget_email').val('');
          }else{
              $("#forget_password_form").prepend('<div class="alert alert-danger">'+response.message+'</div>');   
          }      
          $('.alert').show().delay(5000).fadeOut('slow'); 
	},'json');//function
		});


$('#submit_change_password').click(function(){
			$('.alert').remove(); 
			var p = $('#new_password').val(); 
			var code = $('#new_password_code').val(); 
			if($("#change_password_form").valid()){   
			var pass  =  $.base64.encode(p);  
		$.post(base_url+'page/mod_user/ajax.php',{pass: pass,code:code,mode:'change_password_code'},function(response){
          if(response.result=='true'){
              $("#change_password_form").prepend('<div class="alert alert-success">'+response.message+'</div>');  
              $('#new_password').val('');
              $('#confirm_new_password').val('');
               setTimeout(function()
                                  { var redirect_url = base_url;                    
                                    if(response.redirect_url && response.redirect_url.length)
                                    redirect_url = response.redirect_url;                    
                                    window.location.href = redirect_url;
                                  }, 3000);
          }else{
              $("#change_password_form").prepend('<div class="alert alert-danger">'+response.message+'</div>');   
          }      
          $('.alert').show().delay(5000).fadeOut('slow'); 
	},'json');
			}
      });


	});//jquery close
function checkLogin(o)
{
     if($("#frmLogin").valid())
	{   $("#js_Login").text('Checking Login...');
			var my_token     =  $("input[name=my_token]").val();
			var txtUsername  =  $("#js_username").val();
			var pwdPassword  =  $("#js_password").val();
			var chkRemember  =  $("#chkRemember").val();
		    var pass         =  Base64.encode(Base64.encode(pwdPassword));
			var hash  = my_token+pass+my_token;
			$.post(base_url+"page/mod_user/ajax.php",{txtUsername:txtUsername,my_token:my_token,hash:hash,chkRemember:chkRemember,fromJs:1,mode:'check_login'},function(data){
			    if(data.act!="success")
				{  $("#js_username").focus();
    			   $('#errMessageDiv').show().html(data.message);
				   $("#js_Login").val('Login');
				   $("#js_Login").text('Login');	
				}else{ 
				   window.location.href=data.redirect_url;
				}																	
			},'json');
			return false;	
	   
	}else{
	return false;	
	}
}
//(function($) { })(jQuery);	