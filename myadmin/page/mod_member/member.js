// JavaScript Document
$(function(){ $("#addEditForm").validate(); });

function customerCheck()
{
	if($("#first_name").val()=="")
	 { setfocus('first_name'); 
	  setMessage('first_name'+'Err','Please enter the first name!!');
	  fadeInfadeOut('first_name'+'Err');
	  addClas('first_name'+'Err','errorClass');
	   return false; 
	 }  
	 else
	 {	return true;  }	
}
