$(function() {
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
                        url: $(form).attr('action'),
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