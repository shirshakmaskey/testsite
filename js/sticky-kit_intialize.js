// JavaScript Document
(function() {
    var win = $(window);
    var sizes = {
      half: 1,
      full: 2,
      threequarter: 3/4,
      onefive: 1.5,
      "double": 2,
      triple: 3
    }
    for (k in sizes) {
      var v = sizes[k]
      $("." + k).css({
       height: Math.floor(win.height() * v) + "px"
      });
    }
	
	var left_height   = $("#side-bar").height();
	var right_height  = $("#content-right").height();
	$("#side-bar").css({height: left_height + "px" });
	$("#content-right").css({height: right_height + "px" });
	if(	$("body").width() >= 754){
    $("#main-content .item_blocks").stick_in_parent();}
  })();