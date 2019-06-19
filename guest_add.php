<?php
@header("Content-Type:text/html; charset=utf-8");
include ("master/init.php");?>
<?php
session_start();
//获取参数
$name=trim(strip_tags($_POST["name"]));
$company=trim(strip_tags($_POST["company"]));
$email=trim(strip_tags($_POST["email"]));
$tel=trim(strip_tags($_POST["tel"]));
$address=trim(strip_tags($_POST["address"]));
$body=trim(strip_tags($_POST["body"]));
$wtime=strtotime(date("Y-m-d H:i:s"));
$ip=  get_ip();

if($tel==null){
    exit("<script>alert('添加留言失败！');history.back();</script>");
}
//判断邮箱格式是否正确
if(!empty($email)){
    if(!is_mail($email)){
        exit("<script>alert('邮箱格式错误！');history.back();</script>");
    }
}
$dayMax = 10; // 每天同一IP最多可以留言条数
$num = 0;
    if (! isset($_COOKIE['addbook'])) {
        $dayStart = date("Y-m-d H:i:s", mktime(0,0,0));
        $dayEnd = date("Y-m-d 23:59:59");
        $sql = "SELECT COUNT(*) as `count` FROM `book` WHERE `ip`='$ip' AND `wtime` >= '$dayStart'";
        $result=mysql_query($sql);
        if (! empty($result)) {
            $count = mysql_fetch_array($result);
            $num = $count['count'];
        }
    } else {
        $num = (int)$_COOKIE['addbook'];
    }
    if ((int)$num >= $dayMax) {
        setcookie("addbook", $num, mktime(23, 59, 59), "/", ".cqxinyou.net");
        exit("<script>alert('禁止刷新！');history.back();</script>");
    }
$sql="insert into book(id_re,name,tel,wtime,ip,pass,huifu,chakan,body,company,email,address) values('0','$name','$tel','$wtime','$ip','0','0','0','{$body}','{$company}','{$email}','{$address}')";
//echo $sql;exit;
$result=  mysql_query($sql);
if(!$result){
        exit("<script>alert('添加留言失败！');history.back();</script>");
    }
    setcookie("addbook", $num + 1, mktime(23, 59, 59), "/", ".cqxinyou.net");
msgbox("留言提交成功！","parent.location='contact.php'");
exit();
?>

