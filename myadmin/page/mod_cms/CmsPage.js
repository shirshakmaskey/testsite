// JavaScript Document
function cmspage()
{
     if($("#pagename").val()=="")
	{  
	   setfocus('pagename');
	   setMessage('pagename'+'Err','Please enter the pagename !!');
	  fadeInfadeOut('pagename'+'Err');
	  addClas('pagename'+'Err','errorClass');
		return false; 
	 }
	 
	 else  if($("#pagetitle").val()=="")
	 {  
	   setfocus('pagetitle');
	  setMessage('pagetitleErr','Please enter the Pagetitle !!');
	  fadeInfadeOut('pagetitleErr');
	  addClas('pagetitleErr','errorClass');
	   return false; 
	 }
	 else  if($("#metasubject").val()=="")
	{  
	   setfocus('metasubject');
	   setMessage('metasubject'+'Err','Please enter the metasubject !!');
	  fadeInfadeOut('metasubject'+'Err');
	  addClas('metasubject'+'Err','errorClass');
		return false; 
	 }
	 
	 else  if($("#metakeyword").val()=="")
	 {  
	   setfocus('metakeyword');
	  setMessage('metakeyword'+'Err','Please enter the metakeyword !!');
	  fadeInfadeOut('metakeyword'+'Err');
	  addClas('metakeyword'+'Err','errorClass');
	   return false; 
	 }
	 else  if($("#metadesc").val()=="")
	 {  
	   setfocus('metadesc');
	  setMessage('metadesc'+'Err','Please enter the Meta Descriptions !!');
	  fadeInfadeOut('metadesc'+'Err');
	  addClas('metadesc'+'Err','errorClass');
	   return false; 
	 }
	
	 else
	 {
		return true; 
	 }
}