$(document).ready(function(){
						   
   $(".main ul span").click(function(){
	
	  var meunitem = $(this).next();
	  meunitem.toggle(300);
	  changeBg($(this));								 
   });						   
});

function changeBg(nowNode)
{
	
   if (nowNode)	{
		 if (nowNode.css("background-image").indexOf('title_bg_show.gif') == -1) {
			nowNode.css("background-image","url('images/title_bg_show.gif')");
		 } else {
			nowNode.css("background-image","url('images/title_bg_hide.gif')");  
		 }
   }
}