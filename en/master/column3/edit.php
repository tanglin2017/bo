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

<script language="JavaScript" type="text/javascript" src="../js/jquery.min.js"></script>
<script language="JavaScript" type="text/javascript" src="../js/gallery.js"></script>
 <script charset="utf-8" src="../../kindeditor/kindeditor.js"></script>
        <script charset="utf-8" src="../../kindeditor/lang/zh_CN.js"></script>
		<script>
			var editor;
			KindEditor.ready(function(K) {
				 editor = K.create('textarea[name="neirong"]', {
                    allowFileManager: true, // 文件空间管理
                    filterMode: false  //关闭过滤
                });
			});
		</script>
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
function dropImg(id)
{
    $.ajax({
        type: 'GET',
        url: "../ajax.php",
        data: {act : "del_infolm_img", id : id},
        success: function(data){  
            if(data.error == 0)
            {
                $("#img_url_box").empty();
                $("<input name=\"img_url\" type=\"file\" id=\"img_url\">").prependTo("#img_url_box");
            } 
            //alert(data);	  
        },
        dataType: "JSON"
    });
}
function dropsImg(id)
{
    $.ajax({
        type: 'GET',
        url: "../ajax.php",
        data: {act : "del_infolm_simg", id : id},
        success: function(data){  
            if(data.error == 0)
            {
                $("#simg_url_box").empty();
                $("<input name=\"simg_url\" type=\"file\" id=\"simg_url\">").prependTo("#simg_url_box");
            } 
            //alert(data);	  
        },
        dataType: "JSON"
    });
}

</SCRIPT>
</head>

<body>

<?php 
$id = isset($_GET["id"]) ? $_GET["id"] : NULL;
if ($id == NULL)  msgbox("错误:参数错误!", "BACK");

$sql = "select * from info_lm where id_lm=".$id."";
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
    
	<FORM name='form1' method='post' action='action.php' enctype="multipart/form-data" onsubmit='return check()'>
<input name="act" type="hidden" value="save">
<INPUT name="id" type="hidden" value="<?php echo $res->id_lm;?>">
    <ul class="forminfo">
    <li><label>所属栏目</label><SELECT name='fid' id="fid"  class="dfinput">
<OPTION value='0' selected>无{作为一级栏目}</OPTION>
<?php
//添加信息时显示栏目过程
$sql="select * from info_lm where id_lm=3 and xia=1 order by px";
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
	$sql='select * from info_lm where fid='. $fid .' and xia=1 order by px';
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
    <li><label>图片标题</label><input name="title_en" value="<?php echo $res->title_en;?>" type="text" class="dfinput" /></li>
    <li style="display: none;"><label>图片简介</label><textarea class="dfinput" id="jianjie" name="jianjie" style="width:345px;height:50px;"><?php echo htmlspecialchars($res->jianjie,ENT_QUOTES);?></textarea></li>
    <li><label>栏目图片</label>
    <?php 
			if($res->img_url != '')
			{
			?>
			  <div id="img_url_box" >
				<div style="float:left; text-align:center; border: 1px solid #DADADA; margin: 4px; padding:2px;">
				<a href="javascript:;" onClick="if (confirm('您确实要删除该图片吗？')) dropImg('<?php echo $res->id_lm; ?>')" title="点击删除">[删除]</a><br/>
				<a href="../../<?php echo $res->img_url; ?>" target="_blank">
				<img src="../../<?php echo $res->img_url; ?>" width="150"  border="0"></a>						  
				</div>							 
			 </div>
			 <?php 
			 } 
			 else
			 {
			 ?>
			 <input name="img_url" type="file" id="img_url">
			<?php
			}
			?><span>(建议最佳图片尺寸： 1903*450)</span>
    </li>
    <li style="display: none;"><label>内页图片</label>
    <?php 
			if($res->simg_url != '')
			{
			?>
			  <div id="simg_url_box" >
				<div style="float:left; text-align:center; border: 1px solid #DADADA; margin: 4px; padding:2px;">
				<a href="javascript:;" onClick="if (confirm('您确实要删除该图片吗？')) dropsImg('<?php echo $res->id_lm; ?>')" title="点击删除">[删除]</a><br/>
				<a href="../../<?php echo $res->simg_url; ?>" target="_blank">
				<img src="../../<?php echo $res->simg_url; ?>" width="150"  border="0"></a>						  
				</div>							 
			 </div>
			 <?php 
			 } 
			 else
			 {
			 ?>
			 <input name="simg_url" type="file" id="simg_url">
			<?php
			}
			?><span>(建议最佳图片尺寸：1800*700)</span>
    </li>
    <li><label>栏目关键字</label><textarea class="dfinput" id="keywords" name="keywords" style="width:345px;height:70px;"><?php echo $res->keywords;?></textarea></li>
    <li><label>栏目描述</label><textarea class="dfinput"  id="description" name="description" style="width:345px;height:100px;"><?php echo $res->description;?></textarea></li>
    <li style="display: none;"><label>栏目内容</label><textarea  id="neirong" name="neirong" style="width:800px;height:200px;visibility:hidden;"><?php echo htmlspecialchars($res->neirong,ENT_QUOTES);?></textarea></li>
    <li style="display: none;"><label>高级选项</label><cite>  <input name="gao" type="checkbox" id="gao" value="yes" onClick="checkgao()">
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
          <input name="e_name" type="radio" id="e_name" value="1" <?php if($res->e_name) echo 'checked' ?>>
          是
          <input type="radio" name="e_name" id="e_name" value="0" <?php if(!$res->e_name) echo 'checked' ?>>
        否 有英文名称</label></td>
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
        否 有外部连接</label></td>
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
        否 有缩略图片</td>
      </tr>
      <tr>
        <td height="30">
          <input name="bimg_sl" type="radio" id="bimg_sl" value="1"  <?php if($res->bimg_sl) echo 'checked' ?>>
          是
          <input name="bimg_sl" type="radio" id="bimg_sl" value="0"  <?php if(!$res->bimg_sl) echo 'checked' ?>>
        否 有文件上传</td>
      </tr>
      <tr>
        <td height="30">
          <input type="radio" name="info_from" id="info_from" value="1" <?php if($res->info_from) echo 'checked' ?>>
          是
          <input name="info_from" type="radio" id="info_from" value="0" <?php if(!$res->info_from) echo 'checked' ?>>
        否 有多图展示</td>
      </tr>
      <tr>
        <td height="30">
          <input name="web_key" type="radio" id="web_key" value="1"  <?php if($res->web_key) echo 'checked' ?>>
          是
          <input name="web_key" type="radio" id="web_key" value="0"  <?php if(!$res->web_key) echo 'checked' ?>>
        否 有网站关键字</td>
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
