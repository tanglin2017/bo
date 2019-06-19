<?php 
include('../init.php');
if (!isset($_COOKIE["usernames"]) || $_COOKIE["usernames"] == '' || $_COOKIE["yzgrwl"] != "yz123grwl" )
{ 
  msgbox("错误:你未登录或登录已超时!", "parent.location='../login.php';");
}
$act = isset($_POST['act']) ? $_POST['act'] : $_GET['act'];
$opid = isset($_POST['id']) ? $_POST['id'] : $_GET['id'];
switch($act)
{
	case 'del':
		if(is_array($opid)) $opid = implode(',', $opid); 
		if($opid != '')
		{
			  $opid = str_replace(" ", "", $opid);	  
			  $sql = "delete from book where id in($opid)";
			  $db->query($sql, false);
			  msgbox("操作成功!", "location='default.php';");  
		}
		break;    
   default:
     exit("<script>alert('No action Request!');history.back();</script>");

}
msgbox("成功操作!", "parent.location.reload(1);");  
?>