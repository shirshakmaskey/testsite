// JavaScript Document
var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
var webExp = /^http:\/\/(www\.)?[a-zA-Z0-9]+\.[\.a-zA-Z0-9]+/;
var numExp = /^[0-9]+$/;
var imageExt = /\.jpg|gif|png|jpeg|JPG|GIF|PNG|JPEG/;

function togPanel(classIds){ $("#"+	classIds).slideToggle('slow');}
function toggleMyPanel(Ids){ var a = "#panelTopDown";$("#panelTopDown"+Ids).slideToggle('slow');
if(Ids==1){for(i=1;i<=4;i++){if(i!=Ids)$(a+i).hide('slow');}}
else if(Ids==2){for(i=1;i<=4;i++){if(i!=Ids)$(a+i).hide('slow');}}
else if(Ids==3){for(i=1;i<=4;i++){if(i!=Ids)$(a+i).hide('slow');}}
else if(Ids==4){for(i=1;i<=4;i++){if(i!=Ids)$(a+i).hide('slow');}}
}

function openpopup(URL) {day = new Date();id = day.getTime();eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=1,width=900,height=500,left = 237,top = 84');");}
function mover(object){if(object.className=="bgTdROne") object.className="bgTd1";if(object.className=="bgTdRTwo") object.className="bgTd2";}
function mout(object){if(object.className=="bgTd1") object.className="bgTdROne";if(object.className=="bgTd2") object.className="bgTdRTwo";}
function setfocus(getId)
{
	document.getElementById(getId).focus();
	document.getElementById(getId).className="errorInput";
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
{    $("#"+getEId).fadeOut();
	$("#"+getEId).removeClass("errorClass");
	 $('#'+getEId).text("");
	}

function addClas(getEId,classname)
{
	 $('#'+getEId).addClass(classname);
}

function remClas(getEId,classname)
{
	 $('#'+getEId).removeClass(classname);
}

function checkEmpty(getEId,errID)
{
	 if(document.getElementById(getEId).value!="")
	{ $("#"+getEId).removeClass("errorInput");
	 remove(errID);
	}
}