<?php 
include('../init.php');
if (!isset($_COOKIE["usernames"]) || $_COOKIE["usernames"] == '' || $_COOKIE["yzgrwl"] != "yz123grwl" )
{ 
  msgbox("错误:你未登录或登录已超时!", "parent.location='../login.php';");
}
$id = isset($_GET["id"]) ? $_GET["id"] : NULL;
if ($id == NULL)  msgbox("错误:参数错误!", "BACK");
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
				editor = K.create('textarea[name="z_body"]', {
					allowFileManager : true, // 文件空间管理
                                        filterMode : false  //关闭过滤
				});
				 editor = K.create('textarea[name="f_body"]', {
                    allowFileManager: true, // 文件空间管理
                    filterMode: false  //关闭过滤
                });
			});
		</script>
<script language = "JavaScript">
function CheckForm()
{
  lm = $('#lm');
  title = $('#title');
  uselink = $('#uselink');
  linkurl = $('#linkurl');
  
  if (lm.val() == "n")
  {
	alert("提示:请选择栏目!");
	lm.focus();
	return false;
  }
  if (lm.val() == "no")
  {
	alert("提示:所选栏目不允许添加文章！");
	lm.focus();
	return false;
  }
  if (title.val() == "")
  {
	 alert("提示:文章标题不能为空！");
	 title.focus();
	 return false;
  }
  return true;
}

function changeCat()
{
	cat = $('#lm').val();
	disUselink = $('#dis_uselink');
	disInfofrom = $('#dis_info_from');
	disFbody = $('#dis_f_body');
	disZbody = $('#dis_z_body');
	disImg = $('#dis_img_sl');  

	if(cat == 'no' || cat == 'n') return false;
	  
	$.ajax({
	  type: 'GET',
	  url: '../ajax.php',
	  data: {act : "cp_change_cat", cat : cat},
	  success: function(data){
			if (data.error == 0)
			{
			catInfo = data.content;
			if(catInfo.uselink == '1') {
				 disUselink.css("display", "");
			} else {
				 disUselink.css("display", "none");		
			}	
			
			if(catInfo.f_body == '1') {
				 disFbody.css("display", "");
			} else {
				 disFbody.css("display", "none");		
			}
			
			if(catInfo.z_body == '1') {
				 disZbody.css("display", "");
			} else {
				 disZbody.css("display", "none");		
			}
			
			if(catInfo.img_sl == '1') {
				 disImg.css("display", "");
			} else {
				 disImg.css("display", "none");	
			}
				
			} else {
			alert(data.message);	     
			}	   
	  
	  },
	  dataType: "JSON"
	});
}

function dropImg(id)
{
$.ajax({
	  type: 'GET',
	  url: '../ajax.php',
	  data: {act : "del_cp_img", id : id},
	  success: function(data){  
	     if(data.error == 0)
		 {
		    $("#img_sl_box").empty();
		    $("<input name=\"img_sl\" type=\"file\" id=\"img_sl\">").prependTo("#img_sl_box");
		 } 
		 //alert(data);	  
	  },
	  dataType: "JSON"
	});
}

</script>

</head>

<body>

	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="../main.php">首页</a></li>
    <li><a href="../cp_lm/default.php">信息栏目</a></li>
    </ul>
    </div>
    
    <div class="formbody">
    
    <div class="formtitle"><span>基本信息</span></div>
    
	<?php
$sql = "select * from cp_co where id=".$id."";
$query = $db->query($sql);
if ($query->num_rows() == 0)
{
  msgbox("错误:没有该条记录!", "BACK");
}
$res = $query->row();
$sql = 'select uselink, info_from, f_body, z_body, img_sl from cp_lm where id_lm=' . $res->lm; 
$dis_lm = $db->query($sql)->row();
?>

<form action="action.php" method="post" enctype="multipart/form-data" name="form1"  onsubmit="return CheckForm()" >
 <input name="act" type="hidden" value="save">
 <input name="id" value="<?php echo $id;?>" type="hidden"> 
    <ul class="forminfo">
    <li><label>所属栏目</label><SELECT name="lm" onChange="changeCat();" id="lm" class="dfinput" >
<option value="n" selected>请选择栏目</option>
<?php
//添加信息时显示栏目过程
$sql = "select id_lm, title_lm, fid, xia, add_xx from cp_lm where fid=0 order by px";
$result = $db->query($sql)->result('array');

