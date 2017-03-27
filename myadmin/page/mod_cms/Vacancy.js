// JavaScript Document


function vacancyCheck()
{
	 if($("#vacancy_type_id").val()=="-1")
	 {  
	  setMessage('vacancy_type_id'+'Err','Please select the Type !!');
	  fadeInfadeOut('vacancy_type_id'+'Err');
	  addClas('vacancy_type_id'+'Err','errorClass');
	   return false; 
	 }
	 else  if($("#vacancy_title").val()=="")
	 {  
	   setfocus('vacancy_title');
	  setMessage('vacancy_title'+'Err','Please enter the vacancy title !!');
	  fadeInfadeOut('vacancy_title'+'Err');
	  addClas('vacancy_title'+'Err','errorClass');
	   return false; 
	 }
	 else  if($("#vacancy_number").val()=="")
	 {  
	   setfocus('vacancy_number');
	  setMessage('vacancy_number'+'Err','Please enter the vacancy number !!');
	  fadeInfadeOut('vacancy_number'+'Err');
	  addClas('vacancy_number'+'Err','errorClass');
	   return false; 
	 }
	 else  if($("#vacancy_description").val()=="")
	 {  
	   setfocus('vacancy_description');
	  setMessage('vacancy_description'+'Err','Please enter the vacancy Description !!');
	  fadeInfadeOut('vacancy_description'+'Err');
	  addClas('vacancy_description'+'Err','errorClass');
	   return false; 
	 }
	 else  if($("#started_date").val()=="")
	 {  
	   setfocus('started_date');
	  setMessage('started_date'+'Err','Please enter the start date !!');
	  fadeInfadeOut('started_date'+'Err');
	  addClas('started_date'+'Err','errorClass');
	   return false; 
	 }
	 else  if($("#expire_date").val()=="")
	 {  
	   setfocus('expire_date');
	  setMessage('expire_date'+'Err','Please enter the expire date !!');
	  fadeInfadeOut('expire_date'+'Err');
	  addClas('expire_date'+'Err','errorClass');
	   return false; 
	 }
		  
	 else
	 {
		return true; 
	 }
}