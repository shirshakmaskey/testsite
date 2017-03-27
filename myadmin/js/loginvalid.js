// JavaScript Document
function checklogin()
{
     if(document.getElementById('username').value=="")
	 {  
	   setfocus('username');
	   setMessage('loginerr','Please enter the Username !!');
	  fadeInfadeOut('loginerr');
	  addClas('loginerr','loginerror');
		return false; 
	 }
	 
	 else if(document.getElementById('password').value=="")
	 {  
	   setfocus('password');
	  setMessage('loginerr','Please enter the Password !!');
	  fadeInfadeOut('loginerr');
	  addClas('loginerr','loginerror');
	   return false; 
	 }
	 
	 else if(document.getElementById('group').value=="-1")
	 {  
	  setMessage('loginerr','Please select the group !!');
	  fadeInfadeOut('loginerr');
	  addClas('loginerr','loginerror');
	  return false; 
	 }
	 else
	 {
		return true; 
	 }
}

function msover(object)
{
	if(object.className=='transparent')
	    object.className='showHover'
}
function msout(object)
{		if(object.className=='showHover')
	    object.className='transparent'
}


function setfocus(getId)
{
	document.getElementById(getId).focus();
}
function setMessage(getEId,msg)
{
	document.getElementById(getEId).innerHTML=msg;
}

function fadeInfadeOut(getEId)
{
	 $('#'+getEId).fadeOut(500).fadeIn(500).fadeOut(400).fadeIn(400).fadeOut(300).fadeIn(300);
}

function remove(getEId)
{    $('#'+getEId).removeClass('loginerror');
	 $('#'+getEId).text("Login Section");
}

function addClas(getEId,classname)
{
	 $('#'+getEId).addClass(classname);
}