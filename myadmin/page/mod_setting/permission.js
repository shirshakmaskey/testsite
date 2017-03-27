// JavaScript Document
function loadTheUser(groupId)
{ $("#userPermissionTable").hide(); 
 if(groupId!=""){
	$.ajax({   type: "GET",
		   url: "page/mod_setting/loadUserDrop.php",
		   data: { firstId:groupId},
		   success: function(msg){ 	
		   if(msg){
			   $("#loadUserDiv").html(msg);
			   }//msg
		   },
                error:function (xhr, ajaxOptions, thrownError){
                    alert(xhr.status);
                    alert(thrownError);
                }   			 				
		   });
    }
}