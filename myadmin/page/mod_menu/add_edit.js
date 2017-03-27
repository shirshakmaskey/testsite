// JavaScript Document
$(function(){ $("#addEditForm").validate(); });
function listArticle(id_sl)
{   $('#txtmName').val('');$('#txtmLink').val('');
    var id_slug  =  id_sl.split('|');
	var id  = id_slug[0];
	var slug  = id_slug[1];
	$.post(admin_url+'page/mod_menu/ajax.php',{id:id,mode:'list_article'},function(data){
					  $("#pages_list").html(data);	
					  $("#hidden_cat").val(slug);				  
					});
}
 
function listMenu(id)
{
	$.post(admin_url+'page/mod_menu/ajax.php',{id:id,mode:'list_menus'},function(data){
					  $("#menu_list").html(data);					  
					});
}


function generate_link(slug)
{ var gen_link  = '';
  var hidden_cat =  $("#hidden_cat").val();
  if(hidden_cat!=''){
	  gen_link  = gen_link+hidden_cat+'/';
  }
   gen_link  = gen_link+slug;
  $("#txtmLink").val(gen_link);	
}

