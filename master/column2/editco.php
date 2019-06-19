<?php 
include('../init.php');
if (!isset($_COOKIE["usernames"]) || $_COOKIE["usernames"] == '' || $_COOKIE["yzgrwl"] != "yz123grwl" )
{ 
  msgbox("错误:你未登录或登录已超时!", "parent.location='../default.php';");
}

$id = isset($_GET["id"]) ? $_GET["id"] : NULL;
$lm=(int)$_GET["id_lm"];
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
	disEtitle = $('#dis_e_title');
    diskey1 = $('#dis_key1');
    diskey2 = $('#dis_key2');
	disUselink = $('#dis_uselink');
	disInfofrom = $('#dis_info_from');
	disFbody = $('#dis_f_body');
	disZbody = $('#dis_z_body');
	disImg = $('#dis_img_sl');  
	disbImg = $('#dis_bimg_sl'); 
	if(cat == 'no' || cat == 'n') return false;
	  
	$.ajax({
	  type: 'GET',
	  url: '../ajax.php',
	  data: {act : "info_change_cat", cat : cat},
	  success: function(data){
			if (data.error == 0)
			{
			catInfo = data.content;
            if(catInfo.e_name == '1') {
                disEtitle.css("display", "");
            } else {
                disEtitle.css("display", "none");		
            }
			
			if(catInfo.uselink == '1') {
				 disUselink.css("display", "");
			} else {
				 disUselink.css("display", "none");		
			}
			
			if(catInfo.info_from == '1') {
				 disInfofrom.css("display", "");
			} else {
				 disInfofrom.css("display", "none");		
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
            if(catInfo.bimg_sl == '1') {
                disbImg.css("display", "");
            } else {
                disbImg.css("display", "none");	
            }
            if(catInfo.web_key == '1') {
            	diskey1.css("display", "");
            	diskey2.css("display", "");
            } else {
            	diskey1.css("display", "none");	
            	diskey2.css("display", "none");
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
	  data: {act : "del_info_img", id : id},
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
function dropbImg(id)
{
$.ajax({
	  type: 'GET',
	  url: '../ajax.php',
	  data: {act : "del_info_bimg", id : id},
	  success: function(data){  
	     if(data.error == 0)
		 {
		    $("#bimg_sl_box").empty();
		    $("<input name=\"bimg_sl\" type=\"file\" id=\"bimg_sl\">").prependTo("#bimg_sl_box");
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
    <li><a href="../column2/defaultco.php">信息列表</a></li>
    </ul>
    </div>
    
    <div class="formbody">
    
    <div class="formtitle"><span>基本信息</span></div>
    
	<?php
$sql = "select * from info_co where id=".$id."";
$query = $db->query($sql);
if ($query->num_rows() == 0)
{
  msgbox("错误:没有该条记录!", "BACK");
}
$res = $query->row();
$sql = 'select * from info_lm where id_lm=' . $res->lm; 
$dis_lm = $db->query($sql)->row();
?>

<form action="actionco.php" method="post" enctype="multipart/form-data" name="form1"  onsubmit="return CheckForm()" >
 <input name="act" type="hidden" value="save">
 <input name="id" value="<?php echo $id;?>" type="hidden"> 
    <ul class="forminfo">
    <li><label>所属栏目</label><SELECT name="lm" onChange="changeCat();" id="lm" class="dfinput" >
<?php
//添加信息时显示栏目过程
$sql = "select id_lm, title_lm, fid, xia, add_xx from info_lm where id_lm={$lm} order by px";
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
	$sql = "select id_lm, title_lm, fid, xia, add_xx from info_lm where fid=".$fid." order by px desc";
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
    <li id="dis_key1" <?php if(!$dis_lm->web_key) echo "style='display:none;'"; ?>><label>网站关键字</label>
	<textarea class="dfinput" id="keywords" name="keywords" style="width:345px;height:70px;"><?php echo $res->keywords;?></textarea>
	</li>
    <li id="dis_key2" <?php if(!$dis_lm->web_key) echo "style='display:none;'"; ?>><label>网站描述</label>
    <textarea class="dfinput"  id="description" name="description" style="width:345px;height:100px;"><?php echo $res->description;?></textarea></li>
    <li id="dis_e_title" <?php if(!$dis_lm->e_name) echo "style='display:none;'"; ?>><label>英文名称</label><input name="e_title" id="e_title" type="text" class="dfinput" value="<?php echo $res->e_title;?>"/></li>
    <li id="dis_uselink" <?php if(!$dis_lm->uselink) echo "style='display:none;'"; ?>><label>连接地址</label><input name="linkurl" type="text" class="dfinput" value="<?php echo $res->linkurl ?>" /></li>
	<li id="dis_f_body" <?php if(!$dis_lm->f_body) echo "style='display:none;'"; ?>><label>信息精要</label><textarea  id="f_body" name="f_body" class="dfinput" style="width:345px;height:100px;"><?php echo htmlspecialchars($res->f_body,ENT_QUOTES);?></textarea></li>
	
	
    <li id="dis_z_body" <?php if(!$dis_lm->z_body) echo "style='display:none;'"; ?> ><label>文章内容</label><textarea  id="z_body" name="z_body" style="width:800px;height:400px;visibility:hidden;"><?php echo htmlspecialchars($res->z_body,ENT_QUOTES);?></textarea></li>
	
	
	<li id="dis_img_sl" <?php if(!$dis_lm->img_sl) echo "style='display:none;'"; ?>><label>略缩图片</label> 
	
	<?php 
			if($res->img_sl != '')
			{
			?>
			  <div id="img_sl_box" >
				<div style="float:left; text-align:center; border: 1px solid #DADADA; margin: 4px; padding:2px;">
				<a href="javascript:;" onClick="if (confirm('您确实要删除该图片吗？')) dropImg('<?php echo $res->id; ?>')" title="点击删除">[删除]</a><br>
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
	
	<span>(建议最佳图片尺寸：
	           <?php if($lm==8){
                	echo '120*120';
                }
                elseif ($lm==9){
                	echo '564*423';
                }
                elseif ($lm==10){
                    echo '600*390';
                }
                elseif ($lm==11){
                    echo '564*423';
                }
                elseif ($lm==12){
                    echo '600*390';
                }
                ?>)</span>
	
	</li>
	
		
	<li id="dis_bimg_sl" <?php if(!$dis_lm->bimg_sl) echo "style='display:none;'"; ?>><label>略缩图片(二)</label> 
	
	<?php 
			if($res->bimg_sl != '')
			{
			?>
			  <div id="bimg_sl_box" >
				<div style="float:left; text-align:center; border: 1px solid #DADADA; margin: 4px; padding:2px;">
				<a href="javascript:;" onClick="if (confirm('您确实要删除该图片吗？')) dropbImg('<?php echo $res->id; ?>')" title="点击删除">[删除]</a><br>
				<a href="../../<?php echo $res->bimg_sl; ?>" target="_blank">
				<img src="../../<?php echo $res->bimg_sl; ?>" width="150"  border="0"></a>						  
				</div>							 
			 </div>
			 <?php 
			 } 
			 else
			 {
			 ?>
			 <input name="bimg_sl" type="file" id="bimg_sl" class="dfinput">
			<?php
			}
			?>
	
	<span>(建议最佳图片尺寸：621*439)</span>
	
	</li>
    <li> 


        <?php 
        $sql = "select * from pro_album where pro_id=$res->id order by id desc";
        $result = $db->query($sql)->result();
        foreach($result as $rs):
        ?>               
        			    <div style="float:left; text-align:center; border: 1px solid #DADADA; margin: 4px; padding:2px; margin-left:85px;">
        				<a href="javascript:;" onClick="if (confirm('您确实要删除该图片吗？')) dropAlbumImg('pro_album','<?php echo $rs->id; ?>',this)" title="点击删除">[删除]</a><br>
        				<a href="../../<?php echo $rs->img_url; ?>" target="_blank">
        				<img src="../../<?php echo $rs->img_url; ?>" width="160" height="100"/></a><br>
        				<input value="<?php echo $rs->id; ?>" name="gallery_id[]" type="hidden" size="40" class="dfinput">
        				图片标题<input value="<?php echo $rs->img_desc; ?>" name="gallery_updesc[]" style="width: 100px" type="text" size="40" class="dfinput"><br>
        				图片排序<input value="<?php echo $rs->px; ?>" name="gallery_uppx[]" style="width: 100px" type="text" size="40" class="dfinput">
        				</div>		
        <?php
        endforeach;
        ?>                                                           
	
    </li>
	
	
	<li id="dis_info_from" <?php if(!$dis_lm->info_from) echo "style='display:none;'"; ?>><label>多图展示</label> 
		<table id="img_list">
        <tr >
        <td><a  href="javascript:;" onClick="addImg()">[增加]</a><input placeholder="图片标题" name="gallery_desc[]" type="text" size="40" class="dfinput"><input type="file" name="gallery_file[]" class="dfinput55">排序<input value="100" name="gallery_px[]" type="text" style="width: 50px;" class="dfinput"><span>(建议最佳图片尺寸：1200*600)</span></td>
        </tr>
        </table> 
    </li>
	<li><label>录入时间</label> <input name="wtime" type="text" id="wtime" value="<?php echo date("Y-m-d H:i:s",$res->wtime);?>" maxlength="50" class="dfinput">              时间格式为&ldquo;年-月-日 时:分:秒&rdquo;，如：<font color="#0000FF">2003-05-12 12:32:47</font></li>
	
	<li><label>显示顺序</label> 
	<input name="px" type="text" id="px" size="10" maxlength="10" class="dfinput" value="<?php echo $res->px; ?>">
                                    </li>
    <li><label>&nbsp;</label>
        <input type="hidden" name="pass" value="<?php echo $res->pass; ?>">
    <input type="hidden" name="tuijian" value="<?php echo $res->tuijian; ?>">
    <input name="" type="submit" class="btn" value="确认保存"/></li>
    </ul>
	</FORM>
    </div>
</body>
</html>
