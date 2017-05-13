$(document).ready( function()
{   dateTimeShow();	
	if($("#searchTxt").val()=="")
	 {  $("#searchTxt").val('Search here..'); }
	
	
	$("#searchTxt").focus(function ()
		{	 searchCheck(); 	});
	
    $("#parent_checkbox").click(function()
										 {
										 checkTheCheckBox();	 
										 });
	
	
	

	
	/*===================fOR THE HOVER TOOLTOPS======================== */
	$("body").append("<div id='ToolTipDiv'></div>");
 // $("a[title]").each(function() {
							  $(".bgTdROne,.bgTdRTwo,.albumdiv").each(function() {
    $(this).hover(function(e) {
      $().mousemove(function(e) {
        var tipY = e.pageY + 16;
        var tipX = e.pageX + 16;
        $("#ToolTipDiv").css({'top': tipY, 'left': tipX});
      });
      $("#ToolTipDiv")
        .html($(this).attr('title'))
        .stop(true,true)
        .fadeIn("fast");
      $(this).removeAttr('title');
    }, function() {
      $("#ToolTipDiv")
        .stop(true,true)
        .fadeOut("fast");
      $(this).attr('title', $("#ToolTipDiv").html());
    });
  });
	
	
	
	/*===================fOR THE HOVER TOOLTOPS======================== */
	
	
	
	}); /* document ready close  */
 function setValueInSearch()
 {
	if($("#searchTxt").val()=="")
	 {  $("#searchTxt").val('Search here..'); } 
 }
 
 
function searchCheck()
{
	if($("#searchTxt").val()=="Search here..")
	   { $("#searchTxt").val(''); }
	   
   
}


function checkTheCheckBox()
{
	var theFormElementChekedboxLength  =  document.getElementsByName('checkbox_child[]').length;
	
	for(i=0; i<theFormElementChekedboxLength; i++)
	 {    
	 if(document.getElementById("parent_checkbox").checked==true)
	   document.getElementById("checkbox_child_"+i).checked=true; 
	   else
	   document.getElementById("checkbox_child_"+i).checked=false;
	 }	
}

function checkIfAnyCheckBoxChecked()
{
	var theFormElementChekedboxLength  =  document.getElementsByName('checkbox_child[]').length;
	var countCheckBox  =  0;
	for(i=0; i<theFormElementChekedboxLength; i++)
	 {    
	   if(document.getElementById("checkbox_child_"+i).checked==true)
	   { countCheckBox++;  }
	   
	 }	
	 if(countCheckBox>0)
	 { document.getElementById('formDisplay').submit();
	 return true;
	 }
	 else
	 {
		 alert('Please select atleast one checkbox!!');
		return false; 
	 }
	 
}

