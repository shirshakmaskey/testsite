// JavaScript Document
function linkCheck()
{ 
   if($("#link_title").val()=="")
	 {  
	   setfocus('link_title');
	  setMessage('link_title'+'Err','Please enter the Title !!');
	  fadeInfadeOut('link_title'+'Err');
	  addClas('link_title'+'Err','errorClass');
	   return false; 
	 }
	 else  if($("#link_url").val()=="")
	 {  
	   setfocus('link_url');
	  setMessage('link_url'+'Err','Please enter the Link Url !!');
	  fadeInfadeOut('link_url'+'Err');
	  addClas('link_url'+'Err','errorClass');
	   return false; 
	 }
	 else  if(!$("#link_url").val().match(webExp) && $("#link_url").val()!="")
	   {  
       setfocus('link_url');
	  setMessage('link_url'+'Err','Please enter the valid Link Url !!');
	  fadeInfadeOut('link_url'+'Err');
	  addClas('link_url'+'Err','errorClass');
		return false; 
	    }
	 
	 else  if($("#link_desc").val()=="")
	 {  
	   setfocus('link_desc');
	  setMessage('link_desc'+'Err','Please enter the Description!!');
	  fadeInfadeOut('link_desc'+'Err');
	  addClas('link_desc'+'Err','errorClass');
	   return false; 
	 }
		 
	else  if($("#status").val()=="-1")
	 {  
	  setMessage('status'+'Err','Please select the Status !!');
	  fadeInfadeOut('status'+'Err');
	  addClas('status'+'Err','errorClass');
	   return false; 
	 }
	  
	 else
	 {
		return true; 
	 }
}