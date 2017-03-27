/* Write here your custom javascript codes */
function show_pause_stop(id)
{   $('#playbtn_'+id).hide();
    $('#pausebtn_'+id).show();
    $('#stopbtn_'+id).show();
}
function show_play_btn(id)
{   $('#playbtn_'+id).show();
    $('#pausebtn_'+id).hide();
    $('#stopbtn_'+id).hide();
}

function addThisSongs(slug)
{
	var _user_id  =  $('#hidden_user_id').val();
	if(_user_id==''){
    var random_no  = Math.floor((Math.random() * 10000) + 1);
    var modal_msg  = "Please login first to add songs in cart.";               
    var alert_json  = {'width':'20%','id':'custom_modal','header':'show','title':'Alert!','msg':modal_msg,'btn':'hide','btn_txt':'','random_no':random_no};
    show_alert_modal(alert_json);
    //setTimeout( function(){window.location.href=base_url+'login';},5000);
	}else{
		jQuery.ajax({
              url: base_url+'page/mod_svl/ajax.php',
              type: 'post',
              dataType: 'JSON',
              data: {mode:'add_songs',act:'add',slug:slug},
              beforeSend: function() {},
              complete: function() {},
              success: function(response) { 
                   if(response['result']=='true'){
    var random_no  = Math.floor((Math.random() * 10000) + 1);
    var modal_msg  = response['msg'];               
    var alert_json  = {'width':'20%','id':'custom_modal','header':'show','title':'Success!','msg':modal_msg,'btn':'hide','btn_txt':'','random_no':random_no};
    show_alert_modal(alert_json);
                   }
              },//success              
              error: function(xhr, ajaxOptions, thrownError) {
                   alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText); }
      });
	}
}


function removeItems(b,i)
{
  var random_no  = Math.floor((Math.random() * 10000) + 1);
  var modal_msg        = "Are your sure, You want to delete this item?";  
  var alert_json  = {'width':'20%','id':'custom_modal','header':'show','title':'Alert!','msg':modal_msg,'btn':'show','btn_txt':'Ok','random_no':random_no};
    show_alert_modal(alert_json);
  $(document).on("click","#btn-modal-save.btn-" + random_no ,function(){
     jQuery('#custom_modal').modal('hide');
      jQuery.ajax({
              url: base_url+'page/mod_svl/ajax.php',
              type: 'post',
              dataType: 'JSON',
              data: {mode:'remove_songs',act:'remove',b:b,i:i},
              beforeSend: function() {},
              complete: function() {},
              success: function(response) { 
                   if(response['result']=='true'){   
    var random_no  = Math.floor((Math.random() * 10000) + 1);
    var modal_msg  = response['msg'];               
    var alert_json  = {'width':'20%','id':'custom_modal','header':'show','title':'Success!','msg':modal_msg,'btn':'hide','btn_txt':'','random_no':random_no};
    show_alert_modal(alert_json);
    setTimeout( function(){window.location.href=response['redirect'];},5000);
                   }
              },//success              
              error: function(xhr, ajaxOptions, thrownError) {
                   alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText); }
      });
   });
}

function addThisSongsPlay(slug)
{
  var _user_id  =  $('#hidden_user_id').val();
  if(_user_id==''){
    var random_no  = Math.floor((Math.random() * 10000) + 1);
    var modal_msg  = "Please login first to add songs in wishlist.";               
    var alert_json  = {'width':'20%','id':'custom_modal','header':'show','title':'Alert!','msg':modal_msg,'btn':'hide','btn_txt':'','random_no':random_no};
    show_alert_modal(alert_json);
    setTimeout( function(){window.location.href=base_url+'login';},5000);
  }else{
    jQuery.ajax({
              url: base_url+'page/mod_svl/ajax.php',
              type: 'post',
              dataType: 'JSON',
              data: {mode:'add_songs_to_playlist',act:'add',slug:slug},
              beforeSend: function() {},
              complete: function() {},
              success: function(response) { 
                   if(response['result']=='true'){
                      $('span.item_badge').text(response['cnt']);
    var random_no  = Math.floor((Math.random() * 10000) + 1);
    var modal_msg  = response['msg'];               
    var alert_json  = {'width':'20%','id':'custom_modal','header':'show','title':'Success!','msg':modal_msg,'btn':'hide','btn_txt':'','random_no':random_no};
    show_alert_modal(alert_json);
                   }
              },//success              
              error: function(xhr, ajaxOptions, thrownError) {
                   alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText); }
      });
  }
}

function removeItemsPlaylist(u,i)
{ var random_no  = Math.floor((Math.random() * 10000) + 1);
  var modal_msg        = "Are your sure, You want to delete this item?";  
  var alert_json  = {'width':'20%','id':'custom_modal','header':'show','title':'Alert!','msg':modal_msg,'btn':'show','btn_txt':'Ok','random_no':random_no};
    show_alert_modal(alert_json);
  $(document).on("click","#btn-modal-save.btn-" + random_no ,function(){
     jQuery('#custom_modal').modal('hide');
     jQuery.ajax({
              url: base_url+'page/mod_svl/ajax.php',
              type: 'post',
              dataType: 'JSON',
              data: {mode:'remove_songs_playlist',act:'remove',u:u,i:i},
              beforeSend: function() {},
              complete: function() {},
              success: function(response) { 
                   if(response['result']=='true'){
    var random_no  = Math.floor((Math.random() * 10000) + 1);
    var modal_msg  = response['msg'];               
    var alert_json  = {'width':'20%','id':'custom_modal','header':'show','title':'Success!','msg':modal_msg,'btn':'hide','btn_txt':'','random_no':random_no};
    show_alert_modal(alert_json);
    setTimeout( function(){window.location.href=response['redirect'];},5000);
                   }
              },//success              
              error: function(xhr, ajaxOptions, thrownError) {
                   alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText); }
      });
  }); 
}