<?php 
include('../init.php');
include('../models/book.php');
include('../libraries/Image.php');
if (!isset($_COOKIE["usernames"]) || $_COOKIE["usernames"] == '' || $_COOKIE["yzgrwl"] != "yz123grwl" )
{ 
  msgbox("错误:你未登录或登录已超时!", "parent.location='../default.php';");
}
$act = isset($_POST['act']) ? $_POST['act'] : $_GET['act'];
$opid = isset($_POST['id']) ? $_POST['id'] : $_GET['id'];
//echo $act,$opid;exit;
switch($act)
{
    case 'save':
		$news = new Book();
		$news->get_form_data();	
		if(isset($_POST['id']) &&  $_POST['id']=="")
		{       //直接回复
                        $reid=$_POST["reid"];
                        $body=$_POST["body"];
                        $wtime=strtotime(date("Y-m-d H:i:s"));
			$sql="insert into book (id_re,body,wtime,huifu) values('$reid','$body','$wtime',1)";
                        $db->query($sql,false);
			 msgbox("回复成功!", "location='default.php';");
                         break;
                }
		else if(isset($_POST['id']) && ctype_digit($_POST['id']) &&$_POST['id']!="")
		{       
                        //修改回复
                        $id=$_POST["id"];
                        $body=$_POST["body"];
                        $sql="update book set body='".$body."' where id=".$id."";
                        //echo $sql;exit;
                        $db->query($sql,false);
			msgbox("修改回复成功!", "location='default.php';");  
			 break;	
		}
		
	case 'ping1':
		if($opid != '' && ctype_digit($opid))
		{
			$sql="update book set pass=0 where id=".$opid."";
			$db->query($sql,false);
		}
		break;  
	case 'ping2':
		if($opid != '' && ctype_digit($opid))
		{   
			$sql="update book set pass=1 where id=".$opid."";
                        //echo $sql;exit;
			$db->query($sql,false);
		}
		break; 
	case 'del':
		if(is_array($opid)) $opid = implode(',', $opid); 
		if($opid != '')
		{
			  $opid = str_replace(" ", "", $opid);	  
			  $sql = "delete from book where id in($opid)";
			  $db->query($sql, false);
		}
		break;    
   default:
     exit("<script>alert('No action Request!');history.back();</script>");

}
msgbox("成功操作!", "parent.location.reload(1);");  
?>