foreach($result as $row)
{	
	$i = "";
	if ($row["add_xx"])
	{
	     echo '<OPTION value='. $row["id_lm"] .'>·'. $row["title_lm"] .'</OPTION>';
	}
	else
	{
	     echo '<OPTION value="no">·' . $row["title_lm"] . '×</OPTION>';
	}
	$i = '';
	if ($row["xia"] == 1) dis_child($row["id_lm"], $i);
}


//添加信息时显示栏目子过程
function dis_child($fid,$i)
{
	global $db;
	$i .= "&nbsp;&nbsp;";
	$sql = "select id_lm, title_lm, fid, xia, add_xx from cp_lm where fid=".$fid." order by px";
    $result = $db->query($sql)->result('array');
	foreach($result as $rows)
	{
		if ($rows["add_xx"])
		{
			echo "<option value=".$rows["id_lm"].">".$i."|—".$rows["title_lm"]."</option>";
		}
		else
		{
			echo "<option value='no'>".$i."|—". $rows["title_lm"]."×</option>";
		}
		if ($rows["xia"]==1) 
		{
			dis_child($rows["id_lm"], $i . "|");
		}
	}
}
?>
</select>
<script>
$('#lm').val(<?php echo $res->lm;?>)
</script>
 
 </li>
    <li><label>信息名称</label><input name="title" id="title" type="text" class="dfinput" value="<?php echo $res->title;?>"/></li>
	
    <li id="dis_uselink" <?php if(!$dis_lm->uselink) echo "style='display:none;'"; ?>><label>链接地址</label><input name="linkurl" type="text" class="dfinput" value="<?php echo $res->linkurl ?>" /></li>

	<li id="dis_f_body" <?php if(!$dis_lm->f_body) echo "style='display:none;'"; ?>><label>信息精要</label><textarea  id="f_body" name="f_body" style="width:800px;height:200px;visibility:hidden;"><?php echo htmlspecialchars($res->f_body,ENT_QUOTES);?></textarea></li>
    <li id="dis_z_body" <?php if(!$dis_lm->z_body) echo "style='display:none;'"; ?> ><label>文章内容</label><textarea  id="z_body" name="z_body" style="width:800px;height:400px;visibility:hidden;"><?php echo htmlspecialchars($res->z_body,ENT_QUOTES);?></textarea></li>
	
	
	<li id="dis_z_body" id="dis_img_sl" <?php if(!$dis_lm->img_sl) echo "style='display:none;'"; ?>><label>略缩图片</label> 
	
	<?php 
			if($res->img_sl != '')
			{
			?>
			  <div id="img_sl_box" >
				<div style="float:left; text-align:center; border: 1px solid #DADADA; margin: 4px; padding:2px;">
				<a href="javascript:;" onClick="if (confirm('您确实要删除该图片吗？')) dropImg('<?php echo $res->id; ?>')" title="点击删除">[-]</a><br>
				<a href="../../<?php echo $res->img_sl; ?>" target="_blank">
				<img src="../../<?php echo $res->img_sl; ?>" width="150"  border="0"></a>						  
				</div>							 
			 </div>
			 <?php 
			 } 
			 else
			 {
			 ?>
			 <input name="img_sl" type="file" id="img_sl" class="dfinput">
			<?php
			}
			?>
	
	
	
	</li>
	

	
	
	
	<li id="dis_z_body" id="dis_img_sl"><label>录入时间</label> <input name="wtime" type="text" id="wtime" value="<?php echo date("Y-m-d H:i:s",$res->wtime);?>" maxlength="50" class="dfinput">              时间格式为&ldquo;年-月-日 时:分:秒&rdquo;，如：<font color="#0000FF">2003-05-12 12:32:47</font></li>
	
	<li id="dis_z_body" id="dis_img_sl"><label>显示顺序</label> 
	<input name="px" type="text" id="px" size="10" maxlength="10" class="dfinput" value="<?php echo $res->px; ?>">
    </li>
	
    <li><label>&nbsp;</label>
    <input type="hidden" name="pass" value="<?php echo $res->pass; ?>">
    <input type="hidden" name="tuijian" value="<?php echo $res->tuijian; ?>">
    <input name="" type="submit" class="btn" value="确认保存"/>
    
    </li>
    </ul>
	</FORM>
    
    
    </div>
</body>
</html>
