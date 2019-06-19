<?php
session_start();
include "init.php";

$verify = strtolower(trim($_POST["Verify"]));
$username = trim($_POST["username"]);
$password = trim($_POST["password"]);

if (trim($_SESSION['Verify']) != md5($verify))
{
   msgbox("验证码错误！", "parent.location='login.php';");
}

if ($username=='' || $password == '')
{
   msgbox("用户或者密码错误！", "parent.location='login.php';");
}

$sql="select * from master where username='". daddslashes($username)."'";
$query = $db->query($sql);

if($query->num_rows() < 1) 
{
  msgbox("用户名不存在！", "parent.location='login.php';");
}
$result = $query->row();
if ($result->password == md5($password))
{
	 //更新最后一次登录时间、登录ip和登录次数
    $sqls = "update master set last_login='" . time() . "',last_ip='" . get_ip() . "' where username='" . $username . "'";
    $db->query($sqls);
	setcookie ("usernames",$username);
	setcookie ("yzgrwl","yz123grwl");
    msgbox("成功登录网站管理系统！", "parent.location='index.php';");
}
else
{
	msgbox("用户密码错误！", "parent.location='login.php';");
}
?>