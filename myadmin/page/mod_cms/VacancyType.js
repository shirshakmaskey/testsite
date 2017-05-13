// JavaScript Document
function vacancyTypeCheck()
{
	 if($("#vacancy_type_name").val()=="")
	 {  
	   setfocus('vacancy_type_name');
	  setMessage('vacancy_type_name'+'Err','Please enter the vacancy type name !!');
	  fadeInfadeOut('vacancy_type_name'+'Err');
	  addClas('vacancy_type_name'+'Err','errorClass');
	   return false; 
	 }
	else  if($("#vacancy_type_description").val()=="")
	 {  
	   setfocus('vacancy_type_description');
	  setMessage('vacancy_type_description'+'Err','Please enter the Description !!');
	  fadeInfadeOut('vacancy_type_description'+'Err');
	  addClas('vacancy_type_description'+'Err','errorClass');
	   return false; 
	 }
	 
	 else
	 {
		return true; 
	 }	
}