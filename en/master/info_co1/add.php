<?php 
include('../init.php');
if (!isset($_COOKIE["usernames"]) || $_COOKIE["usernames"] == '' || $_COOKIE["yzgrwl"] != "yz123grwl" )
{ 
  msgbox("错误:你未登录或登录已超时!", "parent.location='../default.php';");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />


 <script language="JavaScript" type="text/javascript" src="../js/jquery.min.js"></script>
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
				 editor = K.create('textarea[name="cpcs"]', {
                    allowFileManager: true, // 文件空间管理
                    filterMode: false  //关闭过滤
                });
			});
		</script>
         <script language="JavaScript" type="text/javascript" src="../js/gallery.js"></script>
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
                discpcs= $('#dis_cpcs');
                disFbody = $('#dis_f_body');
                disZbody = $('#dis_z_body');
                disImg = $('#dis_img_sl'); 
                disImgen = $('#dis_img_sl_en'); 
                if(cat == 'no' || cat == 'n') return false;
	  
                $.ajax({
                    type: 'GET',
                    url: '../ajax.php',
                    data: {act : "info_change1_cat", cat : cat},
                    success: function(data){
                        if (data.error == 0)
                        {
                            catInfo = data.content;
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
                            if(catInfo.cpcs == '1') {
                            	discpcs.css("display", "");
                            } else {
                            	discpcs.css("display", "none");		
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
                            	disImgen.css("display", "");
                            } else {
                            	disImgen.css("display", "none");	
                            }
                           
                        } else {
                            alert(data.message);	     
                        }	   
	  
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
    <li><a href="../info_lm1/default.php">信息栏目</a></li>
    </ul>
    </div>
    
    <div class="formbody">
    
    <div class="formtitle"><span>基本信息</span></div>
<?php $lm=(int)$_GET['lm'];?> 
	  <form action="action.php" method="post" enctype="multipart/form-data" name="form1"  onsubmit="return CheckForm()" >  
            <input name="act" type="hidden" value="save">
    <ul class="forminfo">
    <li><label>所属栏目</label><SELECT name="lm" onChange="changeCat();" id="lm" class="dfinput" >
 <option value="n" selected>请选择栏目</option>
                                        <?php
//添加信息时显示栏目过程
                                        $sql = "select id_lm, title_lm, fid, xia, add_xx from info_lm1 where fid=0 order by px desc";
                                        $result = $db->query($sql)->result('array');

                                        foreach ($result as $row) {
                                            $i = "";
                                            if ($row["add_xx"]) {
                                                echo '<OPTION value=' . $row["id_lm"] . '>·' . $row["title_lm"] . '</OPTION>';
                                            } else {
                                                echo '<OPTION value="no">·' . $row["title_lm"] . '×</OPTION>';
                                            }
                                            $i = '';
                                            if ($row["xia"] == 1)
                                                dis_child($row["id_lm"], $i);
                                        }

//添加信息时显示栏目子过程
                                        function dis_child($fid, $i) {
                                            global $db;
                                            $i .= "&nbsp;&nbsp;";
                                            $sql = "select id_lm, title_lm, fid, xia, add_xx from info_lm1 where fid=" . $fid . " order by px desc";
                                            $result = $db->query($sql)->result('array');
                                            foreach ($result as $rows) {
                                                if ($rows["add_xx"]) {
                                                    echo "<option value=" . $rows["id_lm"] . ">" . $i . "|—" . $rows["title_lm"] . "</option>";
                                                } else {
                                                    echo "<option value='no'>" . $i . "|—" . $rows["title_lm"] . "×</option>";
                                                }
                                                if ($rows["xia"] == 1) {
                                                    dis_child($rows["id_lm"], $i . "|");
                                                }
                                            }
                                        }
                                        ?>
</SELECT></li>

    <li><label>信息名称</label><input name="title" id="title" type="text" class="dfinput" value=""/></li>

    <li id="dis_uselink" style="display:none;"><label>连接地址</label><input name="linkurl" type="text" class="dfinput" value="" /></li>
    <li id="dis_key1"><label>网站关键字</label>
	<textarea class="dfinput" id="keywords" name="title_key" style="width:345px;height:70px;"></textarea>
	</li>
   
    <li id="dis_key2"><label>网站描述</label><textarea class="dfinput"  id="title_tion" name="title_tion" style="width:345px;height:100px;"></textarea></li>
    
	
	<li id="dis_cpcs" style="display:"><label>产品参数</label><textarea  id="cpcs" name="cpcs" style="width:800px;height:200px;visibility:hidden;"></textarea></li>
	
	<li id="dis_f_body" style="display:"><label>信息精要</label><textarea  id="f_body" name="f_body" style="width:800px;height:200px;visibility:hidden;"></textarea></li>
	
	
	<li id="dis_z_body" style="display:"><label>文章内容</label><textarea  id="z_body" name="z_body" style="width:800px;height:400px;visibility:hidden;"></textarea></li>
	
	
	<li id="dis_img_sl"><label>略缩图片一</label> <input name="img_sl" type="file" id="img_sl" class="dfinput"></li>
	<li id="dis_img_sl_en" style="display: none;"><label>略缩图片二</label> <input name="bimg_sl" type="file" id="bimg_sl" class="dfinput"></li>
	
	<li id="dis_info_from" style="display:none;"><label>多图展示</label> <table id="img_list">
<tr>
<td><a  href="javascript:;" onClick="addImg()">[增加]</a><input name="gallery_desc[]" type="hidden" size="40" maxlength="80"><input type="file" name="gallery_file[]" class="dfinput"></td>
</tr>
</table> </li>
	
	<li><label>录入时间</label> <input name="wtime" type="text" id="wtime" value="<?php echo date("Y-m-d H:i:s"); ?>" maxlength="50" class="dfinput">              时间格式为&ldquo;年-月-日 时:分:秒&rdquo;，如：<font color="#0000FF">2003-05-12 12:32:47</font></li>
	
	<li><label>显示顺序</label> <input name="px" type="text" id="px" value="100" size="10" maxlength="10" class="dfinput">
                                  </li>
	
    <li><label>&nbsp;</label>
    <input type="hidden" name="pass" value="1">
    <input name="" type="submit" class="btn" value="确认保存"/></li>
    </ul>
	</FORM>
<script type="text/javascript">
$('#lm').val(<?php echo $lm;?>);
$('#lm').change();
</script>
    
    </div>
</body>
</html>
