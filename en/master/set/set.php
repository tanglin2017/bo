<?php 
include('../init.php');
if (!isset($_COOKIE["usernames"]) || $_COOKIE["usernames"] == '' || $_COOKIE["yzgrwl"] != "yz123grwl" )
{ 
  msgbox("错误:你未登录或登录已超时!", "parent.location='../default.php';");
}


if(isset($_POST['act']) && $_POST['act'] == 'save')
{
		$title=trim($_POST["title"]);
		$keywords=trim($_POST["keywords"]);
		$description=trim($_POST["description"]);
		$record=trim($_POST["record"]);		
		$record_url=trim($_POST["record_url"]);		
		$copyright=trim($_POST["copyright"]);		
		
		
		$sql = "update `set` set title='$title',keywords='$keywords',description='$description',record='$record',copyright='$copyright',record_url='$record_url' where id='1' order by id desc limit 1";
		 $result = mysql_query($sql);
		
		msgbox("操作成功!", "location='set.php';");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>

<?php 
$sql = "SELECT * FROM  `set` where id=1";
$query = $db->query($sql);
if ($query->num_rows() == 0)
{
 msgbox("错误:没有该条记录!", "BACK");
}
$res = $db->query($sql)->row();
?>

	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="../main.php">首页</a></li>
    <li><a href="set.php">网站设置</a></li>
    </ul>
    </div>
    
    <div class="formbody">
    
    <div class="formtitle"><span>网站设置</span></div>
    
	<FORM name='form1' method='post' action='set.php' onsubmit='return check()'>
    <input name="act" type="hidden" value="save">
    <ul class="forminfo">
    
	<li><label>网站标题</label><input name="title" value="<?php echo $res->title;?>" type="text" class="dfinput" /></li>
    <li><label>网站关键字</label>
	<textarea  id="keywords" name="keywords" style="width:345px;height:70px;" class="dfinput"><?php echo $res->keywords;?></textarea>
	</li>
   
    <li><label>网站描述</label><textarea  id="description" name="description" style="width:345px;height:100px;" class="dfinput"><?php echo $res->description;?></textarea></li>
    <li><label>备案号</label><input name="record" type="text" class="dfinput" value="<?php echo $res->record;?>" /></li>
    <li><label>备案链接</label><input name="record_url" type="text" class="dfinput" value="<?php echo $res->record_url;?>" /></li>
    <li><label>版权信息</label><input name="copyright" type="text" class="dfinput" value="<?php echo $res->copyright;?>" /></li>
    <li><label>&nbsp;</label><input name="" type="submit" class="btn" value="确认保存"/></li>
    </ul>
	</FORM>
    
    
    </div>
</body>
</html>
