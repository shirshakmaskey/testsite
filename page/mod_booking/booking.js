// JavaScript Document
setTimeout("reloadCaptcha()", 3000);
function reloadCaptcha()
{ 
	document.getElementById('siimage').src = base_url+'applications/securimage-master/securimage_show.php?sid=' + Math.random();
}
function checkBooking()
{
	if($("#standardForm").valid()){
		if($("#ct_captcha").val()=="")
		{  
		   $("#ct_captcha").focus();
		   $("#ct_captchaErr").text("Please enter the code");
		   $("#ct_captchaErr").css("color","red");
		 return false; 
		 }
		else if($("#errorCheck").val()!='1')
		{   $("#ct_captcha").focus();
		   $("#ct_captchaErr").text("Please enter the valid code");
		   $("#ct_captchaErr").css("color","red");
		   return false;
		}
		 else
		 return true;
   }else{
	return false;   
   }
}
function checkCaptcha(captcha)
{   
	if(captcha.length==6){
	      $.post(base_url+'page/checkCaptcha.php',{captcha:captcha },function(msg){		
		      if(msg.result=='yes'){
				 $("#ct_captchaErr").text('');
		         $("#errorCheck").val('1'); 
			  }else{				  
				 $("#ct_captchaErr").text('Invalid Security code');
		         $("#errorCheck").val('0');  
			  }
		  },'json');   
	}else{
		 $("#ct_captchaErr").text('Please provide all code');
        $("#ct_captchaErr").css("color","red");
        $("#errorCheck").val('0');
	}	
	setTimeout("$('#ct_captchaErr').text('')", 10000);
}
jQuery(document).ready(function($){
	$("#standardForm").validate();
	$("#checkIndate").datepicker();
	$("#checkOutdate").datepicker();
});