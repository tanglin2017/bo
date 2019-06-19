// JavaScript Document  
/*function Click()
{ 
	alert('技术支持(C)重庆光荣网络信息技术有限公司'); 
	window.event.returnValue=false; 
} 
document.oncontextmenu=Click; */

function $id(id)
{
  return document.getElementById(id);	
}

function CheckAll(form,ind)
{
	for(var i=0 ;i<form.elements.length;i++)
	{
		if(form.elements[i].type=="checkbox")
		{
			e=form.elements[i];
			e.checked=true;
			if (ind=="yes")
			{
				document.getElementById(e.value).disabled=false;
			}
		}
	}
}


function CheckOthers(form,ind)
{
	for (var i=0;i<form.elements.length;i++)
	{
		if(form.elements[i].type=="checkbox")
		{
			var e = form.elements[i];
				if (e.checked==false)
				{
					e.checked = true;			
					if (ind=="yes")
					{
						document.getElementById(e.value).disabled=false;
					}
				}
				else
				{
					e.checked = false;
					if (ind=="yes")
					{
						document.getElementById(e.value).disabled=true;
					}
				}
		}
	}
}

function checkpx(pxid)
{
if(document.getElementById(pxid).disabled==true)
	{
		document.getElementById(pxid).disabled=false
	}
else
	{
		document.getElementById(pxid).disabled=true
	}
}

function checkyes(form)
{	
	var a=false;
	for (var i=0;i<form.elements.length;i++)
		{
			if(form.elements[i].type=="checkbox")
				{
					if 	(form.elements[i].checked==true)
					{
					a=true	
					}
				}
		}
	if (a==false)
	{
		alert("提示：请选择要操作的数据！")
		return false
	}
	return true
}

	/*获得srcElement。兼容IE与fireFox*/
	function schTarget(evt){
	  var srcElement = evt.srcElement? evt.srcElement : evt.target; 
	  return srcElement;
	}
	
	/*获得event对象 兼容IE与fireFox*/
	function schEvent(){
	 //IE
	 if(brs()=='IE')
	   return window.event;	  
	 func=schEvent.caller;
	 while(func!=null) {
	  var arg0=func.arguments[0];  
	  if(arg0){
	    if(arg0.constructor==MouseEvent)
	    return arg0;
	  }
	  func=func.caller;
	 }
	    return null;
	}

	/*获得浏览器信息*/ 
	function brs(){
	  var userAgent=window.navigator.userAgent;
	  if (userAgent.indexOf('MSIE')>=1) {
	  	return 'IE';
	  }else if (userAgent.indexOf("Firefox")>=1){
	    return 'FF';
	  }
	  return ;
	}

	//高亮某行
	function DoHL()
	{
		//var e=window.event.srcElement;
	    var e = schTarget(schEvent());
		while (e!=null&&e.tagName!="TR"){
			e=e.parentNode;
		}
	
		  if (e!=null&&e.className!='tdbgc'){ 
		    e.className='tdbgo';
		  }
	}
	
	//低亮某行
	function DoLL()
	{
		//var e=window.event.srcElement;
	    var e = schTarget(schEvent());
	
		while (e!=null&&e.tagName!="TR"){
			e=e.parentNode;
		}
	
		if (e!=null&&e.className!='tdbgc')	e.className='tdbg';
	}
	
	
	//选中某行时变色的效果
	function DoSL()
	{
	//var TB=e=window.event.srcElement;	
	var TB=e=schTarget(schEvent());
	while (TB.tagName!="TABLE")
	{TB=TB.parentNode;}
	for (var i=0;i<TB.rows.length;i++){
		if(TB.rows[i].className=='tdbgc')TB.rows[i].className='tdbg';}
	while (e.tagName!="TR"){e=e.parentNode;}
	e.className=(e.className=='tdbgc')?'tdbg':'tdbgc';
	}
	function hL(E){
	while (E.tagName!="TR")
	{E=E.parentNode;}
	E.className="tdbgc";
	}
	
	function dL(E){
	while (E.tagName!="TR")
	{E=E.parentNode;}
	E.className="tdbg";
	}
	
function popImage(obj,img) 
{ 
	var layer = document.getElementById("popImageLayer");
	var t=obj.offsetTop;
	var l=obj.offsetLeft;
	while(obj=obj.offsetParent){
		t+=obj.offsetTop;
		l+=obj.offsetLeft;
	}
	var content ="<br><IMG src='"+img+"' onload='DrawImage(this,220,220);' border='0'   style='FILTER: alpha(opacity=10);' >"; 
			layer.innerHTML=content;
			layer.style.left =l+16;
			layer.style.top = t-10;
			layer.style.visibility='visible';
} 

	
function DrawImage(img,width,height)
	{ 
		if(DrawImage.arguments.length < 1) 
			width=height=70;
		var image=new Image(); 
		image.src=img.src; 
		if(image.width>0 && image.height>0)
		{
		  if(image.width>width)
		  {
			rate=image.height/image.width;
			newHeight=rate*width;
			img.width=width;
			img.height=newHeight;
		  } 
		}
		if(img.height>height)
		{
			rate=image.width/image.height;
			newWidth=rate*height;
			img.height=height;
			img.width=newWidth;
		}
		high(img)
	}
function highlightit(cur2)
	{
		if (cur2.filters.alpha.opacity<100)
			cur2.filters.alpha.opacity+=5
		else if (window.highlighting)
			clearInterval(highlighting)
	}

function low(which2)
	{
		clearInterval(highlighting);
		which2.filters.alpha.opacity=40;
	}

function high(which2)
	{
		theobject=which2;
		highlighting=setInterval("highlightit(theobject)",40);
	}
function hideLayer()
{	
	var layer = document.getElementById("popImageLayer");
	layer.style.visibility='hidden';
}
