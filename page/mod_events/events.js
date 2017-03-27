// JavaScript Document
setTimeout("reloadCaptcha()", 3000);
function reloadCaptcha()
{ 
	document.getElementById('siimage').src = base_url+'applications/securimage-master/securimage_show.php?sid=' + Math.random();
}
function checkEvent()
{
	if($("#addEditForm").valid()){
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
  var addEditForm  =   jQuery("#addEditForm"); 
  var validator =  addEditForm.validate({
        rules: {
            fullname: {
                required: true
            }
        },
        messages:{  
            fullname: {
                required: "Please enter the fullname"
            }                    
        },         
      submitHandler: function(form) { 
                 var params  =    $(form).serialize();      
                 jQuery.ajax({
                        url: base_url + 'page/mod_events/act_events.php',
                        method: 'POST',
                        dataType: 'json',
                        data: params,
                        error: function()
                        {  $(form).append('<div class="alert alert-danger">An error occoured!</div>');
                           $('.alert').show().delay(5000).fadeOut('slow').remove();
                        },
                        success: function(response)
                        {   $('.alert').remove(); 
                               if(response.success==true){
                               $(form).append('<div class="alert alert-success">'+response.message+'</div>');
                               $('.alert').show().delay(3000).fadeOut('slow');
                                 addEditForm[0].reset();
                                  /*setTimeout(function()
                                  { var redirect_url = base_url;              
                                    if(response.redirect_url && response.redirect_url.length)
                                    redirect_url = response.redirect_url; 
                                    window.location.href = redirect_url;                           
                                  }, 3000);*/                                  
                              }
                              else if(response.success==false && response.item_exists==true){
                                $(form).append('<div class="alert alert-danger">'+response.message+'</div>');
                                $('.alert').show().delay(5000).fadeOut('slow');
                              } 
                              else {
                                $(form).append('<div class="alert alert-danger">'+response.message+'</div>');
                                $('.alert').show().delay(5000).fadeOut('slow');
                              } 
                        }
                      }); //ajax
           }            
      });		
});