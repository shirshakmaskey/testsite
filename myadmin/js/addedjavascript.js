// JavaScript Document

//START HELP BALLONS VIDEO WALL
if($(".helptext")){//if1 start
$(".helptext").mousemove(
		function(e)
		{
				if($("#helpballoon").size()>0)
				{
				t=(e.pageY-$("#helpballoon").height()-5)+"px";//(t-tup)+"px";
				l=(e.pageX-13)+"px";//(l+lft+$(this).width())/2+"px";
				
				$("#helpballoon").css({top:t,left:l,visibility:"visible"});
				}
		}
);

	$(".helptext").hover(
		function(e)
		{

			if($(this).attr("help_text"))
			{

				offset=$(this).offset();
				t=offset.top
				l=offset.left

				if($("#helpballoon").size()==0)
					$(this).append("<div id='helpballoon' style='position:absolute;visibility:hidden;opacity:.8;'>"
								 +"<table width='200'  border='0' cellspacing='0' cellpadding='0' style='margin-bottom:-2px;'>"   
  +" <tr valign='top'>"    
    +" <td bgcolor='#FF6600' style='align:left;padding:5px;'>"+$(this).attr("help_text")+"</td>"    
   +"</tr>"  
 +"</table>"

											 +"</div>");
				//triangle_html="<div class='triangle'><img src='../images/images_modified/video_wall_arrow.gif' style='margin-top:10px' /></div>"
				//$("#helpballoon").html($(this).attr("help_text")+triangle_html);
					
				$("#helpballoon").fadeTo('fast',0.8);

var tup;
var lft;
				if($.browser.msie)
				    {       tup=-20;
							lft=100;
						}else
						{   
							tup=0;
							lft=300;
							}
				
				t=(t-tup)+"px"; // t=e.pageY+"px";
				l=(l+lft+$(this).width())/2+"px";//e.pageX+"px";
				$("#helpballoon").css({top:t,left:l,visibility:"visible"});
				//alert(t);

			}	
		},
		function()
		{
			if($("#helpballoon").size()>0)
				$("#helpballoon").replaceWith("");//.css({visibility:"hidden"});

		}

	)
}//if1 end
//END HELP BALLON