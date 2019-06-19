<?php
include "init.php";
if (!isset($_COOKIE["usernames"]) || $_COOKIE["usernames"] == '' || $_COOKIE["yzgrwl"] != "yz123grwl" )
{ 
  msgbox("错误:你未登录或登录已超时!", "parent.location='login.php';");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.js"></script>

</head>
<Script Language=javascript>  
function Click(){ 
alert('网站后台　'); 
window.event.returnValue=false; 
} 
document.oncontextmenu=Click; 
</Script> 
<style>
body{font:14px '微软雅黑';}
#box{width:100%;margin:0px auto;}
.webhost{color: rgb(255, 0, 0);font-family: "黑体";font-size: 36px;font-weight: bold;padding: 10px;margin-bottom:20px;}
#tab{margin:0px auto;border-collapse:collapse;}
#tab tr td{border:1px solid rgb(163, 186, 233);padding:5px;text-align:left;}
#tab .title{width:200px;}
#tab .nr{width:500px;}
#box .movie-time{margin:12px auto;}
#box .technology-support{color:#ccc;}
</style>
<body>

	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="main.php">首页</a></li>
    </ul>
    </div>
    
    <div class="mainindex">
    
    
    <div class="welinfo" style="height:42px;">
    <b><?php echo ($_COOKIE["usernames"]);?><script language="javaScript">
now = new Date(),hour = now.getHours()
if (hour<06) {document.write("凌晨好！")}
else if (hour<08) {document.write("早上好！")}
else if (hour<12) {document.write("上午好！")}
else if (hour<14) {document.write("中午好！")}
else if (hour<17) {document.write("下午好！")}
else if (hour<22) {document.write("晚上好！")}
else {document.write("夜里好！")}
</script>，欢迎使用后台管理系统</b>
   
    </div>
    
	 <?php
        $sql = "select * from master where username = '" . $_COOKIE["usernames"] . "'";
        $query = $db->query($sql);
        if ($query->num_rows() == 0) {
           msgbox("错误:没有该会员信息!", "BACK");
        }
        $result = $query->row();
        ?>	
	
    <div class="welinfo">
    <span><img src="images/time.png" alt="时间" /></span>
    <i>您上次登录的时间：<?php echo date("Y-m-d H:i:s", $result->last_login); ?></i>
    </div>
    
    <div class="xline"></div>
    
 	<div class="webhost" style="text-align:center"><?php echo @getenv("SERVER_NAME");?></div>
	<table id="tab" cellspacing="0" cellpadding="0" border="0">
		<tr bgcolor=#FFFFFF onMouseOver="this.bgColor='#DFDFDF';" onMouseOut="this.bgColor='#FFFFFF';">
            <td class="title">&nbsp;服务器语言环境</td>
            <td class="nr">&nbsp;<?php echo @getenv("HTTP_ACCEPT_LANGUAGE");?></td>
          </tr>
          <tr bgcolor=#FFFFFF onMouseOver="this.bgColor='#DFDFDF';" onMouseOut="this.bgColor='#FFFFFF';">
            <td>&nbsp;服务器域名</td>
            <td>&nbsp;<?php echo @getenv("SERVER_NAME");?></td>
          </tr>
          <tr bgcolor=#FFFFFF onMouseOver="this.bgColor='#DFDFDF';" onMouseOut="this.bgColor='#FFFFFF';">
            <td>&nbsp;服务器ip地址</td>
            <td>&nbsp;<?php echo @getenv("SERVER_ADDR");?></td>
          </tr>
          <tr bgcolor=#FFFFFF onMouseOver="this.bgColor='#DFDFDF';" onMouseOut="this.bgColor='#FFFFFF';">
            <td>&nbsp;服务器端口</td>
            <td>&nbsp;<?php echo @getenv("SERVER_PORT");?></td>
          </tr>
          <tr bgcolor=#FFFFFF onMouseOver="this.bgColor='#DFDFDF';" onMouseOut="this.bgColor='#FFFFFF';">
            <td>&nbsp;服务器时间</td>
            <td>&nbsp;<?php echo date("Y年m月d日 h:i:s",time());?></td>
          </tr>
          <tr bgcolor=#FFFFFF onMouseOver="this.bgColor='#DFDFDF';" onMouseOut="this.bgColor='#FFFFFF';">
            <td>&nbsp;服务器系统</td>
            <td>&nbsp;<?php echo PHP_OS;?></td>
          </tr>
          <tr bgcolor=#FFFFFF onMouseOver="this.bgColor='#DFDFDF';" onMouseOut="this.bgColor='#FFFFFF';">
            <td>&nbsp;服务器解译引擎</td>
            <td>&nbsp;<?php echo @getenv("SERVER_SOFTWARE");?></td>
          </tr>
          <tr bgcolor=#FFFFFF onMouseOver="this.bgColor='#DFDFDF';" onMouseOut="this.bgColor='#FFFFFF';">
            <td>&nbsp;服务端通信协议</td>
            <td>&nbsp;<?php echo @getenv("server_protocol");?></td>
          </tr>
          <tr bgcolor=#FFFFFF onMouseOver="this.bgColor='#DFDFDF';" onMouseOut="this.bgColor='#FFFFFF';">
            <td>&nbsp;服务端管理员邮箱</td>
            <td>&nbsp;<?php echo @getenv("SERVER_ADMIN");?></td>
          </tr>
	</table>
	<div class="movie-time" style="text-align:center; padding-top:30px;">
		<font face="Arial, Helvetica, Sans Serif" size="3" color="#999999"><b>
		  <font id="localtime" style="padding-right:10px;"></font> 
		   </font>	
	</div>
	<div class="technology-support" style="text-align:center; padding-top:15px;">网站后台&#8482;</div>
    
    
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
	if  ( ww==0 )  colorhead="<font color=\"#333333\">";
	if  ( ww > 0 && ww < 6 )  colorhead="<font color=\"#333333\">";
	if  ( ww==6 )  colorhead="<font color=\"#333333\">";
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
