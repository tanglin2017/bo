﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="js/jquery.js"></script>
<script type="text/javascript">
$(function(){	
	//顶部导航切换
	$(".nav li a").click(function(){
		$(".nav li a.selected").removeClass("selected")
		$(this).addClass("selected");
	})	
})	
</script>


</head>

<body style="background:url(images/topbg.gif) repeat-x;">

    <div class="topleft">
    <a href="main.php" target="_parent"><img src="images/logo.png" title="系统首页" /></a>
    </div>      
    <div class="topright">    
    <ul>
    <li><a href="../index.php" target="_blank">网站首页</a></li>
    <li><a href="admin_logout.php">重新登录</a></li>
    <li><a href="admin_logout.php">退出系统</a></li>
    </ul>
     
    <div class="user">
    <span><?php echo ($_COOKIE["usernames"]);?></span>
    </div>    
    
    </div>
</body>
</html>
