<?php 
include('init.php');
if ($_COOKIE["usernames"] == '' || $_COOKIE["yzgrwl"] != "yz123grwl" ) msgbox("错误:你未登录或登录已超时!", "parent.location='login.php';");

if(isset($_POST['act']) && $_POST['act'] == 'save')
{
		$username=trim($_POST["username"]);
		$password=trim($_POST["password"]);
		$password1=trim($_POST["password1"]);
		$password2=trim($_POST["password2"]);
		
		if ($password == "" ) msgbox("错误:原密码书写不正确!", "location='admin_update.php'");
		if ($username == "" || strlen($username) < 6) msgbox("错误:新用户名为空或小于6位!", "location='admin_update.php'");
		if ($password1 == "" || strlen($password1) < 6) msgbox("错误:新密码为空或小于6位!", "location='index.php'");
		if ($password1 != $password2 ) msgbox("错误:两次输密码不一致!", "location='admin_update.php'");		
		
		$sql="select * from master where username='". daddslashes($_COOKIE['usernames']) ."' and password='".md5($password)."'";
		
		$query = $db->query($sql);
		if (!$query->num_rows()) msgbox("提示:原密码错误!", "location='index.php");
	
		$data = array(
			 'username' => $username,
			 'password' => md5($password1) 
		);
		$db->update('master', $data,"username='".daddslashes($_COOKIE['usernames'])."'" );
		setcookie("usernames","");
		setcookie("yzgrwl",""); 
		msgbox("修改成功，请重新登录!", "parent.location='login.php';");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>



	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="main.php">首页</a></li>
    </ul>
    </div>
    
    <div class="formbody">
    
    <div class="formtitle"><span>管理员帐号密码修改</span></div>
    
	<form name="form1" method="post" action="">
    <input name="act" type="hidden" value="save"/>
    <ul class="forminfo">
    <li><label>原用户名</label><input value="<?php echo $_COOKIE['usernames']; ?>" type="text" class="dfinput" style=" border:0px; color:#FF0000;" readonly="readonly"/></li>
	<li><label>原密码</label><input name="password" type="password" class="dfinput" /></li>
    <li><label>新用户</label>
	<input name="username" type="text" id="username" class="dfinput" />
	</li>
   
    <li><label>新密码</label><input name="password1" type="password"  class="dfinput" /></li>
	<li><label>确认密码</label><input name="password2" type="password" class="dfinput" value="" /></li>
    <li><label>&nbsp;</label><input name="" type="submit" class="btn" value="保存"/>
	 <input name='Cancel' type='button' id='Cancel' value=' 取 消 ' class="btn" onClick="window.location.href='main.php';" style='cursor:hand;'/>
	</li>
    </ul>
	</form>
    
    
    </div>
</body>
</html>
