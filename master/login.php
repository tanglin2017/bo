<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>欢迎登录后台管理系统</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="js/jquery.js"></script>
<script src="js/cloud.js" type="text/javascript"></script>

<script language="javascript">
	$(function(){
    $('.loginbox').css({'position':'absolute','left':($(window).width()-692)/2});
	$(window).resize(function(){  
    $('.loginbox').css({'position':'absolute','left':($(window).width()-692)/2});
    })  
});  
</script> 


<Script Language=javascript>  
function Click(){ 
alert('网站后台'); 
window.event.returnValue=false; 
} 
document.oncontextmenu=Click; 
</Script> 

<style type="text/css">
dl,dt,dd,span{margin:0;padding:0;display:block;}
</style>

</head>

<body style="background-color:#1c77ac; background-image:url(images/light.png); background-repeat:no-repeat; background-position:center top; overflow:hidden;">



    <div id="mainBody">
      <div id="cloud1" class="cloud"></div>
      <div id="cloud2" class="cloud"></div>
    </div>  


<div class="logintop">    
    <span>欢迎登录网站后台管理界面平台</span>    
    <ul>
    <li style="color:#FFFFFF">
	
	今天是：<font id="localtime" style="padding-right:10px;"></font>
	<script language="javaScript">
now = new Date(),hour = now.getHours()
if (hour<06) {document.write("凌晨好！")}
else if (hour<08) {document.write("早上好！")}
else if (hour<12) {document.write("上午好！")}
else if (hour<14) {document.write("中午好！")}
else if (hour<17) {document.write("下午好！")}
else if (hour<22) {document.write("晚上好！")}
else {document.write("夜里好！")}
</script>
     </li>
    </ul>    
    </div>
    
    <div class="loginbody">
    
    <span class="systemlogo"></span> 
     
	 <FORM onSubmit="return CheckBookForm();" method=post name=guestbookform action=admin_login.php>
    <div class="loginbox">
    <ul>
    <li><input name="username" type="text" id="username" class="loginuser" value=""/></li>
    <li><input name="password" type="password" id="password" class="loginpwd" value=""/></li>
	<li><input name="Verify" type="text" class="loginyz" value=""/>
	
	<a id="verify_change" title="验证码" style="display:inline-block;vertical-align:bottom;"><img  style="width:77px;height:38px;" id='imgCode' src='libraries/Verify.php' onclick='refVerify()' style='cursor:pointer;'></a>
	
	
	</li>
	
	
    <li><input name="" type="submit" class="loginbtn" value="登录"   /></li>
    </ul>
    </div>
	</form>
    
	
	<script Language="javascript">  
		
		function CheckBookForm(){
		
		if(document.guestbookform.username.value.length == 0){
		
		alert("请填写用户名");
		
		document.guestbookform.username.focus();
		
		return false;
		
		}
		
		if(document.guestbookform.password.value.length == 0){
		
		alert("请填写密码");
		
		document.guestbookform.password.focus();
		
		return false;
		
		}
		
		if(document.guestbookform.Verify.value.length == 0){
		
		alert("请填写验证码");
		
		document.guestbookform.Verify.focus();
		
		return false;
		
		}   
		
		}
		
		
		function refVerify()

                {

                    imgCode = document.getElementById('imgCode');

                    pathstring = "../master/libraries/Verify.php?rnd="+RndNum(6); 

                    imgCode.setAttribute('src',pathstring);

                }



                function RndNum(n)

                {

                    var rnd="";

                    for(var i=0;i<n;i++)

                    {

                        rnd+=Math.floor(Math.random()*10);

                    }

                    return rnd;

                }

		
		</script>

	
    </div>
    
    
	
	<script type="text/javascript">
function showLocale(objD)
{
	var str,colorhead,colorfoot;
	var yy = objD.getYear();
	if(yy<1900) yy = yy+1900;
	var MM = objD.getMonth()+1;
	if(MM<10) MM = '0' + MM;
	var dd = objD.getDate();
	if(dd<10) dd = '0' + dd;
	var hh = objD.getHours();
	if(hh<10) hh = '0' + hh;
	var mm = objD.getMinutes();
	if(mm<10) mm = '0' + mm;
	var ss = objD.getSeconds();
	if(ss<10) ss = '0' + ss;
	var ww = objD.getDay();
	if  ( ww==0 )  colorhead="<font color=\"#FFFFFF\">";
	if  ( ww > 0 && ww < 6 )  colorhead="<font color=\"#FFFFFF\">";
	if  ( ww==6 )  colorhead="<font color=\"#FFFFFF\">";
	if  (ww==0)  ww="星期日";
	if  (ww==1)  ww="星期一";
	if  (ww==2)  ww="星期二";
	if  (ww==3)  ww="星期三";
	if  (ww==4)  ww="星期四";
	if  (ww==5)  ww="星期五";
	if  (ww==6)  ww="星期六";
	colorfoot="</font>"
	str = colorhead + yy + "年" + MM + "月" + dd + "日 " + hh + ":" + mm + ":" + ss + "  " + ww + colorfoot;
	return(str);
}
function tick()
{
	var today;
	today = new Date();
	document.getElementById("localtime").innerHTML = showLocale(today);
	window.setTimeout("tick()", 1000);
}
tick();
</script>
</body>
</html>
