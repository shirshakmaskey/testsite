//datetime.js
function dateTimeShow(){var today  =  new Date();var hh =  today.getHours();var mm     =  today.getMinutes();var ss     =  today.getSeconds();mm   =   checkTimes(mm);ss   =   checkTimes(ss);if(hh<12)
{ var amPm = "AM"; } else { var amPm = "PM";}document.getElementById('headerdatetime').innerHTML= hh + ":" +mm+":"+ss+" "+ amPm;  setTimeout("dateTimeShow()",500);}
function checkTimes(i){  if(i<10)  return "0"+i;  else  return i; }

//document.js
$(document).ready( function(){
dateTimeShow();/*if($("#searchTxt").val()=="") {  $("#searchTxt").val('Search here..'); }	$("#searchTxt").focus(function (){ searchCheck(); });*/$("#parent_checkbox").click(function(){	 checkTheCheckBox(); });
if($("#messageDiv1").is(":visible")){
   $("#messageDiv1").fadeOut(500).fadeIn(500).delay(2000).fadeOut(500); 	
}
/*===================fOR THE HOVER TOOLTOPS======================== */
$("body").append("<div id='ToolTipDiv'></div>");
 // $("a[title]").each(function() {
$(".bgTdROne,.bgTdRTwo,.albumdiv").each(function(){
});/*===================fOR THE HOVER TOOLTOPS======================== */
$('.bgTdROne,.bgTdRTwo,.albumdiv').tooltip({html:true,animation:true});					   

}); /* document ready close  */
 
function setValueInSearch(){if($("#searchTxt").val()==""){$("#searchTxt").val('Search here..'); }} 
function searchCheck(){	if($("#searchTxt").val()=="Search here.."){$("#searchTxt").val('');}}
function checkTheCheckBox(){var theFormElementChekedboxLength  =  document.getElementsByName('checkbox_child[]').length;for(i=0; i<theFormElementChekedboxLength; i++){if(document.getElementById("parent_checkbox").checked==true)document.getElementById("checkbox_child_"+i).checked=true;else document.getElementById("checkbox_child_"+i).checked=false;}}
function checkIfAnyCheckBoxChecked(){var theFormElementChekedboxLength  =  document.getElementsByName('checkbox_child[]').length;	var countCheckBox  =  0;for(i=0; i<theFormElementChekedboxLength; i++){ if(document.getElementById("checkbox_child_"+i).checked==true){ countCheckBox++; }}if(countCheckBox>0) {return true; }else{alert('Please select atleast one checkbox!!');return false;}}

function checkTheCheckBoxPermission(iD){var FormElementChekedboxLength  =  document.getElementsByName('selectedParent'+iD+'[]').length;for(i=0; i<FormElementChekedboxLength; i++){ if(document.getElementById("parent_checkbox"+iD).checked==true){
document.getElementById("child_checkbox"+iD+"_"+i).checked=true;
        }
		else{
		document.getElementById("child_checkbox"+iD+"_"+i).checked=false;
		}
}// for loop

var theFormElementChekedboxLength  =  document.getElementsByName('selected'+iD+'[]').length;for(i=0; i<theFormElementChekedboxLength; i++){ if(document.getElementById("parent_checkbox"+iD).checked==true){
document.getElementById("child_box"+iD+"_"+i).checked=true;
        }
		else{
		document.getElementById("child_box"+iD+"_"+i).checked=false;
		}
}// for loop

}//function close checkTheCheckBoxPermission	


//datetime.js
function setHourglass()
{ document.body.style.cursor = 'wait'; }
function hideThisMessage()
{
   $("#globalErrorMessageDiv").fadeOut('slow');
}

<!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
//-->


function create_editor(base_url,editor_arr)
{   if(editor_arr.length>0){
	for(var i in editor_arr){ 
		CKEDITOR.replace( editor_arr[i],
		{   extraPlugins : 'autogrow',
			autoGrow_maxHeight : 800,
			// Remove the Resize plugin as it does not make sense to use it in conjunction with the AutoGrow plugin.
			removePlugins : 'resize',
			filebrowserBrowseUrl : base_url+'ckfinder/ckfinder.html',
			filebrowserImageBrowseUrl : base_url+'ckfinder/ckfinder.html?Type=Images',
			filebrowserFlashBrowseUrl : base_url+'ckfinder/ckfinder.html?Type=Flash',
			filebrowserUploadUrl : base_url+'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
			filebrowserImageUploadUrl : base_url+'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
			filebrowserFlashUploadUrl : base_url+'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
		});
		/* For Read More*/
		var element = CKEDITOR.document.getById('readMore');
		if(element){
		element.on('click',function(ev){
			var data = CKEDITOR.instances[editor_arr[i]].getData();
			if(data.match(/<hr id="system_readmore" style="border-style: dashed; border-color: orange;" \/>/g)){
				showMessage('info','Action already exists.');		
				return false;
			} else {
				CKEDITOR.instances[editor_arr[i]].insertHtml('<hr id="system_readmore" style="border-style: dashed; border-color: orange;" />'); 
			}		
		});	
	  }
	}
   }	
}

function showMessage(mode,msg){	
	switch(mode){
		case 'success': // Success message
		messsage_class = 'alert-success alert-dark';
		message_icon = 'fa-check';
		break;
		case 'info': // Information message
		messsage_class = 'alert-info alert-dark';
		message_icon = 'fa-info';
		break;

		case 'warning': // Warning Message
		messsage_class = 'alert-warning alert-dark';
		message_icon = 'fa-bullhorn';
		break;

		case 'error': // Error Message
		messsage_class = 'alert-danger alert-dark';
		message_icon = 'fa-exclamation-triangle';
		break;
		default:
		messsage_class = 'alert-info alert-dark';
		message_icon = 'fa-info';        
	}
	var message = '<div class="alert '+messsage_class+'"><i class="fa '+message_icon+'"></i>&nbsp;'+msg+'<button class="close" type="button" data-dismiss="alert">×</button>Status has been changed!</div>';
		$(message).prependTo('#message').fadeIn(500,function(){$('.alert').fadeOut(5000)});
        $("html, body").animate({scrollTop: 0}, "slow");
}