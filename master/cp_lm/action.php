<?php 
include('../init.php');
include('../models/cp_lm.php');
if (!isset($_COOKIE["usernames"]) || $_COOKIE["usernames"] == '' || $_COOKIE["yzgrwl"] != "yz123grwl" )
{ 
  msgbox("错误:你未登录或登录已超时!", "parent.location='../login.php';");
}
$act = isset($_POST['act']) ? $_POST['act'] : $_GET['act'];

switch($act)
{
   case 'save':
		$news = new cp_lm();
		$news->get_form_data();
                
		if(isset($_POST['id']) && ctype_digit($_POST['id']))
		{
		     if($_POST['id'] == $_POST['fid']) msgbox("父栏目不能是自己!", "BACK");
                     
			 $news->save($_POST['id'], 'id_lm'); 
			 msgbox("成功修改!", "location='default.php';");  
        }
		else
		{
		     $news->save();   
			 print("<script language=javascript>if (confirm('栏目添加成功,确定要继续添加吗?')) {location='add.php';} else {location='default.php';}</script>");	
			 break;	
		}
		
   case 'del':
		$id = $_GET["id"];
		if ($id == "" || !ctype_digit($id)) msgbox("参数错误!", "BACK");  
		/**
		 * 删除栏目及其子栏目 属于该栏目信息以及子栏目信息 以及图片
		 */
		$dels = $id;
		$childs = get_child($id);
		if($childs)
		{
		   $dels .= ',' . implode(",", $childs);
		}
		$sql = "delete from cp_lm where id_lm in($dels)";
		$db->query($sql);
		
		$sql = "select img_sl from cp_co where lm in($dels)";
		$result = $db->query($sql)->result();
		foreach ($result as $rs)
		{
			if ($rs->img_sl <> '' &&  file_exists(ROOT_PATH.$rs->img_sl)) unlink(ROOT_PATH.$rs->img_sl);
		}
		$sql = "delete from cp_co where lm in($dels)";
		$db->query($sql);
		msgbox("删除成功!", "location='default.php';");  
		break;
	    
   default:
     exit('No action Request!');

}

function get_child($fid)
{
	static $child = array();
	global  $db;
	$sql = "select id_lm from cp_lm where fid=$fid";
	$result = $db->query($sql)->result('array');
	foreach ($result as $rs){
		$child[] = $rs['id_lm'];
		get_child($rs['id_lm']);
		
	}
	return $child;
	
}
?>