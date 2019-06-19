<?php 
include('../init.php');
if (!isset($_COOKIE["usernames"]) || $_COOKIE["usernames"] == '' || $_COOKIE["yzgrwl"] != "yz123grwl" )
{ 
  msgbox("错误:你未登录或登录已超时!", "parent.location='../login.php';");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<SCRIPT language="JavaScript" type="text/JavaScript">
function check()
{

  if (document.form1.title_lm.value=="")
  {
   alert("提示：栏目名称不能为空！");
   document.form1.title_lm.focus();
   return false;
   }
  if (document.form1.px.value=="")
  {
   alert("提示：栏目排序不能为空！");
   document.form1.px.focus();
   return false;
   }
}

function checkgao()
{
	if (gaoji.style.display=="")
	{
			gaoji.style.display="none"
	}
	else
	{ 
		gaoji.style.display=""
	}
}
</SCRIPT>
</head>

<body>

<?php 
$id = isset($_GET["id"]) ? $_GET["id"] : NULL;
if ($id == NULL)  msgbox("错误:参数错误!", "BACK");

$sql = "select * from cp_lm where id_lm=".$id."";
$query = $db->query($sql);
if ($query->num_rows() == 0)
{
  msgbox("错误:没有该条记录!", "BACK");
}
//echo $sql;
$res = $db->query($sql)->row();
?>

	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="../main.php">首页</a></li>
    <li><a href="default.php">信息栏目</a></li>
    </ul>
    </div>
    
    <div class="formbody">
    
    <div class="formtitle"><span>基本信息</span></div>
    
	<FORM name='form1' method='post' action='action.php' onsubmit='return check()'>
<input name="act" type="hidden" value="save">
<INPUT name="id" type="hidden" value="<?php echo $res->id_lm;?>">
    <ul class="forminfo">
    <li><label>所属栏目</label><SELECT name='fid' id="fid" class="dfinput">
<OPTION value='0' selected>无{作为一级栏目}</OPTION>
<?php
//添加信息时显示栏目过程
$sql="select * from cp_lm where fid=0 and xia=1 order by px desc";
$result = $db->query($sql)->result('array');

foreach($result as $row){	
	$i="";
	if ($row["add_xx"])
	{
	 echo "<OPTION value=".$row['id_lm']." >·".$row['title_lm']."</OPTION>";
	}
	else
	{
	   echo "<OPTION value=".$row['id_lm']." >·".$row['title_lm']."×</OPTION>";
	}
	dis_child($row["id_lm"], $i);
}
																		
//显示栏目子过程
function dis_child($fid,$i){
	$i .= '&nbsp;&nbsp;';
	global $db;
	$sql='select * from cp_lm where fid='. $fid .' and xia=1 order by px desc';
    $result = $db->query($sql)->result('array');
	foreach( $result as $rows )
	{
		if ($rows['add_xx']){
			print('<option value='.$rows['id_lm'].'>' . $i . '|—' . $rows['title_lm'] . '</option>');
		}else{
			print('<option value='.$rows['id_lm'].'>' . $i . '|—' . $rows['title_lm'] . '×</option>');
		}
		dis_child($rows['id_lm'], $i . '|');
	}
	
}
?>
</SELECT>

<script>
document.form1.fid.value=<?php echo $res->fid;?>;
</script></li>
    <li><label>栏目名称</label><input name="title_lm" value="<?php echo $res->title_lm;?>" type="text" class="dfinput" /></li>
    <li><label>高级选项</label><cite>  <input name="gao" type="checkbox" id="gao" value="yes" onClick="checkgao()">
    显示高级设置</cite></li>
	
	<div id="gaoji" style="display:none;">
		<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="margin-left:85px;" >
       <tr>
        <td height="30"><label>
          <input name="add_xx" type="radio" id="add_xx" value="1" <?php if($res->add_xx) echo 'checked' ?>>
          是
          <input type="radio" name="add_xx" id="add_xx" value="0" <?php if(!$res->add_xx) echo 'checked' ?>>
        否 可以添加信息</label></td>
      </tr>
      <tr>
        <td height="30"><label>
          <input name="xia" type="radio" id="xia" value="1"  <?php if($res->xia) echo 'checked' ?>>
          是
          <input type="radio" name="xia" id="xia" value="0"  <?php if(!$res->xia) echo 'checked' ?>>
        否 有下级栏目</label></td>
      </tr>
      <tr>
        <td height="30"><label>
          <input type="radio" name="uselink" id="uselink" value="1"  <?php if($res->uselink) echo 'checked' ?>>
          是
          <input name="uselink" type="radio" id="uselink" value="0"  <?php if(!$res->uselink) echo 'checked' ?>>
        否 有外部链接</label></td>
      </tr>
      <tr>
        <td height="30">
          <input type="radio" name="f_body" id="f_body" value="1"  <?php if($res->f_body) echo 'checked' ?>>
          是
          <input name="f_body" type="radio" id="f_body" value="0"  <?php if(!$res->f_body) echo 'checked' ?>>
        否 有简要介绍</td>
      </tr>
      <tr>
        <td height="30">
          <input name="z_body" type="radio" id="z_body" value="1"  <?php if($res->z_body) echo 'checked' ?>>
          是
          <input type="radio" name="z_body" id="z_body" value="0"  <?php if(!$res->z_body) echo 'checked' ?>>
        否 有详细介绍</td>
      </tr>
      <tr>
        <td height="30">
          <input name="img_sl" type="radio" id="img_sl" value="1"  <?php if($res->img_sl) echo 'checked' ?>>
          是
          <input name="img_sl" type="radio" id="img_sl" value="0"  <?php if(!$res->img_sl) echo 'checked' ?>>
        否 有文件上传</td>
      </tr>
    </table>
	</div>
	
	
    <li><label>栏目排序</label><input name="px" type="text" class="dfinput" value="<?php echo $res->px;?>" /></li>
    <li><label>&nbsp;</label><input name="" type="submit" class="btn" value="确认保存"/></li>
    </ul>
	</FORM>
    
    
    </div>
</body>
</html>
